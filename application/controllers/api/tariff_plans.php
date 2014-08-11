<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Tariff_plans extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('tariffs/Tariff_plan_model', 'tariff_plan');	
	}
	
		
	//GET 
	function tariff_plan_get() {
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
				$this->tariff_plan->limit($limit, $offset);
			}			
			
			//Sort
			if(!empty($sorter) && isset($sorter)){			
				$sort = array();
				for ($j = 0; $j < count($sorter); ++$j) {				
					$sort += array($sorter[$j]['field'] => $sorter[$j]['dir']);
				}
				$this->tariff_plan->order_by($sort);
			}

			$data["results"] = $this->tariff_plan->get_many_by($para);
			$data["total"] = $this->tariff_plan->count_by($para);

			$this->response($data, 200);			
		}else{
			$data["results"] = $this->tariff_plan->get_all();
			$data["total"] = $this->tariff_plan->count_all();
			$this->response($data, 200);
		}			
	}
	
	//POST
	function tariff_plan_post() {
		$post = array(								
			"name"			=> $this->post("name"),
			"status"		=> $this->post("status"),
			"company_id"	=> $this->post("company_id")		
		);		
		$id = $this->tariff_plan->insert($post);
		$data["results"] = $this->tariff_plan->get($id);

		$this->response($data, 201);				
	}
	
	//PUT
	function tariff_plan_put() {
		$put = array(								
			"name"			=> $this->put("name"),
			"status"		=> $this->put("status"),
			"company_id"	=> $this->put("company_id")		
		);
		$result = $this->tariff_plan->update($this->put('id'), $put);		
		$this->response(array("updated"=>$result, "results"=>$put), 200);
	}
	
	//DELETE
	function tariff_plan_delete() {		
		$result = $this->tariff_plan->delete($this->delete('id'));
		$this->response($result, 200);
	}
		
	
}//End Of Class