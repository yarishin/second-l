<?php
App::uses('AppModel', 'Model');
 
class MstCalendar extends AppModel {
	
    /**
	 * 日付取得<br>
	 * 指定したIDの日付を取得する。
	 * @param number $id
	 * @return array $data
	 */
	public function getCalendar($id) {
		
		$sql = ""
			."select "
			."    * "
			."from "
			."    mst_calendars "
			."where 1 "
			."  and id = :id "
			.";";
		
		$params = array(
			"id" => $id
		);
		
		$data = $this->query($sql, $params);
		
		return $data;
		
	}

	 /**
	 * 最大年数取得<br>
	  * 
	 * @return array $data
	 */
	public function getMaxYear() {
		
		$sql = ""
			."select "
			."    max(c_year) as c_year "
			."from "
			."    mst_calendars ";
		
		$data = $this->query($sql);
		
		return $data;
		
	}
	
}
