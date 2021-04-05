<?php
/*
 * 配当予定コンポーネントクラス
 * 
 * 配当予定作成に関する関数をまとめたコンポーネントクラス。
 * 
 * @access Public
 * @author Wataru Omori <wataru.omori@outlook.com>
 * @category Data Processing
 * @package Controller
 */

App::uses('Component', 'Controller');
// App::uses('CakeEmail', 'Network/Email');

class DividendPlanComponent extends Component {
	
	// 他のコンポーネントを使えるようにする。
	public $components = array(
		 "Common"
		,"Calendar"
		,"Fund"
		,"LoanRepayment"
		,"InvestmentHistory"
	);
	
	public $uses = array(
		"TrnDevidendPlan"
		,"TrnInvestmentHistory"
		,"TrnLoanRepayment"
	);
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * 配当予定データ取得メソッド
	 *  
	 * 対象ユーザごとの配当予定データを取得
	 * @access Public
	 * @param String $user_id ユーザID
	 * @param String $date_from 取得開始日
	 * @param String $date_to 取得終了日
	 * @return Array $data[]
	 * @see 関連（呼び出したり）する関数
	 * @throws 例外についての記述
	 * @todo 未対応（改善）事項等
	 */
	public function getDividendPlan($user_id, $fund_id, $date_from, $date_to) {
		
		try {
			$status     = null;
			$conditions = null;
			$order      = null;

			// ◆絞込み条件◆
			// ユーザID、ファンドID、配当日(from/to)
			$conditions['user_id'] = $user_id;	// ユーザID:COLUMN_3000020
			if (!is_null($fund_id) && strcmp("", $fund_id) != 0) {
				$conditions['fund_id'] = $fund_id; // ファンドID:COLUMN_3000030
			}
			if (!is_null($date_from) && strcmp("", $date_from) != 0) {
				$conditions['dividend_date >= '] = $date_from;	// 配当日:COLUMN_3000060
			}
			if (!is_null($date_to) && strcmp("", $date_to) != 0) {
				$conditions['dividend_date <= '] = $date_to;	// 配当日:COLUMN_3000060
			}

			// ◆ソート◆
			$order['dividend_date'] = 'asc';	// 配当日:COLUMN_3000060
			$order['fund_id'] = 'asc';	// ファンドID:COLUMN_3000030

			$status['conditions'] = $conditions;
			$status['order']      = $order;


			// 検索結果が0件の場合戻り値にfalseを設定
			$data = $this->Controller->TrnDividendPlan->find('all', $status);
//$this->log(count($data));
			return $data;
		} catch (Exception $ex) {
			$err = "DividendPlan->getDividendPlanで例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * 
	 * @param type $user_id
	 * @return type
	 */
	public function getFundList($user_id) {
		$fund_list = $this->Controller->TrnDividendPlan->getUserFund($user_id);
		$fund_list = Hash::extract($fund_list,'{n}.trn_dividend_plans');
		return $fund_list;
	}
	
	/**
	 * 
	 * @throws Exception
	 */
	public function createAllFunds(){
		try {
			$conditions = null;
			$fields = null;
			$status = null;
//			$conditions['operating_end >= '] = date("Y-m-d");
			$fields['fund_id'] = 'fund_id DISTINCT';
			$status['conditions'] = $conditions;
			$status['fields'] = $fields;
			$fund_list = $this->Controller->MstFund->find('all', $status);
$time1 = microtime(true);
			foreach ($fund_list as $key => $values) {
				foreach ($values as $key => $value) {
$time_start = microtime(true);
					$fund_id = $value['fund_id'];
					$fund_name = $value['fund_name'];
					$num_user = $this->createFundDividendPlan($fund_id);
$time_end = microtime(true);
$processing_time = $time_end - $time_start;
$this->log("fund_id = $fund_id : User = $num_user : Time=$processing_time");
				}
			}
$time2 = microtime(true);
$total_time = $time2 - $time1;
$this->log("Total = $total_time");

		} catch (Exception $ex) {
			$err = "DividendPlan->createAllFundsで例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}		
	}

	/**
	 * ファンドごとの配当予定作成
	 * ファンドIDを指定して配当予定を作成する
	 * @access Public
	 * @param String $fund_id ファンドID
	 * @return Integer $cnt 処理ユーザ数
	 */
	public function createFundDividendPlan($fund_id) {
		
		try {
			// 投資履歴から対象ファンドの承認済み投資者を取得する
			// 複数口数の投資者は1つに集約する
			$conditions = null;
			$fields = null;
			$status = null;
			$conditions['fund_id'] = $fund_id;			// ファンドID:COLUMN_1200040
			$conditions['investment_status_code'] = 1;	//投資状態(承認):COLUMN_1200090
			$fields['user_id'] = 'user_id DISTINCT';		//ユーザID:COLUMN_1200020
			$status['conditions'] = $conditions;
			$status['fields'] = $fields;
			$investment_data = $this->Controller->TrnInvestmentHistory->find('all', $status);
			if (!empty($investment_data)){
				$number_of_user = count($investment_data);
			}
			else {
				return 0;
			}

			$cnt = 0;
			foreach ($investment_data as $key => $values) {
				foreach ($values as $key => $value){
					$user_id = $value['user_id'];
					$this->createDividendPlan($user_id, $fund_id);
					$cnt = $cnt + 1;
				}
			}			
		} catch (Exception $ex) {
			$err = "DividendPlan->createFundDividendPlanで例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		return $cnt;
	}
		
	/**
	 * 対象ユーザのファンドごとの配当予定作成
	 * ユーザIDとファンドIDを指定して配当予定を作成する
	 * @access Public
	 * @param String $user_id ユーザID
	 * @param String $fund_id ファンドID
	 * @return None
	 */
	public function createDividendPlan($user_id, $fund_id) {

		try {
			// ファンドマスタからファンド情報を取得
			$fund_data = $this->Fund->getMstFund($fund_id);
			
			// 指定したファンドが無い場合、もしくは複数のファンドが返された場合は終了
			if (empty($fund_data) or count($fund_data) != 1) {
				$this->log("DividendPlan->createDividendPlan: 指定したファンドIDが不正です。");
				return;
			}
			foreach ($fund_data as $key => $values) {
				foreach ($values as $key => $value) {
					$fund_name = $value['fund_name'];	// ファンド名:COLUMN_0500020
					$operating_term = intval($value['operating_term']);	// 運用期間(ヶ月):COLUMN_0500120
					$loan_amount_total = $value['loan_amount_total'];	// 貸付額合計:COLUMN_0500040

					// 貸付額合計が確定していない場合は貸付予定額合計を使用する
					if($loan_amount_total <= 0) {
						$loan_amount_total = $value['max_loan_amount_total'];		//貸付予定額合計:COLUMN_0500030
					}
				}
			}
			
			// 投資履歴を取得し承認済み口数と合計出資額を計算
			$conditions = null;
			$fields = null;
			$status = null;
			$conditions['user_id'] = $user_id;	// ユーザID:COLUMN_1200020
			$conditions['fund_id'] = $fund_id;	// ファンドID:COLUMN_1200040
			$conditions['investment_status_code'] = 1;	//投資状態(承認):COLUMN_1200090
			$status['conditions'] = $conditions;
			$investment_data = $this->Controller->TrnInvestmentHistory->find('all', $status);

			// 承認済みの投資履歴が無い場合は終了
			if (empty($investment_data)) {
				$this->log("DividendPlan->createDividendPlan: 投資履歴がみつかりません。");
				return;
			}
			
			// 複数口投資してる場合は投資額を合計する
			$investment_unit = count($investment_data);		// 出資口数
			$investment_amount = 0;
			foreach ($investment_data as $key => $values) {
				foreach ($values as $key => $value){
					$investment_amount += $value['investment_amount'] ;	// 合計出資額
				}
			}			

			// 指定したファンドの貸付返済予定データを取得
			$conditions = null;
			$fields = null;
			$status = null;
			$conditions['fund_id'] = $fund_id; // ファンドID: COLUMN_1300020
//			$conditions['dividend_datetime_1 >= '] = date("Y-m-d"); //
			$order['loan_no'] = 'asc';	// 貸付番号:COLUMN_1300030
			$order['seq_no'] = 'asc';	// 通し番号:COLUMN_1300040
			$status['conditions'] = $conditions;
			$status['order'] = $order;
			$loan_data = $this->Controller->TrnLoanRepayment->find('all', $status);
			
			// 貸付履歴が無い場合は終了
			if (empty($loan_data)) {
				$this->log("DividendPlan->createDividendPlan: 対象ファンドの貸付履歴がみつかりません。");
				return;
			}
			$number_of_loan = floor(count($loan_data)/$operating_term);		// 貸付先数を計算
			$tmp_dividend = array();
			$records = array();
			foreach ($loan_data as $key => $values) {
				foreach ($values as $key => $value) {
					$loan_no = intval($value['loan_no']);	// 貸付番号:COLUMN_1300030
					$seq_no = intval($value['seq_no']);	// 通し番号:COLUMN_0500020
					
					//通し番号が運用期間(ヶ月)以上のレコードは計算対象としない
					if( $seq_no > $operating_term) {
						continue;
					}
					//最後の貸付先では無い場合、毎月の各貸付先配当額を合計する
					if ( $loan_no < $number_of_loan){
						if (isset($tmp_dividend[$seq_no])) {
							$tmp_dividend[$seq_no] += $value['dividend_amount_1'];	//予定配当額:	COLUMN_1300100
						}
						else {
							$tmp_dividend[$seq_no] = $value['dividend_amount_1'];	//予定配当額:	COLUMN_1300100
						}
					}
					else {	
						//最後の貸付先の場合は集計した配当額とともに毎月の配当予定レコードを作成する
						$dividend_datetime = new DateTime($value['dividend_datetime_1']);	// 配当予定日: COLUMN_1300095
						$dividend_date	= $dividend_datetime->format('Y-m-d');	// 日時から日付に変換
						$tmp_dividend[$seq_no] += $value['dividend_amount_1'];	// 全貸付先の合計予定配当額
						$dividend_amount = floor($tmp_dividend[$seq_no] * $investment_amount / $loan_amount_total);	// 出資比率に応じて分配予定額を計算
						$tax = floor((string)($dividend_amount * TAX_RATE));	// 源泉徴収税計算
						// 最終回の場合のみ出資額を償還
						if ( $seq_no === $operating_term){
							$redemption = $investment_amount;	
						} else {
							$redemption = 0;
						}
						$record = Array(
							'user_id'			=> $user_id,		// ユーザID:COLUMN_3000020
							'dividend_date'	=> $dividend_date,	// 返済予定日:COLUMN_3000030
							'fund_id'			=> $fund_id,		// ファンドID:COLUMN_3000040
							'fund_name'		=> $fund_name,		// ファンド名:COLUMN_3000050
							'seq_no'			=> $seq_no,			// 通し番号:COLUMN_3000060
							'redemption'		=> $redemption,		// 出資金償還:COLUMN_3000070
							'dividend_amount'	=> $dividend_amount,// 配当額:COLUMN_3000080
							'tax'				=> $tax				// 源泉徴収額:COLUMN_3000090
						);
						$records[$seq_no-1] = $record;
					}
				}
			}
			
			if ( $records !== null && count($records) > 0) {  
			// 既に対象ユーザ・対象ファンドの配当予定がある場合は削除する
				if ( $this->Controller->TrnDividendPlan->existUserFund($user_id, $fund_id)) {
					$this->Controller->TrnDividendPlan->deleteUserFund($user_id, $fund_id);
//					$this->deleteDividendPlan($user_id, $fund_id);
				}
				// 配当予定テーブルに各ユーザの配当予定を登録する
				$this->Controller->TrnDividendPlan->saveBulk($records);
			}
		} catch (Exception $ex) {
			$err = "DividendPlan->createDividendPlanで例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		return TRUE;
	}
	
	/**
	 * 
	 * @param type $user_id
	 * @param type $fund_id
	 * @return boolean
	 * @throws Exception
	 */
	public function deleteDividendPlan ($user_id, $fund_id) {
		try {

			$this->Controller->TrnDividendPlan->deleteUserFund($user_id, $fund_id);
		
			// 取引履歴に該当ユーザ、該当ファンドの承認済み取引が存在する場合は配当履歴を再作成する
			$conditions = null;
//			$fields = null;
			$status = null;
			$conditions['user_id'] = $user_id;	// ユーザID:COLUMN_1200020
			$conditions['fund_id'] = $fund_id;	// ファンドID:COLUMN_1200040
			$conditions['investment_status_code'] = 1;	//投資状態(承認):COLUMN_1200090
			$status['conditions'] = $conditions;
			$approved_investment = $this->Controller->TrnInvestmentHistory->find('count', $status);

			if ( $approved_investment > 0 ) {
			$this->createDividendPlan($user_id, $fund_id);
			}
		} catch (Exception $ex) {
			$err = "DividendPlan->deleteDividendPlanで例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		return TRUE;
	}
}