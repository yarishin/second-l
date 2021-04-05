<?php
App::uses('AppModel', 'Model');
 
class MstFund extends AppModel {
	
	public $primaryKey = 'fund_id';
	
    /**
	 * ファンドマスタ作成<br>
	 * ファンドマスタのデータをコピーしてファンドマスタを作成する。
	 * @param string $admin_id $fund_id
	 * @return array $data
	 */
	public function copyWrkFund($admin_id, $fund_id) {
		
		$sql = ""
			."insert into "
			."    mst_funds "
			."select "
			."    :fund_id as fund_id, "
			."    fund_name, "
			."    max_loan_amount_total, "
			."    loan_amount_total, "
			."    min_loan_amount_total, "
			."    min_investment_amount, "
			."    post_datetime, "
			."    inviting_start, "
			."    inviting_end, "
			."    operating_start, "
			."    operating_end, "
			."    operating_term, "
			."    admin_yield, "
			."    target_yield, "
			."    guide, "
			."    dividend_datetime, "
			."    insert_datetime, "
			."    insert_admin_id, "
			."    insert_admin_name, "
			."    update_datetime, "
			."    update_admin_id, "
			."    update_admin_name, "
			."    delete_datetime, "
			."    delete_admin_id, "
			."    delete_admin_name, "
			."    exclusive_key, "
			."    delay_1, "
                        ."    delay_1_date, "
                        ."    ended, "
                        ."    ended_date, "
."	land_lot_number, "
."	building_house_number, "
."	building_floor_area, "
."	registered_holder, "
."	fanility_status_drinking_water, "
."	total_investment, "
."	total_priority_investment, "
."	total_subordinate_investment, "
."	subordinate_investment_units, "
."	documents_application_start_date, "
."	documents_application_end_date, "
."	documents_scheduled_start_date, "
."	documents_scheduled_end_date, "
."	documents_contract_start_date, "
."	documents_contract_end_date, "
."	cycle, "
."	initial_distribution_schedule, "
."	documents_expected_yield, "
."	completion_date, "
."	property_name, "       
."	housing_display, "     
."	property_description, "
."	facility_1, "          
."	facility_2, "          
."	facility_3, "          
."	facility_4, "          
."	facility_5, "          
."	facility_6, "          
."	facility_7, "          
."	facility_8, "          
."	facility_9, "          
."	facility_10, "         
."	facility_11, "         
."	facility_12, "         
."	facility_13, "         
."	facility_14, "         
."	facility_15 "         
			."from "
			."    wrk_funds "
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
	 * ファンドリスト取得<br>
	 * 指定された条件に合致するファンド情報を取得する<br>
	 * $search : 検索条件<br>
	 * $limit : 取得件数上限<br>
	 * @param array $search
	 * @param number $limit
	 */
	public function searchFundList($search, $limit = 0) {
		
		$sql = ""
			."select "
			."    * "
			."from ( "
			."    select "
			."        case when a.fund_id               is not null then a.fund_id               else '' end as ".COLUMN_0500010.", "
			."        case when a.delay_1               is not null then a.delay_1               else '' end as ".COLUMN_0500170.", "
			."        case when a.ended                 is not null then a.ended                 else '' end as ".COLUMN_0500171.", "
                        ."        case when a.delay_1_date    is not null then date_format(a.delay_1_date  , '%Y/%m/%d %H:%i:%s')  else '' end as ".COLUMN_0500172.", "
			."        case when a.ended_date      is not null then date_format(a.ended_date    , '%Y/%m/%d %H:%i:%s')  else '' end as ".COLUMN_0500173.", "
                        ."        case when a.fund_name             is not null then a.fund_name             else '' end as ".COLUMN_0500020.", "
			."        case when a.max_loan_amount_total is not null then a.max_loan_amount_total else 0  end as ".COLUMN_0500030.", "
			."        case when a.loan_amount_total     is not null then a.loan_amount_total     else 0  end as ".COLUMN_0500040.", "
			."        case when a.min_loan_amount_total is not null then a.min_loan_amount_total else 0  end as ".COLUMN_0500050.", "
			."        case when a.min_investment_amount is not null then a.min_investment_amount else 0  end as ".COLUMN_0500060.", "
			."        case when a.post_datetime         is not null then a.post_datetime         else '' end as ".COLUMN_0500070.", "
			."        case when a.inviting_start  is not null then date_format(a.inviting_start , '%Y/%m/%d %H:%i:%s') else '' end as ".COLUMN_0500080.", "
			."        case when a.inviting_end    is not null then date_format(a.inviting_end   , '%Y/%m/%d %H:%i:%s') else '' end as ".COLUMN_0500090.", "
			."        case when a.operating_start is not null then date_format(a.operating_start, '%Y/%m/%d %H:%i:%s') else '' end as ".COLUMN_0500100.", "
			."        case when a.operating_end   is not null then date_format(a.operating_end  , '%Y/%m/%d %H:%i:%s') else '' end as ".COLUMN_0500110.", "
			."        case when a.operating_term        is not null then a.operating_term        else '' end as ".COLUMN_0500120.", "
			."        case when a.admin_yield           is not null then a.admin_yield           else 0  end as ".COLUMN_0500130.", "
			."        case when a.target_yield          is not null then a.target_yield          else 0  end as ".COLUMN_0500140.", "
			."        case when a.guide                 is not null then a.guide                 else '' end as ".COLUMN_0500150.", "
			."        case when b.investment_amount     is not null then b.investment_amount     else 0  end as ".COLUMN_1200070.", "
."        case when a.land_lot_number                                is not null then a.land_lot_number                                  else '' end as ".COLUMN_0500190.", "
."        case when a.building_house_number                          is not null then a.building_house_number                            else '' end as ".COLUMN_0500240.", "
."        case when a.building_floor_area                            is not null then a.building_floor_area                              else '' end as ".COLUMN_0500270.", "
."        case when a.registered_holder                              is not null then a.registered_holder                                else '' end as ".COLUMN_0500330.", "
."        case when a.fanility_status_drinking_water                 is not null then a.fanility_status_drinking_water                   else '' end as ".COLUMN_0500470.", "
."        case when a.total_investment                               is not null then a.total_investment                                 else '' end as ".COLUMN_0501350.", "
."        case when a.total_priority_investment                      is not null then a.total_priority_investment                        else '' end as ".COLUMN_0501370.", "
."        case when a.total_subordinate_investment                   is not null then a.total_subordinate_investment                     else '' end as ".COLUMN_0501390.", "
."        case when a.subordinate_investment_units                   is not null then a.subordinate_investment_units                     else '' end as ".COLUMN_0501400.", "
."        case when a.documents_application_start_date               is not null then a.documents_application_start_date                 else '' end as ".COLUMN_0501410.", "
."        case when a.documents_application_end_date                 is not null then a.documents_application_end_date                   else '' end as ".COLUMN_0501420.", "
."        case when a.documents_scheduled_start_date                 is not null then a.documents_scheduled_start_date                   else '' end as ".COLUMN_0501430.", "
."        case when a.documents_scheduled_end_date                   is not null then a.documents_scheduled_end_date                     else '' end as ".COLUMN_0501440.", "
."        case when a.documents_contract_start_date                  is not null then a.documents_contract_start_date                    else '' end as ".COLUMN_0501450.", "
."        case when a.documents_contract_end_date                    is not null then a.documents_contract_end_date                      else '' end as ".COLUMN_0501460.", "
."        case when a.cycle                                          is not null then a.cycle                                            else '' end as ".COLUMN_0501480.", "
."        case when a.initial_distribution_schedule                  is not null then a.initial_distribution_schedule                    else '' end as ".COLUMN_0501490.", "
."        case when a.documents_expected_yield                       is not null then a.documents_expected_yield                         else '' end as ".COLUMN_0501500.", "
."        case when a.completion_date                                is not null then a.completion_date                                  else '' end as ".COLUMN_0501540.", "
."        case when a.property_name                                  is not null then a.property_name                                    else '' end as ".COLUMN_0501560.", "
."        case when a.housing_display                                is not null then a.housing_display                                  else '' end as ".COLUMN_0501570.", "
."        case when a.property_description                           is not null then a.property_description                             else '' end as ".COLUMN_0501580.", "
."        case when a.facility_1                                     is not null then a.facility_1                                       else '' end as ".COLUMN_0501650.", "
."        case when a.facility_2                                     is not null then a.facility_2                                       else '' end as ".COLUMN_0501660.", "
."        case when a.facility_3                                     is not null then a.facility_3                                       else '' end as ".COLUMN_0501670.", "
."        case when a.facility_4                                     is not null then a.facility_4                                       else '' end as ".COLUMN_0501680.", "
."        case when a.facility_5                                     is not null then a.facility_5                                       else '' end as ".COLUMN_0501690.", "
."        case when a.facility_6                                     is not null then a.facility_6                                       else '' end as ".COLUMN_0501700.", "
."        case when a.facility_7                                     is not null then a.facility_7                                       else '' end as ".COLUMN_0501710.", "
."        case when a.facility_8                                     is not null then a.facility_8                                       else '' end as ".COLUMN_0501720.", "
."        case when a.facility_9                                     is not null then a.facility_9                                       else '' end as ".COLUMN_0501730.", "
."        case when a.facility_10                                    is not null then a.facility_10                                      else '' end as ".COLUMN_0501740.", "
."        case when a.facility_11                                    is not null then a.facility_11                                      else '' end as ".COLUMN_0501750.", "
."        case when a.facility_12                                    is not null then a.facility_12                                      else '' end as ".COLUMN_0501760.", "
."        case when a.facility_13                                    is not null then a.facility_13                                      else '' end as ".COLUMN_0501770.", "
."        case when a.facility_14                                    is not null then a.facility_14                                      else '' end as ".COLUMN_0501780.", "
."        case when a.facility_15                                    is not null then a.facility_15                                      else '' end as ".COLUMN_0501790.", "

			."        case "
			."            when c.loan_count = c.warranty_code                         then ".WARRANTY_DISPLAY_CODE_1." "
			."            when c.loan_count > c.warranty_code and c.warranty_code > 0 then ".WARRANTY_DISPLAY_CODE_2." "
			."            else ".WARRANTY_DISPLAY_CODE_0." "
			."        end as ".COLUMN_0700150.", "
			."        case "
			."            when c.loan_count = c.collateral_code                           then ".COLLATERAL_DISPLAY_CODE_1." "
			."            when c.loan_count > c.collateral_code and c.collateral_code > 0 then ".COLLATERAL_DISPLAY_CODE_2." "
			."            else ".COLLATERAL_DISPLAY_CODE_0." "
			."        end as ".COLUMN_0700160.", "
			."        case when e.principal_amount_2    is not null then e.principal_amount_2   else 0  end as ".COLUMN_1300140." "
			."    from "
			."        ((mst_funds a "
			."            left join "
			."                (select "
			."                    fund_id, "
			."                    sum(investment_amount) as investment_amount "
			."                from "
			."                    trn_investment_histories "
			."                where 1 "
			."                    and investment_status_code in (".INVESTMENT_STATUS_CODE_APPLIED.",".INVESTMENT_STATUS_CODE_APPROVED.") "
			."                group by "
			."                    fund_id "
			."                ) b "
			."            on a.fund_id = b.fund_id) "
			."            join "
			."                (select "
			."                    fund_id, "
			."                    count(id)            as loan_count, "
			."                    sum(warranty_code)   as warranty_code, "
			."                    sum(collateral_code) as collateral_code "
			."                from "
			."                    mst_loans "
			."                group by "
			."                    fund_id "
			."                ) c "
			."            on a.fund_id = c.fund_id) "
			."            join "
			."                (select "
			."                    fund_id, "
			."                    sum(principal_amount_2) as principal_amount_2 "
			."                from "
			."                    trn_loan_repayments "
			."                group by "
			."                    fund_id "
			."                ) e "
			."            on a.fund_id = e.fund_id "
			."    ) d "
			."where 1 "
			."";
		
		// ◆絞込み条件◆
		
		$where  = "";
		$params = array();
		
		// ファンドID
		if (isset($search[SEARCH_ID_050110040]) && !is_null($search[SEARCH_ID_050110040]) && strcmp("", $search[SEARCH_ID_050110040]) != 0) {
			$where .= "and ".COLUMN_0500010." = :".SEARCH_ID_050110040. " ";
			$params[SEARCH_ID_050110040] = $search[SEARCH_ID_050110040];
		}
		// ファンド名
		if (isset($search[SEARCH_ID_050110010]) && !is_null($search[SEARCH_ID_050110010]) && strcmp("", $search[SEARCH_ID_050110010]) != 0) {
			$where .= "and ".COLUMN_0500020." like (:".SEARCH_ID_050110010.") ";
			$params[SEARCH_ID_050110010] = "%".$search[SEARCH_ID_050110010]."%";
		}
		// 運用開始日(開始)
		if (isset($search[SEARCH_ID_050110020]) && !is_null($search[SEARCH_ID_050110020]) && strcmp("", $search[SEARCH_ID_050110020]) != 0) {
			$where .= "and ".COLUMN_0500100." >= :".SEARCH_ID_050110020. " ";
			$params[SEARCH_ID_050110020] = $search[SEARCH_ID_050110020];
		}
		// 運用開始日(終了)
		if (isset($search[SEARCH_ID_050110030]) && !is_null($search[SEARCH_ID_050110030]) && strcmp("", $search[SEARCH_ID_050110030]) != 0) {
			$where .= "and ".COLUMN_0500100." <= :".SEARCH_ID_050110030. " ";
			$params[SEARCH_ID_050110030] = $search[SEARCH_ID_050110030];
		}
		// 掲載開始日(開始)
		if (isset($search[SEARCH_ID_050110130]) && !is_null($search[SEARCH_ID_050110130]) && strcmp("", $search[SEARCH_ID_050110130]) != 0) {
			$where .= "and ".COLUMN_0500070." >= :".SEARCH_ID_050110130. " ";
			$params[SEARCH_ID_050110130] = $search[SEARCH_ID_050110130];
		}
		// 掲載開始日(終了)
		if (isset($search[SEARCH_ID_050110140]) && !is_null($search[SEARCH_ID_050110140]) && strcmp("", $search[SEARCH_ID_050110140]) != 0) {
			$where .= "and ".COLUMN_0500070." <= :".SEARCH_ID_050110140. " ";
			$params[SEARCH_ID_050110140] = $search[SEARCH_ID_050110140];
		}
		
		// 状態
		if (isset($search[SEARCH_ID_050110050]) || isset($search[SEARCH_ID_050110060]) || isset($search[SEARCH_ID_050110070])
				|| isset($search[SEARCH_ID_050110080]) || isset($search[SEARCH_ID_050110090]) || isset($search[SEARCH_ID_050110100])) {
			$where .= "and ( ";
			$flag = false;
			// 募集開始前
			if (isset($search[SEARCH_ID_050110050])) {
				$flag = true;
				
				$where .= "inviting_start > now() ";
			}
			// 募集中
			if (isset($search[SEARCH_ID_050110060])) {
				$where .= $flag ? "or " : "";
				$flag = true;
				
				$where .= ""
					."( "
					."    inviting_start        <= now() "
					."and inviting_end          >= now() "
					."and max_loan_amount_total >  investment_amount "
					.") "
					."";
			}
			// 運用準備中
			if (isset($search[SEARCH_ID_050110070])) {
				$where .= $flag ? "or " : "";
				$flag = true;
				
				$where .= ""
					."(( "
					."    inviting_end          <  now() "
					."and operating_start       >  now() "
					."and min_loan_amount_total <= investment_amount) "
					."or ( "
					."        operating_start       >  now() "
					."    and max_loan_amount_total <= investment_amount) "
					."or ( "
					."        operating_start       <= now() "
					."    and operating_end         >= now() "
					."    and min_loan_amount_total <= investment_amount "
					."    and loan_amount_total     =  0) "
					.") "
					."";
			}
			// 運用中
			if (isset($search[SEARCH_ID_050110080])) {
				$where .= $flag ? "or " : "";
				$flag = true;
				
				$where .= ""
					."( "
					."    operating_start   <= now() "
					."and loan_amount_total >  0 "
					."and loan_amount_total >  principal_amount_2 "
					.") "
					."";
			}
			// 運用終了
			if (isset($search[SEARCH_ID_050110090])) {
				$where .= $flag ? "or " : "";
				$flag = true;
				
				$where .= ""
					."(( "
					."    operating_end     < now() "
					."and loan_amount_total > 0 "
					.") "
					."or ( "
					."    loan_amount_total >  0 "
					."and loan_amount_total <= principal_amount_2 "
					.")) "
					."";
			}
			// 不成立
			if (isset($search[SEARCH_ID_050110100])) {
				$where .= $flag ? "or " : "";
				$flag = true;
				
				$where .= ""
					."( "
					."    inviting_end          < now() "
					."and min_loan_amount_total > investment_amount "
					.") "
					."";
			}
			$where .= ") ";
		}
		if (strcmp("", $where) != 0) {
			$sql .= $where;
		}
		
		// ◆ソート◆
		$sql .= "order by ";
		if (isset($search[SEARCH_ID_050110110])) {

			if (strcmp(SORT_ORDER_CODE_ASC, $search[SEARCH_ID_050110120]) == 0) {
				$order_asc = "asc";
			}
			else {
				$order_asc = "desc";
			}

			switch ($search[SEARCH_ID_050110110]) {
				case SORT_COLUMN_CODE_FUND_ID: // ファンドID
					$sql .= COLUMN_0500010." ".$order_asc;
					break;
				case SORT_COLUMN_CODE_FUND_NAME: // ファンド名
					$sql .= COLUMN_0500020." ".$order_asc;
					break;
				case SORT_COLUMN_CODE_FUND_MAX_LOAN_AMOUNT: // 貸付予定額
					$sql .= COLUMN_0500030." ".$order_asc;
					break;
				case SORT_COLUMN_CODE_FUND_LOAN_AMOUNT: // 貸付額
					$sql .= COLUMN_0500040." ".$order_asc;
					break;
				case SORT_COLUMN_CODE_FUND_INVITING_START: // 募集開始日
					$sql .= COLUMN_0500080." ".$order_asc;
					break;
				case SORT_COLUMN_CODE_FUND_OPERATING_START: // 運用開始日
					$sql .= COLUMN_0500100." ".$order_asc;
					break;
				case SORT_COLUMN_CODE_FUND_POST_DATETIME: // 掲載開始日
					$sql .= ""
					.COLUMN_0500070." ".$order_asc.", "
					.COLUMN_0500010." ".$order_asc." "
					."";
			}
		}
		
		if (0 < $limit) {
			$sql .= "limit ".$limit." ";
		}
		$sql .= ";";
		
		$data = $this->query($sql, $params);
		
		return $data;
	}
	
	/**
	 * 取引残高報告書データ取得１<br>
	 * 運用中のローンファンドデータ取得<br>
	 * @param array $arg
	 */
	public function selectTradeBalanceReport1($arg) {
		
		$user_id   = $arg[ARRAY_INDEX_USER_ID];
		$trade_end = $arg[ARRAY_INDEX_TRADE_END];
		
		$sql = ""
			."select "
			."    a.fund_id, "
			."    a.fund_name, "
			."    a.min_investment_amount, "
			."    a.admin_yield, "
			."    b.investment_amount, "
			."    b.approval_datetime "
			."from "
			."    ((mst_funds a "
			."        join ( "
			."            select "
			."                * "
			."            from "
			."                trn_investment_histories "
			."            where 1 "
			."                and user_id = '".$user_id."' "
			."                and investment_status_code = 1) b "
			."        on 1 "
			."        and a.fund_id = b.fund_id) "
			."        left join ( "
			."            select "
			."                fund_id, "
			."                case when sum(principal_amount_2) is null then 0 else sum(principal_amount_2) end as principal_amount_2 "
			."            from "
			."                trn_loan_repayments "
			."            where 1 "
			."                and repayment_date_2 <= '".$trade_end."' "
			."            group by "
			."                fund_id) c "
			."        on 1 "
			."        and a.fund_id = c.fund_id) "
			."where 1 "
			."    and a.loan_amount_total > 0 "
			."    and (c.principal_amount_2 is null "
			."        or a.loan_amount_total > c.principal_amount_2) "
			."";
		
		$data = $this->query($sql);
		
		return $data;
	}

	/**
	 * 取引残高報告書データ取得２<br>
	 * お取引の明細・匿名組合契約データ取得<br>
	 * @param array $arg
	 */
	public function selectTradeBalanceReport2($arg) {
		
		$user_id     = $arg[ARRAY_INDEX_USER_ID];
		$trade_start = $arg[ARRAY_INDEX_TRADE_START];
		$trade_end   = $arg[ARRAY_INDEX_TRADE_END];
		
		$sql = ""
			."select "
			."    a.fund_id, "
			."    a.fund_name, "
			."    a.min_investment_amount, "
			."    a.admin_yield, "
			."    b.investment_amount, "
			."    b.approval_datetime "
			."from "
			."    ((mst_funds a "
			."        join ( "
			."            select "
			."                * "
			."            from "
			."                trn_investment_histories "
			."            where 1 "
			."                and user_id                = '".$user_id."' "
			."                and investment_status_code = ".INVESTMENT_STATUS_CODE_APPROVED.") b "
			."        on 1 "
			."        and a.fund_id = b.fund_id) "
			."        left join ( "
			."            select "
			."                fund_id, "
			."                case when sum(principal_amount_2) is null then 0 else sum(principal_amount_2) end as principal_amount_2 "
			."            from "
			."                trn_loan_repayments "
			."            where 1 "
			."                and repayment_date_2 <= '".$trade_end."' "
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
			."    d.fund_id, "
			."    d.fund_name, "
			."    d.min_investment_amount, "
			."    d.admin_yield, "
			."    e.investment_amount, "
			."    e.approval_datetime "
			."from "
			."    ((mst_funds d "
			."        join ( "
			."            select "
			."                * "
			."            from "
			."                trn_investment_histories "
			."            where 1 "
			."                and user_id                = '".$user_id."' "
			."                and investment_status_code = ".INVESTMENT_STATUS_CODE_APPROVED.") e "
			."        on 1 "
			."        and d.fund_id = e.fund_id) "
			."        left join ( "
			."            select "
			."                fund_id, "
			."                case when sum(principal_amount_2) is null then 0 else sum(principal_amount_2) end as principal_amount_2 "
			."            from "
			."                trn_loan_repayments "
			."            where 1 "
			."                and repayment_date_2 <= '".$trade_end."' "
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
			."    and g.repayment_date_2  >= '".$trade_start."' "
			."    and g.repayment_date_2  <= '".$trade_end."' "
			."union "
			."select "
			."    h.fund_id, "
			."    h.fund_name, "
			."    h.min_investment_amount, "
			."    h.admin_yield, "
			."    i.investment_amount, "
			."    i.approval_datetime "
			."from "
			."    mst_funds h "
			."        join ( "
			."            select "
			."                * "
			."            from "
			."                trn_investment_histories "
			."            where 1 "
			."                and user_id                 = '".$user_id."' "
			."                and investment_status_code  = ".INVESTMENT_STATUS_CODE_APPROVED." "
			."                and approval_datetime      >= '".$trade_start."' "
			."                and approval_datetime      <= '".$trade_end."') i "
			."        on 1 "
			."        and h.fund_id = i.fund_id "
			."order by "
			."    fund_id, "
			."    approval_datetime "
			."";
		
		$data = $this->query($sql);
		
		return $data;
	}


}
