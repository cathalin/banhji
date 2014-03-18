<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Classes extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('accounting/class_model', 'classes');	
	}
	
		
	//GET 
	function class_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){
			$para = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}
			$data = $this->classes->get_many_by($para);			
		}else{
			$data = $this->classes->get_all();	
		}				
		$this->response($data, 200);
	}
	
	//POST
	function class_post() {	
		$id = $this->classes->insert($this->post());
		$this->response($id, 200);		
	}
	
	//PUT
	function class_put() {
 		$result = $this->classes->update($this->put('id'), $this->put());
 		$this->response($result, 200);
	}
	
	//DELETE
	function class_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$result = $this->classes->delete($this->delete('id'));
		$this->response($result, 200);
	}
		
	
}//End Of Class