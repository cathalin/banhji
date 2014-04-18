<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Currency_rate_model extends MY_Model {
			
    public $before_create = array( 'created_at', 'updated_at' );
    public $before_update = array( 'updated_at' );

    //Distinct
    function distinct(){
		$this->db->distinct();

		return $this;
	}

	//Group by
    function group_by($field){
		$this->db->group_by($field);

		return $this;
	}
		
	
}