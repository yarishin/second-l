<?php
App::uses('AppModel', 'Model');
 
class TrnInvestmentHistory extends AppModel {
	
	public $validate = array(
		
		// 投資金額
		COLUMN_1200070 => array(
			'custom01' => array(
				'rule'    => 'isNotEmpty',
				'message' => '投資金額は入力必須です。'
			),
			'custom02' => array(
				'rule'    => 'isInteger',
				'message' => '半角数字のみを入力して下さい。'
			),
			'custom03' => array(
				'rule'    => 'isMultiple',
				'message' => '最低投資可能金額の倍数を入力して下さい。'
			),
			'custom04' => array(
				'rule'    => 'isMaxRenge',
				'message' => '現在投資可能な金額を超えました。投資金額を減らして下さい。'
			)
		)
	);
	
	/**
	 * 投資金額の必須チェック<br>
	 * 投資金額が入力されていれば True<br>
	 * @return boolean $result
	 */
	public function isNotEmpty() {
		$result = false;
		if (strcmp("", $this->data[MODEL_NAME_120][COLUMN_1200070]) != 0) {
			$result = true;
		}
		return $result;
	}
	
	/**
	 * 整数チェック<br>
	 * 投資金が整数のみであれば True<br>
	 * @param number $amount
	 * @return boolean $result
	 */
	public function isInteger($amount) {
		$result = false;
		if(preg_match(REGEX_INTEGER, $amount)){
			$result = true;
		}
		return $result;
	}
	
	/**
	 * 投資金額の単位チェック<br>
	 * 投資金額が最少投資金額の倍数であれば True<br>
	 * @param number $min_amount
	 * @return boolean $result
	 */
	public function isMultiple($min_amount) {
		$result = false;
		if (intval($this->data[MODEL_NAME_120][COLUMN_1200070]) % intval($min_amount) == 0) {
			$result = true;
		}
		return $result;
	}
	
	/**
	 * 投資金額の範囲チェック<br>
	 * 投資金額が現在投資可能な金額の最大以内であれば True<br>
	 * @param number $max_amount
	 * @return boolean $result
	 */
	public function isMaxRage($max_amount) {
		$result = false;
		if (intval($max_amount) < intval($this->data[MODEL_NAME_120][COLUMN_1200070])) {
			$result = true;
		}
		return $result;
	}
	
