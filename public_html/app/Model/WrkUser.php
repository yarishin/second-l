<?php
App::uses('AppModel', 'Model');
 
class WrkUser extends AppModel {
	
	public $primaryKey = 'admin_id';
	
    /**
	 * ユーザワーク作成<br>
	 * ユーザマスタのデータをコピーしてユーザワークを作成する。
	 * @param string $admin_id $user_id
	 * @return array $data
	 */
	public function copyMstUser($admin_id, $user_id) {
		
		// カラム取得
		$sql = "show columns from mst_users;";
		$columns = $this->query($sql);
		
		$sql = ""
			."insert into "
			."    wrk_users "
			."select "
			."    :admin_id as admin_id "
			."";
		
		// カラム書き出し
		foreach ($columns as $keys => $values) {
			foreach ($values as $key => $value) {
				$sql .= ",".$value[SHOW_COLUMN_FIELD]." ";
			}
		}
		
		$sql .= ""
			."from "
			."    mst_users "
			."where 1 "
			."    and user_id = :user_id "
			.";";
		
		$params = array(
			 "admin_id" => $admin_id
			,"user_id"  => $user_id
		);
		
		$data = $this->query($sql, $params);
		
		return $data;
		
	}
	
	
}
