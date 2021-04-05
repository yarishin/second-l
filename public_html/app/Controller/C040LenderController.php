<?php
App::uses('AppController', 'Controller');



/*
 * 投資家ページ用コントローラ
 */
class C040LenderController extends AppController {

	public $uses       = array(
		 "MstCalendar"
		,"MstCompany"
		,"MstDepositAccount"
		,"MstDocument"
		,"MstFund"
		,"MstLoan"
		,"MstUser"
		,"Transaction"
		,"TrnAgreementHistory"
		,"TrnDividendHistory"
		,"TrnDividendPlan"
		,"TrnInformationHistory"
		,"TrnInfoAttachment"
		,"TrnInvestmentHistory"
		,"TrnLoanRepayment"
		,"TrnOperatingReportLoan"
		,"TrnRewardHistory"
		,"TrnTradeBalanceReport"
        ,"TrnSecondOperatingReport"
		,"TrnAgreementHistorie"	
);
	
	public $components = array(
		 "AgreementHistory"
		,"Calendar"
		,"CheckC040"
		,"Common"
		,"Company"
		,"Deposit"
		,"DividendHistory"
		,"DividendPlan"
		,"Document"
		,"DummyData"
		,"Fund"
		,"InfoAttachment"
		,"InformationHistory"
		,"InvestmentHistory"
		,"LoanRepayment"
		,"Mail"
		,"OperatingReport"
		,"Pdf"
		,"RequestHandler"
		,"SessionUserInfo"
		,"TradeBalanceReport"
		,"User"
	);

	public $helpers = array(
		 "Common"
	);
	
	/*
	 * マイページ
	 */
	function v010mypage() {
		
		$this->layout = LAYOUT_NAME_004;

                $session = $this->Session->read();
                $this->set("session",$session);
                $user_id    = $session[LOGIN_USER_INFO][user_id];
                $kanji_name = $session[LOGIN_USER_INFO][kanji_name];
				$club_id    = $session[LOGIN_USER_INFO][club_id];

                $this->set("user_id",$user_id);
                $this->set("kanji_name",$kanji_name);
				$this->set("club_id",$club_id);

		try {
			
			$event_id = $this->Common->getSessionEventId();
			//print $event_id;

			switch ($event_id) {
				case EVENT_ID_999999999: // ViewTest
                $user_id = "1234567";
                $kanji_name = "ViewTest";
                $this->set("user_id",$user_id);
                $this->set("kanji_name",$kanji_name);
					$data = array(
						 OBJECT_ID_040010010 => "1,000,000"
						,OBJECT_ID_040010020 => "300,000"
						,OBJECT_ID_040010030 => "99,999"
					);
					$this->set("data", $data);
					
					break;
					
//				case EVENT_ID_010010030: // マイページボタン押下
//
//					// マイページへ
//					$this->Common->setSessionEventId($event_id);
//					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040010);
//					
				case EVENT_ID_040010070: // 配当予定ボタン押下

					// 配当予定ページへ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040120);

                                case EVENT_ID_040010010: // 投資履歴ボタン押下
					
					// 投資履歴へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040050);
				
				case EVENT_ID_040010020: // 配当履歴ボタン押下
					
					// 配当履歴へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040060);
					
				case EVENT_ID_040010030: // 投資家情報ボタン押下
					
					// 投資家情報へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040070);
					
				case EVENT_ID_040010040: // お知らせボタン押下
				
					// お知らせへ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040090);
					
                                
//////////////////////////////////////////新規お知らせ件名をクリックしたときの動作追加///////////////////////////////////////////
                                case EVENT_ID_040090010: // お知らせ件名リンク押下
                                        //$this->Common->setSessionEventId($event_id);
                                        //$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040100);
                                        // 『$this->data[HIDDEN_ID_000000190]』が無い場合、詳細画面でブラウザの「戻る」ボタンを押されたと判断し、defaultの処理を行う。
                                        if (isset($this->data[HIDDEN_ID_000000190])) {

                                                $id = $this->data[HIDDEN_ID_000000160];
                                                $this->Common->setSessionInfoId($id);
                                                $confirmDate = $this->data[HIDDEN_ID_000000190];

                                                // 確認日時変更
                                                if (strcmp("", $confirmDate) == 0) {
                                                        $data[COLUMN_1100140] = date(DATETIME_FORMAT) ;
                                                        $this->InformationHistory->updateInformationHistory($id, $data);
                                                }

                                                // 未読通知内容へ
                                                $this->Common->setSessionEventId($event_id);
                                                $this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040100);
                                        }		

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		                case EVENT_ID_040010080: // 確認書類ボタン押下
				
					// お知らせへ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C070, REDIRECT_A070010);
				
                                case EVENT_ID_040010060: // 同意履歴ボタン押下
					
					// 同意履歴へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040110);
					
				case EVENT_ID_040010050: // 未読通知リンク押下
				case EVENT_ID_040010070: // 配当予定ボタン押下
				case EVENT_ID_010010010: // トップ：ログインボタン押下
				case EVENT_ID_010020010: // ログイン：ログインボタン押下
				default :
					// 状態コードによっては画面遷移を行う
					$this->Common->redirectMyPage();
					
					// 要確認のお知らせがあればお知らせ一覧へ
					$user_id = $this->SessionUserInfo->getUserId();
					if ($this->InformationHistory->checkForcedInformation($user_id)) {
						$this->Common->setSessionEventId(EVENT_ID_000000000);
						$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040090);
					}
					
					// 集計データ取得
					$data = array(
						 OBJECT_ID_040010010 => number_format($this->InvestmentHistory->getPreparationAmount($user_id))
						,OBJECT_ID_040010020 => number_format($this->InvestmentHistory->getOperatingAmount($user_id))
						,OBJECT_ID_040010021 => number_format($this->InvestmentHistory->getOperatingAmount_1($user_id))
						,OBJECT_ID_040010022 => number_format($this->InvestmentHistory->getOperatingAmount_2($user_id))
						,OBJECT_ID_040010030 => number_format($this->DividendHistory->getDividendAmountTotal($user_id))
						,OBJECT_ID_040010031 => number_format($this->DividendHistory->getDividendAmountTotal_1($user_id))
				);
					$this->set("data", $data);
                                        $data_test = $this->DividendHistory->getDividendAmountList($user_id);
                                        
                                        foreach($data_test as $keys => $values) { 
                                            foreach ($values as $key => $value) {
                                             $fund_id = $value["fund_id"];
                                             $report_year = date("Y", strtotime(date("Y-m-01", strtotime($value["dividend_datetime"])). "-1 month"));
                                             $report_month = (int)date("m", strtotime(date("Y-m-01", strtotime($value["dividend_datetime"])). "-1 month"));
                                             $report = $this->OperatingReport->getSecondOperatingReport1($fund_id, $report_year, $report_month);
                                                    foreach ($report as $key2 => $value2) {
                                                      foreach ($value2 as $key1 => $value1) {
                                                                         //オペレーティングレポートの送金予定日の日付を17時にセットして渡す
                                                                         $data_list1[] = array('remittance_date' => date("Y-m-d 17:00:00",strtotime($value1['remittance_date'])),
                                                                                               'report_status' => $value1['report_status']);
                                                      }
                                                    } 
                                            }
                                        }
                                         $this->set("data_list1", $data_list1);
                                         foreach ($data_test as $key => $value) {
                                             $data_test[$key]['TrnDividendHistory']['remittance_date'] = $data_list1[$key]['remittance_date'];
                                             $data_test[$key]['TrnDividendHistory']['report_status'] = $data_list1[$key]['report_status'];
                                         }
                                        $this->set("data_test", $data_test); //分配金のリストに送金予定日を持ってくる

                                        foreach($data_test as $key1 => $value1){
                                            foreach($value1 as $key => $value){
                                                if($value['report_status'] == 1 && date("Y/m/d H:i:s") > date(DATETIME_FORMAT, strtotime($value['remittance_date']))) {
                                            $b_total += $value['dividend_amount'];
                                                }
                                            }
                                        }
                                        
                                         $this->set("b_total", $b_total);
/////////////////////////////////////////////////////**ここから//本来の金額を求めるための計算////////////////////////////////////////////////////
	                               $dividend_amount_minus = str_replace(',','',$data[operationg_amount_1]) - str_replace(',','',$data[dividend_amount_total_1]);
				       $check_flag = 1;//関係ない
                                       $data_1 = array(
                                                         OBJECT_ID_040010040 => number_format($dividend_amount_minus)
				                        ,OBJECT_ID_040010050 => $check_flag
                                                      );
				       $this->set("data_1",$data_1);


                                      $data1_list1 = $this->InvestmentHistory->getInvestmentHistories($user_id, $date_from, $date_to);
                                      $this->set("data1_list1", $data1_list1);

                                      $a = str_replace(',','',$data[operationg_amount_1]);
                                      $b = str_replace(',','',$data[operationg_amount]);
                                      $c = str_replace(',','',$data[dividend_amount_total_1]);
				
                                      $data_list = $this->DividendHistory->getDividendHistories($user_id, $date_from, $date_to);
                                      $this->set("data_list", $data_list);
                                      $data_list_list = $this->TrnDividendHistory->getDividendHistories_777($user_id);
                                      $this->set("data_list_list", $data_list_list);
                                       //USERの出資状況リスト
                                      $data_list_list_list = $this->TrnInvestmentHistory->getInvestmentHistories_777($user_id);
                                      $sum1 = 0;
                               //delay_1で遅延フラグCheck
                               foreach ($data_list_list_list as $item) {
                                      $sum1 += $item[b]['delay_1'];
                                       }

                                      $this->set("sum1", $sum1);
                                      $sum = 0;
                               foreach ($data_list_list as $item) {
                                      $sum += $item[0]['sum'];
                                      }  

                                      $sum_2 = 0;
                               foreach ($data_list_list as $item) {
                                    if ($item[b]['delay_1'] == 0) {
                                        $sum_2 += $item[0]['sum'];
                                   }
                                  } 

                                     $sum_1 = 0;
                                      $this->set("data_list_list_list", $data_list_list_list);

                               foreach ($data_list_list_list as $item) {
                                    if ($item[b]['delay_1'] == 1 && $item[a]['investment_status_code'] == 1) {
                                     $sum_1 += $item[a]['investment_amount'];
                                   }
                                  }

                                    $x = str_replace(',','',$data[operationg_amount_2]);
                                    $xx = $a - $x - $sum_1 - $sum_2;
                                    $xxx = $sum_1 -$c + $x + $sum_2;
                                    $this->set("xx", number_format($xx));
                                    $this->set("xxx", number_format($xxx));
                                    $dividend_amount_ng = number_format($a - $b - ($c - $sum));
				    $data_2 = array(
                                      OBJECT_ID_040010060 => $dividend_amount_ng
                                                   );
                                    $this->set("data_2",$data_2);
                                    define("OBJECT_ID_040010040", "dividend_amount_minus"); // 遅延金額
                                    $data_3 = number_format($b - $sum);
                                    $this->set("data_3",$data_3);
                                    $this->set("b",$b);
                                    $this->set("sum",$sum);
////////////////////////////////////**ここまで、本来の金額表示のため////////////////////////////////////////////////////

////////////////////////////////////**ここから、MyPageに表示するためお知らせ////////////////////////////////////////////////////



                                        $data_list_o = $this->InformationHistory->getInformationList_my($user_id);
                                        $data_list_info = array();
					foreach ($data_list_o as $key => $values) {
						foreach ($values as $value) {
							if (is_null($value[COLUMN_1100140])) {    //confirmed_datetime
								
								// 未読メッセージ
								$data_list_info[][MODEL_NAME_110] = $value;    //TrnInformationHistory
							}
							elseif ((strcmp(FORCE_FLAG_TRUE, $value[COLUMN_1100080]) == 0) && is_null($value[COLUMN_1100150])) {  //agreement_flag   agreed_datetime
								
								// 同意が必要 and まだ同意していない
								$data_list_info[][MODEL_NAME_110] = $value;
							}
						}
					}
					$this->set("data_list_o", $data_list_o);
////////////////////////////////////**ここまで、MyPageに表示するためお知らせ////////////////////////////////////////////////////

////////////////////////////////////**ここから、MyPageに表示するため運用実績////////////////////////////////////////////////////

					$data_list = $this->InvestmentHistory->getInvestmentHistories($user_id, $date_from, $date_to);
					$data_list_list = $this->TrnInvestmentHistory->getInvestmentHistories_user($user_id, $date_from, $date_to);
					$this->set("data_list", $data_list);
					$this->set("data_list_list", $data_list_list);

////////////////////////////////////**ここまで、MyPageに表示するため運用実績////////////////////////////////////////////////////
					// 入金口座情報取得
					$deposit_account = $this->Deposit->getAccountInfo($user_id);
					$this->set("deposit_account", $deposit_account);
			}