    /**
	 * 投資履歴取得<br>
	 * 指定した条件に合致する投資履歴を取得する。
	 * @param string $user_id, $date_from, $date_to
	 * @return array $data
	 */
	public function getInvestmentHistories($user_id, $date_from, $date_to) {
		$sql = ""
			."select "
			."    case when a.fund_id              is not null then a.fund_id              else '' end as fund_id, "
			."    case when b.fund_name            is not null then b.fund_name            else '' end as fund_name,"
			."    case when a.application_datetime is not null then a.application_datetime else '' end as application_datetime, "
			."    case when a.investment_amount    is not null then a.investment_amount    else '' end as investment_amount, "
			."    date_format(a.expiration_datetime, '%Y/%m/%d')                                       as expiration_datetime, "
			."    date_format(a.approval_datetime  , '%Y/%m/%d')                                       as approval_datetime, "
			."    date_format(a.cancel_datetime    , '%Y/%m/%d')                                       as cancel_datetime, "
			."    case when c.doc_id               is not null then c.doc_id               else '' end as doc_id, "
			."    case when c.doc_name             is not null then c.doc_name             else '' end as doc_name,"
			."    case when c.revision             is not null then c.revision             else '' end as revision "
			."from "
			."    ((trn_investment_histories a "
			."        join "
			."            mst_funds b "
			."        on  a.fund_id = b.fund_id) "
			."        left join "
			."            trn_agreement_histories  c "
			."        on  a.user_id              = c.user_id "
			."        and a.fund_id              = c.fund_id "
			."        and a.application_datetime = c.application_datetime) "
			."where 1 "
			."";
		
		$params = null;
		
		if (!is_null($user_id) && strcmp("", $user_id) != 0) {
			$sql .= "    and a.user_id = :user_id ";
			$params["user_id"]   = $user_id;
		}
		if (!is_null($date_from) && strcmp("", $date_from) != 0) {
			$sql .= "    and a.application_datetime >= :date_from ";
			$params["date_from"] = $date_from;
		}
		if (!is_null($date_to) && strcmp("", $date_to) != 0) {
			$sql .= "    and a.application_datetime <= :date_to ";
			$params["date_to"]   = $date_to;
		}
		
		$sql .= ""
			."order by "
			."    application_datetime desc "
			.";";
			
		
		$data = $this->query($sql, $params, false);
		
		return $data;
		
	}
       function getInvestmentHistories_777($user_id) {
	$sql = ""
                        ."select "
                        ."    a.user_id, a.fund_id, a.investment_amount, a.expiration_datetime, a.investment_status_code, a.approval_datetime, a.deposit_date, b.delay_1, b.ended "
                        ."from "
                        ."    trn_investment_histories a "
                        ."        inner join "
                        ."            mst_funds b "
                        ."        on  "
                        ."        a.fund_id            = b.fund_id "
                        ."where "
                        ."    a.user_id                = :user_id  "
                        //."    and a.dividend_detail_code = :dividend_detail_code "
                        //."    a.dividend_detail_code = 1 "
                        ."";
                        //."group by a.fund_id";

                $params = array(
                         "user_id"                => $user_id
                        //,"investment_status_code" => INVESTMENT_STATUS_CODE_APPROVED
                        //,"dividend_detail_code" => 1
                );
                $data = $this->query($sql, $params);

                return $data;

        }

       // 年間取引報告書用です
       // 強制終了フラグが出たものだけ取得
       function getInvestmentHistories_year($user_id, $date_from, $date_to) {
	$sql = ""
                        ."select "
                        ."    a.user_id, a.fund_id, a.investment_amount, a.expiration_datetime, a.investment_status_code, a.approval_datetime, a.deposit_date, b.delay_1, b.ended, b.ended_date "
                        ."from "
                        ."    trn_investment_histories a "
                        ."        inner join "
                        ."            mst_funds b "
                        ."        on  "
                        ."        a.fund_id            = b.fund_id "
                        ."where "
                        ."    a.user_id                = :user_id  "
                        ."    and b.ended = 1 "
                        ."    and a.investment_status_code = 1 "
                        ."    and b.ended_date >= :date_from "
                        ."    and b.ended_date <= :date_to "
                        ."";
                        //."group by a.fund_id";

                $params = array(
                         "user_id"                => $user_id
                        ,"date_from"              => $date_from
			,"date_to"                => $date_to
                );
                $data = $this->query($sql, $params);

                return $data;

        }


