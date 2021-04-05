<?php
App::uses('Component', 'Controller');

class CsvDownloadComponent extends Component {

	public $components = array(
		 "Calendar"
		,"Common"
	);
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * 経理提出用データ(ファンド)取得<br>
	 * @param number $year
	 * @param number $month
	 * @return array $result
	 * @throws Exception
	 */
	function getAccounting1($year, $month) {
		try {
			
			$result = array();
			
			// 月末月初取得
			list($date_from, $date_to) = $this->Calendar->getMonthBeginEnd($year, $month);
			
			// データ取得
			$data_list = $this->Controller->CsvData->selectAccounting1($date_from, $date_to);
			
			$repay  = 0;
			$princ  = 0;
			$reward = 0;
			$divid  = 0;
			$tax    = 0;
			$remitt = 0;
			
			foreach ($data_list as $keys => $values) {
				
				$data = array();
				$data[CSV_COLUMN_010010] = DQ.$values["a"][CSV_COLUMN_010010].DQ;
				$data[CSV_COLUMN_010020] = DQ.$values["0"][CSV_COLUMN_010020].DQ;
				$data[CSV_COLUMN_010030] = DQ.$values["0"][CSV_COLUMN_010030].DQ;
				$data[CSV_COLUMN_010040] = DQ.$values["0"][CSV_COLUMN_010040].DQ;
				$data[CSV_COLUMN_010050] = DQ.$values["0"][CSV_COLUMN_010050].DQ;
				$data[CSV_COLUMN_010060] = DQ.$values["0"][CSV_COLUMN_010060].DQ;
				$data[CSV_COLUMN_010070] = DQ.$values["d"][CSV_COLUMN_010070].DQ;
				$data[CSV_COLUMN_010080] = DQ.$values["0"][CSV_COLUMN_010080].DQ;
				$data[CSV_COLUMN_010090] = DQ.$values["d"][CSV_COLUMN_010090].DQ;
				$data[CSV_COLUMN_010100] = DQ.$values["d"][CSV_COLUMN_010100].DQ;
				$data[CSV_COLUMN_010110] = DQ.$values["0"][CSV_COLUMN_010110].DQ;
				$data[CSV_COLUMN_010120] = DQ.$values["0"][CSV_COLUMN_010120].DQ;
				
				if (strcmp("小計", $values["0"][CSV_COLUMN_010020]) == 0) {
					$repay  += $values["d"][CSV_COLUMN_010070];
					$princ  += $values["0"][CSV_COLUMN_010080];
					$reward += $values["d"][CSV_COLUMN_010090];
					$divid  += $values["d"][CSV_COLUMN_010100];
					$tax    += $values["0"][CSV_COLUMN_010110];
					$remitt += $values["0"][CSV_COLUMN_010120];
				}
				
				$result[] = $data;
			}
			
			// 合計行を追加
			if (0 < count($data_list)) {
				
				$data = array();
				$data[CSV_COLUMN_010010] = DQ."合計"  .DQ;
				$data[CSV_COLUMN_010020] = DQ.""      .DQ;
				$data[CSV_COLUMN_010030] = DQ.""      .DQ;
				$data[CSV_COLUMN_010040] = DQ.""      .DQ;
				$data[CSV_COLUMN_010050] = DQ.""      .DQ;
				$data[CSV_COLUMN_010060] = DQ.""      .DQ;
				$data[CSV_COLUMN_010070] = DQ.$repay  .DQ;
				$data[CSV_COLUMN_010080] = DQ.$princ  .DQ;
				$data[CSV_COLUMN_010090] = DQ.$reward .DQ;
				$data[CSV_COLUMN_010100] = DQ.$divid  .DQ;
				$data[CSV_COLUMN_010110] = DQ.$tax    .DQ;
				$data[CSV_COLUMN_010120] = DQ.$remitt .DQ;
				
				$result[] = $data;
			}
			
			// データを取得出来たらファイルを出力
			if (0 < count($result)) {
				$this->makeFile($result);
			}
			
			return $result;
			
		} catch (Exception $ex) {
			$err = "CsvData->getAccounting1 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 経理提出用データ(個人)取得<br>
	 * @param number $year
	 * @param number $month
	 * @return array $result
	 * @throws Exception
	 */
	function getAccounting2($year, $month) {
		try {
			
			$result = array();
			
			// 月末月初取得
			list($date_from, $date_to) = $this->Calendar->getMonthBeginEnd($year, $month);
			
			// データ取得
			$data_list = $this->Controller->CsvData->selectAccounting2($date_from, $date_to);
			
			foreach ($data_list as $keys => $values) {
				
				$data = array();
				$data[CSV_COLUMN_020010] = DQ.$values["0"][CSV_COLUMN_020010].DQ;
				$data[CSV_COLUMN_020020] = DQ.$values["0"][CSV_COLUMN_020020].DQ;
				$data[CSV_COLUMN_020030] = DQ.$values["b"][CSV_COLUMN_020030].DQ;
				$data[CSV_COLUMN_020040] = DQ.$values["b"][CSV_COLUMN_020040].DQ;
				$data[CSV_COLUMN_020050] = DQ.$values["b"][CSV_COLUMN_020050].DQ;
				$data[CSV_COLUMN_020060] = DQ.$values["0"][CSV_COLUMN_020060].DQ;
				$data[CSV_COLUMN_020070] = DQ.$values["a"][CSV_COLUMN_020070].DQ;
				
				$result[] = $data;
			}
			
			// データを取得出来たらファイルを出力
			if (0 < count($result)) {
				$this->makeFile($result);
			}
			
			return $result;
			
		} catch (Exception $ex) {
			$err = "CsvData->getAccounting2 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 配当送金データ取得<br>
	 * @param number $year
	 * @param number $month
	 * @return array $result
	 * @throws Exception
	 */
	function getDividendRemittance($year, $month) {
		try {
			
			$result = array();
			
			// 月末月初取得
			list($date_from, $date_to) = $this->Calendar->getMonthBeginEnd($year, $month);
			
			// データ取得
			$data_list = $this->Controller->CsvData->selectDividendRemittance($date_from, $date_to);
			
			foreach ($data_list as $keys => $values) {
				
				$data = array();
				$data[CSV_COLUMN_030010] = DQ.$values["0"][CSV_COLUMN_030010].DQ;
				$data[CSV_COLUMN_030020] = DQ.$values["0"][CSV_COLUMN_030020].DQ;
				$data[CSV_COLUMN_030030] = DQ.$values["a"][CSV_COLUMN_030030].DQ;
				$data[CSV_COLUMN_030040] = DQ.$values["a"][CSV_COLUMN_030040].DQ;
				$data[CSV_COLUMN_030050] = DQ.$values["0"][CSV_COLUMN_030050].DQ;
				$data[CSV_COLUMN_030060] = DQ.$values["0"][CSV_COLUMN_030060].DQ;
				$data[CSV_COLUMN_030070] = DQ.$values["a"][CSV_COLUMN_030070].DQ;
				$data[CSV_COLUMN_030080] = DQ.$values["b"][CSV_COLUMN_030080].DQ;
				$data[CSV_COLUMN_030090] = DQ.$values["a"][CSV_COLUMN_030090].DQ;
				$data[CSV_COLUMN_030100] = DQ.$values["a"][CSV_COLUMN_030100].DQ;
				$data[CSV_COLUMN_030110] = DQ.$values["a"][CSV_COLUMN_030110].DQ;
				$data[CSV_COLUMN_030120] = DQ.$values["a"][CSV_COLUMN_030120].DQ;
				$data[CSV_COLUMN_030130] = DQ.$values["a"][CSV_COLUMN_030130].DQ;
				
				$result[] = $data;
			}
			
			// データを取得出来たらファイルを出力
			if (0 < count($result)) {
				$this->makeFile($result);
			}
			
			return $result;
			
		} catch (Exception $ex) {
			$err = "CsvData->getDividendRemittance で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 書面交付譲許データ取得<br>
	 * @param number $year
	 * @param number $month
	 * @return array $result
	 * @throws Exception
	 */
	function getDocumentIssue($year, $month) {
		try {
			
			$result = array();
			
			// 月末月初取得
			list($date_from, $date_to) = $this->Calendar->getMonthBeginEnd($year, $month);
			
			// データ取得
			$data_list = $this->Controller->CsvData->selectDocumentIssue($date_from, $date_to);
			
			foreach ($data_list as $keys => $values) {
				
				$data = array();
				$data[CSV_COLUMN_040010] = DQ.$values["a"][CSV_COLUMN_040010].DQ;
				$data[CSV_COLUMN_040020] = DQ.$values["d"][CSV_COLUMN_040020].DQ;
				$data[CSV_COLUMN_040030] = DQ.$values["0"][CSV_COLUMN_040030].DQ;
				$data[CSV_COLUMN_040040] = DQ.$values["d"][CSV_COLUMN_040040].DQ;
				$data[CSV_COLUMN_040050] = DQ.$values["e"][CSV_COLUMN_040050].DQ;
				$data[CSV_COLUMN_040060] = DQ.$values["e"][CSV_COLUMN_040060].DQ;
				$data[CSV_COLUMN_040070] = DQ.$values["e"][CSV_COLUMN_040070].DQ;
				$data[CSV_COLUMN_040080] = DQ.$values["e"][CSV_COLUMN_040080].DQ;
				$data[CSV_COLUMN_040090] = DQ.$values["e"][CSV_COLUMN_040090].DQ;
				$data[CSV_COLUMN_040100] = DQ.$values["e"][CSV_COLUMN_040100].DQ;
				$data[CSV_COLUMN_040110] = DQ.$values["d"][CSV_COLUMN_040110].DQ;
				$data[CSV_COLUMN_040120] = DQ.$values["d"][CSV_COLUMN_040120].DQ;
				$data[CSV_COLUMN_040130] = DQ.$values["d"][CSV_COLUMN_040130].DQ;
				
				$result[] = $data;
			}
			
			// データを取得出来たらファイルを出力
			if (0 < count($result)) {
				$this->makeFile($result);
			}
			
			return $result;
			
		} catch (Exception $ex) {
			$err = "CsvData->getDocumentIssue で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 誕生月指定データ取得<br>
	 * @param number $year
	 * @param number $month
	 * @return array $result
	 * @throws Exception
	 */
	function getBirthdayData($year, $month) {
		try {
			
			$result = array();
			
			// データ取得
			$data_list = $this->Controller->CsvData->selectBirthdayData($year, $month);
			
			// 都道府県リスト取得
			$address1_list = Configure::read(CONFIG_0021);
			
			foreach ($data_list as $keys => $values) {
				
				$address1 = $address1_list[$values["a"][CSV_COLUMN_050090]];
				
				$data = array();
				$data[CSV_COLUMN_050010] = DQ.$values["a"][CSV_COLUMN_050010].DQ;
				$data[CSV_COLUMN_050020] = DQ.$values["a"][CSV_COLUMN_050020].DQ;
				$data[CSV_COLUMN_050030] = DQ.$values["a"][CSV_COLUMN_050030].DQ;
				$data[CSV_COLUMN_050040] = DQ.$values["a"][CSV_COLUMN_050040].DQ;
				$data[CSV_COLUMN_050050] = DQ.$values["a"][CSV_COLUMN_050050].DQ;
				$data[CSV_COLUMN_050060] = DQ.$values["a"][CSV_COLUMN_050060].DQ;
				$data[CSV_COLUMN_050070] = DQ.$values["a"][CSV_COLUMN_050070].DQ;
				$data[CSV_COLUMN_050080] = DQ.$values["a"][CSV_COLUMN_050080].DQ;
				$data[CSV_COLUMN_050090] = DQ.$address1                      .DQ;
				$data[CSV_COLUMN_050100] = DQ.$values["a"][CSV_COLUMN_050100].DQ;
				$data[CSV_COLUMN_050110] = DQ.$values["a"][CSV_COLUMN_050110].DQ;
				$data[CSV_COLUMN_050120] = DQ.$values["a"][CSV_COLUMN_050120].DQ;
				$data[CSV_COLUMN_050130] = DQ.$values["a"][CSV_COLUMN_050130].DQ;
				
				$result[] = $data;
			}
			
			// データを取得出来たらファイルを出力
			if (0 < count($result)) {
				$this->makeFile($result);
			}
			
			return $result;
			
		} catch (Exception $ex) {
			$err = "CsvData->getBirthdayData で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * CSV出力
	 * @param type $data
	 * @throws Exception
	 */
	private function makeFile($data) {
		try {
			
			$fp = fopen('php://temp/maxmemory:'.(5*1024*1024),'r+');
			
			foreach($data as $csv_data){
				fputcsv($fp, $csv_data);
			}
			
			$file_name = date(DATETIME_FORMAT_4).FILE_EXTENSION_CSV;

			header('Content-Type: text/csv');
			header("Content-Disposition: attachment; filename=".$file_name);

			//ファイルポインタを先頭へ
			rewind($fp);
			
			//リソースを読み込み文字列取得
			$csv = stream_get_contents($fp);
			
			// データをダブルクォーテーションで囲むとなぜかダブルクォーテーションが
			// 増えてしまうので、ここで置換を行う：「"""」→「"」
			$csv = str_replace(DQ.DQ.DQ, DQ, $csv);

			//CSVをエクセルで開くことを想定して文字コードをSJIS-winSJISへ
			//　→CSVをダブルクリックで開くとデータの内容によっては表示が変わってしまうため、
			//　　エクセルの「外部データ取り込み」を使わないと表示できないようUTF-8のまま出力
			//$csv = mb_convert_encoding($csv,'SJIS-win','utf8');
			print $csv;

			fclose($fp);
			
			die();
			
		} catch (Exception $ex) {
			$err = "CsvData->outputCsv で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
}
