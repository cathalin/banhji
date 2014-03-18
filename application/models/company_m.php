<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Company_m extends MY_Model {
	public $before_create = array( 'created_at', 'updated_at' );
	public $before_update = array( 'updated_at' );

	function get_child_company($id) {
		$this->db->where("parent_id", $id);
		return $this;
	}
	
	function current($id) {
		$this->db->where("id", $id);
		$this->db->or_where("parent_id", $id);
		return $this;
	}

	function child_of($id){
		$this->db->select("id")
			     ->where("parent_id", $id)
				 ->from("company");
		$ids =	 $this->db->get();
		return $this;
	}
}