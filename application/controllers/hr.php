<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

class Hr extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) {
			redirect('auth');
		}
	}
	
	function index() {
		$this->title = "ផ្នកែកធនធានមនុស្ស";
		$this->_render('hr/dashboard_view');
	}
	
	function employees() {
		$this->title = "Dashboard";
		$this->_render('/hr/staffCard_view');
	}

	function addEmployee() {
		$this->title = "New Employee";
		$this->_render('hr/addEmployee_view');
	}

	function credential() {
		$this->title = "credential";
		$this->_render('hr/credential_view');
	}

	public function nationality() {
		$this->title = "សញ្ជាតិ";
		$this->_render('hr/nationality_view');
	}

	public function department() {
		$this->title = "Department";
		$this->_render('hr/department_view');
	}

	public function job() {
		$this->title = "Department";
		$this->_render('hr/job_view');
	}

	public function payroll_list() {
		$this->title = "Payroll List";
		$this->_render('hr/payroll_list_view');
	}
	
	function timesheet() {
		
	}

	function assign() {
		$this->title = "Assign";
		$this->_render('hr/assign_view');
	}

	function salary() {
		$this->title = "Salary";
		$this->_render('salary/view_v');
	}

	function salary_history() {
		$this->_render('salary/history_v');
	}
}