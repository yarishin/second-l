<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class InfoAttachmentComponent extends Component {
	
	public $components = array(
		"Document"
	);
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * お知らせ添付書面取得
	 * @param  string $user_id $info_id
	 * @return array $data
	 */
	function getInfoAttachment($user_id, $info_id) {
		
		try {
			
			$status     = null;
			$conditions = null;
			$order      = null;

			// ユーザID
			//$conditions[COLUMN_1100020] = $user_id;
			$conditions[COLUMN_1150020] = $user_id;
			$conditions[COLUMN_1150030] = $info_id;

			$status[MODEL_CONDITIONS] = $conditions;

			// 検索結果が0件の場合戻り値にfalseを設定
			$data = $this->Controller->TrnInfoAttachment->find(MODEL_ALL, $status);

			return $data;
			
		} catch (Exception $ex) {
			$err = "InfoAttachment->getInfoAttachment で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * お知らせ添付書面登録<br>
	 * お知らせ添付書面を登録する。<br>
	 * @param array $data
	 */
	function saveInfoAttachment($data) {
		
		try {
			
			$conditions = null;

			// ユーザID
			if (isset($data[COLUMN_1150020])) {
				$conditions[COLUMN_1150020] = $data[COLUMN_1150020];
			}
			// お知らせ番号
			if (isset($data[COLUMN_1150030])) {
				$conditions[COLUMN_1150030] = $data[COLUMN_1150030];
			}
			// ファンドID
			if (isset($data[COLUMN_1150040])) {
				$conditions[COLUMN_1150040] = $data[COLUMN_1150040];
			}
			// 書面ID
			if (isset($data[COLUMN_1150050])) {
				$conditions[COLUMN_1150050] = $data[COLUMN_1150050];
			}
			// 書面名
			if (isset($data[COLUMN_1150060])) {
				$conditions[COLUMN_1150060] = $data[COLUMN_1150060];
			}
			// リビジョン
			if (isset($data[COLUMN_1150070])) {
				$conditions[COLUMN_1150070] = $data[COLUMN_1150070];
			}

			$result = $this->Controller->TrnInfoAttachment->save($conditions);

			return $result;
			
		} catch (Exception $ex) {
			$err = "InfoAttachment->saveInfoAttachment で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	

}