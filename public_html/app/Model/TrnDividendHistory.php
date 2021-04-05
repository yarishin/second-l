<?php
App::uses('AppModel', 'Model');
 
class TrnDividendHistory extends AppModel {
	
	/**
	 * お取引の明細・償還及び分配取得<br>
	 * 取引残高報告書の【お取引の明細・償還及び分配】に表示するデータを取得<br>
	 * @param string $user_di
	 * @param datetime $date_from, $date_to
	 * @return array $data
	 */
//	function selectTradeBalanceReport3($user_id, $date_from, $date_to) {
//		
//		$sql = ""
//			."select "
//			."    a.fund_id               as ".COLUMN_0500010.", "
//			."    a.fund_name             as ".COLUMN_0500020.", "
//			."    a.min_investment_amount as ".COLUMN_0500060.", "
//			."    d.dividend_detail_code  as ".COLUMN_1000080.", "
//			."    d.dividend_datetime     as ".COLUMN_1000070.", "
//			."    d.dividend_amount       as ".COLUMN_1000090.", "
//			."    d.repayment_date_2      as ".COLUMN_1300120.", "
//			."    e.investment_amount     as ".COLUMN_1200070." "
//			."from "
//			."    (mst_funds a "
//			."        join ( "
//			."            select "
//			."                b.fund_id, "
//			."                c.repayment_date_2, "
//			."                b.dividend_datetime, "
//			."                b.dividend_detail_code, "
//			."                b.dividend_amount "
//			."            from "
//			."                trn_dividend_histories b "
//			."                    join "
//			."                        trn_loan_repayments c "
//			."                    on 1 "
//			."                    and b.fund_id            = c.fund_id "
//			."                    and b.dividend_datetime  = c.dividend_datetime_2 "
//			."                    and b.dividend_datetime >= :date_from "
//			."                    and b.dividend_datetime <= :date_to "
//			."                    and b.user_id            = :user_id "
//			."                    and b.dividend_detail_code in (:dividend_detail_code_1, :dividend_detail_code_2) "
//			."            group by "
//			."                b.fund_id, "
//			."                c.repayment_date_2, "
//			."                b.dividend_datetime, "
//			."                b.dividend_detail_code, "
//			."                b.dividend_amount "
//			."            ) d "
//			."            on 1 "
//			."            and a.fund_id = d.fund_id) "
//			."        join ( "
//			."            select "
//			."                fund_id, "
//			."                sum(investment_amount) as investment_amount "
//			."            from "
//			."                trn_investment_histories "
//			."            where 1 "
//			."                and user_id                = :user_id "
//			."                and investment_status_code = :inv_status_code "
//			."            group by "
//			."                fund_id "
//			."            ) e "
//			."        on 1 "
//			."        and a.fund_id = e.fund_id "
//			."order by "
//			."    a.fund_id, "
//			."    d.dividend_detail_code, "
//			."    d.repayment_date_2 "
//			."";
//		
//		$params = array(
//			 "user_id"                => $user_id
//			,"date_from"              => $date_from
//			,"date_to"                => $date_to
//			,"dividend_detail_code_1" => DIVIDEND_DETAIL_CODE_01
//			,"dividend_detail_code_2" => DIVIDEND_DETAIL_CODE_02
//			,"inv_status_code"        => INVESTMENT_STATUS_CODE_APPROVED
//		);
//			
//		$data = $this->query($sql, $params);
//		
//		return $data;
//		
//	}



