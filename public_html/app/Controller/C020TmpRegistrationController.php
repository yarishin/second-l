<?php
App::uses('AppController', 'Controller');

/*
 * 口座開設仮申請
 */
class C020TmpRegistrationController extends AppController {

	public $uses       = array(
		 "MstCompany"
		,"MstUser"
		,"TrnAgreementHistory"
		,"Transaction"
	);
	
	public $components = array(
		 "AgreementHistory"
		,"Common"
		,"Company"
		,"Calendar"
		,"CheckC020"
		,"Mail"
		,"SessionUserInfo"
		,"User"
		,"DummyData"
	);

	/*
	 * 仮申請(入力)
	 */
	function v010input() {
		
		$this->layout = LAYOUT_NAME_003;

		try {
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_020010010: // 口座開設仮申請(登録)：確認ボタン押下
					
					// 入力チェックOKなら確認画面へ
					if ($this->CheckC020->v010($this->data)) {
						
						// 入力データをセッションに格納
						$this->Common->setSessionFormData($this->data);
						
						// 同意日時をセッションに格納
						$this->Common->setSessionAgreedDatetime(date(DATETIME_FORMAT));

						// confirmへ
						$this->Common->setSessionEventId($event_id);
						$this->Common->redirectCommon(REDIRECT_C020, REDIRECT_A020020);
					}

					// エラーメッセージと入力データ
					$this->set("validation_errors", $this->MstUser->validationErrors);
					$this->set("data"             , $this->data);
					
					break;
				
				case EVENT_ID_020020010: // 口座開設仮申請(確認)：戻るボタン押下
					
					// 入力データ取得
					$data = $this->Common->getSessionFormData();

					$this->set("data", $data);
				
					break;
					
				default :
					
					// ログイン中の場合、マイページへ
					if ($this->SessionUserInfo->checkUserInfo()) {
						$this->Common->setSessionEventId(EVENT_ID_000000000);
						$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040010);
					}					
					// 各入力項目の初期化
					$data = array(
						 OBJECT_ID_020010010 => ""
						,OBJECT_ID_020010020 => ""
						,OBJECT_ID_020010030 => ""
						,OBJECT_ID_020010040 => ""
						,OBJECT_ID_020010050 => ""
						,OBJECT_ID_020010060 => ""
						,OBJECT_ID_020010070 => MAIL_MAGAZINE_RECEIVE
						,OBJECT_ID_020010080 => ""
						,OBJECT_ID_020010090 => ""
						,OBJECT_ID_020010100 => ""
					);

					$this->set("data", $data);
			}
			
			// プルダウンリスト
			$list[CONFIG_0001] = Configure::read(CONFIG_0001);
			$list[CONFIG_0046] = Configure::read(CONFIG_0046);
			$this->set("list" , $list);

