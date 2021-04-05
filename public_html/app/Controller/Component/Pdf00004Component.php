<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::import('Vendor', 'tcpdf', array('file' => 'tcpdf/tcpdf.php'));
App::import('Vendor', 'fpdi', array('file' => 'tcpdf/fpdi.php'));

/**
 * 取引残高報告書出力
 */
class Pdf00004Component extends Component {

	public $components = array(
		 "Calendar"
		,"Company"
		,"DividendHistory"
		,"DummyData"
		,"Fund"
		,"InvestmentHistory"
		,"OperatingReport"
		,"LoanRepayment"
		,"Pdf"
		,"SessionUserInfo"
		,"User"
	);
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * PDF作成＆保存<br>
	 * @param type $pdf_param
	 * @throws Exception
	 */
	function savePdf($pdf_param) {
		try {
			
			$user_id    = $pdf_param[ARRAY_INDEX_USER_ID];
			
			// フォルダが無い場合、作成する。
			if (!file_exists(TEMPLATE_PDF_DIR_2.$user_id)) {
				if (!mkdir(TEMPLATE_PDF_DIR_2.$user_id, 0777)) {
					throw new Exception();
				}
			}
					
			$fund_id    = $pdf_param[ARRAY_INDEX_DOC_CAT_ID];
			$year_month = $pdf_param[ARRAY_INDEX_REPORT_MONTH];
			$revision   = sprintf("%02d", intval($pdf_param[ARRAY_INDEX_DOC_REV]));
			
			$pdf_param = array();

			$report_year  = intval(substr($year_month, 0, 4));
			$report_month = intval(substr($year_month, 4));




			// 前回の運用報告書データ取得
			$last_year  = $report_year;
			$last_month = $report_month;
			if ($last_month == 1) {
				$last_year--;
				$last_month = 12;
			}
			else {
				$last_month--;
			}
			
			$last_report = $this->OperatingReport->getSecondOperatingReport($fund_id, $last_year, $last_month);

			// 運用報告書データ取得
			$report = $this->OperatingReport->getSecondOperatingReport($fund_id, $report_year, $report_month);

			// 運用報告書(貸付)データ取得
			$report_loan1 = null;
			$report_loan2 = null;
			$report_loans = $this->OperatingReport->getOperatingReportLoansList($fund_id, $report_year, $report_month);
			foreach ($report_loans as $keys => $value) {
				if (is_null($report_loan1)) {
					$report_loan1 = $value;
				}
				else {
					$report_loan2 = $value;
				}
			}

			// ファンドデータ取得
			$fund = null;
			$funds = $this->Fund->getMstfund($fund_id);
			foreach ($funds as $keys => $values) {
				foreach ($values as $key => $value) {
					$fund = $value;
				}	
			}

			// 貸付データ取得
			$loan1 = null;
			$loan2 = null;
			$loans = $this->Fund->getMstLoans($fund_id);
			foreach ($loans as $key => $value) {
				if (is_null($loan1)) {
					$loan1 = $value;
				}
				else {
					$loan2 = $value;
				}
			}	

			// ファンド情報取得
			$fund_data = $this->Fund->getMstFund($fund_id);

			// 投資家情報取得
			$user = $this->User->getMstUser($user_id);

			// 営業者情報取得
			$company = $this->Company->getCompany();

			// ３頁目データ取得
			$page_3 = $this->OperatingReport->getPage3Data($fund, $user_id, $report_year, $report_month, $report[COLUMN_2700060]);

			$pdf_param[ARRAY_INDEX_LOAN_TERM1] = $this->LoanRepayment->getLoanTerm($fund_id, $loan1[COLUMN_0700030]);
			$pdf_param[ARRAY_INDEX_LOAN_TERM2] = $this->LoanRepayment->getLoanTerm($fund_id, $loan2[COLUMN_0700030]);
			
			
			// 前回の運用報告書データ取得
			$last_report_date = "";
			if (!is_null($last_report)) {
				$last_report_date = $last_report[COLUMN_2700060];
			}
			
			// 運用報告書データ取得
			$report_year  = intval($report[COLUMN_2700040]);
			$report_month = intval($report[COLUMN_2700050]);
                        
			
			//インスタンス生成
			$pdf = new FPDI();
			$pdf->setPrintHeader( false );
			$pdf->setPrintFooter( false );
			$rev_no = '05';// tenplate_typeを選べるようにする変数
                        $page_count = $pdf->setSourceFile(TEMPLATE_PDF_DIR_3.$fund_id."/"."template/".INV_DOC_CAT_ID.INV_DOC_ID_00004."_".$rev_no.FILE_EXTENSION_PDF);
                        
                        // 対象期間印字のみに影響
                        //$lot_end = date("Y-m-t", strtotime($report[COLUMN_2700060]. "-1 month"));//report_dateの一カ月前の末尾
                        $lot_end = date("Y-m-t", strtotime(date("Y-m-01", strtotime($report[COLUMN_2700060])). "-1 month")); //report_dateの一カ月前の末尾
                        $f_date = date("Y年m月d日" , strtotime($lot_end)); //$this->Calendar->convertAdtoJa($lot_end); 
                        $l_date = date("Y年m月d日" , strtotime($report[COLUMN_2700080])); //$this->Calendar->convertAdtoJa($report[COLUMN_2700080]); //issue_date
                         
			for ($loop = 1; $loop <= $page_count; $loop++) {

				$templateId = $pdf->importPage($loop);
				$pdf->AddPage();
				$pdf->useTemplate($templateId);

				if ($loop == 1) {
                                        $this->Pdf->outputText($pdf, 30, 28, "財産管理報告書", 'L', PDF_DOC_FONT_NAME, 'B', 20, 164, 0);
					// 報告書作成日
					$report_date = "報告書作成日：".$this->Calendar->convertAdtoJa($report[COLUMN_2700060]);
					//$this->Pdf->outputText($pdf, 23, 30, $report_date, 'R', PDF_DOC_FONT_NAME, '', 11, 164, 0);
                                        $this->Pdf->outputText($pdf, 23, 41, "運営会社", 'R', PDF_DOC_FONT_NAME, '', 11, 164, 0);
                                        //会社名
                                        $this->Pdf->outputText($pdf, 23, 47, $company[company_name], 'R', PDF_DOC_FONT_NAME, '', 11, 164, 0);
                                        //住所
                                        $this->Pdf->outputText($pdf, 23, 52, $company[address1], 'R', PDF_DOC_FONT_NAME, '', 11, 164, 0);
                                        //住所２
                                        $this->Pdf->outputText($pdf, 23, 57, $company[address2], 'R', PDF_DOC_FONT_NAME, '', 11, 164, 0);
                                        $this->Pdf->outputText($pdf, 23, 62, "サイト名: ".$company[site_name], 'R', PDF_DOC_FONT_NAME, '', 11, 164, 0);
                                        // 投資家名
					$user_name = $user[COLUMN_0800060]."  ".$user[COLUMN_0800070]."  様";
					$this->Pdf->outputText($pdf, 30, 75, $user_name, 'L', PDF_DOC_FONT_NAME, 'U', 12, 164, 0);

					// ファンド名
					$fund_name = "ファンド名：　 ".$fund[COLUMN_0500020];
					$this->Pdf->outputText($pdf, 30, 92, $fund_name, 'L', PDF_DOC_FONT_NAME, 'B', 14, 164, 0);
					// 報告期間
                                        list($date_start, $date_end) = $this->Calendar->getMonthBeginEnd($report_year, $report_month);
					$report_term_start = $this->Calendar->convertAdtoJa($date_start);
					$report_term_end   = $this->Calendar->convertAdtoJa($date_end);
					$report_term       = "本報告書の対象期間 : ".$l_date."～".$f_date;
					$this->Pdf->outputText($pdf, 30, 100, $report_term, 'L', PDF_DOC_FONT_NAME, '', 14, 164, 0);

					$text1_h = "この書面は不動産特定共同事業法第28条および不動産特定共同事業法施工規則第50条1項に";
                                        $text2_h = "基づく報告事項を含む内容をご報告申し上げます。";
                                        $text3_h = "内容をご確認いただきますようお願い申し上げます。";
					$this->Pdf->outputText($pdf, 30, 110, $text1_h, 'L', PDF_DOC_FONT_NAME, '', 10, 164, 0);
                                        $this->Pdf->outputText($pdf, 30, 117, $text2_h, 'L', PDF_DOC_FONT_NAME, '', 10, 164, 0);
                                        $this->Pdf->outputText($pdf, 30, 124, $text3_h, 'L', PDF_DOC_FONT_NAME, '', 10, 164, 0);

                                        
                                        // 金銭消費貸借契約日
					$keiyakubi_detail1 = "①".$this->Calendar->convertAdtoJa($report_loan1[COLUMN_2100050]);
					$keiyakubi_detail2 = "②".$this->Calendar->convertAdtoJa($report_loan2[COLUMN_2100050]);
					$keiyakubi_note1   = "①".$this->Calendar->convertAdtoJa($loan1[COLUMN_0700050])."に貸付実行";
					$keiyakubi_note2   = "②".$this->Calendar->convertAdtoJa($loan2[COLUMN_0700050])."に貸付実行";
					
					// 貸付金額(合計)
					$loan_amount        = $fund[COLUMN_0500040];
					$min_inv_amount     = $fund[COLUMN_0500060];
					$inv_count          = $loan_amount / $min_inv_amount;
					$loan_amount_detail = number_format($loan_amount)."円";
					$loan_amount_note   = $min_inv_amount * $page_3[ARRAY_INDEX_INV_COUNT];
					$loan_amount_ans    = number_format($loan_amount_note)."円";
					// 返済方式
					$repay_method_list = Configure::read(CONFIG_0041);
					$repay_method_detail1 = "①".$repay_method_list[$loan1[COLUMN_0700170]]."返済";
					$repay_method_detail2 = "②".$repay_method_list[$loan2[COLUMN_0700170]]."返済";
					$repay_method_note1   = "①貸出金利".$loan1[COLUMN_0700090]."％(実質年率)";
					$repay_method_note2   = "②貸出金利".$loan2[COLUMN_0700090]."％(実質年率)";
					
					// 返済期間・回数
					list($date_start, $date_end) = $pdf_param[ARRAY_INDEX_LOAN_TERM2];//add_yarimizu
					$repay_start1 = $this->Calendar->convertAdtoJa($date_start);
					$repay_end1   = $this->Calendar->convertAdtoJa($date_end);
					$repay_count1 = $loan1[COLUMN_0700100];
					$repay_term_detail1 = "①".$repay_start1."～".$repay_end1."迄・".$repay_count1."回";
					list($date_start, $date_end) = $pdf_param[ARRAY_INDEX_LOAN_TERM2];
					$repay_start2 = $this->Calendar->convertAdtoJa($date_start);
					$repay_end2   = $this->Calendar->convertAdtoJa($date_end);
					$repay_count2 = $loan2[COLUMN_0700100];
					$repay_term_detail2 = "②".$repay_start2."～".$repay_end2."迄・".$repay_count2."回";
					$repay_term_note1  = strcmp(REPAYMENT_METHOD_CODE_P_LUMP, $loan1[COLUMN_0700170]) == 0 ? "①但し、金利のみ毎月支払い" : "";
					$repay_term_note2  = strcmp(REPAYMENT_METHOD_CODE_P_LUMP, $loan2[COLUMN_0700170]) == 0 ? "②但し、金利のみ毎月支払い" : "";
					$inv_count_lender = number_format($page_3[ARRAY_INDEX_INV_COUNT])."口 / ".$inv_count."口";//出資口数
                                        $inv_min_amount =   number_format($fund[COLUMN_0500060]);//最低出資額
					
                                        $admin_yield      = "※営業者報酬は当期純利益に".$fund[COLUMN_0500130]."％を乗じた額となります。";
					
					// 約定返済日
					$trade_date1 = $loan1[COLUMN_0700130];
					$trade_date2 = $loan2[COLUMN_0700130];
					$trade_date_detail1 = "①初回：".$repay_start1."、以後毎月".$trade_date1."日";
					$trade_date_detail2 = "②初回：".$repay_start2."、以後毎月".$trade_date2."日";
					// 1口あたり純資産額
					$junsisan = "※1口あたりの純資産の額は".$this->Pdf->convertAmountFormat($report[COLUMN_2700480])."円です。";
                                        // 送金明細書
                                        //出資金払戻額
					$shussi_shokan = number_format($page_3[ARRAY_INDEX_SHUSSI_SHOKAN_AMOUNT]);
					//分配額
                                        $soneki_bunpai = number_format($page_3[ARRAY_INDEX_SONEKI_BUNPAI_AMOUNT]);
					//源泉徴収税額
                                        $gensen_choshu = $this->Pdf->convertAmountFormat(intval($page_3[ARRAY_INDEX_GENSEN_CHOSHU_AMOUNT]) * -1); // 源泉徴収は常にマイナス表示
					//送金額
                                        $sokin_amount  = number_format($page_3[ARRAY_INDEX_SOKIN_AMOUNT]);
                                        //振込日
                                        $remittance_date = date("Y年m月d日" , strtotime($report[COLUMN_2700070])); //$this->Calendar->convertAdtoJa($report[COLUMN_2700070]);
                                        
					//報告区分
                                        $text4_h = "【ご報告内容】";
                                        $text5_h = "1．持分明細書";
                                        $text6_h = "2．支払明細書";
                                        $text7_h = "3．ファンド運用報告書";
                                        $this->Pdf->outputText($pdf, 30, 150, $text4_h, 'L', PDF_DOC_FONT_NAME, '', 10, 164, 0);
                                        $this->Pdf->outputText($pdf, 30, 157, $text5_h, 'L', PDF_DOC_FONT_NAME, '', 10, 164, 0);
                                        $this->Pdf->outputText($pdf, 30, 164, $text6_h, 'L', PDF_DOC_FONT_NAME, '', 10, 164, 0);
                                        $this->Pdf->outputText($pdf, 30, 171, $text7_h, 'L', PDF_DOC_FONT_NAME, '', 10, 164, 0);
                                        
                                        //持分明細書
                                        $this->Pdf->outputText($pdf, 30, 180, $text5_h, 'L', PDF_DOC_FONT_NAME, '', 10, 164, 0);
                                        $this->Pdf->outputText($pdf, 30, 188, "商品名", 'L', PDF_DOC_FONT_NAME, '', 10, 50, 0);
                                        $this->Pdf->outputText($pdf, 75, 188, ":", 'L', PDF_DOC_FONT_NAME, '', 10, 10, 0);
                                        $this->Pdf->outputText($pdf, 77, 188, $fund[COLUMN_0500020], 'L', PDF_DOC_FONT_NAME, '', 10, 90, 0);
                                        
                                        $this->Pdf->outputText($pdf, 30, 195, "種別", 'L', PDF_DOC_FONT_NAME, '', 10, 50, 0);
                                        $this->Pdf->outputText($pdf, 75, 195, ":", 'L', PDF_DOC_FONT_NAME, '', 10, 10, 0);
                                        $this->Pdf->outputText($pdf, 77, 195, "優先出資", 'L', PDF_DOC_FONT_NAME, '', 10, 90, 0);
                                        
                                        $this->Pdf->outputText($pdf, 30, 203, "出資口数", 'L', PDF_DOC_FONT_NAME, '', 10, 50, 0);
                                        $this->Pdf->outputText($pdf, 75, 203, ":", 'L', PDF_DOC_FONT_NAME, '', 10, 10, 0);
                                        $this->Pdf->outputText($pdf, 77, 203, $inv_count_lender, 'L', PDF_DOC_FONT_NAME, '', 10, 90, 0);
                                        
                                        $this->Pdf->outputText($pdf, 30, 211, "一口当たりの出資額", 'L', PDF_DOC_FONT_NAME, '', 10, 50, 0);
                                        $this->Pdf->outputText($pdf, 75, 211, ":", 'L', PDF_DOC_FONT_NAME, '', 10, 10, 0);
                                        $this->Pdf->outputText($pdf, 77, 211, $inv_min_amount."円", 'L', PDF_DOC_FONT_NAME, '', 10, 90, 0);
                                        
                                        $this->Pdf->outputText($pdf, 30, 219, "出資額", 'L', PDF_DOC_FONT_NAME, '', 10, 50, 0);
                                        $this->Pdf->outputText($pdf, 75, 219, ":", 'L', PDF_DOC_FONT_NAME, '', 10, 10, 0);
                                        $this->Pdf->outputText($pdf, 77, 219, $loan_amount_ans, 'L', PDF_DOC_FONT_NAME, '', 10, 90, 0);
                                        $pdf->SetXY(29, 187);
                                        $pdf->Cell(160, 38,"", LTRB);
                                        
                                        //支払明細書
                                        $this->Pdf->outputText($pdf, 30, 230, $text6_h, 'L', PDF_DOC_FONT_NAME, '', 10, 164, 0);
                                        $this->Pdf->outputText($pdf, 30, 238, "分配額", 'L', PDF_DOC_FONT_NAME, '', 10, 50, 0);
                                        $this->Pdf->outputText($pdf, 75, 238, ":", 'L', PDF_DOC_FONT_NAME, '', 10, 10, 0);
                                        $this->Pdf->outputText($pdf, 77, 238, $soneki_bunpai."円", 'L', PDF_DOC_FONT_NAME, '', 10, 90, 0);
                                        
                                        $this->Pdf->outputText($pdf, 30, 246, "源泉徴収税額", 'L', PDF_DOC_FONT_NAME, '', 10, 50, 0);
                                        $this->Pdf->outputText($pdf, 75, 246, ":", 'L', PDF_DOC_FONT_NAME, '', 10, 10, 0);
                                        $this->Pdf->outputText($pdf, 77, 246, $gensen_choshu."円", 'L', PDF_DOC_FONT_NAME, '', 10, 90, 0);
                                        
                                        $this->Pdf->outputText($pdf, 30, 254, "出資金払戻額", 'L', PDF_DOC_FONT_NAME, '', 10, 50, 0);
                                        $this->Pdf->outputText($pdf, 75, 254, ":", 'L', PDF_DOC_FONT_NAME, '', 10, 10, 0);
                                        $this->Pdf->outputText($pdf, 77, 254, $shussi_shokan."円", 'L', PDF_DOC_FONT_NAME, '', 10, 90, 0);
                                        
                                        $this->Pdf->outputText($pdf, 30, 262, "送金額", 'L', PDF_DOC_FONT_NAME, '', 10, 50, 0);
                                        $this->Pdf->outputText($pdf, 75, 262, ":", 'L', PDF_DOC_FONT_NAME, '', 10, 10, 0);
                                        $this->Pdf->outputText($pdf, 77, 262, $sokin_amount."円", 'L', PDF_DOC_FONT_NAME, '', 10, 90, 0);
                                        
                                        $this->Pdf->outputText($pdf, 30, 270, "振込日", 'L', PDF_DOC_FONT_NAME, '', 10, 50, 0);
                                        $this->Pdf->outputText($pdf, 75, 270, ":", 'L', PDF_DOC_FONT_NAME, '', 10, 10, 0);
                                        $this->Pdf->outputText($pdf, 77, 270, $remittance_date, 'L', PDF_DOC_FONT_NAME, '', 10, 90, 0);
                                        $pdf->SetXY(29, 237);
                                        $pdf->Cell(160, 38,"", LTRB);
                                        
				
                        	}
				elseif ($loop == 2) {

					list($date_start, $date_end) = $this->Calendar->getMonthBeginEnd($report_year, $report_month);
					$report_term_start = $this->Calendar->convertAdtoJa($date_start);
					$report_term_end   = $this->Calendar->convertAdtoJa($date_end);
					$report_term       = "（自：".$report_term_start."　至：".$report_term_end." ）";
					
					// 出資者名
					$user_name2 = $user[COLUMN_0800060]." ".$user[COLUMN_0800070]." 様";
					
					// 出資金額
					$inv_amount1      = number_format($page_3[ARRAY_INDEX_INV_AMOUNT1]);
					$inv_amount2      = number_format($page_3[ARRAY_INDEX_INV_AMOUNT2]);
					$inv_amount3      = $page_3[ARRAY_INDEX_INV_AMOUNT3];
					$inv_amount_total = number_format($page_3[ARRAY_INDEX_INV_AMOUNT_TOTAL]);
					
					// 損益分配
					$div_amount1      = number_format($page_3[ARRAY_INDEX_DIV_AMOUNT1]);
					$div_amount2      = number_format($page_3[ARRAY_INDEX_DIV_AMOUNT2]);
					$div_amount3      = number_format($page_3[ARRAY_INDEX_DIV_AMOUNT3]);
					$div_amount_total = number_format($page_3[ARRAY_INDEX_DIV_AMOUNT_TOTAL]);
					
					// 投資家持分
					$inv_count_lender = "※お客様の持分数は、".number_format($page_3[ARRAY_INDEX_INV_COUNT])."口(@".number_format($fund[COLUMN_0500060])."円)です。";
					$admin_yield      = "※営業者報酬は当期純利益に".$fund[COLUMN_0500130]."％を乗じた額となります。";
					
					$lender_account = "";
					$account_name   = "";
					if (strcmp(BANK_TYPE_CODE_YUCHO, $user[COLUMN_0800350]) == 0) {
						$bank_type_list    = Configure::read(CONFIG_0011);
						$account_type_list = Configure::read(CONFIG_0012);
						$lender_account = ""
								.$bank_type_list[$user[COLUMN_0800350]]." "
								.$account_type_list[$user[COLUMN_0800380]]." "
								.$user[COLUMN_0800390]." "
								.$user[COLUMN_0800400];
						$account_name = $user[COLUMN_0800410];
					}
					else {
						$account_type_list = Configure::read(CONFIG_0012);
						$lender_account = ""
								.$user[COLUMN_0800360]." "
								.$user[COLUMN_0800370]." "
								.$account_type_list[$user[COLUMN_0800380]]." "
								.$user[COLUMN_0800400];
						$account_name = $user[COLUMN_0800410];
					}
					
					
					// 前回報告書作成日
					if (strcmp("", $last_report_date) != 0) {
						$last_date = "※前回の報告書の作成日は、".$this->Calendar->convertAdtoJa($last_report_date)."です。";
						$this->Pdf->outputText($pdf, 24, 169, $last_date     , 'L', PDF_DOC_FONT_NAME, '', 11, 160, 0);
					}
					
					if ($this->DividendHistory->checkPayUp($fund_id, $date_end, $loan_amount)
							&& 0 == intval($page_3[ARRAY_INDEX_DIV_AMOUNT1])) {
						// 完済済＆配当額＝0の場合、次回予定日を表示しない
					}
					else {
						
						// 次回報告書作成予定日
						$next_year  = date('Y', strtotime($report[COLUMN_2700060]));
						$next_month = date('n', strtotime($report[COLUMN_2700060]));
						if ($next_month == 12) {
							$next_year++;
							$next_month = 1;
						}
						else {
							$next_month++;
						}
						$sum1 = "リビジョン１";
						$dividend_day   = $company[COLUMN_0300110];
						$dividend_day   = $this->Calendar->ajustDateValid($next_year, $next_month, $dividend_day);
						$div_date_array = $this->Calendar->ajustDateBusiness($next_year, $next_month, $dividend_day, false);
						$div_date       = $div_date_array['year'] ."/". $div_date_array['month'] ."/". $div_date_array['day'];
						$next_date     = "※次回の報告書の作成予定日は、".$this->Calendar->convertAdtoJa(date(DATE_FORMAT, strtotime($div_date)))."です。";
						

						$delay_messege     = "※本ファンドは支払の延滞が発生しております。";
						$delay = $fund['delay_1'];
						if ($delay >= '1') {
							$this->Pdf->outputText($pdf, 24, 187, $delay_messege     , 'L', PDF_DOC_FONT_NAME, '', 11, 160, 0);
						} else {
						}

					}
					
				}
			}

			// ファイルパス
			$file_path = TEMPLATE_PDF_DIR_2.$user_id."/".$fund_id.INV_DOC_ID_00004."_".$year_month."_".$revision.FILE_EXTENSION_PDF;

			//出力 Fでローカルに保存
			$pdf->Output($file_path, 'F');
			
		} catch (Exception $ex) {
			$err = "Pdf00004Component->savePdf で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
}
