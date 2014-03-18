<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends MY_Controller {

	public function index()
	{
		
	}

	public function company() {
		$this->title = "Config";
		$this->_render('settings/company_view');
	}

	public function config() {
		$this->title = "Config";
		$this->_render('settings/config_view');
	}
}

/* End of file setting.php */
/* Location: ./application/controllers/setting.php */