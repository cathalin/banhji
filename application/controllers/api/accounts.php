<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Accounts extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();
		$this->load->model('accounting/account_model', 'account');
		$this->load->model('accounting/account_type_model', 'account_type');		
	}
		

	//GET 
	function account_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){			
			$para = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}			
			$arr = $this->account->get_many_by($para);
			$data = Array();
			if(count($arr) >0){
				foreach($arr as $row) {
				   	//Add extra fields
					$extra = array('account_types'	=> $this->account_type->get('account_type_id', $row->account_type_id)
							  );

					//Cast object to array
					$original = (array) $row;

					//Merge arrays
					$data[] = array_merge($original, $extra);	
				}						
			}
			$this->response($data, 200);			
		}else{
			$data = $this->account->get_all();
			$this->response($data, 200);
		}		
	}

	/*//GET 
	function account_by_get() {		
		$filter = $this->get("filter");				
		if(!empty($filter) && isset($filter)){
			// $limit 	= $this->get('pageSize');
			// $offset = $this->get('skip');			
			$para = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}			
		 	$data = $this->account->get_many_by($para);
		 	$this->response($data, 200);			
		}else{
			$data = $this->account->get_all();
			$this->response($data, 200);
		}
	}*/		
	
	//POST
	function account_post() {		
		$arr = array('code' 			=> $this->post('code'),
					 'name' 			=> $this->post('name'),
					 'name_en'			=> $this->post('name_en'),
					 'account_type_id' 	=> $this->post('account_type_id'),
					 'description' 		=> $this->post('description'),
					 'parent_id'		=> $this->post('parent_id'),
					 'company_id'		=> $this->post('company_id')
		);			
		$this->account->insert($arr);
		//$this->response($this->post(), 200);				
	}
	
	//PUT
	function account_put() {
		$arr = array('code' 			=> $this->put('code'),
					 'name' 			=> $this->put('name'),
					 'name_en'			=> $this->put('name_en'),
					 'account_type_id' 	=> $this->put('account_type_id'),
					 'description' 		=> $this->put('description'),
					 'parent_id' 		=> $this->put('parent_id'),
					 'company_id'		=> $this->put('company_id')
		);
 		$this->account->update($this->put('id'), $arr);
	}
	
	//DELETE
	function account_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->account->delete($this->delete('id'));
	}		
		
	
}//End Of Class