<?php
App::uses('AppModel', 'Model');
 
class TrnLoanRepayment extends AppModel {
	
    /**
	 * 返済(貸付)作成<br>
	 * 返済(貸付)ワークのデータをコピーして返済(貸付)を作成する。
	 * @param string $admin_id, $fund_id
	 * @return array $data
	 */
	public function copyWrkLoanRepayment($admin_id, $fund_id) {
		
		$sql = ""
			."insert into "
			."    trn_loan_repayments "
			."select "
			."    id, "
			."    :fund_id as fund_id, "
			."    loan_no, "
			."    seq_no, "
			."    repayment_date_1, "
			."    repayment_amount_1, "
			."    principal_amount_1, "
			."    interest_amount_1, "
			."    remaining_amount_1, "
			."    dividend_datetime_1, "
			."    dividend_amount_1, "
			."    reward_amount_1, "
			."    repayment_date_2, "
			."    repayment_amount_2, "
			."    principal_amount_2, "
			."    interest_amount_2, "
			."    delay_damages, "
			."    dividend_datetime_2, "
			."    dividend_amount_2, "
			."    tax_2, "
			."    reward_amount_2, "
			."    repayment_datetime_3, "
			."    repayment_admin_id, "
			."    repayment_admin_name, "
			."    dividend_admin_id, "
			."    dividend_admin_name, "
			."    update_datetime, "
			."    update_admin_id, "
			."    update_admin_name "
			."from "
			."    wrk_loan_repayments "
			."where 1 "
			."    and admin_id = :admin_id "
			.";";
		
		$params = array(
			 "admin_id" => $admin_id
			,"fund_id"  => $fund_id
		);
		
		$data = $this->query($sql, $params);
		
		return $data;
		
	}
	
	/**
	 * 返済予定一覧(入力)
	 */
	public function searchLoanRepayment($data) {
		
		$sql = ""
			."select "
			."    t2.fund_name, "
			."    t2.fund_id, "
			."    t1.id, "
			."    t1.loan_no, "
			."    t1.seq_no, "
			."    t1.repayment_date_1, "
			."    t1.repayment_amount_1, "
			."    t1.principal_amount_1, "
			."    t1.interest_amount_1, "
			."    t1.remaining_amount_1, "
			."    t1.dividend_datetime_1, "
			."    t1.dividend_amount_1, "
			."    t1.reward_amount_1, "
			."    t1.repayment_date_2, "
			."    t1.principal_amount_2, "
			."    t1.interest_amount_2, "
			."    t1.delay_damages, "
			."    t1.dividend_datetime_2 "
			."from "
			."    trn_loan_repayments as t1 "
			."        join "
			."            mst_funds as t2 "
			."        on 1 "
			."        and t1.fund_id           = t2.fund_id "
			."        and t2.loan_amount_total > 0 "
			."";
		
		$params =array();
		
		// 検索条件
		if (isset($data[SEARCH_ID_050190030])){
			
			$sql .= "and t1.fund_id = :fund_id";
			
			$params['fund_id'] = $data[SEARCH_ID_050190030];
		}
		
		if (isset($data[SEARCH_ID_050190010]) && isset($data[SEARCH_ID_050190020])){
			
			$sql .= " where t1.repayment_date_1 >= :repayment_date_1_from";
			$sql .= "   and t1.repayment_date_1 <= :repayment_date_1_to";
			
			$params['repayment_date_1_from'] = $data[SEARCH_ID_050190010];
			$params['repayment_date_1_to']   = $data[SEARCH_ID_050190020];
		}
		
		// ソート
		$sql .= " order by ";
		
		$asc = MODEL_ASC;
		if (strcmp(SORT_ORDER_CODE_DESC, $data[SEARCH_ID_050190050]) == 0) {
			$asc = MODEL_DESC;
		}
		
		if (strcmp(SORT_COLUMN_CODE_REPAYMENT_FUND_ID, $data[SEARCH_ID_050190040]) == 0) {
			$sql .= "t2.fund_id ".$asc.", ";
			$sql .= "t1.loan_no ".MODEL_ASC;
		}
		elseif (strcmp(SORT_COLUMN_CODE_REPAYMENT_FUND_NAME, $data[SEARCH_ID_050190040]) == 0) {
			$sql .= "t2.fund_name ".$asc;
		}
		else {
			$sql .= "t1.repayment_date_1 ".$asc;
		}
		
		$data = $this->query($sql, $params);
		
		return $data;
	}
	
