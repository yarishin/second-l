<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');
require_once("CommonTag.php");

class CompanyComponent extends Component {
	
//	// 他のコンポーネントを使えるようにする。
//	public $components = array(
//		 "SessionUserInfo"
//		,"Calendar"
//		,"User"
//		,"Session"
//	);

	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * 会社情報を取り得
	 * @return array $company_data
	 */
	public function getCompany() {

		try {
			
			// パラメータ設定
			$conditions[COLUMN_0300010] = COMPANY_ID;

			// ワークデータ取得
			$status[MODEL_CONDITIONS] = $conditions;
			$data = $this->Controller->MstCompany->find(MODEL_ALL, $status);

			return $data[0][MODEL_NAME_030];
			
		} catch (Exception $ex) {
			$err = "Company->getCompany で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
}