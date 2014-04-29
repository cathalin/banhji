<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Accounting_api extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();
		$this->load->model('accounting/account_model', 'account');
		$this->load->model('accounting/account_type_model', 'account_type');
		$this->load->model('accounting/class_model', 'classes');
		$this->load->model('accounting/journal_model', 'journal');
		$this->load->model('accounting/journal_entry_model', 'j_entry');
		$this->load->model('accounting/invoice_model', 'invoice');
		$this->load->model('accounting/invoice_item_model', 'invoice_item');
		$this->load->model('inventory/item_record_model', 'item_records');		
		$this->load->model('accounting/payment_model', 'payment');
		$this->load->model('accounting/payment_term_model', 'payment_term');
		$this->load->model('accounting/payment_method_model', 'payment_method');
		$this->load->model('accounting/currency_model', 'currency');
		$this->load->model('people/people_model', 'people');
		$this->load->model('staff/employee_m', 'employee');
		$this->load->model('accounting/expense_record_model', 'expense_record');
		$this->load->model('company_m', 'company');
		$this->load->library('session');
	}
	
	/* --- ACCOUNT --- */
	
	//GET 
	function account_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){
			$para = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}
			$query = $this->account->get_many_by($para);			
			if(count($query)>0) {
				foreach($query as $ac) {
					$data[] = array(
						"id" => $ac->id,
						"code" => $ac->code,
						"name" => $ac->name,
						"description" => $ac->description,
						"type_id" => $ac->account_type_id,
						"type" => $this->account->get_ac_type($ac->account_type_id)
					);
				}				
				$this->response(array('error'=>'false','code'=>200,'message'=>'data found.', 'results'=>$data), 200);	
			} else {				
				$this->response(array('error'=>'true','code'=>404,'message'=>'no data found.', 'results'=>array()), 200);	
			}	
		}else{
			$this->response(array('error'=>'true','code'=>401,'message'=>'no query passed.', 'results'=>array()), 200);		
		}		
	}

	function account_trans_get(){
		$filter= $this->get('filter');
		if($filter) {
			$query = $this->j_entry->get_many_by(array($filter['filters'][0]['field'] => $filter['filters'][0]['value']));
		} else {
			$query = $this->j_entry->get_all();
		}

		if(count($query)>0) {
			foreach($query as $row) {																			   
			   	//Add extra fields
				$extra = array(	'journal_id' 			=> $this->journal->get($row->journal_id)
						  );

				//Cast object to array
				$original = (array) $row;

				//Merge arrays
				$data[] = array_merge($original, $extra);	
			}	
			$this->response(array("status"=>"OK", "results"=>$data), 200);
		} else {
			$this->response(array('status'=>'failed', "results"=>array()), 200);
		}
	}

	function general_ledgers_get() {
		$filter = $this->get("filter");
		$ledgers = $this->journal->general_ledger();
		if($ledgers !== FALSE) {
			for($i = 0; $i < count($ledgers); $i++) {
				if($ledgers[$i] != 0) {
					$accounts["results"][] = array(
						"ledger" => $this->journal->account_name_by($ledgers[$i]["account"]),
						"transactions" => $this->journal->ledger_entries($ledgers[$i]["account"],$ledgers[$i]["transactions"], $filter['filters'][0]['value'], $filter['filters'][1]['value'], $filter['filters'][2]['value'])
					);
				}	
			}
			$this->response($accounts,200);
		}
		//$this->response($ledgers, 200);
	}

	public function transaction_by_get() {
		$filter = $this->get("id");
		$endDate = $this->get("endDate");
		$startDate = $this->get("startDate");

		if($filter != "" && isset($filter)) {
			$query = $this->j_entry->order_by("journal_id", "DESC")
								   ->limit($this->get('limit'), $this->get('offset'))
								   ->where_date($startDate, $endDate)
								   ->get_many_by("account", $filter);
			if(count($query) > 0) {
				foreach( $query as $t) {
					$data['results'][] = array(
							"id" => $t->id,
							"transactionNumber" => $t->journal_id,
							"class"	=> $this->db->select("id, name, type")->where("id", $t->class_id)->get("classes")->result(),
							"dr"	=> $t->dr,
							"cr"	=> $t->cr,
							"balance"=> $t->balance,
							"memo"	=> $t->memo,
							"detail" => $this->journal->journal_entry_by("journal_id", $t->journal_id),
							"date" => $t->created_at
						);
	 			}
	 			$data['total'] = $this->j_entry->where_date($endDate, $startDate)->count_by('account', $filter);
				$this->response($data, 200);
			} else {
				$this->response(array(), 200);
			}		
		} else {
			$criteria = $this->get('filter');
			$query;
			if($criteria['filters'][2]['value'] === "" || $criteria['filters'][2]['value'] === "0") {
				$query = $this->journal->where_date($criteria['filters'][0]['value'], $criteria['filters'][1]['value'])->get_all();
			} else {
				
				$query = $this->journal->where_date($criteria['filters'][0]['value'], $criteria['filters'][1]['value'])->get_many_by('class_id',$criteria['filters'][2]['value']);
			}
			
			if(count($query)> 0) {
				foreach($query as $t) {
					$data['results'][] = array(
							"transID" => $t->id,
							"classes"	=> $this->db->select("id, name, type")->where("id", $t->class_id)->limit(1)->get("classes")->row(),
							"memo"	=> $t->memo,
							"voucher" => $t->voucher,
							"type" => $t->transaction_type,
							"createdDate" => $t->created_at,
							"updatedDate" => $t->updated_at,
							"detail" => $this->journal->journal_entry_by("journal_id", $t->id)
						);
				}
			}
			$data['total'] = $this->journal->where_date($criteria['filters'][0]['value'], $criteria['filters'][1]['value'])->count_all();
			$this->response($data, 200);
		}

		
	}
	
	//GET CASH ACCOUNT
	function cash_account_get(){
		$data = $this->account->get_cash_account();
		$this->response($data, 200);
	}

	function cogs_account_get(){
		$data = $this->account->get_cogs_account();
		$this->response($data, 200);
	}

	function expense_account_get(){
		$data = $this->account->get_cogs_account();
		$this->response($data, 200);
	}
	
	//GET Liability ACCOUNT
	function liability_account_get(){
		$data = $this->account->get_liability_account();
		$this->response($data, 200);
	}
	
	//POST
	function account_post() {		
		// $arr = array('code' 			=> $this->post('code'),
		// 			 'name' 			=> $this->post('name'),
		// 			 'account_type_id' 	=> $this->post('account_type_id')['id'],
		// 			 'description' 		=> $this->post('description'),
		// 			 'parent_id'		=> $this->post('parent_id')['id']
		// );			
		// $id = $this->account->insert($arr);
		// $data = $this->account->get($id);
		
		// $accounts[] = array(
		// 	"id" => $data->id,
		// 	"code" => $data->code,
		// 	"name" => $data->name,
		// 	"description" => $data->description,
		// 	"type_id" => $data->account_type_id,
		// 	"type" => $this->account->get_ac_type($data->account_type_id),
		// 	"transactions" =>  $this->j_entry->get_many_by("account", $data->id),
		// 	"balance" => $this->journal->get_balance_amount_by($data->id),
		// 	"has_chidrend" => "",
		// 	"chidrend" => array()
		// );
			
		// $this->response($accounts, 200);	
		$this->response($arr, 200);				
	}
	
	//PUT
	function account_put() {
		$arr = array('code' 			=> $this->put('code'),
					 'name' 			=> $this->put('name'),
					 'description' 		=> $this->put('description')
		);
 		$id = $this->account->update($this->put('id'), $arr);
 		$data = $this->account->get($id);
		
		$accounts[] = array(
			"id" => $data->id,
			"code" => $data->code,
			"name" => $data->name,
			"description" => $data->description,
			"type_id" => $data->account_type_id,
			"type" => $this->account->get_ac_type($data->account_type_id),
			"transactions" =>  $this->j_entry->get_many_by("account", $data->id),
			"balance" => $this->journal->get_balance_amount_by($data->id)
		);
			
		$this->response($accounts, 200);
	}
	
	//DELETE
	function account_delete() {
		$query = $this->j_entry->get_by("account", $this->delete('id'));
		if(count($query)>0) {
			$this->account->update($this->delete('id'), array("active"=>0));
			if($this->db->affected_rows >0) {
				$this->response(array('status'=>"OK",'message'=>'account is set to inactive.', 'results'=>array()), 200);
			} else {
				$this->response(array('status'=>"failed",'message'=>'no account updated!', 'results'=>array()), 400);
			}
		} else {
			$this->account->delete($this->delete('id'));
			if($this->db->affected_rows >0) {
				$this->response(array('status'=>"OK",'message'=>'account is set to deleted.', 'results'=>array()), 200);
			} else {
				$this->response(array('status'=>"failed",'message'=>'no account updated!', 'results'=>array()), 400);
			}
		}
	}
		
		
	/* --- ACCOUNT TYPE --- */
	
	//GET 
	function account_type_get() {
		$data = $this->account_type->get_all();		
		$this->response($data, 200);
	}
	
	//POST
	function account_type_post() {			
		$this->account_type->insert($this->post());
		//$this->response($this->post(), 200);		
	}
	
	//PUT
	function account_type_put() {
 		 $this->account_type->update($this->put('id'), $this->put());
	}
	
	//DELETE
	function account_type_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->account_type->delete($this->delete('id'));
	}
				
	
	/* --- PAYMENT TERM --- */
	
	//GET 
	function payment_term_get() {
		$data = $this->payment_term->get_all();		
		$this->response($data, 200);
	}
	
	//POST
	function payment_term_post() {			
		$this->payment_term->insert($this->post());
		//$this->response($this->post(), 200);		
	}
	
	//PUT
	function payment_term_put() {
 		 $this->payment_term->update($this->put('id'), $this->put());
	}
	
	//DELETE
	function payment_term_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->payment_term->delete($this->delete('id'));
	}
		
	
	/* --- PAYMENT METHOD --- */
	
	//GET 
	function payment_method_get() {
		$data = $this->payment_method->get_all();		
		$this->response($data, 200);
	}
	
	//POST
	function payment_method_post() {			
		$this->payment_method->insert($this->post());
		//$this->response($this->post(), 200);		
	}
	
	//PUT
	function payment_method_put() {
 		 $this->payment_method->update($this->put('id'), $this->put());
	}
	
	//DELETE
	function payment_method_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->payment_method->delete($this->delete('id'));
	}
	
	
	
	/* --- CURRENCY --- */
	
	//GET 
	function currency_get() {
		$data = $this->currency->get_all();		
		$this->response($data, 200);
	}
	
	//POST
	function currency_post() {			
		$this->currency->insert($this->post());
		//$this->response($this->post(), 200);		
	}
	
	//PUT
	function currency_put() {
 		 $this->currency->update($this->put('id'), $this->put());
	}
	
	//DELETE
	function currency_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->currency->delete($this->delete('id'));
	}
	
	
	/* --- JOURNAL ENTRY --- */
	
	//GET 
	function journal_get() {
		$data = $this->journal->get_all();
		$arr = array();
		foreach($data as $row){
			$arr [] = array(
						 'account_id' 	=> $row->account_id,
						 'dr' 				=> $row->dr,	
						 'cr' 				=> $row->cr,	
						 'balance' 			=> $row->balance,				
						 'memo' 			=> $row->memo,						
						 'voucher' 	    	=> $row->voucher,
						 'number'			=> $row->number,			
						 'class-id' 		=> $row->class_id,
						 'budget_id' 		=> $row->budget_id,
						 'donor_id' 		=> $row->donor_id,
						 'location_id' 		=> $row->location_id,				
	  					 'transaction_type' => $row->transaction_type,
						 'people_id' 		=> $row->people_id,						
						 'invoice_id' 		=> $row->invoice_id,
						 'payment_id' 		=> $row->payment_id,
						 'receipt_id' 		=> $row->receipt_id,
						 'item_receipt_id' 	=> $row->item_receipt_id,
						 'account_name'		=> $this->account->get_by('id',$row->account_id),
						 'class_name'		=> $this->classes->get_by('id', $row->class_id),
						 'budget_name'		=> $this->classes->get_by('id', $row->budget_id),
						 'donor_name'		=> $this->classes->get_by('id', $row->donor_id),
						 'location_name'	=> $this->classes->get_by('id', $row->location_id),
						 'people_name'		=> $this->people->get_by('id', $row->people_id),
						 'employee_name'	=> $this->employee->get_by('id', $row->employee_id)
									
			);	
			
			
		}
						
		$this->response($arr, 200);		
		
	}
	
	//POST
	function journal_post() {
				
		$type = $this->post("transaction_type");
		
		//Find last balance of this account
		$balance = $this->journal->calculate_account_balance($this->post('account_id'),$this->post('dr'),$this->post('cr'));
		
		if(!empty($type) && isset($type)){
			 switch ($type){
				 case "General Journal":
		 				
		 				$arr = array('account_id' 		=> $this->post('account_id'),
		 					 		'dr' 				=> $this->post('dr'),	
		 					 	   	'cr' 				=> $this->post('cr'),	
		 							'balance' 			=> $balance,				
		 							'memo' 				=> $this->post('memo'),		 							
		 							'voucher' 	    	=> $this->post('voucher'),			
		 							'class_id' 		    => $this->post('class_id'),
		 							'budget_id' 		=> $this->post('budget_id'),
		 							'donor_id' 			=> $this->post('donor_id'),
		 							'location_id' 		=> $this->post('location_id'),				
		   							'transaction_type'  => $this->post('transaction_type'),
		 							'people_id' 		=> $this->post('people_id'),	
									'employee_id' 		=> $this->post('employee_id'),				
		 							'invoice_id' 		=> $this->post('invoice_id'),
		 							'payment_id' 		=> $this->post('payment_id'),
		 							'receipt_id' 		=> $this->post('receipt_id'),
		 							'item_receipt_id' 	=> $this->post('item_receipt_id'),
									'date' 				=> $this->post('date')										
									
		 				 );	
						
		 				 $this->journal->insert($arr);
						 break;
				  case "Item Adjustment":
 						 $arr = array('account_id' 		=> $this->post('account_id'),
 					 				'dr' 				=> $this->post('dr'),	
 					 	  		  	'cr' 				=> $this->post('cr'),	
 									'balance' 			=> $balance,				
 									'memo' 				=> $this->post('memo'),		 							
 									'voucher' 	    	=> $this->post('voucher'),			
 									'class_id' 		    => $this->post('class_id'),
 									'budget_id' 		=> $this->post('budget_id'),
 									'donor_id' 			=> $this->post('donor_id'),
 									'location_id' 		=> $this->post('location_id'),				
   									'transaction_type'  => $this->post('transaction_type'),
 									'people_id' 		=> $this->post('people_id'),	
									'employee_id' 		=> $this->post('employee_id'),				
 									'invoice_id' 		=> $this->post('invoice_id'),
 									'payment_id' 		=> $this->post('payment_id'),
 									'receipt_id' 		=> $this->post('receipt_id'),
 									'item_receipt_id' 	=> $this->post('item_receipt_id'),
									'date' 				=> $this->post('date')										
									
 						 );	
		 				 $this->journal->insert($arr);
						 break;
						
 				 default:
				 //$this->journal->insert($this->post());
			 }
		 }else{
			 //$this->journal->insert($this->post());
		 }
				
		//Session Flass Data Use to store receipt id
		//$this->session->set_flashdata('receipt_id', $receipt_id);
		
		//$this->response(array('id' => $this->receipt_id ), 200);				
	}
	
	//PUT
	function journal_put() {
		$arr = array('account_id' 		=> $this->put('account_id'),
					 'dr' 				=> $this->put('dr'),	
					 'cr' 				=> $this->put('cr'),	
					 'balance' 			=> $this->put('balance'),				
					 'memo' 			=> $this->put('memo'),
					 'voucher' 	    	=> $this->put('voucher'),			
					 'class_id' 	    => $this->put('class_id'),
					 'budget_id' 		=> $this->put('budget_id'),
					 'donor_id' 		=> $this->put('donor_id'),
					 'location_id' 		=> $this->put('location_id'),				
  					 'transaction_type' => $this->put('transaction_type'),
					 'people_id' 		=> $this->put('people_id'),	
					 'employee_id' 		=> $this->put('employee_id'),				
					 'invoice_id' 		=> $this->put('invoice_id'),
					 'payment_id' 		=> $this->put('payment_id'),
					 'receipt_id' 		=> $this->put('receipt_id'),
					 'item_receipt_id' 	=> $this->put('item_receipt_id'),
					 'date' 			=> $this->put('date')						  
									
		);	
		
 		$this->journal->update($this->put('id'), $arr);
		
	}
	
	//DELETE
	function journal_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->journal->delete($this->delete('id'));
	}

	//rith's
	function add_journal_post() {
		//Find last balance of this account
		$balance = $this->journal->calculate_account_balance($this->post('account_id'),$this->post('dr'),$this->post('cr'));
				
		$arr = array('account_id' 		=> $this->post('account_id'),
			 		'dr' 				=> $this->post('dr'),	
			 	   	'cr' 				=> $this->post('cr'),	
					'balance' 			=> $balance,				
					'memo' 				=> $this->post('memo'),		 							
					'voucher' 	    	=> $this->post('voucher'),			
					'class_id' 		    => $this->post('class_id'),
					'budget_id' 		=> $this->post('budget_id'),
					'donor_id' 			=> $this->post('donor_id'),
					'location_id' 		=> $this->post('location_id'),				
					'transaction_type'  => $this->post('transaction_type'),
					'people_id' 		=> $this->post('people_id'),	
					'employee_id' 		=> $this->session->userdata('user_id'),				
					'invoice_id' 		=> $this->post('invoice_id'),
					'check_no'			=> $this->post('check_no'),
					'payment_id' 		=> $this->post('payment_id'),
					'bill_id' 			=> $this->post('bill_id'),
					'date' 				=> $this->post('date')										
				
		 );	

		 $transID = $this->journal->insert($arr);
		 if($transID > 0 ) {
		 	$this->response($this->journal->get($transID), 200);
		 } else {
		 	$this->response(array("status"=>"Server Error"), 500);
		 }
	}
	

	//CREATE NEW JOURNAL BY DAWINE
	function create_journal_post(){
		$acc_id = $this->post('account_id');
		$dr = $this->post('dr');
		$cr = $this->post('cr');
		//if(!empty($acc_id) && isset($acc_id) && !empty($dr) && isset($dr) && !empty($cr) && isset($cr)){
			$data = array('account_id' 		=> $acc_id,
						 'dr' 				=> $dr,
						 'cr' 				=> $cr,						 
						 'balance'			=> $this->journal->calculate_account_balance($acc_id, $dr, $cr),
						 'memo'				=> $this->post('memo'),
						 'class_id'			=> $this->post('class_id'),						 				 
						 'transaction_type'	=> $this->post('transaction_type'),		
						 'people_id'		=> $this->post('people_id'),
						 'invoice_id'		=> $this->post('invoice_id'),
						 'receipt_id'		=> $this->post('receipt_id'),
						 'date'				=> $this->post('date')				 
			);				
			$this->journal->insert($data);			
		//}
		$this->response($data, 200);
	}
	
	
	/* --- Expense Record --- */
	
	//GET 
	function expense_record_get() {
		$item_receipt_id = $this->get('item_receipt_id');
		$arr;
		
		if ($item_receipt_id != 0){
			$data = $this->expense_record->get_expense_record_by_item_receipt_id($item_receipt_id);
		}
		else{
			$data = $this->expense_record->get_all();
		}

		foreach($data as $row){
			$arr [] = array('account_id' 	=> $row->account_id,
						 'amount' 			=> $row->amount,		
						 'memo' 			=> $row->memo,			
						 'class_id' 		=> $row->class_id,						
						 'customer_id' 		=> $row->customer_id,						
						 'item_receipt_id' 	=> $row->item_receipt_id,
						 'account_name'		=> $this->account->get_by('id',$row->account_id),
						 'classs'			=> $this->classes->get_by('id', $row->class_id),
						 'customer'			=> $this->people->get_by('id', $row->customer_id),						
									
			);	
			
			
		}
						
		$this->response($arr, 200);		
		
	}
	
	//POST
	function expense_record_post() {	
		
		$arr = array('item_receipt_id' 		=> $this->session->flashdata('receipt_id'),
					 'account_id' 			=> $this->post('account_id'),
					 'amount' 				=> $this->post('amount'),
					 'memo' 				=> $this->post('memo'),
					 'class_id' 	        => $this->post('class_id'),
					 'customer_id' 	        => $this->post('customer_id')					
					
					
		);	

		$this->expense_record->insert($arr);

		$item_receipt = $this->item_receipt->get_by('id', $this->session->flashdata('receipt_id'));

		//Find last balance of this expense account
		$expense_account_balance = $this->journal->calculate_account_balance($this->post('account_id'), $this->post('amount'), 0);
		
		$expense_journal_arr = array('account_id' 	=> $this->post('account_id'),
			 					 'dr' 				=> $this->post('amount'),	
			 	   			 	 'cr' 				=> 0,	
							 	 'balance' 			=> $expense_account_balance,				
							 	 'memo' 			=> $this->post("memo"),		 							
							 	 'voucher' 	    	=> $item_receipt->ref_no,			
							 	 'class_id' 		=> $this->post('class_id'),
							  	 'budget_id' 		=> 0,
							 	 'donor_id' 		=> 0,
							 	 'location_id' 		=> 0,				
							 	 'transaction_type' => "Expense",
							 	 'people_id' 		=> $this->post('customer_id'),	
							 	 'employee_id' 		=> 0,				
							 	 'invoice_id' 		=> 0,
							  	 'payment_id' 		=> 0,
							 	 'receipt_id' 		=> 0,
								 'item_receipt_id' 	=> $item_receipt->id,
							 	 'date' 			=> $item_receipt->bill_date										
									
		 );	
						
		 $this->journal->insert($expense_journal_arr);

		//Find last balance of this account
		$account_balance = $this->journal->calculate_account_balance($item_receipt->account_id, 0, $this->post('amount'));
		
		$journal_arr = array('account_id' 			=> $item_receipt->account_id,
			 					 'dr' 				=> 0,	
			 	   			 	 'cr' 				=> $this->post('amount'),	
							 	 'balance' 			=> $account_balance,				
							 	 'memo' 			=> $this->post("memo"),		 							
							 	 'voucher' 	    	=> $item_receipt->ref_no,			
							 	 'class_id' 		=> $this->post('class_id'),
							  	 'budget_id' 		=> 0,
							 	 'donor_id' 		=> 0,
							 	 'location_id' 		=> 0,				
							 	 'transaction_type' => "Expense",
							 	 'people_id' 		=> $this->post('customer_id'),	
							 	 'employee_id' 		=> 0,				
							 	 'invoice_id' 		=> 0,
							  	 'payment_id' 		=> 0,
							 	 'receipt_id' 		=> 0,
								 'item_receipt_id' 	=> $item_receipt->id,
							 	 'date' 			=> $item_receipt->bill_date										
									
		 );	
						
		 $this->journal->insert($journal_arr);
			
	}
	
	//PUT
	function expense_record_put() {
		
		$arr = array('item_receipt_id' 		=> $this->session->flashdata('receipt_id'),
					 'account_id' 			=> $this->post('account_id'),
					 'amount' 				=> $this->post('amount'),
					 'memo' 				=> $this->post('memo'),
					 'class_id' 	        => $this->post('class_id'),
					 'customer_id' 	        => $this->post('customer_id')					
					
					
		);	

		
 		$this->expense_record->update($this->put('id'), $arr);
		
	}
	
	//DELETE
	function expense_record_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->expense_record->delete($this->delete('id'));
	}

	/* -- Classes -- */
	
	//Get Class
	function class_dropdown_get(){
		$data = $this->classes->order_by("id")->get_all();		
		foreach($data as $row){			
			if ($row->type == "Class"){				
				$arr[] = array(
					"id" 			 => $row->id,
					'name' 			 => $row->name
				
				); 
			}						
		}								
		$this->response($arr, 200);		
	}
	
	//Get Budget
	function budget_dropdown_get(){
		$data = $this->classes->get_all();
		
		foreach($data as $row){
			
			if ($row->type == "Budget"){				
				$name = $row->name; 
				$arr[] = array(
					"id" 			 => $row->id,
					'name' 			 => $name
				
				);
			}									
					
		}						
		$this->response($arr, 200);		
	}
	
	//Get Donor
	function donor_dropdown_get(){
		$data = $this->classes->get_all();
		
		foreach($data as $row){
			
			if ($row->type == "Donor"){				
				$name = $row->name; 
				$arr[] = array(
					"id" 			 => $row->id,
					'name' 			 => $name
				
				);
			}	
											
			
			
		}						
		$this->response($arr, 200);		
	}
	
	//Get Location
	function location_dropdown_get(){
		$data = $this->classes->get_all();
		
		foreach($data as $row){
			
			if ($row->type == "Location"){				
				$name = $row->name; 
				$arr[] = array(
					"id" 			 => $row->id,
					'name' 			 => $name
				
				);
			}	
											
			
			
		}						
		$this->response($arr, 200);		
	}




	//journal section

	public function journals_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){			
			$criteria = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$criteria += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}
			// $this->response($para, 200);
			$query = $this->journal->get_many_by($criteria);
		} else {
			$query = $this->journal->get_all();
		}
		
		if(count($query) > "0") :
			foreach($query as $row) :
				$entries;
				if($row->transaction_type === "po" && $row->grn === 0) {
					$entries = $this->invoice_item->get_many_by(array("invoice_id"=>$row->id));
				} elseif($row->transaction_type === "po" && $row->grn !== 0) {
					 $entries = $this->item_records->get_many_by(array("bill_id"=>$row->grn));
				} elseif($row->transaction_type === "purchase") {
					$entries = $this->item_records->get_many_by(array("bill_id"=>$row->id));
				} elseif($row->transaction_type === "grn") {
					$entries = $this->item_records->get_many_by(array("bill_id"=>$row->id));
				} else {
					$entries = array();
				}
				$entryQuery = $this->j_entry->get_many_by(array("journal_id"=> $row->id));
				if(count($entryQuery)>0) {
					foreach($entryQuery as $entry) {
						$journalEntries[] = array(
							"account" => $this->account->get($entry->account),
							"class_id" => $entry->class_id,
							"dr" 	   => $entry->dr,
							"cr" 	   => $entry->cr,
							"balance"  => $entry->balance,
							"exchange_rate" => $entry->exchange_rate,
							"journal_id"=> $entry->journal_id,
							"memo" 	   => $entry->memo,
							"main"	   => $entry->main 
						);
					}
				} else {
					$journalEntries = array();
				}
				$journals[] = array(
					"id" 				=> $row->id,
					"entries"			=> $entries,
					"journalEntries"	=> $journalEntries,	
					"number"			=> $row->number,
					"reference" 		=> $row->reference,			
					'memo' 				=> $row->memo,
					'check_no'			=> $row->check_no,						
					'voucher' 	    	=> $row->voucher,			
					'class_id' 			=> $row->class_id,
					'budget_id' 		=> $row->budget_id,
					'donor_id' 			=> $row->donor_id,
					'location_id' 		=> $row->location_id,				
					'transaction_type' 	=> $row->transaction_type,
					'people_id' 		=> $row->people_id,
					'employee_id' 		=> $row->employee_id,						
					'invoice_id' 		=> $row->invoice_id,
					'payment_id' 		=> $row->payment_id,
					'amount_billed'		=> $row->amount_billed,
					'amount_due' 		=> $row->amount_due,
					'amount_paid' 		=> $row->amount_paid,
					'payment_method'	=> $row->payment_method,
					'date'				=> $row->date,
					'dueDate'			=> $row->due_date,
					'address' 			=> $row->address,
					'ship_to' 			=> $row->ship_to,
					'class_name'		=> $this->classes->get_by('id', $row->class_id),
					'budget_name'		=> $this->classes->get_by('id', $row->budget_id),
					'donor_name'		=> $this->classes->get_by('id', $row->donor_id),
					'location_name'		=> $this->classes->get_by('id', $row->location_id),
					'people_name'		=> $this->people->get_by('id', $row->people_id),
					'employee_name'		=> $this->employee->get_by('id', $row->employee_id),
					'grn'				=> $row->grn,
					'status' 			=> $row->status,
					'created_at'		=> $row->created_at
				);
			endforeach;
			$this->response(array("status"=>"OK", "message"=>"Data found ".count($journals), "results"=>$journals), 200);
		else :
			$this->response(array("status"=>"Error", "message"=>$this->db->_error_message(), "results"=>array()), 200);
		endif;
	}

	public function journals_post() {
		$id = $this->v4();
		$arr = array(
					'id'  				=> $id,	
					'company_id'		=> $this->post('company_id'),
					'amount_billed'		=> $this->post('amount_billed'),
					'amount_due'		=> $this->post('amount_due'),
					'amount_paid'		=> $this->post('amount_paid'),
					'memo' 				=> $this->post('memo'),
					'payment_method'	=> $this->post('payment_method'),		 							
					'voucher' 	    	=> $this->post('voucher'),			
					'class_id' 		    => $this->post('class_id'),
					'budget_id' 		=> $this->post('budget_id'),
					'donor_id' 			=> $this->post('donor_id'),
					'location_id' 		=> $this->post('location_id'),				
					'transaction_type'  => $this->post('transaction_type'),
					'people_id' 		=> $this->post('vendor_id'),	
					'employee_id' 		=> $this->post('employee_id'),				
					'invoice_id' 		=> $this->post('invoice_id'),
					'check_no'			=> $this->post('check_no') ? $this->post('check_no') : "",
					'payment_id' 		=> $this->post('payment_id') ? $this->post('payment_id') : 0,
					'number' 			=> $this->post('number') ? $this->post('number') : "",
					'date' 				=> $this->post('date'),
					'due_date'			=> $this->post('due_date'),
					'address'			=> $this->post('address') ?	$this->post('address') : "",
					'ship_to' 			=> $this->post('ship_to') ?	$this->post('ship_to') : "",
					'status'			=> $this->post('status'),
					'inJournal'			=> $this->post('inJournal')									
		);
		$this->journal->insert($arr);
		if($this->db->affected_rows() > 0) {
			$journal_Entries = $this->post("journalEntries");
			if($journal_Entries){
				foreach($journal_Entries as $k => $v) {
			 		//Find last balance of this account
					$balance = $this->j_entry->calculate_account_balance($v['account_id'],$v['dr'],$v['cr']);
			 		$entries[] = array(
			 						"id" 			=> $this->v4(),
					 				"journal_id" 	=> $arr['id'],
					 				"account" 		=> $v['account_id'],
					 				"dr"			=> $v['dr'],
					 				"cr"			=> $v['cr'],
					 				"class_id"		=> $v['class_id'],
					 				"memo"			=> $v['memo'],
					 				"balance"		=> $balance,
					 				"exchange_rate" => $v['exchange_rate'],
					 				"main"			=> $v['main']
					 			); 
				// $entries[] = array("account_id"=>$v['account_id']);		
	 			}

	 			$this->j_entry->insert_many($entries, FALSE);
			}
 			if($this->db->affected_rows()>0) {
 				$query = $this->journal->get($arr['id']);
 					if(count($query) > 0) {
 							$journals[] = array(
								"id" 				=> $query->id,
								'number' 			=> $query->number,			
								'memo' 				=> $query->memo,						
								'voucher' 	    	=> $query->voucher,			
								'class_id' 			=> $query->class_id,
								'budget_id' 		=> $query->budget_id,
								'donor_id' 			=> $query->donor_id,
								'location_id' 		=> $query->location_id,				
								'transaction_type' 	=> $query->transaction_type,
								'people_id' 		=> $query->people_id,
								'employee_id' 		=> $query->employee_id,						
								'class_name'		=> $this->classes->get_by('id', $query->class_id),
								'budget_name'		=> $this->classes->get_by('id', $query->budget_id),
								'donor_name'		=> $this->classes->get_by('id', $query->donor_id),
								'location_name'		=> $this->classes->get_by('id', $query->location_id),
								'people_name'		=> $this->people->get_by('id', $query->people_id),
								'employee_name'		=> $this->employee->get_by('id', $query->employee_id),
								"entries"			=> $this->j_entry->get_many_by("journal_id", $query->id)
							);
 					}				
				$this->response(array("status"=>"OK", "message"=>"Data found.","entry"=>$entries, "results"=>$query), 201);
			} else {
				$this->response(array("status"=>"Failed", "message"=>$this->db->_error_message(), "results"=>array()), 500);
			}
		} else {
			$this->response(array("status"=>"Failed", "message"=>$this->db->_error_message(), "results"=>array()), 400);
		}
	}

	public function journals_put() {
		$journal_Entries = $this->put("journalEntries");

		//Find last balance of this account
		//$balance = $this->j_entry->calculate_account_balance($this->post('account_id'),$this->post('dr'),$this->post('cr'));
		
		$arr = array(		
					'memo' 				=> $this->put('memo'),		 							
					'voucher' 	    	=> $this->put('voucher'),			
					'class_id' 		    => $this->put('class_id'),
					'budget_id' 		=> $this->put('budget_id'),
					'donor_id' 			=> $this->put('donor_id'),
					'location_id' 		=> $this->put('location_id'),				
					'transaction_type'  => $this->put('transaction_type'),
					'people_id' 		=> $this->put('people_id'),	
					'employee_id' 		=> $this->session->userdata('user_id'),				
					'invoice_id' 		=> $this->put('invoice_id'),
					'check_no'			=> $this->put('check_no'),
					'payment_id' 		=> $this->put('payment_id'),
					'number' 			=> $this->put('bill_id'),
					'date' 				=> $this->put('date'),
					'archived' 			=> $this->put('archived')												
		);	

		$this->journal->update($this->put('id'),$arr);
		if($this->db->affected_rows() > 0) {

		//  	foreach($journal_Entries as $k => $v) :
		//  		//Find last balance of this account
		// 		$balance = $this->j_entry->calculate_account_balance($v['account_id'],$v['dr'],$v['cr']);
		//  		$entries[] = array(
		// 		 				"journal_id" 	=> $transID,
		// 		 				"account" 		=> $v['account_id'],
		// 		 				"dr"			=> $v['dr'],
		// 		 				"cr"			=> $v['cr'],
		// 		 				"memo"			=> $v['memo'],
		// 		 				"balance"		=> $balance
		// 		 			); 
		//  		$entry_IDs[] = $this->j_entry->update($this->put('id'), $entries, FALSE);		
 	// 		endforeach;

 			

 	// 		if($entry_IDs > 0) {
 	// 			$query = $this->journal->get($this->put('id'));
 	// 				if(count($query) > 0) {
 	// 					//foreach($query as $row) {
 	// 						$journals[] = array(
		// 						"id"=> $query->id,
		// 						"journalEntries"	=> $this->j_entry->get_many_by("journal_id", $query->id),				
		// 						'memo' 				=> $query->memo,						
		// 						'voucher' 	    	=> $query->voucher,			
		// 						'class_id' 			=> $query->class_id,
		// 						'budget_id' 		=> $query->budget_id,
		// 						'donor_id' 			=> $query->donor_id,
		// 						'location_id' 		=> $query->location_id,				
		// 						'transaction_type' 	=> $query->transaction_type,
		// 						'people_id' 		=> $query->people_id,
		// 						'employee_id' 		=> $query->employee_id,						
		// 						'invoice_id' 		=> $query->invoice_id,
		// 						'payment_id' 		=> $query->payment_id,
		// 						'receipt_id' 		=> $query->receipt_id,
		// 						'item_receipt_id' 	=> $query->item_receipt_id,
		// 						'class_name'		=> $this->classes->get_by('id', $query->class_id),
		// 						'budget_name'		=> $this->classes->get_by('id', $query->budget_id),
		// 						'donor_name'		=> $this->classes->get_by('id', $query->donor_id),
		// 						'location_name'		=> $this->classes->get_by('id', $query->location_id),
		// 						'people_name'		=> $this->people->get_by('id', $query->people_id),
		// 						'employee_name'		=> $this->employee->get_by('id', $query->employee_id)
		// 					);
 	// 					//}
 	// 				} 				
				$this->response(array("status"=>"OK", "message"=>"Data found ", "results"=>$this->journal->get($this->put('id'))), 301);
			} else {
				$this->response(array("status"=>"Error", "message"=>$this->db->_error_message(), "results"=>array()), 404);
			}
		// } else {
		//  	$this->response(array("status"=>"Server Error"), 500);
		// }
	}

	public function journals_delete() {
		$id = $this->delete('id');

		//check if there are transaction
		$delete_JEntry = $this->j_entry->delete_by(array("journal_id"=>$id));

		if($delete_JEntry) {
			$journal = $this->journal->delete($id);

			if($journal) {
				$this->response(array("status"=>"ok", "message"=>"successfully deleled"), 200);
			} else{
				$this->response(array("status"=>"ok", "message"=>"cannot delete"), 500);
			}
		} else {
			$this->response(array("status"=>"error", "message"=>"cannot delete"), 400);
		}
	}
	public function v4($trim = false) {        
        $format = ($trim == false) ? '%04x%04x-%04x-%04x-%04x-%04x%04x%04x' : '%04x%04x%04x%04x%04x%04x%04x%04x';
    
        return sprintf($format,

                // 32 bits for "time_low"
                mt_rand(0, 0xffff), mt_rand(0, 0xffff),

                // 16 bits for "time_mid"
                mt_rand(0, 0xffff),

                // 16 bits for "time_hi_and_version",
                // four most significant bits holds version number 4
                mt_rand(0, 0x0fff) | 0x4000,

                // 16 bits, 8 bits for "clk_seq_hi_res",
                // 8 bits for "clk_seq_low",
                // two most significant bits holds zero and one for variant DCE1.1
                mt_rand(0, 0x3fff) | 0x8000,

                // 48 bits for "node"
                mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }
}