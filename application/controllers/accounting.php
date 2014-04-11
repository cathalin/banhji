<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Accounting extends MY_Controller
{
	function __construct() {
		parent::__construct();
		$this->load->model('accounting/invoice_model', 'invoice');		
		$this->load->model('locations/Address_model', 'address');	
		if($this->session->userdata('logged_in') != 1) {
			redirect('auth');
		}	
	}
	
	function index()
	{
		$this->title = "តារាងគណនី";
		$this->_render('accounting/ac_chart_view');
	}

	//By Dawine
	function coa()
	{
		$this->title = "តារាងគណនី";
		$this->_render('accounting/coa_view');
	}

	function invoice()
	{
		$this->data['next_inv_id'] = $this->invoice->get_next_id();		
		
		$this->title = "វិក្ក​យបត្រ";
		$this->_render('accounting/invoice_view');
	}
	
	//Invoice Form
	function invoice_form($invoice_id)
	{
		$this->data['invoice_id'] = $invoice_id;		
		
		$this->title = "វិក្ក​យបត្រ";
		$this->_render('accounting/invoice_form_view');
	}

	//Electricity invoice
	function electricity_invoice($invoice_id)
	{
		//Include js
		$this->javascript = array(
			"jquery-barcode-2.0.2.min.js"			
		);

		$this->data['invoice_id'] = $invoice_id;		
		
		$this->title = "វិក្ក​យបត្រ";
		$this->_render('accounting/electricity_invoice_view');
	}

	//Cashier batch
	function cashier_batch(){
		$this->title = "ទទួលប្រាក់រួម";
		$this->_render('accounting/cashier_batch_view');
	}
	
	//Statement
	function statement(){
		$this->title = "Statement";
		$this->_render('accounting/statement_view');
	}

	//Cashier report
	function cashier_report() {
		$this->title = "របាយការណ៍ទទួលប្រាក់";
		$this->_render('accounting/cashier_report_view');
	}
	//End of Dawine

	public function expense() {
		$this->title = "Expense Record";
		$this->_render('inventory/expense_view');
	}
	
	//by Vireak
	function income()
	{
		$this->title = "ចំណូល";
		$this->_render('accounting/income_view');
	}
	
	
	
	function journal1()
	{
		$this->title = "General Journal Entry";
		$this->_render('accounting/journal_view');
	}

	function journal()
	{
		$this->title = "General Journal Entry";
		$this->_render('accounting/journal_1_view');
	}
	
	function classes() {
		$this->title = "Tags";
		$this->_render('classes/class_view');
	}

	function items() {
		$this->title = " វត្ថុ";
		$this->_render('accounting/item_view');
	}
	
}