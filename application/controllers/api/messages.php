<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Messages extends REST_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('staff/message_m', 'msg');
	}
	
	function index_get() {
		$criteria 	= $this->get('staff_id');
		//$limit 		= $this->get('pageSize');
		//$offset 	= $this->get('page');
		if (!empty($criteria)) {
			$data = $this->msg->order_by("id", "DESC")
							  ->get_many_by('staff_id', $criteria);
			if (!empty($data)) {
				$this->response($data, 200);
			} else {
				$this->response(array('status'=>'not found'), 404);
			}
		} else {
			$data = $this->msg->order_by("id", "DESC")
							  //->limit($limit, $offset)
							  ->get_all();
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
			"message"		=> $this->post('message')
		);
			
		if( !empty($data) ) {
			$msg = $this->msg->insert($data);

			if ( $msg !== false ) {
				$this->response($this->msg->order_by("id", "DESC")->get_by("id", $msg), 200);
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
			"message"		=> $this->put('message')
		);
		$id		= $this->put('id');			
		$msg 	= $this->msg->update($id, $data);
		
		if ( $msg !== false ) {
			$this->response($this->msg->get_by("id", $id), 200);
		} else {
			$this->response(array("status" => "cannot add to the database."), 400);
		}
		$this->response($this->msg->get_by("id", $id), 200);
	}

	function index_delete() {
		$id		= $this->delete('id');			
		$msg 	= $this->msg->delete($id);
		$this->response(array("hi"=>"OK"), 200);
	}
}