        /**20190618_add_yarimizu
	*お取引明細の正規化（ダブりの分のSQL修正）
         * お取引の明細・償還及び分配取得<br>
         * 取引残高報告書の【お取引の明細・償還及び分配】に表示するデータを取得<br>
         * @param string $user_di
         * @param datetime $date_from, $date_to
         * @return array $data
SELECT 
a.fund_id as fund_id, 
a.fund_name as fund_name, 
a.min_investment_amount as min_investment_amount, 
b.dividend_detail_code as dividend_detail_code, 
b.dividend_datetime as dividend_datetime, 
b.dividend_amount as dividend_amount, 
(SELECT sum(i.investment_amount) from trn_investment_histories as i where i.fund_id = b.fund_id and i.user_id = b.user_id and i.investment_status_code = '1' group by i.fund_id) as investment_amount 
FROM 
trn_dividend_histories b 
INNER JOIN mst_funds a 
ON b.fund_id = a.fund_id 
WHERE 1 
and b.user_id = '60293547' 
and b.dividend_datetime >= '2019/03/01 00:00:00' 
and b.dividend_datetime <= '2019/05/31 23:59:59'
and b.dividend_detail_code in ('1', '2') 
order by
a.fund_id,
b.dividend_detail_code,
b.dividend_datetime
;

         */
        function selectTradeBalanceReport3($user_id, $date_from, $date_to) {

                $sql = ""
                        ."select "
                        ."    a.fund_id               as ".COLUMN_0500010.", "
                        ."    a.fund_name             as ".COLUMN_0500020.", "
                        ."    a.min_investment_amount as ".COLUMN_0500060.", "
                        ."    d.dividend_detail_code  as ".COLUMN_1000080.", "
                        ."    d.dividend_datetime     as ".COLUMN_1000070.", "
                        ."    d.dividend_amount       as ".COLUMN_1000090.", "
                        ."    e.investment_amount     as ".COLUMN_1200070." "
                        ."from "
                        ."    (mst_funds a "
                        ."        join ( "
                        ."            select "
                        ."                b.fund_id, "
                        ."                b.dividend_datetime, "
                        ."                b.dividend_detail_code, "
                        ."                b.dividend_amount "
                        ."            from "
                        ."                trn_dividend_histories b "
                        ."                    join "
                        ."                        trn_loan_repayments c "
                        ."                    on 1 "
                        ."                    and b.fund_id            = c.fund_id "
                        ."                    and b.dividend_datetime >= :date_from "
                        ."                    and b.dividend_datetime <= :date_to "
                        ."                    and b.user_id            = :user_id "
                        ."                    and b.dividend_detail_code in (:dividend_detail_code_1, :dividend_detail_code_2) "
                        ."            group by "
                        ."                b.fund_id, "
                        ."                b.dividend_datetime, "
                        ."                b.dividend_detail_code, "
                        ."                b.dividend_amount "
                        ."            ) d "
                        ."            on 1 "
                        ."            and a.fund_id = d.fund_id) "
                        ."        join ( "
                        ."            select "
                        ."                fund_id, "
                        ."                sum(investment_amount) as investment_amount "
                        ."            from "
                        ."                trn_investment_histories "
                        ."            where 1 "
                        ."                and user_id                = :user_id "
                        ."                and investment_status_code = :inv_status_code "
                        ."            group by "
                        ."                fund_id "
                        ."            ) e "
                        ."        on 1 "
                        ."        and a.fund_id = e.fund_id "
                        ."order by "
                        ."    a.fund_id, "
                        ."    d.dividend_detail_code, "
                        ."    d.dividend_datetime "
                        ."";

                $params = array(
                         "user_id"                => $user_id
                        ,"date_from"              => $date_from
                        ,"date_to"                => $date_to
                        ,"dividend_detail_code_1" => DIVIDEND_DETAIL_CODE_01
                        ,"dividend_detail_code_2" => DIVIDEND_DETAIL_CODE_02
                        ,"inv_status_code"        => INVESTMENT_STATUS_CODE_APPROVED
                );

                $data = $this->query($sql, $params);

                return $data;

        }




       function getDividendHistories_777($user_id) {
        $sql = ""
                        ."select "
                        ."    a.user_id, a.user_name, a.fund_id, sum(a.dividend_amount) as sum, b.operating_end, b.delay_1 "
                        ."from "
                        ."    trn_dividend_histories a "
                        ."        inner join "
                        ."            mst_funds b "
                        ."        on  "
                        ."        a.fund_id            = b.fund_id "
                        ."        and b.operating_start   <= now() "
                        ."        and b.operating_end     >= now() "
                        ."        and b.loan_amount_total >  0 "
                        ."where "
                        ."    a.user_id                = :user_id  "
                        ."    and a.dividend_detail_code = :dividend_detail_code "
                        //."    a.dividend_detail_code = 1 "
                        ."group by a.fund_id";

                $params = array(
                         "user_id"                => $user_id
                        //,"investment_status_code" => INVESTMENT_STATUS_CODE_APPROVED
                        ,"dividend_detail_code" => 1
                );
                $data_list_list = $this->query($sql, $params);

                return $data_list_list;

        }









}
