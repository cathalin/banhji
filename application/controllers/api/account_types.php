<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Account_types extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('accounting/account_type_model', 'account_type');		
	}
		
	
	//GET 
	function account_type_get() {
		$data = $this->account_type->get_many_by('parent_id >', 0);		
		$this->response($data, 200);
	}
	
	//POST
	function account_type_post() {			
		$this->account_type->insert($this->post());
		//$this->response($this->post(), 200);		
	}
	
	//PUT
	function account_type_put() {
 		 $this->account_type->update($this->put('id'), $this->put());
	}
	
	//DELETE
	function account_type_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->account_type->delete($this->delete('id'));
	}
	
}