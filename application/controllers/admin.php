<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('accounting/invoice_model', 'invoice');

		//Check if user is logged in
		if(!$this->session->userdata('logged_in') && $this->session->userdata('role_id') !== 1) {
			redirect('auth');
		} 
	}
	
	public function index() {
		// $this->title = "Admin";
		// $this->_render('/admin/dashboard_view');
		$this->title = "ក្រុមហ៊ុន";
		$this->_render('admin/company_list_view');
	}

	public function settings(){
		$this->title = "Config";
		$this->_render('admin/config_view');
	}

	public function company() {
		$this->title = "Company";
		$this->_render('admin/company_view');
	}

	public function user() {
		$this->title = "អ្នកប្រើប្រាស់";
		$this->_render('admin/user_view');
	}

	//By Dawine
	public function manage_company() {		
		$this->title = "ក្រុមហ៊ុន";
		$this->_render('admin/manage_company_view');
	}

	public function opening_balance(){		
		$this->data['next_inv_id'] = $this->invoice->get_next_id();
		$this->data['last_invoice_no'] = $this->invoice->last_number('Invoice');
		
		$this->title = "បើកសមតុល្យដើមគ្រា";
		$this->_render("admin/opening_balance_view");
	}

	function customer_type(){
		$this->title = "ប្រភេទអតិថិជន";
		$this->_render('admin/customer_type_view');
	}

	public function tariff_plan(){
		$this->title = "កំណត់ផែនការតំលៃ";
		$this->_render('admin/tariff_plan_view');
	}

	public function tariff(){
		$this->title = "កំណត់តំលៃលក់";		
		$this->_render("admin/tariff_view");
	}

	public function exemption(){
		$this->title = "កំណត់ការលើកលែង";		
		$this->_render("admin/exemption_view");
	}

	public function maintenance(){
		$this->title = "កំណត់ថ្លៃថែទាំ";		
		$this->_render("admin/maintenance_view");
	}

	public function electricity_box(){
		$this->title = "ប្រអប់កុងទ័រ";		
		$this->_render("admin/electricity_box_view");
	}

	public function ampere(){
		$this->title = "អំពែ";		
		$this->_render("admin/ampere_view");
	}

	public function voltage(){
		$this->title = "តុងស្យុង";		
		$this->_render("admin/voltage_view");
	}
	
	public function classes(){
		$this->title = "Classes";		
		$this->_render("admin/classes_view");
	}

	public function currency_rate(){
		$this->title = "អត្រាប្រាក់";		
		$this->_render("admin/currency_rate_view");
	}

}