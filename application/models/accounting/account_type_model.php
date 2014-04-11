<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_type_model extends MY_Model {
	
	public $before_create = array( 'created_at', 'updated_at' );
    public $before_update = array( 'updated_at' );
			
	
	//Get account nature
	function get_account_nature($account_id){
		$this->db->select('nature');
		$this->db->where('account_id', $account_id);		
		$query = $this->db->get('account_types');
		
		return $query->row()->nature;				
	}
	
}