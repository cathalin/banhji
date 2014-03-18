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
		if(!empty($filter) && isset($filter)){
			$data = $this->currency_rate->get_many_by($filter['filters'][0]['field'], $filter['filters'][0]['value']);	
		}else{
			$data = $this->currency_rate->get_all();	
		}					
		$this->response($data, 200);		
	}
	
	//POST
	function currency_rate_post() {		
		$id = $this->currency_rate->insert($this->post());
		$this->response($id, 200);				
	}
	
	//PUT
	function currency_rate_put() {
		$this->currency_rate->update($this->put('id'), $this->put());
	}
	
	//DELETE
	function currency_rate_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->currency_rate->delete($this->delete('id'));
	}

	//LAST RATE 
	function last_rate_get() {
		$data = $this->currency_rate->order_by("date","DESC")->get_all();	
						
		$this->response($data, 200);		
	}
}