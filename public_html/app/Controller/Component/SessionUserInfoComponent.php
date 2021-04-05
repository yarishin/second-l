<?php
App::uses('Component', 'Controller');

class SessionUserInfoComponent extends Component {

	// コンポーネント「Session」を使えるようにする。
	public $components = array(
		"Session"
	);

	// コンポーネント内でコントローラと同じように$thisを使えるようにする。
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * ユーザ情報格納<br>
	 * ログイン中のユーザ情報をセッションに格納する。
	 * @param string $user_id
	 */
	function setUserInfo($user_id) {
		
		try {
			
			$status = null;
			$fields = null;

			// 検索条件設定
			$status = array(
				MODEL_CONDITIONS => array(
					 COLUMN_0800010." =" => $user_id
				),
				MODEL_FIELDS => array(
					 COLUMN_0800020 // メールアドレス
					,COLUMN_0800060 // 氏名(姓)
					,COLUMN_0800070 // 氏名(名)
					,COLUMN_0800080 // フリナガ(姓)
					,COLUMN_0800090 // フリガナ(名)
					,COLUMN_0800560 // 状態
					,COLUMN_0800800 // club_id
				)
			);

			// 検索結果が0件の場合戻り値にfalseを設定
			$mst_user = $this->Controller->MstUser->find(MODEL_ALL, $status);

			// データ取出し
			$last_name    = "";
			$first_name   = "";
			$mail_address = "";
			$status_code  = "";
			foreach ($mst_user as $key => $values) {
				foreach ($values as $value) {
					$mail_address    = $value[COLUMN_0800020];
					$last_name       = $value[COLUMN_0800060];
					$first_name      = $value[COLUMN_0800070];
					$last_name_kana  = $value[COLUMN_0800080];
					$first_name_kana = $value[COLUMN_0800090];
					$status_code     = $value[COLUMN_0800560];
					$club_id         = $value[COLUMN_0800800];
				}
			}

			$user_name      = $last_name." ".$first_name;
			$user_name_kana = $last_name_kana." ".$first_name_kana;

			$user_info = array(
				 LOGIN_USER_ID           => $user_id        // ユーザID
				,LOGIN_USER_NAME         => $user_name      // 氏名
				,LOGIN_USER_NAME_KANA    => $user_name_kana // 氏名(フリガナ)
				,LOGIN_USER_MAIL_ADDRESS => $mail_address   // メールアドレス
				,LOGIN_USER_STATUS_CODE  => $status_code    // 状態
				,LOGIN_USER_CLUB_ID      => $club_id        // club_id
			);

			$this->Session->write(SESSION_LOGIN_USER_INFO, $user_info);
			
		} catch (Exception $ex) {
			$err = "SessionUserInfo->setUserInfo で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * ユーザ情報取得<br>
	 * セッションからユーザ情報を全てする。
	 * @return array $data
	 */
	function getUserInfo() {
		
		try {
			
			$data = null;
			if ($this->Session->check(SESSION_LOGIN_USER_INFO)) {
				$data = $this->Session->read(SESSION_LOGIN_USER_INFO);
			}
			return $data;
			
		} catch (Exception $ex) {
			$err = "SessionUserInfo->getUserInfo で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * ユーザID取得<br>
	 * セッションからユーザIDを取得する。
	 * @return string $user_id
	 */
	function getUserId() {
		
		try {
			
			$user_id = null;

			if ($this->Session->check(SESSION_LOGIN_USER_INFO)) {
				$data = $this->Session->read(SESSION_LOGIN_USER_INFO);
				$user_id = $data[LOGIN_USER_ID];
			}
			return $user_id;
			
		} catch (Exception $ex) {
			$err = "SessionUserInfo->getUserId で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * ユーザメールアドレス取得<br>
	 * セッションからメールアドレスを取得する。
	 * @return string $mail_address
	 */
	function getMailAddress() {
		
		try {
			
			$mail_address = null;

			if ($this->Session->check(SESSION_LOGIN_USER_INFO)) {
				$data = $this->Session->read(SESSION_LOGIN_USER_INFO);
				$mail_address = $data[LOGIN_USER_MAIL_ADDRESS];
			}
			return $mail_address;
			
		} catch (Exception $ex) {
			$err = "SessionUserInfo->getMailAddress で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * ユーザ状態取得<br>
	 * セッションからユーザ状態を取得する。
	 * @return string $user_status_code
	 */
	function getUserStatusCode() {
		
		try {
			
			$user_status_code = null;

			if ($this->Session->check(SESSION_LOGIN_USER_INFO)) {
				$data = $this->Session->read(SESSION_LOGIN_USER_INFO);
				$user_status_code = $data[LOGIN_USER_STATUS_CODE];
			}
			return $user_status_code;
			
		} catch (Exception $ex) {
			$err = "SessionUserInfo->getUserStatusCode で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * セッション有無チェック<br>
	 * セッション内のユーザ情報の有無をチェックする。<br>
	 */
	function checkUserInfo() {
		try {
			return $this->Session->check(SESSION_LOGIN_USER_INFO);
		} catch (Exception $ex) {
			$err = "SessionUserInfo->checkUserInfo で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	
}

