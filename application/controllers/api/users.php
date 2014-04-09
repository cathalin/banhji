<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Users extends REST_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('staff/credential_m', 'login');
		$this->load->model('users/user_model', 'users');
	}

	// get user information
	// @param: optional userId
	// return userdata
	function index_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){
			$para = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}
			$query = $this->users->get_many_by($para);
			if(count($query)>0) {
				foreach($query as $q) {
					$data[] = array(
						"id"	   => $q->id,
						"username" => $this->login->get($q->login_id)->username,
						"userData" => array(
										"first_name" => $q->first_name ? $q->first_name : "",
										"last_name"  => $q->last_name ? $q->last_name : "",
										"email"		 => $q->email ? $q->email : "",
										"phone"		 => $q->phone ? $q->phone : "",
										"image"		 => $q->image_url ? $q->image_url : "",
										"report_to"	 => array(),
										"allowedModules" => $q->allowedModules
									  )
					);
				}
				$this->response(array("error"=>"false", "status"=>"succeed", "message"=>"User found.", "results"=>$data), 200);
			} else {
				$this->response(array("error"=>"true", "status"=>"failed", "message"=>"User not found, please try again.", "results"=>array()), 400);
			}		
		}else{
			$this->response(array("error"=>"true", "status"=>"failed", "message"=>"Please provide criteria.", "results"=>array()), 400);
		}	
	}

	// update user information
	// @param: user data
	// return userdata
	function index_put() {
		if($this->put()) {
			$query = $this->users->update($this->put('id'), $this->put());
			if($this->db->affected_rows() >0) {
				$query = $this->users->get($this->put('id'));
				if(count($query)>0) {
					foreach($query as $q) {
						$data[] = array(
							"id"	   => $q->id,
							"username" => $this->login->get($q->login_id)->username,
							"userData" => array(
											"first_name" => $q->first_name,
											"last_name"  => $q->last_name,
											"email"		 => $q->email,
											"phone"		 => $q->phone,
											"image"		 => $q->image_url,
											"report_to"	 => array(),
											"allowedModules" => $q->allowedModules
										  )
						);
					}
					$this->response(array("error"=>"false", "status"=>"succeed", "message"=>"User found.", "results"=>$data), 200);
				} else {
					$this->response(array("error"=>"true", "status"=>"failed", "message"=>"User not found, please try again.", "results"=>array()), 400);
				}
			} else {
				$this->response(array("error"=>"true", "status"=>"failed", "message"=>"Could not update.", "results"=>array()), 400);
			}
		} else {
			$this->response(array("error"=>"true", "status"=>"failed", "message"=>"Please provide data.", "results"=>array()), 400);
		}
	}

	// create user information
	// @param: user data
	// return userdata
	function index_post() {
		if($this->post()) {
			$query = $this->users->insert($this->post());
			if($this->db->affected_rows() > 0) {
				$query = $this->users->get($query);
				foreach($query as $q) {
					$data[] = array(
						"id"	   => $q->id,
						"first_name" => $q->first_name,
						"last_name"  => $q->last_name,
						"email"		 => $q->email,
						"phone"		 => $q->phone,
						"image"		 => $q->image_url,
						"report_to"	 => array(),
						"allowedModules" => $q->allowedModules
					);
				}
				$this->response(array("error"=>"false", "status"=>"succeed", "message"=>"User created.", "results"=>$data), 200);
			} else {
				$this->response(array("error"=>"true", "status"=>"failed", "message"=>"Cannot create user, please try again.", "results"=>array()), 400);
			}	
		} else {
			$this->response(array("error"=>"true", "status"=>"failed", "message"=>"Please provide user data.", "results"=>array()), 400);
		}
	}

	// delete user information
	// @param: user data
	// return true: successful, false: failed
	function index_delete() {
		$this->users->delete($this->delete('id'));
		if($this->db->affected_rows()>0) {
			$this->response(array("error"=>"false", "status"=>"succeed", "message"=>"Data deleted.", "results"=>array()), 200);
		} else {
			$this->response(array("error"=>"true", "status"=>"failed", "message"=>"Cannot delete data.", "results"=>array()), 400);
		}
	}

	// Log user in
	// @param: username
	// @param: password
	// return user credential back
	function login_get() {
		$filter = $this->get("filter");
		$username =  $filter['filters'][0]['value'];
		$password = $filter['filters'][1]['value'];
		if($username !== "" && $password !== "") {
			$query = $this->login->get_by(array('password' => sha1($password), 'username'=>$username));
			if(!empty($query)) {
				$data = array(
					"id"	   => $query->id,
					"username" => $query->username,
					"userData" => $this->users->get_by(array('login_id'=>$query->id))
				);
				$sessionArray = array(
					"username" 	=> $query->username,
					"user_id"   => $query->id,
					"logged_in"	=> 1,
					"role_id"	=> $query->role_id,
					"userData"  => $this->users->get_by(array('login_id'=>$query->id))
				);
				$this->session->set_userdata($sessionArray);

				$this->response(array("error"=>"false", "status"=>"succeed", "message"=>"Logged in.", "results"=>$data), 200);
			} else {
				$this->response(array("error"=>"true", "status"=>"failed", "message"=>"Could not find username.", "results"=>sha1($password)), 200);
			}
		} else {
			$this->response(array("error"=>"true", "status"=>"failed", "message"=>"Please provide username and password.", "results"=>array()), 200);
		}
	}

	// Log user in
	// @param: id and data to be updated
	// return user credential back
	function login_put() {
		$this->login->update($this->put('id'), $this->put());
		if($this->db->affected_rows()>0) {
			$query = $this->login->get($this->put('id'));
				foreach($query as $login) {
					$data = array(
						"id"	   => $login->id,
						"username" => $login->username,
						"userData" => $this->users->get_by('login_id', $login->id)
					);
				}
			$this->response(array("error"=>"false", "status"=>"succeed", "message"=>"Data updated.", "results"=>$data), 200);
		} else {
			$this->response(array("error"=>"true", "status"=>"failed", "message"=>"Could not update.", "results"=>array()), 400);
		}
	}

	// Delete user login
	// @param: id
	// return error: true, false
	function login_delete() {
		$this->login->delete($this->delete('id'));
		if($this->db->affected_rows()>0) {
			$this->response(array("error"=>"false", "status"=>"succeed", "message"=>"Data deleted.", "results"=>array()), 200);
		} else {
			$this->response(array("error"=>"true", "status"=>"failed", "message"=>"Cannot delete data.", "results"=>array()), 400);
		}
	}

	// Register user
	// @param: username
	// @param: password
	// return user data when succeed
	// error message when fails
	function register_post(){
		$username = $this->post('username');
		$password = $this->post('password');
		if($this->_check_email($username)) {
			$this->response(array("error"=>"true", "status"=>"failed", "message"=>"existed", "results"=>array()), 200);
		} else {
			if($username !== "" && $password !== "") {
				$insert = $this->login->insert(array("role_id"=>1, "username"=>$username, "password"=>sha1($password)));
				if(!empty($insert)) {
					$query = $this->login->limit(1)->get($insert);
					$data = array(
						"username" => $query->username,
						"userData" => $this->users->get_by('login_id', $query->id)
					);
					$sessionArray = array(
						"username" 	=> $query->username,
						"user_id"   => $query->id,
						"logged_in"	=> 1,
						"role_id"	=> $query->role_id,
						"userData"  => $this->users->get_by(array('login_id'=>$query->id))
					);
					$this->session->set_userdata($sessionArray);
					$this->response(array("error"=>"false", "status"=>"succeed", "message"=>"User registered.", "results"=>$data), 200);
				} else {
					$this->response(array("error"=>"true", "status"=>"failed", "message"=>"Could not register user, please try again.", "results"=>array()), 400);
				}
			} else {
				$this->response(array("error"=>"true", "status"=>"failed", "message"=>"Please provide username and password.", "results"=>array()), 400);
			}
		}
	}

	private function _check_email($email) {
		$query = $this->login->get_by(array("username"=>$email));
		if(!empty($query)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
/* End of file users.php */
/* Location: ./application/controllers/api/users.php */