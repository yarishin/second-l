<?php
App::uses('AppController', 'Controller');

class C050AdminController extends AppController {

	
	public $uses = array(
		"CsvData"
		,"MstAdmin"
		,"MstCalendar"
		,"MstCompany"
		,"MstDepositAccount"
		,"MstDocument"
		,"MstFund"
		,"MstLoan"
		,"MstUser"
//		,"MstZip"
		,"Transaction"
		,"TrnAdminMailHistory"
		,"TrnAdminInfoHistory"
		,"TrnAgreementHistory"
		,"TrnAnnualTradeReport"
		,"TrnDepositHistory"
		,"TrnDividendHistory"
		,"TrnDividendPlan"
		,"TrnInformationHistory"
		,"TrnInfoAttachment"
		,"TrnInvestmentHistory"
		,"TrnLoanRepayment"
		,"TrnNegotiationHistory"
		,"TrnOperatingReportLoan"
		,"TrnRewardHistory"
		,"TrnSecondOperatingReport"
		,"TrnTradeBalanceReport"
		,"WrkDividend"
		,"WrkFund"
		,"WrkFundRepayment"
		,"WrkLoan"
		,"WrkLoanRepayment"
		,"WrkUser"
		,"Image"
	);
	
	public $components = array(
		 "Admin"
		,"AdminInfoHistory"
		,"AdminMailHistory"
		,"AgreementHistory"
		,"AnnualTradeReport"
		,"Calendar"
		,"CheckC050"
		,"Common"
		,"Company"
		,"CsvDownload"
		,"Deposit"
		,"DividendHistory"
		,"DividendPlan"
		,"Document"
		,"DummyData"
		,"Fund"
		,"InformationHistory"
		,"InvestmentHistory"
		,"LoanRepayment"
		,"Mail"
		,"NegotiationHistory"
		,"OperatingReport"
		,"Pdf"
		,"SessionAdminInfo"
		,"SessionUserInfo"
		,"TradeBalanceReport"
		,"User"
	);

	public $helpers = array(
		 "Common"
	);
	
	public function afterFilter() {
		$this->Common->deleteSessionEventId();
	}
	
	/*
	 * トップ
	 * @param string $event_id
	 */
	function v010login(){

		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try {
			
			// セッションがあればメニュー画面へ
			if ($this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_050010010: // トップ：ログインボタン押下
					
					// 入力データのチェック
					$this->MstAdmin->set($this->data);
					if ($this->MstAdmin->validates()) {

						// 全セッション削除
						$this->Session->destroy();
					
						// ログイン情報をセッションに格納
						$this->SessionAdminInfo->setAdminInfo($this->data[OBJECT_ID_050010010]);

						// メニュー画面へ
						$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);

					} else {

						// エラメッセージ
						$this->set("validation_errors", $this->MstAdmin->validationErrors);
						$this->set("data"             , $this->data);

					}
					
					break;
				
				default : // その他
					
					$data = array(
						 OBJECT_ID_050010010 => ""
						,OBJECT_ID_050010020 => ""
					);

					$this->set("data", $data);
			}
			
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "c050_admin/v010loginで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
			// セッション内の入力データ削除
			$this->Session->delete(SESSION_FORM_DATAS);
			
		}
	}
	
	/*
	 * 管理者メニュー
	 * @param string $event_id
	 */
	function v020menu(){

		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try {
			
			$event_id = $this->Common->getSessionEventId();
			
			// セッションが無ければログイン画面へ
			if (strcmp(EVENT_ID_999999999, $event_id) != 0 && !$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			switch ($event_id) {
				case EVENT_ID_050020010: // 投資家管理ボタン押下
					
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050030);
				
				case EVENT_ID_050020020: // 投資申込受付ボタン押下
					
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050080);
				
				case EVENT_ID_050020030: // ファンド管理ボタン押下
					
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050110);
				
				case EVENT_ID_050020040: // 返済金管理ボタン押下
					
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050190);
				
				case EVENT_ID_050020050: // 配当実行ボタン押下
					
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050220);
				
//				case EVENT_ID_050020060: // 配当実績ボタン押下
//					
//					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050250);
//				
				case EVENT_ID_050020070: // 休日設定ボタン押下
					
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050260);
				
				case EVENT_ID_050020080: // 報告書管理ボタン押下
					
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050370);
				
				case EVENT_ID_050020090: // メール送信ボタン押下
					
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050430);
				
				case EVENT_ID_050020100: // CSV DL ボタン押下
					
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050470);
				
				case EVENT_ID_050020110: // お知らせ送信 ボタン押下
					
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050480);
                                    
				case EVENT_ID_050020120: // 入金管理 ボタン押下
					
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050520);	
					
				case EVENT_ID_050020130: // 入会審査 ボタン押下
					
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050560);	
					
				default : // その他
					
			}
			
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "c050_admin/v020menuで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
		}
	}

	/*
	 * 投資家一覧
	 * @param string $event_id
	 */
	function v030lenderlist(){

		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_050030010: // 投資家一覧：メニューボタン押下
					
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);
				
				case EVENT_ID_050030020: // 投資家一覧：絞込みボタン押下
					
					$data = $this->data;
					
					$user_list = array();
					
					// 入力チェック
					$errors = $this->CheckC050->v030($data);
					if (is_null($errors)) {
						
						// ユーザリスト取得
						$user_list = $this->User->getUserList($data);
					}
					
					$this->set("errors"   , $errors);
					$this->set("data"     , $data);
					$this->set("user_list", $user_list);

					break;
					
				case EVENT_ID_050030030: // 投資家一覧：未承認ボタン押下
					
					$data = array(
						 SEARCH_ID_050030010 => ""
						,SEARCH_ID_050030020 => ""
						,SEARCH_ID_050030030 => ""
						,SEARCH_ID_050030040 => ""
						,SEARCH_ID_050030050 => ""
						,SEARCH_ID_050030055 => ""
						,SEARCH_ID_050030120 => CHECKBOX_OFF
						,SEARCH_ID_050030130 => CHECKBOX_ON
						,SEARCH_ID_050030140 => CHECKBOX_OFF
						,SEARCH_ID_050030150 => CHECKBOX_OFF
						,SEARCH_ID_050030160 => CHECKBOX_OFF
						,SEARCH_ID_050030170 => CHECKBOX_OFF
						,SEARCH_ID_050030180 => CHECKBOX_OFF
						,SEARCH_ID_050030190 => SORT_COLUMN_CODE_USER_APPLICATION_DATETIME
						,SEARCH_ID_050030200 => SORT_ORDER_CODE_DESC
						,SEARCH_ID_050030220 => CHECKBOX_ON
						,SEARCH_ID_050030230 => CHECKBOX_ON
					);
					
					// ユーザリスト取得
					$user_list = $this->User->getUserList($data);

					$this->set("data"     , $data);
					$this->set("user_list", $user_list);
					
					break;
					
				case EVENT_ID_050030040: // 投資家一覧：IDリンク押下
					
					$user_id = $this->data[HIDDEN_ID_000000020];
					$admin_info = $this->SessionAdminInfo->getAdminInfo();
					
					// 参照フラグをセッションに格納
					$this->Common->setSessionReferenceFlag(REFERENCE_FLAG_FALSE);
					
					// ユーザIDをセッションに格納
					$this->Common->setSessionUserId($user_id);
					
					// トランザクションスタート
					$this->Common->trnBegin();
					
					// ワーク作成
					$this->User->makeWrkUser($admin_info[LOGIN_ADMIN_ID], $user_id);
					
					// コミット
					$this->Common->trnCommit(); 
					
					// 投資家詳細(照会)へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050040);

				case EVENT_ID_999999999: // ViewTest
					
					$data = array(
						 SEARCH_ID_050030010 => ""
						,SEARCH_ID_050030020 => ""
						,SEARCH_ID_050030030 => ""
						,SEARCH_ID_050030040 => ""
						,SEARCH_ID_050030050 => "" 
						,SEARCH_ID_050030055 => ""
						,SEARCH_ID_050030120 => CHECKBOX_ON
						,SEARCH_ID_050030130 => CHECKBOX_ON
						,SEARCH_ID_050030140 => CHECKBOX_ON
						,SEARCH_ID_050030150 => CHECKBOX_ON
						,SEARCH_ID_050030160 => CHECKBOX_ON
						,SEARCH_ID_050030170 => CHECKBOX_ON
						,SEARCH_ID_050030180 => CHECKBOX_ON
						,SEARCH_ID_050030190 => ""
						,SEARCH_ID_050030200 => ""
						,SEARCH_ID_050030220 => CHECKBOX_ON
						,SEARCH_ID_050030230 => CHECKBOX_ON
					);

					$this->set("data", $data);
					
					// ダミーデータセット
					$this->set("user_list", $this->DummyData->adminLendelist());
					
					break;
					
				default : // その他
					
					$data = array(
						 SEARCH_ID_050030010 => ""
						,SEARCH_ID_050030020 => ""
						,SEARCH_ID_050030030 => ""
						,SEARCH_ID_050030040 => ""
						,SEARCH_ID_050030050 => "" 
						,SEARCH_ID_050030055 => ""
						,SEARCH_ID_050030120 => CHECKBOX_ON
						,SEARCH_ID_050030130 => CHECKBOX_ON
						,SEARCH_ID_050030140 => CHECKBOX_ON
						,SEARCH_ID_050030150 => CHECKBOX_ON
						,SEARCH_ID_050030160 => CHECKBOX_ON
						,SEARCH_ID_050030170 => CHECKBOX_ON
						,SEARCH_ID_050030180 => CHECKBOX_ON
						,SEARCH_ID_050030190 => ""
						,SEARCH_ID_050030200 => ""
						,SEARCH_ID_050030220 => CHECKBOX_ON
						,SEARCH_ID_050030230 => CHECKBOX_ON
					);

					$this->set("data", $data);
					
			}
			
			$list[CONFIG_0021] = Configure::read(CONFIG_0021);
			$list[CONFIG_0024] = Configure::read(CONFIG_0024);
			$list[CONFIG_0028] = Configure::read(CONFIG_0028);
			$list[CONFIG_0029] = Configure::read(CONFIG_0029);
			$list[CONFIG_0046] = Configure::read(CONFIG_0046);
			$this->set("list" , $list);

			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {

			$this->Common->trnRollback(); // ◆ロールバック◆

			// 例外処理
			$err_str = "c050_admin/v030lenderlistで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
			
		}
	}
	
	/*
	 * 投資家詳細(照会)
	 * @param string $event_id
	 */
	function v040lenderdetail(){

		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_050030040: // 投資家一覧：IDリンク押下
				case EVENT_ID_050060020: // 投資家詳細(確認)：更新ボタン押下
				case EVENT_ID_050050020: // 投資家詳細(入力)：承認ボタン押下
				case EVENT_ID_050050030: // 投資家詳細(入力)：拒否ボタン押下
				case EVENT_ID_050300020: // 交渉履歴：投資家情報ボタン押下
				case EVENT_ID_050460010: // PDF参照：戻るボタン押下
				
					// 管理者情報取得
					$admin_info = $this->SessionAdminInfo->getAdminInfo();
					// ワークデータ取得
					$data = $this->User->getWrkUserC050($admin_info[LOGIN_ADMIN_ID]);
					
					// 参照フラグセット
					$data[HIDDEN_ID_000000200] = $this->Common->getSessionReferenceFlag();
					
					$this->set("data", $data);
					
					break;
				
				case EVENT_ID_050040010: // 投資家詳細(照会)：更新ボタン押下
				case EVENT_ID_050040020: // 投資家詳細(照会)：承認／拒否ボタン押下
					
					// 投資家詳細(入力)へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050050);

				case EVENT_ID_050040030: // 投資家詳細(照会)：一覧ボタン押下
					
					// 投資家一覧へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050030);

				case EVENT_ID_050040040: // 投資家詳細(照会)：メニューボタン押下
					
					// メニューへ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);

				case EVENT_ID_050040050: // 投資家詳細(照会)：交渉履歴ボタン押下
					
					// メニューへ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050300);

				case EVENT_ID_050040060: // 投資家詳細(照会)：PDF参照ボタン押下
					
					// メニューへ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050460);

				case EVENT_ID_999999999: // ViewTest
					
					// ダミーデータセット
					$this->set("data", $this->DummyData->adminLenderdetail());
					
					break;
					
				default : // その他

					$user_id = "";
					if (isset($this->params["url"][GET_PARAM_INDEX_USER_ID])) {

						// ユーザID取得
						$user_id = $this->params["url"][GET_PARAM_INDEX_USER_ID];
						
						// 管理者情報取得
						$admin_info = $this->SessionAdminInfo->getAdminInfo();

						// 投資家ワーク作成
						// ユーザIDをセッションに格納
						$this->Common->setSessionUserId($user_id);

						// トランザクションスタート
						$this->Common->trnBegin();

						// ワーク作成
						$this->User->makeWrkUser($admin_info[LOGIN_ADMIN_ID], $user_id);

						// コミット
						$this->Common->trnCommit(); 
						
						// ワークデータ取得
						$data = $this->User->getWrkUserC050($admin_info[LOGIN_ADMIN_ID]);
						
						// 参照のみ
						$this->Common->setSessionReferenceFlag(REFERENCE_FLAG_TRUE);
						$data[HIDDEN_ID_000000200] = REFERENCE_FLAG_TRUE;
						
						$this->set("data", $data);
						
					}
					else {

						// イベントIDが取得できない場合メニュー画面へ
						$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050030);
					}
			}
			
			// プルダウンリスト
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
			$list[CONFIG_0024] = Configure::read(CONFIG_0024);
			$list[CONFIG_0030] = Configure::read(CONFIG_0030);
			$list[CONFIG_0031] = Configure::read(CONFIG_0031);
			$list[CONFIG_0032] = Configure::read(CONFIG_0032);
			$list[CONFIG_0033] = Configure::read(CONFIG_0033);
			$list[CONFIG_0038] = Configure::read(CONFIG_0038);
			$list[CONFIG_0039] = Configure::read(CONFIG_0039);
			$list[CONFIG_0040] = Configure::read(CONFIG_0040);
			$list[CONFIG_0046] = Configure::read(CONFIG_0046);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "c050_admin/v040lenderdetailで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
		}
	}
	
	/*
	 * 投資家詳細(入力)
	 */
	function v050lenderinput(){

        $uses = array('Image'); // Imageモデルを使うModel.Image.php table.images

        // ヘルパーの読み込み
        $helpers = array('Form', 'UploadPack.Upload');

		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");

                $session = $this->Session->read();
                $this->set("session",$session);
                $user_id = $session[CURRENT_USER_ID];//セッション情報からユーザーIDを取り出してセット
                $this->set("user_id",$user_id);
//print $user_id;

                $this->loadModel('Image');
                //登録されたデータ一覧を表示する
                $images = $this->Image->find('all',array(
                                                         'conditions' => array('title' => $user_id),
                                                         'order' => array('created' => 'desc'),
                                                         'limit' => 8));
                $this->set("images",$images);


		
		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_050060010: // 投資家詳細(確認)：戻るボタン押下

					// 管理者情報取得
					$admin_info = $this->SessionAdminInfo->getAdminInfo();
					
					// ワークデータ取得
					$data_before = $this->User->getWrkUserC050($admin_info[LOGIN_ADMIN_ID]);
					
					$data = $this->Common->getSessionFormData();
					
					foreach ($data as $key => $value) {
						$data_before[$key] = $value;
					}
					$this->set("data", $data_before);
					
					$this->set("correct", true);
					$this->set("approve", false);
					$this->set("admin_info", $admin_info);
					break;
				
				case EVENT_ID_050040010: // 投資家詳細(照会)：更新ボタン押下
					
					// 管理者情報取得
					$admin_info = $this->SessionAdminInfo->getAdminInfo();
					$this->set("review_auth", $admin_info[review_auth]);
					
					// ワークデータ取得
					$data = $this->User->getWrkUserC050($admin_info[LOGIN_ADMIN_ID]);
					
					$this->set("data", $data);
					
					$this->set("correct", true);
					$this->set("approve", false);
					break;
				
				case EVENT_ID_050040020: // 投資家詳細(照会)：承認／拒否ボタン押下
					
					// 管理者情報取得
					$admin_info = $this->SessionAdminInfo->getAdminInfo();
					// ワークデータ取得
					$data = $this->User->getWrkUserC050($admin_info[LOGIN_ADMIN_ID]);
					
					$this->set("data", $data);
					
					$this->set("correct", false);
					$this->set("approve", true);
					break;
				
				case EVENT_ID_050050010: // 投資家詳細(入力)：確認ボタン押下
					
					// 入力データをセッションにセット
					$this->Common->setSessionFormData($this->data);
					
					// 投資家詳細(確認)へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050060);

				case EVENT_ID_050050020: // 投資家詳細(入力)：承認ボタン押下
				case EVENT_ID_050050030: // 投資家詳細(入力)：拒否ボタン押下
					
					// 管理者情報取得
					$admin_info = $this->SessionAdminInfo->getAdminInfo();
					
					$err = $this->CheckC050->v060();
					
					if (is_null($err)) {
						// ユーザID取得
						$user_id = $this->Common->getSessionUserId();

						$reg_data = null;
						if (strcmp(EVENT_ID_050050020, $event_id) == 0) {

							// ユーザ状態更新：承認
							$reg_data = $this->User->updateUserStatus($admin_info, USER_STATUS_CODE_APPROVED, $this->data);
							
							// ユーザ登録承認時に入金口座を割当 (2018/02/02)
							$account_list = $this->Deposit->assignAccount($user_id, $admin_info);
							
						}
						else {

							// ユーザ状態更新：拒否
							$reg_data = $this->User->updateUserStatus($admin_info, USER_STATUS_CODE_REJECTED, $this->data);
						}
						$this->User->saveWrkUser($reg_data);

						// マスタ更新
						$this->User->saveMstUser($admin_info, $user_id);
						
						// 投資家詳細(確認)へ
						$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050040);
					}
					
					// ワークデータ取得
					$data = $this->User->getWrkUserC050($admin_info[LOGIN_ADMIN_ID]);
					
					$this->set("data", $data);
					$this->set("err" , $err);
					$this->set("correct", false);
					$this->set("approve", true);

					break;
				
				case EVENT_ID_050050040: // 投資家詳細(入力)：一覧ボタン押下
					
					// 投資家一覧へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050030);

				case EVENT_ID_050050050: // 投資家詳細(入力)：メニューボタン押下
				default : // その他
					
					// 投資家一覧へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050030);
					
			}
			
			// プルダウンリスト
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
			$list[CONFIG_0024] = Configure::read(CONFIG_0024);
			$list[CONFIG_0030] = Configure::read(CONFIG_0030);
			$list[CONFIG_0031] = Configure::read(CONFIG_0031);
			$list[CONFIG_0032] = Configure::read(CONFIG_0032);
			$list[CONFIG_0033] = Configure::read(CONFIG_0033);
			$list[CONFIG_0038] = Configure::read(CONFIG_0038);
			$list[CONFIG_0039] = Configure::read(CONFIG_0039);
			$list[CONFIG_0040] = Configure::read(CONFIG_0040);
			$list[CONFIG_0046] = Configure::read(CONFIG_0046);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "c050_admin/v050lenderinputで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
		}
	}
	
	/*
	 * 投資家詳細(確認)
	 * @param string $event_id
	 */
	function v060lenderconfirm(){

		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_050050010: // 投資家詳細(入力)：確認ボタン押下
					
					// 管理者情報取得
					$admin_info = $this->SessionAdminInfo->getAdminInfo();
					
					// ワークデータ取得
					$data = $this->User->getWrkUserC050($admin_info[LOGIN_ADMIN_ID]);
					
					$this->set("data_before", $data);
					$this->set("data"       , $this->Common->getSessionFormData());
					
					break;
				
				case EVENT_ID_050060010: // 投資家詳細(確認)：戻るボタン押下
					
					// 投資家詳細(更新)へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050050);

				case EVENT_ID_050060020: // 投資家詳細(確認)：更新ボタン押下
				
					// 管理者情報取得
					$admin_info = $this->SessionAdminInfo->getAdminInfo();
					
					$data_input = $this->Common->getSessionFormData();
					
					//排他キーチェック
					$err = $this->CheckC050->v060();
					if (is_null($err)) {
						
						// トランザクションスタート
						$this->Common->trnBegin();
						
						// データ登録
						$reg_data = $this->User->updateWrkUser($data_input);
						$this->User->saveWrkUser($reg_data);
					
						// ユーザID取得
						$user_id = $this->Common->getSessionUserId();
						$this->User->saveMstUser($admin_info, $user_id);
						
						// コミット
						$this->Common->trnCommit(); 
						
						// 投資家詳細(照会)へ
						$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050040);

					}
					
					// ワークデータ取得
					$data = $this->User->getWrkUserC050($admin_info[LOGIN_ADMIN_ID]);
					
					$this->set("err", $err);
					$this->set("data_before", $data);
					$this->set("data"       , $data_input);
					
					break;
				
				case EVENT_ID_999999999: // ViewTest
					
					// ダミーデータセット
					$this->set("data_before", $this->DummyData->adminLenderconfirmBefore());
					$this->set("data", $this->DummyData->adminLenderconfirm());
					break;
					
				default : // その他
					
					// 投資家一覧へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050030);
					
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
			$list[CONFIG_0024] = Configure::read(CONFIG_0024);
			$list[CONFIG_0030] = Configure::read(CONFIG_0030);
			$list[CONFIG_0031] = Configure::read(CONFIG_0031);
			$list[CONFIG_0032] = Configure::read(CONFIG_0032);
			$list[CONFIG_0033] = Configure::read(CONFIG_0033);
			$list[CONFIG_0038] = Configure::read(CONFIG_0038);
			$list[CONFIG_0039] = Configure::read(CONFIG_0039);
			$list[CONFIG_0040] = Configure::read(CONFIG_0040);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			$this->Common->trnRollback(); // ◆ロールバック◆
		
			// 例外処理
			$err_str = "c050_admin/v060lenderconfirmで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	
	/*
	 * 投資申込一覧(照会)
	 */
	function v070investmentapplication(){

		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_999999999: // ViewTest
					
					// ダミーデータセット
					$this->set("data_list", $this->DummyData->v050080());
					break;
					
				default : // その他
					
					$fund_data = null;
					if (isset($this->params["url"][GET_PARAM_INDEX_FUND_ID])) {
						
						$fund_id = $this->params["url"][GET_PARAM_INDEX_FUND_ID];
						
						$data[SEARCH_ID_050080025] = $fund_id;
						$data[SEARCH_ID_050080050] = CHECKBOX_ON;
						$data[SEARCH_ID_050080060] = CHECKBOX_ON;
						$data[SEARCH_ID_050080090] = SORT_COLUMN_CODE_INV_APPL_DATE;
						$data[SEARCH_ID_050080100] = SORT_ORDER_CODE_DESC;
						$data_list = $this->InvestmentHistory->getInvestmentApplicationList($data);
						
						$this->set("data_list", $data_list);
					}
					
			}
			
			$list[CONFIG_0034] = Configure::read(CONFIG_0034);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "c050_admin/v070investmentapplication で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
		}
	}
	
	/*
	 * 投資申込一覧(指定)
	 */
	function v080investmentapprove(){


		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_050080010: // メニューボタン押下
					
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);
				
				case EVENT_ID_050080020: // 絞込みボタン押下
					
					$data = $this->data;
					
					$data_list = $this->InvestmentHistory->getInvestmentApplicationList($data);
