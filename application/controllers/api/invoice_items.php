<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Invoice_items extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('accounting/invoice_item_model', 'invoice_item');

		$this->load->model('inventory/item_model', 'item');
		$this->load->model('inventory/meter_model', 'meter');		
	}
	
	
	//GET 
	function invoice_item_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){			
			$para = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}			
			$arr = $this->invoice_item->get_many_by($para);
		 			 	
			if(count($arr) >0){
				foreach($arr as $row) {
					$vat = $row->vat;
					if($vat==="true"){
						$row->vat = true;
					}else{
						$row->vat = false;
					}	

				   	//Add extra fields
					$extra = array( "items" 	=> $this->item->get($row->item_id),
									"meters"	=> $this->meter->get($row->meter_id)
							  );

					//Cast object to array
					$original = (array) $row;

					//Merge arrays
					$data[] = array_merge($original, $extra);	
				}
				$this->response($data, 200);		
			}else{
				$this->response(FALSE, 200);
			}
		}else{
		 	$data = $this->invoice_item->get_all();
		 	$this->response($data, 200);
		}		
	}
	
	//POST
	function invoice_item_post() {
		$post = json_decode($this->post('models'));
							  
		$data = $this->invoice_item->insert_many($post);

		// $data = array('invoice_id' 		=> $this->post('invoice_id'),
		// 		   	'item_id'			=> $this->post('item_id'),				   	
		// 		   	'description'		=> $this->post('description'),
		// 		   	'multiplier'		=> $this->post('multiplier'),
		// 		   	'quantity'			=> $this->post('quantity'),
		// 		   	'unit_price'		=> $this->post('unit_price'),				   	
		// 		   	'amount'			=> $this->post('amount'),
		// 		   	'rate' 				=> $this->post('rate'),				   	
		// 		   	'vat' 				=> $this->post('vat'),
		// 		   	'markup' 			=> $this->post('markup'),
		// 		   	'sub_code'			=> $this->post('sub_code'),
		// 		   	'expected_date' 	=> $this->post('expected_date'),
		// 		   	'so_id'				=> $this->post('so_id'),
		// 		   	'meter_record_id'	=> $this->post('meter_record_id'),
		// 		   	'meter_id' 			=> $this->post('meter_id'),
		// 		   	'prev_reading' 		=> $this->post('prev_reading'),
		// 		   	'new_reading' 		=> $this->post('new_reading'),
		// 		   	'month_of' 			=> $this->post('month_of'),
		// 		   	'days'				=> $this->post('days'),
		// 		   	'usage_per_day' 	=> $this->post('usage_per_day'),
		// 		   	'amount_paid' 		=> $this->post('amount_paid'),				   	
		// 		   	'maintenance_id' 	=> $this->post('maintenance_id'),				   	
		// 		   	'exemption_id' 		=> $this->post('exemption_id')				   				
		// );				
		// $id = $this->invoice_item->insert($data);		
		$this->response($data, 201);				
	}
	
	//PUT
	function invoice_item_put() {		
 		$put = json_decode($this->put('models'));		

		$data = $this->invoice_item->update_many($put);
 		$this->response($result, 200);		
	}
	
	//DELETE
	function invoice_item_delete() {		
		$result = $this->invoice_item->delete($this->delete('id'));
		$this->response($result, 200);
	}

	//DELETE BY
	function invoice_item_by_delete(){		
		$result = $this->invoice_item->delete_by('invoice_id',$this->delete('id'));
		$this->response($result, 200);
	}

	//POST BATCH	
	function invoice_item_batch_post() {
		$post = json_decode($this->post('models'));

		foreach ($post as $key => $value) {
			$arr = $value;
		}
							  
		$data = $this->invoice_item->insert_many($arr);		 
		$this->response($data, 201);			
	}

	//POST MANY	
	function invoice_item_many_post() {
		$post = json_decode($this->post("data"));
		foreach($post as $key => $value) {			
				$data[] = $value;			
		}				  
		$ids = $this->invoice_item->insert_many($data);		 
		$this->response($ids, 201);			
	}	

	//DELETE BY INVOICE ID
	function invoice_item_by_invoice_id_delete() {		
		$result = $this->invoice_item->delete_by('invoice_id', $this->delete('id'));
		$this->response($result, 200);
	}

	//GET TOTAL AMOUNT INVOICE ITEM
	function total_amount_invoice_item_get(){
		$invoice_id = $this->get("invoice_id");
		if(!empty($invoice_id) && isset($invoice_id)){
			$data = $this->invoice_item->get_total_amount($invoice_id);
			$this->response($data, 200);
		}else{
			$this->response(FALSE, 200);
		}		
	}

	//GET INVOICE ITEM BY METER ID AND MONTH OF
	function by_meter_id_month_of_get(){
		$meterId = $this->get("meter_id");
		$monthOf = $this->get("month_of");

		$data = $this->invoice_item->by_meter_id_month_of($meterId, $monthOf);
		$this->response($data, 200);
	}

	
}//End Of Class