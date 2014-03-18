<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Bill_model extends MY_Model {
	public $before_create = array( 'created_at', 'updated_at' );
	public $before_update = array( 'updated_at' );
	
	public function get_billed_amount($bill_id = 0) {
		if($bill_id > 0) {
			$this->db->select("amount_billed")
			         ->where("id", $bill_id);
			$q = $this->db->get("bills", 1);

			if($q) {
				foreach($q->result() as $r) {
					$amount_billed = $r->amount_billed;
				}
				return $amount_billed;
			} else {
				return FALSE;
			}
		}
	}

	public function amount_billed_by($vendor_id=0) {
		$amount_billed = 0;
		if($vendor_id > 0) {
			$this->db->select("amount_billed")
			         ->where("vendor_id", $vendor_id)
			         ->where("status", 0);
			$q = $this->db->get("bills");

			if($q) {
				foreach($q->result() as $r) {
					$amount_billed += $r->amount_billed;
				}
				return $amount_billed;
			} else {
				return FALSE;
			}
		}
	}

	public function update_bill_status($bill_id=0) {
		if($bill_id > 0) {
			$data = array('status'=>1);
			$this->db->where('id', $bill_id);
			$this->db->update('bills', $data);
			$updated = $this->db->affected_rows();

			if($updated > 0) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}

	public function billed_amount_by($vendor_id=0) {
		if($vendor_id > 0) {
			$this->db->select();
		}
	}
}

/* End of file bill_model.php */
/* Location: ./application/models/bill_model.php */