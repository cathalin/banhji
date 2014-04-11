<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Staff extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		$aside = "staff/sidenav";
		if(!$this->session->userdata('logged_in')) {
			redirect('auth');
		}
	}
	
	public function index() {
		$this->title = "Dashboard";
		$this->data["aside_bar"] = "staff/sidenav";
		$this->_render("/staff/home_view");
	}

	public function profile() {
		$this->title = "Profile";
		$this->data["aside_bar"] = "staff/sidenav";
		if($this->uri->segment(3)==$this->session->userdata('user_id')) {
			$this->_render("/staff/dashboard_view");
		} else {
			$this->_render("/staff/viewStaff_view");
		}
		
	}

	public function view() {
		$this->title = "View";
		
	}

	public function contact() {

	}

	public function activity() {

	}

	public function tasks() {
		$this->_render('test');
	}
}