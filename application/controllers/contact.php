<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends My_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$this->_render("/contact/home_view");
	}

}

/* End of file contact.php */
/* Location: ./application/controllers/contact.php */