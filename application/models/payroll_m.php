<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Payroll_m extends MY_Model {
	public $_table = "staff_payrolls";
	public $before_create = array( 'created_at', 'updated_at' );
	public $before_update = array( 'updated_at' );
	
}