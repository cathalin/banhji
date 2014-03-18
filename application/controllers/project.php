<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends My_Controller {

	function __construct() {
		parent::__construct();
		$this->data['aside_bar'] = "/staff/sidenav";
	}

	public function index()
	{

		$this->_render("/project/home_view");
	}

}

/* End of file project.php */
/* Location: ./application/controllers/project.php */