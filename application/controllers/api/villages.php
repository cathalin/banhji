<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Villages extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('locations/Village_model', 'village');	
	}
		
	
	//GET 
	function village_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){
			$data = $this->village->get_many_by("commune_id", $filter['filters'][0]['value']);
		}else{
			$data = $this->village->get_all();
		}			
		$this->response($data, 200);
	}
	
	//POST
	function village_post() {	
		$this->village->insert($this->post());		
	}
	
	//PUT
	function village_put() {
 		 $this->village->update($this->put('id'), $this->put());
	}
	
	//DELETE
	function village_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->village->delete($this->delete('id'));
	}
		
	
}//End Of Class