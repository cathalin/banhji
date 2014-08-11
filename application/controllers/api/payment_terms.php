<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Payment_terms extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('accounting/payment_term_model', 'payment_term');		
	}
	
	//GET 
	function payment_term_get() {
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
				$this->payment_term->limit($limit, $offset);
			}			
			
			//Sort
			if(!empty($sorter) && isset($sorter)){			
				$sort = array();
				for ($j = 0; $j < count($sorter); ++$j) {				
					$sort += array($sorter[$j]['field'] => $sorter[$j]['dir']);
				}
				$this->payment_term->order_by($sort);
			}

			$data["results"] = $this->payment_term->get_many_by($para);
			$data["total"] = $this->payment_term->count_by($para);

			$this->response($data, 200);			
		}else{
			$data["results"] = $this->payment_term->get_all();
			$data["total"] = $this->payment_term->count_all();
			$this->response($data, 200);
		}			
	}
	
	//POST
	function payment_term_post() {
		$post = array(
			"term" 					=> $this->post("term"),
			"net_due_in"			=> $this->post("net_due_in"),
			"discount_percentage" 	=> $this->post("discount_percentage"),
			"discount_paid_within" 	=> $this->post("status"),
			"company_id" 			=> $this->post("company_id")								
		);

		$id = $this->payment_term->insert($post);
		$data["results"] = $this->payment_term->get($id);

		$this->response($data, 201);				
	}
	
	//PUT
	function payment_term_put() {
		$put = array(
			"term" 					=> $this->put("term"),
			"net_due_in"			=> $this->put("net_due_in"),
			"discount_percentage" 	=> $this->put("discount_percentage"),
			"discount_paid_within" 	=> $this->put("status"),
			"company_id" 			=> $this->put("company_id")						
		);
		$result = $this->payment_term->update($this->put('id'), $put);

		$this->response(array("updated"=>$result, "results"=>$put), 200);
	}
	
	//DELETE
	function payment_term_delete() {		
		$result = $this->payment_term->delete($this->delete('id'));
		$this->response($result, 200);
	}
	
}//End Of Class