<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Companies extends REST_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('company_m', 'company');
		$this->load->model('license_m', 'license');
		$this->load->model('accounting/currency_model', 'currency');
	}
	
    function index_get() {
		$data = $this->company->current($this->session->userdata('company_id'))->get_all();
		
		if (!empty($data)) {
			foreach($data as $r){
				$company[] = array(
					"id" 				=> $r->id,
					"name"				=> $r->name,
					"parent_id" 		=> $r->parent_id,
					"year_founed" 		=> $r->year_founded,
					"image_url" 		=> $r->image_url,
					"operation_license" => $r->operation_license,
					"mobile"			=> $r->mobile,
					"phone" 			=> $r->phone,
					"address"			=> $r->address,
					"representative" 	=> $r->representative,
					"licenses_held" 	=> $this->license->count_all()
				);
			}
			$this->response($company, 200);
		} else {
			$api = array(
				"status" => "null"
			);
			$this->response($api, 200);
		}
    }
	
	function index_post() {
		$data =  $this->post();
		
		$msg = $this->company->insert($data);
		
		if ( $msg !== false ) {
			$this->response(array("status" => "data $msg is added to the database."), 200);
		} else {
			$this->response(array("status" => "cannot add to the database."), 400);
		}
	}
	
	function index_put() {
		$data 	=  $this->put();
		$id		= $this->put('id');			
		$msg 	= $this->company->update($id, $data);
		
		if ( $msg !== false ) {
			$this->response(array("status" => "data $msg is added to the database."), 200);
		} else {
			$this->response(array("status" => "cannot add to the database."), 400);
		}
	}
	
	function index_delete() {
		
		$id		= $this->delete('id');	
				
		$msg 	= $this->company->delete($id);
	}

	//By the great mighty Dawine
	//GET 
	function company_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){
			$arr = $this->company->get_many_by($filter['filters'][0]['field'], $filter['filters'][0]['value']);

			if(count($arr) >0){
				foreach($arr as $row) {
					//Add extra fields
					$extra = array('based_currencies' 	=> $this->currency->get($row->based_currency),
									'parents'			=> $this->company->get($row->parent_id)						   	
							  );

					//Cast object to array
					$original = (array) $row;

					//Merge arrays
					$data[] = array_merge($original, $extra);
				}
				$this->response($data, 200);
			}else{
				$empty_array = Array();
				$this->response($empty_array, 200);
			}			
		}else{
			$data = $this->company->get_all();	
		}				
		$this->response($data, 200);
	}
	
	//POST
	function company_post() {
		$data = array('name' 	=> $this->post('name'),
			'abbr'		 		=> $this->post('abbr'),			
			'year_founded'    	=> $this->post('year_founded'),
			'image_url' 		=> $this->post('image_url'),
			'operation_license' => $this->post('operation_license'),
			'mobile' 			=> $this->post('mobile'),
			'phone' 			=> $this->post('phone'),
			'email'				=> $this->post('email'),
			'address' 			=> $this->post('address'),
			'term_of_condition' => $this->post('term_of_condition'),
			'representative'  	=> $this->post('representative'),
			'fiscal_year' 		=> $this->post('fiscal_year'),
			'vat_no' 			=> $this->post('vat_no'),
			'based_currency'  	=> $this->post('based_currency'),
			'use_generator' 	=> $this->post('use_generator'),
			'parent_id' 		=> $this->post('parent_id')					
		);	
		$id = $this->company->insert($data);
		$this->response($id, 200);		
	}
	
	//PUT
	function company_put() {
		$data = array('name' 	=> $this->put('name'),
			'abbr'		 		=> $this->put('abbr'),			
			'year_founded'    	=> $this->put('year_founded'),
			'image_url' 		=> $this->put('image_url'),
			'operation_license' => $this->put('operation_license'),
			'mobile' 			=> $this->put('mobile'),
			'phone' 			=> $this->put('phone'),
			'email'				=> $this->put('email'),
			'address' 			=> $this->put('address'),
			'term_of_condition' => $this->put('term_of_condition'),
			'representative'  	=> $this->put('representative'),
			'fiscal_year' 		=> $this->put('fiscal_year'),
			'vat_no' 			=> $this->put('vat_no'),
			'based_currency'  	=> $this->put('based_currency'),
			'use_generator' 	=> $this->put('use_generator'),
			'parent_id' 		=> $this->put('parent_id')					
		);
 		$result = $this->company->update($this->put('id'), $data);
 		$this->response($result, 200);
	}
	
	//DELETE
	function company_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$result = $this->company->delete($this->delete('id'));
		$this->response($result, 200);
	}
	
}