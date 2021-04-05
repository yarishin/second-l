<?php
App::uses('Component', 'Controller');

class AdminInfoHistoryComponent extends Component {
	
	// 他のコンポーネントを使えるようにする。
	public $components = array(
		 "InfoAttachment"
		,"InformationHistory"
		,"Pdf"
	);

	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * 管理者お知らせ送信<br>
	 * 管理者ユーザが作成したお知らせメッセージを投資家のお知らせ履歴に登録する<br>
	 * @throws Exception
	 */
	function saveAdminInfo($admin_info, $data) {
		try {
			
			// 管理者ID、管理者名
			$admin_id   = $admin_info[LOGIN_ADMIN_ID];
			$admin_name = $admin_info[LOGIN_ADMIN_NAME];
			
			// 現在時刻取得
			$now = date(DATETIME_FORMAT);
			
			// お知らせID取得
			$info_id = $this->InformationHistory->createInfoIdAdmin();
			
			// 送信先条件
			$conditions = "";
			
			$fund_id = "";
			$method  = $data[OBJECT_ID_050480010];
			
			$attach_flag = false;
			if (isset($data[OBJECT_ID_050480170]) || isset($data[OBJECT_ID_050480180])
					|| isset($data[OBJECT_ID_050480190]) || isset($data[OBJECT_ID_050480200])
					|| isset($data[OBJECT_ID_050480210]) || isset($data[OBJECT_ID_050480220])
					|| isset($data[OBJECT_ID_050480260])) {
				
				// 添付ファイルが１つでもあればフラグを立てる
				$attach_flag = true;
			}
			
			// 送信先指定方法
			if ($attach_flag && (is_null($data[OBJECT_ID_050480100]) || strcmp("", $data[OBJECT_ID_050480100]) == 0)) {
				
				// 添付ファイル有り、番号、ID指定無しの場合
				$conditions .= "書面交付対象者全員";
			}
			else {
				
				if (strcmp(SPECIFIED_METHOD_CODE_0, $method) == 0) {
					
					// 「条件を指定」選択時
					if (strcmp("", $data[OBJECT_ID_050480090]) != 0) {
						$conditions .= "ファンドID：「".$data[OBJECT_ID_050480090]."」";
					}

					$fund_id = $data[OBJECT_ID_050480090];
					
				}
				elseif (strcmp(SPECIFIED_METHOD_CODE_1, $method) == 0 || strcmp(SPECIFIED_METHOD_CODE_2, $method) == 0) {
					
					// 「管理番号を指定」、または「投資家IDを指定」選択時
					$conditions = $data[OBJECT_ID_050480100];
				}
			}
			
			// 強制確認
			$force_flag = FORCE_FLAG_FALSE;
			if (isset($data[OBJECT_ID_050480110]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050480110]) == 0) {
				$force_flag = FORCE_FLAG_TRUE;
			}
			
			// 同意
			$agreement_flag = AGREEMENT_FLAG_FALSE;
			if (isset($data[OBJECT_ID_050480120]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050480120]) == 0) {
				$agreement_flag = AGREEMENT_FLAG_TRUE;
			}
			
			// 掲載日時
			$post_datetime = "";
			if (strcmp("", $data[OBJECT_ID_050480130]) != 0) {
				$post_datetime = $data[OBJECT_ID_050480130]." ".$data[OBJECT_ID_050480140];
			}
			else {
				$post_datetime = $now;
			}
			
			// 件名、本文取得
			$subject = $data[OBJECT_ID_050480150];
			$body    = str_replace(LINE_FEED_CODE, HTML_TAG_BR, $data[OBJECT_ID_050480160]);
			
			// 添付ファイル
			$attachment = "";
			$reg_doc_list = Configure::read(CONFIG_0064);
			$inv_doc_list = Configure::read(CONFIG_0045);

