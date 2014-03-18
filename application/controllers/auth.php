<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Auth extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('staff/credential_m', 'login');
		$this->load->model('staff/employee_m', 'staff');
		$this->load->model('users/user_model', 'user');
	}
	
	function index() {	
		if($this->session->userdata('logged_in') === 1) {
			redirect('app');
		}
		$data['main_content'] = "frontpage_view";
		//$data['url'] = $_GET['redirect'];
		$data['title'] = "Login";
		$this->load->view('/template/customed', $data);
	}
	
	function login() {	
		$username 	= $this->input->post('username');
		$password 	= sha1($this->input->post('password'));
		$redirect   = "app";

		
		//check for user credential
		$array 		= array("username" => $username, "password" => $password);
		$login 		= $this->login->get_by(array('username' => $username, 'password' => $password));
		
		if( !empty($login) ) {			
			//setup session variable to be used
			$employee = $this->staff->get_by("login_credential_id", $login->id);
			$sessionArray = array(
				"username" 	=> $login->username,
				"user_id"   => $login->id,
				"logged_in"	=> 1,
				"role_id"	=> $login->role_id,
				"userData"  => $this->user->get($login->id)
				//"role" 		=> $this->login->get_role_by($login->role_id),
				//"company_id"=> $this->_company_by_uid($login->staff_id)
			);
			$this->session->set_userdata($sessionArray);
			redirect($redirect);			
		} else {
			redirect('auth?redirect='.$redirect);
		}
		
	}
	
	private function _company_by_uid($user_id) {
		$row = $this->staff->user_company()->get_by('id', $user_id);
		return $row->company_id;
	}
	function logout() {
		$sessionArray = array(
			"username" 	=> "",
			"logged_in"	=> 0,
			"role_id"	=> "",
			"user_id"	=> ""
		);
		if($this->session->userdata('logged_in')==1) {
			$this->session->unset_userdata($sessionArray);
			$this->session->sess_destroy();
		}
		
		redirect('auth/login');
	}
}