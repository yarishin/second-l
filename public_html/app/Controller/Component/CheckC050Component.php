<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class CheckC050Component extends Component {
	
	public $components = array(
		 "Common"
		,"Fund"
		,"User"
		,"Calendar"
	);
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * 投資家一覧入力チェック<br>
	 * @param array $data
	 * @return array $msg
	 * @throws Exception
	 */
	function v030($data) {
		
		try {
			
			$msg = null;
			
			// 管理番号整数チェック
			if (strcmp("", $data[SEARCH_ID_050030055]) != 0 && !$this->isInteger($data[SEARCH_ID_050030055])) {
				$msg[] = "管理番号は半角数字しか入力出来ません。";
			}
			
			// 投資家ID整数チェック
			if (strcmp("", $data[SEARCH_ID_050030050]) != 0 && !$this->isInteger($data[SEARCH_ID_050030050])) {
				$msg[] = "投資家IDは半角数字しか入力出来ません。";
			}
			
			// 状態必須チェック
			if (!isset($data[SEARCH_ID_050030120]) && !isset($data[SEARCH_ID_050030130]) && !isset($data[SEARCH_ID_050030140])
					&& !isset($data[SEARCH_ID_050030150]) && !isset($data[SEARCH_ID_050030160]) && !isset($data[SEARCH_ID_050030170])
					&& !isset($data[SEARCH_ID_050030180])) {
				$msg[] = "ステータスを選択して下さい。";
			}
			
			// メルマガ必須チェック
			if (!isset($data[SEARCH_ID_050030220]) && !isset($data[SEARCH_ID_050030230])) {
				$msg[] = "メルマガ登録状況を選択して下さい。";
			}
			
			return $msg;
			
		} catch (Exception $ex) {
			$err = "CheckC050->v030 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 排他キーチェック
	 * @return boolean
	 */
	function v060() {
		
		try {
			
			$result = null;

			$wrk_exkey = $this->Controller->User->getWrkUserExKey();
			$mst_exkey = $this->Controller->User->getMstUserExKey();

			if (strcmp($wrk_exkey, $mst_exkey) !=0) {
				$result[] = "表示中の投資家情報は他の管理者によって更新されました。一覧に戻って作業をやり直して下さい。";
			}

			return $result;
			
		} catch (Exception $ex) {
			$err = "CheckC050->v060 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 投資申込一覧(指定)チェック
	 * @param array $data
	 * @return boolean $result
	 */
	function v080($data) {
		
		try {
			
			$msg = null;
			$id_list = null;

			$count = 1;

			// 状態を変更したデータが1件も無い場合false
			while (isset($data[OBJECT_ID_050080040.$count])) {
				if (strcmp($data[OBJECT_ID_050080040.$count], $data[HIDDEN_ID_000000120.$count]) != 0) {
					$id_list[] = $data[HIDDEN_ID_000000130.$count];
				}
				$count++;
			}

			if (is_null($id_list)) {
				$msg[] = "状態が変更されたデータがありません。";
			}

			return $msg;
			
		} catch (Exception $ex) {
			$err = "CheckC050->v080 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * ファンド詳細（入力）画面：入力チェック
	 * 
	 * @param type $data
	 * @param type $fund_status
	 * 
	 * @return boolean
	 */
	function v130($data) {
		try {
			
			$msg = null;
			
			//掲載開始日時チェック
			$date_flag_1 = $this->isDateForm($data[OBJECT_ID_050130070]); //0正しい; 1:形式が間違い; 2:有効じゃない
			if (strcmp($date_flag_1, '1') == 0) {
				
					$msg[] = "掲載開始日時(日)は YYYY/MM/DD 形式で入力して下さい。";
			}
			elseif (strcmp($date_flag_1, '2') == 0) {
				
					$msg[] = "掲載開始日時(日)は有効な日付を入力して下さい。";
			}
			
			if (is_null($msg)) {
				if (!$this->isTimeForm($data[OBJECT_ID_050130080])) {
				
					$msg[] = "掲載開始日時(時間)は hh:mm:ss 形式で入力して下さい。";
				}
			}
			
			//募集開始日時チェック
			if (is_null($msg)) {
				$date_flag_2 = $this->isDateForm($data[OBJECT_ID_050130090]); //0正しい; 1:形式が間違い; 2:有効じゃない
				if (strcmp($date_flag_2, '1') == 0) {

						$msg[] = "募集開始日時(日)は YYYY/MM/DD 形式で入力して下さい。";
				}
				elseif (strcmp($date_flag_2, '2') == 0) {

						$msg[] = "募集開始日時(日)は有効な日付を入力して下さい。";
				}
			}
			
			if (is_null($msg)) {
				if (!$this->isTimeForm($data[OBJECT_ID_050130100])) {
				
					$msg[] = "募集開始日時(時間)は hh:mm:ss 形式で入力して下さい。";
				}
			}
			
			//募集終了日時チェック
			if (is_null($msg)) {
				$date_flag_3 = $this->isDateForm($data[OBJECT_ID_050130110]); //0正しい; 1:形式が間違い; 2:有効じゃない
				if (strcmp($date_flag_3, '1') == 0) {

						$msg[] = "募集終了日時(日)は YYYY/MM/DD 形式で入力して下さい。";
				}
				elseif (strcmp($date_flag_3, '2') == 0) {

						$msg[] = "募集終了日時(日)は有効な日付を入力して下さい。";
				}
			}
			
			if (is_null($msg)) {
				if (!$this->isTimeForm($data[OBJECT_ID_050130120])) {
				
					$msg[] = "募集終了日時(時間)は hh:mm:ss 形式で入力して下さい。";
				}
			}
			
			//日付前後チェック
			if (is_null($msg)) {
				if	(!$this->isTimeline($data[OBJECT_ID_050130070]." ".$data[OBJECT_ID_050130080], $data[OBJECT_ID_050130090]." ".$data[OBJECT_ID_050130100])) {
					
					$msg[] = "掲載開始日時は募集開始日時より前の日付を入力して下さい。";
				}
			}
			
			if (is_null($msg)) {
				if	(!$this->isTimeline($data[OBJECT_ID_050130090]." ".$data[OBJECT_ID_050130100], $data[OBJECT_ID_050130110]." ".$data[OBJECT_ID_050130120])) {
					
					$msg[] = "募集開始日時は募集終了日時より前の日付を入力して下さい。";
				}
			}
			
			//運用期間チェック
			if (is_null($msg)) {
				if	(!$this->isInteger($data[OBJECT_ID_050130150])) {
					
					$msg[] = "運用期間は半角の整数を入力して下さい。";
				}
				elseif ($data[OBJECT_ID_050130150] <= 0) {
					$msg[] = "運用期間は1以上を入力して下さい。";
				}
			}
			
			//営業者利回りチェック
			if (is_null($msg)) {
				if	(!$this->isDouble($data[OBJECT_ID_050130160])) {
					
					$msg[] = "営業者利回りは小数第2位までの数字を入力して下さい。";
				}
			}
			
			//目標利回りチェック
			if (is_null($msg)) {
				if	(!$this->isDouble($data[OBJECT_ID_050130170])) {
					
					$msg[] = "目標利回りは小数第2位までの数字を入力して下さい。";
				}
			}
			
			//ファンド名チェック
			if (is_null($msg)) {
				if	(mb_strlen($data[OBJECT_ID_050130020], CHARSET_UTF8) > 50) {
					
					$msg[] = "ファンド名の長さは50文字以内を入力して下さい。";
				}
			}
			
			//概要説明チェック
			if (is_null($msg)) {
				if	(mb_strlen($data[OBJECT_ID_050130180], CHARSET_UTF8) > 1000) {
					
					$msg[] = "概要説明の長さは1000文字以内を入力して下さい。";
				}
			}
			
//		//土地地積チェック
//		if (is_null($msg)) {
//			if	(!$this->isDouble($data[OBJECT_ID_050130240])) {
//				
//				$msg[] = "土地地積は小数第2位までの数字を入力して下さい。";
//			}
//		}
//		//建物床面積チェック
//		if (is_null($msg)) {
//			if	(!$this->isDouble($data[OBJECT_ID_050130300])) {
//				
//				$msg[] = "建物床面積は小数第2位までの数字を入力して下さい。";
//			}
//		}
//		//建物専有面積チェック
//		if (is_null($msg)) {
//			if	(!$this->isDouble($data[OBJECT_ID_050130310])) {
//				
//				$msg[] = "建物専有面積は小数第2位までの数字を入力して下さい。";
//			}
//		}
//		//建蔽率チェック
//		if (is_null($msg)) {
//			if	(!$this->isDouble($data[OBJECT_ID_050130450])) {
//				
//				$msg[] = "建蔽率は小数第2位までの数字を入力して下さい。";
//			}
//		}
//		//容積率チェック
//		if (is_null($msg)) {
//			if	(!$this->isDouble($data[OBJECT_ID_050130460])) {
//				
//				$msg[] = "容積率は小数第2位までの数字を入力して下さい。";
//			}
//		}
//		//区分所有修繕積立金月額チェック
//		if (is_null($msg)) {
//			if	(!$this->isInteger($data[OBJECT_ID_050130620])) {
//				
//				$msg[] = "区分所有修繕積立金月額は数字を入力して下さい。";
//			}
//		}
//		//区分所有積立金総額チェック
//		if (is_null($msg)) {
//			if	(!$this->isInteger($data[OBJECT_ID_050130630])) {
//				
//				$msg[] = "区分所有積立金総額は数字を入力して下さい。";
//			}
//		}
//
//		//区分所有積立滞納金チェック
//		if (is_null($msg)) {
//			if	(!$this->isInteger($data[OBJECT_ID_050130650])) {
//				
//				$msg[] = "区分所有積立滞納金は数字を入力して下さい。";
//			}
//		}
//		//区分所有管理費用月額チェック
//		if (is_null($msg)) {
//			if	(!$this->isInteger($data[OBJECT_ID_050130670])) {
//				
//				$msg[] = "区分所有管理費用月額は数字を入力して下さい。";
//			}
//		}
//		//区分所有管理費用滞納額チェック
//		if (is_null($msg)) {
//			if	(!$this->isInteger($data[OBJECT_ID_050130690])) {
//				
//				$msg[] = "区分所有管理費用滞納金は数字を入力して下さい。";
//			}
//		}
//		//対象不動産価格チェック
//		if (is_null($msg)) {
//			if	(!$this->isInteger($data[OBJECT_ID_050130980])) {
//				
//				$msg[] = "対象不動産価格は数字を入力して下さい。";
//			}
//		}
//		//居室数チェック
//		if (is_null($msg)) {
//			if	(!$this->isInteger($data[OBJECT_ID_050131030])) {
//				
//				$msg[] = "居室数は数字を入力して下さい。";
//			}
//		}
//		//全賃貸面積全体チェック
//		if (is_null($msg)) {
//			if	(!$this->isDouble($data[OBJECT_ID_050131050])) {
//				
//				$msg[] = "全賃貸面積全体は小数第2位までの数字を入力して下さい。";
//			}
//		}
//		//全賃貸可能面積チェック
//		if (is_null($msg)) {
//			if	(!$this->isDouble($data[OBJECT_ID_050131120])) {
//				
//				$msg[] = "全賃貸可能面積は小数第2位までの数字を入力して下さい。";
//			}
//		}
//		//テナント年間賃料チェック
//		if (is_null($msg)) {
//			if	(!$this->isInteger($data[OBJECT_ID_050131200])) {
//				
//				$msg[] = "テナント年間賃料は数字を入力して下さい。";
//			}
//		}
//		//テナント賃貸面積チェック
//		if (is_null($msg)) {
//			if	(!$this->isDouble($data[OBJECT_ID_050131210])) {
//				
//				$msg[] = "テナント賃貸面積は小数第2位までの数字を入力して下さい。";
//			}
//		}
//		//比率チェック
//		if (is_null($msg)) {
//			if	(!$this->isDouble($data[OBJECT_ID_050131370])) {
//				
//				$msg[] = "比率は小数第2位までの数字を入力して下さい。";
//			}
//		}
//		//出資総額チェック
//		if (is_null($msg)) {
//			if	(!$this->isInteger($data[OBJECT_ID_050131380])) {
//				
//				$msg[] = "出資総額は数字を入力して下さい。";
//			}
//		}
//		//出資総口数チェック
//		if (is_null($msg)) {
//			if	(!$this->isInteger($data[OBJECT_ID_050131390])) {
//				
//				$msg[] = "出資総口数は数字を入力して下さい。";
//			}
//		}
//		//優先出資総額チェック
//		if (is_null($msg)) {
//			if	(!$this->isInteger($data[OBJECT_ID_050131400])) {
//				
//				$msg[] = "優先出資総額は数字を入力して下さい。";
//			}
//		}
//		//優先出資口数チェック
//		if (is_null($msg)) {
//			if	(!$this->isInteger($data[OBJECT_ID_050131410])) {
//				
//				$msg[] = "優先出資口数は数字を入力して下さい。";
//			}
//		}
//		//劣後出資総額チェック
//		if (is_null($msg)) {
//			if	(!$this->isInteger($data[OBJECT_ID_050131420])) {
//				
//				$msg[] = "劣後出資総額は数字を入力して下さい。";
//			}
//		}
//		//劣後出資口数チェック
//		if (is_null($msg)) {
//			if	(!$this->isInteger($data[OBJECT_ID_050131430])) {
//				
//				$msg[] = "劣後出資口数は数字を入力して下さい。";
//			}
//		}
//		//周期チェック
//		if (is_null($msg)) {
//			if	(!$this->isInteger($data[OBJECT_ID_050131510])) {
//				
//				$msg[] = "周期は数字を入力して下さい。";
//			}
//		}
//		//書面用想定利回りチェック
//		if (is_null($msg)) {
//			if	(!$this->isDouble($data[OBJECT_ID_050131530])) {
//				
//				$msg[] = "書面用想定利回りは小数第2位までの数字を入力して下さい。";
//			}
//		}
//		//アップフロントフィーチェック
//		if (is_null($msg)) {
//			if	(!$this->isDouble($data[OBJECT_ID_050131540])) {
//				
//				$msg[] = "アップフロントフィーは小数第2位までの数字を入力して下さい。";
//			}
//		}
//		//管理運営対価チェック
//		if (is_null($msg)) {
//			if	(!$this->isDouble($data[OBJECT_ID_050131550])) {
//				
//				$msg[] = "管理運営対価は小数第2位までの数字を入力して下さい。";
//			}
//		}
//		//売却等対価チェック
//		if (is_null($msg)) {
//			if	(!$this->isDouble($data[OBJECT_ID_050131560])) {
//				
//				$msg[] = "売却等対価は小数第2位までの数字を入力して下さい。";
//			}
//		}
			
			
			return $msg;
			
		} catch (Exception $ex) {
			$err = "CheckC050->v130 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * ファンドマスタ排他キーチェック
	 */
	function v140($admin_id, $fund_id) {
		try {
			
			$msg = null;
			
			$mst_ex_key = -1;
			$wrk_ex_key = -1;
			
			// ファンドマスタから排他キーを取得
			$mst_cond[COLUMN_0500010] = $fund_id;
			
			$mst_fields[] = COLUMN_0000100;
			
			$mst_status[MODEL_CONDITIONS] = $mst_cond;
			$mst_status[MODEL_FIELDS]     = $mst_fields;

			$mst_funds = $this->Controller->MstFund->find(MODEL_ALL, $mst_status);
			
			foreach ($mst_funds as $mst_keys => $mst_values) {
				foreach ($mst_values as $mst_key => $mst_value) {
					$mst_ex_key = intval($mst_value[COLUMN_0000100]);
				}
			}
			
			// ファンドワークから排他キーを取得
			$wrk_cond[COLUMN_1400000] = $admin_id;
			
			$wrk_fields[] = COLUMN_0000100;
			
			$wrk_status[MODEL_CONDITIONS] = $wrk_cond;
			$wrk_status[MODEL_FIELDS]     = $wrk_fields;

			$wrk_funds = $this->Controller->WrkFund->find(MODEL_ALL, $wrk_status);
			
			foreach ($wrk_funds as $wrk_keys => $wrk_values) {
				foreach ($wrk_values as $wrk_key => $wrk_value) {
					$wrk_ex_key = intval($wrk_value[COLUMN_0000100]);
				}
			}
			
			// ファンドマスタ、ファンドワークの排他キーが一致しない場合エラー
			if (0 <= intval($mst_ex_key) && $mst_ex_key != $wrk_ex_key) {
				$msg[] = "表示中のファンド情報は他の管理者によって更新されました。一覧に戻って作業をやり直して下さい。";
			}
			
			return $msg;
			
		} catch (Exception $ex) {
			$err = "CheckC050->v140 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 貸付内容(入力)画面：入力チェック
	 * 
	 * @param type $data
	 * 
	 * @return boolean
	 */
	function v170($data) {
		try {
			
			$msg = null;
			
			//貸付日チェック
			$date_flag_1 = $this->isDateForm($data[OBJECT_ID_050170050]); //0正しい; 1:形式が間違い; 2:有効じゃない
			if (strcmp($date_flag_1, '1') == 0) {
				
					$msg[] = "貸付日は YYYY/MM/DD 形式で入力して下さい。";
			}
			elseif (strcmp($date_flag_1, '2') == 0) {
				
					$msg[] = "貸付日は有効な日付を入力して下さい。";
			}
			
			//貸付予定額チェック
			if (is_null($msg)) {
				if	(!$this->isInteger($data[OBJECT_ID_050170060])) {
					
					$msg[] = "貸付予定額は半角の整数を入力して下さい。";
				}
			}
			
			//貸付額チェック
			if (is_null($msg)) {
				if	(!$this->isInteger($data[OBJECT_ID_050170070])) {
					
					$msg[] = "貸付額は半角の整数を入力して下さい。";
				}
			}
			
			//最低成立額チェック
			if (is_null($msg)) {
				if	(!$this->isInteger($data[OBJECT_ID_050170080])) {
					
					$msg[] = "最低成立額は半角の整数を入力して下さい。";
				}
			}
			
			//実質年率チェック
			if (is_null($msg)) {
				if	(!$this->isDouble($data[OBJECT_ID_050170090])) {
					
					$msg[] = "実質年率は小数第2位までの数字を入力して下さい。";
				}
			}
			
			//支払回数チェック
			if (is_null($msg)) {
				if	(!$this->isInteger($data[OBJECT_ID_050170100])) {
					
					$msg[] = "支払回数は半角の整数を入力して下さい。";
				}
				elseif ($data[OBJECT_ID_050170100] <= 0) {
					$msg[] = "支払回数は1以上を入力して下さい。";
				}
			}
			
			//返済開始月チェック
			if (is_null($msg)) {
				if	(!$this->isInteger($data[OBJECT_ID_050170110]) || !$this->isInteger($data[OBJECT_ID_050170120])) {
					
					$msg[] = "返済開始月は YYYY/MM 形式で入力して下さい。";
				}
				elseif ($data[OBJECT_ID_050170120] < 1 || $data[OBJECT_ID_050170120] > 12) {
					
					$msg[] = "返済開始月は有効な月分を入力して下さい。";
				}
			}
			
			if (is_null($msg)) {
				$loan_date = $data[OBJECT_ID_050170050];
				$loan_date_y = substr($loan_date, 0, 4);
				$loan_date_m = substr($loan_date, 5, 2);
				$loan_date_d = substr($loan_date, 8, 2);
				if ($loan_date_y > $data[OBJECT_ID_050170110]) {
					$msg[] = "返済開始日が貸付日より後の日付になるよう入力して下さい。";
				}
				elseif (($loan_date_y == $data[OBJECT_ID_050170110]) && ($loan_date_m >= $data[OBJECT_ID_050170120])) {
					
					// 貸付日 >= 返済開始日の場合エラー
					if ($loan_date_d <= $data[OBJECT_ID_050170130]) {
						$first_day  = $this->Calendar->ajustDateValid($data[OBJECT_ID_050170110], $data[OBJECT_ID_050170120], $data[OBJECT_ID_050170130]);
						$first_date = $this->Calendar->ajustDateBusiness($data[OBJECT_ID_050170110], $data[OBJECT_ID_050170120], $first_day);
						if (strtotime($loan_date) >= strtotime($first_date["year"]."/".$first_date["month"]."/".$first_date["day"])) {
							$msg[] = "返済開始日が貸付日より後の日付になるよう入力して下さい。";
						}
					}
				}
			}
			
			//約定日チェック
			if (is_null($msg)) {
				if	(!$this->isInteger($data[OBJECT_ID_050170130])) {
					
					$msg[] = "約定日は半角の整数を入力して下さい。";
				}
				elseif (($data[OBJECT_ID_050170130] < 1) || ($data[OBJECT_ID_050170130] > 31)) {
					
					$msg[] = "約定日は有効な日付を入力して下さい。";
				}
			}
		
			//借主チェック
			if (is_null($msg)) {
				if	(mb_strlen($data[OBJECT_ID_050170040], CHARSET_UTF8) > 50) {
					
					$msg[] = "借主名の長さは50文字以内を入力して下さい。";
				}
			}
			
			return $msg;
			
		} catch (Exception $ex) {
			$err = "CheckC050->v130 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 返済予定一覧(入力)チェック
	 * @param  array   $data
	 * @return boolean $result
	 */
	function v1901($data) {
		try {
			
			$msg = null;
			
			if (strcmp("", $data[SEARCH_ID_050190010]) != 0 && !$this->isInteger($data[SEARCH_ID_050190010])) {
				$msg[] = "返済予定日(年)は半角数字しか入力出来ません。";
			}
			if (strcmp("", $data[SEARCH_ID_050190020]) != 0) {
				if (!$this->isInteger($data[SEARCH_ID_050190020])) {
					$msg[] = "返済予定日(月)は半角数字しか入力出来ません。";
				}
				else {
					if (!$this->isMax($data[SEARCH_ID_050190020], 12)) {
						$msg[] = "返済予定日(月)は 12 以下を指定して下さい。";
					}
					if (!$this->isMin($data[SEARCH_ID_050190020], 1)) {
						$msg[] = "返済予定日(月)は 1 以上を指定して下さい。";
					}
				}
			}
			if ((strcmp("", $data[SEARCH_ID_050190010]) == 0 && strcmp("", $data[SEARCH_ID_050190020]) != 0)
					|| (strcmp("", $data[SEARCH_ID_050190010]) != 0 && strcmp("", $data[SEARCH_ID_050190020]) == 0)) {
				$msg[] = "返済予定日を指定する場合、年月両方を指定して下さい。";
			}
			if (strcmp("", $data[SEARCH_ID_050190030]) != 0 && !$this->isInteger($data[SEARCH_ID_050190030])) {
				$msg[] = "ファンドIDは半角数字しか入力出来ません。";
			}

			return $msg;
			
		} catch (Exception $ex) {
			$err = "CheckC050->v1901 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 返済予定一覧(入力)チェック
	 * @param  array   $data
	 * @return boolean $result
	 */
	function v1902($data) {
		try {
			
			$msg = null;
			$id_list = null;
			$count = 1;
			
			while (isset($data[OBJECT_ID_050190050.$count])) {
				if (	(strcmp("", $data[OBJECT_ID_050190010.$count]) != 0)
					 && (strcmp("", $data[OBJECT_ID_050190020.$count]) != 0) && $this->isInteger($data[OBJECT_ID_050190020.$count])
					 && (strcmp("", $data[OBJECT_ID_050190030.$count]) != 0) && $this->isInteger($data[OBJECT_ID_050190030.$count])
					 && (strcmp("", $data[OBJECT_ID_050190040.$count]) != 0) && $this->isInteger($data[OBJECT_ID_050190040.$count])
				) {
						$id_list[] = $data[OBJECT_ID_050190050.$count];
				}
				$count++;
			}

			if (is_null($id_list)) {
				$msg[] = "返済予定データを正しく入力して下さい。";
			}

			return $msg;
			
		} catch (Exception $ex) {
			$err = "CheckC050->v1902 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 配当実行(入力)チェック
	 * @param  array   $data
	 * @return boolean $result
	 */
	function v220($data) {
		try {
			
			if (0 == count($data)) {
				$msg[] = "配当を行うファンドを選択して下さい。";
			}

			return $msg;
			
		} catch (Exception $ex) {
			$err = "CheckC050->v220 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 交渉履歴画面入力チェック
	 * 
	 * @param type $data
	 * 
	 * @return string
	 */
	function v300($data, $id) {
		try {
			
			$msg = null;
			
			if (is_null($msg) && isset($data[OBJECT_ID_050300010.$id])) {
				
				$negotiation_datetime = $data[OBJECT_ID_050300010.$id];
				$date = substr($negotiation_datetime, 0, 10);
				$time = substr($negotiation_datetime, 11);
				
				if (!preg_match(DATE_FORMAT_CHECK, $date) || !preg_match(TIME_FORMAT_CHECK, $time)) {
					$msg[] = "日時を正しく入力して下さい。";
				}
			}
			
			if (is_null($msg) && isset($data[OBJECT_ID_050300070.$id])) {
				
				$content = $data[OBJECT_ID_050300070.$id];
				
				if (strcmp("", $content) == 0) {
					$msg[] = "内容を入力して下さい。";
				}
				elseif (mb_strlen($content, CHARSET_UTF8) > 1000) {
					$msg[] = "内容は1000文字以内で入力して下さい。";
				}
			}

			return $msg;
			
		} catch (Exception $ex) {
			$err = "CheckC050->v300 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 報告書発行対象ファンド一覧チェック
	 * 
	 * @param type $data
	 * 
	 * @return string
	 */
	function v340($data) {
		try {
			
			$msg = null;
			
			if (!isset($data[SEARCH_ID_050340010])) {
				$msg[] = "発行対象を選択して下さい。";
			}
			
			return $msg;
			
		} catch (Exception $ex) {
			$err = "CheckC050->v340 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 取引残高報告書画面入力チェック<br>
	 * @param type $data
	 * @return string
	 */
	function v380($data) {
		try {
			
			$msg = null;
			
			if (strcmp("", $data[OBJECT_ID_050380050]) != 0) {
				$max_size = 300;
				if (mb_strlen($data[OBJECT_ID_050380050], CHARSET_UTF8) > $max_size) {
					$msg[] = "お知らせは".$max_size."文字以内で入力して下さい。";
				}
			}
			
			return $msg;
			
		} catch (Exception $ex) {
			$err = "CheckC050->v380 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * メール送信画面入力チェック
	 * @param array $data
	 * @return array $msg
	 * @throws Exception
	 */
	function v430($data) {
		
		try {
			
			$msg = null;
			
			$method = $data[OBJECT_ID_050430010];
			
			// 送信先リストの選択内容によってチェック内容を決定
			if (strcmp(SPECIFIED_METHOD_CODE_0, $method) == 0) {
				
				// 条件を指定
				
				if (!isset($data[OBJECT_ID_050430020]) && !isset($data[OBJECT_ID_050430030])
						&& !isset($data[OBJECT_ID_050430040]) && !isset($data[OBJECT_ID_050430050])
						&& !isset($data[OBJECT_ID_050430060]) && !isset($data[OBJECT_ID_050430070])
						&& !isset($data[OBJECT_ID_050430080])) {
					
					// 投資家状態未選択時にエラー出力
					$msg[] = "投資家状態を選択して下さい。";
				}
				
				if (!isset($data[OBJECT_ID_050430090]) && !isset($data[OBJECT_ID_050430100])) {
					
					// メルマガ登録状態未選択時にエラー出力
					$msg[] = "メールマガジンの登録状態を選択して下さい。";
				}
				
			}
			elseif (strcmp(SPECIFIED_METHOD_CODE_1, $method) == 0) {
				
				// 管理番号を指定
				if (strcmp("", $data[OBJECT_ID_050430110]) == 0) {
					
					// 管理番号未収力時にエラー出力
					$msg[] = "管理番号を入力して下さい。";
				}
				else {
					
					$data_list = explode(",", $data[OBJECT_ID_050430110]);
					
					$err_values = "";
					foreach ($data_list as $key => $value) {
						
						$search[SEARCH_ID_050030055] = $value;
						if (0 == $this->User->getUserList($search, true)) {
							$err_values .= strcmp("", $err_values) == 0 ? $value : ",".$value;
						}
						
					}
					
					if (strcmp("", $err_values) != 0) {

						// DBに存在しない番号が入力されていた場合、エラー出力
						$msg[] = "存在しない管理番号が指定されました：".$err_values;
					}
				}
			}
			elseif (strcmp(SPECIFIED_METHOD_CODE_2, $method) == 0) {
				
				// 投資家IDを指定
				if (strcmp("", $data[OBJECT_ID_050430110]) == 0) {
					
					// 投資家ID未収力時にエラー出力
					$msg[] = "投資家IDを入力して下さい。";
				}
				else {
					
					$data_list = explode(",", $data[OBJECT_ID_050430110]);
					
					$err_values = "";
					foreach ($data_list as $key => $value) {
						
						$search[SEARCH_ID_050030050] = $value;
						if (0 == $this->User->getUserList($search, true)) {
							$err_values .= strcmp("", $err_values) == 0 ? $value : ",".$value;
						}
					}
					
					if (strcmp("", $err_values) != 0) {

						// DBに存在しないIDが入力されていた場合、エラー出力
						$msg[] = "存在しない投資家IDが指定されました：".$err_values;
					}
				}
			}
			
			if (strcmp("", $data[OBJECT_ID_050430120]) == 0) {
				
				// 件名未入力時にエラー出力
				$msg[] = "件名を入力して下さい。";
			}
			
			if (strcmp("", $data[OBJECT_ID_050430130]) == 0) {
				
				// 本文未入力時にエラー出力
				$msg[] = "本文を入力して下さい。";
			}
			
			return $msg;
			
		} catch (Exception $ex) {
			$err = "CheckC050->v430 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * CSVダウンロード入力チェック<br>
	 * @param array $data
	 * @return array $msg
	 */
	function v470($data) {
		try {
			
			$msg = null;
			
			// 年
			if (strcmp("", $data[OBJECT_ID_050470010]) != 0) {
				if (!$this->isMax($data[OBJECT_ID_050470010], 9999) || !$this->isMin($data[OBJECT_ID_050470010], 2000)) {
					$msg[] = "対象年を正しく入力して下さい。";
				}
			}
			else {
				$msg[] = "対象年を入力して下さい。";
			}
			
			// 月
			if (strcmp("", $data[OBJECT_ID_050470020]) != 0) {
				if (!$this->isMax($data[OBJECT_ID_050470020], 12) || !$this->isMin($data[OBJECT_ID_050470020], 1)) {
					$msg[] = "対象月を正しく入力して下さい。";
				}
			}
			else {
				$msg[] = "対象月を入力して下さい。";
			}
			
			return $msg;
			
		} catch (Exception $ex) {
			$err = "CheckC050->v470 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * CSVダウンロード入力チェック2<br>
	 * @param array $data
	 * @return array $msg
	 */
	function v470_2($data) {
		try {
			
			$msg = null;
			
			// 年月
			if (strcmp("", $data[OBJECT_ID_050470010]) == 0 && strcmp("", $data[OBJECT_ID_050470020]) == 0) {
				$msg[] = "対象年か対象月を入力して下さい。";
			}
			
			// 年
			if (strcmp("", $data[OBJECT_ID_050470010]) != 0) {
				if (!$this->isMax($data[OBJECT_ID_050470010], 9999) || !$this->isMin($data[OBJECT_ID_050470010], 1000)) {
					$msg[] = "対象年を正しく入力して下さい。";
				}
			}
			
			// 月
			if (strcmp("", $data[OBJECT_ID_050470020]) != 0) {
				if (!$this->isMax($data[OBJECT_ID_050470020], 12) || !$this->isMin($data[OBJECT_ID_050470020], 1)) {
					$msg[] = "対象月を正しく入力して下さい。";
				}
			}
			
			return $msg;
			
		} catch (Exception $ex) {
			$err = "CheckC050->v470_2 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * お知らせ送信画面入力チェック
	 * @param array $data
	 * @return array $msg
	 * @throws Exception
	 */
	function v480($data) {
		
		try {
			
			$msg = null;
			
			$method = $data[OBJECT_ID_050480010];
			
			$attachment = false;
			if (isset($data[OBJECT_ID_050480170]) || isset($data[OBJECT_ID_050480180])
					|| isset($data[OBJECT_ID_050480190]) || isset($data[OBJECT_ID_050480200])
					|| isset($data[OBJECT_ID_050480210]) || isset($data[OBJECT_ID_050480220])
					|| isset($data[OBJECT_ID_050480260])) {
				
				// 添付ファイルが１つでもあればフラグを立てる
				$attachment = true;
			}
			
			$user_id_list = array();
			
			// ◆送信先に関するチェック◆
			
			// 送信先リストの選択値によってチェック内容を決定
			if (strcmp(SPECIFIED_METHOD_CODE_0, $method) == 0) {

				// ◆「条件を指定」選択時◆

				if (!$attachment && strcmp("", $data[OBJECT_ID_050480090]) == 0) {

					// 添付ファイル無し、且つファンドID未入力の場合、エラー出力
					$msg[] = "ファンドIDを指定して下さい。";
				}
				elseif (!$attachment && strcmp("", $data[OBJECT_ID_050480090]) != 0) {

					// 添付ファイル無し、且つ存在しないファンドIDを入力した場合、エラー出力
					$cond[COLUMN_0500010] = $data[OBJECT_ID_050480090];
					$status[MODEL_CONDITIONS] = $cond;
					if (0 == $this->Controller->MstFund->find(MODEL_COUNT, $status)) {

						// 存在しないファンドIDが指定された場合エラー
						$msg[] = "存在しないファンドIDが指定されました。";
					}
				}
			}
			elseif (strcmp(SPECIFIED_METHOD_CODE_1, $method) == 0) {

				// ◆「管理番号を指定」選択時◆

				if (!$attachment && strcmp("", $data[OBJECT_ID_050480100]) == 0) {

					// 添付ファイル無し、且つ管理番号未入力時にエラー出力
					$msg[] = "管理番号を入力して下さい。";
				}
				else {

					$data_list = explode(",", $data[OBJECT_ID_050480100]);

					$err_values = "";
					foreach ($data_list as $data_key => $lender_no) {

						$search[SEARCH_ID_050030055] = $lender_no;
						$user_data_list = $this->User->getUserList($search);
						if (0 < count($user_data_list)) {
							
							// 添付ファイルがある場合の処理のために有効な管理番号だけを
							// 投資家IDに変換して別の配列に詰めなおす
							foreach ($user_data_list as $key => $value) {
								$user_id_list[$lender_no] = $value[COLUMN_0800010];
							}
						}
						else {
							$err_values .= strcmp("", $err_values) == 0 ? $lender_no : ",".$lender_no;
						}
					}

					if (strcmp("", $err_values) != 0) {

						// DBに存在しない番号が入力されていた場合、エラー出力
						$msg[] = "存在しない管理番号が指定されました：".$err_values;
					}
				}
			}
			elseif (strcmp(SPECIFIED_METHOD_CODE_2, $method) == 0) {

				// ◆「投資家IDを指定」選択時◆

				if (!$attachment && strcmp("", $data[OBJECT_ID_050480100]) == 0) {

					// 添付ファイル無し、且つ投資家ID未収力時にエラー出力
					$msg[] = "投資家IDを入力して下さい。";
				}
				else {

					$data_list = explode(",", $data[OBJECT_ID_050480100]);

					$err_values = "";
					foreach ($data_list as $key => $value) {

						$search[SEARCH_ID_050030050] = $value;
						if (0 == $this->User->getUserList($search, true)) {
							$err_values .= strcmp("", $err_values) == 0 ? $value : ",".$value;
						}
						else {
							
							// 添付ファイルがある場合の処理のために有効な投資家IDだけの配列を作る
							$user_id_list[$value] = $value;
						}
					}

					if (strcmp("", $err_values) != 0) {

						// DBに存在しないIDが入力されていた場合、エラー出力
						$msg[] = "存在しない投資家IDが指定されました：".$err_values;
					}
				}
			}
			
			//掲載日時チェック
			if ((strcmp("", $data[OBJECT_ID_050480130]) == 0 && strcmp("", $data[OBJECT_ID_050480140]) != 0)
					|| (strcmp("", $data[OBJECT_ID_050480130]) != 0 && strcmp("", $data[OBJECT_ID_050480140]) == 0)) {
				
				$msg[] = "掲載日時を指定する場合は日付と時刻の両方を指定して下さい。";
			}
			elseif (strcmp("", $data[OBJECT_ID_050480130]) != 0 && strcmp("", $data[OBJECT_ID_050480140]) != 0) {
				
				$date_flag_1 = $this->isDateForm($data[OBJECT_ID_050480130]); //0正しい; 1:形式が間違い; 2:有効じゃない
				
				$date_err = true;
				if (strcmp($date_flag_1, '1') == 0) {

					$msg[] = "掲載日時(日)は YYYY/MM/DD 形式で入力して下さい。";
					$date_err = false;
				}
				elseif (strcmp($date_flag_1, '2') == 0) {

					$msg[] = "掲載日時(日)に有効な日付を入力して下さい。";
					$date_err = false;
				}

				if (!$this->isTimeForm($data[OBJECT_ID_050480140])) {

					$msg[] = "掲載日時(時)は hh:mm:ss 形式で入力して下さい。";
					$date_err = false;
				}
				
				if ($date_err) {
					
					if (strtotime($data[OBJECT_ID_050480130]." ".$data[OBJECT_ID_050480140]) < strtotime(date(DATETIME_FORMAT))) {
						
						$msg[] = "掲載日時は未来の日時を入力して下さい。";
					}
				}
			}
			
			// 件名チェック
			if (strcmp("", trim(mb_convert_kana($data[OBJECT_ID_050480150], "s" , CHARSET_UTF8))) == 0) {
				
				// 件名未入力時にエラー出力
				$msg[] = "件名を入力して下さい。";
			}
			
			// 本文チェック
			if (strcmp("", trim(mb_convert_kana($data[OBJECT_ID_050480160], "s" , CHARSET_UTF8))) == 0) {
				
				// 本文未入力時にエラー出力
				$msg[] = "本文を入力して下さい。";
			}
			
			// ◆添付ファイルがある場合の送信先に関するチェック◆
			
			if ($attachment) {
				
				// 送信先リストの選択値によってチェック内容を決定
				if (strcmp(SPECIFIED_METHOD_CODE_0, $method) == 0) {
					
					// ◆「条件を指定」選択時◆

					if (strcmp(SPECIFIED_METHOD_CODE_0, $method) == 0 && strcmp("", $data[OBJECT_ID_050480090]) != 0) {
						$msg[] = "ファイルを添付する場合、送信先をファンドIDで指定することは出来ません";
					}
				}
			}
			
			// 投資家登録時同意書面に関するチェック
			if (isset($data[OBJECT_ID_050480170]) || isset($data[OBJECT_ID_050480180])
					|| isset($data[OBJECT_ID_050480190]) || isset($data[OBJECT_ID_050480200])
					|| isset($data[OBJECT_ID_050480210])) {
				
				// 管理番号、または投資家IDが入力されている場合
				if (0 < count($user_id_list)) {

					$err_values = "";
					foreach ($user_id_list as $key => $value) {

						// 投資家の状態が「承認済」、「認証済」、「停止中」が交付対象となる
						$user_cond[COLUMN_0800010] = $value;
						$user_cond[COLUMN_0800560] = array(USER_STATUS_CODE_APPROVED, USER_STATUS_CODE_AUTHENTICATED, USER_STATUS_CODE_STOPPED);

						$user_status[MODEL_CONDITIONS] = $user_cond;

						if (0 == $this->Controller->MstUser->find(MODEL_COUNT, $user_status)) {
							$err_values .= strcmp("", $err_values) == 0 ? $key : ",".$key;
						}
					}

					// 交付対象ではないIDがあった場合、エラーを出力
					if (strcmp("", $err_values) != 0) {
						if (strcmp(SPECIFIED_METHOD_CODE_1, $method) == 0) {
							$msg[] = "指定された書面の交付対象ではない管理番号が指定されました：".$err_values;
						}
						elseif (strcmp(SPECIFIED_METHOD_CODE_2, $method) == 0) {
							$msg[] = "指定された書面の交付対象ではない投資家IDが指定されました：".$err_values;
						}
					}
				}
				
			}
				
			// 運用報告書添付に関するチェック
			if (isset($data[OBJECT_ID_050480220])) {
				
				if (strcmp("", $data[OBJECT_ID_050480230]) == 0 || strcmp("", $data[OBJECT_ID_050480240]) == 0 || strcmp("", $data[OBJECT_ID_050480250]) == 0) {
					
					// 報告書を添付する場合、パラメータ必須
					$msg[] = "運用報告書を添付する場合、ファンドID、運用年月を指定して下さい。";
				}
				else {
					
					$or_attach_flag = true;
					
					$or_fund_cond[COLUMN_0500010] = $data[OBJECT_ID_050480230];
					$or_fund_status[MODEL_CONDITIONS] = $or_fund_cond;
					if (0 == $this->Controller->MstFund->find(MODEL_COUNT, $or_fund_status)) {
						
						// 存在しないファンドIDが指定された場合エラー
						$msg[] = "再交付を行う運用報告書のファンドIDに存在しないファンドIDが指定されました。";
						
						$or_attach_flag = false;
					}
					
					if (!$this->isInteger($data[OBJECT_ID_050480240]) || !$this->isInteger($data[OBJECT_ID_050480250])) {
						
						$msg[] = "運用年月には半角数字しか入力出来ません。";
						
						$or_attach_flag = false;
					}
					
					if (!$this->isMax($data[OBJECT_ID_050480240], 9999) || !$this->isMax($data[OBJECT_ID_050480250], 12)) {
						
						$msg[] = "運用年月に不正な値が入力されました。";
						
						$or_attach_flag = false;
					}
					
					if ($or_attach_flag) {
						
						$or_cond[COLUMN_2700020] = $data[OBJECT_ID_050480230];
						$or_cond[COLUMN_2700040] = $data[OBJECT_ID_050480240];
						$or_cond[COLUMN_2700050] = $data[OBJECT_ID_050480250];
						$or_status[MODEL_CONDITIONS] = $or_cond;
						if (0 == $this->Controller->TrnSecondOperatingReport->find(MODEL_COUNT, $or_status)) {

							$msg[] = "指定された月の運用報告書は交付されていません。";
							
							$or_attach_flag = false;
						}
					}
					
					// 管理番号、または投資家IDが入力されている場合
					if ($or_attach_flag && 0 < count($user_id_list)) {
						
						$err_values = "";
						foreach ($user_id_list as $key => $value) {
							
							$info_cond[COLUMN_1150020] = $value;
							$info_cond[COLUMN_1150040] = $data[OBJECT_ID_050480230];
							$info_cond[COLUMN_1150050] = INV_DOC_ID_00004;
							$info_cond[COLUMN_1150080] = $data[OBJECT_ID_050480240].sprintf("%02d", intval($data[OBJECT_ID_050480250]));
							
							$info_status[MODEL_CONDITIONS] = $info_cond;
							
							if (0 == $this->Controller->TrnInfoAttachment->find(MODEL_COUNT, $info_status)) {
								$err_values .= strcmp("", $err_values) == 0 ? $key : ",".$key;
							}
						}
						
						// 交付対象ではないIDがあった場合、エラーを出力
						if (strcmp("", $err_values) != 0) {
							if (strcmp(SPECIFIED_METHOD_CODE_1, $method) == 0) {
								$msg[] = "指定された運用報告書の交付対象ではない管理番号が指定されました：".$err_values;
							}
							elseif (strcmp(SPECIFIED_METHOD_CODE_2, $method) == 0) {
								$msg[] = "指定された運用報告書の交付対象ではない投資家IDが指定されました：".$err_values;
							}
						}
					}
				}
			}
			
			// 取引残高報告書添付に関するチェック
			if (isset($data[OBJECT_ID_050480260])) {
				
				if (strcmp("", $data[OBJECT_ID_050480270]) == 0 || strcmp("", $data[OBJECT_ID_050480280]) == 0) {
				
					// 報告書を添付する場合、パラメータ必須
					$msg[] = "取引残高報告書を添付する場合、取引開始年月を指定して下さい。";
				}
				else {

					$tbr_attach_flag = true;
					
					if (!$this->isInteger($data[OBJECT_ID_050480270]) || !$this->isInteger($data[OBJECT_ID_050480280])) {
						
						$msg[] = "取引開始年月には半角数字しか入力出来ません。";
						
						$tbr_attach_flag = false;
					}
					
					if (!$this->isMax($data[OBJECT_ID_050480270], 9999) || !$this->isMax($data[OBJECT_ID_050480280], 12)) {
						
						$msg[] = "取引開始年月に不正な値が入力されました。";
						
						$tbr_attach_flag = false;
					}
					
					if ($tbr_attach_flag) {
						
						$tbr_cond[COLUMN_2400020] = $data[OBJECT_ID_050480270];
						$tbr_cond[COLUMN_2400030] = $data[OBJECT_ID_050480280];
						$tbr_status[MODEL_CONDITIONS] = $tbr_cond;
						if (0 == $this->Controller->TrnTradeBalanceReport->find(MODEL_COUNT, $tbr_status)) {

							$msg[] = "指定された月の取引残高報告書は交付されていません。";
							
							$tbr_attach_flag = false;
						}
					}
					
					// 管理番号、または投資家IDが入力されている場合
					if ($tbr_attach_flag && 0 < count($user_id_list)) {
						
						foreach ($user_id_list as $key => $value) {
							
							$info_cond[COLUMN_1150020] = $value;
							$info_cond[COLUMN_1150040] = INV_DOC_CAT_ID;
							$info_cond[COLUMN_1150050] = INV_DOC_ID_00005;
							$info_cond[COLUMN_1150080] = $data[OBJECT_ID_050480270].sprintf("%02d", intval($data[OBJECT_ID_050480280]));
							
							$info_status[MODEL_CONDITIONS] = $info_cond;
							
							$err_values = "";
							if (0 == $this->Controller->TrnInfoAttachment->find(MODEL_COUNT, $info_status)) {
								$err_values .= strcmp("", $err_values) == 0 ? $key : ",".$key;
							}
							
							// 交付対象ではないIDがあった場合、エラーを出力
							if (strcmp("", $err_values) != 0) {
								if (strcmp(SPECIFIED_METHOD_CODE_1, $method) == 0) {
									$msg[] = "指定された取引残高報告書の交付対象ではない管理番号が指定されました：".$err_values;
								}
								elseif (strcmp(SPECIFIED_METHOD_CODE_2, $method) == 0) {
									$msg[] = "指定された取引残高報告書の交付対象ではない投資家IDが指定されました：".$err_values;
								}
							}
						}
					}
				}
			}
			
			return $msg;
			
		} catch (Exception $ex) {
			$err = "CheckC050->v430 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

     /**
	 * 入金口座一覧入力チェック<br>
	 * @param array $data
	 * @return array $msg
	 * @throws Exception
	 */
	function v510($data) {
		try {		
			$msg = null;			
			// ユーザーID整数チェック
			if (strcmp("", $data[SEARCH_ID_050510030]) != 0 && !$this->isInteger($data[SEARCH_ID_050510030])) {
				$msg[] = "ユーザーIDは半角数字しか入力出来ません。";
			}
			
			// 口座番号整数チェック
			if (strcmp("", $data[SEARCH_ID_050510040]) != 0 && !$this->isInteger($data[SEARCH_ID_050510040])) {
				$msg[] = "口座番号は半角数字しか入力出来ません。";
			}
			
			// 検索キーチェック
			if (empty($data[SEARCH_ID_050510010]) && empty($data[SEARCH_ID_050510020]) && empty($data[SEARCH_ID_050510030]) && empty($data[SEARCH_ID_050510040])){
				$msg[] = "検索キーを入力して下さい。";
			}
			return $msg;
			
		} catch (Exception $ex) {
			$err = "CheckC050->v510 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

     /**
	 * 入金データ読込入力チェック<br>
	 * @param array $data
	 * @return array $msg
	 * @throws Exception
	 */
	function v520($files) {
		try {		
			$msg = null;
			
		    // 不正パラメータの処理
			// パラメータ未定義、複数ファイル、$_FILES Corruption攻撃を受けた場合
			if (!isset($files['error']) || !is_int($files['error'])) {
				$msg[] =  "パラメータが不正です";
			}
			
			// ファイルアップロード時のエラーコードを確認
			switch ($files['error']) {
				case UPLOAD_ERR_OK: // OK
					break;
				case UPLOAD_ERR_NO_FILE:   // ファイル未選択
					$msg[] =  "ファイルが選択されていません。";
					return $msg;
				case UPLOAD_ERR_INI_SIZE:  // php.ini定義の最大サイズ超過
					$msg[] =  "システム定義(php.ini)の最大ファイルサイズを超過しました。";
					return $msg;
				case UPLOAD_ERR_FORM_SIZE: // フォーム定義の最大サイズ超過
					$msg[] =  "フォーム定義の最大ファイルサイズを超過しました。";
					return $msg;
				default:
					$msg[] =  "ファイルアップロード時にエラーが発生しました。";
					return $msg;
			}

			// アップロードされたファイルの拡張子を判定
			if(pathinfo($files['name'], PATHINFO_EXTENSION) != 'csv') {
				$msg[] = "CSVファイルのみ対応しています。";
			}
			return $msg;
			
		} catch (Exception $ex) {
			$err = "CheckC050->v520 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}	
	
	function v530($data) {
		try {		
			$msg = null;
			
		    // チェックされたレコードが1つも無い場合
			if(empty($data)){
				$msg[] =  "照合するレコードが選択されていません。";
			}
			return $msg;
		} catch (Exception $ex) {
			$err = "CheckC050->v530 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 整数チェック<br>
	 * 整数のみであれば True<br>
	 * @param number $inv_amount
	 * @return boolean $result
	 */
	private function isInteger($inv_amount) {

		try {
			
			$result = false;
			if(preg_match(REGEX_INTEGER, $inv_amount)){
				$result = true;
			}
			return $result;
			
		} catch (Exception $ex) {
			$err = "CheckC050->isInteger で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 最大値チェック<br>
	 * @param number $value $max
	 * @return boolean $result
	 */
	private function isMax($value, $max) {

		try {
			
			$result = false;
			if($value <= $max){
				$result = true;
			}
			return $result;
			
		} catch (Exception $ex) {
			$err = "CheckC050->isMax で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 最小値チェック<br>
	 * @param number $value $min
	 * @return boolean $result
	 */
	private function isMin($value, $min) {

		try {
			
			$result = false;
			if(intval($value) >= intval($min)){
				$result = true;
			}
			return $result;
			
		} catch (Exception $ex) {
			$err = "CheckC050->isMin で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	
	/**
	 * 小数チェック<br>
	 * 
	 * @param number $dou_number
	 * @return boolean $result
	 */
	private function isDouble($dou_number) {
		try {
			
			$result = false;
			if(preg_match("/^[0-9]{1,3}.[0-9]{2}$/", $dou_number)){
				$result = true;
			}
			elseif ($this->isInteger($dou_number)) {
				$result = true;
			}
			return $result;
			
		} catch (Exception $ex) {
			$err = "CheckC050->isDouble で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 日付形式をチェック
	 * 
	 * @param  string   $date
	 * @return boolean
	 */
	private function isDateForm($date) {

		try {
			
			$result = 1; //0正しい; 1:形式が間違い; 2:有効じゃない

			if(preg_match(DATE_FORMAT_CHECK, $date)) {
				$date_arr = explode("/", $date);
				$year  = $date_arr[0];
				$month = $date_arr[1];
				$day   = $date_arr[2];
				if (checkdate($month, $day, $year)) {
					$result = 0;
				} else {
					$result = 2;
				}
			}
			
			return $result;
			
		} catch (Exception $ex) {
			$err = "CheckC050->isDateForm で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * 日付(時間)形式をチェック
	 * 
	 * @param  string   $date
	 * @return boolean
	 */
	private function isTimeForm($time) {
		try {
			
			$result = false;
			if(strcmp("", $time) == 0 || preg_match(TIME_FORMAT_CHECK, $time)){
				$result = true;
			}
			
			return $result;
			
		} catch (Exception $ex) {
			$err = "CheckC050->isTimeForm で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 日付前後をチェック
	 * 
	 * @param  string   $date
	 * @return boolean
	 */
	private function isTimeline($date_from, $date_to) {

		try {
			
			$result = false;
			if (date(DATETIME_FORMAT, strtotime($date_from)) <= date(DATETIME_FORMAT, strtotime($date_to))) {
				$result = true;
			}
			
		} catch (Exception $ex) {
			$err = "CheckC050->isDateTimeline で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
		return $result;
	}
}
