<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {
		
	function __construct() {
		
		parent::__construct();
	}	
	
	function index() {

		$this->_render('/dashboard/index_view');
	}
}
