<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Salary_History_m extends MY_Model {
	public $_table = "staff_salary_histories";
	public $before_create = array( 'created_at', 'updated_at' );
	public $before_update = array( 'updated_at' );
	
}