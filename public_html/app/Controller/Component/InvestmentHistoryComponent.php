<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class InvestmentHistoryComponent extends Component {
	
	// 他のコンポーネントを使えるようにする。
	public $components = array(
		 "Common"
		,"InformationHistory"
		,"Mail"
		,"Pdf"
		,"SessionAdminInfo"
		,"SessionUserInfo"
		,"DividendPlan"
	);
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * 投資履歴取得
	 * @param string $user_id $date_from $date_to
	 * @return array $data
	 */
	function getInvestmentHistories($user_id, $date_from, $date_to) {
		try {
			

			$status     = null;
			$conditions = null;
			$order      = null;

			// ◆絞込み条件◆
			// ユーザID
			$conditions[COLUMN_1200020] = $user_id;
			if (!is_null($date_from) && strcmp("", $date_from) != 0) {
				$conditions[COLUMN_1200060." >="] = $date_from;
			}
			if (!is_null($date_to) && strcmp("", $date_to) != 0) {
				$conditions[COLUMN_1200060." <="] = $date_to;
			}

			// ◆ソート◆
			$order[COLUMN_1200060] = MODEL_DESC;

			$status[MODEL_CONDITIONS] = $conditions;
			$status[MODEL_ORDER]      = $order;

			// 検索結果が0件の場合戻り値にfalseを設定
			$data = $this->Controller->TrnInvestmentHistory->find(MODEL_ALL, $status);
			// 検索結果が0件の場合戻り値にfalseを設定
			//$data = $this->Controller->TrnInvestmentHistory->getInvestmentHistories("00000001", "2015-08-01 00:00:00", "2015-09-30 23:59:59");

			return $data;
			
		} catch (Exception $ex) {
			$err = "InvestmentHistory->getInvestmentHistories で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	


        public function getInvestmentHistories_777($user_id) {
                try {


                        $status     = null;
                        $conditions = null;
                        $order      = null;

                        // ◆絞込み条件◆
                        // ユーザID
                        $conditions[COLUMN_1200020] = $user_id;
                        if (!is_null($date_from) && strcmp("", $date_from) != 0) {
                                $conditions[COLUMN_1200060." >="] = $date_from;
                        }
                        if (!is_null($date_to) && strcmp("", $date_to) != 0) {
                                $conditions[COLUMN_1200060." <="] = $date_to;
                        }

                        // ◆ソート◆
                        $order[COLUMN_1200060] = MODEL_DESC;

                        $status[MODEL_CONDITIONS] = $conditions;
                        $status[MODEL_ORDER]      = $order;

                        $data = $this->Controller->TrnInvestmentHistory->getInvestmentHistories_777;
                        return $data;

                } catch (Exception $ex) {
                        $err = "InvestmentHistory->getInvestmentHistories_777 で例外発生<br>";
                        throw new Exception($err.$ex->getMessage()."<br>");
                }

        }

        function getInvestmentHistory_doc($user_id, $fund_id, $doc_path) {

                try {

                                                              $data_list_list_list = $this->TrnInvestmentHistory->find('all',array(
                                                                                                'conditions' => array(
                                                                                                                'user_id' => $user_id ,
                                                                                                                'fund_id' => $fund_id ,
                                                                                                                'application_datetime' => $doc_path),
                                                                                                'order' => array('user_id' => 'desc')
                                                                                                            ));

                        return $data_list_list_list;

                } catch (Exception $ex) {
                        $err = "InvestmentHistory->getInvestmentAmount で例外発生<br>";
                        throw new Exception($err.$ex->getMessage()."<br>");
                }
        }



	/**
	 * 投資履歴登録
	 * @param array $input_data
	 * @return array $conditions
	 */
	function saveInvestmentHistory($input_data) {
		
		try {
			
			// 画面入力データ取得
			$fund_name  = $input_data[OBJECT_ID_040020010]; // ファンド名
			$inv_amount = $input_data[OBJECT_ID_040020020]; // 投資金額
			$exp_date   = $input_data[HIDDEN_ID_000000180]; // 入金期限

			// セッション情報取得
			$user_info = $this->SessionUserInfo->getUserInfo();
			$fund_id   = $this->Common->getSessionFundId();

			// 投資状態
			$inv_status_code = INVESTMENT_STATUS_CODE_APPLIED; // 申込

			// システム日付
			$today = date(DATETIME_FORMAT);

			$conditions[COLUMN_1200020] = $user_info[LOGIN_USER_ID];
			$conditions[COLUMN_1200030] = $user_info[LOGIN_USER_NAME];
			$conditions[COLUMN_1200035] = $user_info[LOGIN_USER_NAME_KANA];
			$conditions[COLUMN_1200040] = $fund_id;
			$conditions[COLUMN_1200050] = $fund_name;
			$conditions[COLUMN_1200060] = date(DATETIME_FORMAT);
			$conditions[COLUMN_1200070] = $inv_amount;
			//$conditions[COLUMN_1200080] = date(DATETIME_FORMAT_2, strtotime($exp_date));
			$conditions[COLUMN_1200090] = $inv_status_code;

			// 登録実行
			$this->Controller->TrnInvestmentHistory->save($conditions, false);

			return $conditions;
			
		} catch (Exception $ex) {
			$err = "InvestmentHistory->saveInvestmentHistory で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 運用準備中金額取得
	 * @param string $user_id
	 * @return number $preparation_amount
	 */
	function getPreparationAmount($user_id) {
		
		try {
			
			$preparation_amount = 0;
			$data = $this->Controller->TrnInvestmentHistory->getPreparationAmount($user_id);
			foreach ($data as $keys => $values) {
				foreach ($values as $key => $value) {
					$preparation_amount = $value[COLUMN_1200070];
				}
			}
			return $preparation_amount;
			
		} catch (Exception $ex) {
			$err = "InvestmentHistory->getPreparationAmount で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * 運用中金額取得
	 * @param string $user_id
	 * @return number $operating_amount
	 */
	function getOperatingAmount($user_id) {
		
		try {
			
			$operating_amount = 0;
			$data = $this->Controller->TrnInvestmentHistory->getOperatingAmount($user_id);
			foreach ($data as $keys => $values) {
				foreach ($values as $key => $value) {
					$operating_amount = $value[COLUMN_1200070];
				}
			}
			return $operating_amount;
			
		} catch (Exception $ex) {
			$err = "InvestmentHistory->getOperatingAmount で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 運用中金額取得(運用終了後でも値を引き渡す)遅延対策
	 * @param string $user_id
	 * @return number $operating_amount
	 */
	function getOperatingAmount_1($user_id) {
		
		try {
			
			$operating_amount = 0;
			$data = $this->Controller->TrnInvestmentHistory->getOperatingAmount_1($user_id);
			foreach ($data as $keys => $values) {
				foreach ($values as $key => $value) {
					$operating_amount = $value[COLUMN_1200070];
				}
			}
			return $operating_amount;
			
		} catch (Exception $ex) {
			$err = "InvestmentHistory->getOperatingAmount_1 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}


        function getOperatingAmount_2($user_id) {

                try {

                        $operating_amount = 0;
                        $data = $this->Controller->TrnInvestmentHistory->getOperatingAmount_2($user_id);
                        foreach ($data as $keys => $values) {
                                foreach ($values as $key => $value) {
                                        $operating_amount = $value[COLUMN_1200070];
                                }
                        }
                        return $operating_amount;

                } catch (Exception $ex) {
                        $err = "InvestmentHistory->getOperatingAmount_2 で例外発生<br>";
                        throw new Exception($err.$ex->getMessage()."<br>");
                }
        }

	/**
	 * 投資申込リスト<br>
	 * 条件で指定された内容の投資申込リストを取得する。<br>
	 * @param array $search
	 * @return array $investment_list
	 */
	function getInvestmentApplicationList($search) {
		
		try {
			
			$status     = null;
			$conditions = null;
			$or         = null;
			$order      = null;
			$order_asc  = "";

			// ◆絞込み条件◆
			// 投資家名
			if (isset($search[SEARCH_ID_050080010]) && strcmp("", $search[SEARCH_ID_050080010]) != 0) {
				$conditions[COLUMN_1200030." like"] = "%".$search[SEARCH_ID_050080010]."%";
			}
			// 投資家名(カナ)
			if (isset($search[SEARCH_ID_050080015]) && strcmp("", $search[SEARCH_ID_050080015]) != 0) {
				$conditions[COLUMN_1200035." like"] = "%".$search[SEARCH_ID_050080015]."%";
			}
			// ファンド名
			if (isset($search[SEARCH_ID_050080020]) && strcmp("", $search[SEARCH_ID_050080020]) != 0) {
				$conditions[COLUMN_1200050." like"] = "%".$search[SEARCH_ID_050080020]."%";
			}
			// ファンドid
			if (isset($search[SEARCH_ID_050080025]) && strcmp("", $search[SEARCH_ID_050080025]) != 0) {
				$conditions[COLUMN_1200040] = $search[SEARCH_ID_050080025];
			}
			// 申込日(開始)
			if (isset($search[SEARCH_ID_050080030]) && strcmp("", $search[SEARCH_ID_050080030]) != 0) {
				$conditions[COLUMN_1200060." >="] = date(DATETIME_FORMAT_1, strtotime($search[SEARCH_ID_050080030]));
			}
			// 申込日(終了)
			if (isset($search[SEARCH_ID_050080040]) && strcmp("", $search[SEARCH_ID_050080040]) != 0) {
				$conditions[COLUMN_1200060." <="] = date(DATETIME_FORMAT_2, strtotime($search[SEARCH_ID_050080040]));
			}
			// 承認日(開始)
			if (isset($search[SEARCH_ID_050080110]) && strcmp("", $search[SEARCH_ID_050080110]) != 0) {
				$conditions[COLUMN_1200100." >="] = date(DATETIME_FORMAT_1, strtotime($search[SEARCH_ID_050080110]));
			}
			// 承認日(終了)
			if (isset($search[SEARCH_ID_050080120]) && strcmp("", $search[SEARCH_ID_050080120]) != 0) {
				$conditions[COLUMN_1200100." <="] = date(DATETIME_FORMAT_2, strtotime($search[SEARCH_ID_050080120]));
			}
			// 状態：申請
			if (isset($search[SEARCH_ID_050080050]) && strcmp(CHECKBOX_ON, $search[SEARCH_ID_050080050]) == 0) {
				$conditions[MODEL_OR][0][COLUMN_1200090] = INVESTMENT_STATUS_CODE_APPLIED;
			}
			// 状態：承認
			if (isset($search[SEARCH_ID_050080060]) && strcmp(CHECKBOX_ON, $search[SEARCH_ID_050080060]) == 0) {
				$conditions[MODEL_OR][1][COLUMN_1200090] = INVESTMENT_STATUS_CODE_APPROVED;
			}
			// 状態：取消
			if (isset($search[SEARCH_ID_050080070]) && strcmp(CHECKBOX_ON, $search[SEARCH_ID_050080070]) == 0) {
				$conditions[MODEL_OR][2][COLUMN_1200090] = INVESTMENT_STATUS_CODE_CANCELLED;
			}
			// 状態：期限切れ
			if (isset($search[SEARCH_ID_050080080]) && strcmp(CHECKBOX_ON, $search[SEARCH_ID_050080080]) == 0) {
				$conditions[MODEL_OR][3][COLUMN_1200090] = INVESTMENT_STATUS_CODE_EXPIRED;
			}

			// ◆ソート◆
			if (isset($search[SEARCH_ID_050080090])) {

				if (strcmp(SORT_ORDER_CODE_ASC, $search[SEARCH_ID_050080100]) == 0) {
					$order_asc = "asc";
				}
				else {
					$order_asc = "desc";
				}

				switch ($search[SEARCH_ID_050080090]) {
					case SORT_COLUMN_CODE_INV_APPL_DATE: // 申込日時
						$order[COLUMN_1200060] = $order_asc;
						break;
					case SORT_COLUMN_CODE_INV_USER_NAME: // 投資家名
						$order[COLUMN_1200035] = $order_asc;
						break;
					case SORT_COLUMN_CODE_INV_FUND_NAME: // ファンド名
						$order[COLUMN_1200050] = $order_asc;
						break;
					case SORT_COLUMN_CODE_INV_STATUS: // 状態
						$order[COLUMN_1200090] = $order_asc;
						break;
					case SORT_COLUMN_CODE_INV_APPR_DATE: // 承認日時
						$order[COLUMN_1200100] = $order_asc;
						break;
				}
			}

			if (0 < count($conditions)) {
				$status[MODEL_CONDITIONS] = $conditions;
			}
			if (0 < count($order)) {
				$status[MODEL_ORDER] = $order;
			}

			// 検索結果が0件の場合戻り値にfalseを設定
			$investment_list = $this->Controller->TrnInvestmentHistory->find(MODEL_ALL, $status);


			return $investment_list;
			
		} catch (Exception $ex) {
			$err = "InvestmentHistory->getInvestmentApplicationList で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * 投資申込リスト(確認)<br>
	 * 指定されたIDの投資申込情報を取得する。<br>
	 * @param array $data
	 * @return array $investment_list
	 */
	function getInvestmentApplicationListConfirm($data) {
		
		try {
			
			$status     = null;
			$conditions = null;
			$or         = null;
			$order      = null;
			$order_asc  = "";
			
			// 変更前状態リスト
			$bf_status_list = null;

			// idリスト生成
			$id_list = null;
			$count = 1;
			while (isset($data[OBJECT_ID_050080040.$count])) {
				if (strcmp($data[OBJECT_ID_050080040.$count], $data[HIDDEN_ID_000000120.$count]) != 0) {
					
					// 検索用に変更対象のidを保存
					$id_list[] = $data[HIDDEN_ID_000000130.$count];
					
					// 確認画面表示用に変更対象の変更前状態を保存(保存時のキー = 変更対象のid)
					$bf_status_list[$data[HIDDEN_ID_000000130.$count]] = $data[OBJECT_ID_050080040.$count];
				}
				$count++;
			}

			// ◆絞込み条件◆
			$conditions[COLUMN_1200010] = $id_list;

			// ◆ソート◆
			if (strcmp(SORT_ORDER_CODE_ASC, $data[SEARCH_ID_050080100]) == 0) {
				$order_asc = "asc";
			}
			else {
				$order_asc = "desc";
			}

			switch ($data[SEARCH_ID_050080090]) {
				case SORT_COLUMN_CODE_INV_APPL_DATE: // 申込日時
					$order[COLUMN_1200060] = $order_asc;
					break;
				case SORT_COLUMN_CODE_INV_USER_NAME: // 投資家名
					$order[COLUMN_1200035] = $order_asc;
					break;
				case SORT_COLUMN_CODE_INV_FUND_NAME: // ファンド名
					$order[COLUMN_1200050] = $order_asc;
					break;
				case SORT_COLUMN_CODE_INV_STATUS: // 状態
					$order[COLUMN_1200090] = $order_asc;
					break;
				case SORT_COLUMN_CODE_INV_APPR_DATE: // 承認日時
					$order[COLUMN_1200100] = $order_asc;
					break;
			}

			$status[MODEL_CONDITIONS] = $conditions;
			$status[MODEL_ORDER]      = $order;

			// 検索結果が0件の場合戻り値にfalseを設定
			$data_list = $this->Controller->TrnInvestmentHistory->find(MODEL_ALL, $status);

			$investment_list = null;
			foreach ($data_list as $keys => $values) {
				foreach ($values as $key => $value) {
					$value[HIDDEN_ID_000000160] = $bf_status_list[$value[COLUMN_1200010]];
					$investment_list[] = array($value);
				}
			}

			return $investment_list;
			
		} catch (Exception $ex) {
			$err = "InvestmentHistory->getInvestmentApplicationListConfirm で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}

	


         /**
	 * 投資申込状態変更<br>
	 * @param array $data
	 * @return boolean $result
	 */
	function updateInvestmentStatus($data, $exp_date) {
		
		try {
			
			$or         = null;
			$order      = null;
			$order_asc  = "";

			$admin_info = $this->SessionAdminInfo->getAdminInfo();
			$admin_id   = $admin_info[LOGIN_ADMIN_ID];
			$admin_name = $admin_info[LOGIN_ADMIN_NAME];
			$now        = date(DATETIME_FORMAT);
                        // idリスト生成
			$id_list = null;
			$count = 1;
			while (isset($data[OBJECT_ID_050080040.$count])) {

				$bf_status = $data[HIDDEN_ID_000000120.$count];
				$af_status = $data[OBJECT_ID_050080040.$count];

				$status     = null;
				$conditions = null;
			
				// 状態が変更されているデータだけが更新対象
				if (strcmp($bf_status, $af_status) != 0) {

					// id, ユーザID, ファンドID, 投資申込日時
					$conditions[COLUMN_1200010] = $data[HIDDEN_ID_000000130.$count];
					$user_id       = $data[HIDDEN_ID_000000090.$count];
					$fund_id       = $data[HIDDEN_ID_000000100.$count];
					$appl_datetime = $data[OBJECT_ID_050080020.$count];
						
					// 状態
					$conditions[COLUMN_1200090] = $af_status;
                                                   //(1)承認状態
					if (strcmp(INVESTMENT_STATUS_CODE_APPROVED, $af_status) == 0) {
						// 承認
						$conditions[COLUMN_1200100] = $now;
						$conditions[COLUMN_1200110] = $admin_id;
						$conditions[COLUMN_1200120] = $admin_name;
                                                $conditions[COLUMN_1200080] = $exp_date;//入金期日アップデート

						$info_data[COLUMN_1100020] = $user_id;      // ユーザID
						$info_data[COLUMN_1100040] = $now;                                   // お知らせ発行日時
						$info_data[COLUMN_1100090] = $user_id;      // 対象ユーザID
						$info_data[COLUMN_1100100] = $fund_id;      // 対象ファンドID
						$info_data[COLUMN_1100130] = $now;                                   // 掲載日時

						$msg_data[OBJECT_ID_050080010] = $data[OBJECT_ID_050080010.$count];  // ファンド名
						$msg_data[OBJECT_ID_050080020] = $appl_datetime;  // 申込日時
						$msg_data[OBJECT_ID_050080030] = $data[HIDDEN_ID_000000110.$count];  // 投資金額

						// お知らせ登録
						$this->InformationHistory->saveInformationHistoryInv($msg_data, $info_data);
						$this->InformationHistory->saveInformationHistoryInv2($msg_data, $info_data);
						
					}                 //(2)取り消し
					elseif (strcmp(INVESTMENT_STATUS_CODE_CANCELLED, $af_status) == 0) {

						// 取消
						$conditions[COLUMN_1200130] = $now;
						$conditions[COLUMN_1200140] = $admin_id;
						$conditions[COLUMN_1200150] = $admin_name;
					}

					// 最終更新者
					$conditions[COLUMN_0000040] = $now;
					$conditions[COLUMN_0000050] = $admin_id;
					$conditions[COLUMN_0000060] = $admin_name;

					// 更新実行
					$this->Controller->TrnInvestmentHistory->save($conditions, false);

					
					// 承認の場合、PDF出力し配当予定を登録
					if (strcmp(INVESTMENT_STATUS_CODE_APPROVED, $af_status) == 0) {
						
						// 契約締結時書面PDF保存
						$this->Pdf->savePdfInvAf($user_id, $fund_id, $appl_datetime);
                         			// 契約締結時書面PDF保存2
                                                $this->Pdf->savePdfInvAf2($user_id, $fund_id, $appl_datetime);
			
						// 配当予定登録
						$this->DividendPlan->createDividendPlan($user_id, $fund_id);
					
					// 承認以外の場合、配当予定を削除
					} else{

						$this->DividendPlan->deleteDividendPlan($user_id, $fund_id);
					}
					
					// 承認の場合のみメール送信
					if (strcmp(INVESTMENT_STATUS_CODE_APPROVED, $af_status) == 0) {

						// id
						$where[COLUMN_1200010] = $data[HIDDEN_ID_000000130.$count];
						
						// 投資申込情報取得
						$status[MODEL_CONDITIONS] = $where;
						$inv_data = $this->Controller->TrnInvestmentHistory->find(MODEL_ALL, $status);
						
						// メール送信
						$investment = $inv_data[0][MODEL_NAME_120];
						$this->Mail->sendMailInvestmentApprove($investment);
						
					}
				}

				$count++;
			}
			
		} catch (Exception $ex) {
			$err = "InvestmentHistory->updateInvestmentStatus で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}

	}

	/**
	 * 投資申込状態変更(ID指定)<br>
	 * @param Integer $investment_id	投資申込ID
	 * @return boolean $result
	 */
	function approveInvestment($investment_id, $admin_info, $timestamp) {
		try {
			$status     = null;
			$conditions = null;

			// 対象の投資申込情報を取得
			$conditions[COLUMN_1200010] = $investment_id;	// 投資申込ID
			$status['conditions'] = $conditions;
			$result = $this->Controller->TrnInvestmentHistory->find('first', $status);
			$investment_record = Hash::extract($result, 'TrnInvestmentHistory');

			//ユーザID, ファンドID, 投資申込日時, タイムスタンプ
			$user_id = $investment_record[COLUMN_1200020];					// ユーザID
			$fund_id = $investment_record[COLUMN_1200040];					// ファンドID
			$fund_name = $investment_record[COLUMN_1200050];				// ファンド名
			$application_datetime = $investment_record[COLUMN_1200060];	// 投資申込日時
			$investment_amount = $investment_record[COLUMN_1200070];		// 投資額

			if(!empty($timestamp) && !isset($timestamp)){
				$now = $timestamp;
			}else{
				$now = date(DATETIME_FORMAT);
			}

			// 管理者情報
			$admin_id   = $admin_info[LOGIN_ADMIN_ID];
			$admin_name = $admin_info[LOGIN_ADMIN_NAME];

			// お知らせ登録
			$info_data[COLUMN_1100020] = $user_id;      // ユーザID
			$info_data[COLUMN_1100040] = $now;          // お知らせ発行日時
			$info_data[COLUMN_1100090] = $user_id;      // 対象ユーザID
			$info_data[COLUMN_1100100] = $fund_id;      // 対象ファンドID
			$info_data[COLUMN_1100130] = $now;                                   // 掲載日時
			$msg_data[OBJECT_ID_050080010] = $fund_name;  // ファンド名
			$msg_data[OBJECT_ID_050080020] = $application_datetime;  // 申込日時
			$msg_data[OBJECT_ID_050080030] = $investment_amount;  // 投資金額
			$this->InformationHistory->saveInformationHistoryInv($msg_data, $info_data);
			$this->InformationHistory->saveInformationHistoryInv2($msg_data, $info_data);
			// 投資申込情報
			$conditions[COLUMN_1200010] = $investment_id;	// 投資申込ID
			$conditions[COLUMN_1200090] = 1;				// 投資状態 1:承認

			// 承認者情報
			$conditions[COLUMN_1200100] = $now;
			$conditions[COLUMN_1200110] = $admin_id;
			$conditions[COLUMN_1200120] = $admin_name;
				
			// 最終更新者
			$conditions[COLUMN_0000040] = $now;
			$conditions[COLUMN_0000050] = $admin_id;
			$conditions[COLUMN_0000060] = $admin_name;

			// 投資履歴更新実行
			$this->Controller->TrnInvestmentHistory->save($conditions, false);

			// 契約締結時書面PDF保存
			$this->Pdf->savePdfInvAf($user_id, $fund_id, $application_datetime);
			// 契約締結時書面PDF保存2
			$this->Pdf->savePdfInvAf2($user_id, $fund_id, $application_datetime);
				
			// 配当予定登録
			$this->DividendPlan->createDividendPlan($user_id, $fund_id);
					

			// 承認済みの投資申込情報を再取得
			$conditions = null;
			$conditions[COLUMN_1200010] = $investment_id;	// 投資申込ID
			$status['conditions'] = $conditions;
			$result = $this->Controller->TrnInvestmentHistory->find('first', $status);
			$updated_record = Hash::extract($result, 'TrnInvestmentHistory');
			
			// メール送信
			$this->Mail->sendMailInvestmentApprove($updated_record);
			
		} catch (Exception $ex) {
			$err = "InvestmentHistory->approveInvestment で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}

	}
	
	/**
	 * 投資履歴取得<br>
	 * 
	 * @param type $user_id
	 * @param type $fund_id
	 * @param type $app_date
	 * @return type
	 * @throws Exception
	 */
	function getInvestmentHistory($user_id, $fund_id, $app_date) {
		
		try {
			
			$investment = null;
			$status     = null;
			$conditions = null;

			// ◆絞込み条件◆
			// ユーザID
			$conditions[COLUMN_1200020] = $user_id;
			$conditions[COLUMN_1200040] = $fund_id;
			$conditions[COLUMN_1200060] = $app_date;
			
			$status[MODEL_CONDITIONS] = $conditions;

			// 検索結果が0件の場合戻り値にfalseを設定
			$investment = $this->Controller->TrnInvestmentHistory->find(MODEL_ALL, $status);
			
			return $investment;
			
		} catch (Exception $ex) {
			$err = "InvestmentHistory->getInvestmentAmount で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 運用中のローンファンド取得<br>
	 * 取引残高報告書の【運用中のローンファンド】に表示するデータを取得
	 */
	function getTradeBalanceReport1($user_id, $date_to) {
		
		try {
			
			$result = array();
			
			$data_list = $this->Controller->TrnInvestmentHistory->selectTradeBalanceReport1($user_id, $date_to);
			
			foreach ($data_list as $keys => $values) {
				$data[COLUMN_0500010] = $values["a"][COLUMN_0500010];
				$data[COLUMN_0500020] = $values["a"][COLUMN_0500020];
				$data[COLUMN_0500060] = $values["a"][COLUMN_0500060];
				$data[COLUMN_0500130] = $values["a"][COLUMN_0500130];
				$data[COLUMN_1200070] = $values["b"][COLUMN_1200070];
				$data[COLUMN_1200100] = $values["b"][COLUMN_1200100];
				$result[] = $data;
			}
			
			return $result;
			
		} catch (Exception $ex) {
			$err = "InvestmentHistory->getTradeBalanceReport1 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	

        function getTradeBalanceReport1_1($user_id, $date_to) {

                try {

                        $result = array();

                        $data_list = $this->Controller->TrnInvestmentHistory->selectTradeBalanceReport1_1($user_id, $date_to);

                        foreach ($data_list as $keys => $values) {
                                $data[COLUMN_0500010] = $values["a"][COLUMN_0500010];
                                $data[COLUMN_0500020] = $values["a"][COLUMN_0500020];
                                $data[COLUMN_0500060] = $values["a"][COLUMN_0500060];
                                $data[COLUMN_0500130] = $values["a"][COLUMN_0500130];
                                $data[COLUMN_1200070] = $values["b"][COLUMN_1200070];
                                $data[COLUMN_1200100] = $values["b"][COLUMN_1200100];
                                $result[] = $data;
                        }

                        return $result;

                } catch (Exception $ex) {
                        $err = "InvestmentHistory->getTradeBalanceReport1_1 で例外発生<br>";
                        throw new Exception($err.$ex->getMessage()."<br>");
                }
        }


	/**
	 * お取引の明細・匿名組合契約取得<br>
	 * 取引残高報告書の【お取引の明細・匿名組合契約】に表示するデータを取得
	 */
	function getTradeBalanceReport2($user_id, $date_from, $date_to) {
		
		try {
			
			$result = array();
			
			$data_list = $this->Controller->TrnInvestmentHistory->selectTradeBalanceReport2($user_id, $date_from, $date_to);
			
			foreach ($data_list as $keys => $values) {
				$data[COLUMN_0500010] = $values[0][COLUMN_0500010];
				$data[COLUMN_0500020] = $values[0][COLUMN_0500020];
				$data[COLUMN_0500060] = $values[0][COLUMN_0500060];
				$data[COLUMN_0500130] = $values[0][COLUMN_0500130];
				$data[COLUMN_1200070] = $values[0][COLUMN_1200070];
				$data[COLUMN_1200100] = $values[0][COLUMN_1200100];
				$result[] = $data;
			}
			
			return $result;
			
		} catch (Exception $ex) {
			$err = "InvestmentHistory->getTradeBalanceReport2 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
			
		
	}
	
}
