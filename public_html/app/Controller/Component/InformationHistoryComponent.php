<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class InformationHistoryComponent extends Component {
	
	public $components = array(
		"Calendar"
		,"Company"
		,"Document"
		,"Fund"
		,"Mail"
		,"Pdf"
		,"User"
	);
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * お知らせ一覧取得
	 * @param  int   $id
	 * @return array $data
	 */
	function getInformation($id) {
		
		try {
			
			$status     = null;
			$conditions = null;
			$order      = null;

			// ユーザID
			//$conditions[COLUMN_1100020] = $user_id;
			$conditions[COLUMN_1100010] = $id;

			$status[MODEL_CONDITIONS] = $conditions;

			// 検索結果が0件の場合戻り値にfalseを設定
			$data = $this->Controller->TrnInformationHistory->find(MODEL_ALL, $status);

			return $data;
			
		} catch (Exception $ex) {
			$err = "InformationHistory->getInformation で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * お知らせ一覧取得<br>
	 * マイページのお知らせ一覧に表示するデータを取得する。<br>
	 * @param string $user_id
	 * @return array $data
	 */
	function getInformationList($user_id, $data = null) {
		
		try {
			
			$status     = null;
			$conditions = null;
			$order      = null;

			// ◆絞込み条件◆
			// ユーザID
			$conditions[COLUMN_1100020] = $user_id;
			
			if (strcmp("", $data[SEARCH_ID_040090010]) != 0) {
				
				// 掲載日時(開始)：時刻 = 00:00:00
				$conditions[COLUMN_1100130." >="] = date(DATETIME_FORMAT_1, strtotime($data[SEARCH_ID_040090010]));
			}
			
			// 管理者側からお知らせを送信する際、掲載日時に未来の日時を設定する場合があるので、
			// 投資家側でお知らせ履歴の検索を行う際には、掲載日(終了)の日時は現在の日時以前でなければならない。
			if (strcmp("", $data[SEARCH_ID_040090020]) != 0) {
				
				// 掲載日時(終了)：時刻 = 23:59:59
				$date_to = strtotime(date(DATETIME_FORMAT_2, strtotime($data[SEARCH_ID_040090020])));
				if (strtotime(date(DATETIME_FORMAT)) < $date_to) {
					
					// 入力された掲載日が未来の日付だった場合、現在日時に置き換える。
					$date_to = strtotime(date(DATETIME_FORMAT));
				}
				$conditions[COLUMN_1100130." <="] = date(DATETIME_FORMAT, $date_to);
			}
			else {
				
				// 掲載日(終了)の指定が無い場合、システム日付を指定する
				$conditions[COLUMN_1100130." <="] = date(DATETIME_FORMAT);
			}

			// ◆ソート◆
			$order[COLUMN_1100130] = MODEL_DESC;
			$order[COLUMN_1100100] = MODEL_DESC;

			$status[MODEL_CONDITIONS] = $conditions;
			$status[MODEL_ORDER]      = $order;

			// 検索結果が0件の場合戻り値にfalseを設定
			$data = $this->Controller->TrnInformationHistory->find(MODEL_ALL, $status);

			return $data;
			
		} catch (Exception $ex) {
			$err = "InformationHistory->getInformationList で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		  }
		
	}
	
        /**
	 * MyPage表示用<br>
	 * 
	 * @param $user_id
	 * @return  $data(array)
	 */
        function getInformationList_my($user_id, $data = null) {

                try {

                        $status     = null;
                        $conditions = null;
                        $order      = null;

                        $ima = date(DATETIME_FORMAT);
                        $data = $this->Controller->TrnInformationHistory->find('all',array(
                                                                                           'conditions' => array('user_id' => $user_id, 'post_datetime <=' => $ima ),
                                                                                           'order' => array('post_datetime' => 'desc', 'target_fund_id' => 'desc'),
                                                                                           'limit' => 6
                                                                                              ));
                        return $data;
                } catch (Exception $ex) {
                        $err = "InformationHistory->getInformationList_my で例外発生<br>";
                        throw new Exception($err.$ex->getMessage()."<br>");
                  }
        }

        function updateInformationForce($data_list) {
                                                foreach($data_list as $key1 => $value1) {
                                               foreach($value1 as $key => $value) {

                                                 $iv_user_id = $value['user_id'];
                                                 $iv_fund_id = $value['fund_id'];
                                                 $iv_approval_datetime = $value['approval_datetime'];
                                                 $iv_hidden_id = $value['hidden_id'];
                                                 //取り消しフラグのデータのみ実行
                                                   //if($iv_hidden_id == 2)
                                                        
                                                                          $this->Controller->TrnInformationHistory->updateAll(
                                                                                  array(
                                                                                         'force_flag' => 0,'agreement_flag' => 0),
                                                                                  array('user_id' => $iv_user_id,
                                                                                        'target_fund_id' => $iv_fund_id,
                                                                                        'info_date' => $iv_approval_datetime ));
                                     
                                                                         //}

                                                                              }
                                                                                  } 
        }  

        /**
	 * ひとまずは対象者をリスト化
	 * 
	 * @param $user_id,$fund_id,$info_date
	 * @return  $data(array)
	 */
        function getInformation_invest($user_id, $fund_id, $info_date) {

                try {

                        $status     = null;
                        $conditions = null;
                        $order      = null;

                        $data = $this->Controller->TrnInformationHistory->find('all',array('conditions' => array('user_id' => $user_id, 'fund_id' => $fund_id, 'info_date' => $info_date )
                                                                                                     ));
                        return $data;
                } catch (Exception $ex) {
                        $err = "InformationHistory->getInformation_invest で例外発生<br>";
                        throw new Exception($err.$ex->getMessage()."<br>");
                }

        }

        /**
	 * 書面確認カウント
	 * 2ならば2書面同意確認
	 * @param $user_id,$fund_id,$post_datetime
	 * @return  $data(array)
	 */
        function getInformation_coolimgcount($user_id, $target_fund_id, $post_datetime) {

                try {

                        $status     = null;
                        $conditions = null;
                        $order      = null;

                        $data_c = $this->Controller->TrnInformationHistory->find('count',array(
                                                                                              'conditions' => array(
                                                                                                      'user_id'         => $user_id, 
                                                                                                      'target_fund_id'  => $target_fund_id, 
                                                                                                      'post_datetime'   => $post_datetime,
                                                                                                  'NOT' => array(
                                                                                                      'agreed_datetime' => NULL)
                                                                                                  
                                                                                                     ) ) );
                                                                                                                          
                                                                                
                        return $data_c;
                } catch (Exception $ex) {
                        $err = "InformationHistory->getInformation_coolingcount で例外発生<br>";
                        throw new Exception($err.$ex->getMessage()."<br>");
                }

        }




	/**
	 * お知らせ番号(自動)生成<br>
	 * 自動発行分のお知らせ番号を発行する。<br>
	 * @param string $user_id
	 * @return string $new_info_id
	 */
	function createInfoIdAuto($user_id) {
		
		try {
			
			$status     = null;
			$conditions = null;

			$year = date("Y");

			// ◆絞込み条件◆
			// お知らせ履歴から自動発行分の最新お知らせ番号を取得
			$conditions[COLUMN_1100020]         = $user_id;
			$conditions[COLUMN_1100030." like"] = PREFIX_INFO_MSG_AUTO.$year."%";

			$status[MODEL_FIELDS] = array(
				"max(".COLUMN_1100030.") as ".COLUMN_1100030
			);

			// データ取得
			$status[MODEL_CONDITIONS] = $conditions;
			$data = $this->Controller->TrnInformationHistory->find(MODEL_ALL, $status);

			// お知らせ番号取出し
			$info_id = "";
			foreach ($data as $keys => $values) {
				foreach ($values as $key => $value) {
					if (strcmp(0, $key) == 0) {
						$info_id = $value[COLUMN_1100030];
					}
				}
			}

			// お知らせ番号分解
			$info_seq = 0;
			if (strcmp("", $info_id) != 0) {
				$info_seq  = intval(substr($info_id, 6, 4)); // 通番
			}

			$new_info_id = PREFIX_INFO_MSG_AUTO.$year.sprintf("%04d", $info_seq + 1);

			return $new_info_id;
			
		} catch (Exception $ex) {
			$err = "InformationHistory->createInfoIdAuto で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * お知らせ番号(管理者)生成<br>
	 * 管理者作成分のお知らせ番号を発行する。<br>
	 * @return string $new_info_id
	 */
	function createInfoIdAdmin() {
		
		try {
			
			$status     = null;
			$conditions = null;

			$year = date("Y");

			// ◆絞込み条件◆
			// お知らせ履歴から管理者発行分の最新お知らせ番号を取得
			$conditions[COLUMN_2800020." like"] = PREFIX_INFO_MSG_ADMIN.$year."%";

			$status[MODEL_FIELDS] = array(
				"max(".COLUMN_2800020.") as ".COLUMN_2800020
			);

			// データ取得
			$status[MODEL_CONDITIONS] = $conditions;
			$data = $this->Controller->TrnAdminInfoHistory->find(MODEL_ALL, $status);

			// お知らせ番号取出し
			$info_id = "";
			foreach ($data as $keys => $values) {
				$info_id = $values[0][COLUMN_2800020];
			}

			// お知らせ番号分解
			$info_seq = 0;
			if (strcmp("", $info_id) != 0) {
				$info_seq  = intval(substr($info_id, 6, 4)); // 通番
			}

			$new_info_id = PREFIX_INFO_MSG_ADMIN.$year.sprintf("%04d", $info_seq + 1);

			return $new_info_id;
			
		} catch (Exception $ex) {
			$err = "InformationHistory->createInfoIdAdmin で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 投資手続き完了のお知らせ登録<br>
	 * 投資申込に対し管理者側で承認を行う際に契約締結時の書面への同意を促すためのお知らせを作成する。<br>
	 * @param array $data $reg_data
	 * @return boolean $result
	 */
	function saveInformationHistoryInv($data, $reg_data) {
		
		try {
			
			$fund_name     = $data[OBJECT_ID_050080010];
			$appl_datetime = date(DATETIME_FORMAT_4, strtotime($data[OBJECT_ID_050080020]));

			$user_id = $reg_data[COLUMN_1100020];
			$fund_id = $reg_data[COLUMN_1100100];

			$info_id = $this->createInfoIdAuto($user_id); // お知らせ番号

			$company = $this->Company->getCompany();
			$c_tel   = $company[COLUMN_0300140];
			$site_name=$company[COLUMN_0300200];
			
			// お知らせ件名
			$subject = "【重要】出資確定のご連絡（『".$fund_name."』成立時書面）";

			// お知らせ本文
			$body = ""
				.$site_name."をご利用いただき誠にありがとうございます。".HTML_TAG_BR
				."お申込みいただいた『".$fund_name."』に関して出資が確定しました。".HTML_TAG_BR
				//."".HTML_TAG_BR
				//."【確定内容】".HTML_TAG_BR
				//."ファンド名　　：".$fund_name."".HTML_TAG_BR
				//."出資確定日　　：".$appl_datetime."".HTML_TAG_BR
				//."確定金額および書面確認・入金期日は、メールもしくは不動産特定共同事業契約書にてご確認ください。".HTML_TAG_BR
				//."出資確定金額　：メールにてご確認ください。".HTML_TAG_BR
				//."入金期日　　　：メールにてご確認ください。".HTML_TAG_BR
				."".HTML_TAG_BR
				."【今後の流れ】".HTML_TAG_BR
				."1.　本お知らせに添付されている書面の内容確認および同意を行う　(※本成立時書面および契約書の２書面ございます)".HTML_TAG_BR
				."2.　出資金を指定口座までお振込み　(※口座はメールに記載しております)".HTML_TAG_BR
				."".HTML_TAG_BR
				."".HTML_TAG_BR
                ."----ご注意事項----".HTML_TAG_BR
                ."本お知らせは、「同意する」ボタンを押下されることで「既読」となります。本お知らせを閲覧されただけでは「既読」となりませんのでご注意ください。".HTML_TAG_BR
                
				//."ご不明点等ございましたら、サイト内お問い合わせもしくは".$c_tel."（10：00～17：00 土日祝を除く）までお問い合わせください。".HTML_TAG_BR
				.""
				."";

			// 契約締結時同意書面取得
			$doc_id = INV_DOC_ID_00003;
			$doc_data = $this->Document->getInvestmentDocuments2();

			foreach ($doc_data as $keys => $values) {
				foreach ($values as $key => $value) {
					
					$attachment[COLUMN_1150020] = $user_id;               // ユーザID
					$attachment[COLUMN_1150030] = $info_id;               // お知らせID
					$attachment[COLUMN_1150040] = $fund_id;               // ファンドID
					$attachment[COLUMN_1150050] = $value[COLUMN_0400030]; // 書面ID
					$attachment[COLUMN_1150060] = $value[COLUMN_0400040]; // 書面名
					$attachment[COLUMN_1150070] = $value[COLUMN_0400050]; // リビジョン
					$attachment[COLUMN_1150080] = $appl_datetime;

					// お知らせ添付書面登録
					$this->Controller->TrnInfoAttachment->create();
					$this->Controller->TrnInfoAttachment->save($attachment);
				}
			}

			$reg_data[COLUMN_1100030] = $info_id; // お知らせ番号
			$reg_data[COLUMN_1100050] = $subject;      // 件名
			$reg_data[COLUMN_1100060] = $body;         // 本文
			$reg_data[COLUMN_1100070] = PRESENCE_CODE; // 確認強制：有
			$reg_data[COLUMN_1100080] = PRESENCE_CODE; // 同意有無：有
                        $reg_data[COLUMN_1100110] = INV_DOC_ID_00003;

			$this->Controller->TrnInformationHistory->create();
			$result = $this->Controller->TrnInformationHistory->save($reg_data);

			return $result;
			
		} catch (Exception $ex) {
			$err = "InformationHistory->saveInformationHistoryInv で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	

        function saveInformationHistoryInv2($data, $reg_data) {

                try {

                        $fund_name     = $data[OBJECT_ID_050080010];
                        $appl_datetime = date(DATETIME_FORMAT_4, strtotime($data[OBJECT_ID_050080020]));

                        $user_id = $reg_data[COLUMN_1100020];
                        $fund_id = $reg_data[COLUMN_1100100];
                        

                        $info_id = $this->createInfoIdAuto($user_id); // お知らせ番号

                        $company = $this->Company->getCompany();
                        $c_tel   = $company[COLUMN_0300140];
                        $site_name=$company[COLUMN_0300200];

                        // お知らせ件名
                        $subject = "【重要】出資確定のご連絡（『".$fund_name."』契約書）";

                        // お知らせ本文
                        $body = ""
                                .$site_name."をご利用いただき誠にありがとうございます。".HTML_TAG_BR
                                ."お申込みいただいた『".$fund_name."』に関して出資が確定しました。".HTML_TAG_BR
                                ."".HTML_TAG_BR
                                //."【出資確定内容】".HTML_TAG_BR
                                //."ファンド名　　：".$fund_name."".HTML_TAG_BR
                                //."出資確定日　　：".$appl_datetime."".HTML_TAG_BR
                                //."出資確定金額　：メールにてご確認ください。".HTML_TAG_BR
                                //."入金期日　　　：メールにてご確認ください。".HTML_TAG_BR
                                //."確定金額および書面確認・入金期日は、メールもしくは不動産特定共同事業契約書にてご確認ください。".HTML_TAG_BR
                                //."".HTML_TAG_BR
                                ."【今後の流れ】".HTML_TAG_BR
                                ."1.　本お知らせに添付されている書面の内容確認および同意を行う　(※本契約書および成立時書面の２書面ございます)".HTML_TAG_BR
                                ."2.　出資金を指定口座までお振込み　(※口座はメールに記載しております)".HTML_TAG_BR
                                ."".HTML_TAG_BR
                                ."".HTML_TAG_BR
                                ."----ご注意事項----".HTML_TAG_BR
                                ."本お知らせは、「同意する」ボタンを押下されることで「既読」となります。本お知らせを閲覧されただけでは「既読」となりませんのでご注意ください。".HTML_TAG_BR
                                //."ご不明点等ございましたら、サイト内お問い合わせもしくは".$c_tel."（10：00～17：00 土日祝を除く）までお問い合わせください。".HTML_TAG_BR
                                ."";

                        // 契約締結時同意書面取得
                        $doc_id = INV_DOC_ID_00007;
                        $doc_data = $this->Document->getInvestmentDocuments7();

                        foreach ($doc_data as $keys => $values) {
                                foreach ($values as $key => $value) {

                                        $attachment[COLUMN_1150020] = $user_id;               // ユーザID
                                        $attachment[COLUMN_1150030] = $info_id;               // お知らせID
                                        $attachment[COLUMN_1150040] = $fund_id;               // ファンドID
                                        $attachment[COLUMN_1150050] = $value[COLUMN_0400030]; // 書面ID
                                        $attachment[COLUMN_1150060] = $value[COLUMN_0400040]; // 書面名
                                        $attachment[COLUMN_1150070] = $value[COLUMN_0400050]; // リビジョン
                                        $attachment[COLUMN_1150080] = $appl_datetime;

                                        // お知らせ添付書面登録
                                        $this->Controller->TrnInfoAttachment->create();
                                        $this->Controller->TrnInfoAttachment->save($attachment);
                                }
                        }

                        $reg_data[COLUMN_1100030] = $info_id; // お知らせ番号
                        $reg_data[COLUMN_1100050] = $subject;      // 件名
                        $reg_data[COLUMN_1100060] = $body;         // 本文
                        $reg_data[COLUMN_1100070] = PRESENCE_CODE; // 確認強制：有
                        $reg_data[COLUMN_1100080] = PRESENCE_CODE; // 同意有無：有
                        $reg_data[COLUMN_1100110] = INV_DOC_ID_00007;

                        $this->Controller->TrnInformationHistory->create();
                        $result = $this->Controller->TrnInformationHistory->save($reg_data);

                        return $result;

                } catch (Exception $ex) {
                        $err = "InformationHistory->saveInformationHistoryInv2 で例外発生<br>";
                        throw new Exception($err.$ex->getMessage()."<br>");
                }
        }




	/**
	 * tr_infomation_history変更
	 * @param int   $info_id
	 * @param array $data
	 * @return type
	 */
	function updateInformationHistory($id, $data) {
		
		try {
			
			$conditions[COLUMN_1100010] = $id;

			if (isset($data[COLUMN_1100140])) {
				$conditions[COLUMN_1100140] = $data[COLUMN_1100140];
			}
			if (isset($data[COLUMN_1100150])) {
				$conditions[COLUMN_1100150] = $data[COLUMN_1100150];
			}

			$this->Controller->TrnInformationHistory->save($conditions, false);
			
		} catch (Exception $ex) {
			$err = "InformationHistory->updateInformationHistory で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	
	}
	
	/**
	 * 要確認、要同意お知らせの有無<br>
	 * true  : 該当お知らせ有
	 * false : 該当お知らせ無
	 * @param string $user_id
	 * @return boolean $result
	 */
	function checkForcedInformation($user_id) {
		
		try {
			
			$result = false;

			$conditions[COLUMN_1100020] = $user_id;

			$conditions[MODEL_OR][0][COLUMN_1100070] = FORCE_FLAG_TRUE;
			$conditions[MODEL_OR][0][COLUMN_1100140] = null;

			$conditions[MODEL_OR][1][COLUMN_1100070] = FORCE_FLAG_TRUE;
			$conditions[MODEL_OR][1][COLUMN_1100080] = AGREEMENT_FLAG_TRUE;
			$conditions[MODEL_OR][1][COLUMN_1100150] = null;
			
			$status[MODEL_CONDITIONS] = $conditions;

			if (0 < $this->Controller->TrnInformationHistory->find(MODEL_COUNT, $status)) {
				$result = true;
			}

			return $result;
			
		} catch (Exception $ex) {
			$err = "InformationHistory->checkForcedInformation で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
			
	}
	
	/**
	 * 運用報告書交付のお知らせ登録<br>
	 * 引数で渡された$idで対象となる報告書のファンド、年月を絞込み<br>
	 * 対象ファンドに投資している投資家に対してお知らせを発行する。<br>
	 * @param number $id
	 * @param datetime $now
	 * @param array $user_id_list
	 */
	function issueOperatingReport($id, $now, &$user_id_list) {
		
		try {
			
			// 運用報告書データを取得
			$conditions[COLUMN_2700010] = $id;
			$status[MODEL_CONDITIONS] = $conditions;
			$report = $this->Controller->TrnSecondOperatingReport->find(MODEL_ALL, $status);

			foreach ($report as $key => $values) {
				foreach ($values as $value) {

					// 報告書の年月を取得
					$report_year  = $value[COLUMN_2700040];
					$report_month = $value[COLUMN_2700050];

					// ◆ファンド情報取得◆
					$fund_id   = $value[COLUMN_2700020];
					$fund_name = $value[COLUMN_2700030];

					// ◆投資情報(ユーザ毎にグルーピング)◆
					$inv_fields[] = COLUMN_1200020;

					$inv_conditions[COLUMN_1200040] = $fund_id;
					$inv_conditions[COLUMN_1200090] = INVESTMENT_STATUS_CODE_APPROVED;

					$inv_group[]  = COLUMN_1200020;

					$inv_status[MODEL_FIELDS]     = $inv_fields;
					$inv_status[MODEL_CONDITIONS] = $inv_conditions;
					$inv_status[MODEL_GROUP]      = $inv_group;

					$investment = $this->Controller->TrnInvestmentHistory->find(MODEL_ALL, $inv_status);
					
					// 営業者情報
					$company = $this->Company->getCompany();
					$c_tel   = $company[COLUMN_0300140];
					$site_name=$company[COLUMN_0300200];

					// ◆運用報告書情報取得◆
					$doc_data = $this->Document->getOperatingReportDocument();
					$doc_value = null;
					foreach ($doc_data as $doc_keys => $doc_values) {
						foreach ($doc_values as $doc_key => $doc_value) {
						}
					}

					foreach ($investment as $inv_keys => $inv_values) {
						foreach ($inv_values as $inv_key => $inv_value) {

							$user_id = $inv_value[COLUMN_1200020];

							$info_id = $this->createInfoIdAuto($user_id); // お知らせ番号

							// お知らせ件名
							$subject = "財産管理報告書『".$fund_name."』交付のご連絡";

							// お知らせ本文
							$body = ""
								.$site_name."をご利用いただき誠にありがとうございます。".HTML_TAG_BR
								."『".$fund_name."』の財産管理報告書を交付いたしました。".HTML_TAG_BR
								."ご確認の程よろしくお願いいたします。".HTML_TAG_BR
								//."ご不明点等ございましたら、サイト内お問い合わせもしくは ".$c_tel."（10：00～17：00 土日祝を除く）までお問い合わせください。".HTML_TAG_BR
								.""
								."";

							$reg_data[COLUMN_1100020] = $user_id;
							$reg_data[COLUMN_1100030] = $info_id;      // お知らせ番号
							$reg_data[COLUMN_1100040] = $now;          // お知らせ日時
							$reg_data[COLUMN_1100050] = $subject;      // 件名
							$reg_data[COLUMN_1100060] = $body;         // 本文
							$reg_data[COLUMN_1100070] = ABSENCE_CODE;  // 確認強制：無
							$reg_data[COLUMN_1100080] = ABSENCE_CODE;  // 同意有無：無
							$reg_data[COLUMN_1100100] = $fund_id;      // 対象ファンドID
							$reg_data[COLUMN_1100130] = $now;          // 掲載日時

							$this->Controller->TrnInformationHistory->create();
							$result = $this->Controller->TrnInformationHistory->save($reg_data);
							
							// 書面パラメータ
							$doc_param = $report_year.sprintf("%02d", intval($report_month));
							
							$doc_id   = $doc_value[COLUMN_0400030];
							$doc_name = $doc_value[COLUMN_0400040];
							
							// 添付書面が既に登録済みの場合(再登録の場合)、リビジョンを上げて登録する。
							$attach_cond[COLUMN_1150020] = $user_id;
							$attach_cond[COLUMN_1150040] = $fund_id;
							$attach_cond[COLUMN_1150050] = $doc_id;
							$attach_cond[COLUMN_1150080] = $doc_param;
							$attach_status[MODEL_CONDITIONS] = $attach_cond;
							$attach_data = $this->Controller->TrnInfoAttachment->find(MODEL_ALL, $attach_status);
							$revision = intval($doc_value[COLUMN_0400050]);
							foreach ($attach_data as $attach_keys => $attach_values) {
								foreach ($attach_values as $attach_key => $attach_value) {
									$revision += intval($attach_value[COLUMN_1150070]);
								}
							}

							// お知らせ添付書面登録
							$attachment[COLUMN_1150020] = $user_id;   // ユーザID
							$attachment[COLUMN_1150030] = $info_id;   // お知らせID
							$attachment[COLUMN_1150040] = $fund_id;   // ファンドID
							$attachment[COLUMN_1150050] = $doc_id;    // 書面ID
							$attachment[COLUMN_1150060] = $doc_name;  // 書面名
							$attachment[COLUMN_1150070] = $revision;  // リビジョン
							$attachment[COLUMN_1150080] = $doc_param; // リンク用パラメータ

							$this->Controller->TrnInfoAttachment->create();
							$this->Controller->TrnInfoAttachment->save($attachment);
							
							// 運用報告書PDF作成＆保存
							$pdf_param = array();
							$pdf_param[ARRAY_INDEX_USER_ID]      = $user_id;
							$pdf_param[ARRAY_INDEX_DOC_CAT_ID]   = $fund_id;
							$pdf_param[ARRAY_INDEX_DOC_REV]      = $revision;
							$pdf_param[ARRAY_INDEX_REPORT_MONTH] = $doc_param;
							
							$this->Pdf->savePdf00004($pdf_param);
							
							// ユーザIDリストに含まれていないIDの場合実行
							if (!isset($user_id_list[$user_id])) {
								
								// ユーザIDリストにID追加
								$user_id_list[$user_id] = $user_id;
							}
						}
					}
				}
			}
		} catch (Exception $ex) {
			$err = "InformationHistory->issueOperatingReport で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 取引残高交付のお知らせ登録<br>
	 * @param string $user_id
	 * @param number $trade_start_year
	 * @param number $trade_start_month
	 * @param datetime $now
	 * @throws Exception
	 */
	function issueTradeBalanceReport($user_id, $trade_start_year, $trade_start_month, $now) {
		try {
			
			// 取引残高報告書ドキュメント情報取得
			$doc_data = $this->Document->getTradeBalanceReportDocument();
			
			$info_id = $this->createInfoIdAuto($user_id); // お知らせ番号
			
			// 営業者情報
			$company = $this->Company->getCompany();
			$c_tel   = $company[COLUMN_0300140];
			$site_name=$company[COLUMN_0300200];
			
			// お知らせ件名
			$subject = "取引残高報告書　交付のご連絡";

			// お知らせ本文
			$body = ""
				.$site_name."をご利用いただき誠にありがとうございます。".HTML_TAG_BR
				."取引残高報告書を交付しました。".HTML_TAG_BR
				."ご不明点等ございましたら、サイト内お問い合わせもしくは ".$c_tel."（10：00～17：00 土日祝を除く）までお問い合わせください。".HTML_TAG_BR
				.""
				."";

			$reg_data[COLUMN_1100020] = $user_id;                  // ユーザID
			$reg_data[COLUMN_1100030] = $info_id;                  // お知らせ番号
			$reg_data[COLUMN_1100040] = $now;                      // お知らせ日時
			$reg_data[COLUMN_1100050] = $subject;                  // 件名
			$reg_data[COLUMN_1100060] = $body;                     // 本文
			$reg_data[COLUMN_1100070] = PRESENCE_CODE;             // 確認強制：有
			$reg_data[COLUMN_1100080] = PRESENCE_CODE;             // 同意有無：有
			$reg_data[COLUMN_1100100] = $doc_data[COLUMN_0400020]; // 対象ファンドID(書面カテゴリID)
			$reg_data[COLUMN_1100130] = $now;                      // 掲載日時

			$this->Controller->TrnInformationHistory->create();
			$result = $this->Controller->TrnInformationHistory->save($reg_data);

			// お知らせ添付書面登録
			$doc_param = $trade_start_year.sprintf("%02d", intval($trade_start_month));
			$attachment[COLUMN_1150020] = $user_id;                  // ユーザID
			$attachment[COLUMN_1150030] = $info_id;                  // お知らせID
			$attachment[COLUMN_1150040] = $doc_data[COLUMN_0400020]; // ファンドID
			$attachment[COLUMN_1150050] = $doc_data[COLUMN_0400030]; // 書面ID
			$attachment[COLUMN_1150060] = $doc_data[COLUMN_0400040]; // 書面名
			$attachment[COLUMN_1150070] = $doc_data[COLUMN_0400050]; // リビジョン
			$attachment[COLUMN_1150080] = $doc_param;                // リンク用パラメータ(取引年月(開始))

			$this->Controller->TrnInfoAttachment->create();
			$this->Controller->TrnInfoAttachment->save($attachment);
			
			// 取引残高報告書PDF作成＆保存
			$pdf_param = array();
			$pdf_param[ARRAY_INDEX_USER_ID]      = $user_id;
			$pdf_param[ARRAY_INDEX_DOC_CAT_ID]   = $doc_data[COLUMN_0400020];
			$pdf_param[ARRAY_INDEX_DOC_REV]      = $doc_data[COLUMN_0400050];
			$pdf_param[ARRAY_INDEX_REPORT_MONTH] = $doc_param;

			$this->Pdf->savePdf00005($pdf_param);
							
		} catch (Exception $ex) {
			$err = "InformationHistory->issueTradeBalanceReport で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 年間取引報告書交付のお知らせ登録<br>
	 * @param string $user_id
	 * @param datetime $now
	 * @param number $year_ad
	 * @throws Exception
	 */
	function issueAnnualTradeReport($user_id, $now, $year_ad) {
		try {
			
			$info_id = $this->createInfoIdAuto($user_id); // お知らせ番号
                        $doc_data = $this->Document->getAnnualTradeReportDocument();
			// 年数を西暦から和暦に変換
			$year_ja = $this->Calendar->convertAdtoJaYear($year_ad);
			
			// 営業者情報
			$company = $this->Company->getCompany();
			$c_tel   = $company[COLUMN_0300140];
			$site_name=$company[COLUMN_0300200];
			
			// お知らせ件名
			$subject = "年間取引報告書発行のご連絡";

			// お知らせ本文
			$body = ""
				.$site_name."をご利用いただき誠にありがとうございます。".HTML_TAG_BR
				."".HTML_TAG_BR
				.$year_ja."年分の年間取引報告書を交付いたしました。".HTML_TAG_BR
				."該当期間　：　".$year_ja."年1月1日　～　".$year_ja."年12月31日".HTML_TAG_BR
				."上記期間に配当金をお受け取りいただいた方が対象になります。".HTML_TAG_BR
				."".HTML_TAG_BR
				."引き続き、".$site_name."を宜しくお願いいたします。".HTML_TAG_BR
				//."その他ご不明点等ございましたら、サイト内お問い合わせもしくは".$c_tel."（10：00～17：00 土日祝を除く）までお問い合わせください。".HTML_TAG_BR
				.""
				."";

			$reg_data[COLUMN_1100020] = $user_id;       // ユーザID
			$reg_data[COLUMN_1100030] = $info_id;       // お知らせ番号
			$reg_data[COLUMN_1100040] = $now;           // お知らせ日時
			$reg_data[COLUMN_1100050] = $subject;       // 件名
			$reg_data[COLUMN_1100060] = $body;          // 本文
			$reg_data[COLUMN_1100070] = PRESENCE_CODE;   // 確認強制：無ABSENC //有に変更SY
			$reg_data[COLUMN_1100080] = PRESENCE_CODE;   // 同意有無：無ABSENC //有に変更SY
			$reg_data[COLUMN_1100100] = INV_DOC_CAT_ID; // 対象ファンドID(書面カテゴリID)
			$reg_data[COLUMN_1100130] = $now;           // 掲載日時

			$this->Controller->TrnInformationHistory->create();
			$result = $this->Controller->TrnInformationHistory->save($reg_data);
			// お知らせ添付書面登録SY
			$doc_param = $year_ad;
			$attachment[COLUMN_1150020] = $user_id;                  // ユーザID
			$attachment[COLUMN_1150030] = $info_id;                  // お知らせID
			$attachment[COLUMN_1150040] = $doc_data[COLUMN_0400020]; // ファンドID
			$attachment[COLUMN_1150050] = $doc_data[COLUMN_0400030]; // 書面ID
			$attachment[COLUMN_1150060] = $doc_data[COLUMN_0400040]; // 書面名
			$attachment[COLUMN_1150070] = $doc_data[COLUMN_0400050]; // リビジョン
			$attachment[COLUMN_1150080] = $doc_param;                // リンク用パラメータ(取引年月(開始))

			$this->Controller->TrnInfoAttachment->create();
			$this->Controller->TrnInfoAttachment->save($attachment);
			
			// 年間報告書PDF作成＆保存
			$pdf_param = array();
			$pdf_param[ARRAY_INDEX_USER_ID]      = $user_id;
			$pdf_param[ARRAY_INDEX_DOC_CAT_ID]   = $doc_data[COLUMN_0400020];
			$pdf_param[ARRAY_INDEX_DOC_REV]      = $doc_data[COLUMN_0400050];
			$pdf_param[ARRAY_INDEX_REPORT_MONTH] = $doc_param;

			//$this->Pdf->savePdf00006($pdf_param);
                        //ここまで
		} catch (Exception $ex) {
			$err = "InformationHistory->issueAnnualTradeReport で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

}
