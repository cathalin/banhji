<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Popup extends CI_Controller {

	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) {
			redirect('auth?redirect='.current_url());
		}
		$this->load->model('accounting/invoice_model', 'invoice');		
	}

	public function index($billId = null) {
		$data['title'] = "Purchase Form";
		$data['description'] = "Description";
		$data['keywords'] = "purchase, accounting, cloud";
		$data['author'] = "Sokdararith";
		$data['last_po_no'] = $this->invoice->last_number("PO");
		$this->load->view("/popup/purchase", $data);
	}

	public function expense($billId = null) {
		$data['title'] = "Expense Form";
		$data['description'] = "Description";
		$data['keywords'] = "purchase, accounting, cloud";
		$data['author'] = "Sokdararith";

		$this->load->view("/popup/expense", $data);
	}

	public function po($invoiceId = null) {
		$data['title'] = "Purchase Order Form";
		$data['description'] = "Description";
		$data['keywords'] = "purchase, accounting, cloud";
		$data['author'] = "Sokdararith";

		$this->load->view("/popup/po", $data);
	}

	public function purchase_return($id = null) {
		$data['title'] = "Expense Form";
		$data['description'] = "Description";
		$data['keywords'] = "purchase, accounting, cloud";
		$data['author'] = "Sokdararith";

		$this->load->view("/popup/purchase_return", $data);
	}

	public function journal($journalId = null) {
		$data['title'] = "Expense Form";
		$data['description'] = "Description";
		$data['keywords'] = "purchase, accounting, cloud";
		$data['author'] = "Sokdararith";

		$this->load->view("/popup/journal", $data);
	}

	public function invoice($invoiceId = null) {
		$this->load->view("/map/map_view");
	}

	public function sale_order($soId = null) {
		$this->load->view("/map/map_view");
	}

	public function quotation($quoteId = null) {
		$this->load->view("/map/map_view");
	}
}