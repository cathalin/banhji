<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Maintenances extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('tariffs/Maintenance_model', 'maintenance');
	}
	
		
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
		
	
}//End Of Class