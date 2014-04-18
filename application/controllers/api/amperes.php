<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Amperes extends REST_Controller {
	
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('electricity_units/ampere_model', 'ampere');		
	}
	
	//GET 
	function ampere_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){
			$data = $this->ampere->get_many_by($filter['filters'][0]['field'], $filter['filters'][0]['value']);	
		}else{
			$data = $this->ampere->get_all();	
		}					
		$this->response($data, 200);		
	}
	
	//POST
	function ampere_post() {		
		$id = $this->ampere->insert($this->post());
		$this->response($id, 200);				
	}
	
	//PUT
	function ampere_put() {
		$this->ampere->update($this->put('id'), $this->put());
	}
	
	//DELETE
	function ampere_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->ampere->delete($this->delete('id'));
	}
}