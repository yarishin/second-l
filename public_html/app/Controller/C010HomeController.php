<?php
App::uses('AppController', 'Controller');

class C010HomeController extends AppController {
	
	public $uses       = array(
		"MstCompany"
		,"MstUser"
		,"MstFund"
        ,"MstLoan"
		,"Transaction"
		,"TrnInvestmentHistory"
		,"TrnLoanRepayments"
		,"Dummy"
	);
	
	public $components = array(
		 "Common"
		,"Company"
		,"CheckC010"
		,"Fund"
		,"Loan"
		,"SessionUserInfo"
		,"Mail"
		,"User"
        ,"Paginator"
        ,"InvestmentHistory"
        ,"LoanRepayment"
	);

	public $helpers = array(
		 "Common"
	);
	
	/*
	 * トップ
	 * @param string $event_id
	 */
	function index(){

		$this->layout = LAYOUT_NAME_001;
		
		try {
			$loan_amount = $this->Fund->getCumulativeLoanAmount();
                        $this->set("loan_amount", $loan_amount);
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_010010010: // トップ：ログインボタン押下
					

                                        //E-MailとPassの組み合わせの合否判定
                                        $u_data = $this->MstUser->find('all',array(
                                                         'conditions' => array(COLUMN_0800020 => $this->data[OBJECT_ID_010020010],
                                                                               COLUMN_0800030 => $this->data[OBJECT_ID_010020020])));
                                        $ar = $u_data[0][MstUser][user_id];
                                        if (empty($ar)) {
                                           $cou = 0;//ない
                                             }else{
                                           $cou = 1;//ある
                                              }
                                        //IDとPassの組み合わせの合否判定
                                        $u_dataa = $this->MstUser->find('all',array(
                                                         'conditions' => array(COLUMN_0800010 => $this->data[OBJECT_ID_010020010],
                                                                               COLUMN_0800030 => $this->data[OBJECT_ID_010020020])));
                                        $arr = $u_dataa[0][MstUser][user_id];
                                        if (empty($arr)) {
                                           $coun = 0;//ない
                                             }else{
                                           $coun = 1;//ある
                                              }



                                        //userID取得
                                        $u_data1 = $this->MstUser->find('all',array(
                                                         'conditions' => array(COLUMN_0800010 => $this->data[OBJECT_ID_010020010]
                                                                               )));
                                        $array = $u_data1[0][MstUser][user_id];
                                        if (empty($array)) {
                                           $count = 0;//ない
                                             }else{
                                           $count = 1;//ある
                                              }
                                        //mail_adress取得
                                        $u_data2 = $this->MstUser->find('all',array(
                                                         'conditions' => array(COLUMN_0800020 => $this->data[OBJECT_ID_010020010]
                                                                               )));
                                        $array1 = $u_data2[0][MstUser][mail_address];
                                        $e_user_id = $u_data2[0][MstUser][user_id];
                                        if (empty($array1)) {
                                           $count1 = 0;//ない
                                             }else{
                                           $count1 = 1;//ある
                                              }
                                        //password取得
                                        $u_data3 = $this->MstUser->find('all',array(
                                                         'conditions' => array(COLUMN_0800030 => $this->data[OBJECT_ID_010020020]
                                                                               )));
                                        $array2 = $u_data3[0][MstUser][password];
                                        if (empty($array2)) {
                                           $count2 = 0;//ない
                                             }else{
                                           $count2 = 1;//ある
                                              }

                                        if($count == 1 && $count2 == 1 && $coun == 1) { //IDとPass
                                                // 全セッション削除
                                                $this->Session->destroy();

                                                $user_id = $array;

                                                $this->Common->trnBegin(); // ◆トランザクション開始◆

                                                // 「登録申請中」の状態でアカウントの有効期限を過ぎている場合、「仮登録」に戻す
                                                $this->User->updateUserStatusInterim($user_id);

                                                $this->Common->trnCommit(); // ◆コミット◆
                                                //
                                                // ログイン情報をセッションに格納
                                                $this->SessionUserInfo->setUserInfo($user_id);

                                                // マイページへ
                                                $this->Common->setSessionEventId($event_id);
                                                $this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040010);
                                            } elseif($count1 == 1 && $count2 == 1 && $cou == 1) { //E-MailとPass
                                                // 全セッション削除
                                                $this->Session->destroy();

                                                $user_id = $e_user_id;

                                                $this->Common->trnBegin(); // ◆トランザクション開始◆

                                                // 「登録申請中」の状態でアカウントの有効期限を過ぎている場合、「仮登録」に戻す
                                                $this->User->updateUserStatusInterim($user_id);

                                                $this->Common->trnCommit(); // ◆コミット◆
                                                //
                                                // ログイン情報をセッションに格納
                                                $this->SessionUserInfo->setUserInfo($user_id);

                                                // マイページへ
                                                $this->Common->setSessionEventId($event_id);
                                                $this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040010);
                                              } else {
                                                $this->Common->setSessionFormData($this->data);
                                                $this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010020);                                                
                                                $value = "だめですよindex";
                                                $this->set("value", $value);
                                                $this->set("data"             , $this->data);
                                             }



