<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends My_Controller {
	
	function __construct() {
		parent::__construct();		
		$this->load->model('accounting/invoice_model', 'invoice');
		$this->load->model('accounting/payment_model', 'payment');
		if(!$this->session->userdata('logged_in')) {
			redirect('auth?redirect='.current_url());
		}
	}
	
	public function index(){
		$this->title = "ទំព័រអតិថិជន";
		$this->javascript = array(
			"kendo.map.js"
		);
		$this->data['next_inv_id'] 		= $this->invoice->get_next_id();
		$this->data['next_pay_id'] 		= $this->payment->get_next_id();
		$this->data['last_invoice_no'] 	= $this->invoice->last_number("Invoice");
		$this->data['last_receipt_no'] 	= $this->invoice->last_number("Receipt");
		$this->data['last_estimate_no'] = $this->invoice->last_number("Estimate");
		$this->data['last_gdn_no'] 		= $this->invoice->last_number("GDN");
		$this->data['last_so_no'] 		= $this->invoice->last_number("SO");
		$this->data['last_notice_no'] 	= $this->invoice->last_number("Notice");
				
		$this->_render("customer/customer_centre_view");
	}

	function add_customer(){
		$this->title = "បញ្ចូលអតិថិជនថ្មី";
		$this->_render('customer/add_customer_view');
	}

	function add_customer_normal(){
		$this->title = "បញ្ចូលអតិថិជនថ្មី";
		$this->_render('customer/add_customer_normal_view');
	}

	function customer_list(){
		$this->title = "បញ្ជីអតិថិជន";
		$this->_render('customer/customer_list_view');
	}

	function add_meter_record_by_area(){
		$this->title = "បញ្ចូលអំនានកុងទ័រថ្មីតាមតំបន់";
		$this->_render('customer/add_meter_record_by_area_view');
	}

	function add_meter_record_manual(){		
		$this->title = "បញ្ចូលអំនានកុងទ័រដោយដៃ";
		$this->_render('customer/add_meter_record_manual_view');
	}

	function unread_meter(){
		$this->title = "កុងទ័រមិនទាន់បញ្ចូលអំនាន";
		$this->_render('customer/unread_meter_view');
	}
	
	function ir_reader(){								
		$this->title = "បញ្ចូលអំនានកុងទ័រថ្មីតាម IR Reader";
		$this->_render('customer/ir_reader_view');
	}

	function receipt(){								
		$this->title = "បង្កាន់ដៃលក់";
		$this->data['next_inv_id'] 		= $this->invoice->get_next_id();		
		$this->data['last_receipt_no'] 	= $this->invoice->last_number("Receipt");
		$this->_render('customer/receipt_view');
	}
	
	function meter_record_by_area(){
		$this->data['next_inv_id'] = $this->invoice->get_next_id();
		$this->data['last_invoice_no'] = $this->invoice->last_number('Invoice');
		
		$this->title = "រៀបចំវិក្កយបត្រ";
		$this->_render('customer/meter_record_by_area_view');
	}
				
	function invoice_form($invoice_id){
		//Include js
		$this->javascript = array(
			"jquery-barcode-2.0.2.min.js"			
		);

		$this->data['invoice_id'] = $invoice_id;		
		
		$this->title = "វិក្ក​យបត្រ";
		$this->_render('customer/invoice_form_view');
	}

	function invoice_preview(){		
		$this->title = "បោះពុម្ពវិក្ក័យបត្រ";
		$this->_render('customer/invoice_preview_view');
	}
	
	function electricity_invoice($invoice_id){
		//Include js
		$this->javascript = array(
			"jquery-barcode-2.0.2.min.js"			
		);

		$this->data['invoice_id'] = $invoice_id;		
		
		$this->title = "វិក្ក​យបត្រភ្លើង";
		$this->_render('customer/electricity_invoice_view');
	}

	function notice_form($invoice_id){
		//Include js
		$this->javascript = array(
			"jquery-barcode-2.0.2.min.js"			
		);

		$this->data['invoice_id'] = $invoice_id;		
		
		$this->title = "លិខិតរំលឹក";
		$this->_render('customer/notice_form_view');
	}

	function print_invoice(){
		//Include js
		$this->javascript = array(
			"jquery-barcode-2.0.2.min.js"			
		);
		
		$this->title = "បោះពុម្ពវិក្ក័យបត្រ";
		$this->_render('customer/print_invoice_view');
	}
	
	function so_fulfillment(){
		$this->title = "តាមដានបញ្ជាលក់";
		$this->data['next_inv_id'] 		= $this->invoice->get_next_id();
		$this->data['last_invoice_no'] 	= $this->invoice->last_number("Invoice");
		$this->data['last_gdn_no'] 		= $this->invoice->last_number("GDN");
		
		$this->_render('customer/sale_order_fulfillment_view');
	}

	function cashier(){
		$this->title = "ទទួលប្រាក់";
		$this->_render('customer/cashier_view');
	}

	function edit_payment(){
		$this->title = "កែប្រែការបង់ប្រាក់";
		$this->_render('customer/edit_payment_view');
	}
	
	function daily_payment() {
		$this->title = "របាយការណ៍ទទួលប្រាក់ប្រចាំថ្ងៃ";
		$this->_render('customer/daily_payment_view');
	}

	function reconcile() {
		$this->title = "ផ្ទៀងផ្ទាត់&ផ្ទេរសាច់ប្រាក់";
		$this->_render('customer/reconcile_view');
	}
	
	function aging_summary(){
		$this->title = "របាយការណ៍បំណុលអតិថិជន";
		$this->_render('customer/aging_summary_view');
	}

	function low_consumption(){
		$this->title = "របាយការណ៍អតិថិជនប្រើប្រាស់អប្បបរិមា";
		$this->_render('customer/low_consumption_view');
	}

	function electricity_sale(){
		$this->title = "របាយការណ៍លក់អគ្គិសនី";
		$this->_render('customer/electricity_sale_view');
	}

	function disconnect_list(){
		$this->title = "អតិថិជនត្រូវផ្ដាច់ចរន្ត";
		$this->_render('customer/disconnect_list_view');
	}

	function collection_center(){
		$this->title = "Collection Center";
		$this->_render('customer/collection_center_view');
	}


}

/* End of file customer.php */
/* Location: ./application/controllers/customer.php */