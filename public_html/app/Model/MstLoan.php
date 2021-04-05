<?php
App::uses('AppModel', 'Model');
 
class MstLoan extends AppModel {
	
    /**
	 * 貸付マスタ作成<br>
	 * 貸付ワークのデータをコピーして貸付マスタを作成する。
	 * @param string $admin_id, $fund_id
	 * @return array $data
	 */
	public function copyWrkLoan($admin_id, $fund_id) {
		
		$sql = ""
			."insert into "
			."    mst_loans "
			."select "
			."    id, "
			."    :fund_id as fund_id, "
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
			."    wrk_loans "
			."where 1 "
			."    and admin_id = :admin_id "
			.";";
		
		$params = array(
			 "admin_id" => $admin_id
			,"fund_id" => $fund_id
		);
		
		$data = $this->query($sql, $params);
		
		return $data;
		
	}


	
}