			// リスト
			$list[CONFIG_0035] = Configure::read(CONFIG_0035);
			$list[CONFIG_0040] = Configure::read(CONFIG_0040);
			$list[CONFIG_0041] = Configure::read(CONFIG_0041);
			$list[CONFIG_0050] = Configure::read(CONFIG_0050);
			$list[CONFIG_0051] = Configure::read(CONFIG_0051);
			$list[CONFIG_0052] = Configure::read(CONFIG_0052);
			$list[CONFIG_0053] = Configure::read(CONFIG_0053);
			$this->set("list" , $list);
			
			
			//会社情報
			$company_data = $this->Company->getCompany();
			//print_r ($company_data);
			$this->set("company_data", $company_data);

                         
                        $result   = $this->InvestmentHistory->getInvestmentHistories($user_id, $date_from, $date_to);
                        $result = Hash::extract($result,'{n}.'.$this->TrnInvestmentHistory->name);
                        $this->set("result",$result);
                             foreach($result as $r) {
                            $fund_data[] = $this->MstFund->find('all',array(
                                     'conditions' => array('fund_id' => $r['fund_id']),
                                     ));
                                    }
                        //Model出資認証済みデータ取得（未入金含む）
                        $mypage = $this->TrnInvestmentHistory->getInvestmentHistories_page($user_id);
                        $this->set("mypage", $mypage);
                        //ここからファンドごとのステータスを取得する
                         if (isset($mypage) && is_array($mypage)) {
                               foreach ($mypage as $key => $values) {
                                $mypage_check[$h]['fund_id'] = $values[TrnInvestmentHistory][COLUMN_1200040];
                                $mypage_check[$h]['investment_amount'] = $values[TrnInvestmentHistory][COLUMN_1200070];
                                $mypage_check[$h]['deposit_date'] = $values[TrnInvestmentHistory]['deposit_date'];
                                $check = array('max_loan_amount_total' => $values[b][COLUMN_0500030], 
                                               'min_loan_amount_total' => $values[b][COLUMN_0500050],
                                               'delay_1'               => $values[b][COLUMN_1400170],
                                               'ended'                 => $values[b][COLUMN_1400171],
                                               'loan_amount_total' => $values[b][COLUMN_0500040], 
                                               'investment_amount' => $values[TrnInvestmentHistory][COLUMN_1200070],
                                               'principal_amount_2' => $values[c][COLUMN_1300140], 
                                               'inviting_start' => $values[b][COLUMN_0500080], 
                                               'inviting_end' => $values[b][COLUMN_0500090],
                                               'operating_start' => $values[b][COLUMN_0500100], 
                                               'operating_end' => $values[b][COLUMN_0500110] ) ;
                                $mypage_check[$h]['status_code'] = $this->Common->getFundStatusCode($check);
                                $h = $h+1;
                            }
                        } 
                        $this->set("check", $check);
                             $sum = 0;
                             foreach ($mypage_check as $item) {
                                    if (($item['status_code'] == 1 || $item['status_code'] == 2) && !is_null($item['deposit_date'])) {
                                     $sum += $item['investment_amount'];
                                   }
                                }
                                      $sum = number_format($sum);
                             $sum1 = 0;
                             foreach ($mypage_check as $item) {
                                    if ($item['status_code'] == 3 && !is_null($item['deposit_date'])) {
                                     $sum1 += $item['investment_amount'];
                                   }
                                }
                                      $sum1 = number_format($sum1);
                        //Mypage運用前、運用中金額表示 
                        $sum_list = array('before_operation' => $sum,'in_operation' => $sum1);
                        $this->set("sum_list", $sum_list);
                      
                        $this->set("mypage_check", $mypage_check);
                        $fund_data = $this->DividendPlan->getFundList($user_id);
                        $fund_list = Set::Combine($fund_data, '{n}.fund_id','{n}.fund_name');
                        $this->set("fund_list", $fund_list);
                        $this->set("mypage",$mypage);
                        $this->set("fund_data",$fund_data);
			
