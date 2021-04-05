<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class FundComponent extends Component {
	
	// 他のコンポーネントを使えるようにする。
	public $components = array(
		 "SessionAdminInfo"
		,"Common"
		,"Calendar"
		,"CheckC050"
		,"Company"
	);
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}

	/**
	 * ファンドマスタ取得<br>
	 * ファンドIDを指定してデータを取得する。<br>
	 * @param string $fund_id
	 * @return array $data
	 */
	function getMstFund($fund_id) {
		
		try {
			
			// パラメータ設定
			$conditions[COLUMN_0500010] = $fund_id;

			// ワークデータ取得
			$status[MODEL_CONDITIONS] = $conditions;
			$data = $this->Controller->MstFund->find(MODEL_ALL, $status);

			return $data;
			
		} catch (Exception $ex) {
			$err = "Fund->getMstFund で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}

	/**
	 * 運用開始日取得<br>
	 * 貸付ワークから同一ファンド内で最も貸付日が早い日付を取得<br>
	 * @param string $admin_id
	 * @return date $loan_date
	 */
	function getOperatingStartDate($admin_id) {
		
		try {
			
			// ◆絞込み条件◆
			$conditions[COLUMN_1600000] = $admin_id;

			$status[MODEL_CONDITIONS] = $conditions;

			$status[MODEL_FIELDS] = array(
				"min(".COLUMN_1600050.") as ".COLUMN_1600050
			);

			$data = $this->Controller->WrkLoan->find(MODEL_ALL, $status);

			$loan_date = null;
			foreach ($data as $keys => $values) {
				foreach ($values as $key => $value) {
					$loan_date = $value[COLUMN_1600050];
				}
			}

			return $loan_date;
			
		} catch (Exception $ex) {
			$err = "Fund->getOperatingStartDate で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * 運用終了日取得<br>
	 * 返済(貸付)ワークから同一ファンド内で最も返済予定日が遅い日付を取得<br>
	 * @param string $admin_id
	 * @return date $repayment_date
	 */
	function getOperatingEndDate($admin_id) {
		
		
		try {
			
			// ◆絞込み条件◆
			$conditions[COLUMN_1700000] = $admin_id;

			$status[MODEL_CONDITIONS] = $conditions;

	//		// group by
	//		$status[MODEL_GROUP] = array(
	//			 COLUMN_170000
	//			,COLUMN_0400030
	//		);

			$status[MODEL_FIELDS] = array(
				"max(".COLUMN_1700050.") as ".COLUMN_1700050
			);

			$data = $this->Controller->WrkLoanRepayment->find(MODEL_ALL, $status);

			$repayment_date = null;
			foreach ($data as $keys => $values) {
				foreach ($values as $key => $value) {
					$repayment_date = $value[COLUMN_1700050];
				}
			}

			return $repayment_date;
			
		} catch (Exception $ex) {
			$err = "Fund->getOperatingEndDate で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * ファンドID生成
	 * $return string $new_fund_id
	 */
	function createFundId() {
		
		try {
			
			$status[MODEL_FIELDS] = array(
				"max(".COLUMN_0500010.") as ".COLUMN_0500010
			);

			$data = $this->Controller->MstFund->find(MODEL_ALL, $status);

			$fund_id = 0;
			foreach ($data as $keys => $values) {
				foreach ($values as $key => $value) {
					$fund_id = $value[COLUMN_0500010];
				}
			}

			$new_fund_id = sprintf("%05d", intval($fund_id) + 1);

			return $new_fund_id;
			
		} catch (Exception $ex) {
			$err = "Fund->createFundId で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 貸付番号生成
	 * $param string $admin_id
	 * $return number $new_loan_no
	 */
	private function createLoanNo($admin_id) {
		
		try {
			
			$status     = null;
			$conditions = null;

			// ◆絞込み条件◆
			$conditions[COLUMN_1600000] = $admin_id;

			$status[MODEL_CONDITIONS] = $conditions;

			$status[MODEL_FIELDS] = array(
				"max(".COLUMN_1600030.") as ".COLUMN_1600030
			);

			$data = $this->Controller->WrkLoan->find(MODEL_ALL, $status);

			$loan_no = 0;
			foreach ($data as $keys => $values) {
				foreach ($values as $key => $value) {
					$loan_no = $value[COLUMN_1600030];
				}
			}
			if ($data) {
			}

			$new_loan_no = intval($loan_no) + 1;

			return $new_loan_no;
			
		} catch (Exception $ex) {
			$err = "Fund->createLoanNo で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * ファンドワーク作成(新規)
	 */
	function makeWrkFundNew($admin_id) {

		try {
			
			// 処理区分セット：新規
			$this->Common->setSessionProcTypeFund(PROC_TYPE_INSERT);

			// 削除条件指定
			$conditions[COLUMN_1400000] = $admin_id;

			// ワーク削除実行
			$this->Controller->WrkFund->deleteAll($conditions, false);
			$this->Controller->WrkFundRepayment->deleteAll($conditions, false);
			$this->Controller->WrkLoan->deleteAll($conditions, false);
			$this->Controller->WrkLoanRepayment->deleteAll($conditions, false);

			// 初期値
			$conditions[COLUMN_1400030] = 0;
			$conditions[COLUMN_1400040] = 0;
			$conditions[COLUMN_1400050] = 0;
			$conditions[COLUMN_1400060] = 10000;//最低投資額初期値
			$conditions[COLUMN_1400070] = date(DATE_FORMAT);
			$conditions[COLUMN_1400080] = date(DATE_FORMAT)." 10:00:00";
			$conditions[COLUMN_1400090] = date(DATE_FORMAT)." 23:59:59";
			$conditions[COLUMN_1400100] = "";
			$conditions[COLUMN_1400110] = "";
			$conditions[COLUMN_1400120] = 24;
			$conditions[COLUMN_1400130] = 5.00;
			$conditions[COLUMN_1400140] = 10.00;
			$conditions[COLUMN_0000100] = 0;
			$conditions[COLUMN_1401190] = date(DATE_FORMAT);
			$conditions[COLUMN_1401410] = date(DATE_FORMAT);
			$conditions[COLUMN_1401420] = date(DATE_FORMAT);
			$conditions[COLUMN_1401430] = date(DATE_FORMAT);
			$conditions[COLUMN_1401440] = date(DATE_FORMAT);
			$conditions[COLUMN_1401450] = date(DATE_FORMAT);
			$conditions[COLUMN_1401460] = date(DATE_FORMAT);
			$conditions[COLUMN_1401470] = date(DATE_FORMAT);
			$conditions[COLUMN_1401490] = date(DATE_FORMAT);
			$conditions[COLUMN_1401540] = date(DATE_FORMAT);

$conditions[COLUMN_1400210] = 0;
$conditions[COLUMN_1400270] = 0;
$conditions[COLUMN_1400280] = 0;
$conditions[COLUMN_1400420] = 0;
$conditions[COLUMN_1400430] = 0;

$conditions[COLUMN_1400590] = 0;
$conditions[COLUMN_1400600] = 0;
$conditions[COLUMN_1400620] = 0;
$conditions[COLUMN_1400640] = 0;
$conditions[COLUMN_1400660] = 0;

$conditions[COLUMN_1400950] = 0;
$conditions[COLUMN_1401000] = 0;
$conditions[COLUMN_1401020] = 0;
$conditions[COLUMN_1401090] = 0;
$conditions[COLUMN_1401170] = 0;
$conditions[COLUMN_1401180] = 0;
$conditions[COLUMN_1401340] = 0;
$conditions[COLUMN_1401350] = 0;
$conditions[COLUMN_1401360] = 0;
$conditions[COLUMN_1401370] = 0;
$conditions[COLUMN_1401380] = 0;
$conditions[COLUMN_1401390] = 0;
$conditions[COLUMN_1401400] = 0;
$conditions[COLUMN_1401480] = 0;
$conditions[COLUMN_1401500] = 0;
$conditions[COLUMN_1401510] = 0;
$conditions[COLUMN_1401520] = 0;
$conditions[COLUMN_1401530] = 0;







			// ワーク作成実行
			$this->Controller->WrkFund->save($conditions);
			
		} catch (Exception $ex) {
			$err = "Fund->makeWrkFundNew で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * ファンドワーク作成<br>
	 */
	function makeWrkFund($admin_id, $fund_id) {
		
		try {
			
			// 処理区分セット：更新
			$this->Common->setSessionProcTypeFund(PROC_TYPE_UPDATE);

			// 削除条件指定
			$conditions[COLUMN_1400000] = $admin_id;

			// ワーク削除実行
			$this->Controller->WrkFund->deleteAll($conditions, false);
			$this->Controller->WrkFundRepayment->deleteAll($conditions, false);
			$this->Controller->WrkLoan->deleteAll($conditions, false);
			$this->Controller->WrkLoanRepayment->deleteAll($conditions, false);

			// ワーク作成実行
			$this->Controller->WrkFund->copyMstFund($admin_id, $fund_id);
			$this->Controller->WrkLoan->copyMstLoan($admin_id, $fund_id);
			$this->Controller->WrkLoanRepayment->copyTrnLoanRepayment($admin_id, $fund_id);
			$this->Controller->WrkFundRepayment->totalLoanRepayment($admin_id);
			
		} catch (Exception $ex) {
			$err = "Fund->makeWrkFund で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * 貸付ワーク作成(新規)<br>
	 * 生成した貸付番号を返す。
	 * @return number $loan_no
	 */
	function makeWrkLoanNew($admin_id) {

		try {
			
			$conditions[COLUMN_1600000] = $admin_id;

			// 貸付番号生成
			$loan_no = $this->createLoanNo($admin_id);
			$conditions[COLUMN_1600030] = $loan_no;

			// 排他キー
			$conditions[COLUMN_0000100] = 0;

			// ワーク作成実行
			$this->Controller->WrkLoan->save($conditions);

			return $loan_no;
			
		} catch (Exception $ex) {
			$err = "Fund->makeWrkLoanNew で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 登録前貸付ワーク削除
	 */
	function deleteWrkLoanUnregistered($admin_id, $loan_no) {
		
		try {
			
			$data = $this->getWrkLoan($admin_id, $loan_no);

			// 登録日時が登録されていない場合、対象の貸付データを削除
			if (empty($data[0][MODEL_NAME_160][COLUMN_0000010])) {

				// パラメータ設定
				$conditions[COLUMN_1600000] = $admin_id;
				$conditions[COLUMN_1600030] = $loan_no;

				// ワーク削除実行
				$this->Controller->WrkLoan->deleteAll($conditions, false);
			}
		} catch (Exception $ex) {
			$err = "Fund->deleteWrkLoanUnregistered で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
		
	
	/**
	 * ファンドワーク取得
	 * @param string $admin_id
	 * @return array $data
	 */
	function getWrkFund($admin_id) {
		
		try {
			
			// パラメータ設定
			$conditions[COLUMN_1400000] = $admin_id;

			// ワークデータ取得
			$status[MODEL_CONDITIONS] = $conditions;
			$data = $this->Controller->WrkFund->find(MODEL_ALL, $status);

			return $data;
			
		} catch (Exception $ex) {
			$err = "Fund->getWrkFund で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}

	/**
	 * 返済(ファンド)ワーク取得
	 * @param string $admin_id
	 * @return array $data
	 */
	function getWrkFundRepayment($admin_id) {
		
		try {
			
			// パラメータ設定
			$conditions[COLUMN_1500000] = $admin_id;
			$status[MODEL_CONDITIONS]   = $conditions;

			// ソート
			$order[COLUMN_1500040] = MODEL_ASC;
			$status[MODEL_ORDER]   = $order;		

			$data = $this->Controller->WrkFundRepayment->find(MODEL_ALL, $status);

			return $data;
			
		} catch (Exception $ex) {
			$err = "Fund->getWrkFundRepayment で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}

	/**
	 * 貸付ワーク取得
	 * @param string $admin_id
	 * @param number $loan_no
	 * @return array $data
	 */
	function getWrkLoan($admin_id, $loan_no) {
		
		try {
			
			// パラメータ設定
			$conditions[COLUMN_1600000] = $admin_id;
			$conditions[COLUMN_1600030] = $loan_no;

			// ワークデータ取得
			$status[MODEL_CONDITIONS] = $conditions;
			$data = $this->Controller->WrkLoan->find(MODEL_ALL, $status);

			return $data;
			
		} catch (Exception $ex) {
			$err = "Fund->getWrkLoan で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * 貸付ワーク取得
	 * @param string $admin_id
	 * @return array $data
	 */
	function getWrkLoanList($admin_id) {
		
		try {
			
			// パラメータ設定
			$conditions[MODEL_NAME_160.".".COLUMN_1600000] = $admin_id;
			$status[MODEL_CONDITIONS] = $conditions;

			// ソート
			$order[MODEL_NAME_160.".".COLUMN_1600030] = MODEL_ASC;
			$status[MODEL_ORDER]   = $order;

			$data = $this->Controller->WrkLoan->find(MODEL_ALL, $status);

			return $data;
			
		} catch (Exception $ex) {
			$err = "Fund->getWrkLoanList で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * 返済(貸付)ワーク取得
	 * @param string $admin_id
	 * @param number $loan_no
	 * @return array $data
	 */
	function getWrkLoanRepayment($admin_id, $loan_no) {
		
		try {
			
			// パラメータ設定
			$conditions[COLUMN_1700000] = $admin_id;
			$conditions[COLUMN_1700030] = $loan_no;

			$status[MODEL_CONDITIONS] = $conditions;

			// ソート
			$order[COLUMN_1700050] = MODEL_ASC;
			$status[MODEL_ORDER]   = $order;		

			$data = $this->Controller->WrkLoanRepayment->find(MODEL_ALL, $status);

			return $data;
			
		} catch (Exception $ex) {
			$err = "Fund->getWrkLoanRepayment で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * 貸付金額集計取得<br>
	 * 貸付ワークからファンド単位で各種金額の集計を取得する。
	 * @param string admin_id
	 * @return array $data
	 */
	function getTotalLoanAmount($admin_id) {
		
		try {
			
			// 検索条件
			$conditions[COLUMN_1600000] = $admin_id;

			// group by
			$status[MODEL_GROUP] = array(
				COLUMN_1600000
			);

			// 集計項目
			$status[MODEL_FIELDS] = array(
				 COLUMN_1600000       ."  as ".COLUMN_1600000 // 管理者ID
				,"sum(".COLUMN_1600060.") as ".COLUMN_1600060 // 貸付予定額
				,"sum(".COLUMN_1600070.") as ".COLUMN_1600070 // 貸付額
				,"sum(".COLUMN_1600080.") as ".COLUMN_1600080 // 最低成立額
			);

			$status[MODEL_CONDITIONS] = $conditions;
			$wrk_data = $this->Controller->WrkLoan->find(MODEL_ALL, $status);

			$result = null;
			foreach ($wrk_data as $keys => $values) {
				foreach ($values as $key => $value) {
					if (strcmp(0, $key) == 0) {
						$result[COLUMN_1600060] = $value[COLUMN_1600060];
						$result[COLUMN_1600070] = $value[COLUMN_1600070];
						$result[COLUMN_1600080] = $value[COLUMN_1600080];
					}
				}
			}

			return $result;
			
		} catch (Exception $ex) {
			$err = "Fund->getTotalLoanAmount で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/** ファンドマスタ登録<br>
	 * 対象のマスタを削除後、ワークテーブルのデータをマスタにコピーする。
	 * @param array $admin_info
	 * @param string  $fund_id
	 */
	function saveMstFund($admin_info, $fund_id) {
		
		try {
			
			// 削除条件指定
			$conditions[COLUMN_0500010] = $fund_id;

			// 削除実行
			$this->Controller->MstFund->deleteAll($conditions, false);

			// ワークコピー
			$this->Controller->MstFund->copyWrkFund($admin_info[LOGIN_ADMIN_ID], $fund_id);
			
		} catch (Exception $ex) {
			$err = "Fund->saveMstFund で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}

	/** 貸付マスタ登録<br>
	 * 対象のマスタを削除後、ワークテーブルのデータをマスタにコピーする。
	 * @param array $admin_info
	 * @param string  $fund_id
	 */
	function saveMstLoan($admin_info, $fund_id) {
		
		try {
			
			// 削除条件指定
			$conditions[COLUMN_0700020] = $fund_id;

			// 削除実行
			$this->Controller->MstLoan->deleteAll($conditions, false);

			// ワークコピー
			$this->Controller->MstLoan->copyWrkLoan($admin_info[LOGIN_ADMIN_ID], $fund_id);
			
		} catch (Exception $ex) {
			$err = "Fund->saveMstLoan で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}

	/** 返済(貸付)登録<br>
	 * 対象のデータを削除後、ワークテーブルのデータをコピーする。
	 * @param array $admin_info
	 * @param string  $fund_id
	 */
	function saveTrnLoanRepayment($admin_info, $fund_id) {
		
		try {
			
			// 削除条件指定
			$conditions[COLUMN_1300020] = $fund_id;

			// 削除実行
			$this->Controller->TrnLoanRepayment->deleteAll($conditions, false);

			// ワークコピー
			$this->Controller->TrnLoanRepayment->copyWrkLoanRepayment($admin_info[LOGIN_ADMIN_ID], $fund_id);

		} catch (Exception $ex) {
			$err = "Fund->saveTrnLoanRepayment で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * ファンドワーク更新<br>
	 * 画面入力データでファンドワークを更新する。<br>
	 * @param array $admin_info $data
	 */
	function saveWrkFund($admin_info, $data) {
		
		try {
			
			$conditions[COLUMN_1400000] = $admin_info[LOGIN_ADMIN_ID];

			// ワークデータ取得
			$status[MODEL_CONDITIONS] = $conditions;
			$wrk_data = $this->Controller->WrkFund->find(MODEL_ALL, $status);

			foreach ($wrk_data as $key => $values) {
				foreach ($values as $value) {

					if (isset($data[OBJECT_ID_050130010])) {
						$value[COLUMN_1400010] = $data[OBJECT_ID_050130010];  // ファンドID
					}
					if (isset($data[OBJECT_ID_050130020])) {
						$value[COLUMN_1400020] = $data[OBJECT_ID_050130020];  // ファンド名
					}
					if (isset($data[OBJECT_ID_050130030])) {
						$value[COLUMN_1400030] = $data[OBJECT_ID_050130030];  // 貸付予定額
					}
					if (isset($data[OBJECT_ID_050130040])) {
						$value[COLUMN_1400040] = $data[OBJECT_ID_050130040];  // 貸付額
					}
					if (isset($data[OBJECT_ID_050130050])) {
						$value[COLUMN_1400050] = $data[OBJECT_ID_050130050];  // 最低成立額
					}
					if (isset($data[OBJECT_ID_050130060])) {
						$value[COLUMN_1400060] = $data[OBJECT_ID_050130060];  // 最低投資額
					}
					if (isset($data[OBJECT_ID_050130090])) {
						$value[COLUMN_1400070] = $data[OBJECT_ID_050130070]." ".$data[OBJECT_ID_050130080]; // 掲載開始日時
					}
					if (isset($data[OBJECT_ID_050130090])) {
						$value[COLUMN_1400080] = $data[OBJECT_ID_050130090]." ".$data[OBJECT_ID_050130100]; // 募集開始日時
					}
					if (isset($data[OBJECT_ID_050130110])) {
						$value[COLUMN_1400090] = $data[OBJECT_ID_050130110]." ".$data[OBJECT_ID_050130120]; // 募集終了日時
					}
					if (isset($data[OBJECT_ID_050130130])) {
						$value[COLUMN_1400100] = date(DATETIME_FORMAT_1, strtotime($data[OBJECT_ID_050130130]));  // 運用開始日
					}
					if (isset($data[OBJECT_ID_050130140])) {
						$value[COLUMN_1400110] = date(DATETIME_FORMAT_2, strtotime($data[OBJECT_ID_050130140]));  // 運用終了日
					}
					if (isset($data[OBJECT_ID_050130150])) {
						$value[COLUMN_1400120] = $data[OBJECT_ID_050130150]; // 運用期間
					}
					if (isset($data[OBJECT_ID_050130160])) {
						$value[COLUMN_1400130] = $data[OBJECT_ID_050130160];  // 営業者利回り
					}
					if (isset($data[OBJECT_ID_050130170])) {
						$value[COLUMN_1400140] = $data[OBJECT_ID_050130170];  // 目標利回り
					}
					if (isset($data[OBJECT_ID_050130180])) {
						$value[COLUMN_1400150] = $data[OBJECT_ID_050130180];  // 概要
					}
					if (isset($data[OBJECT_ID_050130200])) {
						$value[COLUMN_1400170] = $data[OBJECT_ID_050130200];  // 遅延フラグ
					}
					if (isset($data[OBJECT_ID_050130201])) {
						$value[COLUMN_1400172] = $data[OBJECT_ID_050130201];  // 遅延確定日
					}
                                        if (isset($data[OBJECT_ID_050130202])) {
						$value[COLUMN_1400171] = $data[OBJECT_ID_050130202];  // 強制フラグ
                                        }
                                        if (isset($data[OBJECT_ID_050130203])) {
						$value[COLUMN_1400173] = $data[OBJECT_ID_050130203];  // 強制確定日
                                        }

if (isset($data[OBJECT_ID_050130210])) { $value[COLUMN_1400180] = $data[OBJECT_ID_050130210];}
if (isset($data[OBJECT_ID_050130220])) { $value[COLUMN_1400190] = $data[OBJECT_ID_050130220];}
if (isset($data[OBJECT_ID_050130230])) { $value[COLUMN_1400200] = $data[OBJECT_ID_050130230];}
if (isset($data[OBJECT_ID_050130240])) { $value[COLUMN_1400210] = $data[OBJECT_ID_050130240];}
if (isset($data[OBJECT_ID_050130250])) { $value[COLUMN_1400220] = $data[OBJECT_ID_050130250];}
if (isset($data[OBJECT_ID_050130260])) { $value[COLUMN_1400230] = $data[OBJECT_ID_050130260];}
if (isset($data[OBJECT_ID_050130270])) { $value[COLUMN_1400240] = $data[OBJECT_ID_050130270];}
if (isset($data[OBJECT_ID_050130280])) { $value[COLUMN_1400250] = $data[OBJECT_ID_050130280];}
if (isset($data[OBJECT_ID_050130290])) { $value[COLUMN_1400260] = $data[OBJECT_ID_050130290];}
if (isset($data[OBJECT_ID_050130300])) { $value[COLUMN_1400270] = $data[OBJECT_ID_050130300];}
if (isset($data[OBJECT_ID_050130310])) { $value[COLUMN_1400280] = $data[OBJECT_ID_050130310];}
if (isset($data[OBJECT_ID_050130320])) { $value[COLUMN_1400290] = $data[OBJECT_ID_050130320];}
if (isset($data[OBJECT_ID_050130330])) { $value[COLUMN_1400300] = $data[OBJECT_ID_050130330];}
if (isset($data[OBJECT_ID_050130340])) { $value[COLUMN_1400310] = $data[OBJECT_ID_050130340];}
if (isset($data[OBJECT_ID_050130350])) { $value[COLUMN_1400320] = $data[OBJECT_ID_050130350];}
if (isset($data[OBJECT_ID_050130360])) { $value[COLUMN_1400330] = $data[OBJECT_ID_050130360];}
if (isset($data[OBJECT_ID_050130370])) { $value[COLUMN_1400340] = $data[OBJECT_ID_050130370];}
if (isset($data[OBJECT_ID_050130380])) { $value[COLUMN_1400350] = $data[OBJECT_ID_050130380];}
if (isset($data[OBJECT_ID_050130390])) { $value[COLUMN_1400360] = $data[OBJECT_ID_050130390];}
if (isset($data[OBJECT_ID_050130400])) { $value[COLUMN_1400370] = $data[OBJECT_ID_050130400];}
if (isset($data[OBJECT_ID_050130410])) { $value[COLUMN_1400380] = $data[OBJECT_ID_050130410];}
if (isset($data[OBJECT_ID_050130420])) { $value[COLUMN_1400390] = $data[OBJECT_ID_050130420];}
if (isset($data[OBJECT_ID_050130430])) { $value[COLUMN_1400400] = $data[OBJECT_ID_050130430];}
if (isset($data[OBJECT_ID_050130440])) { $value[COLUMN_1400410] = $data[OBJECT_ID_050130440];}
if (isset($data[OBJECT_ID_050130450])) { $value[COLUMN_1400420] = $data[OBJECT_ID_050130450];}
if (isset($data[OBJECT_ID_050130460])) { $value[COLUMN_1400430] = $data[OBJECT_ID_050130460];}
if (isset($data[OBJECT_ID_050130470])) { $value[COLUMN_1400440] = $data[OBJECT_ID_050130470];}
if (isset($data[OBJECT_ID_050130480])) { $value[COLUMN_1400450] = $data[OBJECT_ID_050130480];}
if (isset($data[OBJECT_ID_050130490])) { $value[COLUMN_1400460] = $data[OBJECT_ID_050130490];}
if (isset($data[OBJECT_ID_050130500])) { $value[COLUMN_1400470] = $data[OBJECT_ID_050130500];}
if (isset($data[OBJECT_ID_050130510])) { $value[COLUMN_1400480] = $data[OBJECT_ID_050130510];}
if (isset($data[OBJECT_ID_050130520])) { $value[COLUMN_1400490] = $data[OBJECT_ID_050130520];}
if (isset($data[OBJECT_ID_050130530])) { $value[COLUMN_1400500] = $data[OBJECT_ID_050130530];}
if (isset($data[OBJECT_ID_050130540])) { $value[COLUMN_1400510] = $data[OBJECT_ID_050130540];}
if (isset($data[OBJECT_ID_050130550])) { $value[COLUMN_1400520] = $data[OBJECT_ID_050130550];}
if (isset($data[OBJECT_ID_050130560])) { $value[COLUMN_1400530] = $data[OBJECT_ID_050130560];}
if (isset($data[OBJECT_ID_050130570])) { $value[COLUMN_1400540] = $data[OBJECT_ID_050130570];}
if (isset($data[OBJECT_ID_050130580])) { $value[COLUMN_1400550] = $data[OBJECT_ID_050130580];}
if (isset($data[OBJECT_ID_050130590])) { $value[COLUMN_1400560] = $data[OBJECT_ID_050130590];}
if (isset($data[OBJECT_ID_050130600])) { $value[COLUMN_1400570] = $data[OBJECT_ID_050130600];}
if (isset($data[OBJECT_ID_050130610])) { $value[COLUMN_1400580] = $data[OBJECT_ID_050130610];}
if (isset($data[OBJECT_ID_050130620])) { $value[COLUMN_1400590] = $data[OBJECT_ID_050130620];}
if (isset($data[OBJECT_ID_050130630])) { $value[COLUMN_1400600] = $data[OBJECT_ID_050130630];}
if (isset($data[OBJECT_ID_050130640])) { $value[COLUMN_1400610] = $data[OBJECT_ID_050130640];}
if (isset($data[OBJECT_ID_050130650])) { $value[COLUMN_1400620] = $data[OBJECT_ID_050130650];}
if (isset($data[OBJECT_ID_050130660])) { $value[COLUMN_1400630] = $data[OBJECT_ID_050130660];}
if (isset($data[OBJECT_ID_050130670])) { $value[COLUMN_1400640] = $data[OBJECT_ID_050130670];}
if (isset($data[OBJECT_ID_050130680])) { $value[COLUMN_1400650] = $data[OBJECT_ID_050130680];}
if (isset($data[OBJECT_ID_050130690])) { $value[COLUMN_1400660] = $data[OBJECT_ID_050130690];}
if (isset($data[OBJECT_ID_050130700])) { $value[COLUMN_1400670] = $data[OBJECT_ID_050130700];}
if (isset($data[OBJECT_ID_050130710])) { $value[COLUMN_1400680] = $data[OBJECT_ID_050130710];}
if (isset($data[OBJECT_ID_050130720])) { $value[COLUMN_1400690] = $data[OBJECT_ID_050130720];}
if (isset($data[OBJECT_ID_050130730])) { $value[COLUMN_1400700] = $data[OBJECT_ID_050130730];}
if (isset($data[OBJECT_ID_050130740])) { $value[COLUMN_1400710] = $data[OBJECT_ID_050130740];}
if (isset($data[OBJECT_ID_050130750])) { $value[COLUMN_1400720] = $data[OBJECT_ID_050130750];}
if (isset($data[OBJECT_ID_050130760])) { $value[COLUMN_1400730] = $data[OBJECT_ID_050130760];}
if (isset($data[OBJECT_ID_050130770])) { $value[COLUMN_1400740] = $data[OBJECT_ID_050130770];}
if (isset($data[OBJECT_ID_050130780])) { $value[COLUMN_1400750] = $data[OBJECT_ID_050130780];}
if (isset($data[OBJECT_ID_050130790])) { $value[COLUMN_1400760] = $data[OBJECT_ID_050130790];}
if (isset($data[OBJECT_ID_050130800])) { $value[COLUMN_1400770] = $data[OBJECT_ID_050130800];}
if (isset($data[OBJECT_ID_050130810])) { $value[COLUMN_1400780] = $data[OBJECT_ID_050130810];}
if (isset($data[OBJECT_ID_050130820])) { $value[COLUMN_1400790] = $data[OBJECT_ID_050130820];}
if (isset($data[OBJECT_ID_050130830])) { $value[COLUMN_1400800] = $data[OBJECT_ID_050130830];}
if (isset($data[OBJECT_ID_050130840])) { $value[COLUMN_1400810] = $data[OBJECT_ID_050130840];}
if (isset($data[OBJECT_ID_050130850])) { $value[COLUMN_1400820] = $data[OBJECT_ID_050130850];}
if (isset($data[OBJECT_ID_050130860])) { $value[COLUMN_1400830] = $data[OBJECT_ID_050130860];}
if (isset($data[OBJECT_ID_050130870])) { $value[COLUMN_1400840] = $data[OBJECT_ID_050130870];}
if (isset($data[OBJECT_ID_050130880])) { $value[COLUMN_1400850] = $data[OBJECT_ID_050130880];}
if (isset($data[OBJECT_ID_050130890])) { $value[COLUMN_1400860] = $data[OBJECT_ID_050130890];}
if (isset($data[OBJECT_ID_050130900])) { $value[COLUMN_1400870] = $data[OBJECT_ID_050130900];}
if (isset($data[OBJECT_ID_050130910])) { $value[COLUMN_1400880] = $data[OBJECT_ID_050130910];}
if (isset($data[OBJECT_ID_050130920])) { $value[COLUMN_1400890] = $data[OBJECT_ID_050130920];}
if (isset($data[OBJECT_ID_050130930])) { $value[COLUMN_1400900] = $data[OBJECT_ID_050130930];}
if (isset($data[OBJECT_ID_050130940])) { $value[COLUMN_1400910] = $data[OBJECT_ID_050130940];}
if (isset($data[OBJECT_ID_050130950])) { $value[COLUMN_1400920] = $data[OBJECT_ID_050130950];}
if (isset($data[OBJECT_ID_050130960])) { $value[COLUMN_1400930] = $data[OBJECT_ID_050130960];}
if (isset($data[OBJECT_ID_050130970])) { $value[COLUMN_1400940] = $data[OBJECT_ID_050130970];}
if (isset($data[OBJECT_ID_050130980])) { $value[COLUMN_1400950] = $data[OBJECT_ID_050130980];}
if (isset($data[OBJECT_ID_050130990])) { $value[COLUMN_1400960] = $data[OBJECT_ID_050130990];}
if (isset($data[OBJECT_ID_050131000])) { $value[COLUMN_1400970] = $data[OBJECT_ID_050131000];}
if (isset($data[OBJECT_ID_050131010])) { $value[COLUMN_1400980] = $data[OBJECT_ID_050131010];}
if (isset($data[OBJECT_ID_050131020])) { $value[COLUMN_1400990] = $data[OBJECT_ID_050131020];}
if (isset($data[OBJECT_ID_050131030])) { $value[COLUMN_1401000] = $data[OBJECT_ID_050131030];}
if (isset($data[OBJECT_ID_050131040])) { $value[COLUMN_1401010] = $data[OBJECT_ID_050131040];}
if (isset($data[OBJECT_ID_050131050])) { $value[COLUMN_1401020] = $data[OBJECT_ID_050131050];}
if (isset($data[OBJECT_ID_050131060])) { $value[COLUMN_1401030] = $data[OBJECT_ID_050131060];}
if (isset($data[OBJECT_ID_050131070])) { $value[COLUMN_1401040] = $data[OBJECT_ID_050131070];}
if (isset($data[OBJECT_ID_050131080])) { $value[COLUMN_1401050] = $data[OBJECT_ID_050131080];}
if (isset($data[OBJECT_ID_050131090])) { $value[COLUMN_1401060] = $data[OBJECT_ID_050131090];}
if (isset($data[OBJECT_ID_050131100])) { $value[COLUMN_1401070] = $data[OBJECT_ID_050131100];}
if (isset($data[OBJECT_ID_050131110])) { $value[COLUMN_1401080] = $data[OBJECT_ID_050131110];}
if (isset($data[OBJECT_ID_050131120])) { $value[COLUMN_1401090] = $data[OBJECT_ID_050131120];}
if (isset($data[OBJECT_ID_050131130])) { $value[COLUMN_1401100] = $data[OBJECT_ID_050131130];}
if (isset($data[OBJECT_ID_050131140])) { $value[COLUMN_1401110] = $data[OBJECT_ID_050131140];}
if (isset($data[OBJECT_ID_050131150])) { $value[COLUMN_1401120] = $data[OBJECT_ID_050131150];}
if (isset($data[OBJECT_ID_050131160])) { $value[COLUMN_1401130] = $data[OBJECT_ID_050131160];}
if (isset($data[OBJECT_ID_050131170])) { $value[COLUMN_1401140] = $data[OBJECT_ID_050131170];}
if (isset($data[OBJECT_ID_050131180])) { $value[COLUMN_1401150] = $data[OBJECT_ID_050131180];}
if (isset($data[OBJECT_ID_050131190])) { $value[COLUMN_1401160] = $data[OBJECT_ID_050131190];}
if (isset($data[OBJECT_ID_050131200])) { $value[COLUMN_1401170] = $data[OBJECT_ID_050131200];}
if (isset($data[OBJECT_ID_050131210])) { $value[COLUMN_1401180] = $data[OBJECT_ID_050131210];}
if (isset($data[OBJECT_ID_050131220])) { $value[COLUMN_1401190] = $data[OBJECT_ID_050131220];}
if (isset($data[OBJECT_ID_050131230])) { $value[COLUMN_1401200] = $data[OBJECT_ID_050131230];}
if (isset($data[OBJECT_ID_050131240])) { $value[COLUMN_1401210] = $data[OBJECT_ID_050131240];}
if (isset($data[OBJECT_ID_050131250])) { $value[COLUMN_1401220] = $data[OBJECT_ID_050131250];}
if (isset($data[OBJECT_ID_050131260])) { $value[COLUMN_1401230] = $data[OBJECT_ID_050131260];}
if (isset($data[OBJECT_ID_050131270])) { $value[COLUMN_1401240] = $data[OBJECT_ID_050131270];}
if (isset($data[OBJECT_ID_050131280])) { $value[COLUMN_1401250] = $data[OBJECT_ID_050131280];}
if (isset($data[OBJECT_ID_050131290])) { $value[COLUMN_1401260] = $data[OBJECT_ID_050131290];}
if (isset($data[OBJECT_ID_050131300])) { $value[COLUMN_1401270] = $data[OBJECT_ID_050131300];}
if (isset($data[OBJECT_ID_050131310])) { $value[COLUMN_1401280] = $data[OBJECT_ID_050131310];}
if (isset($data[OBJECT_ID_050131320])) { $value[COLUMN_1401290] = $data[OBJECT_ID_050131320];}
if (isset($data[OBJECT_ID_050131330])) { $value[COLUMN_1401300] = $data[OBJECT_ID_050131330];}
if (isset($data[OBJECT_ID_050131340])) { $value[COLUMN_1401310] = $data[OBJECT_ID_050131340];}
if (isset($data[OBJECT_ID_050131350])) { $value[COLUMN_1401320] = $data[OBJECT_ID_050131350];}
if (isset($data[OBJECT_ID_050131360])) { $value[COLUMN_1401330] = $data[OBJECT_ID_050131360];}
if (isset($data[OBJECT_ID_050131370])) { $value[COLUMN_1401340] = $data[OBJECT_ID_050131370];}
if (isset($data[OBJECT_ID_050131380])) { $value[COLUMN_1401350] = $data[OBJECT_ID_050131380];}
if (isset($data[OBJECT_ID_050131390])) { $value[COLUMN_1401360] = $data[OBJECT_ID_050131390];}
if (isset($data[OBJECT_ID_050131400])) { $value[COLUMN_1401370] = $data[OBJECT_ID_050131400];}
if (isset($data[OBJECT_ID_050131410])) { $value[COLUMN_1401380] = $data[OBJECT_ID_050131410];}
if (isset($data[OBJECT_ID_050131420])) { $value[COLUMN_1401390] = $data[OBJECT_ID_050131420];}
if (isset($data[OBJECT_ID_050131430])) { $value[COLUMN_1401400] = $data[OBJECT_ID_050131430];}
if (isset($data[OBJECT_ID_050131440])) { $value[COLUMN_1401410] = $data[OBJECT_ID_050131440];}
if (isset($data[OBJECT_ID_050131450])) { $value[COLUMN_1401420] = $data[OBJECT_ID_050131450];}
if (isset($data[OBJECT_ID_050131460])) { $value[COLUMN_1401430] = $data[OBJECT_ID_050131460];}
if (isset($data[OBJECT_ID_050131470])) { $value[COLUMN_1401440] = $data[OBJECT_ID_050131470];}
if (isset($data[OBJECT_ID_050131480])) { $value[COLUMN_1401450] = $data[OBJECT_ID_050131480];}
if (isset($data[OBJECT_ID_050131490])) { $value[COLUMN_1401460] = $data[OBJECT_ID_050131490];}
if (isset($data[OBJECT_ID_050131500])) { $value[COLUMN_1401470] = $data[OBJECT_ID_050131500];}
if (isset($data[OBJECT_ID_050131510])) { $value[COLUMN_1401480] = $data[OBJECT_ID_050131510];}
if (isset($data[OBJECT_ID_050131520])) { $value[COLUMN_1401490] = $data[OBJECT_ID_050131520];}
if (isset($data[OBJECT_ID_050131530])) { $value[COLUMN_1401500] = $data[OBJECT_ID_050131530];}
if (isset($data[OBJECT_ID_050131540])) { $value[COLUMN_1401510] = $data[OBJECT_ID_050131540];}
if (isset($data[OBJECT_ID_050131550])) { $value[COLUMN_1401520] = $data[OBJECT_ID_050131550];}
if (isset($data[OBJECT_ID_050131560])) { $value[COLUMN_1401530] = $data[OBJECT_ID_050131560];}
if (isset($data[OBJECT_ID_050131570])) { $value[COLUMN_1401540] = $data[OBJECT_ID_050131570];}
if (isset($data[OBJECT_ID_050131580])) { $value[COLUMN_1401550] = $data[OBJECT_ID_050131580];}
if (isset($data[OBJECT_ID_050131590])) { $value[COLUMN_1401560] = $data[OBJECT_ID_050131590];}
if (isset($data[OBJECT_ID_050131600])) { $value[COLUMN_1401570] = $data[OBJECT_ID_050131600];}
if (isset($data[OBJECT_ID_050131610])) { $value[COLUMN_1401580] = $data[OBJECT_ID_050131610];}
if (isset($data[OBJECT_ID_050131620])) { $value[COLUMN_1401590] = $data[OBJECT_ID_050131620];}
if (isset($data[OBJECT_ID_050131630])) { $value[COLUMN_1401600] = $data[OBJECT_ID_050131630];}
if (isset($data[OBJECT_ID_050131640])) { $value[COLUMN_1401610] = $data[OBJECT_ID_050131640];}
if (isset($data[OBJECT_ID_050131650])) { $value[COLUMN_1401620] = $data[OBJECT_ID_050131650];}
if (isset($data[OBJECT_ID_050131660])) { $value[COLUMN_1401630] = $data[OBJECT_ID_050131660];}
if (isset($data[OBJECT_ID_050131670])) { $value[COLUMN_1401640] = $data[OBJECT_ID_050131670];}
if (isset($data[OBJECT_ID_050131680])) { $value[COLUMN_1401650] = $data[OBJECT_ID_050131680];}
if (isset($data[OBJECT_ID_050131690])) { $value[COLUMN_1401660] = $data[OBJECT_ID_050131690];}
if (isset($data[OBJECT_ID_050131700])) { $value[COLUMN_1401670] = $data[OBJECT_ID_050131700];}
if (isset($data[OBJECT_ID_050131710])) { $value[COLUMN_1401680] = $data[OBJECT_ID_050131710];}
if (isset($data[OBJECT_ID_050131720])) { $value[COLUMN_1401690] = $data[OBJECT_ID_050131720];}
if (isset($data[OBJECT_ID_050131730])) { $value[COLUMN_1401700] = $data[OBJECT_ID_050131730];}
if (isset($data[OBJECT_ID_050131740])) { $value[COLUMN_1401710] = $data[OBJECT_ID_050131740];}
if (isset($data[OBJECT_ID_050131750])) { $value[COLUMN_1401720] = $data[OBJECT_ID_050131750];}
if (isset($data[OBJECT_ID_050131760])) { $value[COLUMN_1401730] = $data[OBJECT_ID_050131760];}
if (isset($data[OBJECT_ID_050131770])) { $value[COLUMN_1401740] = $data[OBJECT_ID_050131770];}
if (isset($data[OBJECT_ID_050131780])) { $value[COLUMN_1401750] = $data[OBJECT_ID_050131780];}
if (isset($data[OBJECT_ID_050131790])) { $value[COLUMN_1401760] = $data[OBJECT_ID_050131790];}
if (isset($data[OBJECT_ID_050131800])) { $value[COLUMN_1401770] = $data[OBJECT_ID_050131800];}
if (isset($data[OBJECT_ID_050131810])) { $value[COLUMN_1401780] = $data[OBJECT_ID_050131810];}
if (isset($data[OBJECT_ID_050131820])) { $value[COLUMN_1401790] = $data[OBJECT_ID_050131820];}

					// ワーク作成実行
					$this->Controller->WrkFund->save($value);
				}
			}
		} catch (Exception $ex) {
			$err = "Fund->saveWrkFund で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * ファンドワーク登録日時更新
	 * @param type $admin_info
	 * @param number $proc_type
	 */
	function saveWrkFundDatetime($admin_info, $proc_type) {
		
		try {
			
			// 管理者IDセット
			$conditions[COLUMN_1400000] = $admin_info[LOGIN_ADMIN_ID];

			// 処理区分取得
			//$proc_type = $this->Common->getSessionProcTypeFund();

			// ワークデータ取得
			$status[MODEL_CONDITIONS] = $conditions;
			$wrk_data = $this->Controller->WrkFund->find(MODEL_ALL, $status);

			foreach ($wrk_data as $key => $values) {
				foreach ($values as $value) {

					// 新規登録
					if (strcmp(PROC_TYPE_INSERT, $proc_type) == 0) {
						$value[COLUMN_0000010] = date(DATETIME_FORMAT);         // 登録日時
						$value[COLUMN_0000020] = $admin_info[LOGIN_ADMIN_ID];   // 登録管理者ID
						$value[COLUMN_0000030] = $admin_info[LOGIN_ADMIN_NAME]; // 登録管理者名
					}
					// 更新
					elseif (strcmp(PROC_TYPE_UPDATE, $proc_type) == 0) {
						$value[COLUMN_0000040] = date(DATETIME_FORMAT);         // 更新日時
						$value[COLUMN_0000050] = $admin_info[LOGIN_ADMIN_ID];   // 更新管理者ID
						$value[COLUMN_0000060] = $admin_info[LOGIN_ADMIN_NAME]; // 更新管理者名
					}
					// 削除
					elseif (strcmp(PROC_TYPE_DELETE, $proc_type) == 0) {
						$value[COLUMN_0000070] = date(DATETIME_FORMAT);         // 削除日時
						$value[COLUMN_0000080] = $admin_info[LOGIN_ADMIN_ID];   // 削除管理者ID
						$value[COLUMN_0000090] = $admin_info[LOGIN_ADMIN_NAME]; // 削除管理者名
					}
					$value[COLUMN_0000100] = $value[COLUMN_0000100] + 1;    // 排他キー

					// ワーク作成実行
					$this->Controller->WrkFund->save($value);
				}
			}
		} catch (Exception $ex) {
			$err = "Fund->saveWrkFundDatetime で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 貸付ワーク
	 * @param array  $admin_info
	 * @param number $loan_no
	 * @param array  $data
	 */
	function saveWrkLoan($admin_info, $loan_no, $data) {
		
		try {
			
			$admin_id = $admin_info[LOGIN_ADMIN_ID];

			// id
			$conditions[COLUMN_1600000] = $admin_id;
			$conditions[COLUMN_1600030] = $loan_no;

			// 更新前ローンワーク取得
			$status[MODEL_CONDITIONS] = $conditions;
			$wrk_data = $this->Controller->WrkLoan->find(MODEL_ALL, $status);

			foreach ($wrk_data as $key => $values) {
				foreach ($values as $value) {

					$value[COLUMN_1600020] = $data[OBJECT_ID_050170010]; // ファンドID
					$value[COLUMN_1600030] = $data[OBJECT_ID_050170030]; // 貸付番号
					$value[COLUMN_1600040] = $data[OBJECT_ID_050170040]; // 貸主
					$value[COLUMN_1600050] = $data[OBJECT_ID_050170050]; // 貸付日
					$value[COLUMN_1600060] = $data[OBJECT_ID_050170060]; // 貸付予定額
					$value[COLUMN_1600070] = $data[OBJECT_ID_050170070]; // 貸付額
					$value[COLUMN_1600080] = $data[OBJECT_ID_050170080]; // 最低成立額
					$value[COLUMN_1600090] = $data[OBJECT_ID_050170090]; // 実質年率
					$value[COLUMN_1600100] = $data[OBJECT_ID_050170100]; // 返済回数
					$value[COLUMN_1600110] = $data[OBJECT_ID_050170110]; // 返済開始年
					$value[COLUMN_1600120] = $data[OBJECT_ID_050170120]; // 返済開始月
					$value[COLUMN_1600130] = $data[OBJECT_ID_050170130]; // 約定日
					$day                   = $this->Calendar->ajustDateValid($data[OBJECT_ID_050170110], $data[OBJECT_ID_050170120], $data[OBJECT_ID_050170130]);
					$start_date            = $this->Calendar->ajustDateBusiness($data[OBJECT_ID_050170110], $data[OBJECT_ID_050170120], $day);
					$value[COLUMN_1600140] = date(DATE_FORMAT, strtotime($start_date["year"] ."/". $start_date["month"] ."/". $start_date["day"]));
					$value[COLUMN_1600150] = $data[OBJECT_ID_050170140]; // 保証
					$value[COLUMN_1600160] = $data[OBJECT_ID_050170150]; // 担保
					$value[COLUMN_1600170] = $data[OBJECT_ID_050170160]; // 返済方法

					// ワーク作成実行
					$this->Controller->WrkLoan->create();
					$this->Controller->WrkLoan->save($value);
				}
			}


			// 集計金額取得
			$total_amount = $this->getTotalLoanAmount($admin_id);

			// 運用開始日取得
			$operating_start_date = $this->getOperatingStartDate($admin_id);

			// 運用終了日取得
			$operating_end_date = $this->getOperatingEndDate($admin_id);

			// ファンドワークの貸付額等を更新
			$reg_data[COLUMN_1400000] = $admin_id;
			$reg_data[COLUMN_1400030] = $total_amount[COLUMN_1600060];
			$reg_data[COLUMN_1400040] = $total_amount[COLUMN_1600070];
			$reg_data[COLUMN_1400050] = $total_amount[COLUMN_1600080];
			$reg_data[COLUMN_1400100] = $operating_start_date;
			$reg_data[COLUMN_1400110] = $operating_end_date;
			//$reg_data[COLUMN_1400120] = $operating_term;

			// ワーク作成実行
			$this->Controller->WrkFund->save($reg_data);
			
		} catch (Exception $ex) {
			$err = "Fund->saveWrkLoan で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}

	/**
	 * ローンワーク日時更新
	 * @param array  $admin_info
	 * @param number $loan_no $proc_type
	 */
	function saveWrkLoanDatetime($admin_info, $loan_no, $proc_type) {
		
		try {
			
			$conditions[COLUMN_1600000] = $admin_info[LOGIN_ADMIN_ID];
			$conditions[COLUMN_1600030] = $loan_no;

			// ワークデータ取得
			$status[MODEL_CONDITIONS] = $conditions;
			$wrk_data = $this->Controller->WrkLoan->find(MODEL_ALL, $status);

			foreach ($wrk_data as $key => $values) {
				foreach ($values as $value) {

					// 新規登録
					if (strcmp(PROC_TYPE_INSERT, $proc_type) == 0) {
						$value[COLUMN_0000010] = date(DATETIME_FORMAT);         // 登録日時
						$value[COLUMN_0000020] = $admin_info[LOGIN_ADMIN_ID];   // 登録管理者ID
						$value[COLUMN_0000030] = $admin_info[LOGIN_ADMIN_NAME]; // 登録管理者名
					}
					// 更新
					elseif (strcmp(PROC_TYPE_UPDATE, $proc_type) == 0) {
						$value[COLUMN_0000040] = date(DATETIME_FORMAT);         // 更新日時
						$value[COLUMN_0000050] = $admin_info[LOGIN_ADMIN_ID];   // 更新管理者ID
						$value[COLUMN_0000060] = $admin_info[LOGIN_ADMIN_NAME]; // 更新管理者名
					}
					// 削除
					elseif (strcmp(PROC_TYPE_DELETE, $proc_type) == 0) {
						$value[COLUMN_0000070] = date(DATETIME_FORMAT);         // 削除日時
						$value[COLUMN_0000080] = $admin_info[LOGIN_ADMIN_ID];   // 削除管理者ID
						$value[COLUMN_0000090] = $admin_info[LOGIN_ADMIN_NAME]; // 削除管理者名
					}
					$value[COLUMN_0000100] = $value[COLUMN_0000100] + 1;    // 排他キー

					// ワーク作成実行
					$this->Controller->WrkLoan->create();
					$this->Controller->WrkLoan->save($value);
				}
			}
		} catch (Exception $ex) {
			$err = "Fund->saveWrkLoanDatetime で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * 返済(貸付)ワーク
	 * @param array  $admin_info
	 * @param number $loan_no
	 * @param array  $data_list
	 */
	function saveWrkLoanRpayment($admin_info, $loan_no, $data_list) {
		
		try {
			
			$admin_id = $admin_info[LOGIN_ADMIN_ID];

			// id
			$conditions[COLUMN_1700000] = $admin_id;
			$conditions[COLUMN_1700030] = $loan_no;

			// ワーク削除実行
			$this->Controller->WrkLoanRepayment->deleteAll($conditions, false);

			foreach ($data_list as $key => $values) {
				foreach ($values as $value) {

					// ワーク作成実行
					$this->Controller->WrkLoanRepayment->create();
					$this->Controller->WrkLoanRepayment->save($value);
				}
			}
		} catch (Exception $ex) {
			$err = "Fund->saveWrkLoanRpayment で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * 返済(ファンド)ワーク
	 * @param array  $admin_info
	 */
	function saveWrkFundRpayment($admin_info) {
		
		try {
			
			$admin_id = $admin_info[LOGIN_ADMIN_ID];

			// id
			$conditions[COLUMN_1500000] = $admin_id;

			// 返済(ファンド)ワーク削除実行
			$this->Controller->WrkFundRepayment->deleteAll($conditions, false);

			// 返済(ファンド)ワーク更新
			$this->Controller->WrkFundRepayment->totalLoanRepayment($admin_id);
			
		} catch (Exception $ex) {
			$err = "Fund->saveWrkFundRpayment で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * 投資額合計取得<br>
	 * ファンド毎の投資額合計を取得
	 * @param string $fund_id
	 * @return number $total_amount
	 */
	function getTotalInvestmentAmount($fund_id) {
		
		try {
			
			// 検索条件
			// where 1
			//     and fund_id = 999999
			//     and (investment_status_code = '0'
			//             or investment_status_code = '1'
			//     )
			$conditions = array(
				 COLUMN_1200040 => $fund_id
			);
			$conditions[MODEL_OR][0][COLUMN_1200090] = INVESTMENT_STATUS_CODE_APPLIED;
			$conditions[MODEL_OR][1][COLUMN_1200090] = INVESTMENT_STATUS_CODE_APPROVED;

			// group by
			$status[MODEL_GROUP] = array(
				COLUMN_1200040
			);

			// 集計項目
			$status[MODEL_FIELDS] = array(
				 COLUMN_1200040       ."  as ".COLUMN_1200040 // 管理者ID
				,"sum(".COLUMN_1200070.") as ".COLUMN_1200070 // 投資金額
			);

			$status[MODEL_CONDITIONS] = $conditions;
			$history = $this->Controller->TrnInvestmentHistory->find(MODEL_ALL, $status);

			$total_amount = 0;
			foreach ($history as $keys => $values) {
				foreach ($values as $key => $value) {
					if (strcmp(0, $key) == 0) {
						$total_amount = $value[COLUMN_1200070];
					}
				}
			}

			return $total_amount;
			
		} catch (Exception $ex) {
			$err = "Fund->getTotalInvestmentAmount で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 返済(貸付)ワーク作成<br>
	 * @param string $admin_id
	 * @param array $loan_data
	 * @return array $repayment_data
	 */
	function makeLoanRepayment($admin_id, $loan_data) {
		
		try {
			
			$repayment_data = null;

			$fund_id               = $loan_data[OBJECT_ID_050170010]; // ファンドID
			$loan_no               = $loan_data[OBJECT_ID_050170030]; // 貸付番号
			$loan_date             = $loan_data[OBJECT_ID_050170050]; // 貸付日
			$max_loan_amount       = $loan_data[OBJECT_ID_050170060]; // 貸付予定額
			$loan_amount           = $loan_data[OBJECT_ID_050170070]; // 貸付額
			$interest_rate         = $loan_data[OBJECT_ID_050170090]; // 実質年率
			$number_of_repayments  = $loan_data[OBJECT_ID_050170100]; // 返済回数
			$repayment_start_year  = $loan_data[OBJECT_ID_050170110]; // 返済開始年
			$repayment_start_month = $loan_data[OBJECT_ID_050170120]; // 返済開始月
			$trade_date            = $loan_data[OBJECT_ID_050170130]; // 約定日
			$repayment_method_code = $loan_data[OBJECT_ID_050170160]; // 返済方法

			// 貸付額が無い場合、貸付予定額で計算
			if (empty($loan_amount)) {
				$loan_amount = $max_loan_amount;
			}

			// 返済方法毎に分岐
			switch ($repayment_method_code) {
				case REPAYMENT_METHOD_CODE_P_LUMP: // 元金一括
					
					// ファンドワーク取得
					$fund_data = $this->getWrkFund($admin_id);

					$yield_rate = 0;
					foreach ($fund_data as $keys => $values) {
						foreach ($values as $key => $value) {
							$yield_rate = $value[COLUMN_1400130]; // 営業者利回り
						}
					}
					$yield_rate = $yield_rate * 0.01;

					// 貸付日を初回の起算日とする。
					$start_date = date(DATE_FORMAT, strtotime($loan_date));

					// 約定日調整：不正な日付(2015/02/31等)にならないよう約定日をチェック＆調整
					$repay_day = $this->Calendar->ajustDateValid($repayment_start_year, $repayment_start_month, $trade_date);

					// 初回返済予定日を取得。返済予定日が休日の場合、前営業日になるよう調整する
					$date = $this->Calendar->ajustDateBusiness($repayment_start_year, $repayment_start_month, $repay_day);
					
					$interest_rate = $interest_rate * 0.01; // 利率
					
					$repay_principal = 0;            // 返済元金
					$remaining       = $loan_amount; // 予定残元金
					
					// 返済回数分繰り返し
					for ($count = 0; $count < $number_of_repayments; $count++) {
						
						// 起算日を年、月、日に分解
						$start_year  = date("Y", strtotime($start_date));
						$start_month = date("m", strtotime($start_date));
						$start_day   = date("d", strtotime($start_date));
						
						// 返済予定日を年、月、日に分解
						$repay_year  = $date["year"];
						$repay_month = $date["month"];
						$repay_day   = $date["day"];
						
						$interest    = 0; // 利息額
						
						
						// 起算日と返済予定日の年を比較
						if (strcmp($start_year, $repay_year) == 0) {
							
							// 同一年内

							// 日数：起算日～返済予定日(例：1/25～2/25の場合、開始日を含まないので日数=31)
							$term_day = $this->Common->getDifferenceDays($repay_year, $repay_month, $repay_day, $start_year, $start_month, $start_day, false);
							
							// 閏年チェック
							if (checkdate(2, 29, $start_year)) {

								// 利息計算：閏年
								$interest = floor((string)($loan_amount * $interest_rate / 366 * $term_day));
							}
							else {

								// 利息計算：平年
								$interest = floor((string)($loan_amount * $interest_rate / 365 * $term_day));
							}
						}
						else {
							
							// 年またぎ
							$interest_u = 0;
							$interest_h = 0;

							// 日数取得：起算日～起算日年末日(例：12/25～12/31の場合、開始日を含まないので日数=6)
							$term_day = $this->Common->getDifferenceDays($start_year, 12, 31, $start_year, $start_month, $start_day, false);

							// 閏年チェック
							if (checkdate(2, 29, $start_year)) {

								// 利息計算：閏年
								$interest_u += floor((string)($loan_amount * $interest_rate / 366 * $term_day));
							}
							else {

								// 利息計算：平年
								$interest_h += floor((string)($loan_amount * $interest_rate / 365 * $term_day));
							}

							// 日数取得：返済予定年始日～返済予定日(例：1/1～1/25の場合、開始日を含むので日数=25)
							$term_day = $this->Common->getDifferenceDays($repay_year, $repay_month, $repay_day, $repay_year, 1, 1, true);

							// 閏年チェック
							if (checkdate(2, 29, $repay_year)) {

								// 利息計算：閏年
								$interest_u += floor((string)($loan_amount * $interest_rate / 366 * $term_day));
							}
							else {

								// 利息計算：平年
								$interest_h += floor((string)($loan_amount * $interest_rate / 365 * $term_day));
							}

							// 閏年の利息と平年の利息を合算
							$interest = $interest_u + $interest_h;
							
						}
						
						// 予定配当額、予定報酬額算出
						$dividend_data = $this->calcDividendAmount($interest, 0, $interest_rate, $yield_rate);
						
						if ($count == $number_of_repayments - 1) {
							$repay_principal  = $loan_amount; // 貸付金額
							$remaining       -= $loan_amount; // 予定残元金
						}
						
						// 返済(貸付)ワーク作成
						$repayment_data[$count][MODEL_NAME_170][COLUMN_1700000] = $admin_id;                      // 管理者ID
						$repayment_data[$count][MODEL_NAME_170][COLUMN_1700020] = $fund_id;                       // ファンドID
						$repayment_data[$count][MODEL_NAME_170][COLUMN_1700030] = $loan_no;                       // 貸付番号
						$repayment_data[$count][MODEL_NAME_170][COLUMN_1700040] = $count + 1;                     // seq_no
						$repayment_data[$count][MODEL_NAME_170][COLUMN_1700050] = date(DATE_FORMAT, strtotime($repay_year ."/". $repay_month ."/". $repay_day)); // 返済予定日
						$repayment_data[$count][MODEL_NAME_170][COLUMN_1700060] = $repay_principal + $interest;   // 返済予定額
						$repayment_data[$count][MODEL_NAME_170][COLUMN_1700070] = $repay_principal;               // 予定元金
						$repayment_data[$count][MODEL_NAME_170][COLUMN_1700080] = $interest;                      // 予定利息
						$repayment_data[$count][MODEL_NAME_170][COLUMN_1700090] = $remaining;                     // 予定残元金
						$repayment_data[$count][MODEL_NAME_170][COLUMN_1700100] = $dividend_data[COLUMN_1700100]; // 予定配当額
						$repayment_data[$count][MODEL_NAME_170][COLUMN_1700110] = $dividend_data[COLUMN_1700110]; // 予定報酬額
						
						$start_date = date(DATE_FORMAT, strtotime($repay_year ."/". $repay_month ."/". $repay_day)); // 次回起算日
						
						// 次回返済予定日
						if (12 == $repay_month) {
							$repay_year++;
							$repay_month = 1;
						}
						else {
							$repay_month++;
						}
						
						// 約定日調整：不正な日付(2015/02/31等)にならないよう約定日をチェック＆調整
						$repay_day = $this->Calendar->ajustDateValid($repay_year, $repay_month, $trade_date);

						// 返済日が休日の場合、前営業日になるよう調整
						$date = $this->Calendar->ajustDateBusiness($repay_year, $repay_month, $repay_day);
						
						// 配当予定日
						$company = $this->Company->getCompany();
						$dividend_day = $company[COLUMN_0300110];
						$dividend_day = $this->Calendar->ajustDateValid($repay_year, $repay_month, $dividend_day);
						$dividend_date = $this->Calendar->ajustDateBusiness($repay_year, $repay_month, $dividend_day, false);
						$repayment_data[$count][MODEL_NAME_170][COLUMN_1700095] = date(DATE_FORMAT, strtotime($dividend_date['year'] ."/". $dividend_date['month'] ."/". $dividend_date['day'])); // 返済予定日
					}

					break;

				case REPAYMENT_METHOD_CODE_P_I_LUMP: // 元利一括

					// ファンドワーク取得
					$fund_data = $this->getWrkFund($admin_id);

					$yield_rate = 0;
					foreach ($fund_data as $keys => $values) {
						foreach ($values as $key => $value) {
							$yield_rate = $value[COLUMN_1400130]; // 営業者利回り
						}
					}
					$yield_rate = $yield_rate * 0.01;

					// 約定日調整：不正な日付(2015/02/31等)にならないよう約定日をチェック＆調整
					$repay_day = $this->Calendar->ajustDateValid($repayment_start_year, $repayment_start_month, $trade_date);

					// 返済日が休日の場合、前営業日になるよう調整
					$date = $this->Calendar->ajustDateBusiness($repayment_start_year, $repayment_start_month, $repay_day);

					// 返済日
					$repay_year  = $date["year"];
					$repay_month = $date["month"];
					$repay_day   = $date["day"];

					// 貸付日を年、月、日に分解
					$loan_year  = date("Y", strtotime($loan_date));
					$loan_month = date("m", strtotime($loan_date));
					$loan_day   = date("d", strtotime($loan_date));


					// 契約年と返済年を比較
					$term_year = 0;
					if ($loan_year < $repay_year) {
						$term_year = $repay_year - $loan_year;
					}

					// 利息計算
					$interest      = 0;
					$interest_rate = $interest_rate * 0.01; // 年率は%表記で登録されているので計算用に100分の1にする。
					if (0 == $term_year) {

						// 同一年内
						$term_day = $this->Common->getDifferenceDays($repay_year, $repay_month, $repay_day, $loan_year, $loan_month, $loan_day, false);

						// 閏年チェック
						if (checkdate(2, 29, $loan_year)) {

							// 利息計算：閏年
							$interest = floor((string)($loan_amount * $interest_rate / 366 * $term_day));
						}
						else {

							// 利息計算：平年
							$interest = floor((string)($loan_amount * $interest_rate / 365 * $term_day));
						}
					}
					else {

						// 年またぎ
						$interest_uruu = 0;
						$interest_hei  = 0;
						for ($i = 0; $i <= $term_year; $i++) {

							if ($i == 0) {

								// 日数取得：契約年末日－契約日
								$term_day = $this->Common->getDifferenceDays($loan_year, 12, 31, $loan_year, $loan_month, $loan_day, false);

								// 閏年チェック
								if (checkdate(2, 29, $loan_year)) {

									// 利息計算：閏年
									$interest_uruu += floor((string)($loan_amount * $interest_rate / 366 * $term_day));
								}
								else {

									// 利息計算：平年
									$interest_hei += floor((string)($loan_amount * $interest_rate / 365 * $term_day));
								}
							}
							elseif (0 < $i and $i < $term_year) {

								// 利息計算：1年分
								// 閏年チェック
								if (checkdate(2, 29, $loan_year + $i)) {

									// 利息計算：閏年
									$interest_uruu += floor((string)($loan_amount * $interest_rate));
								}
								else {

									// 利息計算：平年
									$interest_hei += floor((string)($loan_amount * $interest_rate));
								}
							}
							else {

								// 日数取得：返済日－返済年の前年末日
								$term_day = $this->Common->getDifferenceDays($repay_year, $repay_month, $repay_day, $repay_year, 1, 1, true);

								// 閏年チェック
								if (checkdate(2, 29, $repay_year)) {

									// 利息計算：閏年
									$interest_uruu += floor((string)($loan_amount * $interest_rate / 366 * $term_day));
								}
								else {

									// 利息計算：平年
									$interest_hei += floor((string)($loan_amount * $interest_rate / 365 * $term_day));
								}
							}
						}

						// 閏年の利息と平年の利息を合算
						$interest = $interest_uruu + $interest_hei;
					}

					// 予定配当額、予定報酬額算出
					$dividend_data = $this->calcDividendAmount($interest, 0, $interest_rate, $yield_rate);

					// 返済(貸付)ワーク作成
					$repayment_data[0][MODEL_NAME_170][COLUMN_1700000] = $admin_id;                      // 管理者ID
					$repayment_data[0][MODEL_NAME_170][COLUMN_1700020] = $fund_id;                       // ファンドID
					$repayment_data[0][MODEL_NAME_170][COLUMN_1700030] = $loan_no;                       // 貸付番号
					$repayment_data[0][MODEL_NAME_170][COLUMN_1700040] = 1;                              // seq_no
					$repayment_data[0][MODEL_NAME_170][COLUMN_1700050] = date(DATE_FORMAT, strtotime($repay_year ."/". $repay_month ."/". $repay_day)); // 返済予定日
					$repayment_data[0][MODEL_NAME_170][COLUMN_1700060] = $loan_amount + $interest;       // 返済予定額
					$repayment_data[0][MODEL_NAME_170][COLUMN_1700070] = $loan_amount;                   // 予定元金
					$repayment_data[0][MODEL_NAME_170][COLUMN_1700080] = $interest;                      // 予定利息
					$repayment_data[0][MODEL_NAME_170][COLUMN_1700090] = 0;                              // 予定残元金
					$repayment_data[0][MODEL_NAME_170][COLUMN_1700100] = $dividend_data[COLUMN_1700100]; // 予定配当額
					$repayment_data[0][MODEL_NAME_170][COLUMN_1700110] = $dividend_data[COLUMN_1700110]; // 予定報酬額

					if (12 == $repay_month) {
						$repay_year++;
						$repay_month = 1;
					}
					else {
						$repay_month++;
					}
					
					// 配当予定日
					$company = $this->Company->getCompany();
					$dividend_day = $company[COLUMN_0300110];
					$dividend_day = $this->Calendar->ajustDateValid($repay_year, $repay_month, $dividend_day);
					$dividend_date = $this->Calendar->ajustDateBusiness($repay_year, $repay_month, $dividend_day, false);
					$repayment_data[0][MODEL_NAME_170][COLUMN_1700095] = date(DATE_FORMAT, strtotime($dividend_date['year'] ."/". $dividend_date['month'] ."/". $dividend_date['day'])); // 返済予定日
						
					break;

				case REPAYMENT_METHOD_CODE_P_I_EQUAL: // 元利均等

					break;

				case REPAYMENT_METHOD_CODE_P_EQUAL: // 元金均等

					break;
			}

			return $repayment_data;
			
		} catch (Exception $ex) {
			$err = "Fund->makeLoanRepayment で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 配当金計算<br>
	 * 貸付番号、利息、遅延損害金より配当額等を算出する<br>
	 * @param number $interest_amount
	 * @param number $delay_damege
	 * @param number $interest_rate
	 * @param number $yield_rate
	 * @return array $data
	 */
	function calcDividendAmount($interest_amount, $delay_damege, $interest_rate, $yield_rate) {
		
		try {
			
			// 運用利回り ＝ 実質年率 － 営業者報酬率
			$dividend_rate = sprintf("%.4f", $interest_rate - $yield_rate);

			$reward_amount = 0; // 営業者報酬

			// 営業者報酬計算：利息
			if (0 < $interest_amount) {

				// 営業者報酬 ＝ 利息 － 利息 × (運用利回り ÷ 実質年率)
				$reward_amount += $interest_amount - floor((string)($interest_amount * ($dividend_rate / $interest_rate)));
			}

			// 営業者報酬計算：遅延損害金
			if (0 < $delay_damege) {

				// 営業者報酬 ＝ 利息 － 利息 × (運用利回り ÷ 実質年率)
				$reward_amount += $delay_damege - floor((string)($delay_damege * ($dividend_rate / $interest_rate)));
			}

			// 配当額計算 ＝ 利息 ＋ 遅延損害金 － 営業者報酬
			$dividend_amount = $interest_amount + $delay_damege - $reward_amount;

			// 源泉徴収は配当実行時に投資家毎に個別に算出後、合計する。

			// 戻り値設定
			$data[COLUMN_1700100] = $dividend_amount; // 配当額
			$data[COLUMN_1700110] = $reward_amount;   // 営業者報酬

			return $data;
			
		} catch (Exception $ex) {
			$err = "Fund->calcDividendAmount で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}

	/**
	 * 貸付マスタ取得<br>
	 * ファンドIDと貸付番号を指定してデータを取得する。<br>
	 * @param string $fund_id
	 * @param number $loan_no
	 * @return array $data
	 */
	function getMstLoan($fund_id, $loan_no) {
		
		try {
			
			// パラメータ設定
			$conditions[COLUMN_0700020] = $fund_id;
			$conditions[COLUMN_0700030] = $loan_no;

			// ワークデータ取得
			$status[MODEL_CONDITIONS] = $conditions;
			$data = $this->Controller->MstLoan->find(MODEL_ALL, $status);

			return $data;
			
		} catch (Exception $ex) {
			$err = "Fund->getMstLoan で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * 貸付マスタ取得２<br>
	 * ファンドID1に紐付く貸付情報を全て取得する。<br>
	 * @param string $fund_id
	 * @return array $data
	 */
	function getMstLoans($fund_id) {
		
		try {
			
			$result = array();
			
			// パラメータ設定
			$conditions[COLUMN_0700020] = $fund_id;

			// ソート
			$order[COLUMN_0700030] = MODEL_ASC;

			// ワークデータ取得
			$status[MODEL_CONDITIONS] = $conditions;
			$status[MODEL_ORDER]      = $order;
			$data = $this->Controller->MstLoan->find(MODEL_ALL, $status);
			
			foreach ($data as $keys => $values) {
				foreach ($values as $key => $value) {
					$result[] = $value;
				}
			}

			return $result;
			
		} catch (Exception $ex) {
			$err = "Fund->getMstLoans で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * ファンド名取得
	 * 
	 * @param  string $fund_id
	 * @return string $fund_name
	 * 
	 */
	function getFundName($fund_id) {
		try {
			
			$fund_name = null;
			
			// ファンドデータ取得
			$fund_data = $this->getMstFund($fund_id);
			
			foreach ($fund_data as $key => $values) {
				foreach ($values as $value) {
					$fund_name = $value[COLUMN_0500020];
				}	
			}

			return $fund_name;
			
		} catch (Exception $ex) {
			$err = "Fund->getFundName で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * トップ画面用ファンド情報取得
	 * @return array $data_list
	 */
	function getFundListSiteTop() {
		try {
			
			// 募集中データのみ取得
			$search[SEARCH_ID_050110060] = CHECKBOX_ON;
			$search[SEARCH_ID_050110140] = date(DATETIME_FORMAT_3);
			
			// ソート条件
			$search[SEARCH_ID_050110110] = SORT_COLUMN_CODE_FUND_POST_DATETIME;
			$search[SEARCH_ID_050110120] = SORT_ORDER_CODE_DESC;
			
			// データ取得
			$data_list = $this->Controller->MstFund->searchFundList($search, DISP_NUMBER_TOP_FUND_LIST);
			
			return $data_list;
			
		} catch (Exception $ex) {
			$err = "Fund->getFundListSiteTop で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 案件一覧画面用ファンド情報取得
	 * @return array $data_list
	 */
	function getFundListLender($limit = null, $offset = null) {
		try {
			
			// 掲載開始日を過ぎたデータを取得
			// 1. 募集開始前のファンドデータを取得
			$search = null;
			$search[SEARCH_ID_050110140] = date(DATETIME_FORMAT_3);			
			$search[SEARCH_ID_050110050] = CHECKBOX_ON;	// 状態:募集開始前
			$search[SEARCH_ID_050110110] = SORT_COLUMN_CODE_FUND_POST_DATETIME;
			$search[SEARCH_ID_050110120] = SORT_ORDER_CODE_DESC;
			
			$pre_list = $this->Controller->MstFund->searchFundList($search, 0);
			
			// 2. 募集中のファンドデータを取得
			$search = null;
			$search[SEARCH_ID_050110140] = date(DATETIME_FORMAT_3);
			$search[SEARCH_ID_050110060] = CHECKBOX_ON; // 状態:募集中
			$search[SEARCH_ID_050110110] = SORT_COLUMN_CODE_FUND_POST_DATETIME;
			$search[SEARCH_ID_050110120] = SORT_ORDER_CODE_DESC;
			
			$open_list = $this->Controller->MstFund->searchFundList($search, 0);

			// 3. 募集終了のファンドデータを取得
			$search = null;
			$search[SEARCH_ID_050110140] = date(DATETIME_FORMAT_3);
			$search[SEARCH_ID_050110070] = CHECKBOX_ON; // 状態:運用開始前
			$search[SEARCH_ID_050110080] = CHECKBOX_ON; // 状態:運用中
			$search[SEARCH_ID_050110090] = CHECKBOX_ON; // 状態:運用終了
			$search[SEARCH_ID_050110100] = CHECKBOX_ON; // 状態:不成立
			$search[SEARCH_ID_050110110] = SORT_COLUMN_CODE_FUND_POST_DATETIME;
			$search[SEARCH_ID_050110120] = SORT_ORDER_CODE_DESC;

			$end_list = $this->Controller->MstFund->searchFundList($search, 0);
			
			// 取得したデータを取得順序ごとにマージ
			$data_list = array_merge($pre_list, $open_list, $end_list);

			$this->_count = count($data_list);
                        if( $offset !== null || $limit !== null ) {
				$data_list = array_splice($data_list, $offset, $limit);
                        }

			return $data_list;
			
		} catch (Exception $ex) {
			$err = "Fund->getFundListLender で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 管理者画面用ファンド情報取得
	 * @return array $data_list
	 */
	function getFundListAdmin($search) {
		try {
			
			// 運用開始日
			if (isset($search[SEARCH_ID_050110020]) && !is_null($search[SEARCH_ID_050110020]) && strcmp("", $search[SEARCH_ID_050110020]) != 0) {
				$search[SEARCH_ID_050110020] = date(DATETIME_FORMAT_1, strtotime($search[SEARCH_ID_050110020]));
			}
			if (isset($search[SEARCH_ID_050110030]) && !is_null($search[SEARCH_ID_050110030]) && strcmp("", $search[SEARCH_ID_050110030]) != 0) {
				$search[SEARCH_ID_050110030] = date(DATETIME_FORMAT_2, strtotime($search[SEARCH_ID_050110030]));
			}
			
			// データ取得
			$data_list = $this->Controller->MstFund->searchFundList($search, 0);
			
			return $data_list;
			
		} catch (Exception $ex) {
			$err = "Fund->getFundListAdmin で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 累計成約金額取得<br>
	 * @return number $cumulative_loan_amount
	 */
	function getCumulativeLoanAmount() {
		
		try {
			
			$fields[] = "sum(".COLUMN_0500040.") as ".COLUMN_0500040;
			
			$status[MODEL_FIELDS] = $fields;

			$data = $this->Controller->MstFund->find(MODEL_ALL, $status);

			$cumulative_loan_amount = 0;
			foreach ($data as $keys => $values) {
				foreach ($values as $key => $value) {
					$cumulative_loan_amount = $value[COLUMN_0500040];
				}
			}
			
			return $cumulative_loan_amount;
			
		} catch (Exception $ex) {
			$err = "Fund->getCumulativeLoanAmount で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 取引残高報告書備考取得<br>
	 * 取引残高報告書の【運用中ローンファンド】、【お取引の明細・匿名組合契約】<br>
	 * の備考に表示するデータを取得する。<br>
	 * @param string $fund_id
	 * @return array $result
	 */
	function getTradeBalanceReportNote($fund_id) {
		
		try {
			
			$result = array();
			
			$fields1[] = COLUMN_0700090;
			$fields1[] = COLUMN_0700100;

			$conditions[COLUMN_0700020] = $fund_id;

			$group[]  = COLUMN_0700090;
			$group[]  = COLUMN_0700100;

			$status[MODEL_FIELDS]     = $fields1;
			$status[MODEL_CONDITIONS] = $conditions;
			$status[MODEL_GROUP]      = $group;

			$loans = $this->Controller->MstLoan->find(MODEL_ALL, $status);
			foreach ($loans as $keys => $values) {
				foreach ($values as $key => $value) {
					$result[] = $value;
				}
			}

			return $result;
			
		} catch (Exception $ex) {
			$err = "Fund->getTradeBalanceReportNote で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}

	}
	
	/*
	 * 開設中ファンド情報取得メソッド
	 * 
	 * 募集開始かつ運用中のファンドの情報取得
	 * @access Public
	 * @param 
	 * @return Array $data_list
	 * 
	 */
	
	public function getFundListActiveOpen($search) {
		try {
			
			// 募集開始かつ運用中のファンドのみを指定
			$search[SEARCH_ID_050110060] = CHECKED; //ファンド状態：募集中
			$search[SEARCH_ID_050110070] = CHECKED; //ファンド状態：運用準備中
			$search[SEARCH_ID_050110080] = CHECKED; //ファンド状態：運用中			
			
			// データ取得
			$data_list = $this->Controller->MstFund->searchFundList($search, 0);
			
			return $data_list;
			
		} catch (Exception $ex) {
			$err = "Fund->getFundListAdmin で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
}
