<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Customer_api extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();
		$this->load->model('people/people_model', 'customer');
		$this->load->model('people/people_type_model', 'customer_type');	
		$this->load->model('reseller_m', 'reseller');	
		$this->load->model('reseller_connection_m', 'connections');	
	}
	
	
	
	/* --- CUSTOMER --- */
	
	//GET 
	function customer_get() {		

		$data = $this->customer->get_many_by("people_type_id", 4);		
		$this->response($data, 200);
	}
	
	//POST
	function customer_post() {			
		$this->customer->insert($this->post());
		//$this->response($this->post(), 200);		
	}
	
	//PUT
	function customer_put() {
 		 $this->customer->update($this->put('id'), $this->put());
	}
	
	//DELETE
	function customer_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->customer->delete($this->delete('id'));
	}
	
	
	
	
	/* --- CUSTOMER TYPES --- */
	
	//GET 
	function customer_type_get() {
		$data = $this->customer_type->get_all();		
		$this->response($data, 200);
	}
	
	//POST
	function customer_type_post() {	
		$this->customer_type->insert($this->post());		
	}
	
	//PUT
	function customer_type_put() {
 		 $this->customer_type->update($this->put('id'), $this->put());
	}
	
	//DELETE
	function customer_type_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->customer_type->delete($this->delete('id'));
	}
	
	public function resellers_get() {
		$resellers = $this->reseller->get_all();

		if($resellers) {
			foreach( $resellers as $reseller ) {
				$data[] = array(
					"id"			=> $reseller->id,
					"customer"		=> $this->customer->get($reseller->customer_id),
					"license_no"	=> $reseller->license_no,
					"licensee_name" => $reseller->licensee_name,
					"voltage"		=> $reseller->designated_voltage,
					"price"			=> $reseller->price,
					"location"		=> $reseller->location,
					"connection_no"	=> $reseller->number_of_connection
				);
			}
			
			$this->response($data, 200);
		} else {
			$this->response(array("status"=>"error", "message"=>"no data"), 400);
		}
	}

	public function resellers_post() {
		$customer = $this->post('customer');
		$data = array(
			"license_no" => $this->post('license_no'),
			"licensee_name" => $this->post('licensee_name'),
			"price"			=> $this->post('price'),
			"designated_voltage" => $this->post('voltage'),
			"location" => $this->post('location'),
			"number_of_connection" => $this->post("connection_no"),
			"customer_id" => $customer['id']
		);
		$id = $this->reseller->insert($data);
		if($id) {
			$reseller = $this->reseller->get_by("id", $id);
			$data = array(
					"id"			=> $reseller->id,
					"customer"		=> $this->customer->get($reseller->customer_id),
					"license_no"	=> $reseller->license_no,
					"licensee_name" => $reseller->licensee_name,
					"voltage"		=> $reseller->designated_voltage,
					"price"			=> $reseller->price,
					"location"		=> $reseller->location,
					"connection_no"	=> $reseller->number_of_connection
				);
			$this->response($data, 200);
		}
		//$this->response(array("status"=>"error", "message"=>"no data"), 400);
	}

	public function resellers_put() {
		$customer = $this->put('customer');
		$data = array(
			"license_no" => $this->put('license_no'),
			"licensee_name" => $this->put('licensee_name'),
			"designated_voltage" => $this->put('voltage'),
			"price"			=> $this->put('price'),
			"location" => $this->put('location'),
			"number_of_connection" => $this->put("connection_no"),
			"customer_id" => $customer['id']
		);
		$id = $this->reseller->update($this->put('id'), $data);
		if($id) {
			$reseller = $this->reseller->get_by("id", $this->put('id'));
			$data = array(
					"id"			=> $reseller->id,
					"customer"		=> $this->customer->get($reseller->customer_id),
					"license_no"	=> $reseller->license_no,
					"licensee_name" => $reseller->licensee_name,
					"voltage"		=> $reseller->designated_voltage,
					"price"			=> $reseller->price,
					"location"		=> $reseller->location,
					"connection_no"	=> $reseller->number_of_connection
				);
			$this->response($data, 200);
		}
		$this->response(array("status"=>"error", "message"=>"no data"), 400);
	}

	public function resellers_delete() {
		$deleted_id = $this->delete('id');
		if($deleted_id > 0) {
			$this->reseller->delete($deleted_id);
			$this->response(array("status"=>"sucessful", "message"=>"$deleted_id is deleted."), 200);
		}
		$this->response(array("status"=>"error", "message"=>"no data"), 400);
	}
	
	public function resellerConnections_get() {

		$query = $this->connections->get_all();
		if(count($query) >0) {
			$this->response($query, 200);
		} else {
			$this->response(array("status"=>"error", "message"=>"no data"), 200);
		}
	}

	public function resellerConnections_post() {

	}
	
}