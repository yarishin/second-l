<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');
require_once("CommonTag.php");

class CommonComponent extends Component {
	
	// 他のコンポーネントを使えるようにする。
	public $components = array(
		 "SessionUserInfo"
		,"Calendar"
		,"Document"
		,"User"
		,"Session"
	);

	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * トランザクション：開始<br>
	 */
	function trnBegin() {
		try {
			if (!$this->Session->check(SESSION_DATA_SOURCE)) {
				$this->Session->write(SESSION_DATA_SOURCE, $this->Controller->Transaction->begin());
			}
		} catch (Exception $ex) {
			$err = "Common->trnBegin で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * トランザクション：コミット<br>
	 */
	function trnCommit() {
		try {
			if ($this->Session->check(SESSION_DATA_SOURCE)) {
				$this->Controller->Transaction->commit($this->Session->read(SESSION_DATA_SOURCE));
			}
			$this->Session->delete(SESSION_DATA_SOURCE);
		} catch (Exception $ex) {
			$err = "Common->trnCommit で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * トランザクション：ロールバック<br>
	 */
	function trnRollback() {
		try {
			if ($this->Session->check(SESSION_DATA_SOURCE)) {
				$this->Controller->Transaction->rollback($this->Session->read(SESSION_DATA_SOURCE));
			}
			$this->Session->delete(SESSION_DATA_SOURCE);
		} catch (Exception $ex) {
			$err = "Common->trnRollback で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * リダイレクト<br>
	 * @param string $controller
	 * @param string $action
	 */
	function redirectCommon($controller, $action) {
		try {
			$this->Controller->redirect(array(
				 REDIRECT_C => $controller
				,REDIRECT_A => $action
			));
		} catch (Exception $ex) {
			$err = "Common->redirectCommon で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * マイページアクセス時のリダイレクト制御<br>
	 * マイページにアクセスした時にユーザの状態で遷移先を変える。<br>
	 */
	function redirectMyPage() {
		
		try {
			
			if ($this->SessionUserInfo->checkUserInfo()) {
				
				$user_info        = $this->SessionUserInfo->getUserInfo();
				$user_id          = $user_info[LOGIN_USER_ID];
				$user_status_code = $user_info[LOGIN_USER_STATUS_CODE];
				
				// ダミーイベントIDをセット
				$this->setSessionEventId(EVENT_ID_000000000);

				// 状態コードがある→ログイン状態
				switch ($user_status_code) {
					case USER_STATUS_CODE_INTERIM: // 仮登録(0)

						// 投資家登録(同意)へ
						$this->redirectCommon(REDIRECT_C030, REDIRECT_A030010);

					case USER_STATUS_CODE_APPLIED: // 本登録申請中(1)

						// 確認書類の説明へ
                                                $this->redirectCommon(REDIRECT_C030, REDIRECT_A030040);
                                                //$this->redirectCommon(REDIRECT_C070, REDIRECT_A070010);
					case USER_STATUS_CODE_APPROVED: // 承認済み(2)

						// 認証キー入力へ
						$this->redirectCommon(REDIRECT_C030, REDIRECT_A030060);

					case USER_STATUS_CODE_WITHDRAWAL: // 退会(5)

						// 退会済みへ
						$this->redirectCommon(REDIRECT_C010, REDIRECT_A010910);

					case USER_STATUS_CODE_REJECTED: // 口座開設拒否(6)

						// サイトトップへ
						//$this->Controller->redirect(URL_SITE_TOP);
						$this->redirectCommon(REDIRECT_C010, REDIRECT_A010911);

					case USER_STATUS_CODE_AUTHENTICATED: // 認証済み(3)
					case USER_STATUS_CODE_STOPPED: // 停止(4)

						// 画面遷移なし
				}

			}
			else {

				// セッションがない→未ログイン状態

				// ログイン画面へ
				$this->redirectCommon(REDIRECT_C010, REDIRECT_A010020);

			}
		} catch (Exception $ex) {
			$err = "Common->redirectMyPage で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * イベントIDセット<br>
	 * イベントIDをセッションに格納する。
	 * @param string $event_id
	 */
	function setSessionEventId($event_id) {
		try {
			$this->Session->write(SESSION_EVENT_ID, $event_id);
		} catch (Exception $ex) {
			$err = "Common->setSessionEventId で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * イベントID取得<br>
	 * イベントIDをセッションから取得する。<br>
	 * 取出したらセッション内のイベントIDは削除する。<br>
	 * @return string $event_id
	 */
	function getSessionEventId() {
		try {
			$event_id = null;
			if ($this->Session->check(SESSION_EVENT_ID)) {
				$event_id = $this->Session->read(SESSION_EVENT_ID);
			}
			return $event_id;
		} catch (Exception $ex) {
			$err = "Common->getSessionEventId で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * イベントID削除<br>
	 * イベントIDをセッションから削除する。
	 */
	function deleteSessionEventId() {
		try {
			if ($this->Session->check(SESSION_EVENT_ID)) {
				$this->Session->delete(SESSION_EVENT_ID);
			}
		} catch (Exception $ex) {
			$err = "Common->deleteSessionEventId で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * ユーザIDセット(管理者用)<br>
	 * ユーザIDをセッションに格納する。
	 * @param string $user_id
	 */
	function setSessionUserId($user_id) {
		try {
			$this->Session->write(SESSION_USER_ID, $user_id);
		} catch (Exception $ex) {
			$err = "Common->setSessionUserId で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * ユーザID取得(管理者用)<br>
	 * ユーザIDをセッションから取得する。<br>
	 * @return string $event_id
	 */
	function getSessionUserId() {
		try {
			$user_id = null;
			if ($this->Session->check(SESSION_USER_ID)) {
				$user_id = $this->Session->read(SESSION_USER_ID);
			}
			return $user_id;
		} catch (Exception $ex) {
			$err = "Common->getSessionUserId で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * ユーザID削除(管理者用)<br>
	 * ユーザIDをセッションから削除する。
	 */
	function deleteSessionUserId() {
		try {
			if ($this->Session->check(SESSION_USER_ID)) {
				$this->Session->delete(SESSION_USER_ID);
			}
		} catch (Exception $ex) {
			$err = "Common->deleteSessionUserId で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 選択中ファンド情報セット<br>
	 * 選択中ファンドIDをセッションに格納する。
	 * @param string $fund_id $fund_name
	 */
	function setSessionFundInfo($fund_id, $fund_name) {
		try {
			$this->Session->write(SESSION_FUND_ID  , $fund_id);
			$this->Session->write(SESSION_FUND_NAME, $fund_name);
		} catch (Exception $ex) {
			$err = "Common->setSessionFundInfo で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 選択中ファンドIDセット<br>
	 * 選択中ファンドIDをセッションに格納する。
	 * @param string $fund_id
	 */
	function setSessionFundId($fund_id) {
		try {
			$this->Session->write(SESSION_FUND_ID  , $fund_id);
		} catch (Exception $ex) {
			$err = "Common->setSessionFundId で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 選択中ファンドID取得<br>
	 * 選択中ファンドIDをセッションから取得する。<br>
	 * @return string $fund_id
	 */
	function getSessionFundId() {
		try {
			$fund_id = null;
			if ($this->Session->check(SESSION_FUND_ID)) {
				$fund_id = $this->Session->read(SESSION_FUND_ID);
			}
			return $fund_id;
		} catch (Exception $ex) {
			$err = "Common->getSessionFundId で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 選択中ファンド名セット<br>
	 * 選択中ファンド名をセッションに格納する。
	 * @param string $fund_name
	 */
	function setSessionFundName($fund_name) {
		try {
			$this->Session->write(SESSION_FUND_NAME  , $fund_name);
		} catch (Exception $ex) {
			$err = "Common->setSessionFundName で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 選択中ファンド名取得<br>
	 * 選択中ファンド名をセッションから取得する。<br>
	 * @return string $fund_name
	 */
	function getSessionFundName() {
		try {
			$fund_name = null;
			if ($this->Session->check(SESSION_FUND_NAME)) {
				$fund_name = $this->Session->read(SESSION_FUND_NAME);
			}
			return $fund_name;
		} catch (Exception $ex) {
			$err = "Common->getSessionFundName で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 選択中ファンド情報セット<br>
	 * 選択中ファンドID、ファンド名をセッションから削除する。
	 */
	function deleteSessionFundInfo() {
		try {
			if ($this->Session->check(SESSION_FUND_ID)) {
				$this->Session->delete(SESSION_FUND_ID);
			}
			if ($this->Session->check(SESSION_FUND_NAME)) {
				$this->Session->delete(SESSION_FUND_NAME);
			}
		} catch (Exception $ex) {
			$err = "Common->deleteSessionFundInfo で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 選択中貸付番号セット<br>
	 * 選択中貸付番号をセッションに格納する。
	 * @param string $loan_no
	 */
	function setSessionLoanNo($loan_no) {
		try {
			$this->Session->write(SESSION_LOAN_NO, $loan_no);
		} catch (Exception $ex) {
			$err = "Common->setSessionLoanNo で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 選択中ファンドID取得<br>
	 * 選択中ファンドIDをセッションから取得する。<br>
	 * @return number $loan_no
	 */
	function getSessionLoanNo() {
		try {
			$loan_no = null;
			if ($this->Session->check(SESSION_LOAN_NO)) {
				$loan_no = $this->Session->read(SESSION_LOAN_NO);
			}
			return $loan_no;
		} catch (Exception $ex) {
			$err = "Common->getSessionLoanNo で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 選択中貸付番号初期化<br>
	 * 選択中貸付番号をセッションから削除する。
	 * @param number $loan_no
	 */
	function deleteSessionLoanNo() {
		try {
			if ($this->Session->check(SESSION_LOAN_NO)) {
				$this->Session->delete(SESSION_LOAN_NO);
			}
		} catch (Exception $ex) {
			$err = "Common->deleteSessionLoanNo で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 現在処理区分(ファンド)セット<br>
	 * 現在の処理が「新規登録」か「更新」かを設定<br>
	 * 新規登録→DATA_INSER<br>
	 * 更新    →DATA_UPDATE<br>
	 * @param number $type
	 */
	function setSessionProcTypeFund($type) {
		try {
			$this->Session->write(SESSION_PROC_TYPE_FUND, $type);
		} catch (Exception $ex) {
			$err = "Common->setSessionProcTypeFund で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 現在処理区分(ファンド)取得<br>
	 * 現在処理区分をセッションから取得する。<br>
	 * @return number $type
	 */
	function getSessionProcTypeFund() {
		try {
			$type = null;
			if ($this->Session->check(SESSION_PROC_TYPE_FUND)) {
				$type = $this->Session->read(SESSION_PROC_TYPE_FUND);
			}
			return $type;
		} catch (Exception $ex) {
			$err = "Common->getSessionProcTypeFund で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 現在処理区分(ファンド)初期化<br>
	 * 現在処理区分をセッションから削除する。
	 * @param number $type
	 */
	function deleteSessionProcTypeFund() {
		try {
			if ($this->Session->check(SESSION_PROC_TYPE_FUND)) {
				$this->Session->delete(SESSION_PROC_TYPE_FUND);
			}
		} catch (Exception $ex) {
			$err = "Common->deleteSessionProcTypeFund で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 現在処理区分(貸付内容)セット<br>
	 * 現在の処理が「新規登録」か「更新」かを設定<br>
	 * 新規登録→DATA_INSER<br>
	 * 更新    →DATA_UPDATE<br>
	 * @param number $type
	 */
	function setSessionProcTypeLoan($type) {
		try {
			$this->Session->write(SESSION_PROC_TYPE_LOAN, $type);
		} catch (Exception $ex) {
			$err = "Common->setSessionProcTypeLoan で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 現在処理区分(貸付内容)取得<br>
	 * 現在処理区分をセッションから取得する。<br>
	 * @return number $type
	 */
	function getSessionProcTypeLoan() {
		try {
			$type = null;
			if ($this->Session->check(SESSION_PROC_TYPE_LOAN)) {
				$type = $this->Session->read(SESSION_PROC_TYPE_LOAN);
			}
			return $type;
		} catch (Exception $ex) {
			$err = "Common->getSessionProcTypeLoan で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 現在処理区分(貸付内容)初期化<br>
	 * 現在処理区分をセッションから削除する。
	 * @param number $type
	 */
	function deleteSessionProcTypeLoan() {
		try {
			if ($this->Session->check(SESSION_PROC_TYPE_LOAN)) {
				$this->Session->delete(SESSION_PROC_TYPE_LOAN);
			}
		} catch (Exception $ex) {
			$err = "Common->deleteSessionProcTypeLoan で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * 画面入力データセット<br>
	 * 画面で入力されたデータをセッションにセット<br>
	 * @param array $data
	 */
	function setSessionFormData($data) {
		try {
			$this->Session->write(SESSION_FORM_DATAS, $data);
		} catch (Exception $ex) {
			$err = "Common->setSessionFormData で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 画面入力データ取得<br>
	 * 画面入力データをセッションから取得する。<br>
	 * @return array $data
	 */
	function getSessionFormData() {
		try {
			$data = null;
			if ($this->Session->check(SESSION_FORM_DATAS)) {
				$data = $this->Session->read(SESSION_FORM_DATAS);
			}
			return $data;
		} catch (Exception $ex) {
			$err = "Common->getSessionFormData で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 画面入力データ初期化<br>
	 * 画面入力データをセッションから削除する。
	 */
	function deleteSessionFormData() {
		try {
			if ($this->Session->check(SESSION_FORM_DATAS)) {
				$this->Session->delete(SESSION_FORM_DATAS);
			}
		} catch (Exception $ex) {
			$err = "Common->deleteSessionFormData で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * お知らせIDセット<br>
	 * お知らせIDをセッションにセット<br>
	 * @param array $data
	 */
	function setSessionInfoId($data) {
		try {
			$this->Session->write(SESSION_INFO_ID, $data);
		} catch (Exception $ex) {
			$err = "Common->setSessionInfoId で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * お知らせID取得<br>
	 * お知らせIDをセッションから取得する。<br>
	 * @return array $data
	 */
	function getSessionInfoId() {
		try {
			$data = null;
			if ($this->Session->check(SESSION_INFO_ID)) {
				$data = $this->Session->read(SESSION_INFO_ID);
			}
			return $data;
		} catch (Exception $ex) {
			$err = "Common->getSessionInfoId で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * お知らせID初期化<br>
	 * お知らせIDをセッションから削除する。
	 */
	function deleteSessionInfoId() {
		try {
			if ($this->Session->check(SESSION_INFO_ID)) {
				$this->Session->delete(SESSION_INFO_ID);
			}
		} catch (Exception $ex) {
			$err = "Common->deleteSessionInfoId で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 画面入力データセット<br>
	 * 画面で入力されたデータをセッションにセット<br>
	 * @param array $data
	 */
	function setSessionFormDataList($data) {
		try {
			$this->Session->write(SESSION_FORM_DATA_LIST, $data);
		} catch (Exception $ex) {
			$err = "Common->setSessionFormDataList で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 画面入力データ取得<br>
	 * 画面入力データをセッションから取得する。<br>
	 * @return array $data
	 */
	function getSessionFormDataList() {
		try {
			$data = null;
			if ($this->Session->check(SESSION_FORM_DATA_LIST)) {
				$data = $this->Session->read(SESSION_FORM_DATA_LIST);
			}
			return $data;
		} catch (Exception $ex) {
			$err = "Common->getSessionFormDataList で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 画面入力データ初期化<br>
	 * 画面入力データをセッションから削除する。
	 */
	function deleteSessionFormDataList() {
		try {
			if ($this->Session->check(SESSION_FORM_DATA_LIST)) {
				$this->Session->delete(SESSION_FORM_DATA_LIST);
			}
		} catch (Exception $ex) {
			$err = "Common->deleteSessionFormDataList で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * バリデーションエラーセット<br>
	 * バリデーションメッセージをセッションにセット<br>
	 * @param array $data
	 */
	function setSessionValidationErrors($data) {
		try {
			$this->Session->write(SESSION_VALIDATION_ERROS, $data);
		} catch (Exception $ex) {
			$err = "Common->setSessionValidationErrors で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 *バリデーションエラー取得<br>
	 * バリデーションメッセージをセッションから取得する。<br>
	 * @return array $data
	 */
	function getSessionValidationErrors() {
		try {
			$data = null;
			if ($this->Session->check(SESSION_VALIDATION_ERROS)) {
				$data = $this->Session->read(SESSION_VALIDATION_ERROS);
			}
			return $data;
		} catch (Exception $ex) {
			$err = "Common->getSessionValidationErrors で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 *バリデーションエラー初期化<br>
	 * バリデーションメッセージをセッションから削除する。
	 */
	function deleteSessionValidationErrors() {
		try {
			if ($this->Session->check(SESSION_VALIDATION_ERROS)) {
				$this->Session->delete(SESSION_VALIDATION_ERROS);
			}
		} catch (Exception $ex) {
			$err = "Common->deleteSessionValidationErrors で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 同意日時セット<br>
	 * 同意日時をセッションにセット<br>
	 * @param strimg $data
	 */
	function setSessionAgreedDatetime($data) {
		try {
			$this->Session->write(SESSION_AGREED_DATETIME, $data);
		} catch (Exception $ex) {
			$err = "Common->setSessionAgreedDatetime で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 *同意日時取得<br>
	 * 同意日時をセッションから取得する。<br>
	 * @return array $data
	 */
	function getSessionAgreedDatetime() {
		try {
			$data = null;
			if ($this->Session->check(SESSION_AGREED_DATETIME)) {
				$data = $this->Session->read(SESSION_AGREED_DATETIME);
			}
			return $data;
		} catch (Exception $ex) {
			$err = "Common->getSessionAgreedDatetime で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 *同意日時初期化<br>
	 * 同意日時をセッションから削除する。
	 */
	function deleteSessionAgreedDatetime() {
		try {
			if ($this->Session->check(SESSION_AGREED_DATETIME)) {
				$this->Session->delete(SESSION_AGREED_DATETIME);
			}
		} catch (Exception $ex) {
			$err = "Common->deleteSessionAgreedDatetime で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 運用報告書(貸付)IDセット<br>
	 * 運用報告書(貸付)IDをセッションにセット<br>
	 * @param strimg $data
	 */
	function setSessionReportId($data) {
		try {
			$this->Session->write(SESSION_REPORT_ID, $data);
		} catch (Exception $ex) {
			$err = "Common->setSessionReportId で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 運用報告書(貸付)IDセット<br>
	 * 運用報告書(貸付)IDをセッションにセット<br>
	 * @param strimg $data
	 */
	function getSessionReportId() {
		try {
			$data = null;
			if ($this->Session->check(SESSION_REPORT_ID)) {
				$data = $this->Session->read(SESSION_REPORT_ID);
			}
			return $data;
		} catch (Exception $ex) {
			$err = "Common->getSessionReportId で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 運用報告書(貸付)IDセット<br>
	 * 運用報告書(貸付)IDをセッションにセット<br>
	 * @param strimg $data
	 */
	function deleteSessionReportId() {
		try {
			if ($this->Session->check(SESSION_REPORT_ID)) {
				$this->Session->delete(SESSION_REPORT_ID);
			}
		} catch (Exception $ex) {
			$err = "Common->deleteSessionReportId で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 参照フラグセット<br>
	 * 参照フラグをセッションにセット<br>
	 * @param string $data
	 */
	function setSessionReferenceFlag($data) {
		try {
			$this->Session->write(SESSION_REFERENCE_FLAG, $data);
		} catch (Exception $ex) {
			$err = "Common->setSessionReferenceFlag で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 参照フラグ取得<br>
	 * 参照フラグをセッションから取得<br>
	 */
	function getSessionReferenceFlag() {
		try {
			$data = null;
			if ($this->Session->check(SESSION_REFERENCE_FLAG)) {
				$data = $this->Session->read(SESSION_REFERENCE_FLAG);
			}
			return $data;
		} catch (Exception $ex) {
			$err = "Common->getSessionReferenceFlag で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 参照フラグ削除<br>
	 * 参照フラグをセッションから削除<br>
	 */
	function deleteSessionReferenceFlag() {
		try {
			if ($this->Session->check(SESSION_REFERENCE_FLAG)) {
				$this->Session->delete(SESSION_REFERENCE_FLAG);
			}
		} catch (Exception $ex) {
			$err = "Common->deleteSessionReferenceFlag で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 書面URLリストセット<br>
	 * 書面URLリストをセッションにセット<br>
	 * @param array $data
	 */
	function setSessionDocUrlList($data) {
		try {
			$this->Session->write(SESSION_DOC_URL_LIST, $data);
		} catch (Exception $ex) {
			$err = "Common->setSessionDocUrlList で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 書面URLリスト取得<br>
	 * 書面URLリストをセッションから取得する。<br>
	 * @return array $data
	 */
	function getSessionDocUrlList() {
		try {
			$data = null;
			if ($this->Session->check(SESSION_DOC_URL_LIST)) {
				$data = $this->Session->read(SESSION_DOC_URL_LIST);
			}
			return $data;
		} catch (Exception $ex) {
			$err = "Common->getSessionDocUrlList で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 書面URLリスト初期化<br>
	 * 書面URLリストをセッションから削除する。
	 */
	function deleteSessionDocUrlList() {
		try {
			if ($this->Session->check(SESSION_DOC_URL_LIST)) {
				$this->Session->delete(SESSION_DOC_URL_LIST);
			}
		} catch (Exception $ex) {
			$err = "Common->deleteSessionDocUrlList で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	
	/**
	 * 日数差取得<br>
	 * 2つの日付の間の日数を返す。<br>
	 * $include = true  : 開始日を含む<br>
	 * $include = false : 開始日を含まない<br>
	 * @param number $year_rear $month_rear $day_rear $year_front $month_front $day_front
	 * @param boolean $include
	 * @return number $day_number
	 */
	function getDifferenceDays($year_rear, $month_rear, $day_rear, $year_front, $month_front, $day_front, $include) {
		
		try {
			
			// 秒数を取得
			$seconds = 0;
			if ($include) {

				// 開始日を含む
				$seconds  = strtotime($year_rear ."/". $month_rear ."/". $day_rear) - strtotime($year_front."/".$month_front."/".$day_front." -1 day");
			}
			else {

				// 開始日を含まない
				$seconds  = strtotime($year_rear ."/". $month_rear ."/". $day_rear) - strtotime($year_front."/".$month_front."/".$day_front);
			}

			// 日数に変換
			$days = intval( $seconds / ( 24 * 60 * 60));

			return $days;
			
		} catch (Exception $ex) {
			$err = "Common->getDifferenceDays で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 残り時間取得<br>
	 * 指定した時刻までの残り時間を返す。<br>
	 * 24時間以上の場合日数を返す。<br>
	 * 24時間未満、且つ1時間以上の場合、1時間単位で返す。<br>
	 * 1時間未満の場合、1分単位で返す。<br>
	 * @param array $fund_data
	 * @param number $fund_status_code
	 * @return string $remaining_time
	 */
	function getRemainingTime($fund_data, $fund_status_code) {
		try {
			$remaining_time = CommonTag::getRemainingTime($fund_data, $fund_status_code);
			return $remaining_time;
		} catch (Exception $ex) {
			$err = "Common->getRemainingTime で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}

        function getRemainingTimeDay($fund_data, $fund_status_code) {
                try {
                        $remaining_timeDay = CommonTag::getRemainingTimeDay($fund_data, $fund_status_code);
                        return $remaining_timeDay;
                } catch (Exception $ex) {
                        $err = "Common->getRemainingTimeDay で例外発生<br>";
                        throw new Exception($err.$ex->getMessage()."<br>");
                }

        }
	
	/**
	 * ファンド状態取得<br>
	 * 各種日付、金額を渡して状態コードを返す。<br>
	 * @param array $fund_data
	 * @return number $status_code
	 */
	function getFundStatusCode($fund_data) {
		try {
			$status_code = CommonTag::getFundStatusCode($fund_data);
			return $status_code;
		} catch (Exception $ex) {
			$err = "Common->getFundStatusCode で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * カレントアクション取得<br>
	 * @return string $current_acount
	 */
	function getCurrentAction() {
		try {
			$current_action = $this->Controller->webroot.$this->Controller->params["controller"]."/".$this->Controller->params["action"];
			return $current_action;
		} catch (Exception $ex) {
			$err = "Common->getCurrentAction で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
}
