<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Classes extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('accounting/class_model', 'classes');
		$this->load->model('company_m', 'company');	
	}
	
		
	//GET 
	function class_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){
			$para = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}
			$query = $this->classes->get_many_by($para);			
			if(count($query)>0) {
				foreach($query as $row) {
					$data[] = array(
						"id" => $row->id,
						"company" => $this->company->get($row->company_id),
						"name" => $row->name,
						"type" => $row->type,
						"description" => $row->description
					);
				}				
				$this->response(array('error'=>'false','code'=>200,'message'=>'data found.', 'results'=>array()), 200);	
			} else {				
				$this->response(array('error'=>'false','code'=>404,'message'=>'no data found.', 'results'=>array()), 404);	
			}	
		}else{
			$this->response(array('error'=>'false','code'=>401,'message'=>'no query passed.', 'results'=>array()), 401);
		}			
	}
	
	//POST
	function class_post() {	
		$postedData['company_id'] = $this->post('company_id');
		$postedData['name'] = $this->post('name');
		$postedData['description'] = $this->post('description');
		$postedData['type'] = $this->post('type');

		if($this->_check_class_name($this->post('company_id'), $this->post('name'))=== FALSE) {
			$id = $this->classes->insert($postedData);
			$this->response($id, 200);
		} else {
			$this->response(array("status"=>"failed","error"=>TRUE,"msg"=>"Class already existed."), 200);
		}		
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
	
	private function _check_class_name($company_id, $className) {
		$query = $this->classes->get_by(array("company_id"=>$company_id, "name"=>$className));
		if(count($query)>0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	
}//End Of Class