	/**
	 * 配当実行(入力)
	 */
	public function searchLoanRepayment2($date_start, $date_end) {
		
		$sql = "SELECT
					t2.fund_name,
					t2.fund_id,
					t2.admin_yield,
					t2.operating_start,
					t2.loan_amount_total,
					t3.loan_no,
					t3.interest_rate,
					sum(t1.repayment_amount_1) as repayment_amount_1,
					sum(t1.dividend_amount_1) as dividend_amount_1,
					sum(t1.repayment_amount_2) as repayment_amount_2,
					sum(t1.principal_amount_2) as principal_amount_2,
					sum(t1.interest_amount_2) as interest_amount_2,
					sum(t1.delay_damages) as delay_damages
				FROM 
					`trn_loan_repayments` t1, mst_funds t2, mst_loans t3
				WHERE
					t2.fund_id = t1.fund_id
				AND
					t3.fund_id = t1.fund_id
				AND
					t3.loan_no = t1.loan_no
				AND
					t1.dividend_datetime_2 is null
				AND
					t1.repayment_date_2 is not null
				AND
					t1.repayment_date_2 >= :date_start
				AND
					t1.repayment_date_2 <= :date_end
				GROUP BY
					t1.fund_id, t1.loan_no
				ORDER BY
					t1.fund_id, t1.loan_no
				";
		
		$params =array(
			'date_start' => $date_start,
			'date_end'   => $date_end
		);
		
		$data = $this->query($sql, $params);
		
		return $data;
	}
	
	/**
	 * 配当実行(確認)：決定ボタン
	 */
	public function searchLoanRepayment3($fund_id, $date_start, $date_end) {
		
		$sql = "SELECT
					max(fund_id) as fund_id,
					max(seq_no) as seq_no,
					sum(repayment_amount_1) as repayment_amount_1,
					sum(dividend_amount_1) as dividend_amount_1,
					sum(repayment_amount_2) as repayment_amount_2,
					sum(principal_amount_2) as principal_amount_2
				FROM 
					trn_loan_repayments
				WHERE
					fund_id = :fund_id
				AND
					dividend_datetime_2 is not null
				AND
					repayment_date_2 is not null
				AND
					repayment_date_2 >= :date_start
				AND
					repayment_date_2 <= :date_end
				GROUP BY
					fund_id, seq_no
				";
		
		$params =array(
			'fund_id'    => $fund_id,
			'date_start' => $date_start,
			'date_end'   => $date_end
		);
		
		$data = $this->query($sql, $params);
		
		return $data;
	}
	
	/**
	 * 返済予定一覧(入力) : 遅延
	 */
	public function searchDelayLoanRepayment($date) {
		
		$sql = "SELECT
					t2.fund_name,
					t2.fund_id,
					t1.id,
					t1.loan_no,
					t1.seq_no,
					t1.repayment_date_1,
					t1.repayment_amount_1,
					t1.dividend_amount_1,
					t1.reward_amount_1,
					t1.repayment_date_2,
					t1.principal_amount_2,
					t1.interest_amount_2,
					t1.delay_damages
				FROM 
					`trn_loan_repayments` as t1 
				JOIN
					mst_funds as t2
				ON
					t1.fund_id = t2.fund_id
				AND
					t1.repayment_date_1 <= :date
				AND 
					t2.loan_amount_total > 0
				AND
					t1.repayment_date_2 is null
				";
		
		$params['date'] = $date;
		
		$data = $this->query($sql, $params);
		
		return $data;
	}
	
