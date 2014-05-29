<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class People_api extends REST_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->load->model("people/people_model", "people");
		$this->load->model('people/people_type_model', 'people_type');

		$this->load->model('currency_m', 'currency');		
		$this->load->model('company_m', 'company');

		$this->load->model('accounting/class_model', 'classes');
		$this->load->model('accounting/journal_entry_model', 'j_entry');
		$this->load->model('license_m', 'license');

		$this->load->model('electricity_units/ampere_model', 'ampere');
		$this->load->model('electricity_units/fuse_model', 'fuse');
		$this->load->model('electricity_units/phase_model', 'phase');
		$this->load->model('electricity_units/voltage_model', 'voltage');

		$this->load->model('tariffs/tariff_plan_model', 'tariff_plan');
		$this->load->model('tariffs/maintenance_model', 'maintenance');
		$this->load->model('tariffs/exemption_model', 'exemption');

		$this->load->model('bill_model', 'bill');
		$this->load->model('bill_payment_m', 'bill_payment');
	}
	
	
	function location_get() {
		
		$location = array(
			"Phnom Penh" => array(
				"Toul Kork" => array("Beoung Kok I", "Beoung Kok II"),
				"Beoung Salang" => array()
			),
			"Takeo" => array(
				"Bati" => array("bati I")
			),
		);
		
		$this->response($location, 200);
	}
	
	
	function people_dropdown_get(){
		$data = $this->people->get_all();
		
		foreach($data as $row){
			$name = "";
			$type = "";
			if ($row->people_type_id == 1){
				//This is customer
				$name = $row->surname . " " . $row->name; 
				$type = "Customer";
			}
			else if ($row->people_type_id == 2){
				//This is vendor
				$name = $row->company;
				$type = "Vendor";
			}
			
			$arr[] = array(
				"id" 			 => $row->id,
				'name' 			 => $name,
				'type'			 => $type  
			);
			
		}
						
		$this->response($arr, 200);		
	}
	
	function vendor_dropdown_get(){
		$data = $this->people->get_all();
		$arr = array();
		
		foreach($data as $row) {
			$name = "";
			$type = "";
			
			if ($row->people_type_id == 7){
				//This is vendor	
				$arr[] = array(
					"id" 			 => $row->id,
					"name"			 => $row->company,
					"type"			 => "Vender"  
				);
			}	
		}				
		$this->response($arr, 200);		
	}

		
	function customer_dropdown_get(){
		$data = $this->people->get_all();
		$arr;
		foreach($data as $row){
			$name = "";
			$type = "";
			
			if ($row->people_type_id == 1){
				//This is customer
				$name = $row->surname . " " . $row->name; 
				$type = "Customer";
				
				$arr[] = array(
					"id" 			 => $row->id,
					'name' 			 => $name,
					'type'			 => $type  
				);
			}			
			
		}
						
		$this->response($arr, 200);		
	}

	//by Rith
	function index_get() {
		$id = $this->get('id');
		$customers;
		$filter = $this->get('filter');
		if($id > 0) {
			$customers = $this->people->customer()->get($id);
			$count = 1;
		} else {
			if(!empty($filter['filters'][0]['value'])){
				$condition = array(
					"surname"=>$filter['filters'][0]['value']
					//"name"=>$filter['filters'][0]['value'],
					//"id"=>$filter['filters'][0]['value']
				);
				$customers = $this->people->customer()
													  ->like("name", $filter['filters'][0]['value'])
													  ->limit($this->get('pageSize'),$this->get('skip'))
													  ->get_all();
				$count 	   = $this->people->customer()->get_all();
			}else {
				$customers = $this->people->customer()
													  ->limit($this->get('pageSize'),$this->get('skip'))
													  ->get_all();
				$count 	   = $this->people->customer()->get_all();
			}
			
		}
		$data['customers'] 	= $customers;
		$data['total'] 		= count($count);
		$this->response($data, 200);
		
	}

	function vendors_get() {
		$filter = $this->get('filter');
		$data ="";

		$data = $this->people->vendor($filter['filters'][0]['field'], $filter['filters'][0]['value'])->get_all();
		
		if(count($data) > 0) {
			foreach( $data as $r) {
				$vendors['vendors'][] = array(
					"ampere_id"			=> $r->ampere_id,
					"transformer_id"	=> $r->transformer_id,
					"bank_account"		=> $r->bank_account,
					"card_number"		=> $r->card_number,
					"commune_id"		=> $r->commune_id,
					"company"			=> $r->company,
					"created_at"		=> $r->created_at,
					"number"			=> $r->number,
					"balance"			=> $r->balance,
					"district_id"		=> $r->district_id,
					"dob"				=> $r->dob,
					"email"				=> $r->email,
					"exemption_id"		=> $r->exemption_id,
					"family_member"		=> $r->family_member,
					"gender"			=> $r->gender,
					"house_no"			=> $r->house_no,
					"id"				=> $r->id,
					"image_url"			=> $r->image_url,
					"job"				=> $r->job,
					"latitute"			=> $r->latitute,
					"license_id"		=> $r->license_id,
					"class_id"			=> $r->class_id,
					"longtitute"		=> $r->longtitute,
					"maintenance_id"	=> $r->maintenance_id,
					"memo"				=> $r->memo,
					"name"				=> $r->name,
					"parent_id"			=> $r->parent_id,
					"people_type_id"	=> $r->people_type_id,
					"phase_id"			=> $r->phase_id,
					"phone"				=> $r->phone,
					"pob" 				=> $r->pob,
					"province_id"		=> $r->province_id,
					"registered_date" 	=> $r->registered_date,
					"round_settle"		=> $r->round_settle,
					"ship_to"			=> $r->ship_to,
					"status" 			=> $r->status,
					"street_no" 		=> $r->street_no,
					"surname" 			=> $r->surname,
					"tariff_plan_id"	=> $r->tariff_plan_id,
					"updated_at" 		=> $r->updated_at,
					"village_id" 		=> $r->village_id,
					"voltage_id" 		=> $r->voltage_id,
					"zip_code" 			=> $r->zip_code,
					"open_bills"		=> $this->bill->count_by(array('status'=>0, "vendor_id"=> $r->id)),
					"amount_due"		=> $this->bill->amount_billed_by($r->id),
					"billed_amount" 	=> $this->bill_payment->amount_paid_by($r->id),
					"outstanding"		=> ($this->bill->amount_billed_by($r->id) - $this->bill_payment->amount_paid_by($r->id)),
					"bills"       		=> $this->_bills($r->id)
				);
			}
			$vendors['count'][] = count($vendors['vendors']);
			$this->response($vendors, 200);
		}
		else {
			$this->response(array("status"=>"error", "message"=>"There is no data found."), 400);
		}

		
		
	}

	/* --- PEOPLE --- */
	
	//GET 
	function people_get($type=1) {		
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
				$this->people->limit($limit, $offset);
			}			
			
			//Sort
			if(!empty($sorter) && isset($sorter)){			
				$sort = array();
				for ($j = 0; $j < count($sorter); ++$j) {				
					$sort += array($sorter[$j]['field'] => $sorter[$j]['dir']);
				}
				$this->people->order_by($sort);
			}
						
		 	$arr = $this->people->type($type)->get_many_by($para);		 	
			if(count($arr) >0){
				foreach($arr as $row) {
					$row->use_electricity = settype($row->use_electricity,'boolean');

				   	//Add extra fields
					$extra = array(																   	
								   	'currencies'	=> $this->currency->get_by("code", $row->currency_code),
								   	'companies'		=> $this->company->get($row->company_id)
							  );

					//Cast object to array
					$original =  (array) $row;

					//Merge arrays
					$data[] = array_merge($original, $extra);	
				}
				$this->response($data, 200);		
			}else{
				$this->response(array(), 200);
			}
		}else{
			$data = $this->people->get_all();
			$this->response($data, 200);
		}
	}
	
	//POST
	function people_post() {
		$data = array(
			'people_type_id'	=> $this->post('people_type_id'),
			'use_electricity'	=> $this->post('use_electricity'),
			'use_water'			=> $this->post('use_water'),
			'number'	 		=> $this->post('number'),
			'surname'	 		=> $this->post('surname'),
			'name'	 			=> $this->post('name'),				  	  
			'gender'	 		=> $this->post('gender'),
			'dob'	 			=> $this->post('dob'),
			'pob'	 			=> $this->post('pob'),
			'phone'	 			=> $this->post('phone'),
			'email'	 			=> $this->post('email'),
			'family_member'		=> $this->post('family_member'),
			'memo'	 			=> $this->post('memo'),
			'image_url'	 		=> $this->post('image_url'),
			'card_number'	 	=> $this->post('card_number'),
			'job'	 			=> $this->post('job'),
			'company'	 		=> $this->post('company'),
			'bank_account'		=> $this->post('bank_account'),
			'credit_limit'	 	=> $this->post("credit_limit"),

			'zip_code' 			=> $this->post('zip_code'),			
			'address'			=> $this->post('address'),
			'address2'			=> $this->post('address2'),
			'address3'			=> $this->post('address3'),
			'address4'			=> $this->post('address4'),					
			
			'class_id' 			=> $this->post('class_id'),
			'transformer_id'	=> $this->post('transformer_id'),
			'province_id'	 	=> $this->post('province_id'),
			'district_id'	 	=> $this->post('district_id'),
			'commune_id'	 	=> $this->post('commune_id'),
			'village_id'	 	=> $this->post('village_id'),
			'latitute' 			=> $this->post('latitute'),
			'longtitute' 		=> $this->post('longtitute'),

			'ampere_id'	 		=> $this->post('ampere_id'),
			'phase_id'	 		=> $this->post('phase_id'),
			'voltage_id'	 	=> $this->post('voltage_id'),

			'tariff_plan_id'	=> $this->post('tariff_plan_id'),
			'maintenance_id'  	=> $this->post('maintenance_id'),
			'exemption_id'		=> $this->post('exemption_id'),
						
			'status'	 		=> $this->post('status'),
			'registered_date'	=> date('Y-m-d', strtotime($this->post('registered_date'))),

			'currency_code'			=> $this->post('currency_code'),
			'vat_no'				=> $this->post('vat_no'),
			'account_receiveable_id'=> $this->post('account_receiveable_id'),
			'revenue_account_id'	=> $this->post('revenue_account_id'),
			'account_payable_id'	=> $this->post('account_payable_id'),			

			'company_id'			=> $this->post('company_id')
		);			
		$id = $this->people->insert($data);
		$this->response($id, 200);		
	}
	
	//PUT
	function people_put() {
		$data = array(
			'people_type_id'	=> $this->put('people_type_id'),
			'use_electricity'	=> $this->put('use_electricity'),
			'use_water'			=> $this->put('use_water'),
			'number'	 		=> $this->put('number'),
			'surname'	 		=> $this->put('surname'),
			'name'	 			=> $this->put('name'),				  	  
			'gender'	 		=> $this->put('gender'),
			'dob'	 			=> $this->put('dob'),
			'pob'	 			=> $this->put('pob'),
			'phone'	 			=> $this->put('phone'),
			'email'	 			=> $this->put('email'),
			'family_member'		=> $this->put('family_member'),
			'memo'	 			=> $this->put('memo'),
			'image_url'	 		=> $this->put('image_url'),
			'card_number'	 	=> $this->put('card_number'),
			'job'	 			=> $this->put('job'),
			'company'	 		=> $this->put('company'),
			'bank_account'		=> $this->put('bank_account'),
			'balance'			=> $this->put('balance'),
			'deposit_amount' 	=> $this->put("deposit_amount"),
			'credit_limit'	 	=> $this->put("credit_limit"),

			'zip_code' 			=> $this->put('zip_code'),			
			'address'			=> $this->put('address'),
			'address2'			=> $this->put('address2'),
			'address3'			=> $this->put('address3'),
			'address4'			=> $this->put('address4'),			
			
			'class_id' 			=> $this->put('class_id'),
			'transformer_id'	=> $this->put('transformer_id'),
			'province_id'	 	=> $this->put('province_id'),
			'district_id'	 	=> $this->put('district_id'),
			'commune_id'	 	=> $this->put('commune_id'),
			'village_id'	 	=> $this->put('village_id'),
			'latitute' 			=> $this->put('latitute'),
			'longtitute' 		=> $this->put('longtitute'),

			'ampere_id'	 		=> $this->put('ampere_id'),
			'phase_id'	 		=> $this->put('phase_id'),
			'voltage_id'	 	=> $this->put('voltage_id'),

			'tariff_plan_id'	=> $this->put('tariff_plan_id'),
			'maintenance_id'  	=> $this->put('maintenance_id'),
			'exemption_id'		=> $this->put('exemption_id'),
						
			'status'	 		=> $this->put('status'),
			'registered_date'	=> date("Y-m-d", strtotime($this->put('registered_date'))),

			'currency_code'			=> $this->put('currency_code'),
			'vat_no'				=> $this->put('vat_no'),
			'account_receiveable_id'=> $this->put('account_receiveable_id'),
			'revenue_account_id'	=> $this->put('revenue_account_id'),
			'account_payable_id'	=> $this->put('account_payable_id'),			

			'company_id'			=> $this->put('company_id')
		);
 		$result = $this->people->update($this->put('id'), $data);
 		$this->response($result, 200);
	}
	
	//DELETE
	function people_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->people->delete($this->delete('id'));
	}

	//PEOPLE LIST 
	function people_list_get($type=1) {		
		$filter = $this->get("filter");				
		if(!empty($filter) && isset($filter)){
			$limit 	= $this->get('pageSize');
			$offset = $this->get('skip');			
			$para = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}			
		 	$arr = $this->people->type($type)->limit($limit, $offset)->get_many_by($para);		 			 	
			if(count($arr) >0){
				foreach($arr as $row) {					
				   	//Add extra fields
					$extra = array('people_types'=> $this->people_type->get($row->people_type_id),
									'currencies' => $this->currency->get_by('code', $row->currency_code),
									'classes' => $this->classes->get($row->class_id)
							  );

					//Cast object to array
					$original =  (array) $row;

					//Merge arrays
					$data['customers'][] = array_merge($original, $extra);	
				}
				$data['total'] = $this->people->type($type)->count_by($para);
				$this->response($data, 200);		
			}else{
				$this->response(array(), 200);
			}
		}
	}
	
	//ADD PEOPLE
	function add_people_post() {
		$customers = $this->post();
		//Remove index
		foreach ($customers as $key => $value) {
		 	$d = $value;			
		}
		
		$dd = json_decode($d);

		foreach ($dd as $k => $v) {
			$data = $v;
		}
					
		$id = $this->people->insert($data);
		$this->response($id, 200);		
	}

	//UPDATE BALANCE
	function balance_batch_put(){	   	
		$put = json_decode($this->put("data"));
	   			
	  	$result = $this->people->balance_batch($put);
	  	if($result > 0 ) {
	  		$this->response(array("status"=>"OK","msg"=>"updated!"), 200);
	  	} else {
	  		$this->response(array("status"=>"error","msg"=>"cannot update"), 400);
	  	}	
	}

	//UPDATE DEPOSIT
	function deposit_put(){	   	
		$id = $this->put("id");
		$amount = $this->put("amount");

	  	$result = $this->people->update($id, array("deposit_amount"=>$amount));	  	
	  	$this->response($result, 200);
	  	
	}
	
	//CUSTOMER SEARCH
	function customer_search_get() {		
		$filter = $this->get("filter");		
		$limit 	= $this->get('pageSize');
		$offset = $this->get('skip');			
		$para = array();				
		for ($i = 0; $i < count($filter['filters']); ++$i) {				
			$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
		}

		$cusPara = array();
		if(!empty($para["transformer_id"]) && isset($para["transformer_id"])){
			$cusPara += array("transformer_id"=>$para["transformer_id"]);
		}

	 	$this->people->type(1);

	 	if(!empty($limit) && isset($limit)){
	 		$this->people->limit($limit, $offset);
	 	}

	 	if(!empty($para["searchField"]) && isset($para["searchField"])){
	 		$field = $para["searchField"];
			$this->people->where("number LIKE", $field)
						->or_where("surname LIKE", $field)
						->or_where("name LIKE", $field)
						->or_where("id LIKE", $field);
		}

	 	$arr = $this->people->get_many_by($cusPara);		 	
		if(count($arr) >0){
			foreach($arr as $row) {
								
			   	//Add extra fields
				$extra = array( 'currencies'	=> $this->currency->get_by("code", $row->currency_code),							
								'people_types'	=> $this->people_type->get($row->people_type_id),
							   	//'amperes' 		=> $this->ampere->get($row->ampere_id), 
							   	// 'phases' 		=> $this->phase->get($row->phase_id),
							   	// 'voltages'		=> $this->voltage->get($row->voltage_id),
							   	// 'tariff_plans' 	=> $this->tariff_plan->get($row->tariff_plan_id), 
							   	// 'maintenances' 	=> $this->maintenance->get($row->maintenance_id),
							   	// 'exemptions'	=> $this->exemption->get($row->exemption_id),
							   	// 'classes'		=> $this->classes->get($row->class_id)							   	
						  );

				//Cast object to array
				$original =  (array) $row;

				//Merge arrays
				$data[] = array_merge($original, $extra);	
			}
			$this->response($data, 200);		
		}else{
			$this->response(FALSE, 200);
		}		
	}

	function customer_listview_get() {		
		$filter = $this->get("filter");		
					
		$para = array();				
		for ($i = 0; $i < count($filter['filters']); ++$i) {				
			$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
		}

		$cusPara = array();		
		
		if(!empty($para["transformer_id"]) && isset($para["transformer_id"])){
			$cusPara += array("transformer_id"=>$para["transformer_id"]);
		}

	 	$this->people->type(1);
	 	$limit 	= $this->get('pageSize');
		$offset = $this->get('skip');
	 	if(!empty($limit) && isset($limit)){
	 		$this->people->limit($limit, $offset);
	 	}
	 	
	 	if(!empty($para["searchField"]) && isset($para["searchField"])){
	 		$field = $para["searchField"];	 		
			$this->people->where("number LIKE", $field)
						->or_where("company LIKE", $field)
						->or_where("surname LIKE", $field)
						->or_where("name LIKE", $field)
						->or_where("id LIKE", $field);
		}

	 	$arr = $this->people->get_many_by($cusPara);		 	
		if(count($arr)>0){
			foreach ($arr as $row) {								
				$row->registered_date = date("d-m-Y", strtotime($row->registered_date));
				$row->use_electricity = settype($row->use_electricity,'boolean');

				$extra = array( 								
								
							   	'currencies'	=> $this->currency->get_by("code", $row->currency_code)							   	
						);

				//Cast object to array
				$original =  (array) $row;

				//Merge arrays
				$data[] = array_merge($original, $extra);				
			}

			$this->response($data, 200);		
		}else{
			$this->response(array(), 200);
		}		
	}	

	//CHECK EXISTING CUSTOMER NO
	function check_existing_number_get(){
		$number = $this->get("number");
		$data = $this->people->get_by("number", $number);
		$result = false;
		if(count($data)>0){
			$result = true;
		}
		$this->response($result, 200);
	}

	//GET LAST NUMBER
	function last_no_get(){
		$company_id = $this->get("company_id");
		$data = $this->people->order_by('number', 'desc')->get_by('company_id', $company_id);
		$this->response($data, 200);
	}	

	//Customer for ddl
	function customer_ddl_get(){	
		$filter = $this->get('filter');	
		$arr = $this->people->customer($filter['filters'][0]['field'], $filter['filters'][0]['value'])->dropdown('id','name');
		$data = array();
		foreach ($arr as $key => $value) {
		    $data[] = array(
		    	"id" 	=> $key,
		    	"name" 	=> $value
		    );
		}		
		$this->response($data, 200);
	}
		
	
	/* --- PEOPLE TYPES: By Dawine --- */
	
	//GET 
	function people_type_get() {
		$filter = $this->get("filter");				
		if(!empty($filter) && isset($filter)){					
			$para = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}
			$data = $this->people_type->get_many_by($para);
			$this->response($data, 200);
		}else{
			$data = $this->people_type->get_all();
			$this->response($data, 200);	
		}		
	}
	
	//POST
	function people_type_post() {	
		$this->people_type->insert($this->post());		
	}
	
	//PUT
	function people_type_put() {
 		 $this->people_type->update($this->put('id'), $this->put());
	}
	
	//DELETE
	function people_type_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->people_type->delete($this->delete('id'));
	}

	private function _bills($vendor_id = 0) {
		if($vendor_id > 0) {
			$data = $this->bill->get_many_by("vendor_id", $vendor_id);

			if(count($data) > 0) {
				foreach($data as $row) {
					$bills[] = array(
						"id" 			=> $row->id,
						"vendor_id" 	=> $row->vendor_id,
						"bill_type" 	=> $row->bill_type,
						"amount_billed" => $row->amount_billed,
						"amount_due" 	=> ($row->amount_billed - $this->bill_payment->amount_paid($row->id)),
						"amount_paid" 	=> $this->bill_payment->amount_paid($row->id),
						"amount_pay" 	=> 0,
						"date"			=> $row->date,
						"status"		=> $row->status
					);
				}
				return $bills;				
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
		
	}
}
	