//					// 入力チェックOKなら確認画面へ
//					if ($this->CheckC010->index($this->data)) {
//
//						// 全セッション削除
//						$this->Session->destroy();
//						$user_data = $this->MstUser->find('all',array(
//                                                         'conditions' => array(COLUMN_0800020 => $this->data[OBJECT_ID_010010010],
//                                                                               COLUMN_0800030 => $this->data[OBJECT_ID_010010020])));
//                                        $this->set("user_data",$user_data);
//                                        $user_no = $user_data[0][MstUser][user_id];
//						//$user_id = $user_no;
//						$user_id = $this->data[OBJECT_ID_010010010];
//						
//						$this->Common->trnBegin(); // ◆トランザクション開始◆
//
//						// 「登録申請中」の状態でアカウントの有効期限を過ぎている場合、「仮登録」に戻す
//						$this->User->updateUserStatusInterim($user_id);
//						
//						$this->Common->trnCommit(); // ◆コミット◆
//						
//						// ログイン情報をセッションに格納
//						$this->SessionUserInfo->setUserInfo($user_id);
//
//						// マイページへ
//						$this->Common->setSessionEventId($event_id);
//						$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040010);
//
//					} else {
//
//						// 入力された値をセッションに格納
//						$this->Common->setSessionFormData($this->data);
//						$this->Common->setSessionValidationErrors($this->MstUser->validationErrors);
//
//						// チェックNGの場合、ログイン専用画面へ
//						$this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010020);
//					}
					
					break;
				
				case EVENT_ID_010010030: // トップ：運用ページボタン押下
			
					// マイページへ
					$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040010);
					
					break;
					
				default : // その他
					
					$data = array(
						 OBJECT_ID_010010010 => ""
						,OBJECT_ID_010010020 => ""
					);

					$this->set("data", $data);
					
					$fund_list = $this->Fund->getFundListSiteTop();
					$this->set("fund_list", $fund_list);
					
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
			
		} catch (Exception $ex) {
			
			$this->Common->trnRollback(); // ◆ロールバック◆

			// 例外処理
			$err_str = "c010Home/index で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
		}
		
		// セッション内の入力データ削除
		$this->Session->delete(SESSION_FORM_DATAS);
			
	}
	
	/*
	 * ログインフォーム
	 */
	function v020login(){
		
		$this->layout = LAYOUT_NAME_001;

		// ログイン中チェック  ログイン中の場合はマイページTOPへ
		if ($this->SessionUserInfo->checkUserInfo()) {
			$this->Common->setSessionEventId(EVENT_ID_000000000);
			$this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040010);
		}


		try {
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_010010010: // トップ：ログインボタン押下index
					
					// 前画面の入力情報取得
					$data = $this->Common->getSessionFormData();
					$this->set("data", $data);
					// エラメッセージ
					//$validation_errors = $this->Common->getSessionValidationErrors();
					//$this->set("validation_errors", $validation_errors);
					$this->set("validation_errors", $value);
                                                $value = "ログインに失敗しました";
                                                $this->set("value", $value);
					break;
					
				case EVENT_ID_010020010: // ログイン：ログインボタン押下v020login
					
                                        //E-MailとPassの組み合わせの合否判定 
                                        $u_data = $this->MstUser->find('all',array(
                                                         'conditions' => array(COLUMN_0800020 => $this->data[OBJECT_ID_010020010],
                                                                               COLUMN_0800030 => $this->data[OBJECT_ID_010020020])));
                                        $ar = $u_data[0][MstUser][user_id];
                                        if (empty($ar)) {
                                           $cou = 0;//ない
                                             }else{
                                           $cou = 1;//ある
                                              }

                                        //IDとPassの組み合わせの合否判定
                                        $u_dataa = $this->MstUser->find('all',array(
                                                         'conditions' => array(COLUMN_0800010 => $this->data[OBJECT_ID_010020010],
                                                                               COLUMN_0800030 => $this->data[OBJECT_ID_010020020])));
                                        $arr = $u_dataa[0][MstUser][user_id];
                                        if (empty($arr)) {
                                           $coun = 0;//ない
                                             }else{
                                           $coun = 1;//ある
                                              }

                                        //userID取得
                                        $u_data1 = $this->MstUser->find('all',array(
                                                         'conditions' => array(COLUMN_0800010 => $this->data[OBJECT_ID_010020010]
                                                                               )));
                                        $array = $u_data1[0][MstUser][user_id];
                                        if (empty($array)) {
                                           $count = 0;//ない
                                             }else{
                                           $count = 1;//ある
                                              }
                                         print $status_i = $u_data1[0][MstUser][user_status_code];

                                        //mail_adress取得
                                        $u_data2 = $this->MstUser->find('all',array(
                                                         'conditions' => array(COLUMN_0800020 => $this->data[OBJECT_ID_010020010]
                                                                               )));
                                        $array1 = $u_data2[0][MstUser][mail_address];
                                        $e_user_id = $u_data2[0][MstUser][user_id];
                                        if (empty($array1)) {
                                           $count1 = 0;//ない
                                             }else{
                                           $count1 = 1;//ある
                                              }
                                         print $status_m = $u_data2[0][MstUser][user_status_code];
                                        //password取得
                                        $u_data3 = $this->MstUser->find('all',array(
                                                         'conditions' => array(COLUMN_0800030 => $this->data[OBJECT_ID_010020020]
                                                                               )));
                                        $array2 = $u_data3[0][MstUser][password];
                                        if (empty($array2)) {
                                           $count2 = 0;//ない
                                             }else{
                                           $count2 = 1;//ある
                                              }
                                        

                                        if($count == 1 && $count2 == 1 && $coun == 1 ) { //IDとPass
                                                // 全セッション削除
                                                $this->Session->destroy();

                                                $user_id = $array;

                                                $this->Common->trnBegin(); // ◆トランザクション開始◆

                                                // 「登録申請中」の状態でアカウントの有効期限を過ぎている場合、「仮登録」に戻す
                                                $this->User->updateUserStatusInterim($user_id);

                                                $this->Common->trnCommit(); // ◆コミット◆
                                                //
                                                // ログイン情報をセッションに格納
                                                $this->SessionUserInfo->setUserInfo($user_id);

                                                // マイページへ
                                                $this->Common->setSessionEventId($event_id);
                                                $this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040010);
                                            } else if($count1 == 1 && $count2 == 1 && $cou == 1 ) { //E-MailとPass
                                                // 全セッション削除
                                                $this->Session->destroy();

                                                $user_id = $e_user_id;

                                                $this->Common->trnBegin(); // ◆トランザクション開始◆

                                                // 「登録申請中」の状態でアカウントの有効期限を過ぎている場合、「仮登録」に戻す
                                                $this->User->updateUserStatusInterim($user_id);

                                                $this->Common->trnCommit(); // ◆コミット◆
                                                //
                                                // ログイン情報をセッションに格納
                                                $this->SessionUserInfo->setUserInfo($user_id);

                                                // マイページへ
                                                $this->Common->setSessionEventId($event_id);
                                                $this->Common->redirectCommon(REDIRECT_C040, REDIRECT_A040010);
                                              } else { 

                                                $value = "ログインに失敗しました";
                                                $this->set("value", $value);
						$this->set("data" , $this->data);
                                             }
					
					break;
					
				default : // その他
					
					$data = array(
						 OBJECT_ID_010020010 => ""
						,OBJECT_ID_010020020 => ""
					);
					$this->set("data", $data);
			}
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			
			$this->Common->trnRollback(); // ◆ロールバック◆

			// 例外処理
			$err_str = "c010Home/v020login で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		
			// セッション内の入力データ削除
			$this->Session->delete(SESSION_FORM_DATAS);
			
		}
		
		// セッション内の入力データ削除
		$this->Session->delete(SESSION_FORM_DATAS);
		

	}
	
	/*
	 * ファンド一覧
	 */
	function v030fundlist(){
		
		$this->layout = LAYOUT_NAME_001;
		try {
			
			$event_id = $this->Common->getSessionEventId();
			switch ($event_id) {
				default : // その他
					
					$limit = DISP_NUMBER_V030LIST;
					$page = isset($this->request->query['page']) ? $this->request->query['page'] : 1;
					
					$fund_list = $this->Fund->getFundListLender($limit, $limit * ($page - 1));
					$this->Dummy->setCount($this->Fund->_count);
					$this->paginate = array('paramType' => 'querystring', 'limit' => DISP_NUMBER_V030LIST);
					$this->Paginator->paginate("Dummy");
					$this->set("fund_list", $fund_list);
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
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			// 例外処理
			$this->Session->setFlash("C010Home/v030fundlistで例外発生<br>".$ex->getMessage()."<br>SQL : ".$ex->queryString);
		
		}
	}

	/*
	 * 運用実績
	 */
	function v100operateachievement(){
		
		$this->layout = LAYOUT_NAME_001;

		try {
            $this->set("recruit_amount", $this->Fund->getRecruitAmount());
            $this->set("recruit_count", $this->Fund->getRecruitCount());

            $this->set("procure_amount", $this->InvestmentHistory->getProcureAmount());
            $this->set("procure_count", $this->InvestmentHistory->getProcureCount());

            $this->set("loan_amount", $this->Loan->getLoanAmount());
            $this->set("loan_count", $this->Loan->getLoanCount());

            $this->set("operate_amount", $this->LoanRepayment->getOperateAmount());
            $this->set("operate_count", $this->LoanRepayment->getOperateCount());

            $this->set("fullpay_amount", $this->LoanRepayment->getFullpayAmount());
            $this->set("fullpay_count", $this->LoanRepayment->getFullpayCount());

            
            $event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				default : // その他
                    $limit = DISP_PAGE_LIMIT_OPERATE_ACHIEVEMENT;
                    $page = isset($this->request->query['page']) ? $this->request->query['page'] : 1;

                    $fund_list = $this->Fund->getFundListLender($limit, $limit * ($page - 1));
                    $this->Dummy->setCount($this->Fund->_count);
                    $this->paginate = array('paramType' => 'querystring', 'limit' => $limit);
                    $this->Paginator->paginate("Dummy");

					$this->set("fund_list", $fund_list);
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
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			// 例外処理
			$this->Session->setFlash("C010Home/v100operateachievementで例外発生<br>".$ex->getMessage()."<br>SQL : ".$ex->queryString);
		
		}
	}

	/*
	 * パスワード再発行
	 */
	function v050reissue(){
		
		$this->layout = LAYOUT_NAME_001;

		$data = array(
			 OBJECT_ID_010050010 => ""
			,OBJECT_ID_010050020 => ""
			,OBJECT_ID_010050030 => ""
			,OBJECT_ID_010050040 => ""
			,OBJECT_ID_010050050 => ""
			,OBJECT_ID_010050060 => ""
		);
		$this->set("data", $data);

		// リスト
		$list[CONFIG_0001] = Configure::read(CONFIG_0001);
		$this->set("list" , $list);

		$this->set("action", $this->Common->getCurrentAction());

		
		try {
	

                      $event_id = null;
                      if (isset($this->data[HIDDEN_ID_000000010])) {
                              $event_id = $this->data[HIDDEN_ID_000000010];
                              $this->Common->setSessionEventId($event_id);
                      } else {
                              $event_id = $this->Common->getSessionEventId();
                      }



		
//			$event_id = null;
//			if (isset($this->data[HIDDEN_ID_000000010])) {
//				$event_id = $this->data[HIDDEN_ID_000000010];
//				$this->Common->setSessionEventId($event_id);
//			} else {
//				$event_id = $this->Common->getSessionEventId();
//			}
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_010050010: // 送信ボタン押下(パスワード)
					
					if (count($this->data) <= 0) break;
					
					// 入力チェック実行
					$err = $this->CheckC010->v0501($this->data);
print_r ($data);

					if (is_null($err)) {
						
						$this->Common->trnBegin(); // ◆トランザクション開始◆
						
						$user_id = $this->data[OBJECT_ID_010050010];

						// パスワード発行
						$this->User->makeInterimPassword($user_id);

						// メール送信
						$this->Mail->sendMailReisue($event_id, $user_id);
						
						$this->Common->trnCommit(); // ◆コミット◆

						// メール送信完了へ
						$this->Common->setSessionEventId($event_id);
						$this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010060);
					}
					
					// エラメッセージ
					//$this->set("validation_errors", $err);
					$this->set("err", $err);
					$this->set("data"             , $this->data);
						
					break;
				case EVENT_ID_010050020: // 送信ボタン押下(ID)
					
					if (count($this->data) <= 0) break;
					
					// 入力チェック実行
					$err = $this->CheckC010->v0502($this->data);
					if (is_null($err)) {

						$mail_address = $this->data[OBJECT_ID_010050040];

						// メール送信
						$this->Mail->sendMailReisue($event_id, $mail_address);
						
						// メール送信完了へ
						$this->Common->setSessionEventId($event_id);
						$this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010060);
					}
					
					// エラメッセージ
					$this->set("err", $err);
					//$this->set("validation_errors", $err);
					$this->set("data"             , $this->data);
						
					break;
					
				default : // その他
					
			}
			
			
		} catch (Exception $ex) {
			
			$this->Common->trnRollback(); // ◆ロールバック◆
			
			// 例外処理
			$this->set("err", array($ex->getMessage()));
		}
		
		// セッション内の入力データ削除
		$this->Session->delete(SESSION_FORM_DATAS);
		

	}
	
	/*
	 * パスワード再発行完了
	 */
	function v060reissuecomplete(){
		
		$this->layout = LAYOUT_NAME_001;

		try {
	

                      $event_id = null;
                      if (isset($this->data[HIDDEN_ID_000000010])) {
                              $event_id = $this->data[HIDDEN_ID_000000010];
                              $this->Common->setSessionEventId($event_id);
                      } else {
                              $event_id = $this->Common->getSessionEventId();
                      }
		
//			$event_id = null;
//			if (isset($this->data[HIDDEN_ID_000000010])) {
//				$event_id = $this->data[HIDDEN_ID_000000010];
//				$this->Common->setSessionEventId($event_id);
//			} else {
//				$event_id = $this->Common->getSessionEventId();
//			}
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_010050010: // 送信ボタン押下(パスワード)
				case EVENT_ID_010050020: // 送信ボタン押下(ID)
					
					break;
					
				default : // その他
					
					// パスワード再発行画面へ
					$this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010050);
			}
			
			// イベントID削除
			$this->Common->deleteSessionEventId();
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			
			// 例外処理
		
			// セッション内の入力データ削除
			$this->Session->delete(SESSION_FORM_DATAS);
			
		}
		
		// セッション内の入力データ削除
		$this->Session->delete(SESSION_FORM_DATAS);
		
	}
	
	/**
	 * お問い合わせ（入力）
	 */
	function v070contactinput(){
		$this->layout = LAYOUT_NAME_003;

		try {
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_010080010: // お問い合わせ（確認）：戻るボタン押下
					
					$this->set("data", $this->Common->getSessionFormData());
					
					break;
					
				case EVENT_ID_010070010: // お問い合わせ（入力）：確認ボタン押下
					
					// 入力データをセッションにセット
					$this->Common->setSessionFormData($this->data);
					
					// お問い合わせ（確認）へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010080);
				
				default : // その他
					
					$data = array(
						 OBJECT_ID_010070010 => ""
						,OBJECT_ID_010070020 => ""
						,OBJECT_ID_010070030 => ""
						,OBJECT_ID_010070040 => ""
						,OBJECT_ID_010070050 => ""
						,OBJECT_ID_010070060 => "0"
						,OBJECT_ID_010070070 => ""
						,OBJECT_ID_010070080 => ""
						,OBJECT_ID_010070090 => "0"
					);
					$this->set("data", $data);
					
					break;
			}
			
			// リスト
			$list[CONFIG_0049] = Configure::read(CONFIG_0049);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			
			// 例外処理
			$this->Session->setFlash("c010Home/v070contactinputで例外発生<br>".$ex->getMessage()."<br>SQL : ".$ex->queryString);
		
			// セッション内の入力データ削除
			$this->Session->delete(SESSION_FORM_DATAS);
			
		}
		
		// セッション内の入力データ削除
		$this->Common->deleteSessionFormData();
	}
	
	/**
	 * お問い合わせ（確認）
	 */
	function v080contactconfirm(){
		$this->layout = LAYOUT_NAME_003;

		try {
			
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_010070010: // お問い合わせ（入力）：確認ボタン押下
					
					$data = $this->Common->getSessionFormData();
					$this->set("data", $data);
					
					break;
					
				case EVENT_ID_010080020: // お問い合わせ（確認）：決定ボタン押下
					
					// メール送信
					$data = $this->Common->getSessionFormData();
					
					// お客様へ
					$this->Mail->sendMailContact($data);
					
					// 会社へ
					$this->Mail->sendMailContacttoAdmin($data);
					
					// お問い合わせ（確認）へ
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010090);
					
					break;
				
				case EVENT_ID_010080010: // お問い合わせ（確認）：戻るボタン押下
				default : // その他
					
					$this->Common->setSessionEventId($event_id);
					$this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010070);
					
					break;
			}
			
			// リスト
			$list[CONFIG_0049] = Configure::read(CONFIG_0049);
			$this->set("list" , $list);
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			
			// 例外処理
			$this->Session->setFlash("c010Home/v080contactconfirmで例外発生<br>".$ex->getMessage()."<br>SQL : ".$ex->queryString);
		
			// セッション内の入力データ削除
			$this->Session->delete(SESSION_FORM_DATAS);
			
		}
		
	}
	
	/**
	 * お問い合わせ（完了）
	 */
	function v090contactcomplete() {
		$this->layout = LAYOUT_NAME_001;

		try {

			$this->response->disableCache();
			$event_id = $this->Common->getSessionEventId();
			
			switch ($event_id) {
				case EVENT_ID_010080020: // お問い合わせ（確認）：決定ボタン押下
					
					break;
				
				default : // その他
					
					// お問い合わせ(入力)へ
					$this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010070);
			}
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			
			// 例外処理
			$this->Session->setFlash("c010Home/v090contactcompleteで例外発生<br>".$ex->getMessage()."<br>SQL : ".$ex->queryString);
		
			// セッション内の入力データ削除
			$this->Session->delete(SESSION_FORM_DATAS);
			
		}
	}
	
	/**
	 * 退会済み<br>
	 */
	function v910deleted() {
		
		$this->layout = LAYOUT_NAME_001;
		$this->set("action", $this->Common->getCurrentAction());
		
		// セッション全削除
		$this->Session->destroy();
	}
        /**
         * 口座開設できない<br>
         */
        function v911rejected() {

                $this->layout = LAYOUT_NAME_001;
                $this->set("action", $this->Common->getCurrentAction());

                // セッション全削除
                $this->Session->destroy();
        }	

	/**
	 * ログアウト<br>
	 * セッション削除後トップ画面へリダイレクト
	 */
	function v920logout() {
		
		$this->layout = LAYOUT_NAME_001;
		$this->set("action", $this->Common->getCurrentAction());
			
		
		// セッション全削除
		$this->Session->destroy();
		
	}
	
	/**
	 * セッションタイムアウト<br>
	 * セッションタイムアウト時に表示する
	 */
	function v930sessiontimeout() {
		
		$this->layout = LAYOUT_NAME_001;
		$this->set("action", $this->Common->getCurrentAction());
		
	}
	
	
}
 
