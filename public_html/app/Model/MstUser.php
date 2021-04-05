<?php
App::uses('AppModel', 'Model');
 
class MstUser extends AppModel {
	
	public $primaryKey = 'user_id';
	
	public $validate = array(
		
		// ユーザID
		COLUMN_0800010 => array(
			'custom01' => array(
				'rule'    => 'isNotEmpty',
				'message' => 'IDとパスワードは入力必須です。'
			),
			'custom02' => array(
				'rule'    => 'isMatchIdPass',
				'message' => 'IDとパスワードの組合せが不正です。'
			),
			'custom03' => array(
				'rule'    => 'isRejectedUser',
				'message' => 'このIDはご利用になれません。'
			)
		),
		// メールアドレス
		COLUMN_0800020 => array(
			'custom03' => array(
				'rule'    => 'isRegistered',
				'message' => '入力されたメールアドレスは既に登録されています。'
			)
		),
		// 本人認証キー
		COLUMN_0800660 => array(
			'custom04' => array(
				'rule'    => 'isMatchAuthKey',
				'message' => '認証キーが違います。'
			)
		)
	);

	
	/**
	 * IDとパスワードの必須チェック<br>
	 * IDとパスワードが両方入力されていれば true
	 * @return boolean
	 */
	public function isNotEmpty() {
		if (strcmp("", $this->data[MODEL_NAME_080][COLUMN_0800010]) != 0
				&& strcmp("", $this->data[MODEL_NAME_080][COLUMN_0800030]) != 0) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * IDとパスワードの組み合わせチェック<br>
	 * IDとパスワードの組み合わせが正しければ true
	 * @return boolean
	 */
	public function isMatchIdPass() {
		$conditions = array(
			COLUMN_0800010 => $this->data[MODEL_NAME_080][COLUMN_0800010],
			COLUMN_0800030 => $this->data[MODEL_NAME_080][COLUMN_0800030]
		);
		$count = $this->find(MODEL_COUNT, array(
			MODEL_CONDITIONS => $conditions
		));
		
		return $count > 0;
	}
	
	/**
	 * メールアドレス存在チェック<br>
	 * メールアドレスが存在しなければ true
	 * @return boolean
	 */
	public function isRegistered() {
		$conditions = array(
			COLUMN_0800020 => $this->data[MODEL_NAME_080][COLUMN_0800020]
		);
		$count = $this->find(MODEL_COUNT, array(
			MODEL_CONDITIONS => $conditions
		));
		
		return $count == 0;
	}
	
	/**
	 * 認証キーチェック<br>
	 * 認証キーが正しければ true
	 * @return boolean
	 */
	public function isMatchAuthKey() {
		$conditions = array(
			 COLUMN_0800010 => $this->data[MODEL_NAME_080][COLUMN_0800010]
			,COLUMN_0800660 => $this->data[MODEL_NAME_080][COLUMN_0800660]
		);
		$count = $this->find(MODEL_COUNT, array(
			MODEL_CONDITIONS => $conditions
		));
		
		return $count > 0;
	}
	
	/**
	 * 口座開設拒否チェック<br>
	 * 口座開設拒否されたIDではない true<br>
	 * 口座開設拒否されたIDである   false<br>
	 * @return boolean
	 */
	public function isRejectedUser() {
		$conditions = array(
			COLUMN_0800010 => $this->data[MODEL_NAME_080][COLUMN_0800010],
			COLUMN_0800560 => USER_STATUS_CODE_REJECTED
		);
		$count = $this->find(MODEL_COUNT, array(
			MODEL_CONDITIONS => $conditions
		));
		
		return $count == 0;
	}
	
    /**
	 * ユーザマスタ更新<br>
	 * ユーザマスタのデータをコピーしてユーザマスタを作成する。
	 * @param string $admin_id
	 * @return array $data
	 */
	public function copyWrkUser($admin_id) {
		
		// カラム取得
		$sql = "show columns from wrk_users;";
		$columns = $this->query($sql);
		
		$sql = ""
			."insert into "
			."    mst_users "
			."select "
			."";
		
		// カラム書き出し
		$fields = "";
		foreach ($columns as $keys => $values) {
			foreach ($values as $key => $value) {
				$comma = strcmp("", $fields) == 0 ? "" : ",";
				if (strcmp(COLUMN_1800000, $value[SHOW_COLUMN_FIELD]) != 0) {
					$fields .= $comma.$value[SHOW_COLUMN_FIELD]." ";
				}
			}
		}
		
		$sql .= ""
			.$fields
			."from "
			."    wrk_users "
			."where 1 "
			."    and admin_id = :admin_id "
			.";";
		
		$params = array(
			 "admin_id" => $admin_id
		);
		
		$data = $this->query($sql, $params);
		
		return $data;
		
	}
	
	/**
	 * 年間取引報告書受取対象ユーザ取得<br>
	 * @param datetime $date_from
	 * @param datetime $date_to
	 * @return array $data
	 */
	public function selectAnnualTradeReportReceiveUser($date_from, $date_to) {
		
		$sql = ""
			."select "
			."    a.user_id              as ".COLUMN_0800010.", "
			."    a.mail_address         as ".COLUMN_0800020.", "
			."    a.kanji_last_name      as ".COLUMN_0800060.", "
			."    a.kanji_first_name     as ".COLUMN_0800070.", "
			."    a.zip                  as ".COLUMN_0800160.", "
			."    a.address1             as ".COLUMN_0800170.", "
			."    a.address2             as ".COLUMN_0800180.", "
			."    a.address3             as ".COLUMN_0800190.", "
			."    sum(b.dividend_amount) as ".COLUMN_1000090.", "
			."    sum(b.tax)             as ".COLUMN_1000100." "
			."from "
			."    mst_users a, "
			."    trn_dividend_histories b "
			."where 1 "
			."    and a.user_id               = b.user_id "
			."    and b.dividend_datetime    >= :date_from "
			."    and b.dividend_datetime    <= :date_to "
			."    and b.dividend_detail_code in (:detail_code_2, :detail_code_3) "
			."group by "
			."    a.user_id, "
			."    a.mail_address, "
			."    a.kanji_last_name, "
			."    a.kanji_first_name "
			."order by "
			."    a.lender_no "
			.";";
		
		$params["date_from"]     = $date_from;
		$params["date_to"]       = $date_to;
		$params["detail_code_2"] = DIVIDEND_DETAIL_CODE_02;
		$params["detail_code_3"] = DIVIDEND_DETAIL_CODE_03;
		
		$data = $this->query($sql, $params);
		
		return $data;
	}
	/**
	 * 年間取引報告書受取対象ユーザ取得1
         * dividend_code = 1を取得<br>
	 * @param datetime $date_from
	 * @param datetime $date_to
	 * @return array $data
	 */
	public function selectAnnualTradeReportReceiveUser1($date_from, $date_to) {
		
		$sql = ""
			."select "
			."    a.user_id              as ".COLUMN_0800010.", "
			."    a.mail_address         as ".COLUMN_0800020.", "
			."    a.kanji_last_name      as ".COLUMN_0800060.", "
			."    a.kanji_first_name     as ".COLUMN_0800070.", "
			."    a.zip                  as ".COLUMN_0800160.", "
			."    a.address1             as ".COLUMN_0800170.", "
			."    a.address2             as ".COLUMN_0800180.", "
			."    a.address3             as ".COLUMN_0800190.", "
			."    sum(b.dividend_amount) as ".COLUMN_1000090." "
			."from "
			."    mst_users a, "
			."    trn_dividend_histories b "
			."where 1 "
			."    and a.user_id               = b.user_id "
			."    and b.dividend_datetime    >= :date_from "
			."    and b.dividend_datetime    <= :date_to "
			."    and b.dividend_detail_code  = :detail_code_1 "
			."group by "
			."    a.user_id, "
			."    a.mail_address, "
			."    a.kanji_last_name, "
			."    a.kanji_first_name "
			."order by "
			."    a.lender_no "
			.";";
		
		$params["date_from"]     = $date_from;
		$params["date_to"]       = $date_to;
		$params["detail_code_1"] = DIVIDEND_DETAIL_CODE_01;
		
		
		$data = $this->query($sql, $params);
		
		return $data;
	}
}