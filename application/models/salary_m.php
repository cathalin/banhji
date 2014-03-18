<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Salary_m extends MY_Model {
	public $_table = "staff_salaries";
	public $before_create = array( 'created_at', 'updated_at' );
	public $before_update = array( 'updated_at' );
	
}