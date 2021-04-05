<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class CheckC040Component extends Component {
	
	public $components = array(
	     "Common"
		,"Company"
		,"Fund"
		,"SessionUserInfo"
	);
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * 投資金額入力チェック
	 * @param arrya $data
	 * @return array $msg
	 */
	function v020($data) {
		
		try {
			
			$user_id    = $this->SessionUserInfo->getUserId();
			$fund_id    = $this->Common->getSessionFundId();
			$inv_amount = $data[OBJECT_ID_040020020];

			$fund_data = $this->Fund->getMstFund($fund_id);
			$max_loan_amount = 0;
			$min_inv_amount  = 0;
			foreach ($fund_data as $keys => $values) {
				foreach ($values as $key => $value) {
					$max_loan_amount = $value[COLUMN_0500030];
					$min_inv_amount  = $value[COLUMN_0500060];
				}
			}

			// 募集済み金額取得
			$total_inv_amount = $this->Fund->getTotalInvestmentAmount($fund_id);

			// 現在の最大投資可能金額を算出
			$max_inv_amount = $max_loan_amount - $total_inv_amount;

			$msg = null;
                       //運用開始時に始動させる。申し込みされている場合のCheck
                        if(BOOKING_INVESTMENT == 0) {
                           	if ($this->isExpiration_1($user_id, $fund_id)) {
                                             $msg[] = "すでに該当ファンドに出資申込されています。";
                                }    
                        }
                        
                            if ($this->isExpiration($user_id)) {
				
				if (!$this->isNotEmpty($inv_amount)) {
					$msg[] = "申込額を入力してください。";
				}
				else {
					if (!$this->isInteger($inv_amount)) {
						$msg[] = "半角で入力してください。";
					}
					if (!$this->isMultiple($inv_amount, $min_inv_amount)) {
						$msg[] = "10,000円単位で入力してください。";
					}
					if (!$this->isClose($max_inv_amount)) {
						$msg[] = "申込に失敗しました。";
					}
					else {
						if (!$this->isMaxRage($inv_amount, $max_inv_amount)) {
							$msg[] = "申込可能残高を超えています。";
						}
					}
				}
			}
			else {
				
				// 営業者情報取得
				$company = $this->Company->getCompany();
				$c_tel   = $company[COLUMN_0300140];
			
				$msg[] = "お手続きが完了していない出資申込がございます。";
				$msg[] = "お問い合わせより、その旨ご連絡ください。";
				//$msg[] = "お手数ですがTEL ".$c_tel."（トラストレンディグサポート）までご連絡ください。";
				//$msg[] = "尚、ご連絡をいただくまでは、お取引の一部を制限させていただいておりますのでご了承ください。";
			}

			return $msg;
			
		} catch (Exception $ex) {
			$err = "CheckC040->v020 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 投資履歴入力チェック
	 * @param arrya $data
	 * @return array $msg
	 */
	function v050($data) {
		
		try {
			
			$date_from = $data[SEARCH_ID_040050010];
			$date_to = $data[SEARCH_ID_040050020];

			$msg = null;

			if(strcmp($date_from, "") != 0) {
				$date_flag = $this->isDateForm($date_from); //0正しい; 1:形式が間違い; 2:有効じゃない
				if ($date_flag == 1) {
					$msg[] = "YYYY/MM/DD で入力してください。";
				} else if ($date_flag == 2) {
					$msg[] = "有効な日付を入力してください。";
				}
			}
			if(strcmp($date_to, "") != 0) {
				$date_flag = $this->isDateForm($date_to); //0正しい; 1:形式が間違い; 2:有効じゃない
				if ($date_flag == 1) {
					$msg[] = "YYYY/MM/DD で入力してください。";
				} else if ($date_flag == 2) {
					$msg[] = "有効な日付を入力してください。";
				}
			}
			if (is_null($msg) && strcmp($date_from, "") != 0 && strcmp($date_to, "") != 0 && !$this->isDateTimeline($date_from, $date_to)) {
				$msg[] = "開始日は終了日より前になるよう入力してください。";
			}

			return $msg;
			
		} catch (Exception $ex) {
			$err = "CheckC040->v050 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 配当履歴入力チェック
	 * @param arrya $data
	 * @return array $msg
	 */
	function v060($data) {
		
		try {
			
			$date_from = $data[SEARCH_ID_040060010];
			$date_to = $data[SEARCH_ID_040060020];

			$msg = null;

			if(strcmp($date_from, "") != 0) {
				$date_flag = $this->isDateForm($date_from); //0正しい; 1:形式が間違い; 2:有効じゃない
				if ($date_flag == 1) {
					$msg[] = "YYYY/MM/DD で入力してください。";
				} else if ($date_flag == 2) {
					$msg[] = "有効な日付を入力してください。";
				}
			}
			if(strcmp($date_to, "") != 0) {
				$date_flag = $this->isDateForm($date_to); //0正しい; 1:形式が間違い; 2:有効じゃない
				if ($date_flag == 1) {
					$msg[] = "YYYY/MM/DD で入力してください。";
				} else if ($date_flag == 2) {
					$msg[] = "有効な日付を入力してください。";
				}
			}
			if (is_null($msg) && strcmp($date_from, "") != 0 && strcmp($date_to, "") != 0 && !$this->isDateTimeline($date_from, $date_to)) {
				$msg[] = "開始日は終了日より前になるよう入力してください。";
			}

			return $msg;
			
		} catch (Exception $ex) {
			$err = "CheckC040->v060 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * メールアドレス変更入力チェック
	 * @param arrya $data
	 * @return array $msg
	 */
	function v08011($user_id, $data) {
		
		try {
			
			$mail_address         = $data[OBJECT_ID_040080010];
			$mail_address_confirm = $data[OBJECT_ID_040080020];
			$mail_password        = $data[OBJECT_ID_040080030];

			$right_password = $this->v080($user_id, COLUMN_0800030);

			$msg = null;

			if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$mail_address)) {
				$msg[] = "メールアドレスが正しくありません。"; 
			} else if ($this->isMailAddressExist($mail_address)) {
				$msg[] = "このメールアドレスは既に登録されています。"; 
			} else if (strcmp($mail_address, $mail_address_confirm) != 0) {
				$msg[] = "メールアドレスが一致していません。"; 
			} else if (strcmp($mail_password, $right_password) != 0) {
				$msg[] = "パスワードが正しくありません。"; 
			}

			return $msg;
			
		} catch (Exception $ex) {
			$err = "CheckC040->v08011 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * メールアドレス更新
	 * @param array  $data
	 */
	function v08012($user_id, $data) {

		try {
			
			$reg_data = array(
				MODEL_NAME_080 => array(
					 COLUMN_0800010 => $user_id
					,COLUMN_0800020 => $data[OBJECT_ID_040080010]
				)
			);

			$this->Controller->MstUser->save($reg_data, false);
			
		} catch (Exception $ex) {
			$err = "CheckC040->v08012 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * パスワード変更入力チェック
	 * @param arrya $data
	 * @return array $msg
	 */
	function v08021($user_id, $data) {
		
		try {
			
			$password             = $data[OBJECT_ID_040080040];
			$new_password         = $data[OBJECT_ID_040080050];
			$new_password_confirm = $data[OBJECT_ID_040080060];

			$right_password = $this->v080($user_id, COLUMN_0800030);

			$msg = null;

			if (strcmp($password, $right_password) != 0) {
				$msg[] = "パスワードが正しくありません。"; 
			} else if (!$this->isPasswordForm($new_password)) {
				$msg[] = "パスワードは半角英数字で入力してください。";
			} else if (strlen($new_password) > 12) {
				$msg[] = "パスワードは6～12文字で入力してください。"; 
			} else if (strlen($new_password) < 6) {
				$msg[] = "パスワードは6～12文字で入力してください。";
			} else if (strcmp($new_password, $new_password_confirm) != 0) {
				$msg[] = "パスワードが一致していません。"; 
			}

			return $msg;
			
		} catch (Exception $ex) {
			$err = "CheckC040->v08021 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * パスワード更新
	 * @param array  $data
	 */
	function v08022($user_id, $data) {

		try {
			
			$reg_data = array(
				MODEL_NAME_080 => array(
					 COLUMN_0800010 => $user_id
					,COLUMN_0800030 => $data[OBJECT_ID_040080050]
				)
			);

			$this->Controller->MstUser->save($reg_data, false);
			
		} catch (Exception $ex) {
			$err = "CheckC040->v08022 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * メールマガジン登録変更入力チェック
	 * @param arrya $data
	 * @return array $msg
	 */
	function v08031($user_id, $data) {
		
		try {
			
			$mail_magizine_input    = $data[OBJECT_ID_040080070];
			$mail_magizine_password = $data[OBJECT_ID_040080080];

			$mail_magizine  = $this->v080($user_id, COLUMN_0800536);

			$msg = null;

			if (strcmp($mail_magizine, $mail_magizine_input) == 0) {
				$msg[] = "内容が変更されていません。"; 
			}
			else {
				$right_password = $this->v080($user_id, COLUMN_0800030);

				if (strcmp($mail_magizine_password, $right_password) != 0)
				$msg[] = "パスワードが正しくありません。";
			}
			
		} catch (Exception $ex) {
			$err = "CheckC040->v08031 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
		return $msg;
	}
	
	/**
	 * メールマガジン登録変更更新
	 * @param array  $data
	 */
	function v08032($user_id, $data) {

		try {
			
			$reg_data = array(
				MODEL_NAME_080 => array(
					 COLUMN_0800010 => $user_id
					,COLUMN_0800536 => $data[OBJECT_ID_040080070]
				)
			);

			$this->Controller->MstUser->save($reg_data, false);
			
		} catch (Exception $ex) {
			$err = "CheckC040->v08032 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * ユーザのパスワードを獲得する
	 * @param int  $user_id
	 */
	function v080($user_id, $event) {

		try {
			
			$conditions[COLUMN_0800010] = $user_id;
			$status[MODEL_CONDITIONS]   = $conditions;

			$mst_user = $this->Controller->MstUser->find(MODEL_ALL, $status);

			return $mst_user[0][MODEL_NAME_080][$event];
			
		} catch (Exception $ex) {
			$err = "CheckC040->v080 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 掲載日入力チェック
	 * @param arrya $data
	 * @return array $msg
	 */
	function v090($data) {
		
		try {
			
			$date_from = $data[SEARCH_ID_040090010];
			$date_to   = $data[SEARCH_ID_040090020];

			$msg = null;

			if(strcmp($date_from, "") != 0) {
				$date_flag = $this->isDateForm($date_from); //0正しい; 1:形式が間違い; 2:有効じゃない
				if ($date_flag == 1) {
					$msg[] = "YYYY/MM/DD で入力してください。";
				} else if ($date_flag == 2) {
					$msg[] = "有効な日付を入力してください。";
				}
			}
			if(strcmp($date_to, "") != 0) {
				$date_flag = $this->isDateForm($date_to); //0正しい; 1:形式が間違い; 2:有効じゃない
				if ($date_flag == 1) {
					$msg[] = "YYYY/MM/DD 形式で入力してください。";
				} else if ($date_flag == 2) {
					$msg[] = "有効な日付を入力してください。";
				}
			}
			if (is_null($msg) && strcmp($date_from, "") != 0 && strcmp($date_to, "") != 0 && !$this->isDateTimeline($date_from, $date_to)) {
				$msg[] = "開始日は終了日より前になるよう入力してください。";
			}

			return $msg;
			
		} catch (Exception $ex) {
			$err = "CheckC040->v090 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 同意履歴入力チェック
	 * @param arrya $data
	 * @return array $msg
	 */
	function v110($data) {
		
		try {
			
			$date_from = $data[SEARCH_ID_040110010];
			$date_to = $data[SEARCH_ID_040110020];

			$msg = null;

			if(strcmp($date_from, "") != 0) {
				$date_flag = $this->isDateForm($date_from); //0正しい; 1:形式が間違い; 2:有効じゃない
				if ($date_flag == 1) {
					$msg[] = "YYYY/MM/DD 形式で入力してください。";
				} else if ($date_flag == 2) {
					$msg[] = "有効な日付を入力してください。";
				}
			}
			if(strcmp($date_to, "") != 0) {
				$date_flag = $this->isDateForm($date_to); //0正しい; 1:形式が間違い; 2:有効じゃない
				if ($date_flag == 1) {
					$msg[] = "YYYY/MM/DD 形式で入力してください。";
				} else if ($date_flag == 2) {
					$msg[] = "有効な日付を入力してください。";
				}
			}
			if (is_null($msg) && strcmp($date_from, "") != 0 && strcmp($date_to, "") != 0 && !$this->isDateTimeline($date_from, $date_to)) {
				$msg[] = "開始日は終了日より前になるよう入力してください。";
			}

			return $msg;
			
		} catch (Exception $ex) {
			$err = "CheckC040->v110 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * 配当予定入力チェック (2017/10/18追加)
	 * @param arrya $data
	 * @return array $msg
	 */
	function v120($data) {
            try {		
		$date_from = $data[SEARCH_ID_040120010];
		$date_to = $data[SEARCH_ID_040120020];
		$msg = null;

		if(strcmp($date_from, "") != 0) {
                    $date_flag = $this->isDateForm($date_from); //0正しい; 1:形式が間違い; 2:有効じゃない
                    if ($date_flag == 1) {
                        $msg[] = "YYYY/MM/DD で入力してください。";
                    } else if ($date_flag == 2) {
                        $msg[] = "有効な日付を入力してください。";
                    }
		}
		if(strcmp($date_to, "") != 0) {
                    $date_flag = $this->isDateForm($date_to); //0正しい; 1:形式が間違い; 2:有効じゃない
                    if ($date_flag == 1) {
                        $msg[] = "YYYY/MM/DD で入力してください。";
                    } else if ($date_flag == 2) {
                        $msg[] = "有効な日付を入力してください。";
                    }
		}
		if (is_null($msg) && strcmp($date_from, "") != 0 && strcmp($date_to, "") != 0 && !$this->isDateTimeline($date_from, $date_to)) {
                    $msg[] = "開始日は終了日より前になるよう入力してください。";
		} elseif (is_null($msg) && strcmp($date_from, "") != 0 && !$this->isPastDate ($date_from)) {
					$msg[] = "開始は本日以降の日付を入力して下さい。";
		}
		return $msg;
			
            } catch (Exception $ex) {
		$err = "CheckC040->v120 で例外発生<br>";
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
			$err = "CheckC040->isDateForm で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * 日付前後をチェック
	 * 
	 * @param  string   $date
	 * @return boolean
	 */
	private function isDateTimeline($date_from, $date_to) {

		try {
			
			$result = false;
			if (date(DATETIME_FORMAT_1, strtotime($date_from)) <= date(DATETIME_FORMAT_2, strtotime($date_to))) {
				$result = true;
			}
			
		} catch (Exception $ex) {
			$err = "CheckC040->isDateTimeline で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
		return $result;
	}

	/**
	 * 過去の日付かチェック
	 * 
	 * @param  string   $date
	 * @return boolean
	 */
	private function isPastDate($date) {

		try {
			
			$result = false;
			if (date(DATE_FORMAT, strtotime($date)) >= date(DATE_FORMAT)) {
				$result = true;
			}
			
		} catch (Exception $ex) {
			$err = "CheckC040->isPastDate で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
		return $result;
	}

	/**
	 * メールアドレス存在をチェック
	 */
	private function isMailAddressExist($mail_address) {

		try {
			
			$result = false;

			$conditions[COLUMN_0800020." ="] = $mail_address;
			$status[MODEL_CONDITIONS] = $conditions;
			// 検索結果が0件の場合戻り値にfalseを設定
			if ( $this->Controller->MstUser->find(MODEL_COUNT, $status) != 0) {
				$result = true;
			}

			return $result;
			
		} catch (Exception $ex) {
			$err = "CheckC040->isMailAddressExist で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * パスワード形式をチェック(半角英数字)
	 * 
	 * @param  string   $password
	 * @return boolean
	 */
	private function isPasswordForm($password) {

		try {
			
			$result = true;

			if (strcmp($password, "") == 0) {
				$result = false;
			} else {
				if (!preg_match("/^[a-zA-Z0-9]+$/", $password)) {
					$result = false;
				}
			}

			return $result;
			
		} catch (Exception $ex) {
			$err = "CheckC040->isPasswordForm で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 投資金額の必須チェック<br>
	 * 投資金額が入力されていれば True<br>
	 * @param number $inv_amount
	 * @return boolean $result
	 */
	private function isNotEmpty($inv_amount) {

		try {
			
			$result = false;
			if (strcmp("", $inv_amount) != 0) {
				$result = true;
			}
			return $result;
		
		} catch (Exception $ex) {
			$err = "CheckC040->isNotEmpty で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 整数チェック<br>
	 * 投資金額が整数のみであれば True<br>
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
			$err = "CheckC040->isInteger で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 投資金額の単位チェック<br>
	 * 投資金額が最少投資金額の倍数であれば True<br>
	 * @param number $inv_amount $min_amount
	 * @return boolean $result
	 */
	private function isMultiple($inv_amount, $min_amount) {

		try {
			
			$result = false;
			if (intval($inv_amount) % intval($min_amount) == 0) {
				$result = true;
			}
			return $result;
			
		} catch (Exception $ex) {
			$err = "CheckC040->isMultiple で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 募集中チェック<br>
	 * 投資可能最大金額が0より大きい場合 True<br>
	 * @param number $inv_amount $max_amount
	 * @return boolean $result
	 */
	private function isClose($max_inv_amount) {

		try {
			
			$result = false;
			if (0 < intval($max_inv_amount)) {
				$result = true;
			}
			return $result;
			
		} catch (Exception $ex) {
			$err = "CheckC040->isClose で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 投資金額の範囲チェック<br>
	 * 投資金額が現在投資可能な金額の最大以内であれば True<br>
	 * @param number $inv_amount $max_amount
	 * @return boolean $result
	 */
	private function isMaxRage($inv_amount, $max_amount) {

		try {
			
			$result = false;
			if (intval($max_amount) >= intval($inv_amount)) {
				$result = true;
			}
			return $result;
			
		} catch (Exception $ex) {
			$err = "CheckC040->isMaxRage で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 入金期限チェック<br>
	 * 入金期限切れのデータを持っている場合、false<br>
	 * @param string $user_id
	 * $return boolean $result
	 */
	private function isExpiration($user_id) {
		
		try {
			
			$result = true;
			
			$conditions[COLUMN_1200020] = $user_id;
			$conditions[COLUMN_1200090] = INVESTMENT_STATUS_CODE_EXPIRED;
			
			$status[MODEL_CONDITIONS] = $conditions;
			
			// 検索結果が0件の場合戻り値にfalseを設定
			if ($this->Controller->TrnInvestmentHistory->find(MODEL_COUNT, $status) != 0) {
				$result = false;
			}
			
			return $result;
			
		} catch (Exception $ex) {
			$err = "CheckC040->isExpiration で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
        	/**
	 * 複数投資チェック<br>
	 * 投資実績があるファンドの場合、false<br>
	 * @param string $user_id,$fund_id
	 * $return boolean $result
	 */
	private function isExpiration_1($user_id,$fund_id) {
		
		try {
			
			$result = true;
			
			$conditions[COLUMN_1200020] = $user_id;
                        $conditions[COLUMN_1200040] = $fund_id;
                        $conditions[COLUMN_1200090] = array(0,1);//IN(0,1)
                        
                        //INVESTMENT_STATUS_CODE_APPLIED   , 0 // 投資状態：申請
                        //INVESTMENT_STATUS_CODE_APPROVED  , 1 // 投資状態：承認
                        //INVESTMENT_STATUS_CODE_CANCELLED , 2 // 投資状態：取消
                        //INVESTMENT_STATUS_CODE_EXPIRED   , 3 // 投資状態：期限切れ
			
			$status[MODEL_CONDITIONS] = $conditions;
			//MODEL_COUNT, $status
			// 検索結果が>0件の場合戻り値にfalseを設定
			if ($this->Controller->TrnInvestmentHistory->find(MODEL_COUNT, $status) == 0) {
		        $result = false;
			}
			
			return $result;
			
		} catch (Exception $ex) {
			$err = "CheckC040->isExpiration_1 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

}
