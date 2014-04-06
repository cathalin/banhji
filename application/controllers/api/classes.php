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
<<<<<<< HEAD
				foreach($query as $row) {
					$data[] = array(
						"id" => $row->id,
						"company" => $this->company->get($row->company_id),
						"name" => $row->name,
						"type" => $row->type,
						"description" => $row->description
					);
				}
				$this->response(array('error'=>'false','code'=>200,'message'=>'data found.', 'results'=>$data), 200);	
			} else {
				$this->response(array('error'=>'false','code'=>404,'message'=>'no data found.', 'results'=>array()), 404);	
			}	
		}else{
			$this->response(array('error'=>'false','code'=>401,'message'=>'no query passed.', 'results'=>array()), 401);	
=======
				$this->response($query, 200);
			} else {
				$this->response(array('Error'=>true), 404);
			}		
		}else{
			$query = $this->classes->get_all();	
			$this->response($query, 200);
>>>>>>> 84f8114fef866b1eace1e58e96a890ab9848cda2
		}				
	}
	
	//POST
	function class_post() {	
		$postedData['company_id'] = $this->post('company_id');
		$postedData['name'] = $this->post('name');
		$postedData['description'] = $this->post('description');
		$postedData['type'] = $this->post('type');

		$id = $this->classes->insert($postedData);
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