<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Items extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();
		$this->load->model('inventory/purchase_requests_model', 'requests');
		$this->load->model('inventory/purchase_request_items_model', 'requestItems');
		$this->load->model("people/people_model", "people");
		$this->load->model('inventory/item_model', 'item');
		$this->load->model('accounting/invoice_item_model', 'so');
		$this->load->model('inventory/item_record_model', 'item_records');
		$this->load->model('accounting/invoice_model', 'invoice');
		$this->load->model('accounting/journal_model', 'journal');
	}
	function number_get() {
		
		$this->response(array('status'=>$this->_numberGeneration(1)), 200);
		
	}

	// requests section
	function requests_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){			
			$criteria = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$criteria += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}
			// $this->response($para, 200);
			$query = $this->requests->get_many_by($criteria);
			$count = $this->requests->get_many_by($criteria);
		} else {
			$query = $this->requests->get_all();
			$count = $this->requests->get_all();
		}

		if(count($query)>0) {
			foreach($query as $row) {
				$data[] = array(
					"id" 			=> $row->id,
					"company_id"	=> $row->company_id,	
					"user" 			=> $this->people->get($row->user_id),
					"number"		=> $row->number,
					"items"			=> $this->requestItems->get_many_by(array("purchase_request_id"=>$row->id)),
					"expected_date" => $row->expected_date,
					"status"		=> $row->status,
					"created_at"	=> $row->created_at
				);
			}
			$this->response(array("status"=>"OK", "count"=>count($count), "results"=>$data), 200);
		} else {
			$data = array();
			$this->response(array("status"=>"ERROR", "count"=>0, "results"=>$data), 200);
		}
	}

	function requests_post() {
		$postedData = $this->post();
		$data = array(
			"user_id" => $postedData['user'],
			"company_id" => $postedData['company_id'],
			"number" => 'REQ'.$this->_numberGeneration($postedData['company_id']),
			"expected_date" => Date('Y-m-d', strtotime($postedData['expected_date'])),
			"status" => $postedData['status']
		);
		$this->db->trans_start();
		$insertRequest = $this->requests->insert($data);
		if($insertRequest) {
			foreach($postedData['items'] as $row => $item) {
				$items[] = array(
					"purchase_request_id" => $insertRequest,
					"item_id" => $item['item_id'],
					"cost" => $item['cost'],
					"quantity" => $item['quantity']
				);
			}
			$query = $this->requestItems->insert_many($items);

		}
		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE) {
			$this->response(array("status"=>"ERROR", "message"=>"Cannot create request.","count"=>0, "results"=>array()), 400);
		} else {
			$requestQuery = $this->requests->get($insertRequest);
			if(count($requestQuery) > 0) {
				$dataRequest[] = array(
					"id" 			=> $requestQuery->id,
					"number" 		=> $requestQuery->number,
					"user" 			=> $this->people->get($requestQuery->user_id),
					"items"			=> $this->requestItems->get_many_by(array("purchase_request_id"=>$requestQuery->id)),
					"expected_date" => date('m-d-Y', $requestQuery->expected_date),
					"status"		=> $requestQuery->status
				);
			}			
			$this->response(array("status"=>"OK", "results"=>$dataRequest), 200);
		}
		
	}

	function requests_put() {
		$postedData = $this->put();

		$data = array(
			"user_id" => $postedData['user'],
			"company_id" => $postedData['company_id'],
			"number" => 'REQ'.$this->_numberGeneration($postedData['company_id']),
			"expected_date" => Date('Y-m-d', strtotime($postedData['expected_date'])),
			"status" => $postedData['status']
		);
		$this->db->trans_start();
		$insertRequest = $this->requests->update($this->put('id'), $data);
		if($insertRequest) {
			foreach($postedData['items'] as $row => $item) {
				$items[] = array(
					"purchase_request_id" => $insertRequest,
					"item_id" => $item['item_id'],
					"cost" => $item['cost'],
					"quantity" => $item['quantity']
				);
				$this->requestItems->update_by(array("purchase_requet_id"=>$this->put('id')), 
					array(
						"item_id" => $item['item'],
						"cost" => $item['cost'],
						"quantity" => $item['unit']
					)
				);
			}
			

		}
		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE) {
			$this->response(array("status"=>"ERROR", "message"=>"Cannot create request.","count"=>0, "results"=>array()), 400);
		} else {
			$requestQuery = $this->requests->get($insertRequest);
			if(count($requestQuery) > 0) {
				$dataRequest[] = array(
					"id" 			=> $requestQuery->id,
					"number" 		=> $requestQuery->number,
					"user" 			=> $this->people->get($requestQuery->user_id),
					"items"			=> $this->requestItems->get_many_by(array("purchase_request_id"=>$requestQuery->id)),
					"expected_date" => $requestQuery->expected_date,
					"status"		=> $requestQuery->status
				);
			}			
			$this->response(array("status"=>"OK", "results"=>$dataRequest), 200);
		}
	}

	function requests_delete() {
		$postedData = $this->delete();

		$this->db->trans_start();
		$this->requests->update($postedData['id'], array("archived"=>1));
		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE) {
			$this->response(array("status"=>"ERROR", "count"=>0, "message"=>"Cannot delete."), 400);
		} else {
			$this->response(array("status"=>"OK", "count"=>1, "message"=>"Deleted successfully."), 200);
		}
	}

	function requestItems_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){			
			$criteria = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$criteria += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}
			// $this->response($para, 200);
			$query = $this->requestItems->get_many_by($criteria);
			$count = $this->requestItems->get_many_by($criteria);
		} else {
			$query = $this->requestItems->get_all();
			$count = $this->requestItems->get_all();
		}

		if(count($query)>0) {
			foreach($query as $row) {
				$data[] = array(
					"id" 			=> $row->id,
					"request"		=> $this->requests->get($row->purchase_request_id),
					"item"			=> $this->item->get($row->item_id),
					"cost" 			=> $row->cost,
					"quantity"		=> $row->quantity,
					"created_at"	=> $row->created_at
				);
			}
			$this->response(array("status"=>"OK", "count"=>count($count), "results"=>$data), 200);
		} else {
			$data = array();
			$this->response(array("status"=>"ERROR", "count"=>0, "results"=>$data), 400);
		}
	}

	function requestItems_post() {
		$postedData = $this->post();
		foreach( $postedData as $value ) {
			$data[] = array(
				"user_id" => $value->user,
				"expected_date" => $value->expected_date,
				"status" => $value->status
			);
		}
		$this->db->trans_start();
		$insertRequest = $this->requests->insert($data);
		if($insertRequest) {
			foreach($postedData['items'] as $item) {
				$items[] = array(
					"purchase_request_id" => $insertRequest,
					"item_id" => $item->item_id,
					"cost" => $item->cost,
					"quantity" => $item->quanity
				);
			}
			$query = $this->requestItems->insert_many($items);

		}
		$this->trans_complete();

		if($this->db->trans_status() === FALSE) {
			$this->response(array("status"=>"ERROR", "message"=>"Cannot create request.","count"=>0, "results"=>array()), 400);
		} else {
			$requstQuery = $this->requests->get($insertRequest);
			foreach($query as $row) {
				$dataRequest[] = array(
					"id" 			=> $row->id,
					"user" 			=> $this->people->get($row->user_id),
					"items"			=> $this->requestItems->get_many_by(array("purhcase_request_id"=>$row->id)),
					"expected_date" => $row->expected_date,
					"status"		=> $row->status,
					"created_at"	=> $row->created_at
				);
			}
			$this->response(array("status"=>"OK", "count"=>count($requstQuery), "results"=>$dataRequest), 200);
		}
	}

	function requestItems_put() {
		$postedData = $this->put();

		$this->db->trans_start();
		$query = $this->requests->update($postedData['id'], array("status"=>$postedData['status']));
		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE) {
			$this->response(array("status"=>"ERROR", "count"=>0, "message"=>"Cannot updated."), 400);
		} else {
			$this->response(array("status"=>"OK", "count"=>1, "message"=>"Updated successfully."), 200);
		}
	}

	function requestItems_delete() {
		$postedData = $this->delete();

		$this->db->trans_start();
		$this->requests->update($postedData['id'], array("archived"=>1));
		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE) {
			$this->response(array("status"=>"ERROR", "count"=>0, "message"=>"Cannot delete."), 400);
		} else {
			$this->response(array("status"=>"OK", "count"=>1, "message"=>"Deleted successfully."), 200);
		}
	}

	function so_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){			
			$criteria = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$criteria += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}
			// $openSOQuery = $this->invoice->get_many_by(array("status"=>0,"type"=>"SO"));
			$openSOQuery = $this->invoice->get_many_by($criteria);
			foreach($openSOQuery as $so) {
				$openSO[] = $so->id;
			}
			$query = $this->so->get_many($openSO);
			if(count($query)>0) {
				foreach($query as $row) {
					$data[] = array(
						"id" 			=> $row->id,
						// "user" 			=> $this->people->get($row->user_id),
						"so"			=> $this->invoice->select("id, number, type")->get($row->invoice_id),
						"items"			=> $this->item->select("id, name, created_at")->get($row->item_id),
						"quantity" 		=> $row->quantity,
						"created_at"	=> $row->created_at
					);
				}
				$this->response(array("status"=>"OK", "count"=>count($query), "results"=>$data), 200);
			} else {
				$data = array();
				$this->response(array("status"=>"ERROR", "count"=>0, "results"=>$data), 200);
			}
		} else {
			$this->response(array("status"=>"ERROR", "count"=>0, "message"=>"please pass query criteria", "results"=>array()), 200);
		}			
	}

	function invoice_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){			
			$criteria = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$criteria += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}
			// $openSOQuery = $this->invoice->get_many_by(array("status"=>0,"type"=>"SO"));
			$openInvQuery = $this->invoice->get_many_by($criteria);
			foreach($openInvQuery as $so) {
				$openSO[] = $so->id;
			}
			$query = $this->so->get_many($openSO);
			if(count($query)>0) {
				foreach($query as $row) {
					$data[] = array(
						"id" 			=> $row->id,
						// "user" 			=> $this->people->get($row->user_id),
						"so"			=> $this->invoice->select("id, number, type")->get($row->invoice_id),
						"items"			=> $this->item->select("id, name, created_at")->get($row->item_id),
						"quantity" 		=> $row->quantity,
						"created_at"	=> $row->created_at
					);
				}
				$this->response(array("status"=>"OK", "count"=>count($query), "results"=>$data), 200);
			} else {
				$data = array();
				$this->response(array("status"=>"ERROR", "count"=>0, "results"=>$data), 200);
			}
		} else {
			$this->response(array("status"=>"ERROR", "count"=>0, "message"=>"please pass query criteria", "results"=>array()), 200);
		}	
	}

	function tranx_get() {
		$data = array();
		foreach($this->_requestByItem() as $r) {
			$data[] = $r;
		}
		foreach($this->_soByItem() as $r) {
			$data[] = $r;
		}
		foreach($this->_poByItem() as $r) {
			$data[] = $r;
		}
		foreach($this->_grn() as $r) {
			$data[] = $r;
		}
		foreach($this->_purchaseByItem() as $r) {
			$data[] = $r;
		}

		$this->response($data, 200);
	}

	private function _requestByItem() {
		$requestQuery = $this->requests->get_many_by(array("status <"=>3));
		if(count($requestQuery)>0) {
			foreach($requestQuery as $req) {
				$openReq[] = $req->id;
			}
			$query = $this->requestItems->get_many($openReq);

			if(count($query)>0) {
				foreach($query as $row) {
					$data[] = array(
						"id" 			=> $row->id,
						"type"			=> $this->requests->select("id, expected_date")->get($row->purchase_request_id),
						"items"			=> $this->item->select("id, name, created_at")->get($row->item_id),
						"quantity" 		=> $row->quantity,
						"created_at"	=> $row->created_at
					);
				}
			} else {
				$data = array();
			}	
		} else {
			$data = array();
		}	
		return $data;
	}

	private function _soByItem() {
		$requestQuery = $this->invoice->get_many_by(array("status"=>0,"type"=>"SO"));
		if(count($requestQuery)>0) {
			foreach($requestQuery as $req) {
				$openReq[] = $req->id;
			}
			$query = $this->so->get_many($openReq);

			if(count($query)>0) {
				foreach($query as $row) {
					$data[] = array(
						"id" 			=> $row->id,
						"type"			=> $this->invoice->select("id, number, type")->get($row->invoice_id),
						"items"			=> $this->item->select("id, name, created_at")->get($row->item_id),
						"quantity" 		=> $row->quantity,
						"created_at"	=> $row->created_at
					);
				}
			} else {
				$data = array();
			}
		} else {
			$data = array();
		}	
		return $data;
	}

	private function _poByItem() {
		$requestQuery = $this->journal->get_many_by(array("status"=>0,"transaction_type"=>"po"));
		if(count($requestQuery)>0) {
			foreach($requestQuery as $req) {
				$openReq[] = $req->id;
			}
			$query = $this->so->get_many($openReq);

			if(count($query)>0) {
				foreach($query as $row) {
					$data[] = array(
						"id" 			=> $row->id,
						"type"			=> $this->journal->select("id, number, transaction_type")->get($row->invoice_id),
						"items"			=> $this->item->select("id, name, created_at")->get($row->item_id),
						"quantity" 		=> $row->quantity,
						"created_at"	=> $row->created_at
					);
				}
			} else {
				$data = array();
			}
		} else {
			$data = array();
		}	
		return $data;
	}

	private function _grn() {
		$requestQuery = $this->journal->get_many_by(array("status"=>0,"transaction_type"=>"grn"));
		if(count($requestQuery) >0 ){
			foreach($requestQuery as $req) {
				$openReq[] = $req->id;
			}
			$query = $this->item_records->in("bill_id", $openReq)->get_all();

			if(count($query)>0) {
				foreach($query as $row) {
					$data[] = array(
						"id" 			=> $row->id,
						"type"			=> $this->journal->select("id, number, transaction_type")->get($row->bill_id),
						"items"			=> $this->item->select("id, name, created_at")->get($row->item_id),
						"quantity" 		=> $row->quantity,
						"created_at"	=> $row->created_at
					);
				}
			} else {
				$data = array();
			}
		} else {
			$data = array();
		}	
		return $data;
	}

	private function _purchaseByItem() {
		$requestQuery = $this->journal->get_many_by(array("status"=>0,"transaction_type"=>"purchase"));
		if(count($requestQuery) >0 ){
			foreach($requestQuery as $req) {
				$openReq[] = $req->id;
			}
			$query = $this->item_records->in("bill_id", $openReq)->get_all();

			if(count($query)>0) {
				foreach($query as $row) {
					$data[] = array(
						"id" 			=> $row->id,
						"type"			=> $this->journal->select("id, number, transaction_type")->get($row->bill_id),
						"items"			=> $this->item->select("id, name, created_at")->get($row->item_id),
						"quantity" 		=> $row->quantity,
						"created_at"	=> $row->created_at
					);
				}
			} else {
				$data = array();
			}
		} else {
			$data = array();
		}	
		return $data;
	}

	private function _check_class_name($company_id, $className) {
		$query = $this->item->get_by(array("company_id"=>$company_id, "name"=>$className));
		if(count($query)>0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	private function _numberGeneration($company) {
		$lastRecord = $this->requests->order_by("number", "DESC")->limit(1)->get_many_by(array("company_id"=>1));
		if(count($lastRecord) > 0) {
			foreach($lastRecord as $record) {
				$number = $record->number;
			}
			$fFour = substr($number, 5, 2);
			$current = date('m');
			if($current > $fFour) {
				$test = "true";
			} else {
				if((substr($number, 7, 3) + 1) < 10) {
					return date('ym').'00'.(substr($number, 7, 3) + 1);
				} else {
					return date('ym').'0'.(substr($number, 7, 3) + 1);
				}
			}
		}
	}
}