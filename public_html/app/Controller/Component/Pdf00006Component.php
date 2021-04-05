<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::import('Vendor', 'tcpdf', array('file' => 'tcpdf/tcpdf.php'));
App::import('Vendor', 'fpdi', array('file' => 'tcpdf/fpdi.php'));

 /**
  * 年間取引報告書出力(テンプレート処理なし)
  */
class Pdf00006Component extends Component {

	public $components = array(
		 "Calendar"
		,"Company"
		,"Fund"
		,"LoanRepayment"
		,"Pdf"
		,"SessionUserInfo"
		,"User"
	);
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * 年間取引報告書PDF作成＆ダウンロード<br>
	 * @param array $pdf_param @data_list array
	 */
	function savePdf($pdf_param,$data_list,$data_list1,$data_ll) {
		try {
			
			// 取引期間
			$trade_year = $pdf_param[ARRAY_INDEX_TRADE_YEAR];
			//$date_from  = date(DATETIME_FORMAT_1, strtotime($trade_year."/01/01"));
			//$date_to    = date(DATETIME_FORMAT_2, strtotime($trade_year."/12/31"));

			// 年数を西暦から和暦に変換
			$year_ja = $this->Calendar->convertAdtoJaYear($trade_year);

			// 認証済みユーザ全件取得(別途取得してくる)
			//$data_list = $this->User->getAnnualTradeReportReceiveUser($date_from, $date_to);
                       
                        $company    = $this->Company->getCompany();
			$c_name     = $company[COLUMN_0300020];
			$c_zip      = "〒 ".substr($company[COLUMN_0300030], 0, 3)."-".substr($company[COLUMN_0300030], 3);
			$c_addr1    = $company[COLUMN_0300040];
			$c_addr2    = $company[COLUMN_0300050];
			
			// 縦向き、A4
			$pdf = new FPDI('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8');
			$font_family = PDF_DOC_FONT_NAME;
			$font_size   = 11;
			$pdf->SetAutoPageBreak(false); // 自動改ページOFF
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);
			$pdf->setFooterFont(array($font_family, '', $font_size));
			$pdf->setFooterMargin(10);

			foreach ($data_list as $key => $user) {

				$pdf->AddPage();

				$pdf_w_max = 170;
				$pdf_w_2   =  60;
				$pdf_w_3   =  50;
				$pdf_w_4   =  60;
				$pdf_w_1   = $pdf_w_2 + $pdf_w_3;

				$pdf_x1 = 20;
				$pdf_x2 = $pdf_x1 + $pdf_w_2;
				$pdf_x3 = $pdf_x2 + $pdf_w_3;
				$pdf_y  = 0;

				$pdf_h = 7;

				// 宛先
				$list[CONFIG_0021] = Configure::read(CONFIG_0021);
                                $user_id = $user['user_id'];
                                //対象ユーザーで早期償還の人データ
                                foreach ($data_list1 as $key => $value) {
                                    if ($user_id == $value['user_id']) {
                                        $dividend_amount_a += $value['dividend_amount'];
                                    }
                                }
                                //投資実績
                                foreach ($data_ll as $key => $value) {
                                    if ($user_id == $value['user_id']) {
                                        $investment_amount_b += $value['investment_amount'];
                                    }
                                }		
                                if ($investment_amount_b == null) {
                                    $sonkin = 0;
                                } else {
                                    $sonkin = $dividend_amount_a - $investment_amount_b;
                                }
                                
                                
                                $user_name = $user[COLUMN_0800060]." ".$user[COLUMN_0800070]." 様";
				$zip       = "〒 ".substr($user[COLUMN_0800160], 0, 3)."- ".substr($user[COLUMN_0800160], 3);
				$address   = $zip
						.LINE_FEED_CODE.$list[CONFIG_0021][$user[COLUMN_0800170]].$user[COLUMN_0800180]
						.LINE_FEED_CODE.$user[COLUMN_0800190]
						.LINE_FEED_CODE.LINE_FEED_CODE.$user_name;
				$address_x = 23;
				$address_y = 12;
				$address_w = 70;
				$this->Pdf->outputText($pdf, $address_x, $address_y  , $address, 'L', $font_family, '', $font_size, $address_w, 0, 0);

				// 会社情報
				$company_zip     = $c_zip.LINE_FEED_CODE;
				$company_name    = $c_name.LINE_FEED_CODE;
				$company_address = $c_addr1."　".$c_addr2.LINE_FEED_CODE;
				$pdf->Image("img/7_kaku.gif", 170, 55, 21, 21);
                                $this->Pdf->outputText($pdf, $pdf_x1, $pdf_y += $pdf_h * 6, $company_zip     , 'R', $font_family, '', $font_size, $pdf_w_max, $pdf_h, 0);
				$this->Pdf->outputText($pdf, $pdf_x1, $pdf_y += $pdf_h    , $company_address , 'R', $font_family, '', $font_size, $pdf_w_max, $pdf_h, 0);
				$this->Pdf->outputText($pdf, $pdf_x1, $pdf_y += $pdf_h    , $company_name    , 'R', $font_family, '', $font_size, $pdf_w_max, $pdf_h, 0);

				// タイトル
				$title  = "年間取引報告書";
				$this->Pdf->outputText($pdf, $pdf_x1, $pdf_y += $pdf_h * 2, $title, 'C', $font_family, 'B', $font_size, $pdf_w_max, $pdf_h, 0);

				// 文章１
				$value1  = $year_ja."年度中のお取引は以下の通りとなります。";
				$this->Pdf->outputText($pdf, $pdf_x1, $pdf_y += $pdf_h * 2, $value1, 'L', $font_family, '', $font_size, $pdf_w_max, $pdf_h, 0);

				// 明細
				$label1   = "年間の税引前利益金額の合計　※1";
				$label2   = "年間の損失金額の合計　※2";
				$label3   = "年間の税引前損益通算金額　※3";
				$label4   = "年間の支払済み源泉徴収金額の合計　※4";
				//$label5   = "年間の実行手数料(契約時報酬)金額の合計　※5";
				//$label5_1 = "消費税込金額";
				//$label5_2 = "内、消費税";
				$amount1   = "￥".number_format($user[COLUMN_1000090]);
				$amount2   = "￥".number_format(abs($sonkin));
				$amount3   = "￥".number_format($user[COLUMN_1000090] - abs($sonkin)); //20210302 add_yarimizu 損金通算金額表示
				$amount4   = "￥".number_format($user[COLUMN_1000100]);
				//$amount5   = "￥".number_format(0);
				$amount5_1 = "￥".number_format($dividend_amount_a);
				$amount5_2 = "￥".number_format($investment_amount_b);
				$this->Pdf->outputText($pdf, $pdf_x1, $pdf_y += $pdf_h * 2, $label1   , 'L', $font_family, '', $font_size, $pdf_w_1, $pdf_h    , 1, 'M');
				$this->Pdf->outputText($pdf, $pdf_x3, $pdf_y              , $amount1  , 'R', $font_family, '', $font_size, $pdf_w_4, $pdf_h    , 1, 'M');
				$this->Pdf->outputText($pdf, $pdf_x1, $pdf_y += $pdf_h    , $label2   , 'L', $font_family, '', $font_size, $pdf_w_1, $pdf_h    , 1, 'M');
				$this->Pdf->outputText($pdf, $pdf_x3, $pdf_y              , $amount2  , 'R', $font_family, '', $font_size, $pdf_w_4, $pdf_h    , 1, 'M');
				$this->Pdf->outputText($pdf, $pdf_x1, $pdf_y += $pdf_h    , $label3   , 'L', $font_family, '', $font_size, $pdf_w_1, $pdf_h    , 1, 'M');
				$this->Pdf->outputText($pdf, $pdf_x3, $pdf_y              , $amount3  , 'R', $font_family, '', $font_size, $pdf_w_4, $pdf_h    , 1, 'M');
				$this->Pdf->outputText($pdf, $pdf_x1, $pdf_y += $pdf_h    , $label4   , 'L', $font_family, '', $font_size, $pdf_w_1, $pdf_h    , 1, 'M');
				$this->Pdf->outputText($pdf, $pdf_x3, $pdf_y              , $amount4  , 'R', $font_family, '', $font_size, $pdf_w_4, $pdf_h    , 1, 'M');
				//$this->Pdf->outputText($pdf, $pdf_x1, $pdf_y += $pdf_h    , $label5   , 'L', $font_family, '', $font_size, $pdf_w_2, $pdf_h * 2, 1, 'M');
				//$this->Pdf->outputText($pdf, $pdf_x2, $pdf_y              , $label5_1 , 'L', $font_family, '', $font_size, $pdf_w_3, $pdf_h    , 1, 'M');
				//$this->Pdf->outputText($pdf, $pdf_x3, $pdf_y              , $amount5_1, 'R', $font_family, '', $font_size, $pdf_w_4, $pdf_h    , 1, 'M');
				//$this->Pdf->outputText($pdf, $pdf_x2, $pdf_y += $pdf_h    , $label5_2 , 'L', $font_family, '', $font_size, $pdf_w_3, $pdf_h    , 1, 'M');
				//$this->Pdf->outputText($pdf, $pdf_x3, $pdf_y              , $amount5_2, 'R', $font_family, '', $font_size, $pdf_w_4, $pdf_h    , 1, 'M');

				// 文章２
				$value1  = "(注)確定申告の基礎資料としてご活用頂けます。";
				$value2  = "申告方法の詳細につきまして、税務署又は税理士等の専門家へお問い合わせください。";
				$this->Pdf->outputText($pdf, $pdf_x1, $pdf_y += $pdf_h * 2, $value1, 'L', $font_family, '', $font_size, $pdf_w_max, $pdf_h, 0);
				$this->Pdf->outputText($pdf, $pdf_x1, $pdf_y += $pdf_h    , $value2, 'L', $font_family, '', $font_size, $pdf_w_max, $pdf_h, 0);

				// ※1～5
				$value1  = "※1　".$year_ja."年1月から".$year_ja."年12月までに分配した利益金額(源泉所得税控除前)の合計額";
				$value2  = "※2　".$year_ja."年1月から".$year_ja."年12月までに分配した損失金額の合計額";
				$value3  = "※3　※1から※2を控除した金額";
				$value4  = "※4　".$year_ja."年1月から".$year_ja."年12月までに徴収した源泉所得税の合計額";
				//$value5  = "※5　".$year_ja."年1月から".$year_ja."年12月までにお支払いいただいた契約時報酬の合計額";
				$this->Pdf->outputText($pdf, $pdf_x1, $pdf_y += $pdf_h * 2, $value1, 'L', $font_family, '', $font_size, $pdf_w_max, $pdf_h, 0);
				$this->Pdf->outputText($pdf, $pdf_x1, $pdf_y += $pdf_h    , $value2, 'L', $font_family, '', $font_size, $pdf_w_max, $pdf_h, 0);
				$this->Pdf->outputText($pdf, $pdf_x1, $pdf_y += $pdf_h    , $value3, 'L', $font_family, '', $font_size, $pdf_w_max, $pdf_h, 0);
				$this->Pdf->outputText($pdf, $pdf_x1, $pdf_y += $pdf_h    , $value4, 'L', $font_family, '', $font_size, $pdf_w_max, $pdf_h, 0);
				$this->Pdf->outputText($pdf, $pdf_x1, $pdf_y += $pdf_h    , $value5, 'L', $font_family, '', $font_size, $pdf_w_max, $pdf_h, 0);
			
                                // フォルダが無い場合、作成する。
			        if (!file_exists(TEMPLATE_PDF_DIR_2.$user_id)) {
				   if (!mkdir(TEMPLATE_PDF_DIR_2.$user_id, 0777)) {
					throw new Exception();
				   }
			        }  
			        // ファイルパス関係
			        $revision = "01";
			        $file_path = INV_DOC_CAT_ID.INV_DOC_ID_00006."_".$trade_year."_".$revision.FILE_EXTENSION_PDF;
                                $file_path = TEMPLATE_PDF_DIR_2.$user_id."/".$file_path;
			}
                        //出力 Fでローカルに保存Dは表示
			$pdf->Output($file_path, 'F');
                        
		} catch (Exception $ex) {
			$err = "Pdf00006->savePdf で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
}
