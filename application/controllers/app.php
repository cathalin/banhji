<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		if($this->session->userdata('logged_in')!==1) {
			redirect('auth');
		}
	}
	
	public function index() {	
		
		/*
		 *set up title and keywords (if not the default in custom.php config file will be set) 
		 */
		$data['author'] = "";
		$data['description'] = "";
		$data['keywords'] = "";
		$this->_render("app/banhji_view", $data);
		
	}	
}

/* End of file app.php */
/* Location: ./application/controllers/app.php */