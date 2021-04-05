<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class CalendarComponent extends Component {
	
	public $components = array(
		"SessionAdminInfo"
	);
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * 日付一年分取得
	 * @param number $c_year
	 * @return array $date_list
	 */
	function getCalendarListOneYear($c_year) {
		
		try {
			
			$status     = null;
			$conditions = null;
			$order      = null;
			$order_asc  = "";

			// ◆絞込み条件◆
			// 年
			$conditions[COLUMN_0200020] = $c_year;

			// ◆ソート◆
			$order_asc = "asc";
			$order[COLUMN_0200030] = $order_asc;
			$order[COLUMN_0200040] = $order_asc;

			$status[MODEL_CONDITIONS] = $conditions;
			$status[MODEL_ORDER] = $order;

			// 検索結果が0件の場合戻り値にfalseを設定
			$calendar_list = $this->Controller->MstCalendar->find(MODEL_ALL, $status);

			return $calendar_list;
			
		} catch (Exception $ex) {
			$err = "Calendar->getCalendarListOneYear で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}

	/**
	 * 登録済み年リスト取得
	 * @return array $year_list
	 */
	function getYearList() {
		
		try {
			
			$status     = null;
			$order      = null;
			$order_asc  = "";

			$fields     = null;
			$group      = null;

			// ◆取得項目◆
			$fields = array(
				COLUMN_0200020
			);

			// ◆グループ◆
			$group = array(
				COLUMN_0200020
			);

			// ◆ソート◆
			$order_asc = "asc";
			$order[COLUMN_0200020] = $order_asc;

			$status[MODEL_FIELDS] = $fields;
			$status[MODEL_GROUP]  = $group;
			$status[MODEL_ORDER]  = $order;

			// 検索結果が0件の場合戻り値にfalseを設定
			$year_list = $this->Controller->MstCalendar->find(MODEL_ALL, $status);

			return $year_list;
			
		} catch (Exception $ex) {
			$err = "Calendar->getYearList で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * 日付一日分取得
	 * @param number $c_year $c_month $c_day
	 * @return array $data
	 */
	
	function getCalendarOneDay($c_year, $c_month, $c_day) {
		
		try {
			
			$status     = null;
			$conditions = null;

			// ◆絞込み条件◆
			// 年月日
			$conditions[COLUMN_0200020] = $c_year;
			$conditions[COLUMN_0200030] = $c_month;
			$conditions[COLUMN_0200040] = $c_day;

			$status[MODEL_CONDITIONS] = $conditions;

			// 検索結果が0件の場合戻り値にfalseを設定
			$data = $this->Controller->MstCalendar->find(MODEL_ALL, $status);

			return $data;
			
		} catch (Exception $ex) {
			$err = "Calendar->getCalendarOneDay で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 有効日付調整<br>
	 * 年、月、日の組み合わせが不正(2015/02/31等)の場合、<br>
	 * 有効な日数を返す。
	 * @param number $year $month $day
	 * @return number $valid_day
	 */
	function ajustDateValid($year, $month, $day) {
		
		try {
			
			$valid_day = $day;

			// 日付として有効な組み合わせになるまで日を減らす
			while (!checkdate($month, $valid_day, $year)) {
				$valid_day--;
			}

			return $valid_day;
			
		} catch (Exception $ex) {
			$err = "Calendar->ajustDateValid で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 営業日調整<br>
	 * 年、月、日の組み合わせが休日かチェックし、<br>
	 * 休日ならば前営業日、または翌営業日を返す。<br>
	 * $prec_next = true  : 前営業日<br>
	 * $prec_next = false : 翌営業日<br>
	 * @param number $year $month $day
	 * @param boolean $prec_next
	 * @return array $result
	 */
	function ajustDateBusiness($year, $month, $day, $prec_next = true) {
		
		try {
			
			// 日付データ取得
			$data = $this->getCalendarOneDay($year, $month, $day);

			// 休日フラグ取出し
			$holiday = HOLIDAY_CODE_BUSINESS;
			foreach ($data as $keys => $values) {
				foreach ($values as $key => $value) {
					$holiday = $value[COLUMN_0200060];
				}
			}

			// 休日だった場合、前営業日または翌営業日を取得
			$day_minus   = 0;
			$repay_year  = 0;
			$repay_month = 0;
			$repay_day   = 0;
			while (HOLIDAY_CODE_HOLIDAY == $holiday) {
				if ($prec_next) {
					$day_minus--;
				}
				else {
					$day_minus++;
				}
				if (-31 > $day_minus || 31 < $day_minus) {
					$err = "year:".$year."<br>month:".$month."<br>day:".$day."<br>";
					throw new Exception($err."<br>");
				}
				$repay_year  = date("Y", strtotime($year ."/". $month ."/". $day." ".$day_minus." day"));
				$repay_month = date("m", strtotime($year ."/". $month ."/". $day." ".$day_minus." day"));
				$repay_day   = date("d", strtotime($year ."/". $month ."/". $day." ".$day_minus." day"));
				$data = $this->getCalendarOneDay($repay_year, $repay_month, $repay_day);
				foreach ($data as $keys => $values) {
					foreach ($values as $key => $value) {
						$holiday = $value[COLUMN_0200060];
					}
				}
			}

			// 処理結果セット
			$result = null;
			if (0 != $day_minus) {

				// 調整有り
				$result["year"]  = $repay_year;
				$result["month"] = $repay_month;
				$result["day"]   = $repay_day;
			}
			else {

				// 調整無し
				$result["year"]  = $year;
				$result["month"] = $month;
				$result["day"]   = $day;
			}

			return $result;
			
		} catch (Exception $ex) {
			$err = "Calendar->ajustDateBusiness で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * ｎ翌営業日取得<br>
	 * 指定された日数分先の営業日を取得します。<br>
	 * @param number $days
	 * @return string $next_business_date
	 */
	function getNextBusinessDate($days) {
		
		try {
			
			$next_business_date = "";
			$date_count = 0;
			$count      = 0;
			$today      = date(DATE_FORMAT);
			while ($date_count < $days) {
				
				$count++;
				
				$year  = date("Y", strtotime($today." +".$count." days"));
				$month = date("m", strtotime($today." +".$count." days"));
				$day   = date("d", strtotime($today." +".$count." days"));
				
				// 日付データ取得
				$data = $this->getCalendarOneDay($year, $month, $day);
				
				// 休日フラグ取出し
				$holiday = HOLIDAY_CODE_BUSINESS;
				foreach ($data as $keys => $values) {
					foreach ($values as $key => $value) {
						$holiday = $value[COLUMN_0200060];
					}
				}
				
				// 営業日だった場合、カウントを＋１
				if (HOLIDAY_CODE_BUSINESS == $holiday) {
					$date_count++;
				}
				
			}
			
			$next_business_date = date(DATE_FORMAT, strtotime($today." +".$count." days"));

			return $next_business_date;
			
		} catch (Exception $ex) {
			$err = "Calendar->getNextBusinessDate で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 翌月返済予定日
	 */
	function getNextTradeDate($date, $trade_date) {
		try {
			
			$trade_date_new = null;
			
			$date_y = date('Y', strtotime($date));
			$date_m = date('m', strtotime($date));
			
			$date_y_new = $date_y + intval((string)(floor(($date_m + 1) / 12)));
			$date_m_new = ($date_m % 12) + 1;	
			$date_d_new = $this->ajustDateValid($date_y_new, $date_m_new, $trade_date);
			
			$date_d_info    = $this->ajustDateBusiness($date_y_new, $date_m_new, $date_d_new);
			$trade_date_new = date(DATETIME_FORMAT_1, strtotime($date_d_info['year']."/".$date_d_info['month']."/".$date_d_info['day']));
			
			return $trade_date_new;
			
		} catch (Exception $ex) {
			$err = "Calendar->getNextTradeDate で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 一年追加
	 */
	function addNewYearCalendar($year) {
		try {
			
			$date = date(DATETIME_FORMAT_1);
			
			$admin_info = $this->SessionAdminInfo->getAdminInfo();
			$admin_id   = $admin_info[LOGIN_ADMIN_ID];
			$admin_name = $admin_info[LOGIN_ADMIN_NAME];
			
			for($month = 1; $month <= 12; $month++) {
				
				$day_count = $this->ajustDateValid($year, $month, 31);
				for($day = 1; $day <= $day_count; $day++) {
					
					$holiday = HOLIDAY_CODE_BUSINESS;
					$weekday = date('w', strtotime($year."/".$month."/".$day));
					if ((strcmp('0', $weekday) == 0) || (strcmp('6', $weekday) == 0)) {
						$holiday = HOLIDAY_CODE_HOLIDAY;
					}
					
					// 年月日
					$conditions[COLUMN_0200020] = $year;
					$conditions[COLUMN_0200030] = $month;
					$conditions[COLUMN_0200040] = $day;
					$conditions[COLUMN_0200050] = $weekday;
					$conditions[COLUMN_0200060] = $holiday;
					$conditions[COLUMN_0000010] = $date;
					$conditions[COLUMN_0000020] = $admin_id;
					$conditions[COLUMN_0000030] = $admin_name;
					$conditions[COLUMN_0000040] = $date;
					$conditions[COLUMN_0000050] = $admin_id;
					$conditions[COLUMN_0000060] = $admin_name;
					$conditions[COLUMN_0000100] = 0;

					$this->Controller->MstCalendar->create();
					$this->Controller->MstCalendar->save($conditions, false);
				}
			}
		} catch (Exception $ex) {
			$err = "Calendar->addNewYearCalendar で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 最大年数を取得
	 */
	function getMaxYearInCalendar() {
		try {
			
			$max_year = date('Y') - 1;
			
			$calendar = $this->Controller->MstCalendar->getMaxYear();

			foreach ($calendar as $keys => $values) {
				foreach ($values as $key => $value) {
					$max_year = $value[COLUMN_0200020];
				}
			}
			
			return $max_year;
		} catch (Exception $ex) {
			$err = "Calendar->getMaxYearInCalendar で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * 休日更新
	 */
	function updateCalendar($calendar) {
		try {
			
			$date = date(DATETIME_FORMAT_1);
			
			$admin_info = $this->SessionAdminInfo->getAdminInfo();
			$admin_id   = $admin_info[LOGIN_ADMIN_ID];
			$admin_name = $admin_info[LOGIN_ADMIN_NAME];
			
			$year = (int)$calendar['c_year_list'];
			
			for($month = 1; $month <= 12; $month++) {

				$day_count = $this->ajustDateValid($year, $month, 31);
				for($day = 1; $day <= $day_count; $day++) {

					$holiday = 0;
					if (isset($calendar['check'.$month.'_'.$day])) {
						$holiday = 1;
					}
					$id = $calendar['id_'.$month.'_'.$day];
					
					// 年月日
					$conditions = null;
					$conditions[COLUMN_0200010] = $id;
					$conditions[COLUMN_0200020] = $year;
					$conditions[COLUMN_0200030] = $month;
					$conditions[COLUMN_0200040] = $day;
					$conditions[COLUMN_0200060] = $holiday;
					$conditions[COLUMN_0000040] = $date;
					$conditions[COLUMN_0000050] = $admin_id;
					$conditions[COLUMN_0000060] = $admin_name;
					//$conditions[COLUMN_0000100] = 0;
					
					$this->Controller->MstCalendar->save($conditions, false);
				}
			}
		} catch (Exception $ex) {
			$err = "Calendar->updateCalendar で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 指定した年月の月初、月末を返す<br>
	 * 指定が無ければ前月分を返す
	 */
	function getMonthBeginEnd($year = null, $month = null) {
		try {
			
			$date_start = null;
			$date_end = null;
			
			if (is_null($year)) {
				
				$year  = date('Y');
				$month = date('n');
				if ($month == 1) {
					$year--;
					$month = 12;
				}
				else {
					$month--;
				}
			}
			
			$day = $this->ajustDateValid($year, $month, 31);
			
			$date_start = date(DATETIME_FORMAT_1, strtotime($year."/".$month."/01"));
			$date_end   = date(DATETIME_FORMAT_2, strtotime($year."/".$month."/".$day));
			
			return array($date_start, $date_end);
			
		} catch (Exception $ex) {
			$err = "Calendar->getMonthBeginEnd で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 指定した年月の前月の月末月初を取得<br>
	 * @return type
	 * @throws Exception
	 */
	function getLastMonthBeginEnd($year, $month) {
		try {
			
			$date_start = null;
			$date_end = null;
			
			if ($month == 1) {
				$year--;
				$month = 12;
			}
			else {
				$month--;
			}
			list($date_start, $date_end) = $this->getMonthBeginEnd($year, $month);
			
			return array($date_start, $date_end);
			
		} catch (Exception $ex) {
			$err = "Calendar->getLastMonthBeginEnd で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/*
	 * 西暦→和暦<br>
	 * 受け取った日付を「平成○○年○○月○○日」の形式で返す
	 */
	function convertAdtoJa($date) {
		try {
			
			$ja = "平成".(intval(date("Y", strtotime($date))) - 1988)
					."年".date("n", strtotime($date))."月".date("j", strtotime($date))."日";
			
			return $ja;
			
		} catch (Exception $ex) {
			$err = "Calendar->convertAdtoJa で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 西暦年数→和暦年数<br>
	 * 西暦年数を和暦年数(年号付)で返す<br>
	 * @param number $year_ad
	 * @return string $year_ja
	 * @throws Exception
	 */
	function convertAdtoJaYear($year_ad) {
		try {
			
			$year_ja = "平成".(intval($year_ad) - 1988);
			
			return $year_ja;
			
		} catch (Exception $ex) {
			$err = "Calendar->convertAdtoJaYear で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
}