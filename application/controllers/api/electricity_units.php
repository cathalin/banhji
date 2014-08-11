<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Electricity_units extends REST_Controller {
	
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('electricity_unit_model', 'electricity_unit');		
	}
	
	//GET 
	function electricity_unit_get() {
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
				$this->electricity_unit->limit($limit, $offset);
			}			
			
			//Sort
			if(!empty($sorter) && isset($sorter)){			
				$sort = array();
				for ($j = 0; $j < count($sorter); ++$j) {				
					$sort += array($sorter[$j]['field'] => $sorter[$j]['dir']);
				}
				$this->electricity_unit->order_by($sort);
			}

			$data["results"] = $this->electricity_unit->get_many_by($para);
			$data["total"] = $this->electricity_unit->count_by($para);

			$this->response($data, 200);			
		}else{
			$data["results"] = $this->electricity_unit->get_all();
			$data["total"] = $this->electricity_unit->count_all();
			
			$this->response($data, 200);
		}			
	}
	
	//POST
	function electricity_unit_post() {
		$post = array(
			"type" 			=> $this->post("type"),
			"name" 			=> $this->post("name"),
			"company_id"	=> $this->post("company_id")					
		);		
		$id = $this->electricity_unit->insert($post);
		$data["results"] = $this->electricity_unit->get($id);

		$this->response($data, 201);				
	}
	
	//PUT
	function electricity_unit_put() {
		$put = array(
			"type" 			=> $this->put("type"),
			"name" 			=> $this->put("name"),
			"company_id"	=> $this->put("company_id")					
		);
		$result = $this->electricity_unit->update($this->put('id'), $put);		
		$this->response(array("updated"=>$result, "results"=>$put), 200);
	}
	
	//DELETE
	function electricity_unit_delete() {		
		$result = $this->electricity_unit->delete($this->delete('id'));
		$this->response($result, 200);
	}
}