<?php
class db_access {
	
	private $db_conn = null;

	/**
	* データベースに接続
	*/
	private function connect() {
		$result = true;
		//接続実行
		$this->db_conn = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD);
		if ($this->db_conn === false) {
			$result = false;
		}
		return $result;
	}

	/**
	* ＤＢ選択
	*/
	private function select_db() {
		return mysql_select_db(DB_DATABASE);
	}

	/**
	* トランザクション開始処理
	*/
	private function transaction_start() {
		$result = true;
		if (!mysql_query(DB_TRANSACTION_START, $this->db_conn)) {
			$result = false;
		}
		return $result;
	}
	
	/**
	* コミット処理
	*/
	private function commit() {
		$result = true;
		if (!mysql_query(DB_TRANSACTION_COMMIT, $this->db_conn)) {
			$result = false;
		}
		return $result;
	}

	/**
	* ロールバック処理
	*/
	private function rollback() {
		$result = true;
		if (!mysql_query(DB_TRANSACTION_ROLLBACK, $this->db_conn)) {
			$result = false;
		}
		return $result;
	}
	
	/**
	* ＤＢ切断
	*/
	private function close() {

		//切断結果を返す
		return mysql_close($this->db_conn);
	}
	
	/**
	* エラー出力
	*/
	private function err() {
		print  mysql_errno($this->db_conn)
		." : ".mysql_error($this->db_conn)."<br>\n";
	}
	
	

	/**
	 * ファンド詳細取得<br>
	 * @param type $fund_id
	 * @return type
	 */
	function selectFundDetail($fund_id) {
		
		// DB接続
		$this->connect();
		$this->select_db();
		
		$sql = ""
			."select "
			."	case when a.fund_id               is not null then a.fund_id               else '' end as ".COLUMN_0500010.", "
			."	case when a.fund_name             is not null then a.fund_name             else '' end as ".COLUMN_0500020.", "
			."	case when a.max_loan_amount_total is not null then a.max_loan_amount_total else '' end as ".COLUMN_0500030.", "
			."	case when a.loan_amount_total     is not null then a.loan_amount_total     else '' end as ".COLUMN_0500040.", "
			."	case when a.min_loan_amount_total is not null then a.min_loan_amount_total else '' end as ".COLUMN_0500050.", "
			."	case when a.min_investment_amount is not null then a.min_investment_amount else '' end as ".COLUMN_0500060.", "
			."	case when a.post_datetime         is not null then a.post_datetime         else '' end as ".COLUMN_0500070.", "
			."	case when a.inviting_start        is not null then a.inviting_start        else '' end as ".COLUMN_0500080.", "
			."	case when a.inviting_end          is not null then a.inviting_end          else '' end as ".COLUMN_0500090.", "
			."	case when a.operating_start       is not null then a.operating_start       else '' end as ".COLUMN_0500100.", "
			."	case when a.operating_end         is not null then a.operating_end         else '' end as ".COLUMN_0500110.", "
			."	case when a.operating_term        is not null then a.operating_term        else '' end as ".COLUMN_0500120.", "
			."	case when a.target_yield          is not null then a.target_yield          else '' end as ".COLUMN_0500140.", "
			."	case when a.guide                 is not null then a.guide                 else '' end as ".COLUMN_0500150.", "
			."	case when b.investment_amount     is not null then b.investment_amount     else 0  end as ".COLUMN_1200070.", "
			."	case when b.count_id              is not null then b.count_id              else 0  end as ".COLUMN_ALIAS_COUNT." "
			."from "
			."	mst_funds a "
			."		left join "
			."			(select "
			."				fund_id, "
			."				sum(investment_amount) as investment_amount, "
			."				count(id) as count_id "
			."			from "
			."				trn_investment_histories "
			."			where 1 "
			."				and investment_status_code in (0,1) "
			."				and fund_id = '".$fund_id."' "
			."			group by "
			."				fund_id "
			."			) b "
			."		on a.fund_id = b.fund_id "
			."where 1 "
			."	and a.fund_id = '".$fund_id."' "
			.";";
				
		$db_result = mysql_query($sql, $this->db_conn);
		
		$result = null;
		
		if (!$db_result) {
			die("database error!!".mysql_error());
		} else {
			while ($row = mysql_fetch_assoc($db_result)) {
				$result = $row;
			}
		}
		
		// DB切断
		$this->close();

		return $result;
	}
	
	
	/**
	 * 貸付情報詳細取得<br>
	 * @param type $fund_id
	 * @return type
	 */
	function selectLoanList($fund_id) {
		
		// DB接続
		$this->connect();
		$this->select_db();
		
		$sql = ""
			."select "
			."    * "
			."from "
			."    mst_loans "
			."where 1 "
			."    and fund_id = '".$fund_id."' "
			.";";
				
		$db_result = mysql_query($sql, $this->db_conn);
		
		$result = null;
		
		if (!$db_result) {
			die("database error!!".mysql_error());
		} else {
			while ($row = mysql_fetch_assoc($db_result)) {
				$result[] = $row;
			}
		}
		
		// DB切断
		$this->close();

		return $result;
	}
	
	
}
