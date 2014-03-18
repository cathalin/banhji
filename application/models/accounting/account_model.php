<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_model extends MY_Model {
	
    public $before_create = array( 'created_at', 'updated_at' );
    public $before_update = array( 'updated_at' );
		
	//Get account with type
	function get_account_with_type($acct_id = 0)
	{		
		if($acct_id > 0){
			$this->db->select('accounts.*, (account_types.name) AS type');
			$this->db->from('accounts');
			$this->db->where('accounts.id', $acct_id);
			$this->db->join('account_types', 'account_types.id = accounts.account_type_id');
					
			$q = $this->db->get();
			
			if ( $q->num_rows() > 0 ) :
				return $q->result();
			endif;				
		}else{
			$q = $this->db->query("SELECT accounts.*, (account_types.name) AS type 
							   FROM accounts INNER JOIN account_types ON accounts.account_type_id = account_types.id 
							   ORDER BY IF(accounts.parent_id, accounts.parent_id, accounts.id), accounts.parent_id ");			  
			return $q->result();
		}
		
	}

	function get_ac_type($acct_id) {
		$query = $this->db->select("name")->from("account_types")->where("id", $acct_id)->limit(1)->get();

		return $query->row()->name;
	}
	
	//Get cash account
	function get_cash_account()
	{
		$this->db->select('accounts.*');
		$this->db->from('accounts');		
		$this->db->where('accounts.account_type_id = 6');
		$q = $this->db->get();
		
		if ( $q->num_rows() > 0 ) :
			return $q->result();
		endif;		
	}

	function get_cogs_account()
	{
		$this->db->select('accounts.*');
		$this->db->from('accounts');		
		$this->db->where('accounts.account_type_id = 16');
		$q = $this->db->get();
		
		if ( $q->num_rows() > 0 ) :
			return $q->result();
		endif;		
	}

	function get_expense_account()
	{
		$this->db->select('accounts.*');
		$this->db->from('accounts');		
		$this->db->where('accounts.account_type_id = 17');
		$q = $this->db->get();
		
		if ( $q->num_rows() > 0 ) :
			return $q->result();
		endif;		
	}

	//Get liabilities account 
	function get_liability_account()
	{
		$this->db->select('accounts.*');
		$this->db->from('accounts');
		$this->db->join('account_types', 'account_types.id = accounts.account_type_id');
		$this->db->where('account_types.parent_id = 2');
		$q = $this->db->get();
		
		if ( $q->num_rows() > 0 ) :
			return $q->result();
		endif;		
	}
}