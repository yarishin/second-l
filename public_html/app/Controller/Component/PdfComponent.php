<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::import('Vendor', 'tcpdf', array('file' => 'tcpdf/tcpdf.php'));
App::import('Vendor', 'fpdi', array('file' => 'tcpdf/fpdi.php'));

 //拡張クラスを作成
class PdfComponent extends Component {

	public $components = array(
		 "Calendar"
		,"Common"
		,"Document"
		,"Fund"
		,"LoanRepayment"
		,"Pdf00004"
		,"Pdf00005"
		,"Pdf00006"
		,"SessionAdminInfo"
		,"SessionUserInfo"
		,"User"
	);
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * PDF表示<br>
	 * 作成済みPDFを表示する。<br>
	 * @param string $user_id
	 * @param string $fund_id
	 * @param string $doc_id
	 * @param string $doc_param
	 * @param number $revision
	 * @throws Exception
	 */
	function showPdf($user_id, $fund_id, $doc_id, $doc_param, $revision = 1) {
		try {
			
			$revision      = sprintf("%02d",$revision);
			$file_path     = $fund_id.$doc_id."_".$doc_param."_".$revision.FILE_EXTENSION_PDF;
			$template_path = TEMPLATE_PDF_DIR_2.$user_id."/".$file_path;

			//インスタンス生成
			$pdf = new FPDI();
			if (strcmp(REG_DOC_CAT_ID, $fund_id) != 0 && strcmp(INV_DOC_ID_00005, $doc_id) == 0) {
				$pdf = new FPDI('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8');
			}
			$pdf->setPrintHeader( false );
			$pdf->setPrintFooter( false );

			$page_count = $pdf->setSourceFile($template_path);
			
			for ($loop = 1; $loop <= $page_count; $loop++) {

				//テンプレートを変更
				$templateId = $pdf->importPage($loop);
				$pdf->AddPage();
				$pdf->useTemplate($templateId);
			}

			// $dest："I"=表示、"F"=ローカルに保存
			$pdf->Output($file_path, "I");
			
		} catch (Exception $ex) {
			$err = "Pdf->showPdf で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
		
	}
	
	/**
	 * 投資申込契約締結前同意書面PDF作成<br>
	 * $save = true  →PDFファイル作成＆保存<br>
	 * $save = false →PDFファイル作成＆表示<br>
	 * $save = false の場合、$doc_paramと$user_idは不要。<br>
	 * @param string $fund_id
	 * @param string $doc_id
	 * @param string $doc_param
	 * @param string $user_id
	 * @param boolean $save
	 * @throws Exception
	 * 0000100001.pdf契約成立前交付書面 0000100002.pdf匿名組合契約約款（成立前）
	 */
	function makePdfInvBf($fund_id, $doc_id, $doc_param = null, $user_id = null, $save = false) {

		try {
			
			// 投資申込前にPDFの表示を行う場合のパス
			//$template_path = TEMPLATE_PDF_DIR_2.INV_DOC_CAT_ID.$doc_id.FILE_EXTENSION_PDF;
			$template_path = './projects/'.$fund_id.'/template/'.INV_DOC_CAT_ID.$doc_id.FILE_EXTENSION_PDF;
			
			// PDF保存、または保存したPDFを表示する場合のパス
			$save_pdf_path = TEMPLATE_PDF_DIR_2.$user_id."/".$fund_id.$doc_id."_".$doc_param."_01".FILE_EXTENSION_PDF;
			
			if (!$save && !is_null($doc_param) && strcmp("", $doc_param) != 0) {
				
				// 投資申込完了時、PDFを保存する際に実行
				$template_path = $save_pdf_path;
			}

			// ファイルパス
			$file_path = INV_DOC_CAT_ID.$doc_id;
			$dest      = "I";
			
			if ($save && !is_null($doc_param) && strcmp("", $doc_param) != 0) {
				
				// 投資申込完了時、PDF保存を行う際に実行
				$file_path = $save_pdf_path;
				$dest      = "F";
			}
			
			$page_count = 0;

			// ファンド情報取得
			$fund_data = $this->Controller->Fund->getMstFund($fund_id);

			$fund_name   = "";
			$admin_yield = 0;
			$min_unit    = 0;
			foreach ($fund_data as $key => $values) {
				foreach ($values as $value) {
					$fund_name   = $value[COLUMN_0500020];
					$admin_yield = $value[COLUMN_0500130];
				}	
			}
			
			//インスタンス生成
			$pdf = new FPDI();
			$pdf->setPrintHeader( false );
			$pdf->setPrintFooter( false );
			$page_count = $pdf->setSourceFile($template_path);
			
			for ($loop = 1; $loop <= $page_count; $loop++) {

				$template_id = $pdf->importPage($loop);
				$pdf->AddPage();
				$pdf->useTemplate($template_id);


				if (strcmp(INV_DOC_ID_00001, $doc_id) == 0) {
					
					if ($loop == 1) {

						// 0000100001.pdf(契約成立前書面)
						$pdf->SetFont(PDF_DOC_FONT_NAME, 'B', 18);
						//$pdf->Text(10, 55, $fund_name, false, false, true, 0, 0, 'C');
					}
					elseif ($loop == 19) {

						//19ページ目を作成
						$pdf->SetFont(PDF_DOC_FONT_NAME, '', 11);
						//$pdf->Text(118, 119, $admin_yield);
					}
				}
				elseif (strcmp(INV_DOC_ID_00002, $doc_id) == 0) {
					
					if ($loop == 1) {

						// 0000100002.pdf(匿名組合契約約款)
						$pdf->SetFont(PDF_DOC_FONT_NAME, 'B', 15);
						//$pdf->Text(10, 22, $fund_name, false, false, true, 0, 0, 'C');
					}
					elseif ($loop == 4) {

						//8ページ目を作成
						$pdf->SetFont(PDF_DOC_FONT_NAME, '', 11);
						//$pdf->Text(118, 120, $admin_yield);
					}
				}
			}

			// $dest："I"=表示、"F"=ローカルに保存
			$pdf->Output($file_path, $dest);
			
		} catch (Exception $ex) {
			$err = "Pdf->makePdfInvBf で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 投資申込契約締結前同意書面保存<br>
	 * 投資申込契約締結前の同意書面PDFを作成＆保存する。<br>
	 * @param string $user_id
	 * @param string $fund_id
	 * @param datetime $agreed_datetime
	 * @throws Exception
	 */
	function savePdfInvBf($user_id, $fund_id, $agreed_datetime) {
		try {
			
			$doc_param = date(DATETIME_FORMAT_4, strtotime($agreed_datetime));
			
			// フォルダが無い場合、作成する。
			if (!file_exists(TEMPLATE_PDF_DIR_2.$user_id)) {
				if (!mkdir(TEMPLATE_PDF_DIR_2.$user_id, 0777)) {
					throw new Exception();
				}
			}
			
			// 締結前交付書面
			$this->makePdfInvBf($fund_id, INV_DOC_ID_00001, $doc_param, $user_id, true);
			
			// 匿名組合契約約款
			$this->makePdfInvBf($fund_id, INV_DOC_ID_00002, $doc_param, $user_id, true);
			
		} catch (Exception $ex) {
			$err = "Pdf->savePdfInvBf で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 投資申込契約締結時同意書面保存<br>
	 * 投資申込契約締結時の同意書面PDFを作成＆保存する。<br>
	 * $appl_datetime は申請日時<br>
	 * @param string $user_id
	 * @param string $fund_id
	 * @param datetime $appl_datetime
	 * @throws Exception     00003 不動産特定共同事業契約（匿名組合契約型）契約成立時書面
	 */
	function savePdfInvAf($user_id, $fund_id, $appl_datetime) {
		try {
			
			// フォルダが無い場合、作成する。
			if (!file_exists(TEMPLATE_PDF_DIR_2.$user_id)) {
				if (!mkdir(TEMPLATE_PDF_DIR_2.$user_id, 0777)) {
					throw new Exception();
				}
			}
					
			// 日付の書式変換
			$doc_param = date(DATETIME_FORMAT_4, strtotime($appl_datetime));
			
			$page_count = 0;

			// ファンド情報取得
			$fund_data = $this->Controller->Fund->getMstFund($fund_id);

			$fund_name   = "";
			$admin_yield = 0;
			$min_unit    = 0;
			foreach ($fund_data as $keys => $values) {
				foreach ($values as $key => $value) {
					$fund_name   = $value[COLUMN_0500020];
					$admin_yield = $value[COLUMN_0500130];
					$min_unit    = $value[COLUMN_0500060];
                                        $total_investment = $value[COLUMN_0501350];
                                        
				}	
			}
			
			$conditions[COLUMN_1200020] = $user_id;
			$conditions[COLUMN_1200040] = $fund_id;
			$conditions[COLUMN_1200060] = $appl_datetime;

			$status[MODEL_CONDITIONS] = $conditions;

			$inv_data = $this->Controller->TrnInvestmentHistory->find(MODEL_ALL, $status);

			$user_name     = "";
			$invest_amount = 0;
			foreach ($inv_data as $keys => $values) {
				foreach ($values as $key => $value) {
					$user_name     = $value[COLUMN_1200030];
					$invest_amount = $value[COLUMN_1200070]; //出資額
					$appr_datetime = $value[COLUMN_1200100]; // 承認日時
				}
			}
			
                        //顧客情報取得                        
                        $conditions1[COLUMN_1200020] = $user_id;
                        $status1[MODEL_CONDITIONS] = $conditions1;                     
                        $user_data = $this->Controller->MstUser->find(MODEL_ALL, $status1);
                        foreach ($user_data as $keys => $values) {
                                foreach ($values as $key => $value) {
                                         $address1 = $value[COLUMN_0800170];
                                         $address2 = $value[COLUMN_0800180];
                                         $address3 = $value[COLUMN_0800190];
                                }
                        }
                        $list_addr1 = Configure::read(CONFIG_0021); // 都道府県
                        //お客様住所フォーマット
                        $user_address = $list_addr1[$address1].$address2.$address3; //住所
                        $appr_date = date('Y年n月j日',  strtotime('now')); //契約日（出力した瞬間時）
                        
			//$user_name = "お客様の氏名又は名称： ".$user_name." 様";
			//$appr_date = $this->Calendar->convertAdtoJa($appr_datetime);
                        $inve_count = number_format($total_investment / 10000)."口";
                        $count = number_format($invest_amount / 10000)."口"; //出資口数
                        $invest_t = number_format($invest_amount)."円"; //出資額
                        $ritu = $count." / ".$inve_count; //出資割合
                        //インスタンス生成
			$pdf = new FPDI();
			$pdf->setPrintHeader( false );
			$pdf->setPrintFooter( false );
			
			// テンプレート指定(/template/0000100003.pdf)
			$page_count = $pdf->setSourceFile('../webroot/projects/'.$fund_id.'/template/'.INV_DOC_CAT_ID.INV_DOC_ID_00003.FILE_EXTENSION_PDF);
			
			for ($loop = 1; $loop <= $page_count; $loop++) {

				$templateId = $pdf->importPage($loop);
				$pdf->AddPage();
				$pdf->useTemplate($templateId);

				if ($loop == 1) {

					// 日付
					$pdf->SetFont(PDF_DOC_FONT_NAME, '', 12);
					//$pdf->Text(150, 33, '承認日  '.$appr_date);
					// 入金期限
					$pdf->SetFont(PDF_DOC_FONT_NAME, '', 12);
					//$pdf->Text(150, 40, '入金期限  '.$appr_date_7);

					//追加ヘッダーyarimizu
					$pdf->SetFont(PDF_DOC_FONT_NAME, '', 10);
					$pdf->Text(25, 183, '不動産特定共同事業契約を締結した日');
                                        $pdf->SetFont(PDF_DOC_FONT_NAME, '', 10);
                                        $pdf->SetXY(25, 190);
                                        $pdf->Cell(80, 7, '契約日', LTB);
                                        $pdf->SetXY(105, 190);
                                        $pdf->Cell(80, 7,  $appr_date, LTRB);
                                        $pdf->SetFont(PDF_DOC_FONT_NAME, '', 10);
					$pdf->Text(25, 203, '事業参加者の商号若しくは名称又は氏名ならびに出資の内容');
                                        $pdf->SetFont(PDF_DOC_FONT_NAME, '', 10);
                                        $pdf->SetXY(25, 210);
                                        $pdf->Cell(80, 7, '氏名', LTB);
                                        $pdf->SetXY(105, 210);
                                        $pdf->Cell(80, 7, $user_name, LTRB);
                                        $pdf->SetXY(25, 217);
                                        $pdf->MultiCell(80, 16, '住所', LB);
                                        $pdf->SetXY(105, 217);
                                        $pdf->MultiCell(80, 16, $user_address, LRB);
                                        $pdf->SetXY(25, 233);
                                        $pdf->Cell(80, 7, '商品名', LB);
                                        $pdf->SetXY(105, 233);
                                        $pdf->Cell(80, 7, $fund_name, LRB);
                                        $pdf->SetXY(25, 240);
                                        $pdf->Cell(80, 7, '出資口数', LB);
                                        $pdf->SetXY(105, 240);
                                        $pdf->Cell(80, 7, $count, LRB);
                                        $pdf->SetXY(25, 247);
                                        $pdf->Cell(80, 7, '出資額', LB);
                                        $pdf->SetXY(105, 247);
                                        $pdf->Cell(80, 7, $invest_t, LRB);
                                        $pdf->SetXY(25, 254);
                                        $pdf->Cell(80, 7, '出資割合', LB);
                                        $pdf->SetXY(105, 254);
                                        $pdf->Cell(80, 7, $ritu, LRB);
                                        
                                        
                                        
                                        

					// テートール
					$pdf->SetFont(PDF_DOC_FONT_NAME, 'B', 18);
					//$pdf->Text(10, 60, $fund_name, false, false, true, 0, 0, 'C');
				}
				elseif ($loop == 2) {

					//2ページ目を作成
					$pdf->SetFont(PDF_DOC_FONT_NAME, '', 11);
					//$pdf->Text(84, 246.5, $appr_date);
				}
				elseif ($loop == 4) {

					//4ページ目を作成
					$pdf->SetFont(PDF_DOC_FONT_NAME, '', 12);
					//$pdf->Text(84, 197, $count." 個");

					//4ページ目を作成
					$pdf->SetFont(PDF_DOC_FONT_NAME, '', 12);
					//$pdf->Text(84, 207, number_format($min_unit)." 円");
				}
				elseif ($loop == 8) {

					//8ページ目を作成
					$pdf->SetFont(PDF_DOC_FONT_NAME, '', 12);
					//$pdf->Text(118, 118.5, $admin_yield);
				}
			}

			// ファイルパス
			$file_path = TEMPLATE_PDF_DIR_2.$user_id."/".$fund_id.INV_DOC_ID_00003."_".$doc_param."_01".FILE_EXTENSION_PDF;
			
			// $dest："I"=表示、"F"=ローカルに保存
			$pdf->Output($file_path, "F");
			
		} catch (Exception $ex) {
			$err = "Pdf->savePdfInvAf で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}



//00007 匿名組合契約型　不動産特定共同事業契約書
        function savePdfInvAf2($user_id, $fund_id, $appl_datetime) {
                try {

                        // フォルダが無い場合、作成する。
                        if (!file_exists(TEMPLATE_PDF_DIR_2.$user_id)) {
                                if (!mkdir(TEMPLATE_PDF_DIR_2.$user_id, 0777)) {
                                        throw new Exception();
                                }
                        }

                        // 日付の書式変換
                        $doc_param = date(DATETIME_FORMAT_4, strtotime($appl_datetime));

                        $page_count = 0;

                        // ファンド情報取得
                        $fund_data = $this->Controller->Fund->getMstFund($fund_id);

                        $fund_name   = "";
                        $admin_yield = 0;
                        $min_unit    = 0;
                        foreach ($fund_data as $keys => $values) {
                                foreach ($values as $key => $value) {
                                        $fund_name   = $value[COLUMN_0500020];
                                        $admin_yield = $value[COLUMN_0500130];
                                        $min_unit    = $value[COLUMN_0500060];
                                        $total_investment = $value[COLUMN_0501350];
                                }
                        }

                        $conditions[COLUMN_1200020] = $user_id;
                        $conditions[COLUMN_1200040] = $fund_id;
                        $conditions[COLUMN_1200060] = $appl_datetime;

                        $status[MODEL_CONDITIONS] = $conditions;

                        $inv_data = $this->Controller->TrnInvestmentHistory->find(MODEL_ALL, $status);

                        $user_name     = "";
                        $invest_amount = 0;
                        foreach ($inv_data as $keys => $values) {
                                foreach ($values as $key => $value) {
                                        $user_name     = $value[COLUMN_1200030]; //氏名
                                        $invest_amount = $value[COLUMN_1200070]; //投資額
                                        $$appr_date    = $value[COLUMN_1200100]; // 承認日時
                                        $expiration_datetime = $value[COLUMN_1200080];  //入金期日
                                }
                        }
                        //顧客情報取得                        
                        $conditions1[COLUMN_1200020] = $user_id;
                        $status1[MODEL_CONDITIONS] = $conditions1;                     
                        $user_data = $this->Controller->MstUser->find(MODEL_ALL, $status1);
                        foreach ($user_data as $keys => $values) {
                                foreach ($values as $key => $value) {
                                         $address1 = $value[COLUMN_0800170];
                                         $address2 = $value[COLUMN_0800180];
                                         $address3 = $value[COLUMN_0800190];
                                }
                        }
                        $list_addr1 = Configure::read(CONFIG_0021); // 都道府県
                        //お客様住所フォーマット
                        $user_address = $list_addr1[$address1].$address2.$address3;
                        //$user_name = "お客様の氏名又は名称： ".$user_name." 様";
                        $expiration_datetime = date('Y年n月j日', strtotime($expiration_datetime));// 出資額の支払日
                        //PDF作成時間を契約日表示している
                        $appr_date = date('Y年n月j日',  strtotime('now'));
                        //$appr_date = $this->Calendar->convertAdtoJa($appr_datetime); //承認日時(reiwa)
                        //$appr_date_7 = $this->Calendar->convertAdtoJa(date('Y-m-d H:i:s',strtotime("+7 day")));
                        //$count     = $invest_amount / $min_unit;
                        $t_investment = number_format($total_investment)."円";
                        $inve_count = number_format($total_investment / 10000)."口";
                        $count = number_format($invest_amount / 10000)."口"; //出資口数
                        $invest_t = number_format($invest_amount)."円"; //出資額
                        $ritu = $count." / ".$inve_count; //出資割合
                        //インスタンス生成
                        $pdf = new FPDI();
                        $pdf->setPrintHeader( false );
                        $pdf->setPrintFooter( false );

                        // テンプレート指定(/template/0000100007.pdf)契約成立時書面
                        $page_count = $pdf->setSourceFile('../webroot/projects/'.$fund_id.'/template/'.INV_DOC_CAT_ID.INV_DOC_ID_00007.FILE_EXTENSION_PDF);
                        //templateの枚数チェック
                        
                        for ($loop = 1; $loop <= $page_count; $loop++) {

                                $templateId = $pdf->importPage($loop);
                                $pdf->AddPage();
                                $pdf->useTemplate($templateId);

                                if ($loop == 1) {

                                        // 日付
                                        $pdf->SetFont(PDF_DOC_FONT_NAME, '', 12);
                                        //$pdf->Text(150, 33, '承認日  '.$appr_date);
                                        // 入金期限
                                        $pdf->SetFont(PDF_DOC_FONT_NAME, '', 12);
                                        //$pdf->Text(150, 40, '入金期限  '.$appr_date_7);

                                        //氏名
                                        $pdf->SetFont(PDF_DOC_FONT_NAME, 'U, ', 14);
                                        //$pdf->Text(24, 47, $user_name);

                                        // テートール
                                        $pdf->SetFont(PDF_DOC_FONT_NAME, 'B', 18);
                                        //$pdf->Text(10, 60, $fund_name, false, false, true, 0, 0, 'C');
                                }
                                elseif ($loop == 11) {

                                }
                        }
                                       //追加ページを最終ページに挿入する
                                        $pdf->AddPage();
                                        $pdf->SetFont(PDF_DOC_FONT_NAME, '', 10);
                                        $pdf->Text(170, 35, '別紙3');
                                        //一段目
                                        $pdf->SetFont(PDF_DOC_FONT_NAME, '', 10);
                                        $pdf->Text(28, 49, '商品の名称及び契約日');
                                        $pdf->SetFont(PDF_DOC_FONT_NAME, '', 10);
                                        $pdf->SetXY(28, 55);
                                        $pdf->Cell(74, 7, '商品の名称', LTB);
                                        $pdf->SetXY(102, 55);
                                        $pdf->Cell(80, 7, $fund_name, LTRB);
                                        $pdf->SetXY(28, 62);
                                        $pdf->Cell(74, 7, '契約日', LB);
                                        $pdf->SetXY(102, 62);
                                        $pdf->Cell(80, 7, $appr_date, LRB);
                                        //二段目
                                        $pdf->SetFont(PDF_DOC_FONT_NAME, '', 10);
                                        $pdf->Text(28, 75, '出資内容');
                                        $pdf->SetFont(PDF_DOC_FONT_NAME, '', 10);
                                        $pdf->SetXY(28, 81);
                                        $pdf->Cell(74, 7, '(A)本事業の出資予定総額（第２条）', LTB);
                                        $pdf->SetXY(102, 81);
                                        $pdf->Cell(80, 7, $t_investment, LTRB);
                                        $pdf->SetXY(28, 88);
                                        $pdf->Cell(74, 7, '   本事業者の出資口数', LB);
                                        $pdf->SetXY(102, 88);
                                        $pdf->Cell(80, 7, $count, LRB);
                                        $pdf->SetXY(28, 95);
                                        $pdf->Cell(74, 7, '(B)本出資者の出資額（第２条）', LB);
                                        $pdf->SetXY(102, 95);
                                        $pdf->Cell(80, 7, $invest_t, LRB);
                                        $pdf->SetXY(28, 102);
                                        $pdf->Cell(74, 7, '(C)本出資者の出資額の支払日（第２条）', LB);
                                        $pdf->SetXY(102, 102);
                                        $pdf->Cell(80, 7, $expiration_datetime, LRB);
                                        $pdf->SetXY(28, 109);
                                        $pdf->MultiCell(74, 10, '(D)本事業の出資予定総額に対する本出資者の出資割合（第２条）', LB);
                                        $pdf->SetXY(102, 109);
                                        $pdf->MultiCell(80, 10, $ritu, LRB, L);
                                        //三段目
                                        $pdf->SetFont(PDF_DOC_FONT_NAME, '', 10);
                                        $pdf->Text(28, 127, '本出資者');
                                        $pdf->SetFont(PDF_DOC_FONT_NAME, '', 10);
                                        $pdf->SetXY(28, 133);
                                        $pdf->MultiCell(74, 16, '住所', LTB);
                                        $pdf->SetXY(102, 133);
                                        $pdf->MultiCell(80, 16, $user_address, LTRB);
                                        $pdf->SetXY(28, 149);
                                        $pdf->Cell(74, 7, '氏名', LB);
                                        $pdf->SetXY(102, 149);
                                        $pdf->Cell(80, 7, $user_name, LRB);
                                        //四段目
                                        $pdf->SetFont(PDF_DOC_FONT_NAME, '', 10);
                                        $pdf->Text(28, 162, '本事業者');
                                        $pdf->SetFont(PDF_DOC_FONT_NAME, '', 10);
                                        $pdf->SetXY(28, 168);
                                        $pdf->MultiCell(74, 10, '許可番号', LTB);
                                        $pdf->SetXY(102, 168);
                                        $pdf->MultiCell(80, 10, '不動産特定共同事業許可番号　東京都知事　第１２９号', LTRB);
                                        $pdf->SetXY(28, 178);
                                        $pdf->Cell(74, 7, '本店所在地', LB);
                                        $pdf->SetXY(102, 178);
                                        $pdf->Cell(80, 7, '東京都港区芝浦3-15-15', LRB);
                                        $pdf->SetXY(28, 185);
                                        $pdf->Cell(74, 7, '社名', LB);
                                        $pdf->SetXY(102, 185);
                                        $pdf->Cell(80, 7, 'セブンスター株式会社', LRB);
                                        $pdf->SetXY(28, 192);
                                        $pdf->Cell(74, 7, '代表者', LB);
                                        $pdf->SetXY(102, 192);
                                        $pdf->Cell(80, 7, '鈴木　宏治', LRB);
                                        //五段目
                                        $pdf->SetFont(PDF_DOC_FONT_NAME, '', 10);
                                        $pdf->Text(28, 208, '業務管理者');
                                        $pdf->SetFont(PDF_DOC_FONT_NAME, '', 10);
                                        $pdf->SetXY(28, 214);
                                        $pdf->Cell(74, 7, '業務管理者名', LTB);
                                        $pdf->SetXY(102, 214);
                                        $pdf->Cell(80, 7, '吉田　佳弘', LTRB);
                                        
                                        $pdf->SetFont(PDF_DOC_FONT_NAME, '', 10);
                                        $pdf->Text(102,272,$page_count + 1);
                                        
                        // ファイルパス
                        $file_path = TEMPLATE_PDF_DIR_2.$user_id."/".$fund_id.INV_DOC_ID_00007."_".$doc_param."_01".FILE_EXTENSION_PDF;

                        // $dest："I"=表示、"F"=ローカルに保存
                        $pdf->Output($file_path, "F");

                } catch (Exception $ex) {
                        $err = "Pdf->savePdfInvAf2 で例外発生<br>";
                        throw new Exception($err.$ex->getMessage()."<br>");
                }
        }














	
	/**
	 * 投資家登録申込時の同意書面PDF作成<br>
	 * @param string $doc_id
	 * @param number $revision
	 * @param string $doc_param
	 * @param string $user_id
	 * @param boolean $save
	 * @throws Exception
	 * 
	 */
	function makePdfLenderReg($doc_id, $doc_param = null, $user_id = null, $save = false) {

		try {
			
			// フォルダが無い場合、作成する。
			if (!is_null($user_id) && strcmp("", $user_id) != 0) {
				if (!file_exists(TEMPLATE_PDF_DIR_2.$user_id)) {
					if (!mkdir(TEMPLATE_PDF_DIR_2.$user_id, 0777)) {
						throw new Exception();
					}
				}
			}
					
			// 投資家登録前にPDFの表示を行う場合のパス
			$template_path = TEMPLATE_PDF_DIR_1.REG_DOC_CAT_ID.$doc_id.FILE_EXTENSION_PDF;
			
			// PDF保存、または保存したPDFの表示を行う場合のパス
			$save_file_path = TEMPLATE_PDF_DIR_2.$user_id."/".REG_DOC_CAT_ID.$doc_id."_".$doc_param."_01".FILE_EXTENSION_PDF;
			
			if (!$save && !is_null($doc_param) && strcmp("", $doc_param) != 0) {
				
				// 投資家登録完了後、同意履歴からPDFの表示を行う場合に実行
				$template_path = $save_file_path;
			}

			// ファイルパス
			$file_path = REG_DOC_CAT_ID.$doc_id;
			$dest      = "I";
			
			if ($save && !is_null($doc_param) && strcmp("", $doc_param) != 0) {
				
				// 投資家登録申込完了時にPDFを保存する場合に実行
				$file_path = $save_file_path;
				$dest      = "F";
			}
			
			//インスタンス生成
			$pdf = new FPDI();
			$pdf->setPrintHeader( false );
			$pdf->setPrintFooter( false );
			$page_count = $pdf->setSourceFile($template_path);

			for ($loop = 1; $loop <= $page_count; $loop++) {

				//テンプレートを変更
				$templateId = $pdf->importPage($loop);
				$pdf->AddPage();
				$pdf->useTemplate($templateId);
			}

			// $dest："I"=表示、"F"=ローカルに保存
			$pdf->Output($file_path, $dest);
			
		} catch (Exception $ex) {
			$err = "Pdf->makePdfLenderReg で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 取引残高報告書表示<br>
	 * 取引残高報告書交付画面で画面から入力したお知らせが<br>
	 * 枠内に収まっていることを確認する際に実行する<br>
	 * @throws Exception
	 */
	function makePdf00005() {
		try {
			
			$data    = $this->Common->getSessionFormData();
			$y_year  = $data[OBJECT_ID_050380010];
			$y_month = $data[OBJECT_ID_050380020];
			$info    = $data[OBJECT_ID_050380050];
			
			$report_month = $y_year.sprintf("%02d", $y_month);
			
			$pdf_param = array();
			$pdf_param[ARRAY_INDEX_USER_ID]      = USER_ID_99999999;
			$pdf_param[ARRAY_INDEX_DOC_CAT_ID]   = INV_DOC_CAT_ID;
			$pdf_param[ARRAY_INDEX_DOC_ID]       = INV_DOC_ID_00005;
			$pdf_param[ARRAY_INDEX_DOC_REV]      = 1;
			$pdf_param[ARRAY_INDEX_REPORT_MONTH] = $report_month;
			$pdf_param[ARRAY_INDEX_INFORMATION]  = $info;

			$this->savePdf00005($pdf_param);
			
		} catch (Exception $ex) {
			$err = "Pdf->makePdf00005 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 投資家登録時同意書面保存<br>
	 * 投資家登録申込時の同意書面PDFを作成＆保存する。<br>
	 * @param array $pdf_param
	 * @throws Exception
	 */
	function savePdfLenderReg($user_id) {
		try {
			
			$conditions[COLUMN_0900020]       = $user_id;
			$conditions[COLUMN_0900030]       = REG_DOC_CAT_ID;
			$conditions[COLUMN_0900050." !="] = TMP_REG_DOC_ID_00000;
			
			$status[MODEL_CONDITIONS] = $conditions;

			$agree = $this->Controller->TrnAgreementHistory->find(MODEL_ALL, $status);

			foreach ($agree as $keys => $values) {
				foreach ($values as $key => $value) {

					$doc_id    = $value[COLUMN_0900050];
					$doc_param = $value[COLUMN_0900070];

					// PDF作成＆保存
					$this->makePdfLenderReg($doc_id, $doc_param, $user_id, true);
				}
			}
		} catch (Exception $ex) {
			$err = "Pdf->makePdfLenderReg で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 認証キーPDF表示<br>
	 * @param string $user_id
	 * @throws Exception
	 * 
	 */
	function makePdfAuthKey($user_id) {

		try {
			
			$data = null;

			// 日付書式：西暦→和暦
			$date = $this->Calendar->convertAdtoJa(date(DATE_FORMAT));

			$list_addr1 = Configure::read(CONFIG_0021); // 都道府県
			$list_kana  = Configure::read(CONFIG_0055); // アルファベット読み仮名

			// 投資家情報取得
			$user = $this->User->getMstUser($user_id);

			$last_name  = $user[COLUMN_0800060];
			$first_name = $user[COLUMN_0800070];
			$zip        = $user[COLUMN_0800160];
			$address1   = $user[COLUMN_0800170];
			$address2   = $user[COLUMN_0800180];
			$address3   = $user[COLUMN_0800190];
			$auth_key   = $user[COLUMN_0800660];

			// 認証キーの読み仮名を生成
			$explain_str = null;
			for ($iLoop = 0; $iLoop < strlen($auth_key); $iLoop++) {
				$str = substr($auth_key, $iLoop, 1);
				if (isset($list_kana[$str])) {
					if (is_null($explain_str)) {
						$explain_str = $list_kana[$str];
					}
					else {
						$explain_str .= "  ".$list_kana[$str];
					}
				}
			}

			$user_name    = $last_name."　".$first_name."　様";
			$user_zip     = "〒 ".substr($zip, 0, 3)."- ".substr($zip, 3);
			$user_address = $list_addr1[$address1].$address2."\n".$address3;

			//インスタンス生成
			$pdf = new FPDI();
			$pdf->setPrintHeader( false );
			$pdf->setPrintFooter( false );
			$page_count = $pdf->setSourceFile(TEMPLATE_PDF_DIR_2.TEMPLATE_PDF_AUTH_KEY.FILE_EXTENSION_PDF); //テンプレート指定

			for ($loop = 1; $loop <= $page_count; $loop++) {

				$templateId = $pdf->importPage($loop);
				$pdf->AddPage([$orientation = 'P'], [$format = 'A3']);
				$pdf->useTemplate($templateId);

				if ($loop == 1) {

					// 日付
					//$pdf->SetFont(PDF_DOC_FONT_NAME, '', 12);
					//$pdf->Text(150, 11, $date);

					// 郵便番号
					// 住所
					// 氏名
					$pdf->SetFont(PDF_DOC_FONT_NAME, '', 20);
					$pdf->MultiCell( 110, 50, $user_zip.LINE_FEED_CODE.$user_address.LINE_FEED_CODE.LINE_FEED_CODE.$user_name, 0, 'L', false, 1, 20, 90);

					// ZIP
					//$pdf->SetFont(PDF_DOC_FONT_NAME, '', 18);
					//$pdf->Text(110, 60, $user_zip);
					// add
					//$pdf->SetFont(PDF_DOC_FONT_NAME, '', 18);
					//$pdf->Text(110, 70, $user_address);
					// name
					//$pdf->SetFont(PDF_DOC_FONT_NAME, '', 18);
					//$pdf->Text(110, 80, $user_name);
					// 認証キー
					$pdf->SetFont(PDF_DOC_FONT_NAME, '', 30);
					$pdf->Text(18, 223, $auth_key, false, false, true, 0, 0, 'C');

					// 認証キー発音
					$pdf->SetFont(PDF_DOC_FONT_NAME, '', 14);
					$pdf->Text(18, 237, $explain_str, false, false, true, 0, 0, 'C');
				}
			}

			//出力 Dでダウンロード
			$pdf->Output(TEMPLATE_PDF_AUTH_KEY.FILE_EXTENSION_PDF, 'I');
			
		} catch (Exception $ex) {
			$err = "Pdf->makePdfAuthKey で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 運用報告書保存<br>
	 * @param array $pdf_param
	 */
	function savePdf00004($pdf_param) {
		try {
			$this->Pdf00004->savePdf($pdf_param);
		} catch (Exception $ex) {
			$err = "Pdf->savePdf00004 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
		
	/**
	 * 取引残高報告書保存<br>
	 * @param array $pdf_param
	 */
	function savePdf00005($pdf_param) {
		try {
			$this->Pdf00005->savePdf($pdf_param);
		} catch (Exception $ex) {
			$err = "Pdf->savePdf00005 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
		
	/**
	 * 年間取引報告書出力<br>
	 * @param array $pdf_param
	 */
	function savePdf00006($pdf_param,$data_list,$data_list1,$data_ll) {
		try {
			$this->Pdf00006->savePdf($pdf_param,$data_list,$data_list1,$data_ll);
		} catch (Exception $ex) {
			$err = "Pdf->savePdf00006 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
		
	/**
	 * PDFテキスト出力<br>
	 * $x：セルの横座標<br>
	 * $y：セルの縦座標<br>
	 * $text：出力するテキスト<br>
	 * $align：テキストの左右寄せ<br>
	 * $family：フォント名<br>
	 * $style：<br>
	 * $size：フォントサイズ<br>
	 * $cell_w：セルの横幅<br>
	 * $cell_h：セルの縦幅(0ならテキストに合わせる)<br>
	 * $border：セルの枠線有無<br>
	 * $valign：テキストの上下寄せ<br>
	 * $col：背景色(RGBを配列で指定)<br>
	 * @param object $pdf
	 * @param number $x
	 * @param number $y
	 * @param string $text
	 * @param string $align
	 * @param string $family
	 * @param string $style
	 * @param number $size
	 * @param number $cell_w
	 * @param number $cell_h
	 * @param number $border
	 * @param string $valign
	 * @param array $col
	 * @throws Exception
	 */
	function outputText($pdf, $x, $y, $text, $align, $family, $style, $size, $cell_w, $cell_h, $border = 0, $valign = 'T', $col = null) {
		try {
			
			$pdf->SetFont($family, $style, $size);

			// 塗りつぶし
			$fill = is_null($col) ? false : true;
			if ($fill) {
				$pdf->SetFillColor($col[0], $col[1], $col[2]);
			}
			
			$pdf->MultiCell($cell_w, $cell_h, $text, $border, $align, $fill, 1, $x, $y, true, 0, false, true, $cell_h, $valign);
			
		} catch (Exception $ex) {
			$err = "Pdf->outputText で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * 表示金額変換(報告書用)<br>
	 * 負の値の場合、マイナス記号の代わりに先頭に▲を付けて返す。<br>
	 * 返す際、number_format()も実施する。<br>
	 * @param number $value
	 * @return string $converted
	 */
	function convertAmountFormat($value) {
		try {
			
			$converted = "";
			if (!is_null($value) && strcmp("", $value) != 0) {
				
				$sign = "";
				if (0 > $value) {
					$sign   = PDF_MINUS_SIGN_REPORT;
					$value *= -1;
				}
				$converted = $sign.number_format($value);
			}
			
			return $converted;
			
		} catch (Exception $ex) {
			$err = "Pdf->convertAmountFormat で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * URLの正当性チェック(投資家)<br>
	 * GETパラメータからURLがシステムで生成されたものであることを確認する。<br>
	 * 正当性が認められない場合、NotFoundExceptionを返す。<br>
	 * @param array $get_param
	 * @return boolean $result
	 * @throws NotFoundException
	 * @throws Exception
	 */
	function validateUrlUser($get_param) {
		
		try {
			
			$check = true;
			
			if (!isset($get_param[GET_PARAM_INDEX_FUND_ID])
					|| !isset($get_param[GET_PARAM_INDEX_DOC_ID])) {
				
				throw new NotFoundException();
			}
				
			// GETパラメータ
			$fund_id  = $get_param[GET_PARAM_INDEX_FUND_ID];
			$doc_id   = $get_param[GET_PARAM_INDEX_DOC_ID];
			
			$revision = 0;
			if (isset($get_param[GET_PARAM_INDEX_REVISION])) {
				$revision = $get_param[GET_PARAM_INDEX_REVISION];
			}
			
			$doc_param = "";
			if (isset($get_param[GET_PARAM_INDEX_DOC_PARAM])) {
				$doc_param = $get_param[GET_PARAM_INDEX_DOC_PARAM];
			}

			// ユーザID
			$user_id   = $this->SessionUserInfo->getUserId();

			// URLリスト
			$url_list   = $this->Common->getSessionDocUrlList();

			if (2 == count($get_param)) {
				
				// 投資家登録時書面URL
				$url = $this->Document->getRegistrationDocPath($doc_id);
				foreach ($url_list as $key => $value) {
					if (strcmp($url , $value) ==0) {
						return $check;
					}
				}
				
				// 投資契約締結前書面URL
				$url = $this->Document->getInvestmentDocPath($fund_id, $doc_id);
				foreach ($url_list as $key => $value) {
					if (strcmp($url , $value) ==0) {
						return $check;
					}
				}
			}
			else {
				
				if (strcmp("", $doc_param) != 0) {

					$url = $this->Document->getDocumentPath($fund_id, $doc_id, $revision, $doc_param);

					foreach ($url_list as $key => $value) {
						if (strcmp($url , $value) ==0) {
							return $check;
						}
					}
				}
			}
			
			// 一致するものが無かった場合、例外を返す。
			throw new NotFoundException();
			
		} catch (NotFoundException $ex) {
			throw new NotFoundException();
		} catch (Exception $ex) {
			$err = "Pdf->validateUrlUser で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * URLの正当性チェック(管理者)<br>
	 * GETパラメータ等の正当性からURLがシステムで生成されたものであることを確認する。<br>
	 * 正当性が認められない場合、NotFoundExceptionを返す。<br>
	 * @param array $get_param
	 * @return boolean $result
	 * @throws NotFoundException
	 * @throws Exception
	 */
	function validateUrlAdmin($get_param) {
		
		try {
			
			$check = true;
			
			if (!isset($get_param[GET_PARAM_INDEX_FUND_ID])
					|| !isset($get_param[GET_PARAM_INDEX_DOC_ID])) {
				
				throw new NotFoundException();
			}
			else {
				return $check;
			}
			
		} catch (NotFoundException $ex) {
			throw new NotFoundException();
		} catch (Exception $ex) {
			$err = "Pdf->validateUrlAdmin で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * PDFファイル名リスト取得<br>
	 * 引数で指定した投資家に対して交付した書面のファイル名を全て取得<br>
	 * @param string $user_id
	 * @return array $result
	 * @throws Exception
	 */
	function getPdfFileNameList($user_id) {
		try {
			
			$result = array();
			
			$dir = TEMPLATE_PDF_DIR_2.$user_id."/" ;

			// ディレクトリの存在を確認し、ハンドルを取得
			if (is_dir($dir) && $handle = opendir($dir)) {
				
				// ループ処理
				while (($file = readdir($handle)) !== false) {
					
					// ファイルのみ取得
					if(filetype($path = $dir.$file) == "file") {
						
						// ファイル名を取得
						$result[] = $file;
					}
				}
			}
			
			// ファイル名でソート
			asort($result);
			
			return $result;
			
		} catch (Exception $ex) {
			$err = "Pdf->getPdfFileNameList で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 再交付書面リビジョン取得<br>
	 * 運用報告書と取引残高報告書を再交付する際のリビジョンを取得する。<br>
	 * @param string $user_id
	 * @param string $fund_id
	 * @param string $doc_id
	 * @param number $year
	 * @param number $month
	 * @return number
	 * @throws Exception
	 */
	function getNextRevision($user_id, $fund_id, $doc_id, $doc_param) {
		try {
			
			$revision = 1;
			
			$cond[COLUMN_1150020] = $user_id;
			$cond[COLUMN_1150040] = $fund_id;
			$cond[COLUMN_1150050] = $doc_id;
			$cond[COLUMN_1150080] = $doc_param;
			
			$fields[] = "max(".COLUMN_1150070.") as ".COLUMN_1150070;
			
			$status[MODEL_CONDITIONS] = $cond;
			$status[MODEL_FIELDS]     = $fields;
			
			$data = $this->Controller->TrnInfoAttachment->find(MODEL_ALL, $status);
			
			foreach ($data as $keys => $values) {
				foreach ($values as $key => $value) {
					$revision = intval($value[COLUMN_1150070]) + 1;
				}
			}
				
			return $revision;
			
		} catch (Exception $ex) {
			$err = "Pdf->getNextRevision で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
}
