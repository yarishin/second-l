<?php
App::uses('AppModel', 'Model');
 
class WrkFundRepayment extends AppModel {
	
    /**
	 * 返済(ファンド)ワーク登録<br>
	 * 返済(貸付)ワークのデータを集計して返済(ファンド)ワークを作成する。<br>
	 * @param string $admin_id
	 * @return boolean $data
	 */
	public function totalLoanRepayment($admin_id) {
		
		$sql = ""
			."set @num := 0; "
			."insert into "
			."    wrk_fund_repayments "
			."select "
			."    null as id, "
			."    admin_id, "
			."    fund_id, "
			."    (@num := @num + 1)      as seq_no, "
			."    repayment_date_1, "
			."    sum(repayment_amount_1) as repayment_amount_1, "
			."    sum(principal_amount_1) as principal_amount_1, "
			."    sum(interest_amount_1)  as interest_amount_1, "
			."    sum(remaining_amount_1) as remaining_amount_1, "
			."    sum(dividend_amount_1)  as dividend_amount_1, "
			."    sum(reward_amount_1)    as reward_amount_1, "
			."    null                    as repayment_date_2, "
			."    sum(repayment_amount_2) as repayment_amount_2, "
			."    sum(principal_amount_2) as principal_amount_2, "
			."    sum(interest_amount_2)  as interest_amount_2, "
			."    sum(delay_damages)      as delay_damages, "
			."    sum(dividend_amount_2)  as dividend_amount_2, "
			."    sum(tax_2)              as tax_2, "
			."    sum(reward_amount_2)    as reward_amount_2 "
			."from "
			."    (select "
			."        admin_id, "
			."        fund_id, "
			."        date_format(repayment_date_1, '%Y/%m/01') as repayment_date_1, "
			."        repayment_amount_1, "
			."        principal_amount_1, "
			."        interest_amount_1, "
			."        remaining_amount_1, "
			."        dividend_amount_1, "
			."        reward_amount_1, "
			."        null as repayment_date_2, "
			."        repayment_amount_2, "
			."        principal_amount_2, "
			."        interest_amount_2, "
			."        delay_damages, "
			."        dividend_amount_2, "
			."        tax_2, "
			."        reward_amount_2 "
			."    from "
			."        wrk_loan_repayments "
			."    where 1 "
			."        and admin_id = :admin_id "
			."    ) a "
			."group by "
			."    fund_id, "
			."    repayment_date_1 "
			."order by "
			."    fund_id, "
			."    repayment_date_1 "
			.";";
		
		$params = array(
			 "admin_id" => $admin_id
		);
		
		$data = $this->query($sql, $params);
		
		return $data;
		
	}

}
