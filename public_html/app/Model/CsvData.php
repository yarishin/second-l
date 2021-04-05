<?php
App::uses('AppModel', 'Model');
 
class CsvData extends AppModel {

	public $useTable = false; // テーブル接続無
	
	/**
	 * 経理提出用１<br>
	 * @param datetime $date_from
	 * @param datetime $date_to
	 * @return type
	 */
	public function selectAccounting1($date_from, $date_to) {
		
		$sql = ""
			."select "
			."	a.fund_id                                                                as ".CSV_COLUMN_010010.", "
			."	case when d.loan_no = 999 then '小計' else a.fund_name               end as ".CSV_COLUMN_010020.", "
			."	case when d.loan_no = 999 then '-'    else d.loan_no                 end as ".CSV_COLUMN_010030.", "
			."	case when d.loan_no = 999 then '-'    else d.borrower_name           end as ".CSV_COLUMN_010040.", "
			."	case when d.loan_no = 999 then '-'    else a.admin_yield             end as ".CSV_COLUMN_010050.", "
			."	case when d.loan_no = 999 then '-'    else d.interest_rate           end as ".CSV_COLUMN_010060.", "
			."	d.repayment_amount                                                       as ".CSV_COLUMN_010070.", "
			."	case when d.loan_no != 999 then '-'   else d.principal_amount        end as ".CSV_COLUMN_010080.", "
			."	d.reward_amount                                                          as ".CSV_COLUMN_010090.", "
			."	d.dividend_amount                                                        as ".CSV_COLUMN_010100.", "
			."	case when d.loan_no != 999 then '-'   else e.tax                     end as ".CSV_COLUMN_010110.", "
			."	case when d.loan_no != 999 then '-'   else e.dividend_amount - e.tax end as ".CSV_COLUMN_010120." "
			."from "
			."	(mst_funds a "
			."		join ( "
			."			select "
			."				c.fund_id, c.loan_no, "
			."				case when b.borrower_name is null then '-' else b.borrower_name end as borrower_name, "
			."				case when b.interest_rate is null then '-' else b.interest_rate end as interest_rate, "
			."				c.repayment_amount, c.principal_amount, c.reward_amount, c.dividend_amount "
			."			from "
			."				mst_loans b "
			."					right outer join ( "
			."						select "
			."							fund_id, loan_no, "
			."							repayment_amount, principal_amount, reward_amount, dividend_amount "
			."						from "
			."							trn_reward_histories "
			."						where 1 "
			."							and dividend_datetime >= :date_from "
			."							and dividend_datetime <= :date_to "
			."						union "
			."						select "
			."							fund_id, 999 as loan_no, "
			."							sum(repayment_amount) as repayment_amount, "
			."							sum(principal_amount) as principal_amount, "
			."							sum(reward_amount)    as reward_amount, "
			."							sum(dividend_amount)  as dividend_amount "
			."						from "
			."							trn_reward_histories "
			."						where 1 "
			."							and dividend_datetime >= :date_from "
			."							and dividend_datetime <= :date_to "
			."						group by "
			."							fund_id "
			."						order by "
			."							fund_id, loan_no "
			."					) c "
			."					on 1 "
			."					and b.fund_id = c.fund_id "
			."					and b.loan_no = c.loan_no "
			."		) d "
			."		on a.fund_id = d.fund_id) "
			."		join ( "
			."			select "
			."				fund_id, "
			."				sum(case when dividend_detail_code = 1 then dividend_amount else 0 end) as principal_amount, "
			."				sum(case when dividend_detail_code = 2 then dividend_amount else 0 end) as dividend_amount, "
			."				sum(tax) as tax "
			."			from "
			."				trn_dividend_histories "
			."			where 1 "
			."				and dividend_datetime >= :date_from "
			."				and dividend_datetime <= :date_to "
			."			group by "
			."				fund_id "
			."		) e "
			."		on a.fund_id = e.fund_id "
			."order by "
			."	a.fund_id, "
			."	d.loan_no "
			.";";
		
		$params = array(
			 "date_from" => $date_from
			,"date_to"   => $date_to
		);
		
		$data = $this->query($sql, $params);
		
		return $data;
		
	}

	/**
	 * 経理提出用２<br>
	 * @param datetime $date_from
	 * @param datetime $date_to
	 * @return type
	 */
	public function selectAccounting2($date_from, $date_to) {
		
		$sql = ""
			."select "
			."	concat(a.kanji_last_name, ' ', a.kanji_first_name) as ".CSV_COLUMN_020010.", "
			."	concat(a.furi_last_name, ' ', a.furi_first_name)   as ".CSV_COLUMN_020020.", "
			."	b.fund_id                                          as ".CSV_COLUMN_020030.", "
			."	b.dividend_amount                                  as ".CSV_COLUMN_020040.", "
			."	b.tax                                              as ".CSV_COLUMN_020050.", "
			."	b.dividend_amount - b.tax                          as ".CSV_COLUMN_020060.", "
			."	a.lender_no                                        as ".CSV_COLUMN_020070." "
			."from "
			."	mst_users a "
			."		join ( "
			."			select "
			."				fund_id, "
			."				user_id, "
			."				sum(dividend_amount) as dividend_amount, "
			."				sum(tax) as tax "
			."			from "
			."				trn_dividend_histories "
			."			where 1 "
			."				and dividend_datetime >= :date_from "
			."				and dividend_datetime <= :date_to "
			."			group by "
			."				fund_id, "
			."				user_id "
			."		) b "
			."		on a.user_id = b.user_id "
			."order by "
			."	a.lender_no, "
			."	b.fund_id "
			.";";
		
		$params = array(
			 "date_from" => $date_from
			,"date_to"   => $date_to
		);
		
		$data = $this->query($sql, $params);
		
		return $data;
		
	}
	
