<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Journal_model extends MY_Model {
	
	public $before_create = array( 'created_at', 'updated_at' );
    public $before_update = array( 'updated_at' );
		
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

	    else {
	    	return FALSE;
	    }
	}

	public function journal_entry_by($criteria, $trans_id) {
		$query = $this->db->select("account, memo, dr, cr, balance, class_id, created_at")
						  ->where($criteria, $trans_id)
						  ->get('journal_entries');

		if($query->num_rows() > 0) {
			foreach($query->result() as $t) {
				$data[] = array(
						"account" => $this->_account_name_by($t->account),
						"memo" => $t->memo,
						"dr" => $t->dr,
						"cr" => $t->cr,
						"balance" => $t->balance,
						"class" => $this->db->from("classes")->where("id", $t->class_id)->limit(1)->get()->row(),
						"date" => $t->created_at
					);
 			}
 			return $data;
		} else {
			return array();
		}
	}

	public function where_date($start, $end) {
		$this->db->where("created_at >=", date('Y-m-d', strtotime($start)))
				 ->where("created_at <=", date('Y-m-d', strtotime($end)));
		return $this;
	}

	public function get_balance_amount_by($account_id) {
		$amount = $this->_get_balance_from_journal($account_id);
		return $amount;
	}
	
	public function get_report($type, $from, $to, $report_type='balance_sheet', $class_id="") {
		$operant;
		$net_income = 0;
		$data = array();
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

		$income_accounts = $this->_get_accounts($operant);


	
		for($i=0;$i<count($income_accounts);$i++) {
			if($report_type !== 'balance_sheet') {
				if($class_id === "" || $class_id=== 0) {
					$incomes = $this->db->from("journal_entries")->where("created_at >=", date('Y-m-d', strtotime($from)))->where("created_at <=", date('Y-m-d', strtotime($to)))
				    ->where('account', $income_accounts[$i])->order_by("id", "DESC")->limit(1)->get();
				} else {
					$incomes = $this->db->from("journal_entries")->where("created_at >=", date('Y-m-d', strtotime($from)))->where("created_at <=", date('Y-m-d', strtotime($to)))
				    ->where('account', $income_accounts[$i])->order_by("id", "DESC")->limit(1)->get();
				}
				
			} else {
				$since = $this->_fiscal_year();
				
				$incomes = $this->db->from("journal_entries")->where("created_at >=", date('Y-m-d', strtotime($since)))->where("created_at <=", date('Y-m-d', strtotime($to)))
				    ->where('account', $income_accounts[$i])->order_by("id", "DESC")->limit(1)->get();	
				
				//$data['data'] = date('Y-m-d', strtotime($to));
			}

			if($incomes->num_rows() > 0) {
				foreach($incomes->result() as $row) {
					if($income_accounts[$i] == $row->account) {
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
		
		if($report_type === 'balance_sheet' && $operant === 3) {
			$since = $this->_fiscal_year();
			$i_account = $this->_get_accounts(4);
			$e_account = $this->_get_accounts(5);
			for($i=0;$i<count($i_account);$i++) {
				$income = $this->db->from("journal_entries")->where("created_at >=", date('Y-m-d', strtotime($since)))->where("created_at <=", date('Y-m-d', strtotime($to)))
			    ->where('account', $i_account[$i])->order_by("id", "DESC")->limit(1)->get();
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
			    $expense = $this->db->from("journal_entries")->where("created_at >=", date('Y-m-d', strtotime($since)))->where("created_at <=", date('Y-m-d', strtotime($to)))
			    ->where('account', $e_account[$i])->order_by("id", "DESC")->limit(1)->get();


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

	public function account_name_by($id) {
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

	public function general_ledger() {
		//get all active account from journal entries
		$accountQuery = $this->db->select("account")
								 ->group_by("account")
								 ->get("journal_entries");

		if($accountQuery->num_rows() > 0) {
			foreach($accountQuery->result() as $account) {
				$accounts[] = array(
					"account" => $account->account, 
					"transactions" => $this->ledger_transactions($account->account)
					);
			}
			return $accounts;	
		}
		return FALSE;
	}

	public function ledger_transactions($account) {
		$entries = $this->db->select('journal_id')->from("journal_entries")
							->group_by("journal_id")->where("account", $account)->get();
		if($entries->num_rows() > 0) {
			foreach($entries->result() as $e) {
				$ids[] = $e->journal_id;

			}
		}
		return $ids;
	}

	public function ledger_entries($account, $transID, $start, $end, $class_id="") {
		//$where = array('journal_id' => $transID, 'account !=' => $account);
		if($class_id == "" || $class_id == 0) {
			$this->db->select("journal_entries.journal_id as tranID,
						   journal_entries.memo as memo, 
						   journal_entries.dr as dr, 
						   journal_entries.cr as cr, 
						   journal_entries.balance as balance, 
						   journal_entries.created_at as date,  
						   journals.transaction_type as operation_type")
				 ->from("journal_entries")
				 ->where("journal_entries.created_at >=", date('Y-m-d', strtotime($start)))
				 ->where("journal_entries.created_at <=", date('Y-m-d', strtotime($end)))
				 ->where("journal_entries.account", $account)
				 ->where_in("journal_entries.journal_id", $transID)
				 ->join("accounts", "accounts.id = journal_entries.account")
				 ->join("journals", "journals.id = journal_entries.journal_id");
		} else {
			$this->db->select("journal_entries.journal_id as tranID,
						   journal_entries.memo as memo, 
						   journal_entries.dr as dr, 
						   journal_entries.cr as cr, 
						   journal_entries.balance as balance, 
						   journal_entries.created_at as date,  
						   journals.transaction_type as operation_type")
				 ->from("journal_entries")
				 ->where("journal_entries.created_at >=", date('Y-m-d', strtotime($start)))
				 ->where("journal_entries.created_at <=", date('Y-m-d', strtotime($end)))
				 ->where("journal_entries.account", $account)
				 ->where("journal_entries.class_id", $class_id)
				 ->where_in("journal_entries.journal_id", $transID)
				 ->join("accounts", "accounts.id = journal_entries.account")
				 ->join("journals", "journals.id = journal_entries.journal_id");
		} 
		
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			foreach($query->result() as $r) {
				$data[] = array(
					"transID" => $r->tranID,
					"tranDescription" => $r->operation_type,
					"memo" => $r->memo,
					"dr" => $r->dr,
					"cr" => $r->cr,
					"balance" => $r->balance,
					"date" => $r->date
				);
			}
			return $data;
		}

	}

	public function get_billed_amount($bill_id = 0) {
		if($bill_id > 0) {
			$this->db->select("amount_billed")
			         ->where("id", $bill_id);
			$q = $this->db->get("journals");

			if($q->num_rows() > 0) {
				foreach($q->result() as $r) {
					$amount_billed = $r->amount_billed;
				}
				return $amount_billed;
			} else {
				return FALSE;
			}
		}
	}

	function select($fields) {
    	$this->db->select($fields);
    	return $this;
    }
}