<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'tcpdf', array('file' => 'tcpdf/tcpdf.php'));
App::import('Vendor', 'fpdi', array('file' => 'tcpdf/fpdi.php'));

class C990ViewTestController extends AppController {
	
	public $uses       = array(
		 "MstAdmin"
		,"MstCalendar"
		,"MstCompany"
		,"MstDocument"
		,"MstFund"
		,"MstInformation"
		,"MstLoan"
		,"MstUser"
		,"MstZip"
		,"Transaction"
		,"TrnAgreementHistory"
		,"TrnDividendHistory"
		,"TrnInfoAttachment"
		,"TrnInformationHistory"
		,"TrnInvestmentHistory"
		,"TrnLoanRepayment"
		,"TrnOperatingReport"
		,"TrnOperatingReportLoan"
		,"TrnRewardHistory"
		,"TrnSecondOperatingReport"
		,"TrnTradeBalanceReport"
		,"WrkDividend"
		,"WrkFund"
		,"WrkFundRepayment"
		,"WrkLoan"
		,"WrkLoanRepayment"
		,"WrkUser"
	);
	
	public $components = array(
		 "Admin"
		,"AgreementHistory"
		,"Calendar"
		,"CheckC030"
		,"Common"
		,"Company"
		,"DividendHistory"
		,"Document"
		,"DummyData"
		,"Fund"
		,"InformationHistory"
		,"InvestmentHistory"
		,"LoanRepayment"
		,"Mail"
		,"OperatingReport"
		,"Pdf"
		,"SessionUserInfo"
		,"SessionAdminInfo"
		,"TradeBalanceReport"
		,"User"
	);

