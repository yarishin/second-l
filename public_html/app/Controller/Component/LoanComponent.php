<?php
App::uses('Component', 'Controller');

class LoanComponent extends Component {
	
	// 他のコンポーネントを使えるようにする。
	public $components = array(
	);
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/*
	 * 完済の金額
	 * @return array $amount
	 */
	function getLoanAmount() {
		try {
            $sql = "SELECT SUM(loan_amount) AS amount FROM mst_loans";
			// データ取得
			$data = $this->Controller->MstLoan->query($sql);

            $amount = $data[0][0]['amount'] ?: 0;

			return $amount;
			
		} catch (Exception $ex) {
			$err = "Fund->getLoanAmount で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	/*
	 * 完済の案件数
	 * @return array $count
	 */
	function getLoanCount() {
		try {
            $sql = "SELECT COUNT(*) AS count FROM mst_loans WHERE loan_amount != 0";
			// データ取得
			$data = $this->Controller->MstLoan->query($sql);

            $count = $data[0][0]['count'];

			return $count;
			
		} catch (Exception $ex) {
			$err = "Fund->getLoanCount で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
}