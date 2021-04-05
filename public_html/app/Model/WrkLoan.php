<?php
App::uses('AppModel', 'Model');
 
class WrkLoan extends AppModel {
	
    /**
	 * 貸付ワーク作成<br>
	 * 貸付マスタのデータをコピーして貸付ワークを作成する。
	 * @param string $admin_id $fund_id
	 * @return array $data
	 */
	public function copyMstLoan($admin_id, $fund_id) {
		
		$sql = ""
			."insert into "
			."    wrk_loans "
			."select "
			."    null as id, "
			."    :admin_id as admin_id, "
			."    fund_id, "
			."    loan_no, "
			."    borrower_name, "
			."    loan_date, "
			."    max_loan_amount, "
			."    loan_amount, "
			."    min_loan_amount, "
			."    interest_rate, "
			."    number_of_repayments, "
			."    repayment_start_year, "
			."    repayment_start_month, "
			."    trade_date, "
			."    repayment_start_date, "
			."    warranty_code, "
			."    collateral_code, "
			."    repayment_method_code, "
			."    dividend_amount, "
			."    tax_amount, "
			."    reward_amount, "
			."    insert_datetime, "
			."    insert_admin_id, "
			."    insert_admin_name, "
			."    update_datetime, "
			."    update_admin_id, "
			."    update_admin_name, "
			."    delete_datetime, "
			."    delete_admin_id, "
			."    delete_admin_name, "
			."    exclusive_key "
			."from "
			."    mst_loans "
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
