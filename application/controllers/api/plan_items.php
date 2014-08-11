<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Plan_items extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('tariffs/Plan_item_model', 'plan_item');
	}
	
		
	//GET 
	function plan_item_get() {
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
				$this->plan_item->limit($limit, $offset);
			}			
			
			//Sort
			if(!empty($sorter) && isset($sorter)){			
				$sort = array();
				for ($j = 0; $j < count($sorter); ++$j) {				
					$sort += array($sorter[$j]['field'] => $sorter[$j]['dir']);
				}
				$this->plan_item->order_by($sort);
			}

			$data["results"] = $this->plan_item->get_many_by($para);
			$data["total"] = $this->plan_item->count_by($para);

			$this->response($data, 200);			
		}else{
			$data["results"] = $this->plan_item->get_all();
			$data["total"] = $this->plan_item->count_all();
			$this->response($data, 200);
		}			
	}
	
	//POST
	function plan_item_post() {
		$post = array(			
			"tariff_plan_id" 	=> $this->post("tariff_plan_id"),						
			"tariff_id"			=> $this->post("tariff_id"),
			"start_date"		=> date("Y-m-d", strtotime($this->post("start_date"))),					
		);		
		$id = $this->plan_item->insert($post);
		$data["results"] = $this->plan_item->get($id);

		$this->response($data, 201);				
	}
	
	//PUT
	function plan_item_put() {
		$put = array(			
			"tariff_plan_id" 	=> $this->put("tariff_plan_id"),						
			"tariff_id"			=> $this->put("tariff_id"),
			"start_date"		=> date("Y-m-d", strtotime($this->put("start_date"))),					
		);
		$result = $this->plan_item->update($this->put('id'), $put);		
		$this->response(array("updated"=>$result, "results"=>$put), 200);
	}
	
	//DELETE
	function plan_item_delete() {		
		$result = $this->plan_item->delete($this->delete('id'));
		$this->response($result, 200);
	}
		
	
}//End Of Class