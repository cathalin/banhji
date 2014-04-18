<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Plan_items extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('tariffs/Plan_item_model', 'plan_item');
		$this->load->model('tariffs/Tariff_model', 'tariff');		
	}
	
		
	//GET 
	function plan_item_get() {
		$filter = $this->get("filter");
		$sort = $this->get("sort");			
		if(!empty($filter) && isset($filter)){
			$this->plan_item->order_by($sort[0]['field'], $sort[0]['dir']);
			$arr = $this->plan_item->get_many_by($filter['filters'][0]['field'], $filter['filters'][0]['value']);
			foreach($arr as $row){
				$data[] = array(
					"id" 				=> $row->id,
					'tariff_plan_id' 	=> $row->tariff_plan_id,
					'tariff_id' 		=> $row->tariff_id,
					'start_date' 		=> $row->start_date,					
					'tariffs'			=> $this->tariff->get_by('id',$row->tariff_id)					
				);
			}			
		}else{
			$data = $this->plan_item->get_all();	
		}
		if(count($data)>0){
			$this->response($data, 200);
		}else{
			$this->response(FALSE, 200);
		}		
	}
	
	//POST
	function plan_item_post() {
		$data = array('tariff_plan_id' 		=> $this->post('tariff_plan_id'),
					 	'tariff_id' 	    => $this->post('tariff_id'),
					 	'start_date' 	    => $this->post('start_date')					
		);	
		$this->plan_item->insert($data);		
	}
	
	//PUT
	function plan_item_put() {
		$data = array('id' 					=> $this->put('id'),
					 	'tariff_plan_id' 	=> $this->put('tariff_plan_id'),
					 	'tariff_id' 	    => $this->put('tariff_id'),
					 	'start_date' 	    => $this->put('start_date')					
		);
 		$this->plan_item->update($this->put('id'), $data); 		
	}
	
	//DELETE
	function plan_item_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->plan_item->delete($this->delete('id'));
	}
		
	
}//End Of Class