	/**
	 * 配当送金<br>
	 * @param datetime $date_from
	 * @param datetime $date_to
	 * @return type
	 */
	public function selectDividendRemittance($date_from, $date_to) {
		
		$sql = ""
			."select "
			."	'3'               as ".CSV_COLUMN_030010.", "
			."	'0000'            as ".CSV_COLUMN_030020.", "
			."	a.bank_code       as ".CSV_COLUMN_030030.", "
			."	a.branch_code     as ".CSV_COLUMN_030040.", "
			."	case "
			."		when a.account_type = 3 then 1 "
			."		else a.account_type "
			."	end               as ".CSV_COLUMN_030050.", "
			."	case "
			."		when a.account_number_yucho is null or a.account_number_yucho = '' then a.account_number "
			."		else a.account_number_yucho "
			."	end               as ".CSV_COLUMN_030060.", "
			."	a.account_name    as ".CSV_COLUMN_030070.", "
			."	b.dividend_amount as ".CSV_COLUMN_030080.", "
			."	a.lender_no       as ".CSV_COLUMN_030090.", "
			."	a.bank_name       as ".CSV_COLUMN_030100.", "
			."	a.branch_name     as ".CSV_COLUMN_030110.", "
			."	a.account_sign    as ".CSV_COLUMN_030120.", "
			."	a.account_number  as ".CSV_COLUMN_030130." "
			."from "
			."	mst_users a "
			."		join ( "
			."			select "
			."				user_id, "
			."				sum(dividend_amount) - sum(tax) as dividend_amount "
			."			from "
			."				trn_dividend_histories "
			."			where 1 "
			."				and dividend_datetime >= :date_from "
			."				and dividend_datetime <= :date_to "
			."			group by "
			."				user_id "
			."		) b "
			."		on a.user_id = b.user_id "
			."order by "
			."	lender_no "
			.";";
		
		$params = array(
			 "date_from" => $date_from
			,"date_to"   => $date_to
		);
		
		$data = $this->query($sql, $params);
		
		return $data;
		
	}
	
