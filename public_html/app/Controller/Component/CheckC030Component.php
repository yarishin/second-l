<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class CheckC030Component extends Component {
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * 適合性チェック<br>
	 * 選択された内容によっては適合性エラーとなり確認画面に遷移できない。<br>
	 * @param array  $data
	 * @return array $msg
	 */
	function v020($data) {

		try {
			
			$msg = null;

			        if (strcmp(FINANCIAL_ASESST_CODE_1              , $data[OBJECT_ID_030020170]) == 0 // 金融資産：なし
					//|| strcmp(FINANCIAL_ASESST_CODE_2       , $data[OBJECT_ID_030020170]) == 0 // 金融資産：50万円未満
					//|| strcmp(FINANCIAL_ASESST_CODE_3       , $data[OBJECT_ID_030020170]) == 0 // 金融資産：100万円未満
					//|| strcmp(FUND_CHARACTER_CODE_3         , $data[OBJECT_ID_030020430]) == 0 // 投資資金の性格：借入金
					//|| strcmp(ASSET_MANAGEMENT_POLICY_CODE_4, $data[OBJECT_ID_030020450]) == 0 // 資産運用の方針：元本割れの可能性のある商品を避ける
					//|| strcmp(ASSET_MANAGEMENT_POLICY_CODE_5, $data[OBJECT_ID_030020450]) == 0 // 資産運用の方針：元本の安全性を重視
					) {
				//$str  = "お客様の適合性を確認させていただいた結果、残念ながら会員登録いただく条件に合致しませんでした。大変申し訳ありませんが、申請をお受けすることができません。";
				//$str .= "「お客様の適合性確認」の入力項目について、誤りがないかどうかご確認ください。誤りがあれば再申請いただくことも可能です。";
				$str  = "入力いただいた情報を確認したところ、当社所定の基準により出資者登録審査をお受けすることができません。";
				$str .= "何卒ご了承ください。";
				//$str .= "訂正がある場合は、訂正後に再度お申込みいただくことは可能です。";
				$msg[] = $str;
			}

			return $msg;
			
		} catch (Exception $ex) {
			$err = "CheckC030->v020 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 本人認証キー入力チェック
	 * @param string $user_id
	 * @param array $input
	 * @return boolean $result
	 */
	function v060($user_id, $input) {
		
		try {
			
			// 入力データ受取
			$data[COLUMN_0800010] = $user_id;
			$data[COLUMN_0800660] = $input[OBJECT_ID_030060010];

			$this->Controller->MstUser->set($data);

			// 無効化するルールを指定
			unset($this->Controller->MstUser->validate[COLUMN_0800010]);
			unset($this->Controller->MstUser->validate[COLUMN_0800020]);

			// チェック実行
			return $this->Controller->MstUser->validates();
			
		} catch (Exception $ex) {
			$err = "CheckC030->v060 で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}

}
