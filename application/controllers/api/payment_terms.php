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
		$data = $this->payment_term->get_all();		
		$this->response($data, 200);
	}
	
	//POST
	function payment_term_post() {			
		$this->payment_term->insert($this->post());
		//$this->response($this->post(), 200);		
	}
	
	//PUT
	function payment_term_put() {
 		 $this->payment_term->update($this->put('id'), $this->put());
	}
	
	//DELETE
	function payment_term_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->payment_term->delete($this->delete('id'));
	}
	
}//End Of Class