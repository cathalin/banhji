<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends MY_Controller
{
	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) {
			redirect('auth');
		}			
	}
	
	function items()
	{
		$this->title = "មុខទំនិញ";
		$this->_render('inventory/item_view');
	}
	
	function load_item_record()
	{
		$this->title = "បញ្ចូលមុខទំនិញថ្មី";
		$this->_render('inventory/item_record_view');
	}
	
	function load_unit_measure()
	{
		$this->title = "រង្វាស់មុខទំនិញ";
		$this->_render('inventory/unit_measure_view');
	}
	
	function load_item_type()
	{
		$this->title = "ប្រភេទមុខទំនិញ";
		$this->_render('inventory/item_type_view');
	}
	
	function load_item_usage()
	{
		$this->title = "ប្រើប្រាស់ទំនិញ";
		$this->_render('inventory/item_witdraw_view');
	}
		
	function load_adjustment()
	{
		$this->title = "Item Adjustment";
		$this->_render('inventory/item_adjustment_view');			
	}
	
	function load_expense_record()
	{
		$this->title = "Expense Record";
		$this->_render('inventory/expense_view');
	}

	public function index()
	{
		$this->title = "Inventory";
		$this->_render('inventory/inventory_view');
	}

	
}