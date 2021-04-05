<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class DocumentComponent extends Component {
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * 最新書面取得<br>
	 * 指定された書面IDの最新版の情報を返す<br>
	 * @param string $fund_id $doc_id
	 * @return array $result
	 */
	function getLatestDocument($fund_id, $doc_id) {
		
		try {
			
			$status     = null;
			$conditions = null;

			// ◆絞込み条件◆
			// 書面ID
			$conditions[COLUMN_0400020] = $fund_id;
			$conditions[COLUMN_0400030] = $doc_id;

			// group by
			$status[MODEL_GROUP] = array(
				 COLUMN_0400020
				,COLUMN_0400030
			);

			// 集計項目
			$status[MODEL_FIELDS] = array(
				 COLUMN_0400020       ."  as ".COLUMN_0400020 // ファンドID
				,COLUMN_0400030       ."  as ".COLUMN_0400030 // 書面ID
				,"max(".COLUMN_0400050.") as ".COLUMN_0400050 // リビジョン
			);

			// データ取得
			$status[MODEL_CONDITIONS] = $conditions;
			$data = $this->Controller->MstDocument->find(MODEL_ALL, $status);

			$doc_data = null;
			foreach ($data as $keys => $values) {
				foreach ($values as $key => $value) {
					if (strcmp(0, $key) == 0) {
						$doc_data[COLUMN_0400050] = $value[COLUMN_0400050];
					}
					else {
						$doc_data[COLUMN_0400020] = $value[COLUMN_0400020];
						$doc_data[COLUMN_0400030] = $value[COLUMN_0400030];
					}
				}
			}

			// 書面情報取得
			$result = $this->getDocument($doc_data[COLUMN_0400020], $doc_data[COLUMN_0400030], $doc_data[COLUMN_0400050]);

			return $result;
			
		} catch (Exception $ex) {
			$err = "Document->getLatestDocument で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * 書面取得<br>
	 * 指定された書面ID、リビジョンの書面を返す。<br>
	 * @param string $fund_id $doc_id
	 * @param number $revision
	 * @param array $doc_data
	 */
	function getDocument($fund_id, $doc_id, $revision) {
		
		try {
			
			$status     = null;
			$conditions = null;

			// ◆絞込み条件◆
			$conditions[COLUMN_0400020] = $fund_id;
			$conditions[COLUMN_0400030] = $doc_id;
			$conditions[COLUMN_0400050] = $revision;

			$status[MODEL_CONDITIONS] = $conditions;

			// 検索結果が0件の場合戻り値にfalseを設定
			$doc_data = $this->Controller->MstDocument->find(MODEL_ALL, $status);

			return $doc_data;
			
		} catch (Exception $ex) {
			$err = "Document->getDocument で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * 投資家登録同意書面パス<br>
	 * 投資家登録時の必要なファイルのパスを生成する。<br>
	 * @param array $doc_data
	 * $param string $path
	 */
	function getRegistrationDocPath($doc_id) {
		
		try {
			
			$path = URL_SITE_TOP.REDIRECT_C060.'/'.REDIRECT_A060010
				.'?'.GET_PARAM_INDEX_FUND_ID .'='.REG_DOC_CAT_ID
				.'&'.GET_PARAM_INDEX_DOC_ID  .'='.$doc_id
				.'';


			return $path;
			
		} catch (Exception $ex) {
			$err = "Document->getRegistrationDocPath で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * 投資申請同意書面パス<br>
	 * 投資申請締結前のパスを生成する。<br>
	 * @param string $fund_id
	 * @param string $doc_id
	 * @return string $path
	 */
	function getInvestmentDocPath($fund_id, $doc_id) {
		
		try {
			
			$path = URL_SITE_TOP.REDIRECT_C060.'/'.REDIRECT_A060010
					.'?'.GET_PARAM_INDEX_FUND_ID  .'='.$fund_id
					.'&'.GET_PARAM_INDEX_DOC_ID   .'='.$doc_id;
			
			return $path;
			
		} catch (Exception $ex) {
			$err = "Document->getInvestmentDocPath で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

        //投資申込書面リンクの変更 20191226同意書面のファイルパス変更（意味ないかも）
        function getInvestmentDocPathFund($fund_id, $doc_id) {

                try {

                        $path = URL_PROJECTS_PAGE.$fund_id.'/'.'template'.'/00001'.$doc_id.'.pdf';
                                        //.'?'.GET_PARAM_INDEX_FUND_ID  .'='.$fund_id
                                        //.'&'.GET_PARAM_INDEX_DOC_ID   .'='.$doc_id;

                        return $path;

                } catch (Exception $ex) {
                        $err = "Document->getInvestmentDocPathFund で例外発生<br>";
                        throw new Exception($err.$ex->getMessage()."<br>");
                }
        }
	
	/**
	 * 書面パス取得<br>
	 * @param string $fund_id
	 * @param string $doc_id
	 * @param string $revision
	 * @param string $doc_param
	 * @return string $path
	 */
	function getDocumentPath($fund_id, $doc_id, $revision, $doc_param) {
		try {
			
			// パス生成
			$path = URL_SITE_TOP.REDIRECT_C060.'/'.REDIRECT_A060010
					.'?'.GET_PARAM_INDEX_FUND_ID   .'='.$fund_id
					.'&'.GET_PARAM_INDEX_DOC_ID    .'='.$doc_id
					.'&'.GET_PARAM_INDEX_REVISION  .'='.$revision;
			
			if (!is_null($doc_param) && strcmp("", $doc_param) != 0) {
				$path .= '&'.GET_PARAM_INDEX_DOC_PARAM .'='.$doc_param;
			}

			return $path;
			
		} catch (Exception $ex) {
			$err = "Document->getDocumentPath で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 投資家登録時書面データ取得<br>
	 * 投資家登録時に同意する書面のデータを取得する。<br>
	 * @return array $data
	 */
	function getRegistrationDocuments() {
		try {
			$data = $this->Controller->MstDocument->getRegistrationDocuments();
			return $data;
		} catch (Exception $ex) {
			$err = "Document->getRegistrationDocuments で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * 投資申込締結前書面データ取得<br>
	 * 投資申込時に同意する書面のデータを取得する。<br>
	 * @return array $data
	 */
	function getInvestmentDocuments1() {
		try {
			$data = $this->Controller->MstDocument->getInvestmentDocuments1();
			return $data;
		} catch (Exception $ex) {
			$err = "Document->getInvestmentDocuments1 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 投資申込締結時書面データ取得<br>
	 * 投資申込時に同意する書面のデータを取得する。<br>
	 * @return array $data
	 */
	function getInvestmentDocuments2() {
		try {
			$data = $this->Controller->MstDocument->getInvestmentDocuments2();
			return $data;
		} catch (Exception $ex) {
			$err = "Document->getInvestmentDocuments2 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	

        function getInvestmentDocuments7() {
                try {
                        $data = $this->Controller->MstDocument->getInvestmentDocuments7();
                        return $data;
                } catch (Exception $ex) {
                        $err = "Document->getInvestmentDocuments7 で例外発生<br>";
                        throw new Exception($err.$ex->getMessage()."<br>");
                }
        }


	/**
	 * 運用報告書データ取得<br>
	 * $doc_idで指定された報告書のデータを取得する。<br>
	 * @return array $data
	 */
	function getOperatingReportDocument() {
		try {
			$id_list = array(INV_DOC_ID_00004);
			$data = $this->Controller->MstDocument->getLatestDocument(INV_DOC_CAT_ID, $id_list);
			return $data;
		} catch (Exception $ex) {
			$err = "Document->getOperatingReportDocument で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 取引残高報告書データ取得<br>
	 * $doc_idで指定された報告書のデータを取得する。<br>
	 * @return array $doc_data
	 */
	function getTradeBalanceReportDocument() {
		try {
			
			$doc_data = null;
			
			$id_list = array(INV_DOC_ID_00005);
			$data_list = $this->Controller->MstDocument->getLatestDocument(INV_DOC_CAT_ID, $id_list);
			
			foreach ($data_list as $keys => $values) {
				foreach ($values as $key => $value) {
					$doc_data = $value;
				}
			}
			
			return $doc_data;
		} catch (Exception $ex) {
			$err = "Document->getTradeBalanceReportDocument で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 取引残高報告書書面パス(管理者確認用) <br>
	 * 取引残高報告書交付前の確認用のPDFパスを生成する。<br>
	 * $param string $path
	 */
	function getTradeBalanceReportPathAdmin() {
		
		try {
			
			// パス生成
			$path = URL_SITE_TOP.REDIRECT_C060."/".REDIRECT_A060010
					."?".GET_PARAM_INDEX_FUND_ID ."=".INV_DOC_CAT_ID
					."&".GET_PARAM_INDEX_DOC_ID  ."=".INV_DOC_ID_00005
					."";

			return $path;
			
		} catch (Exception $ex) {
			$err = "Document->getTradeBalanceReportPathAdmin で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * 年間取引報告書データ取得<br>
	 * $doc_idで指定された報告書のデータを取得する。<br>
	 * @return array $doc_data
	 */
	function getAnnualTradeReportDocument() {
		try {
			
			$doc_data = null;
			
			$id_list = array(INV_DOC_ID_00006);
			$data_list = $this->Controller->MstDocument->getLatestDocument(INV_DOC_CAT_ID, $id_list);
			
			foreach ($data_list as $keys => $values) {
				foreach ($values as $key => $value) {
					$doc_data = $value;
				}
			}
			
			return $doc_data;
		} catch (Exception $ex) {
			$err = "Document->getAnnualTradeReportDocument で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
}
