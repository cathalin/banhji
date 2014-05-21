<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class grn extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('grn_model', 'po');
		$this->load->model('inventory/purchaseorder_item_model', 'items');		
	}
		
	
	function index_get(){
		// $q = $this->get('data');
		$filter = $this->get("filter");	
		if($filter) {		
			$criteria = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$criteria += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}
			$filterQuery = $this->po->get_many_by($criteria);
			if(count($filterQuery) > 0) {
				foreach($filterQuery as $q) {
					$data[] = array(
						"id" => $q->id,
						"number" => $q->number,
						"voucher" => $q->voucher,
						"vendor" => $q->vendor_id,
						"date" => $q->date,
						"expected_date" => $q->expected_date,
						"class" => $q->class_id,
						"address" => $q->address,
						"shipping_address" => $q->shipping_address,
						"memo_01" => $q->memo_01,
						"memo_02" => $q->memo_02,
						"items" => $this->items->get_many_by(array('purchaseOrder_id'=>$q->id)),
						"vat_id"=> $q->vat_id,
						"created_by" => $q->created_by,
						"updated_by" => $q->updated_by,
						"created_at" => $q->created_at,
						"updated_at" => $q->updated_at
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

	function index_put(){
		$data = array(
			"voucher" => $this->put('voucher'),
			"date" => $this->put('date'),
			"expected_date" => $this->put('expected_date'),
			"address" => $this->put('address'),
			"shipping_address" => $this->put('shipping_address'),
			"memo_01" =>$this->put('memo_01'),
			"memo_02" =>$this->put('memo_02'),
			"vat_id" => $this->put('vat_id'),
			"created_by" => $this->put('created_by'),
			"updated_by" => $this->put('updated_by')
		);

		$this->db->trans_start();
		$this->po->update($this->put('id'), $data);
		foreach($this->put('items') as $key => $value) {
			$item = array(
				"purchaseOrder_id" => $this->put('id'),
				"item_id" => $value['item_id'],
				"description" => $value['description'],
				"cost" => $value['cost'],
				"unit" => $value['unit'],
				"taxed"=> $value['taxed'] === "true" ? 1:0
			);
			$this->items->update($value['id'], $item);
		}
		$this->db->trans_complete();
		if($this->db->trans_status() !== FALSE) {
			$query = $this->po->get($this->put('id'));
			if(count($query) > 0) {
				$results[] = array(
					"id" => $query->id,
					"number" => $query->number,
					"voucher" => $query->voucher === 0 ? "": $query->voucher,
					"vendor" => $query->vendor_id,
					"date" => $query->date,
					"expected_date" => $query->expected_date,
					"class" => $query->class_id,
					"address" => $query->address,
					"shipping_address" => $query->shipping_address,
					"memo_01" => $query->memo_01,
					"memo_02" => $query->memo_02,
					"items" => $this->items->get_many_by('purchaseOrder_id',$query->id),
					"vat_id" => $query->vat_id,
					"created_by" => $query->created_by,
					"updated_by" => $query->updated_by,
					"created_at" => $query->created_at,
					"updated_at" => $query->updated_at
				);
			}
			$this->response(array("status"=>"OK", "message"=>"Purchase Order created.", "results"=>$results), 200);
		} else {
			$this->response(array("status"=>"Failed", "message"=>"cannot create Purchase Order.", "results"=>array()), 200);
		}
	}

	function index_post(){
		$data = array(
			"company_id" => $this->post('company'),
			"number" => $this->getNumber($this->post('company')),
			"voucher" => $this->post('voucher'),
			"date" => date('Y-d-m', strtotime($this->post('date'))),
			"expected_date" => date('Y-d-m', strtotime($this->post('expected_date'))),
			"address" => $this->post('address'),
			"shipping_address" => $this->post('shipping_address'),
			"memo_01" =>$this->post('memo_01'),
			"memo_02" =>$this->post('memo_02'),
			"class_id"=> $this->post('class'),
			"vat_id" => $this->post('vat_id'),
			"created_by" => $this->post('created_by'),
			"updated_by" => $this->post('updated_by')
		);

		$this->db->trans_start();
		$po = $this->po->insert($data);
		foreach($this->post('items') as $key => $value) {
			$items[] = array(
				"purchaseOrder_id" => $po,
				"item_id" => $value['item_id'],
				"description" => $value['description'],
				"cost" => $value['cost'],
				"unit" => $value['unit'],
				"taxed"=> $value['taxed'] === "true" ? 1:0
			);
		}
		$this->items->insert_many($items, FALSE);

		$this->db->trans_complete();
		if($this->db->trans_status() !== FALSE) {
			$query = $this->po->get($po);
			if(count($query) > 0) {
				$results[] = array(
					"id" => $query->id,
					"number" => $query->number,
					"voucher" => $query->voucher === 0 ? "": $query->voucher,
					"vendor" => $query->vendor_id,
					"date" => $query->date,
					"expected_date" => $query->expected_date,
					"class" => $query->class_id,
					"address" => $query->address,
					"shipping_address" => $query->shipping_address,
					"memo_01" => $query->memo_01,
					"memo_02" => $query->memo_02,
					"items" => $this->items->get_many_by('purchaseOrder_id',$query->id),
					"vat_id" => $query->vat_id,
					"created_by" => $query->created_by,
					"updated_by" => $query->updated_by,
					"created_at" => $query->created_at,
					"updated_at" => $query->updated_at
				);
			}
			$this->response(array("status"=>"OK", "message"=>"Purchase Order created.", "results"=>$results), 200);
		} else {
			$this->response(array("status"=>"Failed", "message"=>"cannot create Purchase Order.", "results"=>array()), 200);
		}
	}

	function index_delete(){
		$id = $this->delete('id');

		if($id) {
			$this->db->trans_start();
			$this->po->delete($id);
			$this->items->delete_by(array('purchaseOrder_id'=>$id));
			$this->db->trans_complete();

			if($this->db->trans_status() !== FALSE) {
				$this->response(array("status"=>"OK", "message"=>"Purchase Order deleted.", "results"=>array()), 200);
			} else {
				$this->response(array("status"=>"Failed", "message"=>"Cannot delete Purchase Order.", "results"=>array()), 200);
			}
		}
	}
	
	function getNumber($company_id) {
		$number = "";

		$_lastPO = $this->po->order_by("id", "DESC")->limit(1)->get_many_by(array('company_id'=>$company_id));
		if(count($_lastPO) > 0) {
			$number .= substr($_lastPO[0]->number, 3);
			$four = date('ym');
			if(substr($number, 0, 4) === $four) {
				$pre = substr($number,4) + 1;
				$var = "";

				for($i = 2; $i >= strlen($pre); $i--) {
					$var .= "0";
				}
				$var .= $pre;
				$four .= $var;
				return "GRN".$four;
				// $this->response("GRN".$four, 200);
			} else {
				return "GRN".$four."001";
				// $this->response("GRN".$four."001", 200);
			}
		} else {
			return "GRN";
		}
	}
}