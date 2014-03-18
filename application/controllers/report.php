<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->title = "Report Center";
		if($this->session->userdata('logged_in') != 1) {
			redirect('auth');
		}
	}
	
	public function index() {
		$this->title = "Report Center";
		//$this->javascript = array('bootstrap.min.js');
		$this->_render("/report/index");
	}

	public function vendor_aging_report() {
		$this->title .= " | Vendor Aging Report";
		$this->_render("/report/vendor_aging_view");
	}

	public function pl_report() {
		$this->title .= " | Profit and Loss Report";
		$this->_render("/report/pl_view");
	}

	public function balance_sheet() {
		$this->title .= " | Balance Sheet";
		$this->_render("/report/balance_sheet_view");
	}

	public function item()	{
		$this->title .= "item";
		$this->_render("/report/item_view");	
	}

	public function journal()	{
		$this->title .= "Journal";
		$this->_render("/report/journal_view");	
	}

	public function general_ledger()	{
		$this->title .= " General Ledger";
		$this->_render("/report/general_ledger_view");	
	}

	public function inventory()	{
		$this->title .= " Inventory";
		$this->_render("/report/inventory_view");	
	}
	
}