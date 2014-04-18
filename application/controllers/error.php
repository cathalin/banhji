<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends MY_Controller {
		
	function __construct() {
		
		parent::__construct();
		$this->load->model( '/people/Task_m', 'tasks' );
		$this->load->model( '/people/User_model', 'users' );
		$this->load->model( '/people/Work_m', 'work' );
		$this->load->model( '/people/Education_m', 'edu' );
		
	}
	
	function not_admin() {
		$this->title = "error";
		$this->_render('/error/not_authorized');
	}
}	