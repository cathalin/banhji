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
		$data = $this->payment_method->get_all();		
		$this->response($data, 200);
	}
	
	//POST
	function payment_method_post() {			
		$this->payment_method->insert($this->post());
		//$this->response($this->post(), 200);		
	}
	
	//PUT
	function payment_method_put() {
 		 $this->payment_method->update($this->put('id'), $this->put());
	}
	
	//DELETE
	function payment_method_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->payment_method->delete($this->delete('id'));
	}
	
}//End Of Class