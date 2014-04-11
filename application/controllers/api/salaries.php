<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Salaries extends REST_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('salary_m', 'salary');
		$this->load->model('salary_history_m', 'history');
		$this->load->model('staff/employee_m', 'emp');
	}

		//get operation for all salaries if there is no id pass
	function index_get($id="") {
		$query;
		if( $id != "" ) {
			$query = $this->salary->get_by('staff_id', $id);
			if( !empty($query) ) {
				$data = array(
					"id"			=> $query->id,
					"staff"			=> $this->emp->get($query->staff_id),
					"gross_salary" 	=> $query->gross_salary,
					"dependents"	=> $query->dependents,
					"benefit"		=> $query->benefit
				);
				$this->response($data, 200);
			} else {
				$message = array(
					"status" => "not found",
					"message"=> "There is no record of employee salary found."
				);
				$this->response($message, 400);
			}
		} else {

			$query = $this->salary->get_all();
			if(!empty($query)) {
				foreach( $query as $row ) {
				$data[] = array(
						"id"			=> $row->id,
						"staff"			=> $this->emp->get($row->staff_id),
						"gross_salary" 	=> $row->gross_salary,
						"dependents"	=> $row->dependents,
						"benefit"		=> $row->benefit
					);
				}
				$this->response($data, 200);
			} else {
				$this->response(array('status'=>'error'), 400);
			}
			
		}
	}

	function index_post() {
		//$staff = $this->post('staff');
		$data = array(
					"staff_id"		=> $this->post('staff'),//$staff['id'],
					"gross_salary" 	=> $this->post('gross_salary'),
					"dependents"	=> $this->post('dependents'),
					"benefit"		=> $this->post('benefit')
				);
		$id = $this->salary->insert($data);

		if (!empty($id)) {
			$query = $this->salary->get_by('id', $id);
			if( !empty($query) ) {
				$data = array(
					"id"			=> $query->id,
					"staff"			=> $this->emp->get($query->staff_id),
					"gross_salary" 	=> $query->gross_salary,
					"dependents"	=> $query->dependents,
					"benefit"		=> $query->benefit
			);
			$this->response($data, 200);
			} else {
				$message = array(
						"status" => "error",
						"message"=> "Cannot insert your data."
				);
				$this->response($message, 400);
			}
		}
	}

	function index_put() {
		$staff = $this->put("staff");
		$data = array(
					"staff_id"		=> $staff['id'],
					"gross_salary" 	=> $this->put('gross_salary'),
					"dependents"	=> $this->put('dependents'),
					"benefit"		=> $this->put('benefit')
				);
		$id = $this->salary->update($this->put('id'), $data);

		if ($id !== FALSE) {
			$query = $this->salary->get($this->put('id'));
			if( $query ) {
				$data = array(
					"id"			=> $query->id,
					"staff"			=> $this->emp->get($query->staff_id),
					"gross_salary" 	=> $query->gross_salary,
					"dependents"	=> $query->dependents,
					"benefit"		=> $query->benefit
			);
			$this->response($data, 200);
			} else {
				$message = array(
						"status" => "error",
						"message"=> "Cannot insert your data."
				);
				$this->response($query, 400);
			}
		}
	}

	function index_delete() {
		$id		= $this->delete('id');			
		$msg 	= $this->salary->delete($id);
		$this->response(array("hi"=>"OK"), 200);
	}

	//find salary history
	function histories_get($id="") {

	}

	//update history
	function histories_put($id="") {

	}

	//delete selected history field
	function histories_delete() {

	}

	//write to salary history table
	function _insert_history($salary_id="", $salary="") {
		if ( $salary_id != "" && $salary != "" ) :
			$data = array(
				"salary_id" => $salary_id,
				"salary" 	=> $salary,
				"memo"		=> $memo
			);
			return $this->history->insert($data);
		else :
			return FALSE;
		endif;
	}

	private function _calculate_tax($amount = 0) {
		switch ($amount) {
			case ($amount <= 500000):
				return "0%";
				break;
			
			case ($amount <= 1250000) :
				return "5%";
				break;
			case ($amount <= 8500000) :
				return "10%";
				break;
			case ($amount <= 12500000) :
				return "15%";
				break;
			case ($amount > 12500000) :
				return "20%";
				break;
		}
	}	

	private function _calculate_salary($amount = 0) {
		switch ($amount) {
			case ($amount <= 500000):
				return $amount;
				break;
			
			case ($amount <= 1250000) :
				return (($amount * 0.05)-25000);
				break;
			case ($amount <= 8500000) :
				return (($amount * 0.1)-87500);
				break;
			case ($amount <= 12500000) :
				return (($amount * 0.15)-512500);
				break;
			case ($amount > 12500000) :
				return (($amount * 0.2)-1137500);
				break;
		}
	}

	public function sal_get($amount) {
		$this->response(array("salary amount"=> $this->_calculate_salary($amount)), 200);
	}
}