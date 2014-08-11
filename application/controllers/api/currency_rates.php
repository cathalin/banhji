<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Currency_rates extends REST_Controller {
	
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('accounting/currency_rate_model', 'currency_rate');		
	}
	
	//GET 
	function currency_rate_get() {
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
				$this->currency_rate->limit($limit, $offset);
			}			
			
			//Sort
			if(!empty($sorter) && isset($sorter)){			
				$sort = array();
				for ($j = 0; $j < count($sorter); ++$j) {				
					$sort += array($sorter[$j]['field'] => $sorter[$j]['dir']);
				}
				$this->currency_rate->order_by($sort);
			}

			$data["results"] = $this->currency_rate->get_many_by($para);
			$data["total"] = $this->currency_rate->count_by($para);

			$this->response($data, 200);			
		}else{
			$data["results"] = $this->currency_rate->get_all();
			$data["total"] = $this->currency_rate->count_all();
			$this->response($data, 200);
		}			
	}
	
	//POST
	function currency_rate_post() {
		$post = array(
			"code" 		=> $this->post("code"),
			"rate" 		=> $this->post("rate"),
			"date" 		=> $this->post("date"),
			"status" 	=> $this->post("status")					
		);		
		$id = $this->currency_rate->insert($post);
		$data["results"] = $this->currency_rate->get($id);

		$this->response($data, 201);			
	}
	
	//PUT
	function currency_rate_put() {
		$put = array(
			"code" 		=> $this->put("code"),
			"rate" 		=> $this->put("rate"),
			"date" 		=> $this->put("date"),
			"status" 	=> $this->put("status")					
		);
		$result = $this->currency_rate->update($this->put('id'), $put);		
		$this->response(array("updated"=>$result, "results"=>$put), 200);
	}
	
	//DELETE
	function currency_rate_delete() {		
		$result = $this->currency_rate->delete($this->delete('id'));
		$this->response($result, 200);
	}

	//LAST RATE 
	function last_rate_get() {
		$data = $this->currency_rate->order_by("date","DESC")->get_all();	
						
		$this->response($data, 200);		
	}
}