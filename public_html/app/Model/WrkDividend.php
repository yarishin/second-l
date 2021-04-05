<?php
App::uses('AppModel', 'Model');
 
class WrkDividend extends AppModel {
	
    /**
	 * 配当履歴登録データ取得<br>
	 * 配当履歴として登録するための金額を投資家毎に取得<br>
	 * @param string $admin_id
	 * @return array $data
	 */
	public function selectDividendAmountUser($admin_id) {
		
		$sql = ""
			."select "
			."    b.user_id, "
			."    b.mail_address, "
			."    b.kanji_last_name, "
			."    b.kanji_first_name, "
			."    c.fund_id, "
			."    c.fund_name, "
			."    a.principal_amount, "
			."    a.dividend_amount "
			."from "
			."    (select "
			."        user_id, "
			."        fund_id, "
			."        sum(principal_amount) as principal_amount, "
			."        sum(dividend_amount)  as dividend_amount "
			."    from "
			."        wrk_dividends "
			."    where 1 "
			."        and admin_id = :admin_id "
			."    group by "
			."        user_id, "
			."        fund_id "
			."    ) a, "
			."    mst_users b, "
			."    mst_funds c "
			."where 1 "
			."    and a.user_id = b.user_id "
			."    and a.fund_id = c.fund_id "
			."order by "
			."    b.lender_no, "
			."    c.fund_id "
			.";";
		
		$params["admin_id"] = $admin_id;
		
		$data = $this->query($sql, $params);
		
		return $data;
		
	}

    /**
	 * 営業者報酬履歴登録データ取得<br>
	 * 営業者履歴に登録するための金額を貸付毎に取得<br>
	 * @param string $admin_id
	 * @param string $fund_id
	 * @param number $loan_no
	 * @return array $data
	 */
	public function selectDividendAmountLoan($admin_id, $fund_id, $loan_no) {
		
		$sql = ""
			."select "
			."    fund_id, "
			."    loan_no, "
			."    sum(principal_amount) as principal_amount, "
			."    sum(dividend_amount)  as dividend_amount "
			."from "
			."    wrk_dividends "
			."where 1 "
			."    and admin_id = :admin_id "
			."    and fund_id  = :fund_id "
			."    and loan_no  = :loan_no "
			."order by "
			."    fund_id, "
			."    loan_no "
			.";";
		
		$params["admin_id"] = $admin_id;
		$params["fund_id"]  = $fund_id;
		$params["loan_no"]  = $loan_no;
		
		$data = $this->query($sql, $params);
		
		return $data;
		
	}

	
	
}
