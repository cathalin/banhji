<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Reconcile_items extends REST_Controller {
	
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('accounting/reconcile_item_model', 'reconcile_item');
			
	}
	
	
	
	//GET 
	function reconcile_item_get() {		
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){			
			$para = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}			
			$arr = $this->reconcile_item->get_many_by($para);
		
			if(count($arr) >0){
				/*foreach($arr as $row) {					
				   	//Add extra fields
					$extra = array('items'	=> $this->item->get($row->item_id)								   	
							  );

					//Cast object to array
					$original = (array) $row;

					//Merge arrays
					$data[] = array_merge($original, $extra);	
				}*/
				$this->response($arr, 200);		
			}else{
				$this->response(FALSE, 200);
			}
		}else{
			$data = $this->reconcile_item->get_all();
			$this->response($data, 200);
		}		
	}
	
	//POST
	function reconcile_item_post() {
		$data = array('denomination' 	=> $this->post('denomination'),					
					'qty_usd' 			=> $this->post('qty_usd'),
					'qty_khr' 			=> $this->post('qty_khr'),
					'reconcile_type'	=> $this->post('reconcile_type'),
					'reconcile_id'		=> $this->post('reconcile_id')									 
		);		
		$id = $this->reconcile_item->insert($data);		
		$this->response($id, 200);						
	}
	
	//PUT
	function reconcile_item_put() {
		$data = array('denomination' 	=> $this->put('denomination'),					
					'qty_usd' 			=> $this->put('qty_usd'),
					'qty_khr' 			=> $this->put('qty_khr'),
					'reconcile_type'	=> $this->put('reconcile_type'),
					'reconcile_id'		=> $this->post('reconcile_id')										 
		);	
		$this->reconcile_item->update($this->put('id'), $data);
	}
	
	//DELETE
	function reconcile_item_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->reconcile_item->delete($this->delete('id'));
	}

}//End Of Class