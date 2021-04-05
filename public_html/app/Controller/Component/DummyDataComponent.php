<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class DummyDataComponent extends Component {
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * ViewTest
	 * @return array $data
	 */
	function v020020() {
		
		try {
			
			$data = array(
				 OBJECT_ID_020020010 => "test@trust-finance.net"
				,OBJECT_ID_020020020 => "aaaaaa"
				,OBJECT_ID_020020030 => "1"
				,OBJECT_ID_020020040 => "ぽち"
			);
			return $data;
			
		} catch (Exception $ex) {
			$err = "DummyData->v020020 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * ViewTest
	 * @return array $data
	 */
	function v030020() {

		try {
			
			$data = array(
				 OBJECT_ID_030020010 => "" ,OBJECT_ID_030020020 => "" ,OBJECT_ID_030020030 => "" 
				,OBJECT_ID_030020040 => "" ,OBJECT_ID_030020050 => "" ,OBJECT_ID_030020060 => "" 
				,OBJECT_ID_030020070 => "" ,OBJECT_ID_030020080 => "" ,OBJECT_ID_030020090 => "" 
				,OBJECT_ID_030020100 => "" ,OBJECT_ID_030020110 => "" ,OBJECT_ID_030020120 => "" 
				,OBJECT_ID_030020130 => "" ,OBJECT_ID_030020140 => "" ,OBJECT_ID_030020150 => "" 
				,OBJECT_ID_030020160 => "" ,OBJECT_ID_030020170 => "" ,OBJECT_ID_030020180 => "" 
				,OBJECT_ID_030020190 => "" ,OBJECT_ID_030020200 => "" ,OBJECT_ID_030020210 => "" 
				,OBJECT_ID_030020220 => "" ,OBJECT_ID_030020230 => "" ,OBJECT_ID_030020240 => "" 
				,OBJECT_ID_030020250 => "" ,OBJECT_ID_030020260 => "" ,OBJECT_ID_030020270 => "" 
				,OBJECT_ID_030020280 => "" ,OBJECT_ID_030020290 => "" ,OBJECT_ID_030020300 => "" 
				,OBJECT_ID_030020310 => "" ,OBJECT_ID_030020320 => "" ,OBJECT_ID_030020330 => "" 
				,OBJECT_ID_030020340 => "" ,OBJECT_ID_030020350 => "" ,OBJECT_ID_030020360 => "" 
				,OBJECT_ID_030020370 => "" ,OBJECT_ID_030020380 => "" ,OBJECT_ID_030020390 => "" 
				,OBJECT_ID_030020400 => "" ,OBJECT_ID_030020410 => "" ,OBJECT_ID_030020420 => "" 
			);

			return $data;
			
		} catch (Exception $ex) {
			$err = "DummyData->v030020 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * ViewTest
	 * @return array $data
	 */
	function v030030() {

		try {
			
			$data = array(
				 OBJECT_ID_030020010 => "田中"
				,OBJECT_ID_030020020 => "一郎"
				,OBJECT_ID_030020030 => "タナカ"
				,OBJECT_ID_030020040 => "イチロウ"
				,OBJECT_ID_030020050 => "1"
				,OBJECT_ID_030020060 => "1979"
				,OBJECT_ID_030020070 => "8"
				,OBJECT_ID_030020080 => "26"
				,OBJECT_ID_030020090 => "1080022"
				,OBJECT_ID_030020100 => "13"
				,OBJECT_ID_030020110 => "港区海岸3-9-15"
				,OBJECT_ID_030020120 => "LOOP-X 7F"
				,OBJECT_ID_030020130 => "03-9999-9999"
				,OBJECT_ID_030020140 => "090-9999-9999"
				,OBJECT_ID_030020150 => "1"
				,OBJECT_ID_030020160 => "1"
				,OBJECT_ID_030020170 => "1"
				,OBJECT_ID_030020180 => "1"
				,OBJECT_ID_030020190 => "1"
				,OBJECT_ID_030020200 => "1"
				,OBJECT_ID_030020210 => "1"
				,OBJECT_ID_030020220 => "1"
				,OBJECT_ID_030020230 => "株式会社ネットスタジアム"
				,OBJECT_ID_030020240 => "1"
				,OBJECT_ID_030020250 => "1080022"
				,OBJECT_ID_030020260 => "東京都港区海岸"
				,OBJECT_ID_030020270 => "03-9999-9999"
				,OBJECT_ID_030020280 => "2"
				,OBJECT_ID_030020290 => "＊＊銀行"
				,OBJECT_ID_030020300 => "＊＊支店"
				,OBJECT_ID_030020310 => "1"
				,OBJECT_ID_030020320 => ""
				,OBJECT_ID_030020330 => "9999999"
				,OBJECT_ID_030020340 => "タナカ　イチロウ"
				,OBJECT_ID_030020350 => "1"
				,OBJECT_ID_030020360 => "1"
				,OBJECT_ID_030020370 => "1"
				,OBJECT_ID_030020380 => "1"
				,OBJECT_ID_030020390 => "1"
				,OBJECT_ID_030020400 => "1"
				,OBJECT_ID_030020410 => "1"
				,OBJECT_ID_030020420 => "1"
				,OBJECT_ID_030020430 => "1"
				,OBJECT_ID_030020440 => "1"
				,OBJECT_ID_030020450 => "1"
				,OBJECT_ID_030020460 => "1"
			);

			return $data;
			
		} catch (Exception $ex) {
			$err = "DummyData->v030030 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * ViewTest
	 * @return array $data
	 */
	function v030060() {
		
		try {
			
			$data = array(
				 HIDDEN_ID_000000020 => ""
				,OBJECT_ID_030060010 => ""
			);
			return $data;
			
		} catch (Exception $ex) {
			$err = "DummyData->v030060 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * ViewTest
	 * @return array $data
	 */
	function v040050() {
		
		try {
			
			$data = array(
				array(
					MODEL_NAME_120 => array(
						 COLUMN_1200030 => "00001"                // ファンドID
						,COLUMN_1200050 => "ファンドＡ"            // ファンド名
						,COLUMN_1200060 => "2015-09-04 13:00:00"  // 投資申込日時
						,COLUMN_1200070 => "100,000"              // 投資金額
						,COLUMN_1200080 => "2015-09-06"           // 入金期限
						,COLUMN_1200100 => ""                     // 承認日
						,COLUMN_1200130 => ""                     // 取消日
					)
				)
				,array(
					MODEL_NAME_120 => array(
						 COLUMN_1200030 => "00001"                // ファンドID
						,COLUMN_1200050 => "ファンドＡ"            // ファンド名
						,COLUMN_1200060 => "2015-09-02 14:00:00"  // 投資申込日時
						,COLUMN_1200070 => "200,000"              // 投資金額
						,COLUMN_1200080 => "2015-09-05"           // 入金期限
						,COLUMN_1200100 => "2015-09-03"           // 承認日
						,COLUMN_1200130 => ""                     // 取消日
					)
				)
				,array(
					MODEL_NAME_120 => array(
						 COLUMN_1200030 => "00001"                // ファンドID
						,COLUMN_1200050 => "ファンドＡ"            // ファンド名
						,COLUMN_1200060 => "2015-08-30 12:30:00"  // 投資申込日時
						,COLUMN_1200070 => "100,000"              // 投資金額
						,COLUMN_1200080 => "2015-09-02"           // 入金期限
						,COLUMN_1200100 => ""                     // 承認日
						,COLUMN_1200130 => "2015-09-02"           // 取消日
					)
				)
			);

			$data = $this->Controller->InvestmentHistory->getInvestmentHistories("00000001", "2015-08-01 00:00:00", "2015-09-30 23:59:59");

			return $data;
			
		} catch (Exception $ex) {
			$err = "DummyData->v040050 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * ViewTest
	 * @return array $data
	 */
	function v040060() {
		
		try {
			
			$data = array(
				array(
					MODEL_NAME_100 => array(
						 COLUMN_1000070 => "2015/11/10" // 配当日
						,COLUMN_1000050 => "ファンドＡ"  // ファンド名
						,COLUMN_1000080 => "1"      // 内容
						,COLUMN_1000090 => "340"          // 金額(増加)
						,COLUMN_1000100 => ""            // 金額(減少)
					)
				)
				,array(
					MODEL_NAME_100 => array(
						 COLUMN_1000070 => "2015/11/10" // 配当日
						,COLUMN_1000050 => "ファンドＡ"  // ファンド名
						,COLUMN_1000080 => "2"  // 内容
						,COLUMN_1000090 => ""           // 金額(増加)
						,COLUMN_1000100 => "20"          // 金額(減少)
					)
				)
				,array(
					MODEL_NAME_100 => array(
						 COLUMN_1000070 => "2015/11/10" // 配当日
						,COLUMN_1000050 => "ファンドＡ"  // ファンド名
						,COLUMN_1000080 => "1"      // 内容
						,COLUMN_1000090 => "130"          // 金額(増加)
						,COLUMN_1000100 => ""            // 金額(減少)
					)
				)
				,array(
					MODEL_NAME_100 => array(
						 COLUMN_1000070 => "2015/11/10" // 配当日
						,COLUMN_1000050 => "ファンドＡ"  // ファンド名
						,COLUMN_1000080 => "2"  // 内容
						,COLUMN_1000090 => ""           // 金額(増加)
						,COLUMN_1000100 => "70"          // 金額(減少)
					)
				)
				,array(
					MODEL_NAME_100 => array(
						 COLUMN_1000070 => "2015/11/10" // 配当日
						,COLUMN_1000050 => "ファンドＢ"  // ファンド名
						,COLUMN_1000080 => "1"      // 内容
						,COLUMN_1000090 => "390"          // 金額(増加)
						,COLUMN_1000100 => ""            // 金額(減少)
					)
				)
				,array(
					MODEL_NAME_100 => array(
						 COLUMN_1000070 => "2015/11/10" // 配当日
						,COLUMN_1000050 => "ファンドＢ"  // ファンド名
						,COLUMN_1000080 => "2"  // 内容
						,COLUMN_1000090 => ""           // 金額(増加)
						,COLUMN_1000100 => "10"          // 金額(減少)
					)
				)
			);

			//$data = $this->Controller->DividendHistory->getDividendHistories("00000001", "2015-08-01 00:00:00", "2015-12-30 23:59:59");

			return $data;
			
		} catch (Exception $ex) {
			$err = "DummyData->v040060 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * ViewTest
	 * @return array $data
	 */
	function v040070() {

		try {
			
			$data = array(
				 OBJECT_ID_040070010 => "99999999"
				,OBJECT_ID_040070020 => "田中"
				,OBJECT_ID_040070030 => "一郎"
				,OBJECT_ID_040070040 => "タナカ"
				,OBJECT_ID_040070050 => "イチロウ"
				,OBJECT_ID_040070060 => "aaa@aaa.com"
				,OBJECT_ID_040070070 => "1"
				,OBJECT_ID_040070080 => "1980-10-10"
				,OBJECT_ID_040070090 => "9999999"
				,OBJECT_ID_040070100 => "13"
				,OBJECT_ID_040070110 => "港区海岸3-9-15"
				,OBJECT_ID_040070120 => "LOOP-X 7F"
				,OBJECT_ID_040070130 => "03-9999-9999"
				,OBJECT_ID_040070140 => "090-9999-9999"
				,OBJECT_ID_040070150 => "1"
				,OBJECT_ID_040070160 => "1"
				,OBJECT_ID_040070170 => "1"
				,OBJECT_ID_040070180 => "1"
				,OBJECT_ID_040070190 => "1"
				,OBJECT_ID_040070200 => "1"
				,OBJECT_ID_040070210 => "1"
				,OBJECT_ID_040070220 => "1"
				,OBJECT_ID_040070230 => "株式会社ネットスタジアム"
				,OBJECT_ID_040070240 => "1"
				,OBJECT_ID_040070250 => "1080022"
				,OBJECT_ID_040070260 => "東京都港区海岸3-9-15"
				,OBJECT_ID_040070270 => "03-9999-9999"
				,OBJECT_ID_040070280 => "2"
				,OBJECT_ID_040070290 => "みずほ銀行"
				,OBJECT_ID_040070300 => "本店"
				,OBJECT_ID_040070310 => "1"
				,OBJECT_ID_040070320 => ""
				,OBJECT_ID_040070330 => "9999999"
				,OBJECT_ID_040070340 => "タナカ　イチロウ"
				,OBJECT_ID_040070350 => "1"
				,OBJECT_ID_040070360 => "1"
				,OBJECT_ID_040070370 => "1"
				,OBJECT_ID_040070380 => "1"
				,OBJECT_ID_040070390 => "1"
				,OBJECT_ID_040070400 => "1"
				,OBJECT_ID_040070410 => "1"
				,OBJECT_ID_040070420 => "1"
				,OBJECT_ID_040070430 => "1"
				,OBJECT_ID_040070440 => "1"
				,OBJECT_ID_040070450 => "1"
				,OBJECT_ID_040070460 => "1"
			);

			return $data;
			
		} catch (Exception $ex) {
			$err = "DummyData->v040070 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * ViewTest
	 * @return array $data
	 */
	function v040090() {
		
		try {
			
			$data = array(
				array(
					TABLE_NAME_110 => array(
						 COLUMN_1100030 => "at20150003" // お知らせ番号
						,COLUMN_1100050 => "お知らせ３"  // 件名
						,COLUMN_1100130 => "2015-08-20" // 掲載日
					)
				)
				,array(
					TABLE_NAME_110 => array(
						 COLUMN_1100030 => "at20150002" // お知らせ番号
						,COLUMN_1100050 => "お知らせ２" // 件名
						,COLUMN_1100130 => "2015-08-15" // 掲載日
					)
				)
				,array(
					TABLE_NAME_110 => array(
						 COLUMN_1100030 => "at20150001" // お知らせ番号
						,COLUMN_1100050 => "お知らせ１" // 件名
						,COLUMN_1100130 => "2015-08-10" // 掲載日
					)
				)
			);

			//$data = $this->Controller->InformationHistory->getInformationList("00000001");

			return $data;
			
		} catch (Exception $ex) {
			$err = "DummyData->v040090 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * ViewTest
	 * @return array $data
	 */
	function v040100() {
		
		try {
			
			$data = array(
				array(
					TABLE_NAME_110 => array(
						 COLUMN_1100010 => "1" // ユーザID
						,COLUMN_1100020 => "00000001" // 
						,COLUMN_1100030 => "at20150001" // 
						,COLUMN_1100040 => "" // 
						,COLUMN_1100050 => "投資申請を受け付けました。" // 
						,COLUMN_1100060 => "投資申請を受け付けました。<br>契約締結時書面に同意して下さい。" // 
						,COLUMN_1100070 => "1" // 
						,COLUMN_1100080 => "1" // 
						,COLUMN_1100090 => "" // 
						,COLUMN_1100100 => "00001" // 
						,COLUMN_1100110 => "00003" // 
						,COLUMN_1100120 => "1.00" // 
						,COLUMN_1100130 => "2015-08-10" // 
						,COLUMN_1100140 => "" // 
						,COLUMN_1100150 => "" // 
					)
				)
			);

			//$data = $this->Controller->InformationHistory->getInformationList("00000001");

			return $data;
			
		} catch (Exception $ex) {
			$err = "DummyData->v040100 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * ViewTest
	 * @return array $data
	 */
	function v040110() {
		
		try {
			
			$data = array(
				array(
					MODEL_NAME_090 => array(
						 COLUMN_0900090 => "2015/08/31 16:15:00" // 同意日時
						,COLUMN_0900040 => "ファンドＡ"          // ファンド名
						,COLUMN_0900100 => "2"                   // 内容
						,COLUMN_0900050 => "00007"               // 書面ID
						,COLUMN_0900060 => "契約締結時交付書面"  // 書面名
						,COLUMN_0900070 => "http://localhost/escrowd/projects/00001/files/契約締結時交付書面-rev1.00.pdf"  // 書面リンク
					)
				)
				,array(
					MODEL_NAME_090 => array(
						 COLUMN_0900090 => "2015/08/30 14:30:00" // 同意日時
						,COLUMN_0900040 => "ファンドＡ"          // ファンド名
						,COLUMN_0900100 => "2"                   // 内容
						,COLUMN_0900050 => "00005"               // 書面ID
						,COLUMN_0900060 => "契約締結前交付書面"  // 書面名
						,COLUMN_0900070 => "http://localhost/escrowd/projects/00001/files/契約締結前交付書面-rev1.00.pdf"  // 書面リンク
					)
				)
				,array(
					MODEL_NAME_100 => array(
						 COLUMN_0900090 => "2015/08/30 14:30:00" // 同意日時
						,COLUMN_0900040 => "ファンドＡ"          // ファンド名
						,COLUMN_0900100 => "2"                   // 内容
						,COLUMN_0900050 => "00006"               // 書面ID
						,COLUMN_0900060 => "匿名組合契約約款"    // 書面名
						,COLUMN_0900070 => "http://localhost/escrowd/projects/00001/files/匿名組合契約約款-rev1.00.pdf"    // 書面リンク
					)
				)
				,array(
					MODEL_NAME_100 => array(
						 COLUMN_0900090 => "2015/08/10 13:00:00" // 同意日時
						,COLUMN_0900040 => "-"                   // ファンド名
						,COLUMN_0900100 => "1"                   // 内容
						,COLUMN_0900050 => "00001"               // 書面ID
						,COLUMN_0900060 => "トラストレンディング利用規約" // 書面名
						,COLUMN_0900070 => "http://localhost/escrowd/files/トラストレンディング利用規約-rev1.00.pdf" // 書面リンク
					)
				)
				,array(
					MODEL_NAME_100 => array(
						 COLUMN_0900090 => "2015/08/10 13:00:00" // 同意日時
						,COLUMN_0900040 => "-"                   // ファンド名
						,COLUMN_0900100 => "1"                   // 内容
						,COLUMN_0900050 => "00002"               // 書面ID
						,COLUMN_0900060 => "締結前交付書面"      // 書面名
						,COLUMN_0900070 => "http://localhost/escrowd/files/契約締結前交付書面-rev1.00.pdf"      // 書面リンク
					)
				)
				,array(
					MODEL_NAME_100 => array(
						 COLUMN_0900090 => "2015/08/10 13:00:00" // 同意日時
						,COLUMN_0900040 => "-"                   // ファンド名
						,COLUMN_0900100 => "1"                   // 内容
						,COLUMN_0900050 => "00003"               // 書面ID
						,COLUMN_0900060 => "匿名組合契約約款"    // 書面名
						,COLUMN_0900070 => "http://localhost/escrowd/files/匿名組合契約約款-rev1.00.pdf"    // 書面リンク
					)
				)
				,array(
					MODEL_NAME_100 => array(
						 COLUMN_0900090 => "2015/08/10 13:00:00" // 同意日時
						,COLUMN_0900040 => "-"                   // ファンド名
						,COLUMN_0900100 => "1"                   // 内容
						,COLUMN_0900050 => "00004"               // 書面ID
						,COLUMN_0900060 => "電磁的方法による書面の交付に関する同意書" // 書面名
						,COLUMN_0900070 => "http://localhost/escrowd/files/電磁的方法による書面の交付に関する同意書-rev1.00.pdf" // 書面リンク
					)
				)
			);

			//$data = $this->Controller->AgreementHistory->getAgreementHistories("00000001", "2015-08-01 00:00:00", "2015-12-30 23:59:59");

			return $data;
			
		} catch (Exception $ex) {
			$err = "DummyData->v040110 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * ファンド一覧
	 * @return array $data
	 */
	function v050110($datetime) {
		
		try {
			
			$data = array(
				array(
					MODEL_NAME_050 => array(
						 COLUMN_0500010 => "00001"               // 同意日時
						,COLUMN_0500020 => "ファンドＡ"          // ファンド名
						,COLUMN_0500030 => "10000000"          // 貸付予定額
						,COLUMN_0500040 => "9500000"           // 貸付額
						,COLUMN_0500080 => "2015/08/01 10:00:00" // 募集開始日
						,COLUMN_0500090 => "2015/08/25 23:59:59" // 募集終了日
						,COLUMN_0500100 => "2015/09/01"          // 運用開始日
						,COLUMN_0500110 => "2016/08/31"          // 運用終了日
						,COLUMN_0500130 => "4.99"                // 営業者利回り
						,COLUMN_0500140 => "10.01"               // 目標利回り
					)
				)
				,array(
					MODEL_NAME_050 => array(
						 COLUMN_0500010 => "00002"               // 同意日時
						,COLUMN_0500020 => "ファンドＢ"          // ファンド名
						,COLUMN_0500030 => "10000000"          // 貸付予定額
						,COLUMN_0500040 => "9200000"           // 貸付額
						,COLUMN_0500080 => "2015/09/01 10:00:00" // 募集開始日
						,COLUMN_0500090 => "2015/09/25 23:59:59" // 募集終了日
						,COLUMN_0500100 => "2015/10/01"          // 運用開始日
						,COLUMN_0500110 => "2016/09/30"          // 運用終了日
						,COLUMN_0500130 => "4.99"                // 営業者利回り
						,COLUMN_0500140 => "10.01"               // 目標利回り
					)
				)
				,array(
					MODEL_NAME_050 => array(
						 COLUMN_0500010 => "00003"               // 同意日時
						,COLUMN_0500020 => "ファンドＣ"          // ファンド名
						,COLUMN_0500030 => "10000000"          // 貸付予定額
						,COLUMN_0500040 => "0"                   // 貸付額
						,COLUMN_0500080 => "2015/10/01 10:00:00" // 募集開始日
						,COLUMN_0500090 => "2015/10/25 23:59:59" // 募集終了日
						,COLUMN_0500100 => "2015/11/01"          // 運用開始日
						,COLUMN_0500110 => "2016/10/31"          // 運用終了日
						,COLUMN_0500130 => "4.99"                // 営業者利回り
						,COLUMN_0500140 => "10.01"               // 目標利回り
					)
				)
			);

			// $data = $this->Controller->Fund->searchFund();

			return $data;
			
		} catch (Exception $ex) {
			$err = "DummyData->v050110 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * c050admin/v130fundinput
	 */
	function v050130() {
		
		try {
			
			$data = array(
				array(
					MODEL_NAME_140 => array(
						 COLUMN_1400010 => "00001"               // ファンドID
						,COLUMN_1400020 => "ファンドＡ"          // ファンド名
						,COLUMN_1400030 => "10000000"            // 貸付予定額合計
						,COLUMN_1400040 => "9000000"             // 貸付額合計
						,COLUMN_1400050 => "8000000"             // 最低成立額
						,COLUMN_1400060 => "100000"              // 最低投資額
						,COLUMN_1400080 => "2015/09/01 10:00:00" // 募集開始日時
						,COLUMN_1400090 => "2015/09/25 23:59:59" // 募集終了日時
						,COLUMN_1400100 => "2015/10/01 00:00:00" // 運用開始日
						,COLUMN_1400110 => "2017/09/30 00:00:00" // 運用終了日
						,COLUMN_1400130 => "4.98"                // 営業者利回り
						,COLUMN_1400140 => "10.00"               // 目標利回り
						,COLUMN_1400150 => "当ファンドは、不動産開発事業者の不動産仕入及び建設等を資金面から支援する目的で組成されたファンドです。投資家の皆様に安全性を考慮した、投資商品のご案内をさせていただきます。"               // 概要説明
					)
				)
			);

			//$data = $this->Controller->InformationHistory->getInformationList("00000001");

			return $data;
			
		} catch (Exception $ex) {
			$err = "DummyData->v050130 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * c050admin/v140fundconfirm
	 */
	function v050140() {
		
		try {
			
			$data = array(
				array(
					MODEL_NAME_140 => array(
						 COLUMN_1400010 => "00001"               // ファンドID
						,COLUMN_1400020 => "ファンドＡ"          // ファンド名
						,COLUMN_1400030 => "10000000"            // 貸付予定額合計
						,COLUMN_1400040 => "9000000"             // 貸付額合計
						,COLUMN_1400050 => "8000000"             // 最低成立額
						,COLUMN_1400060 => "100000"              // 最低投資額
						,COLUMN_1400080 => "2015/09/01 10:00:00" // 募集開始日時
						,COLUMN_1400090 => "2015/09/25 23:59:59" // 募集終了日時
						,COLUMN_1400100 => "2015/10/01 00:00:00" // 運用開始日
						,COLUMN_1400110 => "2017/09/30 00:00:00" // 運用終了日
						,COLUMN_1400130 => "4.98"                // 営業者利回り
						,COLUMN_1400140 => "10.00"               // 目標利回り
					)
				)
			);

			//$data = $this->Controller->InformationHistory->getInformationList("00000001");

			return $data;
			
		} catch (Exception $ex) {
			$err = "DummyData->v050140 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * 投資申込一覧
	 * @return array $data
	 */
	function v050080() {

		try {
			
			$data = array(
				array(
					MODEL_NAME_120 => array(
						 COLUMN_1200020 => "00000001"                     // 投資家ID
						,COLUMN_1200030 => "田中　一郎"                   // 投資家名
						,COLUMN_1200040 => "00001"                        // ファンドID
						,COLUMN_1200050 => "ファンドＡ"                   // ファンド名
						,COLUMN_1200060 => "2015/10/25 15:20:35"          // 投資申込日時
						,COLUMN_1200070 => "200000"                       // 投資額
						,COLUMN_1200080 => "2015/10/28"                   // 入金期限
						,COLUMN_1200090 => INVESTMENT_STATUS_CODE_APPLIED // 状態
					)
				)
				,array(
					MODEL_NAME_120 => array(
						 COLUMN_1200020 => "00000001"                     // 投資家ID
						,COLUMN_1200030 => "田中　一郎"                   // 投資家名
						,COLUMN_1200040 => "00001"                        // ファンドID
						,COLUMN_1200050 => "ファンドＢ"                   // ファンド名
						,COLUMN_1200060 => "2015/10/25 15:10:45"          // 投資申込日時
						,COLUMN_1200070 => "100000"                       // 投資額
						,COLUMN_1200080 => "2015/10/28"                   // 入金期限
						,COLUMN_1200090 => INVESTMENT_STATUS_CODE_APPLIED // 状態
					)
				)
				,array(
					MODEL_NAME_120 => array(
						 COLUMN_1200020 => "00000002"                     // 投資家ID
						,COLUMN_1200030 => "鈴木　次郎"                   // 投資家名
						,COLUMN_1200040 => "00001"                        // ファンドID
						,COLUMN_1200050 => "ファンドＡ"                   // ファンド名
						,COLUMN_1200060 => "2015/10/21 11:20:35"          // 投資申込日時
						,COLUMN_1200070 => "300000"                       // 投資額
						,COLUMN_1200080 => "2015/10/24"                   // 入金期限
						,COLUMN_1200090 => INVESTMENT_STATUS_CODE_APPROVED // 状態
					)
				)
			);
			return $data;
			
		} catch (Exception $ex) {
			$err = "DummyData->v050080 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * 取引残高報告書用ダミーユーザデータ
	 * @return array $data
	 */
	function pdf00005() {

		try {
			
			$data = array(
				array(
					MODEL_NAME_080 => array(
						 COLUMN_0800060 => "田中"                     // 氏名(姓)
						,COLUMN_0800070 => "一郎"                     // 氏名(名)
						,COLUMN_0800160 => "1080022"                  // 郵便番号
						,COLUMN_0800170 => "13"                       // 住所１
						,COLUMN_0800180 => "港区海岸三丁目９番１５号" // 住所２
						,COLUMN_0800190 => "ＬＯＯＰ－Ｘ　７Ｆ"       // 住所３
					)
				)
			);
			return $data;
			
		} catch (Exception $ex) {
			$err = "DummyData->pdf00005 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
}