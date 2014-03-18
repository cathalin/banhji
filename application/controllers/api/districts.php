<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Districts extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('locations/District_model', 'district');	
	}
		
	
	//GET 
	function district_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){
			$data = $this->district->get_many_by("province_id", $filter['filters'][0]['value']);
		}else{
			$data = $this->district->get_all();
		}				
		$this->response($data, 200);
	}
	
	//POST
	function district_post() {	
		$this->district->insert($this->post());		
	}
	
	//PUT
	function district_put() {
 		 $this->district->update($this->put('id'), $this->put());
	}
	
	//DELETE
	function district_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->district->delete($this->delete('id'));
	}
		
	
}//End Of Class