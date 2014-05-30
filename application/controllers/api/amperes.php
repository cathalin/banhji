<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Amperes extends REST_Controller {
	
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('electricity_units/ampere_model', 'ampere');		
	}
	
	//GET 
	function ampere_get() {
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
				$this->ampere->limit($limit, $offset);
			}			
			
			//Sort
			if(!empty($sorter) && isset($sorter)){			
				$sort = array();
				for ($j = 0; $j < count($sorter); ++$j) {				
					$sort += array($sorter[$j]['field'] => $sorter[$j]['dir']);
				}
				$this->ampere->order_by($sort);
			}

			$data["results"] = $this->ampere->get_many_by($para);
			$data["total"] = $this->ampere->count_by($para);

			$this->response($data, 200);			
		}else{
			$data["results"] = $this->ampere->get_all();
			$data["total"] = $this->ampere->count_all();
			$this->response($data, 200);
		}			
	}
	
	//POST
	function ampere_post() {		
		$id = $this->ampere->insert($this->post());
		$this->response($id, 201);				
	}
	
	//PUT
	function ampere_put() {
		$result = $this->ampere->update($this->put('id'), $this->put());
		$this->response($result, 200);
	}
	
	//DELETE
	function ampere_delete() {		
		$result = $this->ampere->delete($this->delete('id'));
		$this->response($result, 200);
	}
}