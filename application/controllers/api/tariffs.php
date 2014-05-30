<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Tariffs extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();
		$this->load->model('tariffs/tariff_model', 'tariff');
		
		$this->load->model('accounting/currency_model', 'currency');		
	}
	
		
	//GET 
	function tariff_get() {
		$filter = $this->get("filter");
		$limit = $this->get("pageSize");
		$offset = $this->get('skip');
		$sorter = $this->get("sort");
		
				
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

		if(!empty($filter) && isset($filter)){
			$data = $this->tariff->get_many_by($para);
		}else{
			$data = $this->tariff->get_all();
		}

		$this->response($data, 200);			
		
	}
	
	//POST
	function tariff_post() {
		$data = array('name' 		=> $this->post('name'),
					'currency_id' 	=> $this->post('currency_id')					 					
		);	
		$this->tariff->insert($data);		
	}
	
	//PUT
	function tariff_put() {
		$data = array('id' 			=> $this->put('id'),
					'name' 			=> $this->put('name'),
					'currency_id' 	=> $this->put('currency_id')					 					
		);
 		$this->tariff->update($this->put('id'), $data);
	}
	
	//DELETE
	function tariff_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->tariff->delete($this->delete('id'));
	}	
		
	
}//End Of Class