<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Nationalities extends REST_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('nationality_m', 'nationality');
	}
	
        function index_get() {
			$nationality = $this->nationality->get_all();
			
			if (!empty($nationality)) {
				$this->response($nationality, 200);
			} else {
				$api = array(
					"status" => "null"
				);
				$this->response($api, 200);
			}
        }
		
		function index_post() {
			$data =  $this->post('nationality');
			
			if( !empty($data) ) {
				
				$existed = $this->nationality->get_by('nationality', $data);
				if( !empty($existed) ) {
					
				} else {
					$msg = $this->nationality->insert(array("nationality" => $data));
			
					if ( $msg !== false ) {
						$this->response($this->nationality->get($msg), 200);
					} else {
						$this->response(array("status" => "cannot add to the database."), 400);
					}
				}
					
			} else {
				
			}
		}
		
		function index_put() {
			$id		= $this->put('id');			
			$msg 	= $this->nationality->update($id, array("nationality" => $this->put('nationality')));
			
			if ( $msg !== false ) {
				$this->response($this->nationality->get($id), 200);
			} else {
				$this->response(array("status" => "cannot add to the database."), 400);
			}
		}
		
		function index_delete() {
			
			$id		= $this->delete('id');			
			$msg 	= $this->nationality->delete($id);
			$this->response(array("hi"=>"OK"), 200);
		}
	
}