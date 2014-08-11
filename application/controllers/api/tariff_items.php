<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Tariff_items extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();
		$this->load->model('tariffs/Tariff_item_model', 'tariff_item');		
		
		$this->load->model('tariffs/Plan_item_model', 'plan_item');		
	}
	
		
	//GET 
	function tariff_item_get() {
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
				$this->tariff_item->limit($limit, $offset);
			}			
			
			//Sort
			if(!empty($sorter) && isset($sorter)){			
				$sort = array();
				for ($j = 0; $j < count($sorter); ++$j) {				
					$sort += array($sorter[$j]['field'] => $sorter[$j]['dir']);
				}
				$this->tariff_item->order_by($sort);
			}

			$data["results"] = $this->tariff_item->get_many_by($para);
			$data["total"] = $this->tariff_item->count_by($para);

			$this->response($data, 200);			
		}else{
			$data["results"] = $this->tariff_item->get_all();
			$data["total"] = $this->tariff_item->count_all();
			$this->response($data, 200);
		}			
	}
	
	//POST
	function tariff_item_post() {
		$post = array(								
			"tariff_id"		=> $this->post("tariff_id"),
			"usage"			=> $this->post("usage"),
			"price"			=> $this->post("price"),
			"is_flat"		=> $this->post("is_flat"),
			"amount"		=> $this->post("amount")					
		);		
		$id = $this->tariff_item->insert($post);
		$data["results"] = $this->tariff_item->get($id);

		$this->response($data, 201);				
	}
	
	//PUT
	function tariff_item_put() {
		$put = array(								
			"tariff_id"		=> $this->put("tariff_id"),
			"usage"			=> $this->put("usage"),
			"price"			=> $this->put("price"),
			"is_flat"		=> $this->put("is_flat"),
			"amount"		=> $this->put("amount")					
		);
		$result = $this->tariff_item->update($this->put('id'), $put());		
		$this->response(array("updated"=>$result, "results"=>$put), 200);
	}
	
	//DELETE
	function tariff_item_delete() {		
		$result = $this->tariff_item->delete($this->delete('id'));
		$this->response($result, 200);
	}

	//GET TARIFF ITEM BY TARIFF PLAN ID
	function tariff_item_by_tariff_plan_id_get(){
		$filter = $this->get("filter");
		$readingDate = $filter['filters'][1]['value'];
		$planItemArr = $this->plan_item->order_by('start_date', 'desc')
							->get_many_by('tariff_plan_id', $filter['filters'][0]['value']);

		//Loop through plan item to get tariff id
		$tariffID = 0;
		foreach($planItemArr as $row){
			$startDate = $row->start_date;
			if($readingDate>=$startDate){
				$tariffID = $row->tariff_id;
				break;
			}
		}

		//Get tariff item list by tariff id
		if($tariffID>0){
			$data = $this->tariff_item->order_by('usage', 'desc')
						->get_many_by('tariff_id', $tariffID);
			$this->response($data, 200);
		}else{
			$this->response(FALSE, 200);
		}
	}
		
	
}//End Of Class