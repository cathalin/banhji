<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends MY_Controller
{
	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) {
			redirect('auth');
		}
		$this->load->model('accounting/invoice_model', 'invoice');		
	}

	public function index() {		
		//for dashboar
		$this->title = "Dashboard";
		$this->data['last_po_no'] = $this->invoice->last_number("PO");						
		$this->_render('vendor/vendor_view');
	}

	public function lists() {
		$this->title = "List";
		$this->data['last_po_no'] = $this->invoice->last_number("PO");
		$this->_render('vendor/dashboard_view');
	}

	function electricity_bill() {
		$this->title = "Enter Electricity Bills";
		$this->_render('vendor/electricity_bill_view');
	}

	public function cash_payment() {

	}


	public function purchase() {
		$this->title = "បញ្ចូលមុខទំនិញថ្មី";
		$this->_render('inventory/item_record_view');
	}

	public function paybill() {
		$this->title="Pay Bills";
		$this->_render("vendor/paybill_view");
	}

	public function ebill() {
		$this->title="Pay Bills";
		$this->_render("vendor/electricity_bill_view");
	}

	public function add_vendor() {
		$this->title="បញ្ចូលអ្នកផ្គត់ផ្គង់ថ្មី";
		$this->_render("vendor/add_vendor_view");
	}

}