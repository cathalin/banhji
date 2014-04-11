<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Expense_record_model extends MY_Model {
	
	public $before_create = array( 'created_at', 'updated_at' );
    public $before_update = array( 'updated_at' );
	
	//Get expense record with item_receipt_id
	function get_expense_record_by_item_receipt_id($item_receipt_id)
	{
		$this->db->select('expense_records.*');
		$this->db->from('expense_records');
		$this->db->where('item_receipt_id', $item_receipt_id);
		
		$q = $this->db->get();
		
		if ( $q->num_rows() > 0 ) :
			return $q->result();
		endif;		
	}   	 
}