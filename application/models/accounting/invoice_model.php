<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice_model extends MY_Model {
	
	public $before_create = array( 'created_at', 'updated_at' );
    public $before_update = array( 'updated_at' );

    //Where in	
	function where_in($field, $value) {
		$this->db->where_in($field, $value);		
		return $this;
	}

	//Group by
	function group_by($field){				
		$this->db->group_by($field);
		return $this; 
	}

	//Count distinct
	function count_distinct(){
		$this->db->select('COUNT(DISTINCT customer_id) AS counter', FALSE);
		return $this;
	}

	//Sum
	function sum($field="id"){
		$this->db->select_sum($field);
		return $this;
	}
	
    //Get last invoice no by type
    function last_number($type=''){
    	$this->db->select('number');
		$this->db->where('type', $type);		
		$this->db->order_by('id', 'desc');
		$this->db->limit(1); 

    	$query = $this->db->get('invoices');

    	if($query->num_rows()>0){
    		return $query->row()->number;
    	}else{
    		return '0';
    	}
    }

    //Join people
    function join_people(){
    	$this->db->join('people', 'people.id = invoices.customer_id');
    	return $this;
    }

    //Get invoice for customer
    function get_invoice_for_customer($invoice_id=0){	
		$this->db->select('invoices.*, payment_terms.term, people.customer_no, people.phone, CONCAT(people.surname, " ", people.name) AS fullname,						    
						   area.name AS area, electricity_boxes.box_no', FALSE);
		$this->db->limit(1);				
		$this->db->where('invoices.id', $invoice_id);
		$this->db->join('people', 'people.id = invoices.customer_id');
		$this->db->join('payment_terms', 'payment_terms.id = invoices.payment_term_id', 'left');
		$this->db->join('area', 'area.id = people.transformer_id', 'left');
		$this->db->join('meters', 'meters.customer_id = people.id', 'left');			
		$this->db->join('electricity_boxes', 'electricity_boxes.id = meters.electricity_box_id', 'left');
		
		return $this;
	}

	function select($fields) {
        $this->db->select($fields);
        return $this;
    }					
}