	/**
	 * 書面交付状況<br>
	 * @param datetime $date_from
	 * @param datetime $date_to
	 * @return type
	 */
	public function selectDocumentIssue($date_from, $date_to) {
		
		$sql = ""
			."select distinct "
			."	a.lender_no                                        as ".CSV_COLUMN_040010.", "
			."	d.user_id                                          as ".CSV_COLUMN_040020.", "
			."	concat(a.kanji_last_name, ' ', a.kanji_first_name) as ".CSV_COLUMN_040030.", "
			."	d.approval_datetime                                as ".CSV_COLUMN_040040.", "
			."	e.reg_0                                            as ".CSV_COLUMN_040050.", "
			."	e.reg_1                                            as ".CSV_COLUMN_040060.", "
			."	e.reg_2                                            as ".CSV_COLUMN_040070.", "
			."	e.reg_3                                            as ".CSV_COLUMN_040080.", "
			."	e.reg_4                                            as ".CSV_COLUMN_040090.", "
			."	e.reg_5                                            as ".CSV_COLUMN_040100.", "
			."	d.fund_1                                           as ".CSV_COLUMN_040110.", "
			."	d.fund_2                                           as ".CSV_COLUMN_040120.", "
			."	d.fund_3                                           as ".CSV_COLUMN_040130." "
			."from "
			."	((mst_users a "
			."		join ( "
			."			select "
			."				d1.user_id, d1.fund_id, d1.fund_name, d1.investment_amount, d1.application_datetime, d1.approval_datetime, "
			."				max(case when d2.doc_id = '".INV_DOC_ID_00001."' then date_format(d2.agreed_datetime, '%Y-%m-%d %H:%i:%s') else '' end) as fund_1, "
			."				max(case when d2.doc_id = '".INV_DOC_ID_00002."' then date_format(d2.agreed_datetime, '%Y-%m-%d %H:%i:%s') else '' end) as fund_2, "
			."				max(case when d2.doc_id = '".INV_DOC_ID_00003."' then date_format(d2.agreed_datetime, '%Y-%m-%d %H:%i:%s') else '' end) as fund_3 "
			."			from "
			."				((select "
			."					b.user_id, b.fund_id, b.fund_name, b.investment_amount, b.application_datetime, b.approval_datetime "
			."				from "
			."					trn_investment_histories b "
			."						join ( "
			."							select "
			."								user_id, min(application_datetime) as application_datetime "
			."							from "
			."								trn_investment_histories "
			."							where 1 "
			."								and investment_status_code = ".INVESTMENT_STATUS_CODE_APPROVED." "
			."							group by "
			."								user_id "
			."						) as c "
			."						on  b.user_id = c.user_id "
			."						and b.application_datetime = c.application_datetime "
			."						and b.user_id != '".USER_ID_99999999."' "
			."				where 1 "
			."					and b.approval_datetime >= :date_from "
			."					and b.approval_datetime <= :date_to "
			."				) d1 "
			."					join "
			."						trn_agreement_histories d2 "
			."					on  d1.user_id = d2.user_id "
			."					and d1.fund_id = d2.fund_id) "
			."			group by "
			."				d1.user_id, d1.fund_id, d1.fund_name, d1.investment_amount, d1.application_datetime, d1.approval_datetime "
			."		) d "
			."		on  a.user_id = d.user_id) "
			."		join ( "
			."			select "
			."				user_id, "
			."				max(case when doc_id = '".TMP_REG_DOC_ID_00000."' then date_format(agreed_datetime, '%Y-%m-%d %H:%i:%s') else '' end) as reg_0, "
			."				max(case when doc_id = '".REG_DOC_ID_00001    ."' then date_format(agreed_datetime, '%Y-%m-%d %H:%i:%s') else '' end) as reg_1, "
			."				max(case when doc_id = '".REG_DOC_ID_00002    ."' then date_format(agreed_datetime, '%Y-%m-%d %H:%i:%s') else '' end) as reg_2, "
			."				max(case when doc_id = '".REG_DOC_ID_00003    ."' then date_format(agreed_datetime, '%Y-%m-%d %H:%i:%s') else '' end) as reg_3, "
			."				max(case when doc_id = '".REG_DOC_ID_00004    ."' then date_format(agreed_datetime, '%Y-%m-%d %H:%i:%s') else '' end) as reg_4, "
			."				max(case when doc_id = '".REG_DOC_ID_00005    ."' then date_format(agreed_datetime, '%Y-%m-%d %H:%i:%s') else '' end) as reg_5 "
			."			from "
			."				trn_agreement_histories "
			."			where 1 "
			."				and fund_id = '".REG_DOC_CAT_ID."' "
			."			group by "
			."				user_id "
			."		) e "
			."		on  a.user_id = e.user_id) "
			."order by "
			."	a.lender_no asc "
			.";";
		
		$params = array(
			 "date_from" => $date_from
			,"date_to"   => $date_to
		);
		
		$data = $this->query($sql, $params);
		
		return $data;
		
	}
	
	/**
	 * 誕生月取得<br>
	 * 過去に一度でも投資した投資家の内、<br>
	 * 指定した誕生月の投資家データを取得<br>
	 * @param number $year
	 * @param number $month
	 * @return type
	 */
	function selectBirthdayData($year, $month) {
		
		$params = array();
		
		$sql = ""
			."select distinct "
			."	a.lender_no        as ".CSV_COLUMN_050010.", "
			."	a.user_id          as ".CSV_COLUMN_050020.", "
			."	a.kanji_last_name  as ".CSV_COLUMN_050030.", "
			."	a.kanji_first_name as ".CSV_COLUMN_050040.", "
			."	a.furi_last_name   as ".CSV_COLUMN_050050.", "
			."	a.furi_first_name  as ".CSV_COLUMN_050060.", "
			."	a.birthday         as ".CSV_COLUMN_050070.", "
			."	a.zip              as ".CSV_COLUMN_050080.", "
			."	a.address1         as ".CSV_COLUMN_050090.", "
			."	a.address2         as ".CSV_COLUMN_050100.", "
			."	a.address3         as ".CSV_COLUMN_050110.", "
			."	a.fixed_line_phone as ".CSV_COLUMN_050120.", "
			."	a.mobile_phone     as ".CSV_COLUMN_050130." "
			."from "
			."	mst_users                a, "
			."	trn_investment_histories b "
			."where 1 "
			."	and a.user_id                = b.user_id "
			."	and b.investment_status_code = ".INVESTMENT_STATUS_CODE_APPROVED." "
			."";
		if (!is_null($year) && strcmp("", $year) != 0) {
			$sql .= "  and substring(a.birthday, 1, 4) = :year ";
			$params["year"] = sprintf("%04d", $year);
		}
		if (!is_null($month) && strcmp("", $month) != 0) {
			$sql .= "  and substring(a.birthday, 5, 2) = :month ";
			$params["month"] = sprintf("%02d", $month);
		}
		$sql .= ""
			."order by "
			."	a.lender_no "
			.";";
		
		$data = $this->query($sql, $params);
		
		return $data;
		
	}
	
}