       //MyPage用の集計データ
       function getInvestmentHistories_page($user_id) {
        $sql = ""
                        ."SELECT "
                        ."TrnInvestmentHistory.id, TrnInvestmentHistory.user_id, TrnInvestmentHistory.user_name, TrnInvestmentHistory.user_name_kana, "
                        ."TrnInvestmentHistory.fund_id, TrnInvestmentHistory.fund_name, TrnInvestmentHistory.application_datetime, TrnInvestmentHistory.investment_amount, "
                        ."TrnInvestmentHistory.expiration_datetime, TrnInvestmentHistory.investment_status_code,"
                        ."TrnInvestmentHistory.approval_datetime, TrnInvestmentHistory.approval_admin_id, TrnInvestmentHistory.approval_admin_name, "
                        ."TrnInvestmentHistory.cancel_datetime, TrnInvestmentHistory.cancel_admin_id, TrnInvestmentHistory.cancel_admin_name, TrnInvestmentHistory.update_datetime, "
                        ."TrnInvestmentHistory.update_admin_id, TrnInvestmentHistory.update_admin_name, TrnInvestmentHistory.deposit_date," 
                        ."b.delay_1, b.ended, b.operating_start, b.operating_end, b.max_loan_amount_total, b.loan_amount_total, b.min_loan_amount_total, b.min_investment_amount, b.post_datetime, b.inviting_start, "
                        ."b.inviting_end, b.operating_term, b.admin_yield, b.target_yield, b.documents_application_end_date, b.documents_scheduled_start_date, b.documents_scheduled_end_date, b.documents_contract_start_date, "
                        ."c. principal_amount_2"
                        ." FROM "
                        ."    trn_investment_histories TrnInvestmentHistory "
                        ."    LEFT OUTER JOIN "
                        ."            mst_funds b "
                        ."        ON  "
                        ."        TrnInvestmentHistory.fund_id            = b.fund_id "
                        ."    LEFT OUTER JOIN "
                        ."   ("
                        ."select " 
                        ." k.fund_id, t.principal_amount_2 "
                        ." from "
                        ."(select fund_id, sum(principal_amount_2) as principal_amount_2 from trn_loan_repayments group by fund_id) k " 
                        ."inner join    "
                        ."trn_loan_repayments t "
                        ."on "
                        ."k.fund_id = t.fund_id "
                        ."and "
                        ."k.principal_amount_2 = t.principal_amount_2 "
                        .") as c "
                        ."        ON  "
                        ."TrnInvestmentHistory.fund_id            = c.fund_id "
                        ." WHERE 1"
                        ." AND   TrnInvestmentHistory.user_id                = :user_id  "
                        ." AND   TrnInvestmentHistory.investment_status_code  = :status_code  "
                        ."order by "
                        ." TrnInvestmentHistory.id DESC";

                $params = array(
                         "user_id"                => $user_id ,
                         "status_code"                => '1'
                );
                $data = $this->query($sql, $params);

                return $data;

        }

       function getInvestmentHistories_doc($user_id, $fund_id, $application_datetime) {
	$sql = ""
                        ."select "
                        ."    a.user_id, a.fund_id, a.investment_amount, a.expiration_datetime, a.investment_status_code, a.approval_datetime "
                        ."from "
                        ."    trn_investment_histories a "
                        ."where "
                        ."    a.user_id                = :user_id  "
                        ."    a.fund_id                = :fund_id  "
                        ."    a.application_datetime   = :application_datetime  "
                        //."    and a.dividend_detail_code = :dividend_detail_code "
                        //."    a.dividend_detail_code = 1 "
                        ."";
                        //."group by a.fund_id";

                $params = array(
                         "user_id"                => $user_id
                        //."fund_id"                => $fund_id
                        //."application_datetime"   => $application_datetime
                        //,"investment_status_code" => INVESTMENT_STATUS_CODE_APPROVED
                        //,"dividend_detail_code" => 1
                );
                $data = $this->query($sql, $params);

                return $data;

        }

