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
					"user" 			=> $this->people->get($row->user_id),
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

	function requests_put() {
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
}