<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Currencies extends REST_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('currency_m', 'currency');
	}
	
    function index_get() {
		$company = $this->currency->get_all();
		
		if (!empty($company)) {
			$this->response($company, 200);
		} else {
			$api = array(
				"status" => "null"
			);
			$this->response($api, 200);
		}
    }
}