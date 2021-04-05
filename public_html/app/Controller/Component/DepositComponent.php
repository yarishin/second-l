<?php
/*
 * 入金コンポーネントクラス
 * 
 * 入金管理に関する関数をまとめたコンポーネントクラス。
 * 
 * @access Public
 * @author Wataru Omori <wataru.omori@outlook.com>
 * @category Data Processing
 * @package Controller
 */

App::uses('Component', 'Controller');

class DepositComponent extends Component {
    // 他のコンポーネントを使えるようにする。
    public $components = array(
		"Common",
		"Calendar",
		"Fund",
		"InvestmentHistory",
		"SessionUserInfo",
		"SessionAdminInfo",
		"User"
    );
    
	// モデルを使えるようにする。
	public $uses = array(
		"MstDepositAccount",
		"TrnDepositHistory",
		"TrnInvestmentHistory"
	);
	
    public function initialize(Controller $controller) {
		$this->Controller = $controller;
    }

	/**
	 * 入金口座リスト取得メソッド
	 *  
	 * フォーム検索項目に入力された値を元に入金口座リストを取得
	 * @access Public
	 * @param Array $search[] 検索キー配列
	 * @return Array $account_list[] 入金口座リスト
	 * @see 関連（呼び出したり）する関数
	 * @throws 例外についての記述
	 * @todo 未対応（改善）事項等
	 */
	public function getAccountList($search){
		try {		
			$status     = null;
			$conditions = null;
			$order      = null;
			$order_asc  = "";
			
			// ◆絞込み条件◆
			// 氏名(漢字)
			if (isset($search[SEARCH_ID_050510010]) && strcmp("", $search[SEARCH_ID_050510010]) != 0) {
				$conditions[COLUMN_2900160." like"] = "%".$search[SEARCH_ID_050510010]."%";
			}
			// 氏名(カナ)
			if (isset($search[SEARCH_ID_050510020]) && strcmp("", $search[SEARCH_ID_050510020]) != 0) {
				$conditions[COLUMN_2900170." like"] = "%".$search[SEARCH_ID_050510020]."%";
			}
			// ユーザID
			if (isset($search[SEARCH_ID_050510030]) && strcmp("", $search[SEARCH_ID_050510030]) != 0) {
				$conditions[COLUMN_2900150." like"] = "%".$search[SEARCH_ID_050510030]."%";
			}
			// 入金口座番号
			if (isset($search[SEARCH_ID_050510040]) && strcmp("", $search[SEARCH_ID_050510040]) != 0) {
				$conditions['account_number like'] = "%".$search[SEARCH_ID_050510040]."%";
			}
			
			// ◆ソート◆
			$order['account_number'] = 'asc';	// 口座番号:COLUMN_2900100
			
			$status['conditions'] = $conditions;
			$status['order']      = $order;
			$result = $this->Controller->MstDepositAccount->find('all', $status);
			return Hash::extract($result, '{n}.MstDepositAccount');
		} catch (Exception $ex) {
			$err = "Deposit->getAccountList で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * 入金口座情報取得メソッド
	 *  
	 * 指定したユーザIDの入金口座情報を取得
	 * @access Public
	 * @param String $user_id 対象ユーザID
	 * @return Array $deposit_account[] 入金口座情報
	 * @see 関連（呼び出したり）する関数
	 * @throws 例外についての記述
	 * @todo 未対応（改善）事項等
	 */	
	public function getAccountInfo($user_id) {
		try{
			$result     = array();			
			$status     = null;
			$conditions = null;
			
			$conditions[COLUMN_2900150] = $user_id;
			$status['conditions'] = $conditions;
			$result = $this->Controller->MstDepositAccount->find('first', $status);
			if(!empty($result)){ 
				return Hash::extract($result, 'MstDepositAccount');
			}
			// 対象ユーザの口座情報が存在しない場合はNULLを返す
			return null;
		} catch (Exception $ex) {
			$err = "Deposit->getAccountInfo で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * ユーザID取得メソッド
	 *  
	 * 楽天ジャストマッチの入金口座情報(支店番号、口座番号)からユーザIDを取得
	 * @access Public
	 * @param String $branch_code 支店番号
	 * @param String $account_number 口座番号
	 * @return String $user_id[] ユーザID
	 * @see 関連（呼び出したり）する関数
	 * @throws 例外についての記述
	 * @todo 未対応（改善）事項等
	 */	
	public function getUserInfo($branch_code, $account_number) {
		try{
			$result     = null;			
			$status     = null;
			$user_id	= null;
			
			$conditions[COLUMN_2900060] = $branch_code;
			$conditions[COLUMN_2900100] = $account_number;
			$fields = Array(COLUMN_2900150, COLUMN_2900160, COLUMN_2900170);
			$status['conditions'] = $conditions;
			$status['fields'] = $fields;
			$result = $this->Controller->MstDepositAccount->find('first', $status);
			if(empty($result)){
				throw new RuntimeException("口座情報が不正です。: (". $branch_code . ") " . $account_number);
			}elseif(empty($result['MstDepositAccount']['user_id'])){
				throw new RuntimeException("割り当てられていない口座です。: (". $branch_code . ") " . $account_number);
			}
			return Hash::extract($result, 'MstDepositAccount');
			
		} catch (Exception $ex) {
			$err = "Deposit->getUserID で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 入金口座割当メソッド
	 *  
	 * 指定したユーザIDに入金口座を割当
	 * @access Public
	 * @param String $user_id :対象ユーザID
	 * @param Array $admin_info :口座割当管理者
	 * @return Array $deposit_account[] 入金口座情報
	 * @see 関連（呼び出したり）する関数
	 * @throws 例外についての記述
	 * @todo 未対応（改善）事項等
	 */	
	public function assignAccount($user_id, $admin_info) {
		try {
			$status = null;
			$conditions[COLUMN_2900150] = $user_id;
			$status['conditions'] = $conditions;
			if($this->Controller->MstDepositAccount->hasAny($conditions)){
				$this->log("既に入金口座が割当られています: ユーザID:".$user_id);
			} else {
				// 未割当口座情報取得
				$status = null;
				$conditions[COLUMN_2900150] = NULL;
				$order[COLUMN_2900010] = 'asc';
				$status['conditions'] = $conditions;
				$status['order'] = $order;
				$result = $this->Controller->MstDepositAccount->find('first', $status);	
				$unassigned_account_info = Hash::extract($result, $this->Controller->MstDepositAccount->name);
				$id = $unassigned_account_info[COLUMN_2900010];
				
				// ユーザ情報取得
				$user_info= $this->User->getUser($user_id);
				$user_name = $user_info[COLUMN_0800060]." ".$user_info[COLUMN_0800070];
				$user_name_kana = $user_info[COLUMN_0800080]." ".$user_info[COLUMN_0800090];
				
				// 管理者ID取得
				$admin_id = $admin_info['admin_id'];
			
				// 更新データ
				$update_record = Array(
					COLUMN_2900010 => $id,								// id: 主キー
					COLUMN_2900150 => $user_id,							// user_id: ユーザID
					COLUMN_2900160 => $user_name,						// user_name: ユーザ名
					COLUMN_2900170 => $user_name_kana,					// user_name_kana: ユーザ名(カナ)
					COLUMN_2900180 => DboSource::expression('NOW()'),	// assignment_date: 割当日		
					COLUMN_2900190 => $admin_id							// admin_id: 最新更新者ID	
				);
				$fields = Array(COLUMN_2900010, COLUMN_2900150, COLUMN_2900160, COLUMN_2900170, COLUMN_2900180, COLUMN_2900190);
				$this->Controller->MstDepositAccount->save($update_record, false, $fields);
			}
			$status = null;
			$conditions[COLUMN_2900150] = $user_id;
			$status['conditions'] = $conditions;			
			$result = $this->Controller->MstDepositAccount->find('all', $status);
			return $result;
		} catch (Exception $ex) {
			$err = "Deposit->assignAccount で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * 入金データファイル登録メソッド
	 *  
	 * 楽天ジャストマッチフォーマットの入金データファイルの読込みデータベースへ登録
	 * 
	 * 入金履歴フォーマット(CSV)
	 * 文字コード:			SJIS
	 * 改行コード:			CRLF
	 * フィールドセパレイタ:	,(カンマ)
	 * フィールドデリミタ:	無し
	 * その他:	ファイル内のデータはシーケンシャルで順序は変更されず、
	 *			各ファイルは連続したレコードをあるタイミングで切り出したデータとする
	 * @access Public
	 * @param String $file_path :入金データファイルパス
	 * @return Array $records[] 入金データレコード
	 * @see 関連（呼び出したり）する関数
	 * @throws 例外についての記述
	 * @todo 未対応（改善）事項等
	 */	
	public function registerDepositData($file_tmp_path, $admin_info) {
		try{
			// Move constant variables to const.php
//			$upload_dir = "../../uploaded/deposit_data/";
//			$file_prefix = "deposit_rakuten_";
			$upload_dir = DEPOSIT_DATA_DIR;
			$file_prefix = DEPOSIT_DATA_PREFIX;
			$file_name = $file_prefix . Date("Ymd-His") . ".csv";

			// 管理者ID取得
			$admin_id = $admin_info['admin_id'];
			$date_time = date("Y-m-d H:i:s");
			$deposit_type = 0;
			
			// ファイルをdataディレクトリに移動
			$file_path = $upload_dir . $file_name;
			if (move_uploaded_file($file_tmp_path, $file_path)) {
				// ファイルパーミッションを確実に644にする
				chmod($file_path, 0644);
			} else {
				throw new RuntimeException("ファイル保存時にエラーが発生しました。: ". $file_path);
			}

			$data = file_get_contents($file_path);
			setlocale(LC_ALL, 'ja_JP.UTF-8');
			$data = mb_convert_encoding($data, 'UTF-8', 'sjis-win');
			$temp = tmpfile();
			fwrite($temp, $data);
			rewind($temp);
		
			// 変換後の一時ファイルを読み込みヘッダを削除した配列に変換する
			$i=0;
			$file_records = array();			
			while (($line = fgetcsv($temp, 0, ",")) !== FALSE) {
				// 1行目は読み飛ばす
				if($i == 0){
					$i++;
					continue;
				}
				// 空行はスキップする
				if($line === array(null)){
					continue;
				}
				// レコードのカラム数をチェック
				if(count($line) !== 7){
					$error_line = $i+1;
					throw new RuntimeException("CSVファイルフォーマットが不正です。[" . $error_line . "行目: " . implode(",", $line) . "]");
				} else {
					// 口座番号からユーザ情報を取得する
					$user_info = $this->getUserInfo($line[2], $line[3]);
					if(is_null($user_info) || empty($user_info)) {
						//throw new RuntimeException("不明な口座への入金です。 (".$line[2]. ") " .$line[3]);
						$this->log("不明な口座への入金です。 (".$line[2].") ".$line[3]);
					}else{
						$user_id = $user_info[COLUMN_2900150];
						$user_name = $user_info[COLUMN_2900160];
					}
					$row = Array(
						COLUMN_3100020 => $date_time,	// date_time: 入力日時
						COLUMN_3100030 => $admin_id,	// admin_id: 入力管理者ID
						COLUMN_3100040 => $deposit_type,	// deposit_type: 入金種別 0:受付 1:払戻 2:取消
						COLUMN_3100040 => date("Y-m-d", strtotime($line[0])),	// deposit_date: 取引日
						COLUMN_3100050 => $line[1],	// deposit_amount: 入金額
						COLUMN_3100060 => $line[2], // deposit_branch_code: 入金先支店番号
						COLUMN_3100070 => $line[3],	// deposit_account_number: 入金先口座番号
						COLUMN_3100080 => $line[4],	// requester_account_name: 振込依頼人名
						COLUMN_3100090 => $line[5],	// sending_bank_name: 仕向銀行名
						COLUMN_3100100 => $line[6],	// sending_bank_branch_name: 仕向銀行支店名
						COLUMN_3100110 => $user_id,	// user_id: ユーザID
						COLUMN_3100120 => $user_name,	// user_name: ユーザ名
						COLUMN_3100130 => 0	// reconcile_status_code: 照合状態 未照合
					);
					array_push($file_records, $row);
				}
				$i++;
			}
			// ファイルポインタが終端に達していない場合はエラー
			if (!feof($temp)) {
				throw new RuntimeException("CSV file parsing error." . $file_path);
			}
			fclose($temp);
			
			// 楽天ジャストマッチの入金データファイルは降順のため降順に並べ替え
			$records = array_reverse($file_records);
			
			// 登録されている最後の取引日を取得
			$order[COLUMN_3100040] = 'DESC';	// deposit_date: 取引日
			$status['order'] = $order;
			$last_record = $this->Controller->TrnDepositHistory->Find('first', $status);

			if(!empty($last_record)){
				$last_deposit_date = $last_record['TrnDepositHistory'][COLUMN_3100040];
			}else{
				$last_deposit_date = "2000-01-01"; // テーブルが空の場合は暫定値を代入
			}

			// ファイルから読込んだ入金データをチェックし登録するレコードを判別
			$read_row = 0; // 読込データの行カウンタ
			$save_row = 0; // 保存データの行カウンタ
			$reg_cnt = 0;
			$save_records = Array();
			foreach ($records as $key => $record) {
				// ファイルレコードの最初の行をチェックする。 を読込み取引日を取得し同日の履歴が既に登録済みか確認
				if ($read_row == 0) {
					// 登録されている最終取引日より前のレコードの場合はエラーとする
					if(strtotime($record[COLUMN_3100040]) < strtotime($last_deposit_date)){
						throw new RuntimeException("ファイルに不正なレコードが含まれています。");
						
					// 登録されている最終取引日と同じ日の場合は重複レコードを排除する
					} elseif(strtotime($record[COLUMN_3100040]) == strtotime($last_deposit_date)){
						// 最終取引日のレコード数を取得しスキップするレコード数を設定
						$conditions[COLUMN_3100040] = $record[COLUMN_3100040];	// deposit_date: 取引日
						$status['conditions'] = $conditions;
						$reg_cnt = $this->Controller->TrnDepositHistory->Find('count', $status);
					
					// 登録されている最終取引日以降の場合は最初から保存レコードにコピー
					}else{
						$save_records[$save_row] = $record;
						$save_row++;
					}	
	
				} else {
					// 既に登録済みの件数分は読み飛ばす
					if($read_row >= $reg_cnt){
						$save_records[$save_row] = $record;
						$save_row++;						
					}					
				}
				$read_row++;
			}
/*
 * その他チェック項目
 *	読み飛ばしたレコードが既に登録されているレコードと一致するか
 */
			// 入金テーブルにデータを保存する
			$this->Controller->TrnDepositHistory->saveAll($save_records);
			
			// 保存レコードが無い場合はアップロードされたファイルを削除する
			if($save_row == 0){
				unlink($file_path);
			}
			$count_data = Array('read_count'=>$read_row, 'saved_count'=>$save_row);
			return $count_data;
			
		} catch (Exception $ex) {
			$err = "Deposit->readDepositData で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 入金データ取得メソッド(照合状態指定)
	 *  
	 * 入金履歴から入金状況ステータスを指定して入金データを取得します
	 * @access Public
	 * @param status_code 照合状態コード
	 * @return Array $data_list[] 未照合データリスト
	 * @see 関連（呼び出したり）する関数
	 * @throws 例外についての記述
	 * @todo 未対応（改善）事項等
	 */	
	public function getRecordsByStatus($status_code){
		try {		
			$status     = null;
			$conditions = null;
			$order      = null;

			// 照合状態が未照合のデータを取得
			$conditions[COLUMN_3100130] = $status_code;	// 照合状態コード reconcile_status_code
			
			// 取引日と入金データ登録日時でソート
			$order[COLUMN_3100040] = 'asc'; // 取引日: deposit_date
			$order[COLUMN_3100020] = 'asc';	// 入力日時: date_time
			
			$status['conditions'] = $conditions;
			$status['order']      = $order;
			$result = $this->Controller->TrnDepositHistory->find('all', $status);

			return Hash::extract($result, '{n}.TrnDepositHistory');
			
		} catch (Exception $ex) {
			$err = "Deposit->getRecordsByStatus で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * 入金データ取得メソッド(取引日指定)
	 *  
	 * 入金履歴から取引日を指定して入金データを取得します
	 * @access Public
	 * @param String $date 取引日
	 * @return Array $data_list[] 未照合データリスト
	 * @see 関連（呼び出したり）する関数
	 * @throws 例外についての記述
	 * @todo 未対応（改善）事項等
	 */	
	public function getRecordsByDate($date){
		try {		
			$status     = null;
			$conditions = null;
			$order      = null;

			// 照合状態が未照合のデータを取得
			$conditions[COLUMN_3100040] = $date;	// 取引日 deposit_date
			
			// 取引日と入金データ登録日時でソート
			$order[COLUMN_3100010] = 'asc'; // 入金履歴ID: id
			
			$status['conditions'] = $conditions;
			$status['order']      = $order;
			$result = $this->Controller->TrnDepositHistory->find('all', $status);

			return Hash::extract($result, '{n}.TrnDepositHistory');
			
		} catch (Exception $ex) {
			$err = "Deposit->getRecordsByDate で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 未照合入金データ突合せリスト取得メソッド
	 *  
	 * 入金データと投資申込データを突合せしたリストを取得します
	 * @access Public
	 * @param None
	 * @return Array $data_list[] 突合せリスト
	 * @see 関連（呼び出したり）する関数
	 * @throws 例外についての記述
	 * @todo 未対応（改善）事項等
	 */	
	public function getMatchingList(){
		try {		
			$result = $this->Controller->TrnDepositHistory->getMatchingData();
			return $result;
		} catch (Exception $ex) {
			$err = "Deposit->getReconcileList で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}		
	}




	/**
	 * 入金照合メソッド
	 *  
	 * 照合データのリストを元に投資申込を承認し、入金データを照合済みにします
	 * 引数はgetMatchingList()関数が返す入金照合データの配列
	 * 
	 * @access Public
	 * @param String $data_list 入金照合レコードリスト
	 * @return Array $data_list[] 照合リスト
	 * @see 関連（呼び出したり）する関数
	 * @throws 例外についての記述
	 * @todo 未対応（改善）事項等
	 */	
	public function reconcile($data_list){
		try{
			// 管理者情報、照合タイムスタンプ
			$admin_info = $this->SessionAdminInfo->getAdminInfo();
			$admin_id   = $admin_info[LOGIN_ADMIN_ID];
			$admin_name = $admin_info[LOGIN_ADMIN_NAME];
			$timestamp = date(DATETIME_FORMAT);

			$count=0;
			foreach($data_list as $key => $record){
				$investment_id = $record[COLUMN_3110070];		// 投資申込ID
				$deposit_id = $record[COLUMN_3110010];			// 入金履歴ID

				// 対象の投資申込を承認
				$this->InvestmentHistory->approveInvestment($investment_id, $admin_info, $timestamp);
				
				// 対象の入金履歴を照合済み(自動)に更新
				$update_record = Array(
					COLUMN_3100010 => $deposit_id,					// id: 主キー
					COLUMN_3100130 => DEPOSIT_RECONCILED_AUTO,		// 照合状態コード: reconcile_status_code: 承認(自動)
					COLUMN_3100140 => $timestamp,					// 照合日時: reconcile_date_time
					COLUMN_3100150 => $admin_id,					// 照合管理者ID: reconcile_admin_id
					COLUMN_3100160 => $investment_id				// 照合先投資申込ID: investment_id
				);
				$fields = Array(COLUMN_3100010, COLUMN_3100130, COLUMN_3100140, COLUMN_3100150, COLUMN_3100160);
				$this->Controller->TrnDepositHistory->save($update_record, false, $fields);
				$count++;
			}
			return $count;
		}catch (Exception $ex){
			$err = "Deposit->reconcile で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * 未照合入金履歴ダウンロードメソッド
	 *  
	 * 未照合照合入金履歴をダウンロードし照合済み(手動)にします
	 * @access Public
	 * @param Array $admin_info 管理者情報
	 * @return Array $data_list[] 照合リスト
	 * @see 関連（呼び出したり）する関数
	 * @throws 例外についての記述
	 * @todo 未対応（改善）事項等
	 */	
	public function dlUnreconciledRedords($admin_info){
		try{
			// 未承認入金レコードを取得
			$records = $this->getRecordsByStatus(DEPOSIT_UNRECONCILED);
			if(empty($records)){
				return 0;
			}
			// CSV出力するレコードセットを生成
			$csv_data = array();
			
			// 最初の行に項目名を出力
			$csv_record = Array(
				CSV_COLUMN_060010 => "取引日",
				CSV_COLUMN_060020 => "入金額",
				CSV_COLUMN_060030 => "支店番号",
				CSV_COLUMN_060040 => "口座番号",
				CSV_COLUMN_060050 => "依頼人名",
				CSV_COLUMN_060060 => "ユーザID",
				CSV_COLUMN_060070 => "ユーザ名",				
			);
			array_push($csv_data, $csv_record);
			
			foreach ($records as $key => $record){
				$csv_record = Array(
					CSV_COLUMN_060010 => $record[COLUMN_3100040],	// 取引日
					CSV_COLUMN_060020 => $record[COLUMN_3100050],	// 入金額
					CSV_COLUMN_060030 => $record[COLUMN_3100060],	// 支店番号
					CSV_COLUMN_060040 => $record[COLUMN_3100070],	// 口座番号
					CSV_COLUMN_060050 => $record[COLUMN_3100080],	// 依頼人名
					CSV_COLUMN_060060 => $record[COLUMN_3100110],	// ユーザID
					CSV_COLUMN_060070 => $record[COLUMN_3100120],	// ユーザ名				
				);
				array_push($csv_data, $csv_record);
			}

			// CSVファイルを作成しダウンロード
//			$this->createCSV($csv_data);
			
			// 入金レコードを照合済み(手動)に更新
			$timestamp = date(DATETIME_FORMAT);
			$count = 0;
			foreach ($records as $key => $record){
				$update_record = Array(
					COLUMN_3100010 => $record[COLUMN_3100010],			// id: 主キー
					COLUMN_3100130 => DEPOSIT_RECONCILED_MANUAL,		// 照合状態コード: reconcile_status_code: 承認(手動)
					COLUMN_3100140 => $timestamp,						// 照合日時: reconcile_date_time
					COLUMN_3100150 => $admin_info['admin_id'],			// 照合管理者ID: reconcile_admin_id
				);
				$fields = Array(COLUMN_3100010, COLUMN_3100130, COLUMN_3100140, COLUMN_3100150);
				$this->Controller->TrnDepositHistory->save($update_record, false, $fields);
				$count++;
			}

			// CSVファイルを作成しダウンロード
			$this->createCSV($csv_data);
			return $count;
			
		}catch (Exception $ex){
			$err = "Deposit->dlUnreconciledRecoeds で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * CSVファイル作成メソッド
	 *  
	 * CSVファイルを作成しダウンロード
	 * @access Private
	 * @param Array $data 出力データ
	 * @return None
	 * @see 関連（呼び出したり）する関数
	 * @throws 例外についての記述
	 * @todo 未対応（改善）事項等
	 */	
	private function createCSV($data){
		try{
			// メモリ上に出力領域を確保
			$fp = fopen('php://temp/maxmemory:'.(5*1024*1024),'r+');
			foreach($data as $csv_record){
				fputcsv($fp, $csv_record);
			}
			rewind($fp);
			
			$file_name = "deposit_".date(DATETIME_FORMAT_4).FILE_EXTENSION_CSV;
			header('Content-Type: text/csv');
			header("Content-Disposition: attachment; filename=".$file_name);		

			// 改行コードをCRLFに変換
			$csv = str_replace("\n", "\r\n", stream_get_contents($fp));

			// SJISへ変換
			$csv = mb_convert_encoding($csv,'SJIS-win','utf8');
			print $csv;
			fclose($fp);
			exit;
		} catch (Exception $ex) {
			$err = "Deposit->createCSV で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 未割当口座数取得メソッド
	 *  
	 * 未割当の入金口座数を取得
	 * @access Public
	 * @return Integer $num_of_unassigned_account :未割当口座数
	 * @see 関連（呼び出したり）する関数
	 * @throws 例外についての記述
	 * @todo 未対応（改善）事項等
	 */	
	public function countUnassignedAccounts() {
		// Implement if required.
	}
}
