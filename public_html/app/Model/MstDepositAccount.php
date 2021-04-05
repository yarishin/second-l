<?php
App::uses('AppModel', 'Model');
 
class MstDepositAccount extends AppModel {
	public $primaryKey = 'id';
	
	public $validate = array(
		// 投資家ID
		COLUMN_2900150 => array(
			'custom01' => array(
				'rule'    => 'chkNotEmpty',
				'message' => '投資家IDを入力して下さい。'
			)
		)
	);

    /**
	 * 入金口座情報取得<br>
	 * 指定した投資家IDの入金口座情報を取得する。
	 * @param string $user_id
	 * @return array $data
	 */
	public function getDepositAccount($user_id) {
            $sql = ""
		."select "
		."    * "
		."from "
		."    mst_deposit_accounts "
		."where 1 "
		."  and user_id = :user_id "
		.";";
		
		$params = array(
			"mst_user_id" => $user_id
		);
		
		$data = $this->query($sql, $params);
		
		return $data;	
	}	
}
