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
."      case when a.land_lot_number                                 is not null then a.land_lot_number                                  else '' end as ".COLUMN_0500190.", "
."      case when a.building_house_number                           is not null then a.building_house_number                            else '' end as ".COLUMN_0500240.", "
."      case when a.building_floor_area                             is not null then a.building_floor_area                              else '' end as ".COLUMN_0500270.", "
."      case when a.registered_holder                               is not null then a.registered_holder                                else '' end as ".COLUMN_0500330.", "
."      case when a.fanility_status_drinking_water                  is not null then a.fanility_status_drinking_water                   else '' end as ".COLUMN_0500470.", "
."      case when a.total_investment                                is not null then a.total_investment                                 else '' end as ".COLUMN_0501350.", "
."      case when a.total_priority_investment                       is not null then a.total_priority_investment                        else '' end as ".COLUMN_0501370.", "
."      case when a.total_subordinate_investment                    is not null then a.total_subordinate_investment                     else '' end as ".COLUMN_0501390.", "
."      case when a.subordinate_investment_units                    is not null then a.subordinate_investment_units                     else '' end as ".COLUMN_0501400.", "
."      case when a.documents_application_start_date                is not null then a.documents_application_start_date                 else '' end as ".COLUMN_0501410.", "
."      case when a.documents_application_end_date                  is not null then a.documents_application_end_date                   else '' end as ".COLUMN_0501420.", "
."      case when a.documents_scheduled_start_date                  is not null then a.documents_scheduled_start_date                   else '' end as ".COLUMN_0501430.", "
."      case when a.documents_scheduled_end_date                    is not null then a.documents_scheduled_end_date                     else '' end as ".COLUMN_0501440.", "
."      case when a.documents_contract_start_date                   is not null then a.documents_contract_start_date                    else '' end as ".COLUMN_0501450.", "
."      case when a.documents_contract_end_date                     is not null then a.documents_contract_end_date                      else '' end as ".COLUMN_0501460.", "
."      case when a.cycle                                           is not null then a.cycle                                            else '' end as ".COLUMN_0501480.", "
."      case when a.initial_distribution_schedule                   is not null then a.initial_distribution_schedule                    else '' end as ".COLUMN_0501490.", "
."      case when a.documents_expected_yield                        is not null then a.documents_expected_yield                         else '' end as ".COLUMN_0501500.", "
."      case when a.completion_date                                 is not null then a.completion_date                                  else '' end as ".COLUMN_0501540.", "
."      case when a.property_name                                    is not null then a.property_name                                     else '' end as ".COLUMN_0501560.", "
."      case when a.housing_display                                  is not null then a.housing_display                                   else '' end as ".COLUMN_0501570.", "
."      case when a.property_description                             is not null then a.property_description                              else '' end as ".COLUMN_0501580.", "
."      case when a.facility_1                                       is not null then a.facility_1                                        else '' end as ".COLUMN_0501650.", "
."      case when a.facility_2                                       is not null then a.facility_2                                        else '' end as ".COLUMN_0501660.", "
."      case when a.facility_3                                       is not null then a.facility_3                                        else '' end as ".COLUMN_0501670.", "
."      case when a.facility_4                                       is not null then a.facility_4                                        else '' end as ".COLUMN_0501680.", "
."      case when a.facility_5                                       is not null then a.facility_5                                        else '' end as ".COLUMN_0501690.", "
."      case when a.facility_6                                       is not null then a.facility_6                                        else '' end as ".COLUMN_0501700.", "
."      case when a.facility_7                                       is not null then a.facility_7                                        else '' end as ".COLUMN_0501710.", "
."      case when a.facility_8                                       is not null then a.facility_8                                        else '' end as ".COLUMN_0501720.", "
."      case when a.facility_9                                       is not null then a.facility_9                                        else '' end as ".COLUMN_0501730.", "
."      case when a.facility_10                                      is not null then a.facility_10                                       else '' end as ".COLUMN_0501740.", "
."      case when a.facility_11                                      is not null then a.facility_11                                       else '' end as ".COLUMN_0501750.", "
."      case when a.facility_12                                      is not null then a.facility_12                                       else '' end as ".COLUMN_0501760.", "
."      case when a.facility_13                                      is not null then a.facility_13                                       else '' end as ".COLUMN_0501770.", "
."      case when a.facility_14                                      is not null then a.facility_14                                       else '' end as ".COLUMN_0501780.", "
."      case when a.facility_15                                      is not null then a.facility_15                                       else '' end as ".COLUMN_0501790.", "

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
			."	case when b.count_id              is not null then b.count_id              else 0  end as ".COLUMN_ALIAS_COUNT.", "
			."	case when c.principal_amount_2    is not null then c.principal_amount_2    else 0  end as ".COLUMN_1300140." "
			."from "
			."	(mst_funds a "
			."		join "
			."			(select "
			."				fund_id, "
			."				sum(principal_amount_2) as principal_amount_2 "
			."			from "
			."				trn_loan_repayments "
			."			group by "
			."				fund_id "
			."			) c "
			."		on a.fund_id = c.fund_id) "
			."		left join "
			."			(select "
			."				fund_id, "
			."				sum(investment_amount) as investment_amount, "
			."				count(id) as count_id "
			."			from "
			."				trn_investment_histories "
			."			where 1 "
			."				and investment_status_code in (".INVESTMENT_STATUS_CODE_APPLIED.",".INVESTMENT_STATUS_CODE_APPROVED.") "
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
	
	/**
	 * 累計成約金額取得<br>
	 * @return number $result
	 */
	function selectCumulativeLoanAmount() {
		
		// DB接続
		$this->connect();
		$this->select_db();
		
		$sql = ""
			."select "
			."    sum(".COLUMN_0500040.") as ".COLUMN_0500040." "
			."from "
			."    mst_funds "
			.";";
				
		$db_result = mysql_query($sql, $this->db_conn);
		
		$result = 0;
		
		if (!$db_result) {
			die("database error!!".mysql_error());
		} else {
			while ($row = mysql_fetch_assoc($db_result)) {
				$result = $row[COLUMN_0500040];
			}
		}
		
		// DB切断
		$this->close();

		return $result;
	}
	
}
