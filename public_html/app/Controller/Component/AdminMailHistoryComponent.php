<?php
App::uses('Component', 'Controller');

class AdminMailHistoryComponent extends Component {
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * 管理者メール保存
	 * @param array $admin_info
	 * @param array $data
	 * @throws Exception
	 */
	function saveAdminMail($admin_info, $data) {
		
		try {
			
			// 管理者ID、管理者名
			$admin_id   = $admin_info[LOGIN_ADMIN_ID];
			$admin_name = $admin_info[LOGIN_ADMIN_NAME];
			
			// 送信元メールアカウント
			$account = $data[OBJECT_ID_050430140];
			
			// 送信先指定方法
			$method  = $data[OBJECT_ID_050430010];
			
			// 送信先条件
			$conditions = "";
			switch ($method) {
				
				case SPECIFIED_METHOD_CODE_0: // 条件を指定
					
					$list[CONFIG_0024] = Configure::read(CONFIG_0024);
					$user_status       = "";
					
					// 状態：仮登録
					if (isset($data[OBJECT_ID_050430020]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050430020]) == 0) {
						$user_status .= strcmp("", $user_status) == 0 ? "" : "、";
						$user_status .= $list[CONFIG_0024][USER_STATUS_CODE_INTERIM];
					}
					// 状態：登録申請中
					if (isset($data[OBJECT_ID_050430030]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050430030]) == 0) {
						$user_status .= strcmp("", $user_status) == 0 ? "" : "、";
						$user_status .= $list[CONFIG_0024][USER_STATUS_CODE_APPLIED];
					}
					// 状態：承認済
					if (isset($data[OBJECT_ID_050430040]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050430040]) == 0) {
						$user_status .= strcmp("", $user_status) == 0 ? "" : "、";
						$user_status .= $list[CONFIG_0024][USER_STATUS_CODE_APPROVED];
					}
					// 状態：認証済
					if (isset($data[OBJECT_ID_050430050]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050430050]) == 0) {
						$user_status .= strcmp("", $user_status) == 0 ? "" : "、";
						$user_status .= $list[CONFIG_0024][USER_STATUS_CODE_AUTHENTICATED];
					}
					// 状態：停止
					if (isset($data[OBJECT_ID_050430060]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050430060]) == 0) {
						$user_status .= strcmp("", $user_status) == 0 ? "" : "、";
						$user_status .= $list[CONFIG_0024][USER_STATUS_CODE_STOPPED];
					}
					// 状態：退会
					if (isset($data[OBJECT_ID_050430070]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050430070]) == 0) {
						$user_status .= strcmp("", $user_status) == 0 ? "" : "、";
						$user_status .= $list[CONFIG_0024][USER_STATUS_CODE_WITHDRAWAL];
					}
					// 状態：開設拒否
					if (isset($data[OBJECT_ID_050430080]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050430080]) == 0) {
						$user_status .= strcmp("", $user_status) == 0 ? "" : "、";
						$user_status .= $list[CONFIG_0024][USER_STATUS_CODE_REJECTED];
					}
					
					$conditions .= "投資家状態：「".$user_status."」";
					
					$list[CONFIG_0046] = Configure::read(CONFIG_0046);
					$mail_magazine     = "";
					
					// メルマガ：登録する
					if (isset($data[OBJECT_ID_050430090]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050430090]) == 0) {
						$mail_magazine .= strcmp("", $mail_magazine) == 0 ? "" : "、";
						$mail_magazine .= $list[CONFIG_0046][MAIL_MAGAZINE_RECEIVE];
					}
					// メルマガ：登録しない
					if (isset($data[OBJECT_ID_050430100]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050430100]) == 0) {
						$mail_magazine .= strcmp("", $mail_magazine) == 0 ? "" : "、";
						$mail_magazine .= $list[CONFIG_0046][MAIL_MAGAZINE_REJECT];
					}

					$conditions .= "メルマガ：「".$mail_magazine."」";
					
					break;
				
				case SPECIFIED_METHOD_CODE_1: // 管理番号を指定
				case SPECIFIED_METHOD_CODE_2: // 投資家IDを指定
					
					$conditions = $data[OBJECT_ID_050430110];
					
					break;
			}
			
			// 件名、本文取得
			$subject = $data[OBJECT_ID_050430120];
			$body    = $data[OBJECT_ID_050430130];
			
			// 現在時刻
			$now = date(DATETIME_FORMAT);
			
			// ◆履歴データ登録◆
			
			$mail_history = array(
				 COLUMN_2600020 => $account
				,COLUMN_2600030 => $method
				,COLUMN_2600040 => $conditions
				,COLUMN_2600050 => $subject
				,COLUMN_2600060 => $body
				,COLUMN_0000010 => $now
				,COLUMN_0000020 => $admin_id
				,COLUMN_0000030 => $admin_name
			);

			// 登録実行
			$this->Controller->TrnAdminMailHistory->save($mail_history, false);
			
		} catch (Exception $ex) {
			$err = "AdminMailHistory->saveAdminMail で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
}
