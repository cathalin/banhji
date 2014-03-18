<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Electricity_boxes extends REST_Controller {
	
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('inventory/electricity_box_model', 'electricity_box');		
	}
	
	//GET 
	function electricity_box_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){
			$data = $this->electricity_box->get_many_by($filter['filters'][0]['field'], $filter['filters'][0]['value']);	
		}else{
			$data = $this->electricity_box->get_all();	
		}					
		$this->response($data, 200);		
	}
	
	//POST
	function electricity_box_post() {		
		$this->electricity_box->insert($this->post());
		//$this->response($this->post(), 200);				
	}
	
	//PUT
	function electricity_box_put() {
		$this->electricity_box->update($this->put('id'), $this->put());
	}
	
	//DELETE
	function electricity_box_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->electricity_box->delete($this->delete('id'));
	}
}