<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Payment_methods extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('accounting/payment_method_model', 'payment_method');		
	}
	
	//GET 
	function payment_method_get() {
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
				$this->payment_method->limit($limit, $offset);
			}			
			
			//Sort
			if(!empty($sorter) && isset($sorter)){			
				$sort = array();
				for ($j = 0; $j < count($sorter); ++$j) {				
					$sort += array($sorter[$j]['field'] => $sorter[$j]['dir']);
				}
				$this->payment_method->order_by($sort);
			}

			$data["results"] = $this->payment_method->get_many_by($para);
			$data["total"] = $this->payment_method->count_by($para);

			$this->response($data, 200);			
		}else{
			$data["results"] = $this->payment_method->get_all();
			$data["total"] = $this->payment_method->count_all();
			$this->response($data, 200);
		}			
	}
	
	//POST
	function payment_method_post() {
		$post = array(
			"name" 					=> $this->post("name"),
			"description"			=> $this->post("description"),			
			"company_id" 			=> $this->post("company_id")								
		);

		$id = $this->payment_method->insert($post);
		$data["results"] = $this->payment_method->get($id);

		$this->response($data, 201);				
	}
	
	//PUT
	function payment_method_put() {
		$put = array(
			"name" 					=> $this->put("name"),
			"description"			=> $this->put("description"),			
			"company_id" 			=> $this->put("company_id")						
		);
		$result = $this->payment_method->update($this->put('id'), $put);

		$this->response(array("updated"=>$result, "results"=>$put), 200);
	}
	
	//DELETE
	function payment_method_delete() {		
		$result = $this->payment_method->delete($this->delete('id'));
		$this->response($result, 200);
	}
	
}//End Of Class