<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::import('Vendor', 'tcpdf', array('file' => 'tcpdf/tcpdf.php'));
App::import('Vendor', 'fpdi', array('file' => 'tcpdf/fpdi.php'));

/**
 * 取引残高報告書出力(テンプレート処理なし)
 */
class Pdf00005Component extends Component {

	public $components = array(
		 "Calendar"
		,"Company"
		,"DividendHistory"
		,"DummyData"
		,"Fund"
		,"InvestmentHistory"
		,"LoanRepayment"
		,"Pdf"
		,"SessionUserInfo"
		,"TradeBalanceReport"
		,"User"
	);
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * PDF保存<br>
	 * @param array $pdf_param
	 */
	function savePdf($pdf_param) {
		
		try {
			
			$user_id      = $pdf_param[ARRAY_INDEX_USER_ID];
			
			// フォルダが無い場合、作成する。
			if (!file_exists(TEMPLATE_PDF_DIR_2.$user_id)) {
				if (!mkdir(TEMPLATE_PDF_DIR_2.$user_id, 0777)) {
					throw new Exception();
				}
			}
					
			$report_month = $pdf_param[ARRAY_INDEX_REPORT_MONTH];
			$revision     = sprintf("%02d", intval($pdf_param[ARRAY_INDEX_DOC_REV]));
			$info_msg     = "";
			$dest         = "F"; // PDFをローカルに保存
			$file_path    = INV_DOC_CAT_ID.INV_DOC_ID_00005."_".$report_month."_".$revision.FILE_EXTENSION_PDF;
			if (isset($pdf_param[ARRAY_INDEX_INFORMATION])) {
				$info_msg = $pdf_param[ARRAY_INDEX_INFORMATION];
				$dest     = "I"; // PDFは表示のみ
			}
			else {
				
				// ファイルパス
				$file_path = TEMPLATE_PDF_DIR_2.$user_id."/".$file_path;
			}
			
			list($date_from, $date_to) = $this->getReportTerm($report_month);

			// ◆PDF出力データの取得◆
			
			// 取引残高報告書履歴取得
			$start_year  = substr($report_month, 0, 4);
			$start_month = substr($report_month, 4);
			$trade_balance = $this->TradeBalanceReport->getTradeBalanceReport($start_year, $start_month);
			if (!isset($pdf_param[ARRAY_INDEX_INFORMATION])) {
				$info_msg  = $trade_balance[COLUMN_2400060];
			}

			// 投資家情報取得
			$user = $this->User->getMstUser($user_id);

			// 当該投資家の投資情報(承認済)の内、運用中のファンドに関するものを取得
			$now_operating = $this->InvestmentHistory->getTradeBalanceReport1($user_id, $date_to);
			// 延滞分のデータ取得
			$now_operating_1 = $this->InvestmentHistory->getTradeBalanceReport1_1($user_id, $date_to);

			// 当該投資家の投資情報(承認済)の内
			// 　①取引期間内に承認されたもの
			// 　②運用中のファンドに関するもの
			// 　③取引期間内に終了したファンドに関するもの
			// を取得
			$contract = $this->InvestmentHistory->getTradeBalanceReport2($user_id, $date_from, $date_to);

			// 当該投資家の配当情報の内、取引期間内に登録されたものを取得
			$dividend = $this->DividendHistory->getTradeBalanceReport3($user_id, $date_from, $date_to);

			// 営業者情報
			$company    = $this->Company->getCompany();
			$c_name     = $company[COLUMN_0300020];
			$c_zip      = "〒 ".substr($company[COLUMN_0300030], 0, 3)."-".substr($company[COLUMN_0300030], 3);
			$c_addr1    = $company[COLUMN_0300130];
			$c_addr2    = $company[COLUMN_0300050];
			$c_tel      = $company[COLUMN_0300140];
			
			// 横向き、A4
			$pdf = new FPDI('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8');
			$font_family = PDF_DOC_FONT_NAME;

			$font_size   = 9;

			$pdf->SetAutoPageBreak(false); // 自動改ページOFF

			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter( true );
			$pdf->setFooterFont(array($font_family, '', $font_size));
			$pdf->setFooterMargin(10);

			$pdf->AddPage();

			// ◆◆◆◆◆◆◆
			// ◆１ページ目◆
			// ◆◆◆◆◆◆◆

			$page01_1_x = 10;

			// 宛先
			$address1_list = Configure::read(CONFIG_0021);

			$user_name = $user[COLUMN_0800060]." ".$user[COLUMN_0800070]." 様";
			$zip       = "〒 ".substr($user[COLUMN_0800160], 0, 3)."- ".substr($user[COLUMN_0800160], 3);
			$address   = $zip
					.LINE_FEED_CODE.$address1_list[$user[COLUMN_0800170]].$user[COLUMN_0800180]
					.LINE_FEED_CODE.$user[COLUMN_0800190]
					.LINE_FEED_CODE.LINE_FEED_CODE.$user_name;
			$this->Pdf->outputText($pdf, $page01_1_x, 40  , $address, 'L', $font_family, '', $font_size, 80, 0, 0);

			$detail1  = "==============================================".LINE_FEED_CODE;
			$detail2  = "ご報告の内容".LINE_FEED_CODE;
			$detail3  = "==============================================".LINE_FEED_CODE;
			$detail4  = "・お取引及びお預り明細";
			$detail_y = 95;
			$this->Pdf->outputText($pdf, $page01_1_x, $detail_y     , $detail1, 'J', $font_family, '', $font_size, 80, 0, 0);
			$this->Pdf->outputText($pdf, $page01_1_x, $detail_y +  4, $detail2, 'C', $font_family, '', $font_size, 80, 0, 0);
			$this->Pdf->outputText($pdf, $page01_1_x, $detail_y +  8, $detail3, 'J', $font_family, '', $font_size, 80, 0, 0);
			$this->Pdf->outputText($pdf, $page01_1_x, $detail_y + 15, $detail4, 'L', $font_family, '', $font_size, 80, 0, 0);

			// 会社情報
			$company_name     = $c_name.LINE_FEED_CODE;
			$company_zip      = $c_zip.LINE_FEED_CODE;
			$company_address1 = $c_addr1.LINE_FEED_CODE;
			$company_address2 = $c_addr2.LINE_FEED_CODE;
			$company_tel      = "お問合せ先 : ".$c_tel;

			$company_y = 135;
			$pdf->Image("img/logo001_s.gif", $page01_1_x, $company_y, 39, 10);
			$this->Pdf->outputText($pdf, $page01_1_x, $company_y + 14  , $company_name    , 'L', $font_family, '', $font_size, 80, 0, 0);
			$this->Pdf->outputText($pdf, $page01_1_x, $company_y + 21  , $company_zip     , 'L', $font_family, '', $font_size, 80, 0, 0);
			$this->Pdf->outputText($pdf, $page01_1_x, $company_y + 28  , $company_address1, 'L', $font_family, '', $font_size, 80, 0, 0);
			$this->Pdf->outputText($pdf, $page01_1_x, $company_y + 35  , $company_address2, 'L', $font_family, '', $font_size, 80, 0, 0);
			$this->Pdf->outputText($pdf, $page01_1_x, $company_y + 42  , $company_tel     , 'L', $font_family, '', $font_size, 80, 0, 0);

			$page01_2_x = 135;
			$page01_3_x = 185;

			$page01_2_w_max = 150;
			$page01_2_w     =  50;
			$page01_3_w     = 100;

			// タイトル
			$list[CONFIG_0045] = Configure::read(CONFIG_0045);
			$title1 = $list[CONFIG_0045][INV_DOC_ID_00005];
			$title2 = "(お取引及び匿名組合出資持分残高のお知らせ)";
			$title_y = 20;
			$this->Pdf->outputText($pdf,  $page01_2_x, $title_y    , $title1, 'C', $font_family, 'U',         16, $page01_2_w_max, 0, 0);
			$this->Pdf->outputText($pdf,  $page01_2_x, $title_y + 8, $title2, 'C', $font_family, '' , $font_size, $page01_2_w_max, 0, 0);

			// 挨拶文
			$report_date_from = date(DATE_FORMAT_2, strtotime($date_from));
			$report_date_to   = date(DATE_FORMAT_2, strtotime($date_to));
			$greeting = ""
					."いつも格別のお引き立てを賜り、誠にありがとうございます。".LINE_FEED_CODE
					."お客様のお取引明細及び".$report_date_to."現在の匿名組合出資持分の残高明細をご報告申し上げます。".LINE_FEED_CODE
					."つきましては内容をご確認いただき、ご不明の点がございましたら、誠におそれ入りますが下記のお問合せ先までご連絡ください。"
					."";
			$greeting_y = 45;
			$this->Pdf->outputText($pdf,  $page01_2_x, $greeting_y     , $greeting,     'L', $font_family, '', $font_size, $page01_2_w_max, 0, 0);
			$this->Pdf->outputText($pdf,  $page01_2_x, $greeting_y + 30, $company_name, 'R', $font_family, '', $font_size, $page01_2_w_max, 0, 0);

			// ご報告の基準日
			$kijunbi1 = "【ご報告の基準日 】";
			$kijunbi2 = "明細及び残高の基準日";
			$kijunbi3 = "お取引の期間";
			$kijunbi4 = $report_date_to;
			$kijunbi5 = $report_date_from."～".$report_date_to;
			$kijunbi_y = 90;
			$this->Pdf->outputText($pdf,  $page01_2_x, $kijunbi_y     , $kijunbi1, 'L', $font_family, '', $font_size, $page01_2_w_max, 0, 0);
			$this->Pdf->outputText($pdf,  $page01_2_x, $kijunbi_y +  6, $kijunbi2, 'C', $font_family, '', $font_size, $page01_2_w    , 6, 1, 'M');
			$this->Pdf->outputText($pdf,  $page01_2_x, $kijunbi_y + 12, $kijunbi3, 'C', $font_family, '', $font_size, $page01_2_w    , 6, 1, 'M');
			$this->Pdf->outputText($pdf,  $page01_3_x, $kijunbi_y +  6, $kijunbi4, 'L', $font_family, '', $font_size, $page01_3_w    , 6, 1, 'M');
			$this->Pdf->outputText($pdf,  $page01_3_x, $kijunbi_y + 12, $kijunbi5, 'L', $font_family, '', $font_size, $page01_3_w    , 6, 1, 'M');

			// お客様ID及びお問合せ先
			$toiawase1 = "【お客様ID及びお問合せ先 】";
			$toiawase2 = "お客様ID";
			$toiawase3 = "お問合せ先";
			$toiawase4 = $user_id;
			$toiawase5 = "トラストレンディングカスタマーサポート".LINE_FEED_CODE.$c_tel;
			$toiawase_y = 120;
			$this->Pdf->outputText($pdf,  $page01_2_x, $toiawase_y     , $toiawase1, 'L', $font_family, '', $font_size, $page01_2_w_max,  0, 0);
			$this->Pdf->outputText($pdf,  $page01_2_x, $toiawase_y +  6, $toiawase2, 'C', $font_family, '', $font_size, $page01_2_w    ,  6, 1, 'M');
			$this->Pdf->outputText($pdf,  $page01_2_x, $toiawase_y + 12, $toiawase3, 'C', $font_family, '', $font_size, $page01_2_w    , 12, 1, 'M');
			$this->Pdf->outputText($pdf,  $page01_3_x, $toiawase_y +  6, $toiawase4, 'L', $font_family, '', $font_size, $page01_3_w    ,  6, 1, 'M');
			$this->Pdf->outputText($pdf,  $page01_3_x, $toiawase_y + 12, $toiawase5, 'L', $font_family, '', $font_size, $page01_3_w    , 12, 1, 'M');

			// お客様へのお知らせ
			$osirase1  = "【お客様へのお知らせ 】";
			$osirase2  = $info_msg;
			$osirase_y = 155;
			$this->Pdf->outputText($pdf,  $page01_2_x, $osirase_y     , $osirase1, 'L', $font_family, '', $font_size, $page01_2_w_max,  0, 0);
			$this->Pdf->outputText($pdf,  $page01_2_x, $osirase_y +  6, $osirase2, 'L', $font_family, '', $font_size, $page01_2_w_max, 20, 1);

			// ◆◆◆◆◆◆◆
			// ◆２ページ目◆
			// ◆◆◆◆◆◆◆

			// 2頁目以降はヘッダーを出力
			$pdf->setPrintHeader(true);
			$header_data = "お客様ID ( ".$user_id." / ".$user_name." )　【".$report_date_to."現在 】";
			$pdf->setHeaderFont(array($font_family, '', $font_size));
			$pdf->setHeaderData('', '', '', $header_data);

			$pdf->AddPage();

			$page02_x     =  10;
			$page02_w_max = 275;
			$page02_y     =   0;

			// セルの幅(1レコードを2行で表示)
			$page02_01_w = 60;
			$page02_02_w = 40;
			$page02_03_w = 35;
			$page02_04_w = 35;
			$page02_05_w = 40;
			$page02_06_w = 65;

			$page02_07_w = 40;
			$page02_08_w = 35;
			$page02_09_w = 35;
			$page02_10_w = 40;

			// セルのX座標
			$page02_01_x = $page02_x;
			$page02_02_x = $page02_01_x + $page02_01_w;
			$page02_03_x = $page02_02_x + $page02_02_w;
			$page02_04_x = $page02_03_x + $page02_03_w;
			$page02_05_x = $page02_04_x + $page02_04_w;
			$page02_06_x = $page02_05_x + $page02_05_w;

			$page02_07_x = $page02_01_x + $page02_01_w;
			$page02_08_x = $page02_07_x + $page02_07_w;
			$page02_09_x = $page02_08_x + $page02_08_w;
			$page02_10_x = $page02_09_x + $page02_09_w;

			// 見出し背景色
			$col[] = 230;
			$col[] = 230;
			$col[] = 230;

			// お預り残高の合計額
			$label1 = "【お預り残高の合計額 】";
			$meisai = "今回、ご報告の対象となる残高はございません。";
			$this->Pdf->outputText($pdf,  $page02_x, $page02_y += 18, $label1, 'L', $font_family, '', $font_size, $page02_w_max,  0, 0);
			$this->Pdf->outputText($pdf,  $page02_x, $page02_y +=  6, $meisai, 'L', $font_family, '', $font_size, $page02_w_max,  0, 0);

			// 運用中のローンファンド
			$label2 = "【運用中のローンファンド 】";
			$this->Pdf->outputText($pdf,  $page02_x, $page02_y += 12, $label2, 'L', $font_family, '', $font_size, $page02_w_max,  0, 0);
			if (0 >= count($now_operating)) {
				$meisai = "今回、ご報告の対象となる残高はございません。";
				$this->Pdf->outputText($pdf,  $page02_x, $page02_y += 6, $meisai, 'L', $font_family, '', $font_size, $page02_w_max,  0, 0);
			}
			else {
				$page02_y += 6;
				$meisai = "銘柄名";
				$this->Pdf->outputText($pdf,  $page02_01_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_01_w, 12, 1, 'M', $col);
				$meisai = "お取引の種類";
				$this->Pdf->outputText($pdf,  $page02_02_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_02_w,  6, 1, 'M', $col);
				$meisai = "契約日";
				$this->Pdf->outputText($pdf,  $page02_03_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_03_w,  6, 1, 'M', $col);
				$meisai = "権利付与日";
				$this->Pdf->outputText($pdf,  $page02_04_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_04_w,  6, 1, 'M', $col);
				$meisai = "権利の内容(※)";
				$this->Pdf->outputText($pdf,  $page02_05_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_05_w,  6, 1, 'M', $col);
				$meisai = "備考";
				$this->Pdf->outputText($pdf,  $page02_06_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_06_w, 12, 1, 'M', $col);

				$page02_y += 6;
				$meisai = "持分数";
				$this->Pdf->outputText($pdf,  $page02_07_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_07_w, 6, 1, 'M', $col);
				$meisai = "一口の金額";
				$this->Pdf->outputText($pdf,  $page02_08_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_08_w, 6, 1, 'M', $col);
				$meisai = "持分の総額";
				$this->Pdf->outputText($pdf,  $page02_09_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_09_w, 6, 1, 'M', $col);
				$meisai = "営業者報酬の利率";
				$this->Pdf->outputText($pdf,  $page02_10_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_10_w, 6, 1, 'M', $col);

				$add_page = false;
				$max_i = count($now_operating);
				for ($i = 0; $i < $max_i; $i++) {

					$page02_y = $page02_y == 0 ? 18: $page02_y += 6;
					$meisai = $now_operating[$i][COLUMN_0500020];
					$this->Pdf->outputText($pdf,  $page02_01_x, $page02_y, $meisai, 'L', $font_family, '', $font_size, $page02_01_w, 12, 1, 'M');
					$meisai = "匿名組合契約";
					$this->Pdf->outputText($pdf,  $page02_02_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_02_w,  6, 1, 'M');
					$meisai = date(DATE_FORMAT, strtotime($now_operating[$i][COLUMN_1200100]));
					$this->Pdf->outputText($pdf,  $page02_03_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_03_w,  6, 1, 'M');
					$this->Pdf->outputText($pdf,  $page02_04_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_04_w,  6, 1, 'M');
					$meisai = "匿名組合出資持分";
					$this->Pdf->outputText($pdf,  $page02_05_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_05_w,  6, 1, 'M');
					
					$loans = $this->Fund->getTradeBalanceReportNote($now_operating[$i][COLUMN_0500010]);
					$meisai = "";
					foreach ($loans as $loan_keys => $loan_value) {
						if (strcmp("", $meisai) == 0) {
							$meisai = "運用・返済期間：".$loan_value[COLUMN_0700100]."ヶ月、貸付利率".$loan_value[COLUMN_0700090]."%";
						}
						else {
							$meisai .= LINE_FEED_CODE."運用・返済期間：".$loan_value[COLUMN_0700100]."ヶ月、貸付利率".$loan_value[COLUMN_0700090]."%";
						}
					}
					$this->Pdf->outputText($pdf,  $page02_06_x, $page02_y, $meisai, 'L', $font_family, '', $font_size, $page02_06_w, 12, 1, 'M');

					$page02_y += 6;
					$meisai = number_format($now_operating[$i][COLUMN_1200070] / $now_operating[$i][COLUMN_0500060])."口";
					$this->Pdf->outputText($pdf,  $page02_07_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_07_w, 6, 1, 'M');
					$meisai = number_format($now_operating[$i][COLUMN_0500060])."円";
					$this->Pdf->outputText($pdf,  $page02_08_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_08_w, 6, 1, 'M');
					$meisai = number_format($now_operating[$i][COLUMN_1200070])."円";
					$this->Pdf->outputText($pdf,  $page02_09_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_09_w, 6, 1, 'M');
					$meisai = $now_operating[$i][COLUMN_0500130]."%";
					$this->Pdf->outputText($pdf,  $page02_10_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_10_w, 6, 1, 'M');

					if ($i == $max_i) {
						$meisai = "※ 商法第535条に基づく匿名組合出資持分";
						$this->Pdf->outputText($pdf,  $page02_x, $page02_y += 6, $meisai, 'L', $font_family, '', $font_size, $page02_w_max, 6, 0, 'M');
					}

					if (180 <= $page02_y) {
						$pdf->AddPage();
						$page02_y = 0;
					}
				}
				if (156 <= $page02_y) {
					$pdf->AddPage();
					$page02_y = 0;
				}
			}

////////////////////////add_yarimizu////////////////////////////////////////////////////////
                        // 延滞のローンファンド
                        $label2 = "【遅延中のローンファンド 】";
                        $this->Pdf->outputText($pdf,  $page02_x, $page02_y += 12, $label2, 'L', $font_family, '', $font_size, $page02_w_max,  0, 0);
                        if (0 >= count($now_operating_1)) {
                                $meisai = "今回、ご報告の対象となる残高はございません。";
                                $this->Pdf->outputText($pdf,  $page02_x, $page02_y += 6, $meisai, 'L', $font_family, '', $font_size, $page02_w_max,  0, 0);
                        }
                        else {
                                $page02_y += 6;
                                $meisai = "銘柄名";
                                $this->Pdf->outputText($pdf,  $page02_01_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_01_w, 12, 1, 'M', $col);
                                $meisai = "お取引の種類";
                                $this->Pdf->outputText($pdf,  $page02_02_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_02_w,  6, 1, 'M', $col);
                                $meisai = "契約日";
                                $this->Pdf->outputText($pdf,  $page02_03_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_03_w,  6, 1, 'M', $col);
                                $meisai = "権利付与日";
                                $this->Pdf->outputText($pdf,  $page02_04_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_04_w,  6, 1, 'M', $col);
                                $meisai = "権利の内容(※)";
                                $this->Pdf->outputText($pdf,  $page02_05_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_05_w,  6, 1, 'M', $col);
                                $meisai = "備考";
                                $this->Pdf->outputText($pdf,  $page02_06_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_06_w, 12, 1, 'M', $col);

                                $page02_y += 6;
                                $meisai = "持分数";
                                $this->Pdf->outputText($pdf,  $page02_07_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_07_w, 6, 1, 'M', $col);
                                $meisai = "一口の金額";
                                $this->Pdf->outputText($pdf,  $page02_08_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_08_w, 6, 1, 'M', $col);
                                $meisai = "持分の総額";
                                $this->Pdf->outputText($pdf,  $page02_09_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_09_w, 6, 1, 'M', $col);
                                $meisai = "営業者報酬の利率";
                                $this->Pdf->outputText($pdf,  $page02_10_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_10_w, 6, 1, 'M', $col);

                                $add_page = false;
                                $max_i = count($now_operating_1);
                                for ($i = 0; $i < $max_i; $i++) {

                                        $page02_y = $page02_y == 0 ? 18: $page02_y += 6;
                                        $meisai = $now_operating_1[$i][COLUMN_0500020];
                                        $this->Pdf->outputText($pdf,  $page02_01_x, $page02_y, $meisai, 'L', $font_family, '', $font_size, $page02_01_w, 12, 1, 'M');
                                        $meisai = "匿名組合契約";
                                        $this->Pdf->outputText($pdf,  $page02_02_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_02_w,  6, 1, 'M');
                                        $meisai = date(DATE_FORMAT, strtotime($now_operating_1[$i][COLUMN_1200100]));
                                        $this->Pdf->outputText($pdf,  $page02_03_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_03_w,  6, 1, 'M');
                                        $this->Pdf->outputText($pdf,  $page02_04_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_04_w,  6, 1, 'M');
                                        $meisai = "匿名組合出資持分";
                                        $this->Pdf->outputText($pdf,  $page02_05_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_05_w,  6, 1, 'M');

                                        $loans = $this->Fund->getTradeBalanceReportNote($now_operating_1[$i][COLUMN_0500010]);
                                        $meisai = "";
                                        foreach ($loans as $loan_keys => $loan_value) {
                                                if (strcmp("", $meisai) == 0) {
                                                        $meisai = "運用・返済期間：".$loan_value[COLUMN_0700100]."ヶ月、貸付利率".$loan_value[COLUMN_0700090]."%";
                                                }
                                                else {
                                                        $meisai .= LINE_FEED_CODE."運用・返済期間：".$loan_value[COLUMN_0700100]."ヶ月、貸付利率".$loan_value[COLUMN_0700090]."%";
                                                }
                                        }
                                        $this->Pdf->outputText($pdf,  $page02_06_x, $page02_y, $meisai, 'L', $font_family, '', $font_size, $page02_06_w, 12, 1, 'M');

                                        $page02_y += 6;
                                        $meisai = number_format($now_operating_1[$i][COLUMN_1200070] / $now_operating_1[$i][COLUMN_0500060])."口";
                                        $this->Pdf->outputText($pdf,  $page02_07_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_07_w, 6, 1, 'M');
                                        $meisai = number_format($now_operating_1[$i][COLUMN_0500060])."円";
                                        $this->Pdf->outputText($pdf,  $page02_08_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_08_w, 6, 1, 'M');
                                        $meisai = number_format($now_operating_1[$i][COLUMN_1200070])."円";
                                        $this->Pdf->outputText($pdf,  $page02_09_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_09_w, 6, 1, 'M');
                                        $meisai = $now_operating_1[$i][COLUMN_0500130]."%";
                                        $this->Pdf->outputText($pdf,  $page02_10_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_10_w, 6, 1, 'M');

                                        if ($i == $max_i) {
                                                $meisai = "※ 商法第535条に基づく匿名組合出資持分";
                                                $this->Pdf->outputText($pdf,  $page02_x, $page02_y += 6, $meisai, 'L', $font_family, '', $font_size, $page02_w_max, 6, 0, 'M');
                                        }

                                        if (180 <= $page02_y) {
                                                $pdf->AddPage();
                                                $page02_y = 0;
                                        }
                                }
                                if (156 <= $page02_y) {
                                        $pdf->AddPage();
                                        $page02_y = 0;
                                }
                        }
/////////////////////////////////END//////////////////////////////////////////////////////////////////////////



			// お取引の明細・匿名組合契約
			$page02_y = 0 == $page02_y ? 18: $page02_y + 12;
			$label3 = "【お取引の明細・匿名組合契約 】";
			$this->Pdf->outputText($pdf,  $page02_x, $page02_y, $label3, 'L', $font_family, '', $font_size, $page02_w_max,  0, 0);
			if (0 >= count($contract)) {
				$meisai = "今回、ご報告の対象となる残高はございません。";
				$this->Pdf->outputText($pdf,  $page02_x, $page02_y += 6, $meisai, 'L', $font_family, '', $font_size, $page02_w_max,  0, 0);
			}
			else {
				$page02_y = $page02_y == 0 ? 18: $page02_y += 6;
				$meisai = "銘柄名";
				$this->Pdf->outputText($pdf,  $page02_01_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_01_w, 12, 1, 'M', $col);
				$meisai = "お取引の種類";
				$this->Pdf->outputText($pdf,  $page02_02_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_02_w,  6, 1, 'M', $col);
				$meisai = "契約日";
				$this->Pdf->outputText($pdf,  $page02_03_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_03_w,  6, 1, 'M', $col);
				$meisai = "権利付与日";
				$this->Pdf->outputText($pdf,  $page02_04_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_04_w,  6, 1, 'M', $col);
				$meisai = "権利の内容(※)";
				$this->Pdf->outputText($pdf,  $page02_05_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_05_w,  6, 1, 'M', $col);
				$meisai = "備考";
				$this->Pdf->outputText($pdf,  $page02_06_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_06_w, 12, 1, 'M', $col);

				$page02_y += 6;
				$meisai = "持分数";
				$this->Pdf->outputText($pdf,  $page02_07_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_07_w, 6, 1, 'M', $col);
				$meisai = "一口の金額";
				$this->Pdf->outputText($pdf,  $page02_08_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_08_w, 6, 1, 'M', $col);
				$meisai = "持分の総額";
				$this->Pdf->outputText($pdf,  $page02_09_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_09_w, 6, 1, 'M', $col);
				$meisai = "営業者報酬の利率";
				$this->Pdf->outputText($pdf,  $page02_10_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_10_w, 6, 1, 'M', $col);

				if (174 <= $page02_y) {
					$pdf->AddPage();
					$page02_y = 0;
				}

				$max_i = count($contract);
				for ($i = 0; $i < $max_i; $i++) {

					$page02_y = $page02_y == 0 ? 18: $page02_y += 6;
					$meisai = $contract[$i][COLUMN_0500020];
					$this->Pdf->outputText($pdf,  $page02_01_x, $page02_y, $meisai, 'L', $font_family, '', $font_size, $page02_01_w, 12, 1, 'M');
					$meisai = "匿名組合契約";
					$this->Pdf->outputText($pdf,  $page02_02_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_02_w,  6, 1, 'M');
					$meisai = date(DATE_FORMAT, strtotime($contract[$i][COLUMN_1200100]));
					$this->Pdf->outputText($pdf,  $page02_03_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_03_w,  6, 1, 'M');
					$this->Pdf->outputText($pdf,  $page02_04_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_04_w,  6, 1, 'M');
					$meisai = "匿名組合出資持分";
					$this->Pdf->outputText($pdf,  $page02_05_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_05_w,  6, 1, 'M');
					$loans = $this->Fund->getTradeBalanceReportNote($contract[$i][COLUMN_0500010]);
					$meisai = "";
					foreach ($loans as $loan_keys => $loan_value) {
						if (strcmp("", $meisai) == 0) {
							$meisai = "運用・返済期間：".$loan_value[COLUMN_0700100]."ヶ月、貸付利率".$loan_value[COLUMN_0700090]."%";
						}
						else {
							$meisai .= LINE_FEED_CODE."運用・返済期間：".$loan_value[COLUMN_0700100]."ヶ月、貸付利率".$loan_value[COLUMN_0700090]."%";
						}
					}
					$this->Pdf->outputText($pdf,  $page02_06_x, $page02_y, $meisai, 'L', $font_family, '', $font_size, $page02_06_w, 12, 1, 'M');

					$page02_y += 6;
					$meisai = number_format($contract[$i][COLUMN_1200070] / $contract[$i][COLUMN_0500060])."口";
					$this->Pdf->outputText($pdf,  $page02_07_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_07_w, 6, 1, 'M');
					$meisai = number_format($contract[$i][COLUMN_0500060])."円";
					$this->Pdf->outputText($pdf,  $page02_08_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_08_w, 6, 1, 'M');
					$meisai = number_format($contract[$i][COLUMN_1200070])."円";
					$this->Pdf->outputText($pdf,  $page02_09_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_09_w, 6, 1, 'M');
					$meisai = $contract[$i][COLUMN_0500130]."%";
					$this->Pdf->outputText($pdf,  $page02_10_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_10_w, 6, 1, 'M');

					$adjuster = 0;
					if ($i == $max_i) {
						$meisai = "※ 商法第535条に基づく匿名組合出資持分";
						$this->Pdf->outputText($pdf,  $page02_x, $page02_y += 6, $meisai, 'L', $font_family, '', $font_size, $page02_w_max, 6, 0, 'M');
						$adjuster = 6;
					}

					if (174 + $adjuster <= $page02_y) {
						$pdf->AddPage();
						$page02_y = 0;
					}
				}
			}

			// セルの幅(1レコードを1行で表示)
			$page02_01_w = 80; // 銘柄名
			$page02_02_w = 35; // お取引の種類
			$page02_03_w = 0; // 約定日
			$page02_04_w = 30; // 受渡日
			$page02_05_w = 20; // 持分数
			$page02_06_w = 25; // 一口の金額
			$page02_07_w = 30; // 持分の総額
			$page02_08_w = 30; // 出資金償還の額
			$page02_09_w = 25; // 分配金の額

			// セルのX座標
			$page02_01_x = $page02_x;
			$page02_02_x = $page02_01_x + $page02_01_w;
			$page02_03_x = $page02_02_x + $page02_02_w;
			$page02_04_x = $page02_03_x + $page02_03_w;
			$page02_05_x = $page02_04_x + $page02_04_w;
			$page02_06_x = $page02_05_x + $page02_05_w;
			$page02_07_x = $page02_06_x + $page02_06_w;
			$page02_08_x = $page02_07_x + $page02_07_w;
			$page02_09_x = $page02_08_x + $page02_08_w;

			$dividend_detail_list = Configure::read(CONFIG_0042);


			// お取引の明細・償還及び分配
			$page02_y = 0 == $page02_y ? 18: $page02_y + 12;
			$label4 = "【お取引の明細・償還及び分配】";
			$this->Pdf->outputText($pdf,  $page02_x, $page02_y, $label4, 'L', $font_family, '', $font_size, $page02_w_max,  0, 0);
			if (0 >= count($dividend)) {
				$meisai = "今回、ご報告の対象となる残高はございません。";
				$this->Pdf->outputText($pdf,  $page02_x, $page02_y += 6, $meisai, 'L', $font_family, '', $font_size, $page02_w_max,  0, 0);
			}
			else {
				$page02_y = $page02_y == 0 ? 18: $page02_y += 6;
				$meisai = "銘柄名";
				$this->Pdf->outputText($pdf,  $page02_01_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_01_w, 6, 1, 'M', $col);
				$meisai = "お取引の種類";
				$this->Pdf->outputText($pdf,  $page02_02_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_02_w, 6, 1, 'M', $col);
				//$meisai = "";
				//$this->Pdf->outputText($pdf,  $page02_03_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_03_w, 6, 1, 'M', $col);
				$meisai = "受渡日";
				$this->Pdf->outputText($pdf,  $page02_04_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_04_w, 6, 1, 'M', $col);
				$meisai = "持分数";
				$this->Pdf->outputText($pdf,  $page02_05_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_05_w, 6, 1, 'M', $col);
				$meisai = "一口の金額";
				$this->Pdf->outputText($pdf,  $page02_06_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_06_w, 6, 1, 'M', $col);
				$meisai = "持分の総額";
				$this->Pdf->outputText($pdf,  $page02_07_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_07_w, 6, 1, 'M', $col);
				$meisai = "出資金償還の額";
				$this->Pdf->outputText($pdf,  $page02_08_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_08_w, 6, 1, 'M', $col);
				$meisai = "分配金の額";
				$this->Pdf->outputText($pdf,  $page02_09_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_09_w, 6, 1, 'M', $col);

				if (186 <= $page02_y) {
					$pdf->AddPage();
					$page02_y = 0;
				}

				$max_i = count($dividend);
				for ($i = 0; $i < $max_i; $i++) {

					$page02_y = $page02_y == 0 ? 18: $page02_y += 6;

					$meisai = $dividend[$i][COLUMN_0500020];
					$this->Pdf->outputText($pdf,  $page02_01_x, $page02_y, $meisai, 'L', $font_family, '', $font_size, $page02_01_w, 6, 1, 'M');
					$meisai = $dividend_detail_list[$dividend[$i][COLUMN_1000080]];
					$this->Pdf->outputText($pdf,  $page02_02_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_02_w, 6, 1, 'M');
					//$meisai = date(DATE_FORMAT, strtotime($dividend[$i][COLUMN_1300120]));
					//$this->Pdf->outputText($pdf,  $page02_03_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_03_w, 6, 1, 'M');
					$meisai = date(DATE_FORMAT, strtotime($dividend[$i][COLUMN_1000070]));
					$this->Pdf->outputText($pdf,  $page02_04_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_04_w, 6, 1, 'M');
					$meisai = number_format($dividend[$i][COLUMN_1200070] / $dividend[$i][COLUMN_0500060])."口";
					$this->Pdf->outputText($pdf,  $page02_05_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_05_w, 6, 1, 'M');
					$meisai = number_format($dividend[$i][COLUMN_0500060])."円";
					$this->Pdf->outputText($pdf,  $page02_06_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_06_w, 6, 1, 'M');
					$meisai = number_format($dividend[$i][COLUMN_1200070])."円";
					$this->Pdf->outputText($pdf,  $page02_07_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_07_w, 6, 1, 'M');
					
					if (strcmp(DIVIDEND_DETAIL_CODE_01, $dividend[$i][COLUMN_1000080]) == 0) {

						$meisai = number_format($dividend[$i][COLUMN_1000090])."円";
						$this->Pdf->outputText($pdf,  $page02_08_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_08_w, 6, 1, 'M');
						$meisai = "";
						$this->Pdf->outputText($pdf,  $page02_09_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_09_w, 6, 1, 'M');
					}
					else {

						$meisai = "";
						$this->Pdf->outputText($pdf,  $page02_08_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_08_w, 6, 1, 'M');
						$meisai = number_format($dividend[$i][COLUMN_1000090])."円";
						$this->Pdf->outputText($pdf,  $page02_09_x, $page02_y, $meisai, 'C', $font_family, '', $font_size, $page02_09_w, 6, 1, 'M');
					}

					if ($i == $max_i) {
						$meisai = "※ 出資金の償還及び分配金は、ローンファンド毎に合算して送金しております。";
						$this->Pdf->outputText($pdf,  $page02_x, $page02_y += 6, $meisai, 'L', $font_family, '', $font_size, $page02_w_max, 6, 0, 'M');
						$meisai = "※ 上記、出資金償還及び分配金(但し、実際の送金額は源泉徴収税額を控除した額)は、ご登録の金融機関預金口座へ送金いたしました。";
						$this->Pdf->outputText($pdf,  $page02_x, $page02_y += 6, $meisai, 'L', $font_family, '', $font_size, $page02_w_max, 6, 0, 'M');
						if (156 <= $page02_y) {
							$pdf->AddPage();
							$page02_y = 0;
						}
					}
					elseif ($i >= $max_i - 1) {
						if (174 <= $page02_y) {
							$pdf->AddPage();
							$page02_y = 0;
						}
					}
					else {
						if (186 <= $page02_y) {
							$pdf->AddPage();
							$page02_y = 0;
						}
					}
				}
			}

			// 取引残高報告書のご説明
			$page02_y = 0 == $page02_y ? 18: $page02_y + 12;
			$label5 = "【取引残高報告書のご説明】";
			$this->Pdf->outputText($pdf,  $page02_x, $page02_y, $label5, 'L', $font_family, '', $font_size, $page02_w_max,  0, 0);
			$meisai = "本取引残高報告書は、3ヶ月に1回お客様の表記お取引期間において受渡日が到来しているお取引明細及び残高基準日現在の匿名組合出資持分の残高をご報告するものです。";
			$this->Pdf->outputText($pdf,  $page02_x, $page02_y += 6, $meisai, 'L', $font_family, '', $font_size, $page02_w_max, 6, 0, 'M');
			$meisai = "各ローンファンドの返済日に関しては、個別の運用報告書をご確認下さい。";
			$this->Pdf->outputText($pdf,  $page02_x, $page02_y += 6, $meisai, 'L', $font_family, '', $font_size, $page02_w_max, 6, 0, 'M');

			if (174 <= $page02_y) {
				$pdf->AddPage();
				$page02_y = 0;
			}

			// 分別保管について
			$page02_y = 0 == $page02_y ? 18: $page02_y + 12;
			$label6 = "【分別保管について】";
			$this->Pdf->outputText($pdf,  $page02_x, $page02_y, $label6, 'L', $font_family, '', $font_size, $page02_w_max,  0, 0);
			$meisai = "お客様の出資金等は、当社の固有財産を保管する銀行預金口座とは別の分別管理用預金口座に預金し分別管理しております。";
			$this->Pdf->outputText($pdf,  $page02_x, $page02_y += 6, $meisai, 'L', $font_family, '', $font_size, $page02_w_max, 6, 0, 'M');

			// $dest="I"で表示のみ、"F"でローカルに保存
			$pdf->Output($file_path, $dest);
			
		} catch (Exception $ex) {
			$err = "Pdf00005Component->savePdf で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 取引残高報告書の報告期間取得
	 * @param type $report_month
	 * @return array
	 */
	private function getReportTerm($report_month) {
		
		try {
			
			$start_year  = substr($report_month, 0, 4);
			$start_month = substr($report_month, 4);

			$start_datetime = date(DATETIME_FORMAT_1, strtotime($start_year."/".$start_month."/01"));

			$end_year  = date("Y", strtotime($start_datetime." +2 month"));
			$end_month = date("m", strtotime($start_datetime." +2 month"));

			list($date_start, $end_datetime) = $this->Calendar->getMonthBeginEnd($end_year, $end_month);

			return array($start_datetime, $end_datetime);
			
		} catch (Exception $ex) {
			$err = "Pdf00005->makePdf で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
			
	}
	
}