//$user_id = "83892133";
//$target_fund_id = "00216";
//$post_datetime = "2020-04-21 13:30:56";

                                foreach ($data_list as $keys => $values) {
                                    foreach ($values as $value) {
                                        $user_id        = !empty($value[COLUMN_1200020]) ? $value[COLUMN_1200020] : "";
                                        $target_fund_id       = !empty($value[COLUMN_1200040]) ? $value[COLUMN_1200040] : "";
                                        $post_datetime  = !empty($value[COLUMN_1200100]) ? $value[COLUMN_1200100] : "";
                                        $data_c[] = $this->InformationHistory->getInformation_coolimgcount($user_id, $target_fund_id, $post_datetime);
                                    }
                                } 

                                        foreach ($data_list as $key => $value) {
                                            $data_list[$key]['TrnInvestmentHistory']['cooling_f'] = $data_c[$key];
                                        }

					$this->set("data",      $data);
					$this->set("data_list", $data_list);
					break;
					
				case EVENT_ID_050080030: // 確認ボタン押下
					
					$data = $this->data;
					
					// 入力内容のチェック
					$err = $this->CheckC050->v080($data);
					
					// エラーがなければ確認画面へ
					if (is_null($err)) {
						
						$this->Common->setSessionFormData($data);
						$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050090);
					}
					
					$data_list = $this->InvestmentHistory->getInvestmentApplicationList($data);
                                foreach ($data_list as $keys => $values) {
                                    foreach ($values as $value) {
                                        $user_id        = !empty($value[COLUMN_1200020]) ? $value[COLUMN_1200020] : "";
                                        $target_fund_id       = !empty($value[COLUMN_1200040]) ? $value[COLUMN_1200040] : "";
                                        $post_datetime  = !empty($value[COLUMN_1200100]) ? $value[COLUMN_1200100] : "";
                                        $data_c[] = $this->InformationHistory->getInformation_coolimgcount($user_id, $target_fund_id, $post_datetime);
                                    }
                                } 

                                        foreach ($data_list as $key => $value) {
                                            $data_list[$key]['TrnInvestmentHistory']['cooling_f'] = $data_c[$key];
                                        }
					//print "<pre>";
                                        //print_r ($data_list);
                                        //print "</pre>";
                                        
					$this->set("validation_errors",  $err);
					$this->set("data", $data);
					$this->set("data_list", $data_list);
					
					break;
					
				case EVENT_ID_050090010: // 投資申込一覧(確認)：戻るボタン押下

					$data = $this->Common->getSessionFormData();
					
					$data_list = $this->InvestmentHistory->getInvestmentApplicationList($data);
					
					$this->set("event_id", $event_id);
					
					$this->set("data", $data);
					$this->set("data_list", $data_list);
					break;
					
				case EVENT_ID_999999999: // ViewTest
					
					$data = array(
						 SEARCH_ID_050080010 => ""
						,SEARCH_ID_050080015 => ""
						,SEARCH_ID_050080020 => ""
						,SEARCH_ID_050080030 => ""
						,SEARCH_ID_050080040 => ""
						,SEARCH_ID_050080050 => CHECKBOX_ON
						,SEARCH_ID_050080060 => CHECKBOX_OFF
						,SEARCH_ID_050080070 => CHECKBOX_OFF
						,SEARCH_ID_050080080 => CHECKBOX_ON
						,SEARCH_ID_050080090 => SORT_COLUMN_CODE_INV_APPL_DATE // ソート項目：申込日時
						,SEARCH_ID_050080100 => SORT_ORDER_CODE_DESC           // ソート順：降順
						,SEARCH_ID_050080110 => ""
						,SEARCH_ID_050080120 => ""
					);
					
					$this->set("data", $data);
					
					// ダミーデータセット
					$this->set("data_list", $this->DummyData->v050080());
					break;
					
				case EVENT_ID_050020020: // メニュー：投資申込受付ボタン押下
				case EVENT_ID_050100010: // 投資申込一覧(完了)：一覧に戻るボタン押下
				default : // その他
					
					$data = array(
						 SEARCH_ID_050080010 => ""
						,SEARCH_ID_050080015 => ""
						,SEARCH_ID_050080020 => ""
						,SEARCH_ID_050080030 => ""
						,SEARCH_ID_050080040 => ""
						,SEARCH_ID_050080050 => CHECKBOX_ON
						,SEARCH_ID_050080060 => CHECKBOX_OFF
						,SEARCH_ID_050080070 => CHECKBOX_OFF
						,SEARCH_ID_050080080 => CHECKBOX_ON
						,SEARCH_ID_050080090 => SORT_COLUMN_CODE_INV_APPL_DATE // ソート項目：申込日時
						,SEARCH_ID_050080100 => SORT_ORDER_CODE_DESC           // ソート順：降順
						,SEARCH_ID_050080110 => ""
						,SEARCH_ID_050080120 => ""
					);
					
					$this->set("data", $data);
					
			}
			
			$list[CONFIG_0029] = Configure::read(CONFIG_0029);
			$list[CONFIG_0034] = Configure::read(CONFIG_0034);
			$list[CONFIG_0047] = Configure::read(CONFIG_0047);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "c050_admin/v080investmentinputで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
		}
	}
	
	/*
	 * 投資申込一覧(確認)
	 */
	function v090investmentconfirm(){

            
                $this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try {
                                   			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_050080030: // 投資申込一覧(指定)：確認ボタン押下
					
					$data = $this->Common->getSessionFormData();
					
					$data_list = $this->InvestmentHistory->getInvestmentApplicationListConfirm($data);
					
					$this->set("data",      $data);
					$this->set("data_list", $data_list);
                                        
                                       //var_dump($data_list);
                                        break;
				
				case EVENT_ID_050090010: // 戻るボタン押下
					
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050080);
					
					break;
					
				case EVENT_ID_050090020: // 決定ボタン押下
                                          //取り消しデータのみforce_flagとagreement_flagを0にする
                                          $data = $this->Common->getSessionFormData();
                                          $data_list = $this->InvestmentHistory->getInvestmentApplicationListConfirm($data);
                                        foreach($data_list as $key1 => $value1) {
                                               foreach($value1 as $key => $value) {

                                                 $iv_user_id = $value['user_id'];
                                                 $iv_fund_id = $value['fund_id'];
                                                 $iv_approval_datetime = $value['approval_datetime'];
                                                 $iv_hidden_id = $value['hidden_id'];
                                      //取り消しフラグのデータのみ実行
                                      if($iv_hidden_id == 2){
                                         $this->TrnInformationHistory->updateAll(
                                                                                 array(
                                                                                        'force_flag' => 0,'agreement_flag' => 0),
                                                                                 array('user_id' => $iv_user_id,
                                                                                       'target_fund_id' => $iv_fund_id,
                                                                                       'info_date' => $iv_approval_datetime ));
                                                     }
                                   
                                                }
                                          }
                                	// ◆トランザクションスタート◆
					$this->Common->trnBegin();
					
					$data = $this->Common->getSessionFormData();
                         
                                       
                                        $exp_date = $this->Calendar->getNextBusinessDate(EXPIRATION_TERM_INVESTMENT);
			       	// 投資申込状態変更
			       	        $this->InvestmentHistory->updateInvestmentStatus($data, $exp_date);
                                        //$this->InformationHistory->updateInformationForce($data_list);    
                                                                
			       	// ◆コミット◆
			       	        $this->Common->trnCommit();
					
					// 完了画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050100);
					
					break;
					
				case EVENT_ID_999999999: // ViewTest

					// ダミーデータセット
					$this->set("data_list", $this->DummyData->v050080());
					break;
				
				default : // その他
	
                                    
                                    
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);
			}
			
			$list[CONFIG_0034] = Configure::read(CONFIG_0034);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			$this->Common->trnRollback(); // ◆ロールバック◆
			//
			// 例外処理
			$err_str = "c050_admin/v090investmentconfirmで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
		}
	}
	
	/*
	 * 投資申込一覧(完了)
	 */
	function v100investmentcomplete(){

		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_050090020: // 投資申込一覧(確認)：決定ボタン押下
				case EVENT_ID_999999999: // ViewTest
					
					break;
					
				case EVENT_ID_050100010: // 一覧に戻るボタン押下
					
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050080);
					
					break;
					
				default : // その他
					
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);
			}
			
			$this->set("action", $this->Common->getCurrentAction());
		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "c050_admin/v100investmentcompleteで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
		}
	}
	
	/*
	 * ファンド一覧
	 */
	function v110fundlist(){

		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			// 不要なセッション情報を削除
			$this->Common->deleteSessionFundInfo();     // ファンド情報
			$this->Common->deleteSessionLoanNo();       // 貸付番号
			$this->Common->deleteSessionProcTypeFund(); // 処理区分(ファンド)
			$this->Common->deleteSessionProcTypeLoan(); // 処理区分(貸付内容)
			
			$event_id = $this->Common->getSessionEventId();
			
			// 管理者情報取得
			$admin_info = $this->SessionAdminInfo->getAdminInfo();
			
			switch ($event_id) {
				case EVENT_ID_050110010: // メニューボタン押下
					
					// 管理者メニューへ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);
					
				case EVENT_ID_050110020: // 絞込みボタン押下
					
					// 検索条件再セット
					$data = $this->data;
					
					// ファンド一覧取得
					$data_list = $this->Fund->getFundListAdmin($data);

					$this->set("data_list", $data_list);

					break;
					
				case EVENT_ID_050110030: // 新規登録ボタン押下
					
					$this->Common->setSessionEventId($event_id);
					
					// トランザクション開始
					$this->Common->trnBegin();
					
					// ファンドワーク作成
					$this->Fund->makeWrkFundNew($admin_info[LOGIN_ADMIN_ID]);
					
					// コミット
					$this->Common->trnCommit();
					
					// ファンド詳細(入力)へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050130);
					
				case EVENT_ID_050110040: // ファンドIDリンク押下
					
					// トランザクション開始
					$this->Common->trnBegin();
					
					// ファンドワーク作成
					$this->Fund->makeWrkFund($admin_info[LOGIN_ADMIN_ID], $this->data[HIDDEN_ID_000000030]);
					
					// コミット
					$this->Common->trnCommit();
					
					// ファンド詳細(照会)へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050120);
					
				case EVENT_ID_050110050: // 報告書発行対象ボタン押下
					
					// 報告書発行対象ファンド一覧へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050340);
					
				default : // その他
					
					$data[SEARCH_ID_050110010] = "";
					$data[SEARCH_ID_050110020] = "";
					$data[SEARCH_ID_050110030] = "";
					$data[SEARCH_ID_050110040] = "";
					$data[SEARCH_ID_050110050] = "";
					$data[SEARCH_ID_050110060] = "";
					$data[SEARCH_ID_050110070] = "";
					$data[SEARCH_ID_050110080] = "";
					$data[SEARCH_ID_050110110] = SORT_COLUMN_CODE_FUND_ID;
					$data[SEARCH_ID_050110120] = SORT_ORDER_CODE_ASC;
					
			}
			
			// 未公開の運用報告書データの有無を確認
			if (!$this->OperatingReport->checkReleaseReportDataExistence()) {
				$this->set("report", true);
			}
			
			$this->set("data", $data);
			
			$list[CONFIG_0029] = Configure::read(CONFIG_0029);
			$list[CONFIG_0035] = Configure::read(CONFIG_0035);
			$list[CONFIG_0036] = Configure::read(CONFIG_0036);
			$this->set("list" , $list);
					
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			$this->Common->trnRollback();
			
			// 例外処理
			$err_str = "c050_admin/v110fundlistで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
		}
	}
	
	/*
	 * ファンド詳細(照会)
	 */
	function v120funddetail(){

		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			// 不要なセッション情報を削除
			$this->Common->deleteSessionLoanNo();       // 貸付番号

			// イベントID取得
			$event_id = $this->Common->getSessionEventId();
			
			// 管理者情報取得
			$admin_info = $this->SessionAdminInfo->getAdminInfo();
			
			$data           = null;
			$loan_list      = null;
			$repayment_list = null;
			
			switch ($event_id) {
				case EVENT_ID_050110040: // ファンド一覧      ：ファンドIDリンク押下
				case EVENT_ID_050150010: // ファンド詳細(完了)：戻るボタン押下
				case EVENT_ID_050270010: // 報告書選択画面    ：戻るボタン
					
					// ファンドワーク取得
					$wrk_data = $this->Fund->getWrkFund($admin_info[LOGIN_ADMIN_ID]);
					foreach ($wrk_data as $key => $values) {
						foreach ($values as $value) {
							
							$this->Common->setSessionFundInfo($value[COLUMN_1400010], $value[COLUMN_1400020]);

							$data = array(
								 OBJECT_ID_050130010 => $value[COLUMN_1400010]
								,OBJECT_ID_050130020 => $value[COLUMN_1400020]
								,OBJECT_ID_050130030 => number_format($value[COLUMN_1400030]) // 貸付予定額
								,OBJECT_ID_050130040 => number_format($value[COLUMN_1400040]) // 貸付額
								,OBJECT_ID_050130050 => number_format($value[COLUMN_1400050]) // 最低成立額
								,OBJECT_ID_050130060 => number_format($value[COLUMN_1400060]) // 最低投資額
								,OBJECT_ID_050130070 => !empty($value[COLUMN_1400070]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400070])) : ""
								,OBJECT_ID_050130080 => !empty($value[COLUMN_1400070]) ? date(TIME_FORMAT, strtotime($value[COLUMN_1400070])) : ""
								,OBJECT_ID_050130090 => !empty($value[COLUMN_1400080]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400080])) : ""
								,OBJECT_ID_050130100 => !empty($value[COLUMN_1400080]) ? date(TIME_FORMAT, strtotime($value[COLUMN_1400080])) : ""
								,OBJECT_ID_050130110 => !empty($value[COLUMN_1400090]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400090])) : ""
								,OBJECT_ID_050130120 => !empty($value[COLUMN_1400090]) ? date(TIME_FORMAT, strtotime($value[COLUMN_1400090])) : ""
								,OBJECT_ID_050130130 => !empty($value[COLUMN_1400100]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400100])) : ""
								,OBJECT_ID_050130140 => !empty($value[COLUMN_1400110]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400110])) : ""
								,OBJECT_ID_050130150 => $value[COLUMN_1400120]
								,OBJECT_ID_050130160 => $value[COLUMN_1400130]
								,OBJECT_ID_050130170 => $value[COLUMN_1400140]
								,OBJECT_ID_050130180 => $value[COLUMN_1400150]
								,OBJECT_ID_050130200 => $value[COLUMN_1400170]
                                                                ,OBJECT_ID_050130201 => !empty($value[COLUMN_1400172]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400172])) : ""
                                                                ,OBJECT_ID_050130202 => $value[COLUMN_1400171]
                                                                ,OBJECT_ID_050130203 => !empty($value[COLUMN_1400173]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400173])) : ""
					,OBJECT_ID_050130210 => $value[COLUMN_1400180]
					,OBJECT_ID_050130220 => $value[COLUMN_1400190]
					,OBJECT_ID_050130230 => $value[COLUMN_1400200]
					,OBJECT_ID_050130240 => $value[COLUMN_1400210]
					,OBJECT_ID_050130250 => $value[COLUMN_1400220]
					,OBJECT_ID_050130260 => $value[COLUMN_1400230]
					,OBJECT_ID_050130270 => $value[COLUMN_1400240]
					,OBJECT_ID_050130280 => $value[COLUMN_1400250]
					,OBJECT_ID_050130290 => $value[COLUMN_1400260]
					,OBJECT_ID_050130300 => $value[COLUMN_1400270]
					,OBJECT_ID_050130310 => $value[COLUMN_1400280]
					,OBJECT_ID_050130320 => $value[COLUMN_1400290]
					,OBJECT_ID_050130330 => $value[COLUMN_1400300]
					,OBJECT_ID_050130340 => $value[COLUMN_1400310]
					,OBJECT_ID_050130350 => $value[COLUMN_1400320]
					,OBJECT_ID_050130360 => $value[COLUMN_1400330]
					,OBJECT_ID_050130370 => $value[COLUMN_1400340]
					,OBJECT_ID_050130380 => $value[COLUMN_1400350]
					,OBJECT_ID_050130390 => $value[COLUMN_1400360]
					,OBJECT_ID_050130400 => $value[COLUMN_1400370]
					,OBJECT_ID_050130410 => $value[COLUMN_1400380]
					,OBJECT_ID_050130420 => $value[COLUMN_1400390]
					,OBJECT_ID_050130430 => $value[COLUMN_1400400]
					,OBJECT_ID_050130440 => $value[COLUMN_1400410]
					,OBJECT_ID_050130450 => $value[COLUMN_1400420]
					,OBJECT_ID_050130460 => $value[COLUMN_1400430]
					,OBJECT_ID_050130470 => $value[COLUMN_1400440]
					,OBJECT_ID_050130480 => $value[COLUMN_1400450]
					,OBJECT_ID_050130490 => $value[COLUMN_1400460]
					,OBJECT_ID_050130500 => $value[COLUMN_1400470]
					,OBJECT_ID_050130510 => $value[COLUMN_1400480]
					,OBJECT_ID_050130520 => $value[COLUMN_1400490]
					,OBJECT_ID_050130530 => $value[COLUMN_1400500]
					,OBJECT_ID_050130540 => $value[COLUMN_1400510]
					,OBJECT_ID_050130550 => $value[COLUMN_1400520]
					,OBJECT_ID_050130560 => $value[COLUMN_1400530]
					,OBJECT_ID_050130570 => $value[COLUMN_1400540]
					,OBJECT_ID_050130580 => $value[COLUMN_1400550]
					,OBJECT_ID_050130590 => $value[COLUMN_1400560]
					,OBJECT_ID_050130600 => $value[COLUMN_1400570]
					,OBJECT_ID_050130610 => $value[COLUMN_1400580]
					,OBJECT_ID_050130620 => number_format($value[COLUMN_1400590])
					,OBJECT_ID_050130630 => number_format($value[COLUMN_1400600])
					,OBJECT_ID_050130640 => $value[COLUMN_1400610]
					,OBJECT_ID_050130650 => number_format($value[COLUMN_1400620])
					,OBJECT_ID_050130660 => $value[COLUMN_1400630]
					,OBJECT_ID_050130670 => number_format($value[COLUMN_1400640])
					,OBJECT_ID_050130680 => !empty($value[COLUMN_1400650]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400650])) : ""
					,OBJECT_ID_050130690 => number_format($value[COLUMN_1400660])
					,OBJECT_ID_050130700 => $value[COLUMN_1400670]
					,OBJECT_ID_050130710 => $value[COLUMN_1400680]
					,OBJECT_ID_050130720 => $value[COLUMN_1400690]
					,OBJECT_ID_050130730 => $value[COLUMN_1400700]
					,OBJECT_ID_050130740 => $value[COLUMN_1400710]
					,OBJECT_ID_050130750 => $value[COLUMN_1400720]
					,OBJECT_ID_050130760 => $value[COLUMN_1400730]
					,OBJECT_ID_050130770 => $value[COLUMN_1400740]
					,OBJECT_ID_050130780 => $value[COLUMN_1400750]
					,OBJECT_ID_050130790 => $value[COLUMN_1400760]
					,OBJECT_ID_050130800 => $value[COLUMN_1400770]
					,OBJECT_ID_050130810 => $value[COLUMN_1400780]
					,OBJECT_ID_050130820 => $value[COLUMN_1400790]
					,OBJECT_ID_050130830 => $value[COLUMN_1400800]
					,OBJECT_ID_050130840 => $value[COLUMN_1400810]
					,OBJECT_ID_050130850 => $value[COLUMN_1400820]
					,OBJECT_ID_050130860 => $value[COLUMN_1400830]
					,OBJECT_ID_050130870 => $value[COLUMN_1400840]
					,OBJECT_ID_050130880 => $value[COLUMN_1400850]
					,OBJECT_ID_050130890 => $value[COLUMN_1400860]
					,OBJECT_ID_050130900 => $value[COLUMN_1400870]
					,OBJECT_ID_050130910 => $value[COLUMN_1400880]
					,OBJECT_ID_050130920 => $value[COLUMN_1400890]
					,OBJECT_ID_050130930 => $value[COLUMN_1400900]
					,OBJECT_ID_050130940 => $value[COLUMN_1400910]
					,OBJECT_ID_050130950 => $value[COLUMN_1400920]
					,OBJECT_ID_050130960 => $value[COLUMN_1400930]
					,OBJECT_ID_050130970 => $value[COLUMN_1400940]
					,OBJECT_ID_050130980 => number_format($value[COLUMN_1400950])//対象不動産価格
					,OBJECT_ID_050130990 => $value[COLUMN_1400960]
					,OBJECT_ID_050131000 => $value[COLUMN_1400970]
					,OBJECT_ID_050131010 => $value[COLUMN_1400980]
					,OBJECT_ID_050131020 => $value[COLUMN_1400990]
					,OBJECT_ID_050131030 => $value[COLUMN_1401000]
					,OBJECT_ID_050131040 => number_format($value[COLUMN_1401010])//全賃料収入
					,OBJECT_ID_050131050 => $value[COLUMN_1401020]
					,OBJECT_ID_050131060 => $value[COLUMN_1401030]
					,OBJECT_ID_050131070 => $value[COLUMN_1401040]
					,OBJECT_ID_050131080 => $value[COLUMN_1401050]
					,OBJECT_ID_050131090 => $value[COLUMN_1401060]
					,OBJECT_ID_050131100 => $value[COLUMN_1401070]
					,OBJECT_ID_050131110 => $value[COLUMN_1401080]
					,OBJECT_ID_050131120 => $value[COLUMN_1401090]
					,OBJECT_ID_050131130 => $value[COLUMN_1401100]
					,OBJECT_ID_050131140 => $value[COLUMN_1401110]
					,OBJECT_ID_050131150 => $value[COLUMN_1401120]
					,OBJECT_ID_050131160 => $value[COLUMN_1401130]
					,OBJECT_ID_050131170 => $value[COLUMN_1401140]
					,OBJECT_ID_050131180 => $value[COLUMN_1401150]
					,OBJECT_ID_050131190 => $value[COLUMN_1401160]
					,OBJECT_ID_050131200 => number_format($value[COLUMN_1401170])//テナント年間賃料
					,OBJECT_ID_050131210 => $value[COLUMN_1401180]
					,OBJECT_ID_050131220 => !empty($value[COLUMN_1401190]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401190])) : ""//テナント契約満了日
					,OBJECT_ID_050131230 => $value[COLUMN_1401200]
					,OBJECT_ID_050131240 => $value[COLUMN_1401210]
					,OBJECT_ID_050131250 => $value[COLUMN_1401220]
					,OBJECT_ID_050131260 => $value[COLUMN_1401230]
					,OBJECT_ID_050131270 => $value[COLUMN_1401240]
					,OBJECT_ID_050131280 => $value[COLUMN_1401250]
					,OBJECT_ID_050131290 => $value[COLUMN_1401260]
					,OBJECT_ID_050131300 => $value[COLUMN_1401270]
					,OBJECT_ID_050131310 => $value[COLUMN_1401280]
					,OBJECT_ID_050131320 => $value[COLUMN_1401290]
					,OBJECT_ID_050131330 => $value[COLUMN_1401300]
					,OBJECT_ID_050131340 => $value[COLUMN_1401310]
					,OBJECT_ID_050131350 => $value[COLUMN_1401320]
					,OBJECT_ID_050131360 => $value[COLUMN_1401330]
					,OBJECT_ID_050131370 => $value[COLUMN_1401340]
					,OBJECT_ID_050131380 => number_format($value[COLUMN_1401350])//出資総額
					,OBJECT_ID_050131390 => number_format($value[COLUMN_1401360])//出資総口数
					,OBJECT_ID_050131400 => number_format($value[COLUMN_1401370])//優先出資総額
					,OBJECT_ID_050131410 => number_format($value[COLUMN_1401380])//優先出資口数
					,OBJECT_ID_050131420 => number_format($value[COLUMN_1401390])//劣後出資総額
					,OBJECT_ID_050131430 => number_format($value[COLUMN_1401400])//劣後出資口数
					,OBJECT_ID_050131440 => $value[COLUMN_1401410]
					,OBJECT_ID_050131450 => !empty($value[COLUMN_1401420]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401420])) : ""
					,OBJECT_ID_050131460 => !empty($value[COLUMN_1401430]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401430])) : ""
					,OBJECT_ID_050131470 => !empty($value[COLUMN_1401440]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401440])) : ""
					,OBJECT_ID_050131480 => $value[COLUMN_1401450]
					,OBJECT_ID_050131490 => !empty($value[COLUMN_1401460]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401460])) : ""
					,OBJECT_ID_050131500 => !empty($value[COLUMN_1401470]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401470])) : ""
					,OBJECT_ID_050131510 => $value[COLUMN_1401480]
					,OBJECT_ID_050131520 => !empty($value[COLUMN_1401490]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401490])) : ""
					,OBJECT_ID_050131530 => $value[COLUMN_1401500]
					,OBJECT_ID_050131540 => $value[COLUMN_1401510]
					,OBJECT_ID_050131550 => $value[COLUMN_1401520]
					,OBJECT_ID_050131560 => $value[COLUMN_1401530]
					,OBJECT_ID_050131570 => !empty($value[COLUMN_1401540]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401540])) : ""
                    ,OBJECT_ID_050131580 => $value[COLUMN_1401550]
                    ,OBJECT_ID_050131590 => $value[COLUMN_1401560]
                    ,OBJECT_ID_050131600 => $value[COLUMN_1401570]
                    ,OBJECT_ID_050131610 => $value[COLUMN_1401580]
                    ,OBJECT_ID_050131620 => $value[COLUMN_1401590]
                    ,OBJECT_ID_050131630 => $value[COLUMN_1401600]
                    ,OBJECT_ID_050131640 => $value[COLUMN_1401610]
                    ,OBJECT_ID_050131650 => $value[COLUMN_1401620]
                    ,OBJECT_ID_050131660 => $value[COLUMN_1401630]
                    ,OBJECT_ID_050131670 => $value[COLUMN_1401640]
                    ,OBJECT_ID_050131680 => $value[COLUMN_1401650]
                    ,OBJECT_ID_050131690 => $value[COLUMN_1401660]
                    ,OBJECT_ID_050131700 => $value[COLUMN_1401670]
                    ,OBJECT_ID_050131710 => $value[COLUMN_1401680]
                    ,OBJECT_ID_050131720 => $value[COLUMN_1401690]
                    ,OBJECT_ID_050131730 => $value[COLUMN_1401700]
                    ,OBJECT_ID_050131740 => $value[COLUMN_1401710]
                    ,OBJECT_ID_050131750 => $value[COLUMN_1401720]
                    ,OBJECT_ID_050131760 => $value[COLUMN_1401730]
                    ,OBJECT_ID_050131770 => $value[COLUMN_1401740]
                    ,OBJECT_ID_050131780 => $value[COLUMN_1401750]
                    ,OBJECT_ID_050131790 => $value[COLUMN_1401760]
                    ,OBJECT_ID_050131800 => $value[COLUMN_1401770]
                    ,OBJECT_ID_050131810 => $value[COLUMN_1401780]
                    ,OBJECT_ID_050131820 => $value[COLUMN_1401790]


								,OBJECT_ID_050130190 => number_format($this->Fund->getTotalInvestmentAmount($value[COLUMN_1400010]))
							);
						}
					}
					
					// 貸付ワークリスト取得
					$loan_list      = $this->Fund->getWrkLoanList($admin_info[LOGIN_ADMIN_ID]);
					$repayment_list = $this->Fund->getWrkFundRepayment($admin_info[LOGIN_ADMIN_ID]);
					
					break;
					
				case EVENT_ID_050120010: // 修正ボタン押下
					
					// ファンド詳細(入力)へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050130);
					
				case EVENT_ID_050120030: // 一覧ボタン押下
					
					// 一覧へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050110);
					
				case EVENT_ID_050120040: // メニューボタン押下
					
					// メニューへ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);
					
				case EVENT_ID_050120070: // 報告書ボタン押下
					
					// 運用報告書選択へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050270);
					
				case EVENT_ID_999999999:
					
					$wrk_data = $this->DummyData->v050130();
					
					foreach ($wrk_data as $key => $values) {
						foreach ($values as $value) {

							$data = array(
								 OBJECT_ID_050130010 => $value[COLUMN_1400010]
								,OBJECT_ID_050130020 => $value[COLUMN_1400020]
								,OBJECT_ID_050130030 => number_format($value[COLUMN_1400030])
								,OBJECT_ID_050130040 => number_format($value[COLUMN_1400040])
								,OBJECT_ID_050130050 => number_format($value[COLUMN_1400050])
								,OBJECT_ID_050130060 => number_format($value[COLUMN_1400060])
								,OBJECT_ID_050130070 => !empty($value[COLUMN_1400070]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400070])) : ""
								,OBJECT_ID_050130080 => !empty($value[COLUMN_1400070]) ? date(TIME_FORMAT, strtotime($value[COLUMN_1400070])) : ""
								,OBJECT_ID_050130090 => !empty($value[COLUMN_1400080]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400080])) : ""
								,OBJECT_ID_050130100 => !empty($value[COLUMN_1400080]) ? date(TIME_FORMAT, strtotime($value[COLUMN_1400080])) : ""
								,OBJECT_ID_050130110 => !empty($value[COLUMN_1400090]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400090])) : ""
								,OBJECT_ID_050130120 => !empty($value[COLUMN_1400090]) ? date(TIME_FORMAT, strtotime($value[COLUMN_1400090])) : ""
								,OBJECT_ID_050130130 => !empty($value[COLUMN_1400100]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400100])) : ""
								,OBJECT_ID_050130140 => !empty($value[COLUMN_1400110]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400110])) : ""
								,OBJECT_ID_050130150 => $value[COLUMN_1400120]
								,OBJECT_ID_050130160 => $value[COLUMN_1400130]
								,OBJECT_ID_050130170 => $value[COLUMN_1400140]
								,OBJECT_ID_050130180 => $value[COLUMN_1400150]
								,OBJECT_ID_050130200 => $value[COLUMN_1400170]
                                                                ,OBJECT_ID_050130201 => !empty($value[COLUMN_1400172]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400172])) : ""
								,OBJECT_ID_050130202 => $value[COLUMN_1400171]
                                                                ,OBJECT_ID_050130203 => !empty($value[COLUMN_1400173]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400173])) : ""
                                                        ,OBJECT_ID_050130210 => $value[COLUMN_1400180]
							,OBJECT_ID_050130220 => $value[COLUMN_1400190]
							,OBJECT_ID_050130230 => $value[COLUMN_1400200]
							,OBJECT_ID_050130240 => $value[COLUMN_1400210]
							,OBJECT_ID_050130250 => $value[COLUMN_1400220]
							,OBJECT_ID_050130260 => $value[COLUMN_1400230]
							,OBJECT_ID_050130270 => $value[COLUMN_1400240]
							,OBJECT_ID_050130280 => $value[COLUMN_1400250]
							,OBJECT_ID_050130290 => $value[COLUMN_1400260]
							,OBJECT_ID_050130300 => $value[COLUMN_1400270]
							,OBJECT_ID_050130310 => $value[COLUMN_1400280]
							,OBJECT_ID_050130320 => $value[COLUMN_1400290]
							,OBJECT_ID_050130330 => $value[COLUMN_1400300]
							,OBJECT_ID_050130340 => $value[COLUMN_1400310]
							,OBJECT_ID_050130350 => $value[COLUMN_1400320]
							,OBJECT_ID_050130360 => $value[COLUMN_1400330]
							,OBJECT_ID_050130370 => $value[COLUMN_1400340]
							,OBJECT_ID_050130380 => $value[COLUMN_1400350]
							,OBJECT_ID_050130390 => $value[COLUMN_1400360]
							,OBJECT_ID_050130400 => $value[COLUMN_1400370]
							,OBJECT_ID_050130410 => $value[COLUMN_1400380]
							,OBJECT_ID_050130420 => $value[COLUMN_1400390]
							,OBJECT_ID_050130430 => $value[COLUMN_1400400]
							,OBJECT_ID_050130440 => $value[COLUMN_1400410]
							,OBJECT_ID_050130450 => $value[COLUMN_1400420]
							,OBJECT_ID_050130460 => $value[COLUMN_1400430]
							,OBJECT_ID_050130470 => $value[COLUMN_1400440]
							,OBJECT_ID_050130480 => $value[COLUMN_1400450]
							,OBJECT_ID_050130490 => $value[COLUMN_1400460]
							,OBJECT_ID_050130500 => $value[COLUMN_1400470]
							,OBJECT_ID_050130510 => $value[COLUMN_1400480]
							,OBJECT_ID_050130520 => $value[COLUMN_1400490]
							,OBJECT_ID_050130530 => $value[COLUMN_1400500]
							,OBJECT_ID_050130540 => $value[COLUMN_1400510]
							,OBJECT_ID_050130550 => $value[COLUMN_1400520]
							,OBJECT_ID_050130560 => $value[COLUMN_1400530]
							,OBJECT_ID_050130570 => $value[COLUMN_1400540]
							,OBJECT_ID_050130580 => $value[COLUMN_1400550]
							,OBJECT_ID_050130590 => $value[COLUMN_1400560]
							,OBJECT_ID_050130600 => $value[COLUMN_1400570]
							,OBJECT_ID_050130610 => $value[COLUMN_1400580]
							,OBJECT_ID_050130620 => number_format($value[COLUMN_1400590])
							,OBJECT_ID_050130630 => number_format($value[COLUMN_1400600])
							,OBJECT_ID_050130640 => $value[COLUMN_1400610]
							,OBJECT_ID_050130650 => number_format($value[COLUMN_1400620])
							,OBJECT_ID_050130660 => $value[COLUMN_1400630]
							,OBJECT_ID_050130670 => number_format($value[COLUMN_1400640])
							,OBJECT_ID_050130680 => !empty($value[COLUMN_1400650]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400650])) : ""
							,OBJECT_ID_050130690 => number_format($value[COLUMN_1400660])
							,OBJECT_ID_050130700 => $value[COLUMN_1400670]
							,OBJECT_ID_050130710 => $value[COLUMN_1400680]
							,OBJECT_ID_050130720 => $value[COLUMN_1400690]
							,OBJECT_ID_050130730 => $value[COLUMN_1400700]
							,OBJECT_ID_050130740 => $value[COLUMN_1400710]
							,OBJECT_ID_050130750 => $value[COLUMN_1400720]
							,OBJECT_ID_050130760 => $value[COLUMN_1400730]
							,OBJECT_ID_050130770 => $value[COLUMN_1400740]
							,OBJECT_ID_050130780 => $value[COLUMN_1400750]
							,OBJECT_ID_050130790 => $value[COLUMN_1400760]
							,OBJECT_ID_050130800 => $value[COLUMN_1400770]
							,OBJECT_ID_050130810 => $value[COLUMN_1400780]
							,OBJECT_ID_050130820 => $value[COLUMN_1400790]
							,OBJECT_ID_050130830 => $value[COLUMN_1400800]
							,OBJECT_ID_050130840 => $value[COLUMN_1400810]
							,OBJECT_ID_050130850 => $value[COLUMN_1400820]
							,OBJECT_ID_050130860 => $value[COLUMN_1400830]
							,OBJECT_ID_050130870 => $value[COLUMN_1400840]
							,OBJECT_ID_050130880 => $value[COLUMN_1400850]
							,OBJECT_ID_050130890 => $value[COLUMN_1400860]
							,OBJECT_ID_050130900 => $value[COLUMN_1400870]
							,OBJECT_ID_050130910 => $value[COLUMN_1400880]
							,OBJECT_ID_050130920 => $value[COLUMN_1400890]
							,OBJECT_ID_050130930 => $value[COLUMN_1400900]
							,OBJECT_ID_050130940 => $value[COLUMN_1400910]
							,OBJECT_ID_050130950 => $value[COLUMN_1400920]
							,OBJECT_ID_050130960 => $value[COLUMN_1400930]
							,OBJECT_ID_050130970 => $value[COLUMN_1400940]
							,OBJECT_ID_050130980 => $value[COLUMN_1400950]
							,OBJECT_ID_050130990 => $value[COLUMN_1400960]
							,OBJECT_ID_050131000 => $value[COLUMN_1400970]
							,OBJECT_ID_050131010 => $value[COLUMN_1400980]
							,OBJECT_ID_050131020 => $value[COLUMN_1400990]
							,OBJECT_ID_050131030 => $value[COLUMN_1401000]
							,OBJECT_ID_050131040 => $value[COLUMN_1401010]
							,OBJECT_ID_050131050 => $value[COLUMN_1401020]
							,OBJECT_ID_050131060 => $value[COLUMN_1401030]
							,OBJECT_ID_050131070 => $value[COLUMN_1401040]
							,OBJECT_ID_050131080 => $value[COLUMN_1401050]
							,OBJECT_ID_050131090 => $value[COLUMN_1401060]
							,OBJECT_ID_050131100 => $value[COLUMN_1401070]
							,OBJECT_ID_050131110 => $value[COLUMN_1401080]
							,OBJECT_ID_050131120 => $value[COLUMN_1401090]
							,OBJECT_ID_050131130 => $value[COLUMN_1401100]
							,OBJECT_ID_050131140 => $value[COLUMN_1401110]
							,OBJECT_ID_050131150 => $value[COLUMN_1401120]
							,OBJECT_ID_050131160 => $value[COLUMN_1401130]
							,OBJECT_ID_050131170 => $value[COLUMN_1401140]
							,OBJECT_ID_050131180 => $value[COLUMN_1401150]
							,OBJECT_ID_050131190 => $value[COLUMN_1401160]
							,OBJECT_ID_050131200 => $value[COLUMN_1401170]
							,OBJECT_ID_050131210 => $value[COLUMN_1401180]
							,OBJECT_ID_050131220 => !empty($value[COLUMN_1401190]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401190])) : ""
							,OBJECT_ID_050131230 => $value[COLUMN_1401200]
							,OBJECT_ID_050131240 => $value[COLUMN_1401210]
							,OBJECT_ID_050131250 => $value[COLUMN_1401220]
							,OBJECT_ID_050131260 => $value[COLUMN_1401230]
							,OBJECT_ID_050131270 => $value[COLUMN_1401240]
							,OBJECT_ID_050131280 => $value[COLUMN_1401250]
							,OBJECT_ID_050131290 => $value[COLUMN_1401260]
							,OBJECT_ID_050131300 => $value[COLUMN_1401270]
							,OBJECT_ID_050131310 => $value[COLUMN_1401280]
							,OBJECT_ID_050131320 => $value[COLUMN_1401290]
							,OBJECT_ID_050131330 => $value[COLUMN_1401300]
							,OBJECT_ID_050131340 => $value[COLUMN_1401310]
							,OBJECT_ID_050131350 => $value[COLUMN_1401320]
							,OBJECT_ID_050131360 => $value[COLUMN_1401330]
							,OBJECT_ID_050131370 => $value[COLUMN_1401340]
							,OBJECT_ID_050131380 => $value[COLUMN_1401350]
							,OBJECT_ID_050131390 => $value[COLUMN_1401360]
							,OBJECT_ID_050131400 => $value[COLUMN_1401370]
							,OBJECT_ID_050131410 => $value[COLUMN_1401380]
							,OBJECT_ID_050131420 => $value[COLUMN_1401390]
							,OBJECT_ID_050131430 => $value[COLUMN_1401400]
							,OBJECT_ID_050131440 => $value[COLUMN_1401410]
							,OBJECT_ID_050131450 => !empty($value[COLUMN_1401420]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401420])) : ""
							,OBJECT_ID_050131460 => !empty($value[COLUMN_1401430]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401430])) : ""
							,OBJECT_ID_050131470 => !empty($value[COLUMN_1401440]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401440])) : ""
							,OBJECT_ID_050131480 => $value[COLUMN_1401450]
							,OBJECT_ID_050131490 => !empty($value[COLUMN_1401460]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401460])) : ""
							,OBJECT_ID_050131500 => !empty($value[COLUMN_1401470]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401470])) : ""
							,OBJECT_ID_050131510 => $value[COLUMN_1401480]
							,OBJECT_ID_050131520 => !empty($value[COLUMN_1401490]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401490])) : ""
							,OBJECT_ID_050131530 => $value[COLUMN_1401500]
							,OBJECT_ID_050131540 => $value[COLUMN_1401510]
							,OBJECT_ID_050131550 => $value[COLUMN_1401520]
							,OBJECT_ID_050131560 => $value[COLUMN_1401530]
							,OBJECT_ID_050131570 => !empty($value[COLUMN_1401540]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401540])) : ""
                            ,OBJECT_ID_050131580 => $value[COLUMN_1401550]
                            ,OBJECT_ID_050131590 => $value[COLUMN_1401560]
                            ,OBJECT_ID_050131600 => $value[COLUMN_1401570]
                            ,OBJECT_ID_050131610 => $value[COLUMN_1401580]
                            ,OBJECT_ID_050131620 => $value[COLUMN_1401590]
                            ,OBJECT_ID_050131630 => $value[COLUMN_1401600]
                            ,OBJECT_ID_050131640 => $value[COLUMN_1401610]
                            ,OBJECT_ID_050131650 => $value[COLUMN_1401620]
                            ,OBJECT_ID_050131660 => $value[COLUMN_1401630]
                            ,OBJECT_ID_050131670 => $value[COLUMN_1401640]
                            ,OBJECT_ID_050131680 => $value[COLUMN_1401650]
                            ,OBJECT_ID_050131690 => $value[COLUMN_1401660]
                            ,OBJECT_ID_050131700 => $value[COLUMN_1401670]
                            ,OBJECT_ID_050131710 => $value[COLUMN_1401680]
                            ,OBJECT_ID_050131720 => $value[COLUMN_1401690]
                            ,OBJECT_ID_050131730 => $value[COLUMN_1401700]
                            ,OBJECT_ID_050131740 => $value[COLUMN_1401710]
                            ,OBJECT_ID_050131750 => $value[COLUMN_1401720]
                            ,OBJECT_ID_050131760 => $value[COLUMN_1401730]
                            ,OBJECT_ID_050131770 => $value[COLUMN_1401740]
                            ,OBJECT_ID_050131780 => $value[COLUMN_1401750]
                            ,OBJECT_ID_050131790 => $value[COLUMN_1401760]
                            ,OBJECT_ID_050131800 => $value[COLUMN_1401770]
                            ,OBJECT_ID_050131810 => $value[COLUMN_1401780]
                            ,OBJECT_ID_050131820 => $value[COLUMN_1401790]


								,OBJECT_ID_050130190 => number_format(1500000)
							);
						}
					}
					
					break;
					
				default : // その他
					
					// ファンド一覧へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050110);
			}
			
			$this->set("data"          , $data);
			$this->set("loan_list"     , $loan_list);
			$this->set("repayment_list", $repayment_list);
			
			$list[CONFIG_0040] = Configure::read(CONFIG_0040);
			$list[CONFIG_0041] = Configure::read(CONFIG_0041);
			$list[CONFIG_0067] = Configure::read(CONFIG_0067);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "c050_admin/v120funddetailで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	/*
	 * ファンド詳細(入力)
	 */
	function v130fundinput(){

		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			// 不要なセッション情報を削除
			$this->Common->deleteSessionLoanNo();       // 貸付番号
			$this->Common->deleteSessionProcTypeLoan(); // 処理区分(貸付内容)

			// イベントID取得
			$event_id = $this->Common->getSessionEventId();
			
			// 管理者情報取得
			$admin_info = $this->SessionAdminInfo->getAdminInfo();
			
			$data           = null;
			$loan_list      = null;
			$repayment_list = null;
			
			switch ($event_id) {
				case EVENT_ID_050110030: // ファンド一覧      ：新規追加ボタン押下
				case EVENT_ID_050120010: // ファンド詳細(照会)：修正ボタン押下
				case EVENT_ID_050140010: // ファンド詳細(確認)：戻るボタン押下
				case EVENT_ID_050170010: // 貸付内容(入力)    ：戻るボタン押下
				case EVENT_ID_050180020: // 貸付内容(確認)    ：決定ボタン押下

					// ファンドワーク取得
					$wrk_data = $this->Fund->getWrkFund($admin_info[LOGIN_ADMIN_ID]);
					
					foreach ($wrk_data as $key => $values) {
						foreach ($values as $value) {
							
							// セッション登録
							$this->Common->setSessionFundInfo($value[COLUMN_1400010], $value[COLUMN_1400020]);

							$data = array(
								 OBJECT_ID_050130010 => $value[COLUMN_1400010]
								,OBJECT_ID_050130020 => $value[COLUMN_1400020]
								,OBJECT_ID_050130030 => $value[COLUMN_1400030]
								,OBJECT_ID_050130040 => $value[COLUMN_1400040]
								,OBJECT_ID_050130050 => $value[COLUMN_1400050]
								,OBJECT_ID_050130060 => $value[COLUMN_1400060]
								,OBJECT_ID_050130070 => !empty($value[COLUMN_1400070]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400070])) : ""
								,OBJECT_ID_050130080 => !empty($value[COLUMN_1400070]) ? date(TIME_FORMAT, strtotime($value[COLUMN_1400070])) : ""
								,OBJECT_ID_050130090 => !empty($value[COLUMN_1400080]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400080])) : ""
								,OBJECT_ID_050130100 => !empty($value[COLUMN_1400080]) ? date(TIME_FORMAT, strtotime($value[COLUMN_1400080])) : ""
								,OBJECT_ID_050130110 => !empty($value[COLUMN_1400090]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400090])) : ""
								,OBJECT_ID_050130120 => !empty($value[COLUMN_1400090]) ? date(TIME_FORMAT, strtotime($value[COLUMN_1400090])) : ""
								,OBJECT_ID_050130130 => !empty($value[COLUMN_1400100]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400100])) : ""
								,OBJECT_ID_050130140 => !empty($value[COLUMN_1400110]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400110])) : ""
								,OBJECT_ID_050130150 => $value[COLUMN_1400120]
								,OBJECT_ID_050130160 => $value[COLUMN_1400130]
								,OBJECT_ID_050130170 => $value[COLUMN_1400140]
								,OBJECT_ID_050130180 => $value[COLUMN_1400150]
								,OBJECT_ID_050130200 => $value[COLUMN_1400170]
                                                                ,OBJECT_ID_050130201 => !empty($value[COLUMN_1400172]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400172])) : ""
								,OBJECT_ID_050130202 => $value[COLUMN_1400171]
                                                                ,OBJECT_ID_050130203 => !empty($value[COLUMN_1400173]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400173])) : ""
							,OBJECT_ID_050130210 => $value[COLUMN_1400180]
							,OBJECT_ID_050130220 => $value[COLUMN_1400190]
							,OBJECT_ID_050130230 => $value[COLUMN_1400200]
							,OBJECT_ID_050130240 => $value[COLUMN_1400210]
							,OBJECT_ID_050130250 => $value[COLUMN_1400220]
							,OBJECT_ID_050130260 => $value[COLUMN_1400230]
							,OBJECT_ID_050130270 => $value[COLUMN_1400240]
							,OBJECT_ID_050130280 => $value[COLUMN_1400250]
							,OBJECT_ID_050130290 => $value[COLUMN_1400260]
							,OBJECT_ID_050130300 => $value[COLUMN_1400270]
							,OBJECT_ID_050130310 => $value[COLUMN_1400280]
							,OBJECT_ID_050130320 => $value[COLUMN_1400290]
							,OBJECT_ID_050130330 => $value[COLUMN_1400300]
							,OBJECT_ID_050130340 => $value[COLUMN_1400310]
							,OBJECT_ID_050130350 => $value[COLUMN_1400320]
							,OBJECT_ID_050130360 => $value[COLUMN_1400330]
							,OBJECT_ID_050130370 => $value[COLUMN_1400340]
							,OBJECT_ID_050130380 => $value[COLUMN_1400350]
							,OBJECT_ID_050130390 => $value[COLUMN_1400360]
							,OBJECT_ID_050130400 => $value[COLUMN_1400370]
							,OBJECT_ID_050130410 => $value[COLUMN_1400380]
							,OBJECT_ID_050130420 => $value[COLUMN_1400390]
							,OBJECT_ID_050130430 => $value[COLUMN_1400400]
							,OBJECT_ID_050130440 => $value[COLUMN_1400410]
							,OBJECT_ID_050130450 => $value[COLUMN_1400420]
							,OBJECT_ID_050130460 => $value[COLUMN_1400430]
							,OBJECT_ID_050130470 => $value[COLUMN_1400440]
							,OBJECT_ID_050130480 => $value[COLUMN_1400450]
							,OBJECT_ID_050130490 => $value[COLUMN_1400460]
							,OBJECT_ID_050130500 => $value[COLUMN_1400470]
							,OBJECT_ID_050130510 => $value[COLUMN_1400480]
							,OBJECT_ID_050130520 => $value[COLUMN_1400490]
							,OBJECT_ID_050130530 => $value[COLUMN_1400500]
							,OBJECT_ID_050130540 => $value[COLUMN_1400510]
							,OBJECT_ID_050130550 => $value[COLUMN_1400520]
							,OBJECT_ID_050130560 => $value[COLUMN_1400530]
							,OBJECT_ID_050130570 => $value[COLUMN_1400540]
							,OBJECT_ID_050130580 => $value[COLUMN_1400550]
							,OBJECT_ID_050130590 => $value[COLUMN_1400560]
							,OBJECT_ID_050130600 => $value[COLUMN_1400570]
							,OBJECT_ID_050130610 => $value[COLUMN_1400580]
							,OBJECT_ID_050130620 => $value[COLUMN_1400590]
							,OBJECT_ID_050130630 => $value[COLUMN_1400600]
							,OBJECT_ID_050130640 => $value[COLUMN_1400610]
							,OBJECT_ID_050130650 => $value[COLUMN_1400620]
							,OBJECT_ID_050130660 => $value[COLUMN_1400630]
							,OBJECT_ID_050130670 => $value[COLUMN_1400640]
							,OBJECT_ID_050130680 => !empty($value[COLUMN_1400650]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400650])) : ""
							,OBJECT_ID_050130690 => $value[COLUMN_1400660]
							,OBJECT_ID_050130700 => $value[COLUMN_1400670]
							,OBJECT_ID_050130710 => $value[COLUMN_1400680]
							,OBJECT_ID_050130720 => $value[COLUMN_1400690]
							,OBJECT_ID_050130730 => $value[COLUMN_1400700]
							,OBJECT_ID_050130740 => $value[COLUMN_1400710]
							,OBJECT_ID_050130750 => $value[COLUMN_1400720]
							,OBJECT_ID_050130760 => $value[COLUMN_1400730]
							,OBJECT_ID_050130770 => $value[COLUMN_1400740]
							,OBJECT_ID_050130780 => $value[COLUMN_1400750]
							,OBJECT_ID_050130790 => $value[COLUMN_1400760]
							,OBJECT_ID_050130800 => $value[COLUMN_1400770]
							,OBJECT_ID_050130810 => $value[COLUMN_1400780]
							,OBJECT_ID_050130820 => $value[COLUMN_1400790]
							,OBJECT_ID_050130830 => $value[COLUMN_1400800]
							,OBJECT_ID_050130840 => $value[COLUMN_1400810]
							,OBJECT_ID_050130850 => $value[COLUMN_1400820]
							,OBJECT_ID_050130860 => $value[COLUMN_1400830]
							,OBJECT_ID_050130870 => $value[COLUMN_1400840]
							,OBJECT_ID_050130880 => $value[COLUMN_1400850]
							,OBJECT_ID_050130890 => $value[COLUMN_1400860]
							,OBJECT_ID_050130900 => $value[COLUMN_1400870]
							,OBJECT_ID_050130910 => $value[COLUMN_1400880]
							,OBJECT_ID_050130920 => $value[COLUMN_1400890]
							,OBJECT_ID_050130930 => $value[COLUMN_1400900]
							,OBJECT_ID_050130940 => $value[COLUMN_1400910]
							,OBJECT_ID_050130950 => $value[COLUMN_1400920]
							,OBJECT_ID_050130960 => $value[COLUMN_1400930]
							,OBJECT_ID_050130970 => $value[COLUMN_1400940]
							,OBJECT_ID_050130980 => $value[COLUMN_1400950]
							,OBJECT_ID_050130990 => $value[COLUMN_1400960]
							,OBJECT_ID_050131000 => $value[COLUMN_1400970]
							,OBJECT_ID_050131010 => $value[COLUMN_1400980]
							,OBJECT_ID_050131020 => $value[COLUMN_1400990]
							,OBJECT_ID_050131030 => $value[COLUMN_1401000]
							,OBJECT_ID_050131040 => $value[COLUMN_1401010]
							,OBJECT_ID_050131050 => $value[COLUMN_1401020]
							,OBJECT_ID_050131060 => $value[COLUMN_1401030]
							,OBJECT_ID_050131070 => $value[COLUMN_1401040]
							,OBJECT_ID_050131080 => $value[COLUMN_1401050]
							,OBJECT_ID_050131090 => $value[COLUMN_1401060]
							,OBJECT_ID_050131100 => $value[COLUMN_1401070]
							,OBJECT_ID_050131110 => $value[COLUMN_1401080]
							,OBJECT_ID_050131120 => $value[COLUMN_1401090]
							,OBJECT_ID_050131130 => $value[COLUMN_1401100]
							,OBJECT_ID_050131140 => $value[COLUMN_1401110]
							,OBJECT_ID_050131150 => $value[COLUMN_1401120]
							,OBJECT_ID_050131160 => $value[COLUMN_1401130]
							,OBJECT_ID_050131170 => $value[COLUMN_1401140]
							,OBJECT_ID_050131180 => $value[COLUMN_1401150]
							,OBJECT_ID_050131190 => $value[COLUMN_1401160]
							,OBJECT_ID_050131200 => $value[COLUMN_1401170]
							,OBJECT_ID_050131210 => $value[COLUMN_1401180]
							,OBJECT_ID_050131220 => !empty($value[COLUMN_1401190]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401190])) : ""
							,OBJECT_ID_050131230 => $value[COLUMN_1401200]
							,OBJECT_ID_050131240 => $value[COLUMN_1401210]
							,OBJECT_ID_050131250 => $value[COLUMN_1401220]
							,OBJECT_ID_050131260 => $value[COLUMN_1401230]
							,OBJECT_ID_050131270 => $value[COLUMN_1401240]
							,OBJECT_ID_050131280 => $value[COLUMN_1401250]
							,OBJECT_ID_050131290 => $value[COLUMN_1401260]
							,OBJECT_ID_050131300 => $value[COLUMN_1401270]
							,OBJECT_ID_050131310 => $value[COLUMN_1401280]
							,OBJECT_ID_050131320 => $value[COLUMN_1401290]
							,OBJECT_ID_050131330 => $value[COLUMN_1401300]
							,OBJECT_ID_050131340 => $value[COLUMN_1401310]
							,OBJECT_ID_050131350 => $value[COLUMN_1401320]
							,OBJECT_ID_050131360 => $value[COLUMN_1401330]
							,OBJECT_ID_050131370 => $value[COLUMN_1401340]
							,OBJECT_ID_050131380 => $value[COLUMN_1401350]
							,OBJECT_ID_050131390 => $value[COLUMN_1401360]
							,OBJECT_ID_050131400 => $value[COLUMN_1401370]
							,OBJECT_ID_050131410 => $value[COLUMN_1401380]
							,OBJECT_ID_050131420 => $value[COLUMN_1401390]
							,OBJECT_ID_050131430 => $value[COLUMN_1401400]
							,OBJECT_ID_050131440 => $value[COLUMN_1401410]
							,OBJECT_ID_050131450 => !empty($value[COLUMN_1401420]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401420])) : ""
							,OBJECT_ID_050131460 => !empty($value[COLUMN_1401430]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401430])) : ""
							,OBJECT_ID_050131470 => !empty($value[COLUMN_1401440]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401440])) : ""
							,OBJECT_ID_050131480 => $value[COLUMN_1401450]
							,OBJECT_ID_050131490 => !empty($value[COLUMN_1401460]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401460])) : ""
							,OBJECT_ID_050131500 => !empty($value[COLUMN_1401470]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401470])) : ""
							,OBJECT_ID_050131510 => $value[COLUMN_1401480]
							,OBJECT_ID_050131520 => !empty($value[COLUMN_1401490]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401490])) : ""
							,OBJECT_ID_050131530 => $value[COLUMN_1401500]
							,OBJECT_ID_050131540 => $value[COLUMN_1401510]
							,OBJECT_ID_050131550 => $value[COLUMN_1401520]
							,OBJECT_ID_050131560 => $value[COLUMN_1401530]
							,OBJECT_ID_050131570 => !empty($value[COLUMN_1401540]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401540])) : ""
		                    ,OBJECT_ID_050131580 => $value[COLUMN_1401550]
                            ,OBJECT_ID_050131590 => $value[COLUMN_1401560]
                            ,OBJECT_ID_050131600 => $value[COLUMN_1401570]
                            ,OBJECT_ID_050131610 => $value[COLUMN_1401580]
                            ,OBJECT_ID_050131620 => $value[COLUMN_1401590]
                            ,OBJECT_ID_050131630 => $value[COLUMN_1401600]
                            ,OBJECT_ID_050131640 => $value[COLUMN_1401610]
                            ,OBJECT_ID_050131650 => $value[COLUMN_1401620]
                            ,OBJECT_ID_050131660 => $value[COLUMN_1401630]
                            ,OBJECT_ID_050131670 => $value[COLUMN_1401640]
                            ,OBJECT_ID_050131680 => $value[COLUMN_1401650]
                            ,OBJECT_ID_050131690 => $value[COLUMN_1401660]
                            ,OBJECT_ID_050131700 => $value[COLUMN_1401670]
                            ,OBJECT_ID_050131710 => $value[COLUMN_1401680]
                            ,OBJECT_ID_050131720 => $value[COLUMN_1401690]
                            ,OBJECT_ID_050131730 => $value[COLUMN_1401700]
                            ,OBJECT_ID_050131740 => $value[COLUMN_1401710]
                            ,OBJECT_ID_050131750 => $value[COLUMN_1401720]
                            ,OBJECT_ID_050131760 => $value[COLUMN_1401730]
                            ,OBJECT_ID_050131770 => $value[COLUMN_1401740]
                            ,OBJECT_ID_050131780 => $value[COLUMN_1401750]
                            ,OBJECT_ID_050131790 => $value[COLUMN_1401760]
                            ,OBJECT_ID_050131800 => $value[COLUMN_1401770]
                            ,OBJECT_ID_050131810 => $value[COLUMN_1401780]
                            ,OBJECT_ID_050131820 => $value[COLUMN_1401790]


								
							);
						}
					}
					
					// 貸付ワークリスト取得
					$loan_list      = $this->Fund->getWrkLoanList($admin_info[LOGIN_ADMIN_ID]);
					$repayment_list = $this->Fund->getWrkFundRepayment($admin_info[LOGIN_ADMIN_ID]);
					
					break;
					
				case EVENT_ID_050130010: // 確認ボタン押下
					
					$data = $this->data;
					
					// セッション情報セット
					$this->Common->setSessionFundInfo($data[OBJECT_ID_050130010], $data[OBJECT_ID_050130020]);
					
					$err = $this->CheckC050->v130($data);
					
					if (is_null($err)) {
						
						$this->Common->trnBegin();
						
						// ファンドワーク更新
						$this->Fund->saveWrkFund($admin_info, $data);

						$this->Common->trnCommit();
						
						// ファンド詳細(確認)へ
						$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050140);
					}
					
					$this->set("validation_errors", array($err));
					
					break;
					
				case EVENT_ID_050130020: // 一覧ボタン押下
					
					// ファンド一覧へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050110);
					
				case EVENT_ID_050130030: // メニューボタン押下
					
					// メニューへ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);
					
				case EVENT_ID_050130040: // 貸付追加ボタン押下
					
					// セッション情報セット
					$this->Common->setSessionFundInfo($this->data[OBJECT_ID_050130010], $this->data[OBJECT_ID_050130020]);
					$this->Common->setSessionProcTypeLoan(PROC_TYPE_INSERT);
					
					$this->Common->trnBegin();
					
					// ファンドワーク更新
					$this->Fund->saveWrkFund($admin_info, $this->data);
					
					// 貸付ワーク作成＆貸付番号をセッションへセット
					$this->Common->setSessionLoanNo($this->Fund->makeWrkLoanNew($admin_info[LOGIN_ADMIN_ID]));
					
					$this->Common->trnCommit();
					
					// 貸付内容(入力)へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050170);
					
				case EVENT_ID_050130050: // 貸付番号リンク押下
					
					// セッション情報セット
					$this->Common->setSessionFundInfo($this->data[OBJECT_ID_050130010], $this->data[OBJECT_ID_050130020]);
					$this->Common->setSessionProcTypeLoan(PROC_TYPE_UPDATE);
					
					$this->Common->trnBegin();
					
					// ファンドワーク更新
					$this->Fund->saveWrkFund($admin_info, $this->data);
					
					$this->Common->trnCommit();
					
					// 貸付ワーク作成＆貸付番号をセッションへセット
					$this->Common->setSessionLoanNo($this->data[HIDDEN_ID_000000040]);
					
					// 貸付内容(入力)へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050170);
					
				case EVENT_ID_999999999:
					
					$wrk_data = $this->DummyData->v050130();
					
					foreach ($wrk_data as $key => $values) {
						foreach ($values as $value) {

							$data = array(
								 OBJECT_ID_050130010 => $value[COLUMN_1400010]
								,OBJECT_ID_050130020 => $value[COLUMN_1400020]
								,OBJECT_ID_050130030 => $value[COLUMN_1400030]
								,OBJECT_ID_050130040 => $value[COLUMN_1400040]
								,OBJECT_ID_050130050 => $value[COLUMN_1400050]
								,OBJECT_ID_050130060 => $value[COLUMN_1400060]
								,OBJECT_ID_050130070 => !empty($value[COLUMN_1400070]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400070])) : ""
								,OBJECT_ID_050130080 => !empty($value[COLUMN_1400070]) ? date(TIME_FORMAT, strtotime($value[COLUMN_1400070])) : ""
								,OBJECT_ID_050130090 => !empty($value[COLUMN_1400080]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400080])) : ""
								,OBJECT_ID_050130100 => !empty($value[COLUMN_1400080]) ? date(TIME_FORMAT, strtotime($value[COLUMN_1400080])) : ""
								,OBJECT_ID_050130110 => !empty($value[COLUMN_1400090]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400090])) : ""
								,OBJECT_ID_050130120 => !empty($value[COLUMN_1400090]) ? date(TIME_FORMAT, strtotime($value[COLUMN_1400090])) : ""
								,OBJECT_ID_050130130 => !empty($value[COLUMN_1400100]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400100])) : ""
								,OBJECT_ID_050130140 => !empty($value[COLUMN_1400110]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400110])) : ""
								,OBJECT_ID_050130150 => $value[COLUMN_1400120]
								,OBJECT_ID_050130160 => $value[COLUMN_1400130]
								,OBJECT_ID_050130170 => $value[COLUMN_1400140]
								,OBJECT_ID_050130180 => $value[COLUMN_1400150]
								,OBJECT_ID_050130200 => $value[COLUMN_1400170]
                                                                ,OBJECT_ID_050130201 => !empty($value[COLUMN_1400172]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400172])) : ""
								,OBJECT_ID_050130202 => $value[COLUMN_1400171]
                                                                ,OBJECT_ID_050130203 => !empty($value[COLUMN_1400173]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400173])) : ""
							,OBJECT_ID_050130210 => $value[COLUMN_1400180]
							,OBJECT_ID_050130220 => $value[COLUMN_1400190]
							,OBJECT_ID_050130230 => $value[COLUMN_1400200]
							,OBJECT_ID_050130240 => $value[COLUMN_1400210]
							,OBJECT_ID_050130250 => $value[COLUMN_1400220]
							,OBJECT_ID_050130260 => $value[COLUMN_1400230]
							,OBJECT_ID_050130270 => $value[COLUMN_1400240]
							,OBJECT_ID_050130280 => $value[COLUMN_1400250]
							,OBJECT_ID_050130290 => $value[COLUMN_1400260]
							,OBJECT_ID_050130300 => $value[COLUMN_1400270]
							,OBJECT_ID_050130310 => $value[COLUMN_1400280]
							,OBJECT_ID_050130320 => $value[COLUMN_1400290]
							,OBJECT_ID_050130330 => $value[COLUMN_1400300]
							,OBJECT_ID_050130340 => $value[COLUMN_1400310]
							,OBJECT_ID_050130350 => $value[COLUMN_1400320]
							,OBJECT_ID_050130360 => $value[COLUMN_1400330]
							,OBJECT_ID_050130370 => $value[COLUMN_1400340]
							,OBJECT_ID_050130380 => $value[COLUMN_1400350]
							,OBJECT_ID_050130390 => $value[COLUMN_1400360]
							,OBJECT_ID_050130400 => $value[COLUMN_1400370]
							,OBJECT_ID_050130410 => $value[COLUMN_1400380]
							,OBJECT_ID_050130420 => $value[COLUMN_1400390]
							,OBJECT_ID_050130430 => $value[COLUMN_1400400]
							,OBJECT_ID_050130440 => $value[COLUMN_1400410]
							,OBJECT_ID_050130450 => $value[COLUMN_1400420]
							,OBJECT_ID_050130460 => $value[COLUMN_1400430]
							,OBJECT_ID_050130470 => $value[COLUMN_1400440]
							,OBJECT_ID_050130480 => $value[COLUMN_1400450]
							,OBJECT_ID_050130490 => $value[COLUMN_1400460]
							,OBJECT_ID_050130500 => $value[COLUMN_1400470]
							,OBJECT_ID_050130510 => $value[COLUMN_1400480]
							,OBJECT_ID_050130520 => $value[COLUMN_1400490]
							,OBJECT_ID_050130530 => $value[COLUMN_1400500]
							,OBJECT_ID_050130540 => $value[COLUMN_1400510]
							,OBJECT_ID_050130550 => $value[COLUMN_1400520]
							,OBJECT_ID_050130560 => $value[COLUMN_1400530]
							,OBJECT_ID_050130570 => $value[COLUMN_1400540]
							,OBJECT_ID_050130580 => $value[COLUMN_1400550]
							,OBJECT_ID_050130590 => $value[COLUMN_1400560]
							,OBJECT_ID_050130600 => $value[COLUMN_1400570]
							,OBJECT_ID_050130610 => $value[COLUMN_1400580]
							,OBJECT_ID_050130620 => $value[COLUMN_1400590]
							,OBJECT_ID_050130630 => $value[COLUMN_1400600]
							,OBJECT_ID_050130640 => $value[COLUMN_1400610]
							,OBJECT_ID_050130650 => $value[COLUMN_1400620]
							,OBJECT_ID_050130660 => $value[COLUMN_1400630]
							,OBJECT_ID_050130670 => $value[COLUMN_1400640]
							,OBJECT_ID_050130680 => !empty($value[COLUMN_1400650]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400650])) : ""
							,OBJECT_ID_050130690 => $value[COLUMN_1400660]
							,OBJECT_ID_050130700 => $value[COLUMN_1400670]
							,OBJECT_ID_050130710 => $value[COLUMN_1400680]
							,OBJECT_ID_050130720 => $value[COLUMN_1400690]
							,OBJECT_ID_050130730 => $value[COLUMN_1400700]
							,OBJECT_ID_050130740 => $value[COLUMN_1400710]
							,OBJECT_ID_050130750 => $value[COLUMN_1400720]
							,OBJECT_ID_050130760 => $value[COLUMN_1400730]
							,OBJECT_ID_050130770 => $value[COLUMN_1400740]
							,OBJECT_ID_050130780 => $value[COLUMN_1400750]
							,OBJECT_ID_050130790 => $value[COLUMN_1400760]
							,OBJECT_ID_050130800 => $value[COLUMN_1400770]
							,OBJECT_ID_050130810 => $value[COLUMN_1400780]
							,OBJECT_ID_050130820 => $value[COLUMN_1400790]
							,OBJECT_ID_050130830 => $value[COLUMN_1400800]
							,OBJECT_ID_050130840 => $value[COLUMN_1400810]
							,OBJECT_ID_050130850 => $value[COLUMN_1400820]
							,OBJECT_ID_050130860 => $value[COLUMN_1400830]
							,OBJECT_ID_050130870 => $value[COLUMN_1400840]
							,OBJECT_ID_050130880 => $value[COLUMN_1400850]
							,OBJECT_ID_050130890 => $value[COLUMN_1400860]
							,OBJECT_ID_050130900 => $value[COLUMN_1400870]
							,OBJECT_ID_050130910 => $value[COLUMN_1400880]
							,OBJECT_ID_050130920 => $value[COLUMN_1400890]
							,OBJECT_ID_050130930 => $value[COLUMN_1400900]
							,OBJECT_ID_050130940 => $value[COLUMN_1400910]
							,OBJECT_ID_050130950 => $value[COLUMN_1400920]
							,OBJECT_ID_050130960 => $value[COLUMN_1400930]
							,OBJECT_ID_050130970 => $value[COLUMN_1400940]
							,OBJECT_ID_050130980 => $value[COLUMN_1400950]
							,OBJECT_ID_050130990 => $value[COLUMN_1400960]
							,OBJECT_ID_050131000 => $value[COLUMN_1400970]
							,OBJECT_ID_050131010 => $value[COLUMN_1400980]
							,OBJECT_ID_050131020 => $value[COLUMN_1400990]
							,OBJECT_ID_050131030 => $value[COLUMN_1401000]
							,OBJECT_ID_050131040 => $value[COLUMN_1401010]
							,OBJECT_ID_050131050 => $value[COLUMN_1401020]
							,OBJECT_ID_050131060 => $value[COLUMN_1401030]
							,OBJECT_ID_050131070 => $value[COLUMN_1401040]
							,OBJECT_ID_050131080 => $value[COLUMN_1401050]
							,OBJECT_ID_050131090 => $value[COLUMN_1401060]
							,OBJECT_ID_050131100 => $value[COLUMN_1401070]
							,OBJECT_ID_050131110 => $value[COLUMN_1401080]
							,OBJECT_ID_050131120 => $value[COLUMN_1401090]
							,OBJECT_ID_050131130 => $value[COLUMN_1401100]
							,OBJECT_ID_050131140 => $value[COLUMN_1401110]
							,OBJECT_ID_050131150 => $value[COLUMN_1401120]
							,OBJECT_ID_050131160 => $value[COLUMN_1401130]
							,OBJECT_ID_050131170 => $value[COLUMN_1401140]
							,OBJECT_ID_050131180 => $value[COLUMN_1401150]
							,OBJECT_ID_050131190 => $value[COLUMN_1401160]
							,OBJECT_ID_050131200 => $value[COLUMN_1401170]
							,OBJECT_ID_050131210 => $value[COLUMN_1401180]
							,OBJECT_ID_050131220 => !empty($value[COLUMN_1401190]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401190])) : ""
							,OBJECT_ID_050131230 => $value[COLUMN_1401200]
							,OBJECT_ID_050131240 => $value[COLUMN_1401210]
							,OBJECT_ID_050131250 => $value[COLUMN_1401220]
							,OBJECT_ID_050131260 => $value[COLUMN_1401230]
							,OBJECT_ID_050131270 => $value[COLUMN_1401240]
							,OBJECT_ID_050131280 => $value[COLUMN_1401250]
							,OBJECT_ID_050131290 => $value[COLUMN_1401260]
							,OBJECT_ID_050131300 => $value[COLUMN_1401270]
							,OBJECT_ID_050131310 => $value[COLUMN_1401280]
							,OBJECT_ID_050131320 => $value[COLUMN_1401290]
							,OBJECT_ID_050131330 => $value[COLUMN_1401300]
							,OBJECT_ID_050131340 => $value[COLUMN_1401310]
							,OBJECT_ID_050131350 => $value[COLUMN_1401320]
							,OBJECT_ID_050131360 => $value[COLUMN_1401330]
							,OBJECT_ID_050131370 => $value[COLUMN_1401340]
							,OBJECT_ID_050131380 => $value[COLUMN_1401350]
							,OBJECT_ID_050131390 => $value[COLUMN_1401360]
							,OBJECT_ID_050131400 => $value[COLUMN_1401370]
							,OBJECT_ID_050131410 => $value[COLUMN_1401380]
							,OBJECT_ID_050131420 => $value[COLUMN_1401390]
							,OBJECT_ID_050131430 => $value[COLUMN_1401400]
							,OBJECT_ID_050131440 => $value[COLUMN_1401410]
							,OBJECT_ID_050131450 => !empty($value[COLUMN_1401420]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401420])) : ""
							,OBJECT_ID_050131460 => !empty($value[COLUMN_1401430]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401430])) : ""
							,OBJECT_ID_050131470 => !empty($value[COLUMN_1401440]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401440])) : ""
							,OBJECT_ID_050131480 => $value[COLUMN_1401450]
							,OBJECT_ID_050131490 => !empty($value[COLUMN_1401460]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401460])) : ""
							,OBJECT_ID_050131500 => !empty($value[COLUMN_1401470]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401470])) : ""
							,OBJECT_ID_050131510 => $value[COLUMN_1401480]
							,OBJECT_ID_050131520 => !empty($value[COLUMN_1401490]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401490])) : ""
							,OBJECT_ID_050131530 => $value[COLUMN_1401500]
							,OBJECT_ID_050131540 => $value[COLUMN_1401510]
							,OBJECT_ID_050131550 => $value[COLUMN_1401520]
							,OBJECT_ID_050131560 => $value[COLUMN_1401530]
							,OBJECT_ID_050131570 => !empty($value[COLUMN_1401540]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401540])) : ""
			                ,OBJECT_ID_050131580 => $value[COLUMN_1401550]
                            ,OBJECT_ID_050131590 => $value[COLUMN_1401560]
                            ,OBJECT_ID_050131600 => $value[COLUMN_1401570]
                            ,OBJECT_ID_050131610 => $value[COLUMN_1401580]
                            ,OBJECT_ID_050131620 => $value[COLUMN_1401590]
                            ,OBJECT_ID_050131630 => $value[COLUMN_1401600]
                            ,OBJECT_ID_050131640 => $value[COLUMN_1401610]
                            ,OBJECT_ID_050131650 => $value[COLUMN_1401620]
                            ,OBJECT_ID_050131660 => $value[COLUMN_1401630]
                            ,OBJECT_ID_050131670 => $value[COLUMN_1401640]
                            ,OBJECT_ID_050131680 => $value[COLUMN_1401650]
                            ,OBJECT_ID_050131690 => $value[COLUMN_1401660]
                            ,OBJECT_ID_050131700 => $value[COLUMN_1401670]
                            ,OBJECT_ID_050131710 => $value[COLUMN_1401680]
                            ,OBJECT_ID_050131720 => $value[COLUMN_1401690]
                            ,OBJECT_ID_050131730 => $value[COLUMN_1401700]
                            ,OBJECT_ID_050131740 => $value[COLUMN_1401710]
                            ,OBJECT_ID_050131750 => $value[COLUMN_1401720]
                            ,OBJECT_ID_050131760 => $value[COLUMN_1401730]
                            ,OBJECT_ID_050131770 => $value[COLUMN_1401740]
                            ,OBJECT_ID_050131780 => $value[COLUMN_1401750]
                            ,OBJECT_ID_050131790 => $value[COLUMN_1401760]
                            ,OBJECT_ID_050131800 => $value[COLUMN_1401770]
                            ,OBJECT_ID_050131810 => $value[COLUMN_1401780]
                            ,OBJECT_ID_050131820 => $value[COLUMN_1401790]


								
							);
						}
					}
					
					break;
					
				default : // その他
					
					// ファンド一覧へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050110);
			}
			
			$this->set("data"          , $data);
			$this->set("loan_list"     , $loan_list);
			$this->set("repayment_list", $repayment_list);
			
			$list[CONFIG_0040] = Configure::read(CONFIG_0040);
			$list[CONFIG_0041] = Configure::read(CONFIG_0041);
						$list[CONFIG_0067] = Configure::read(CONFIG_0067);

			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			$this->Common->trnRollback();
			
			// 例外処理
			$err_str = "c050_admin/v130fundinputで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	
	/*
	 * ファンド詳細(確認)
	 */
	function v140fundconfirm(){
		
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			// イベントID取得
			$event_id = $this->Common->getSessionEventId();
			
			// 管理者情報取得
			$admin_info = $this->SessionAdminInfo->getAdminInfo();
			
			switch ($event_id) {
				case EVENT_ID_050130010: // ファンド詳細(入力)：確認ボタン押下
					
					$wrk_data = $this->Fund->getWrkFund($admin_info[LOGIN_ADMIN_ID]);
					
					foreach ($wrk_data as $key => $values) {
						foreach ($values as $value) {

							$data = array(
								 OBJECT_ID_050130010 => $value[COLUMN_1400010]
								,OBJECT_ID_050130020 => $value[COLUMN_1400020]
								,OBJECT_ID_050130030 => number_format($value[COLUMN_1400030])
								,OBJECT_ID_050130040 => number_format($value[COLUMN_1400040])
								,OBJECT_ID_050130050 => number_format($value[COLUMN_1400050])
								,OBJECT_ID_050130060 => number_format($value[COLUMN_1400060])
								,OBJECT_ID_050130070 => !empty($value[COLUMN_1400070]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400070])) : ""
								,OBJECT_ID_050130080 => !empty($value[COLUMN_1400070]) ? date(TIME_FORMAT, strtotime($value[COLUMN_1400070])) : ""
								,OBJECT_ID_050130090 => !empty($value[COLUMN_1400080]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400080])) : ""
								,OBJECT_ID_050130100 => !empty($value[COLUMN_1400080]) ? date(TIME_FORMAT, strtotime($value[COLUMN_1400080])) : ""
								,OBJECT_ID_050130110 => !empty($value[COLUMN_1400090]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400090])) : ""
								,OBJECT_ID_050130120 => !empty($value[COLUMN_1400090]) ? date(TIME_FORMAT, strtotime($value[COLUMN_1400090])) : ""
								,OBJECT_ID_050130130 => !empty($value[COLUMN_1400100]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400100])) : ""
								,OBJECT_ID_050130140 => !empty($value[COLUMN_1400110]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400110])) : ""
								,OBJECT_ID_050130150 => $value[COLUMN_1400120]
								,OBJECT_ID_050130160 => $value[COLUMN_1400130]
								,OBJECT_ID_050130170 => $value[COLUMN_1400140]
								,OBJECT_ID_050130180 => $value[COLUMN_1400150]
								,OBJECT_ID_050130200 => $value[COLUMN_1400170]
                                                                ,OBJECT_ID_050130201 => !empty($value[COLUMN_1400172]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400172])) : ""
								,OBJECT_ID_050130202 => $value[COLUMN_1400171]
                                                                ,OBJECT_ID_050130203 => !empty($value[COLUMN_1400173]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400173])) : ""
							,OBJECT_ID_050130210 => $value[COLUMN_1400180]
							,OBJECT_ID_050130220 => $value[COLUMN_1400190]
							,OBJECT_ID_050130230 => $value[COLUMN_1400200]
							,OBJECT_ID_050130240 => $value[COLUMN_1400210]
							,OBJECT_ID_050130250 => $value[COLUMN_1400220]
							,OBJECT_ID_050130260 => $value[COLUMN_1400230]
							,OBJECT_ID_050130270 => $value[COLUMN_1400240]
							,OBJECT_ID_050130280 => $value[COLUMN_1400250]
							,OBJECT_ID_050130290 => $value[COLUMN_1400260]
							,OBJECT_ID_050130300 => $value[COLUMN_1400270]
							,OBJECT_ID_050130310 => $value[COLUMN_1400280]
							,OBJECT_ID_050130320 => $value[COLUMN_1400290]
							,OBJECT_ID_050130330 => $value[COLUMN_1400300]
							,OBJECT_ID_050130340 => $value[COLUMN_1400310]
							,OBJECT_ID_050130350 => $value[COLUMN_1400320]
							,OBJECT_ID_050130360 => $value[COLUMN_1400330]
							,OBJECT_ID_050130370 => $value[COLUMN_1400340]
							,OBJECT_ID_050130380 => $value[COLUMN_1400350]
							,OBJECT_ID_050130390 => $value[COLUMN_1400360]
							,OBJECT_ID_050130400 => $value[COLUMN_1400370]
							,OBJECT_ID_050130410 => $value[COLUMN_1400380]
							,OBJECT_ID_050130420 => $value[COLUMN_1400390]
							,OBJECT_ID_050130430 => $value[COLUMN_1400400]
							,OBJECT_ID_050130440 => $value[COLUMN_1400410]
							,OBJECT_ID_050130450 => $value[COLUMN_1400420]
							,OBJECT_ID_050130460 => $value[COLUMN_1400430]
							,OBJECT_ID_050130470 => $value[COLUMN_1400440]
							,OBJECT_ID_050130480 => $value[COLUMN_1400450]
							,OBJECT_ID_050130490 => $value[COLUMN_1400460]
							,OBJECT_ID_050130500 => $value[COLUMN_1400470]
							,OBJECT_ID_050130510 => $value[COLUMN_1400480]
							,OBJECT_ID_050130520 => $value[COLUMN_1400490]
							,OBJECT_ID_050130530 => $value[COLUMN_1400500]
							,OBJECT_ID_050130540 => $value[COLUMN_1400510]
							,OBJECT_ID_050130550 => $value[COLUMN_1400520]
							,OBJECT_ID_050130560 => $value[COLUMN_1400530]
							,OBJECT_ID_050130570 => $value[COLUMN_1400540]
							,OBJECT_ID_050130580 => $value[COLUMN_1400550]
							,OBJECT_ID_050130590 => $value[COLUMN_1400560]
							,OBJECT_ID_050130600 => $value[COLUMN_1400570]
							,OBJECT_ID_050130610 => $value[COLUMN_1400580]
							,OBJECT_ID_050130620 => number_format($value[COLUMN_1400590])
							,OBJECT_ID_050130630 => number_format($value[COLUMN_1400600])
							,OBJECT_ID_050130640 => $value[COLUMN_1400610]
							,OBJECT_ID_050130650 => number_format($value[COLUMN_1400620])
							,OBJECT_ID_050130660 => $value[COLUMN_1400630]
							,OBJECT_ID_050130670 => number_format($value[COLUMN_1400640])
							,OBJECT_ID_050130680 => !empty($value[COLUMN_1400650]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400650])) : ""
							,OBJECT_ID_050130690 => number_format($value[COLUMN_1400660])
							,OBJECT_ID_050130700 => $value[COLUMN_1400670]
							,OBJECT_ID_050130710 => $value[COLUMN_1400680]
							,OBJECT_ID_050130720 => $value[COLUMN_1400690]
							,OBJECT_ID_050130730 => $value[COLUMN_1400700]
							,OBJECT_ID_050130740 => $value[COLUMN_1400710]
							,OBJECT_ID_050130750 => $value[COLUMN_1400720]
							,OBJECT_ID_050130760 => $value[COLUMN_1400730]
							,OBJECT_ID_050130770 => $value[COLUMN_1400740]
							,OBJECT_ID_050130780 => $value[COLUMN_1400750]
							,OBJECT_ID_050130790 => $value[COLUMN_1400760]
							,OBJECT_ID_050130800 => $value[COLUMN_1400770]
							,OBJECT_ID_050130810 => $value[COLUMN_1400780]
							,OBJECT_ID_050130820 => $value[COLUMN_1400790]
							,OBJECT_ID_050130830 => $value[COLUMN_1400800]
							,OBJECT_ID_050130840 => $value[COLUMN_1400810]
							,OBJECT_ID_050130850 => $value[COLUMN_1400820]
							,OBJECT_ID_050130860 => $value[COLUMN_1400830]
							,OBJECT_ID_050130870 => $value[COLUMN_1400840]
							,OBJECT_ID_050130880 => $value[COLUMN_1400850]
							,OBJECT_ID_050130890 => $value[COLUMN_1400860]
							,OBJECT_ID_050130900 => $value[COLUMN_1400870]
							,OBJECT_ID_050130910 => $value[COLUMN_1400880]
							,OBJECT_ID_050130920 => $value[COLUMN_1400890]
							,OBJECT_ID_050130930 => $value[COLUMN_1400900]
							,OBJECT_ID_050130940 => $value[COLUMN_1400910]
							,OBJECT_ID_050130950 => $value[COLUMN_1400920]
							,OBJECT_ID_050130960 => $value[COLUMN_1400930]
							,OBJECT_ID_050130970 => $value[COLUMN_1400940]
							,OBJECT_ID_050130980 => number_format($value[COLUMN_1400950])//対象不動産価格
							,OBJECT_ID_050130990 => $value[COLUMN_1400960]
							,OBJECT_ID_050131000 => $value[COLUMN_1400970]
							,OBJECT_ID_050131010 => $value[COLUMN_1400980]
							,OBJECT_ID_050131020 => $value[COLUMN_1400990]
							,OBJECT_ID_050131030 => $value[COLUMN_1401000]
							,OBJECT_ID_050131040 => number_format($value[COLUMN_1401010])//全賃料収入
							,OBJECT_ID_050131050 => $value[COLUMN_1401020]
							,OBJECT_ID_050131060 => $value[COLUMN_1401030]
							,OBJECT_ID_050131070 => $value[COLUMN_1401040]
							,OBJECT_ID_050131080 => $value[COLUMN_1401050]
							,OBJECT_ID_050131090 => $value[COLUMN_1401060]
							,OBJECT_ID_050131100 => $value[COLUMN_1401070]
							,OBJECT_ID_050131110 => $value[COLUMN_1401080]
							,OBJECT_ID_050131120 => $value[COLUMN_1401090]
							,OBJECT_ID_050131130 => $value[COLUMN_1401100]
							,OBJECT_ID_050131140 => $value[COLUMN_1401110]
							,OBJECT_ID_050131150 => $value[COLUMN_1401120]
							,OBJECT_ID_050131160 => $value[COLUMN_1401130]
							,OBJECT_ID_050131170 => $value[COLUMN_1401140]
							,OBJECT_ID_050131180 => $value[COLUMN_1401150]
							,OBJECT_ID_050131190 => $value[COLUMN_1401160]
							,OBJECT_ID_050131200 => number_format($value[COLUMN_1401170])//テナント年間賃料
							,OBJECT_ID_050131210 => $value[COLUMN_1401180]
							,OBJECT_ID_050131220 => !empty($value[COLUMN_1401190]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401190])) : ""//テナント契約満了日
							,OBJECT_ID_050131230 => $value[COLUMN_1401200]
							,OBJECT_ID_050131240 => $value[COLUMN_1401210]
							,OBJECT_ID_050131250 => $value[COLUMN_1401220]
							,OBJECT_ID_050131260 => $value[COLUMN_1401230]
							,OBJECT_ID_050131270 => $value[COLUMN_1401240]
							,OBJECT_ID_050131280 => $value[COLUMN_1401250]
							,OBJECT_ID_050131290 => $value[COLUMN_1401260]
							,OBJECT_ID_050131300 => $value[COLUMN_1401270]
							,OBJECT_ID_050131310 => $value[COLUMN_1401280]
							,OBJECT_ID_050131320 => $value[COLUMN_1401290]
							,OBJECT_ID_050131330 => $value[COLUMN_1401300]
							,OBJECT_ID_050131340 => $value[COLUMN_1401310]
							,OBJECT_ID_050131350 => $value[COLUMN_1401320]
							,OBJECT_ID_050131360 => $value[COLUMN_1401330]
							,OBJECT_ID_050131370 => $value[COLUMN_1401340]
							,OBJECT_ID_050131380 => number_format($value[COLUMN_1401350])//出資総額
							,OBJECT_ID_050131390 => number_format($value[COLUMN_1401360])//出資総口数
							,OBJECT_ID_050131400 => number_format($value[COLUMN_1401370])//優先出資総額
							,OBJECT_ID_050131410 => number_format($value[COLUMN_1401380])//優先出資口数
							,OBJECT_ID_050131420 => number_format($value[COLUMN_1401390])//劣後出資総額
							,OBJECT_ID_050131430 => number_format($value[COLUMN_1401400])//劣後出資口数
							,OBJECT_ID_050131440 => $value[COLUMN_1401410]
							,OBJECT_ID_050131450 => !empty($value[COLUMN_1401420]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401420])) : ""
							,OBJECT_ID_050131460 => !empty($value[COLUMN_1401430]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401430])) : ""
							,OBJECT_ID_050131470 => !empty($value[COLUMN_1401440]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401440])) : ""
							,OBJECT_ID_050131480 => $value[COLUMN_1401450]
							,OBJECT_ID_050131490 => !empty($value[COLUMN_1401460]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401460])) : ""
							,OBJECT_ID_050131500 => !empty($value[COLUMN_1401470]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401470])) : ""
							,OBJECT_ID_050131510 => $value[COLUMN_1401480]
							,OBJECT_ID_050131520 => !empty($value[COLUMN_1401490]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401490])) : ""
							,OBJECT_ID_050131530 => $value[COLUMN_1401500]
							,OBJECT_ID_050131540 => $value[COLUMN_1401510]
							,OBJECT_ID_050131550 => $value[COLUMN_1401520]
							,OBJECT_ID_050131560 => $value[COLUMN_1401530]
							,OBJECT_ID_050131570 => !empty($value[COLUMN_1401540]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401540])) : ""
			                ,OBJECT_ID_050131580 => $value[COLUMN_1401550]
                            ,OBJECT_ID_050131590 => $value[COLUMN_1401560]
                            ,OBJECT_ID_050131600 => $value[COLUMN_1401570]
                            ,OBJECT_ID_050131610 => $value[COLUMN_1401580]
                            ,OBJECT_ID_050131620 => $value[COLUMN_1401590]
                            ,OBJECT_ID_050131630 => $value[COLUMN_1401600]
                            ,OBJECT_ID_050131640 => $value[COLUMN_1401610]
                            ,OBJECT_ID_050131650 => $value[COLUMN_1401620]
                            ,OBJECT_ID_050131660 => $value[COLUMN_1401630]
                            ,OBJECT_ID_050131670 => $value[COLUMN_1401640]
                            ,OBJECT_ID_050131680 => $value[COLUMN_1401650]
                            ,OBJECT_ID_050131690 => $value[COLUMN_1401660]
                            ,OBJECT_ID_050131700 => $value[COLUMN_1401670]
                            ,OBJECT_ID_050131710 => $value[COLUMN_1401680]
                            ,OBJECT_ID_050131720 => $value[COLUMN_1401690]
                            ,OBJECT_ID_050131730 => $value[COLUMN_1401700]
                            ,OBJECT_ID_050131740 => $value[COLUMN_1401710]
                            ,OBJECT_ID_050131750 => $value[COLUMN_1401720]
                            ,OBJECT_ID_050131760 => $value[COLUMN_1401730]
                            ,OBJECT_ID_050131770 => $value[COLUMN_1401740]
                            ,OBJECT_ID_050131780 => $value[COLUMN_1401750]
                            ,OBJECT_ID_050131790 => $value[COLUMN_1401760]
                            ,OBJECT_ID_050131800 => $value[COLUMN_1401770]
                            ,OBJECT_ID_050131810 => $value[COLUMN_1401780]
                            ,OBJECT_ID_050131820 => $value[COLUMN_1401790]


								
							);
						}
					}
					
					$loan_list      = $this->Fund->getWrkLoanList($admin_info[LOGIN_ADMIN_ID]);
					$repayment_list = $this->Fund->getWrkFundRepayment($admin_info[LOGIN_ADMIN_ID]);
					
					break;
					
				case EVENT_ID_050140010: // 戻るボタン押下
					
					// ファンド詳細(入力)へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050130);
					
				case EVENT_ID_050140020: // 決定ボタン押下
					
					$proc_type = $this->Common->getSessionProcTypeFund();
					
					// ファンドID生成
					$fund_id = "";
					if (strcmp(PROC_TYPE_INSERT, $proc_type) == 0) {
						
						// 新規登録の場合、ファンドIDを生成
						$fund_id = $this->Fund->createFundId();
					}
					else {
						$fund_id = $this->data[OBJECT_ID_050130010];
					}
					
					// 排他キーチェック
					$err = $this->CheckC050->v140($admin_info[LOGIN_ADMIN_ID], $fund_id);
					
					if (is_null($err)) {
						
						$this->Common->trnBegin(); // ◆トランザクションスタート◆
					
						// ファンドワーク日時更新
						$this->Fund->saveWrkFundDatetime($admin_info, $proc_type);

						// マスタ更新
						$this->Fund->saveMstFund($admin_info, $fund_id);
						$this->Fund->saveMstLoan($admin_info, $fund_id);
						$this->Fund->saveTrnLoanRepayment($admin_info, $fund_id);

						$this->Common->trnCommit(); // ◆コミット◆

						// ファンド詳細(完了)へ
						$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050150);
					}
					
					// 画面再表示
					$wrk_data = $this->Fund->getWrkFund($admin_info[LOGIN_ADMIN_ID]);
					
					foreach ($wrk_data as $key => $values) {
						foreach ($values as $value) {

							$data = array(
								 OBJECT_ID_050130010 => $value[COLUMN_1400010]
								,OBJECT_ID_050130020 => $value[COLUMN_1400020]
								,OBJECT_ID_050130030 => number_format($value[COLUMN_1400030])
								,OBJECT_ID_050130040 => number_format($value[COLUMN_1400040])
								,OBJECT_ID_050130050 => number_format($value[COLUMN_1400050])
								,OBJECT_ID_050130060 => number_format($value[COLUMN_1400060])
								,OBJECT_ID_050130070 => !empty($value[COLUMN_1400070]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400070])) : ""
								,OBJECT_ID_050130080 => !empty($value[COLUMN_1400070]) ? date(TIME_FORMAT, strtotime($value[COLUMN_1400070])) : ""
								,OBJECT_ID_050130090 => !empty($value[COLUMN_1400080]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400080])) : ""
								,OBJECT_ID_050130100 => !empty($value[COLUMN_1400080]) ? date(TIME_FORMAT, strtotime($value[COLUMN_1400080])) : ""
								,OBJECT_ID_050130110 => !empty($value[COLUMN_1400090]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400090])) : ""
								,OBJECT_ID_050130120 => !empty($value[COLUMN_1400090]) ? date(TIME_FORMAT, strtotime($value[COLUMN_1400090])) : ""
								,OBJECT_ID_050130130 => !empty($value[COLUMN_1400100]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400100])) : ""
								,OBJECT_ID_050130140 => !empty($value[COLUMN_1400110]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400110])) : ""
								,OBJECT_ID_050130150 => $value[COLUMN_1400120]
								,OBJECT_ID_050130160 => $value[COLUMN_1400130]
								,OBJECT_ID_050130170 => $value[COLUMN_1400140]
								,OBJECT_ID_050130180 => $value[COLUMN_1400150]
								,OBJECT_ID_050130200 => $value[COLUMN_1400170]
                                                                ,OBJECT_ID_050130201 => !empty($value[COLUMN_1400172]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400172])) : ""
								,OBJECT_ID_050130202 => $value[COLUMN_1400171]
                                                                ,OBJECT_ID_050130203 => !empty($value[COLUMN_1400173]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400173])) : ""
							,OBJECT_ID_050130210 => $value[COLUMN_1400180]
							,OBJECT_ID_050130220 => $value[COLUMN_1400190]
							,OBJECT_ID_050130230 => $value[COLUMN_1400200]
							,OBJECT_ID_050130240 => $value[COLUMN_1400210]
							,OBJECT_ID_050130250 => $value[COLUMN_1400220]
							,OBJECT_ID_050130260 => $value[COLUMN_1400230]
							,OBJECT_ID_050130270 => $value[COLUMN_1400240]
							,OBJECT_ID_050130280 => $value[COLUMN_1400250]
							,OBJECT_ID_050130290 => $value[COLUMN_1400260]
							,OBJECT_ID_050130300 => $value[COLUMN_1400270]
							,OBJECT_ID_050130310 => $value[COLUMN_1400280]
							,OBJECT_ID_050130320 => $value[COLUMN_1400290]
							,OBJECT_ID_050130330 => $value[COLUMN_1400300]
							,OBJECT_ID_050130340 => $value[COLUMN_1400310]
							,OBJECT_ID_050130350 => $value[COLUMN_1400320]
							,OBJECT_ID_050130360 => $value[COLUMN_1400330]
							,OBJECT_ID_050130370 => $value[COLUMN_1400340]
							,OBJECT_ID_050130380 => $value[COLUMN_1400350]
							,OBJECT_ID_050130390 => $value[COLUMN_1400360]
							,OBJECT_ID_050130400 => $value[COLUMN_1400370]
							,OBJECT_ID_050130410 => $value[COLUMN_1400380]
							,OBJECT_ID_050130420 => $value[COLUMN_1400390]
							,OBJECT_ID_050130430 => $value[COLUMN_1400400]
							,OBJECT_ID_050130440 => $value[COLUMN_1400410]
							,OBJECT_ID_050130450 => $value[COLUMN_1400420]
							,OBJECT_ID_050130460 => $value[COLUMN_1400430]
							,OBJECT_ID_050130470 => $value[COLUMN_1400440]
							,OBJECT_ID_050130480 => $value[COLUMN_1400450]
							,OBJECT_ID_050130490 => $value[COLUMN_1400460]
							,OBJECT_ID_050130500 => $value[COLUMN_1400470]
							,OBJECT_ID_050130510 => $value[COLUMN_1400480]
							,OBJECT_ID_050130520 => $value[COLUMN_1400490]
							,OBJECT_ID_050130530 => $value[COLUMN_1400500]
							,OBJECT_ID_050130540 => $value[COLUMN_1400510]
							,OBJECT_ID_050130550 => $value[COLUMN_1400520]
							,OBJECT_ID_050130560 => $value[COLUMN_1400530]
							,OBJECT_ID_050130570 => $value[COLUMN_1400540]
							,OBJECT_ID_050130580 => $value[COLUMN_1400550]
							,OBJECT_ID_050130590 => $value[COLUMN_1400560]
							,OBJECT_ID_050130600 => $value[COLUMN_1400570]
							,OBJECT_ID_050130610 => $value[COLUMN_1400580]
							,OBJECT_ID_050130620 => number_format($value[COLUMN_1400590])
							,OBJECT_ID_050130630 => number_format($value[COLUMN_1400600])
							,OBJECT_ID_050130640 => $value[COLUMN_1400610]
							,OBJECT_ID_050130650 => number_format($value[COLUMN_1400620])
							,OBJECT_ID_050130660 => $value[COLUMN_1400630]
							,OBJECT_ID_050130670 => number_format($value[COLUMN_1400640])
							,OBJECT_ID_050130680 => !empty($value[COLUMN_1400650]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400650])) : ""
							,OBJECT_ID_050130690 => number_format($value[COLUMN_1400660])
							,OBJECT_ID_050130700 => $value[COLUMN_1400670]
							,OBJECT_ID_050130710 => $value[COLUMN_1400680]
							,OBJECT_ID_050130720 => $value[COLUMN_1400690]
							,OBJECT_ID_050130730 => $value[COLUMN_1400700]
							,OBJECT_ID_050130740 => $value[COLUMN_1400710]
							,OBJECT_ID_050130750 => $value[COLUMN_1400720]
							,OBJECT_ID_050130760 => $value[COLUMN_1400730]
							,OBJECT_ID_050130770 => $value[COLUMN_1400740]
							,OBJECT_ID_050130780 => $value[COLUMN_1400750]
							,OBJECT_ID_050130790 => $value[COLUMN_1400760]
							,OBJECT_ID_050130800 => $value[COLUMN_1400770]
							,OBJECT_ID_050130810 => $value[COLUMN_1400780]
							,OBJECT_ID_050130820 => $value[COLUMN_1400790]
							,OBJECT_ID_050130830 => $value[COLUMN_1400800]
							,OBJECT_ID_050130840 => $value[COLUMN_1400810]
							,OBJECT_ID_050130850 => $value[COLUMN_1400820]
							,OBJECT_ID_050130860 => $value[COLUMN_1400830]
							,OBJECT_ID_050130870 => $value[COLUMN_1400840]
							,OBJECT_ID_050130880 => $value[COLUMN_1400850]
							,OBJECT_ID_050130890 => $value[COLUMN_1400860]
							,OBJECT_ID_050130900 => $value[COLUMN_1400870]
							,OBJECT_ID_050130910 => $value[COLUMN_1400880]
							,OBJECT_ID_050130920 => $value[COLUMN_1400890]
							,OBJECT_ID_050130930 => $value[COLUMN_1400900]
							,OBJECT_ID_050130940 => $value[COLUMN_1400910]
							,OBJECT_ID_050130950 => $value[COLUMN_1400920]
							,OBJECT_ID_050130960 => $value[COLUMN_1400930]
							,OBJECT_ID_050130970 => $value[COLUMN_1400940]
							,OBJECT_ID_050130980 => $value[COLUMN_1400950]
							,OBJECT_ID_050130990 => $value[COLUMN_1400960]
							,OBJECT_ID_050131000 => $value[COLUMN_1400970]
							,OBJECT_ID_050131010 => $value[COLUMN_1400980]
							,OBJECT_ID_050131020 => $value[COLUMN_1400990]
							,OBJECT_ID_050131030 => $value[COLUMN_1401000]
							,OBJECT_ID_050131040 => $value[COLUMN_1401010]
							,OBJECT_ID_050131050 => $value[COLUMN_1401020]
							,OBJECT_ID_050131060 => $value[COLUMN_1401030]
							,OBJECT_ID_050131070 => $value[COLUMN_1401040]
							,OBJECT_ID_050131080 => $value[COLUMN_1401050]
							,OBJECT_ID_050131090 => $value[COLUMN_1401060]
							,OBJECT_ID_050131100 => $value[COLUMN_1401070]
							,OBJECT_ID_050131110 => $value[COLUMN_1401080]
							,OBJECT_ID_050131120 => $value[COLUMN_1401090]
							,OBJECT_ID_050131130 => $value[COLUMN_1401100]
							,OBJECT_ID_050131140 => $value[COLUMN_1401110]
							,OBJECT_ID_050131150 => $value[COLUMN_1401120]
							,OBJECT_ID_050131160 => $value[COLUMN_1401130]
							,OBJECT_ID_050131170 => $value[COLUMN_1401140]
							,OBJECT_ID_050131180 => $value[COLUMN_1401150]
							,OBJECT_ID_050131190 => $value[COLUMN_1401160]
							,OBJECT_ID_050131200 => $value[COLUMN_1401170]
							,OBJECT_ID_050131210 => $value[COLUMN_1401180]
							,OBJECT_ID_050131220 => !empty($value[COLUMN_1401190]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401190])) : ""
							,OBJECT_ID_050131230 => $value[COLUMN_1401200]
							,OBJECT_ID_050131240 => $value[COLUMN_1401210]
							,OBJECT_ID_050131250 => $value[COLUMN_1401220]
							,OBJECT_ID_050131260 => $value[COLUMN_1401230]
							,OBJECT_ID_050131270 => $value[COLUMN_1401240]
							,OBJECT_ID_050131280 => $value[COLUMN_1401250]
							,OBJECT_ID_050131290 => $value[COLUMN_1401260]
							,OBJECT_ID_050131300 => $value[COLUMN_1401270]
							,OBJECT_ID_050131310 => $value[COLUMN_1401280]
							,OBJECT_ID_050131320 => $value[COLUMN_1401290]
							,OBJECT_ID_050131330 => $value[COLUMN_1401300]
							,OBJECT_ID_050131340 => $value[COLUMN_1401310]
							,OBJECT_ID_050131350 => $value[COLUMN_1401320]
							,OBJECT_ID_050131360 => $value[COLUMN_1401330]
							,OBJECT_ID_050131370 => $value[COLUMN_1401340]
							,OBJECT_ID_050131380 => $value[COLUMN_1401350]
							,OBJECT_ID_050131390 => $value[COLUMN_1401360]
							,OBJECT_ID_050131400 => $value[COLUMN_1401370]
							,OBJECT_ID_050131410 => $value[COLUMN_1401380]
							,OBJECT_ID_050131420 => $value[COLUMN_1401390]
							,OBJECT_ID_050131430 => $value[COLUMN_1401400]
							,OBJECT_ID_050131440 => $value[COLUMN_1401410]
							,OBJECT_ID_050131450 => !empty($value[COLUMN_1401420]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401420])) : ""
							,OBJECT_ID_050131460 => !empty($value[COLUMN_1401430]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401430])) : ""
							,OBJECT_ID_050131470 => !empty($value[COLUMN_1401440]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401440])) : ""
							,OBJECT_ID_050131480 => $value[COLUMN_1401450]
							,OBJECT_ID_050131490 => !empty($value[COLUMN_1401460]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401460])) : ""
							,OBJECT_ID_050131500 => !empty($value[COLUMN_1401470]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401470])) : ""
							,OBJECT_ID_050131510 => $value[COLUMN_1401480]
							,OBJECT_ID_050131520 => !empty($value[COLUMN_1401490]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401490])) : ""
							,OBJECT_ID_050131530 => $value[COLUMN_1401500]
							,OBJECT_ID_050131540 => $value[COLUMN_1401510]
							,OBJECT_ID_050131550 => $value[COLUMN_1401520]
							,OBJECT_ID_050131560 => $value[COLUMN_1401530]
							,OBJECT_ID_050131570 => !empty($value[COLUMN_1401540]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401540])) : ""
			    ,OBJECT_ID_050131580 => $value[COLUMN_1401550]
                            ,OBJECT_ID_050131590 => $value[COLUMN_1401560]
                            ,OBJECT_ID_050131600 => $value[COLUMN_1401570]
                            ,OBJECT_ID_050131610 => $value[COLUMN_1401580]
                            ,OBJECT_ID_050131620 => $value[COLUMN_1401590]
                            ,OBJECT_ID_050131630 => $value[COLUMN_1401600]
                            ,OBJECT_ID_050131640 => $value[COLUMN_1401610]
                            ,OBJECT_ID_050131650 => $value[COLUMN_1401620]
                            ,OBJECT_ID_050131660 => $value[COLUMN_1401630]
                            ,OBJECT_ID_050131670 => $value[COLUMN_1401640]
                            ,OBJECT_ID_050131680 => $value[COLUMN_1401650]
                            ,OBJECT_ID_050131690 => $value[COLUMN_1401660]
                            ,OBJECT_ID_050131700 => $value[COLUMN_1401670]
                            ,OBJECT_ID_050131710 => $value[COLUMN_1401680]
                            ,OBJECT_ID_050131720 => $value[COLUMN_1401690]
                            ,OBJECT_ID_050131730 => $value[COLUMN_1401700]
                            ,OBJECT_ID_050131740 => $value[COLUMN_1401710]
                            ,OBJECT_ID_050131750 => $value[COLUMN_1401720]
                            ,OBJECT_ID_050131760 => $value[COLUMN_1401730]
                            ,OBJECT_ID_050131770 => $value[COLUMN_1401740]
                            ,OBJECT_ID_050131780 => $value[COLUMN_1401750]
                            ,OBJECT_ID_050131790 => $value[COLUMN_1401760]
                            ,OBJECT_ID_050131800 => $value[COLUMN_1401770]
                            ,OBJECT_ID_050131810 => $value[COLUMN_1401780]
                            ,OBJECT_ID_050131820 => $value[COLUMN_1401790]


								
							);
						}
					}
					
					$loan_list      = $this->Fund->getWrkLoanList($admin_info[LOGIN_ADMIN_ID]);
					$repayment_list = $this->Fund->getWrkFundRepayment($admin_info[LOGIN_ADMIN_ID]);
					
					$this->set("err", $err);
					
					break;
					
				case EVENT_ID_999999999:
					
					$wrk_data = $this->DummyData->v050140();
					
					foreach ($wrk_data as $key => $values) {
						foreach ($values as $value) {

							$data = array(
								 OBJECT_ID_050130010 => $value[COLUMN_1400010]
								,OBJECT_ID_050130020 => $value[COLUMN_1400020]
								,OBJECT_ID_050130030 => number_format($value[COLUMN_1400030])
								,OBJECT_ID_050130040 => number_format($value[COLUMN_1400040])
								,OBJECT_ID_050130050 => number_format($value[COLUMN_1400050])
								,OBJECT_ID_050130060 => number_format($value[COLUMN_1400060])
								,OBJECT_ID_050130070 => !empty($value[COLUMN_1400070]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400070])) : ""
								,OBJECT_ID_050130080 => !empty($value[COLUMN_1400070]) ? date(TIME_FORMAT, strtotime($value[COLUMN_1400070])) : ""
								,OBJECT_ID_050130090 => !empty($value[COLUMN_1400080]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400080])) : ""
								,OBJECT_ID_050130100 => !empty($value[COLUMN_1400080]) ? date(TIME_FORMAT, strtotime($value[COLUMN_1400080])) : ""
								,OBJECT_ID_050130110 => !empty($value[COLUMN_1400090]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400090])) : ""
								,OBJECT_ID_050130120 => !empty($value[COLUMN_1400090]) ? date(TIME_FORMAT, strtotime($value[COLUMN_1400090])) : ""
								,OBJECT_ID_050130130 => !empty($value[COLUMN_1400100]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400100])) : ""
								,OBJECT_ID_050130140 => !empty($value[COLUMN_1400110]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400110])) : ""
								,OBJECT_ID_050130150 => $value[COLUMN_1400120]
								,OBJECT_ID_050130160 => $value[COLUMN_1400130]
								,OBJECT_ID_050130170 => $value[COLUMN_1400140]
								,OBJECT_ID_050130180 => $value[COLUMN_1400150]
								,OBJECT_ID_050130200 => $value[COLUMN_1400170]
                                                                ,OBJECT_ID_050130201 => !empty($value[COLUMN_1400172]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400172])) : ""
								,OBJECT_ID_050130202 => $value[COLUMN_1400171]
                                                                ,OBJECT_ID_050130203 => !empty($value[COLUMN_1400173]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400173])) : ""
							,OBJECT_ID_050130210 => $value[COLUMN_1400180]
							,OBJECT_ID_050130220 => $value[COLUMN_1400190]
							,OBJECT_ID_050130230 => $value[COLUMN_1400200]
							,OBJECT_ID_050130240 => $value[COLUMN_1400210]
							,OBJECT_ID_050130250 => $value[COLUMN_1400220]
							,OBJECT_ID_050130260 => $value[COLUMN_1400230]
							,OBJECT_ID_050130270 => $value[COLUMN_1400240]
							,OBJECT_ID_050130280 => $value[COLUMN_1400250]
							,OBJECT_ID_050130290 => $value[COLUMN_1400260]
							,OBJECT_ID_050130300 => $value[COLUMN_1400270]
							,OBJECT_ID_050130310 => $value[COLUMN_1400280]
							,OBJECT_ID_050130320 => $value[COLUMN_1400290]
							,OBJECT_ID_050130330 => $value[COLUMN_1400300]
							,OBJECT_ID_050130340 => $value[COLUMN_1400310]
							,OBJECT_ID_050130350 => $value[COLUMN_1400320]
							,OBJECT_ID_050130360 => $value[COLUMN_1400330]
							,OBJECT_ID_050130370 => $value[COLUMN_1400340]
							,OBJECT_ID_050130380 => $value[COLUMN_1400350]
							,OBJECT_ID_050130390 => $value[COLUMN_1400360]
							,OBJECT_ID_050130400 => $value[COLUMN_1400370]
							,OBJECT_ID_050130410 => $value[COLUMN_1400380]
							,OBJECT_ID_050130420 => $value[COLUMN_1400390]
							,OBJECT_ID_050130430 => $value[COLUMN_1400400]
							,OBJECT_ID_050130440 => $value[COLUMN_1400410]
							,OBJECT_ID_050130450 => $value[COLUMN_1400420]
							,OBJECT_ID_050130460 => $value[COLUMN_1400430]
							,OBJECT_ID_050130470 => $value[COLUMN_1400440]
							,OBJECT_ID_050130480 => $value[COLUMN_1400450]
							,OBJECT_ID_050130490 => $value[COLUMN_1400460]
							,OBJECT_ID_050130500 => $value[COLUMN_1400470]
							,OBJECT_ID_050130510 => $value[COLUMN_1400480]
							,OBJECT_ID_050130520 => $value[COLUMN_1400490]
							,OBJECT_ID_050130530 => $value[COLUMN_1400500]
							,OBJECT_ID_050130540 => $value[COLUMN_1400510]
							,OBJECT_ID_050130550 => $value[COLUMN_1400520]
							,OBJECT_ID_050130560 => $value[COLUMN_1400530]
							,OBJECT_ID_050130570 => $value[COLUMN_1400540]
							,OBJECT_ID_050130580 => $value[COLUMN_1400550]
							,OBJECT_ID_050130590 => $value[COLUMN_1400560]
							,OBJECT_ID_050130600 => $value[COLUMN_1400570]
							,OBJECT_ID_050130610 => $value[COLUMN_1400580]
							,OBJECT_ID_050130620 => number_format($value[COLUMN_1400590])
							,OBJECT_ID_050130630 => number_format($value[COLUMN_1400600])
							,OBJECT_ID_050130640 => $value[COLUMN_1400610]
							,OBJECT_ID_050130650 => number_format($value[COLUMN_1400620])
							,OBJECT_ID_050130660 => $value[COLUMN_1400630]
							,OBJECT_ID_050130670 => number_format($value[COLUMN_1400640])
							,OBJECT_ID_050130680 => !empty($value[COLUMN_1400650]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1400650])) : ""
							,OBJECT_ID_050130690 => number_format($value[COLUMN_1400660])
							,OBJECT_ID_050130700 => $value[COLUMN_1400670]
							,OBJECT_ID_050130710 => $value[COLUMN_1400680]
							,OBJECT_ID_050130720 => $value[COLUMN_1400690]
							,OBJECT_ID_050130730 => $value[COLUMN_1400700]
							,OBJECT_ID_050130740 => $value[COLUMN_1400710]
							,OBJECT_ID_050130750 => $value[COLUMN_1400720]
							,OBJECT_ID_050130760 => $value[COLUMN_1400730]
							,OBJECT_ID_050130770 => $value[COLUMN_1400740]
							,OBJECT_ID_050130780 => $value[COLUMN_1400750]
							,OBJECT_ID_050130790 => $value[COLUMN_1400760]
							,OBJECT_ID_050130800 => $value[COLUMN_1400770]
							,OBJECT_ID_050130810 => $value[COLUMN_1400780]
							,OBJECT_ID_050130820 => $value[COLUMN_1400790]
							,OBJECT_ID_050130830 => $value[COLUMN_1400800]
							,OBJECT_ID_050130840 => $value[COLUMN_1400810]
							,OBJECT_ID_050130850 => $value[COLUMN_1400820]
							,OBJECT_ID_050130860 => $value[COLUMN_1400830]
							,OBJECT_ID_050130870 => $value[COLUMN_1400840]
							,OBJECT_ID_050130880 => $value[COLUMN_1400850]
							,OBJECT_ID_050130890 => $value[COLUMN_1400860]
							,OBJECT_ID_050130900 => $value[COLUMN_1400870]
							,OBJECT_ID_050130910 => $value[COLUMN_1400880]
							,OBJECT_ID_050130920 => $value[COLUMN_1400890]
							,OBJECT_ID_050130930 => $value[COLUMN_1400900]
							,OBJECT_ID_050130940 => $value[COLUMN_1400910]
							,OBJECT_ID_050130950 => $value[COLUMN_1400920]
							,OBJECT_ID_050130960 => $value[COLUMN_1400930]
							,OBJECT_ID_050130970 => $value[COLUMN_1400940]
							,OBJECT_ID_050130980 => $value[COLUMN_1400950]
							,OBJECT_ID_050130990 => $value[COLUMN_1400960]
							,OBJECT_ID_050131000 => $value[COLUMN_1400970]
							,OBJECT_ID_050131010 => $value[COLUMN_1400980]
							,OBJECT_ID_050131020 => $value[COLUMN_1400990]
							,OBJECT_ID_050131030 => $value[COLUMN_1401000]
							,OBJECT_ID_050131040 => $value[COLUMN_1401010]
							,OBJECT_ID_050131050 => $value[COLUMN_1401020]
							,OBJECT_ID_050131060 => $value[COLUMN_1401030]
							,OBJECT_ID_050131070 => $value[COLUMN_1401040]
							,OBJECT_ID_050131080 => $value[COLUMN_1401050]
							,OBJECT_ID_050131090 => $value[COLUMN_1401060]
							,OBJECT_ID_050131100 => $value[COLUMN_1401070]
							,OBJECT_ID_050131110 => $value[COLUMN_1401080]
							,OBJECT_ID_050131120 => $value[COLUMN_1401090]
							,OBJECT_ID_050131130 => $value[COLUMN_1401100]
							,OBJECT_ID_050131140 => $value[COLUMN_1401110]
							,OBJECT_ID_050131150 => $value[COLUMN_1401120]
							,OBJECT_ID_050131160 => $value[COLUMN_1401130]
							,OBJECT_ID_050131170 => $value[COLUMN_1401140]
							,OBJECT_ID_050131180 => $value[COLUMN_1401150]
							,OBJECT_ID_050131190 => $value[COLUMN_1401160]
							,OBJECT_ID_050131200 => $value[COLUMN_1401170]
							,OBJECT_ID_050131210 => $value[COLUMN_1401180]
							,OBJECT_ID_050131220 => !empty($value[COLUMN_1401190]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401190])) : ""
							,OBJECT_ID_050131230 => $value[COLUMN_1401200]
							,OBJECT_ID_050131240 => $value[COLUMN_1401210]
							,OBJECT_ID_050131250 => $value[COLUMN_1401220]
							,OBJECT_ID_050131260 => $value[COLUMN_1401230]
							,OBJECT_ID_050131270 => $value[COLUMN_1401240]
							,OBJECT_ID_050131280 => $value[COLUMN_1401250]
							,OBJECT_ID_050131290 => $value[COLUMN_1401260]
							,OBJECT_ID_050131300 => $value[COLUMN_1401270]
							,OBJECT_ID_050131310 => $value[COLUMN_1401280]
							,OBJECT_ID_050131320 => $value[COLUMN_1401290]
							,OBJECT_ID_050131330 => $value[COLUMN_1401300]
							,OBJECT_ID_050131340 => $value[COLUMN_1401310]
							,OBJECT_ID_050131350 => $value[COLUMN_1401320]
							,OBJECT_ID_050131360 => $value[COLUMN_1401330]
							,OBJECT_ID_050131370 => $value[COLUMN_1401340]
							,OBJECT_ID_050131380 => $value[COLUMN_1401350]
							,OBJECT_ID_050131390 => $value[COLUMN_1401360]
							,OBJECT_ID_050131400 => $value[COLUMN_1401370]
							,OBJECT_ID_050131410 => $value[COLUMN_1401380]
							,OBJECT_ID_050131420 => $value[COLUMN_1401390]
							,OBJECT_ID_050131430 => $value[COLUMN_1401400]
							,OBJECT_ID_050131440 => $value[COLUMN_1401410]
							,OBJECT_ID_050131450 => !empty($value[COLUMN_1401420]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401420])) : ""
							,OBJECT_ID_050131460 => !empty($value[COLUMN_1401430]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401430])) : ""
							,OBJECT_ID_050131470 => !empty($value[COLUMN_1401440]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401440])) : ""
							,OBJECT_ID_050131480 => $value[COLUMN_1401450]
							,OBJECT_ID_050131490 => !empty($value[COLUMN_1401460]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401460])) : ""
							,OBJECT_ID_050131500 => !empty($value[COLUMN_1401470]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401470])) : ""
							,OBJECT_ID_050131510 => $value[COLUMN_1401480]
							,OBJECT_ID_050131520 => !empty($value[COLUMN_1401490]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401490])) : ""
							,OBJECT_ID_050131530 => $value[COLUMN_1401500]
							,OBJECT_ID_050131540 => $value[COLUMN_1401510]
							,OBJECT_ID_050131550 => $value[COLUMN_1401520]
							,OBJECT_ID_050131560 => $value[COLUMN_1401530]
							,OBJECT_ID_050131570 => !empty($value[COLUMN_1401540]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1401540])) : ""
                            ,OBJECT_ID_050131580 => $value[COLUMN_1401550]
                            ,OBJECT_ID_050131590 => $value[COLUMN_1401560]
                            ,OBJECT_ID_050131600 => $value[COLUMN_1401570]
                            ,OBJECT_ID_050131610 => $value[COLUMN_1401580]
                            ,OBJECT_ID_050131620 => $value[COLUMN_1401590]
                            ,OBJECT_ID_050131630 => $value[COLUMN_1401600]
                            ,OBJECT_ID_050131640 => $value[COLUMN_1401610]
                            ,OBJECT_ID_050131650 => $value[COLUMN_1401620]
                            ,OBJECT_ID_050131660 => $value[COLUMN_1401630]
                            ,OBJECT_ID_050131670 => $value[COLUMN_1401640]
                            ,OBJECT_ID_050131680 => $value[COLUMN_1401650]
                            ,OBJECT_ID_050131690 => $value[COLUMN_1401660]
                            ,OBJECT_ID_050131700 => $value[COLUMN_1401670]
                            ,OBJECT_ID_050131710 => $value[COLUMN_1401680]
                            ,OBJECT_ID_050131720 => $value[COLUMN_1401690]
                            ,OBJECT_ID_050131730 => $value[COLUMN_1401700]
                            ,OBJECT_ID_050131740 => $value[COLUMN_1401710]
                            ,OBJECT_ID_050131750 => $value[COLUMN_1401720]
                            ,OBJECT_ID_050131760 => $value[COLUMN_1401730]
                            ,OBJECT_ID_050131770 => $value[COLUMN_1401740]
                            ,OBJECT_ID_050131780 => $value[COLUMN_1401750]
                            ,OBJECT_ID_050131790 => $value[COLUMN_1401760]
                            ,OBJECT_ID_050131800 => $value[COLUMN_1401770]
                            ,OBJECT_ID_050131810 => $value[COLUMN_1401780]
                            ,OBJECT_ID_050131820 => $value[COLUMN_1401790]

								
							);
						}
					}
					
					break;
					
				default :
					
					// ファンド一覧へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050110);
			}
			
			$this->set("data"          , $data);
			$this->set("loan_list"     , $loan_list);
			$this->set("repayment_list", $repayment_list);
			
			$list[CONFIG_0040] = Configure::read(CONFIG_0040);
			$list[CONFIG_0041] = Configure::read(CONFIG_0041);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			$this->Common->trnRollback(); // ◆ロールバック◆
			
			// 例外処理
			$err_str = "c050_admin/v140fundconfirmで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
			
		}
	}
	
	/*
	 * ファンド詳細(完了)
	 */
	function v150fundcomplete(){

		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_050140020: // ファンド詳細(確認)：決定ボタン押下
				case EVENT_ID_999999999:
					
					break;
					
				case EVENT_ID_050150010: // 戻るボタン押下
					
					$proc_type = $this->Common->getSessionProcTypeFund();
					
					if (strcmp(PROC_TYPE_INSERT, $proc_type) == 0) {
						
						// 新規作成→ファンド一覧へ
						$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050110);
					}
					elseif (strcmp(PROC_TYPE_UPDATE, $proc_type) == 0) {
						
						// 更新→ファンド詳細(照会)
						$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050120);
					}
					
					break;
					
				default :
					
					// ファンド一覧へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050110);
			}
			
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "c050_admin/v150fundcompleteで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
		}
	}
	
	/*
	 * 貸付内容(照会)
	 */
	function v160loandetail(){

		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$data = null;
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				default : // その他
					
					// 管理者情報取得
					$admin_info = $this->SessionAdminInfo->getAdminInfo();

					// セッション情報取得
					$fund_data = null;
					if (isset($this->params["url"][GET_PARAM_INDEX_FUND_ID]) && isset($this->params["url"][GET_PARAM_INDEX_LOAN_NO])) {
						
						// ファンドID、貸付番号がある場合は返済予定知覧からの表示
						
						$fund_id = $this->params["url"][GET_PARAM_INDEX_FUND_ID];
						$loan_no = $this->params["url"][GET_PARAM_INDEX_LOAN_NO];
						
						// ファンドデータ取得
						$fund_data = $this->Fund->getMstLoan($fund_id, $loan_no);
						
						$fund_name = $this->Fund->getFundName($fund_id);
						
						// 返済(貸付)取得
						$data_list = $this->LoanRepayment->getTrnLoanRepayments($fund_id, $loan_no);
					}
					elseif (!isset($this->params["url"][GET_PARAM_INDEX_FUND_ID]) && isset($this->params["url"][GET_PARAM_INDEX_LOAN_NO])) {
						
						// 貸付番号だけがある場合はファンド詳細(照会)からの表示
						
						$loan_no = $this->params["url"][GET_PARAM_INDEX_LOAN_NO];
						
						// ファンドデータ取得
						$fund_data = $this->Fund->getWrkLoan($admin_info[LOGIN_ADMIN_ID], $loan_no);
						
						$fund_name = $this->Common->getSessionFundName();
						
						// 返済(貸付)ワーク取得
						$data_list = $this->Fund->getWrkLoanRepayment($admin_info[LOGIN_ADMIN_ID], $loan_no);
					}
					else {
						
						// GETパラメータが無い場合、メニュー画面へ
						$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);
					}
					
					foreach ($fund_data as $key => $values) {
						foreach ($values as $value) {
				
							$data = array(
								 OBJECT_ID_050170010 => $value[COLUMN_1600020] // ファンドID
								,OBJECT_ID_050170020 => $fund_name             // ファンド名
								,OBJECT_ID_050170030 => $loan_no               // 貸付番号
								,OBJECT_ID_050170040 => $value[COLUMN_1600040] // 借主
								,OBJECT_ID_050170050 => !empty($value[COLUMN_1600050]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1600050])) : "" // 貸付日
								,OBJECT_ID_050170060 => $value[COLUMN_1600060] // 貸付予定額
								,OBJECT_ID_050170070 => $value[COLUMN_1600070] // 貸付額
								,OBJECT_ID_050170080 => $value[COLUMN_1600080] // 最低成立額
								,OBJECT_ID_050170090 => $value[COLUMN_1600090] // 実質年率
								,OBJECT_ID_050170100 => $value[COLUMN_1600100] // 返済回数
								,OBJECT_ID_050170110 => $value[COLUMN_1600110] // 返済開始年
								,OBJECT_ID_050170120 => $value[COLUMN_1600120] // 返済開始月
								,OBJECT_ID_050170130 => $value[COLUMN_1600130] // 約定日
								,OBJECT_ID_050170140 => $value[COLUMN_1600150] // 保証
								,OBJECT_ID_050170150 => $value[COLUMN_1600160] // 担保
								,OBJECT_ID_050170160 => $value[COLUMN_1600170] // 返済方法
								,OBJECT_ID_050170170 => $value[COLUMN_1600180] // 配当額
								,OBJECT_ID_050170180 => $value[COLUMN_1600190] // 源泉徴収
								,OBJECT_ID_050170190 => $value[COLUMN_1600200] // 報酬額
							);
						}
					}
					
			}
			
					
			$this->set("data"     , $data);
			$this->set("data_list", $data_list);
			
			$list[CONFIG_0040] = Configure::read(CONFIG_0040);
			$list[CONFIG_0041] = Configure::read(CONFIG_0041);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "c050_admin/v160loandetailで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
		}
	}
	
	/*
	 * 貸付内容(入力)
	 */
	function v170loaninput(){

		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$data = null;
			
			$event_id = $this->Common->getSessionEventId();
			
			// セッション情報から管理者情報を取得
			$admin_info = $this->SessionAdminInfo->getAdminInfo();
			
			switch ($event_id) {
				case EVENT_ID_050130040: // ファンド詳細(入力)：貸付追加ボタン押下
				case EVENT_ID_050130050: // ファンド詳細(入力)：貸付番号リンク押下
					
					// セッション情報取得
					$fund_id   = $this->Common->getSessionFundId();
					$fund_name = $this->Common->getSessionFundName();
					$loan_no   = $this->Common->getSessionLoanNo();
					
					// ワークデータ取得
					$wrk_data = $this->Fund->getWrkLoan($admin_info[LOGIN_ADMIN_ID], $loan_no);
					
					foreach ($wrk_data as $key => $values) {
						foreach ($values as $value) {
				
							$data = array(
								 OBJECT_ID_050170010 => $fund_id               // ファンドID
								,OBJECT_ID_050170020 => $fund_name             // ファンド名
								,OBJECT_ID_050170030 => $loan_no               // 貸付番号
								,OBJECT_ID_050170040 => $value[COLUMN_1600040] // 借主
								,OBJECT_ID_050170050 => !empty($value[COLUMN_1600050]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1600050])) : "" // 貸付日
								,OBJECT_ID_050170060 => $value[COLUMN_1600060] // 貸付予定額
								,OBJECT_ID_050170070 => $value[COLUMN_1600070] // 貸付額
								,OBJECT_ID_050170080 => $value[COLUMN_1600080] // 最低成立額
								,OBJECT_ID_050170090 => $value[COLUMN_1600090] // 実質年率
								,OBJECT_ID_050170100 => $value[COLUMN_1600100] // 返済回数
								,OBJECT_ID_050170110 => $value[COLUMN_1600110] // 返済開始年
								,OBJECT_ID_050170120 => $value[COLUMN_1600120] // 返済開始月
								,OBJECT_ID_050170130 => $value[COLUMN_1600130] // 約定日
								,OBJECT_ID_050170140 => $value[COLUMN_1600150] // 保証
								,OBJECT_ID_050170150 => $value[COLUMN_1600160] // 担保
								,OBJECT_ID_050170160 => $value[COLUMN_1600170] // 返済方法
								,OBJECT_ID_050170170 => $value[COLUMN_1600180] // 配当額
								,OBJECT_ID_050170180 => $value[COLUMN_1600190] // 源泉徴収
								,OBJECT_ID_050170190 => $value[COLUMN_1600200] // 報酬額
							);
						}
					}
					
					// 返済(貸付)ワーク取得
					$data_list = $this->Fund->getWrkLoanRepayment($admin_info[LOGIN_ADMIN_ID], $loan_no);
					
					$this->set("data"     , $data);
					$this->set("data_list", $data_list);
					
					break;
					
				case EVENT_ID_050170010: // 戻るボタン押下
					
					// 未登録の貸付ワークを削除
					$this->Fund->deleteWrkLoanUnregistered($admin_info[LOGIN_ADMIN_ID], $this->Common->getSessionLoanNo());
					
					// ファンド詳細(入力)へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050130);
					
				case EVENT_ID_050170020: // 確認ボタン押下
					
					$data = $this->data;
							
					// 入力データをセッションに格納
					$this->Common->setSessionFormData($data);
					
					$err = $this->CheckC050->v170($data);
					
					if (is_null($err)) {
						
						// 入力内容に合わせて返済予定表作成
						$repayment_list = $this->Fund->makeLoanRepayment($admin_info[LOGIN_ADMIN_ID], $data);

						// 返済予定表をセッションに格納
						$this->Common->setSessionFormDataList($repayment_list);

						// 貸付内容(確認)へ
						$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050180);
					}
					
					$this->set("validation_errors", array($err));
					
					break;
					
				case EVENT_ID_050180010: // 貸付内容(確認)    ：戻るボタン押下
					
					// セッション情報取得
					$fund_id   = $this->Common->getSessionFundId();
					$fund_name = $this->Common->getSessionFundName();
					$loan_no   = $this->Common->getSessionLoanNo();
					$value     = $this->Common->getSessionFormData();
					
					// セッションデータ取得
					$data = array(
						 OBJECT_ID_050170010 => $fund_id                    // ファンドID
						,OBJECT_ID_050170020 => $fund_name                  // ファンド名
						,OBJECT_ID_050170030 => $loan_no                    // 貸付番号
						,OBJECT_ID_050170040 => $value[OBJECT_ID_050170040] // 借主
						,OBJECT_ID_050170050 => $value[OBJECT_ID_050170050] // 貸付日
						,OBJECT_ID_050170060 => $value[OBJECT_ID_050170060] // 貸付予定額
						,OBJECT_ID_050170070 => $value[OBJECT_ID_050170070] // 貸付額
						,OBJECT_ID_050170080 => $value[OBJECT_ID_050170080] // 最低成立額
						,OBJECT_ID_050170090 => $value[OBJECT_ID_050170090] // 実質年率
						,OBJECT_ID_050170100 => $value[OBJECT_ID_050170100] // 返済回数
						,OBJECT_ID_050170110 => $value[OBJECT_ID_050170110] // 返済開始年
						,OBJECT_ID_050170120 => $value[OBJECT_ID_050170120] // 返済開始月
						,OBJECT_ID_050170130 => $value[OBJECT_ID_050170130] // 約定日
						,OBJECT_ID_050170140 => $value[OBJECT_ID_050170140] // 保証
						,OBJECT_ID_050170150 => $value[OBJECT_ID_050170150] // 担保
						,OBJECT_ID_050170160 => $value[OBJECT_ID_050170160] // 返済方法
					);
					
					// 返済(貸付)ワーク取得
					$data_list = $this->Common->getSessionFormDataList();
					
					$this->set("data"     , $data);
					$this->set("data_list", $data_list);
					
					break;
					
				default : // その他
					
					// ファンド一覧へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050110);
			}
			
			$this->set("data", $data);
			
			$list[CONFIG_0040] = Configure::read(CONFIG_0040);
			$list[CONFIG_0041] = Configure::read(CONFIG_0041);
			$this->set("list" , $list);
					
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "c050_admin/v170loaninputで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
			
		}
	}
	
	/*
	 * 貸付内容(確認)
	 */
	function v180loanconfirm(){

		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$data = null;
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_050170020: // 貸付内容(入力)：確認ボタン押下
					
					// 貸付ワークからデータ取得、Viewに渡す変数を設定
					$admin_info = $this->SessionAdminInfo->getAdminInfo();

					// セッション情報取得
					$fund_id   = $this->Common->getSessionFundId();
					$fund_name = $this->Common->getSessionFundName();
					$loan_no   = $this->Common->getSessionLoanNo();
					$value     = $this->Common->getSessionFormData();
					
					$data = array(
						 OBJECT_ID_050170010 => $fund_id               // ファンドID
						,OBJECT_ID_050170020 => $fund_name             // ファンド名
						,OBJECT_ID_050170030 => $loan_no               // 貸付番号
						,OBJECT_ID_050170040 => $value[OBJECT_ID_050170040] // 借主
						,OBJECT_ID_050170050 => $value[OBJECT_ID_050170050] // 貸付日
						,OBJECT_ID_050170060 => !empty($value[OBJECT_ID_050170060]) ? number_format($value[OBJECT_ID_050170060]) : "0" // 貸付予定額
						,OBJECT_ID_050170070 => !empty($value[OBJECT_ID_050170070]) ? number_format($value[OBJECT_ID_050170070]) : "0" // 貸付額
						,OBJECT_ID_050170080 => !empty($value[OBJECT_ID_050170080]) ? number_format($value[OBJECT_ID_050170080]) : "0" // 最低成立額
						,OBJECT_ID_050170090 => $value[OBJECT_ID_050170090] // 実質年率
						,OBJECT_ID_050170100 => $value[OBJECT_ID_050170100] // 返済回数
						,OBJECT_ID_050170110 => $value[OBJECT_ID_050170110] // 返済開始年
						,OBJECT_ID_050170120 => $value[OBJECT_ID_050170120] // 返済開始月
						,OBJECT_ID_050170130 => $value[OBJECT_ID_050170130] // 約定日
						,OBJECT_ID_050170140 => $value[OBJECT_ID_050170140] // 保証
						,OBJECT_ID_050170150 => $value[OBJECT_ID_050170150] // 担保
						,OBJECT_ID_050170160 => $value[OBJECT_ID_050170160] // 返済方法
					);
					
					$data_list = $this->Common->getSessionFormDataList();
					
					$this->set("data"     , $data);
					$this->set("data_list", $data_list);
					
					break;
					
				case EVENT_ID_050180010: // 戻るボタン押下
					
					// 貸付内容(入力)へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050170);
					
				case EVENT_ID_050180020: // 決定ボタン押下
					
					$admin_info = $this->SessionAdminInfo->getAdminInfo();
					$loan_no    = $this->Common->getSessionLoanNo();
					$proc_type  = $this->Common->getSessionProcTypeLoan();
					$data       = $this->Common->getSessionFormData();
					$data_list  = $this->Common->getSessionFormDataList();
					
					$this->Common->setSessionEventId($event_id);
					
					// ◆トランザクションスタート◆
					$this->Common->trnBegin();
					
					// 返済(貸付)ワーク更新
					$this->Fund->saveWrkLoanRpayment($admin_info, $loan_no, $data_list);
					
					// 貸付ワーク更新
					$this->Fund->saveWrkLoan($admin_info, $loan_no, $data);
					
					// 貸付ワーク日時更新
					$this->Fund->saveWrkLoanDatetime($admin_info, $loan_no, $proc_type);
					
					// 返済(ファンド)ワーク更新
					$this->Fund->saveWrkFundRpayment($admin_info);
					
					// ◆コミット◆
					$this->Common->trnCommit();
					
					// セッション初期化
					$this->Common->deleteSessionLoanNo();
					$this->Common->deleteSessionProcTypeLoan();
					$this->Common->deleteSessionFormData();
					
					
					// ファンド詳細(入力)へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050130);
					
					break;
					
				default : // その他
					
					// ファンド一覧へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050110);
			}
			
			$list[CONFIG_0040] = Configure::read(CONFIG_0040);
			$list[CONFIG_0041] = Configure::read(CONFIG_0041);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			$this->Common->trnRollback(); // ◆ロールバック◆
			
			// 例外処理
			$err_str = "c050_admin/v180loanconfirmで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
		}
	}
	
	/*
	 * 返済予定一覧(入力)
	 */
	function v190repaymentinput(){

		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_050190010: // メニューボタン押下
					
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);
					
				case EVENT_ID_050190020: // 絞込みボタン押下
					
					$data = $this->data;
					$search[SEARCH_ID_050190010] = $data[SEARCH_ID_050190010];
					$search[SEARCH_ID_050190020] = $data[SEARCH_ID_050190020];
					$search[SEARCH_ID_050190030] = $data[SEARCH_ID_050190030];
					$search[SEARCH_ID_050190040] = $data[SEARCH_ID_050190040];
					$search[SEARCH_ID_050190050] = $data[SEARCH_ID_050190050];
					
					$err = $this->CheckC050->v1901($search);
					
					if (is_null($err)) {
						$data_list = $this->LoanRepayment->searchLoanRepaymentList($search);
						$this->set("data", $data_list);
					}
					else {
						$this->set("data", $search);
					}
					
					$this->set("validation_errors", $err);
					
					break;
					
				case EVENT_ID_050190030: // 今月分ボタン押下
					
					$data = $this->data;
					$search[SEARCH_ID_050190010] = date("Y");
					$search[SEARCH_ID_050190020] = date("m");
					$search[SEARCH_ID_050190030] = "";
					$search[SEARCH_ID_050190040] = $data[SEARCH_ID_050190040];
					$search[SEARCH_ID_050190050] = $data[SEARCH_ID_050190050];
					
					$data_list = $this->LoanRepayment->searchLoanRepaymentList($search);
					$this->set("data", $data_list);
					
					break;
				
				case EVENT_ID_050190040: // 遅延ボタン押下
					
					$data = $this->data;
					$search[SEARCH_ID_050190010] = "";
					$search[SEARCH_ID_050190020] = "";
					$search[SEARCH_ID_050190030] = "";
					$search[SEARCH_ID_050190040] = $data[SEARCH_ID_050190040];
					$search[SEARCH_ID_050190050] = $data[SEARCH_ID_050190050];
					
					$data_list = $this->LoanRepayment->getDalayTrnLoanRepayments($search);
					$this->set("data", $data_list);
					
					break;
				
				case EVENT_ID_050190050: // 確認ボタン押下
					
					$data = $this->data;
					
					$err = $this->CheckC050->v1902($data);
					
					if (is_null($err)) {
						$this->Common->setSessionFormData($data);
						
						// 確認画面へ
						$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050200);
					}
					
					$this->set("data",      $data);
					$this->set("validation_errors", $err);
					
					break;
					
				case EVENT_ID_050200010: // 返済予定一覧(確認)画面： 戻るボタン押下
					
					$data = $this->Common->getSessionFormData();
					
					$this->set("data", $data);
					
					break;
				
				default : // その他
					
					$data = array(
						  SEARCH_ID_050190010 => date("Y") 
						, SEARCH_ID_050190020 => date("m") 
						, SEARCH_ID_050190030 => ""
					    , SEARCH_ID_050190040 => "" 
						, SEARCH_ID_050190050 => ""
				    );

				    $this->set("data", $data);
			}
			
			$list[CONFIG_0029] = Configure::read(CONFIG_0029);
			$list[CONFIG_0037] = Configure::read(CONFIG_0037);
			$this->set("list" , $list);
					
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "c050_admin/v190repaymentinputで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
		}
	}
	
	/*
	 * 返済予定一覧(確認)
	 */
	function v200repaymentconfirm(){

		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_050190050: // 返済予定一覧(入力)画面：　確認ボタン押下
					
					$data = $this->Common->getSessionFormData();
					
					$data_list = $this->LoanRepayment->getLoanRepaymentList($data);
					
					$this->set("data", $data_list);
					
					break;
				
				case EVENT_ID_050200020: // 決定ボタン押下
					
					$data = $this->Common->getSessionFormData();
					
					// ◆トランザクションスタート◆
					$this->Common->trnBegin();
					
					$this->LoanRepayment->updateLoanRepayment($data);
					
					// ◆コミット◆
					$this->Common->trnCommit();
					
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050210);
					
				default : // その他
					
					// 入力画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050190);
			}
					
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			$this->Common->trnRollback(); // ◆ロールバック◆
			
			// 例外処理
			$err_str = "c050_admin/v200repaymentconfirm で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
		}
	}
	
	/*
	 * 返済予定一覧(完了)
	 */
	function v210repaymentcomplete(){

		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_050200020: // 返済予定一覧(確認)画面：　決定ボタン押下
				
					break;
				
				default : // その他
					
					// 入力画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050190);
			}
					
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "c050_admin/v210repaymentcomplete で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
		}
	}

	/*
	 * 配当実行(入力)
	 */
	function v220dividendinput(){

		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_050220010: // メニューボタン押下
					
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);
					
				case EVENT_ID_050220020: // 確認ボタン押下
					
					$data = $this->data;
					
					// 入力データからイベントIDを除去
					unset($data[HIDDEN_ID_000000010]);
					
					// 入力チェック
					$err = $this->CheckC050->v220($data);
					
					if (is_null($err)) {
						
						// エラーが無ければ入力データをセッションに格納
						$this->Common->setSessionFormData($data);

						// 確認画面へ
						$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050230);
					}
					
					// エラーがある場合、入力画面を再表示
					$admin_info = $this->SessionAdminInfo->getAdminInfo();
					$data_list = $this->Common->getSessionFormDataList();
					
					$this->set("data_list", $data_list);
					$this->set("validation_errors", $err);
					
					break;
					
				case EVENT_ID_050230010: // 配当実行(確認): 戻るボタン
					
					$admin_info = $this->SessionAdminInfo->getAdminInfo();
					
					// 画面入力データをセッションから取得
					$data = $this->Common->getSessionFormData();

					// 配当実行対象リストをセッションから取得
					$data_list = $this->Common->getSessionFormDataList();
					
					$this->set("data_list", $data_list);
					$this->set("data", $data);

					break;
				
				default : // その他
					
					$admin_info = $this->SessionAdminInfo->getAdminInfo();
					
					// 配当実行対象リスト作成
					$data_list = $this->DividendHistory->getDividendTargetFund($admin_info[LOGIN_ADMIN_ID]);
					
					// 作成したデータをセッションに格納
					$this->Common->setSessionFormDataList($data_list);
					
					$count = 0;
					$data = array();
					if (0 < count($data_list)) {
						
						// 初期表示は全件選択状態
						foreach ($data_list as $key => $value) {
							
							$count++;
							$data[OBJECT_ID_050220200.$count] = $value[OBJECT_ID_050220040];
						}
					}
				
					$this->set("data_list" , $data_list);
					$this->set("data" , $data);
					
					break;
					
			}
			
			// セッション内の入力データを削除
			$this->Common->deleteSessionFormData();
			
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "c050_admin/v220dividendinputで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
		}
	}
	
	/*
	 * 配当実行(確認)
	 */
	function v230dividendconfirm(){

		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_050220020: // 配当実行（入力）：確認ボタン押下
					
					$admin_info = $this->SessionAdminInfo->getAdminInfo();
					
					// 入力データ取得
					$data = $this->Common->getSessionFormData();
					
					// 配当実行対象リスト取得
					$data_list = $this->Common->getSessionFormDataList();
					
					// 入力画面でチェックされたデータだけを抜き出してViewに渡す
					$confirm_list = array();
					foreach ($data as $key => $value) {
						$confirm_list[] = $data_list[$value];
					}
					
					$this->set("data_list", $confirm_list);
					
					break;
				
				case EVENT_ID_050230010: // 戻るボタン押下
					
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050220);
					
				case EVENT_ID_050230020: // 決定ボタン押下
					
					$data = $this->Common->getSessionFormData();
					$admin_info = $this->SessionAdminInfo->getAdminInfo();
					
					// ◆トランザクションスタート◆
					$this->Common->trnBegin();
					
					$user_list = $this->DividendHistory->executeDividend($admin_info, $data);
					
					// ◆コミット◆
					$this->Common->trnCommit();
					
					// DB更新完了後、通知メール送信
					// 2017/11/29 メール配信機能廃止
					//$this->DividendHistory->sendMailExcecuteDividend($user_list);
					
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050240);
					
				default : // その他
					
					// 入力画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050220);
					
			}
			
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			$this->Common->trnRollback();
			
			// 例外処理
			$err_str = "c050_admin/v230dividendconfirm で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
		}
	}
	
	/*
	 * 配当実行(完了)
	 */
	function v240dividendcomplete(){

		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_050230020: // 配当実行(確認)画面：　決定ボタン押下
					
					break;
				
				default : // その他
					
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050220);
			}
					
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "c050_admin/v240dividendcompleteで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
		}
	}
	
	/*
	 * 休日設定
	 */
	function v260holiday(){

		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_050260010: // 年数リスト変更
					
					$this->set("c_year", $this->data[OBJECT_ID_050260010]);
					$this->set("calendar_list", $this->Calendar->getCalendarListOneYear($this->data[OBJECT_ID_050260010]));
					break;
				
				case EVENT_ID_050260020: // 1年分追加ボタン押下
					
					$year = $this->Calendar->getMaxYearInCalendar();
					
					// トランザクションスタート
					$this->Common->trnBegin();
					
					$this->Calendar->addNewYearCalendar(++$year);
					
					// コミット
					$this->Common->trnCommit(); 
					
					$this->set("c_year", $year);
					$this->set("calendar_list", $this->Calendar->getCalendarListOneYear($year));
					
					break;
				
				case EVENT_ID_050260030: // 決定ボタン押下
				
					// トランザクションスタート
					$this->Common->trnBegin();
					
					$this->Calendar->updateCalendar($this->data);
					
					// コミット
					$this->Common->trnCommit(); 
					
					$year = $this->data['c_year_list'];
					
					$this->set("c_year", $year);
					$this->set("err", array("カレンダーの更新が完了しました。"));
					$this->set("calendar_list", $this->Calendar->getCalendarListOneYear($year));
					
					break;
				
				case EVENT_ID_050260040: // メニューボタン
					
					// メニュー画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);
				
				default : // その他
					
					$this->set("c_year", date("Y"));
					$this->set("calendar_list", $this->Calendar->getCalendarListOneYear(date("Y")));
			}
			
			$this->set(OBJECT_ID_050260010, $this->Calendar->getYearList());
			
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {

			$this->Common->trnRollback(); 
			
			// 例外処理
			$err_str = "c050_admin/v260holidayで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	
	/*
	 * 運用報告書選択
	 */
	function v270operatingreportselect(){

		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_050120070: // ファンド詳細(照会)：運用報告書ボタン押下
				case EVENT_ID_050280010: // 運用報告書(照会)：戻るボタン押下
				case EVENT_ID_050310040: // 運用報告書(入力)：戻るボタン押下
				case EVENT_ID_050330010: // 運用報告書(完了)：戻るボタン押下
					
					$fund_id                   = $this->Common->getSessionFundId();
					$data[OBJECT_ID_050270010] = $fund_id;
					$data[OBJECT_ID_050270020] = $this->Common->getSessionFundName();
					$data[OBJECT_ID_050270030] = "";
					
					$date_list = null;
					$report_list = $this->OperatingReport->getOperatingReportList($fund_id);
					foreach ($report_list as $key => $value) {
						$id             = $value[COLUMN_2700010];
						$report_year    = $value[COLUMN_2700040];
						$report_month   = $value[COLUMN_2700050];
						$date_list[$id] = date(DATE_FORMAT_MONTH, strtotime($report_year."/".$report_month."/01"));
					}
					
					$this->set("data", $data);
					$this->set("date_list", $date_list);
					
					break;
				
				case EVENT_ID_050270010: // 戻るボタン
					
					// ファンド詳細画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050120);

				case EVENT_ID_050270030: // メニューボタン
					
					// メニュー画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);

				case EVENT_ID_050270040: // 表示ボタン
					
					$id = $this->data[OBJECT_ID_050270030];
					
					// 運用報告書（照会）画面へ
					$this->Common->setSessionReportId($id);
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050280);

				case EVENT_ID_050270050: // 新規追加ボタン
					
					// 運用報告書（入力）画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050310);

				default : // その他
					
					// 一覧画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050110);
			}
			
			$this->Common->deleteSessionReportId();
			$this->Common->deleteSessionFormData();
			
			$this->set("action", $this->Common->getCurrentAction());

		} catch (Exception $ex) {

			// 例外処理
			$err_str = "c050_admin/v270operatingreportselect で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	
	/**
	 * 運用報告書（照会）
	 */
	function v280operatingreportdetail() {
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");

		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_050270040: // 報告書選択     ：表示ボタン押下
				case EVENT_ID_050330010: // 運用報告書(完了): 戻るボタン
					
					$id   = $this->Common->getSessionReportId();
					$data = $this->OperatingReport->setOperatingReportInfo2($id);
					
					$this->set("data", $data);
					
					break;
				
				case EVENT_ID_050280010: // 戻るボタン
					
					// 報告書選択画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050270);

				case EVENT_ID_050280020: // 修正ボタン
					
					// 運用報告書（入力）画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050310);

				case EVENT_ID_050280040: // メニューボタン
					
					// メニュー画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);

				default : // その他
					
					// 一覧画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050110);
			}
			
			$list[CONFIG_0061] = Configure::read(CONFIG_0061);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			
			$this->Common->trnRollback();
			
			// 例外処理
			$err_str = "c050_admin/v320operatingreportconfirm で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	
	/**
	 * 投資家詳細（照会）：交渉履歴
	 */
	function v300negotiation() {
		
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");

		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				
				case EVENT_ID_050300010: // 登録ボタン
					
					$data = $this->data;
					
					$err = $this->CheckC050->v300($data, 0);
					
					if (is_null($err)) {
						
						// トランザクションスタート
						$this->Common->trnBegin();
						
						$this->NegotiationHistory->insertNegotiationHistory($data);
						$err[] = "登録が完了しました。";
						
						// コミット
						$this->Common->trnCommit(); 
						
						$user_id   = $data[OBJECT_ID_050300080];
						$user_name = $data[OBJECT_ID_050300090];
						$data_list = $this->NegotiationHistory->getNegotiationHistory($user_id, $user_name);
						
						$data_list[HIDDEN_ID_000000200] = $data[HIDDEN_ID_000000200];
					}
					else {
						$data_list = $data;
					}
					
					$this->set("err"  , array('0' => $err));
					$this->set("data" , $data_list);
					
					break;
				
				case EVENT_ID_050300020: // 投資家情報ボタン
					
					// 投資家詳細(照会)画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050040);
					
				case EVENT_ID_050300040: // メニューボタン
					
					// メニュー画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);

				case EVENT_ID_050300050: // 更新ボタン
				case EVENT_ID_050300060: // 削除ボタン
					
					$data  = $this->data;
					$count = $data[HIDDEN_ID_000000160];
					
					if (strcmp(EVENT_ID_050300050, $event_id) == 0) { // 更新
						$flag = true;
						$err  = $this->CheckC050->v300($data, $count);
					}
					else { // 削除
						$flag = false;
						$err  = null;
					}
					
					if (is_null($err)) {

						// トランザクションスタート
						$this->Common->trnBegin();
						
						$this->NegotiationHistory->updateNegotiationHistory($data, $count, $flag);
						
						// コミット
						$this->Common->trnCommit(); 
						
						if ($flag) {
							$err[] = "更新が完了しました。";
						}
						
						$user_id   = $data[OBJECT_ID_050300080];
						$user_name = $data[OBJECT_ID_050300090];
						$data_list = $this->NegotiationHistory->getNegotiationHistory($user_id, $user_name);
						
						$data_list[HIDDEN_ID_000000200] = $data[HIDDEN_ID_000000200];
					}
					else {
						$data_list = $data;
					}
					
					$this->set("err"  , array($count => $err));
					$this->set("data" , $data_list);
					
					break;
				
				case EVENT_ID_050040050: // 投資家詳細（照会）：交渉履歴ボタン押下
					
					// 管理者情報取得
					$admin_info = $this->SessionAdminInfo->getAdminInfo();
					
					// ワークデータ取得
					$wrk_user_data = $this->User->getWrkUser($admin_info[LOGIN_ADMIN_ID]);
					
					foreach ($wrk_user_data as $key => $values) {
						foreach ($values as $value) {
							$user_id          = $value[COLUMN_1800010];
							$kanji_last_name  = $value[COLUMN_1800060];
							$kanji_first_name = $value[COLUMN_1800070];
							$furi_last_name   = $value[COLUMN_1800080];
							$furi_first_name  = $value[COLUMN_1800090];
							
							$user_name = $kanji_last_name." ".$kanji_first_name."(".$furi_last_name." ".$furi_first_name.")";
						}
					}
					
					$data_list = $this->NegotiationHistory->getNegotiationHistory($user_id, $user_name);
					
					$data_list[HIDDEN_ID_000000200] = $this->Common->getSessionReferenceFlag();
					
					$this->set("data" , $data_list);
					
					break;
				
				default : // その他
					
					// 投資家一覧へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050030);
			}
			
			$list[CONFIG_0056] = Configure::read(CONFIG_0056);
			$list[CONFIG_0057] = Configure::read(CONFIG_0057);
			$list[CONFIG_0058] = Configure::read(CONFIG_0058);
			$list[CONFIG_0059] = Configure::read(CONFIG_0059);
			$list[CONFIG_0060] = Configure::read(CONFIG_0060);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			
			$this->Common->trnRollback(); 
			
			// 例外処理
			$err_str = "c050_admin/v300negotiation で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	
	/**
	 * 運用報告書（入力）
	 */
	function v310operatingreportinput() {
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");

		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				
				case EVENT_ID_050270050: // 報告書選択：新規追加ボタン押下
					
					$data = $this->OperatingReport->setOperatingReportDefault();
					$this->set("data", $data);
					
					break;
				
				case EVENT_ID_050280020: // 運用報告書（照会）画面：修正ボタン
					
					$data = $this->OperatingReport->setOperatingReportInfo2();
					$this->set("data", $data);
					
					break;
				
				case EVENT_ID_050310010: // 確認ボタン
					
					$data = $this->data;
					
					$this->Common->setSessionFormData($data);

					// 運用報告書（確認）画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050320);
					
				case EVENT_ID_050310030: // メニューボタン
					
					// メニュー画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);

				case EVENT_ID_050310040: // 戻るボタン
					
					// 運用報告書選択画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050270);

				case EVENT_ID_050320010: // 運用報告書（確認）画面：戻るボタン
					
					$data = $this->Common->getSessionFormData();
					$this->set("data", $data);
					
					break;
				
				default : // その他
					
					// 一覧画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050110);
			}
			
			$list[CONFIG_0061] = Configure::read(CONFIG_0061);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			// 例外処理
			$err_str = "c050_admin/v310operatingreportinput で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	
	/**
	 * 運用報告書（確認）
	 */
	function v320operatingreportconfirm() {
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");

		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				
				case EVENT_ID_050310010: // 運用報告書（入力）：確認ボタン押下
					
					$data = $this->Common->getSessionFormData();
					$this->set("data", $data);
					
					break;
				
				case EVENT_ID_050320010: // 戻るボタン
					
					// 運用報告書（入力）画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050310);

				case EVENT_ID_050320020: // 決定ボタン
					
					$this->Common->trnBegin(); // トランザクションスタート
					
					$this->OperatingReport->saveOperatingReport();
					
					$this->Common->trnCommit(); // コミット
					
					// 運用報告書（完了）画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050330);

				default : // その他
					
					// ファンド一覧画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050110);
			}
			
			$list[CONFIG_0061] = Configure::read(CONFIG_0061);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			
			$this->Common->trnRollback(); // ロールバック
			
			// 例外処理
			$err_str = "c050_admin/v320operatingreportconfirm で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	
	/**
	 * 運用報告書（完了）
	 */
	function v330operatingreportcomplete() {
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");

		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				
				case EVENT_ID_050320020: // 運用報告書（確認）：決定ボタン押下
					
					break;
				
				case EVENT_ID_050330010: // 戻るボタン
					
					$id = $this->Common->getSessionReportId();
					
					// 報告書選択画面へ
					if (is_null($id)) {
						
						// 新規登録の場合、運用報告書選択画面へ
						$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050270);
					}
					else {
						
						// 修正の場合、運用報告書(照会)画面へ
						$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050280);
					}
					
				default : // その他
					
					// ファンド一覧画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050110);
			}
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			// 例外処理
			$err_str = "c050_admin/v330operatingreportcomplete で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	
	/**
	 * 運用報告書交付(入力)
	 */
	function v340operatingreportissuelist() {
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");

		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				
				case EVENT_ID_050110050: // ファンド一覧：報告書交付対象ボタン
				case EVENT_ID_050370010: // 報告書選択：運用報告書ボタン
					
					$report_list = $this->OperatingReport->getOperatingReportList2();
					
					$this->set("data_list", $report_list);
					
					// 初回表示
					$this->set("first", true);
					
					break;
				
				case EVENT_ID_050340010: // 確認ボタン
					
					$data = $this->data;
					
					$err = $this->CheckC050->v340($data);
					
					if (is_null($err)) {
						
						$this->Common->setSessionFormData($data);

						// 報告書発行(確認)へ
						$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050350);
					}
					
					$report_list = $this->OperatingReport->getOperatingReportList2();
					
					$this->set("data_list", $report_list);
					$this->set("validation_errors", $err);
					
					break;
				
				case EVENT_ID_050340030: // メニューボタン
					
					// メニュー画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);
				
				case EVENT_ID_050350010: // 報告書交付画面：　戻るボタン
					
					$data        = $this->Common->getSessionFormData();
					$report_list = $this->OperatingReport->getOperatingReportList2();
					
					$this->set("data"     , $data);
					$this->set("data_list", $report_list);
					
					break;
					
				default :
					
					// ファンド一覧画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050110);
			}
			
			$list[CONFIG_0061] = Configure::read(CONFIG_0061);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			// 例外処理
			$err_str = "c050_admin/v340operatingreportissuelist で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	
	/**
	 * 報告書発行(確認)
	 */
	function v350operatingreportissueconfirm() {
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");

		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				
				case EVENT_ID_050340010: // 報告書発行対象ファンド一覧画面：確認ボタン
					
					$data    = $this->Common->getSessionFormData();
					$id_info = $data[SEARCH_ID_050340010];
					
					$report_list = $this->OperatingReport->getOperatingReportListId($id_info);
					
					$this->set("data_list", $report_list);
					
					break;
				
				case EVENT_ID_050350010: // 戻るボタン
					
					// 報告書発行対象ファンド一覧画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050340);
				
				case EVENT_ID_050350020: // 決定ボタン
					
					$admin   = $this->SessionAdminInfo->getAdminInfo(); //管理者情報取得（セッションから）
					$data    = $this->Common->getSessionFormData(); //作画されているデータを取得（セッションから）
					$id_info = $data[SEARCH_ID_050340010];
					
					$this->Common->trnBegin(); // トランザクションスタート
					
					// 状態変更
					$user_id_list = $this->OperatingReport->updateOperaingReportIssue($id_info, $admin);
					
					$this->Common->trnCommit(); // コミット
					
					// 通知メール送信
					// 2018-04-13 メール配信停止
					//$this->OperatingReport->sendMailIssueReport($user_id_list);
					
					// 報告書発行(完了)画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050360);
				
				default :
					
					// ファンド一覧画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050110);
			}
			                
                                            
                                        
                                       
			$list[CONFIG_0061] = Configure::read(CONFIG_0061);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			
			$this->Common->trnRollback(); // ロールバック
			
			// 例外処理
			$err_str = "c050_admin/v350operatingreportissueconfirm で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	
	/**
	 * 報告書発行（完了）
	 */
	function v360operatingreportissuecomplete() {
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");

		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				
				case EVENT_ID_050350020: // 報告書発行（確認）：　決定ボタン押下
					
					break;
				
				case EVENT_ID_050360010: // 戻るボタン
					
					// 運用報告書交付(入力)画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050340);
					
				default : // その他
					
					// ファンド一覧画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050110);
			}
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			// 例外処理
			$err_str = "c050_admin/v360operatingreportissuecomplete で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}

	/**
	 * 報告書選択
	 */
	function v370reportselect() {
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");

		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				
				case EVENT_ID_050370010: // 運用報告書ボタン
					
					// 運用報告書交付(入力)画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050340);
					
				case EVENT_ID_050370020: // 取引残高報告書ボタン
					
					// 取引残高報告書(入力)
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050380);

				case EVENT_ID_050370030: // 年間取引報告書ボタン
				
					// 年間取引報告書交付画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050410);
					
				case EVENT_ID_050370040: // メニューボタン
					
					// メニュー画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);
					
				default :
					
			}
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			// 例外処理
			$err_str = "c050_admin/v370reportselect で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	
	/**
	 * 取引残高報告書(入力)
	 */
	function v380tradebalancereportinput() {
		
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");

		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				
				case EVENT_ID_050370020: // 報告書選択：取引残高報告書ボタン
					$this_month  = date(DATE_FORMAT_1);
					
					$data[OBJECT_ID_050380010] = date("Y", strtotime($this_month." -3 month"));
					$data[OBJECT_ID_050380020] = date("m", strtotime($this_month." -3 month"));
					$data[OBJECT_ID_050380030] = date("Y", strtotime($this_month." -1 month"));
					$data[OBJECT_ID_050380040] = date("m", strtotime($this_month." -1 month"));
					$data[OBJECT_ID_050380050] = "";
					
					$this->set("data", $data);
					
					break;
					
				case EVENT_ID_050380010: // 確認ボタン
					
					$form_data = $this->data;
					
					// 入力チェック
					$msg = $this->CheckC050->v380($form_data);
					if (is_null($msg)) {
						
						// 入力データをセッションに格納
						$this->Common->setSessionFormData($form_data);

						// 確認画面へ
						$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050390);
					}
					
					// エラーがある場合再表示
					$this->set("validation_errors", $msg);
					$this->set("data"             , $form_data);
					
					break;
					
				case EVENT_ID_050380030: // メニュー
				
					// メニュー画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);
					
				case EVENT_ID_050390010: // 取引残高報告書(確認)：戻るボタン
				
					$form_data = $this->Common->getSessionFormData();
					
					$data[OBJECT_ID_050380010] = $form_data[OBJECT_ID_050380010];
					$data[OBJECT_ID_050380020] = $form_data[OBJECT_ID_050380020];
					$data[OBJECT_ID_050380030] = $form_data[OBJECT_ID_050380030];
					$data[OBJECT_ID_050380040] = $form_data[OBJECT_ID_050380040];
					$data[OBJECT_ID_050380050] = $form_data[OBJECT_ID_050380050];
					
					$this->set("data", $data);
					
					break;
				
				default :
					
					// 報告書選択画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050370);
			}
			
			$this->Common->deleteSessionFormData();
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			// 例外処理
			$err_str = "c050_admin/v380tradebalancereportinput で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	
	/**
	 * 取引残高報告書(確認)
	 */
	function v390tradebalancereportconfirm() {
		
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");

		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				
				case EVENT_ID_050380010: // 取引残高報告書(入力)：確認ボタン
					
					$form_data = $this->Common->getSessionFormData();
					
					$data[OBJECT_ID_050380010] = $form_data[OBJECT_ID_050380010];
					$data[OBJECT_ID_050380020] = $form_data[OBJECT_ID_050380020];
					$data[OBJECT_ID_050380030] = $form_data[OBJECT_ID_050380030];
					$data[OBJECT_ID_050380040] = $form_data[OBJECT_ID_050380040];
					$data[OBJECT_ID_050380050] = $form_data[OBJECT_ID_050380050];
					
					$this->set("data", $data);
					
					// サンプル表示用のURL取得
					$pdf_path = $this->Document->getTradeBalanceReportPathAdmin();
					
					$this->set("pdf_path", $pdf_path);
					
					break;
				
				case EVENT_ID_050390010: // 戻るボタン
					
					// 報告書選択画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050380);

				case EVENT_ID_050390020: // 交付実行ボタン
					
					// 入力データ取得
					$form_data = $this->Common->getSessionFormData();
					
					// 管理者情報取得
					$admin_info = $this->SessionAdminInfo->getAdminInfo();
					
					// トランザクション開始
					$this->Common->trnBegin();
					
					// 取引残高報告書交付実行
					$user_list = $this->TradeBalanceReport->issueReport($admin_info, $form_data);
					
					// コミット
					$this->Common->trnCommit();
					
					// DB更新後、通知メール送信
					// 2018-04-15 メール送信負荷が高いため無効化
					// $this->TradeBalanceReport->sendMailIssueReport($user_list);
				
					// 完了画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050400);
					
				default :
					
					// 報告書選択画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050370);
			}
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			
			$this->Common->trnRollback(); // ロールバック
			
			// 例外処理
			$err_str = "c050_admin/v390tradebalancereportconfirm で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	
	/**
	 * 取引残高報告書(完了)
	 */
	function v400tradebalancereportcomplete() {
		
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");

		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				
				case EVENT_ID_050390020: // 交付実行ボタン
					
					break;
				
				default :
					
					// 報告書選択画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050370);
			}
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			
			$this->Common->trnRollback(); // ロールバック
			
			// 例外処理
			$err_str = "c050_admin/v400tradebalancereportcomplete で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	
	/**
	 * 年間取引報告書(入力)
	 */
	function v410annualtradereportinput() {
		
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");

		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				
				case EVENT_ID_050370030: // 報告書選択：年間取引報告書ボタン
					
					$data[OBJECT_ID_050410010] = 0;
					$this->set("data", $data);
					
					break;

				case EVENT_ID_050410010: // 作成ボタン
					
					// セッションから管理者情報取得
					$admin_info = $this->SessionAdminInfo->getAdminInfo();
					
					// 前年の年数を取得
					$trade_year = date("Y", strtotime(date(DATE_FORMAT_1)." -1 year"));
					
					// 前年の年数をセッションに格納
					$data[OBJECT_ID_050410010] = $trade_year;
					
					$this->Common->setSessionFormData($data);
					
					// トランザクションスタート
					$this->Common->trnBegin();
					
					// 年間取引報告書作成履歴登録＆投資家のお知らせ履歴登録
					$user_list = $this->AnnualTradeReport->issueReport($admin_info, $trade_year);
					
					// コミット
					$this->Common->trnCommit();
					
					// 投資家への通知メール送信
					// 2018-04-15 メール送信負荷が高いため無効化
					// $this->AnnualTradeReport->sendMailIssueReport($user_list, $trade_year);
					
					// 確認画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050420);
					
				case EVENT_ID_050410020: // 再作成ボタン
					
					$trade_year = $this->data[OBJECT_ID_050410010];
					
					$pdf_param[ARRAY_INDEX_TRADE_YEAR]    = $trade_year;

					// 取引期間
                                        $trade_year = $pdf_param[ARRAY_INDEX_TRADE_YEAR];
                                        $date_from  = date(DATETIME_FORMAT_1, strtotime($trade_year."/01/01"));
                                        $date_to    = date(DATETIME_FORMAT_2, strtotime($trade_year."/12/31"));
                
                                        // 年数を西暦から和暦に変換
                                        $year_ja = $this->Calendar->convertAdtoJaYear($trade_year);
                
                                        // 認証済みユーザ全件取得（利息）
                                        $data_list = $this->User->getAnnualTradeReportReceiveUser($date_from, $date_to);
                                        // 認証済みユーザ全件取得(元金返済対象)
                                        $data_list1 = $this->User->getAnnualTradeReportReceiveUser1($date_from, $date_to);
//print "<pre>";
//print $date_from."  ".$date_to;
//print "<br>data_list<br>";
//print_r ($data_list);
//print "<br>data_list1<br>";
//print_r ($data_list1);
//print "</pre>";
                                                        foreach ($data_list1 as $value) {
                                                            $data_l[] = $this->TrnInvestmentHistory->getInvestmentHistories_year($value['user_id'],$date_from, $date_to);
                                                        }
                                                        
                                                        foreach ($data_l as $keys => $values) {
                                                            foreach ($values as $key => $value) {
                                                                $data_ll[] =
                                                                           array('user_id' => $value['a']['user_id'],'fund_id' => $value['a']['fund_id'],
                                                                                 'investment_amount' => $value['a']['investment_amount'], 'ended' => $value['b']['ended'],'ended_date' => $value['b']['ended_date']);
                                                            }
                                                        }
                                                        
                                                        //1回1user回すために必要 
                                                        foreach ($data_list as $value) {
                                                           $data_list = array(
                                                           array('user_id' => $value['user_id'],'mail_address' => $value['mail_address'],
                                                               'kanji_last_name' => $value['kanji_last_name'],'kanji_first_name' => $value['kanji_first_name'], 
                                                               'zip' => $value['zip'], 'address1' => $value['address1'], 'address2' => $value['address2'], 
                                                               'address3' => $value['address3'], 'dividend_amount' => $value['dividend_amount'], 'tax' => $value['tax']));

                                                           $this->Pdf->savePdf00006($pdf_param,$data_list,$data_list1,$data_ll);
					                }
//print "<pre>";
//print "<br>data_ll<br>";
//print_r ($data_ll);
//print "</pre>";                                                             
                                                           $this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050777);
					break;
                                 
				case EVENT_ID_050410040: // メニューボタン
				
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);
					
				default :
					
					// 報告書選択画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050370);
			}
			
			$list[OBJECT_ID_050410010] = $this->AnnualTradeReport->getAnnualTradeReportList();
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			
			// ロールバック
			$this->Common->trnRollback();
			
			// 例外処理
			$err_str = "c050_admin/v410annualtradereportinput で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	
	/**
	 * 年間取引報告書(完了)
	 */
	function v420annualtradereportcomplete() {
		
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");

		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				
				case EVENT_ID_050410010: // 年間取引報告書作成(入力)：作成ボタン
					
					break;
				
				case EVENT_ID_050420010: // 作成ボタン
//					$trade_year = $this->data[OBJECT_ID_050410010];

					$data = $this->Common->getSessionFormData();
					$trade_year = $data[OBJECT_ID_050410010];
					
					$pdf_param[ARRAY_INDEX_TRADE_YEAR]    = $trade_year;

					// 取引期間
                                        $trade_year = $pdf_param[ARRAY_INDEX_TRADE_YEAR];
                                        $date_from  = date(DATETIME_FORMAT_1, strtotime($trade_year."/01/01"));
                                        $date_to    = date(DATETIME_FORMAT_2, strtotime($trade_year."/12/31"));
                
                                        // 年数を西暦から和暦に変換
                                        $year_ja = $this->Calendar->convertAdtoJaYear($trade_year);
                
                                        // 認証済みユーザ全件取得
                                        $data_list = $this->User->getAnnualTradeReportReceiveUser($date_from, $date_to);
                                        // 認証済みユーザ全件取得(元金返済対象)
                                        $data_list1 = $this->User->getAnnualTradeReportReceiveUser1($date_from, $date_to);
                                                        foreach ($data_list1 as $value) {
                                                            $data_l[] = $this->TrnInvestmentHistory->getInvestmentHistories_year($value['user_id'],$date_from, $date_to);
                                                        }
                                                        
                                                        foreach ($data_l as $keys => $values) {
                                                            foreach ($values as $key => $value) {
                                                                $data_ll[] =
                                                                           array('user_id' => $value['a']['user_id'],'fund_id' => $value['a']['fund_id'],
                                                                                 'investment_amount' => $value['a']['investment_amount'], 'ended' => $value['b']['ended'],'ended_date' => $value['b']['ended_date']);
                                                            }
                                                        }

                                        foreach ($data_list as $value) {
                                                         $data_list = array(
                                                        array('user_id' => $value['user_id'],'mail_address' => $value['mail_address'],
                                                            'kanji_last_name' => $value['kanji_last_name'],'kanji_first_name' => $value['kanji_first_name'], 
                                                            'zip' => $value['zip'], 'address1' => $value['address1'], 'address2' => $value['address2'], 
                                                            'address3' => $value['address3'], 'dividend_amount' => $value['dividend_amount'], 'tax' => $value['tax']));
                                                         
					    $this->Pdf->savePdf00006($pdf_param,$data_list,$data_list1,$data_ll);
					}
                                            $this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050777);
					break;
				
				default :
					
					// 報告書選択画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050370);
			}
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			
			$this->Common->trnRollback(); // ロールバック
			
			// 例外処理
			$err_str = "c050_admin/v400tradebalancereportcomplete で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	
	/**
	 * メール送信(入力)
	 */
	function v430mailinput() {
		
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");

		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				
				case EVENT_ID_050430010: // 確認ボタン
					
					$data = $this->data;
					
					$errors = $this->CheckC050->v430($data);
					if (is_null($errors)) {
						
						$this->Common->setSessionFormData($data);
						
						// エラーが無ければ確認画面へ
						$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050440);
					}
					
					$this->set("errors", $errors);
					$this->set("data"  , $data);
					
					break;
				
				case EVENT_ID_050430020: // メニューボタン
					
					// メニュー画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);
				
				case EVENT_ID_050440010: // メール送信(確認)：戻るボタン
					
					$data = $this->Common->getSessionFormData();
					
					$this->set("data", $data);
					
					break;
				
				default :
					
					$data = array(
						 OBJECT_ID_050430010 => SPECIFIED_METHOD_CODE_0
						,OBJECT_ID_050430020 => ""
						,OBJECT_ID_050430030 => CHECKBOX_ON
						,OBJECT_ID_050430040 => CHECKBOX_ON
						,OBJECT_ID_050430050 => CHECKBOX_ON
						,OBJECT_ID_050430060 => ""
						,OBJECT_ID_050430070 => ""
						,OBJECT_ID_050430080 => ""
						,OBJECT_ID_050430090 => CHECKBOX_ON
						,OBJECT_ID_050430100 => ""
						,OBJECT_ID_050430110 => ""
						,OBJECT_ID_050430120 => ""
						,OBJECT_ID_050430130 => ""
						,OBJECT_ID_050430140 => MAIL_ACCOUNT_CODE_SUBSCRIBE
					);
					
					$this->set("data", $data);
			}
			
			$list[CONFIG_0024] = Configure::read(CONFIG_0024);
			$list[CONFIG_0046] = Configure::read(CONFIG_0046);
			$list[CONFIG_0062] = Configure::read(CONFIG_0062);
			$list[CONFIG_0063] = Configure::read(CONFIG_0063);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "c050_admin/v430mailinput で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	
	/**
	 * メール送信(確認)
	 */
	function v440mailconfirm() {
		
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");

		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				
				case EVENT_ID_050430010: // メール送信(入力)：確認ボタン
					
					$data = $this->Common->getSessionFormData();
					
					$this->set("data", $data);
					
					break;
				
				case EVENT_ID_050440020: // 送信ボタン
				
					$data       = $this->Common->getSessionFormData();
					$admin_info = $this->SessionAdminInfo->getAdminInfo();
					
					$this->Common->trnBegin(); // トランザクション開始
					
					$this->AdminMailHistory->saveAdminMail($admin_info, $data);
					
					$this->Common->trnCommit(); // コミット
					
					// メール送信実行
					$this->Mail->sendMailFree($data);
					
					// 入力データを削除
					$this->Common->deleteSessionFormData();
					
					// 完了画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050450);
					
				default :
					
					// メール送信(入力)画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050430);
			}
			
			$list[CONFIG_0024] = Configure::read(CONFIG_0024);
			$list[CONFIG_0046] = Configure::read(CONFIG_0046);
			$list[CONFIG_0062] = Configure::read(CONFIG_0062);
			$list[CONFIG_0063] = Configure::read(CONFIG_0063);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			
			$this->Common->trnRollback();
			
			// 例外処理
			$err_str = "c050_admin/v440mailconfirm で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	
	/**
	 * メール送信(完了)
	 */
	function v450mailcomplete() {
		
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");

		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				
				case EVENT_ID_050440020: // メール送信(確認)：送信ボタン
					
					break;
				
				default :
					
					// メール送信(入力)画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050430);
			}
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "c050_admin/v450mailcomplete で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	
	/**
	 * PDF参照
	 */
	function v460pdflist() {
		
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");

		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				
				case EVENT_ID_050040060: // 投資家詳細(照会)：PDF参照ボタン

					$user_id  = $this->Common->getSessionUserId();
					$pdf_list = $this->Pdf->getPdfFileNameList($user_id);
					
					$this->set("pdf_list", $pdf_list);
					
					break;
				
				case EVENT_ID_050460010: // 戻るボタン
					
					// 投資家詳細(照会)画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050040);
					
				default :
					
					// 投資家一覧画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050030);
			}
			
			$list[CONFIG_0045] = Configure::read(CONFIG_0045);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "c050_admin/v460pdflist で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	
	/**
	 * CSVダウンロード
	 */
	function v470csvdownload() {
		
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");

		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				
				case EVENT_ID_050470010: // メニューボタン
					
					// メニュー画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);
					
				case EVENT_ID_050470020: // 経理(ファンド)ボタン
					
					$data = $this->data;
					
					// 入力チェック
					$msg  = $this->CheckC050->v470($data);
					
					if (is_null($msg)) {
						
						$year  = $this->data[OBJECT_ID_050470010];
						$month = $this->data[OBJECT_ID_050470020];
						
						// 入力内容に問題が無ければデータを取得し、CSV出力
						if (0 == count($this->CsvDownload->getAccounting1($year, $month))) {
							$msg[] = "データを取得できませんでした。";
						}
					}
					
					// エラーがあればエラーメッセージを出力
					$this->set("errors", $msg);
					$this->set("data"  , $data);

					break;
				
				case EVENT_ID_050470030: // 経理(個人)ボタン
					
					$data = $this->data;
					
					// 入力チェック
					$msg  = $this->CheckC050->v470($data);
					
					if (is_null($msg)) {
						
						$year  = $this->data[OBJECT_ID_050470010];
						$month = $this->data[OBJECT_ID_050470020];
						
						// 入力内容に問題が無ければデータを取得し、CSV出力
						if (0 == count($this->CsvDownload->getAccounting2($year, $month))) {
							$msg[] = "データを取得できませんでした。";
						}
					}
					
					// エラーがあればエラーメッセージを出力
					$this->set("errors", $msg);
					$this->set("data"  , $data);

					break;
				
				case EVENT_ID_050470040: // 配当送金ボタン
					
					$data = $this->data;
					
					// 入力チェック
					$msg  = $this->CheckC050->v470($data);
					
					if (is_null($msg)) {
						
						$year  = $this->data[OBJECT_ID_050470010];
						$month = $this->data[OBJECT_ID_050470020];
						
						// 入力内容に問題が無ければデータを取得し、CSV出力
						if (0 == count($this->CsvDownload->getDividendRemittance($year, $month))) {
							$msg[] = "データを取得できませんでした。";
						}
					}
					
					// エラーがあればエラーメッセージを出力
					$this->set("errors", $msg);
					$this->set("data"  , $data);

					break;
				
				case EVENT_ID_050470050: // 書面交付状況ボタン
					
					$data = $this->data;
					
					// 入力チェック
					$msg  = $this->CheckC050->v470($data);
					
					if (is_null($msg)) {
						
						$year  = $this->data[OBJECT_ID_050470010];
						$month = $this->data[OBJECT_ID_050470020];
						
						// 入力内容に問題が無ければデータを取得し、CSV出力
						if (0 == count($this->CsvDownload->getDocumentIssue($year, $month))) {
							$msg[] = "データを取得できませんでした。";
						}
					}
					
					// エラーがあればエラーメッセージを出力
					$this->set("errors", $msg);
					$this->set("data"  , $data);

					break;
				
				case EVENT_ID_050470060: // QUOカードボタン
					
					$data = $this->data;
					
					// 入力チェック
					$msg  = $this->CheckC050->v470_2($data);
					
					if (is_null($msg)) {
						
						$year  = $this->data[OBJECT_ID_050470010];
						$month = $this->data[OBJECT_ID_050470020];
						
						// 入力内容に問題が無ければデータを取得し、CSV出力
						if (0 == count($this->CsvDownload->getBirthdayData($year, $month))) {
							$msg[] = "データを取得できませんでした。";
						}
					}
					
					// エラーがあればエラーメッセージを出力
					$this->set("errors", $msg);
					$this->set("data"  , $data);

					break;
				
				default :
					
					$data = array(
						 OBJECT_ID_050470010 => ""
						,OBJECT_ID_050470020 => ""
					);
					
					$this->set("data", $data);
			}
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "c050_admin/v470csvdownload で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	
	/**
	 * お知らせ送信(入力)
	 */
	function v480informationinput() {
		
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");

		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				
				case EVENT_ID_050480010: // 確認ボタン
					
					$data = $this->data;
					
					// 入力チェック
					$errors = $this->CheckC050->v480($data);
					
					if (is_null($errors)) {
						
						$this->Common->setSessionFormData($data);
						
						// エラーが無ければ確認画面へ
						$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050490);
					}
					
					$this->set("errors", $errors);
					$this->set("data"  , $data);
					
					break;
				
				case EVENT_ID_050480020: // メニューボタン
					
					// メニュー画面へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);
				
				case EVENT_ID_050490010: // メール送信(確認)：戻るボタン
					
					$data = $this->Common->getSessionFormData();
					
					$this->set("data", $data);
					
					break;
				
				default :
					
					$data = array(
						 OBJECT_ID_050480010 => SPECIFIED_METHOD_CODE_0
						,OBJECT_ID_050480020 => ""
						,OBJECT_ID_050480030 => ""
						,OBJECT_ID_050480040 => ""
						,OBJECT_ID_050480050 => CHECKBOX_ON
						,OBJECT_ID_050480060 => ""
						,OBJECT_ID_050480070 => ""
						,OBJECT_ID_050480080 => ""
						,OBJECT_ID_050480090 => ""
						,OBJECT_ID_050480100 => ""
						,OBJECT_ID_050480110 => ""
						,OBJECT_ID_050480120 => ""
						,OBJECT_ID_050480130 => ""
						,OBJECT_ID_050480140 => ""
						,OBJECT_ID_050480150 => ""
						,OBJECT_ID_050480160 => ""
						,OBJECT_ID_050480170 => ""
						,OBJECT_ID_050480180 => ""
						,OBJECT_ID_050480190 => ""
						,OBJECT_ID_050480200 => ""
						,OBJECT_ID_050480210 => ""
						,OBJECT_ID_050480220 => ""
						,OBJECT_ID_050480230 => ""
						,OBJECT_ID_050480240 => ""
						,OBJECT_ID_050480250 => ""
						,OBJECT_ID_050480260 => ""
						,OBJECT_ID_050480270 => ""
						,OBJECT_ID_050480280 => ""
						,OBJECT_ID_050480290 => ""
					);
					
					$this->set("data", $data);
			}
			
			$list[CONFIG_0024] = Configure::read(CONFIG_0024);
			$list[CONFIG_0045] = Configure::read(CONFIG_0045);
			$list[CONFIG_0062] = Configure::read(CONFIG_0062);
			$list[CONFIG_0064] = Configure::read(CONFIG_0064);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "c050_admin/v480informationinput で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	
	/**
	 * お知らせ送信(確認)
	 */
	function v490informationconfirm() {
		
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");

		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				
				case EVENT_ID_050480010: // お知らせ送信(入力)：確認ボタン
					
					$data = $this->Common->getSessionFormData();
					$this->set("data"  , $data);
					
					$errors = array();
					if ((isset($data[OBJECT_ID_050480220]) || isset($data[OBJECT_ID_050480260])) && !isset($data[OBJECT_ID_050480290])) {
						$errors[] = "お知らせに添付する報告書PDFの生成は行われません。";
						$errors[] = "既にファイルがアップロードされている場合のみ送信ボタンを押下して下さい。";
					}
					
					$this->set("errors", $errors);
					break;
				
				case EVENT_ID_050490020: // 送信ボタン
					
					$admin_info = $this->SessionAdminInfo->getAdminInfo();
					$data       = $this->Common->getSessionFormData();
					
					$this->Common->trnBegin();
					
					$this->AdminInfoHistory->saveAdminInfo($admin_info, $data);
					
					$this->Common->trnCommit();
					
					// 入力データを削除
					$this->Common->deleteSessionFormData();
					
					// 完了画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050500);
				
				default :
					
					// 入力画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050480);
			}
			
			$list[CONFIG_0024] = Configure::read(CONFIG_0024);
			$list[CONFIG_0045] = Configure::read(CONFIG_0045);
			$list[CONFIG_0062] = Configure::read(CONFIG_0062);
			$list[CONFIG_0064] = Configure::read(CONFIG_0064);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			
			$this->Common->trnRollback();
			
			// 例外処理
			$err_str = "c050_admin/v490informationconfirm で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	
	/**
	 * お知らせ送信(完了)
	 */
	function v500informationcomplete() {
		
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");

		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				
				case EVENT_ID_050490020: // お知らせ送信(確認)：確認ボタン
					
					break;
				
				default :
					
					// 入力画面へ
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050480);
			}
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "c050_admin/v500informationcomplete で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}

	/*
	 * 入金口座一覧 (2017/10/10追加)
	 * @param string $event_id
	 */
	function v510depositaccountlist(){
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try {		
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}	
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_050510010: // 入金口座一覧：メニューボタン押下
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);
					break;
				case EVENT_ID_050510020: // 入金口座一覧：戻るボタン押下
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050520);	
					break;
				case EVENT_ID_050510030: // 入金口座一覧：絞込みボタン押下
					$data = $this->data;		
					$account_list = array();
					
					// 入力チェック
					$errors = $this->CheckC050->v510($data);
					if (is_null($errors)) {			
						// 入金口座リスト取得
						$account_list = $this->Deposit->getAccountList($data);
					}
				
					$this->set("errors"   , $errors);
					$this->set("data"     , $data);
					$this->set("account_list", $account_list);
					break;					
					
				default : // その他
					$data = array(
						SEARCH_ID_050510010 => ""				// 氏名(漢字)
						,SEARCH_ID_050510020 => ""				// 氏名(カナ)
						,SEARCH_ID_050510030 => ""				// ユーザID
						,SEARCH_ID_050510040 => ""				// 入金口座番号
					);
					$this->set("data", $data);
					break;
			}
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			// 例外処理
			$err_str = "c050_admin/v510depositaccountlistで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);	
		}
	}

	/**
	 * 入金データ入力 (2018/1/15追加)
	 * @param string $event_id 
	 */
	function v520depositinput() {
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");

		try {		
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}	
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_050520010: // 入金管理：メニューボタン押下
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);
					break;
				case EVENT_ID_050520020: // 入金管理：入金照合ボタン押下
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050530);
					break;
				case EVENT_ID_050520030: // 入金管理：未照合出力ボタン押下
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050550);
					break;					
				case EVENT_ID_050520040: // 入金管理：口座管理ボタン押下
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050510);	
					break;
				case EVENT_ID_050520050: // 入金管理：アップロードボタン押下
					$deposit_records = array();
					// アップロードファイルチェック
					$errors = $this->CheckC050->v520($_FILES['csvfile']);
					
					// ファイルを読みこみデータベースへ登録
					if (is_null($errors)) {
						// 管理者情報取得
						$admin_info = $this->SessionAdminInfo->getAdminInfo();
						
						$file_tmp_name = $_FILES['csvfile']['tmp_name'];
						$result = $this->Deposit->registerDepositData($file_tmp_name, $admin_info);
						$this->set('read_file_name', $_FILES['csvfile']['name']); 
						$this->set('read_count', $result['read_count']);
						$this->set('saved_count', $result['saved_count']);
					}
					
					// 未照合の入金履歴を取得
					$deposit_records = $this->Deposit->getRecordsByStatus(DEPOSIT_UNRECONCILED);
					$this->set("errors"   , $errors);
					$this->set("data_list", $deposit_records);
					break;

				case EVENT_ID_050520070: // 入金管理：手動入金押下
                                        $this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050600);                                       
                                        break;

				default : // その他
					// 未照合の入金履歴を取得
					$deposit_records = $this->Deposit->getRecordsByStatus(DEPOSIT_UNRECONCILED);
					$this->set("data_list", $deposit_records);
					break;
			}
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			// 例外処理
			$err_str = "c050_admin/v520depositinputで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}

	/**
	 * 照合処理 (2018/2/15追加)
	 * @param string $event_id 
	 */	
	function v530depositreconcile(){
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try{
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}	
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_050530010: // 入金照合処理：メニューボタン押下
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);
					break;
				case EVENT_ID_050530020: // 入金照合処理：戻るボタン押下
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050520);
					break;
				case EVENT_ID_050530030: // 入金照合処理：確認ボタン押下
					$reconcile_records = array();
					$num_matched = $this->data['num_matched'];

					if($num_matched > 0){
						$data_list = $this->data['data_list'];

						// チェックボックスが選択されているレコードのみ照合レコードリストに追加

						foreach ($data_list as $key => $record){
							if(!empty($record[OBJECT_ID_050530160])){
								array_push($reconcile_records, Hash::remove($record, OBJECT_ID_050530160));
							}
						}
					}
					// 入力内容のチェック
					$err = $this->CheckC050->v530($reconcile_records);
						
					// エラーがなければ確認画面へ
					if (is_null($err)) {
						$this->Common->setSessionFormData($reconcile_records);
						$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050540);
					}					
					$this->set("errors",  $err);
					
				default:
					$result = $this->Deposit->getMatchingList();
					$data_list = Array();
					$num_matched = 0;
					
					if(isset($result) && is_array($result) && 0 < count($result)){
					// 取得したデータから照合したレコードを判別し照合数をカウントし、フォーム選択用項目を追加
						foreach ($result as $key => $record) {
							if(!is_null($record[COLUMN_3110010])){
								$record += array('selection' => CHECKBOX_ON);		// 選択チェックボックス用
								$num_matched++;
							}else{
								$record += array('selection' => CHECKBOX_OFF);		// 選択チェックボックス用
							}
							array_push($data_list, $record);
						}
					}else{
						$msg[] = "照合データがありません。";
						$this->set("errors", $msg);
					}

					$this->set("data_list", $data_list);
					$this->set("num_matched", $num_matched);
					break;
			}
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			// 例外処理
			$err_str = "c050_admin/v530depositreconcileで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);	
		}
	}




        //手動入金処理追加
        function v600depositlist(){
                $this->layout = LAYOUT_NAME_002;
                $this->set("title_for_layout" , "SECOND LIFE");
                $this->set("header_for_layout", "SECOND LIFE 管理画面");
                $this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");

                try{
                        // セッションが無ければログイン画面へ
                        if (!$this->SessionAdminInfo->checkAdminInfo()) {
                                $this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
                        }
                        $event_id = $this->Common->getSessionEventId();

                        switch ($event_id) {
                                case EVENT_ID_050530010: // 入金照合処理：メニューボタン押下
                                        $this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);
                                        break;
                                case EVENT_ID_050530020: // 入金照合処理：戻るボタン押下
                                        $this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050520);
                                        break;
                                case EVENT_ID_050530040: // 入金処理：入金処理ボタン押下
                                        $reconcile_records = array();
                                        $num_matched = $this->data['num_matched'];
                                        if($num_matched > 0){
                                                $data_list = $this->data['data_list'];

                                                              //設定された入金日のデータを取り出し
                                                               $data1 = $this->request->data;
                                                            if(isset($data1["deposit_date"])){
                                                             $deposit_date = $data1["deposit_date"];
                                                            }
                                                 // チェックボックスが選択されているレコードのみ照合レコードリストに追加
                                               foreach ($data_list as $key => $record){
                                                         if(!empty($record[OBJECT_ID_050530160])){
                                                          array_push($reconcile_records, Hash::remove($record, OBJECT_ID_050530160));
                                                         }
                                               }
                                        }

                                        // 入力内容のチェック
                                        $err = $this->CheckC050->v530($reconcile_records);


                                        // エラーがなければdeposit_dateに書き込む
                                        if (is_null($err)) {

                                       // トランザクションスタート
                                        $this->Common->trnBegin();
                                        //depositに書き込み
                                        foreach($reconcile_records as $r) {
                                         $this->TrnInvestmentHistory->updateAll(
                                                                              array('deposit_date' => "'". $deposit_date ."'"),
                                                                              array('id' => $r['id'])
                                                                              );
                                           $user_id = $r['investment_user_id'];
                                           $this->Mail->sendMailDeposit($user_id); //メール送信
                                        }
                                        // コミット
                                       $this->Common->trnCommit();
                                                 
                                                //$this->Common->setSessionFormData($reconcile_records);
                                                $this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050540);
                                        }
                                        $this->set("errors",  $err);

                          break;



            default:
               $result = $this->TrnInvestmentHistory->find('all',array(
                                                      'conditions' => array(
                                                      'investment_status_code' => 1 ,
                                                      'deposit_date' => NULL),
                                                      'order' => array('expiration_datetime' => 'asc')
                                                       )
                                                       );
               $result = Hash::extract($result,'{n}.'.$this->TrnInvestmentHistory->name); //配列からTrn***をとる
               $data_list = Array();
               $num_matched = 0;

                     if(isset($result) && is_array($result) && 0 < count($result)){
                // 取得したデータから照合したレコードを判別し照合数をカウントし、フォーム選択用項目を追加
                      foreach ($result as $key => $record) {
                            if(!is_null($record[COLUMN_1200010])){
                               $record += array('selection' => CHECKBOX_ON);           // 選択チェックボックス用
                               $num_matched++;
                               }else{
                               $record += array('selection' => CHECKBOX_OFF);          // 選択チェックボックス用
                               }
                                array_push($data_list, $record);
                               }
                               }else{
                               $msg[] = "照合データがありません。";
                               $this->set("errors", $msg);
                               }

                                        $this->set("result", $result);//投資申込
                                        $this->set("data_list", $data_list);//投資申込
                                        $this->set("num_matched", $num_matched);//入金照会件数
                                        break;
                               }

                        $this->set("action", $this->Common->getCurrentAction());

                } catch (Exception $ex) {
                        // 例外処理
                        $err_str = "c050_admin/v600dipositlistで例外発生<br>".$ex->getMessage()."<br>";
                        if (isset($ex->queryString)) {
                                $err_str .= "SQL : ".$ex->queryString."<br>";
                        }
                        $this->Session->setFlash($err_str);
                }
        }


	/**
	 * 照合レコード確認 (2018/3/29追加)
	 * @param string $event_id 
	 */	
	function v540depositreconcileconfirm(){
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try{
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}	
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_050540010: // 入金照合確認：メニューボタン押下
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);
					break;
				case EVENT_ID_050540020: // 入金照合確認：戻るボタン押下
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050530);
					break;
				case EVENT_ID_050540030: // 入金照合確認：確認ボタン押下
					$data_list = $this->Common->getSessionFormData();
					//var_dump($data_list);
					$result_count = $this->Deposit->reconcile($data_list);
					$this->set('result_count', $result_count);
					break;

				case EVENT_ID_050530030: // 入金照合処理: 確認ボタン押下
					$data_list = $this->Common->getSessionFormData();
					$this->set('data_list', $data_list);
					break;
					
				default :
					break;
			}
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			// 例外処理
			$err_str = "c050_admin/v540depositreconcileconfirmで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);	
		}
	}

	/**
	 * 未照合履歴出力確認 (2018/4/4追加)
	 * @param string $event_id 
	 */	
	function v550depositdownloadconfirm(){
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try{
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}	
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_050520030: // 入金履歴一覧: 未照合出力ボタン押下
					$data_list = $this->Deposit->getRecordsByStatus(DEPOSIT_UNRECONCILED);
					if(count($data_list) == 0){
						$msg[] =  "ダウンロード可能な未照合入金履歴がありません。";
					}						
					$this->set('data_list', $data_list);
					$this->set("errors"   , $msg);
					break;
				case EVENT_ID_050550010: // 未照合履歴出力確認：メニューボタン押下
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);
					break;
				case EVENT_ID_050550020: // 未照合履歴出力確認：戻るボタン押下
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050520);
					break;
				case EVENT_ID_050550030: // 未照合履歴出力確認：確認ボタン押下
					$admin_info = $this->SessionAdminInfo->getAdminInfo();
					$result_count = $this->Deposit->dlUnreconciledRedords($admin_info);
					if($result_count == 0){
						$msg[] =  "ダウンロード可能な未照合入金履歴がありません。";
					}
					
					// 未照合の入金履歴を再取得
					$deposit_records = $this->Deposit->getRecordsByStatus(DEPOSIT_UNRECONCILED);
					$this->set("data_list", $deposit_records);
					$this->set('result_count', $result_count);
					$this->set("errors"   , $msg);

					break;
					
				default :
					break;
			}
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			// 例外処理
			$err_str = "c050_admin/v550depositdownloadconfirmで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);	
		}
	}

	/**
	 * 
	 */
	function v560lenderreviewmenu(){
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");
		
		try{
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}	
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_050020130: // 管理者メニュー: 入会審査ボタン押下
					// $data_list = $this->Deposit->getRecordsByStatus(DEPOSIT_UNRECONCILED);
					// if(count($data_list) == 0){
					// 	$msg[] =  "ダウンロード可能な未照合入金履歴がありません。";
					// }						
					// $this->set('data_list', $data_list);
					// $this->set("errors"   , $msg);
					break;
				case EVENT_ID_050560010: // 入会審査メニュー：ボタン押下
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);
					break;
				case EVENT_ID_050550020: // 未照合履歴出力確認：戻るボタン押下
					$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050520);
					break;
				case EVENT_ID_050550030: // 未照合履歴出力確認：確認ボタン押下
					$admin_info = $this->SessionAdminInfo->getAdminInfo();
					$result_count = $this->Deposit->dlUnreconciledRedords($admin_info);
					if($result_count == 0){
						$msg[] =  "ダウンロード可能な未照合入金履歴がありません。";
					}					
				default :
					break;
			}
			$admin_info = $this->SessionAdminInfo->getAdminInfo();
			$admin_id = $admin_info['admin_id'];
			$auth_list = Configure::read(CONFIG_0066);
//			$review_auth_id = $this->Admin->getReviewAuthID($admin_id);
//			$review_auth = $auth_list["$review_auth_id"];
			$review_auth = $auth_list[$this->Admin->getReviewAuthID($admin_id)];
			$this->set("review_auth", $review_auth);
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			// 例外処理
			$err_str = "c050_admin/v560checklistdetailsで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);	
		}
	}
	
	/**
	 * ログアウト<br>
	 * セッション削除後トップ画面へリダイレクト
	 * @param string $event_id
	 */
	function v990logout() {
		
		// セッション削除
		$this->Session->destroy();
		
		// ログイン画面へリダイレクト
		$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
	}
 
        //処理終了リダイレクト用
        function cal_exit(){
                $this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "SECOND LIFE");
		$this->set("header_for_layout", "SECOND LIFE 管理画面");
		$this->set("footer_for_layout", "SECOND LIFE 管理画面 Footer");

            try{
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}	
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
		                        case EVENT_ID_050520010: // 
		                         $this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050020);			
					}					
			
        
                } catch (Exception $ex) {
			// 例外処理
			$err_str = "c050_admin/cal_exitで例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);	
		}
	}
                
	
}
 
