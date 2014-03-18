<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Breakers extends REST_Controller {
	
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('inventory/breaker_model', 'breaker');
		$this->load->model('inventory/item_model', 'item');		
	}
	
	
	
	//GET 
	function breaker_get() {		
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){			
			$para = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}			
			$arr = $this->breaker->get_many_by($para);
		
			if(count($arr) >0){
				foreach($arr as $row) {					
				   	//Add extra fields
					$extra = array('items'	=> $this->item->get($row->item_id)								   	
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
			$data = $this->breaker->get_all();
			$this->response($data, 200);
		}		
	}
	
	//POST
	function breaker_post() {
		$data = array('name' 			=> $this->post('name'),
					'status' 			=> $this->post('status'),
					'customer_id' 		=> $this->post('customer_id'),
					'item_id' 			=> $this->post('item_id'),					 
					'date_used' 		=> $this->post('date_used')					 
		);		
		$id = $this->breaker->insert($data);		
		$this->response($id, 200);						
	}
	
	//PUT
	function breaker_put() {
		$data = array('name' 			=> $this->put('name'),
					'status' 			=> $this->put('status'),
					'customer_id' 		=> $this->put('customer_id'),
					'item_id' 			=> $this->put('item_id'),					 
					'date_used' 		=> $this->put('date_used')
		);	
		$this->breaker->update($this->put('id'), $data);
	}
	
	//DELETE
	function breaker_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->breaker->delete($this->delete('id'));
	}


}//End Of Class