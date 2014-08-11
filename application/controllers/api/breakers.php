<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Breakers extends REST_Controller {
	
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('inventory/breaker_model', 'breaker');		
	}
	
	
	
	//GET 
	function breaker_get() {
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
				$this->breaker->limit($limit, $offset);
			}			
			
			//Sort
			if(!empty($sorter) && isset($sorter)){			
				$sort = array();
				for ($j = 0; $j < count($sorter); ++$j) {				
					$sort += array($sorter[$j]['field'] => $sorter[$j]['dir']);
				}
				$this->breaker->order_by($sort);
			}

			$data["results"] = $this->breaker->get_many_by($para);
			$data["total"] = $this->breaker->count_by($para);

			$this->response($data, 200);			
		}else{
			$data["results"] = $this->breaker->get_all();
			$data["total"] = $this->breaker->count_all();
			$this->response($data, 200);
		}			
	}
	
	//POST
	function breaker_post() {
		$post = array(
			"name" 			=> $this->post("name"),
			"status" 		=> $this->post("status"),
			"customer_id" 	=> $this->post("customer_id"),
			"item_id" 		=> $this->post("item_id"),
			"date_used" 	=> date("Y-m-d", strtotime($this->post("date_used")))			
		);

		$id = $this->breaker->insert($post);
		$data["results"] = $this->breaker->get($id);

		$this->response($data, 201);				
	}
	
	//PUT
	function breaker_put() {
		$date_used = new DateTime($this->put("date_used"));

		$put = array(
			"name" 			=> $this->put("name"),
			"status" 		=> $this->put("status"),
			"customer_id" 	=> $this->put("customer_id"),
			"item_id" 		=> $this->put("item_id"),			
			"date_used" 	=> $date_used->format('Y-m-d')	
		);
		$result = $this->breaker->update($this->put('id'), $put);		
		$breaker = $this->breaker->get($this->put('id'));
		
		$this->response(array("updated"=>$result, "results"=>$breaker), 200);
	}
	
	//DELETE
	function breaker_delete() {		
		$result = $this->breaker->delete($this->delete('id'));
		$this->response($result, 200);
	}


}//End Of Class