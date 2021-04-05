<?php
App::uses('AppModel', 'Model');
 
class TrnAgreementHistorie extends AppModel {
	
	public $validate = array(
		
		// 投資金額
		COLUMN_1200070 => array(
			'custom01' => array(
				'rule'    => 'isNotEmpty',
				'message' => '投資金額は入力必須です。'
			),
			'custom02' => array(
				'rule'    => 'isInteger',
				'message' => '半角数字のみを入力して下さい。'
			),
			'custom03' => array(
				'rule'    => 'isMultiple',
				'message' => '最低投資可能金額の倍数を入力して下さい。'
			),
			'custom04' => array(
				'rule'    => 'isMaxRenge',
				'message' => '現在投資可能な金額を超えました。投資金額を減らして下さい。'
			)
		)
	);
	
	/**
	 * 投資金額の必須チェック<br>
	 * 投資金額が入力されていれば True<br>
	 * @return boolean $result
	 */

	
}
