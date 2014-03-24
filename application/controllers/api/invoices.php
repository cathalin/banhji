<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Invoices extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('accounting/invoice_model', 'invoice');
		$this->load->model('accounting/invoice_item_model', 'invoice_item');
		$this->load->model('accounting/payment_model', 'payment');

		$this->load->model("people/people_model", "people");
		$this->load->model('people/people_type_model', 'people_type');

		$this->load->model('inventory/meter_model', 'meter');
		$this->load->model('inventory/meter_record_model', 'meter_record');
		$this->load->model('inventory/average_record_model', 'average_record');

		$this->load->model('transformer_m', 'transformer');
		$this->load->model('company_m', 'company');
		$this->load->model('inventory/electricity_box_model', 'electricity_box');

		$this->load->model('inventory/item_model', 'item');
		$this->load->model('inventory/item_record_model', 'item_record');			
	}

				
	//GET 
	function invoice_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){			
			$para = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}			
			$arr = $this->invoice->get_many_by($para);
			$data = Array();
			if(count($arr) >0){
				foreach($arr as $row) {																			   
				   	$totalPaid	 = $this->payment->get_total_payment($row->id);
				   	$total  	 = $row->amount - $totalPaid;

				   	//Add extra fields
					$extra = array(	'total_paid' 		=> $totalPaid,   
								   	'total' 			=> $total,
								   	'pay_amount'		=> $total,
								   	'invoice_items'     => $this->invoice_item->get_many_by('invoice_id', $row->id)
							  );

					//Cast object to array
					$original = (array) $row;

					//Merge arrays
					$data[] = array_merge($original, $extra);	
				}						
			}
			$this->response($data, 200);			
		}else{
			$data = $this->invoice->get_all();
			$this->response($data, 200);
		}		
	}
	
	//POST
	function invoice_post() {
		$data = array('number' 			=> $this->post('number'),
				   	'type'				=> $this->post('type'),				   	
				   	'amount'			=> $this->post('amount'),
				   	'rate'				=> $this->post('rate'),
				   	'vat'				=> $this->post('vat'),
				   	'vat_id'			=> $this->post('vat_id'),				   	
				   	'status' 			=> $this->post('status'),
				   	'sub_code' 			=> $this->post('sub_code'),				   	
				   	'issued_date' 		=> $this->post('issued_date'),
				   	'payment_date' 		=> $this->post('payment_date'),
				   	'due_date' 			=> $this->post('due_date'),
				   	'expected_date'		=> $this->post('expected_date'),
				   	'month_of'			=> $this->post('month_of'),
				   	'date_read_from' 	=> $this->post('date_read_from'),
				   	'date_read_to' 		=> $this->post('date_read_to'),
				   	'box_no' 			=> $this->post('box_no'),
				   	'address' 			=> $this->post('address'),
				   	'ship_to'			=> $this->post('ship_to'),
				   	'biller' 			=> $this->post('biller'),
				   	'customer_id' 		=> $this->post('customer_id'),				   	
				   	'vendor_id' 		=> $this->post('vendor_id'),				   	
				   	'po_id' 			=> $this->post('po_id'),
				   	'so_id' 			=> $this->post('so_id'),
				   	'estimate_id' 		=> $this->post('estimate_id'),
				   	'gdn_id' 			=> $this->post('gdn_id'),				   	
				   	'batch_no' 			=> $this->post('batch_no'),
				   	'check_no' 			=> $this->post('check_no'),
				   	'payment_method_id'	=> $this->post('payment_method_id'),
				   	'payment_term_id'	=> $this->post('payment_term_id'),
				   	'cash_account_id'	=> $this->post('cash_account_id'),				   	
				   	'class_id' 			=> $this->post('class_id'),
				   	'transformer_id' 	=> $this->post('transformer_id'),				   	
				   	'memo' 				=> $this->post('memo'),
				   	'memo2' 			=> $this->post('memo2'),
				   	'company_id' 		=> $this->post('company_id')					
		);				  
		$id = $this->invoice->insert($data);

		//Add invoice items
		$invItem = $this->post("invoice_items");
		$type = $this->post('type');
		$itemRec = array();
		foreach($invItem as $key => $value) {			
				$items[] = $value;			
		}		
		for ($i=0; $i< count($items); $i++) { 
			$items[$i]['invoice_id'] = $id;
			
			//Add witdraw item
			if(!empty($items[$i]['item_id']) && isset($items[$i]['item_id'])){
				$item_id = $items[$i]['item_id'];
				$item_type_id = $this->item->item_type($item_id);
				if($item_type_id!=3 && $item_type_id!=0){
					if($type=="Invoice" || $type=="Receipt"){					

						$itemRec[] = array(
							"invoice_id"	=> $id, 
							"item_id"		=> $item_id, 
							"description"	=> $items[$i]['description'], 
							"quantity"		=> ($items[$i]['quantity']*-1),						
							"price"			=> $items[$i]['unit_price'],
							"amount"		=> $items[$i]['quantity']*($items[$i]['unit_price']*$items[$i]['rate']),						
							"balance" 		=> ($this->item_record->last_balance_of($items[$i]["item_id"]) - $items[$i]["quantity"])
						);
					}
				}
			}			
		}
		$itemIds = $this->invoice_item->insert_many($items);

		//Witdraw item		
		$itemRecIds = array();
		if(count($itemRec)){
			$itemRecIds = $this->item_record->insert_many($itemRec);
		}		

		//Average record items for notice
		$avgRecord = $this->post("average_records");
		$avgIds = array();
		if(!empty($avgRecord) && isset($avgRecord)){
			foreach($avgRecord as $k => $v) {			
				$avgItems[] = $v;			
			}
			for ($j=0; $j< count($avgItems); $j++) { 
				$avgItems[$j]['notice_id'] = $id;
			}
			$avgIds = $this->average_record->insert_many($avgItems);
		}

		$this->response(array("invoice_id"=>$id, "item_ids"=>$itemIds, "avgIds"=>$avgIds, "itemRecIds"=>$itemRecIds), 200);			
	}
	
	//PUT
	function invoice_put(){
		$data = array('number' 			=> $this->put('number'),
				   	'type'				=> $this->put('type'),				   	
				   	'amount'			=> $this->put('amount'),
				   	'rate'				=> $this->put('rate'),
				   	'vat'				=> $this->put('vat'),
				   	'vat_id'			=> $this->put('vat_id'),				   					   	
				   	'status' 			=> $this->put('status'),				   	
				   	'issued_date' 		=> $this->put('issued_date'),
				   	'payment_date' 		=> $this->put('payment_date'),
				   	'due_date' 			=> $this->put('due_date'),
				   	'expected_date'		=> $this->put('expected_date'),
				   	'month_of'			=> $this->put('month_of'),
				   	'date_read_from' 	=> $this->put('date_read_from'),
				   	'date_read_to' 		=> $this->put('date_read_to'),
				   	'box_no' 			=> $this->put('box_no'),
				   	'address' 			=> $this->put('address'),
				   	'ship_to'			=> $this->put('ship_to'),
				   	'biller' 			=> $this->put('biller'),
				   	'customer_id' 		=> $this->put('customer_id'),				   	
				   	'vendor_id' 		=> $this->put('vendor_id'),				   	
				   	'po_id' 			=> $this->put('po_id'),
				   	'so_id' 			=> $this->put('so_id'),
				   	'estimate_id' 		=> $this->put('estimate_id'),
				   	'gdn_id' 			=> $this->put('gdn_id'),				   	
				   	'batch_no' 			=> $this->put('batch_no'),
				   	'check_no' 			=> $this->put('check_no'),
				   	'payment_method_id'	=> $this->put('payment_method_id'),
				   	'payment_term_id'	=> $this->put('payment_term_id'),
				   	'cash_account_id'	=> $this->put('cash_account_id'),				   	
				   	'class_id' 			=> $this->put('class_id'),
				   	'transformer_id' 	=> $this->put('transformer_id'),				   	
				   	'memo' 				=> $this->put('memo'),
				   	'memo2' 			=> $this->put('memo2'),
				   	'company_id' 		=> $this->put('company_id')					
		);	

 		$result = $this->invoice->update($this->put('id'), $data);
		$this->response($result, 200);
	}
	
	//DELETE
	function invoice_delete(){		
		$result = $this->invoice->delete($this->delete('id'));
		$this->response($result, 200);
	}

	//POST BATCH	
	function invoice_batch_post() {
		$post = $this->post();

		//Remove model
		foreach($post as $key => $value) {			
			$data[] = $value;									
		}
				
		$ids = $this->invoice->insert_many($data);		 
		$this->response($ids, 201);			
	}

	//POST MANY
	function invoice_many_post(){
		$post = json_decode($this->post("data"));
	  	foreach ($post as $key => $value) {
	  		$data[] = $value;	  				 				  	
	  	}
	  	$result = $this->invoice->insert_many($data);
		$this->response($result, 200);		
	}

	//UPDATE BATCH
	function invoice_batch_put(){
		$ids = json_decode($this->put("ids"));
	  	foreach ($ids as $row) {
	  		$result = $this->invoice->update($row->id, array("status"=>$row->status));	  				 				  	
	  	}	  	
		$this->response($result, 200);		
	}

	//INACTIVE INVOICE
	function invoice_inactive_put(){
		$id = $this->put("id");
	  	
	  	$result = $this->invoice->update($id, array('status'=>2));
		$this->response($result, 200);		
	}

	//CHANGE TO STATUS 3 (NOTICE INACTIVE)
	function status3_put(){
		$ids = json_decode($this->put("ids"));
	  	foreach ($ids as $key => $value) {
	  		$data[] = $value;	  				 				  	
	  	}
	  	$result = $this->invoice->update_many($data, array('status'=>3));
		$this->response($result, 200);		
	}

	//GET NEXT INVOICE ID 
	function invoice_next_id_get(){
		$type = $this->get('type');
		$id = $this->invoice->get_next_id();
		$last_no = $this->invoice->last_number($type);

		$this->response(array('id'=>$id, 'last_no'=>$last_no), 200);				
	}

	//GET INVOICE FOR CUSTOMER 
	function invoice_for_customer_get(){
		$invoice_id = $this->get('invoice_id');
		if(!empty($invoice_id) && isset($invoice_id)){
			$data = $this->invoice->get_invoice_for_customer($invoice_id)->get_all();
			$this->response($data, 200);
		}else{
			$empty_data = Array();
		  	$this->response($empty_data, 200);
		}		
	}

	//GET TOTAL DEBT AND TOTAL PAYMENT
	function total_debt_payment_get(){
		$customer_id = $this->get("customer_id");
		$invoice_id = $this->get("invoice_id");
		$issued_date = $this->get("issued_date");
		if(!empty($customer_id) && isset($customer_id) && !empty($invoice_id) && isset($invoice_id)){
			$tdebt		= $this->invoice_item->get_total_amount_by($customer_id, $issued_date);
			$tpayment 	= $this->payment->get_total_payment_by_customer_id($customer_id, 0, $issued_date);					
			$tamt 		= $this->invoice_item->get_total_amount($invoice_id);

			$tremain	= $tdebt - $tpayment;
			$tdue 		= $tremain + $tamt;

			$data[] = array(
					"tdebt" 	=> $tdebt,
					"tpayment" 	=> $tpayment,					
					"tamt" 		=> $tamt,
					"tremain"	=> $tremain,
					"tdue"		=> $tdue								
			);			
			$this->response($data, 200);
		}else{
			$empty_data = Array();
		  	$this->response($empty_data, 200);
		}		
	}

	//GET INVOICE FOR PAYMENT
	function invoice_payment_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){
			$para = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}			
			$arr = $this->invoice->where_in('type', array('Invoice', 'eInvoice', 'Notice'))
								->where_in('status', array(0,2))
								->get_many_by($para);							
			if(count($arr) >0){
				foreach($arr as $row) {
					$totalAmount = $row->amount;										   
				   	$totalPaid	 = $this->payment->get_total_payment($row->id);
				   	$total  	 = $totalAmount - $totalPaid;

					$extra = array(	'total_paid' 		=> $totalPaid,   
								   	'total' 			=> $total,
								   	'people'			=> $this->people->get($row->customer_id)								   								   	
							  	);

					//Cast object to array
					$original = (array) $row;

					//Merge arrays
					$data[] = array_merge($original, $extra);	
				}
				$this->response($data, 200);		
			}else{
		  		$this->response(Array(), 200);
			}
		}else{
			$data = $this->invoice->get_all();
			$this->response($data, 200);
		}		
	}

	/* --- STATEMENT --- */	
	function statement_get(){
		$filter = $this->get("filter");
		$para = array();				
		for ($i = 0; $i < count($filter['filters']); ++$i) {				
			$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
		}				
		$customer_id = $para["customer_id"];
		$start_date = $para["start_date"];
		$end_date = $para["end_date"];				
		
		$statement = array();
		$typeList = array("Invoice", "eInvoice", "Notice");
		
		//Balance forward
		$bfList = $this->invoice->where_in("type", $typeList)
								->where_in("status", array(0,2))
								->get_many_by(array("customer_id"=>$customer_id,
													"issued_date <="=>$start_date));
		if(count($bfList)>0){
			$bfInv = 0;
			$bfInvIds = array();									
			foreach ($bfList as $row) {
				$bfInv += $row->amount;
				
				if(intval($row->status)===2){
					array_push($bfInvIds, $row->id);
				}				
			}
			
			$bfPaid = 0;
			if(count($bfInvIds)>0){
				$bfPaidList = $this->payment->where_in("invoice_id", $bfInvIds)->get_all();							
				foreach ($bfPaidList as $row) {
					$bfPaid += $row->amount_paid;
				}				
			}						

			$balanceForward = $bfInv - $bfPaid;
			
			$statement[] = array(
				'id' 			=> 0,
			   	'issued_date'	=> $start_date,
			   	'description' 	=> 'សមតុល្យពីមុន',						   
			   	'amount' 		=> $balanceForward,			   	
			   	'balance'     	=> $balanceForward	 				  
		  	);			
		}				
						
	  	//Add invoice list to statement[]		
	  	$invList = $this->invoice->where_in("type", $typeList)	  							
			  					->get_many_by(array("customer_id"=>$customer_id,
			  										"status <"=>3,			  												  										
			  										"issued_date >="=>$start_date, 
			  										"issued_date <="=>$end_date));		  		  
												   
	  	if(count($invList)>0){
	  		$invIds = array();	  			
			foreach($invList as $row) {
				array_push($invIds, $row->id);

				$statement[] = array(
					'id' 			=> $row->id,
				   	'issued_date'	=> $row->issued_date,
				   	'description' 	=> $row->number,						   
				   	'amount' 		=> $row->amount,
				   	'balance'		=> 0	 				  
				);			  
			}

			$paidList = $this->payment->where_in("invoice_id", $invIds)->get_all();
			if(count($paidList)>0){
				foreach($paidList as $row) {
					$statement[] = array(
						'id' 			=> 0,
					   	'issued_date'	=> $row->payment_date,
					   	'description' 	=> "បង់ប្រាក់",						   
					   	'amount' 		=> $row->amount_paid*-1,
					   	'balance'		=> 0	 				  
					);
				}
			}
	  	}	
	  	
	  	if(count($statement)>0){
	  		//Sort array by date
			function sortFunction($a, $b) {			
				return strtotime($a["issued_date"]) - strtotime($b["issued_date"]);
			}
			usort($statement, "sortFunction");

			//Calculate balance
			$balance = 0;					
			foreach ($statement as $key => $value) {
				$balance += $statement[$key]["amount"];				
				$statement[$key]["balance"] = $balance; 
			}				
	  	}	  				  
	  		  
		$this->response($statement, 200);
	}	
	
	/* --- STATEMENT COLLECTION --- */	
	function statement_collection_get(){
		$filter = $this->get("filter");
		$limit 	= $this->get('pageSize');
		$offset = $this->get('skip');
				
		$customer_id = 0;
		$start_date = "";
		$end_date = "";				
		for ($i = 0; $i < count($filter['filters']); ++$i) {
			if($filter['filters'][$i]['field']==="customer_id"){
				$customer_id = $filter['filters'][$i]['value'];
			}
			if($filter['filters'][$i]['field']==="start_date"){
				$start_date = $filter['filters'][$i]['value'];
			}
			if($filter['filters'][$i]['field']==="end_date"){
				$end_date = $filter['filters'][$i]['value'];
			}
		}
						
		$statement = array();
		$balance = 0;

		if(!empty($limit) && isset($limit)){
	 		$this->invoice->limit($limit, $offset);
	 	}

	  	//Add invoice list to statement[]
	  	if($start_date!=="" && $end_date!==""){
	  		$invList = $this->invoice->get_many_by(array("customer_id"=>$customer_id, 
	  												"status <"=>4,
	  												"issued_date >="=>$start_date, 
			  										"issued_date <="=>$end_date));
		}else{
			$invList = $this->invoice->get_many_by(array("customer_id"=>$customer_id, 
	  													"status <"=>4));
		}		  			  		
	  														   
	  	if(count($invList)>0){		
			foreach($invList as $row) {
				$typeName = '';
				
				switch ($row->type){
				case 'eInvoice':
				  	$typeName = 'វិក្កយបត្រអគ្គីសនី';				  	
				  	break;									
				case 'Receipt':
				  	$typeName = 'បង្កាន់ដៃលក់ជាសាច់ប្រាក់';					  	
				  	break;
				case 'Estimate':
				  	$typeName = 'សម្រង់តម្លៃ';				  	
				  	break;
				case 'GDN':
				  	$typeName = 'លិខិតដឹកជញ្ជូន';				  	
				  	break;
				case 'SO':
				  	$typeName = 'បញ្ជាលក់';				  	
				  	break;		
				case 'Notice':
				  	$typeName = 'លិខិតរំលឹក';				  	
				  	break;
				default:
				  	$typeName = 'វិក្កយបត្រ';				  	
				}

				$statement[] = array(
					'id'			=> $row->id,
					'type'			=> $row->type,
				    'typeName'		=> $typeName,
					'number' 		=> $row->number,						   
					'issued_date' 	=> $row->issued_date,
					'due_date' 		=> $row->due_date,
					'amount'     	=> $row->amount,
					'rate' 			=> $row->rate,
					'sub_code'		=> $row->sub_code,
					'status'		=> $row->status
				);			  
			} 
	  	}
	  
	  	//Add payment list to statement[]		  	
	  	$paymentList = $this->payment->get_many_by(array("customer_id"=>$customer_id,	  												
	  												"payment_date >="=>$start_date, 
			  										"payment_date <="=>$end_date));
	  	if(count($paymentList)>0){
		  	foreach($paymentList as $row) {				  								
			  	$statement[] = array(
			  	   'id'				=> $row->id,
			  	   'type'			=> "Payment",
				   'typeName'		=> "បង់ប្រាក់",
				   'number' 		=> $row->check_no,						   
				   'issued_date' 	=> $row->payment_date,
				   'due_date' 		=> "",
				   'amount'     	=> $row->amount_paid,
				   'status' 		=> -1	 				  
			  	);	
		  	} 			
	  	}		  
	  				  
	  	//Sort array
	  	if(count($statement)>0){				
			function sortFunction($a, $b){			
				return strtotime($a["issued_date"]) - strtotime($b["issued_date"]);
			}
			usort($statement, "sortFunction");			
	  	}
	  
	  	if(count($statement)){
	  		$this->response($statement, 200);
	  	}else{	  		
	  		$this->response(Array(), 200);
	  	}		
	}
	
	/* --- AGING --- */	
	function aging_get(){
		$filter = $this->get("filter");	
		$para = array();				
		for ($i = 0; $i < count($filter['filters']); ++$i) {				
			$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
		}				
		$customer_id = $para["customer_id"];
		$start_date = $para["start_date"];
		$end_date = $para["end_date"];	
		
	  	$aging[] = array(
	  		'current'	=> 0,
			'within30' 	=> 0,
			'within60' 	=> 0,
			'within90' 	=> 0,
			'over90'   	=> 0
		);

		$typeList = array("Invoice", "eInvoice", "Notice");
	  				  			
		$invList = $this->invoice->where_in("type", $typeList)
								->where_in("status", array(0,2))
								->get_many_by(array("customer_id"=>$customer_id,													
													"issued_date >="=>$start_date,
													"issued_date <="=>$end_date));												 
		if(count($invList)>0){			  		
		  	//Current date		  			  	
		  	$today = new DateTime();

		  	foreach($invList as $row) {			  
				//Compare dates
				$due_date = new DateTime($row->due_date);
				$day = 0;					
				if($due_date < $today){		  
				  	$dDiff = $due_date->diff($today);				  	
				  	$day = $dDiff->days;
				}
				
				//Calculate total amount
				$pay = 0;	
				if(intval($row->status)===2){
					$pay = $this->payment->get_total_payment($row->id);
				}			  	
			  	$total = floatval($row->amount) - $pay;									
						
				//Add total to aging[]
				if($day < 1){						
					$aging[0]['current'] += $total;
				}else if(($day > 0) && ($day <= 30)){						
					$aging[0]['within30'] += $total;
				}else if(($day > 30) && ($day <= 60)){						
					$aging[0]['within60'] += $total;
				}else if(($day > 60) && ($day <= 90)){						
					$aging[0]['within90'] += $total;
				}else{						
					$aging[0]['over90'] += $total;
				}
			}		  			  			  
		}		  	  
			
		$this->response($aging, 200);				
	}

	/* --- AGING BATCH --- */	
	function aging_batch_get(){		
		$limit 	= $this->get('pageSize');
		$offset = $this->get('skip');
		$filter = $this->get("filter");		
			
		$para = array();				
		for ($i = 0; $i < count($filter['filters']); ++$i) {				
			$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
		}
		
		$issued_date = $para["issued_date"];
		
		$cusPara = array("status"=>1);
		if(!empty($para["company_id"]) && isset($para["company_id"])){
			$cusPara += array("company_id"=>$para["company_id"]);
		}			

		$data = array();
		$data["people"] = Array();		
		$today = new DateTime();
		
		$cusList = $this->people->type(1)->limit($limit, $offset)->get_many_by($cusPara);
		if(count($cusList)>0){
			foreach ($cusList as $cus) {			
				$invList = $this->invoice->where_in('type', array('Invoice', 'eInvoice', 'Notice'))
										->get_many_by(array('customer_id'=>$cus->id,
															'status'=>0,
															'issued_date <='=>$issued_date
													));
				if(count($invList)>0){
					$current = 0;
					$within30 = 0;
					$within60 = 0;
					$within90 = 0;
					$over90 = 0;
					$t=0;

			  		foreach($invList as $row) {			  
						//Compare dates
						$due_date = new DateTime($row->due_date);
						$day = 0;					
						if($due_date < $today){		  
						  	$dDiff = $due_date->diff($today);				  	
						  	$day = $dDiff->days;
						}
						
						//Calculate total amount	
						$amt = $this->invoice_item->get_total_amount($row->id);
					  	$pay = $this->payment->get_total_payment($row->id);
					  	$total = ($amt - $pay);
					  	$t += $total;
								
						//Add total to age[]
						if($day < 1){						
							$current += $total;
						}else if(($day > 0) && ($day <= 30)){						
							$within30 += $total;
						}else if(($day > 30) && ($day <= 60)){						
							$within60 += $total;
						}else if(($day > 60) && ($day <= 90)){						
							$within90 += $total;
						}else{						
							$over90 += $total;
						}						
					}

					if($t>0){
						$data["people"][] = array(
							'number' => $cus->number,						
					  		'fullname'  	=> $cus->surname.' '.$cus->name,
					  		'current'		=> $current,
							'within30' 		=> $within30,
							'within60' 		=> $within60,
							'within90' 		=> $within90,
							'over90'   		=> $over90
						);
					}					  			  			  
				}
			}			
		}

		$countPara = array("invoices.status"=>0, "invoices.issued_date <="=>$issued_date);
		if(!empty($para["class_id"]) && isset($para["class_id"])){
			$countPara += array("people.class_id"=>$para["class_id"]);
		}
		$data["total"] = $this->invoice->join_people()
										->where_in('type', array('Invoice', 'eInvoice', 'Notice'))
										->count_by($countPara);
		$this->response($data, 200);				
	}

	/* --- DISCONNECT LIST --- */	
	function disconnect_list_get(){		
		$filter = $this->get("filter");			
		$para = array();				
		for ($i = 0; $i < count($filter['filters']); ++$i) {				
			$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
		}
		
		$over_due_day = $para["over_due_day"];
		$company_id = $para['company_id'];
									
		$invoiceList = $this->invoice->join_people()->get_many_by(array('people.company_id'=>$company_id,
																		'invoices.type'=>'eInvoice',
																		'invoices.status'=>0
																	));
		$data = array();				
		$today = new DateTime();
		if(count($invoiceList)>0){
			foreach ($invoiceList as $row) {			  	  
				//Compare dates
				$due_date = new DateTime($row->due_date);												  
			  	$dDiff = $due_date->diff($today);				  	
			  	$day = $dDiff->days;

			  	if($day>=$over_due_day){
			  		$totalAmount = $this->invoice_item->sum('amount')->get_many_by('invoice_id',$row->id);
					$totalPaid = $this->payment->sum('amount_paid')->get_many_by('invoice_id',$row->id);				  	
				   	$total = floatval($totalAmount[0]->amount) - floatval($totalPaid[0]->amount_paid);						
					
					//Add extra fields
					$extra = array( 
									'total_amount'		=> floatval($totalAmount[0]->amount),
								   	'total_paid' 		=> floatval($totalPaid[0]->amount_paid),   
								   	'total' 			=> $total,
								   	'over_due_day'		=> $day					   	
							  );

					//Cast object to array
					$original = (array) $row;

					//Merge arrays
					$data[] = array_merge($original, $extra);
				}				
			}			
		}		
		$this->response($data, 200);				
	}

	//Electricity sale
	function electricity_sale_get(){
		$filter = $this->get("filter");			
		$para = array();				
		for ($i = 0; $i < count($filter['filters']); ++$i) {				
			$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
		}

		$start_date = $para["start_date"];
		$end_date = $para["end_date"];
		$company_id = $para["company_id"];
				
		$transformerList = array();
		if($company_id>0){
			$transformerList = $this->transformer->get_many_by('company_id',$company_id);
		}		
		
		$data = array();
		if(count($transformerList)>0){
			foreach ($transformerList as $row){
				$transformer = "";			
				$activeCustomer = 0;
				$inactiveCustomer = 0;
				$total_consumption = 0;
				$minimum_usage = 0;
				$total_amount = 0;				
				$total_debt = 0;
				$total_discount = 0;
				$total_fine = 0;
				$total_paid = 0;

				$transformer = $row->transformer_number;
				$activeCustomer = $this->people->count_by(array('status'=>1, 'transformer_id'=>$row->id));
				$inactiveCustomer = $this->people->count_by(array('status !='=>1, 'transformer_id'=>$row->id));
				
				//Meter record
				$readingList = $this->meter_record->join_meter()											
											->get_many_by(array('meter_records.month_of >='=>$start_date,
																'meter_records.month_of <='=>$end_date,
																'meters.transformer_id'=>$row->id
															));
				if(count($readingList)>0){
					foreach ($readingList as $r){
						$usage = intval($r->new_reading) + intval($r->new_round) - intval($r->prev_reading);
						
						$total_consumption += $usage;

						if($minimum_usage==0){
							$minimum_usage = $usage;
						}else if($usage<$minimum_usage){
							$minimum_usage = $usage;
						}
					}
				}

				//Invoice item				
				$invoiceItemList = $this->invoice_item->join_people_invoice()																										
													->get_many_by(array('invoices.issued_date >='=>$start_date,
																		'invoices.issued_date <='=>$end_date,
																		'invoices.type'=>'eInvoice',																																	
																		'people.transformer_id'=>$row->id
																));				
				if(count($invoiceItemList)>0){
					foreach ($invoiceItemList as $item){
						$total_amount += $item->amount;						
					}
				}	
				
				//Debt
				$debtList = $this->invoice->join_people()													
											->get_many_by(array('invoices.issued_date <'=>$start_date,													
													'invoices.type'=>'eInvoice',
													'invoices.status'=>0,															
													'people.transformer_id'=>$row->id
												));
				if(count($debtList)>0){
					$debt = 0;
					$paid = 0;
					foreach ($debtList as $d){
						$debtAmt = $this->invoice_item->sum('amount')->get_many_by('invoice_id',$d->id);
						$paidAmt = $this->payment->sum('amount_paid')->get_many_by(array('invoice_id'=>$d->id, 
																						'payment_date <'=>$start_date
																				));
						$debt += floatval($debtAmt[0]->amount);
						$paid += floatval($paidAmt[0]->amount_paid);
					}
					$total_debt = $debt - $paid;
				}

				//Payment
				$paymentList = $this->payment->join_people_invoice()													
											->get_many_by(array('payments.payment_date >='=>$start_date,
													'payments.payment_date <='=>$end_date,
													'invoices.type'=>'eInvoice',																												
													'people.transformer_id'=>$row->id
												));
				if(count($paymentList)>0){
					foreach ($paymentList as $p){
						$total_discount += $p->discount;
						$total_fine += $p->fine;
						$total_paid += $p->amount_paid;
					}
				}
				
				$total = ($total_amount + $total_debt + $total_fine) - ($total_discount + $total_paid);

				$data[] = array(
					'transformer' 		=> $transformer,				
					'activeCustomer' 	=> $activeCustomer,
					'inactiveCustomer' 	=> $inactiveCustomer,
					'total_consumption' => $total_consumption,
					'minimum_usage' 	=> $minimum_usage,
					'total_amount' 		=> $total_amount,					
					'total_debt' 		=> $total_debt,
					'total_discount' 	=> $total_discount,
					'total_fine' 		=> $total_fine,
					'total_paid' 		=> $total_paid,
					'total' 			=> $total					
				);				
			}
		}
		$this->response($data, 200);
	}

	//MONTHLY SALE
	function monthly_sale_get(){
		$filter = $this->get("filter");			
		$para = array();				
		for ($i = 0; $i < count($filter['filters']); ++$i) {				
			$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
		}		
		$typeList = array("Receipt", "Invoice", "eInvoice", "Notice");

		$data = $this->invoice->where_in("type", $typeList)->order_by("issued_date", "asc")->get_many_by($para);		
		
		$this->response($data, 200);		
	}

	//OUTSTANDING INVOICE
	function outstanding_invoice_get(){
		$filter = $this->get("filter");			
		$para = array();				
		for ($i = 0; $i < count($filter['filters']); ++$i) {				
			$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
		}		
		$typeList = array("Invoice", "eInvoice", "Notice", "Estimate", "SO");

		$data = $this->invoice->where_in("type", $typeList)
							->where_in("status", array(0,2))
							->get_many_by($para);		
		
		$this->response($data, 200);		
	}

	//CUSTOMER DASHBOARD
	function customer_dashboard_get(){
		$company_id = $this->get("company_id");			
		
		$active_customer = $this->people->count_by(array('status'=>1, 'company_id'=>$company_id));
		$unpaid_customer = $this->invoice->join_people()
										->where_in('invoices.type', array('Invoice', 'eInvoice'))
										->count_distinct()										
										->get_many_by(array('invoices.status'=>0, 'people.company_id'=>$company_id));
		
		$total_debt = $this->invoice_item->join_people_invoice()
									->where_in('invoices.type', array('Invoice', 'eInvoice'))
									->sum('invoice_items.amount')													
									->get_many_by(array('invoices.status'=>0, 'people.company_id'=>$company_id));
			
		$data = array(
			'active_customer' 	=> $active_customer,
			'unpaid_customer' 	=> intval($unpaid_customer[0]->counter),
			'total_debt' => floatval($total_debt[0]->amount)																																				
		);
			
						
		$this->response($data, 200);
	}

	//INVOICE INFO
	function invoice_info_get(){
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){			
			$para = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}			
			$arr = $this->invoice->get_by($para);

			//Add extra fields
			$extra = array('total_amount'	=> $this->invoice_item->get_total_amount($arr->id),
							'customers'		=> $this->people->get($arr->customer_id)						   	
					  );

			//Cast object to array
			$original = (array) $arr;

			//Merge arrays
			$data[] = array_merge($original, $extra);
			$this->response($data, 200);
		}
	}

	//PRINT BATCH
	function print_batch_get(){
		$filter = $this->get("filter");			
		$para = array();				
		for ($i = 0; $i < count($filter['filters']); ++$i) {				
			$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
		}			
		$arr = $this->invoice->where_in('type', array('Invoice', 'eInvoice', 'Notice'))
							->get_many_by($para);
		
		$data = Array();
		if(count($arr) >0){
			foreach($arr as $row) {
				$amt = $this->invoice_item->get_total_amount($row->id);										   
			   	$paid = $this->payment->get_total_payment($row->id);
			   	$total = $amt - $paid;

			   	$prevInv = $this->invoice->where_in('type', array('Invoice', 'eInvoice', 'Notice'))
		   								->get_many_by(array("customer_id"=>$row->customer_id, 
		   													"issued_date <"=>$row->issued_date,
		   													"status"=>0,
		   												));
			   	$tdebt = 0;
			   	$tpayment = 0;							
				if(count($prevInv)>0){
					foreach ($prevInv as $inv) {						
						$tdebt += $this->invoice_item->get_total_amount($inv->id);
						$tpayment += $this->payment->get_total_payment($inv->id);
					}
				}

				$tremain	= $tdebt - $tpayment;
				$tdue 		= $tremain + $amt;
				
			   	//Add extra fields
				$extra = array('amount'			=> $amt,
							   	'paid' 			=> $paid,   
							   	'total' 		=> $total,
							   	
							   	'tdebt' 		=> $tdebt,
								'tpayment' 		=> $tpayment,								
								'tremain'		=> $tremain,
								'tdue'			=> $tdue,
								
								'invoice_items' => $this->invoice_item->left_join_meter()->get_many_by("invoice_items.invoice_id", $row->id),
								'companys'		=> $this->company->get($row->company_id),
								'transformers'	=> $this->transformer->get($row->transformer_id),
								'customers'		=> $this->people->get($row->customer_id)								
						  );

				//Cast object to array
				$original = (array) $row;

				//Merge arrays
				$data[] = array_merge($original, $extra);											
			}									
		}			
		$this->response($data, 200);				
	}

	//LAST ID NUMBER
	function last_idNumber_get(){
		$type = $this->get("type");	
		$id = $this->invoice->get_next_id();
		$no = $this->invoice->last_number($type);
		$this->response(array("next_id"=>$id, "last_no"=>$no), 200);
	}

	//LAST NUMBER
	function last_number_get(){		
		$type = $this->get("type");		
		$no = $this->invoice->last_number($type);
		$this->response($no, 200);
	}

	//Salse Order Fulfillment
	function so_fulfillment_get(){
		$filter = $this->get("filter");	
		$para = array();				
		for ($i = 0; $i < count($filter['filters']); ++$i) {				
			$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
		}			
		$arr = $this->invoice->get_many_by($para);		
		$data = Array();
		if(count($arr) >0){
			foreach($arr as $row){
				//SO qty
				$soQty = $this->invoice_item->sum("quantity")->get_many_by("invoice_id",$row->id);
				$sqty = 0;
				if(count($soQty)>0){
					$sqty = $soQty[0]->quantity;
				}

				//GDN from SO
				$gdn = $this->invoice->get_by(array("type"=>"GDN","so_id"=>$row->id));
				
				//Invoice qty
				$invQty = $this->invoice_item->join_invoice()->sum("invoice_items.quantity")->get_many_by(array("type"=>"Invoice", "invoice_items.so_id"=>$row->id));
				$iqty = 0;
				if(count($invQty)>0){
					$iqty = $invQty[0]->quantity;
				}

				$remain = intval($sqty) - intval($iqty);				

			   	//Add extra fields
				$extra = array('qty'		=> intval($sqty),
							   	'remain' 	=> intval($remain),							   	
							   	'gdn'		=> $gdn,							   							   	
							   	'people'    => $this->people->get($row->customer_id)
						  );

				//Cast object to array
				$original = (array) $row;

				//Merge arrays
				$data[] = array_merge($original, $extra);	
			}
			$this->response($data, 200);						
		}else{
			$this->response(array(), 200);
		}		
	}

	//Order List
	function order_list_get(){
		$filter = $this->get("filter");	
		$para = array();				
		for ($i = 0; $i < count($filter['filters']); ++$i) {				
			$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
		}			
		$arr = $this->invoice->get_many_by($para);		
		if(count($arr) >0){			
			foreach($arr as $row){
				$invItem = $this->invoice_item->get_many_by("invoice_id", $row->id);

				foreach ($invItem as $v) {
					$data[] = array(
							"item_id" 	=> $v->item_id,
							"item" 		=> $this->item->get($v->item_id),
							"qty"		=> $v->quantity
					);	
				}							
			}
			$this->response($data, 200);						
		}else{
			$this->response(array(), 200);
		}		
	}

	
}//End Of Class