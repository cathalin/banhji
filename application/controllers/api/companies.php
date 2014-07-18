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
		$filter = $this->get("filter");	
		if($filter) {		
			$criteria = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$criteria += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}
			$filterQuery = $this->company->order_by("created_at", "DESC")->get_many_by($criteria);
			if(count($filterQuery) > 0) {
				foreach($filterQuery as $r) {
					$data[] = array(
						"id" 				=> $r->id,
						"name"				=> $r->name,
						"parent_id" 		=> $r->parent_id,
						"year_founed" 		=> $r->year_founded,
						"image_url" 		=> $r->image_url,
						"operation_license" => $r->operation_license,
						"mobile"			=> $r->mobile,
						"phone" 			=> $r->phone,
						"address"			=> $r->address,
						"currency" 			=> $r->based_currency,
						"representative" 	=> $r->representative,
						"licenses_held" 	=> $this->license->count_all()
					);
	 			}
 				$this->response(array("status"=>"OK", "results"=>$data), 200);
			} else {
				$this->response(array("status"=>"false", "message"=>"There is no result found.", "results"=>array()), 200);
			}
		} else {
			$this->response(array("status"=>"false", "message"=>"company id is needed.", "results"=>array()), 200);
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
			$para = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}
			$arr = $this->company->get_many_by($para);

			if(count($arr) >0){
				foreach($arr as $row) {					

					//Add extra fields
					$extra = array('based_currencies' 	=> $this->currency->get_by("code",$row->based_currency),
									'parents'			=> $this->company->get($row->parent_id),
									'company_types' 	=> $this->get_company_types($row->company_type_id)						   	
							  );

					//Cast object to array
					$original = (array) $row;

					//Merge arrays
					$data[] = array_merge($original, $extra);
				}
				$this->response($data, 200);
			}else{
				$this->response(Array(), 200);
			}
		}else{
			$data = $this->company->get_all();
			$this->response($data, 200);
		}				
	}
	
	//POST
	function company_post() {
		$data = array('name' 	=> $this->post('name'),
			'abbr'		 		=> $this->post('abbr'),			
			'year_founded'    	=> $this->post('year_founded'),			
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
			'image_url' 		=> $this->post('image_url'),
			'company_type_id' 	=> $this->post('company_type_id'),
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
			'image_url' 		=> $this->put('image_url'),
			'company_type_id' 	=> $this->put('company_type_id'),
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

	//COMPANY TYPE
	function company_type_get() {
		$data = $this->get_company_types();
		$this->response($data, 200);
	}

	Private function get_company_types($id=0){
		$typeList = array(
			array(
				"id"	=> 1,
				"name"	=> "Sole proprietor"
			),
			array(
				"id"	=> 2,
				"name"	=> "Partnership"
			),
			array(
				"id"	=> 3,
				"name"	=> "Private company with limited liability"
			),
			array(
				"id"	=> 4,
				"name"	=> "Corporation or co-operative"
			),
			array(
				"id"	=> 5,
				"name"	=> "Charity or association"
			),
			array(
				"id"	=> 6,
				"name"	=> "Limited liability partnership"
			)
		);

		$data = array();
		if($id>0){
			foreach ($typeList as $row){
				if($id==$row["id"]){
					$data = $row;
					break;
				}
			}
		}else{
			$data = $typeList;
		}
		
		return $data;
	}
	
}