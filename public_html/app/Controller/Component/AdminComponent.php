<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class AdminComponent extends Component {
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * 管理者情報取得
	 * @param string $admin_id
	 * @return array $data
	 */
	function getMstAdmin($admin_id) {
		
		try {
			
			// パラメータ設定
			$conditions[COLUMN_0100010] = $admin_id;

			// ワークデータ取得
			$status[MODEL_CONDITIONS] = $conditions;
			$data = $this->Controller->MstAdmin->find(MODEL_ALL, $status);

			return $data;
			
		} catch (Exception $ex) {
			$err = "Admin->getMstAdmin で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}

}