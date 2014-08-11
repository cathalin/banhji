<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Electricity_boxes extends REST_Controller {
	
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('inventory/electricity_box_model', 'electricity_box');		
	}
	
	//GET 
	function electricity_box_get() {
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
				$this->electricity_box->limit($limit, $offset);
			}			
			
			//Sort
			if(!empty($sorter) && isset($sorter)){			
				$sort = array();
				for ($j = 0; $j < count($sorter); ++$j) {				
					$sort += array($sorter[$j]['field'] => $sorter[$j]['dir']);
				}
				$this->electricity_box->order_by($sort);
			}

			$data["results"] = $this->electricity_box->get_many_by($para);
			$data["total"] = $this->electricity_box->count_by($para);

			$this->response($data, 200);			
		}else{
			$data["results"] = $this->electricity_box->get_all();
			$data["total"] = $this->electricity_box->count_all();
			$this->response($data, 200);
		}			
	}
	
	//POST
	function electricity_box_post() {
		$post = array(
			"box_no" 				=> $this->post("box_no"),
			"electricity_pole_id"	=> $this->post("electricity_pole_id"),
			"transformer_id" 		=> $this->post("transformer_id"),
			"status" 				=> $this->post("status"),
			"latitute" 				=> $this->post("latitute"),
			"longtitute" 			=> $this->post("longtitute"),
			"description" 			=> $this->post("description"),
			"company_id" 			=> $this->post("company_id")						
		);

		$id = $this->electricity_box->insert($post);
		$data["results"] = $this->electricity_box->get($id);

		$this->response($data, 201);				
	}
	
	//PUT
	function electricity_box_put() {
		$put = array(
			"box_no" 				=> $this->put("box_no"),
			"electricity_pole_id"	=> $this->put("electricity_pole_id"),
			"transformer_id" 		=> $this->put("transformer_id"),
			"status" 				=> $this->put("status"),
			"latitute" 				=> $this->put("latitute"),
			"longtitute" 			=> $this->put("longtitute"),
			"description" 			=> $this->put("description"),
			"company_id" 			=> $this->put("company_id")						
		);
		$result = $this->electricity_box->update($this->put('id'), $put);

		$this->response(array("updated"=>$result, "results"=>$put), 200);
	}
	
	//DELETE
	function electricity_box_delete() {		
		$result = $this->electricity_box->delete($this->delete('id'));
		$this->response($result, 200);
	}

	
}