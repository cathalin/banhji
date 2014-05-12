<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class purchaseOrders extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('Purchase_model', 'purchase');		
	}
		
	
	function index_get(){
		$q = $this->get('fields');
		$this->response(array("status"=>$q), 200);		
	}

	function index_put(){}

	function index_post(){}

	function index_delete(){}
	
}