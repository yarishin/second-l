<?php
App::uses('AppModel', 'Model');
 
class WrkFund extends AppModel {
	
	public $primaryKey = 'admin_id';
	
    /**
	 * ファンドワーク作成<br>
	 * ファンドマスタのデータをコピーしてファンドワークを作成する。
	 * @param string $admin_id $fund_id
	 * @return array $data
	 */
	public function copyMstFund($admin_id, $fund_id) {
		
		$sql = ""
			."insert into "
			."    wrk_funds "
			."select "
			."    :admin_id as admin_id, "
			."    fund_id, "
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
			."    delay_1, "//add_yarimizu_20190212
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
			."    mst_funds "
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
