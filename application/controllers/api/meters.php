<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Meters extends REST_Controller {
	
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('inventory/meter_model', 'meter');
		$this->load->model('inventory/meter_record_model', 'meter_record');
		$this->load->model('inventory/item_model', 'item');
		$this->load->model('inventory/electricity_box_model', 'electricity_box');
		$this->load->model('people/people_model', 'people');

		$this->load->model('tariffs/Tariff_model', 'tariff');
		$this->load->model('tariffs/Tariff_item_model', 'tariff_item');		
	}

	
	//GET 
	function meter_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){			
			$para = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}			
			$arr = $this->meter->get_many_by($para);
		
			if(count($arr) >0){
				foreach($arr as $row) {					
				   	//Add extra fields
					$extra = array('items'					=> $this->item->get($row->item_id),
								    'parents'				=> $this->meter->get($row->parent_id),
								    'electricity_boxes'		=> $this->electricity_box->get($row->electricity_box_id),								    
								    'avg'					=> $this->meter_record->avg($row->id),								   								   	
								   	'meter_records'			=> $this->meter_record->order_by('id', 'DESC')->get_by('meter_id', $row->id)						   	
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
			$data = $this->meter->get_all();
			$this->response($data, 200);
		}		
	}
	
	//POST
	function meter_post() {
		$data = array('type' 				=> $this->post('type'),
					'meter_no' 				=> $this->post('meter_no'),
					'multiplier' 			=> $this->post('multiplier'),
					'max_digit' 			=> $this->post('max_digit'),
					'status' 				=> $this->post('status'),
					'ear_sealed' 			=> $this->post('ear_sealed'),					 
					'cover_sealed'			=> $this->post('cover_sealed'),
					'tariff_id'				=> $this->post('tariff_id'),
					'memo'					=> $this->post('memo'),
					'customer_id' 			=> $this->post('customer_id'),
					'item_id' 				=> $this->post('item_id'),
					'transformer_id' 		=> $this->post('transformer_id'),										
					'electricity_box_id'	=> $this->post('electricity_box_id'),
					'date_used' 			=> $this->post('date_used'),
					'parent_id'				=> $this->post('parent_id')					
		);			
		$id = $this->meter->insert($data);

		/*//Meter record
		$date = new DateTime($this->post('date_used'));		
		$m = $date->format('m');
		$Y = $date->format('Y');
		$date->setDate($Y , $m , 1);

		$firstReading = array('meter_id'	=> $id,				   	
				   	'month_of' 				=> $date->format('Y-m-d'),
				   	'date_read_to'			=> $this->post('date_used'),
				   	'date_read_from'		=> $this->post('date_used'),
				   	'invoice_id'			=> -1			   				
		);
		$mrID = $this->meter_record->insert($firstReading);*/

		$this->response($id, 200);					
	}
	
	//PUT
	function meter_put() {
		$data = array('type' 				=> $this->put('type'),
					 'meter_no' 			=> $this->put('meter_no'),
					 'multiplier' 			=> $this->put('multiplier'),
					 'max_digit' 			=> $this->put('max_digit'),
					 'status' 				=> $this->put('status'),
					 'ear_sealed' 			=> $this->put('ear_sealed'),
					 'cover_sealed'			=> $this->put('cover_sealed'),					 
					 'tariff_id'			=> $this->put('tariff_id'),
					 'memo'					=> $this->put('memo'),					 
					 'customer_id' 			=> $this->put('customer_id'),
					 'item_id' 				=> $this->put('item_id'),
					 'transformer_id' 		=> $this->put('transformer_id'),				 
					 'electricity_box_id'	=> $this->put('electricity_box_id'),					 
					 'date_used' 			=> $this->put('date_used'),					 
					 'parent_id'			=> $this->put('parent_id')					 
		);		
		$this->meter->update($this->put('id'), $data);
	}
	
	//DELETE
	function meter_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->meter->delete($this->delete('id'));
	}

	//PARENT METER
	function parent_meter_get(){
		$filter = $this->get("filter");		
		$data = $this->meter->get_many_by(array($filter['filters'][0]['field']=>$filter['filters'][0]['value'],
												"parent_id"=>0, "status"=>1));					
		$this->response($data, 200);
	}
	
	//GET METERS FOR READING
	function meter_reading_get() {
		$filter = $this->get("filter");		
		$para = array();				
		for ($i = 0; $i < count($filter['filters']); ++$i) {				
			$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
		}

		$arr = $this->meter->get_many_by($para);
		if(count($arr) >0){
			foreach($arr as $row) {
				//$meter_record_id = $this->meter_record->max($row->id);
				$meter_record = $this->meter_record->order_by('month_of', 'DESC')->get_by('meter_id', $row->id);
				$prev_reading = "";
				$reactive_prev_reading = "";
				if(count($meter_record)>0){
					$prev_reading = $meter_record->new_reading;
					$reactive_prev_reading = $meter_record->reactive_new_reading;
				}

			   	//Add extra fields
				$extra = array('people'				=> $this->people->get($row->customer_id),						    
						    'electricity_boxes'		=> $this->electricity_box->get($row->electricity_box_id),					  		
						    //'meter_records'			=> $this->meter_record->get($meter_record_id),
						    'meter_records'			=> $meter_record,

						    'rcheckNewRound'		=> false,
						    'reactive_prev_reading'	=> $reactive_prev_reading,				  		
					  		'reactive_new_reading' 	=> "",
					  		'checkNewRound'			=> false,
					  		'prev_reading'			=> $prev_reading,					  		
					  		'new_reading'			=> ""						   	
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
			
	}

	//GET METERS FOR UNREAD
	function meter_unread_get() {
		$filter = $this->get("filter");

		$transformer_id = $filter['filters'][0]['value'];
		$month_of = $filter['filters'][1]['value'];

		$arr = $this->meter->get_many_by(array("meters.transformer_id"=>$transformer_id, "meters.status"=>1));

		$data = Array();							
		if(count($arr) >0){
			foreach($arr as $row) {					
				$meter_record = $this->meter_record->get_by('month_of', $month_of);
				if(count($meter_record)<1){	  
					$data[] = array(
						'id' 					=> $row->id,					   		
				  	 	'meter_no'				=> $row->meter_no,					  	 	
				  	 	'parent_id'				=> $row->parent_id,
				  	 	'tariff_id'				=> $row->tariff_id,			  	 	
				  	 	'max_digit'				=> $row->max_digit,			  	 	

				  	 	'customers'				=> $this->people->get($row->customer_id),						    
					    'electricity_boxes'		=> $this->electricity_box->get($row->electricity_box_id),
				  	 	'meter_records'			=> $this->meter_record->get_by(array('meter_id'=>$row->id,'month_of <'=>$month_of)),		    

					    'rcheckNewRound'		=> false,					  		
				  		'reactive_new_reading' 	=> "",
				  		'checkNewRound'			=> false,					  		
				  		'new_reading'			=> ""					  									    								   
					);
				}
			}
			$this->response($data, 200);		
		}else{			
			$this->response(Array(), 200);
		}
			
	}

	//CUSTOMER METER 
	/*function customer_meter_get(){
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){			
			$data = $this->meter->get_many_by(array($filter['filters'][0]['field'] =>  $filter['filters'][0]['value'],
														   'parent_id' => 0));
			if(count($data)>0){				
			 	$this->response($data, 200);		
			}else{
				$this->response(FALSE, 200);
			}
		}else{
			$this->response(FALSE, 200);
		}		
	}*/

	//GET METER BY ID
	/*function meter_by_id_get(){
		$meter_id = $this->get('meter_id');
		$data = $this->meter->get_by('id', $meter_id);
		$this->response($data, 200);
	}*/

	//GET METERS
	/*function meter_by_get() {
		$filter = $this->get("filter");

		//Remove filters and logic		
		foreach($filter as $key => $value) {			
			if($key==="filters"){
				$no_filter = $value;

				//Remove index
				foreach($no_filter as $k => $v) {			
					$para = $v;						
				}
				break;				
			}								
		}

		$arr = $this->meter->get_many_by($para);			
		if(count($arr) >0){
			foreach($arr as $row) {				  
				$data[] = array('id' 					=> $row->id,
							    'meter_no'				=> $row->meter_no,
							    'multiplier'			=> $row->multiplier,
							    'status' 				=> $row->status,
							    'ear_sealed' 			=> $row->ear_sealed,
							    'cover_sealed'			=> $row->cover_sealed,								   
							    'tariff_id'				=> $row->tariff_id,
							    'memo'					=> $row->memo,			   
							    'customer_id' 			=> $row->customer_id,
							    'item_id' 				=> $row->item_id,								   
							    'electricity_box_id'	=> $row->electricity_box_id,
							    'date_used' 			=> $row->date_used,
							    'parent_id'				=> $row->parent_id,
							    
							    'tariff_items'			=> $this->tariff_item->get_many_by('tariff_id', $row->tariff_id),							  								   								   
							    'items'					=> $this->item->get($row->item_id),							   
							    'meter_records'			=> $this->meter_record->order_by("id", "desc")->limit(1)->get_by('meter_id', $row->id),
							    'avg'					=> $this->meter_record->avg($row->id),
							    'active_usage'			=> $this->meter_record->active_usage($row->id),
							    'reactive_usage'		=> $this->meter_record->reactive_usage($row->id),
							    'min_active_reading'	=> $this->meter_record->min_active_reading($row->id),
								'min_reactive_reading'	=> $this->meter_record->min_reactive_reading($row->id)							   						   
						  );	
			}
			$this->response($data, 200);		
		}else{
			$this->response(FALSE, 200);
		}			
	}*/

	
	
}//End Of Class