       function getInvestmentHistories_unpaid($user_id) {
$user_id = '04886538';	
$sql = ""
                        ."select "
                        ."    a.user_id, a.fund_id, a.investment_amount, a.expiration_datetime, a.investment_status_code, a.approval_datetime "
                        ."from "
                        ."    trn_investment_histories a "
                        ."where "
                        ."    a.user_id                = :user_id  "
                        //."    a.fund_id                = :fund_id  "
                        //."    a.application_datetime   = :application_datetime  "
                        //."    and a.dividend_detail_code = :dividend_detail_code "
                        //."    a.dividend_detail_code = 1 "
                        ."";
                        //."group by a.fund_id";

                $params = array(
                         "user_id"                => $user_id
                        //."fund_id"                => $fund_id
                        //."application_datetime"   => $application_datetime
                        //,"investment_status_code" => INVESTMENT_STATUS_CODE_APPROVED
                        //,"dividend_detail_code" => 1
                );
                $data = $this->query($sql, $params);

                return $data;

        }
//*遅延表示のためのファンクションv050InvestmentHistories
       function getInvestmentHistories_user($user_id, $date_from, $date_to) {
        if(empty($date_from)){ 
		$date_from = '1967/12/12 00:00:00';
		}else{
//		$date_from = '1967/06/02 00:00:00';
		}


        if(empty($date_to)){ 
		$date_to = '2100/12/12 00:00:00';
		}else{
//		$date_to = '2100/06/02 00:00:00';
		}



		$sql = ""
                        ."select "
                        ."    a.id, a.user_id, a.fund_id, a.application_datetime, a.application_datetime, b.delay_1 "
                        ."from "
                        ."    trn_investment_histories a "
                        ."        inner join "
                        ."            mst_funds b "
                        ."        on  "
                        ."        a.fund_id            = b.fund_id "
                        ."where "
                        ."    a.user_id                = :user_id  "
                        ."    and a.application_datetime >= :date_from "
                        ."    and a.application_datetime <= :date_to "
                        ."order by a.id DESC";

                $params = array(
                         "user_id"   => $user_id
			,"date_from" => $date_from
			,"date_to"   => $date_to
                );
               $data = $this->query($sql, $params);

                return $data;

        }


	/**
	 * 運用準備中金額取得 承認で入金済みのみ表示
	 * @param string $user_id
	 * @return array $data
	 */
	function getPreparationAmount($user_id) {
		
		$sql = ""
			."select "
			."    sum(investment_amount) as investment_amount "
			."from "
			."    trn_investment_histories a "
			."        join "
			."            mst_funds b "
			."        on 1 "
			."        and a.fund_id           = b.fund_id "
			."        and b.loan_amount_total = 0 "
			."where 1 "
			."    and a.user_id                = :user_id  "
                        //."    and a.investment_status_code in (:investment_status_code_1, :investment_status_code_2) "
			."    and a.investment_status_code = :investment_status_code_2 "
                        ."    and a.deposit_date IS NOT NULL  "
			."";
		
		$params = array(
			 "user_id"                  => $user_id
			//,"investment_status_code_1" => INVESTMENT_STATUS_CODE_APPLIED  //0申請中
			,"investment_status_code_2" => INVESTMENT_STATUS_CODE_APPROVED  //1承認
		);
			
		$data = $this->query($sql, $params);
		
		return $data;
		
	}

	/**
	 * 運用中金額取得
	 * @param string $user_id
	 * @return array $data
	 */
	function getOperatingAmount($user_id) {
		
		$sql = ""
			."select "
			."    sum(investment_amount) as investment_amount "
			."from "
			."    trn_investment_histories a "
			."        join "
			."            mst_funds b "
			."        on 1 "
			."        and a.fund_id            = b.fund_id "
			."        and b.operating_start   <= now() "
			."        and b.operating_end     >= now() "
			."        and b.loan_amount_total >  0 "
			."where 1 "
			."    and a.user_id                = :user_id  "
			."    and a.investment_status_code = :investment_status_code "
			."";
		
		$params = array(
			 "user_id"                => $user_id
			,"investment_status_code" => INVESTMENT_STATUS_CODE_APPROVED
		);
			
		$data = $this->query($sql, $params);
		
		return $data;
		
	}
	
	/**
	 * 運用中金額取得(引き渡し)
	 * @param string $user_id
	 * @return array $data
	 */
	function getOperatingAmount_1($user_id) {
		
		$sql = ""
			."select "
			."    sum(investment_amount) as investment_amount "
			."from "
			."    trn_investment_histories a "
			."        join "
			."            mst_funds b "
			."        on 1 "
			."        and a.fund_id            = b.fund_id "
			."        and b.operating_start   <= now() "
			//."        and b.operating_end     >= now() "
			."        and b.loan_amount_total >  0 "
			."where 1 "
			."    and a.user_id                = :user_id  "
			."    and a.investment_status_code = :investment_status_code "
			."";
		
		$params = array(
			 "user_id"                => $user_id
			,"investment_status_code" => INVESTMENT_STATUS_CODE_APPROVED
		);
			
		$data = $this->query($sql, $params);
		
		return $data;
		
	}

