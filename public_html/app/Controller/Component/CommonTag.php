<?php
class CommonTag {
	
	static function includeFiles() {
		require_once "../CakeSessions.php";
		require_once "../pg/db_access.php";
	}
	static function includeFilesProjects() {
		require_once "../../CakeSessions.php";
		require_once "../../pg/db_access.php";
	}
	static function includeFilesCampaign() {
		require_once "../../CakeSessions.php";
		require_once "../../pg/db_access.php";
	}
	
	static function htmlHeaderProjectDetail($data = null) {
		try {
			echo '	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'.LINE_FEED_CODE;
			echo '	<title>SECOND LIFE</title>'.LINE_FEED_CODE;
			echo '	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">'.LINE_FEED_CODE;
			if (!is_null($data)) {
				echo '	<meta property="og:type" content="article" />'.LINE_FEED_CODE;
				echo '	<meta property="og:title" content="SECOND LIFE" />'.LINE_FEED_CODE;
				if (isset($data[ARRAY_INDEX_OG_IMAGE])) {
					echo '	<meta property="og:image"       content="'.$data[ARRAY_INDEX_OG_IMAGE].'" />'.LINE_FEED_CODE;
				}
				if (isset($data[ARRAY_INDEX_OG_DESC])) {
					echo '	<meta property="og:description" content="'.$data[ARRAY_INDEX_OG_DESC].'" />'.LINE_FEED_CODE;
				}
				if (isset($data[ARRAY_INDEX_OG_URL])) {
					echo '	<meta property="og:url"         content="'.$data[ARRAY_INDEX_OG_URL].'" />'.LINE_FEED_CODE;
				}
				echo '	<meta property="og:site_name"   content="SECOND LIFE" />'.LINE_FEED_CODE;
			}
			echo '	<link href="../../favicon.ico" type="image/x-icon" rel="icon" />'.LINE_FEED_CODE;
			echo '	<link href="../../favicon.ico" type="image/x-icon" rel="shortcut icon" />'.LINE_FEED_CODE;
			echo '	<link rel="stylesheet" type="text/css" href="../../css/import.css" />'.LINE_FEED_CODE;
			echo '	<link rel="stylesheet" type="text/css" href="../../css/test.css" />'.LINE_FEED_CODE;
			echo '	<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300&display=swap&subset=japanese" rel="stylesheet" />'.LINE_FEED_CODE;
			echo '	<link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" rel="stylesheet" />'.LINE_FEED_CODE;
			echo '	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />'.LINE_FEED_CODE;
			echo '	<script src="../../js/jquery.min.js"></script>'.LINE_FEED_CODE;
			echo '	<script src="../../js/jquery.migrate.min.js"></script>'.LINE_FEED_CODE;
			echo '	<script src="../../js/bootstrap.min.js"></script>'.LINE_FEED_CODE;
	//		echo '	<script src="../../js/jquery.smooth-scroll.min.js"></script>'.LINE_FEED_CODE;
			echo '	<script src="../../js/jquery.back-to-top.min.js"></script>'.LINE_FEED_CODE;
			echo '	<script src="../../js/jquery.scrollbar.min.js"></script>'.LINE_FEED_CODE;
			echo '	<script src="../../js/vidbg.min.js"></script>'.LINE_FEED_CODE;
			echo '	<script src="../../js/jquery.cubeportfolio.min.js"></script>'.LINE_FEED_CODE;
			echo '	<script src="../../js/jquery.wow.min.js"></script>'.LINE_FEED_CODE;
			echo '	<script src="../../js/global.min.js"></script>'.LINE_FEED_CODE;
			echo '	<script src="../../js/header-sticky.min.js"></script>'.LINE_FEED_CODE;
			echo '	<script src="../../js/scrollbar.min.js"></script>'.LINE_FEED_CODE;
			echo '	<script src="../../js/portfolio-4-col-slider.min.js"></script>'.LINE_FEED_CODE;
			echo '	<script src="../../js/wow.min.js"></script>'.LINE_FEED_CODE;
			echo '	<script src="../../js/portfolio-3-col.min.js"></script>'.LINE_FEED_CODE;


			echo '	<!-- タグ -->'.LINE_FEED_CODE;
			echo '	<script src="../../js/jquery.min.js"></script>'.LINE_FEED_CODE;
			echo '	<script src="../../js/jquery.validationEngine.js"></script>'.LINE_FEED_CODE;
			echo '	<script src="../../js/languages/jquery.validationEngine-ja.js"></script>'.LINE_FEED_CODE;

			echo '	<script src="../../js/jquery-ui.min.js"></script>'.LINE_FEED_CODE;
			

		} catch (Exception $ex) {
			$err = "CommonTag->htmlHeaderProjectDetail で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 累計成約金額取得
	 * @return $cumulative_loan_amount
	 */
	private function getCumulativeLoanAmount() {
		try {
			$db = new db_access();
			return $db->selectCumulativeLoanAmount();
		} catch (Exception $ex) {
			$err = "CommonTag->getCumulativeLoanAmount で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	
	static function header($cumulative = null) {
		try {

			$loan_amount = 0;
			if (!is_null($cumulative) && isset($cumulative)) {
				$loan_amount = $cumulative[ARRAY_INDEX_CUMULATIVE_LOAN];
			}
			else {
				$db = new db_access();
				$loan_amount = $db->selectCumulativeLoanAmount();
			}

			echo '	        <!--========== HEADER ==========-->'.LINE_FEED_CODE;
			echo '<header class="navbar-fixed-top s-header js__header-sticky js__header-overlay">'.LINE_FEED_CODE;


			echo '    <!-- Navbar -->'.LINE_FEED_CODE;
			echo '    <div class="s-header__navbar">'.LINE_FEED_CODE;
			echo '        <div class="s-header__container">'.LINE_FEED_CODE;
			echo '			<div class="s-header__navbar-row">'.LINE_FEED_CODE;

			echo '				<div class="s-header__navbar-row-col">'.LINE_FEED_CODE;
			echo '                    <!-- Logo -->'.LINE_FEED_CODE;
			echo '					<div class="s-header__logo">'.LINE_FEED_CODE;
			echo '						<a href="'.URL_SITE_TOP.'" class="s-header__logo-link">'.LINE_FEED_CODE;
			echo '							<img class="s-header__logo-img s-header__logo-img-shrink" src="'.URL_SITE_TOP.'img/logo.jpg" style="width: 150px;">'.LINE_FEED_CODE;
			echo '						</a>'.LINE_FEED_CODE;

			echo '						<div class="hidden-xs" id="mainmenu">'.LINE_FEED_CODE;
			echo '							<ul>'.LINE_FEED_CODE;
			echo '								<li><a href="'.URL_SITE_TOP         .'">ＨＯＭＥ</a></li>'.LINE_FEED_CODE;
			echo '								<li><a href="'.URL_FUND_LIST        .'">商品一覧</a></li>'.LINE_FEED_CODE;
			echo '								<li><a href="'.URL_QUESTION_PAGE    .'">よくある質問</a></li>'.LINE_FEED_CODE;
			echo '								<li><a href="'.URL_GUIDE_PAGE       .'">はじめての方</a></li>'.LINE_FEED_CODE;

			if (isset($_SESSION[SESSION_LOGIN_USER_INFO])) {
			echo '								<li><a href="'.URL_LOGIN_PAGE.'">マイページ</a></li>'.LINE_FEED_CODE;
			echo '								<li><input type="button" value="ログアウト" onclick="location.href=\''.URL_LOGOUT_PAGE.'\'"></li>'.LINE_FEED_CODE;
			} else {
			echo '								<li><a href="'.URL_REGISTRATION_PAGE.'">新規会員登録</a></li>'.LINE_FEED_CODE;
			echo '								<li><input type="button" value="ログイン" onclick="location.href=\''.URL_LOGIN_PAGE.'\'"></li>'.LINE_FEED_CODE;
			}

			echo '							</ul>'.LINE_FEED_CODE;
			echo '						</div>'.LINE_FEED_CODE;
			
			echo '					</div>'.LINE_FEED_CODE;
			echo '                <!-- End Logo -->'.LINE_FEED_CODE;
			echo '				</div>'.LINE_FEED_CODE;

			echo '			</div>'.LINE_FEED_CODE;
			echo '        </div>'.LINE_FEED_CODE;
			echo '    </div>'.LINE_FEED_CODE;
			echo '    <!-- End Navbar -->'.LINE_FEED_CODE;

			echo '</header>'.LINE_FEED_CODE;
			echo '<!--========== END HEADER ==========-->'.LINE_FEED_CODE;




			
		} catch (Exception $ex) {
			$err = "CommonTag->header で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	static function footer() {
		try {
			echo '<!--========== FOOTER ==========-->'.LINE_FEED_CODE;
			echo '<footer class="g-bg-color--dark">'.LINE_FEED_CODE;
			echo '	<!-- Links -->'.LINE_FEED_CODE;
			echo '	<div class="g-hor-divider__dashed--white-opacity-lightest">'.LINE_FEED_CODE;
			echo '		<div class="container g-padding-y-80--xs">'.LINE_FEED_CODE;
			echo '			<div class="row">'.LINE_FEED_CODE;
			echo '				<div class="col-md-2 col-sm-3 g-margin-b-20--xs g-margin-b-0--md">'.LINE_FEED_CODE;
			echo '					<ul class="list-unstyled g-ul-li-tb-5--xs g-margin-b-0--xs">'.LINE_FEED_CODE;
			echo '						<li><a class="g-font-size-14--xs g-color--white-opacity" href="'.URL_SITE_TOP.'">ＨＯＭＥ</a></li>'.LINE_FEED_CODE;
			echo '						<li><a class="g-font-size-14--xs g-color--white-opacity" href="'.URL_GUIDE_PAGE.'">はじめての方</a></li>'.LINE_FEED_CODE;
			echo '						<li><a class="g-font-size-14--xs g-color--white-opacity" href="'.URL_FLOW_PAGE.'">ご利用の流れ</a></li>'.LINE_FEED_CODE;
			echo '						<li><a class="g-font-size-14--xs g-color--white-opacity" href="'.URL_QUESTION_PAGE.'">よくある質問</a></li>'.LINE_FEED_CODE;
			echo '						<li><a class="g-font-size-14--xs g-color--white-opacity" href="'.URL_INFO_PAGE.'">ニュース</a></li>'.LINE_FEED_CODE;
			echo '					</ul>'.LINE_FEED_CODE;
			echo '				</div>'.LINE_FEED_CODE;
			echo '				<div class="col-md-2 col-sm-3 g-margin-b-20--xs g-margin-b-0--md">'.LINE_FEED_CODE;
			echo '					<ul class="list-unstyled g-ul-li-tb-5--xs g-margin-b-0--xs">'.LINE_FEED_CODE;
			echo '						<li><a class="g-font-size-14--xs g-color--white-opacity" href="'.URL_FUND_LIST.'">商品一覧</a></li>'.LINE_FEED_CODE;
			
			if (isset($_SESSION[SESSION_LOGIN_USER_INFO])) {
			echo '						<li><a class="g-font-size-14--xs g-color--white-opacity" href="'.URL_LOGIN_PAGE.'">マイページ</a></li>'.LINE_FEED_CODE;
			echo '						<li><a class="g-font-size-14--xs g-color--white-opacity" href="'.URL_LOGOUT_PAGE.'">ログアウト</a></li>'.LINE_FEED_CODE;
			} else {
			echo '						<li><a class="g-font-size-14--xs g-color--white-opacity" href="'.URL_REGISTRATION_PAGE.'">新規会員登録</a></li>'.LINE_FEED_CODE;
			echo '						<li><a class="g-font-size-14--xs g-color--white-opacity" href="'.URL_LOGIN_PAGE.'">ログイン</a></li>'.LINE_FEED_CODE;
			}

			echo '						<li><a class="g-font-size-14--xs g-color--white-opacity" href="'.URL_CONTACT_PAGE.'">お問い合わせ</a></li>'.LINE_FEED_CODE;
			echo '						<li><a class="g-font-size-14--xs g-color--white-opacity" href="'.URL_SERVICETERMS_PAGE.'" target="_blank">利用規約</a></li>'.LINE_FEED_CODE;
			echo '					</ul>'.LINE_FEED_CODE;
			echo '				</div>'.LINE_FEED_CODE;
			echo '				<div class="col-md-3 col-sm-5 g-margin-b-40--xs g-margin-b-0--md">'.LINE_FEED_CODE;
			echo '					<ul class="list-unstyled g-ul-li-tb-5--xs g-margin-b-0--xs">'.LINE_FEED_CODE;
			echo '						<li><a class="g-font-size-14--xs g-color--white-opacity" href="'.URL_ANTISOCIAL_PAGE.'">反社会的勢力に対する基本方針</a></li>'.LINE_FEED_CODE;
			echo '						<li><a class="g-font-size-14--xs g-color--white-opacity" href="'.URL_SOLICITATION_PAGE.'">勧誘方針</a></li>'.LINE_FEED_CODE;
			echo '						<li><a class="g-font-size-14--xs g-color--white-opacity" href="'.URL_PRIVACY_PAGE.'">個人情報保護方針</a></li>'.LINE_FEED_CODE;
			echo '						<li><a class="g-font-size-13--sm g-font-size-14--xs g-color--white-opacity" href="'.URL_ELECTRONIC_PAGE.'">電子情報処理組織の管理に関する基本方針</a></li>'.LINE_FEED_CODE;
			echo '						<li><a class="g-font-size-14--xs g-color--white-opacity" href="'.URL_COOLINGOFF_PAGE.'">クーリングオフについて</a></li>'.LINE_FEED_CODE;
			echo '					</ul>'.LINE_FEED_CODE;
			echo '				</div>'.LINE_FEED_CODE;
			echo '				<div class="col-md-4 col-sm-6 col-md-offset-1 col-sm-offset-5 s-footer__logo g-padding-y-50--xs g-padding-y-0--md g-margin-t-30--sm">'.LINE_FEED_CODE;
			echo '					<strong class="g-font-size-15--xs"><a href="https://www.7-star.co.jp/corp.php" target="_blank">運営会社　セブンスター株式会社</a></strong><br><br>'.LINE_FEED_CODE;
			echo '					<div class="g-font-size-14--xs g-color--white-opacity">'.LINE_FEED_CODE;
			echo '						〒108-0022&nbsp;東京都港区海岸3-15-15<br>'.LINE_FEED_CODE;
			echo '						TEL：03-6275-1620&nbsp;&nbsp;&nbsp;FAX：03-6275-1751<br>'.LINE_FEED_CODE;
			echo '						代表取締役&nbsp;&nbsp;鈴木宏治／<script type="text/javascript">managerlink();</script><br>'.LINE_FEED_CODE;
			echo '						宅地建物取引業&nbsp;&nbsp;東京都知事（1）第103643号<br>'.LINE_FEED_CODE;
			echo '						不動産特定共同事業許可番号&nbsp;&nbsp;東京都知事&nbsp;第129号<br>'.LINE_FEED_CODE;
			echo '						<br>※&nbsp;当社は不動産特定共同事業者（第1号及び第2号）で、電子取引業務を行います。<br>'.LINE_FEED_CODE;
			echo '					</p>'.LINE_FEED_CODE;
			echo '				</div>'.LINE_FEED_CODE;
			echo '			</div>'.LINE_FEED_CODE;
			echo '		</div>'.LINE_FEED_CODE;
			echo '	</div>'.LINE_FEED_CODE;
			echo '	<!-- End Links -->'.LINE_FEED_CODE;
			echo '</footer>'.LINE_FEED_CODE;
			echo '<!--========== END FOOTER ==========-->'.LINE_FEED_CODE;
			echo '<div class="g-margin-b-50--xs g-margin-b-0--sm" id="footer2">&copy; 2020 SEVENSTAR Inc. All Rights Reserved.</div>'.LINE_FEED_CODE;

			echo '		<div class="visible-xs" id="mainmenu-xs">'.LINE_FEED_CODE;
			echo '			<ul>'.LINE_FEED_CODE;
			echo '				<li><a href="'.URL_SITE_TOP         .'"><i class="material-icons">house</i><br><span>ＨＯＭＥ</span></a></li>'.LINE_FEED_CODE;
			echo '				<li><a href="'.URL_FUND_LIST        .'"><i class="material-icons">view_headline</i><br><span>商品一覧</span></a></li>'.LINE_FEED_CODE;
			echo '				<li><a href="'.URL_QUESTION_PAGE    .'"><i class="material-icons">help</i><br><span>よくある質問</span></a></li>'.LINE_FEED_CODE;
			
			if (isset($_SESSION[SESSION_LOGIN_USER_INFO])) {
				echo '			<li><a href="'.URL_LENDER_PAGE.'"><i class="material-icons">person</i><br><span>マイページ</span></a></li>'.LINE_FEED_CODE;
				echo '			<li><a href="'.URL_LOGOUT_PAGE.'"><i class="material-icons">directions_run</i><br><span>ログアウト</span></a></li>'.LINE_FEED_CODE;
			} else {
				echo '			<li><a href="'.URL_REGISTRATION_PAGE.'"><i class="material-icons">dvr</i><br><span>新規会員登録</span></a></li>'.LINE_FEED_CODE;
				echo '			<li><a href="'.URL_LOGIN_PAGE.'"><i class="material-icons">vpn_key</i><br><span>ログイン</span></a></li>'.LINE_FEED_CODE;
			}

			echo '			</ul>'.LINE_FEED_CODE;
			echo '		</div>'.LINE_FEED_CODE;

			echo '<!-- Back To Top -->'.LINE_FEED_CODE;
			echo '<a href="javascript:void(0);" class="s-back-to-top js__back-to-top"><i class="zmdi zmdi-navigation"></i></a>'.LINE_FEED_CODE;




		} catch (Exception $ex) {
			$err = "CommonTag->footer で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	static function getFundDetail($fund_id) {
		try {
			$db = new db_access();
			return $db->selectFundDetail($fund_id);
		} catch (Exception $ex) {
			$err = "CommonTag->getFundDetail で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	static function getLoanList($fund_id) {
		try {
			$db = new db_access();
			return $db->selectLoanList($fund_id);
		} catch (Exception $ex) {
			$err = "CommonTag->getLoanList で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * ファンド状態取得<br>
	 * 各種日付、金額を渡して状態コードを返す。<br>
	 * @param array $fund_data
	 * @return number $status_code
	 */
	static function getFundStatusCode($fund_data) {
		
		try {
			
			$max_loan_amount   = intval($fund_data[COLUMN_0500030]); // 目標金額max_loan_amount_total
			$min_loan_amount   = intval($fund_data[COLUMN_0500050]); // 最低成立額min_loan_amount_total
			$loan_amount       = intval($fund_data[COLUMN_0500040]); // 貸付額loan_amount_total
			$investment_amount = intval($fund_data[COLUMN_1200070]); // 投資額合計investment_amount
			$principal_amount_2 = intval($fund_data[COLUMN_1300140]); // 充当済元金principal_amount_2
			$inviting_start  = strtotime($fund_data[COLUMN_0500080]); // 募集開始日時inviting_start
			$inviting_end    = strtotime($fund_data[COLUMN_0500090]); // 募集終了日時inviting_end
			$operating_start = strtotime($fund_data[COLUMN_0500100]); // 運用開始日時operating_start
			$operating_end   = strtotime($fund_data[COLUMN_0500110]); // 運用終了日時operating_end
                        $ended            =  intval($fund_data[COLUMN_0500171]); // 強制終了フラグ ended
			$today = strtotime(date(DATETIME_FORMAT));

			$status_code = 0;

			// 募集開始前0
			if ($today < $inviting_start) {
				$status_code = FUND_STATUS_CODE_BEFORE_INVITING;
			}
                        // 強制終了4
                        elseif ($ended == 1) {
                                $status_code = FUND_STATUS_CODE_CLOSED;
                        }
			// 募集中1
			elseif($inviting_start <= $today && $today <= $inviting_end && $investment_amount < $max_loan_amount){
				$status_code = FUND_STATUS_CODE_NOW_INVITING;
			}
			// 運用準備中2
			elseif((($inviting_end < $today && $today < $operating_start && $min_loan_amount <= $investment_amount)
					|| ($today < $operating_start && $max_loan_amount <= $investment_amount))
					|| ($operating_start <= $today && $today <= $operating_end && $min_loan_amount <= $investment_amount && $loan_amount == 0)){
				$status_code = FUND_STATUS_CODE_BEFORE_OPERATING;
			}
			// 運用中3
                        elseif($operating_start <= $today && $loan_amount > 0 && $loan_amount > $principal_amount_2){
		      //elseif($operating_start <= $today && $loan_amount > 0 &&  $principal_amount_2 == 0){
				$status_code = FUND_STATUS_CODE_NOW_OPERATING;
			}
			// 運用終了4
			elseif(($operating_end < $today && $loan_amount > 0)
                                || ($loan_amount > 0 && $loan_amount <= $principal_amount_2)){
			     // || ($loan_amount > 0 &&  $principal_amount_2 > 1)){
				$status_code = FUND_STATUS_CODE_CLOSED;
			}
			// 不成立5
			elseif($inviting_end < $today && $investment_amount < $min_loan_amount){
				$status_code = FUND_STATUS_CODE_FAILURE;
			}


			return $status_code;

		} catch (Exception $ex) {
			$err = "CommonTag->getFundStatusCode で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * 残り時間取得<br>
	 * 指定した時刻までの残り時間を返す。<br>
	 * 24時間以上の場合日数を返す。<br>
	 * 24時間未満、且つ1時間以上の場合、1時間単位で返す。<br>
	 * 1時間未満の場合、1分単位で返す。<br>
	 * @param array $fund_data
	 * @param number $fund_status_code
	 * @return string $remaining_time
	 */
	static function getRemainingTime($data, $fund_status_code) {
		
		try {
			
			$inviting_start = $data[COLUMN_0500080];
			$inviting_end   = $data[COLUMN_0500090];

			$result = "";
			$days = 0;

			$one_day_seconds = 24 * 60 * 60;

			if (strtotime(date(DATETIME_FORMAT)) < strtotime($inviting_start)) {
				$result = "募集開始前";
				return $result;
			}

			if (strtotime(date(DATETIME_FORMAT)) > strtotime($inviting_end)
					|| (FUND_STATUS_CODE_BEFORE_OPERATING <= $fund_status_code)) {
				$result = "募集終了";
				return $result;
			}

			// 秒数を取得
			$seconds  = strtotime($inviting_end) - strtotime(date(DATETIME_FORMAT));

			if (0 >= $seconds) {
				return $result;
			}

			$result = "残り時間　";

			// 日数に変換
			$days = $seconds / $one_day_seconds;

			if (1 > $days) {
				$days = 0; 
			}
			else {
				$days = floor((String)$days); 
			}
			$result .= $days."日　";

			$seconds2 = $seconds - ($days * $one_day_seconds);

			// 時間数に変換
			$hours = $seconds2 / (60 * 60);

			if (1 <= $hours) {
				$hours = floor((String)$hours); 
				$result .= $hours."時間";
			}
			else {

				// 分に変換
				$minutes = $seconds2 / 60;

				if (1 >= $minutes) {
					$result .= "1分";
				}
				elseif (1 < $minutes && $minutes < 60) {

					$result .= floor((String)$minutes)."分";
				}
			}

			return $result;
			
		} catch (Exception $ex) {
			$err = "CommonTag->getRemainingTime で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
//**DAYカウント用
        static function getRemainingTimeDay($data, $fund_status_code) {

                try {

                        $operating_start = $data[COLUMN_0500100];
                        $operating_end   = $data[COLUMN_0500110];

                        $result = "";
                        $days = 0;

                        $one_day_seconds = 24 * 60 * 60;//1day秒

                        //if (strtotime(date(DATETIME_FORMAT)) < strtotime($operating_start)) {
                        //        $result = strtotime($operating_end) - strtotime($operating_start);
                        //        return $result;
                        //}

                        //if (strtotime(date(DATETIME_FORMAT)) > strtotime($operating_end)
                        //                || (FUND_STATUS_CODE_BEFORE_OPERATING <= $fund_status_code)) {
                        //        //$result = "現在と終了";
                                //$result = strtotime($operating_end) - strtotime($operating_start);
                        //        return $result;
                        //}
                        // 設定日時から状況判断
                        // 秒数を取得
                        $seconds  = strtotime($operating_end) - strtotime($operating_start);
                        if (0 >= $seconds) {
                                return $result;
                        }

                        //$result = "運用日数　";

                        // 日数に変換
                        $days = $seconds / $one_day_seconds;

                        if (1 > $days) {
                                $days = 0;
                        }
                        else {
                                $days = floor((String)$days);
                        }
                        $result .= $days."";

                        $seconds2 = $seconds - ($days * $one_day_seconds);

                        // 時間数に変換
                        $hours = $seconds2 / (60 * 60);

                        if (1 <= $hours) {
                                $hours = floor((String)$hours);
                                //$result .= $hours."時間";
                        }
                        else {

                                // 分に変換
                                $minutes = $seconds2 / 60;

                                if (1 >= $minutes) {
                                        $result .= "1分";
                                }
                                elseif (1 < $minutes && $minutes < 60) {

                                        $result .= floor((String)$minutes)."分";
                                }
                        }

                        return $result;

                } catch (Exception $ex) {
                        $err = "CommonTag->getRemainingTimeDay で例外発生<br>";
                        throw new Exception($err.$ex->getMessage()."<br>");
                }
        }





}
