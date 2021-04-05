<?php
App::uses('AppModel', 'Model');
 
class MstAdmin extends AppModel {
	
	public $primaryKey = 'admin_id';
	
	public $validate = array(
		
		// 管理者ID
		COLUMN_0100010 => array(
			'custom01' => array(
				'rule'    => 'chkNotEmpty',
				'message' => 'IDとパスワードを入力して下さい。'
			),
			'custom02' => array(
				'rule'    => 'chkExistenceUserIdPass',
				'message' => 'IDかパスワードが違います。'
			)
		)
	);

	
	/**
	 * IDとパスワードの必須チェック<br>
	 * IDとパスワードが両方入力されていれば true
	 * @return boolean
	 */
	public function chkNotEmpty() {
		if (strcmp("", $this->data[MODEL_NAME_010][COLUMN_0100010]) != 0
				&& strcmp("", $this->data[MODEL_NAME_010][COLUMN_0100030]) != 0) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * IDとパスワードの組み合わせチェック<br>
	 * IDとパスワードの組み合わせが正しければ true
	 * @return boolean
	 */
	public function chkExistenceUserIdPass() {
		$conditions = array(
			COLUMN_0100010 => $this->data[MODEL_NAME_010][COLUMN_0100010],
			COLUMN_0100030 => $this->data[MODEL_NAME_010][COLUMN_0100030]
		);
		$count = $this->find(MODEL_COUNT, array(
			MODEL_CONDITIONS => $conditions
		));
		
		return $count > 0;
	}
	
    /**
	 * 管理者情報取得<br>
	 * 指定した管理者IDの管理者情報を取得する。
	 * @param string $admin_id
	 * @return array $data
	 */
	public function getAdmin($admin_id) {
		
		$sql = ""
				."select "
				."    * "
				."from "
				."    mst_admins "
				."where 1 "
				."  and admin_id = :admin_id "
				.";";
		
		$params = array(
			"admin_id" => $admin_id
		);
		
		$data = $this->query($sql, $params);
		
		return $data;
		
	}

	
	
}
