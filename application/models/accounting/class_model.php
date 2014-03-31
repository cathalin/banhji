<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Class_model extends MY_Model {
	
	public $_table = 'classes';
	
	public $before_create = array( 'created_at', 'updated_at' );
    public $before_update = array( 'updated_at' );
	
	function select($fields) {
		$this->db->select($fields);
		return $this;
	}
}