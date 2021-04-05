<?php
App::uses('Component', 'Controller');


class OperatingReportComponent extends Component {
	
	// 他のコンポーネントを使えるようにする。
	public $components = array(
		"Calendar"
		,"Common"
		,"DividendHistory"
		,"Fund"
		,"InformationHistory"
		,"Mail"
		,"SessionAdminInfo"
	);
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * 運用報告書リスト取得<br>
	 * ファンドIDを指定し、運用報告書データを取得する。<br>
	 * 運用報告書選択画面のリスト表示に使用。<br>
	 * @param type $fund_id
	 */
	function getOperatingReportList($fund_id) {
		try {
			
			$result = array();
			
			// パラメータ設定
			$conditions[COLUMN_2700020] = $fund_id;
			
			// ソート
			$order[COLUMN_2700040] = MODEL_DESC;
			$order[COLUMN_2700050] = MODEL_DESC;

			// ワークデータ取得
			$status[MODEL_CONDITIONS] = $conditions;
			$status[MODEL_ORDER]      = $order;
			$data = $this->Controller->TrnSecondOperatingReport->find(MODEL_ALL, $status);
			
			foreach($data as $keys => $values) {
				foreach($values as $key => $value) {
					$result[] = $value;
				}
			}

			return $result;
			
		} catch (Exception $ex) {
			$err = "OperatingReport->getOperatingReportList で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 運用報告書リスト取得(id指定)<br>
	 * 配列に格納したidで指定した運用報告書データを取得する。<br>
	 * 運用報告書交付(確認)画面表示に使用。<br>
	 * @param type $fund_id
	 */
	function getOperatingReportListId($id_list) {
		try {
			
			$result = array();
			
			// パラメータ設定
			$conditions[COLUMN_2700010] = $id_list;
			
			// ソート
			$order[COLUMN_2700020] = MODEL_ASC;
			$order[COLUMN_2700040] = MODEL_ASC;
			$order[COLUMN_2700050] = MODEL_ASC;

			// ワークデータ取得
			$status[MODEL_CONDITIONS] = $conditions;
			$status[MODEL_ORDER]      = $order;
			$data = $this->Controller->TrnSecondOperatingReport->find(MODEL_ALL, $status);
			
			foreach($data as $keys => $values) {
				foreach($values as $key => $value) {
					$result[] = $value;
				}
			}

			return $result;
			
		} catch (Exception $ex) {
			$err = "OperatingReport->getOperatingReportList で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 運用報告書リスト取得<br>
	 * 未交付の運用報告書データを全て取得する。<br>
	 * 運用報告書交付(入力)画面表示用。<br>
	 * 
	 */
	function getOperatingReportList2() {
		try {
			
			$result = array();
			
			$conditions[COLUMN_2700090] = REPORT_STATUS_CODE_0;
			
			$order[COLUMN_2700020] = MODEL_ASC;
			$order[COLUMN_2700040] = MODEL_ASC;
			$order[COLUMN_2700050] = MODEL_ASC;
			
			$status[MODEL_CONDITIONS] = $conditions;
			$status[MODEL_ORDER]      = $order;

			$data = $this->Controller->TrnSecondOperatingReport->find(MODEL_ALL, $status);
			
			foreach ($data as $keys => $values) {
				foreach ($values as $key => $value) {
					$result[] = $value;
				}
			}

			return $result;
			
		} catch (Exception $ex) {
			$err = "OperatingReport->getOperatingReportList2 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 運用報告書データ登録<br>
	 * セッション内に運用報告書idがある → 登録<br>
	 * セッション内に運用報告書idがない → 更新<br>
	 * @throws Exception
	 */
	function saveOperatingReport() {
		try {
			
			$admin_info = $this->SessionAdminInfo->getAdminInfo();
			$data       = $this->Common->getSessionFormData();
			$now        = date(DATETIME_FORMAT);

			$reg_data = array(
				 COLUMN_2700020 => $data[OBJECT_ID_050310010] ,COLUMN_2700030 => $data[OBJECT_ID_050310020] ,COLUMN_2700040 => $data[OBJECT_ID_050310030]
				,COLUMN_2700050 => $data[OBJECT_ID_050310040] ,COLUMN_2700060 => $data[OBJECT_ID_050310050] ,COLUMN_2700070 => $data[OBJECT_ID_050310060]
				,COLUMN_2700080 => $data[OBJECT_ID_050310070] ,COLUMN_2700090 => $data[OBJECT_ID_050310080] ,COLUMN_2700100 => $data[OBJECT_ID_050310090]
				,COLUMN_2700110 => $data[OBJECT_ID_050310100] ,COLUMN_2700120 => $data[OBJECT_ID_050310110] ,COLUMN_2700130 => $data[OBJECT_ID_050310120]
				,COLUMN_2700140 => $data[OBJECT_ID_050310130] ,COLUMN_2700150 => $data[OBJECT_ID_050310140] ,COLUMN_2700160 => $data[OBJECT_ID_050310150]
				,COLUMN_2700170 => $data[OBJECT_ID_050310160] ,COLUMN_2700180 => $data[OBJECT_ID_050310170] ,COLUMN_2700190 => $data[OBJECT_ID_050310180]
				,COLUMN_2700200 => $data[OBJECT_ID_050310190] ,COLUMN_2700210 => $data[OBJECT_ID_050310200] ,COLUMN_2700220 => $data[OBJECT_ID_050310210]
				,COLUMN_2700230 => $data[OBJECT_ID_050310220] ,COLUMN_2700240 => $data[OBJECT_ID_050310230] ,COLUMN_2700250 => $data[OBJECT_ID_050310240]
				,COLUMN_2700260 => $data[OBJECT_ID_050310250] ,COLUMN_2700270 => $data[OBJECT_ID_050310260] ,COLUMN_2700280 => $data[OBJECT_ID_050310270]
				,COLUMN_2700290 => $data[OBJECT_ID_050310280] ,COLUMN_2700300 => $data[OBJECT_ID_050310290] ,COLUMN_2700310 => $data[OBJECT_ID_050310300]
				,COLUMN_2700320 => $data[OBJECT_ID_050310310] ,COLUMN_2700330 => $data[OBJECT_ID_050310320] ,COLUMN_2700340 => $data[OBJECT_ID_050310330]
				,COLUMN_2700350 => $data[OBJECT_ID_050310340] ,COLUMN_2700360 => $data[OBJECT_ID_050310350] ,COLUMN_2700370 => $data[OBJECT_ID_050310360]
				,COLUMN_2700380 => $data[OBJECT_ID_050310370] ,COLUMN_2700390 => $data[OBJECT_ID_050310380] ,COLUMN_2700400 => $data[OBJECT_ID_050310390]
				,COLUMN_2700410 => $data[OBJECT_ID_050310400] ,COLUMN_2700420 => $data[OBJECT_ID_050310410] ,COLUMN_2700430 => $data[OBJECT_ID_050310420]
				,COLUMN_2700440 => $data[OBJECT_ID_050310430] ,COLUMN_2700450 => $data[OBJECT_ID_050310440] ,COLUMN_2700460 => $data[OBJECT_ID_050310450]
				,COLUMN_2700470 => $data[OBJECT_ID_050310460] ,COLUMN_2700480 => $data[OBJECT_ID_050310470] ,COLUMN_2700490 => $data[OBJECT_ID_050310480]
				,COLUMN_2700500 => $data[OBJECT_ID_050310490] ,COLUMN_2700510 => $data[OBJECT_ID_050310500] ,COLUMN_2700520 => $data[OBJECT_ID_050310510]
				,COLUMN_2700530 => $data[OBJECT_ID_050310520] ,COLUMN_2700540 => $data[OBJECT_ID_050310530] ,COLUMN_2700550 => $data[OBJECT_ID_050310540]
				,COLUMN_2700560 => $data[OBJECT_ID_050310550] ,COLUMN_2700570 => $data[OBJECT_ID_050310560] ,COLUMN_2700580 => $data[OBJECT_ID_050310570]
				,COLUMN_2700590 => $data[OBJECT_ID_050310580] ,COLUMN_2700600 => $data[OBJECT_ID_050310590] ,COLUMN_2700610 => $data[OBJECT_ID_050310600]
				,COLUMN_2700620 => $data[OBJECT_ID_050310610] ,COLUMN_2700630 => $data[OBJECT_ID_050310620] ,COLUMN_2700640 => $data[OBJECT_ID_050310630]
				,COLUMN_2700650 => $data[OBJECT_ID_050310640] ,COLUMN_2700660 => $data[OBJECT_ID_050310650] ,COLUMN_2700670 => $data[OBJECT_ID_050310660]
				,COLUMN_2700680 => $data[OBJECT_ID_050310670] ,COLUMN_2700690 => $data[OBJECT_ID_050310680] ,COLUMN_2700700 => $data[OBJECT_ID_050310690]
				,COLUMN_2700710 => $data[OBJECT_ID_050310700] ,COLUMN_2700720 => $data[OBJECT_ID_050310710] ,COLUMN_2700730 => $data[OBJECT_ID_050310720]
				,COLUMN_2700740 => $data[OBJECT_ID_050310730] ,COLUMN_2700750 => $data[OBJECT_ID_050310740] ,COLUMN_2700760 => $data[OBJECT_ID_050310750]
				,COLUMN_2700770 => $data[OBJECT_ID_050310760] ,COLUMN_2700780 => $data[OBJECT_ID_050310770] ,COLUMN_2700790 => $data[OBJECT_ID_050310780]
				,COLUMN_2700800 => $data[OBJECT_ID_050310790] ,COLUMN_2700810 => $data[OBJECT_ID_050310800] ,COLUMN_2700820 => $data[OBJECT_ID_050310810]
				,COLUMN_2700830 => $data[OBJECT_ID_050310820] ,COLUMN_2700840 => $data[OBJECT_ID_050310830]
			);
			
			if (is_null($this->Common->getSessionReportId())) {
				
				// 登録処理
				$reg_data += array(
					 COLUMN_0000010 => $now
					,COLUMN_0000020 => $admin_info[LOGIN_ADMIN_ID]
					,COLUMN_0000030 => $admin_info[LOGIN_ADMIN_NAME]
					,COLUMN_0000100 => $data[HIDDEN_ID_000000170]
				);
			}
			else {
				
				// 更新処理
				$reg_data += array(
					 COLUMN_2700010 => $this->Common->getSessionReportId()
					,COLUMN_0000040 => $now
					,COLUMN_0000050 => $admin_info[LOGIN_ADMIN_ID]
					,COLUMN_0000060 => $admin_info[LOGIN_ADMIN_NAME]
					,COLUMN_0000100 => $data[HIDDEN_ID_000000170] + 1
				);
			}
			
			$this->Controller->TrnSecondOperatingReport->save($reg_data, false);
			
			$count = 0;
			while (isset($data[OBJECT_ID_050310840.$count])) {
				
				$reg_data2[COLUMN_2100010] = $data[OBJECT_ID_050310010];
				$reg_data2[COLUMN_2100020] = $data[OBJECT_ID_050310840.$count];
				$reg_data2[COLUMN_2100030] = $data[OBJECT_ID_050310030];
				$reg_data2[COLUMN_2100040] = $data[OBJECT_ID_050310040];
				
				$reg_data2[COLUMN_2100050] = $data[OBJECT_ID_050310850.$count];
				$reg_data2[COLUMN_2100060] = $data[OBJECT_ID_050310860.$count];
				$reg_data2[COLUMN_2100070] = $data[OBJECT_ID_050310870.$count];
				$reg_data2[COLUMN_2100080] = $data[OBJECT_ID_050310880.$count];
				$reg_data2[COLUMN_2100090] = $data[OBJECT_ID_050310890.$count];
				
				if (is_null($data[HIDDEN_ID_000000130.$count]) || strcmp("", $data[HIDDEN_ID_000000130.$count]) == 0) {
					$this->Controller->TrnOperatingReportLoan->create();
				}
				else {
					$reg_data2[COLUMN_2100000] = $data[HIDDEN_ID_000000130.$count];
				}
				
				$this->Controller->TrnOperatingReportLoan->save($reg_data2, false);
			
				$count++;
			}
			
		} catch (Exception $ex) {
			$err = "OperatingReport->saveOperatingReport で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 
	 * @param type $fund_id
	 */
	function getOperatingReportLoansList($fund_id, $report_year, $report_month) {
		try {
			
			$result = array();
			
			$conditions[COLUMN_2100010] = $fund_id;
			$conditions[COLUMN_2100030] = $report_year;
			$conditions[COLUMN_2100040] = $report_month;
			
			$order[COLUMN_2100020] = MODEL_ASC;
			
			$status[MODEL_CONDITIONS] = $conditions;
			$status[MODEL_ORDER]      = $order;
			
			$data = $this->Controller->TrnOperatingReportLoan->find(MODEL_ALL, $status);
			
			foreach ($data as $keys => $values) {
				foreach ($values as $key => $value) {
					$result[] = $value;
				}
			}
			
			return $result;
			
		} catch (Exception $ex) {
			$err = "OperatingReport->getOperatingReportLoansList で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 運用報告書交付更新<br>
	 * $id_list : 交付対象となる運用報告書のid<br>
	 * @param array $id_list $admin_info
	 * @return array $user_id_list
	 */
	function updateOperaingReportIssue($id_list, $admin_info) {
		try {
			
			$now = date(DATETIME_FORMAT);
			
			$user_id_list = array();
			foreach ($id_list as $value) {
				$reg_data = array(
					COLUMN_2700010 => $value
				   ,COLUMN_2700090 => REPORT_STATUS_CODE_1
				   ,COLUMN_0000040 => $now
				   ,COLUMN_0000050 => $admin_info[LOGIN_ADMIN_ID]
				   ,COLUMN_0000060 => $admin_info[LOGIN_ADMIN_NAME]
				);

				// 運用報告書データ登録実行
				$this->Controller->TrnSecondOperatingReport->save($reg_data, false);
				
				// 各投資家へのお知らせを登録
				$this->Controller->InformationHistory->issueOperatingReport($value, $now, $user_id_list);
				
			}
			
			return $user_id_list;
			
		} catch (Exception $ex) {
			$err = "OperatingReport->updateOperaingReportIssue で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 運用報告書交付通知メール送信<br>
	 * @param array $user_id_list
	 * @throws Exception
	 */
	function sendMailIssueReport($user_id_list) {
		
		try {
			
			// DBへの登録更新完了後、対象ユーザへ運用報告書交付の通知メールを送信
			foreach ($user_id_list as $key => $user_id) {
				$this->Mail->sendMailOperatingReport($user_id);
			}
			
		} catch (Exception $ex) {
			$err = "OperatingReport->sendMailIssueReport で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 未公開の運用報告書の有無を確認<br>
	 * 有 → true<br>
	 * 無 → false<br>
	 * @return boolean $result
	 */
	function checkReleaseReportDataExistence() {
		try {
			
			$result = false;
			
			// パラメータ設定
			$conditions[COLUMN_2700090] = REPORT_STATUS_CODE_0;

			// ワークデータ取得
			$status[MODEL_CONDITIONS] = $conditions;
			
			if (0 < $this->Controller->TrnSecondOperatingReport->find(MODEL_COUNT, $status)) {
				$result = true;
			}
			
			return $result;
			
		} catch (Exception $ex) {
			$err = "OperatingReport->checkReleaseReportDataExistence で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 運用報告書３頁目データ取得<br>
	 * @param array $fund
	 * @param string $user_id
	 * @param number $report_year $report_month
	 * @param date $report_date
	 * @return array $data
	 */
	function getPage3Data($fund, $user_id, $report_year, $report_month, $report_date) {
		try {
			
			$data = array();
			
			// ファンドデータ取得
			$fund_id           = $fund[COLUMN_0500010];
			$loan_amount_total = $fund[COLUMN_0500040];
			$min_inv_amount    = $fund[COLUMN_0500060];
			$admin_yield       = $fund[COLUMN_0500130];
			
			// 運用年月の月初、月末取得
			list($date_from, $date_to) = $this->Calendar->getMonthBeginEnd($report_year, $report_month);

			// 交付年月の月初、月末取得
			$this_year  = date("Y", strtotime($report_date));
			$this_month = date("m", strtotime($report_date));
			list($this_month_from, $this_month_to) = $this->Calendar->getMonthBeginEnd($this_year, $this_month);
			
			// 当月の全体の配当、報酬取得
			$repay_conditions[COLUMN_2300020] = $fund_id;
			$repay_conditions[COLUMN_2300040." >="] = $date_from;
			$repay_conditions[COLUMN_2300040." <="] = $date_to;
			
			$repay_fields[] = "sum(".COLUMN_2300080.") as ".COLUMN_2300080;
			$repay_fields[] = "sum(".COLUMN_2300090.") as ".COLUMN_2300090;
			
			$repay_status[MODEL_FIELDS]     = $repay_fields;
			$repay_status[MODEL_CONDITIONS] = $repay_conditions;
			
			$repayment = $this->Controller->TrnRewardHistory->find(MODEL_ALL, $repay_status);

			$div_amount_total = 0;
			$reward_amount    = 0;
			foreach ($repayment as $repay_keys => $repay_values) {
				foreach ($repay_values as $repay_key => $repay_value) {
					$reward_amount    = $repay_value[COLUMN_2300080];
					$div_amount_total = $repay_value[COLUMN_2300090];
				}
			}
			
			// ◆当月の配当履歴取得(投資家)◆
			$conditions1[COLUMN_1000020] = $user_id;
			$conditions1[COLUMN_1000040] = $fund_id;
			$conditions1[COLUMN_1000070." >="] = $this_month_from;
			$conditions1[COLUMN_1000070." <="] = $this_month_to;

			$status1[MODEL_CONDITIONS] = $conditions1;

			$dividends1 = $this->Controller->TrnDividendHistory->find(MODEL_ALL, $status1);

			$div_amount1 = 0;
			$tax_amount1 = 0;
			$prn_amount1 = 0;
			foreach ($dividends1 as $keys1 => $values1) {
				foreach ($values1 as $key1 => $value1) {
					if (strcmp(DIVIDEND_DETAIL_CODE_01, $value1[COLUMN_1000080]) == 0) {
						
						// 出資金償還額
						$prn_amount1 = $value1[COLUMN_1000090];
					}
					elseif (strcmp(DIVIDEND_DETAIL_CODE_02, $value1[COLUMN_1000080]) == 0) {
						
						// 分配金
						$div_amount1 = $value1[COLUMN_1000090];
					}
					else {
						
						// 源泉徴収
						$tax_amount1 = $value1[COLUMN_1000100];
					}
				}
			}
			
			// ◆前月までの出資金償還額(投資家)◆
			$conditions2[COLUMN_1000020] = $user_id;
			$conditions2[COLUMN_1000040] = $fund_id;
			$conditions2[COLUMN_1000070." <="] = $date_to;
			$conditions2[COLUMN_1000080] = DIVIDEND_DETAIL_CODE_01;

			$fields2[] = "sum(".COLUMN_1000090.") as ".COLUMN_1000090;
			
			$status2[MODEL_FIELDS]     = $fields2;
			$status2[MODEL_CONDITIONS] = $conditions2;

			$dividends2 = $this->Controller->TrnDividendHistory->find(MODEL_ALL, $status2);
			
			$principal_lender = 0;
			foreach ($dividends2 as $keys2 => $values2) {
				foreach ($values2 as $key2 => $value2) {
					$principal_lender = $value2[COLUMN_1000090];
				}
			}
			
			// ◆前月までの出資金償還額(その他の投資家)◆
			$conditions3[COLUMN_1000020." !="] = $user_id;
			$conditions3[COLUMN_1000040] = $fund_id;
			$conditions3[COLUMN_1000070." <="] = $date_to;
			$conditions3[COLUMN_1000080] = DIVIDEND_DETAIL_CODE_01;

			$fields3[] = "sum(".COLUMN_1000090.") as ".COLUMN_1000090;
			
			$status3[MODEL_FIELDS]     = $fields3;
			$status3[MODEL_CONDITIONS] = $conditions3;

			// 検索結果が0件の場合戻り値にfalseを設定
			$dividends3 = $this->Controller->TrnDividendHistory->find(MODEL_ALL, $status3);
			
			$principal_other = 0;
			foreach ($dividends3 as $keys3 => $values3) {
				foreach ($values3 as $key3 => $value3) {
					$principal_other = $value3[COLUMN_1000090];
				}
			}
			
			// ◆投資金額(投資家)◆
			$inv_conditions[COLUMN_1200020] = $user_id;
			$inv_conditions[COLUMN_1200040] = $fund_id;
			$inv_conditions[COLUMN_1200090] = INVESTMENT_STATUS_CODE_APPROVED;

			$inv_fields[] = "sum(".COLUMN_1200070.") as ".COLUMN_1200070;
			
			$inv_status[MODEL_FIELDS]     = $inv_fields;
			$inv_status[MODEL_CONDITIONS] = $inv_conditions;

			// 検索結果が0件の場合戻り値にfalseを設定
			$investment = $this->Controller->TrnInvestmentHistory->find(MODEL_ALL, $inv_status);
			
			$inv_amount_lender = 0;
			foreach ($investment as $inv_keys => $inv_values) {
				foreach ($inv_values as $inv_key => $inv_value) {
					$inv_amount_lender = $inv_value[COLUMN_1200070];
				}
			}
			
			// ◆投資金額(その他の投資家)◆
			$inv_conditions2[COLUMN_1200020." !="] = $user_id;
			$inv_conditions2[COLUMN_1200040] = $fund_id;
			$inv_conditions2[COLUMN_1200090] = INVESTMENT_STATUS_CODE_APPROVED;

			$inv_fields2[] = "sum(".COLUMN_1200070.") as ".COLUMN_1200070;
			
			$inv_status2[MODEL_FIELDS]     = $inv_fields2;
			$inv_status2[MODEL_CONDITIONS] = $inv_conditions2;

			// 検索結果が0件の場合戻り値にfalseを設定
			$investment2 = $this->Controller->TrnInvestmentHistory->find(MODEL_ALL, $inv_status2);
			
			$inv_amount_other = 0;
			foreach ($investment2 as $inv_keys2 => $inv_values2) {
				foreach ($inv_values2 as $inv_key2 => $inv_value2) {
					$inv_amount_other = $inv_value2[COLUMN_1200070];
				}
			}
			
			// ◆出資金額セット(投資家、その他の投資家、営業者)◆
			$data[ARRAY_INDEX_INV_AMOUNT1] = $inv_amount_lender - $principal_lender;
			$data[ARRAY_INDEX_INV_AMOUNT2] = $inv_amount_other  - $principal_other;
			$data[ARRAY_INDEX_INV_AMOUNT3] = "-";
			$data[ARRAY_INDEX_INV_AMOUNT_TOTAL] = $data[ARRAY_INDEX_INV_AMOUNT1] + $data[ARRAY_INDEX_INV_AMOUNT2];
			
			// ◆投資家持分セット
			$data[ARRAY_INDEX_INV_COUNT] = $inv_amount_lender / $min_inv_amount;
			
			// ◆損益分配をセット(投資家、その他の投資家、営業者)◆
			$data[ARRAY_INDEX_DIV_AMOUNT1] = $div_amount1;
			$data[ARRAY_INDEX_DIV_AMOUNT2] = $div_amount_total - $div_amount1;
			$data[ARRAY_INDEX_DIV_AMOUNT3] = $reward_amount;
			$data[ARRAY_INDEX_DIV_AMOUNT_TOTAL] = $data[ARRAY_INDEX_DIV_AMOUNT1] + $data[ARRAY_INDEX_DIV_AMOUNT2] + $data[ARRAY_INDEX_DIV_AMOUNT3];
			
			// ◆送金明細
			$data[ARRAY_INDEX_SHUSSI_SHOKAN_AMOUNT] = $prn_amount1;
			$data[ARRAY_INDEX_SONEKI_BUNPAI_AMOUNT] = $div_amount1;
			$data[ARRAY_INDEX_GENSEN_CHOSHU_AMOUNT] = $tax_amount1;
			$data[ARRAY_INDEX_SOKIN_AMOUNT]         = $prn_amount1 + $div_amount1 - $tax_amount1;
			
			return $data;
			
			
		} catch (Exception $ex) {
			$err = "OperatingReport->getPage3Data で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		  }
	}
	
	/**
	 * 運用報告書取得２<br>
	 * 運用報告書データを1件取得<br>
	 * @param string $fund_id
	 * @param number $report_year
	 * @param number $report_month
	 */
	function getSecondOperatingReport($fund_id, $report_year, $report_month) {
		try {
			
			$result = null;
			
			// パラメータ設定
			$conditions[COLUMN_2700020] = $fund_id;
			$conditions[COLUMN_2700040] = $report_year;
			$conditions[COLUMN_2700050] = $report_month;

			// ワークデータ取得
			$status[MODEL_CONDITIONS] = $conditions;
			$data = $this->Controller->TrnSecondOperatingReport->find(MODEL_ALL, $status);
			
			foreach ($data as $keys => $values) {
				foreach ($values as $key => $value) {
					$result = $value;
				}
			}

			return $result;
			
		} catch (Exception $ex) {
			$err = "OperatingReport->getSecondOperatingReport で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		  }
	}

        	/**
	 * 運用報告書取得２<br>
	 * <br>
	 * @param string $fund_id
	 * @param number $report_year
	 * @param number $report_month
	 */
	function getSecondOperatingReport1($fund_id, $report_year, $report_month) {
		try {
			
			$data = null;
			
			// パラメータ設定
			$conditions[COLUMN_2700020] = $fund_id;
			$conditions[COLUMN_2700040] = $report_year;
			$conditions[COLUMN_2700050] = $report_month;

			// ワークデータ取得
			$status[MODEL_CONDITIONS] = $conditions;
			$data = $this->Controller->TrnSecondOperatingReport->find('all',array(
                                                                                              'fields' => array('id','fund_id','report_year','report_date','remittance_date','issue_date','report_status','insert_datetime'), 
                                                                                              'conditions' => array('fund_id' => $fund_id,
                                                                                                                    'report_year' => $report_year,
                                                                                                                    'report_month' => $report_month)
                                                                                              ));
			return $data;
		} catch (Exception $ex) {
			$err = "OperatingReport->getSecondOperatingReport1 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		  }
	}

        
	/**
	 * 運用報告書入力画面初期化<br>
	 * 運用報告書(入力)の初期値を設定する。<br>
	 * @throws Exception
	 */
	function setOperatingReportDefault() {
		try {
			
			$fund_id   = $this->Common->getSessionFundId();
			$fund_name = $this->Common->getSessionFundName();
			
			// 作成日、送金予定日等
			$data = array(
				 OBJECT_ID_050310010 => $fund_id
				,OBJECT_ID_050310020 => $fund_name
				,OBJECT_ID_050310030 => ""
				,OBJECT_ID_050310040 => ""
				,OBJECT_ID_050310050 => ""
				,OBJECT_ID_050310060 => ""
				,OBJECT_ID_050310070 => ""
				,OBJECT_ID_050310080 => REPORT_STATUS_CODE_0
				,HIDDEN_ID_000000170 => 0
			);
			
			// 最後に登録した運用報告書情報を取得
			$report = $this->getOperatingReportLast();

			// 科目
			if (is_null($report)) {
				
				$data += array(
					 OBJECT_ID_050310090 => "" ,OBJECT_ID_050310100 => "" ,OBJECT_ID_050310110 => "" ,OBJECT_ID_050310120 => ""
					,OBJECT_ID_050310130 => "" ,OBJECT_ID_050310140 => "" ,OBJECT_ID_050310150 => "" ,OBJECT_ID_050310160 => ""
					,OBJECT_ID_050310170 => "" ,OBJECT_ID_050310180 => "" ,OBJECT_ID_050310190 => "" ,OBJECT_ID_050310200 => ""
					,OBJECT_ID_050310210 => "" ,OBJECT_ID_050310220 => "" ,OBJECT_ID_050310230 => "" ,OBJECT_ID_050310240 => ""
					,OBJECT_ID_050310250 => "" ,OBJECT_ID_050310260 => "" ,OBJECT_ID_050310270 => "" ,OBJECT_ID_050310280 => ""
					,OBJECT_ID_050310290 => "" ,OBJECT_ID_050310300 => "" ,OBJECT_ID_050310310 => "" ,OBJECT_ID_050310320 => ""
					,OBJECT_ID_050310330 => "" ,OBJECT_ID_050310340 => "" ,OBJECT_ID_050310350 => "" ,OBJECT_ID_050310360 => ""
					,OBJECT_ID_050310370 => "" ,OBJECT_ID_050310380 => "" ,OBJECT_ID_050310390 => "" ,OBJECT_ID_050310400 => ""
					,OBJECT_ID_050310410 => "" ,OBJECT_ID_050310420 => "" ,OBJECT_ID_050310430 => "" ,OBJECT_ID_050310440 => ""
					,OBJECT_ID_050310450 => "" ,OBJECT_ID_050310460 => "" ,OBJECT_ID_050310470 => "" ,OBJECT_ID_050310480 => ""
					,OBJECT_ID_050310490 => "" ,OBJECT_ID_050310500 => "" ,OBJECT_ID_050310510 => "" ,OBJECT_ID_050310520 => ""
					,OBJECT_ID_050310530 => "" ,OBJECT_ID_050310540 => "" ,OBJECT_ID_050310550 => "" ,OBJECT_ID_050310560 => ""
					,OBJECT_ID_050310570 => "" ,OBJECT_ID_050310580 => "" ,OBJECT_ID_050310590 => "" ,OBJECT_ID_050310600 => ""
					,OBJECT_ID_050310610 => "" ,OBJECT_ID_050310620 => "" ,OBJECT_ID_050310630 => "" ,OBJECT_ID_050310640 => ""
					,OBJECT_ID_050310650 => "" ,OBJECT_ID_050310660 => "" ,OBJECT_ID_050310670 => "" ,OBJECT_ID_050310680 => ""
					,OBJECT_ID_050310690 => "" ,OBJECT_ID_050310700 => "" ,OBJECT_ID_050310710 => "" ,OBJECT_ID_050310720 => ""
					,OBJECT_ID_050310730 => "" ,OBJECT_ID_050310740 => "" ,OBJECT_ID_050310750 => "" ,OBJECT_ID_050310760 => ""
					,OBJECT_ID_050310770 => "" ,OBJECT_ID_050310780 => "" ,OBJECT_ID_050310790 => "" ,OBJECT_ID_050310800 => ""
					,OBJECT_ID_050310810 => "" ,OBJECT_ID_050310820 => "" ,OBJECT_ID_050310830 => ""
				);
				
			}
			else {
				
				$data += array(
					 OBJECT_ID_050310090 => $report[COLUMN_2700100] ,OBJECT_ID_050310100 => $report[COLUMN_2700110] ,OBJECT_ID_050310110 => $report[COLUMN_2700120]
					,OBJECT_ID_050310120 => $report[COLUMN_2700130] ,OBJECT_ID_050310130 => $report[COLUMN_2700140] ,OBJECT_ID_050310140 => $report[COLUMN_2700150]
					,OBJECT_ID_050310150 => $report[COLUMN_2700160] ,OBJECT_ID_050310160 => $report[COLUMN_2700170] ,OBJECT_ID_050310170 => $report[COLUMN_2700180]
					,OBJECT_ID_050310180 => $report[COLUMN_2700190] ,OBJECT_ID_050310190 => $report[COLUMN_2700200] ,OBJECT_ID_050310200 => $report[COLUMN_2700210]
					,OBJECT_ID_050310210 => $report[COLUMN_2700220] ,OBJECT_ID_050310220 => $report[COLUMN_2700230] ,OBJECT_ID_050310230 => $report[COLUMN_2700240]
					,OBJECT_ID_050310240 => $report[COLUMN_2700250] ,OBJECT_ID_050310250 => $report[COLUMN_2700260] ,OBJECT_ID_050310260 => $report[COLUMN_2700270]
					,OBJECT_ID_050310270 => $report[COLUMN_2700280] ,OBJECT_ID_050310280 => $report[COLUMN_2700290] ,OBJECT_ID_050310290 => $report[COLUMN_2700300]
					,OBJECT_ID_050310300 => $report[COLUMN_2700310] ,OBJECT_ID_050310310 => $report[COLUMN_2700320] ,OBJECT_ID_050310320 => $report[COLUMN_2700330]
					,OBJECT_ID_050310330 => $report[COLUMN_2700340] ,OBJECT_ID_050310340 => $report[COLUMN_2700350] ,OBJECT_ID_050310350 => $report[COLUMN_2700360]
					,OBJECT_ID_050310360 => $report[COLUMN_2700370] ,OBJECT_ID_050310370 => $report[COLUMN_2700380] ,OBJECT_ID_050310380 => $report[COLUMN_2700390]
					,OBJECT_ID_050310390 => $report[COLUMN_2700400] ,OBJECT_ID_050310400 => $report[COLUMN_2700410] ,OBJECT_ID_050310410 => $report[COLUMN_2700420]
					,OBJECT_ID_050310420 => $report[COLUMN_2700430] ,OBJECT_ID_050310430 => $report[COLUMN_2700440] ,OBJECT_ID_050310440 => $report[COLUMN_2700450]
				);
			}

			// 金額
			$data += array(
				 OBJECT_ID_050310450 => "" ,OBJECT_ID_050310460 => "" ,OBJECT_ID_050310470 => "" ,OBJECT_ID_050310480 => ""
				,OBJECT_ID_050310490 => "" ,OBJECT_ID_050310500 => "" ,OBJECT_ID_050310510 => "" ,OBJECT_ID_050310520 => ""
				,OBJECT_ID_050310530 => "" ,OBJECT_ID_050310540 => "" ,OBJECT_ID_050310550 => "" ,OBJECT_ID_050310560 => ""
				,OBJECT_ID_050310570 => "" ,OBJECT_ID_050310580 => "" ,OBJECT_ID_050310590 => "" ,OBJECT_ID_050310600 => ""
				,OBJECT_ID_050310610 => "" ,OBJECT_ID_050310620 => "" ,OBJECT_ID_050310630 => "" ,OBJECT_ID_050310640 => ""
				,OBJECT_ID_050310650 => "" ,OBJECT_ID_050310660 => "" ,OBJECT_ID_050310670 => "" ,OBJECT_ID_050310680 => ""
				,OBJECT_ID_050310690 => "" ,OBJECT_ID_050310700 => "" ,OBJECT_ID_050310710 => "" ,OBJECT_ID_050310720 => ""
				,OBJECT_ID_050310730 => "" ,OBJECT_ID_050310740 => "" ,OBJECT_ID_050310750 => "" ,OBJECT_ID_050310760 => ""
				,OBJECT_ID_050310770 => "" ,OBJECT_ID_050310780 => "" ,OBJECT_ID_050310790 => "" ,OBJECT_ID_050310800 => ""
				,OBJECT_ID_050310810 => "" ,OBJECT_ID_050310820 => "" ,OBJECT_ID_050310830 => ""
			);
			
			// 貸付情報取得
			$loans = $this->Fund->getMstLoans($fund_id);
			
			// 報告書(貸付)情報取得(当該ファンドにおいて1件目の運用報告書の場合は戻り値は空)
			$report_loans = $this->getOperatingReportLoansLast($fund_id);
			
			$count = 0;
			foreach ($loans as $key => $loan) {
				$data[OBJECT_ID_050310840.$count] = $loan[COLUMN_0700030];
				if (isset($report_loans[$loan[COLUMN_0700030]])) {
					$data[OBJECT_ID_050310850.$count] = $report_loans[$loan[COLUMN_0700030]][COLUMN_2100050];
				}
				else {
					$data[OBJECT_ID_050310850.$count] = $loan[COLUMN_0700050];
				}
				$data[OBJECT_ID_050310860.$count] = "";
				$data[OBJECT_ID_050310870.$count] = "";
				$data[OBJECT_ID_050310880.$count] = "";
				$data[OBJECT_ID_050310890.$count] = "";
				$data[HIDDEN_ID_000000130.$count] = "";
				$count++;
			}
			
			return $data;
			
		} catch (Exception $ex) {
			$err = "OperatingReport->getSecondOperatingReport で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 運用報告書情報取得<br>
	 * 登録済みの運用報告書情報を取得し、画面表示用データを作成する。<br>
	 * 
	 * @throws Exception
	 */
	function setOperatingReportInfo2() {
		try {
			
			$data = array();
			
			$report_id = $this->Common->getSessionReportId();
			
			// 運用報告書データ取得
			$conditions[COLUMN_2700010] = $report_id;
			$status[MODEL_CONDITIONS]   = $conditions;
			$report_data = $this->Controller->TrnSecondOperatingReport->find(MODEL_ALL, $status);
			
			$report = null;
			foreach ($report_data as $report_keys => $report_values) {
				foreach ($report_values as $report_key => $report_value) {
					$report = $report_value;
				}
			}
			
			$data = array(
				 OBJECT_ID_050310010 => $report[COLUMN_2700020] ,OBJECT_ID_050310020 => $report[COLUMN_2700030] ,OBJECT_ID_050310030 => $report[COLUMN_2700040]
				,OBJECT_ID_050310040 => $report[COLUMN_2700050] ,OBJECT_ID_050310050 => $report[COLUMN_2700060] ,OBJECT_ID_050310060 => $report[COLUMN_2700070]
				,OBJECT_ID_050310070 => $report[COLUMN_2700080] ,OBJECT_ID_050310080 => $report[COLUMN_2700090] ,OBJECT_ID_050310090 => $report[COLUMN_2700100]
				,OBJECT_ID_050310100 => $report[COLUMN_2700110] ,OBJECT_ID_050310110 => $report[COLUMN_2700120] ,OBJECT_ID_050310120 => $report[COLUMN_2700130]
				,OBJECT_ID_050310130 => $report[COLUMN_2700140] ,OBJECT_ID_050310140 => $report[COLUMN_2700150] ,OBJECT_ID_050310150 => $report[COLUMN_2700160]
				,OBJECT_ID_050310160 => $report[COLUMN_2700170] ,OBJECT_ID_050310170 => $report[COLUMN_2700180] ,OBJECT_ID_050310180 => $report[COLUMN_2700190]
				,OBJECT_ID_050310190 => $report[COLUMN_2700200] ,OBJECT_ID_050310200 => $report[COLUMN_2700210] ,OBJECT_ID_050310210 => $report[COLUMN_2700220]
				,OBJECT_ID_050310220 => $report[COLUMN_2700230] ,OBJECT_ID_050310230 => $report[COLUMN_2700240] ,OBJECT_ID_050310240 => $report[COLUMN_2700250]
				,OBJECT_ID_050310250 => $report[COLUMN_2700260] ,OBJECT_ID_050310260 => $report[COLUMN_2700270] ,OBJECT_ID_050310270 => $report[COLUMN_2700280]
				,OBJECT_ID_050310280 => $report[COLUMN_2700290] ,OBJECT_ID_050310290 => $report[COLUMN_2700300] ,OBJECT_ID_050310300 => $report[COLUMN_2700310]
				,OBJECT_ID_050310310 => $report[COLUMN_2700320] ,OBJECT_ID_050310320 => $report[COLUMN_2700330] ,OBJECT_ID_050310330 => $report[COLUMN_2700340]
				,OBJECT_ID_050310340 => $report[COLUMN_2700350] ,OBJECT_ID_050310350 => $report[COLUMN_2700360] ,OBJECT_ID_050310360 => $report[COLUMN_2700370]
				,OBJECT_ID_050310370 => $report[COLUMN_2700380] ,OBJECT_ID_050310380 => $report[COLUMN_2700390] ,OBJECT_ID_050310390 => $report[COLUMN_2700400]
				,OBJECT_ID_050310400 => $report[COLUMN_2700410] ,OBJECT_ID_050310410 => $report[COLUMN_2700420] ,OBJECT_ID_050310420 => $report[COLUMN_2700430]
				,OBJECT_ID_050310430 => $report[COLUMN_2700440] ,OBJECT_ID_050310440 => $report[COLUMN_2700450] ,OBJECT_ID_050310450 => $report[COLUMN_2700460]
				,OBJECT_ID_050310460 => $report[COLUMN_2700470] ,OBJECT_ID_050310470 => $report[COLUMN_2700480] ,OBJECT_ID_050310480 => $report[COLUMN_2700490]
				,OBJECT_ID_050310490 => $report[COLUMN_2700500] ,OBJECT_ID_050310500 => $report[COLUMN_2700510] ,OBJECT_ID_050310510 => $report[COLUMN_2700520]
				,OBJECT_ID_050310520 => $report[COLUMN_2700530] ,OBJECT_ID_050310530 => $report[COLUMN_2700540] ,OBJECT_ID_050310540 => $report[COLUMN_2700550]
				,OBJECT_ID_050310550 => $report[COLUMN_2700560] ,OBJECT_ID_050310560 => $report[COLUMN_2700570] ,OBJECT_ID_050310570 => $report[COLUMN_2700580]
				,OBJECT_ID_050310580 => $report[COLUMN_2700590] ,OBJECT_ID_050310590 => $report[COLUMN_2700600] ,OBJECT_ID_050310600 => $report[COLUMN_2700610]
				,OBJECT_ID_050310610 => $report[COLUMN_2700620] ,OBJECT_ID_050310620 => $report[COLUMN_2700630] ,OBJECT_ID_050310630 => $report[COLUMN_2700640]
				,OBJECT_ID_050310640 => $report[COLUMN_2700650] ,OBJECT_ID_050310650 => $report[COLUMN_2700660] ,OBJECT_ID_050310660 => $report[COLUMN_2700670]
				,OBJECT_ID_050310670 => $report[COLUMN_2700680] ,OBJECT_ID_050310680 => $report[COLUMN_2700690] ,OBJECT_ID_050310690 => $report[COLUMN_2700700]
				,OBJECT_ID_050310700 => $report[COLUMN_2700710] ,OBJECT_ID_050310710 => $report[COLUMN_2700720] ,OBJECT_ID_050310720 => $report[COLUMN_2700730]
				,OBJECT_ID_050310730 => $report[COLUMN_2700740] ,OBJECT_ID_050310740 => $report[COLUMN_2700750] ,OBJECT_ID_050310750 => $report[COLUMN_2700760]
				,OBJECT_ID_050310760 => $report[COLUMN_2700770] ,OBJECT_ID_050310770 => $report[COLUMN_2700780] ,OBJECT_ID_050310780 => $report[COLUMN_2700790]
				,OBJECT_ID_050310790 => $report[COLUMN_2700800] ,OBJECT_ID_050310800 => $report[COLUMN_2700810] ,OBJECT_ID_050310810 => $report[COLUMN_2700820]
				,OBJECT_ID_050310820 => $report[COLUMN_2700830] ,OBJECT_ID_050310830 => $report[COLUMN_2700840] ,HIDDEN_ID_000000170 => $report[COLUMN_0000100]
			);
			
			// 運用報告書(貸付)データ取得
			$fund_id  = $report[COLUMN_2700020];
			$report_y = $report[COLUMN_2700040];
			$report_m = $report[COLUMN_2700050];
			
			$loans = $this->getOperatingReportLoansList($fund_id, $report_y, $report_m);
			
			$count = 0;
			foreach ($loans as $key => $loan) {
				$data[OBJECT_ID_050310840.$count] = $loan[COLUMN_2100020];
				$data[OBJECT_ID_050310850.$count] = $loan[COLUMN_2100050];
				$data[OBJECT_ID_050310860.$count] = $loan[COLUMN_2100060];
				$data[OBJECT_ID_050310870.$count] = $loan[COLUMN_2100070];
				$data[OBJECT_ID_050310880.$count] = $loan[COLUMN_2100080];
				$data[OBJECT_ID_050310890.$count] = $loan[COLUMN_2100090];
				$data[HIDDEN_ID_000000130.$count] = $loan[COLUMN_2100000];
				$count++;
			}
			
			return $data;
			
		} catch (Exception $ex) {
			$err = "OperatingReport->setOperatingReportInfo2 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 最終運用報告書取得<br>
	 * 最後に登録した運用報告書情報を取得する。<br>
	 */
	function getOperatingReportLast() {
		try {
			
			$result = null;
			
			// 最後に登録された運用報告書情報のidを取得する。
			$fields[]             = "max(".COLUMN_2700010.") as ".COLUMN_2700010;
			$status[MODEL_FIELDS] = $fields;
			
			$data = $this->Controller->TrnSecondOperatingReport->find(MODEL_ALL, $status);
			
			$max_id = 0;
			foreach ($data as $keys => $values) {
				foreach ($values as $key => $value) {
					$max_id = $value[COLUMN_2700010];
				}
			}
			
			$conditions = array();
			$status     = array();
			
			// パラメータ設定
			$conditions[COLUMN_2700010] = $max_id;
			$status[MODEL_CONDITIONS]   = $conditions;
			$data = $this->Controller->TrnSecondOperatingReport->find(MODEL_ALL, $status);
			
			foreach ($data as $keys => $values) {
				foreach ($values as $key => $value) {
					$result = $value;
				}
			}
			
			return $result;
			
		} catch (Exception $ex) {
			$err = "OperatingReport->getOperatingReportLast で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 運用報告書(貸付)取得<br>
	 * ファンド毎の最後に登録した運用報告書(貸付)情報を取得する。<br>
	 * @param string $fund_id
	 */
	function getOperatingReportLoansLast($fund_id) {
		try {
			
			$result = array();
			
			// 同一ファンドID内で最後に登録された運用報告書情報を取得する。
			$conditions[COLUMN_2700020] = $fund_id;
			$fields[]                   = "max(".COLUMN_2700010.") as ".COLUMN_2700010;
			
			$status[MODEL_CONDITIONS]   = $conditions;
			$status[MODEL_FIELDS]       = $fields;
			
			$data = $this->Controller->TrnSecondOperatingReport->find(MODEL_ALL, $status);
			
			$max_id = 0;
			foreach ($data as $keys => $values) {
				foreach ($values as $key => $value) {
					$max_id = $value[COLUMN_2700010];
				}
			}
			
			$conditions = array();
			$status     = array();
			
			// パラメータ設定
			$conditions[COLUMN_2700010] = $max_id;
			$status[MODEL_CONDITIONS]   = $conditions;
			$data = $this->Controller->TrnSecondOperatingReport->find(MODEL_ALL, $status);
			
			$report = null;
			foreach ($data as $keys => $values) {
				foreach ($values as $key => $value) {
					$report = $value;
				}
			}
			
			// 運用報告書情報を取得できた場合、運用報告書(貸付)を取得する。
			if (!is_null($report)) {
				
				$conditions = array();
				$order      = array();
				$status     = array();
				
				$conditions[COLUMN_2100010] = $report[COLUMN_2700020];
				$conditions[COLUMN_2100030] = $report[COLUMN_2700040];
				$conditions[COLUMN_2100040] = $report[COLUMN_2700050];
				
				$order[COLUMN_2100020]      = MODEL_ASC;
				
				$status[MODEL_CONDITIONS]   = $conditions;
				$status[MODEL_ORDER]        = $order;
				
				$data = $this->Controller->TrnOperatingReportLoan->find(MODEL_ALL, $status);
				
				foreach ($data as $keys => $values) {
					foreach ($values as $key => $value) {
						$result[$value[COLUMN_2100020]] = $value;
					}
				}
			}
			
			return $result;
			
		} catch (Exception $ex) {
			$err = "OperatingReport->getOperatingReportLoansLast で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
}
