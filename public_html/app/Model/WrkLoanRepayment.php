<?php
App::uses('AppModel', 'Model');
 
class WrkLoanRepayment extends AppModel {
	
    /**
	 * 返済(貸付)ワーク作成<br>
	 * 返済(貸付)テーブルのデータをコピーして返済(貸付)ワークを作成する。
	 * @param string $admin_id $fund_id
	 * @return array $data
	 */
	public function copyTrnLoanRepayment($admin_id, $fund_id) {
		
		$sql = ""
			."insert into "
			."    wrk_loan_repayments "
			."select "
			."    null as id, "
			."    :admin_id as admin_id, "
			."    fund_id, "
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
			."    trn_loan_repayments "
			."where 1 "
			."    and fund_id = :fund_id "
			.";";
		
		$params = array(
			 "admin_id" => $admin_id
			,"fund_id"  => $fund_id
		);
		
		$data = $this->query($sql, $params);
		
		return $data;
		
	}

	
}
