<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Tariffs extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();
		$this->load->model('tariffs/tariff_model', 'tariff');		
	}
	
		
	//GET 
	function tariff_get() {
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
				$this->tariff->limit($limit, $offset);
			}			
			
			//Sort
			if(!empty($sorter) && isset($sorter)){			
				$sort = array();
				for ($j = 0; $j < count($sorter); ++$j) {				
					$sort += array($sorter[$j]['field'] => $sorter[$j]['dir']);
				}
				$this->tariff->order_by($sort);
			}

			$data["results"] = $this->tariff->get_many_by($para);
			$data["total"] = $this->tariff->count_by($para);

			$this->response($data, 200);			
		}else{
			$data["results"] = $this->tariff->get_all();
			$data["total"] = $this->tariff->count_all();
			$this->response($data, 200);
		}			
	}
	
	//POST
	function tariff_post() {
		$post = array(								
			"name"			=> $this->post("name"),			
			"company_id"	=> $this->post("company_id")		
		);		
		$id = $this->tariff->insert($post);
		$data["results"] = $this->tariff->get($id);

		$this->response($data, 201);				
	}
	
	//PUT
	function tariff_put() {
		$put = array(								
			"name"			=> $this->put("name"),			
			"company_id"	=> $this->put("company_id")		
		);
		$result = $this->tariff->update($this->put('id'), $put);		
		$this->response(array("updated"=>$result, "results"=>$put), 200);
	}
	
	//DELETE
	function tariff_delete() {		
		$result = $this->tariff->delete($this->delete('id'));
		$this->response($result, 200);
	}	
		
	
}//End Of Class