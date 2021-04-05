<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class UserComponent extends Component {
	
	// 他のコンポーネントを使えるようにする。
	public $components = array(
		 "AgreementHistory"
		,"Common"
		,"Document"
		,"SessionUserInfo"
		,"SessionAdminInfo"
	);
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * ユーザリスト<br>
	 * 条件で指定された内容のユーザリストを取得する。<br>
	 * $count=trueの場合、countを取得する
	 * @param array $search
	 * @param boolean $select_count
	 * @return array $result
	 */
	function getUserList($search, $select_count = false) {
		
		try {
			
			$result     = array();
			
			$status     = null;
			$conditions = null;
			$order      = null;
			$order_asc  = "";

			// ◆絞込み条件◆
			// 漢字氏名(姓)
			if (isset($search[SEARCH_ID_050030010]) && strcmp("", $search[SEARCH_ID_050030010]) != 0) {
				$conditions[COLUMN_0800060." like"] = "%".$search[SEARCH_ID_050030010]."%";
			}
			// 漢字氏名(名)
			if (isset($search[SEARCH_ID_050030020]) && strcmp("", $search[SEARCH_ID_050030020]) != 0) {
				$conditions[COLUMN_0800070." like"] = "%".$search[SEARCH_ID_050030020]."%";
			}
			// 氏名カナ(姓)
			if (isset($search[SEARCH_ID_050030030]) && strcmp("", $search[SEARCH_ID_050030030]) != 0) {
				$conditions[COLUMN_0800080." like"] = "%".$search[SEARCH_ID_050030030]."%";
			}
			// 氏名カナ(名)
			if (isset($search[SEARCH_ID_050030040]) && strcmp("", $search[SEARCH_ID_050030040]) != 0) {
				$conditions[COLUMN_0800090." like"] = "%".$search[SEARCH_ID_050030040]."%";
			}
			// ユーザID
			if (isset($search[SEARCH_ID_050030050]) && strcmp("", $search[SEARCH_ID_050030050]) != 0) {
				$conditions[COLUMN_0800010] = $search[SEARCH_ID_050030050];
			}
			// 投資家管理番号
			if (isset($search[SEARCH_ID_050030055]) && strcmp("", $search[SEARCH_ID_050030055]) != 0) {
				$conditions[COLUMN_0800015] = sprintf("%08d", intval($search[SEARCH_ID_050030055]));
			}
			// 仮登録日(開始)
			if (isset($search[SEARCH_ID_050030060]) && strcmp("", $search[SEARCH_ID_050030060]) != 0) {
				$conditions[COLUMN_0800590." >="] = $search[SEARCH_ID_050030060];
			}
			// 仮登録日(終了)
			if (isset($search[SEARCH_ID_050030070]) && strcmp("", $search[SEARCH_ID_050030070]) != 0) {
				$conditions[COLUMN_0800590." <="] = $search[SEARCH_ID_050030070];
			}
			// 登録申請日(開始)
			if (isset($search[SEARCH_ID_050030080]) && strcmp("", $search[SEARCH_ID_050030080]) != 0) {
				$conditions[COLUMN_0800620." >="] = $search[SEARCH_ID_050030080];
			}
			// 登録申請日(終了)
			if (isset($search[SEARCH_ID_050030090]) && strcmp("", $search[SEARCH_ID_050030090]) != 0) {
				$conditions[COLUMN_0800620." <="] = $search[SEARCH_ID_050030090];
			}
			// 承認日(開始)
			if (isset($search[SEARCH_ID_050030100]) && strcmp("", $search[SEARCH_ID_050030100]) != 0) {
				$conditions[COLUMN_0800630." >="] = $search[SEARCH_ID_050030100];
			}
			// 承認日(終了)
			if (isset($search[SEARCH_ID_050030110]) && strcmp("", $search[SEARCH_ID_050030110]) != 0) {
				$conditions[COLUMN_0800630." <="] = $search[SEARCH_ID_050030110];
			}
			// 状態：仮登録
			if (isset($search[SEARCH_ID_050030120]) && strcmp(CHECKBOX_ON, $search[SEARCH_ID_050030120]) == 0) {
				$conditions[0][MODEL_OR][0][COLUMN_0800560] = USER_STATUS_CODE_INTERIM;
			}
			// 状態：登録申請中
			if (isset($search[SEARCH_ID_050030130]) && strcmp(CHECKBOX_ON, $search[SEARCH_ID_050030130]) == 0) {
				$conditions[0][MODEL_OR][1][COLUMN_0800560] = USER_STATUS_CODE_APPLIED;
			}
			// 状態：承認済
			if (isset($search[SEARCH_ID_050030140]) && strcmp(CHECKBOX_ON, $search[SEARCH_ID_050030140]) == 0) {
				$conditions[0][MODEL_OR][2][COLUMN_0800560] = USER_STATUS_CODE_APPROVED;
			}
			// 状態：認証済
			if (isset($search[SEARCH_ID_050030150]) && strcmp(CHECKBOX_ON, $search[SEARCH_ID_050030150]) == 0) {
				$conditions[0][MODEL_OR][3][COLUMN_0800560] = USER_STATUS_CODE_AUTHENTICATED;
			}
			// 状態：停止
			if (isset($search[SEARCH_ID_050030160]) && strcmp(CHECKBOX_ON, $search[SEARCH_ID_050030160]) == 0) {
				$conditions[0][MODEL_OR][4][COLUMN_0800560] = USER_STATUS_CODE_STOPPED;
			}
			// 状態：退会
			if (isset($search[SEARCH_ID_050030170]) && strcmp(CHECKBOX_ON, $search[SEARCH_ID_050030170]) == 0) {
				$conditions[0][MODEL_OR][5][COLUMN_0800560] = USER_STATUS_CODE_WITHDRAWAL;
			}
			// 状態：開設拒否
			if (isset($search[SEARCH_ID_050030180]) && strcmp(CHECKBOX_ON, $search[SEARCH_ID_050030180]) == 0) {
				$conditions[0][MODEL_OR][6][COLUMN_0800560] = USER_STATUS_CODE_REJECTED;
			}
			// メルマガ：受信する
			if (isset($search[SEARCH_ID_050030220]) && strcmp(CHECKBOX_ON, $search[SEARCH_ID_050030220]) == 0) {
				$conditions[1][MODEL_OR][0][COLUMN_0800536] = MAIL_MAGAZINE_RECEIVE;
			}
			// メルマガ：受信しない
			if (isset($search[SEARCH_ID_050030230]) && strcmp(CHECKBOX_ON, $search[SEARCH_ID_050030230]) == 0) {
				$conditions[1][MODEL_OR][1][COLUMN_0800536] = MAIL_MAGAZINE_REJECT;
			}

			// ◆ソート◆
			if (isset($search[SEARCH_ID_050030190])) {

				if (strcmp(SORT_ORDER_CODE_ASC, $search[SEARCH_ID_050030200]) == 0) {
					$order_asc = "asc";
				}
				else {
					$order_asc = "desc";
				}

				switch ($search[SEARCH_ID_050030190]) {
					case SORT_COLUMN_CODE_USER_LENDER_NO: // 投資家管理番号
						$order[COLUMN_0800015] = $order_asc;
						break;
					case SORT_COLUMN_CODE_USER_ID: // ユーザID
						$order[COLUMN_0800010] = $order_asc;
						break;
					case SORT_COLUMN_CODE_USER_KANA: // 氏名カナ
						$order[COLUMN_0800080] = $order_asc;
						$order[COLUMN_0800090] = $order_asc;
						break;
					case SORT_COLUMN_CODE_USER_INTERIM_DATETIME: // 仮登録日
						$order[COLUMN_0800590] = $order_asc;
						break;
					case SORT_COLUMN_CODE_USER_APPLICATION_DATETIME: // 登録申請日
						$order[COLUMN_0800620] = $order_asc;
						break;
					case SORT_COLUMN_CODE_USER_APPROVAL_DATETIME: // 承認日
						$order[COLUMN_0800630] = $order_asc;
						break;
				}
			}

			if (0 < count($conditions)) {
				$status[MODEL_CONDITIONS] = $conditions;
			}
			if (0 < count($order)) {
				$status[MODEL_ORDER] = $order;
			}

			// 検索結果が0件の場合戻り値にfalseを設定
			if ($select_count) {
				$result = $this->Controller->MstUser->find(MODEL_COUNT, $status);
			}
			else {
				
				$user_list = $this->Controller->MstUser->find(MODEL_ALL, $status);

				foreach ($user_list as $keys => $values) {
					foreach ($values as $key => $value) {
						$result[] = $value;
					}
				}
			}

			return $result;
			
		} catch (Exception $ex) {
			$err = "User->getUserList で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * ユーザ情報取得<br>
	 * IDで指定したを取得
	 * @param string $user_id
	 * @return array $result
	 */
	function getUser($user_id) {
		
		try {
			
			$conditions[COLUMN_0800010] = $user_id;
			$status[MODEL_CONDITIONS]   = $conditions;

			$mst_user = $this->Controller->MstUser->find(MODEL_ALL, $status);

			$result = null;
			foreach ($mst_user as $keys => $values) {
				foreach ($values as $key => $value) {
					$result[COLUMN_0800010] = $value[COLUMN_0800010];
					$result[COLUMN_0800020] = $value[COLUMN_0800020];
					$result[COLUMN_0800030] = $value[COLUMN_0800030];
					$result[COLUMN_0800040] = $value[COLUMN_0800040];
					$result[COLUMN_0800050] = $value[COLUMN_0800050];
					$result[COLUMN_0800060] = $value[COLUMN_0800060];
					$result[COLUMN_0800070] = $value[COLUMN_0800070];
					$result[COLUMN_0800080] = $value[COLUMN_0800080];
					$result[COLUMN_0800090] = $value[COLUMN_0800090];
					$result[COLUMN_0800100] = $value[COLUMN_0800100];
					$result[COLUMN_0800110] = $value[COLUMN_0800110];
					$result[COLUMN_0800120] = $value[COLUMN_0800120];
					$result[COLUMN_0800130] = $value[COLUMN_0800130];
					$result[COLUMN_0800140] = $value[COLUMN_0800140];
					$result[COLUMN_0800150] = $value[COLUMN_0800150];
					$result[COLUMN_0800160] = $value[COLUMN_0800160];
					$result[COLUMN_0800170] = $value[COLUMN_0800170];
					$result[COLUMN_0800180] = $value[COLUMN_0800180];
					$result[COLUMN_0800190] = $value[COLUMN_0800190];
					$result[COLUMN_0800200] = $value[COLUMN_0800200];
					$result[COLUMN_0800210] = $value[COLUMN_0800210];
					$result[COLUMN_0800220] = $value[COLUMN_0800220];
					$result[COLUMN_0800230] = $value[COLUMN_0800230];
					$result[COLUMN_0800240] = $value[COLUMN_0800240];
					$result[COLUMN_0800250] = $value[COLUMN_0800250];
					$result[COLUMN_0800260] = $value[COLUMN_0800260];
					$result[COLUMN_0800270] = $value[COLUMN_0800270];
					$result[COLUMN_0800280] = $value[COLUMN_0800280];
					$result[COLUMN_0800290] = $value[COLUMN_0800290];
					$result[COLUMN_0800300] = $value[COLUMN_0800300];
					$result[COLUMN_0800310] = $value[COLUMN_0800310];
					$result[COLUMN_0800320] = $value[COLUMN_0800320];
					$result[COLUMN_0800330] = $value[COLUMN_0800330];
					$result[COLUMN_0800340] = $value[COLUMN_0800340];
					$result[COLUMN_0800350] = $value[COLUMN_0800350];
					$result[COLUMN_0800360] = $value[COLUMN_0800360];
					$result[COLUMN_0800370] = $value[COLUMN_0800370];
					$result[COLUMN_0800380] = $value[COLUMN_0800380];
					$result[COLUMN_0800390] = $value[COLUMN_0800390];
					$result[COLUMN_0800400] = $value[COLUMN_0800400];
					$result[COLUMN_0800410] = $value[COLUMN_0800410];
					$result[COLUMN_0800420] = $value[COLUMN_0800420];
					$result[COLUMN_0800430] = $value[COLUMN_0800430];
					$result[COLUMN_0800440] = $value[COLUMN_0800440];
					$result[COLUMN_0800450] = $value[COLUMN_0800450];
					$result[COLUMN_0800460] = $value[COLUMN_0800460];
					$result[COLUMN_0800470] = $value[COLUMN_0800470];
					$result[COLUMN_0800480] = $value[COLUMN_0800480];
					$result[COLUMN_0800490] = $value[COLUMN_0800490];
					$result[COLUMN_0800500] = $value[COLUMN_0800500];
					$result[COLUMN_0800510] = $value[COLUMN_0800510];
					$result[COLUMN_0800520] = $value[COLUMN_0800520];
					$result[COLUMN_0800530] = $value[COLUMN_0800530];
					$result[COLUMN_0800536] = $value[COLUMN_0800536];
					$result[COLUMN_0800540] = $value[COLUMN_0800540];
					$result[COLUMN_0800550] = $value[COLUMN_0800550];
					$result[COLUMN_0800560] = $value[COLUMN_0800560];
					$result[COLUMN_0800570] = $value[COLUMN_0800570];
					$result[COLUMN_0800580] = $value[COLUMN_0800580];
					$result[COLUMN_0800590] = $value[COLUMN_0800590];
					$result[COLUMN_0800600] = $value[COLUMN_0800600];
					$result[COLUMN_0800610] = $value[COLUMN_0800610];
					$result[COLUMN_0800620] = $value[COLUMN_0800620];
					$result[COLUMN_0800630] = $value[COLUMN_0800630];
					$result[COLUMN_0800640] = $value[COLUMN_0800640];
					$result[COLUMN_0800650] = $value[COLUMN_0800650];
					$result[COLUMN_0800660] = $value[COLUMN_0800660];
					$result[COLUMN_0800670] = $value[COLUMN_0800670];
					$result[COLUMN_0800680] = $value[COLUMN_0800680];
					$result[COLUMN_0800690] = $value[COLUMN_0800690];
					$result[COLUMN_0800700] = $value[COLUMN_0800700];
					$result[COLUMN_0800710] = $value[COLUMN_0800710];
					$result[COLUMN_0800720] = $value[COLUMN_0800720];
					$result[COLUMN_0800730] = $value[COLUMN_0800730];
					$result[COLUMN_0800740] = $value[COLUMN_0800740];
					$result[COLUMN_0800750] = $value[COLUMN_0800750];
					$result[COLUMN_0000040] = $value[COLUMN_0000040];
					$result[COLUMN_0000050] = $value[COLUMN_0000050];
					$result[COLUMN_0000060] = $value[COLUMN_0000060];
					$result[COLUMN_0800760] = $value[COLUMN_0800760];
					$result[COLUMN_0800770] = $value[COLUMN_0800770];
					$result[COLUMN_0800780] = $value[COLUMN_0800780];
					$result[COLUMN_0800790] = $value[COLUMN_0800790];
					$result[COLUMN_0000100] = $value[COLUMN_0000100];
				}
			}

			return $result;
			
		} catch (Exception $ex) {
			$err = "User->getUser で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * ユーザ情報取得(v040070用)<br>
	 * IDで指定したを取得
	 * @param string $user_id
	 * @return array $result
	 */
	function getUser040070($user_id) {
		
		try {
			
			$conditions[COLUMN_0800010] = $user_id;
			$status[MODEL_CONDITIONS]   = $conditions;

			$mst_user = $this->Controller->MstUser->find(MODEL_ALL, $status);

			$result = null;
			foreach ($mst_user as $keys => $values) {
				foreach ($values as $key => $value) {
					
					// 生年月日
					$birthday_year  = substr($value[COLUMN_0800150], 0, 4);
					$birthday_month = substr($value[COLUMN_0800150], 4, 2);
					$birthday_day   = substr($value[COLUMN_0800150], 6, 2);
					
					$result[OBJECT_ID_040070010] = $value[COLUMN_0800010];
					$result[OBJECT_ID_040070060] = $value[COLUMN_0800020];
					$result[OBJECT_ID_040070020] = $value[COLUMN_0800060];
					$result[OBJECT_ID_040070030] = $value[COLUMN_0800070];
					$result[OBJECT_ID_040070040] = $value[COLUMN_0800080];
					$result[OBJECT_ID_040070050] = $value[COLUMN_0800090];
					$result[OBJECT_ID_040070070] = $value[COLUMN_0800140];
					$result[OBJECT_ID_040070080] = date(DATE_FORMAT, strtotime($birthday_year."/".$birthday_month."/".$birthday_day));
					$result[OBJECT_ID_040070090] = $value[COLUMN_0800160];
					$result[OBJECT_ID_040070100] = $value[COLUMN_0800170];
					$result[OBJECT_ID_040070110] = $value[COLUMN_0800180];
					$result[OBJECT_ID_040070120] = $value[COLUMN_0800190];
					$result[OBJECT_ID_040070130] = $value[COLUMN_0800200];
					$result[OBJECT_ID_040070140] = $value[COLUMN_0800210];
					$result[OBJECT_ID_040070150] = $value[COLUMN_0800220];
					$result[OBJECT_ID_040070160] = $value[COLUMN_0800230];
					$result[OBJECT_ID_040070170] = $value[COLUMN_0800240];
					$result[OBJECT_ID_040070180] = $value[COLUMN_0800250];
					$result[OBJECT_ID_040070190] = $value[COLUMN_0800260];
					$result[OBJECT_ID_040070200] = $value[COLUMN_0800270];
					$result[OBJECT_ID_040070210] = $value[COLUMN_0800280];
					$result[OBJECT_ID_040070220] = $value[COLUMN_0800290];
					$result[OBJECT_ID_040070230] = $value[COLUMN_0800300];
					$result[OBJECT_ID_040070240] = $value[COLUMN_0800310];
					$result[OBJECT_ID_040070250] = $value[COLUMN_0800320];
					$result[OBJECT_ID_040070260] = $value[COLUMN_0800330];
					$result[OBJECT_ID_040070270] = $value[COLUMN_0800340];
					$result[OBJECT_ID_040070280] = $value[COLUMN_0800350];
					$result[OBJECT_ID_040070290] = $value[COLUMN_0800360];
					$result[OBJECT_ID_040070300] = $value[COLUMN_0800370];
					$result[OBJECT_ID_040070310] = $value[COLUMN_0800380];
					$result[OBJECT_ID_040070320] = $value[COLUMN_0800390];
					$result[OBJECT_ID_040070330] = $value[COLUMN_0800400];
					$result[OBJECT_ID_040070340] = $value[COLUMN_0800410];
					$result[OBJECT_ID_040070350] = $value[COLUMN_0800420];
					$result[OBJECT_ID_040070360] = $value[COLUMN_0800430];
					$result[OBJECT_ID_040070370] = $value[COLUMN_0800440];
					$result[OBJECT_ID_040070380] = $value[COLUMN_0800450];
					$result[OBJECT_ID_040070390] = $value[COLUMN_0800460];
					$result[OBJECT_ID_040070400] = $value[COLUMN_0800470];
					$result[OBJECT_ID_040070410] = $value[COLUMN_0800480];
					$result[OBJECT_ID_040070420] = $value[COLUMN_0800490];
					$result[OBJECT_ID_040070430] = $value[COLUMN_0800500];
					$result[OBJECT_ID_040070440] = $value[COLUMN_0800510];
					$result[OBJECT_ID_040070450] = $value[COLUMN_0800520];
					$result[OBJECT_ID_040070460] = $value[COLUMN_0800530];
					$result[OBJECT_ID_040070470] = $value[COLUMN_0800536];
				}
			}

			return $result;
			
		} catch (Exception $ex) {
			$err = "User->getUser で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * ユーザワーク作成<br>
	 * @param string $admin_id $user_id
	 */
	function makeWrkUser($admin_id, $user_id) {
		
		try {
			
			// 削除条件指定
			$conditions[COLUMN_1800000] = $admin_id;

			// ワーク削除実行
			$this->Controller->WrkUser->deleteAll($conditions, false);

			// ワーク作成実行
			$this->Controller->WrkUser->copyMstUser($admin_id, $user_id);
			
		} catch (Exception $ex) {
			$err = "User->makeWrkUser で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * ユーザワーク取得
	 * @param string $admin_id
	 * @return array $data
	 */
	function getWrkUser($admin_id) {
		
		try {
			
			// パラメータ設定
			$conditions[COLUMN_1800000] = $admin_id;

			// ワークデータ取得
			$status[MODEL_CONDITIONS] = $conditions;
			$data = $this->Controller->WrkUser->find(MODEL_ALL, $status);

			return $data;
			
		} catch (Exception $ex) {
			$err = "User->getWrkUser で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * ユーザワーク取得(管理者)
	 * @param string $admin_id
	 * @return array $data
	 */
	function getWrkUserC050($admin_id) {
		
		try {
			
			$data = null;

			$wrk_data = $this->getWrkUser($admin_id);

			foreach ($wrk_data as $key => $values) {
				foreach ($values as $value) {
					
					$appr_admin = "";
					$rjct_admin = "";
					if (!is_null($value[COLUMN_1800640]) && strcmp("", $value[COLUMN_1800640]) != 0) {
						$appr_admin = $value[COLUMN_1800640]."：".$value[COLUMN_1800650];
					}
					if (!is_null($value[COLUMN_1800690]) && strcmp("", $value[COLUMN_1800690]) != 0) {
						$rjct_admin = $value[COLUMN_1800690]."：".$value[COLUMN_1800700];
					}

					$data = array(
						 OBJECT_ID_050050010 => $value[COLUMN_1800010]
						,OBJECT_ID_050050015 => $value[COLUMN_1800015]
						,OBJECT_ID_050050020 => $value[COLUMN_1800020]
						,OBJECT_ID_050050030 => $value[COLUMN_1800060]
						,OBJECT_ID_050050040 => $value[COLUMN_1800070]
						,OBJECT_ID_050050050 => $value[COLUMN_1800080]
						,OBJECT_ID_050050060 => $value[COLUMN_1800090]
						,OBJECT_ID_050050070 => $value[COLUMN_1800140]
						,OBJECT_ID_050050080 => date("Y", strtotime($value[COLUMN_1800150]))
						,OBJECT_ID_050050090 => date("n", strtotime($value[COLUMN_1800150]))
						,OBJECT_ID_050050100 => date("j", strtotime($value[COLUMN_1800150]))
						,OBJECT_ID_050050110 => $value[COLUMN_1800160]
						,OBJECT_ID_050050120 => $value[COLUMN_1800170]
						,OBJECT_ID_050050130 => $value[COLUMN_1800180]
						,OBJECT_ID_050050140 => $value[COLUMN_1800190]
						,OBJECT_ID_050050150 => $value[COLUMN_1800200]
						,OBJECT_ID_050050160 => $value[COLUMN_1800210]
						,OBJECT_ID_050050170 => $value[COLUMN_1800220]
						,OBJECT_ID_050050180 => $value[COLUMN_1800230]
						,OBJECT_ID_050050190 => $value[COLUMN_1800240]
						,OBJECT_ID_050050200 => $value[COLUMN_1800250]
						,OBJECT_ID_050050210 => $value[COLUMN_1800260]
						,OBJECT_ID_050050220 => $value[COLUMN_1800270]
						,OBJECT_ID_050050230 => $value[COLUMN_1800280]
						,OBJECT_ID_050050240 => $value[COLUMN_1800290]
						,OBJECT_ID_050050250 => $value[COLUMN_1800300]
						,OBJECT_ID_050050260 => $value[COLUMN_1800310]
						,OBJECT_ID_050050270 => $value[COLUMN_1800320]
						,OBJECT_ID_050050280 => $value[COLUMN_1800330]
						,OBJECT_ID_050050290 => $value[COLUMN_1800340]
						,OBJECT_ID_050050300 => $value[COLUMN_1800350]
						,OBJECT_ID_050050310 => $value[COLUMN_1800360]
						,OBJECT_ID_050050315 => $value[COLUMN_1800365]
						,OBJECT_ID_050050320 => $value[COLUMN_1800370]
						,OBJECT_ID_050050325 => $value[COLUMN_1800375]
						,OBJECT_ID_050050330 => $value[COLUMN_1800380]
						,OBJECT_ID_050050340 => $value[COLUMN_1800390]
						,OBJECT_ID_050050350 => $value[COLUMN_1800400]
						,OBJECT_ID_050050355 => $value[COLUMN_1800405]
						,OBJECT_ID_050050360 => $value[COLUMN_1800410]
						,OBJECT_ID_050050370 => $value[COLUMN_1800420]
						,OBJECT_ID_050050380 => $value[COLUMN_1800430]
						,OBJECT_ID_050050390 => $value[COLUMN_1800440]
						,OBJECT_ID_050050400 => $value[COLUMN_1800450]
						,OBJECT_ID_050050410 => $value[COLUMN_1800460]
						,OBJECT_ID_050050420 => $value[COLUMN_1800470]
						,OBJECT_ID_050050430 => $value[COLUMN_1800480]
						,OBJECT_ID_050050440 => $value[COLUMN_1800490]
						,OBJECT_ID_050050450 => $value[COLUMN_1800500]
						,OBJECT_ID_050050460 => $value[COLUMN_1800510]
						,OBJECT_ID_050050470 => $value[COLUMN_1800520]
						,OBJECT_ID_050050480 => $value[COLUMN_1800530]
						,OBJECT_ID_050050486 => $value[COLUMN_1800536]
						,OBJECT_ID_050050490 => $value[COLUMN_1800540]
						,OBJECT_ID_050050500 => $value[COLUMN_1800550]
						,OBJECT_ID_050050510 => $value[COLUMN_1800560]
						,OBJECT_ID_050050520 => $value[COLUMN_1800590]
						,OBJECT_ID_050050530 => $value[COLUMN_1800600]
						,OBJECT_ID_050050540 => $value[COLUMN_1800610]
						,OBJECT_ID_050050550 => $value[COLUMN_1800620]
						,OBJECT_ID_050050560 => $value[COLUMN_1800630]
						,OBJECT_ID_050050570 => $appr_admin
						,OBJECT_ID_050050580 => $value[COLUMN_1800660]
						,OBJECT_ID_050050590 => $value[COLUMN_1800670]
						,OBJECT_ID_050050600 => $value[COLUMN_1800680]
						,OBJECT_ID_050050610 => $rjct_admin
						,OBJECT_ID_050050620 => $value[COLUMN_1800710]
						,OBJECT_ID_050050630 => $value[COLUMN_0000100]
					);
				}
			}

			return $data;
			
		} catch (Exception $ex) {
			$err = "User->getWrkUserC050 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}

	/** ファンドマスタ登録<br>
	 * 対象のマスタを削除後、ワークテーブルのデータをマスタにコピーする。
	 * @param array $admin_info
	 * @param string  $user_id
	 */
	function saveMstUser($admin_info, $user_id) {
		
		try {
			
			// 削除条件指定
			$conditions[COLUMN_0800010] = $user_id;

			// 削除実行
			$this->Controller->MstUser->deleteAll($conditions, false);

			// ワークコピー
			$this->Controller->MstUser->copyWrkUser($admin_info[LOGIN_ADMIN_ID]);
			
		} catch (Exception $ex) {
			$err = "User->saveMstUser で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * 有効期日取得<br>
	 * IDで指定したユーザの有効期日を取得
	 * @param string $user_id
	 * @return date $expiration_date
	 */
	function getExpirationDate($user_id) {
		
		try {
			
			$expiration_date = null;

			// 取得条件セット
			$conditions[COLUMN_0800010] = $user_id;
			$status[MODEL_CONDITIONS]   = $conditions;

			// ユーザデータ取得
			$data = $this->Controller->MstUser->find(MODEL_ALL, $status);

			// 有効期日取出し
			foreach ($data as $key => $values) {
				foreach ($values as $value) {
					$expiration_date = $value[COLUMN_0800600];
				}
			}

			return $expiration_date;
			
		} catch (Exception $ex) {
			$err = "User->getExpirationDate で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * ユーザID生成<br>
	 * ランダムに USER_ID_LENGTH で指定した桁数の数列を返す
	 * @return string 生成したユーザID
	 */
	public function makeUserId() {
		
		try {
			
			$str = array_merge(range("0", "9"));
			$status = null;

			// 同一のものが存在しないIDが生成出来るまで繰り返す
			do {

				// ユーザID生成
				$user_id = "";
				for ($i = 0; $i < USER_ID_LENGTH; $i++) {
					$user_id .= $str[rand(0, 9)];
				}

				// ユーザマスタを参照して、同一IDが存在しないことを確認
				$status = array(MODEL_CONDITIONS => array(COLUMN_0800010." =" => $user_id));

			} while (0 != $this->Controller->MstUser->find(MODEL_COUNT, $status));

			return $user_id;
			
		} catch (Exception $ex) {
			$err = "User->makeUserId で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 認証キー生成<br>
	 * ランダムに USER_ID_LENGTH で指定した桁数の数列を返す
	 * @return string 生成したユーザID
	 */
	public function makeAuthenticationKey() {
		
		try {
			
//			$str = array_merge(range('a', 'z'), range('0', '9'), range('A', 'Z'));
			$str = array_merge(range('a', 'z'), range('A', 'Z'));

			// 認証キー生成
			$authentication_key = "";
			for ($i = 0; $i < AUTHENTICATION_KEY_LENGTH; $i++) {
				$authentication_key .= $str[rand(0, count($str) - 1)];
			}

			return $authentication_key;
			
		} catch (Exception $ex) {
			$err = "User->makeAuthenticationKey で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 存在チェック：ユーザID + パスワード<br>
	 * ユーザIDとパスワードの組み合わせが存在するかをチェック
	 * 存在する  ：True
	 * 存在しない：False
	 * @param string $user_id $password
	 * @return boolean
	 */
	function chkExistenceUserIdPass($user_id, $password) {

		try {
			
			$result = true;
			$status = null;

			// 検索条件設定
			$status = array(MODEL_CONDITIONS => array(
				 COLUMN_0800010." =" => $user_id
				,COLUMN_0800030." =" => $password
				));

			// 検索結果が0件の場合戻り値にfalseを設定
			if (0 == $this->Controller->MstUser->find(MODEL_COUNT, $status)) {
				$result = false;
			}

			return $result;
			
		} catch (Exception $ex) {
			$err = "User->chkExistenceUserIdPass で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * 状態更新<br>
	 * ユーザの状態を引数で渡された状態コードで上書きする。<br>
	 * 停止、拒否、退会の場合は理由も登録する。<br>
	 * USER_STATUS_CODE_INTERIM      ：仮登録<br>
	 * USER_STATUS_CODE_APPLIED      ：登録申請中<br>
	 * USER_STATUS_CODE_APPROVED     ：承認済<br>
	 * USER_STATUS_CODE_AUTHENTICATED：認証済<br>
	 * USER_STATUS_CODE_STOPPED      ：停止<br>
	 * USER_STATUS_CODE_WITHDRAWAL   ：退会<br>
	 * USER_STATUS_CODE_REJECTED     ：開設拒否<br>
	 * @param array $admin_info
	 * @param string $status_code
	 * @param array $data
	 * @return boolean $result
	 */
	function updateUserStatus($admin_info, $status_code, $data) {
		
		try {
			
			$admin_id   = $admin_info[LOGIN_ADMIN_ID];
			$admin_name = $admin_info[LOGIN_ADMIN_NAME];

			//$wrk_data = $this->getWrkUser($admin_id);

			$reg_data = null;

			switch ($status_code) {
				case USER_STATUS_CODE_APPROVED: // 承認済

					$reg_data = array(
						 COLUMN_1800000 => $admin_id                  // 管理者ID
						,COLUMN_1800540 => $data[OBJECT_ID_050050490] // 本人確認書類画像
						,COLUMN_1800550 => $data[OBJECT_ID_050050500] // 口座情報画像
						,COLUMN_1800560 => $status_code               // 状態コード
						,COLUMN_1800630 => date(DATETIME_FORMAT)      // 承認日時
						,COLUMN_1800640 => $admin_id                  // 承認管理者ID
						,COLUMN_1800650 => $admin_name                // 承認管理者名
					);

					break;

				case USER_STATUS_CODE_AUTHENTICATED: // 認証済

					$reg_data = array(
						 COLUMN_1800000 => $admin_id             // 管理者ID
						,COLUMN_1800560 => $status_code          // 状態コード
					);

					break;

				case USER_STATUS_CODE_STOPPED: // 停止

					$reg_data = array(
						 COLUMN_1800000 => $admin_id             // 管理者ID
						,COLUMN_1800560 => $status_code          // 状態コード
						,COLUMN_1800720 => date(DATETIME_FORMAT) // 停止日時
						,COLUMN_1800730 => $admin_id             // 停止管理者ID
						,COLUMN_1800740 => $admin_name           // 停止管理者名
						,COLUMN_1800750 => $reason               // 停止理由
					);

					break;

				case USER_STATUS_CODE_WITHDRAWAL: // 退会

					$reg_data = array(
						 COLUMN_1800000 => $admin_id             // 管理者ID
						,COLUMN_1800560 => $status_code          // 状態コード
						,COLUMN_1800760 => date(DATETIME_FORMAT) // 退会処理日時
						,COLUMN_1800770 => $admin_id             // 退会処理管理者ID
						,COLUMN_1800780 => $admin_name           // 退会処理管理者名
						,COLUMN_1800790 => $reason               // 退会理由
					);

					break;

				case USER_STATUS_CODE_REJECTED: // 開設拒否

					$reg_data = array(
						 COLUMN_1800000 => $admin_id                  // 管理者ID
						,COLUMN_1800560 => $status_code               // 状態コード
						,COLUMN_1800680 => date(DATETIME_FORMAT)      // 拒否日時
						,COLUMN_1800690 => $admin_id                  // 拒否管理者ID
						,COLUMN_1800700 => $admin_name                // 拒否管理者名
						,COLUMN_1800710 => $data[OBJECT_ID_050050620] // 拒否理由
					);

					break;
			}

			// 登録実行
			//$result = $this->Controller->WrkUser->save($reg_data, false);

			//return $result;
			return $reg_data;
			
		} catch (Exception $ex) {
			$err = "User->updateUserStatus で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}

	/**
	 * 投資家認証<br>
	 * ユーザIDで指定したユーザの状態を認証にする。<br>
	 * @param string $user_id
	 * @return boolean $result
	 */
	function authenticate($user_id) {
		
		try {
			
			$reg_data = array(
				 COLUMN_0800010 => $user_id                       // ユーザID
				,COLUMN_0800560 => USER_STATUS_CODE_AUTHENTICATED // 状態コード
				,COLUMN_0800670 => date(DATETIME_FORMAT)          // 認証日時
			);

			// 登録実行
			$result = $this->Controller->MstUser->save($reg_data, false);

			// セッション内のユーザ情報を更新
			$this->SessionUserInfo->setUserInfo($user_id);

			return $result;
			
		} catch (Exception $ex) {
			$err = "User->authenticate で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}

	/**
	 * ユーザマスタ仮登録<br>
	 * 仮申請時に最低限の項目をユーザマスタに登録する。
	 * @param array $data
	 * @return array $reg_data
	 */
	function regMstUserInterim(&$data) {
		
		try {
			
			$data[COLUMN_0800010] = $this->makeUserId();
			$data[COLUMN_0800015] = $this->makeLenderNo();

			// 登録データ設定
			$reg_data = array(
				 COLUMN_0800010 => $data[COLUMN_0800010]      // ユーザID
				,COLUMN_0800015 => $data[COLUMN_0800015]      // 投資家管理番号
				,COLUMN_0800020 => $data[OBJECT_ID_020010010] // メールアドレス
				,COLUMN_0800030 => $data[OBJECT_ID_020010030] // パスワード
				,COLUMN_0800560 => USER_STATUS_CODE_INTERIM   // 状態：仮申請
				,COLUMN_0800570 => $data[OBJECT_ID_020010050] // 秘密の質問
				,COLUMN_0800580 => $data[OBJECT_ID_020010060] // 秘密の質問の答え
				,COLUMN_0800590 => date(DATETIME_FORMAT)      // 仮登録日時
				,COLUMN_0800600 => date(DATETIME_FORMAT_2, strtotime("+".EXPIRATION_TERM_REGISTER." day")) // 有効期限
				,COLUMN_0800610 => date(DATETIME_FORMAT_2, strtotime("+".DELETE_TERM_REGISTER    ." day")) // 削除予定日
				,COLUMN_0000100 => 0                          // 排他キー
				,COLUMN_0800536 => 1//$data[OBJECT_ID_020010070] // メールマガジン
			);

			// 登録実行
			if ($this->Controller->MstUser->save($reg_data, false)) {
				return $reg_data;
			}

			return false;
			
		} catch (Exception $ex) {
			$err = "User->regMstUserInterim で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * ユーザマスタ本登録<br>
	 * 画面で入力された基本情報等でユーザマスタを更新する。
	 * @param array $data
	 * @return boolean DB登録結果
	 */
	function regMstUser(&$data) {
		
		try {
			
			// 生年月日
			$birthday = sprintf('%04d', $data[OBJECT_ID_030020060])
					   .sprintf('%02d', $data[OBJECT_ID_030020070])
					   .sprintf('%02d', $data[OBJECT_ID_030020080]);

			// 登録データ設定
			$reg_data = array(
				 COLUMN_0800010 => $this->SessionUserInfo->getUserId() // ユーザID
				,COLUMN_0800060 => $data[OBJECT_ID_030020010] // 漢字氏名(姓)
				,COLUMN_0800070 => $data[OBJECT_ID_030020020] // 漢字氏名(名)
				,COLUMN_0800080 => $data[OBJECT_ID_030020030] // 氏名フリガナ(姓)
				,COLUMN_0800090 => $data[OBJECT_ID_030020040] // 氏名フリガナ(名)
				,COLUMN_0800140 => $data[OBJECT_ID_030020050] // 性別
				,COLUMN_0800150 => $birthday                  // 生年月日 YYYYMMDD
				,COLUMN_0800160 => $data[OBJECT_ID_030020090] // 郵便番号 9999999
				,COLUMN_0800170 => $data[OBJECT_ID_030020100] // 都道府県
				,COLUMN_0800180 => $data[OBJECT_ID_030020110] // 市区町村丁目番地
				,COLUMN_0800190 => $data[OBJECT_ID_030020120] // 建物名
				,COLUMN_0800200 => $data[OBJECT_ID_030020130] // 固定電話番号
				,COLUMN_0800210 => $data[OBJECT_ID_030020140] // 携帯電話番号
				,COLUMN_0800220 => $data[OBJECT_ID_030020150] // 住居の状況
				,COLUMN_0800230 => $data[OBJECT_ID_030020160] // 家族構成
				,COLUMN_0800240 => $data[OBJECT_ID_030020170] // 金融資産
				,COLUMN_0800250 => $data[OBJECT_ID_030020180] // 所有不動産
	//			,COLUMN_0800260 => $data[OBJECT_ID_030020190] // 借入残高
	//			,COLUMN_0800270 => $data[OBJECT_ID_030020200] // 興味のある商品
				,COLUMN_0800280 => $data[OBJECT_ID_030020210] // 取引開始のきっかけ
				,COLUMN_0800290 => $data[OBJECT_ID_030020220] // 職業
				,COLUMN_0800300 => $data[OBJECT_ID_030020230] // 勤務先名
				,COLUMN_0800310 => $data[OBJECT_ID_030020240] // 年収
				,COLUMN_0800320 => $data[OBJECT_ID_030020250] // 勤務先郵便番号
				,COLUMN_0800330 => $data[OBJECT_ID_030020260] // 勤務先住所
				,COLUMN_0800340 => $data[OBJECT_ID_030020270] // 勤務先電話番号
				,COLUMN_0800350 => $data[OBJECT_ID_030020280] // 金融機関区分
				,COLUMN_0800360 => $data[OBJECT_ID_030020290] // 金融機関名(その他選択時のみ)
				,COLUMN_0800370 => $data[OBJECT_ID_030020300] // 支店名
				,COLUMN_0800380 => $data[OBJECT_ID_030020310] // 種目
				,COLUMN_0800390 => $data[OBJECT_ID_030020320] // 記号(ゆうちょ選択時のみ)
				,COLUMN_0800400 => $data[OBJECT_ID_030020330] // 口座番号
				,COLUMN_0800410 => $data[OBJECT_ID_030020340] // 口座名義人
				,COLUMN_0800420 => $data[OBJECT_ID_030020350] // 株式の経験
				,COLUMN_0800430 => $data[OBJECT_ID_030020360] // 債権の経験
				,COLUMN_0800440 => $data[OBJECT_ID_030020370] // 投資信託の経験
				,COLUMN_0800450 => $data[OBJECT_ID_030020380] // 主に信用リスクを取る商品の経験
				,COLUMN_0800460 => $data[OBJECT_ID_030020390] // 商品先物の経験
				,COLUMN_0800470 => $data[OBJECT_ID_030020400] // 為替証拠金取引の経験
	//			,COLUMN_0800480 => $data[OBJECT_ID_030020410] // その他の経験
				,COLUMN_0800490 => $data[OBJECT_ID_030020420] // 投資の目的
				,COLUMN_0800500 => $data[OBJECT_ID_030020430] // 投資資金の性格
				,COLUMN_0800510 => $data[OBJECT_ID_030020440] // 資産運用に関する関心
				,COLUMN_0800520 => $data[OBJECT_ID_030020450] // 資産運用の方針
				,COLUMN_0800530 => $data[OBJECT_ID_030020460] // 希望運用期間
				,COLUMN_0800540 => IDENTIFICATION_IMAGE_FLAG_FALSE          // 本人確認：未取得
				,COLUMN_0800550 => ACCOUNT_INFORMATION_IMAGE_FLAG_FALSE     // 口座情報：未取得
				,COLUMN_0800560 => USER_STATUS_CODE_APPLIED                 // 状態：登録申請中
				,COLUMN_0800600 => date(DATETIME_FORMAT_2, strtotime("+".EXPIRATION_TERM_REGISTER." day")) // 有効期限
				,COLUMN_0800610 => date(DATETIME_FORMAT_2, strtotime("+".DELETE_TERM_REGISTER    ." day")) // 削除予定日
				,COLUMN_0800620 => date(DATETIME_FORMAT)                    // 登録申請日時
				,COLUMN_0800660 => $this->makeAuthenticationKey()           // 認証キー
			);

			// 登録実行
			$this->Controller->MstUser->save($reg_data, false);

			// セッション再取得
			$this->SessionUserInfo->setUserInfo($reg_data[COLUMN_0800010]);

			return true;
			
		} catch (Exception $ex) {
			$err = "User->regMstUser で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}

	}
	
	/**
	 * ユーザワーク更新<br>
	 * ユーザワークを更新する。
	 * @param array $data
	 */
	function updateWrkUser($data) {

		try {
			
			// 生年月日
			$birthday = sprintf('%04d', $data[OBJECT_ID_050050080])
					   .sprintf('%02d', $data[OBJECT_ID_050050090])
					   .sprintf('%02d', $data[OBJECT_ID_050050100]);

			// 管理者情報取得
			$admin_info = $this->SessionAdminInfo->getAdminInfo();

			$reg_data = array(
				 COLUMN_1800000 => $admin_info[LOGIN_ADMIN_ID]// ADMIN_ID
				,COLUMN_1800060 => $data[OBJECT_ID_050050030] // 漢字氏名(姓)
				,COLUMN_1800070 => $data[OBJECT_ID_050050040] // 漢字氏名(名)
				,COLUMN_1800080 => $data[OBJECT_ID_050050050] // 氏名フリガナ(姓)
				,COLUMN_1800090 => $data[OBJECT_ID_050050060] // 氏名フリガナ(名)
				,COLUMN_1800140 => $data[OBJECT_ID_050050070] // 性別
				,COLUMN_1800150 => $birthday                  // 生年月日 YYYYMMDD
				,COLUMN_1800160 => $data[OBJECT_ID_050050110] // 郵便番号 9999999
				,COLUMN_1800170 => $data[OBJECT_ID_050050120] // 都道府県
				,COLUMN_1800180 => $data[OBJECT_ID_050050130] // 市区町村丁目番地
				,COLUMN_1800190 => $data[OBJECT_ID_050050140] // 建物名
				,COLUMN_1800200 => $data[OBJECT_ID_050050150] // 固定電話番号
				,COLUMN_1800210 => $data[OBJECT_ID_050050160] // 携帯電話番号
				,COLUMN_1800220 => $data[OBJECT_ID_050050170] // 住居の状況
				,COLUMN_1800230 => $data[OBJECT_ID_050050180] // 家族構成

				,COLUMN_1800290 => $data[OBJECT_ID_050050240] // 職業
				,COLUMN_1800300 => $data[OBJECT_ID_050050250] // 勤務先名
				,COLUMN_1800310 => $data[OBJECT_ID_050050260] // 年収
				,COLUMN_1800320 => $data[OBJECT_ID_050050270] // 勤務先郵便番号
				,COLUMN_1800330 => $data[OBJECT_ID_050050280] // 勤務先住所
				,COLUMN_1800340 => $data[OBJECT_ID_050050290] // 勤務先電話番号

				,COLUMN_1800350 => $data[OBJECT_ID_050050300] // 金融機関区分
				,COLUMN_1800360 => $data[OBJECT_ID_050050310] // 金融機関名
				,COLUMN_1800365 => $data[OBJECT_ID_050050315] // 金融機関名
				,COLUMN_1800370 => $data[OBJECT_ID_050050320] // 支店名
				,COLUMN_1800375 => $data[OBJECT_ID_050050325] // 支店名
				,COLUMN_1800380 => $data[OBJECT_ID_050050330] // 種目
				,COLUMN_1800390 => $data[OBJECT_ID_050050340] // 記号(ゆうちょ選択時のみ)
				,COLUMN_1800400 => $data[OBJECT_ID_050050350] // 口座番号
				,COLUMN_1800405 => $data[OBJECT_ID_050050355] // 口座番号
				,COLUMN_1800410 => $data[OBJECT_ID_050050360] // 口座名義人

				,COLUMN_1800420 => $data[OBJECT_ID_050050370] // 株式（現物）
				,COLUMN_1800430 => $data[OBJECT_ID_050050380] // 債券（公社債）
				,COLUMN_1800440 => $data[OBJECT_ID_050050390] // 投資資金の性格
				,COLUMN_1800450 => $data[OBJECT_ID_050050400] // ファンド等
				,COLUMN_1800460 => $data[OBJECT_ID_050050410] // 商品先物
				,COLUMN_1800470 => $data[OBJECT_ID_050050420] // 為替証拠金取引（FX）

				,COLUMN_1800490 => $data[OBJECT_ID_050050440] // 投資の目的
				,COLUMN_1800240 => $data[OBJECT_ID_050050190] // 金融資産
				,COLUMN_1800250 => $data[OBJECT_ID_050050200] // 所有不動産
				,COLUMN_1800500 => $data[OBJECT_ID_050050450] // 投資資金の性格
				,COLUMN_1800510 => $data[OBJECT_ID_050050460] // 資産運用に関する関心
				,COLUMN_1800520 => $data[OBJECT_ID_050050470] // 資産運用の方針
				,COLUMN_1800530 => $data[OBJECT_ID_050050480] // 希望運用期間
				,COLUMN_1800280 => $data[OBJECT_ID_050050230] // 取引開始のきっかけ

				,COLUMN_1800540 => $data[OBJECT_ID_050050490] // 本人確認書類
				,COLUMN_1800550 => $data[OBJECT_ID_050050500] // 口座情報画像
				,COLUMN_1800560 => $data[OBJECT_ID_050050510] // ユーザーステイタス


			);

			// 登録実行
			//$this->Controller->WrkUser->save($reg_data, false);

			return $reg_data;
			
		} catch (Exception $ex) {
			$err = "User->updateWrkUser で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}

	/**
	 * ユーザ承認<br>
	 * ユーザを承認する。
	 * @param array $data
	 */
	function approveUser($data) {
		
		try {
			
			// 管理者情報取得
			$admin = $this->SessionAdminInfo->getAdminInfo();

			// 登録データ設定
			$reg_data = array(
				 OBJECT_ID_0008 => $this->Session->read(SESSION_USER_ID)
				,OBJECT_ID_0053 => $data[OBJECT_ID_0053]     // 本人確認書類
				,OBJECT_ID_0054 => $data[OBJECT_ID_0054]     // 口座情報
				,OBJECT_ID_0055 => USER_STATUS_CODE_APPROVED // 状態
				,OBJECT_ID_0060 => date(DATETIME_FORMAT)     // 承認日時
				,OBJECT_ID_0061 => $admin[LOGIN_ADMIN_ID]    // 承認管理者ID
				,OBJECT_ID_0099 => $admin[LOGIN_ADMIN_NAME]  // 承認管理者名
				,OBJECT_ID_0068 => date(DATETIME_FORMAT)     // 最終更新日時
				,OBJECT_ID_0069 => $admin[LOGIN_ADMIN_ID]    // 最終更新管理者ID
				,OBJECT_ID_0102 => $admin[LOGIN_ADMIN_NAME]  // 最終更新管理者名
				);

			// 登録項目指定
			$fields = array(
				 OBJECT_ID_0053 , OBJECT_ID_0054 , OBJECT_ID_0055
				,OBJECT_ID_0060 , OBJECT_ID_0061 , OBJECT_ID_0099
				,OBJECT_ID_0068 , OBJECT_ID_0069 , OBJECT_ID_0102
				,OBJECT_ID_0071
			);

			// 登録実行
			$this->Controller->WrkUser->save($reg_data, false, $fields);
			
		} catch (Exception $ex) {
			$err = "User->approveUser で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}

	/**
	 * ユーザ拒否<br>
	 * ユーザを拒否する。
	 * @param array $data
	 */
	function rejectUser($data) {
		
		try {
			
			// 管理者情報取得
			$admin = $this->SessionAdminInfo->getAdminInfo();

			// 登録データ設定
			$reg_data = array(
				 OBJECT_ID_0008 => $this->Session->read(SESSION_USER_ID)
				,OBJECT_ID_0053 => $data[OBJECT_ID_0053]     // 本人確認書類
				,OBJECT_ID_0054 => $data[OBJECT_ID_0054]     // 口座情報
				,OBJECT_ID_0055 => USER_STATUS_CODE_REJECTED // 状態
				,OBJECT_ID_0062 => date(DATETIME_FORMAT)     // 拒否日時
				,OBJECT_ID_0063 => $admin[LOGIN_ADMIN_ID]    // 拒否管理者ID
				,OBJECT_ID_0064 => $data[OBJECT_ID_0064]     // 拒否理由
				,OBJECT_ID_0100 => $admin[LOGIN_ADMIN_NAME]  // 拒否管理者名
				,OBJECT_ID_0068 => date(DATETIME_FORMAT)     // 最終更新日時
				,OBJECT_ID_0069 => $admin[LOGIN_ADMIN_ID]    // 最終更新管理者ID
				,OBJECT_ID_0102 => $admin[LOGIN_ADMIN_NAME]  // 最終更新管理者名
				);

			// 登録項目指定
			$fields = array(
				 OBJECT_ID_0053
				,OBJECT_ID_0054
				,OBJECT_ID_0055
				,OBJECT_ID_0062
				,OBJECT_ID_0063
				,OBJECT_ID_0064
				,OBJECT_ID_0100
				,OBJECT_ID_0068
				,OBJECT_ID_0069
				,OBJECT_ID_0102
				,OBJECT_ID_0071
				);

			// 登録実行
			$this->Controller->WrkUser->save($reg_data, false, $fields);
			
		} catch (Exception $ex) {
			$err = "User->rejectUser で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}

	/**
	 * ユーザマスタ排他キー取得
	 */
	function getMstUserExKey () {
		
		try {
			
			$conditions[COLUMN_0800010] = $this->Common->getSessionUserId();
			$status[MODEL_CONDITIONS]   = $conditions;

			$mst_user = $this->Controller->MstUser->find(MODEL_ALL, $status);

			$result = null;
			foreach ($mst_user as $keys => $values) {
				foreach ($values as $key => $value) {
					$result = $value[COLUMN_0000100];
				}
			}
			return $result;
			
		} catch (Exception $ex) {
			$err = "User->getMstUserExKey で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * ユーザワーク排他キー取得
	 */
	function getWrkUserExKey () {
		
		try {
			
			$conditions[COLUMN_1800000] = $this->SessionAdminInfo->getAdminInfo();
			$status[MODEL_CONDITIONS]   = $conditions;

			$mst_user = $this->Controller->WrkUser->find(MODEL_ALL, $status);

			$result = null;
			foreach ($mst_user as $keys => $values) {
				foreach ($values as $key => $value) {
					$result = $value[COLUMN_0000100];
				}
			}
			return $result;
			
		} catch (Exception $ex) {
			$err = "User->getWrkUserExKey で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/*
	 * ユーザワーク保存
	 */
	function saveWrkUser($reg_data) {
		
		try {
			
			$wrk_exkey = $this->getWrkUserExKey();

			// 管理者情報取得
			$admin_info = $this->SessionAdminInfo->getAdminInfo();

			$reg_data[COLUMN_0000040] = date(DATETIME_FORMAT);      // 最終更新日時
			$reg_data[COLUMN_0000050] = $admin_info[LOGIN_ADMIN_ID];   // 最終更新管理者ID
			$reg_data[COLUMN_0000060] = $admin_info[LOGIN_ADMIN_NAME]; // 最終更新管理者名
			$reg_data[COLUMN_0000100] = intval($wrk_exkey) + 1; // 排他キ-

			// 登録実行
			$this->Controller->WrkUser->save($reg_data, false);
			
		} catch (Exception $ex) {
			$err = "User->saveWrkUser で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}

	/*
	 * ユーザマスタ取得1件<br>
	 * @param string $user_id
	 * @return array $result
	 */
	function getMstUser($user_id) {
		
		try {
			
			$result = null;
			
			$conditions[COLUMN_0800010] = $user_id;
			$status[MODEL_CONDITIONS]   = $conditions;

			$user = $this->Controller->MstUser->find(MODEL_ALL, $status);
			
			foreach ($user as $keys => $values) {
				foreach ($values as $key => $value) {
					$result = $value;
				}
			}

			return $result;
			
		} catch (Exception $ex) {
			$err = "User->getMstUser で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/** ユーザ状態更新<br>
	 * 有効期限切れのユーザを仮登録に戻す<br>
	 * @param array $admin_info
	 * @param string  $user_id
	 */
	function updateUserStatusInterim($user_id) {
		
		try {
			
			$result = true;
			
			$conditions[COLUMN_0800010] = $user_id;
			$conditions[COLUMN_0800560] = USER_STATUS_CODE_APPLIED;
			$conditions[COLUMN_0800600." <"] = date(DATETIME_FORMAT);

			$status[MODEL_CONDITIONS]   = $conditions;

			if (0 < $this->Controller->MstUser->find(MODEL_COUNT, $status)) {
				
				$reg_data[COLUMN_0800010] = $user_id;
				$reg_data[COLUMN_0800560] = USER_STATUS_CODE_INTERIM;

				// 更新実行
				$this->Controller->MstUser->save($reg_data, false);
			}
			
		} catch (Exception $ex) {
			$err = "User->updateUserStatusInterim で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * 仮パスワード生成～登録<br>
	 * 仮パスワードの生成後、生成したパスワードでユーザマスタを更新
	 * @param string $user_id
	 * @return string $password
	 */
	public function makeInterimPassword($user_id) {
		
		try {
			
			$str = array_merge(range("a", "z"), range("0", "9"), range("A", "Z"));
			$status = null;

			// 仮パスワード生成
			$password = "";
			for ($i = 0; $i < INTERIM_PASS_LENGTH; $i++) {
				$password .= $str[rand(0, count($str) - 1)];
			}
			
			$reg_data[COLUMN_0800010] = $user_id;
			$reg_data[COLUMN_0800030] = $password;

			// 更新実行
			$this->Controller->MstUser->save($reg_data, false);

			return $password;
			
		} catch (Exception $ex) {
			$err = "User->makeInterimPassword で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * メールアドレスでユーザ検索<br>
	 * メールアドレスでユーザ情報を取得する
	 * @param string $mail_address
	 * @return array $data
	 */
	public function getMstUserbyMailAddress($mail_address) {
		
		try {
			
			$result = null;
			
			$conditions[COLUMN_0800020] = $mail_address;

			$status[MODEL_CONDITIONS]   = $conditions;

			$data = $this->Controller->MstUser->find(MODEL_ALL, $status);
			
			foreach ($data as $keys => $values) {
				foreach ($values as $key => $value) {
					$result = $value;
				}
			}
			
			return $result;
			
		} catch (Exception $ex) {
			$err = "User->getMstUserbyMailAddress で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 投資家管理番号生成
	 * $return string $new_lender_no
	 */
	function makeLenderNo() {
		
		try {
			
			$status[MODEL_CONDITIONS] = array(
				COLUMN_0800015." !=" => "99999999"
			);

			$status[MODEL_FIELDS] = array(
				"max(".COLUMN_0800015.") as ".COLUMN_0800015
			);

			$data = $this->Controller->MstUser->find(MODEL_ALL, $status);

			$lender_no = 0;
			foreach ($data as $keys => $values) {
				foreach ($values as $key => $value) {
					$lender_no = $value[COLUMN_0800015];
				}
			}

			$new_lender_no = sprintf("%08d", intval($lender_no) + 1);

			return $new_lender_no;
			
		} catch (Exception $ex) {
			$err = "User->makeLenderNo で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 認証済みユーザ全件取得<br>
	 * @return array $user_list
	 */
	function getAuthenticatedUser() {
		try {
			
			// ユーザ状態：認証済み
			$conditions[COLUMN_0800560] = USER_STATUS_CODE_AUTHENTICATED;
			
			// 取得するカラム
			$fields[] = COLUMN_0800010;
			$fields[] = COLUMN_0800020;
			$fields[] = COLUMN_0800060;
			$fields[] = COLUMN_0800070;
			
			$status[MODEL_CONDITIONS] = $conditions;
			$status[MODEL_FIELDS]     = $fields;
			
			$data_list = $this->Controller->MstUser->find(MODEL_ALL, $status);
			
			$user_list = array();
			foreach ($data_list as $keys => $values) {
				foreach ($values as $key => $value) {
					$data[COLUMN_0800010] = $value[COLUMN_0800010];
					$data[COLUMN_0800020] = $value[COLUMN_0800020];
					$data[COLUMN_0800060] = $value[COLUMN_0800060];
					$data[COLUMN_0800070] = $value[COLUMN_0800070];
					$user_list[] = $data;
				}
			}
			
			return $user_list;
			
		} catch (Exception $ex) {
			$err = "User->getAuthenticatedUser で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 年間取引報告書受取対象ユーザ全件取得<br>
	 * @param datetime $date_from
	 * @param datetime $date_to
	 * @return array $user_list
	 */
	function getAnnualTradeReportReceiveUser($date_from, $date_to) {
		try {
			
			$data_list = $this->Controller->MstUser->selectAnnualTradeReportReceiveUser($date_from, $date_to);
			
			$user_list = array();
			foreach ($data_list as $keys => $values) {
				$data[COLUMN_0800010] = $values["a"][COLUMN_0800010];
				$data[COLUMN_0800020] = $values["a"][COLUMN_0800020];
				$data[COLUMN_0800060] = $values["a"][COLUMN_0800060];
				$data[COLUMN_0800070] = $values["a"][COLUMN_0800070];
				$data[COLUMN_0800160] = $values["a"][COLUMN_0800160];
				$data[COLUMN_0800170] = $values["a"][COLUMN_0800170];
				$data[COLUMN_0800180] = $values["a"][COLUMN_0800180];
				$data[COLUMN_0800190] = $values["a"][COLUMN_0800190];
				$data[COLUMN_1000090] = $values["0"][COLUMN_1000090];
				$data[COLUMN_1000100] = $values["0"][COLUMN_1000100];
				$user_list[] = $data;
			}
			
			return $user_list;
			
		} catch (Exception $ex) {
			$err = "User->getAnnualTradeReportReceiveUser で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	/**
	 * 年間取引報告書受取対象ユーザ全件取得<br>
	 * @param datetime $date_from
	 * @param datetime $date_to
	 * @return array $user_list
	 */
	function getAnnualTradeReportReceiveUser1($date_from, $date_to) {
		try {
			
			$data_list = $this->Controller->MstUser->selectAnnualTradeReportReceiveUser1($date_from, $date_to);
			$user_list = array();
			foreach ($data_list as $keys => $values) {
				$data[COLUMN_0800010] = $values["a"][COLUMN_0800010];
				$data[COLUMN_0800020] = $values["a"][COLUMN_0800020];
				$data[COLUMN_0800060] = $values["a"][COLUMN_0800060];
				$data[COLUMN_0800070] = $values["a"][COLUMN_0800070];
				$data[COLUMN_0800160] = $values["a"][COLUMN_0800160];
				$data[COLUMN_0800170] = $values["a"][COLUMN_0800170];
				$data[COLUMN_0800180] = $values["a"][COLUMN_0800180];
				$data[COLUMN_0800190] = $values["a"][COLUMN_0800190];
				$data[COLUMN_1000090] = $values["0"][COLUMN_1000090];
				$user_list[] = $data;
			}
			
			return $user_list;
			
		} catch (Exception $ex) {
			$err = "User->getAnnualTradeReportReceiveUser1 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
}