                        $list[CONFIG_0012] = Configure::read(CONFIG_0012);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());

	        	} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "C040Lender/v010mypageで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
			// セッション内の入力データ削除
			$this->Session->delete(SESSION_FORM_DATAS);
			
		}
		
	}

	/*
	 * 投資申込(入力)
	 */
	function v020investmentinput() {
		
		$this->layout = LAYOUT_NAME_001;

		try {
			
			$event_id = $this->Common->getSessionEventId();
			
			// セッション情報が無ければログイン画面へ
			$fund_id = "";
			if (isset($this->params["url"][GET_PARAM_INDEX_FUND_ID])) {
				
				// ファンドID取得
				$fund_id = $this->params["url"][GET_PARAM_INDEX_FUND_ID];
				
				// ログイン後に使用するファンドIDをセッションに格納
				$this->Common->setSessionFundId($fund_id);
			}
			elseif (is_null($event_id)) {
				
				// イベントIDが取得できない場合トップ画面へ
				$this->redirect(URL_SITE_TOP);
			}
			elseif (is_null($this->Common->getSessionFundId())) {
				
				// ファンドIDが無い場合、案件一覧画面へ
				$this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010030);
			}
			
			if ($this->SessionUserInfo->checkUserInfo()) {
				
				// 状態コードによっては画面遷移を行う
				$this->Common->redirectMyPage();
				
				// ログインしている場合、要確認お知らせの有無をチェックし、要確認のお知らせがあればお知らせ一覧へ
				$user_id = $this->SessionUserInfo->getUserId();
				if ($this->InformationHistory->checkForcedInformation($user_id)) {
					$this->Common->setSessionEventId(EVENT_ID_000000000);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040090);
				}
				
			}
			else {
				
				// ログインしていない場合、ログイン画面へ
				$this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010020);
			}
			
			switch ($event_id) {
				case EVENT_ID_999999999: // ViewTest
					
					$doc_data = $this->Document->getInvestmentDocuments1();
					
					$doc_count = 0;
					foreach ($doc_data as $key => $values) {
						foreach ($values as $value) {
							$doc_count++;
							$value[COLUMN_0400020] = $fund_id;
							$doc_id   = $value[COLUMN_0400030];
							$doc_name = $value[COLUMN_0400040];
							$doc_rev  = $value[COLUMN_0400050];
							$doc_path = $this->Document->getInvestmentDocPath($fund_id, $doc_id); 
							//$doc_path = $this->Document->getInvestmentDocPathFund($fund_id, $doc_id); 
							$data[OBJECT_ID_040020030.$doc_count] = $doc_path;
							$data[OBJECT_ID_040020040.$doc_count] = $doc_name;
						}
					}
					$this->set("doc_count", $doc_count);
					
					$data[OBJECT_ID_040020010] = "春のキャンペーン第二弾！";
					$data[OBJECT_ID_040020020] = "";
					//$data[OBJECT_ID_040020025] = 100000;
					$data[OBJECT_ID_040020025] = 10;
					
					$this->set("data", $data);
					
					break;
					
				case EVENT_ID_040020020: // 次へボタン押下
					
					$fund_id   = $this->Common->getSessionFundId();
					
					$fund_data = $this->Fund->getMstFund($fund_id);
					$fund_name      = "";
					$min_inv_amount = "";
                                        $inviting_start = "";//開始時間取出し
					
					// データ取出し
					foreach ($fund_data as $keys => $values) {
						foreach ($values as $key => $value) {
							$fund_name      = $value[COLUMN_0500020];
							$min_inv_amount = $value[COLUMN_0500060];
                                                        $inviting_start = $value[COLUMN_0500080]; //開始時間取出し
						}
					}
					
					// 入力チェック実行
					$err = $this->CheckC040->v020($this->data);
					
					// エラーが無ければ確認画面へ
					if (is_null($err)) {
						
						// 入力値をセッションに保存
						$input_data = $this->data;
						$input_data[OBJECT_ID_040020010] = $fund_name;
						$input_data[OBJECT_ID_040020025] = $min_inv_amount;
                                                $input_data[OBJECT_ID_040020099] = $inviting_start;//>開始時間取出し
						$this->Common->setSessionFormData($input_data);
						
						// 同意日時をセッションに保存
						$this->Common->setSessionAgreedDatetime(date(DATETIME_FORMAT));
						
						// 確認画面へ
						$this->Common->setSessionEventId($event_id);
						$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040030);
					}
					
					// エラーがあった場合、エラーメッセージを入力に表示する。
					$this->set("err" , $err);
					
					$doc_data = $this->Document->getInvestmentDocuments1();
					
					$doc_count = 0;
					foreach ($doc_data as $key => $values) {
						foreach ($values as $value) {
							$doc_count++;
							$value[COLUMN_0400020] = $fund_id;
							$doc_id   = $value[COLUMN_0400030];
							$doc_name = $value[COLUMN_0400040];
							$doc_rev  = $value[COLUMN_0400050];
							$doc_path = $this->Document->getInvestmentDocPath($fund_id, $doc_id); 
							//$doc_path = $this->Document->getInvestmentDocPathFund($fund_id, $doc_id); 
							$data[OBJECT_ID_040020030.$doc_count] = $doc_path;
							$data[OBJECT_ID_040020040.$doc_count] = $doc_name;
							$data[HIDDEN_ID_000000060.$doc_count] = $this->data[HIDDEN_ID_000000060.$doc_count];
						}
					}
					$this->set("doc_count", $doc_count);
					
					$data[OBJECT_ID_040020010] = $fund_name;
					$data[OBJECT_ID_040020020] = $this->data[OBJECT_ID_040020020];
					$data[OBJECT_ID_040020025] = $min_inv_amount;
                                        $data[OBJECT_ID_040020099] = $inviting_start;
					
					$this->set("data", $data);
					
					break;
					
				case EVENT_ID_040030010: // 投資申込(確認)：戻るボタン押下
				case EVENT_ID_040030020: // 投資申込(確認)：決定ボタン押下
					
					$fund_id   = $this->Common->getSessionFundId();
					$fund_data = $this->Fund->getMstFund($fund_id);
					
					$input_data = $this->Common->getSessionFormData();
					
					$doc_data = $this->Document->getInvestmentDocuments1();
					
					$doc_count = 0;
					foreach ($doc_data as $key => $values) {
						foreach ($values as $value) {
							$doc_count++;
							$value[COLUMN_0400020] = $fund_id;
							$doc_id   = $value[COLUMN_0400030];
							$doc_name = $value[COLUMN_0400040];
							$doc_rev  = $value[COLUMN_0400050];
							$doc_path = $this->Document->getInvestmentDocPath($fund_id, $doc_id); 
							//$doc_path = $this->Document->getInvestmentDocPathFund($fund_id, $doc_id); 
							$data[OBJECT_ID_040020030.$doc_count] = $doc_path;
							$data[OBJECT_ID_040020040.$doc_count] = $doc_name;
							$data[HIDDEN_ID_000000060.$doc_count] = $input_data[HIDDEN_ID_000000060.$doc_count];
						}
					}
					$this->set("doc_count", $doc_count);
					
					$data[OBJECT_ID_040020010] = $input_data[OBJECT_ID_040020010];
					$data[OBJECT_ID_040020020] = $input_data[OBJECT_ID_040020020];
					$data[OBJECT_ID_040020025] = $input_data[OBJECT_ID_040020025];
					
					$this->set("data", $data);
					
					$err = $this->Common->getSessionValidationErrors();
					if (!is_null($err)) {
						$this->set("err", $err);
					}
					
					break;
					
				default :
					
					$fund_data = $this->Fund->getMstFund($fund_id);
					
					$fund_name      = "";
					$min_inv_amount = "";
                                        $inviting_start = "";
					
					// データ取出し
					foreach ($fund_data as $keys => $values) {
						foreach ($values as $key => $value) {
							$fund_name      = $value[COLUMN_0500020];
							$min_inv_amount = $value[COLUMN_0500060];
                            $inviting_start = $value[COLUMN_0500080];
						}
					}
					
					$doc_data = $this->Document->getInvestmentDocuments1();
					
					$doc_count = 0;
					$url_list = array();
					foreach ($doc_data as $key => $values) {
						foreach ($values as $value) {
							$doc_count++;
							$value[COLUMN_0400020] = $fund_id;
							$doc_id   = $value[COLUMN_0400030];
							$doc_name = $value[COLUMN_0400040];
							$doc_rev  = $value[COLUMN_0400050];
							$doc_path = $this->Document->getInvestmentDocPath($fund_id, $doc_id); 
							//$doc_path = $this->Document->getInvestmentDocPathFund($fund_id, $doc_id); 
							$data[OBJECT_ID_040020030.$doc_count] = $doc_path;
							$data[OBJECT_ID_040020040.$doc_count] = $doc_name;
							$data[HIDDEN_ID_000000060.$doc_count] = "";
							$url_list[] = $doc_path;
						}
					}
					$this->set("doc_count", $doc_count);
					
					$data[OBJECT_ID_040020010] = $fund_name;
					$data[OBJECT_ID_040020020] = $min_inv_amount;
					$data[OBJECT_ID_040020025] = $min_inv_amount;
                                        $data[OBJECT_ID_040020099] = $inviting_start;
				//print_r ($data);
	
					$this->set("data", $data);
					
					// PDF出力時のGETパラメータ整合性チェック用
					$this->Common->setSessionDocUrlList($url_list);
			}
			
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "C040Lender/v020investmentinputで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
			// セッション内の入力データ削除
			$this->Session->delete(SESSION_FORM_DATAS);
			
		}
		
	}

	/*
	 * 投資申込(確認)
	 */
	function v030investmentconfirm() {
		
		$this->layout = LAYOUT_NAME_001;

		try {
			
			$event_id = $this->Common->getSessionEventId();
			
			// ログインしていない場合、ログイン画面へ
			if (!$this->SessionUserInfo->checkUserInfo()) {
				$this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010020);
			}
			
			// 入力データが無い場合、案件一覧へ
			if (is_null($this->Common->getSessionFormData())) {
				$this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010030);
			}
			
			switch ($event_id) {
				case EVENT_ID_040020020: // 投資申込(入力)：同意する(次へ)ボタン
					
					$fund_id    = $this->Common->getSessionFundId();
					$input_data = $this->Common->getSessionFormData();
					
					// 入金期限を取得
					$exp_date = $this->Calendar->getNextBusinessDate(EXPIRATION_TERM_INVESTMENT);
					
					// セッション情報上書き
					$input_data[HIDDEN_ID_000000180] = $exp_date;
					$this->Common->setSessionFormData($input_data);
					
					$data = array(
						 OBJECT_ID_040020010 => $input_data[OBJECT_ID_040020010]
						,OBJECT_ID_040020020 => "\\".number_format($input_data[OBJECT_ID_040020020])
						,OBJECT_ID_040020090 => $exp_date
						,HIDDEN_ID_000000180 => $exp_date
					);
					$this->set("data", $data);
					
					break;
				
				case EVENT_ID_040030010: // 戻るボタン
					
					// 投資申込(入力)へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040020);
					
					break;
				
				case EVENT_ID_040030020: // 決定ボタン
					
					$input_data = $this->Common->getSessionFormData();
					
					$user_info = $this->SessionUserInfo->getUserInfo();
					$user_id   = $user_info[LOGIN_USER_ID];
					$fund_id   = $this->Common->getSessionFundId();
					
					// 念のため再度入力チェック
					$err = $this->CheckC040->v020($input_data);
					
					// エラーが発生した場合、入力画面へ
					if (!is_null($err)) {
						
						// 投資申込(入力)へ
						$this->Common->setSessionEventId($event_id);
						$this->Common->setSessionValidationErrors($err);
						$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040020);
						
					}
					
					// トランザクションスタート
					$this->Common->trnBegin();
		
					// 投資申込登録
					$investment = $this->InvestmentHistory->saveInvestmentHistory($input_data);
					
					// 同意履歴登録
					$agreed_datetime = $this->Common->getSessionAgreedDatetime();
					
					// 同意書面データ取得
					$doc_data = $this->Document->getInvestmentDocuments1();
					
					$agreement = null;
					foreach ($doc_data as $key => $values) {
						foreach ($values as $value) {
							
							// 同意履歴登録
							$agreement[COLUMN_0900020] = $user_id;
							$agreement[COLUMN_0900030] = $fund_id;
							$agreement[COLUMN_0900040] = $input_data[OBJECT_ID_040020010];
							$agreement[COLUMN_0900050] = $value[COLUMN_0400030];   // 書面ID
							$agreement[COLUMN_0900060] = $value[COLUMN_0400040];   // 書面名
							$agreement[COLUMN_0900070] = date(DATETIME_FORMAT_4, strtotime($agreed_datetime)); // 書面パラメータ
							$agreement[COLUMN_0900080] = $value[COLUMN_0400050];   // リビジョン
							$agreement[COLUMN_0900090] = $agreed_datetime;         // 同意日時
							$agreement[COLUMN_0900100] = AGREEMENT_DETAIL_CODE_03; // 同意内容
							
							// 履歴登録実行
							$this->AgreementHistory->saveAgreementHistory($agreement);
						}
					}
					
					// コミット
					$this->Common->trnCommit();
					
					// 契約締結前書面PDF保存
					$this->Pdf->savePdfInvBf($user_id, $fund_id, $agreed_datetime);

					// メール送信
					$this->Mail->sendMailInvestmentApplication($user_info, $investment);
					
					// 完了画面へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040040);//ここにいってない調査20191226
					
					break;
					
				case EVENT_ID_999999999: // ViewTest
					
					$data = array(
						 OBJECT_ID_040020010 => "春のキャンペーン第二弾！"
						,OBJECT_ID_040020020 => "\\100,000"
						,OBJECT_ID_040020090 => "2015/08/10"
					);
					$this->set("data", $data);
				
					break;
					
				default :
					
					// ログイン中の場合、マイページへ
					if ($this->SessionUserInfo->checkUserInfo()) {
						$this->Common->setSessionEventId(EVENT_ID_000000000);
						$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040010);
					}
			}
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			
			$this->Common->trnRollback(); // ロールバック
			
			// 例外処理
			$err_str = "C040Lender/v030investmentconfirmで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
			// セッション内の入力データ削除
			$this->Session->delete(SESSION_FORM_DATAS);
			
		}
		
	}

	/*
	 * 投資申込(完了)
	 */
	function v040investmentcomplete() {
		
		$this->layout = LAYOUT_NAME_001;

		try {
			
			$event_id = $this->Common->getSessionEventId();
			
			// 未ログイン状態の場合、ログインへ
			if (strcmp(EVENT_ID_999999999, $event_id) !=0 && !$this->SessionUserInfo->checkUserInfo()) {
				$this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010020);
			}
			
			switch ($event_id) {
				case EVENT_ID_040030020: // 決定ボタン
				case EVENT_ID_999999999: // ViewTest
					
					// 入力データ削除
					$this->Common->deleteSessionFormData();
					$this->Common->deleteSessionFundInfo();
					$this->Common->deleteSessionValidationErrors();
					$this->Common->setSessionEventId(EVENT_ID_000000000);
					
					break;
					
				default :
					
					// ログイン中の場合、マイページへ
					if ($this->SessionUserInfo->checkUserInfo()) {
						$this->Common->setSessionEventId(EVENT_ID_000000000);
						$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040010);
					}
			}
			
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "C040Lender/v040investmentcompleteで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
			// セッション内の入力データ削除
			$this->Session->delete(SESSION_FORM_DATAS);
			
		}
		
	}

	/*
	 * 投資履歴
	 */
	function v050investmenthistory() {
		
		$this->layout = LAYOUT_NAME_004;

		try {
			
			$event_id = $this->Common->getSessionEventId();
			
			// 未ログイン状態の場合、ログインへ
			if (strcmp(EVENT_ID_999999999, $event_id) !=0 && !$this->SessionUserInfo->checkUserInfo()) {
				$this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010020);
			}
			
			switch ($event_id) {
				case EVENT_ID_010010030: // マイページボタン押下

					// マイページへ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040010);

				case EVENT_ID_040010070: // 配当予定ボタン押下

					// 配当予定ページへ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040120);
					
//				case EVENT_ID_040010010: // 投資履歴ボタン押下
//					
//					$data = array(
//						 SEARCH_ID_040050010 => ""
//						,SEARCH_ID_040050020 => ""
//					);
//					
//					$this->set("data", $data);
//					
//					break;
//				
				case EVENT_ID_040010020: // 配当履歴ボタン押下
					
					// 配当履歴へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040060);
					
				case EVENT_ID_040010030: // 投資家情報ボタン押下
					
					// 投資家情報へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040070);
					
				case EVENT_ID_040010040: // お知らせボタン押下
				
					// お知らせへ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040090);
					
				case EVENT_ID_040010060: // 同意履歴ボタン押下
					
					// 同意履歴へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040110);
					
				case EVENT_ID_040050010: // 絞込みボタン押下
					// 入力チェック実行
					$err = $this->CheckC040->v050($this->data);
					
					$date_from = $this->data[SEARCH_ID_040050010];
					$date_to   = $this->data[SEARCH_ID_040050020];
					if(is_null($err)) {
						$user_id = $this->SessionUserInfo->getUserId();
						if (strcmp($date_from, "") != 0) {
							$date_from = date(DATETIME_FORMAT_1, strtotime($date_from));
						}
						if (strcmp($date_to, "") != 0) {
							$date_to = date(DATETIME_FORMAT_2, strtotime($date_to));
						}
						$data_list = $this->InvestmentHistory->getInvestmentHistories($user_id, $date_from, $date_to);
						$data_list_list = $this->TrnInvestmentHistory->getInvestmentHistories_user($user_id, $date_from, $date_to);
						$this->set("data_list", $data_list);
						$this->set("data_list_list", $data_list_list);
					}
					$this->set("data", $this->data);
					
					// エラーがあった場合、エラーメッセージを入力に表示する。
					$this->set("err" , $err);
					
					break;
					
				case EVENT_ID_999999999: // ViewTest
					
					break;
					
				default :
					

                                        $date_from = $this->data[SEARCH_ID_040050010];
                                        $date_to   = $this->data[SEARCH_ID_040050020];
                                        if(is_null($err)) {
                                                $user_id = $this->SessionUserInfo->getUserId();
                                                if (strcmp($date_from, "") != 0) {
                                                        $date_from = date(DATETIME_FORMAT_1, strtotime($date_from));
                                                }
                                                if (strcmp($date_to, "") != 0) {
                                                        $date_to = date(DATETIME_FORMAT_2, strtotime($date_to));
                                                }
                                                $data_list = $this->InvestmentHistory->getInvestmentHistories($user_id, $date_from, $date_to);
                                                $data_list_list = $this->TrnInvestmentHistory->getInvestmentHistories_user($user_id, $date_from, $date_to);
                                                $this->set("data_list", $data_list);
                                                $this->set("data_list_list", $data_list_list);
                                        }
                                        $this->set("data", $this->data);

                                        if(!empty($data_list)) {
                                             }else{
                                            $err1 = "現在、出資履歴はありません。";
                                            $this->set("err1", $err1);
                                             }


					// 状態コードによっては画面遷移を行う
					$this->Common->redirectMyPage();
					
					// 要確認のお知らせがあればお知らせ一覧へ
					$user_id = $this->SessionUserInfo->getUserId();
					if ($this->InformationHistory->checkForcedInformation($user_id)) {
						$this->Common->setSessionEventId(EVENT_ID_000000000);
						$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040090);
					}
					
					$data = array(
						 SEARCH_ID_040050010 => ""
						,SEARCH_ID_040050020 => ""
					);
					$this->set("data", $data);
			}
			
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "C040Lender/v050investmenthistory で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
			// セッション内の入力データ削除
			$this->Session->delete(SESSION_FORM_DATAS);
			
		}
		
	}

	/*
	 * 配当履歴
	 */
	function v060dividendhistory() {
		
		$this->layout = LAYOUT_NAME_004;

		try {
			
			$event_id = $this->Common->getSessionEventId();
			
			// 未ログイン状態の場合、ログインへ
			if (strcmp(EVENT_ID_999999999, $event_id) !=0 && !$this->SessionUserInfo->checkUserInfo()) {
				$this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010020);
			}
			
			switch ($event_id) {
				case EVENT_ID_010010030: // マイページボタン押下

					// マイページへ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040010);

				case EVENT_ID_040010070: // 配当予定ボタン押下

					// 配当予定ページへ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040120);
					
				case EVENT_ID_040010010: // 投資履歴ボタン押下
					
					// 投資履歴へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040050);
					
					break;
				
//				case EVENT_ID_040010020: // 配当履歴ボタン押下
//					
//					// 配当履歴へ
//					$this->Common->setSessionEventId($event_id);
//					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040060);
//					
				case EVENT_ID_040010030: // 投資家情報ボタン押下
					
					// 投資家情報へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040070);
					
				case EVENT_ID_040010040: // お知らせボタン押下
				
					// お知らせへ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040090);
					
				case EVENT_ID_040010060: // 同意履歴ボタン押下
					
					// 同意履歴へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040110);
					
				case EVENT_ID_040060010: // 絞込みボタン押下
					// 入力チェック実行
					$err = $this->CheckC040->v060($this->data);
					
					$date_from = $this->data[SEARCH_ID_040060010];
					$date_to   = $this->data[SEARCH_ID_040060020];
					if(is_null($err)) {
						$user_id = $this->SessionUserInfo->getUserId();
						if (strcmp($date_from, "") != 0) {
							$date_from = date(DATETIME_FORMAT_1, strtotime($date_from));
						}
						if (strcmp($date_to, "") != 0) {
							$date_to = date(DATETIME_FORMAT_2, strtotime($date_to));
						}
						$data_list = $this->DividendHistory->getDividendHistories($user_id, $date_from, $date_to);
						$this->set("data_list", $data_list);
					}
//print_r ($data_list);
					$this->set("data", $this->data);
					
					// エラーがあった場合、エラーメッセージを入力に表示する。
					$this->set("err" , $err);
					
					break;
				
				case EVENT_ID_999999999: // ViewTest
					
					break;
					
				default :
					


                                        $date_from = $this->data[SEARCH_ID_040060010];
                                        $date_to   = $this->data[SEARCH_ID_040060020];
                                        if(is_null($err)) {
                                                $user_id = $this->SessionUserInfo->getUserId();
                                                if (strcmp($date_from, "") != 0) {
                                                        $date_from = date(DATETIME_FORMAT_1, strtotime($date_from));
                                                }
                                                if (strcmp($date_to, "") != 0) {
                                                        $date_to = date(DATETIME_FORMAT_2, strtotime($date_to));
                                                }
                                                  $data_list = $this->DividendHistory->getDividendHistories($user_id, $date_from, $date_to);
                                                  
                                                  foreach ($data_list as $key2 => $value2) {
                                                      foreach ($value2 as $key1 => $value1) {
                                                        $fund_id = $value1["fund_id"];
                                                        $report_year = date("Y", strtotime(date("Y-m-01", strtotime($value1["dividend_datetime"])). "-1 month"));
                                                        $report_month = (int)date("m", strtotime(date("Y-m-01", strtotime($value1["dividend_datetime"])). "-1 month"));
                                                        $report = $this->OperatingReport->getSecondOperatingReport1($fund_id, $report_year, $report_month);
                                                              foreach ($report as $key2 => $value2){
                                                                  foreach ($value2 as $key1 => $value1) {
                                                                         //オペレーティングレポートの送金予定日の日付を17時にセットして渡す
                                                                         $data_list1[] = array('remittance_date' => date("Y-m-d 17:00:00",strtotime($value1['remittance_date'])),
                                                                                               'report_status' => $value1['report_status']);
                                                                    }
                                                                } 
                                                        }
                                                    }
                                               $this->set("data_list1", $data_list1);
                                               
                                        }
                                        //data_listにdata_list1をくっつける
                                        foreach ($data_list as $key => $value) {
                                           $data_list[$key]['TrnDividendHistory']['remittance_date'] = $data_list1[$key]['remittance_date'];
                                           $data_list[$key]['TrnDividendHistory']['report_status'] = $data_list1[$key]['report_status'];
                                        }
                                         $this->set("data_list", $data_list);
                                          //print "<pre>";
                                          //print_r ($data_list);
                                          //print "</pre>";
                                        
                                        $this->set("data", $this->data);
                                        if(!empty($data_list)) {
                                             }else{
                                            $err1 = "現在、収益明細はありません。";
                                            $this->set("err1", $err1);
                                             }


					// 状態コードによっては画面遷移を行う
					$this->Common->redirectMyPage();
					
					// 要確認のお知らせがあればお知らせ一覧へ
					$user_id = $this->SessionUserInfo->getUserId();
					if ($this->InformationHistory->checkForcedInformation($user_id)) {
						$this->Common->setSessionEventId(EVENT_ID_000000000);
						$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040090);
					}
					
					$data = array(
						 SEARCH_ID_040060010 => ""
						,SEARCH_ID_040060020 => ""
					);
					$this->set("data", $data);
					
			}
			
			$list[CONFIG_0042] = Configure::read(CONFIG_0042);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "C040Lender/v060dividendhistory で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
			// セッション内の入力データ削除
			$this->Session->delete(SESSION_FORM_DATAS);
			
		}
	}
	
	/*
	 * 投資家情報
	 */
	function v070lenderinfo() {
		
		$this->layout = LAYOUT_NAME_004;

		try {
			
			$event_id = $this->Common->getSessionEventId();
			
			// 未ログイン状態の場合、ログインへ
			if (strcmp(EVENT_ID_999999999, $event_id) !=0 && !$this->SessionUserInfo->checkUserInfo()) {
				$this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010020);
			}
			
			switch ($event_id) {
				case EVENT_ID_010010030: // マイページボタン押下

					// マイページへ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040010);

				case EVENT_ID_040010070: // 配当予定ボタン押下

					// 配当予定ページへ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040120);
					
				case EVENT_ID_040010010: // 投資履歴ボタン押下
					
					// 投資履歴へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040050);
					
					break;
				
				case EVENT_ID_040010020: // 配当履歴ボタン押下
					
					// 配当履歴へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040060);
					
//				case EVENT_ID_040010030: // 投資家情報ボタン押下
//					
//					// 投資家情報へ
//					$this->Common->setSessionEventId($event_id);
//					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040070);
//					
				case EVENT_ID_040010040: // お知らせボタン押下
				
					// お知らせへ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040090);
					
				case EVENT_ID_040010060: // 同意履歴ボタン押下
					
					// 同意履歴へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040110);
					
				case EVENT_ID_040070010: // メアド／パスワードボタン押下
				
					// メールアドレスの変更へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040080);
					
				case EVENT_ID_999999999: // ViewTest
					
					break;
					
				default :
					
					// 状態コードによっては画面遷移を行う
					$this->Common->redirectMyPage();
					
					// 要確認のお知らせがあればお知らせ一覧へ
					$user_id = $this->SessionUserInfo->getUserId();
					if ($this->InformationHistory->checkForcedInformation($user_id)) {
						$this->Common->setSessionEventId(EVENT_ID_000000000);
						$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040090);
					}
					
					$data = $this->User->getUser040070($user_id);
					
					$this->set("data", $data);
					
					break;
			}
			
			$list[CONFIG_0002] = Configure::read(CONFIG_0002);
			$list[CONFIG_0003] = Configure::read(CONFIG_0003);
			$list[CONFIG_0004] = Configure::read(CONFIG_0004);
			$list[CONFIG_0005] = Configure::read(CONFIG_0005);
			$list[CONFIG_0006] = Configure::read(CONFIG_0006);
			$list[CONFIG_0007] = Configure::read(CONFIG_0007);
			$list[CONFIG_0008] = Configure::read(CONFIG_0008);
			$list[CONFIG_0009] = Configure::read(CONFIG_0009);
			$list[CONFIG_0010] = Configure::read(CONFIG_0010);
			$list[CONFIG_0011] = Configure::read(CONFIG_0011);
			$list[CONFIG_0012] = Configure::read(CONFIG_0012);
			$list[CONFIG_0013] = Configure::read(CONFIG_0013);
			$list[CONFIG_0014] = Configure::read(CONFIG_0014);
			$list[CONFIG_0015] = Configure::read(CONFIG_0015);
			$list[CONFIG_0016] = Configure::read(CONFIG_0016);
			$list[CONFIG_0017] = Configure::read(CONFIG_0017);
			$list[CONFIG_0018] = Configure::read(CONFIG_0018);
			$list[CONFIG_0019] = Configure::read(CONFIG_0019);
			$list[CONFIG_0020] = Configure::read(CONFIG_0020);
			$list[CONFIG_0021] = Configure::read(CONFIG_0021);
			$list[CONFIG_0023] = Configure::read(CONFIG_0023);
			$list[CONFIG_0030] = Configure::read(CONFIG_0030);
			$list[CONFIG_0031] = Configure::read(CONFIG_0031);
			$list[CONFIG_0032] = Configure::read(CONFIG_0032);
			$list[CONFIG_0033] = Configure::read(CONFIG_0033);
			$list[CONFIG_0046] = Configure::read(CONFIG_0046);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "C040Lender/v070lenderinfo で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
			// セッション内の入力データ削除
			$this->Session->delete(SESSION_FORM_DATAS);
			
		}
		
	}
	
	/*
	 * メールアドレス／パスワード変更
	 */
	function v080mailpasscorrect() {
		
		$this->layout = LAYOUT_NAME_004;

		try {
			
			$event_id = $this->Common->getSessionEventId();
			
			// 未ログイン状態の場合、ログインへ
			if (strcmp(EVENT_ID_999999999, $event_id) !=0 && !$this->SessionUserInfo->checkUserInfo()) {
				$this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010020);
			}
			
			$user_id = $this->SessionUserInfo->getUserId();
			
			switch ($event_id) {
				case EVENT_ID_010010030: // マイページボタン押下

					// マイページへ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040010);

				case EVENT_ID_040010070: // 配当予定ボタン押下

					// 配当予定ページへ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040120);
					
				case EVENT_ID_040010060: // 同意履歴ボタン押下
					
					// 同意履歴へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040110);
					
				case EVENT_ID_040010010: // 投資履歴ボタン押下
					
					// 投資履歴へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040050);
					
				case EVENT_ID_040010020: // 配当履歴ボタン押下
					
					// 配当履歴へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040060);
					
				case EVENT_ID_040010040: // お知らせボタン押下
				
					// お知らせへ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040090);
					
				case EVENT_ID_040010030: // 投資家情報ボタン押下
					
					// 投資家情報へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040070);
					
				case EVENT_ID_040070010: // 投資家情報：メアド／パスワード/メールマガジン ボタン押下
					
					$data = array(
						 OBJECT_ID_040080010 => ""
						,OBJECT_ID_040080020 => ""
						,OBJECT_ID_040080030 => ""
						,OBJECT_ID_040080040 => ""
						,OBJECT_ID_040080050 => ""
						,OBJECT_ID_040080060 => ""
						,OBJECT_ID_040080070 => $this->CheckC040->v080($user_id, COLUMN_0800536)
						,OBJECT_ID_040080080 => ""
					);
					$this->set("data", $data);
					
					break;
				
				case EVENT_ID_040080010: // メールアドレス変更ボタン押下
					
					$data_info = $this->data;
					
					// 入力チェック実行
					$err = $this->CheckC040->v08011($user_id, $data_info);
					
					if (is_null($err)) {
						$this->CheckC040->v08012($user_id, $data_info);
						
						// セッション更新
						$this->SessionUserInfo->setUserInfo($user_id);
						
						// お客様へ送信
						$user_info = $this->User->getUser($this->SessionUserInfo->getUserId());
						$this->Mail->sendMailUserDataCorrect($event_id, $user_info);
						
						// 投資家情報へ
						$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040070);
					}
					$data = array(
							 OBJECT_ID_040080010 => $data_info[OBJECT_ID_040080010]
							,OBJECT_ID_040080020 => $data_info[OBJECT_ID_040080020]
							,OBJECT_ID_040080030 => $data_info[OBJECT_ID_040080030]
							,OBJECT_ID_040080040 => ""
							,OBJECT_ID_040080050 => ""
							,OBJECT_ID_040080060 => ""
							,OBJECT_ID_040080070 => $this->CheckC040->v080($user_id, COLUMN_0800536)
							,OBJECT_ID_040080080 => ""
						);
					$this->set("data", $data);
					
					$this->set("validation_errors", $err);
					
					break;
					
				case EVENT_ID_040080020: // パスワード変更ボタン押下
					
					// 入力チェック実行
					$err = $this->CheckC040->v08021($user_id, $this->data);
					
					if (is_null($err)) {
						$this->CheckC040->v08022($user_id, $this->data);
						
						// お客様へ送信
						$user_info = $this->User->getUser($this->SessionUserInfo->getUserId());
						$this->Mail->sendMailUserDataCorrect($event_id, $user_info);
						
						// 投資家情報へ
						$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040070);
					}
					$data = array(
							 OBJECT_ID_040080010 => ""
							,OBJECT_ID_040080020 => ""
							,OBJECT_ID_040080030 => ""
							,OBJECT_ID_040080040 => $this->data[OBJECT_ID_040080040]
							,OBJECT_ID_040080050 => $this->data[OBJECT_ID_040080050]
							,OBJECT_ID_040080060 => $this->data[OBJECT_ID_040080060]
							,OBJECT_ID_040080070 => $this->CheckC040->v080($user_id, COLUMN_0800536)
							,OBJECT_ID_040080080 => ""
						);
					$this->set("data", $data);
					
					$this->set("password_change_errors", $err);
					
					break;
					
				case EVENT_ID_040080030: // メールマガジン登録 変更ボタン押下

					// 入力チェック実行
					$err = $this->CheckC040->v08031($user_id, $this->data);

					if (is_null($err)) {
						$this->CheckC040->v08032($user_id, $this->data);
						
						// お客様へ送信
						$user_info = $this->User->getUser($this->SessionUserInfo->getUserId());
						$this->Mail->sendMailUserDataCorrect($event_id, $user_info);
						
						// 投資家情報へ
						$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040070);
					}
					$data = array(
							 OBJECT_ID_040080010 => ""
							,OBJECT_ID_040080020 => ""
							,OBJECT_ID_040080030 => ""
							,OBJECT_ID_040080040 => ""
							,OBJECT_ID_040080050 => ""
							,OBJECT_ID_040080060 => ""
							,OBJECT_ID_040080070 => $this->data[OBJECT_ID_040080070]
							,OBJECT_ID_040080080 => $this->data[OBJECT_ID_040080080]
						);
					$this->set("data", $data);

					$this->set("mail_magizine_errors", $err);

					break;
					
				case EVENT_ID_999999999: // ViewTest
					
					break;
					
				default :
					
					$this->Common->redirectMyPage(); // ログイン中ならマイページへ
					
					// 要確認のお知らせがあればお知らせ一覧へ
					$user_id = $this->SessionUserInfo->getUserId();
					if ($this->InformationHistory->checkForcedInformation($user_id)) {
						$this->Common->setSessionEventId(EVENT_ID_000000000);
						$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040090);
					}
					
					$data = array(
						 OBJECT_ID_040080010 => ""
						,OBJECT_ID_040080020 => ""
						,OBJECT_ID_040080030 => ""
						,OBJECT_ID_040080040 => ""
						,OBJECT_ID_040080050 => ""
						,OBJECT_ID_040080060 => ""
						,OBJECT_ID_040080070 => $this->CheckC040->v080($user_id, COLUMN_0800536)
						,OBJECT_ID_040080080 => ""
					);
					$this->set("data", $data);
					
			}
			
			$this->set("action", $this->Common->getCurrentAction());
			
			// プルダウンリスト
			$list[CONFIG_0046] = Configure::read(CONFIG_0046);
			$this->set("list" , $list);

		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "C040Lender/v080mailpasscorrect で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
			// セッション内の入力データ削除
			$this->Session->delete(SESSION_FORM_DATAS);
			
		}
		
	}
	
	/*
	 * お知らせ一覧
	 */
	function v090informationlist() {
		
		$this->layout = LAYOUT_NAME_004;
                //2020/01/15
                $session = $this->Session->read();
                $this->set("session",$session);
                $user_id = $session[LOGIN_USER_INFO][user_id];
                $kanji_name = $session[LOGIN_USER_INFO][kanji_name];
                $this->set("user_id",$user_id);
                $this->set("kanji_name",$kanji_name);
                //ここまで
		try {
			
			$event_id = $this->Common->getSessionEventId();
			
			// 未ログイン状態の場合、ログインへ
			if (strcmp(EVENT_ID_999999999, $event_id) !=0 && !$this->SessionUserInfo->checkUserInfo()) {
				$this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010020);
			}
			
			switch ($event_id) {
				case EVENT_ID_010010030: // マイページボタン押下

					// マイページへ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040010);

				case EVENT_ID_040010070: // 配当予定ボタン押下

					// 配当予定ページへ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040120);
					
				case EVENT_ID_040010010: // 投資履歴ボタン押下
					
					// 投資履歴へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040050);
					
				case EVENT_ID_040010020: // 配当履歴ボタン押下
					
					// 配当履歴へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040060);
					
				case EVENT_ID_040010030: // 投資家情報ボタン押下
					
					// 投資家情報へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040070);
					
//				case EVENT_ID_040010040: // お知らせボタン押下
//				
//					// お知らせへ
//					$this->Common->setSessionEventId($event_id);
//					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040090);
//					
				case EVENT_ID_040010060: // 同意履歴ボタン押下
					
					// 同意履歴へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040110);
					
				case EVENT_ID_040090020: // 絞込みボタン押下
					
					$user_id   = $this->SessionUserInfo->getUserId();
					$err = $this->CheckC040->v090($this->data);
					
					$data_list = array();
					if (is_null($err)) {
						$data_list = $this->InformationHistory->getInformationList($user_id, $this->data);
					}
					$this->set("data_list", $data_list);
					$this->set("err", $err);
					$this->set("data", $this->data);
					
					break;
					
				case EVENT_ID_999999999: // ViewTest
					
					break;
					
				case EVENT_ID_040090010: // お知らせ件名リンク押下
					
					// 『$this->data[HIDDEN_ID_000000190]』が無い場合、詳細画面でブラウザの「戻る」ボタンを押されたと判断し、defaultの処理を行う。
					if (isset($this->data[HIDDEN_ID_000000190])) {
						
						$id = $this->data[HIDDEN_ID_000000160];
						$this->Common->setSessionInfoId($id);
						$confirmDate = $this->data[HIDDEN_ID_000000190];

						// 確認日時変更
						if (strcmp("", $confirmDate) == 0) {
							$data[COLUMN_1100140] = date(DATETIME_FORMAT) ;
							$this->InformationHistory->updateInformationHistory($id, $data);
						}

						// 未読通知内容へ
						$this->Common->setSessionEventId($event_id);
						$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040100);
					}
					
				case EVENT_ID_040100020: // お知らせ内容画面: 同意するボタン押下
				case EVENT_ID_040010040: // メニュー：お知らせボタン押下
				default :
					
					// 状態によっては画面遷移
					$this->Common->redirectMyPage();
					
					$err = null;
					$user_id   = $this->SessionUserInfo->getUserId();
					
					// 用確認、又は要同意のお知らせが残っている場合、メッセージを表示する。
					if ($this->InformationHistory->checkForcedInformation($user_id)) {
						//$err[] = "【出資確定】【重要】の表示のあるものはお客様の内容確認または同意が必要なご案内です。";
						$err[] = "≪出資確定≫≪重要≫の表示のあるものはお客様の内容確認または同意が必要なご案内です。確認または同意後、マイページがご覧いただけます。※マイページ以外は通常通りご覧いただけます。";
						//$err[] = "【重要】お客様による確認、又は同意が必要なお知らせが御座います。";
						//$err[] = "尚、確認、又は同意を頂くまでは、お取引の一部を制限させて頂いておりますので御了承下さい。";
						//$err[] = "確認または同意後、マイページがご覧いただけます。※マイページ以外は通常通りご覧いただけます。";
					}
					$this->set("err", $err);
					
					$user_id   = $this->SessionUserInfo->getUserId();
					
					// 当該投資家のお知らせを全件取得
					$data_list = $this->InformationHistory->getInformationList($user_id);
					if(!empty($data_list)) {
                                             }else{
                                            $err1 = "現在、お知らせはありません。";
                                            $this->set("err1", $err1);
                                             }


                                         // 初期表示時に表示させるデータだけを抜き出す。
					$data_list_info = array();
					foreach ($data_list as $key => $values) {
						foreach ($values as $value) {
							if (is_null($value[COLUMN_1100140])) {
								
								// 未読メッセージ
								$data_list_info[][MODEL_NAME_110] = $value;
							}
							//elseif ((strcmp(FORCE_FLAG_TRUE, $value[COLUMN_1100080]) == 0) && is_null($value[COLUMN_1100150])) {
							elseif (strcmp(FORCE_FLAG_TRUE, $value[COLUMN_1100080]) >= 0)  {
								
								// 同意が必要 and まだ同意していない
								$data_list_info[][MODEL_NAME_110] = $value;
							}
						}
					}
					$this->set("data_list", $data_list_info);
			
					$data = array(
						 SEARCH_ID_040090010 => ""
						,SEARCH_ID_040090020 => ""
					);
					$this->set("data", $data);
					
			}
			
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "C040Lender/v090informationlist で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
			// セッション内の入力データ削除
			$this->Session->delete(SESSION_FORM_DATAS);
			
		}
		
	}

  //test_page
  function v300() {

                         $this->layout = LAYOUT_NAME_005;
                        // セッション内の入力データ削除
                        //$this->Session->delete(SESSION_FORM_DATAS);
           //AJAXの処理練習
           if ($this->request->is('ajax')) {
            // 送られてきたリクエストデータを取得する
            throw new BadRequestException();
    }
    /*  ここでDBアクセスなど何かの処理をする */
    $result = $this->Fund->getCumulativeLoanAmount();
    // 値が入っているかを確認。
    // 値によっては(bool)でキャストしてしまうのも可
    $status = !empty($result);
    if(!$status) {
      $error = array(
        'message' => 'データがありません',
        'code' => 404
      );
    }
    // JSON形式で返却。errorが定義されていない場合はstatusとresultの配列になる。
    return json_encode(compact('status', 'result', 'error'));
  
           
           
           
           
           
        // print "<pre>";                   
        // $aaa = date("Y-m-t",strtotime("2020-04-10 10:00:00". "-1 month"));
        // print $aaa;
        // print "<br>";
        // 
        // $data = $this->request->data;
        // //print_r ($data)."<br>";
        // if(isset($data["no1"])){
        // $comment = $data["no1"];
        // //echo $comment;
        // }
        // $data_list = array(
        // array('user_id' => '04886538', 'mail_address' => 'smapssmaps@gmail.com', 'kanji_last_name' => '青木', 'kanji_first_name' => '功', 'zip' => '1800023', 'address1' => '13', 'address2' => '立川市砂川町４', 'address3' => '上水１０７', 'dividend_amount' => '830', 'tax' => '169'),
        // array('user_id' => '56492728', 'mail_address' => '56492728@test.com', 'kanji_last_name' => '中村', 'kanji_first_name' => '徹', 'zip' => '1800023', 'address1' => '13', 'address2' => '港区海岸４', 'address3' => 'ガーデンハウス', 'dividend_amount' => '1830', 'tax' => '69')
        // );
        // 
        // $persons = array(
        //             array('name' => '太郎', 'age' => 18, 'gender' => '男性'), 
        //             array('name' => '花子', 'age' => 26, 'gender' => '女性'), 
        //             array('name' => '次郎', 'age' => 36, 'gender' => '男性'),
        //            );
        // print_r($persons);
        // foreach($persons as $person){
        //     print("{$person['name']}さんは、{$person['age']}歳で、{$person['gender']}です。<br>");
        //     print "繰り返し"."<br>";
        // }  
        // print_r ($data_list);
        //          foreach ($data_list as $value) {
        //             $data_list = array(
        //                           array('user_id' => $value['user_id'],'mail_address' => $value['mail_address'],'kanji_last_name' => $value['kanji_last_name'],'kanji_first_name' => $value['kanji_first_name'], 'zip' => $value['zip'], 'address1' => $value['address1'], 'address2' => $value['address2'], 'address3' => $value['address3'], 'dividend_amount' => $value['dividend_amount'], 'tax' => $value['tax']));
        //             print "<pre>";                    
        //             print_r ($data_list);
        //             print "</pre>";
        //         
        //         } 
        // 
        // print "</pre>";



       }







	
	/**
	 * お知らせ内容
	 */
	function v100informationdetail() {
		
		$this->layout = LAYOUT_NAME_004;

		try {
			
			$event_id = $this->Common->getSessionEventId();
			
			// 未ログイン状態の場合、ログインへ
			if (strcmp(EVENT_ID_999999999, $event_id) !=0 && !$this->SessionUserInfo->checkUserInfo()) {
				$this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010020);
			}
			
			switch ($event_id) {
				case EVENT_ID_010010030: // マイページボタン押下

					// マイページへ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040010);
	
				case EVENT_ID_040010070: // 配当予定ボタン押下

					// 配当予定ページへ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040120);
					
				case EVENT_ID_040010060: // 同意履歴ボタン押下
					
					// 同意履歴へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040110);
					
				case EVENT_ID_040010010: // 投資履歴ボタン押下
					
					// 投資履歴へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040050);
					
				case EVENT_ID_040010020: // 配当履歴ボタン押下
					
					// 配当履歴へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040060);
					
				case EVENT_ID_040010030: // 投資家情報ボタン押下
					
					// 投資家情報へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040070);
					
				case EVENT_ID_040010040: // お知らせボタン押下
				
					// お知らせへ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040090);
					
				case EVENT_ID_040090010: // お知らせ一覧：件名リンク押下
					
					$id   = $this->Common->getSessionInfoId();
					$info_data = $this->InformationHistory->getInformation($id);
					$info = $info_data[0][MODEL_NAME_110];
					
					$user_id          = $info[COLUMN_1100020];
					$info_id          = $info[COLUMN_1100030];
					$agreed_datetime  = $info[COLUMN_1100150];
					$fund_id          = $info[COLUMN_1100100];
					$this->set("user_id", $user_id);
					$this->set("fund_id", $fund_id);

					// お知らせ添付書面取得
					$attachment_data = $this->InfoAttachment->getInfoAttachment($user_id, $info_id);

					$data_list     = null;
					$doc_count     = 0;
					$doc_path_list = array();
					
					if (!is_null($attachment_data) && is_array($attachment_data) && 0 < count($attachment_data)) {
						foreach ($attachment_data as $key => $values) {
							foreach ($values as $value) {
								$doc_count++;
								$fund_id   = $value[COLUMN_1150040];
								$doc_id    = $value[COLUMN_1150050];
								$doc_name  = $value[COLUMN_1150060];
								$doc_rev   = $value[COLUMN_1150070];
								$doc_param = $value[COLUMN_1150080];
								
								$doc_path = "";
								if (strcmp(REG_DOC_CAT_ID, $fund_id) == 0 && (is_null($agreed_datetime) || strcmp("", $agreed_datetime) == 0)) {
									
									// 投資家登録時書面
									$doc_path = $this->Document->getRegistrationDocPath($doc_id);
								}
								elseif (strcmp(REG_DOC_CAT_ID, $fund_id) == 0 && (!is_null($agreed_datetime) && strcmp("", $agreed_datetime) != 0)) {
									
									// 同意後の投資家登録時書面
									$doc_param = date(DATETIME_FORMAT_4, strtotime($agreed_datetime));
									$doc_path  = $this->Document->getDocumentPath($fund_id, $doc_id, $doc_rev, $doc_param);
								}
								else {
									
									// 投資家登録時書面以外の書面
									$doc_path = $this->Document->getDocumentPath($fund_id, $doc_id, $doc_rev, $doc_param);
								}
								
								$data_list[OBJECT_ID_040100090.$doc_count] = $doc_path;
								$data_list[OBJECT_ID_040100100.$doc_count] = $doc_name;
								
								$doc_path_list[] = $doc_path;
							}
						}
					}
					$this->set("info", $info);
					if (0 < count($doc_path_list)) {
						$this->Common->setSessionDocUrlList($doc_path_list);
					}
					
					$agreed_DT = $info[COLUMN_1100150];
					
					$data = array(
						OBJECT_ID_040100010 => $info[COLUMN_1100050]
					   ,OBJECT_ID_040100020 => date(DATE_FORMAT, strtotime($info[COLUMN_1100130]))
					   ,OBJECT_ID_040100030 => $info[COLUMN_1100060]
					   ,OBJECT_ID_040100040 => $info[COLUMN_1100070]
					   ,OBJECT_ID_040100050 => $info[COLUMN_1100080]
					   ,OBJECT_ID_040100080 => $agreed_DT
				    );
					$this->set("investment_amount", $investment_amount);
					$this->set("data", $data);
                                        $this->set("data_list", $data_list);
					$this->set("doc_count", $doc_count);
                                        $doc_path = substr($doc_path, -14);//doc_pathを取り出しtrn_investment_historiesのapplication_datetimeとリレーションして
                                        $ref=strtotime($doc_path);
                                        $doc_path =date("Y/m/d H:i:s",$ref);
					$this->set("doc_path", $doc_path);
                                        $data_list_list_list = $this->TrnInvestmentHistory->find('all',array(
                                                                                                'conditions' => array(
                                                                                                                'user_id' => $user_id ,
                                                                                                                'fund_id' => $fund_id ,
                                                                                                                'application_datetime' => $doc_path),
                                                                                                'order' => array('user_id' => 'desc')
                                                                                                            ));
                                        $this->set("data_list_list_list", $data_list_list_list);
                                        $investment_amount = $data_list_list_list[0]['TrnInvestmentHistory']['investment_amount'];
                                        $expiration_datetime = $data_list_list_list[0]['TrnInvestmentHistory']['expiration_datetime'];
                                        $approval_datetime = $data_list_list_list[0]['TrnInvestmentHistory']['approval_datetime'];
                                        $application_datetime = $data_list_list_list[0]['TrnInvestmentHistory']['application_datetime'];//投資申込日時
                                        $investment_amount = number_format($investment_amount);
                                        $expiration_datetime = date('Y/m/d',  strtotime($expiration_datetime));
                                        $approval_datetime = date('Y/m/d',  strtotime($approval_datetime));
					$this->set("application_datetime", $application_datetime);
					$this->set("investment_amount", $investment_amount);
					$this->set("expiration_datetime", $expiration_datetime);//入金期日
					$this->set("approval_datetime", $approval_datetime);//確定日時
		
					break;
					
				case EVENT_ID_040100020: //同意するボタン押下
					
					$id = $this->Common->getSessionInfoId();
					
					// ◆トランザクションスタート◆
					$this->Common->trnBegin();
					
					// 同意日時更新
					$agreed_datetime = date(DATETIME_FORMAT);
					$data[COLUMN_1100150] = $agreed_datetime;
					$this->InformationHistory->updateInformationHistory($id, $data);
					
					// お知らせ情報再取得
					$info_data = $this->InformationHistory->getInformation($id);
					$info = $info_data[0][MODEL_NAME_110];
					$user_id  = $info[COLUMN_1100020];
					$info_id  = $info[COLUMN_1100030];
					$app_date = $info[COLUMN_1100040]; // お知らせ日時(投資申込日時)
					
					$attachment_data = $this->InfoAttachment->getInfoAttachment($user_id, $info_id);

					// 同意書面履歴登録
					if (!is_null($attachment_data) && is_array($attachment_data) && 0 < count($attachment_data)) {
						
						$agreement = null;
						foreach ($attachment_data as $key => $values) {
							foreach ($values as $value) {
								
								$fund_id = $value[COLUMN_1150040];
								$doc_id  = $value[COLUMN_1150050];
								
								$fund_data = $this->Fund->getMstFund($fund_id);
								
								$fund_name = "";
								if (!is_null($fund_data) && is_array($fund_data) && 0 < count($fund_data)) {
									$fund_name = $fund_data[0][MODEL_NAME_050][COLUMN_0500020];
								}

								$agreement_detail_code = 0;
								$doc_param             = "";
								if (strcmp(REG_DOC_CAT_ID, $fund_id) == 0) {
									
									// 投資家登録時書面の同意
									$fund_name             = REG_DOC_FUND_NAME;
									$agreement_detail_code = AGREEMENT_DETAIL_CODE_02;
									
									// 同意日時の形式変換
									$doc_param = date(DATETIME_FORMAT_4, strtotime($agreed_datetime));
									
									// PDF作成＆保存
									$this->Pdf->makePdfLenderReg($doc_id, $doc_param, $user_id, true);
								}
								elseif (strcmp(INV_DOC_ID_00004, $doc_id) == 0) {
									
									// 運用報告書の同意
									// 基本的に運用報告書には同意が不要なのでここは通らないはずだが、
									// お知らせ送信画面から再交付を行った場合、同意を取ることもできる。
									$agreement_detail_code = AGREEMENT_DETAIL_CODE_04;
								}
								elseif (strcmp(INV_DOC_ID_00005, $doc_id) == 0) {
									
									// 取引残高報告書の同意
									$fund_name             = INV_DOC_FUND_NAME;
									$agreement_detail_code = AGREEMENT_DETAIL_CODE_04;
								}
								else {
									
									// 契約締結時書面の同意
									$agreement_detail_code = AGREEMENT_DETAIL_CODE_03;
								}
								
								// 同意履歴登録
								$agreement[COLUMN_0900020] = $user_id;
								$agreement[COLUMN_0900030] = $fund_id;
								$agreement[COLUMN_0900040] = $fund_name;
								$agreement[COLUMN_0900050] = $value[COLUMN_1150050];   // 書面ID
								$agreement[COLUMN_0900060] = $value[COLUMN_1150060];   // 書面名
								$agreement[COLUMN_0900080] = $value[COLUMN_1150070];   // リビジョン
								$agreement[COLUMN_0900090] = $agreed_datetime;         // 同意日時
								$agreement[COLUMN_0900100] = $agreement_detail_code;   // 同意内容
								
								if (strcmp("", $doc_param) != 0) {
									$agreement[COLUMN_0900070] = $doc_param;
								}
								else {
									$agreement[COLUMN_0900070] = $value[COLUMN_1150080];   // 書面パラメータ
								}
                                                                                                                              
								// 履歴登録実行
								$this->AgreementHistory->saveAgreementHistory($agreement);
                                                       // クーリングオフ日書き込み　必ず２回同意するので最終の同意がアップデートされる         
                                                       $agreed_datetime = date("Y/m/d H:i:s",strtotime('7 day'));
                                                       $this->TrnInvestmentHistory->updateAll(
                                                       array(
                                                             'cooling_off_period' => "'".$agreed_datetime."'"),
                                                       array(
                                                             'user_id' => $user_id, 
                                                             'application_datetime' => $agreement[COLUMN_0900070],
                                                             'fund_id' => $fund_id, 
                                                              
                                                        )
                                                     );


							}
						}
					}
					
					// ◆コミット◆
					$this->Common->trnCommit();
					
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040090);
					
				case EVENT_ID_999999999: // ViewTest
					
					break;
					
				default :
					
					$this->Common->redirectMyPage();
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040090);
			}
			
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			$this->Common->trnRollback(); // ◆ロールバック◆
			
			// 例外処理
			$err_str = "C040Lender/v100informationdetail で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
			// セッション内の入力データ削除
			$this->Common->deleteSessionFormData();
			
		}
		
	}
	
	/*
	 * 同意
	 */
	function v110agreementhistory() {
		
		$this->layout = LAYOUT_NAME_001;

		try {
			
			$event_id = $this->Common->getSessionEventId();
			
			// 未ログイン状態の場合、ログインへ
			if (strcmp(EVENT_ID_999999999, $event_id) !=0 && !$this->SessionUserInfo->checkUserInfo()) {
				$this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010020);
			}
			
			switch ($event_id) {
				case EVENT_ID_010010030: // マイページボタン押下

					// マイページへ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040010);

				case EVENT_ID_040010070: // 配当予定ボタン押下

					// 配当予定ページへ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040120);
					
				case EVENT_ID_040010010: // 投資履歴ボタン押下
					
					// 投資履歴へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040050);
					
					break;
				
				case EVENT_ID_040010020: // 配当履歴ボタン押下
					
					// 配当履歴へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040060);
					
				case EVENT_ID_040010030: // 投資家情報ボタン押下
					
					// 投資家情報へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040070);
					
				case EVENT_ID_040010040: // お知らせボタン押下
				
					// お知らせへ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040090);
					
//				case EVENT_ID_040010060: // 同意履歴ボタン押下
//					
//					// 同意履歴へ
//					$this->Common->setSessionEventId($event_id);
//					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040110);
//					
				case EVENT_ID_040110010: // 絞込みボタン押下
					
					// 入力チェック実行
					$err = $this->CheckC040->v110($this->data);
					
					if(is_null($err)) {
						$date_from = $this->data[SEARCH_ID_040110010];
						$date_to   = $this->data[SEARCH_ID_040110020];
						$user_id   = $this->SessionUserInfo->getUserId();
						$data_list = $this->AgreementHistory->getAgreementHistory($user_id, $date_from, $date_to);
						
						$url_list  = array();
						foreach ($data_list as $key => $value) {
					
							// 同意内容が仮会員登録以外の場合、書面パスを生成
							if (strcmp(AGREEMENT_DETAIL_CODE_01, $value[COLUMN_0900100]) != 0) {
								
								$fund_id   = $value[COLUMN_0900030];
								$doc_id    = $value[COLUMN_0900050];
								$doc_param = $value[COLUMN_0900070];
								$revision  = $value[COLUMN_0900080];
								
								$doc_path = $this->Document->getDocumentPath($fund_id, $doc_id, $revision, $doc_param);
								
								$data_list[$key][OBJECT_ID_040110010] = $doc_path;
								$url_list[]                           = $doc_path;
							}
						}
						
						$this->set("data_list", $data_list);
						
						// PDF出力時のURL改竄チェック用
						$this->Common->setSessionDocUrlList($url_list);
					}

				    $this->set("data", $this->data);
					
					// エラーがあった場合、エラーメッセージを入力に表示する。
					$this->set("err" , $err);
					
					break;
				
				case EVENT_ID_999999999: // ViewTest
					
					break;
					
				default :
					


                                               if(is_null($err)) {
                                                $date_from = $this->data[SEARCH_ID_040110010];
                                                $date_to   = $this->data[SEARCH_ID_040110020];
                                                $user_id   = $this->SessionUserInfo->getUserId();
                                                $data_list = $this->AgreementHistory->getAgreementHistory($user_id, $date_from, $date_to);

                                                $url_list  = array();
                                                foreach ($data_list as $key => $value) {

                                                        // 同意内容が仮会員登録以外の場合、書面パスを生成
                                                        if (strcmp(AGREEMENT_DETAIL_CODE_01, $value[COLUMN_0900100]) != 0) {

                                                                $fund_id   = $value[COLUMN_0900030];
                                                                $doc_id    = $value[COLUMN_0900050];
                                                                $doc_param = $value[COLUMN_0900070];
                                                                $revision  = $value[COLUMN_0900080];

                                                                $doc_path = $this->Document->getDocumentPath($fund_id, $doc_id, $revision, $doc_param);

                                                                $data_list[$key][OBJECT_ID_040110010] = $doc_path;
                                                                $url_list[]                           = $doc_path;
                                                        }
                                                }

                                                $this->set("data_list", $data_list);

                                                // PDF出力時のURL改竄チェック用
                                                $this->Common->setSessionDocUrlList($url_list);
                                        }

                                    $this->set("data", $this->data);



					$this->Common->redirectMyPage(); // ログイン中ならマイページへ
					
					// 要確認のお知らせがあればお知らせ一覧へ
					$user_id = $this->SessionUserInfo->getUserId();
					if ($this->InformationHistory->checkForcedInformation($user_id)) {
						$this->Common->setSessionEventId(EVENT_ID_000000000);
						$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040090);
					}
					
					$data = array(
						 SEARCH_ID_040110010 => ""
						,SEARCH_ID_040110020 => ""
					);
					$this->set("data", $data);
					
			}
			
			$list[CONFIG_0043] = Configure::read(CONFIG_0043);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "C040Lender/v110agreementhistory で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
			// セッション内の入力データ削除
			$this->Session->delete(SESSION_FORM_DATAS);
			
		}
		
	}

	/*
	 * 配当予定 (2017/10/17追加)
         * ※後日phpdocコメントを記述すること
	 */
	function v120dividendplan() {
		
		$this->layout = LAYOUT_NAME_001;
		try {
			$event_id = $this->Common->getSessionEventId();
			
			// 未ログイン状態の場合、ログインへ
			if (strcmp(EVENT_ID_999999999, $event_id) !=0 && !$this->SessionUserInfo->checkUserInfo()) {
				$this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010020);
			} else {
				$user_id = $this->SessionUserInfo->getUserId();
			}
			
			// 配当予定で選択する投資先ファンドのリストを取得
			$fund_data = $this->DividendPlan->getFundList($user_id);
			$fund_list = Set::Combine($fund_data, '{n}.fund_id','{n}.fund_name');
			$this->set("fund_list", $fund_list);

			switch ($event_id) {
				case EVENT_ID_010010030: // マイページボタン押下

					// マイページへ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040010);

//				case EVENT_ID_040010070: // 配当予定ボタン押下
//
//					// 配当予定ページへ
//					$this->Common->setSessionEventId($event_id);
//					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040120);
//					
				case EVENT_ID_040010010: // 投資履歴ボタン押下		

					// 投資履歴へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040050);	
				
				case EVENT_ID_040010020: // 配当履歴ボタン押下

					// 配当履歴へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040060);
					
				case EVENT_ID_040010030: // 投資家情報ボタン押下			

					// 投資家情報へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040070);
					
				case EVENT_ID_040010040: // お知らせボタン押下

					// お知らせへ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040090);
					
				case EVENT_ID_040010060: // 同意履歴ボタン押下

					// 同意履歴へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040110);
					
				case EVENT_ID_040120010: // 絞込みボタン押下
					// 入力チェック実行
					$err = $this->CheckC040->v120($this->data);		
					$date_from = $this->data[SEARCH_ID_040120010];
					$date_to   = $this->data[SEARCH_ID_040120020];
					$fund_id = $this->data['select_dividend_fund'];

					if(is_null($err)) {
						if (strcmp($date_from, "") != 0) {
							$date_from = date(DATE_FORMAT, strtotime($date_from));
						}
						if (strcmp($date_to, "") != 0) {
							$date_to = date(DATE_FORMAT, strtotime($date_to));
						}
						$data_list = $this->DividendPlan->getDividendPlan($user_id, $fund_id, $date_from, $date_to);
						$this->set("data_list", $data_list); // 配当予定データを設定する
					}
					$this->set("data", $this->data);					
					// エラーがあった場合、エラーメッセージを入力に表示する。
					$this->set("err" , $err);		
					break;	
				case EVENT_ID_999999999: // ViewTest
					break;
					
				default :
					// 状態コードによっては画面遷移を行う
					$this->Common->redirectMyPage();
					
					// 要確認のお知らせがあればお知らせ一覧へ
					$user_id = $this->SessionUserInfo->getUserId();
					if ($this->InformationHistory->checkForcedInformation($user_id)) {
						$this->Common->setSessionEventId(EVENT_ID_000000000);
						$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040090);
					}
					
					// 検索BOXにデフォルトで表示する値を設定する
					$data = array(
						SEARCH_ID_040120010 => date("Y/m/d"),	//date_from
						SEARCH_ID_040120020 => "",				//date_to
					);
					$this->set("data", $data);						
				}
			
			
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "C040Lender/v120dividendplan で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
			
			// セッション内の入力データ削除
			$this->Session->delete(SESSION_FORM_DATAS);
			
		}
	}
}





 
