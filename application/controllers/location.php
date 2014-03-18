<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends CI_Controller
{
	function __construct() {
		parent::__construct();		
		$this->load->model('locations/Address_model', 'address');
	}
	
	function index()
	{
		$this->title = "Location";
		$this->_render('accounting/coa_view');
	}		
		
		
	
}