			// 添付：利用規約
			if (isset($data[OBJECT_ID_050480170]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050480170]) == 0) {
				$attachment .= $reg_doc_list[REG_DOC_ID_00001];
			}
			// 添付：契約締結前交付書面
			if (isset($data[OBJECT_ID_050480180]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050480180]) == 0) {
				$attachment .= strcmp("", $attachment) == 0 ? "" : "、";
				$attachment .= $reg_doc_list[REG_DOC_ID_00002];
			}
			// 添付：匿名組合契約約款
			if (isset($data[OBJECT_ID_050480190]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050480190]) == 0) {
				$attachment .= strcmp("", $attachment) == 0 ? "" : "、";
				$attachment .= $reg_doc_list[REG_DOC_ID_00003];
			}
			// 添付：電磁的方法による書面の交付に関する同意書
			if (isset($data[OBJECT_ID_050480200]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050480200]) == 0) {
				$attachment .= strcmp("", $attachment) == 0 ? "" : "、";
				$attachment .= $reg_doc_list[REG_DOC_ID_00004];
			}
			// 添付：サービス利用に関する確認書
			if (isset($data[OBJECT_ID_050480210]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050480210]) == 0) {
				$attachment .= strcmp("", $attachment) == 0 ? "" : "、";
				$attachment .= $reg_doc_list[REG_DOC_ID_00005];
			}
			// 添付：運用報告書
			if (isset($data[OBJECT_ID_050480220]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050480220]) == 0) {
				$attachment .= strcmp("", $attachment) == 0 ? "" : "、";
				$attachment .= $inv_doc_list[INV_DOC_ID_00004]."(".$data[OBJECT_ID_050480230]."：".$data[OBJECT_ID_050480240]."年".$data[OBJECT_ID_050480250]."月)";
			}
			// 添付：取引残高報告書
			if (isset($data[OBJECT_ID_050480260]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050480260]) == 0) {
				$attachment .= strcmp("", $attachment) == 0 ? "" : "、";
				$attachment .= $inv_doc_list[INV_DOC_ID_00005]."(".$data[OBJECT_ID_050480270]."年".$data[OBJECT_ID_050480280]."月)";
			}
			
			// ファイル作成
			$file_create = FILE_CREATE_FLAG_FALSE;
			if (isset($data[OBJECT_ID_050480290]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050480290]) == 0) {
				$file_create = FILE_CREATE_FLAG_TRUE;
			}
			
			// ◆管理者お知らせ履歴登録◆
			
			// 登録データ設定
			$admin_info_history = array(
				 COLUMN_2800020 => $info_id
				,COLUMN_2800030 => $method
				,COLUMN_2800040 => $conditions
				,COLUMN_2800050 => $subject
				,COLUMN_2800060 => $body
				,COLUMN_2800070 => $force_flag
				,COLUMN_2800080 => $agreement_flag
				,COLUMN_2800090 => $post_datetime
				,COLUMN_2800100 => $attachment
				,COLUMN_2800110 => $file_create
				,COLUMN_0000010 => $now
				,COLUMN_0000020 => $admin_id
				,COLUMN_0000030 => $admin_name
			);

			// 登録実行
			$this->Controller->TrnAdminInfoHistory->save($admin_info_history, false);
			
			
			// ◆送信対象者の投資家IDリスト取得◆
			
			$users = array();
			
			if ((strcmp(SPECIFIED_METHOD_CODE_0, $method) == 0 && strcmp("", $data[OBJECT_ID_050480090]) != 0)
					|| (strcmp(SPECIFIED_METHOD_CODE_1, $method) == 0 && strcmp("", $data[OBJECT_ID_050480100]) != 0)
					|| (strcmp(SPECIFIED_METHOD_CODE_2, $method) == 0 && strcmp("", $data[OBJECT_ID_050480100]) != 0)) {
				
				// 送信先の指定がある場合
				
				if (strcmp(SPECIFIED_METHOD_CODE_0, $method) == 0) {
					
					// 指定されたファンドに投資している投資家のIDを取得

					$inv_cond[COLUMN_1200040] = $data[OBJECT_ID_050480090];
					$inv_cond[COLUMN_1200090] = INVESTMENT_STATUS_CODE_APPROVED;

					$inv_fields[] = COLUMN_1200020;

					$inv_group[] = COLUMN_1200020;

					$inv_order[COLUMN_1200020] = MODEL_ASC;

					$inv_status[MODEL_CONDITIONS] = $inv_cond;
					$inv_status[MODEL_FIELDS]     = $inv_fields;
					$inv_status[MODEL_GROUP]      = $inv_group;
					$inv_status[MODEL_ORDER]      = $inv_order;

					$users = $this->Controller->TrnInvestmentHistory->find(MODEL_ALL, $inv_status);
				}
				elseif (strcmp(SPECIFIED_METHOD_CODE_1, $method) == 0) {
					
					// 管理番号をユーザIDに変換

					$lender_no_list = explode(",", $data[OBJECT_ID_050480100]);

					$lender_no_list_zero_pad = array();

					foreach ($lender_no_list as $key => $value) {
						$lender_no_list_zero_pad[] = sprintf("%08d", $value);
					}

					// 入力チェックにより無効、または不正な管理番号は全て排除されているのでin句を使用する
					$user_cond[COLUMN_0800015] = $lender_no_list_zero_pad;

					$user_fields[] = COLUMN_0800010;

					$user_order[COLUMN_0800010] = MODEL_ASC;

					$user_status[MODEL_CONDITIONS] = $user_cond;
					$user_status[MODEL_FIELDS]     = $user_fields;
					$user_status[MODEL_ORDER]      = $user_order;

					$users = $this->Controller->MstUser->find(MODEL_ALL, $user_status);
				}
				elseif (strcmp(SPECIFIED_METHOD_CODE_2, $method) == 0) {
					
					$user_id_list = explode(",", $data[OBJECT_ID_050480100]);

					// DBから取得した状態と同じするためユーザIDを多次元配列に入れなおす
					foreach ($user_id_list as $key => $value) {
						$users[] = array(array($value));
					}
				}
			}
			else {
				
				// 送信先の指定無しの場合
				// ※ ここを通るのは添付ファイルがある場合のみ
				
				if (isset($data[OBJECT_ID_050480170]) || isset($data[OBJECT_ID_050480180]) || isset($data[OBJECT_ID_050480190])
						|| isset($data[OBJECT_ID_050480200]) || isset($data[OBJECT_ID_050480210])) {

					// 投資家登録時書面添付時
					// 「承認済」、「認証済」、「停止中」の投資家IDを取得
					$user_cond[COLUMN_0800560] = array(
						 USER_STATUS_CODE_APPROVED
						,USER_STATUS_CODE_AUTHENTICATED
						,USER_STATUS_CODE_STOPPED
					);

					$user_fields[]  = COLUMN_0800010;

					$user_order[COLUMN_0800010] = MODEL_ASC;

					$user_status[MODEL_CONDITIONS] = $user_cond;
					$user_status[MODEL_FIELDS]     = $user_fields;
					$user_status[MODEL_ORDER]      = $user_order;

					$users = $this->Controller->MstUser->find(MODEL_ALL, $user_status);
				}
				elseif (isset($data[OBJECT_ID_050480220])) {

					// 運用報告書添付時
					// 指定された年月の運用報告書を交付済の投資家IDを取得
					$info_cond[COLUMN_1150040] = $data[OBJECT_ID_050480230];
					$info_cond[COLUMN_1150050] = INV_DOC_ID_00004;
					$info_cond[COLUMN_1150080] = $data[OBJECT_ID_050480240].sprintf("%02d", intval($data[OBJECT_ID_050480250]));

					$info_fields[] = COLUMN_1150020;

					$info_group[] = COLUMN_1150020;

					$info_order[COLUMN_1150020] = MODEL_ASC;

					$info_status[MODEL_CONDITIONS] = $info_cond;
					$info_status[MODEL_FIELDS]     = $info_fields;
					$info_status[MODEL_GROUP]      = $info_group;
					$info_status[MODEL_ORDER]      = $info_order;

					$users = $this->Controller->TrnInfoAttachment->find(MODEL_ALL, $info_status);
				}
				elseif (isset($data[OBJECT_ID_050480260])) {

					// 取引残高報告書添付時
					// 指定された年月の取引残高報告書を交付済の投資家IDを取得
					$info_cond[COLUMN_1150040] = INV_DOC_CAT_ID;
					$info_cond[COLUMN_1150050] = INV_DOC_ID_00005;
					$info_cond[COLUMN_1150080] = $data[OBJECT_ID_050480270].sprintf("%02d", intval($data[OBJECT_ID_050480280]));

					$info_fields[] = COLUMN_1150020;

					$info_group[] = COLUMN_1150020;

					$info_order[COLUMN_1150020] = MODEL_ASC;

					$info_status[MODEL_CONDITIONS] = $info_cond;
					$info_status[MODEL_FIELDS]     = $info_fields;
					$info_status[MODEL_GROUP]      = $info_group;
					$info_status[MODEL_ORDER]      = $info_order;

					$users = $this->Controller->TrnInfoAttachment->find(MODEL_ALL, $info_status);
				}
			}
			
			// 取得したユーザIDの件数分ループ
			foreach ($users as $keys => $user_values) {
				foreach ($user_values as $user_key => $user_value) {
					
					// お知らせ履歴登録
					
					// ユーザID取出し
					$user_id = array_shift($user_value);

					// お知らせ履歴登録
					$information = array(
						 COLUMN_1100020 => $user_id
						,COLUMN_1100030 => $info_id
						,COLUMN_1100040 => $now
						,COLUMN_1100050 => $subject
						,COLUMN_1100060 => $body
						,COLUMN_1100070 => $force_flag
						,COLUMN_1100080 => $agreement_flag
						,COLUMN_1100090 => $user_id
						,COLUMN_1100100 => $fund_id
						,COLUMN_1100110 => ""
						,COLUMN_1100120 => 0
						,COLUMN_1100130 => $post_datetime
					);

					$this->Controller->TrnInformationHistory->create();
					$this->Controller->TrnInformationHistory->save($information);

					// お知らせ添付書面登録

					$inv_doc_list = Configure::read(CONFIG_0045);
					$reg_doc_list = Configure::read(CONFIG_0064);

					// 添付：利用規約
					if (isset($data[OBJECT_ID_050480170])) {

						$infor_attach = array(
							 COLUMN_1150020 => $user_id
							,COLUMN_1150030 => $info_id
							,COLUMN_1150040 => REG_DOC_CAT_ID
							,COLUMN_1150050 => REG_DOC_ID_00001
							,COLUMN_1150060 => $reg_doc_list[REG_DOC_ID_00001]
							,COLUMN_1150070 => 1
							,COLUMN_1150080 => ""
						);

						$this->Controller->TrnInfoAttachment->create();
						$this->Controller->TrnInfoAttachment->save($infor_attach);
					}

					// 添付：契約締結前交付書面
					if (isset($data[OBJECT_ID_050480180])) {

						$infor_attach = array(
							 COLUMN_1150020 => $user_id
							,COLUMN_1150030 => $info_id
							,COLUMN_1150040 => REG_DOC_CAT_ID
							,COLUMN_1150050 => REG_DOC_ID_00002
							,COLUMN_1150060 => $reg_doc_list[REG_DOC_ID_00002]
							,COLUMN_1150070 => 1
							,COLUMN_1150080 => ""
						);

						$this->Controller->TrnInfoAttachment->create();
						$this->Controller->TrnInfoAttachment->save($infor_attach);
					}
					
					// 添付：匿名組合契約約款
					if (isset($data[OBJECT_ID_050480190])) {

						$infor_attach = array(
							 COLUMN_1150020 => $user_id
							,COLUMN_1150030 => $info_id
							,COLUMN_1150040 => REG_DOC_CAT_ID
							,COLUMN_1150050 => REG_DOC_ID_00003
							,COLUMN_1150060 => $reg_doc_list[REG_DOC_ID_00003]
							,COLUMN_1150070 => 1
							,COLUMN_1150080 => ""
						);

						$this->Controller->TrnInfoAttachment->create();
						$this->Controller->TrnInfoAttachment->save($infor_attach);
					}
					
					// 添付：電磁的方法による書面の交付に関する同意書
					if (isset($data[OBJECT_ID_050480200])) {

						$infor_attach = array(
							 COLUMN_1150020 => $user_id
							,COLUMN_1150030 => $info_id
							,COLUMN_1150040 => REG_DOC_CAT_ID
							,COLUMN_1150050 => REG_DOC_ID_00004
							,COLUMN_1150060 => $reg_doc_list[REG_DOC_ID_00004]
							,COLUMN_1150070 => 1
							,COLUMN_1150080 => ""
						);

						$this->Controller->TrnInfoAttachment->create();
						$this->Controller->TrnInfoAttachment->save($infor_attach);
					}
					
					// 添付：サービス利用に関する確認書
					if (isset($data[OBJECT_ID_050480210])) {

						$infor_attach = array(
							 COLUMN_1150020 => $user_id
							,COLUMN_1150030 => $info_id
							,COLUMN_1150040 => REG_DOC_CAT_ID
							,COLUMN_1150050 => REG_DOC_ID_00005
							,COLUMN_1150060 => $reg_doc_list[REG_DOC_ID_00005]
							,COLUMN_1150070 => 1
							,COLUMN_1150080 => ""
						);

						$this->Controller->TrnInfoAttachment->create();
						$this->Controller->TrnInfoAttachment->save($infor_attach);
					}
					
					// 添付：運用報告書
					if (isset($data[OBJECT_ID_050480220])) {

						$fund_id = $data[OBJECT_ID_050480230];
						$doc_id  = INV_DOC_ID_00004;

						// 書面パラメータ生成
						$doc_param = $data[OBJECT_ID_050480240].sprintf("%02d", $data[OBJECT_ID_050480250]);

						// 再交付時リビジョン取得
						$revision = $this->Pdf->getNextRevision($user_id, $fund_id, $doc_id, $doc_param);

						$infor_attach = array(
							 COLUMN_1150020 => $user_id
							,COLUMN_1150030 => $info_id
							,COLUMN_1150040 => $fund_id
							,COLUMN_1150050 => $doc_id
							,COLUMN_1150060 => $inv_doc_list[$doc_id]
							,COLUMN_1150070 => $revision
							,COLUMN_1150080 => $doc_param
						);

						$this->Controller->TrnInfoAttachment->create();
						$this->Controller->TrnInfoAttachment->save($infor_attach);
						
						if ($file_create) {
							
							// ファイル作成をチェックしていた場合、PDF生成
							$pdf_param = array();
							$pdf_param[ARRAY_INDEX_USER_ID]      = $user_id;
							$pdf_param[ARRAY_INDEX_DOC_CAT_ID]   = $fund_id;
							$pdf_param[ARRAY_INDEX_DOC_REV]      = $revision;
							$pdf_param[ARRAY_INDEX_REPORT_MONTH] = $doc_param;

							$this->Pdf->savePdf00004($pdf_param);
						}
					}
					
					// 添付：取引残高報告書
					if (isset($data[OBJECT_ID_050480260])) {
						
						$fund_id = INV_DOC_CAT_ID;
						$doc_id  = INV_DOC_ID_00005;

						// 書面パラメータ生成
						$doc_param = $data[OBJECT_ID_050480270].sprintf("%02d", $data[OBJECT_ID_050480280]);

						// 再交付時リビジョン取得
						$revision = $this->Pdf->getNextRevision($user_id, $fund_id, $doc_id, $doc_param);

						$infor_attach = array(
							 COLUMN_1150020 => $user_id
							,COLUMN_1150030 => $info_id
							,COLUMN_1150040 => $fund_id
							,COLUMN_1150050 => $doc_id
							,COLUMN_1150060 => $inv_doc_list[$doc_id]
							,COLUMN_1150070 => $revision
							,COLUMN_1150080 => $doc_param
						);

						$this->Controller->TrnInfoAttachment->create();
						$this->Controller->TrnInfoAttachment->save($infor_attach);
						
						if ($file_create) {
							
							// ファイル作成をチェックしていた場合、PDF生成
							$pdf_param = array();
							$pdf_param[ARRAY_INDEX_USER_ID]      = $user_id;
							$pdf_param[ARRAY_INDEX_DOC_CAT_ID]   = $fund_id;
							$pdf_param[ARRAY_INDEX_REPORT_MONTH] = $doc_param;
							$pdf_param[ARRAY_INDEX_DOC_REV]      = $revision;

							$this->Pdf->savePdf00005($pdf_param);
						}
					}
				}
			}
			
		} catch (Exception $ex) {
			$err = "InformationHistory->saveAdminInfo で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

}
