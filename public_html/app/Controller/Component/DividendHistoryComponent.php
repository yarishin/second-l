<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class DividendHistoryComponent extends Component {
	
	// 他のコンポーネントを使えるようにする。
	public $components = array(
		 "Common"
		,"Calendar"
		,"Fund"
		,"DividendHistory"
		,"LoanRepayment"
		,"Mail"
	);
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * 配当履歴取得
	 * @param string $user_id $date_from $date_to
	 * @return array $data
	 */
	function getDividendHistories($user_id, $date_from, $date_to) {
		
		try {
			
			$status     = null;
			$conditions = null;
			$order      = null;

			// ◆絞込み条件◆
			// ユーザID
			$conditions[COLUMN_1000020] = $user_id;
			if (!is_null($date_from) && strcmp("", $date_from) != 0) {
				$conditions[COLUMN_1000070." >="] = $date_from;
			}
			if (!is_null($date_to) && strcmp("", $date_to) != 0) {
				$conditions[COLUMN_1000070." <="] = $date_to;
			}

			// ◆ソート◆
			$order[COLUMN_1000070] = MODEL_DESC;
			$order[COLUMN_1000040] = MODEL_DESC;
			$order[COLUMN_1000080] = MODEL_ASC;

			$status[MODEL_CONDITIONS] = $conditions;
			$status[MODEL_ORDER]      = $order;

			// 検索結果が0件の場合戻り値にfalseを設定
			$data = $this->Controller->TrnDividendHistory->find(MODEL_ALL, $status);

			return $data;
			
		} catch (Exception $ex) {
			$err = "DividendHistory->getDividendHistoriesで例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
		
	}
	

        function getDividendHistories_777($user_id, $date_from, $date_to) {

                try {

                        $status     = null;
                        $conditions = null;
                        $order      = null;

                        // ◆絞込み条件◆
                        // ユーザID
                        $conditions[COLUMN_1000020] = $user_id; //trn_dividend_histories user_id
                        if (!is_null($date_from) && strcmp("", $date_from) != 0) {
                                $conditions[COLUMN_1000070." >="] = $date_from; //trn_dividend_histories dividend_datetime
                        }
                        if (!is_null($date_to) && strcmp("", $date_to) != 0) {
                                $conditions[COLUMN_1000070." <="] = $date_to;
                        }

                        // ◆ソート◆
                        $order[COLUMN_1000070] = MODEL_DESC;
                        $order[COLUMN_1000040] = MODEL_DESC;
                        $order[COLUMN_1000080] = MODEL_ASC;

                        $status[MODEL_CONDITIONS] = $conditions;
                        $status[MODEL_ORDER]      = $order;

                        // 検索結果が0件の場合戻り値にfalseを設定
                        $data = $this->Controller->TrnDividendHistory->find(MODEL_ALL, $status);

                        return $data;

                } catch (Exception $ex) {
                        $err = "DividendHistory->getDividendHistories_777で例外発生<br>";
                        throw new Exception($err.$ex->getMessage()."<br>");
                }


        }




	/**
	 * 配当額累計取得
	 * @param string $user_id
	 * @return number $dividend_amount
	 */
	function getDividendAmountTotal($user_id) {
		
		try {
			
			$dividend_amount = 0;

			$status     = null;
			$conditions = null;

			$conditions[COLUMN_1000020] = $user_id;
			$conditions[COLUMN_1000080] = DIVIDEND_DETAIL_CODE_02;
			$status[MODEL_CONDITIONS]   = $conditions;

			// 集計項目
			$status[MODEL_FIELDS] = array(
				"sum(".COLUMN_1000090.") as ".COLUMN_1000090 // 配当額
			);

			$data = $this->Controller->TrnDividendHistory->find(MODEL_ALL, $status);

			foreach ($data as $keys => $values) {
				foreach ($values as $key => $value) {
					$dividend_amount = $value[COLUMN_1000090];
				}
			}

			return $dividend_amount;
			
		} catch (Exception $ex) {
			$err = "DividendHistory->getDividendAmountTotalで例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * 配当額取得SY
	 * @param string $user_id
	 * @return number $dividend_amount
	 */
	function getDividendAmountList($user_id) {
		
		try {
			
			$dividend_amount = 0;

			$status     = null;
			$conditions = null;

			$conditions[COLUMN_1000020] = $user_id;
			$conditions[COLUMN_1000080] = DIVIDEND_DETAIL_CODE_02;
			$status[MODEL_CONDITIONS]   = $conditions;

			// 集計項目
			$status[MODEL_FIELDS] = array(
				COLUMN_1000090." as ".COLUMN_1000090,
                                COLUMN_1000070." as ".COLUMN_1000070,
                                COLUMN_1000020." as ".COLUMN_1000020,
                                COLUMN_1000040." as ".COLUMN_1000040
			);

			$datalist = $this->Controller->TrnDividendHistory->find(MODEL_ALL, $status);

			foreach ($data as $keys => $values) {
				foreach ($values as $key => $value) {
					$dividend_amount = $value[COLUMN_1000090];
				}
			}

			//return $dividend_amount;
                        return $datalist;
			
		} catch (Exception $ex) {
			$err = "DividendHistory->getDividendAmountListで例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}


       /**
         * 配当額累計取得
         * @param string $user_id
         * @return number $dividend_amount
         */
        function getDividendAmountTotal_1($user_id) {

                try {

                        $dividend_amount = 0;
                        //$dividend_detail_code = 1;

                        $status     = null;
                        $conditions = null;

                        $conditions[COLUMN_1000020] = $user_id;
                        //$conditions[COLUMN_1000080] = DIVIDEND_DETAIL_CODE_02;
                        $conditions[COLUMN_1000080] = 1;
                        $status[MODEL_CONDITIONS]   = $conditions;

                        // 集計項目
                        $status[MODEL_FIELDS] = array(
                                "sum(".COLUMN_1000090.") as ".COLUMN_1000090 // 配当額
                        );

                        $data = $this->Controller->TrnDividendHistory->find(MODEL_ALL, $status);

                        foreach ($data as $keys => $values) {
                                foreach ($values as $key => $value) {
                                        $dividend_amount = $value[COLUMN_1000090];
                                        //$dividend_detail_code = $value[COLUMN_1000090];
                                }
                        }

                        return $dividend_amount;

                } catch (Exception $ex) {
                        $err = "DividendHistory->getDividendAmountTotal_1で例外発生<br>";
                        throw new Exception($err.$ex->getMessage()."<br>");
                }
        }



        function getDividendAmountTotal_123($user_id) {
                try {

                        $operating_amount = 0;
                        $data = $this->Controller->TrnDividendHistory->getDividendAmountTotal_123($user_id);
                        foreach ($data as $keys => $values) {
                                foreach ($values as $key => $value) {
                                        $operating_amount = $value[COLUMN_1200070];
                                }
                        }
                        return $operating_amount;

                } catch (Exception $ex) {
                        $err = "DividendHistory->getDividendAmountTotal_123 で例外発生<br>";
                        throw new Exception($err.$ex->getMessage()."<br>");
                }
        }


	/**
	 * お取引の明細・償還及び分配取得<br>
	 * 取引残高報告書の【お取引の明細・償還及び分配】に表示するデータを取得
	 */
	function getTradeBalanceReport3($user_id, $date_from, $date_to) {
		
		try {
			
			$result = array();
			
			$data_list = $this->Controller->TrnDividendHistory->selectTradeBalanceReport3($user_id, $date_from, $date_to);
			
			foreach ($data_list as $keys => $values) {
				$data[COLUMN_0500010] = $values["a"][COLUMN_0500010];
				$data[COLUMN_0500020] = $values["a"][COLUMN_0500020];
				$data[COLUMN_0500060] = $values["a"][COLUMN_0500060];
				$data[COLUMN_1000080] = $values["d"][COLUMN_1000080];
				$data[COLUMN_1000070] = $values["d"][COLUMN_1000070];
				$data[COLUMN_1000090] = $values["d"][COLUMN_1000090];
				$data[COLUMN_1300120] = $values["d"][COLUMN_1300120];
				$data[COLUMN_1200070] = $values["e"][COLUMN_1200070];
				$result[] = $data;
			}
			
			return $result;
			
		} catch (Exception $ex) {
			$err = "DividendHistory->getTradeBalanceReport3 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 配当対象ファンド取得<br>
	 * $fund_id_list が設定されている場合、配当ワークの削除、登録を行う。
	 * 
	 */
	function getDividendTargetFund($admin_id, $fund_id_list = null) {
		
		try {
			
			// 前月の月初、月末日を取得
			list($date_from, $date_to) = $this->Calendar->getMonthBeginEnd();
			
			// ファンドIDリストがある場合、ワークテーブルへの書込みを行うため、最初に削除する。
			if (!is_null($fund_id_list)) {
				
				// 削除条件指定
				$wrk_div_conditions[COLUMN_2200000] = $admin_id;

				// ワーク削除実行
				$this->Controller->WrkDividend->deleteAll($wrk_div_conditions, false);
			}

			// 対象となる明細データを貸付毎に取得
			$target_list = $this->LoanRepayment->getDividendTargetLoan($date_from, $date_to, $fund_id_list);
			
			$fund_list     = array();
			$user_inv_list = array();
			
			$count = 1;
			foreach ($target_list as $target_key => $target_value) {
				
				$fund_id            = $target_value[COLUMN_0500010];
				$fund_name          = $target_value[COLUMN_0500020];
				$loan_amount_total  = $target_value[COLUMN_0500040];
				$admin_yield        = $target_value[COLUMN_0500130];
				
				$loan_no            = $target_value[COLUMN_0700030];
				$loan_amount        = $target_value[COLUMN_0700070];
				$interest_rate      = $target_value[COLUMN_0700090];
				
				$repayment_amount_1 = $target_value[COLUMN_1300060];
				$dividend_amount_1  = $target_value[COLUMN_1300100];
				$repayment_amount_2 = $target_value[COLUMN_1300130];
				$principal_amount_2 = $target_value[COLUMN_1300140];
				$interest_amount_2  = $target_value[COLUMN_1300150];
				$delay_damages      = $target_value[COLUMN_1300160];
				
				// 配当金総額(未定)、営業者報酬(未定)取得
				$pending_list = $this->Fund->calcDividendAmount($interest_amount_2, $delay_damages, $interest_rate, $admin_yield);
				
				$div_amount_total_pending = $pending_list[COLUMN_1700100];
				$reward_amount            = $pending_list[COLUMN_1700110];
				
				// 貸付毎の配当金総額
				$div_amount_loan = 0;
				
				// ◆対象貸付を含むファンドに投資した投資家と投資額を取得◆
				
				$trn_inv_conditions[COLUMN_1200040] = $fund_id;
				$trn_inv_conditions[COLUMN_1200090] = INVESTMENT_STATUS_CODE_APPROVED;
				
				$trn_inv_groupby[] = COLUMN_1200020;
				
				$trn_inv_fields[] = COLUMN_1200020       ."  as ".COLUMN_1200020; // 投資家ID
				$trn_inv_fields[] = "sum(".COLUMN_1200070.") as ".COLUMN_1200070; // 投資額
				
				$trn_inv_status[MODEL_CONDITIONS] = $trn_inv_conditions;
				$trn_inv_status[MODEL_GROUP]      = $trn_inv_groupby;
				$trn_inv_status[MODEL_FIELDS]     = $trn_inv_fields;

				$lender_list = $this->Controller->TrnInvestmentHistory->find(MODEL_ALL, $trn_inv_status);
				foreach ($lender_list as $lender_keys => $lender_values) {
					
					// ◆投資家の人数分ループ◆

					$user_id    = $lender_values[MODEL_NAME_120][COLUMN_1200020];
					$inv_amount = $lender_values[0][COLUMN_1200070];
					
					// どのファンドに対して誰がいくら投資したかを配列に保存
					if (isset($user_inv_list[$fund_id])) {
						$user_inv_list[$fund_id] += array(
							$user_id => $inv_amount
						);
					}
					else {
						$user_inv_list += array(
							$fund_id => array(
								$user_id => $inv_amount
							)
						);
					}

					// 投資家毎の配当額を計算
					$div_amount = floor((string)($div_amount_total_pending * ($inv_amount / $loan_amount_total)));

					// ファンドIDリストがある場合、ワークテーブルへの書込みを行う
					if (!is_null($fund_id_list)) {
						
						$wrk_div[COLUMN_2200000] = $admin_id;
						$wrk_div[COLUMN_2200020] = $fund_id;
						$wrk_div[COLUMN_2200030] = $loan_no;
						$wrk_div[COLUMN_2200040] = $user_id;
						$wrk_div[COLUMN_2200050] = 0;
						$wrk_div[COLUMN_2200060] = $div_amount;
						
						// 配当ワーク登録
						$this->Controller->WrkDividend->create();
						$this->Controller->WrkDividend->save($wrk_div);
					}
					
					$div_amount_loan += $div_amount;
				}
				
				// 営業者報酬(決定)
				$reward_amount += $div_amount_total_pending - $div_amount_loan;
				
				// 貸付毎のレコードをファンド毎に編集
				if (isset($fund_list[$fund_id])) {
					
					// 同一ファンドIDの貸付2件目以降は金額だけを加算
					$fund_list[$fund_id][OBJECT_ID_050220080] += $repayment_amount_1;
					$fund_list[$fund_id][OBJECT_ID_050220100] += $dividend_amount_1;
					$fund_list[$fund_id][OBJECT_ID_050220110] += $repayment_amount_2;
					$fund_list[$fund_id][OBJECT_ID_050220150] += $reward_amount;
					$fund_list[$fund_id][OBJECT_ID_050220180] += $principal_amount_2;
					$fund_list[$fund_id][OBJECT_ID_050220130] += $div_amount_loan;
				}
				else {
					
					// 初回の場合、全データを格納
					$fund_list[$fund_id] = array();
					$fund_list[$fund_id][OBJECT_ID_050220040] = $fund_id;
					$fund_list[$fund_id][OBJECT_ID_050220050] = $fund_name;
					$fund_list[$fund_id][OBJECT_ID_050220170] = $admin_yield;
					$fund_list[$fund_id][OBJECT_ID_050220080] = $repayment_amount_1;
					$fund_list[$fund_id][OBJECT_ID_050220100] = $dividend_amount_1;
					$fund_list[$fund_id][OBJECT_ID_050220110] = $repayment_amount_2;
					$fund_list[$fund_id][OBJECT_ID_050220150] = $reward_amount;
					$fund_list[$fund_id][OBJECT_ID_050220180] = $principal_amount_2;
					$fund_list[$fund_id][OBJECT_ID_050220130] = $div_amount_loan;
					
					$fund_list[$fund_id][OBJECT_ID_050220160] = $loan_amount_total;
					
					$fund_list[$fund_id][OBJECT_ID_050220200.$count++] = "";
				}
			}
			
			// 出資金償還額を算出
			foreach ($fund_list as $fund_id => $value) {
				
				$loan_amount_total = intval($value[OBJECT_ID_050220160]);
				$pri_amount_2      = intval($value[OBJECT_ID_050220180]);
				
				// 元金の返済があった月だけ実行
				if (0 < $pri_amount_2) {
					
					$pri_amount_total = 0;
					
					// 完済チェック
					$pay_up = $this->checkPayUp($fund_id, $date_to, $loan_amount_total);
				//print_r($pay_up);
				//exit;
					$user_list = $user_inv_list[$fund_id];
					foreach ($user_list as $user_id => $inv_amount) {
						
						$pri_amount = 0; // 今回出資金償還額
						
						if ($pay_up) {
							
							// 前月の入金で完済の場合の処理
							
							$conditions = array();
							$fields     = array();
							$status     = array();
							
							$conditions[COLUMN_1000020] = $user_id;
							$conditions[COLUMN_1000040] = $fund_id;
							$conditions[COLUMN_1000080] = DIVIDEND_DETAIL_CODE_01;
							
							$fields[] = "sum(".COLUMN_1000090.") as ".COLUMN_1000090;
							
							$status[MODEL_CONDITIONS] = $conditions;
							$status[MODEL_FIELDS]     = $fields;

							$div_list = $this->Controller->TrnDividendHistory->find(MODEL_ALL, $status);
							
							$div_amount_pri = 0; // 償還済み出資金償還額
							
							foreach ($div_list as $div_keys => $div_values) {
								foreach ($div_values as $div_key => $div_value) {
									$div_amount_pri = $div_value[COLUMN_1000090];
								}
							}
							
							// 今月の償還額 ＝ 投資額 － 償還済み金額
							$pri_amount = $inv_amount - $div_amount_pri;
						}
						else {
							
							// 前月の入金で未完済の場合の処理
							
							// 今月の償還額 ＝ 返済された元金 × (投資額 ÷ 貸付額合計)
							$pri_amount = floor((string)($pri_amount_2 * ($inv_amount / $loan_amount_total)));
						}
						
						if (!is_null($fund_id_list)) {

							$wrk_div = array();
							
							$wrk_div[COLUMN_2200000] = $admin_id;
							$wrk_div[COLUMN_2200020] = $fund_id;
							$wrk_div[COLUMN_2200030] = MAX_LOAN_NO;
							$wrk_div[COLUMN_2200040] = $user_id;
							$wrk_div[COLUMN_2200050] = $pri_amount;
							$wrk_div[COLUMN_2200060] = 0;

							// 配当ワーク登録
							$this->Controller->WrkDividend->create();
							$this->Controller->WrkDividend->save($wrk_div);
						}
					
						$pri_amount_total += $pri_amount;
					}
					
					// ファンド毎の出資金償還額を更新
					$fund_list[$fund_id][OBJECT_ID_050220180] = $pri_amount_total;
				}
			}
			
			return $fund_list;
			
		} catch (Exception $ex) {
			$err = "DividendHistory->getDividendTargetFund で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 配当実行<br>
	 * 配当履歴の登録とそれに伴う通知メール送信<br>
	 * @param arrya $admin_id
	 * @param array $data
	 * @return array $user_list
	 * @throws Exception
	 */
	function executeDividend($admin_info, $data) {
		
		try {
			
			$admin_id   = $admin_info[LOGIN_ADMIN_ID];
			$admin_name = $admin_info[LOGIN_ADMIN_NAME];
			
			$dividend_datetime = date(DATETIME_FORMAT);
			
			// 前月の月初、月末日を取得
			list($date_from, $date_to) = $this->Calendar->getMonthBeginEnd();
				
			// 配当ワーク作成
			$this->getDividendTargetFund($admin_id, $data);
			
			// 対象となる入金明細データを貸付毎に取得
			$loan_list = $this->LoanRepayment->getDividendTargetLoan($date_from, $date_to, $data);
			
			// 配当履歴に登録する金額を配当ワークから取得
			$wrk_div_user = $this->getDividendAmountUser($admin_id);
			
			// メール送信リスト
			$user_list = array();
			
			// 配当履歴登録
			foreach ($wrk_div_user as $wrk_div_key => $wrk_div_value) {
				
				$user_id    = $wrk_div_value[COLUMN_0800010];
				$user_name  = $wrk_div_value[COLUMN_0800060]." ".$wrk_div_value[COLUMN_0800070];
				
				$fund_id    = $wrk_div_value[COLUMN_0500010];
				$fund_name  = $wrk_div_value[COLUMN_0500020];
				
				$principal  = $wrk_div_value[COLUMN_2200050];
				$dividend   = $wrk_div_value[COLUMN_2200060];
				$tax        = 0;
				
				$reg_data = null;
				$reg_data = array(
					 COLUMN_1000020 => $user_id
					,COLUMN_1000030 => $user_name
					,COLUMN_1000040 => $fund_id
					,COLUMN_1000050 => $fund_name
					,COLUMN_1000060 => 1
					,COLUMN_1000065 => 1 
					,COLUMN_1000070 => $dividend_datetime
				);
				
				// 出資金償還額
				if (0 < $principal) {
					$reg_data[COLUMN_1000080] = DIVIDEND_DETAIL_CODE_01;
					$reg_data[COLUMN_1000090] = $principal;
					$reg_data[COLUMN_1000100] = 0;
					
					$this->Controller->TrnDividendHistory->create();
					$this->Controller->TrnDividendHistory->save($reg_data, false);
				}
				
				// 分配金
				if (0 < $dividend) {
					$reg_data[COLUMN_1000080] = DIVIDEND_DETAIL_CODE_02;
					$reg_data[COLUMN_1000090] = $dividend;
					$reg_data[COLUMN_1000100] = 0;
					
					$this->Controller->TrnDividendHistory->create();
					$this->Controller->TrnDividendHistory->save($reg_data, false);
					
					// 分配金がある場合、源泉徴収税が発生する。
					$tax = floor((string)($dividend * TAX_RATE));
				}
				
				// 源泉徴収税
				if (0 < $tax) {
					$reg_data[COLUMN_1000080] = DIVIDEND_DETAIL_CODE_03;
					$reg_data[COLUMN_1000090] = 0;
					$reg_data[COLUMN_1000100] = $tax;
					
					$this->Controller->TrnDividendHistory->create();
					$this->Controller->TrnDividendHistory->save($reg_data, false);
				}
				
				// メール送信用投資家リストセット
				if (!isset($user_list[$user_id])) {
					$user_list[$user_id] = $wrk_div_value;
				}
			}
			
			// 入金明細更新
			foreach ($data as $fund_id_key => $fund_id_value) {
				
				$conditions = null;
				$status     = null;

				// 配当対象となった入金明細取得
				$conditions[COLUMN_1300020] = $fund_id_value;
				$conditions[COLUMN_1300120." >="] = $date_from;
				$conditions[COLUMN_1300120." <="] = $date_to;
				$status[MODEL_CONDITIONS] = $conditions;

				// 検索結果が0件の場合戻り値にfalseを設定
				$repayments = $this->Controller->TrnLoanRepayment->find(MODEL_ALL, $status);
				foreach($repayments as $repay_keys => $repay_values) {
					foreach($repay_values as $repay_key => $repay_value) {
						
						$reg_data = array(
							 COLUMN_1300010 => $repay_value[COLUMN_1300010]    
						    ,COLUMN_1300165 => $dividend_datetime
							,COLUMN_1300230 => $admin_id
							,COLUMN_1300240 => $admin_name
						);

						// 実行
						$result = $this->Controller->TrnLoanRepayment->save($reg_data, false);
					}
				}
			}
			
			// 営業者報酬履歴登録
			$fund_id_list = array();
			foreach ($loan_list as $loan_key => $loan_value) {
				
				$fund_id            = $loan_value[COLUMN_0500010];
				
				$loan_no            = $loan_value[COLUMN_0700030];
				
				$repayment_amount_2 = $loan_value[COLUMN_1300130];
				$interest_amount_2  = $loan_value[COLUMN_1300150];
				$delay_damages      = $loan_value[COLUMN_1300160];
				
				// 営業者報酬履歴に登録する配当金総額を配当ワークから取得
				$wrk_div_loan = $this->getDividendAmountLoan($admin_id, $fund_id, $loan_no);
				
				$dividend_amount_total  = $wrk_div_loan[COLUMN_2200060]; // 配当金総額
				
				// 報酬額取得
				$reward_amount = $interest_amount_2 + $delay_damages - $dividend_amount_total;
			
				$reg_data = array(
					 COLUMN_2300020 => $fund_id
					,COLUMN_2300030 => $loan_no
					,COLUMN_2300040 => $date_from
					,COLUMN_2300050 => $dividend_datetime
					,COLUMN_2300060 => $repayment_amount_2
					,COLUMN_2300070 => 0
					,COLUMN_2300080 => $reward_amount
					,COLUMN_2300090 => $dividend_amount_total
					,COLUMN_0000010 => $dividend_datetime
					,COLUMN_0000020 => $admin_id
					,COLUMN_0000030 => $admin_name
				);
				
				$this->Controller->TrnRewardHistory->create();
				$this->Controller->TrnRewardHistory->save($reg_data, false);
				
				// 出資金償還額はファンド単位で算出するため、ファンド1件につき一回だけ登録する。
				if(!isset($fund_id_list[$fund_id])) {
					
					// 営業者報酬履歴に登録する出資金償還額
					$wrk_div_loan = $this->getDividendAmountLoan($admin_id, $fund_id, MAX_LOAN_NO);

					$principal_amount_total = $wrk_div_loan[COLUMN_2200050]; // 出資金償還額総額
					
					if (!is_null($principal_amount_total) && 0 < $principal_amount_total) {
						

						$reg_data = array(
							 COLUMN_2300020 => $fund_id
							,COLUMN_2300030 => MAX_LOAN_NO
							,COLUMN_2300040 => $date_from
							,COLUMN_2300050 => $dividend_datetime
							,COLUMN_2300060 => 0
							,COLUMN_2300070 => $principal_amount_total
							,COLUMN_2300080 => 0
							,COLUMN_2300090 => 0
							,COLUMN_0000010 => $dividend_datetime
							,COLUMN_0000020 => $admin_id
							,COLUMN_0000030 => $admin_name
						);

						$this->Controller->TrnRewardHistory->create();
						$this->Controller->TrnRewardHistory->save($reg_data, false);
					}

					$fund_id_list[$fund_id] = $fund_id;
				}
				
			}
			
			return $user_list;
			
		} catch (Exception $ex) {
			$err = "DividendHistory->executionDividend で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
			
	}
	
	/**
	 * 分配実行通知メール送信<br>
	 * @param type $user_list
	 */
	function sendMailExcecuteDividend($user_list) {
		
		try {
			
			// DBへの登録完了後、通知メールを送信
			foreach($user_list as $key => $value) {

				// メール送信
				$this->Mail->sendMailDividend($value);
			}
			
		} catch (Exception $ex) {
			$err = "TradeBalanceReport->sendMailIssueReport で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * 最終的な配当実行対象を取得<br>
	 * @param string $admin_id
	 * @return array $result
	 * @throws Exception
	 */
	function getDividendAmountUser($admin_id) {
		
		try {
			
			$data_list = $this->Controller->WrkDividend->selectDividendAmountUser($admin_id);
			
			$result = array();
			
			foreach ($data_list as $keys => $values) {
				$data[COLUMN_2200050] = $values["a"][COLUMN_2200050];
				$data[COLUMN_2200060] = $values["a"][COLUMN_2200060];
				$data[COLUMN_0800010] = $values["b"][COLUMN_0800010];
				$data[COLUMN_0800020] = $values["b"][COLUMN_0800020];
				$data[COLUMN_0800060] = $values["b"][COLUMN_0800060];
				$data[COLUMN_0800070] = $values["b"][COLUMN_0800070];
				$data[COLUMN_0500010] = $values["c"][COLUMN_0500010];
				$data[COLUMN_0500020] = $values["c"][COLUMN_0500020];
				$result[] = $data;
			}
			
			return $result;
			
		} catch (Exception $ex) {
			$err = "DividendHistory->getDividendAmountUser で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 営業者報酬履歴に登録するための金額貸付を取得<br>
	 * @param string $admin_id
	 * @param string $fund_id
	 * @param string $loan_id
	 * @return array $data
	 * @throws Exception
	 */
	function getDividendAmountLoan($admin_id, $fund_id, $loan_no) {
		
		try {
			
			$data_list = $this->Controller->WrkDividend->selectDividendAmountLoan($admin_id, $fund_id, $loan_no);
			
			$data = array();
			
			foreach ($data_list as $keys => $values) {
				
				$data[COLUMN_2200020] = $values[TABLE_NAME_220][COLUMN_2200020];
				$data[COLUMN_2200030] = $values[TABLE_NAME_220][COLUMN_2200030];
				$data[COLUMN_2200050] = $values[0][COLUMN_2200050];
				$data[COLUMN_2200060] = $values[0][COLUMN_2200060];
			}
			
			return $data;
			
		} catch (Exception $ex) {
			$err = "DividendHistory->getDividendAmountLoan で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 完済チェック<br>
	 * 完済：true<br>
	 * 未完済：false<br>
	 * @param string $fund_id
	 * @param datetime $date_to
	 * @param number $loan_amount_total
	 * @return boolean $result
	 */
	function checkPayUp($fund_id, $date_to, $loan_amount_total) {
		
		$result = false;
		
		// 前月までの払込済みの元金を取得
		$principal = $this->LoanRepayment->getPricipalTotal($fund_id, $date_to);
		
		// 貸付額 － 返済済み元金 が0以下の場合完済
		if (0 >= $loan_amount_total - $principal) {
			$result = true;
		}
		
		return $result;
	}
}
