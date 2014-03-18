<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

class Auth extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('session'); // Load Session Library manually, when ready auto load in autoload.php in config file!
		//$this->load->model('Company_m', 'company');
		$this->load->model( 'credential_m', 'cred' );
		
	}
	
	function login() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		//$company  = $this->input->post('company');
		// $result = $this->cred->get_by('username', $username);
		
		// if ( !empty($result) ) {
		// 	$sessionArray = array(
		// 		"logged_in" => TRUE,
		// 		//"user_id" => $result->id,
		// 		"username" => $result->username,
		// 		"role_id" => $result->role_id
		// 	);
		
		// 	$this->session->set_userdata($sessionArray);
		// 	redirect('staff');
			
		// } else {
			
		// 	$this->_render('/auth/login');
		// }
		echo "$username:$password";
	}
	
	function logout() {
		$sessionArray = array(
			"logged_in" => FALSE,
			//"user_id" => '',
			"username" => '',
			"name" => '',
			//"company_id" => '',
			"role_id" => ''
		);
		$this->session->unset_userdata($sessionArray);
		
		$this->session->sess_destroy();
		
		redirect('userpage');
	}
	
	function register() {
		$this->_render('auth/register');
	}
	//register new company
	function register_company() {
		$companyname = "pcg"; //$this->input->post('company_name');
		
		//check company
		$existed = $this->_check_company($companyname);
		if ( $existed === TRUE ) {
			$this->session->set_flashdata('message', 'This company already registered. You may register your account from your admin.');
			redirect('auth/register', 'refresh');
		} else {
			echo "can register";
		}
	}
	
	//add new user to the company
	function add_new() {
		
	}
	
	
	//private functions
	
	//check user if existed
	private function _check_user($username) {
		//verify user with the database
		$username = $this->user->get_by("username", $username);
		
		//if user exists returns true else returns false
		if ( !empty($username) ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	//check company if existed
	private function _check_company($company_name) {
		//verify company with the database
		$companyname = $this->company->get_by("name", $company_name);
		
		//if company exists returns true else returns false
		if ( !empty($companyname) ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