			$this->set("action", $this->Common->getCurrentAction());
		
		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "c020TmpRegistration/v010inputで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
		}
		
		// セッション内の入力データ削除
		$this->Session->delete(SESSION_FORM_DATAS);
		
	}

	/*
	 * 仮申請(確認)
	 */
	function v020confirm() {

		$this->layout = LAYOUT_NAME_001;
		
		try {
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_020010010: // 仮登録申請(入力)：確認ボタン押下
					
					// 入力データ取得
					$data = $this->Common->getSessionFormData();
                                        
					$this->set("data", $data);
				
					break;
				
				case EVENT_ID_020020010: // 仮登録申請(確認)：戻るボタン押下
				
					// 入力画面へ
					$this->Common->redirectCommon(REDIRECT_C020, REDIRECT_A020010);
				
					break;
				
				case EVENT_ID_020020020: // 仮登録申請(確認)：決定ボタン押下
					
					// 入力データ取得
					$data = $this->Common->getSessionFormData();
					
                                        //$data += array('mail_magazine_receive' => "1");
					$this->Common->trnBegin(); // ◆トランザクション開始◆
					// DBにデータを登録
					$reg_data = $this->User->regMstUserInterim($data);

					$data['user_id'] = $reg_data['user_id'];
					$this->Common->setSessionFormData($data);

					if (is_array($reg_data)) {
						
						$agreed_datetime = $this->Common->getSessionAgreedDatetime();
						
						// 同意履歴登録
						$history[COLUMN_0900020] = $reg_data[COLUMN_0800010];
						$history[COLUMN_0900030] = TMP_REG_DOC_CAT_ID;
						$history[COLUMN_0900040] = TMP_REG_DOC_FUND_NAME;
						$history[COLUMN_0900050] = TMP_REG_DOC_ID_00000;     // 書面ID
						$history[COLUMN_0900060] = TMP_REG_DOC_NAME_00000;   // 書面名
						$history[COLUMN_0900070] = "";                       // 書面パス
						$history[COLUMN_0900080] = 0;                        // リビジョン
						$history[COLUMN_0900090] = $agreed_datetime;         // 同意日時
						$history[COLUMN_0900100] = AGREEMENT_DETAIL_CODE_01; // 同意内容

						// 履歴登録実行
						$this->AgreementHistory->saveAgreementHistory($history);

						// メール送信
						$this->Mail->sendMailIntReg($reg_data);
						
						$this->Common->trnCommit(); // ◆コミット◆
                                                $this->set("user_id" , $user_id);
                                                $this->set("data" , $data);
						// セッション内の入力データ削除
						//$this->Session->delete(SESSION_FORM_DATAS);
						//セッション削除しない
						// 完了画面へ
						$this->Common->redirectCommon(REDIRECT_C020, REDIRECT_A020030);

					}
					else {
						$this->Common->trnCommit(); // ◆コミット◆
					}

					break;
					
				default :
					
					// ログイン中の場合、マイページへ
					if ($this->SessionUserInfo->checkUserInfo()) {
						$this->Common->setSessionEventId(EVENT_ID_000000000);
						$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040010);
					}
					else {
						
						// 未ログイン時は仮登録申請(入力)へ
						$this->Common->redirectCommon(REDIRECT_C020, REDIRECT_A020010);
						
					}
			}
			
			$list[CONFIG_0001] = Configure::read(CONFIG_0001);
			$list[CONFIG_0046] = Configure::read(CONFIG_0046);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());
		
		} catch (Exception $ex) {
			
			$this->Common->trnRollback(); // ◆ロールバック◆
			
			// 例外処理
			$err_str = "c020TmpRegistration/v020confirmで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);

			// セッション内の入力データ削除
			$this->Session->delete(SESSION_FORM_DATAS);
		}

	}

	/*
	 * 仮申請(完了)
	 */
	function v030complete() {

		$this->layout = LAYOUT_NAME_001;
		
		try {
			
			$this->response->disableCache();
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_020020020: // 口座開設仮申請(確認)：登録ボタン押下
					
					break;
				
				case EVENT_ID_999999999: // ViewTest
					
					break;
				
				default :
					
					// ログイン中の場合、マイページへ
					if ($this->SessionUserInfo->checkUserInfo()) {
						$this->Common->setSessionEventId(EVENT_ID_000000000);
						$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040010);
					}
					else {
						
						// 未ログイン時は仮登録申請(入力)へ
						$this->Common->redirectCommon(REDIRECT_C020, REDIRECT_A020010);
						
					}
			}
			//メールアドレスを取得してemailにセット
			$data = $this->Common->getSessionFormData();
			$this->set("user_id", $data['user_id']);
			$this->set("action", $this->Common->getCurrentAction());
		
		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "c020TmpRegistration/v030complete で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);

			// セッション内の入力データ削除
			//$this->Session->delete(SESSION_FORM_DATAS);
			//セッション削除しない
		}

	               // セッション内の入力データ削除
			$this->Session->delete(SESSION_FORM_DATAS);

	}
	
}
 