	function index() {
		
		$this->layout = LAYOUT_NAME_001;
		$this->set("title_for_layout" , "Trust Finance Crowd Funding");
		$this->set("header_for_layout", "Crowd Funding Test");
		$this->set("footer_for_layout", "Crowd Funding Test");
		
		try {
			
			//$user_list = $this->User->getAnnualTradeReportReceiveUser(2016);
			
			if (isset($this->data[HIDDEN_ID_000000010])) {
				
				$event_id       = $this->data[HIDDEN_ID_000000010];
				$redirect_param = array(
					 REDIRECT_C => $this->data[OBJECT_ID_990000010]
					,REDIRECT_A => $this->data[OBJECT_ID_990000020]
				);

				// イベントID格納
				$this->Common->setSessionEventId($event_id);

				// リダイレクト実行
				$this->redirect($redirect_param);
			}
			
			// ディレクトリのパスを記述
			//$user_id = $this->Common->getSessionUserId();
			$user_id = "999999990";
			$dir = TEMPLATE_PDF_DIR_2.$user_id."/" ;

			// ディレクトリの存在を確認し、ハンドルを取得
			$file_list = array();
			if( is_dir( $dir ) && $handle = opendir( $dir ) ) {
				// ループ処理
				while( ($file = readdir($handle)) !== false ) {
					// ファイルのみ取得
					if( filetype( $path = $dir . $file ) == "file" ) {
						// 各ファイルへの処理
						$file_list[] = $file;
					}
				}
			}

			$this->set("file_list", $file_list);
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {
			// 例外処理
			$err_str = "C990ViewTest/index で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	
	/**
	 * PDF出力テスト
	 */
	function showpdf() {
		
		try {
			
//			$fund_id  = $this->params["url"][GET_PARAM_INDEX_FUND_ID];
//			$doc_id   = $this->params["url"][GET_PARAM_INDEX_DOC_ID];
//			$revision = $this->params["url"][GET_PARAM_INDEX_REVISION];

			//$this->Pdf->editToNewPdf00005("31553385");
			
//			$pdf_param[ARRAY_INDEX_DOC_CAT_ID]   = "00003";
//			$pdf_param[ARRAY_INDEX_DOC_ID]       = "00006";
//			$pdf_param[ARRAY_INDEX_DOC_REV]      = "1.00";
//			$pdf_param[ARRAY_INDEX_USER_ID]      = "31553385";
//			//$pdf_param[ARRAY_INDEX_USER_ID]      = "99999999";
//			$pdf_param[ARRAY_INDEX_REPORT_MONTH] = "201510";
//			//$pdf_param[ARRAY_INDEX_INFORMATION]  = "お客様へのお知らせ。";
//			$pdf_param[ARRAY_INDEX_PDF_NAME]     = "00001_00004_1_00.pdf";
//			
//			$this->Pdf->editPdf00004($pdf_param);
			//$this->Pdf->editPdf00005($pdf_param);
			//$this->Pdf->editPdf00006($pdf_param);
			
			$file_name = "00000_00001.pdf";
			$template  = "../files/";
			$user_id   = "00000001";
			
			//インスタンス生成
			$pdf = new FPDI();
			$pdf->setPrintHeader( false );
			$pdf->setPrintFooter( false );
			$page_count = $pdf->setSourceFile("../files/00000_00001.pdf"); //テンプレート指定

//			//テンプレートを変更
//			$templateId = $pdf->importPage(1);
//			$pdf->AddPage();
//			$pdf->useTemplate($templateId);
				
			for ($loop = 1; $loop <= $page_count; $loop++) {

				//テンプレートを変更
				$templateId = $pdf->importPage($loop);
				$pdf->AddPage();
				$pdf->useTemplate($templateId);
			}
			
			if (!file_exists($template.$user_id)) {
				if (!mkdir($template.$user_id, 0777)) {
					throw new Exception();
				}
			}

			//出力 Dでダウンロード
			$pdf->Output('../files/00000001/00000_00001.pdf', 'F');
			$pdf->Output('00000_00001.pdf', 'I');
			
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (NotFoundException $ex) {
			throw new NotFoundException();
		} catch (Exception $ex) {
			// 例外処理
			$err_str = "C990ViewTest/showPdf で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}

	/**
	 * PDF作成
	 */
	function makepdf() {
		
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "Trust Finance Social Lending");
		$this->set("header_for_layout", "Social Lending Test");
		$this->set("footer_for_layout", "Social Lending Test");
		
		try {
			
			ini_set('memory_limit', '2G');
			
			$event_id = $this->Common->getSessionEventId();
			
			$start_memory = memory_get_usage();
			$start = date(DATETIME_FORMAT);
			
			$result = array();
			
			switch ($event_id) {
				
				case EVENT_ID_990000010: // 登録時書面
					
					$conditions = array();
					$status     = array();
					
					$conditions[COLUMN_0800560." >= "] = 1; 
					$status[MODEL_CONDITIONS]         = $conditions;
					
					$user_data = $this->MstUser->find(MODEL_ALL, $status);
					foreach ($user_data as $keys => $values) {
						foreach ($values as $key => $value) {
							$this->Pdf->savePdfLenderReg($value[COLUMN_0800010]);
						}
						unset($values);
					}
					unset($user_data);
					
					break;
				case EVENT_ID_990000030: // 契約前書面
					
					$conditions = array();
					$status     = array();
					
//					$conditions[COLUMN_0900020]       = USER_ID_00000001;
					$conditions[COLUMN_0900030." !="] = '00000';
					$conditions[COLUMN_0900050]       = array(INV_DOC_ID_00001,INV_DOC_ID_00002);
					$status[MODEL_CONDITIONS]         = $conditions;
					
					$agree = $this->TrnAgreementHistory->find(MODEL_ALL, $status);
					
					$count = 0;
					foreach ($agree as $keys => $values) {
						foreach ($values as $key => $value) {
							
							$user_id   = $value[COLUMN_0900020];
							$fund_id   = $value[COLUMN_0900030];
							$doc_id    = $value[COLUMN_0900050];
							$doc_param = $value[COLUMN_0900070];
							
							$this->Pdf->savePdfInvBf($user_id, $fund_id, $doc_param);
						}
						unset($values);
					}
					unset($agree);
					
					break;
				case EVENT_ID_990000040: // 契約時書面
					
					$conditions = array();
					$status     = array();
					
//					$conditions[COLUMN_1200020] = USER_ID_00000001;
					$conditions[MODEL_NOT]      = array(COLUMN_1200100 => null);
					
					$status[MODEL_CONDITIONS] = $conditions;
					
					$data = $this->TrnInvestmentHistory->find(MODEL_ALL, $status);
					
					$doc_id = INV_DOC_ID_00003;
					$revision       = "01";
					foreach ($data as $keys => $values) {
						foreach ($values as $key => $value) {
							
							$user_id       = $value[COLUMN_1200020];
							$user_name     = $value[COLUMN_1200030];
							$fund_id       = $value[COLUMN_1200040];
							$appl_datetime = $value[COLUMN_1200060];
							
							$this->Pdf->savePdfInvAf($user_id, $fund_id, $appl_datetime);
							
						}
						unset($values);
					}
					unset($data);
					
					break;
				case EVENT_ID_990000050: // 運用報告書
					
					$conditions = array();
					$status     = array();
					
					//$conditions[COLUMN_1150020]       = USER_ID_00000001;
					$conditions[COLUMN_1150040." !="] = '00000';
//					$conditions[COLUMN_1150040]       = '00006';
					$conditions[COLUMN_1150050]       = INV_DOC_ID_00004;
					
					$status[MODEL_CONDITIONS] = $conditions;
					
					$data = $this->TrnInfoAttachment->find(MODEL_ALL, $status);
					
					foreach ($data as $keys => $values) {
						foreach ($values as $key => $value) {
							
							$user_id   = $value[COLUMN_1150020];
							$fund_id   = $value[COLUMN_1150040];
							$doc_id    = $value[COLUMN_1150050];
							$revision  = $value[COLUMN_1150070];
							$doc_param = $value[COLUMN_1150080];
					
							$pdf_param = array();
							$pdf_param[ARRAY_INDEX_USER_ID]      = $user_id;
							$pdf_param[ARRAY_INDEX_DOC_CAT_ID]   = $fund_id;
							$pdf_param[ARRAY_INDEX_DOC_REV]      = $revision;
							$pdf_param[ARRAY_INDEX_REPORT_MONTH] = $doc_param;

							$this->Pdf->savePdf00004($pdf_param);
						}
						unset($values);
					}
					unset($data);
					
					break;
				case EVENT_ID_990000060: // 取引残高報告書
					
					$conditions = array();
					$status     = array();
					
//					$conditions[COLUMN_1150020]       = USER_ID_00000001;
					$conditions[COLUMN_1150040." !="] = '00000';
					$conditions[COLUMN_1150050]       = INV_DOC_ID_00005;
					
					$status[MODEL_CONDITIONS] = $conditions;
					
					$data = $this->TrnInfoAttachment->find(MODEL_ALL, $status);
					
					foreach ($data as $keys => $values) {
						foreach ($values as $key => $value) {
							
							$user_id = $value[COLUMN_1150020];
							$fund_id = $value[COLUMN_1150040];
							$doc_id  = $value[COLUMN_1150050];
							$revision = $value[COLUMN_1150070];
							$doc_param = $value[COLUMN_1150080];
					
							$pdf_param = array();
							$pdf_param[ARRAY_INDEX_USER_ID]      = $user_id;
							$pdf_param[ARRAY_INDEX_DOC_CAT_ID]   = $fund_id;
							$pdf_param[ARRAY_INDEX_REPORT_MONTH] = $doc_param;
							$pdf_param[ARRAY_INDEX_DOC_REV]      = $revision;
							
							$this->Pdf->savePdf00005($pdf_param);
						}
						unset($values);
					}
					unset($data);
					
					break;
				case EVENT_ID_990000070: // 全種類
					
					// ◆投資家登録時書面5種◆
					
					$conditions = array();
					$status     = array();
					
					$conditions[COLUMN_0800560." >= "] = 1; 
					$status[MODEL_CONDITIONS]         = $conditions;
					
					$user_data = $this->MstUser->find(MODEL_ALL, $status);
					foreach ($user_data as $keys => $values) {
						foreach ($values as $key => $value) {
							$this->Pdf->savePdfLenderReg($value[COLUMN_0800010]);
						}
						unset($values);
					}
					unset($user_dsata);
					
					$memory = memory_get_usage() - $start_memory;
					$result[] = "投資家登録 memory : ".(floor((string)($memory / (1024 * 1024))))." MB";
					
					// ◆契約前書面2種◆
					
					$conditions = array();
					$status     = array();
					
//					$conditions[COLUMN_0900020]       = USER_ID_00000001;
					$conditions[COLUMN_0900030." !="] = '00000';
					$conditions[COLUMN_0900050]       = array(INV_DOC_ID_00001,INV_DOC_ID_00002);
					$status[MODEL_CONDITIONS]         = $conditions;
					
					$agree = $this->TrnAgreementHistory->find(MODEL_ALL, $status);
					
					$count = 0;
					foreach ($agree as $keys => $values) {
						foreach ($values as $key => $value) {
							
							$user_id   = $value[COLUMN_0900020];
							$fund_id   = $value[COLUMN_0900030];
							$doc_id    = $value[COLUMN_0900050];
							$doc_param = $value[COLUMN_0900070];
							
							$this->Pdf->savePdfInvBf($user_id, $fund_id, $doc_param);
						}
						unset($values);
					}
					unset($agree);
					
					$memory = memory_get_usage() - $memory;
					$result[] = "契約前書面 memory : ".(floor((string)($memory / (1024 * 1024))))." MB";
					
					// ◆契約時書面◆
					
					$conditions = array();
					$status     = array();
					
//					$conditions[COLUMN_1200020] = USER_ID_00000001;
					$conditions[MODEL_NOT]      = array(COLUMN_1200100 => null);
					
					$status[MODEL_CONDITIONS] = $conditions;
					
					$data = $this->TrnInvestmentHistory->find(MODEL_ALL, $status);
					
					$doc_id = INV_DOC_ID_00003;
					$revision       = "01";
					foreach ($data as $keys => $values) {
						foreach ($values as $key => $value) {
							
							$user_id       = $value[COLUMN_1200020];
							$user_name     = $value[COLUMN_1200030];
							$fund_id       = $value[COLUMN_1200040];
							$appl_datetime = $value[COLUMN_1200060];
							
							$this->Pdf->savePdfInvAf($user_id, $fund_id, $appl_datetime);
							
						}
						unset($values);
					}
					unset($data);
					
					$memory = memory_get_usage() - $memory;
					$result[] = "契約時書面 memory : ".(floor((string)($memory / (1024 * 1024))))." MB";
					
					// ◆運用報告書◆
					
					$conditions = array();
					$status     = array();
					
//					$conditions[COLUMN_1150020]       = USER_ID_00000001;
					$conditions[COLUMN_1150040." !="] = '00000';
//					$conditions[COLUMN_1150040]       = '00006';
					$conditions[COLUMN_1150050]       = INV_DOC_ID_00004;
					
					$status[MODEL_CONDITIONS] = $conditions;
					
					$data = $this->TrnInfoAttachment->find(MODEL_ALL, $status);
					
					foreach ($data as $keys => $values) {
						foreach ($values as $key => $value) {
							
							$user_id   = $value[COLUMN_1150020];
							$fund_id   = $value[COLUMN_1150040];
							$doc_id    = $value[COLUMN_1150050];
							$revision  = $value[COLUMN_1150070];
							$doc_param = $value[COLUMN_1150080];
					
							$pdf_param = array();
							$pdf_param[ARRAY_INDEX_USER_ID]      = $user_id;
							$pdf_param[ARRAY_INDEX_DOC_CAT_ID]   = $fund_id;
							$pdf_param[ARRAY_INDEX_DOC_REV]      = $revision;
							$pdf_param[ARRAY_INDEX_REPORT_MONTH] = $doc_param;

							$this->Pdf->savePdf00004($pdf_param);
						}
						unset($values);
					}
					unset($data);
					
					$memory = memory_get_usage() - $memory;
					$result[] = "運用報告書 memory : ".(floor((string)($memory / (1024 * 1024))))." MB";
					
					// ◆取引残高報告書◆
					
					$conditions = array();
					$status     = array();
					
					$conditions[COLUMN_1150020]       = USER_ID_00000001;
					$conditions[COLUMN_1150040." !="] = '00000';
					$conditions[COLUMN_1150050]       = INV_DOC_ID_00005;
					
					$status[MODEL_CONDITIONS] = $conditions;
					
					$data = $this->TrnInfoAttachment->find(MODEL_ALL, $status);
					
					foreach ($data as $keys => $values) {
						foreach ($values as $key => $value) {
							
							$user_id = $value[COLUMN_1150020];
							$fund_id = $value[COLUMN_1150040];
							$doc_id  = $value[COLUMN_1150050];
							$revision = $value[COLUMN_1150070];
							$doc_param = $value[COLUMN_1150080];
					
							$pdf_param = array();
							$pdf_param[ARRAY_INDEX_USER_ID]      = $user_id;
							$pdf_param[ARRAY_INDEX_DOC_CAT_ID]   = $fund_id;
							$pdf_param[ARRAY_INDEX_REPORT_MONTH] = $doc_param;
							$pdf_param[ARRAY_INDEX_DOC_REV]      = $revision;
							
							$this->Pdf->savePdf00005($pdf_param);
						}
						unset($values);
					}
					unset($data);
					
					$memory = memory_get_usage() - $memory;
					$result[] = "取残報告書 memory : ".(floor((string)($memory / (1024 * 1024))))." MB";
					
					$end_memory = memory_get_usage();
					$result[] = "start memory : ".(floor((string)($start_memory / (1024 * 1024))))." MB";
					$result[] = "end memory : ".(floor((string)($end_memory / (1024 * 1024))))." MB";
					$result[] = number_format(floor((string)(($end_memory - $start_memory) / (1024 * 1024))))." MB";

					$end = date(DATETIME_FORMAT);

					$diff = strtotime($end) - strtotime($start);

					$result[] = "seconde : ".$diff;
					$result[] = date(TIME_FORMAT, $diff + 54000);

					$this->Session->write("result", $result);
					
					$this->Common->redirectCommon("c990_view_test", "makepdfcomplete");
			
					break;
					
				default :
			}
			
			$this->Common->deleteSessionEventId();
			
			$this->set("action", $this->Common->getCurrentAction());
			
			
		} catch (NotFoundException $ex) {
			throw new NotFoundException();
		} catch (Exception $ex) {
			
			$this->Common->deleteSessionEventId();
			
			// 例外処理
			$err_str = "C990ViewTest/makepdf で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	
	function makepdfcomplete() {
		
		$this->layout = LAYOUT_NAME_002;
		$this->set("title_for_layout" , "Trust Finance Social Lending");
		$this->set("header_for_layout", "Social Lending Test");
		$this->set("footer_for_layout", "Social Lending Test");
		
		try {
			
			$data = $this->Session->read("result");
			$this->set("result", $data);
			$this->set("action", $this->Common->getCurrentAction());
			
		} catch (Exception $ex) {

			// 例外処理
			$err_str = "C990ViewTest/makepdfcomplete で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}

}
