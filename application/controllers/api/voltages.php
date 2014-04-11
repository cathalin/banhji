<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Voltages extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('electricity_units/voltage_model', 'voltage');	
	}
	
		
	//GET 
	function voltage_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){
			$data = $this->voltage->get_many_by($filter['filters'][0]['field'], $filter['filters'][0]['value']);			
		}else{
			$data = $this->voltage->get_all();	
		}				
		$this->response($data, 200);
	}
	
	//POST
	function voltage_post() {	
		$id = $this->voltage->insert($this->post());
		$this->response($id, 200);		
	}
	
	//PUT
	function voltage_put() {
 		$result = $this->voltage->update($this->put('id'), $this->put());
 		$this->response($result, 200);
	}
	
	//DELETE
	function voltage_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$result = $this->voltage->delete($this->delete('id'));
		$this->response($result, 200);
	}
		
	
}//End Of Class