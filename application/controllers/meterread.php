<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Meterread extends MY_Controller {

	public function index()
	{
		$this->title = "Meter Reading";
		$this->_render("customer/meter_read_view");
	}

	public function read_from_file() {
		$this->load->library('getcsv');
		$path = './uploads/documents/'.'meter_read.txt';
		$data = $this->getcsv->set_file_path($path)->get_array();
		print_r($data);
	}

}

/* End of file meterread.php */
/* Location: ./application/controllers/meterread.php */