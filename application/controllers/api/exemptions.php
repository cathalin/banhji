<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Exemptions extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('tariffs/exemption_model', 'exemption');	
	}
	
		
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
		
	
}//End Of Class