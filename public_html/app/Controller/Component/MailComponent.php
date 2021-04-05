<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class MailComponent extends Component {
	
	// 他のコンポーネントを使えるようにする。
	public $components = array(
		 "SessionUserInfo"
		,"Calendar"
		,"Company"
		,"Deposit"
		,"Fund"
		,"User"
		,"Session"
	);

	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * メール送信実行<br>
	 * @param array $data(to, subject, body)
	 * @param string $account
	 * @return boolean
	 */
	private function sendMail($data, $account = null) {
// 開発用
//$this->log($data);			
//return true;
		try {
			
			$to      = $data[MAIL_TO];
			$date    = date(DATETIME_FORMAT);
			$subject = $data[MAIL_SUBJECT];
			$body    = $data[MAIL_BODY];

			// デフォルトメールアカウント
			if (is_null($account)) {
				$account = MAIL_AUTO;
			}
			
			$mail = new CakeEmail($account);
			$mail->config(array(MAIL_LOG => MAIL_LOG_NAME))
					->to($to)
					->subject($subject)
					->send($body);

			return true;
			
		} catch (Exception $ex) {
			$err = "Mail->sendMail で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}

	/**
	 * 口座開設会員登録完了メール送信<br>
	 * タイトル、本文等を指定し、$this->sendMailで送信する。
	 * @param array $data
	 * @return boolean
	 */
	function sendMailIntReg($data) {
		
		try {
			
			$user_id = $data[COLUMN_0800010];
			$mail_to = $data[COLUMN_0800020];
			
			$company = $this->Company->getCompany();
			$c_name  = $company[COLUMN_0300020];
			$c_tel   = $company[COLUMN_0300140];
			$support = $company[COLUMN_0300160];
			$site_name  = $company[COLUMN_0300200];
			
			$subject = "【".$site_name."】会員登録完了のご連絡";

			$mail_data = array(

				// 送信先
				MAIL_TO => $mail_to,

				// メールタイトル
				MAIL_SUBJECT => $subject,

				// メール本文
				MAIL_BODY => ""
					."この度は、".$site_name." 会員登録をいただきありがとうございます。".LINE_FEED_CODE
					."会員登録が完了いたしました。ログイン後、公開ファンドの詳細情報等が閲覧いただけます。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."【".$site_name."】 ".LINE_FEED_CODE
					.URL_SITE_TOP.LINE_FEED_CODE
					."".LINE_FEED_CODE
					."※現時点では出資を行うことはできません。出資申込みを行うには出資者情報登録が必要です。".LINE_FEED_CODE
					."ログイン後、出資者情報登録にお進みください。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."ご不明な点等ございましたら、ホームページ内お問い合わせよりお問い合わせください。".LINE_FEED_CODE
					."※このメールは送信専用メールアドレスより配信されております。こちらのメールアドレスに返信いただいても受付できませんのでご注意ください。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."下記IDはお問い合わせやパスワードの紛失時等にご使用いただけるIDになります。".LINE_FEED_CODE
					."――――――――――――――".LINE_FEED_CODE
					."ID：".$user_id.LINE_FEED_CODE
					."――――――――――――――".LINE_FEED_CODE
					//."大切に保管してください。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					
					."――――――――――――――――――――――――――――――――".LINE_FEED_CODE
					."運営会社／".$c_name.LINE_FEED_CODE
					."不動産特定共同事業許可番号　東京都知事　第129号".LINE_FEED_CODE
					."メールアドレス：".$support.LINE_FEED_CODE
					."電話番号　　　：".$c_tel.LINE_FEED_CODE
					."".LINE_FEED_CODE
					."※このメールは、特定の宛先に送信されたものであり、機密情報を含んでいる場合がございます。".LINE_FEED_CODE
					."このメールに心当たりのない方は、まことにお手数ですが".$support."までご連絡の上、このメールおよび添付物を破棄くださいますようお願い申し上げます。".LINE_FEED_CODE
					."なお、このメールを開示、複製、使用することを禁止させていただきます。".LINE_FEED_CODE
			);

			return $this->sendMail($mail_data);
			
		} catch (Exception $ex) {
			$err = "Mail->sendMailIntReg で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * 本人確認書類画像送信用メール送信<br>
	 * タイトル、本文等を指定し、$this->sendMailで送信する。
	 * @param array $user_info
	 * @return boolean
	 *本人確認書類提出完了メール送信
         */
	function sendMailIdentification($user_info) {
		
		try {
			
			// セッションからユーザ情報取得
			$user_id   = $user_info[LOGIN_USER_ID];
			$user_name = $user_info[LOGIN_USER_NAME];
			$mail_to   = $user_info[LOGIN_USER_MAIL_ADDRESS];
			$company = $this->Company->getCompany();
			$c_name  = $company[COLUMN_0300020];
			$c_zip   = "〒 ".substr($company[COLUMN_0300030], 0, 3)."-".substr($company[COLUMN_0300030], 3);
			$c_addr1 = $company[COLUMN_0300040];
			$c_addr2 = $company[COLUMN_0300050];
			$c_tel   = $company[COLUMN_0300140];
			$support = $company[COLUMN_0300160];
			$site_name  = $company[COLUMN_0300200];
			
			$subject   = "【".$site_name."】各種書類　アップロード完了のご連絡";

			$mail_data = array(

				// 送信先
				MAIL_TO => $mail_to,
				// メールタイトル
				MAIL_SUBJECT => $subject,

				// メール本文
				MAIL_BODY => ""
					//.$subject.LINE_FEED_CODE
					//."――――――――――――――――――――――".LINE_FEED_CODE
					.$user_name."様".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."この度は、".$site_name."出資者登録をいただき誠にありがとうございます。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."これよりご登録いただいた内容および書類をもとに弊社にて本人確認を行います。".LINE_FEED_CODE
					."本人確認が完了いたしましたら、ご登録住所宛てに「本人確認キー」を記載したハガキを「書留(転送不要）」で送付いたします。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."【今後の流れ】".LINE_FEED_CODE
					."1.　ハガキ「書留(転送不要）」をお受け取り下さい。".LINE_FEED_CODE
					."2.　".$site_name."へログインしていただき、「本人確認キー」を入力・送信してください。".LINE_FEED_CODE
					."■".$site_name."■ ".LINE_FEED_CODE
					.URL_SITE_TOP.LINE_FEED_CODE
					."".LINE_FEED_CODE
					."以上で出資者登録が完了となります。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."ご不明な点がございましたら、ホームページ内お問い合わせよりお問い合わせください。".LINE_FEED_CODE
					."※このメールは送信専用メールアドレスより配信されております。こちらのメールアドレスに返信いただいても受付できませんのでご注意ください。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."――――――――――――――――――――――――――――――――".LINE_FEED_CODE
					."運営会社／".$c_name.LINE_FEED_CODE
					."不動産特定共同事業許可番号　東京都知事　第129号".LINE_FEED_CODE
					."メールアドレス：".$support.LINE_FEED_CODE
					."電話番号　　　：".$c_tel.LINE_FEED_CODE
					."".LINE_FEED_CODE
					."※このメールは、特定の宛先に送信されたものであり、機密情報を含んでいる場合がございます。".LINE_FEED_CODE
					."このメールに心当たりのない方は、まことにお手数ですが".$support."までご連絡の上、このメールおよび添付物を破棄くださいますようお願い申し上げます。".LINE_FEED_CODE
					."なお、このメールを開示、複製、使用することを禁止させていただきます。".LINE_FEED_CODE
			);

			//return $this->sendMail($mail_data, MAIL_CONFIRM);
			$result = $this->sendMail($mail_data, MAIL_AUTO);//投資家へのメール送信
                        $mail_data[MAIL_TO] = "confirm@second-l.jp";
                        $result = $this->sendMail($mail_data); // 営業者側へメール送信                         
                        return $result;			


		} catch (Exception $ex) {
			$err = "Mail->sendMailIdentification で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * 認証完了メール送信<br>
	 * タイトル、本文等を指定し、$this->sendMailで送信する。
	 * @param array $user_info
	 * @return boolean
	 */
	function sendMailAuthenticate($user_info) {
		
		try {
			
			// セッションからユーザ情報取得
			$user_id   = $user_info[LOGIN_USER_ID];
			$user_name = $user_info[LOGIN_USER_NAME];
			$mail_to   = $user_info[LOGIN_USER_MAIL_ADDRESS];
			
			$company = $this->Company->getCompany();
			$c_name  = $company[COLUMN_0300020];
			$c_zip   = "〒 ".substr($company[COLUMN_0300030], 0, 3)."-".substr($company[COLUMN_0300030], 3);
			$c_addr1 = $company[COLUMN_0300040];
			$c_addr2 = $company[COLUMN_0300050];
			$c_tel   = $company[COLUMN_0300140];
			$support = $company[COLUMN_0300160];
			$site_name  = $company[COLUMN_0300200];
			
			$subject   = "【".$site_name."】出資者登録完了のご連絡";

			$mail_data = array(

				// 送信先
				MAIL_TO => $mail_to,

				// メールタイトル
				MAIL_SUBJECT => $subject,

				// メール本文
				MAIL_BODY => ""
					//.$subject.LINE_FEED_CODE
					//."――――――――――――――――――――――".LINE_FEED_CODE
					.$user_name."様".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."この度は、".$site_name."出資者登録をいただき誠にありがとうございます。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."本人確認の認証が完了し、出資者登録手続きが完了いたしました。".LINE_FEED_CODE
					."このメールをもって募集中のファンドへの出資申込が可能となります。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."■".$site_name."■ ".LINE_FEED_CODE
					.URL_SITE_TOP.LINE_FEED_CODE
					."".LINE_FEED_CODE
					."【出資の流れ】".LINE_FEED_CODE
					."1.　出資したい商品をお選びください。".LINE_FEED_CODE
					."2.　重要事項等確認の上、出資金額を入力し決定してください。".LINE_FEED_CODE
					."3.　当社より出資確定のご案内メールをお送りします。マイページより契約成立時交付書面および不動産特定共同事業契約書を確認の上、入金期日までにご入金ください。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."詳しくはこちらからご確認ください。".LINE_FEED_CODE
					.URL_FLOW_PAGE.LINE_FEED_CODE
					."".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."ご不明な点等ございましたら、ホームページ内お問い合わせよりお問い合わせください。".LINE_FEED_CODE
					."※このメールは送信専用メールアドレスより配信されております。こちらのメールアドレスに返信いただいても受付できませんのでご注意ください。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."――――――――――――――――――――――――――――――――".LINE_FEED_CODE
					."運営会社／".$c_name.LINE_FEED_CODE
					."不動産特定共同事業許可番号　東京都知事　第129号".LINE_FEED_CODE
					."メールアドレス：".$support.LINE_FEED_CODE
					."電話番号　　　：".$c_tel.LINE_FEED_CODE
					."".LINE_FEED_CODE
					."※このメールは、特定の宛先に送信されたものであり、機密情報を含んでいる場合がございます。".LINE_FEED_CODE
					."このメールに心当たりのない方は、まことにお手数ですが".$support."までご連絡の上、このメールおよび添付物を破棄くださいますようお願い申し上げます。".LINE_FEED_CODE
					."なお、このメールを開示、複製、使用することを禁止させていただきます。".LINE_FEED_CODE
			);

			return $this->sendMail($mail_data);
			
		} catch (Exception $ex) {
			$err = "Mail->sendMailAuthenticate で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * 投資申込受付メール送信<br>
	 * 投資家が投資の申込を行った際に自動送信される。<br>
	 * @param array $user_info $data
	 * @return boolean $result
	 */
	function sendMailInvestmentApplication($user_info, $data) {
		
		try {
			
			// セッションからユーザ情報取得
			$user_id   = $user_info[LOGIN_USER_ID];
			$user_name = $user_info[LOGIN_USER_NAME];
			$mail_to   = $user_info[LOGIN_USER_MAIL_ADDRESS];

			$fund_id        = $data[COLUMN_1200040];         // 投資履歴：ファンドID
			$fund_name      = $data[COLUMN_1200050];         // 投資履歴：ファンド名
			$inv_amount     = number_format($data[COLUMN_1200070] / 10000); // 投資履歴：投資金額

			$app_hour   = date("G", strtotime($data[COLUMN_1200060]));
			$app_minute = date("i", strtotime($data[COLUMN_1200060]));
			$app_second = date("s", strtotime($data[COLUMN_1200060]));
			$app_date  = $this->Calendar->convertAdtoJa($data[COLUMN_1200060])." ".$app_hour."時".$app_minute."分".$app_second."秒"; // 申込日時

			$exp_date  = $this->Calendar->convertAdtoJa($data[COLUMN_1200080]); // 入金期限日
			
			// ファンドデータ取得
			$fund     = $this->Controller->Fund->getMstFund($fund_id);
			$ope_term = 0;
			foreach ($fund as $keys => $values) {
				foreach ($values as $key => $value) {
					$ope_term = $value[COLUMN_0500120];  // ファンドマスタ：運用期間
				}
			}

			// 貸付データ取得
			$loan = $this->Controller->Fund->getMstLoan($fund_id, 1);
			$rate = 0;
			foreach ($loan as $keys => $values) {
				foreach ($values as $key => $value) {
					$rate = $value[COLUMN_0700090]; // 貸付マスタ：実質年率
				}
			}

			// 振込先口座情報取得
			$deposit_account = $this->Deposit->getAccountInfo($user_id);
			
			$acc_type_list = Configure::read(CONFIG_0012);
			$company    = $this->Company->getCompany();
			$c_name     = $company[COLUMN_0300020];
			$c_account  = $deposit_account[COLUMN_2900040]."　".$deposit_account[COLUMN_2900070]."支店　".$acc_type_list[$deposit_account[COLUMN_2900090]]."　".$deposit_account[COLUMN_2900100];
			$acc_holder = $deposit_account[COLUMN_2900110];
//			$c_account  = $company[COLUMN_0300060]."　".$company[COLUMN_0300070]."　".$acc_type_list[$company[COLUMN_0300080]]."　".$company[COLUMN_0300090];
//			$acc_holder = $company[COLUMN_0300100];
			$c_tel      = $company[COLUMN_0300140];
			$support    = $company[COLUMN_0300160];
                        $site_name  = $company[COLUMN_0300200];
			$subject = "【".$site_name."】出資申込受付";

			$mail_data = array(

				// 送信先
				MAIL_TO => $mail_to,

				// メールタイトル
				MAIL_SUBJECT => $subject,

				// メール本文
				MAIL_BODY => ""
					//.$subject.LINE_FEED_CODE
					//."――――――――――――――――――――".LINE_FEED_CODE
					.$user_name."様".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."".$site_name."をご利用いただき誠にありがとうございます。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."下記内容で出資申込を受け付けました。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."審査後、ご登録メールアドレスに「出資確定のご連絡」をメールいたします。".LINE_FEED_CODE
					."出資確定のご連絡まで今しばらくお待ちください。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."【申込内容】".LINE_FEED_CODE
					."ファンド名　　：".$fund_name.LINE_FEED_CODE
					."申込金額　　　：".$inv_amount."万円".LINE_FEED_CODE
					."申込日時　　　：".$app_date.LINE_FEED_CODE
					."".LINE_FEED_CODE
					."申込いただいた内容は「マイページ＞出資履歴」でご確認いただけます。".LINE_FEED_CODE
					."■".$site_name."■ ".LINE_FEED_CODE
					.URL_SITE_TOP.LINE_FEED_CODE
					."".LINE_FEED_CODE
					."――――――――――――――――――――――".LINE_FEED_CODE
					."■ご利用の流れ".LINE_FEED_CODE
					.URL_FLOW_PAGE.LINE_FEED_CODE
					."■よくある質問".LINE_FEED_CODE
					.URL_QUESTION_PAGE.LINE_FEED_CODE
					."■クーリングオフについて".LINE_FEED_CODE
					.URL_COOLINGOFF_PAGE.LINE_FEED_CODE
					."――――――――――――――――――――――".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."ご不明な点等ございましたら、ホームページ内お問い合わせよりお問い合わせください。".LINE_FEED_CODE
					."※このメールは送信専用メールアドレスより配信されております。こちらのメールアドレスに返信いただいても受付できませんのでご注意ください。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."――――――――――――――――――――――――――――――――".LINE_FEED_CODE
					."運営会社／".$c_name.LINE_FEED_CODE
					."不動産特定共同事業許可番号　東京都知事　第129号".LINE_FEED_CODE
					."メールアドレス：".$support.LINE_FEED_CODE
					."電話番号　　　：".$c_tel.LINE_FEED_CODE
					."".LINE_FEED_CODE
                    ."※このメールは、特定の宛先に送信されたものであり、機密情報を含んでいる場合がございます。".LINE_FEED_CODE
					."このメールに心当たりのない方は、まことにお手数ですが".$support."までご連絡の上、このメールおよび添付物を破棄くださいますようお願い申し上げます。".LINE_FEED_CODE
					."なお、このメールを開示、複製、使用することを禁止させていただきます。".LINE_FEED_CODE
			);

			$result = $this->sendMail($mail_data); // 投資家へメール送信
			
			$mail_data[MAIL_TO] = "invest_alert@trust-lending.net";
			$result = $this->sendMail($mail_data); // 営業者側へメール送信
			
			return $result;
			
		} catch (Exception $ex) {
			$err = "Mail->sendMailInvestmentApplication で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * 投資申込承認メール送信<br>
	 * 投資家の投資申込に対して管理者が承認を行った際に送信する。<br>
	 * @param array $data
	 * @return boolean
	 */
	function sendMailInvestmentApprove($data) {
		
		try {
			
			// データ取出し
			$user_id   = $data[COLUMN_1200020];
			$user_name = $data[COLUMN_1200030];
			
			$fund_id   = $data[COLUMN_1200040];
			$fund_name = $data[COLUMN_1200050];
			
			$inv_amount    = number_format($data[COLUMN_1200070] / 10000); // 投資履歴：投資金額
			
			$contract_date  = $this->Calendar->convertAdtoJa($data[COLUMN_1200100]); // 承認日
			
			$exp_date  = $this->Calendar->convertAdtoJa($data[COLUMN_1200080]); // 入金期限日
			// ユーザデータ取得
			$user = $this->User->getMstUser($user_id);
			$mail_to = $user[COLUMN_0800020];  // ファンドマスタ：運用期間

			// ファンドデータ取得
			$fund     = $this->Fund->getMstFund($fund_id);
			$ope_term = 0;
			foreach ($fund as $keys => $values) {
				foreach ($values as $key => $value) {
					$ope_term = $value[COLUMN_0500120];  // ファンドマスタ：運用期間
				}
			}

			// 貸付データ取得
			$loan = $this->Fund->getMstLoan($fund_id, 1);
			$rate = 0;
			foreach ($loan as $keys => $values) {
				foreach ($values as $key => $value) {
					$rate = $value[COLUMN_0700090]; // 貸付マスタ：実質年率
				}
			}
			
			$company = $this->Company->getCompany();
			$c_name  = $company[COLUMN_0300020];
			$c_tel   = $company[COLUMN_0300140];
			$support = $company[COLUMN_0300160];
			$site_name  = $company[COLUMN_0300200];
			
			// 振込先口座情報取得
			$deposit_account = $this->Deposit->getAccountInfo($user_id);
			
			$acc_type_list = Configure::read(CONFIG_0012);
			$company    = $this->Company->getCompany();
			$c_name     = $company[COLUMN_0300020];
//			$c_account  = $deposit_account[COLUMN_2900040]."　".$deposit_account[COLUMN_2900070]."支店　".$acc_type_list[$deposit_account[COLUMN_2900090]]."　".$deposit_account[COLUMN_2900100];
//			$acc_holder = $deposit_account[COLUMN_2900110];
			$c_account  = $company[COLUMN_0300060]."　".$company[COLUMN_0300070]."　".$acc_type_list[$company[COLUMN_0300080]]."　".$company[COLUMN_0300090];
			$acc_holder = $company[COLUMN_0300100];
			$c_tel      = $company[COLUMN_0300140];
			$support    = $company[COLUMN_0300160];
			
			$subject = "【".$site_name."】出資確定のご連絡";

			$mail_data = array(

				// 送信先
				MAIL_TO => $mail_to,

				// メールタイトル
				MAIL_SUBJECT => $subject,

				// メール本文
				MAIL_BODY => ""
					//.$subject.LINE_FEED_CODE
					//."――――――――――――――――――――――".LINE_FEED_CODE
					.$user_name."様".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."".$site_name."をご利用いただき誠にありがとうございます。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."下記内容で出資が確定いたしました。".LINE_FEED_CODE
					."【出資確定内容】".LINE_FEED_CODE
					."ファンド名　　　　：".$fund_name.LINE_FEED_CODE
					."出資確定金額　　　：".$inv_amount."万円".LINE_FEED_CODE
					."出資確定日　　　　：".$contract_date.LINE_FEED_CODE
					."書面確認・入金期日：".$exp_date.LINE_FEED_CODE
					."".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."【今後の流れ】".LINE_FEED_CODE
					."1.　「マイページ＞お知らせ」より下記書面の内容確認および同意を行ってください。　".LINE_FEED_CODE
					."■".$site_name."■ ".LINE_FEED_CODE
					.URL_SITE_TOP.LINE_FEED_CODE
					."・契約成立時交付書面".LINE_FEED_CODE
					."・不動産特定共同事業契約書".LINE_FEED_CODE
					."".LINE_FEED_CODE
					//."".LINE_FEED_CODE
					//."「マイページ＞お知らせ」で下記の2書面の内容確認および同意いただいた上で、期日内に指定口座までお振込ください。".LINE_FEED_CODE
					//."■".$site_name."■ ".LINE_FEED_CODE
					//.URL_SITE_TOP.LINE_FEED_CODE
					//."・契約成立時交付書面".LINE_FEED_CODE
					//."・不動産特定共同事業契約約款".LINE_FEED_CODE
					."2.　期日内に下記口座までお振込みください。".LINE_FEED_CODE
					."＜振込指定口座＞".LINE_FEED_CODE
					.$c_account.LINE_FEED_CODE
					.$acc_holder.LINE_FEED_CODE
					."お振込み手数料はお客様負担となります。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."※お振込みをいただいても書面の同意を期日内にいただけない場合には、振込手数料を差し引きご登録金融機関へ返金させていただきます。予めご了承ください。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."――――――――――――――――――――――".LINE_FEED_CODE
					."■ご利用の流れ".LINE_FEED_CODE
					.URL_FLOW_PAGE.LINE_FEED_CODE
					."■よくある質問".LINE_FEED_CODE
					.URL_QUESTION_PAGE.LINE_FEED_CODE
					."■クーリングオフについて".LINE_FEED_CODE
					.URL_COOLINGOFF_PAGE.LINE_FEED_CODE
					."――――――――――――――――――――――".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."ご不明な点等ございましたら、ホームページ内お問い合わせよりお問い合わせください。".LINE_FEED_CODE
					."※このメールは送信専用メールアドレスより配信されております。こちらのメールアドレスに返信いただいても受付できませんのでご注意ください。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."――――――――――――――――――――――――――――――――".LINE_FEED_CODE
					."運営会社／".$c_name.LINE_FEED_CODE
					."不動産特定共同事業許可番号　東京都知事　第129号".LINE_FEED_CODE
					."メールアドレス：".$support.LINE_FEED_CODE
					."電話番号　　　：".$c_tel.LINE_FEED_CODE
					."".LINE_FEED_CODE
					."※このメールは、特定の宛先に送信されたものであり、機密情報を含んでいる場合がございます。".LINE_FEED_CODE
					."このメールに心当たりのない方は、まことにお手数ですが".$support."までご連絡の上、このメールおよび添付物を破棄くださいますようお願い申し上げます。".LINE_FEED_CODE
					."なお、このメールを開示、複製、使用することを禁止させていただきます。".LINE_FEED_CODE
			);

			
			return $this->sendMail($mail_data);
			
			// 2018/04/10 投資家へのメール送付後に営業側へのメール送信する処理を追加
			// 2018/04/13 メール送信時間増加の懸念により追加処理を保留
/*
			$result = $this->sendMail($mail_data); // 投資家へメール送信
			
			$mail_data[MAIL_TO] = "invest_alert@trust-lending.net";
			$result = $this->sendMail($mail_data); // 営業者側へメール送信
			
			return $result;
*/			
		} catch (Exception $ex) {
			$err = "Mail->sendMailInvestmentApprove で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * 変更受付メール送信<br>
	 * タイトル、本文等を指定し、$this->sendMailで送信する。
	 * @param array $data
	 * @return boolean
	 */
	function sendMailUserDataCorrect($eventid, $user_info) {
		
		try {
			$text = null;
			
			if (strcmp($eventid, EVENT_ID_040080010) == 0) {
				$text = "メールアドレスの変更";
			}
			elseif (strcmp($eventid, EVENT_ID_040080020) == 0) {
				$text = "パスワードの変更";
			}
			elseif (strcmp($eventid, EVENT_ID_040080030) == 0) {
				$text = "メルマガ配信設定の変更";
			}
			
			$user_name = $user_info[COLUMN_0800060]." ".$user_info[COLUMN_0800070];
			$mail_to   = $user_info[COLUMN_0800020];
			
			$company = $this->Company->getCompany();
			$c_name  = $company[COLUMN_0300020];
			$c_tel   = $company[COLUMN_0300140];
			$support = $company[COLUMN_0300160];
			$site_name  = $company[COLUMN_0300200];
			
			$subject   = "【".$site_name."】変更受付のご連絡";

			$mail_data = array(

				// 送信先
				MAIL_TO => $mail_to,

				// メールタイトル
				MAIL_SUBJECT => $subject,

				// メール本文
				MAIL_BODY => ""
					//."【".$site_name."】".$text."受付のご連絡".LINE_FEED_CODE
					//."――――――――――――――――――――――".LINE_FEED_CODE
					.$user_name."様".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."".$site_name."をご利用いただき誠にありがとうございます。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."".$text."を受け付けました。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."ご不明な点等ございましたら、ホームページ内お問い合わせよりお問い合わせください。".LINE_FEED_CODE
					."※このメールは送信専用メールアドレスより配信されております。こちらのメールアドレスに返信いただいても受付できませんのでご注意ください。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."――――――――――――――――――――――――――――――――".LINE_FEED_CODE
					."運営会社／".$c_name.LINE_FEED_CODE
					."不動産特定共同事業許可番号　東京都知事　第129号".LINE_FEED_CODE
					."メールアドレス：".$support.LINE_FEED_CODE
					."電話番号　　　：".$c_tel.LINE_FEED_CODE
					."".LINE_FEED_CODE
					."※このメールは、特定の宛先に送信されたものであり、機密情報を含んでいる場合がございます。".LINE_FEED_CODE
					."このメールに心当たりのない方は、まことにお手数ですが".$support."までご連絡の上、このメールおよび添付物を破棄くださいますようお願い申し上げます。".LINE_FEED_CODE
					."なお、このメールを開示、複製、使用することを禁止させていただきます。".LINE_FEED_CODE
			);

			return $this->sendMail($mail_data);
			
		} catch (Exception $ex) {
			$err = "Mail->sendMailUserDataCorrect で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * お問い合わせ受付メール送信<br>
	 * タイトル、本文等を指定し、$this->sendMailで送信する。
	 * @param array $data
	 * @return boolean
	 */
	function sendMailContact($data) {
		
		try {
			
			$mail_to = $data[OBJECT_ID_010070040];
			
			// リスト
			$list[CONFIG_0049] = Configure::read(CONFIG_0049);
				
			$user_id      = $data[OBJECT_ID_010070030];
			$kanji_name   = $data[OBJECT_ID_010070010];
			$furi_name    = $data[OBJECT_ID_010070020];
			$mail_address = $data[OBJECT_ID_010070040];
			$mobil_number = $data[OBJECT_ID_010070050];
			$contact_name = $data[OBJECT_ID_010070070];
			$contact_info = $data[OBJECT_ID_010070080];
			$message_type = $list[CONFIG_0049][$data[OBJECT_ID_010070090]];
			
			$company = $this->Company->getCompany();
			$c_name  = $company[COLUMN_0300020];
			$c_tel   = $company[COLUMN_0300140];
			$support = $company[COLUMN_0300160];
			$site_name  = $company[COLUMN_0300200];
			
			$subject = "【".$site_name."】お問い合わせ受付";
			
			$mail_data = array(
				
				// 送信先
				MAIL_TO => $mail_to,

				// メールタイトル
				MAIL_SUBJECT => $subject,

				// メール本文
				MAIL_BODY => ""
					//.$subject.LINE_FEED_CODE
					//."――――――――――――――――――――――".LINE_FEED_CODE
					//."".LINE_FEED_CODE
					."お問い合わせありがとうございます。".LINE_FEED_CODE
					."下記の内容で、お問い合わせを受け付けました。".LINE_FEED_CODE
					."内容を確認後、ご連絡いたします。尚、お問い合わせの内容によっては、数日お時間をいただく場合もあります。ご了承ください".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."【お問い合わせ内容】".LINE_FEED_CODE
					."氏名　　　　　　　：".$kanji_name   .LINE_FEED_CODE
					."フリガナ　　　　　：".$furi_name    .LINE_FEED_CODE
					."ＩＤ　　　　　　　：".$user_id      .LINE_FEED_CODE
					."メールアドレス　　：".$mail_address .LINE_FEED_CODE
					."お電話番号　　　　：".$mobil_number .LINE_FEED_CODE
					//."ご連絡方法      ：".$message_type .LINE_FEED_CODE
					."お問い合わせ(件名)：".$contact_name .LINE_FEED_CODE
					."　　　　　　(内容)：".$contact_info .LINE_FEED_CODE
					."".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."※このメールは送信専用メールアドレスより配信されております。こちらのメールアドレスに返信いただいても受付できませんのでご注意ください。".LINE_FEED_CODE
					."――――――――――――――――――――――――――――――――".LINE_FEED_CODE
					."運営会社／".$c_name.LINE_FEED_CODE
					."不動産特定共同事業許可番号　東京都知事　第129号".LINE_FEED_CODE
					."メールアドレス：".$support.LINE_FEED_CODE
					."電話番号　　　：".$c_tel.LINE_FEED_CODE
					."".LINE_FEED_CODE
					."※このメールは、特定の宛先に送信されたものであり、機密情報を含んでいる場合がございます。".LINE_FEED_CODE
					."このメールに心当たりのない方は、まことにお手数ですが".$support."までご連絡の上、このメールおよび添付物を破棄くださいますようお願い申し上げます。".LINE_FEED_CODE
					."なお、このメールを開示、複製、使用することを禁止させていただきます。".LINE_FEED_CODE
			);
			
			return $this->sendMail($mail_data);
			
		} catch (Exception $ex) {
			$err = "Mail->sendMailContact で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * 問い合わせ受付メール送信(営業者向け)<br>
	 * タイトル、本文等を指定し、$this->sendMailで送信する。
	 * @param array $data
	 * @return boolean
	 */
	function sendMailContacttoAdmin($data) {
		
		try {
			
			// リスト
			$list[CONFIG_0049] = Configure::read(CONFIG_0049);
				
			$user_id      = $data[OBJECT_ID_010070030];
			$kanji_name   = $data[OBJECT_ID_010070010];
			$furi_name    = $data[OBJECT_ID_010070020];
			$mail_address = $data[OBJECT_ID_010070040];
			$mobil_number = $data[OBJECT_ID_010070050];
			$contact_name = $data[OBJECT_ID_010070070];
			$contact_info = $data[OBJECT_ID_010070080];
			$message_type = $list[CONFIG_0049][$data[OBJECT_ID_010070090]];
			
			$company = $this->Company->getCompany();
			$c_name  = $company[COLUMN_0300020];
			$c_tel   = $company[COLUMN_0300140];
			$support = $company[COLUMN_0300160];
			$site_name  = $company[COLUMN_0300200];
			
			$mail_to = $support;
			
			$subject = "【".$site_name."】問い合わせ受付";
			
			$mail_data = array(
				
				// 送信先
				MAIL_TO => $mail_to,

				// メールタイトル
				MAIL_SUBJECT => $subject,

				// メール本文
				MAIL_BODY => ""
					//.$subject.LINE_FEED_CODE
					//."――――――――――――――――――――――".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."下記の内容で、ユーザからの問い合わせを受け付けました。".LINE_FEED_CODE
					."確認の上、対応ください。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."【お問い合わせ内容】".LINE_FEED_CODE
					."氏名　　　　　　　：".$kanji_name   .LINE_FEED_CODE
					."フリガナ　　　　　：".$furi_name    .LINE_FEED_CODE
					."ＩＤ　　　　　　　：".$user_id      .LINE_FEED_CODE
					."メールアドレス　　：".$mail_address .LINE_FEED_CODE
					."お電話番号　　　　：".$mobil_number .LINE_FEED_CODE
					//."ご連絡方法　　　：".$message_type .LINE_FEED_CODE
					."お問い合わせ(件名)：".$contact_name .LINE_FEED_CODE
					."　　　　　　(内容)：".$contact_info .LINE_FEED_CODE
					."".LINE_FEED_CODE
					."以上".LINE_FEED_CODE
			);
			
			return $this->sendMail($mail_data);
			
		} catch (Exception $ex) {
			$err = "Mail->sendMailContacttoAdmin で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * パスワード再発行<br>
	 * タイトル、本文等を指定し、$this->sendMailで送信する。
	 * @param string $event_id $data
	 * @return boolean
	 */
	function sendMailReisue($event_id, $data) {
		
		try {
			
			$mail_data = null;
			
			$user_id   = "";
			$mail_to   = "";
			$password  = "";
			$user_name = "";
			
			$subject = "";
			$body    = "";
			$user    = null;
			if (strcmp(EVENT_ID_010050010, $event_id) == 0) {
				
				// ユーザデータ取得
				$user = $this->User->getMstUser($data);
			}
			elseif (strcmp(EVENT_ID_010050020, $event_id) == 0) {
				
				// ユーザデータ取得
				$user = $this->User->getMstUserbyMailAddress($data);
			}
			
			$user_id   = $user[COLUMN_0800010];
			$mail_to   = $user[COLUMN_0800020];
			$password  = $user[COLUMN_0800030];
			$status    = $user[COLUMN_0800560];
			if (strcmp(USER_STATUS_CODE_INTERIM, $status) == 0) {
				$user_name = "仮会員";
			}
			else {
				$user_name = $user[COLUMN_0800060]." ".$user[COLUMN_0800070];
			}
			
			$company = $this->Company->getCompany();
			$c_name  = $company[COLUMN_0300020];
			$c_tel   = $company[COLUMN_0300140];
			$support = $company[COLUMN_0300160];
			$site_name  = $company[COLUMN_0300200];
			
			if (strcmp(EVENT_ID_010050010, $event_id) == 0) {
				
				$subject = "【".$site_name."】仮パスワードのお知らせ";

				// メール本文
				$body = ""
					//.$subject.LINE_FEED_CODE
					//."――――――――――――――――――――――".LINE_FEED_CODE
					//.$user_name." 様".LINE_FEED_CODE
					//."".LINE_FEED_CODE
					."".$site_name."をご利用いただき誠にありがとうございます。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."仮パスワードを発行いたしました。".LINE_FEED_CODE
					."（仮パスワード）".$password.LINE_FEED_CODE
					."".LINE_FEED_CODE
					."仮パスワードでログインいただき、パスワードを変更してください。".LINE_FEED_CODE
					."■".$site_name."■ ".LINE_FEED_CODE
					.URL_SITE_TOP.LINE_FEED_CODE
					."".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."ご不明な点等ございましたら、ホームページ内お問い合わせよりお問い合わせください。".LINE_FEED_CODE
					."※このメールは送信専用メールアドレスより配信されております。こちらのメールアドレスに返信いただいても受付できませんのでご注意ください。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."――――――――――――――――――――――――――――――――".LINE_FEED_CODE
					."運営会社／".$c_name.LINE_FEED_CODE
					."不動産特定共同事業許可番号　東京都知事　第129号".LINE_FEED_CODE
					."メールアドレス：".$support.LINE_FEED_CODE
					."電話番号　　　：".$c_tel.LINE_FEED_CODE
					."".LINE_FEED_CODE
					."※このメールは、特定の宛先に送信されたものであり、機密情報を含んでいる場合がございます。".LINE_FEED_CODE
					."このメールに心当たりのない方は、まことにお手数ですが".$support."までご連絡の上、このメールおよび添付物を破棄くださいますようお願い申し上げます。".LINE_FEED_CODE
                                        ."なお、このメールを開示、複製、使用することを禁止させていただきます。".LINE_FEED_CODE
                                        ."";
			}
			elseif (strcmp(EVENT_ID_010050020, $event_id) == 0) {
				
				$subject = "【".$site_name."】ＩＤのお知らせ";

				// メール本文
				$body = ""
					//.$subject.LINE_FEED_CODE
					//."――――――――――――――――――――――".LINE_FEED_CODE
					.$user_name." 様".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."".$site_name."をご利用いただき誠にありがとうございます。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."ＩＤをお知らせいたします。".LINE_FEED_CODE
					."ＩＤ：".$user_id.LINE_FEED_CODE
					."".LINE_FEED_CODE
					."■".$site_name."■ ".LINE_FEED_CODE
					.URL_SITE_TOP.LINE_FEED_CODE
					."".LINE_FEED_CODE
					."ご不明な点等ございましたら、ホームページ内お問い合わせよりお問い合わせください。".LINE_FEED_CODE
					."※このメールは送信専用メールアドレスより配信されております。こちらのメールアドレスに返信いただいても受付できませんのでご注意ください。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."――――――――――――――――――――――――――――――――".LINE_FEED_CODE
					."運営会社／".$c_name.LINE_FEED_CODE
					."不動産特定共同事業許可番号　東京都知事　第129号".LINE_FEED_CODE
					."メールアドレス：".$support.LINE_FEED_CODE
					."電話番号　　　：".$c_tel.LINE_FEED_CODE
					."".LINE_FEED_CODE
					."※このメールは、特定の宛先に送信されたものであり、機密情報を含んでいる場合がございます。".LINE_FEED_CODE
					."このメールに心当たりのない方は、まことにお手数ですが".$support."までご連絡の上、このメールおよび添付物を破棄くださいますようお願い申し上げます。".LINE_FEED_CODE
					."なお、このメールを開示、複製、使用することを禁止させていただきます。".LINE_FEED_CODE
					."";
			}
			
			$mail_data = array(
				
				// 送信先
				MAIL_TO => $mail_to,

				// メールタイトル
				MAIL_SUBJECT => $subject,

				// メール本文
				MAIL_BODY => $body
			);
                        //print "<pre>";
			//print_r($mail_data);
                        //print "</pre>";
                        //exit;
			return $this->sendMail($mail_data);
			
		} catch (Exception $ex) {
			$err = "Mail->sendMailReisue で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * 運用報告書交付メール送信<br>
	 * 運用報告書交付の際に送信する。<br>
	 * @param string $user_id
	 * @return boolean
	 */
	function sendMailOperatingReport($user_id) {
		
		try {
			
			// ユーザデータ取得
			$user      = $this->User->getMstUser($user_id);
			$mail_to   = $user[COLUMN_0800020];
			$user_name = $user[COLUMN_0800060]." ".$user[COLUMN_0800070];
			
			$company = $this->Company->getCompany();
			$c_name  = $company[COLUMN_0300020];
			$c_tel   = $company[COLUMN_0300140];
			
			$support = $company[COLUMN_0300160];
			$site_name  = $company[COLUMN_0300200];
			
			$subject = "【".$site_name."】財産管理報告書交付のご連絡";

			$mail_data = array(

				// 送信先
				MAIL_TO => $mail_to,

				// メールタイトル
				MAIL_SUBJECT => $subject,

				// メール本文
				MAIL_BODY => ""
					//.$subject.LINE_FEED_CODE
					//."――――――――――――――――――――――".LINE_FEED_CODE
					.$user_name." 様".LINE_FEED_CODE
					."".LINE_FEED_CODE
					.$site_name."をご利用いただき誠にありがとうございます。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."財産管理報告書を交付いたしました。".LINE_FEED_CODE
					."「マイページ＞お知らせ」よりご確認ください。".LINE_FEED_CODE
					."■".$site_name."■ ".LINE_FEED_CODE
					.URL_SITE_TOP.LINE_FEED_CODE
					."".LINE_FEED_CODE
					."ご不明な点等ございましたら、ホームページ内お問い合わせよりお問い合わせください。".LINE_FEED_CODE
					."※このメールは送信専用メールアドレスより配信されております。こちらのメールアドレスに返信いただいても受付できませんのでご注意ください。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."――――――――――――――――――――――――――――――――".LINE_FEED_CODE
					."運営会社／".$c_name.LINE_FEED_CODE
					."不動産特定共同事業許可番号　東京都知事　第129号".LINE_FEED_CODE
					."メールアドレス：".$support.LINE_FEED_CODE
					."電話番号　　　：".$c_tel.LINE_FEED_CODE
					."".LINE_FEED_CODE
					."※このメールは、特定の宛先に送信されたものであり、機密情報を含んでいる場合がございます。".LINE_FEED_CODE
					."このメールに心当たりのない方は、まことにお手数ですが".$support."までご連絡の上、このメールおよび添付物を破棄くださいますようお願い申し上げます。".LINE_FEED_CODE
					."なお、このメールを開示、複製、使用することを禁止させていただきます。".LINE_FEED_CODE
			);

			return $this->sendMail($mail_data);
			
		} catch (Exception $ex) {
			$err = "Mail->sendMailOperatingReport で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}

	/**
	 * 分配金送金のお知らせメール送信<br>
	 * 配当実行の際に送信する。<br>
	 * @param array $user
	 * @return boolean
	 */
	function sendMailDividend($user) {
		
		try {
			
			$user_id   = $user[COLUMN_0800010];
			$user_name = $user[COLUMN_0800060]." ".$user[COLUMN_0800070];
			
			$mail_to   = $user[COLUMN_0800020];
			
			$company = $this->Company->getCompany();
			$c_name  = $company[COLUMN_0300020];
			$c_tel   = $company[COLUMN_0300140];
			$support = $company[COLUMN_0300160];
			$site_name  = $company[COLUMN_0300200];

			$subject   = "【".$site_name."】お支払い完了のご連絡";

			$mail_data = array(

				// 送信先
				MAIL_TO => $mail_to,

				// メールタイトル
				MAIL_SUBJECT => $subject,

				// メール本文
				MAIL_BODY => ""
					//.$subject.LINE_FEED_CODE
					//."――――――――――――――――――――――".LINE_FEED_CODE
					.$user_name." 様".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."".$site_name."をご利用いただき誠にありがとうございます。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."出資いただいているファンドのお支払いが完了しました。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."詳細は「マイページ＞お知らせ」よりご確認ください。".LINE_FEED_CODE
					."■".$site_name."■ ".LINE_FEED_CODE
					.URL_SITE_TOP.LINE_FEED_CODE
					."".LINE_FEED_CODE
					."ご不明な点等ございましたら、ホームページ内お問い合わせよりお問い合わせください。".LINE_FEED_CODE
					."※このメールは送信専用メールアドレスより配信されております。こちらのメールアドレスに返信いただいても受付できませんのでご注意ください。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."――――――――――――――――――――――――――――――――".LINE_FEED_CODE
					."運営会社／".$c_name.LINE_FEED_CODE
					."不動産特定共同事業許可番号　東京都知事　第129号".LINE_FEED_CODE
					."メールアドレス：".$support.LINE_FEED_CODE
					."電話番号　　　：".$c_tel.LINE_FEED_CODE
					."".LINE_FEED_CODE
					."※このメールは、特定の宛先に送信されたものであり、機密情報を含んでいる場合がございます。".LINE_FEED_CODE
					."このメールに心当たりのない方は、まことにお手数ですが".$support."までご連絡の上、このメールおよび添付物を破棄くださいますようお願い申し上げます。".LINE_FEED_CODE
					."なお、このメールを開示、複製、使用することを禁止させていただきます。".LINE_FEED_CODE
			);

			return $this->sendMail($mail_data);
			
		} catch (Exception $ex) {
			$err = "Mail->sendMailDividend で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * 取引残高報告書交付メール送信<br>
	 * 取引残高報告書交付の際に送信する。<br>
	 * @param array $user
	 * @return boolean
	 */
	function sendMailTradeBalanceReport($user) {
		
		try {
			
			$user_id   = $user[COLUMN_0800010];
			$user_name = $user[COLUMN_0800060]." ".$user[COLUMN_0800070];
			
			$mail_to   = $user[COLUMN_0800020];
			
			$company = $this->Company->getCompany();
			$c_name  = $company[COLUMN_0300020];
			$c_tel   = $company[COLUMN_0300140];
			$support = $company[COLUMN_0300160];
			$site_name  = $company[COLUMN_0300200];

			$subject   = "【".$site_name."】取引残高報告書の電子交付のご連絡";

			$mail_data = array(

				// 送信先
				MAIL_TO => $mail_to,

				// メールタイトル
				MAIL_SUBJECT => $subject,

				// メール本文
				MAIL_BODY => ""
					//.$subject.LINE_FEED_CODE
					//."――――――――――――――――――――――".LINE_FEED_CODE
					.$user_name." 様".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."".$site_name."をご利用いただき誠にありがとうございます。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."取引残高報告書を交付いたしました。".LINE_FEED_CODE
					."「マイページ＞お知らせ」よりご確認ください。".LINE_FEED_CODE
					."■".$site_name."■ ".LINE_FEED_CODE
					.URL_SITE_TOP.LINE_FEED_CODE
					."".LINE_FEED_CODE
					."ご不明な点等ございましたら、ホームページ内お問い合わせよりお問い合わせください。".LINE_FEED_CODE
					."※このメールは送信専用メールアドレスより配信されております。こちらのメールアドレスに返信いただいても受付できませんのでご注意ください。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."――――――――――――――――――――――――――――――――".LINE_FEED_CODE
					."運営会社／".$c_name.LINE_FEED_CODE
					."不動産特定共同事業許可番号　東京都知事　第129号".LINE_FEED_CODE
					."メールアドレス：".$support.LINE_FEED_CODE
					."電話番号      ：".$c_tel.LINE_FEED_CODE
					."".LINE_FEED_CODE
					."※このメールは、特定の宛先に送信されたものであり、機密情報を含んでいる場合がございます。".LINE_FEED_CODE
					."このメールに心当たりのない方は、まことにお手数ですが".$support."までご連絡の上、このメールおよび添付物を破棄くださいますようお願い申し上げます。".LINE_FEED_CODE
					."なお、このメールを開示、複製、使用することを禁止させていただきます。".LINE_FEED_CODE
			);

			return $this->sendMail($mail_data);
			
		} catch (Exception $ex) {
			$err = "Mail->sendMailTradeBalanceReport で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	/**
	 * 年間取引報告書交付メール送信<br>
	 * 年間取引報告書交付の際に送信する。<br>
	 * @param array $user
	 * @param number $year_ad
	 * @return boolean
	 */
	function sendMailAnnualTradeReport($user, $year_ad) {
		
		try {
			
			$user_id   = $user[COLUMN_0800010];
			$mail_to   = $user[COLUMN_0800020];
			$user_name = $user[COLUMN_0800060]." ".$user[COLUMN_0800070];
				
			// 年数を西暦から和暦に変換
			$year_ja = $this->Calendar->convertAdtoJaYear($year_ad);
			
			$company = $this->Company->getCompany();
			$c_name  = $company[COLUMN_0300020];
			$c_tel   = $company[COLUMN_0300140];
			$support = $company[COLUMN_0300160];
			$site_name  = $company[COLUMN_0300200];
			
			$subject = "【".$site_name."】年間取引報告書発行のご連絡";

			$mail_data = array(

				// 送信先
				MAIL_TO => $mail_to,

				// メールタイトル
				MAIL_SUBJECT => $subject,

				// メール本文
				MAIL_BODY => ""
					//.$subject.LINE_FEED_CODE
					//."――――――――――――――――――――――".LINE_FEED_CODE
					.$user_name." 様".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."".$site_name."をご利用いただき誠にありがとうございます。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					.$year_ja."年分の年間取引報告書を交付いたしました。".LINE_FEED_CODE
					."該当期間　：　".$year_ja."年1月1日　～　".$year_ja."年12月31日".LINE_FEED_CODE
					."上記期間に配当金をお受け取りいただいた方が対象になります。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."「マイページ＞お知らせ」よりご確認ください。".LINE_FEED_CODE
					."■".$site_name."■ ".LINE_FEED_CODE
					.URL_SITE_TOP.LINE_FEED_CODE
					//."お手元に到着するまで数日程度を要する予定ですが、万一、１０日以上経っても".LINE_FEED_CODE
					//."お手元に到着しない場合には、お手数ですが下記お問合せ先までご連絡ください。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."ご不明な点等ございましたら、ホームページ内お問い合わせよりお問い合わせください。".LINE_FEED_CODE
					."※このメールは送信専用メールアドレスより配信されております。こちらのメールアドレスに返信いただいても受付できませんのでご注意ください。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."――――――――――――――――――――――――――――――――".LINE_FEED_CODE
					."運営会社／".$c_name.LINE_FEED_CODE
					."不動産特定共同事業許可番号　東京都知事　第129号".LINE_FEED_CODE
					."メールアドレス：".$support.LINE_FEED_CODE
					."電話番号      ：".$c_tel.LINE_FEED_CODE
					."".LINE_FEED_CODE
					."※このメールは、特定の宛先に送信されたものであり、機密情報を含んでいる場合がございます。".LINE_FEED_CODE
					."このメールに心当たりのない方は、まことにお手数ですが".$support."までご連絡の上、このメールおよび添付物を破棄くださいますようお願い申し上げます。".LINE_FEED_CODE
					."なお、このメールを開示、複製、使用することを禁止させていただきます。".LINE_FEED_CODE
			);

			return $this->sendMail($mail_data);
			
		} catch (Exception $ex) {
			$err = "Mail->sendMailAnnualTradeReport で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}

        
        /**
	 * 入金メール送信<br>
	 * 入金したらユーザーに送信する。<br>
	 * @param string $user_id
	 * @return boolean
	 */
	function sendMailDeposit($user_id) {
		
		try {
			
			// ユーザデータ取得
			$user      = $this->User->getMstUser($user_id);
			$mail_to   = $user[COLUMN_0800020];
			$user_name = $user[COLUMN_0800060]." ".$user[COLUMN_0800070];
			
			$company = $this->Company->getCompany();
			$c_name  = $company[COLUMN_0300020];
			$c_tel   = $company[COLUMN_0300140];
			
			$support = $company[COLUMN_0300160];
			$site_name  = $company[COLUMN_0300200];
			
			//$subject = $site_name;
                        $subject = "【".$site_name."】入金確認のご連絡";
			$mail_data = array(

				// 送信先
				MAIL_TO => $mail_to,

				// メールタイトル
				MAIL_SUBJECT => $subject,

				// メール本文
				MAIL_BODY => ""
					//.$subject.LINE_FEED_CODE
					//."――――――――――――――――――――――".LINE_FEED_CODE
					.$user_name." 様".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."いつも".$site_name."をご利用いただき誠にありがとうございます。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."出資申込に対するご入金確認が完了いたしました。".LINE_FEED_CODE
					."「マイページ＞出資履歴＞入金日」をご確認ください。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."■".$site_name."■ ".LINE_FEED_CODE
					.URL_SITE_TOP.LINE_FEED_CODE
					."".LINE_FEED_CODE
					."※入金確認が完了した出資には入金日に日付がはいっております。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."ご不明な点等ございましたら、ホームページ内お問い合わせよりお問い合わせください。".LINE_FEED_CODE
					."※このメールは送信専用メールアドレスより配信されております。こちらのメールアドレスに返信いただいても受付できませんのでご注意ください。".LINE_FEED_CODE
					."".LINE_FEED_CODE
					."――――――――――――――――――――――――――――――――".LINE_FEED_CODE
					."運営会社／".$c_name.LINE_FEED_CODE
					."不動産特定共同事業許可番号　東京都知事　第129号".LINE_FEED_CODE
					."メールアドレス：".$support.LINE_FEED_CODE
					."電話番号      ：".$c_tel.LINE_FEED_CODE
					."".LINE_FEED_CODE
					."※このメールは、特定の宛先に送信されたものであり、機密情報を含んでいる場合がございます。".LINE_FEED_CODE
					."このメールに心当たりのない方は、まことにお手数ですが".$support."までご連絡の上、このメールおよび添付物を破棄くださいますようお願い申し上げます。".LINE_FEED_CODE
					."なお、このメールを開示、複製、使用することを禁止させていただきます。".LINE_FEED_CODE
			);

			return $this->sendMail($mail_data);
			
		} catch (Exception $ex) {
			$err = "Mail->sendMailDeposit で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}

        
        
	/**
	 * 管理者作成メール送信<br>
	 * 管理者メール送信画面で入力した内容に沿ってメールを送信する。<br>
	 * @param array $data
	 * @throws Exception
	 */
	function sendMailFree($data) {
		
		try {
			
			// 送信元アカウント
			$account_list = Configure::read(CONFIG_0063);
			$account      = $account_list[$data[OBJECT_ID_050430140]];
			
			// 件名、本文取得
			$subject = $data[OBJECT_ID_050430120];
			$body    = $data[OBJECT_ID_050430130];
			
			// 送信先指定方法
			$method  = $data[OBJECT_ID_050430010];
			
			$search    = array();
			$user_list = array();
			
			switch ($method) {
				
				case SPECIFIED_METHOD_CODE_0: // 条件を指定
					
					// 状態：仮登録
					if (isset($data[OBJECT_ID_050430020]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050430020]) == 0) {
						$search[SEARCH_ID_050030120] = CHECKBOX_ON;
					}
					// 状態：登録申請中
					if (isset($data[OBJECT_ID_050430030]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050430030]) == 0) {
						$search[SEARCH_ID_050030130] = CHECKBOX_ON;
					}
					// 状態：承認済
					if (isset($data[OBJECT_ID_050430040]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050430040]) == 0) {
						$search[SEARCH_ID_050030140] = CHECKBOX_ON;
					}
					// 状態：認証済
					if (isset($data[OBJECT_ID_050430050]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050430050]) == 0) {
						$search[SEARCH_ID_050030150] = CHECKBOX_ON;
					}
					// 状態：停止
					if (isset($data[OBJECT_ID_050430060]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050430060]) == 0) {
						$search[SEARCH_ID_050030160] = CHECKBOX_ON;
					}
					// 状態：退会
					if (isset($data[OBJECT_ID_050430070]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050430070]) == 0) {
						$search[SEARCH_ID_050030170] = CHECKBOX_ON;
					}
					// 状態：開設拒否
					if (isset($data[OBJECT_ID_050430080]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050430080]) == 0) {
						$search[SEARCH_ID_050030180] = CHECKBOX_ON;
					}
					// メルマガ：登録する
					if (isset($data[OBJECT_ID_050430090]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050430090]) == 0) {
						$search[SEARCH_ID_050030220] = CHECKBOX_ON;
					}
					// メルマガ：登録しない
					if (isset($data[OBJECT_ID_050430100]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050430100]) == 0) {
						$search[SEARCH_ID_050030230] = CHECKBOX_ON;
					}

					$user_list = $this->User->getUserList($search);
					
					break;
				
				case SPECIFIED_METHOD_CODE_1: // 管理番号を指定
				case SPECIFIED_METHOD_CODE_2: // 投資家IDを指定
					
					$no_list = explode(",", $data[OBJECT_ID_050430110]);

					// 管理番号の件数分ループ
					foreach ($no_list as $no_key => $no_value) {

						// データ取得条件セット
						if (strcmp(SPECIFIED_METHOD_CODE_1, $method) == 0) {
							$search[SEARCH_ID_050030055] = $no_value;
						}
						elseif (strcmp(SPECIFIED_METHOD_CODE_2, $method) == 0) {
							$search[SEARCH_ID_050030050] = $no_value;
						}

						// データ取得
						$user = $this->User->getUserList($search);

						// 多次元配列で渡されるので、中身を取り出して別の配列に入れなおす。
						foreach ($user as $user_key => $user_value) {
							$user_list[] = $user_value;
						}
					}
					
					break;
			}
			
			foreach ($user_list as $key => $value) {
				
				$mail_to = $value[COLUMN_0800020];
				
				$mail_data = array(
					 MAIL_TO      => $mail_to // 送信先
					,MAIL_SUBJECT => $subject // 件名
					,MAIL_BODY    => $body    // 本文
				);
				
				$this->sendMail($mail_data, $account);
			}
			
			// 管理者保存用にメール送信元にもメールを送る
			$mail = new CakeEmail($account);
			$from = $mail->from();
			foreach ($from as $key => $value) {
				$mail_data[MAIL_TO] = $key;
			}
			$this->sendMail($mail_data, $account);
				
		} catch (Exception $ex) {
			$err = "Mail->sendMailFree で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
		
	}
	
	
}
