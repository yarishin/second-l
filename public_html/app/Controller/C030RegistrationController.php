<?php
App::uses('AppController', 'Controller');

/*
 * 口座開設申請用コントローラ
 */
class C030RegistrationController extends AppController {

	public $uses       = array(
		 "MstCompany"
		,"MstDocument"
		,"MstUser"
		,"Transaction"
		,"TrnAgreementHistory"
	);
	
	public $components = array(
		 "AgreementHistory"
		,"Common"
		,"Company"
		,"CheckC030"
		,"Document"
		,"DummyData"
		,"Mail"
		,"Pdf"
		,"User"
		,"SessionUserInfo"
	);
	
	/*
	 * 同意および確認
	 */
	function v010agreement() {
		
		$this->layout = LAYOUT_NAME_001;

		try {
			
			$event_id = $this->Common->getSessionEventId();
			
			// 未ログイン状態の場合、ログインへ
			if (strcmp(EVENT_ID_999999999, $event_id) !=0 && !$this->SessionUserInfo->checkUserInfo()) {
				$this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010020);
			}
			
			switch ($event_id) {
				case EVENT_ID_000000000: // ID無し
				case EVENT_ID_999999999: // ViewTest
				case EVENT_ID_010010010: // トップ：ログインボタン押下
				case EVENT_ID_010020010: // ログイン：ログインボタン押下
					
					// 登録時同意書面データ取得
					$doc_data = $this->Document->getRegistrationDocuments();
					
					$data = null;
					$doc_count = 0;
					$url_list = array();
					foreach ($doc_data as $key => $values) {
						foreach ($values as $value) {
							$doc_count++;
							$doc_name = $value[COLUMN_0400040];
							$doc_rev  = $value[COLUMN_0400050];
							$doc_path = $this->Document->getRegistrationDocPath($value[COLUMN_0400030]); 
							$data[OBJECT_ID_030010010.$doc_count] = $doc_path;
							$data[OBJECT_ID_030010020.$doc_count] = $doc_name;
							$url_list[] = $doc_path;
						}
					}
					$this->set("doc_count", $doc_count);
					
					$this->set("data", $data);
					
					// PDF出力時のGETパラメータ整合性チェック用
					$this->Common->setSessionDocUrlList($url_list);
					
					break;
				
				case EVENT_ID_030010020: // 同意および確認：同意ボタン押下
					
					$this->Common->setSessionAgreedDatetime(date(DATETIME_FORMAT));
					
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C030, REDIRECT_A030020);
					
					break;
				
				default :
					$this->redirect(URL_SITE_TOP);
			}
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "c030Registration/v010agreement で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
			// セッション内の入力データ削除
			$this->Session->delete(SESSION_FORM_DATAS);
			
		}
		
	}

	/*
	 * 口座開設申請(登録)
	 */
	function v020input() {
		
		$this->layout = LAYOUT_NAME_003;

		try {
			
			$event_id = $this->Common->getSessionEventId();
			
			// 未ログイン状態の場合、ログインへ
			if (strcmp(EVENT_ID_999999999, $event_id) !=0 && !$this->SessionUserInfo->checkUserInfo()) {
				$this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010020);
			}
			
			switch ($event_id) {
				case EVENT_ID_030010020: // 同意および確認：同意ボタン押下
					
					// 各入力項目の初期化
					$data = array(
						 OBJECT_ID_030020010 => "" ,OBJECT_ID_030020020 => "" ,OBJECT_ID_030020030 => "" 
						,OBJECT_ID_030020040 => "" ,OBJECT_ID_030020050 => "" ,OBJECT_ID_030020060 => "" 
						,OBJECT_ID_030020070 => "" ,OBJECT_ID_030020080 => "" ,OBJECT_ID_030020090 => "" 
						,OBJECT_ID_030020100 => "" ,OBJECT_ID_030020110 => "" ,OBJECT_ID_030020120 => "" 
						,OBJECT_ID_030020130 => "" ,OBJECT_ID_030020140 => "" ,OBJECT_ID_030020150 => "" 
						,OBJECT_ID_030020160 => "" ,OBJECT_ID_030020170 => "" ,OBJECT_ID_030020180 => "" 
						,OBJECT_ID_030020190 => "" ,OBJECT_ID_030020200 => "" ,OBJECT_ID_030020210 => "" 
						,OBJECT_ID_030020220 => "" ,OBJECT_ID_030020230 => "" ,OBJECT_ID_030020240 => "" 
						,OBJECT_ID_030020250 => "" ,OBJECT_ID_030020260 => "" ,OBJECT_ID_030020270 => "" 
						,OBJECT_ID_030020280 => "" ,OBJECT_ID_030020290 => "" ,OBJECT_ID_030020300 => "" 
						,OBJECT_ID_030020310 => "" ,OBJECT_ID_030020320 => "" ,OBJECT_ID_030020330 => "" 
						,OBJECT_ID_030020340 => "" ,OBJECT_ID_030020350 => "" ,OBJECT_ID_030020360 => "" 
						,OBJECT_ID_030020370 => "" ,OBJECT_ID_030020380 => "" ,OBJECT_ID_030020390 => "" 
						,OBJECT_ID_030020400 => "" ,OBJECT_ID_030020410 => "" ,OBJECT_ID_030020420 => "" 
						,OBJECT_ID_030020430 => "" ,OBJECT_ID_030020440 => "" ,OBJECT_ID_030020450 => "" 
						,OBJECT_ID_030020460 => ""
					);

					$this->set("data", $data);
					
					break;
				
				case EVENT_ID_030020020: // 口座開設申請(入力)：確認ボタン押下
					
					// 入力チェック実行
					$err = $this->CheckC030->v020($this->data);
					
					if (is_null($err)) {
						
						// 入力データをセッションに格納
						$this->Common->setSessionFormData($this->data);

						// 確認画面へ
						$this->Common->setSessionEventId($event_id);
						$this->Common->redirectCommon(REDIRECT_C030, REDIRECT_A030030);
					}
					
					// エラメッセージ
					$this->set("validation_errors", $err);
					$this->set("data"             , $this->data);
					
					break;
				
				case EVENT_ID_030030010: // 口座開設申請(確認)：戻るボタン押下
					
					// 入力データをセッションから取出し
					$data = $this->Common->getSessionFormData();
					$this->set("data", $data);
					
					break;
				
				case EVENT_ID_999999999: // ViewTest
					
					// ダミーデータセット
					$this->set("data", $this->DummyData->v030020());
					break;
					
				default :
					
					// ログイン中の場合、マイページへ
					if ($this->SessionUserInfo->checkUserInfo()) {
						$this->Common->setSessionEventId(EVENT_ID_000000000);
						$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040010);
					}
					
			}
			
			// プルダウンリスト
			$list[CONFIG_0001] = Configure::read(CONFIG_0001);
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
			$list[CONFIG_0022] = Configure::read(CONFIG_0022);
			$list[CONFIG_0023] = Configure::read(CONFIG_0023);
			$list[CONFIG_0030] = Configure::read(CONFIG_0030);
			$list[CONFIG_0031] = Configure::read(CONFIG_0031);
			$list[CONFIG_0032] = Configure::read(CONFIG_0032);
			$list[CONFIG_0033] = Configure::read(CONFIG_0033);
			$list[CONFIG_0038] = Configure::read(CONFIG_0038);
			$list[CONFIG_0039] = Configure::read(CONFIG_0039);
			$this->set("list" , $list);

			$this->set("action", $this->Common->getCurrentAction());
			
			// セッション内の入力データ削除
			$this->Session->delete(SESSION_FORM_DATAS);
			
		} catch (Exception $ex) {
			
			// 例外処理
			$this->Session->setFlash("c030RegistrationController/v020inputで例外発生<br>".$ex->getMessage()."<br>SQL : ".$ex->queryString);
		
			// セッション内の入力データ削除
			$this->Session->delete(SESSION_FORM_DATAS);
			
		}
	}

	/*
	 * 口座開設申請(確認)
	 */
	function v030confirm() {

		$this->layout = LAYOUT_NAME_001;
		
		try {
			
			$event_id = $this->Common->getSessionEventId();
			
			// 未ログイン状態の場合、ログインへ
			if (strcmp(EVENT_ID_999999999, $event_id) !=0 && !$this->SessionUserInfo->checkUserInfo()) {
				$this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010020);
			}
			
			switch ($event_id) {
				case EVENT_ID_030020020: // 登録申請(入力)：確認ボタン押下
					
					// 入力データ取得
					$data = $this->Common->getSessionFormData();

					$this->set("data", $data);
				
					break;
				
				case EVENT_ID_030030010: // 登録申請(確認)：戻るボタン押下
					
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C030, REDIRECT_A030020);
					
					break;
				
				case EVENT_ID_030030020: // 登録申請(確認)：決定ボタン押下
				
					$this->Common->trnBegin(); // ◆トランザクション開始◆
					
					$user_id   = $this->SessionUserInfo->getUserId();
					$fund_id   = REG_DOC_CAT_ID;
					$fund_name = REG_DOC_FUND_NAME;
					
					$agreed_datetime = $this->Common->getSessionAgreedDatetime();
					
					// 同意書面データ取得
					$doc_data = $this->Document->getRegistrationDocuments();
					
					foreach ($doc_data as $key => $values) {
						foreach ($values as $value) {
							
							// 同意履歴登録
							$history[COLUMN_0900020] = $user_id;
							$history[COLUMN_0900030] = $fund_id;
							$history[COLUMN_0900040] = $fund_name;
							$history[COLUMN_0900050] = $value[COLUMN_0400030];   // 書面ID
							$history[COLUMN_0900060] = $value[COLUMN_0400040];   // 書面名
							$history[COLUMN_0900070] = date(DATETIME_FORMAT_4, strtotime($agreed_datetime)); // 書面パラメータ
							$history[COLUMN_0900080] = $value[COLUMN_0400050];   // リビジョン
							$history[COLUMN_0900090] = $agreed_datetime;         // 同意日時
							$history[COLUMN_0900100] = AGREEMENT_DETAIL_CODE_02; // 同意内容
							
							// 履歴登録実行
							$this->AgreementHistory->saveAgreementHistory($history);
						}
					}
					
					// ユーザマスタ本登録実行
					$data = $this->Common->getSessionFormData();
					$this->User->regMstUser($data);
					
					$this->Common->trnCommit(); // ◆コミット◆
					
					// 同意書面PDF作成＆保存
					$this->Pdf->savePdfLenderReg($user_id);
					
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C030, REDIRECT_A030040);
					
					break;
				
				case EVENT_ID_999999999: // ViewTest
					
					// ダミーデータセット
					$this->set("data", $this->DummyData->v030030());
					break;
					
				default :
					
					// ログイン中の場合、マイページへ
					if ($this->SessionUserInfo->checkUserInfo()) {
						$this->Common->setSessionEventId(EVENT_ID_000000000);
						$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040010);
					}
			}
			
			$list[CONFIG_0001] = Configure::read(CONFIG_0001);
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
			$list[CONFIG_0022] = Configure::read(CONFIG_0022);
			$list[CONFIG_0023] = Configure::read(CONFIG_0023);
			$list[CONFIG_0030] = Configure::read(CONFIG_0030);
			$list[CONFIG_0031] = Configure::read(CONFIG_0031);
			$list[CONFIG_0032] = Configure::read(CONFIG_0032);
			$list[CONFIG_0033] = Configure::read(CONFIG_0033);
			$list[CONFIG_0038] = Configure::read(CONFIG_0038);
			$list[CONFIG_0039] = Configure::read(CONFIG_0039);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			
			$this->Common->trnRollback(); // ◆ロールバック◆

			// 例外処理
			$err_str = "c030_tem_registration/v030confirmで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);

			// セッション内の入力データ削除
			$this->Session->delete(SESSION_FORM_DATAS);
			//$this->redirect(URL_SITE_TOP);
			

		}

	}

	/*
	 * 確認書類の説明
	 */
	function v040identification() {

		$this->layout = LAYOUT_NAME_001;
		
		try {
			
			$this->response->disableCache();
			$event_id = $this->Common->getSessionEventId();
			
			// 未ログイン状態の場合、ログインへ
			if (strcmp(EVENT_ID_999999999, $event_id) !=0 && !$this->SessionUserInfo->checkUserInfo()) {
				$this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010020);
			}
			
			switch ($event_id) {
				case EVENT_ID_000000000: // ID無し
				case EVENT_ID_010010010: // トップ：ログインボタン押下
				case EVENT_ID_010010030: // トップ：マイページボタン押下
				case EVENT_ID_010020010: // ログイン：ログインボタン押下
				case EVENT_ID_030030020: // 登録申請(確認)：決定ボタン押下
					
					$user_id         = $this->SessionUserInfo->getUserId();
					$expiration_date = $this->User->getExpirationDate($user_id);
					
					$data = array(
						OBJECT_ID_030040010 => date("Y年n月j日", strtotime($expiration_date))
					);

					$this->set("data", $data);
					
					break;
					
				case EVENT_ID_030040010: // 確認書類の説明：メール送信ボタン押下
					
					// メール送信
					$user_info = $this->SessionUserInfo->getUserInfo();
					$this->Mail->sendMailIdentification($user_info);
					
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C030, REDIRECT_A030050);
					
					break;
				case EVENT_ID_040010080: // 確認書類の説明：メール送信ボタン押下
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C070, REDIRECT_A070010);
					break;
					
				case EVENT_ID_999999999: // ViewTest
					
					$data = array(
						OBJECT_ID_030040010 => "2019年10月10日"
					);

					$this->set("data", $data);
					
					break;
					
				default :
					$this->redirect(URL_SITE_TOP);
			}
			
			$this->set("action", $this->Common->getCurrentAction());
			$list[CONFIG_0040] = Configure::read(CONFIG_0040);
			$list[CONFIG_0067] = Configure::read(CONFIG_0067);
			$this->set("list" , $list);

		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "c030Registration/v040identification で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);

			// セッション内の入力データ削除
			$this->Session->delete(SESSION_FORM_DATAS);

		}
		
	}

	/*
	 * メール送信完了
	 */
	function v050mailsent() {

		$this->layout = LAYOUT_NAME_001;
		
		try {
			
			$event_id = $this->Common->getSessionEventId();

			// ログイン中の場合、マイページへ		※2020/02/05追記　お知らせ詳細ページからメインメニューのマイページボタン押下時アップロード完了ページに遷移する問題解消のため
				/*
				if ($this->SessionUserInfo->checkUserInfo()) {
					$this->Common->setSessionEventId(EVENT_ID_000000000);
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040010);
				}
			*/
			
			// 未ログイン状態の場合、ログインへ
		//	if (strcmp(EVENT_ID_999999999, $event_id) !=0 && !$this->SessionUserInfo->checkUserInfo()) {
		//		$this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010020);
		//	}
			
			switch ($event_id) {
				//case EVENT_ID_030040010: // 確認書類の説明：メール送信ボタン押下
				case EVENT_ID_040010090: // 確認書類の説明：メール送信ボタン押下
                                        // メール送信
                                                $user_info = $this->SessionUserInfo->getUserInfo();
                                                $this->Mail->sendMailIdentification($user_info);

					break;
					
				case EVENT_ID_999999999: // ViewTest
					
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
			$this->Session->setFlash("c030registration/v050mailsentで例外発生<br>".$ex->getMessage()."<br>SQL : ".$ex->queryString);

			// セッション内の入力データ削除
			$this->Session->delete(SESSION_FORM_DATAS);

		}

	}
	
	/*
	 * 本人認証
	 */
	function v060authenticate() {
		
		$this->layout = LAYOUT_NAME_001;

		try {
			
			$event_id = $this->Common->getSessionEventId();
			
			// 未ログイン状態の場合、ログインへ
			if (strcmp(EVENT_ID_999999999, $event_id) !=0 && !$this->SessionUserInfo->checkUserInfo()) {
				$this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010020);
			}
			
			switch ($event_id) {
				case EVENT_ID_030060010: // 認証キー入力：送信ボタン押下

					// 入力チェックOKなら確認画面へ
					$user_id = $this->SessionUserInfo->getUserId();
					if ($this->CheckC030->v060($user_id, $this->data)) {
						
						$user_info = $this->SessionUserInfo->getUserInfo();
						
						$this->Common->trnBegin(); // ◆トランザクション開始◆

						// 状態を更新 登録申請中⇒承認済
						if ($this->User->authenticate($user_info[LOGIN_USER_ID])) {
							
							$this->Common->trnCommit(); // ◆コミット◆
							
							// メール送信
							if ($this->Mail->sendMailAuthenticate($user_info)) {
								
								// 状態の更新が正常に実行された場合、口座運用画面へ
								$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040010);
							}
						}
						else {
							$this->Common->trnCommit(); // ◆コミット◆
						}
					}
					
					
					$this->set("data", $this->data);
					
					// エラメッセージ
					$this->set("validation_errors", $this->MstUser->validationErrors);
					
					break;
					
				case EVENT_ID_000000000: // ID無し
				case EVENT_ID_999999999: // ViewTest
				case EVENT_ID_010010010: // トップ：ログインボタン押下
				case EVENT_ID_010010030: // トップ：マイページボタン押下
				case EVENT_ID_010020010: // ログイン：ログインボタン押下
					
					$data = array(
						OBJECT_ID_030060010 => ""
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
			
			$this->Common->trnRollback(); // ◆ロールバック◆

			// 例外処理
			$this->Session->setFlash("c030registration/v060authenticateで例外発生<br>".$ex->getMessage()."<br>SQL : ".$ex->queryString);
		
			// セッション内の入力データ削除
			$this->Session->delete(SESSION_FORM_DATAS);
			
		}
	}
	
}
 
