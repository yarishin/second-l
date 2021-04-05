<?php
App::uses('Component', 'Controller');

class TradeBalanceReportComponent extends Component {
	
	// 他のコンポーネントを使えるようにする。
	public $components = array(
		 "InformationHistory"
		,"Mail"
		,"User"
	);
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * 取引残高報告書交付
	 * @param array $admin_info
	 * @param array $form_data
	 * @return array $user_list
	 * @throws Exception
	 */
	function issueReport($admin_info, $form_data) {
		
		try {
			
			// 管理者ID、管理者名
			$admin_id   = $admin_info[LOGIN_ADMIN_ID];
			$admin_name = $admin_info[LOGIN_ADMIN_NAME];
			
			// 現在時刻
			$now = date(DATETIME_FORMAT);
			
			$trade_start_year  = $form_data[OBJECT_ID_050380010];
			$trade_start_month = $form_data[OBJECT_ID_050380020];
			$trade_end_year    = $form_data[OBJECT_ID_050380030];
			$trade_end_month   = $form_data[OBJECT_ID_050380040];
			$info_msg          = $form_data[OBJECT_ID_050380050];
			
			// ◆取引残高報告書履歴データ登録◆
			
			$trade_balance = array(
				 COLUMN_2400020 => $trade_start_year
				,COLUMN_2400030 => $trade_start_month
				,COLUMN_2400040 => $trade_end_year
				,COLUMN_2400050 => $trade_end_month
				,COLUMN_2400060 => $info_msg
				,COLUMN_0000010 => $now
				,COLUMN_0000020 => $admin_id
				,COLUMN_0000030 => $admin_name
			);

			// 登録実行
			$this->Controller->TrnTradeBalanceReport->save($trade_balance, false);
			
			// ◆お知らせ履歴に取引残高報告書交付通知を登録◆
			
			// 認証済みユーザを全件取得
			$user_list = $this->User->getAuthenticatedUser();
			foreach($user_list as $user_key => $user_value) {
				
				$user_id = $user_value[COLUMN_0800010];
				
				// お知らせ履歴登録
				$this->InformationHistory->issueTradeBalanceReport($user_id, $trade_start_year, $trade_start_month, $now);
			}
			
			return $user_list;
			
		} catch (Exception $ex) {
			$err = "TradeBalanceReport->issueTradeBalanceRepost で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 取引残高報告書データ取得<br>
	 * 取引残高報告書に出力するデータを1件取得する。<br>
	 * @param number $trade_start_year
	 * @param number $trade_start_month
	 * @return array $result
	 * @throws Exception
	 */
	function getTradeBalanceReport($trade_start_year, $trade_start_month) {
		
		try {
			
			$result = null;
			
			$conditions[COLUMN_2400020] = $trade_start_year;
			$conditions[COLUMN_2400030] = $trade_start_month;
			
			$status[MODEL_CONDITIONS] = $conditions;
			
			$data_list = $this->Controller->TrnTradeBalanceReport->find(MODEL_ALL, $status);
			foreach ($data_list as $keys => $values) {
				foreach ($values as $key => $value) {
					$result = $value;
				}
			}
			
			return $result;
			
		} catch (Exception $ex) {
			$err = "TradeBalanceReport->getTradeBalanceRepost で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 取引残高報告書交付通知メール送信<br>
	 * @param type $user_list
	 */
/*	function sendMailIssueReport($user_list) {
		
		try {
			
			// DBへの登録完了後、通知メールを送信
			foreach($user_list as $key => $value) {

				// メール送信
				$this->Mail->sendMailTradeBalanceReport($value);
			}
			
		} catch (Exception $ex) {
			$err = "TradeBalanceReport->sendMailIssueReport で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
*/
}
