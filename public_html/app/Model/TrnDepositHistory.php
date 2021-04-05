<?php
App::uses('AppModel', 'Model');
App::uses('Sanitize', 'Utility');

/* 
 * 入金履歴モデルクラス
 * 
 * 入金履歴をあらわすモデルクラス。
 * 
 * @access Public
 * @author Wataru Omori <wataru.omori@outlook.com>
 * @category Data Processing
 * @package Model
 */
class TrnDepositHistory extends AppModel {

/*
	public $validate = array(	
		// 入金日
		COLUMN_3100040 => array(
			'dateformat' => array(
				'rule' => array('date', 'ymd'),
				'message' => '入金日は年月日で入力してください。'
			),
		),
		// 入金額
		COLUMN_3100050 => array(
			'moneyformat' => array(
				'rule'=> array('money'),
				'message'=> '入金額のフォーマットが不正です。',
			),
		),
		// 支店番号
		COLUMN_3100060 => array(
			'alphaNumeric'=> array(
				'rule' => 'alphaNumeric',
				'message' => '入金支店番号フォーマットが不正です。'
			),
			'length' => array(
				'rule' => array('between', 3, 3),
				'message' => '入金支店番号は3桁で指定してください。'
			),
		),
		// 口座番号
		//COLUMN_3100070
		// 振込依頼人名
		//COLUMN_3100080	
	);
*/

	/**
	 * 入金照合データ取得メソッド
	 * 
	 * 現在の入金履歴と投資申込履歴の照合結果を取得
	 * 現時点での未承認投資申込はすべて表示し、以下の場合は照合データから除外する
	 *	- 複数の未承認投資申込が存在する場合
	 *	- 複数の未照合入金が存在する場合
	 * @access Public
	 * @param None
	 * @return Array $data_list 照合結果データ
	 * @see 関連（呼び出したり）する関数
	 * @throws 例外についての記述
	 * @todo 未対応（改善）事項等
	 */	
	public function getMatchingData(){

		$sql = ""
			."SELECT "
			.	"t1.id, "
			.	"t1.deposit_date, "	
			.	"t1.deposit_amount, "
			.	"t1.deposit_account_number, "
			.	"t1.requester_account_name, "
			.	"t1.user_id, "
			.	"t2.id, "
			.	"t2.user_id,  "
			.	"t2.user_name, "
			.	"t2.user_name_kana, "
			.	"t2.fund_id, "
			.	"t2.fund_name, "
			.	"t2.application_datetime, "
			.	"t2.investment_amount,  "
			.	"t2.expiration_datetime "
			."FROM "
				// 未照合の入金履歴が複数のあるユーザの入金は除外する
			.	"(SELECT * FROM trn_deposit_histories WHERE reconcile_status_code = 0 GROUP BY deposit_account_number HAVING count(deposit_account_number) = 1) AS t1 "
			."RIGHT OUTER JOIN "
			.	"(SELECT * FROM trn_investment_histories WHERE investment_status_code = 0 ORDER BY application_datetime) AS t2 "
			."ON "
			.	"t1.deposit_amount = t2.investment_amount "
			."AND "
			.	"t1.user_id = t2.user_id "
			."ORDER BY "
			.	"t1.deposit_date DESC, "
			.	"t2.application_datetime ASC "
			.";";
		
		$result = $this->query($sql);
		$data = Array();
		if (isset($result) && is_array($result) && 0 < count($result)) {
			// 未承認の投資申込が複数あるユーザの投資申込は照合データから除外する
			$invested_users = Hash::extract($result, '{n}.t2.user_id');
			$unique_invested_users = array_unique($invested_users);

			if(count($unique_invested_users) !== count($invested_users)){
				// 重複するユーザのリストを作成
				$duplicated_users = array();
				foreach(array_count_values($invested_users) as $key => $count){
					if($count > 1){
						array_push($duplicated_users, $key);
					}
				}
			}
			
			// 複数テーブルデータを結合した配列にする
			$i=0;
			foreach ($result as $key => $value) {
				// レコードのユーザIDが重複ユーザリストにある場合はマッチした入金情報を削除して照合しない
				if(!empty($duplicated_users) && in_array($value['t2'][COLUMN_1200020], $duplicated_users)){
					$data[$i][COLUMN_3110010] = NULL;	// deposit_id
					$data[$i][COLUMN_3110020] = NULL;	// deposit_date
					$data[$i][COLUMN_3110030] = NULL;	// deposit_amount
					$data[$i][COLUMN_3110040] = NULL;	// deposit_account_number
					$data[$i][COLUMN_3110050] = NULL;	// requester_account_name
					$data[$i][COLUMN_3110060] = NULL;	// deposit_user_id
				}else{
					$data[$i][COLUMN_3110010] = $value['t1'][COLUMN_3100010];	// deposit_id
					$data[$i][COLUMN_3110020] = $value['t1'][COLUMN_3100040];	// deposit_date
					$data[$i][COLUMN_3110030] = $value['t1'][COLUMN_3100050];	// deposit_amount
					$data[$i][COLUMN_3110040] = $value['t1'][COLUMN_3100070];	// deposit_account_number
					$data[$i][COLUMN_3110050] = $value['t1'][COLUMN_3100080];	// requester_account_name
					$data[$i][COLUMN_3110060] = $value['t1'][COLUMN_3100110];	// deposit_user_id
				}
				
				$data[$i][COLUMN_3110070] = $value['t2'][COLUMN_1200010];	// investment_id
				$data[$i][COLUMN_3110080] = $value['t2'][COLUMN_1200020];	// investment_user_id
				$data[$i][COLUMN_3110090] = $value['t2'][COLUMN_1200030];	// user_name
				$data[$i][COLUMN_3110100] = $value['t2'][COLUMN_1200035];	// user_name_kana
				$data[$i][COLUMN_3110110] = $value['t2'][COLUMN_1200040];	// fund_id
				$data[$i][COLUMN_3110120] = $value['t2'][COLUMN_1200050];	// fund_name
				$data[$i][COLUMN_3110130] = $value['t2'][COLUMN_1200060];	// application_datetime
				$data[$i][COLUMN_3110140] = $value['t2'][COLUMN_1200070];	// investment_amount
				$data[$i][COLUMN_3110150] = Date('Y-m-d', strtotime($value['t2'][COLUMN_1200080]));	// expiration_date				

				$i++;
			}
 		}
		return $data;
	}

 }

