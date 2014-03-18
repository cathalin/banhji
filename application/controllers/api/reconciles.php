<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Reconciles extends REST_Controller {
	
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('accounting/reconcile_model', 'reconcile');
		$this->load->model('accounting/reconcile_item_model', 'reconcile_item');	
	}	
	
	
	//GET 
	function reconcile_get() {		
		$filter = $this->get("filter");
		$limit 	= $this->get('pageSize');
		$offset = $this->get('skip');		
		if(!empty($filter) && isset($filter)){			
			$para = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}
			
			$arr = $this->reconcile->limit($limit, $offset)->order_by('id', 'desc')->get_many_by($para);
		
			if(count($arr) >0){
				foreach($arr as $row) {					
				   	//Add extra fields
					$extra = array('reconcile_items' => $this->reconcile_item->get_many_by('reconcile_id', $row->id));

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
			$data = $this->reconcile->get_all();
			$this->response($data, 200);
		}		
	}
	
	//POST
	function reconcile_post() {
		$data = array('cashier' 			=> $this->post('cashier'),					 
					'reconciled_date' 		=> $this->post('reconciled_date'),					
					'rate'					=> $this->post('rate'),
					'reconcile_amount'		=> $this->post('reconcile_amount'),
					'transfer_amount'		=> $this->post('transfer_amount'),
					'transfer_account_id'	=> $this->post('transfer_account_id')					 
		);		
		$id = $this->reconcile->insert($data);

		//Add reconcile items
		$post = $this->post("reconcileItems");
		foreach($post as $key => $value) {			
				$items[] = $value;			
		}
		for ($i=0; $i< count($items); $i++) { 
			$items[$i]['reconcile_id'] = $id;
		}
		$itemIds = $this->reconcile_item->insert_many($items);

		$this->response(array("reconcile_id"=>$id, "item_ids"=>$itemIds), 200);						
	}
	
	//PUT
	function reconcile_put() {
		$data = array('cashier' 			=> $this->put('cashier'),					 
					'reconciled_date' 		=> $this->put('reconciled_date'),					
					'rate'					=> $this->put('rate'),
					'reconcile_amount'		=> $this->put('reconcile_amount'),
					'transfer_amount'		=> $this->put('transfer_amount'),
					'transfer_account_id'	=> $this->put('transfer_account_id')					 
		);	
		$this->reconcile->update($this->put('id'), $data);
	}
	
	//DELETE
	function reconcile_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->reconcile->delete($this->delete('id'));
	}


}//End Of Class