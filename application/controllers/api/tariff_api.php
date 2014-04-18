<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Tariff_api extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();
		$this->load->model('tariffs/Tariff_model', 'tariff');
		$this->load->model('tariffs/Tariff_item_model', 'tariff_item');
		$this->load->model('tariffs/Tariff_plan_model', 'tariff_plan');
		$this->load->model('tariffs/Plan_item_model', 'plan_item');
		$this->load->model('tariffs/Exemption_model', 'exemption');
		$this->load->model('tariffs/Maintenance_model', 'maintenance');		
	}
	
	
	
	/* --- TARIFF --- */
	
	//GET 
	function tariff_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){
			$data = $this->tariff->get_by($filter['filters'][0]['field'], $filter['filters'][0]['value']);			
		}else{
			$data = $this->tariff->get_all();		
		}
		$this->response($data, 200);
	}
	
	//POST
	function tariff_post() {	
		$this->tariff->insert($this->post());		
	}
	
	//PUT
	function tariff_put() {
 		 $this->tariff->update($this->put('id'), $this->put());
	}
	
	//DELETE
	function tariff_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->tariff->delete($this->delete('id'));
	}
	
	
	
	/* --- TARIFF ITEM --- */
	
	//GET 
	function tariff_item_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){
			$data = $this->tariff_item->get_many_by($filter['filters'][0]['field'], $filter['filters'][0]['value']);			
		}else{
			$data = $this->tariff_item->get_all();		
		}
		$this->response($data, 200);
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


	/* --- TARIFF PLAN --- */
	
	//GET 
	function tariff_plan_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){
			$data = $this->tariff_plan->get_by($filter['filters'][0]['field'], $filter['filters'][0]['value']);			
		}else{
			$data = $this->tariff_plan->get_all();	
		}				
		$this->response($data, 200);
	}
	
	//POST
	function tariff_plan_post() {	
		$this->tariff_plan->insert($this->post());		
	}
	
	//PUT
	function tariff_plan_put() {
 		 $this->tariff_plan->update($this->put('id'), $this->put());
	}
	
	//DELETE
	function tariff_plan_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->tariff_plan->delete($this->delete('id'));
	}



	/* --- PLAN ITEM --- */
	
	//GET 
	function plan_item_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){
			$data = $this->plan_item->get_by($filter['filters'][0]['field'], $filter['filters'][0]['value']);			
		}else{
			$data = $this->plan_item->get_all();	
		}				
		$this->response($data, 200);
	}
	
	//POST
	function plan_item_post() {	
		$this->plan_item->insert($this->post());		
	}
	
	//PUT
	function plan_item_put() {
 		 $this->plan_item->update($this->put('id'), $this->put());
	}
	
	//DELETE
	function plan_item_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->plan_item->delete($this->delete('id'));
	}
	
	
	
	/* --- EXEMPTION --- */
	
	//GET 
	function exemption_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){
			$data = $this->exemption->get_by($filter['filters'][0]['field'], $filter['filters'][0]['value']);			
		}else{
			$data = $this->exemption->get_all();	
		}				
		$this->response($data, 200);
	}
	
	//POST
	function exemption_post() {	
		$this->exemption->insert($this->post());		
	}
	
	//PUT
	function exemption_put() {
 		 $this->exemption->update($this->put('id'), $this->put());
	}
	
	//DELETE
	function exemption_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->exemption->delete($this->delete('id'));
	}
	
	
	
	/* --- MAINTENANCE --- */
	
	//GET 
	function maintenance_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){
			$data = $this->maintenance->get_by($filter['filters'][0]['field'], $filter['filters'][0]['value']);			
		}else{
			$data = $this->maintenance->get_all();	
		}				
		$this->response($data, 200);
	}
	
	//POST
	function maintenance_post() {	
		$this->maintenance->insert($this->post());		
	}
	
	//PUT
	function maintenance_put() {
 		 $this->maintenance->update($this->put('id'), $this->put());
	}
	
	//DELETE
	function maintenance_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->maintenance->delete($this->delete('id'));
	}


	
	
	
}