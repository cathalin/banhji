<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Fees extends REST_Controller {
	
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('tariffs/fee_model', 'fee');		
	}
	
	//GET 
	function fee_get() {
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
				$this->fee->limit($limit, $offset);
			}			
			
			//Sort
			if(!empty($sorter) && isset($sorter)){			
				$sort = array();
				for ($j = 0; $j < count($sorter); ++$j) {				
					$sort += array($sorter[$j]['field'] => $sorter[$j]['dir']);
				}
				$this->fee->order_by($sort);
			}

			$data["results"] = $this->fee->get_many_by($para);
			$data["total"] = $this->fee->count_by($para);

			$this->response($data, 200);			
		}else{
			$data["results"] = $this->fee->get_all();
			$data["total"] = $this->fee->count_all();
			
			$this->response($data, 200);
		}			
	}
	
	//POST
	function fee_post() {		
		$id = $this->fee->insert($this->post());
		$this->response($id, 201);				
	}
	
	//PUT
	function fee_put() {
		$result = $this->fee->update($this->put('id'), $this->put());
		$this->response($result, 200);
	}
	
	//DELETE
	function fee_delete() {		
		$result = $this->fee->delete($this->delete('id'));
		$this->response($result, 200);
	}
}