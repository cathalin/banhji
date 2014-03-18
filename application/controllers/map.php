<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Map extends MY_Controller {

	public function show($lat = 12.4317, $long = 104.5291)
	{
		$data['lat'] = $lat;		
		$data['long']= $long;
		$this->javascript = array(
			"kendo.map.js", 
			"app/map.js"
		);
		$this->title = "Map";
		$this->_render('map/map_view');
	}

}

/* End of file map.php */
/* Location: ./application/controllers/map.php */