        function getOperatingAmount_2($user_id) {

                $sql = ""
                        ."select "
                        ."    sum(investment_amount) as investment_amount "
                        ."from "
                        ."    trn_investment_histories a "
                        ."        join "
                        ."            mst_funds b "
                        ."        on 1 "
                        ."        and a.fund_id            = b.fund_id "
                        ."        and b.operating_start   <= now() "
                        //."        and b.operating_end     >= now() "
                        ."        and b.loan_amount_total >  0 "
                        ."where 1 "
                        ."    and a.user_id                = :user_id  "
                        ."    and a.investment_status_code = :investment_status_code "
                        ."    and b.operating_end <= now() "
			."and b.delay_1 = 0"
			."";

                $params = array(
                         "user_id"                => $user_id
                        ,"investment_status_code" => INVESTMENT_STATUS_CODE_APPROVED
                );

                $data = $this->query($sql, $params);

                return $data;

        }








	/**
	 * 運用中のローンファンド取得<br>
	 * 取引残高報告書の【運用中のローンファンド】に表示するデータを取得<br>
	 * @param string $user_di
	 * @param datetime $date_to
	 * @return array $data
	 */
	function selectTradeBalanceReport1($user_id, $date_to) {
		
		$sql = ""
			."select "
			."    a.fund_id               as ".COLUMN_0500010.", "
			."    a.fund_name             as ".COLUMN_0500020.", "
			."    a.min_investment_amount as ".COLUMN_0500060.", "
			."    a.admin_yield           as ".COLUMN_0500130.", "
			."    b.investment_amount     as ".COLUMN_1200070.", "
			."    b.approval_datetime     as ".COLUMN_1200100." "
			."from "
			."    (((select distinct "
			."        aa.fund_id, "
			."        aa.fund_name, "
			."        aa.loan_amount_total, "
			."        aa.min_investment_amount, "
			."        aa.admin_yield "
			."    from "
			."        mst_funds aa "
			."            join "
			."                mst_loans ab "
			."            on 1 "
			."            and aa.fund_id    = ab.fund_id "
			."            and aa.delay_1    = 0 "
			."            and ab.loan_date <= :date_to "
			."    ) a "
			."        join ( "
			."            select "
			."                * "
			."            from "
			."                trn_investment_histories "
			."            where 1 "
			."                and user_id                 = :user_id "
			."                and investment_status_code  = :investment_status_code "
			."                and approval_datetime      <= :date_to) b "
			."        on 1 "
			."        and a.fund_id = b.fund_id) "
			."        left join ( "
			."            select "
			."                fund_id, "
			."                case when sum(principal_amount_2) is null then 0 else sum(principal_amount_2) end as principal_amount_2 "
			."            from "
			."                trn_loan_repayments "
			."            where 1 "
			."                and repayment_date_2 <= :date_to "
			."            group by "
			."                fund_id) c "
			."        on 1 "
			."        and a.fund_id = c.fund_id) "
			."where 1 "
			."    and a.loan_amount_total > 0 "
			."    and (c.principal_amount_2 is null "
			."        or a.loan_amount_total > c.principal_amount_2) "
			."order by "
			."    a.fund_id, "
			."    b.approval_datetime "
			."";
		
		$params = array(
			 "user_id"                => $user_id
			,"investment_status_code" => INVESTMENT_STATUS_CODE_APPROVED
			,"date_to"                => $date_to
		);
			
		$data = $this->query($sql, $params);
		
		return $data;
		
	}



