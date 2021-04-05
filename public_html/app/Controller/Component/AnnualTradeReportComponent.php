<?php
App::uses('Component', 'Controller');

class AnnualTradeReportComponent extends Component {
	
	// 他のコンポーネントを使えるようにする。
	public $components = array(
		 "InformationHistory"
		,"Document"
		,"Mail"
		,"User"
	);
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * 年間取引報告書交付
	 * @param array $admin_info
	 * @param number $trade_year
	 * @return array $user_list
	 * @throws Exception
	 */
	function issueReport($admin_info, $trade_year) {
		
		try {
			
			// 管理者ID、管理者名
			$admin_id   = $admin_info[LOGIN_ADMIN_ID];
			$admin_name = $admin_info[LOGIN_ADMIN_NAME];
			
			// 取引期間
			$date_from  = date(DATETIME_FORMAT_1, strtotime($trade_year."/01/01"));
			$date_to    = date(DATETIME_FORMAT_2, strtotime($trade_year."/12/31"));
			
			// 現在時刻
			$now = date(DATETIME_FORMAT);
			
			// ◆年間取引報告書履歴データ登録◆
			
			$annuall_trade = array(
				 COLUMN_2500020 => $trade_year
				,COLUMN_2500030 => 1
				,COLUMN_0000010 => $now
				,COLUMN_0000020 => $admin_id
				,COLUMN_0000030 => $admin_name
			);

			// 登録実行
			$this->Controller->TrnAnnualTradeReport->save($annuall_trade, false);
			
			// ◆お知らせ履歴に年間取引報告書交付通知を登録◆
			
			// 年間取引報告書交付対象ユーザ全件取得
			$user_list = $this->User->getAnnualTradeReportReceiveUser($date_from, $date_to);
			foreach($user_list as $user_key => $user_value) {
				
				$user_id = $user_value[COLUMN_0800010];
				
				// お知らせ履歴登録
				$this->InformationHistory->issueAnnualTradeReport($user_id, $now, $trade_year);
			}
			
			return $user_list;
			
		} catch (Exception $ex) {
			$err = "TradeBalanceReport->issueTradeBalanceRepost で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 年間取引報告書データ取得<br>
	 * 交付済みの年間取引報告書にデータを取得する。<br>
	 * @return array $result
	 * @throws Exception
	 */
	function getAnnualTradeReportList() {
		
		try {
			
			$result = array();
			
			$order[COLUMN_2500020] = MODEL_DESC;
			
			$status[MODEL_ORDER] = $order;
			
			$data_list = $this->Controller->TrnAnnualTradeReport->find(MODEL_ALL, $status);
			foreach ($data_list as $keys => $values) {
				foreach ($values as $key => $value) {
					$result[] = $value;
				}
			}
			
			return $result;
			
		} catch (Exception $ex) {
			$err = "TradeBalanceReport->getAnnualTradeReportList で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 年間取引報告書交付通知メール送信<br>
	 * @param array $user_list
	 * @param number $trade_year
	 */
	function sendMailIssueReport($user_list, $trade_year) {
		
		try {
			
			// DBへの登録完了後、通知メールを送信
			foreach($user_list as $key => $value) {

				// メール送信
				$this->Mail->sendMailAnnualTradeReport($value, $trade_year);
			}
			
		} catch (Exception $ex) {
			$err = "TradeBalanceReport->sendMailIssueReport で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
}
