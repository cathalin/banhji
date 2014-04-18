<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Educations extends REST_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('staff/education_m', 'edu');
	}
	
	function index_get() {
		$criteria = $this->get('staff_id');
		
		if (!empty($criteria)) {
			$data = $this->edu->get_many_by('staff_id', $criteria);
			if (!empty($data)) {
				$this->response($data, 200);
			} else {
				$this->response(array('status'=>'not found'), 404);
			}
		} else {
			$data = $this->edu->get_all();
			if (!empty($data)) {
				$this->response($data, 200);
			} else {
				$this->response(array('status'=>'not found'), 400);
			}
		}
	}

	function index_post() {
		$data = array(
			"staff_id" 		=> $this->post('staff_id'),
			"degree"		=> $this->post('degree'),
			"major"		=> $this->post('major'),
			"description"	=> $this->post('description'),
			"institution"	=> $this->post('institution'),
			"attended_at"	=> date('Y-m-d', strtotime($this->post('attended_at'))),
			"completion_at"	=> date('Y-m-d', strtotime($this->post('completion_at')))
		);
			
		if( !empty($data) ) {
			$msg = $this->edu->insert($data);

			if ( $msg !== false ) {
				$this->response($this->edu->get_by("id", $msg), 200);
			} else {
				$this->response(array("status" => "cannot add to the database."), 500);
			}
		} else {
			$this->response(array("status" => "cannot add to the database."), 400);
		}
	}
	function index_put() {
		$data = array(
			"staff_id" 		=> $this->put('staff_id'),
			"degree"		=> $this->put('degree'),
			"major"		=> $this->put('major'),
			"description"	=> $this->put('description'),
			"institution"	=> $this->put('institution'),
			"attended_at"	=> date('Y-m-d', strtotime($this->put('attended_at'))),
			"completion_at"	=> date('Y-m-d', strtotime($this->put('completion_at')))
		);
		$id		= $this->put('id');			
		$msg 	= $this->edu->update($id, $data);
		
		if ( $msg !== false ) {
			$this->response($this->edu->get_by("id", $id), 200);
		} else {
			$this->response(array("status" => "cannot add to the database."), 400);
		}
		$this->response($this->edu->get_by("id", $id), 200);
	}

	function index_delete() {
		$id		= $this->delete('id');			
		$msg 	= $this->edu->delete($id);
		$this->response(array("hi"=>"OK"), 200);
	}
}