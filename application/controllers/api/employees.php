<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Employees extends REST_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('staff/employee_m', 'staff');
		$this->load->model('staff/position_m', 'job');
		$this->load->model('company_m', 'company');
		$this->load->model('nationality_m', 'nationality');
		$this->load->model('department_m', 'dept');
		$this->load->model('staff/credential_m', 'cred');
		$this->load->model('staff/user_role_m', 'role');
	}
	
    function index_get($id=0) {
		$limit 	= $this->get('pageSize');
		$offset = $this->get('skip');
		if ( $id > 0 ) {
			//$this->staff->limit($limit, $offset);
			$query = $this->staff->get($id);
			$data["employees"][] = array(
				"id" 		 	=> $query->id,
				"company" 	 	=> $this->company->get($query->company_id),
				"code"		 	=> $query->code,
				"nationality"	=> $this->nationality->get($query->nationality_id),
				"id_no"			=> $query->id_no,
				"fullname"		=> $query->first_name ." ".$query->last_name, 
				"first_name"	=> $query->first_name,
				"last_name"		=> $query->last_name,
				"image_url"		=> $query->image_url,
				"phone"			=> $query->phone,
				"email"			=> $query->email,
				"dob"			=> $query->dob,
				"gender" 		=> $query->gender,
				"marital_status"=> $query->marital_status,
				"location"		=> $query->address,
				"login_credential_id" => $query->login_credential_id,
				"contract_ref"	=> $query->contract_ref,
				"line_manager"	=> $this->staff->get_by("line_manager_id", $query->line_manager_id),
				"department"	=> $this->dept->get($query->department_id),
				"job"			=> $this->job->get($query->job_id),
				"hired_at"		=> $query->hired_at,
				"latitute"		=> $query->latitute,
				"longtitute"		=> $query->longtitute,
				"emmergency_contact" => $query->emmergency_contact
			);
			$data['total'] = $this->staff->count_by("exited", 0);
			$this->response($data, 200);
			
		} else {
			//$this->staff->limit($limit, 2);
			$critera = array("exited"=>0);
			$q = $this->staff->get_all();
		
			if (!empty($q)) {
				foreach ($q as $query) {
					$data["employees"][] = array(
						"id" 		 	=> $query->id,
						"company" 	 	=> $this->company->get($query->company_id),
						"code"		 	=> $query->code,
						"nationality"	=> $this->nationality->get($query->nationality_id),
						"id_no"			=> $query->id_no,
						"fullname"		=> $query->first_name ." ".$query->last_name,
						"first_name"	=> $query->first_name,
						"last_name"		=> $query->last_name,
						"image_url"		=> $query->image_url,
						"phone"			=> $query->phone,
						"email"			=> $query->email,
						"dob"			=> $query->dob,
						"gender" 		=> $query->gender,
						"marital_status"=> $query->marital_status,
						"location"		=> $query->address,
						"login_credential_id" => $query->login_credential_id,
						"contract_ref"	=> $query->contract_ref,
						"line_manager"	=> $this->staff->get_by("line_manager_id", $query->line_manager_id),
						"department"	=> $this->dept->get($query->department_id),
						"job"			=> $this->job->get($query->job_id),
						"hired_at"		=> $query->hired_at,
						"latitute"		=> $query->latitute,
						"longtitute"		=> $query->longtitute,
						"emmergency_contact" => $query->emmergency_contact
					);
				}
				$data['total'] = $this->staff->count_by("exited", 0);
				$this->response($data, 200);
			} else {
				$api = array(
					"status" => "null"
				);
				$this->response($api, 400);
			}
		}			
    }
	
	function active_get() {
		$limit 	= $this->get('pageSize');
		$offset = $this->get('skip');
		$this->staff->limit($limit, $offset);
		$filter = $this->get('filter');
		$this->staff->active()
					->like("first_name", $filter['filters'][0]['value'])
					->or_like("last_name", $filter['filters'][0]['value'])
					->or_like("id", $filter['filters'][0]['value']);

		$q = $this->staff->get_all();
		foreach ($q as $query) {
			$data['staff'][] = array(
				"id" 		 	=> $query->id,
				"company" 	 	=> $this->company->get($query->company_id),
				"code"		 	=> $query->code,
				"nationality"	=> $this->nationality->get($query->nationality_id),
				"id_no"			=> $query->id_no,
				"fullname"		=> $query->last_name ." ".$query->first_name,
				"first_name"	=> $query->first_name,
				"last_name"		=> $query->last_name,
				"image_url"		=> $query->image_url,
				"phone"			=> $query->phone,
				"email"			=> $query->email,
				"dob"			=> $query->dob,
				"gender" 		=> $query->gender,
				"marital_status"=> $query->marital_status,
				"address"		=> $query->address,
				"login_credential_id" => $query->login_credential_id,
				"contract_ref"	=> $query->contract_ref,
				"line_manager"	=> $this->staff->get_by("line_manager_id", $query->line_manager_id),
				"department"	=> $this->dept->get($query->department_id),
				"job"			=> $this->job->get($query->job_id),
				"hired_at"		=> $query->hired_at,
				"emmergency_contact" => $query->emmergency_contact
			);
			
		}
		$data['total'] = $this->staff->count_by("exited", 0);
		$this->response(array("callback"=>$data), 200);
	}

	function index_post() {
		//$data =  $this->post();
		$data = array(
		"company_id" 			=> $this->post('staff_id'),
		"code"					=> $this->post('code'),
		"nationality_id"		=> $this->post('nationality_id'),
		"id_no"					=> $this->post('id_no'),
		"first_name"			=> $this->post('first_name'),
		"last_name"				=> $this->post('last_name'),
		"image_url"				=> $this->post('image_url'),
		"phone"					=> $this->post('phone'),
		"email"					=> $this->post('email'),
		"dob"					=> date('Y-m-d', strtotime($this->post('dob'))),
		"gender"				=> $this->post('gender'),
		"marital_status" 		=> $this->post('marital_status'),
		"address"				=> $this->post('address'),
		"login_credential_id"	=> $this->post('description'),
		"contract_ref"			=> $this->post('contract_ref'),
		"line_manager_id"		=> $this->post('line_manager_id'),
		"department_id"			=> $this->post('department_id'),
		"job_id"				=> $this->post('job_id'),
		"hired_at"				=> date('Y-m-d', strtotime($this->post('hired_at'))),
		"emmergency_contact"	=> $this->post('description')
		);
		if( !empty($data) ) {
			
			$code = $this->post('code');
			$fname= $this->post('first_name');
			$lname= $this->post('last_name');
			
			//check for empty string
			if ($code == "" && $fname == "" && $lname == "") {
				$this->response(array("status"=>"Failed to create.", "message"=>"Some emty data fields"), 401);
			} else {
				$existed = $this->staff->get_by('code', $this->post('code'));
				
				//check if staff existed
				if( !empty($existed) ) {
					$this->response(array("status"=>"Failed to create.", "message"=>"Code existed, try different code."), 401);
				} else {
					$msg = $this->staff->insert($data);
		
					if ( $msg !== false ) {
						$this->response($this->staff->get($msg), 200);
					} else {
						$this->response(array("status" => "cannot add to the database."), 400);
					}
				}
			}
		} else {
			
		}
			
	}
	
	function index_put() {
		//$data 	=  $this->put();
		$data = array(
		"company_id" 			=> $this->put('company_id'),
		"code"					=> $this->put('code'),
		"nationality_id"		=> $this->put('nationality_id'),
		"id_no"					=> $this->put('id_no'),
		"first_name"			=> $this->put('first_name'),
		"last_name"				=> $this->put('last_name'),
		"image_url"				=> $this->put('image_url'),
		"phone"					=> $this->put('phone'),
		"email"					=> $this->put('email'),
		"dob"					=> date('Y-m-d', strtotime($this->put('dob'))),
		"gender"				=> $this->put('gender'),
		"marital_status" 		=> $this->put('marital_status'),
		"address"				=> $this->put('address'),
		"login_credential_id"	=> $this->put('description'),
		"contract_ref"			=> $this->put('contract_ref'),
		"line_manager_id"		=> $this->put('line_manager_id'),
		"department_id"			=> $this->put('department_id'),
		"job_id"				=> $this->put('job_id'),
		"hired_at"				=> date('Y-m-d', strtotime($this->put('hired_at'))),
		"emmergency_contact"	=> $this->put('description')
		);
		$id		= $this->put('id');			
		$msg 	= $this->staff->update($id, $data);
		
		if ( $msg !== false ) {
			$this->response($this->staff->get($id), 200);
		} else {
			$this->response(array("status" => "cannot add to the database."), 400);
		}
		$this->response($this->staff->get_by("id", $id), 200);
	}
	
	function index_delete() {
		
		$id		= $this->delete('id');			
		$msg 	= $this->staff->delete($id);
		$this->response(array("hi"=>"OK"), 200);
	}

	public function roles_get() {
		$this->response($this->role->get_all(), 200);
	}

	public function roles_post() {

		$this->response($this->role->get_all(), 200);
	}

	public function credentials_get() {
		$cred = $this->cred->get_all();

		if(count($cred) > 0) {
			foreach($cred as $login) {
				$data[] = array(
					"id" => $login->id,
					"role" => $this->role->get($login->role_id),
					"username" => $login->username,
					"password" => $login->password,
					"created_at" => $login->created_at,
					"updated_at" => $login->updated_at
				);
 			}
 			$this->response($data, 200);
		}
	}

	public function credentials_post() {
		$cred = $this->cred->get_all();

		if(count($cred) > 0) {
			foreach($cred as $login) {
				$data[] = array(
					"id" => $login->id,
					"role" => $this->role->get($login->role_id),
					"username" => $login->username,
					"password" => $login->password,
					"created_at" => $login->created_at,
					"updated_at" => $login->updated_at
				);
 			}
 			$this->response($data, 200);
		}
	}
	
}