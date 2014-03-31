<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Payments extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('accounting/payment_model', 'payment');
		$this->load->model('accounting/invoice_model', 'invoice');
		$this->load->model('accounting/invoice_item_model', 'invoice_item');
		$this->load->model("people/people_model", "people");
		$this->load->model('inventory/meter_model', 'meter');
		$this->load->model('inventory/meter_record_model', 'meter_record');
		$this->load->model('inventory/electricity_box_model', 'electricity_box');		
	}
	
	//GET 
	function payment_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){			
			$para = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}			
			$arr = $this->payment->get_many_by($para);
		
			if(count($arr) >0){
				foreach($arr as $row) {										
					//Add extra fields
					$extra = array('customers' 			=> $this->people->get($row->customer_id),									
									'invoices'			=> $this->invoice->get($row->invoice_id)								   	
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
	}
	
	//POST
	function payment_post() {
		$data = array('invoice_id' 		=> $this->post('invoice_id'),					
					'amount_paid' 		=> $this->post('amount_paid'),
					'rate' 				=> $this->post('rate'),
					'discount' 			=> $this->post('discount'),
					'fine' 				=> $this->post('fine'),
					'sub_code'			=> $this->post('sub_code'),
					'payment_date' 		=> $this->post('payment_date'),
					'payment_method_id'	=> $this->post('payment_method_id'),
					'check_no' 			=> $this->post('check_no'),
					'cash_account_id' 	=> $this->post('cash_account_id'),
					'payment_note' 		=> $this->post('payment_note'),
					'cashier' 			=> $this->post('cashier'),
					'customer_id' 		=> $this->post('customer_id'),
					'class_id'			=> $this->post('class_id')					 
		);

		//Update invoice's status
		$status = $this->post('status');		
		if(!empty($status) && isset($status)){
		  	if($status>0){
				$invoice_id = $this->post('invoice_id');			  		
				$this->invoice->update($invoice_id, array('status'=>1));				 
		  }
		}
		
		$id = $this->payment->insert($data);		
		$this->response($id, 200);					
	}
	
	//PUT
	function payment_put() {			
 		$result = $this->payment->update($this->put('id'), $this->put());
 		$this->response($result, 200);
	}
	
	//DELETE
	function payment_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->payment->delete($this->delete('id'));
	}

	//GET PAYMENT FOR CASHIER 
	function payment_for_cashier_get() {
		$cashier = $this->get("cashier");
		$payment_date = $this->get("payment_date");

		$data = array('total_customer'	=> $this->payment->count_customer($cashier, $payment_date),					
					'total_payment' 		=> $this->payment->sum_payment($cashier, $payment_date)									 
		);
		$this->response($data, 200);
	}

	//POST BATCH	
	function payment_batch_post() {
		$post = $this->post();

		//Remove model
		foreach($post as $key => $value) {			
			$data[] = $value;									
		}
				
		$ids = $this->payment->insert_many($data);		 
		$this->response($ids, 200);			
	}

	//PAYMENT FOR EDIT
	function payment_for_edit_get(){
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){			
			$para = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}			
			$data = $this->payment->get_many_by($para);
			$this->response($data, 200);
		}
	}
	
}//End Of Class