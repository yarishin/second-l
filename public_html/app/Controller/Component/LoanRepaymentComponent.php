<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class LoanRepaymentComponent extends Component {
	
	// 他のコンポーネントを使えるようにする。
	public $components = array(
		 "Common"
		,"InformationHistory"
		,"SessionAdminInfo"
		,"SessionUserInfo"
		,"Calendar"
		,"CheckC050"
		,"Fund"
		,"DividendHistory"
		,"Mail"
	);
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * 返済予定リスト<br>
	 * 条件で指定された内容の返済予定リストを取得する。<br>
	 * @param  array $search
	 * @return array $investment_list
	 */
	function searchLoanRepaymentList($search) {
		
		try {
			
			$data = null;
			
			//ソート項目
			$data[SEARCH_ID_050190040] = $search[SEARCH_ID_050190040];
			
			// ソート順
			$data[SEARCH_ID_050190050]  = $search[SEARCH_ID_050190050];


			// 返済予定日
			if (isset($search[SEARCH_ID_050190010]) && strcmp("", $search[SEARCH_ID_050190010]) != 0) {
				
				$month_last_day = $this->Controller->Calendar->ajustDateValid($search[SEARCH_ID_050190010], $search[SEARCH_ID_050190020], "31");

				$date_from = date(DATETIME_FORMAT_1, strtotime($search[SEARCH_ID_050190010]."/".$search[SEARCH_ID_050190020]."/01"));
				$date_to   = date(DATETIME_FORMAT_2, strtotime($search[SEARCH_ID_050190010]."/".$search[SEARCH_ID_050190020]."/".$month_last_day));
				
				$data[SEARCH_ID_050190010] = $date_from;
				$data[SEARCH_ID_050190020] = $date_to;
			}

			// ファンドID
			if (isset($search[SEARCH_ID_050190030]) && strcmp("", $search[SEARCH_ID_050190030]) != 0) {
				$data[SEARCH_ID_050190030] = $search[SEARCH_ID_050190030];
			}
			
			$result = null;
			$result = $this->Controller->TrnLoanRepayment->searchLoanRepayment($data);
			
			$count= 1;
			foreach ($result as $key => $value) {
		
				$search[OBJECT_ID_050190060.$count] =  $value['t2'][COLUMN_0500010];
				$search[OBJECT_ID_050190070.$count] =  $value['t2'][COLUMN_0500020];
				$search[OBJECT_ID_050190050.$count] =  $value['t1'][COLUMN_1300010];
				$search[OBJECT_ID_050190080.$count] =  $value['t1'][COLUMN_1300030];
				$search[OBJECT_ID_050190090.$count] =  $value['t1'][COLUMN_1300050];
				$search[OBJECT_ID_050190100.$count] =  $value['t1'][COLUMN_1300060];
				$search[OBJECT_ID_050190110.$count] =  $value['t1'][COLUMN_1300070];
				$search[OBJECT_ID_050190120.$count] =  $value['t1'][COLUMN_1300080];
				$search[OBJECT_ID_050190010.$count] =  $value['t1'][COLUMN_1300120];
				$search[OBJECT_ID_050190020.$count] =  $value['t1'][COLUMN_1300140];
				$search[OBJECT_ID_050190030.$count] =  $value['t1'][COLUMN_1300150];
				$search[OBJECT_ID_050190040.$count] =  $value['t1'][COLUMN_1300160];
				$search[OBJECT_ID_050190130.$count] =  $value['t1'][COLUMN_1300040];
				$search[OBJECT_ID_050190140.$count] =  $value['t1'][COLUMN_1300165];
				
				$count++;
			}
		
			return $search;
			
		} catch (Exception $ex) {
			$err = "LoanRepayment->searchLoanRepaymentList で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 返済予定リスト(確認画面)<br>
	 * 条件で指定された内容の返済予定リストを取得する。<br>
	 * @param  array $search
	 * @return array $investment_list
	 */
	function getLoanRepaymentList($data) {
		
		try {
			$data_list = array();
			$count = 1;

			while (isset($data[OBJECT_ID_050190050.$count])) {
				if (	(strcmp("", $data[OBJECT_ID_050190010.$count]) != 0)
					 && (strcmp("", $data[OBJECT_ID_050190020.$count]) != 0) && is_numeric($data[OBJECT_ID_050190020.$count])
					 && (strcmp("", $data[OBJECT_ID_050190030.$count]) != 0) && is_numeric($data[OBJECT_ID_050190030.$count])
					 && (strcmp("", $data[OBJECT_ID_050190040.$count]) != 0) && is_numeric($data[OBJECT_ID_050190040.$count])
					 && (strcmp("", $data[OBJECT_ID_050190140.$count]) == 0)
					) {
					
						$data_list[OBJECT_ID_050190050.$count][OBJECT_ID_050190010] = $data[OBJECT_ID_050190010.$count];
						$data_list[OBJECT_ID_050190050.$count][OBJECT_ID_050190020] = $data[OBJECT_ID_050190020.$count];
						$data_list[OBJECT_ID_050190050.$count][OBJECT_ID_050190030] = $data[OBJECT_ID_050190030.$count];
						$data_list[OBJECT_ID_050190050.$count][OBJECT_ID_050190040] = $data[OBJECT_ID_050190040.$count];
						$data_list[OBJECT_ID_050190050.$count][OBJECT_ID_050190050] = $data[OBJECT_ID_050190050.$count];
						$data_list[OBJECT_ID_050190050.$count][OBJECT_ID_050190060] = $data[OBJECT_ID_050190060.$count];
						$data_list[OBJECT_ID_050190050.$count][OBJECT_ID_050190070] = $data[OBJECT_ID_050190070.$count];
						$data_list[OBJECT_ID_050190050.$count][OBJECT_ID_050190080] = $data[OBJECT_ID_050190080.$count];
						$data_list[OBJECT_ID_050190050.$count][OBJECT_ID_050190090] = $data[OBJECT_ID_050190090.$count];
						$data_list[OBJECT_ID_050190050.$count][OBJECT_ID_050190100] = $data[OBJECT_ID_050190100.$count];
						$data_list[OBJECT_ID_050190050.$count][OBJECT_ID_050190110] = $data[OBJECT_ID_050190110.$count];
						$data_list[OBJECT_ID_050190050.$count][OBJECT_ID_050190120] = $data[OBJECT_ID_050190120.$count];
				}
				$count++;
			}
			
			return $data_list;
			
		} catch (Exception $ex) {
			$err = "LoanRepayment->getLoanRepaymentList で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 返済予定データ更新(確認画面)<br>
	 * 条件で指定された内容の返済予定リストを取得する。<br>
	 * @param  array $search
	 * @return array $investment_list
	 */
	function updateLoanRepayment($data) {
		try {
			
			$admin_info = $this->SessionAdminInfo->getAdminInfo();
			
			$count = 1;
			while (isset($data[OBJECT_ID_050190050.$count])) {
				if (	(strcmp("", $data[OBJECT_ID_050190010.$count]) != 0)
					 && (strcmp("", $data[OBJECT_ID_050190020.$count]) != 0) && is_numeric($data[OBJECT_ID_050190020.$count])
					 && (strcmp("", $data[OBJECT_ID_050190030.$count]) != 0) && is_numeric($data[OBJECT_ID_050190030.$count])
					 && (strcmp("", $data[OBJECT_ID_050190040.$count]) != 0) && is_numeric($data[OBJECT_ID_050190040.$count])
					 && (strcmp("", $data[OBJECT_ID_050190140.$count]) == 0)
				) {
					
						$reg_data = array(
							 COLUMN_1300010 => $data[OBJECT_ID_050190050.$count]    
						    ,COLUMN_1300120 => $data[OBJECT_ID_050190010.$count] 
							,COLUMN_1300130 => $data[OBJECT_ID_050190020.$count] + $data[OBJECT_ID_050190030.$count]+ $data[OBJECT_ID_050190040.$count]
						    ,COLUMN_1300140 => $data[OBJECT_ID_050190020.$count] 
							,COLUMN_1300150 => $data[OBJECT_ID_050190030.$count]  
							,COLUMN_1300160 => $data[OBJECT_ID_050190040.$count]
							,COLUMN_1300200 => date(DATETIME_FORMAT)
							,COLUMN_1300210 => $admin_info[LOGIN_ADMIN_ID]
							,COLUMN_1300220 => $admin_info[LOGIN_ADMIN_NAME]
							,COLUMN_0000040 => date(DATETIME_FORMAT)
							,COLUMN_0000050 => $admin_info[LOGIN_ADMIN_ID]
							,COLUMN_0000060 => $admin_info[LOGIN_ADMIN_NAME]
					   );

						// 実行
						$result = $this->Controller->TrnLoanRepayment->save($reg_data, false);

						$fund_id = $data[OBJECT_ID_050190060.$count];
						$loan_no = $data[OBJECT_ID_050190080.$count];
						$seq_no  = $data[OBJECT_ID_050190130.$count];

						$isNotOver = $this->isRepaymentNotOver($fund_id, $loan_no, $seq_no);
						
						if (!is_null($isNotOver)) {
							$this->insertNewRepayment($fund_id, $loan_no, ++$seq_no, $isNotOver);
						}
				}
				$count++;
			}
			
		} catch (Exception $ex) {
			$err = "LoanRepayment->updateLoanRepayment で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 
	 */
	public function getTrnLoanRepayments($fund_id, $loan_no) {
		try {
			
			// パラメータ設定
			$conditions[COLUMN_1300020] = $fund_id;
			$conditions[COLUMN_1300030] = $loan_no;
			
			$order[COLUMN_1300040] = MODEL_ASC;

			$status[MODEL_CONDITIONS] = $conditions;	
			$status[MODEL_ORDER]      = $order;	

			$data = $this->Controller->TrnLoanRepayment->find(MODEL_ALL, $status);

			return $data;
			
		} catch (Exception $ex) {
			$err = "LoanRepayment->getTrnLoanRepayments で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * 返済予定一覧（入力）：遅延ボタン<br>
	 */
	public function getDalayTrnLoanRepayments($search) {
		try {
			
			// パラメータ設定
			$date = date(DATETIME_FORMAT);	

			$result = $this->Controller->TrnLoanRepayment->searchDelayLoanRepayment($date);
			
			$count= 1;
			foreach ($result as $key => $value) {
		
				$search[OBJECT_ID_050190060.$count] =  $value['t2'][COLUMN_0500010];
				$search[OBJECT_ID_050190070.$count] =  $value['t2'][COLUMN_0500020];
				$search[OBJECT_ID_050190050.$count] =  $value['t1'][COLUMN_1300010];
				$search[OBJECT_ID_050190080.$count] =  $value['t1'][COLUMN_1300030];
				$search[OBJECT_ID_050190090.$count] =  $value['t1'][COLUMN_1300050];
				$search[OBJECT_ID_050190100.$count] =  $value['t1'][COLUMN_1300060];
				$search[OBJECT_ID_050190110.$count] =  $value['t1'][COLUMN_1300100];
				$search[OBJECT_ID_050190120.$count] =  $value['t1'][COLUMN_1300110];
				$search[OBJECT_ID_050190010.$count] =  $value['t1'][COLUMN_1300120];
				$search[OBJECT_ID_050190020.$count] =  $value['t1'][COLUMN_1300140];
				$search[OBJECT_ID_050190030.$count] =  $value['t1'][COLUMN_1300150];
				$search[OBJECT_ID_050190040.$count] =  $value['t1'][COLUMN_1300160];
				$search[OBJECT_ID_050190130.$count] =  $value['t1'][COLUMN_1300040];
				
				$count++;
			}

			return $search;
			
		} catch (Exception $ex) {
			$err = "LoanRepayment->getDalayTrnLoanRepayments で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 次回返済予定日取得<br>
	 * 返済最終回で完済になっていない場合、次回の返済予定日を返す。<br>
	 * @param string $fund_id
	 * @param number $loan_no
	 * @param number $seq_no
	 * @return datetime $result
	 * @throws Exception
	 */
	public function isRepaymentNotOver($fund_id, $loan_no, $seq_no) {
		try {
			
			$result = null;
			
			$data = $this->Controller->TrnLoanRepayment->getMaxSeqNo($fund_id, $loan_no);
			
			foreach ($data as $key => $value) {
				$trade_date         = $value["a"][COLUMN_0700130];
				$max_seq_no         = $value["b"][COLUMN_1300040];
				$repayment_date_1   = $value["b"][COLUMN_1300050];
				$remaining_amount   = $value["0"][COLUMN_1300090];
			}
			
			if ((strcmp($seq_no, $max_seq_no) == 0) && ($remaining_amount > 0)) {
				
				$result = $this->Controller->Calendar->getNextTradeDate($repayment_date_1, $trade_date);
			}
			
			return $result;
			
		} catch (Exception $ex) {
			$err = "LoanRepayment->isRepaymentNotOver で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 返済(貸付)追加登録<br>
	 * 最終回まで入金したのに返済が終わらない場合、返済(貸付)テーブルにレコード追加。<br>
	 * 返済(貸付)テーブルの主キーidはワークテーブルで生成したものをコピーする必要があるため、<br>
	 * まずワークテーブルにデータを登録する。<br>
	 * @param type $fund_id
	 * @param type $loan_no
	 * @param type $seq_no
	 */
	public function insertNewRepayment($fund_id, $loan_no, $seq_no, $trade_date) {
		try {
			
			$this->Controller->WrkLoanRepayment->create();
			
			$admin_info = $this->SessionAdminInfo->getAdminInfo();
			$admin_id   = $admin_info[LOGIN_ADMIN_ID];
			
			// 削除条件指定
			$conditions[COLUMN_1400000] = $admin_id;
			$this->Controller->WrkLoanRepayment->deleteAll($conditions, false);
			
			//新しい
			$date = $trade_date;
			$reg_data = array(
					COLUMN_1700000 => $admin_id
				   ,COLUMN_1700020 => $fund_id  
				   ,COLUMN_1700030 => $loan_no
				   ,COLUMN_1700040 => $seq_no
				   ,COLUMN_1700050 => $date
			  );
			
			// 実行
			$this->Controller->WrkLoanRepayment->save($reg_data, false);
			
			//コピー
			$this->Controller->TrnLoanRepayment->copyWrkLoanRepayment($admin_id, $fund_id);
			
		} catch (Exception $ex) {
			$err = "LoanRepayment->insertNewRepayment で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 返済期間取得<br>
	 * @param string $fund_id
	 * @param number $loan_no
	 * @return array $term
	 */
	function getLoanTerm($fund_id, $loan_no) {
		
		try {
			
			$fields1[] = "min(".COLUMN_1300050.") as ".COLUMN_1300050;

			$conditions[COLUMN_1300020] = $fund_id;
			$conditions[COLUMN_1300030] = $loan_no;

			$group[]  = COLUMN_1300020;
			$group[]  = COLUMN_1300030;

			$status[MODEL_FIELDS]     = $fields1;
			$status[MODEL_CONDITIONS] = $conditions;
			$status[MODEL_GROUP]      = $group;

			$loan = $this->Controller->TrnLoanRepayment->find(MODEL_ALL, $status);
			$start_date = "";
			foreach ($loan as $keys => $values) {
				foreach ($values as $key => $value) {
					$start_date = $value[COLUMN_1300050];
				}
			}

			$fields2[] = "max(".COLUMN_1300050.") as ".COLUMN_1300050;

			$status[MODEL_FIELDS]     = $fields2;

			$loan = $this->Controller->TrnLoanRepayment->find(MODEL_ALL, $status);
			$end_date = "";
			foreach ($loan as $keys => $values) {
				foreach ($values as $key => $value) {
					$end_date = $value[COLUMN_1300050];
				}
			}

			return array($start_date, $end_date);
			
		} catch (Exception $ex) {
			$err = "LoanRepayment->getLoanTerm で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}

	}
	
	/**
	 * 配当実行対象の入金データを取得<br>
	 * ファンドIDが指定されている場合、指定されたものだけを取得<br>
	 * @param datetime $date_from
	 * @param datetime $date_to
	 * @param array $fund_id_list
	 * @return array $result
	 * @throws Exception
	 */
	function getDividendTargetLoan($date_from, $date_to, $fund_id_list = null) {
		
		try {
			
			$data_list = $this->Controller->TrnLoanRepayment->selectDividendTarget($date_from, $date_to, $fund_id_list);
			
			$result = array();
			
			foreach ($data_list as $keys => $values) {
				
				$data[COLUMN_0500010] = $values["a"][COLUMN_0500010];
				$data[COLUMN_0500020] = $values["a"][COLUMN_0500020];
				$data[COLUMN_0500040] = $values["a"][COLUMN_0500040];
				$data[COLUMN_0500130] = $values["a"][COLUMN_0500130];
				
				$data[COLUMN_0700030] = $values["b"][COLUMN_0700030];
				$data[COLUMN_0700070] = $values["b"][COLUMN_0700070];
				$data[COLUMN_0700090] = $values["b"][COLUMN_0700090];
				
				$data[COLUMN_1300060] = $values["c"][COLUMN_1300060];
				$data[COLUMN_1300100] = $values["c"][COLUMN_1300100];
				$data[COLUMN_1300130] = $values["c"][COLUMN_1300130];
				$data[COLUMN_1300140] = $values["c"][COLUMN_1300140];
				$data[COLUMN_1300150] = $values["c"][COLUMN_1300150];
				$data[COLUMN_1300160] = $values["c"][COLUMN_1300160];
				
				$result[] = $data;
			}
			
			return $result;
			
		} catch (Exception $ex) {
			$err = "DividendHistory->getExecutionTargetLoan で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 前月末までの充当済元金を取得<br>
	 * @param string $fund_id
	 * @param datetime $date_to
	 * @return number $pricipal
	 */
	function getPricipalTotal($fund_id, $date_to) {
		
		$pricipal = 0;
		
		$conditions[COLUMN_1300020]       = $fund_id;
		$conditions[COLUMN_1300120." <="] = $date_to;

		$groupby[] = COLUMN_1300020;

		$fields[] = "sum(".COLUMN_1300140.") as ".COLUMN_1300140; // 元金

		$status[MODEL_CONDITIONS] = $conditions;
		$status[MODEL_GROUP]      = $groupby;
		$status[MODEL_FIELDS]     = $fields;
		
		$data_list = $this->Controller->TrnLoanRepayment->find(MODEL_ALL, $status);

		foreach ($data_list as $keys => $values) {
			foreach ($values as $key => $value) {
				$pricipal = $value[COLUMN_1300140];
			}
		}
		
		return $pricipal;
	}
	
}