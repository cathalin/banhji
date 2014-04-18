<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice_item_model extends MY_Model {
	
	public $before_create = array( 'created_at', 'updated_at' );
    public $before_update = array( 'updated_at' );
	
    //Sum
	function sum($field){
		$this->db->select_sum($field);
		return $this;
	}

	//Group by
	function group_by($field){
		$this->db->group_by($field);
		return $this;
	}

	//Where in
	function where_in($field, $value) {
		$this->db->where_in($field, $value);		
		return $this;
	}

	//Join people invoice
    function join_people_invoice(){
    	$this->db->join('invoices', 'invoices.id = invoice_items.invoice_id');
    	$this->db->join('people', 'people.id = invoices.customer_id');
    	return $this;
    }

    //Join invoice
    function join_invoice(){
    	$this->db->join('invoices', 'invoices.id = invoice_items.invoice_id');    	
    	return $this;
    }

    //Join meter
    function join_meter(){
    	$this->db->join('meters', 'meters.id = invoice_items.meter_id');    	
    	return $this;
    }

    //Left join meter
    function left_join_meter(){
    	$this->db->join('meters', 'meters.id = invoice_items.meter_id', 'left');    	
    	return $this;
    }

	//Get invoice item with item
	function get_inv_item_with_item()
	{
		$this->db->select('invoice_items.*, (items.name) AS item_name');
		$this->db->from('invoice_items');
		$this->db->join('items', 'items.id = invoice_items.item_id');
		
		$q = $this->db->get();
		
		if ( $q->num_rows() > 0 ) :
			return $q->result();
		endif;		
	}
	
	//Get total amount
	function get_total_amount($invoice_id){
		$this->db->select_sum('amount');
		$this->db->where('invoice_id', $invoice_id);		
		$query = $this->db->get('invoice_items');
		
		return $query->row()->amount>0 ? $query->row()->amount : 0;				
	}
	
	//Get total amount by
	function get_total_amount_by($customer_id=0, $issued_date='0000-00-00'){
		$this->db->select_sum('invoice_items.amount');		
		$this->db->join('invoices', 'invoices.id = invoice_items.invoice_id');		
		$this->db->where('invoices.status <', 2);				
		$this->db->where('invoices.customer_id', $customer_id);		
		$this->db->where('invoices.issued_date <=', $issued_date);
		$this->db->where_in('invoices.type', array('Invoice', 'eInvoice', 'Notice'));
		$query = $this->db->get('invoice_items');
		
		return $query->row()->amount>0 ? $query->row()->amount : 0;							
	}

	//Get total amount by customer_id
	function get_total_amount_by_customer_id($customer_id=0){
		$this->db->select_sum('invoice_items.amount');
		$this->db->from('invoices');
		$this->db->join('invoice_items', 'invoice_items.invoice_id = invoices.id');
		$this->db->where('invoices.customer_id', $customer_id);		
		$query = $this->db->get();
		
		return $query->row()->amount>0 ? $query->row()->amount : 0;			
	}
	
	//Electricity invoice item
	function get_electricity_invoice_item(){
		$this->db->select('invoice_items.*, item_records.unit_number', FALSE);
		$this->db->limit(1);				
		$this->db->where('invoices.id', $invoice_id);
		$this->db->join('people', 'people.id = invoices.customer_id');
		$this->db->join('area', 'area.id = people.area_id');
		$this->db->join('meters', 'meters.customer_id = people.id');			
		$this->db->join('electricity_boxes', 'electricity_boxes.id = meters.electricity_box_id');
		
		return $this;
	}
	
	//Get by meter id and month of
	function by_meter_id_month_of($meter_id=0, $month_of='0000-00-00'){
		$this->db->select_sum('invoices.amount');
		$this->db->join('invoices', 'invoices.id = invoice_items.invoice_id');
		$this->db->where('invoices.status', 1);				
		$this->db->where('invoices.month_of', $month_of);
		$this->db->where('invoice_items.meter_id', $meter_id);
		$query = $this->db->get('invoice_items');

		return $query->row()->amount>0 ? $query->row()->amount : 0;		
	}	
		
	//Monthly sale
	function monthly_sale(){
		$this->db->select('SUM(invoice_items.amount) AS amt, invoices.issued_date', FALSE);
		$this->db->join('invoices', 'invoices.id = invoice_items.invoice_id');
		$this->db->join('people', 'people.id = invoices.customer_id');
		$this->db->where_in('invoices.type', array('Invoice', 'eInvoice'));
		$this->db->group_by("MONTH(invoices.issued_date)");

		return $this; 
	}	
	
	
}