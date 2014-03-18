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
		if(!empty($filter) && isset($filter)){
			$data = $this->tariff->get_by($filter['filters'][0]['field'], $filter['filters'][0]['value']);
			$this->response($data, 200);						
		}else{
			$arr = $this->tariff->get_all();
			foreach($arr as $row) {				  
				  $data[] = array(
				  		   'id'				=> $row->id,
				  		   'name'			=> $row->name,
						   'currency_id'	=> $row->currency_id,						   					  
						   'currencies'		=> $this->currency->get_by('id',$row->currency_id)						   					  
				  );
			  }
			$this->response($data, 200);		
		}		
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