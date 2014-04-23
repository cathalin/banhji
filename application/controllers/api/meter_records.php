<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Meter_records extends REST_Controller {
		
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('inventory/meter_record_model', 'meter_record');
		$this->load->model('inventory/meter_model', 'meter');
		$this->load->model('inventory/electricity_box_model', 'electricity_box');
		$this->load->model("people/people_model", "people");

		$this->load->model('tariffs/Tariff_model', 'tariff');
		$this->load->model('tariffs/Tariff_item_model', 'tariff_item');
		$this->load->model('tariffs/Tariff_plan_model', 'tariff_plan');
		$this->load->model('tariffs/Plan_item_model', 'plan_item');
		$this->load->model('tariffs/Exemption_model', 'exemption');
		$this->load->model('tariffs/Maintenance_model', 'maintenance');			
	}	
	
	
	//GET 
	function meter_record_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){
			$para = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}			
			
			$limit 	= $this->get('pageSize');
			$offset = $this->get('skip');
			if(!empty($limit) && isset($limit)){
				$this->meter_record->limit($limit, $offset);
			}			
			$arr = $this->meter_record->get_many_by($para);
			if(count($arr) >0){
				foreach($arr as $row) {					
					$activeUsage = ($row->new_reading + $row->new_round) - $row->prev_reading;					
					$reactiveUsage = ($row->reactive_new_reading + $row->reactive_new_round) - $row->reactive_prev_reading;

					//Add extra fields
					$extra = array('active_usage' 		=> $activeUsage,
								   	'reactive_usage'	=> $reactiveUsage,
								   	'isCheck'			=> false								   					   
					);

					//Cast object to array
					$original =  (array) $row;

					//Merge arrays
					$data[] = array_merge($original, $extra);	
				}
				$this->response($data, 200);		
			}else{
				$empty_array = Array();
				$this->response($empty_array, 200);
			}						
		}else{
			$data = $this->meter_record->get_all();
			$this->response($data, 200);	
		}				
	}
	
	//POST
	function meter_record_post() {
		$data = array('meter_id'			=> $this->post('meter_id'),
				   	'prev_reading'			=> $this->post('prev_reading'),
				   	'new_reading' 			=> $this->post('new_reading'),
				   	'new_round' 			=> $this->post('new_round'),
				   	'reactive_prev_reading'	=> $this->post('reactive_prev_reading'),								   
				   	'reactive_new_reading'	=> $this->post('reactive_new_reading'),
				   	'reactive_new_round'	=> $this->post('reactive_new_round'),			   
				   	'is_backup_reading' 	=> $this->post('is_backup_reading'),
				   	'month_of' 				=> $this->post('month_of'),
				   	'date_read_from'		=> $this->post('date_read_from'),								   
				   	'date_read_to'			=> $this->post('date_read_to'),
				   	'reader' 				=> $this->post('reader'),
				   	'invoice_id'			=> $this->post('invoice_id')					
		);		
		$id = $this->meter_record->insert($data);
		$this->response($id, 200);				
	}
	
	//PUT
	function meter_record_put() {
		$data = array('id'					=> $this->put('id'),
					'meter_id'				=> $this->put('meter_id'),
				   	'prev_reading'			=> $this->put('prev_reading'),
				   	'new_reading' 			=> $this->put('new_reading'),
				   	'new_round' 			=> $this->put('new_round'),
				   	'reactive_prev_reading'	=> $this->put('reactive_prev_reading'),								   
				   	'reactive_new_reading'	=> $this->put('reactive_new_reading'),
				   	'reactive_new_round'	=> $this->put('reactive_new_round'),			   
				   	'is_backup_reading' 	=> $this->put('is_backup_reading'),
				   	'month_of' 				=> $this->put('month_of'),
				   	'date_read_from'		=> $this->put('date_read_from'),								   
				   	'date_read_to'			=> $this->put('date_read_to'),
				   	'reader' 				=> $this->put('reader'),
				   	'invoice_id'			=> $this->put('invoice_id')					
		);
		$this->meter_record->update($this->put('id'), $data);
	}
	
	//DELETE
	function meter_record_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->meter_record->delete($this->delete('id'));
	}

	//POST BATCH
	function meter_record_batch_post() {
		$post = $this->post();		
		foreach($post as $key => $value) {			
				$data[] = $value;			
		}
		$ids = $this->meter_record->insert_many($data);
		$this->response($ids, 200);				
	}

	//UPDATE BATCH
	function meter_record_batch_put(){
		$put = json_decode($this->put("data"));
	   	//$data = array();	  		  	
		
	  	$result = $this->meter_record->update_batch($put);
	  	if($result > 0 ) {
	  		$this->response(array("status"=>"OK","msg"=>"updated!"), 200);
	  	} else {
	  		$this->response(array("status"=>"error","msg"=>"cannot update"), 400);
	  	}			
	}	

	//UPDATE READING
	function meter_record_reading_put(){
		$id = $this->put("id");
		$put = json_decode($this->put("data"));
	   		  		  	
		foreach($put as $key => $value) {			
			$data = $value;												
		}

	  	$result = $this->meter_record->update($id, $data);
		$this->response($result, 200);		
	}
		
	//GET METER RECORD BY CUSTOMER ID
	function meter_record_by_customer_get(){
		$filter = $this->get("filter");
		$empty_array = Array();		
		if(!empty($filter) && isset($filter)){
			$arr = $this->meter_record->get_many_by(array($filter['filters'][0]['field']=>$filter['filters'][0]['value'], 'invoice_id'=>0, 'is_backup_reading'=>0));			
			if(count($arr) >0){
				foreach($arr as $row) {					
					$active_usage += ($row->new_reading+$row->new_round)-$row->prev_reading;	
					$reactive_usage += ($row->reactive_new_reading+$row->reactive_new_round)-$row->reactive_prev_reading;							
					
					//Add extra fields
					$extra = array('active_usage'			=> $active_usage,
								   	'reactive_usage'		=> $reactive_usage,
								   	'meters'				=> $this->meter->get($row->meter_id)								   								   							   
							  );

					//Cast object to array
					$original =  (array) $row;

					//Merge arrays
					$data[] = array_merge($original, $extra);	
				}				
				$this->response($data, 200);		
			}else{				
				$this->response($empty_array, 200);
			}
		}else{			
			$this->response($empty_array, 200);	
		}		
	}

	//GET CUSTOMER TOTAL USAGE BY AREA
	function customer_total_usage_by_area_get(){
		$filter = $this->get("filter");
		$empty_array = Array();		
		if(!empty($filter) && isset($filter)){
			$tariffPlanID = 0;
			$tariffID = 0;						
			$pp = $this->people->people_by_type(1)->get_many_by(array($filter['filters'][0]['field']=>$filter['filters'][0]['value'],
																	'status'=>1));
			$data = array();
			if(count($pp)>0){
				foreach($pp as $row) {					
					$totalActiveUsage = 0;
					$totalReactiveUsage = 0;
					$dateReadFrom = date("0000-00-00");
					$dateReadTo = date("0000-00-00");
					$monthOfReading = date("0000-00-00");
					$meters = array();
					$meterRecordIDs = array();

					//Meter list
					$meterList = $this->meter->get_many_by(array('customer_id'=>$row->id, 'status'=>1, 'parent_id'=>0));
					if(count($meterList)>0){
						$hasReading = false;
						foreach($meterList as $m){
							
							$activeMinReading = 0;
							$reactiveMinReading = 0;
							$activeMaxReading = 0;
							$reactiveMaxReading = 0;
							$activeUsage = 0;
							$reactiveUsage = 0;

							//Loop through meter record list
							$meterRecordList = $this->meter_record->get_many_by(array('meter_id'=>$m->id, 'is_backup_reading'=>0, 'invoice_id'=>0));
							if(count($meterRecordList)>0){

								$hasReading = true;
								$nCounter = 0;

								foreach($meterRecordList as $n){
									$meterRecordIDs[] = $n->id;

									//First row
									if($nCounter==0){
										$activeMinReading = $n->prev_reading;
										$reactiveMinReading = $n->reactive_prev_reading;
										$dateReadFrom = $n->date_read_from;
										$monthOfReading = $n->month_of;									
									}

									//Last row
									if($nCounter==count($meterRecordList)-1){
										$activeMaxReading = $n->new_reading;
										$reactiveMaxReading = $n->reactive_new_reading;
										$dateReadTo = $n->date_read_to;
									}

									$activeUsage += $n->new_reading + $n->new_round - $n->prev_reading;
									$reactiveUsage += $n->reactive_new_reading + $n->reactive_new_round - $n->reactive_prev_reading;
									$nCounter++;								
								}//End for($n=0; $i<count($meterRecordList); $n++)
							}//End if(count($meterRecordList)>0)							

							//Add up total usage both active and reactive
							$totalActiveUsage += $activeUsage;
							$totalReactiveUsage += $reactiveUsage;

							//Add array to meter
							$meters[] = array('id' 			=> $m->id,
								    'meter_no'				=> $m->meter_no,
								    'multiplier'			=> $m->multiplier,
								    'status' 				=> $m->status,
								    'ear_sealed' 			=> $m->ear_sealed,
								    'cover_sealed'			=> $m->cover_sealed,								   
								    'tariff_id'				=> $m->tariff_id,
								    'memo'					=> $m->memo,			   
								    'customer_id' 			=> $m->customer_id,
								    'item_id' 				=> $m->item_id,								   
								    'electricity_box_id'	=> $m->electricity_box_id,
								    'date_used' 			=> $m->date_used,
								    'parent_id'				=> $m->parent_id,

								    'tariff_items'			=> $this->tariff_item->order_by('usage', 'desc')
								    								->get_many_by('tariff_id', $m->tariff_id),
								    
								    'active_min_reading'	=> $activeMinReading,
									'active_max_reading'	=> $activeMaxReading,
									'reactive_min_reading'	=> $reactiveMinReading,
									'reactive_max_reading'	=> $reactiveMaxReading,
								    'active_usage'			=> $activeUsage,
								    'reactive_usage'		=> $reactiveUsage								    							   						   
							);
						}

						if($hasReading){						
							//Get tariff items						
							if($tariffPlanID!==$row->tariff_plan_id){
								$tariffPlanID = $row->tariff_plan_id;					
								$planItemArr = $this->plan_item->order_by('start_date', 'desc')
													->get_many_by('tariff_plan_id', $tariffPlanID);

								//Loop through plan item to get tariff id					
								foreach($planItemArr as $p){
									$startDate = $p->start_date;
									if($monthOfReading>=$startDate){
										$tariffID = $p->tariff_id;
										break;
									}
								}
							}//End if($tariffPlanID!==$row->tariff_plan_id)					

							//List of customer						
							$data[] = array('id' 					=> $row->id,									
											'number'				=> $row->number,								   
										   	'fullname'				=> $row->surname.' '.$row->name,
										   	'people_type_id'		=> $row->people_type_id,
										   	'address'				=> $row->house_no.' '.$row->street_no,
										   	'balance'				=> $row->balance,

										   	'maintenance_id'		=> $row->maintenance_id,
										   	'exemption_id'			=> $row->exemption_id,
										   	'tariff_id'				=> $tariffID,
										   	'tariff_items'			=> $this->tariff_item->order_by('usage', 'desc')
																			->get_many_by('tariff_id', $tariffID),

											'meters'				=> $meters,
											'meter_record_ids'		=> $meterRecordIDs,								
											'date_read_from' 		=> $dateReadFrom,
											'date_read_to'			=> $dateReadTo,								   									   	 
											'total_active_usage'	=> $totalActiveUsage,							
											'total_reactive_usage' 	=> $totalReactiveUsage										
							);
						}//End 
						
					}//End if(count($meterList)>0)		
					
			  	
				}//End foreach($pp as $row)		
				$this->response($data, 200);		
			}else{
				$this->response($empty_array, 200);
			}
		}else{
			$this->response($empty_array, 200);	
		}	
	}

	//GET METER RECORD FOR INVOICE
	function meter_record_for_invoice_get(){
		$filter = $this->get("filter");					
		
		$para = array();				
		for ($i = 0; $i < count($filter['filters']); ++$i) {				
			$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
		}			
		$arr = $this->meter_record->join_select_meter()->get_many_by($para);
		
		$data = array();
		if(count($arr) >0){
			foreach($arr as $row){				
				$activeUsage = ($row->new_reading + $row->new_round - $row->prev_reading)*$row->multiplier;
				$reactiveUsage = ($row->reactive_new_reading + $row->reactive_new_round - $row->reactive_prev_reading)*$row->multiplier;

			   	//Add extra fields
				$extra = array('active_usage' 		=> $activeUsage,
								'reactive_usage'	=> $reactiveUsage,
								'people'			=> $this->people->get($row->customer_id),
								//'meters'			=> $this->meter->get($row->meter_id),
							   	'electricity_boxes' => $this->electricity_box->get($row->electricity_box_id),
							   	'isCheck'			=> false						   	
						  );

				//Cast object to array
				$original = (array) $row;

				//Merge arrays
				$data[] = array_merge($original, $extra);	
			}					
		}
		$this->response($data, 200);				
	}

	//LOW CONSUMPTION
	function low_consumption_get(){
		$filter = $this->get("filter");			
		$para = array();				
		for ($i = 0; $i < count($filter['filters']); ++$i) {				
			$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
		}

		$reading_date = $para["reading_date"];
		$usage = $para["usage"];
		$transformer_id = $para["transformer_id"];
		
		if($transformer_id>0){
			$this->meter->where('transformer_id',$transformer_id);
		}
			
		$meterList = $this->meter->get_many_by('status',1);
		
		$data = array();
		if(count($meterList)>0){
			foreach ($meterList as $m) {			
				$readingList = $this->meter_record->order_by('id', 'DESC')
								->get_many_by(array('meter_id'		=>$m->id,																	
													'month_of <='	=>$reading_date
												));
				if(count($readingList)>0){
					$counter = 0;
					$isMinimum = false;

					$current = 0;
					$month1 = 0;
					$month2 = 0;
					$month3 = 0;

			  		foreach($readingList as $r) {
						$usage_amt = intval($r->new_reading) + intval($r->new_round) - intval($r->prev_reading);

						if($usage_amt<=$usage){
							$isMinimum = true;
						}

						if($isMinimum){
							if($counter==0){
								$current = $usage_amt;
							}else if($counter==1){
								$month1 = $usage_amt;
							}else if($counter==2){
								$month2 = $usage_amt;
							}else{
								$month3 = $usage_amt;
								break;
							}
							$counter++;
						}			
					}

					if($isMinimum){
						$data[] = array(
							'customers' => $this->people->get($m->customer_id),					  		
					  		'meter'		=> $m->meter_no,					  		
							'month3' 	=> $month3,
							'month2' 	=> $month2,
							'month1' 	=> $month1,
							'current'	=> $current							
						);
					}				  			  			  
				}
			}			
		}
		$this->response($data, 200);
	}
	
	//USAGE
	function usage_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){
			$para = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}			
						
			$arr = $this->meter_record->join_meter()->get_many_by($para);
			if(count($arr) >0){
				foreach($arr as $row) {					
					$activeUsage = ($row->new_reading + $row->new_round) - $row->prev_reading;					
					
					$strDate = date("m-y", strtotime($row->month_of));

					//Add extra fields
					$extra = array('active_usage' 	=> $activeUsage,
								   	'strDate'		=> $strDate								   									   					   
					);

					//Cast object to array
					$original =  (array) $row;

					//Merge arrays
					$data[] = array_merge($original, $extra);	
				}
				$this->response($data, 200);		
			}else{
				$empty_array = Array();
				$this->response($empty_array, 200);
			}						
		}else{
			$data = $this->meter_record->get_all();
			$this->response($data, 200);	
		}				
	}

	//READING	
	function reading_get() {
		$filter = $this->get("filter");		
		$para = array();				
		for ($i = 0; $i < count($filter['filters']); ++$i) {				
			$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
		}
		$arr = $this->meter->order_by("customer_id", "asc")->get_many_by($para);

		$data = array();
		if(count($arr)>0){
			//Reading
			$meterIds = array();
			foreach ($arr as $row) {
				array_push($meterIds, $row->id);
			}
			$meterRecord = $this->meter_record->where_in("meter_id", $meterIds)->distinct("meter_id")->order_by("month_of", "desc")->get_all();			
			
			$customer_id = 0;
			$people = null;
			foreach ($arr as $row) {
				$month_of = "";
				$prev_reading = "";
				$reactive_prev_reading = "";
				if(count($meterRecord)>0){
					foreach ($meterRecord as $mr) {
						if($mr->meter_id===$row->id){
							$month_of = $mr->month_of;
							$prev_reading = $mr->new_reading;
							$reactive_prev_reading = $mr->reactive_new_reading;
							break;
						}
					}					
				}

				if($row->customer_id!==$customer_id){
					$people = $this->people->get($row->customer_id);
					$customer_id = $row->customer_id;
				}

			   	//Add extra fields
				$extra = array('people'				=> $people,						    
						    'electricity_boxes'		=> $this->electricity_box->get($row->electricity_box_id),						    
						    'month_of' 				=> $month_of,
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
		}
		$this->response($data, 200);			
	}

	//READING	
	function unread_get() {
		$filter = $this->get("filter");		
		$para = array();				
		for ($i = 0; $i < count($filter['filters']); ++$i) {				
			$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
		}
		$transformer_id = $para["transformer_id"];
		$month_of = $para["month_of"];
		
		$arr = $this->meter->order_by("customer_id", "asc")
							->get_many_by(array(
								"transformer_id"=>$transformer_id,
								"status"=>1
							));

		$data = array();
		if(count($arr)>0){
		 	$meterIds = array();
			foreach ($arr as $row) {
				array_push($meterIds, $row->id);
			}
								
			$readingRecorded = $this->meter_record->where_in("meter_id", $meterIds)
											->distinct("meter_id")											
											->get_many_by("month_of",$month_of);
			//Unread meter ids
			$unreadMeterIds = array();
			if(count($readingRecorded)>0){
				$readIds = array();												
				foreach ($readingRecorded as $row) {
					array_push($readIds, $row->meter_id);					
				}

				$arrDiff = array_diff($meterIds, $readIds);
				foreach ($arrDiff as $row) {
					array_push($unreadMeterIds, $row);
				}				
			}else{
			 	$unreadMeterIds = $meterIds;
			}
			
			$meterList = $this->meter->where_in("id", $unreadMeterIds)
							->order_by("customer_id", "asc")
							->get_all();
			$meterRecord = $this->meter_record->where_in("meter_id", $unreadMeterIds)
											->distinct("meter_id")
											->order_by("month_of", "desc")
											->get_all();	
			
			$customer_id = 0;
			$people = null;
			foreach ($meterList as $row) {
				$month_of = "";
				$prev_reading = "";
				$reactive_prev_reading = "";
				if(count($meterRecord)>0){
					foreach ($meterRecord as $mr) {
						if($mr->meter_id===$row->id){
							$month_of = $mr->month_of;
							$prev_reading = $mr->new_reading;
							$reactive_prev_reading = $mr->reactive_new_reading;
							break;
						}
					}					
				}

				if($row->customer_id!==$customer_id){
					$people = $this->people->get($row->customer_id);
					$customer_id = $row->customer_id;
				}

			   	//Add extra fields
				$extra = array('people'				=> $people,						    
						    'electricity_boxes'		=> $this->electricity_box->get($row->electricity_box_id),						    
						    'month_of' 				=> $month_of,
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
		}
		$this->response($data, 200);			
	}


}//End Of Class