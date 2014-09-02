<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Journals extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();
		$this->load->model('accounting/account_model', 'account');
		$this->load->model('accounting/journal_model', 'journal');
		$this->load->model('accounting/journal_entry_model', 'j_entry');
		$this->load->model('inventory/item_model', 'item');
		$this->load->library('session');
	}
	
	function index_get() {
		$filter = $this->get("filter");	
		if(!empty($filter) && isset($filter)){			
			$criteria = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$criteria += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}
			// $this->response($para, 200);
			$query = $this->journal->get_many_by($criteria);

			if(count($query) > "0") :
				foreach($query as $row) :					
					$journals[] = array(
						"id" 				=> $row->id,	
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
						'payment_term_id'	=> $row->payment_term_id,
						'payment_id' 		=> $row->payment_id,
						'amount_billed'		=> $row->amount_billed,
						'amount_due' 		=> $row->amount_due,
						'amount_paid' 		=> $row->amount_paid,
						'payment_method'	=> $row->payment_method,
						'date'				=> $row->date,
						'due_date'			=> $row->due_date,
						'address' 			=> $row->address,
						'ship_to' 			=> $row->ship_to,
						'journalEntries' 	=> $this->get_entries($row->id),
						'budget_name'		=> $row->budget_id,
						'donor_name'		=> $row->donor_id,
						'location_name'		=> $row->location_id,
						'people_name'		=> $row->people_id,
						'employee_name'		=> $row->employee_id,
						'grn'				=> $row->grn,
						"vat_id"			=> $row->vat_id,
						'status' 			=> $row->status,
						'created_at'		=> $row->created_at
					);
				endforeach;
				$this->response(array("status"=>"OK", "message"=>"Data found ".count($journals), "results"=>$journals), 200);
			else :
				$this->response(array("status"=>"Error", "message"=>$this->db->_error_message(), "results"=>array()), 200);
			endif;
		} else {
			$this->response(array("status"=>"Error", "message"=>"Please provide Query.", "results"=>array()), 200);
		}
	}

	function index_post() {}

	function index_put() {}

	function index_delete(){}

	function get_entries($journal_id) {
		$query = $this->j_entry->get_many_by(array('journal_id'=>$journal_id));
		if(count($query) > 0) {
			$results = array();
			foreach($query as $row) {
				$results[] = array(
					'account' => $this->account->get_by("id", $row->account),
					'memo' => $row->memo,
					'dr' => $row->dr,
					'cr' => $row->cr,
				); 
			}
			return $results;
		} else {
			return array();
		}
	}

	public function journals_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){			
			$criteria = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$criteria += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}
			// $this->response($para, 200);
			$query = $this->journal->get_many_by($criteria);

			if(count($query) > "0") :
				foreach($query as $row) :					
					$journals[] = array(
						"id" 				=> $row->id,
						"company_id"		=> $row->company_id,	
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
						'payment_term_id'	=> $row->payment_term_id,
						'payment_id' 		=> $row->payment_id,
						'amount_billed'		=> $row->amount_billed,
						'amount_due' 		=> $row->amount_due,
						'amount_paid' 		=> $row->amount_paid,
						'payment_method'	=> $row->payment_method,
						'date'				=> $row->date,
						'due_date'			=> $row->due_date,
						'address' 			=> $row->address,
						'ship_to' 			=> $row->ship_to,
						'class_name'		=> $this->classes->get_by('id', $row->class_id),
						'budget_name'		=> $this->classes->get_by('id', $row->budget_id),
						'donor_name'		=> $this->classes->get_by('id', $row->donor_id),
						'location_name'		=> $this->classes->get_by('id', $row->location_id),
						'people_name'		=> $this->people->get_by('id', $row->people_id),
						'employee_name'		=> $this->employee->get_by('id', $row->employee_id),
						'grn'				=> $row->grn,
						"vat_id"			=> $this->item->get($row->vat_id),
						'status' 			=> $row->status,
						'created_at'		=> $row->created_at
					);
				endforeach;
				$this->response(array("status"=>"OK", "message"=>"Data found ".count($journals), "results"=>$journals), 200);
			else :
				$this->response(array("status"=>"Error", "message"=>$this->db->_error_message(), "results"=>array()), 200);
			endif;
		} else {
			$this->response(array("status"=>"Error", "message"=>"Please provide Query.", "results"=>array()), 200);
		}		
	}

	public function journals_post() {
		$arr = array(
					'company_id'		=> $this->post('company_id'),
					'amount_billed'		=> $this->post('amount_billed'),
					'amount_due'		=> $this->post('amount_due'),
					'amount_paid'		=> $this->post('amount_paid'),
					'memo' 				=> $this->post('memo'),
					'payment_method'	=> $this->post('payment_method'),
					'reference' 		=> $this->post('reference'),		 							
					'voucher' 	    	=> $this->post('voucher'),			
					'class_id' 		    => $this->post('class_id'),
					'budget_id' 		=> $this->post('budget_id'),
					'donor_id' 			=> $this->post('donor_id'),
					'location_id' 		=> $this->post('location_id'),				
					'transaction_type'  => $this->post('transaction_type'),
					'people_id' 		=> $this->post('people_id'),	
					'employee_id' 		=> $this->post('employee_id'),
					'check_no'			=> $this->post('check_no') ? $this->post('check_no') : "",
					'payment_id' 		=> $this->post('payment_id') ? $this->post('payment_id') : 0,
					'number' 			=> $this->post('number') ? $this->post('number') : "",
					'date' 				=> date('Y-m-d', strtotime($this->post('date'))),
					'due_date'			=> date('Y-m-d', strtotime($this->post('due_date'))),
					'status'			=> $this->post('status'),
					'vat_id'			=> is_array($this->post('vat_id')) ? $this->post('vat_id')['id'] : $this->post('vat_id'),
					'inJournal'			=> $this->post('inJournal')									
		);
		$id = $this->journal->insert($arr);
		if($this->db->affected_rows()>0) {
			$query = $this->journal->get($id);
			if(count($query) > 0) {
					$journals[] = array(
					"id" 				=> $query->id,
					"company_id"		=> $query->company_id,	
					"number"			=> $query->number,
					"reference" 		=> $query->reference,			
					'memo' 				=> $query->memo,
					'check_no'			=> $query->check_no,						
					'voucher' 	    	=> $query->voucher,			
					'class_id' 			=> $query->class_id,
					'budget_id' 		=> $query->budget_id,
					'donor_id' 			=> $query->donor_id,
					'location_id' 		=> $query->location_id,				
					'transaction_type' 	=> $query->transaction_type,
					'people_id' 		=> $query->people_id,
					'employee_id' 		=> $query->employee_id,						
					'invoice_id' 		=> $query->invoice_id,
					'payment_term_id'	=> $query->payment_term_id,
					'payment_id' 		=> $query->payment_id,
					'amount_billed'		=> $query->amount_billed,
					'amount_due' 		=> $query->amount_due,
					'amount_paid' 		=> $query->amount_paid,
					'payment_method'	=> $query->payment_method,
					'date'				=> $query->date,
					'due_date'			=> $query->due_date,
					'reference'			=> $query->reference,
					'address' 			=> $query->address,
					'ship_to' 			=> $query->ship_to,
					'class_name'		=> $this->classes->get_by('id', $query->class_id),
					'budget_name'		=> $this->classes->get_by('id', $query->budget_id),
					'donor_name'		=> $this->classes->get_by('id', $query->donor_id),
					'location_name'		=> $this->classes->get_by('id', $query->location_id),
					'people_name'		=> $this->people->get_by('id', $query->people_id),
					'employee_name'		=> $this->employee->get_by('id', $query->employee_id),
					'grn'				=> $query->grn,
					"vat_id"			=> $this->item->get($query->vat_id),
					'status' 			=> $query->status,
					'created_at'		=> $query->created_at
				);
			}				
			$this->response(array("status"=>"OK", "message"=>"Data found.", "type" => "create", "results"=>$query), 201);
		} else {
			$this->response(array("status"=>"Failed", "message"=>$this->db->_error_message(), "results"=>array()), 500);
		}
	}

	public function journals_put() {
		$arr = array(
			'company_id'		=> $this->put('company_id'),
			'amount_billed'		=> $this->put('amount_billed'),
			'amount_due'		=> $this->put('amount_due'),
			'amount_paid'		=> $this->put('amount_paid'),
			'memo' 				=> $this->put('memo'),
			'payment_method'	=> $this->put('payment_method'),
			'reference'			=> $this->put('reference'),		 							
			'voucher' 	    	=> $this->put('voucher'),			
			'class_id' 		    => $this->put('class_id'),
			'budget_id' 		=> $this->put('budget_id'),
			'donor_id' 			=> $this->put('donor_id'),
			'location_id' 		=> $this->put('location_id'),				
			'transaction_type'  => $this->put('transaction_type'),
			'people_id' 		=> $this->put('people_id'),	
			'employee_id' 		=> $this->put('employee_id'),				
			'invoice_id' 		=> $this->put('invoice_id'),
			'check_no'			=> $this->put('check_no') ? $this->put('check_no') : "",
			'payment_id' 		=> $this->put('payment_id') ? $this->put('payment_id') : 0,
			'number' 			=> $this->put('number') ? $this->put('number') : "",
			'date' 				=> date('Y-m-d', strtotime($this->put('date'))),
			'due_date'			=> date('Y-m-d', strtotime($this->put('due_date'))),
			'address'			=> $this->put('address') ?	$this->put('address') : "",
			'ship_to' 			=> $this->put('ship_to') ?	$this->put('ship_to') : "",
			'vat_id'			=> is_array($this->put('vat_id')) ? $this->put('vat_id')['id'] : $this->put('vat_id'),
			'status'			=> $this->put('status')								
		);
		$this->journal->update($this->put('id'), $arr);

			if($this->db->affected_rows()>0) {
 				$query = $this->journal->get($this->put('id'));
				if(count($query) > 0) {
					$journals[] = array(
						"id" 				=> $query->id,
						"company_id"		=> $query->company_id,	
						"number"			=> $query->number,
						"reference" 		=> $query->reference,			
						'memo' 				=> $query->memo,
						'check_no'			=> $query->check_no,						
						'voucher' 	    	=> $query->voucher,			
						'class_id' 			=> $query->class_id,
						'budget_id' 		=> $query->budget_id,
						'donor_id' 			=> $query->donor_id,
						'location_id' 		=> $query->location_id,				
						'transaction_type' 	=> $query->transaction_type,
						'people_id' 		=> $query->people_id,
						'employee_id' 		=> $query->employee_id,						
						'invoice_id' 		=> $query->invoice_id,
						'payment_term_id'	=> $query->payment_term_id,
						'payment_id' 		=> $query->payment_id,
						'amount_billed'		=> $query->amount_billed,
						'amount_due' 		=> $query->amount_due,
						'amount_paid' 		=> $query->amount_paid,
						'payment_method'	=> $query->payment_method,
						'date'				=> $query->date,
						'due_date'			=> $query->due_date,
						'address' 			=> $query->address,
						'reference'			=> $query->reference,
						'ship_to' 			=> $query->ship_to,
						'class_name'		=> $this->classes->get_by('id', $query->class_id),
						'budget_name'		=> $this->classes->get_by('id', $query->budget_id),
						'donor_name'		=> $this->classes->get_by('id', $query->donor_id),
						'location_name'		=> $this->classes->get_by('id', $query->location_id),
						'people_name'		=> $this->people->get_by('id', $query->people_id),
						'employee_name'		=> $this->employee->get_by('id', $query->employee_id),
						'grn'				=> $query->grn,
						'status' 			=> $query->status,
						"vat_id"			=> $this->item->get($query->vat_id),
						'created_at'		=> $query->created_at
					);
				}				
				$this->response(array("status"=>"OK", "message"=>"Data found.", "type" =>"update", "results"=>$journals), 201);
			} else {
				$this->response(array("status"=>"Failed", "message"=>$this->db->_error_message(), "results"=>array()), 400);
			}
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
	// ***********************************
	// param @$filter
	// ***********************************
	public function journalEntries_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){			
			$criteria = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$criteria += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}
			// $this->response($para, 200);
			$query = $this->j_entry->get_many_by($criteria);
			if(count($query) > "0") {
				foreach($query as $q) {
					$results[] = array(
						"id" => $q->id,
						"journal_id" => $q->journal_id,
						"account" => $q->account,
						"dr" => $q->dr,
						"cr" => $q->cr,
						"class_id" => $q->class_id,
						"memo" => $q->memo,
						"exchange_rate" => $q->exchange_rate,
						"main" => $q->main,
						"taxed" => $q->taxed === "1" ? true:false,
						"created_at" => $q->created_at,
						"updated_at" => $q->updated_at
					);
				}
				$this->response(array("status"=>"OK", "message"=>"Purchase Order created.", "results"=>$results), 201);
			} else {
				$this->response(array("status"=>"Error", "message"=>$this->db->_error_message(), "results"=>array()), 200);
			}
		} else {
			$this->response(array("status"=>"Error", "message"=> "Please provide query parameter.", "results"=>array()), 200);
		}
	}

	public function journalEntries_post() {
		$postedData = json_decode($this->post("models"));
		$ids = array();		
		$this->db->trans_start();
		foreach($postedData as $key=>$value) {
			$balance = $this->journal->calculate_account_balance($value->account,$value->dr, $value->cr);
			$data[] = array(
				"journal_id" 	=> $value->journal_id,
 				"account" 		=> $value->account,
 				"dr"			=> $value->dr,
 				"cr"			=> $value->cr,
 				"class_id"		=> $value->class_id,
 				"memo"			=> $value->memo,
 				"taxed"			=> $value->taxed === true ? 1 : 0,
 				"balance"		=> $balance,
 				"exchange_rate" => $value->exchange_rate,
 				"main"			=> $value->main
			);
		}
		$ids = $this->j_entry->insert_many($data, FALSE);

		$this->db->trans_complete();
		if($this->db->trans_status() !== FALSE) {
			$query = $this->j_entry->get_many($ids);
			if(count($query) > 0) {
				foreach($query as $q) {
					$results[] = array(
						"id" => $q->id,
						"journal_id" => $q->journal_id,
						"account" => $q->account,
						"dr" => $q->dr,
						"cr" => $q->cr,
						"class_id" => $q->class_id,
						"memo" => $q->memo,
						"exchange_rate" => $q->exchange_rate,
						"main" => $q->main,
						"taxed" => $q->taxed === "1" ? true:false,
						"created_at" => $q->created_at,
						"updated_at" => $q->updated_at
					);
				}
				$this->response(array("status"=>"OK", "message"=>"Purchase Order created.", "results"=>$results), 201);
			}
			
		} else {
			$this->response(array("status"=>"Failed", "message"=>"cannot create Purchase Order.", "results"=>array()), 200);
		}

		// $journal_Entries = json_decode($this->post("models"));
		
		// foreach($journal_Entries as $k => $v) {
	 		//Find last balance of this account
			// $balance = $this->j_entry->calculate_account_balance($v['account_id'],$v['dr'],$v['cr']);
	 		// $entries[] = array(
			 // 			"journal_id" 	=> $v->journal_id
			 				// "account" 		=> $v->account_id,
			 				// "dr"			=> $v->dr,
			 				// "cr"			=> $v->cr,
			 				// "class_id"		=> $v->class_id,
			 				// "memo"			=> $v->memo,
			 				// // "balance"		=> $balance,
			 				// "exchange_rate" => $v->exchange_rate,
			 				// "main"			=> $v->main
			 			// );
		// 	$entries[] = $v;
		// }
		// $this->response(array("status"=>"OK", "message"=>"No results found.", "results"=>$entries), 201);
		// $ids = $this->j_entry->insert_many($entries, FALSE);

		// $query = $this->j_entry->get_many($ids);
		// if(count($query) > 0) {
		// 	$this->response(array("status"=>"OK", "results"=>$query), 200);
		// } else {
		// 	$this->response(array("status"=>"Error", "message"=>"No results found.", "results"=>array()), 200);
		// }
		
	}

	public function journalEntries_put() {
		$journal_Entries = json_decode($this->put("models"));
		$ids = array();
		if($journal_Entries){
			foreach($journal_Entries as $k => $v) {
		 		//Find last balance of this account
				$balance = $this->j_entry->calculate_account_balance($v->account,$v->dr,$v->cr);
				$ids[] = $v->id;
		 		$entries = array(
				 				"account" 		=> $v->account,
				 				"dr"			=> $v->dr,
				 				"cr"			=> $v->cr,
				 				"class_id"		=> $v->class_id,
				 				"memo"			=> $v->memo,
				 				"balance"		=> $balance,
				 				"taxed"			=> $v->taxed === true ? 1 : 0,
				 				"exchange_rate" => $v->exchange_rate,
				 				"main"			=> $v->main
				 			);
		 		$this->j_entry->update($v->id, $entries);
 			}			

 			$query = $this->j_entry->get_many($ids);
 			if(count($query) > 0) {
 				foreach($query as $q) {
					$results[] = array(
						"id" => $q->id,
						"journal_id" => $q->journal_id,
						"account" => $q->account,
						"dr" => $q->dr,
						"cr" => $q->cr,
						"class_id" => $q->class_id,
						"memo" => $q->memo,
						"exchange_rate" => $q->exchange_rate,
						"main" => $q->main,
						"taxed" => $q->taxed === "1" ? true:false,
						"created_at" => $q->created_at,
						"updated_at" => $q->updated_at
					);
				}
				$this->response(array("status"=>"OK", "message"=>"Purchase Order created.", "results"=>$results), 201);
 			} else {
 				$this->response(array("status"=>"Error", "message"=>"No results found.", "results"=>array()), 200);
 			}
		} else {
			$this->response(array("status"=>"Error", "message"=>"No results found.", "results"=>array()), 200);
		}
	}

	public function journalEntries_delete() {
		$ids = json_decode($this->delete('models'));
		$this->db->trans_start();
		foreach($ids as $key=>$value) {
			$this->j_entry->delete($value->id);
		}	
		$this->db->trans_complete();

		if($this->db->trans_status() !== FALSE) {
			$this->response(array("status"=>"OK", "message"=>"Purchase Order deleted.", "results"=>array()), 200);
		} else {
			$this->response(array("status"=>"Failed", "message"=>"Cannot delete Purchase Order.", "results"=>array()), 200);
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

    private function getNumber($company_id) {
		$number = "";

		$_lastPO = $this->journal->order_by("id", "DESC")->limit(1)->get_many_by(array('company_id'=>$company_id));
		if(count($_lastPO) > 0) {
			$number .= substr($_lastPO[0]->number, 2);
			$four = date('ym');
			if(substr($number, 0, 4) === $four) {
				$pre = substr($number,4) + 1;
				$var = "";

				for($i = 2; $i >= strlen($pre); $i--) {
					$var .= "0";
				}
				$var .= $pre;
				$four .= $var;
				return $four;
			} else {
				return $four."001";
			}
		} else {
			$four = date('ym');

			return $four."001";
		}	
	}
}