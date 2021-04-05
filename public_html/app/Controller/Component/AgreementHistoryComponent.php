<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class AgreementHistoryComponent extends Component {
	
	// 他のコンポーネントを使えるようにする。
	public $components = array(
		 "Common"
		,"Document"
	);
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * 同意履歴取得<br>
	 * @param string $user_id $date_from $date_to
	 * @return array $agreements
	 */
	function getAgreementHistory($user_id, $date_from, $date_to) {
		
		try {
			
			$agreements = array();
			
			$status     = null;
			$conditions = null;
			$order      = null;

			// ◆絞込み条件◆
			// ユーザID
			$conditions[COLUMN_0900020] = $user_id;
			if (!is_null($date_from) && strcmp("", $date_from) != 0) {
				$conditions[COLUMN_0900090." >="] = date(DATETIME_FORMAT_1, strtotime($date_from));
			}
			if (!is_null($date_to) && strcmp("", $date_to) != 0) {
				$conditions[COLUMN_0900090." <="] = date(DATETIME_FORMAT_2, strtotime($date_to));
			}

			// ◆ソート◆
			$order[COLUMN_0900090] = MODEL_DESC;
			$order[COLUMN_0900050] = MODEL_DESC;

			$status[MODEL_CONDITIONS] = $conditions;
			$status[MODEL_ORDER]      = $order;

			// 検索結果が0件の場合戻り値にfalseを設定
			$data_list = $this->Controller->TrnAgreementHistory->find(MODEL_ALL, $status);
			foreach ($data_list as $keys => $values) {
				foreach ($values as $key => $value) {
					$agreements[] = $value;
				}
			}

			return $agreements;
			
		} catch (Exception $ex) {
			$err = "AgreementHistory->getAgreementHistory で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}


        /**
         * 同意履歴取得<br>
         * @param string $user_id
         * @return array $agreements
         * 同意履歴00003と00007の同意日時取得
         */
        function getAgreementHistorymy($user_id) {

                try {

                        $agreements = array();

                        $status     = null;
                        $conditions = null;
                        $order      = null;
                        $params     = array('00003','00007');
                        // ◆絞込み条件◆
                        // ユーザID
                        $conditions[COLUMN_0900020] = $user_id;
                        $conditions[COLUMN_0900100] = '3'; //同意内容
                        $conditions[COLUMN_0900050] = $params; //書面ID（doc_id）
                        // ◆ソート◆
                        $order[COLUMN_0900090] = MODEL_DESC;
                        $order[COLUMN_0900050] = MODEL_DESC;

                        $status[MODEL_CONDITIONS] = $conditions;
                        $status[MODEL_ORDER]      = $order;

                        // 検索結果が0件の場合戻り値にfalseを設定
                        $data_list = $this->Controller->TrnAgreementHistory->find(MODEL_ALL, $status);
                        foreach ($data_list as $keys => $values) {
                                foreach ($values as $key => $value) {
                                        $agreements[] = $value;
                                }
                        }

                        return $agreements;

                } catch (Exception $ex) {
                        $err = "AgreementHistory->getAgreementHistorymy で例外発生<br>";
                        throw new Exception($err.$ex->getMessage()."<br>");
                }

        }


	
	/**
	 * 同意履歴登録<br>
	 * @param array $data
	 * @return boolean $result
	 */
	function saveAgreementHistory($data) {
		
		try {
			
			$conditions = null;

			// ユーザID
			if (isset($data[COLUMN_0900020])) {
				$conditions[COLUMN_0900020] = $data[COLUMN_0900020];
			}
			// ファンドID
			if (isset($data[COLUMN_0900030])) {
				$conditions[COLUMN_0900030] = $data[COLUMN_0900030];
			}
			// ファンド名
			if (isset($data[COLUMN_0900040])) {
				$conditions[COLUMN_0900040] = $data[COLUMN_0900040];
			}
			// 書面ID
			if (isset($data[COLUMN_0900050])) {
				$conditions[COLUMN_0900050] = $data[COLUMN_0900050];
			}
			// 書面名
			if (isset($data[COLUMN_0900060])) {
				$conditions[COLUMN_0900060] = $data[COLUMN_0900060];
			}
			// 書面パス
			if (isset($data[COLUMN_0900070])) {
				$conditions[COLUMN_0900070] = $data[COLUMN_0900070];
			}
			// リビジョン
			if (isset($data[COLUMN_0900080])) {
				$conditions[COLUMN_0900080] = $data[COLUMN_0900080];
			}
			// 同意日時
			if (isset($data[COLUMN_0900090])) {
				$conditions[COLUMN_0900090] = $data[COLUMN_0900090];
			}
			// 同意内容
			if (isset($data[COLUMN_0900100])) {
				$conditions[COLUMN_0900100] = $data[COLUMN_0900100];
			}

			$this->Controller->TrnAgreementHistory->create();
			$result = $this->Controller->TrnAgreementHistory->save($conditions);

			return $result;
			
		} catch (Exception $ex) {
			$err = "AgreementHistory->saveAgreementHistory で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	
}
