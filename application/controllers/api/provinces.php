<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Provinces extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('locations/Province_model', 'province');	
	}
		
	
	//GET 
	function province_get() {
		$data = $this->province->get_all();		
		$this->response($data, 200);
	}
	
	//POST
	function province_post() {	
		$this->province->insert($this->post());		
	}
	
	//PUT
	function province_put() {
 		 $this->province->update($this->put('id'), $this->put());
	}
	
	//DELETE
	function province_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->province->delete($this->delete('id'));
	}
		
	
}//End Of Class