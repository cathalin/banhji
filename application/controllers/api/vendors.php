<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Vendors extends REST_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->load->model("people/people_model", "people");
		$this->load->model('people/people_type_model', 'people_type');
		$this->load->model('bill_model', 'bill');
		$this->load->model('bill_payment_m', 'bill_payment');
		$this->load->model('transformer_m', 'transformer');
	}
	//by Rith

	function index_get() {
		$filter= $this->get('filter');
		if(!empty($filter) && isset($filter)){			
			$criteria = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$criteria += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}
			$query = $this->people->vendor()->get_many_by($criteria);
		} else {
			$query = $this->people->vendor()->get_all();
		}

		if(count($query) > 0) {
			foreach( $query as $r) {
				$vendors[] = array(
					"id"				=> $r->id,
					"bank_account"		=> $r->bank_account,
					"card_number"		=> $r->card_number,
					"commune_id"		=> $r->commune_id,
					"company"			=> $r->company,
					"created_at"		=> $r->created_at,
					"number"			=> $r->number,
					"email"				=> $r->email,
					"gender"			=> $r->gender,
					"image_url"			=> $r->image_url,
					"latitute"			=> $r->latitute,
					"longtitute"		=> $r->longtitute,
					"memo"				=> $r->memo,
					"name"				=> $r->name,
					"people_type_id"	=> $r->people_type_id,
					"phone"				=> $r->phone,
					"status" 			=> $r->status,
					"surname" 			=> $r->surname,
					"class_id"			=> $r->class_id,
					"currency_code"		=> $r->currency_code,
					"use_electricity" 	=> $r->use_electricity,
					"currency_code"		=> $r->currency_code
					// "open_bills"		=> $this->bill->count_by(array('status'=>0, "vendor_id"=> $r->id)),
					// "amount_due"		=> $this->bill->amount_billed_by($r->id),
					// "billed_amount" 	=> $this->bill_payment->amount_paid_by($r->id),
					// "outstanding"		=> ($this->bill->amount_billed_by($r->id) - $this->bill_payment->amount_paid_by($r->id)),
					// "bills"       		=> $this->_bills($r->id),
					// "type"				=> $this->transformer->count_by('vendor_id', $r->id) == 0 ? "normal":"electricity",
					// "connection"		=> $this->transformer->get_many_by('vendor_id', $r->id)
				);
			}

			$this->response(array("status"=>"OK", "results"=>$vendors, "count"=>count($vendors)), 200);
		}
		else {
			$this->response(array("status"=>"error", "message"=>"There is no data found.", "results"=>array(), "count"=>0), 200);
		}	
	}

	function index_post() {
		$postedData = $this->post();

		$generatedId = $this->_v4();
		
		$vendors = array(
			"id"				=> $generatedId,
			"company"			=> $postedData['company'],
			"people_type_id"	=> $postedData['people_type_id']['id'],
			"class_id"			=> $postedData['class_id']['id'],				
			"latitute"			=> $postedData['latitute'],
			"longtitute"		=> $postedData['longtitute'],
			"surname" 			=> $postedData['surname'],
			"name"				=> $postedData['name'],
			"phone"				=> $postedData['phone'],
			"email"				=> $postedData['email'],
			"status"			=> 1,
			"currency_code"		=> $postedData['currency_code']
			// "status" 			=> $r->status,
			
		);


		// $this->response(array("status"=>"OK", "message"=>"Vendor created.", "results"=>$vendors), 200);
		$this->people->insert($vendors);
		$justCreated = $this->people->get($generatedId);

		if(count($justCreated) > 0) {
			$this->response(array("status"=>"OK", "message"=>"Vendor created.", "results"=>array("id"=>$generatedId)), 200);
		} else {
			$this->response(array("status"=>"failed", "message"=>"not able to create", "results"=>$vendors), 200);
		}
	}

	function index_put() {
		$updatedData = $this->put();
		$this->people->update($updatedData['id'], $updatedData);

		if($this->db->affected_rows() > 0) {
			$this->response(array("status"=>"OK", "message"=>"updated successfully", "results"=>array("id"=>$updatedData['id'])), 200);
		} else {
			$this->response(array("status"=>"failed", "message"=>"cannot update"), 200);
		}
		
	}

	function index_delete() {
		$deletedData = $this->delete();

		$this->people->delete($deletedData['id']);

		if($this->db->affected_rows() > 0) {
			$this->response(array("status"=>"OK", "message"=>"data deleted successfully"), 200);
		} else {
			$this->response(array("status"=>"failed", "message"=>"cannot delete data"), 200);
		}
	}

	/********************************
	*								*
	*         Billing Section  		*
	*								*
	*********************************/

	public function bills_get($vendorId = FALSE) {
		$filter = $this->get('filter');
		$value = $this->get('vendor_id');//$filter['filters'][0]['value'];
		$data = array();
		if($this->get('status') == 0) {
			$condition = array("vendor_id"=>$value, "status"=> 0);
		} else {
			$condition = array("vendor_id"=>$value);
		}

		if($value > 0) {
			$data = $this->bill->get_many_by($condition);

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
						"invoiceNumber" => $row->invoice_number,
						"voucher"		=> $row->voucher,
						"date"			=> $row->date,
						"dueDate"		=> $row->due_date,
						"status"		=> $row->status
					);
				}
				$this->response($bills, 200);				
			} else {
				$this->response(array("status"=>"error"), 200);
			}
		} else {
			$data = $this->bill->get_all();

			if(count($data) > 0 ) {
				$this->response($data, 200);
			} else {
				$this->response(array("status"=>"this is not data found."), 500);
			}
		}
		
	}

	public function bills_post($vendorId = FALSE) {
		$bill = array(
				"vendor_id" => $this->post('vendor_id'),
				"payment_term_id" => $this->post("payment_term_id"),
				"employee_id"  => $this->post("employee_id"),
				"bill_type"	=>$this->post("bill_type"),
				"date"	=> $this->post("date"),
				"due_date" => $this->post("due_date"),
				"amount_billed" => $this->post("amount_billed"),
				"voucher" => $this->post("voucher"),
				"invoice_number" => $this->post("invoiceNumber"),
				"status" => $this->post("status")
			);
		$id = $this->bill->insert($bill);
		if($id > 0) {
			$this->response(array("type" => $this->post('type'), "bill"=>$this->bill->get($id)), 201);
		} else {
			$this->response(array("status"=>"error", "message"=>"Cannot insert into database"), 500);
		}
		
	}

	public function bills_put($vendorId = FALSE) {
		
	}

	public function bills_delete($vendorId = FALSE) {
		
	}

	public function types_get() {
		$types = $this->people_type->get_many_by(array("parent_id"=> 2));

		if(count($types) > 0) {
			$this->response(array("status"=>"OK", "message"=>"vendor types", "results"=>$types), 200);
		} else {
			$this->response(array("status"=>"OK", "message"=>"vendor types", "results"=>$types), 200);
		}
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

	private function _v4($trim = false) {        
        $format = ($trim == false) ? '%04x%04x-%04x-%04x-%04x-%04x%04x%04x' : '%04x%04x%04x%04x%04x%04x%04x%04x';
    
        return sprintf($format,

                // 32 bits for "time_low"
                mt_rand(0, 0xffff), mt_rand(0, 0xffff),

                // 16 bits for "time_mid"
                mt_rand(0, 0xffff),

                // 16 bits for "time_hi_and_version",
                // four most significant bits holds version number 4
                mt_rand(0, 0x0fff) | 0x4000,

                // 16 bits, 8 bits for "clk_seq_hi_res",
                // 8 bits for "clk_seq_low",
                // two most significant bits holds zero and one for variant DCE1.1
                mt_rand(0, 0x3fff) | 0x8000,

                // 48 bits for "node"
                mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }
}
	