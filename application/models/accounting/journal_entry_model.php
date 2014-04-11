<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Journal_Entry_model extends MY_Model {
	
	public $before_create = array( 'created_at', 'updated_at' );
    public $before_update = array( 'updated_at' );
	
	//find account balance from journal
	private function _get_balance_from_journal($acct_id) {
		$this->db->select("balance");
		$this->db->where("account", $acct_id);
		$this->db->order_by("id", "DESC");
		$this->db->limit(1);		
		$query = $this->db->get('journal_entries');
		
		if ( $query->num_rows() > 0 ) :
			return $query->row()->balance;
		else:
			return 0;		
		endif;		
	}

	//find nature of acct_id
	private function _get_account_nature($account_id) {	
		$child = $this->_get_parent_ac_id($account_id);	
		$this->db->select('nature');
		$this->db->from("account_types");
		$this->db->where('id', $child);		
		$q = $this->db->get();
				
		return $q->row()->nature;				
	}

	private function _get_parent_ac_id($ac_id) {
		$this->db->select('account_type_id');
		$this->db->where('id', $ac_id);
		$q = $this->db->get('accounts');
		return $q->row()->account_type_id;
	}

	public function where_date($start, $end) {
		$this->db->where("created_at >=", date('Y-m-d', strtotime($start)))
				 ->where("created_at <=", date('Y-m-d', strtotime($end)));
		return $this;
	}

	public function where_in($ids = array()) {
		$this->db->where_in("journal_id", $ids);
		return $this;
	}

	private function _fiscal_year() {
		$query = $this->db->select("fiscal_year")
		 				  ->from("settings")
		 				  ->get();
		if($query->num_rows() > 0) {
			return $query->row()->fiscal_year;
		}
		return FALSE;
	}
	
	//Calculate account balance
	public function calculate_account_balance($acct_id, $dr, $cr) {			
		$nature = $this->_get_account_nature($acct_id);			
		$balance = $this->_get_balance_from_journal($acct_id);
		
		//Apply account nature
		if( $nature === "Dr") {
			if( $dr > 0) {
				$balance = $balance + $dr;
			} else {
				$balance = $balance - $cr;
			}
		} else {
			if( $cr > 0) {
				$balance = $balance + $cr;
			} else {
				$balance = $balance - $dr;
			}
		}
		return $balance;
	}

	private function _account_name_by($id) {
		$this->db->select("id, name, code")
				 ->from("accounts")
				 ->where("id", $id)
				 ->limit(1);
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			return $query->row();
		} else {
			return FALSE;
		}
	}

	private function _get_account_type($type, $class_id, $from, $to) {
		$operant;
		switch ($type) {
			case 'asset':
				$operant = 1;
				break;
			case 'liability':
				$operant = 2;
				break;
			case 'equity':
				$operant = 3;
				break;
			case 'income':
				$operant = 4;
				break;
			case 'expense':
				$operant = 5;
				break;
			case 'cogs':
				$operant = 16;
				break;
		}
		$query = $this->db->from('journal_entries')
				 //->where('class_id', $class_id)
				 //->where('created_at >=', date('Y-m-d', strtotime($from)))
				 //->where('created_at <=', date('Y-m-d', strtotime($to)))
				 ->where_in('account', $this->_get_accounts($operant))
				 ->get();

		return $query->result();
	}

	public function by_class($class_id) {
		if($class_id !== "" || $class_id !== 0) {
			$this->db->where('class_id', $class_id);
		}
		return $this;
	}

	/**********************************************************************************
	* This function will get the net income or loss for display in the balance sheet *
	* param class_id
	*
	**********************************************************************************/
	public function get_income_loss($class_id, $from, $to) {
		$since = $this->_fiscal_year();
		$i_account = $this->_get_accounts(4);
		$e_account = $this->_get_accounts(5);
		$net_income = 0;
		for($i=0;$i<count($i_account);$i++) {
			if($class_id !=="" || $class_id !== 0) {
				$income = $this->db->from("journal_entries")
								   ->where("created_at >=", date('Y-m-d', strtotime($since)))
								   ->where("created_at <=", date('Y-m-d', strtotime($to)))
		    					   ->where('account', $i_account[$i])
		    					   ->where('class_id', $class_id)
		    					   ->order_by("id", "DESC")->limit(1)->get();
			} else {
				$income = $this->db->from("journal_entries")
								   ->where("created_at >=", date('Y-m-d', strtotime($since)))
								   ->where("created_at <=", date('Y-m-d', strtotime($to)))
		    					   ->where('account', $i_account[$i])
		    					   ->order_by("id", "DESC")->limit(1)->get();
			}
			
		    if($income->num_rows() > 0) {
				foreach($income->result() as $row) {
					if($i_account[$i] == $row->account) {
						$net_income += $row->balance;
						break;
					}
				}
			}
		}
		for($i=0;$i<count($e_account);$i++) {
			if($class_id !=="" || $class_id !== 0) {
				$expense = $this->db->from("journal_entries")
								   ->where("created_at >=", date('Y-m-d', strtotime($since)))
								   ->where("created_at <=", date('Y-m-d', strtotime($to)))
		    					   ->where('account', $e_account[$i])
		    					   ->where('class_id', $class_id)
		    					   ->order_by("id", "DESC")->limit(1)->get();
			} else {
				$expense = $this->db->from("journal_entries")
								   ->where("created_at >=", date('Y-m-d', strtotime($since)))
								   ->where("created_at <=", date('Y-m-d', strtotime($to)))
		    					   ->where('account', $e_account[$i])
		    					   ->order_by("id", "DESC")->limit(1)->get();
			}

			if($expense->num_rows() > 0) {
				foreach($expense->result() as $row) {
					if($e_account[$i] == $row->account) {
						$net_income -= $row->balance;
						break;
					}
				}
			}
		}

		$data = array(
				"id" 			=> 0,
				"account_id" 	=> 0,
				"account_code"	=> "",
				"account_name"	=> "ចំណេញ ឬ (ខាត) សុទ្ធ",
				"dr"			=> 0,
				"cr"			=> 0,
				"balance"		=> $net_income,
				"memo"			=> "",
				"voucher"		=> ""
		);
		return $data;
	}


	/**********************************************************************************
	* _get_account return the accounts based on account type eg. assets, liability    *
	* param $parent_id or the main type
	*
	**********************************************************************************/
	 public function get_accounts($type, $class_id, $to, $from="") {
	 	
	 	$operant;
	 	$net_income = 0;
	 	$since;
	 	$data = array();
	 	if($from === "") {
	 		$since = $this->_fiscal_year();
	 	} else {
	 		$since = $from;
	 	}
	 	switch ($type) {
			case 'asset':
				$operant = 1;
				break;
			case 'liability':
				$operant = 2;
				break;
			case 'equity':
				$operant = 3;
				break;
			case 'income':
				$operant = 4;
				break;
			case 'expense':
				$operant = 5;
				break;
		}

		$accounts = $this->_get_accounts($operant);
		for($i=0;$i<count($accounts);$i++) {

			if($class_id == "" || $class_id == 0) {
				$incomes = $this->db->from("journal_entries")->where("created_at >=", date('Y-m-d', strtotime($since)))->where("created_at <=", date('Y-m-d', strtotime($to)))
			    ->where('account', $accounts[$i])->order_by("id", "DESC")->limit(1)->get();
			} else {
				$incomes = $this->db->from("journal_entries")->where("created_at >=", date('Y-m-d', strtotime($since)))->where("created_at <=", date('Y-m-d', strtotime($to)))
			    ->where('account', $accounts[$i])->where('class_id', $class_id)->order_by("id", "DESC")->limit(1)->get();
			}	
			
			//$data['data'] = date('Y-m-d', strtotime($to));

			if($incomes->num_rows() > 0) {
				foreach($incomes->result() as $row) {
					if($accounts[$i] === $row->account) {
						$ac = $this->_account_name_by($row->account);
						$data[$type][] = array(
								"tranId"		=> $row->journal_id,
								"account_id" 	=> $row->account,
								"account_code"	=> $ac->code,
								"account_name"	=> $ac->name,
								"dr"			=> $row->dr,
								"cr"			=> $row->cr,
								"balance"		=> $row->balance,
								"memo"			=> $row->memo
							);
						
						break;
					}
				}
			}
		}

		if($operant === 3) {

			$i_account = $this->_get_accounts(4);
			$e_account = $this->_get_accounts(5);
			for($i=0;$i<count($i_account);$i++) {
				if($class_id == "" || $class_id == 0) {
					$income = $this->db->from("journal_entries")->where("created_at >=", date('Y-m-d', strtotime($since)))->where("created_at <=", date('Y-m-d', strtotime($to)))
				    ->where('account', $i_account[$i])->order_by("id", "DESC")->limit(1)->get();
				} else {
					$income = $this->db->from("journal_entries")->where("created_at >=", date('Y-m-d', strtotime($since)))->where("created_at <=", date('Y-m-d', strtotime($to)))
				    ->where('account', $i_account[$i])->where('class_id', $class_id)->order_by("id", "DESC")->limit(1)->get();
				}
			    if($income->num_rows() > 0) {
					foreach($income->result() as $row) {
						if($i_account[$i] == $row->account) {
							$net_income += $row->balance;
							break;
						}
					}
				}
			}
			for($i=0;$i<count($e_account);$i++) {
			    if($class_id == "" || $class_id == 0) {
					$expense = $this->db->from("journal_entries")->where("created_at >=", date('Y-m-d', strtotime($since)))->where("created_at <=", date('Y-m-d', strtotime($to)))
				    ->where('account', $e_account[$i])->order_by("id", "DESC")->limit(1)->get();
				} else {
					$expense = $this->db->from("journal_entries")->where("created_at >=", date('Y-m-d', strtotime($since)))->where("created_at <=", date('Y-m-d', strtotime($to)))
				    ->where('account', $e_account[$i])->where('class_id', $class_id)->order_by("id", "DESC")->limit(1)->get();
				}

				if($expense->num_rows() > 0) {
					foreach($expense->result() as $row) {
						if($e_account[$i] == $row->account) {
							$net_income -= $row->balance;
							break;
						}
					}
				}
			}
			$data['equity'][] = array(
					"id" 			=> 0,
					"account_id" 	=> 0,
					"account_code"	=> "",
					"account_name"	=> "ចំណេញ ឬ (ខាត) សុទ្ធ",
					"dr"			=> 0,
					"cr"			=> 0,
					"balance"		=> $net_income,
					"memo"			=> "",
					"voucher"		=> ""
			);

		}
		return $data;
	}

	private function _get_accounts($parent) {
		$this->db->select("id")
				 ->from("account_types")
				 ->where("parent_id", $parent);
	    $query = $this->db->get();

	    if($query->num_rows() > 0) {
	    	foreach($query->result() as $row) {
	    		$ids[] = $row->id;
	    	}

	    	$this->db->select("id, code, name, account_type_id")
					 ->from("accounts")
					 ->where_in("account_type_id", $ids);

			$query = $this->db->get();

			if($query->num_rows() > 0) {
				foreach ($query->result() as $row) {
					$data[] = $row->id;
				}
				
			}

			return $data;
	    } 
	}


	//By the mighty Dawine 
	public function customer_deposit($people_id){
		$this->db->select('journal_entries.dr, journal_entries.cr');
		$this->db->join('journals', 'journals.id = journal_entries.journal_id');
		$this->db->where('journals.people_id', $people_id);
		$this->db->where('journal_entries.account', 84);
		$query = $this->db->get('journal_entries');

		$dr = 0;
		$cr = 0;
		foreach ($query->result() as $row){
		    $dr += $row->dr;
		    $cr += $row->cr;
		}		
		return $cr - $dr;
	}


}