<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class CheckC010Component extends Component {
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * ログイン時入力チェック
	 * @param array $input
	 * @return boolean $result
	 */
	function index($input) {
		
		try {
			
			// 入力データ受取
			$data[COLUMN_0800010] = $input[OBJECT_ID_010010010];
			$data[COLUMN_0800030] = $input[OBJECT_ID_010010020];

			$this->Controller->MstUser->set($data);

			// チェック実行
			return $this->Controller->MstUser->validates();
			
		} catch (Exception $ex) {
			$err = "CheckC010->index で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}

	/**
	 * ログイン時入力チェック
	 * @param array $input
	 * @return boolean $result
	 */
	function v020($input) {
		
		try {
			
			// 入力データ受取
			$data[COLUMN_0800010] = $input[OBJECT_ID_010020010];
			$data[COLUMN_0800030] = $input[OBJECT_ID_010020020];

			$this->Controller->MstUser->set($data);

			// チェック実行
			return $this->Controller->MstUser->validates();
			
		} catch (Exception $ex) {
			$err = "CheckC010->v020 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * パスワードを紛失した場合に入力チェック
	 * 
	 * @param array  $data
	 */
	function v0501($data) {

		try {
			
			$msg = null;

			if (!$this->isIdForm($data[OBJECT_ID_010050010])) {
				//$msg[] = "IDは半角数字で入力して下さい。";
				$msg[] = "IDは半角で入力してください。";
			}
			else if (strlen($data[OBJECT_ID_010050010]) != 8) {
				//$msg[] = "IDは8文字で入力して下さい。"; 
				$msg[] = "IDは8ケタの数字です。"; 
			}
			else {
				$count = $this->v050($data);
				if ($count == 0) {
					//$msg[] = "登録内容と一致しませんでした。";
					$msg[] = "質問、答えもしくはその両方が正しくありません。";
				}
			}

			return $msg;
			
		} catch (Exception $ex) {
			$err = "CheckC010->v0501 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * IDを紛失した場合に入力チェック
	 * 
	 * @param array  $data
	 */
	function v0502($data) {

		try {
			
			$msg = null;

			if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $data[OBJECT_ID_010050040])) {
				//$msg[] = "メールアドレスを正しい形式で入力して下さい。"; 
				$msg[] = "メールアドレスが正しくありません。"; 
			} else {
				$count = $this->v050($data);
				if ($count == 0) {
					//$msg[] = "登録内容と一致しませんでした。";
					$msg[] = "質問、答えもしくはその両方が正しくありません。";
				}
			}

			return $msg;
			
		} catch (Exception $ex) {
			$err = "CheckC010->v0502 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * ユーザ存在チェック
	 * 
	 * @param  array   $data
	 * @return int
	 */
	private function v050($data) {

		try {
			
			$conditions = null;
			if (strcmp("", $data[OBJECT_ID_010050010]) != 0) {
				$conditions[COLUMN_0800010] = $data[OBJECT_ID_010050010];
				$conditions[COLUMN_0800570] = $data[OBJECT_ID_010050020];
				$conditions[COLUMN_0800580] = $data[OBJECT_ID_010050030];
			}
			elseif (strcmp("", $data[OBJECT_ID_010050040]) != 0) {
				$conditions[COLUMN_0800020] = $data[OBJECT_ID_010050040];
				$conditions[COLUMN_0800570] = $data[OBJECT_ID_010050050];
				$conditions[COLUMN_0800580] = $data[OBJECT_ID_010050060];
			}

			$status[MODEL_CONDITIONS]   = $conditions;

			$mst_user = $this->Controller->MstUser->find(MODEL_COUNT, $status);

			return $mst_user;
			
		} catch (Exception $ex) {
			$err = "CheckC010->v050 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * ID形式をチェック(半角英数字)
	 * 
	 * @param  int      $user_id
	 * @return boolean
	 */
	private function isIdForm($user_id) {

		try {
			
			$result = true;

			if (strcmp($user_id, "") == 0) {
				$result = false;
			} else {
				if (!preg_match("/^[0-9]+$/", $user_id)) {
					$result = false;
				}
			}

			return $result;
			
		} catch (Exception $ex) {
			$err = "CheckC010->isIdForm で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

}