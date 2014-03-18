<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Tariff_plans extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('tariffs/Tariff_plan_model', 'tariff_plan');	
	}
	
		
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
		
	
}//End Of Class