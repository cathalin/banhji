<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Tariff_items extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();
		$this->load->model('tariffs/Tariff_item_model', 'tariff_item');
		
		$this->load->model('tariffs/Tariff_item_model', 'tariff_item');
		$this->load->model('tariffs/Plan_item_model', 'plan_item');		
	}
	
		
	//GET 
	function tariff_item_get() {
		$filter = $this->get("filter");
		$sort = $this->get("sort");

		if(!empty($sort) && isset($sort)){
			$this->tariff_item->order_by($sort[0]['field'], $sort[0]['dir']);
		}

		if(!empty($filter) && isset($filter)){			
			$data = $this->tariff_item->get_many_by($filter['filters'][0]['field'], $filter['filters'][0]['value']);			
		}else{			
			$data = $this->tariff_item->get_all();		
		}
		
		if(count($data)>0){
			$this->response($data, 200);
		}else{
			$empty_array = Array();
			$this->response($empty_array, 200);
		}		
	}
	
	//POST
	function tariff_item_post() {	
		$this->tariff_item->insert($this->post());		
	}
	
	//PUT
	function tariff_item_put() {
 		 $this->tariff_item->update($this->put('id'), $this->put());
	}
	
	//DELETE
	function tariff_item_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->tariff_item->delete($this->delete('id'));
	}

	//GET TARIFF ITEM BY TARIFF PLAN ID
	function tariff_item_by_tariff_plan_id_get(){
		$filter = $this->get("filter");
		$readingDate = $filter['filters'][1]['value'];
		$planItemArr = $this->plan_item->order_by('start_date', 'desc')
							->get_many_by('tariff_plan_id', $filter['filters'][0]['value']);

		//Loop through plan item to get tariff id
		$tariffID = 0;
		foreach($planItemArr as $row){
			$startDate = $row->start_date;
			if($readingDate>=$startDate){
				$tariffID = $row->tariff_id;
				break;
			}
		}

		//Get tariff item list by tariff id
		if($tariffID>0){
			$data = $this->tariff_item->order_by('usage', 'desc')
						->get_many_by('tariff_id', $tariffID);
			$this->response($data, 200);
		}else{
			$this->response(FALSE, 200);
		}
	}
		
	
}//End Of Class