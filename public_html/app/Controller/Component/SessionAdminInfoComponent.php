<?php
App::uses('Component', 'Controller');

class SessionAdminInfoComponent extends Component {

	// コンポーネント「Session」を使えるようにする。
	public $components = array(
		COMPONENT_C_NAME_010
	   ,"Admin"
	);

	// コンポーネント内でコントローラと同じように$thisを使えるようにする。
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	
	/**
	 * 管理者ユーザ情報格納<br>
	 * ログイン中の管理者ユーザ情報をセッションに格納する。
	 * @param string $admin_id
	 */
	function setAdminInfo($admin_id) {
		
		try {
			
			// 検索結果が0件の場合戻り値にfalseを設定
			$mst_admin = $this->Admin->getMstAdmin($admin_id);

			$admin_info = array(
					 LOGIN_ADMIN_ID             => $mst_admin[0][MODEL_NAME_010][COLUMN_0100010] // 管理者ID
					,LOGIN_ADMIN_NAME           => $mst_admin[0][MODEL_NAME_010][COLUMN_0100020] // 管理者名
					,LOGIN_ADMIN_LOGIN_TIME     => date(DATETIME_FORMAT)                         // ログイン時刻
                                        ,LOGIN_ADMIN_REVIEW_AUTH    => $mst_admin[0][MODEL_NAME_010][COLUMN_0100050] // REVIEW_AUTH追加
	//				,LOGIN_ADMIN_AUTH_USER_INQR => $mst_admin[0][MODEL_NAME_010][OBJECT_ID_0079] // 権限-ユーザ照会
	//				,LOGIN_ADMIN_AUTH_USER_APRV => $mst_admin[0][MODEL_NAME_010][OBJECT_ID_0080] // 権限-ユーザ承認／拒否
	//				,LOGIN_ADMIN_AUTH_USER_CRCT => $mst_admin[0][MODEL_NAME_010][OBJECT_ID_0081] // 権限-ユーザ更新
	//				,LOGIN_ADMIN_AUTH_USER_DPST => $mst_admin[0][MODEL_NAME_010][OBJECT_ID_0082] // 権限-入金管理
	//				,LOGIN_ADMIN_AUTH_INVS_INQR => $mst_admin[0][MODEL_NAME_010][OBJECT_ID_0083] // 権限-投資案件紹介
	//				,LOGIN_ADMIN_AUTH_INVS_RGST => $mst_admin[0][MODEL_NAME_010][OBJECT_ID_0084] // 権限-投資案件登録
	//				,LOGIN_ADMIN_AUTH_INVS_CRCT => $mst_admin[0][MODEL_NAME_010][OBJECT_ID_0085] // 権限-投資案件更新
	//				,LOGIN_ADMIN_AUTH_INVS_DELT => $mst_admin[0][MODEL_NAME_010][OBJECT_ID_0086] // 権限-投資案件削除
	//				,LOGIN_ADMIN_AUTH_ADMN_INQR => $mst_admin[0][MODEL_NAME_010][OBJECT_ID_0087] // 権限-管理者照会
	//				,LOGIN_ADMIN_AUTH_ADMN_RGST => $mst_admin[0][MODEL_NAME_010][OBJECT_ID_0088] // 権限-管理者登録
	//				,LOGIN_ADMIN_AUTH_ADMN_CRCT => $mst_admin[0][MODEL_NAME_010][OBJECT_ID_0089] // 権限-管理者更新
	//				,LOGIN_ADMIN_AUTH_ADMN_DELT => $mst_admin[0][MODEL_NAME_010][OBJECT_ID_0090] // 権限-管理者削除
			);

			$this->Session->write(SESSION_LOGIN_ADMIN_INFO, $admin_info);
			
		} catch (Exception $ex) {
			$err = "SessionAdminInfo->setAdminInfo で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * 管理者情報取得<br>
	 * セッションからをを全てする。
	 * @return array $data
	 */
	function getAdminInfo() {
		
		try {
			
			$data = null;
			if ($this->Session->check(SESSION_LOGIN_ADMIN_INFO)) {
				$data = $this->Session->read(SESSION_LOGIN_ADMIN_INFO);
			}
			return $data;
			
		} catch (Exception $ex) {
			$err = "SessionAdminInfo->getAdminInfo で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}

	/**
	 * 管理者情報取得<br>
	 * セッションの有無をチェック<br>
	 * 有：true<br>
	 * 無：false<br>
	 * @return boolean
	 */
	function checkAdminInfo() {
		try {
			return $this->Session->check(SESSION_LOGIN_ADMIN_INFO);
		} catch (Exception $ex) {
			$err = "SessionAdminInfo->getAdminInfo で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}


	
}