	/**
	 * 返済予定一覧 : 最後の通し番号
	 */
	public function getMaxSeqNo($fund_id, $loan_no) {
		
		$sql = ""
			."select "
			."	b.seq_no, "
			."	a.loan_amount - b.principal_amount_2 as remaining_amount_1, "
			."	b.repayment_date_1, "
			."	a.trade_date "
			."from "
			."	mst_loans a, "
			."	(select "
			."		fund_id, "
			."		loan_no, "
			."		max(seq_no) as seq_no, "
			."		sum(principal_amount_2) as principal_amount_2, "
			."		max(repayment_date_1) as repayment_date_1 "
			."	from "
			."		trn_loan_repayments "
			."	where 1 "
			."		and fund_id = :fund_id "
			."		and loan_no = :loan_no "
			."	group by "
			."		fund_id, "
			."		loan_no "
			."	) b "
			."where 1 "
			."	and a.fund_id = b.fund_id "
			."	and a.loan_no = b.loan_no "
			."";
		
		$params['fund_id'] = $fund_id;
		$params['loan_no'] = $loan_no;
	
		$data = $this->query($sql, $params);
		
		return $data;
	}
	
	/**
	 * 配当実行対象取得<br>
	 * @param datetime $date_from $date_to
	 * @return array $data
	 */
	function selectDividendTarget($date_from, $date_to, $fund_id_list = null) {
		
		$sql = ""
			."select "
			."    a.fund_id, "
			."    a.fund_name, "
			."    a.loan_amount_total, "
			."    a.admin_yield, "
			."    b.loan_no, "
			."    b.loan_amount, "
			."    b.interest_rate, "
			."    c.repayment_amount_1, "
			."    c.dividend_amount_1, "
			."    c.repayment_amount_2, "
			."    c.principal_amount_2, "
			."    c.interest_amount_2, "
			."    c.delay_damages "
			."from "
			."    mst_funds a, "
			."    mst_loans b, "
			."    (select "
			."        fund_id, "
			."        loan_no, "
			."        sum(repayment_amount_1) as repayment_amount_1, "
			."        sum(dividend_amount_1)  as dividend_amount_1, "
			."        sum(repayment_amount_2) as repayment_amount_2, "
			."        sum(principal_amount_2) as principal_amount_2, "
			."        sum(interest_amount_2)  as interest_amount_2, "
			."        sum(delay_damages)      as delay_damages "
			."    from "
			."        trn_loan_repayments "
			."    where 1 "
			."        and repayment_date_2 >= :date_from "
			."        and repayment_date_2 <= :date_to "
			."        and dividend_datetime_2 is null "
			."";
		
		if (!is_null($fund_id_list) && is_array($fund_id_list)) {
			$sql .= "and fund_id  in (";
			$count = 1;
			foreach ($fund_id_list as $fund_key => $fund_value) {
				$sql .= $count > 1 ? ", " : "";
				$sql .= ":fund_id_".$count++;
			}
			$sql .= ") ";
		}
		
		$sql .= ""
			."    group by "
			."        fund_id, "
			."        loan_no "
			."    ) c "
			."where 1 "
			."    and a.fund_id = b.fund_id "
			."    and a.fund_id = c.fund_id "
			."    and b.loan_no = c.loan_no "
			."order by "
			."    a.fund_id, "
			."    b.loan_no "
			.";";
		
		$params["date_from"] = $date_from;
		$params["date_to"]   = $date_to;
		if (!is_null($fund_id_list) && is_array($fund_id_list)) {
			$count = 1;
			foreach ($fund_id_list as $fund_key => $fund_value) {
				$params["fund_id_".$count++] = $fund_value;
			}
		}
		
		$data = $this->query($sql, $params);
		
		return $data;
	}

	/**
	 * 
	 * @param string $fund_id
	 * @param number $loan_no
	 * @param datetime $date_to
	 * @return type
	 */
	function selectRemainingPricipal($fund_id, $loan_no, $date_to) {
		
		$sql = ""
			."select "
			."    fund_id, "
			."    loan_no, "
			."    principal_amount_2 "
			."from "
			."    (select "
			."        fund_id, "
			."        loan_no, "
			."        sum(principal_amount_2) as principal_amount_2 "
			."    from "
			."        trn_loan_repayments "
			."    where 1 "
			."        and fund_id           = :fund_id "
			."        and loan_no           = :loan_no "
			."        and repayment_date_2 <= :date_to "
			."    group by "
			."        fund_id, "
			."        loan_no "
			."    ) a "
			."order by "
			."    fund_id, "
			."    loan_no "
			.";";
		
		$params["fund_id"]   = $fund_id;
		$params["loan_no"]   = $loan_no;
		$params["date_to"]   = $date_to;
		
		$data = $this->query($sql, $params);
		
		return $data;
	}
	
}
