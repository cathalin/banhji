<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class People_types extends REST_Controller {
	
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('people/people_type_model', 'people_type');		
	}
	
	//GET 
	function people_type_get() {
		$filter = $this->get("filter");
		$limit = $this->get("pageSize");
		$offset = $this->get('skip');
		$sorter = $this->get("sort");

		if(!empty($filter) && isset($filter)){			
			//Filter
			$para = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}
			
			//Limit
			if(!empty($limit) && isset($limit)){
				$this->people_type->limit($limit, $offset);
			}			
			
			//Sort
			if(!empty($sorter) && isset($sorter)){			
				$sort = array();
				for ($j = 0; $j < count($sorter); ++$j) {				
					$sort += array($sorter[$j]['field'] => $sorter[$j]['dir']);
				}
				$this->people_type->order_by($sort);
			}

			$data["results"] = $this->people_type->get_many_by($para);
			$data["total"] = $this->people_type->count_by($para);

			$this->response($data, 200);			
		}else{
			$data["results"] = $this->people_type->get_all();
			$data["total"] = $this->people_type->count_all();
			$this->response($data, 200);
		}			
	}
	
	//POST
	function people_type_post() {
		$post = array(			
			"name" 		=> $this->post("name"),						
			"parent_id"	=> $this->post("parent_id")					
		);	
		$id = $this->people_type->insert($post);
		$data["results"] = $this->people_type->get($id);

		$this->response($data, 201);				
	}
	
	//PUT
	function people_type_put() {
		$put = array(			
			"name" 		=> $this->put("name"),						
			"parent_id"	=> $this->put("parent_id")					
		);
		$result = $this->people_type->update($this->put('id'), $put);		
		$this->response(array("updated"=>$result, "results"=>$put), 200);
	}
	
	//DELETE
	function people_type_delete() {		
		$result = $this->people_type->delete($this->delete('id'));
		$this->response($result, 200);
	}
}