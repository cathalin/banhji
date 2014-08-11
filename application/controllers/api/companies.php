<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Companies extends REST_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('company_m', 'company');
		$this->load->model('license_m', 'license');		
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
		$limit = $this->get("pageSize");
		$offset = $this->get('skip');
		$sorter = $this->get("sort");

		if(!empty($filter) && isset($filter)){			
			//Filter
			$para = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}
			
			//Limit
			if(!empty($limit) && isset($limit)){
				$this->company->limit($limit, $offset);
			}			
			
			//Sort
			if(!empty($sorter) && isset($sorter)){			
				$sort = array();
				for ($j = 0; $j < count($sorter); ++$j) {				
					$sort += array($sorter[$j]['field'] => $sorter[$j]['dir']);
				}
				$this->company->order_by($sort);
			}

			$data["results"] = $this->company->get_many_by($para);
			$data["total"] = $this->company->count_by($para);

			$this->response($data, 200);			
		}else{
			$data["results"] = $this->company->get_all();
			$data["total"] = $this->company->count_all();
			$this->response($data, 200);
		}			
	}
	
	//POST
	function company_post() {		
		$id = $this->company->insert($this->post());
		$data = $this->company->get($id);

		$this->response($data, 201);			
	}
	
	//PUT
	function company_put() {
		$result = $this->company->update($this->put('id'), $this->put());		
		$this->response(array("updated"=>$result, "data"=>$this->put()), 200);
	}
	
	//DELETE
	function company_delete() {		
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