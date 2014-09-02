<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Transformers extends REST_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('itransrecord_m', 'irecord');
	}


	//Getting the record of tranformer with given id
	public function transformerRecords_get() {
		$filter= $this->get('filter');
		$limit = $this->get("pageSize");
		$offset = $this->get("skip"); 
		if(!empty($filter) && isset($filter)){			
			$criteria = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$criteria += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}
			$query = $this->irecord->limit($limit, $offset)->get_many_by($criteria);
			$count = $this->irecord->count_by($criteria);

			if(count($query)>0) {
				foreach($query as $row){	
					$arr[] = array(
						"id"				=> $row->id,
						"new_reading"		=> $row->new_reading,
						"prev_reading"		=> $row->prev_reading,
						"transformer_id"	=> $row->transformer_id,
						"vendor_id"			=> $row->vendor_id,
						"invoiceRef" 		=> $row->invoiceRef,
						"class_id"			=> $row->class_id,
						"created_at"		=> $row->created_at,
						"updated_at"		=> $row->updated_at
					);						
				}
				$this->response(array("status"=>"OK", "count"=>$count, "message"=>"data found.", "results"=>$arr), 200);	
			} else {
				$this->response(array("status"=>"Error", "count"=>0, "results"=>array()), 200);
			}
		} else {
			$this->response(array("status"=>"Error", "count"=>0, "results"=>array()), 200);
		}
	}

	public function transformerRecords_post() {
		$postedData = json_decode($this->post('models'));
		foreach($postedData as $k=>$v) {
			$data[] = array(					
					"new_reading"		=> $v->new_reading,
					"prev_reading"		=> $v->prev_reading,
					"transformer_id"	=> $v->transformer_id,
					"vendor_id"			=> $v->vendor_id,
					"invoiceRef" 		=> $v->invoiceRef,
					"class_id"			=> $v->class_id
				);			
		}
		$ids = $this->irecord->insert_many($data);
		// $this->response($data, 200);
		if(count($ids) > 0) {
			$query = $this->irecord->get_many($ids);
			$this->response(array("status"=>"OK","message"=>"Records created","results"=>$query), 200);
		} else {
			$this->response(array("status"=>"Failed","message"=>"Records cannot be created"), 200);
		}
	}

	public function transformerRecords_put() {
		$postedData = json_decode($this->put('models'));
		$ids = array();
		if($postedData){
			foreach($postedData as $k=>$v) {
				$ids[] = $v->id;
				$data = array(
						"new_reading"		=> $v->new_reading,
						"prev_reading"		=> $v->prev_reading,
						"transformer_id"	=> $v->transformer_id,
						"vendor_id"			=> $v->vendor_id,
						"invoiceRef" 		=> $v->invoiceRef,
						"class_id"			=> $v->class_id
					);
				$this->irecord->update($v->id, $data);			
			}
		
 			$query = $this->irecord->get_many($ids);
 			if(count($query) > 0) {
 				foreach($query as $q) {
					$results[] = array(
						"id" => $q->id,
						"transformer_id" => $q->transformer_id,
						"new_reading" => $q->new_reading,
						"prev_reading" => $q->prev_reading,
						"class_id" => $q->class_id,
						"vendor_id" => $q->vendor_id
					);
				}
				$this->response(array("status"=>"OK", "message"=>"Purchase Order created.", "results"=>$results), 201);
 			} else {
 				$this->response(array("status"=>"Error", "message"=>"No results found.", "results"=>array()), 200);
 			}
		} else {
			$this->response(array("status"=>"Error", "message"=>"No results found.", "results"=>array()), 200);
		}
	}

	public function transformerRecords_delete() {
		$ids = json_decode($this->delete('models'));
		$this->db->trans_start();
		foreach($ids as $key=>$value) {
			$this->irecord->delete($value->id);
		}	
		$this->db->trans_complete();

		if($this->db->trans_status() !== FALSE) {
			$this->response(array("status"=>"OK", "message"=>"Purchase Order deleted.", "results"=>array()), 200);
		} else {
			$this->response(array("status"=>"Failed", "message"=>"Cannot delete Purchase Order.", "results"=>array()), 200);
		}
	}
}
/* End of file transformers.php */
/* Location: ./application/controllers/api/transformers.php */