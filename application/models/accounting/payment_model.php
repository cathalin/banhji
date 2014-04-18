<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment_model extends MY_Model {
	
	public $before_create = array( 'created_at', 'updated_at' );
    public $before_update = array( 'updated_at' );

    //Sum
	function sum($field){
		$this->db->select_sum($field);
		return $this;
	}

	//Join people
    function join_people(){
    	$this->db->join('people', 'people.id = invoices.customer_id');
    	return $this;
    }
	
    //Join people invoice
    function join_people_invoice(){
    	$this->db->join('invoices', 'invoices.id = payments.invoice_id');
    	$this->db->join('people', 'people.id = payments.customer_id');
    	return $this;
    }

    //Where in
	function where_in($field, $value) {
		$this->db->where_in($field, $value);		
		return $this;
	}

	//Get total payment
	function get_total_payment($invoice_id){
		$this->db->select_sum('amount_paid');
		$this->db->where('invoice_id', $invoice_id); 
		$query = $this->db->get('payments');
		
		return $query->row()->amount_paid>0 ? $query->row()->amount_paid : 0;					
	}
	
	//Get total payment by
	function get_total_payment_by($customer_id=0, $payment_date='0000-00-00'){
		$this->db->select_sum('amount_paid');
		$this->db->where('customer_id', $customer_id);		
		$this->db->where('payment_date <=', $payment_date); 
		$query = $this->db->get('payments');
		
		return $query->row()->amount_paid>0 ? $query->row()->amount_paid : 0;					
	}

	//Get total payment by customer id
	function get_total_payment_by_customer_id($customer_id, $status, $payment_date){
		$this->db->select_sum('payments.amount_paid');
		$this->db->from('payments');
		$this->db->join('invoices', 'invoices.id = payments.invoice_id');
		$this->db->where('invoices.customer_id', $customer_id);
		$this->db->where('invoices.status', $status);
		$this->db->where('payment_date <', $payment_date);		
		$query = $this->db->get();
		
		return $query->row()->amount_paid>0 ? $query->row()->amount_paid : 0;				
	}

	//Get count customer
	function count_customer($cashier=0, $payment_date='0000-00-00'){
		$this->db->select('customer_id');
		$this->db->where('cashier =', $cashier);
		$this->db->where('payment_date', $payment_date);
		$this->db->group_by('customer_id'); 
		$query = $this->db->get('payments');
		
		return $query->num_rows();					
	}

	//Get sum payment
	function sum_payment($cashier=0, $payment_date='0000-00-00'){
		$this->db->select_sum('amount_paid');
		$this->db->where('cashier =', $cashier);
		$this->db->where('payment_date', $payment_date);
		$query = $this->db->get('payments');
		
		return $query->row()->amount_paid>0 ? $query->row()->amount_paid : 0;					
	}
	
}