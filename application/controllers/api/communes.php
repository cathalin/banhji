<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Communes extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('locations/Commune_model', 'commune');	
	}
		
	
	//GET 
	function commune_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){
			$data = $this->commune->get_many_by("district_id", $filter['filters'][0]['value']);
		}else{
			$data = $this->commune->get_all();
		}			
		$this->response($data, 200);
	}
	
	//POST
	function commune_post() {	
		$this->commune->insert($this->post());		
	}
	
	//PUT
	function commune_put() {
 		 $this->commune->update($this->put('id'), $this->put());
	}
	
	//DELETE
	function commune_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->commune->delete($this->delete('id'));
	}
		
	
}//End Of Class