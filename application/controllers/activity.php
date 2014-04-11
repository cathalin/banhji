<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity extends My_Controller {

	function __construct() {
		parent::__construct();
		$this->data['aside_bar'] = "/staff/sidenav";
	}

	public function index()
	{
		$this->_render("/activity/home_view");
	}

}

/* End of file contact.php */
/* Location: ./application/controllers/contact.php */