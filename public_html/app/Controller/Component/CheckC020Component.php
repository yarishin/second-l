<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class CheckC020Component extends Component {
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * 仮登録時入力チェック
	 * @param array $input
	 * @return boolean $result
	 */
	function v010($input) {
		
		try {
			
			// 入力データ受取
			$data[COLUMN_0800020] = $input[OBJECT_ID_020010010];
			$data[COLUMN_0800030] = $input[OBJECT_ID_020010030];

			$this->Controller->MstUser->set($data);

			// 無効化するルールを指定
			//unset($this->MstUser->validate[OBJECT_ID_020010010]);

			// チェック実行
			return $this->Controller->MstUser->validates();
			
		} catch (Exception $ex) {
			$err = "CheckC020->v010 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}

}