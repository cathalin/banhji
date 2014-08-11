<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Currencies extends REST_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('currency_m', 'currency');
	}
	
    function index_get() {
		$company = $this->currency->get_all();
		
		if (!empty($company)) {
			$this->response($company, 200);
		} else {
			$api = array(
				"status" => "null"
			);
			$this->response($api, 200);
		}
    }

    //BY DAWINE
	//GET 
	function currency_get() {
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
				$this->currency->limit($limit, $offset);
			}			
			
			//Sort
			if(!empty($sorter) && isset($sorter)){			
				$sort = array();
				for ($j = 0; $j < count($sorter); ++$j) {				
					$sort += array($sorter[$j]['field'] => $sorter[$j]['dir']);
				}
				$this->currency->order_by($sort);
			}

			$data["results"] = $this->currency->get_many_by($para);
			$data["total"] = $this->currency->count_by($para);

			$this->response($data, 200);			
		}else{
			$data["results"] = $this->currency->get_all();
			$data["total"] = $this->currency->count_all();
			$this->response($data, 200);
		}			
	}
	
	//POST
	function currency_post() {
		$post = array(
			"code" 				=> $this->post("code"),
			"sub_code" 			=> $this->post("sub_code"),
			"country_currency" 	=> $this->post("country_currency")					
		);

		$id = $this->currency->insert($post);
		$data["results"] = $this->currency->get($id);

		$this->response($data, 201);				
	}
	
	//PUT
	function currency_put() {
		$put = array(
			"code" 				=> $this->put("code"),
			"sub_code" 			=> $this->put("sub_code"),
			"country_currency" 	=> $this->put("country_currency")					
		);
		$result = $this->currency->update($this->put('id'), $put);		
		$this->response(array("updated"=>$result, "results"=>$put), 200);
	}
	
	//DELETE
	function currency_delete() {		
		$result = $this->currency->delete($this->delete('id'));
		$this->response($result, 200);
	}
}