        function selectTradeBalanceReport1_1($user_id, $date_to) {

                $sql = ""
                        ."select "
                        ."    a.fund_id               as ".COLUMN_0500010.", "
                        ."    a.fund_name             as ".COLUMN_0500020.", "
                        ."    a.min_investment_amount as ".COLUMN_0500060.", "
                        ."    a.admin_yield           as ".COLUMN_0500130.", "
                        ."    b.investment_amount     as ".COLUMN_1200070.", "
                        ."    b.approval_datetime     as ".COLUMN_1200100." "
                        ."from "
                        ."    (((select distinct "
                        ."        aa.fund_id, "
                        ."        aa.fund_name, "
                        ."        aa.loan_amount_total, "
                        ."        aa.min_investment_amount, "
                        ."        aa.admin_yield "
                        ."    from "
                        ."        mst_funds aa "
                        ."            join "
                        ."                mst_loans ab "
                        ."            on 1 "
                        ."            and aa.fund_id    = ab.fund_id "
                        ."            and aa.delay_1    = 1 "
                        ."            and ab.loan_date <= :date_to "
                        ."    ) a "
                        ."        join ( "
                        ."            select "
                        ."                * "
                        ."            from "
                        ."                trn_investment_histories "
                        ."            where 1 "
                        ."                and user_id                 = :user_id "
                        ."                and investment_status_code  = :investment_status_code "
                        ."                and approval_datetime      <= :date_to) b "
                        ."        on 1 "
                        ."        and a.fund_id = b.fund_id) "
                        ."        left join ( "
                        ."            select "
                        ."                fund_id, "
                        ."                case when sum(principal_amount_2) is null then 0 else sum(principal_amount_2) end as principal_amount_2 "
                        ."            from "
                        ."                trn_loan_repayments "
                        ."            where 1 "
                        ."                and repayment_date_2 <= :date_to "
                        ."            group by "
                        ."                fund_id) c "
                        ."        on 1 "
                        ."        and a.fund_id = c.fund_id) "
                        ."where 1 "
                        ."    and a.loan_amount_total > 0 "
                        ."    and (c.principal_amount_2 is null "
                        ."        or a.loan_amount_total > c.principal_amount_2) "
                        ."order by "
                        ."    a.fund_id, "
                        ."    b.approval_datetime "
                        ."";

                $params = array(
                         "user_id"                => $user_id
                        ,"investment_status_code" => INVESTMENT_STATUS_CODE_APPROVED
                        ,"date_to"                => $date_to
                );

                $data = $this->query($sql, $params);

                return $data;

        }










	
	/**
	 * お取引の明細・匿名組合契約取得<br>
	 * 取引残高報告書の【お取引の明細・匿名組合契約】に表示するデータを取得<br>
	 * @param string $user_id
	 * @param datetime $date_from $date_to
	 * @return array $data
	 */
	function selectTradeBalanceReport2($user_id, $date_from, $date_to) {
		
		$sql = ""
			."select "
			."    a.fund_id               as ".COLUMN_0500010.", "
			."    a.fund_name             as ".COLUMN_0500020.", "
			."    a.min_investment_amount as ".COLUMN_0500060.", "
			."    a.admin_yield           as ".COLUMN_0500130.", "
			."    b.investment_amount     as ".COLUMN_1200070.", "
			."    b.approval_datetime     as ".COLUMN_1200100." "
			."from "
			."    (((select distinct "
			."        aa.fund_id, "
			."        aa.fund_name, "
			."        aa.loan_amount_total, "
			."        aa.min_investment_amount, "
			."        aa.admin_yield "
			."    from "
			."        mst_funds aa "
			."            join "
			."                mst_loans ab "
			."            on 1 "
			."            and aa.fund_id    = ab.fund_id "
			."            and ab.loan_date <= :date_to "
			."    ) a "
			."        join ( "
			."            select "
			."                * "
			."            from "
			."                trn_investment_histories "
			."            where 1 "
			."                and user_id                 = :user_id "
			."                and investment_status_code  = :investment_status_code "
			."                and approval_datetime      <= :date_to) b "
			."        on 1 "
			."        and a.fund_id = b.fund_id) "
			."        left join ( "
			."            select "
			."                fund_id, "
			."                case when sum(principal_amount_2) is null then 0 else sum(principal_amount_2) end as principal_amount_2 "
			."            from "
			."                trn_loan_repayments "
			."            where 1 "
			."                and repayment_date_2 <= :date_to "
			."            group by "
			."                fund_id) c "
			."        on 1 "
			."        and a.fund_id = c.fund_id) "
			."where 1 "
			."    and a.loan_amount_total > 0 "
			."    and (c.principal_amount_2 is null "
			."        or a.loan_amount_total > c.principal_amount_2) "
			."union "
			."select "
			."    d.fund_id               as ".COLUMN_0500010.", "
			."    d.fund_name             as ".COLUMN_0500020.", "
			."    d.min_investment_amount as ".COLUMN_0500060.", "
			."    d.admin_yield           as ".COLUMN_0500130.", "
			."    e.investment_amount     as ".COLUMN_1200070.", "
			."    e.approval_datetime     as ".COLUMN_1200100." "
			."from "
			."    ((mst_funds d "
			."        join ( "
			."            select "
			."                * "
			."            from "
			."                trn_investment_histories "
			."            where 1 "
			."                and user_id                = :user_id "
			."                and investment_status_code = :investment_status_code) e "
			."        on 1 "
			."        and d.fund_id = e.fund_id) "
			."        left join ( "
			."            select "
			."                fund_id, "
			."                case when sum(principal_amount_2) is null then 0 else sum(principal_amount_2) end as principal_amount_2 "
			."            from "
			."                trn_loan_repayments "
			."            where 1 "
			."                and repayment_date_2 <= :date_to "
			."            group by "
			."                fund_id) f "
			."        on 1 "
			."        and d.fund_id = f.fund_id) "
			."        left join ( "
			."            select "
			."                fund_id, "
			."                max(repayment_date_2) as repayment_date_2 "
			."            from "
			."                trn_loan_repayments "
			."            group by "
			."                fund_id) g "
			."        on 1 "
			."        and d.fund_id = g.fund_id "
			."where 1 "
			."    and d.loan_amount_total <= f.principal_amount_2 "
			."    and g.repayment_date_2  >= :date_from "
			."    and g.repayment_date_2  <= :date_to "
			."union "
			."select "
			."    h.fund_id               as ".COLUMN_0500010.", "
			."    h.fund_name             as ".COLUMN_0500020.", "
			."    h.min_investment_amount as ".COLUMN_0500060.", "
			."    h.admin_yield           as ".COLUMN_0500130.", "
			."    i.investment_amount     as ".COLUMN_1200070.", "
			."    i.approval_datetime     as ".COLUMN_1200100." "
			."from "
			."    mst_funds h "
			."        join ( "
			."            select "
			."                * "
			."            from "
			."                trn_investment_histories "
			."            where 1 "
			."                and user_id                 = :user_id "
			."                and investment_status_code  = :investment_status_code "
			."                and approval_datetime      >= :date_from "
			."                and approval_datetime      <= :date_to) i "
			."        on 1 "
			."        and h.fund_id = i.fund_id "
			."order by "
			."    fund_id, "
			."    approval_datetime "
			."";
		
		$params = array(
			 "user_id"                => $user_id
			,"investment_status_code" => INVESTMENT_STATUS_CODE_APPROVED
			,"date_from"              => $date_from
			,"date_to"                => $date_to
		);
			
		$data = $this->query($sql, $params);
		
		return $data;
		
	}
	
	
}
