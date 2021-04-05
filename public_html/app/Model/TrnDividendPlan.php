<?php
App::uses('AppModel', 'Model');
App::uses('Sanitize', 'Utility');

/* 
 * 配当予定モデルクラス
 * 
 * 配当予定をあらわすモデルクラス。
 * 
 * @access Public
 * @author Wataru Omori <wataru.omori@outlook.com>
 * @category Data Processing
 * @package Model
 */
class TrnDividendPlan extends AppModel {
	
	/**
	 * 配当予定バルク保存メソッド
	 * 
	 * 配当予定データをバルク保存
	 * @access Public
	 * @param Array $data 配当予定データ
	 * @return Boolean TRUE:FALSE クエリ実行結果
	 * @see 関連（呼び出したり）する関数
	 * @throws 例外についての記述
	 * @todo 未対応（改善）事項等
	 */	
    public function saveBulk($data) {
		if(!empty($data[0]) && count($data) > 0) {
			$columns = "user_id, dividend_date, fund_id, fund_name, seq_no, redemption, dividend_amount, tax";
			foreach ($data as $key => $value) {
				$params[] = "('" . implode("', '", $value) . "')";
			}
			$params = implode(", " ,$params);
			$sql = "INSERT INTO trn_dividend_plans ($columns) VALUES $params;";
			$ret = $this->query($sql);
			if ($ret === false) {
				$this->log("TrnDividendPlan->saveBulk()でエラーが発生しました。");
				$this->log("QUERY: $sql");
				return FALSE;
			}
			if ($this->getAffectedRows() != count($data)) {
				$this->log("TrnDividendPlan->saveBulk()でいくつかのクエリーが失敗しました。");
				$this->log("QUERY: $sql");		
				return FALSE;
			}
		return TRUE;
		}
	}
	
	/**
	 * 
	 * @param type $user_id
	 * @return type
	 */
	public function getUserFund ($user_id) {
		$sql = "SELECT DISTINCT fund_id, fund_name FROM trn_dividend_plans WHERE user_id = $user_id;";
		$ret = $this->query($sql);
		return $ret;
	}
	
	/**
	 * 
	 * @param type $user_id
	 * @param type $fund_id
	 * @return type
	 */
	public function existUserFund ($user_id, $fund_id) {
		$sql = "SELECT COUNT(id) FROM trn_dividend_plans WHERE user_id = $user_id AND fund_id = $fund_id;";
		$ret = $this->query($sql);
		$ret = $ret[0][0]['COUNT(id)'];
		return $ret != 0 ? TRUE : FALSE;
	}
	
	/**
	 * 
	 * @param type $user_id
	 * @param type $fund_id
	 * @return type
	 */
	public function deleteUserFund ($user_id, $fund_id) {
		// 引数指定が無い場合は、メッセージ出力して終了
		if (!is_null($user_id) && strcmp("", $user_id) != 0 && !is_null($fund_id) && strcmp("", $fund_id) != 0) {
			$sql = "DELETE FROM trn_dividend_plans WHERE user_id = $user_id AND fund_id = $fund_id;";
			$this->query($sql);
			$ret = $this->getAffectedRows();
		} else {
			$this->log("TrnDividePlan->deleteUserFund: ユーザID、ファンドIDが指定されていません。");
		}
		return $ret;
	}
}

