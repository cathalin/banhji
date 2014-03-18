<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Positions extends REST_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('staff/position_m', 'job');
	}
	
        function index_get() {
			$jobs = $this->job->get_all();
			
			if (!empty($jobs)) { 
				$this->response($jobs, 200);
			} else {
				$api = array(
					"status" => "null"
				);
				$this->response($api, 200);
			}
        }
		
		function index_post() {
			$data =  array(
				"title" => $this->post("title"),
				"description" => $this->post("description")
			);
			
			//not existed perform insert operation
			$operation = $this->job->insert($data);
			if ($operation) {
				$this->response($this->job->get($operation), 200);
			} else {
				$this->response(array('status'=>'failed','message'=>'Something wrong please try again.'), 500);
			}
		}
		
		function index_put() {
			$data 	=  array(
						"title"			=> $this->put('title'),
						"description"	=> $this->put('description')
			);
			$id		= $this->put('id');			
			$msg 	= $this->job->update($id, $data);
			
			if ( $msg !== false ) {
				$this->response($this->job->get($id), 200);
			} else {
				$this->response(array("status" => "cannot add to the database."), 400);
			}
		}
		
		function index_delete() {
			
			$id		= $this->delete('id');			
			$msg 	= $this->job->delete($id);
			$this->response(array("hi"=>"OK"), 200);
		}
	
}