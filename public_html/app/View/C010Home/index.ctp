<?php $this->Html->script( 'jquery.min.js' , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery-ui.min.js' , array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
}
<?php
if (isset($fund_list) && is_array($fund_list) && 0 < count($fund_list)) {
	$p_bar_max = DISP_NUMBER_P_BAR; // プログレスバー表示件数
	$p_bar_count = 0;
	echo 'var $182 = $.noConflict(true);'.LINE_FEED_CODE;	//jquery1.8.2を使用する為
	echo '$182(function(){'.LINE_FEED_CODE;
	foreach ($fund_list as $key => $values) {
		foreach ($values as $value) {
			$p_bar_count++;
			$fund_id    = $value[COLUMN_0500010];
			$max_loan   = $value[COLUMN_0500030];
			$investment = $value[COLUMN_1200070];
			echo '	var pbar = $182("#progressbar'.$fund_id.'")'.LINE_FEED_CODE;
			echo '	pbar.progressbar({value: '.$investment.', max: '.$max_loan.'});'.LINE_FEED_CODE;
			echo '	var per = pbar.progressbar("value") / pbar.progressbar("option", "max");'.LINE_FEED_CODE;
			echo '	$("#loading'.$fund_id.'").text(Math.floor(per * 100) + "% 募集完了");'.LINE_FEED_CODE;
		}
	}
	echo "});".LINE_FEED_CODE;
}
?>

<?php $this->Html->scriptEnd(); ?>


	
	
	        <!--========== PROMO BLOCK ==========-->
        <div class="s-promo-block-v1 g-bg-color--primary-to-blueviolet-ltr g-fullheight--md">
            <div class="col-lg-8 center-block g-ver-center--md g-padding-y-100--xs">
                <div class="g-hor-centered-row--md g-margin-t-30--xs">
                    
					<div class="col-lg-8 col-sm-7 g-hor-centered-row__col g-text-center--xs g-text-center--sm g-text-left--md g-margin-b-60--xs g-margin-b-0--md">
                        <div class="s-promo-block-v1__square-effect g-margin-b-60--xs">
                            <h1 class="g-font-size-30--xs g-font-size-43--sm g-font-size-48--lg g-color--white">不動産投資を<br class="smart-br-on">考えてみませんか？</h1>
<!--                            <p class="g-font-size-20--xs g-font-size-26--md g-color--white g-margin-b-0--xs" style="letter-spacing:0.15em; padding-top:1.5em;">１万円から始める不動産投資<br>想定利回り<br class="visible-sm">4％～7.5％</p> -->
                        </div>
						<div class="g-font-size-20--xs g-font-size-26--md g-color--white" style="display: flex;letter-spacing:0.1em;">累計成約金額 <?php echo number_format($loan_amount); ?> 円</div>
                    </div>
					<div class="col-lg-4 col-sm-5 g-hor-centered-row__col">
                        <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".1s">

                            <form name="form" method="post" action="." class="center-block g-box-shadow__blueviolet-v1 g-padding-x-30--sm g-padding-x-40--xs g-padding-y-60--xs g-radius--4" style="background-color:rgba(107,201,218,0.46);">
                                <?php if ($this->Session->check(SESSION_LOGIN_USER_INFO)) { ?>
									<div id="form_box_title">ログイン中</div>
									<button type="button" class="text-uppercase btn-block s-btn s-btn--md s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" onclick="location.href='<?php echo URL_LOGIN_PAGE ?>'">マイページ</button>
									<button type="button" class="text-uppercase btn-block s-btn s-btn--md s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" onclick="location.href='<?php echo URL_LOGOUT_PAGE ?>'">ログアウト</button>
								<?php } else { ?>
								
								<div class="g-text-center--xs g-margin-b-40--xs">
                                    <h2 class="g-font-size-20--xs g-color--white" style="letter-spacing:0.1em;">ログイン</h2>
                                </div>

                                <div class="g-margin-b-30--xs">
                                    <input type="text" class="form-control s-form-v3__input" name="<?php echo OBJECT_ID_010010010 ?>" id="<?php echo OBJECT_ID_010010010 ?>" value="<?php echo $data[OBJECT_ID_010010010] ?>" placeholder="* ID or E-mail" tabindex="1">
                                </div>
                                
								<div class="g-margin-b-30--xs">
                                    <input type="password" class="form-control s-form-v3__input" name="<?php echo OBJECT_ID_010010020 ?>" id="<?php echo OBJECT_ID_010010020 ?>" value="<?php echo $data[OBJECT_ID_010010020] ?>" placeholder="* Password" tabindex="2">
                                </div>

                                <div class="g-text-center--xs">
                                    <button type="submit" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--md s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" onclick="buttonClick('<?php echo EVENT_ID_010010010 ?>')" tabindex="3">ログイン</button>
									<button type="button" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--md s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" onclick="location.href='<?php echo URL_REGISTRATION_PAGE ?>'" tabindex="4">新規会員登録</button>
                                    <?php } ?>
									<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
									<?php if (!$this->Session->check(SESSION_LOGIN_USER_INFO)) { ?>
									<a class="g-color--white g-font-size-13--xs" href="<?php echo URL_REISSUE ?>">パスワードを忘れた方はこちら</a>
                                </div>
								<?php } ?>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--========== END PROMO BLOCK ==========-->

        <!--========== PAGE CONTENT ==========-->
         <!-- Mockup -->
<div id="js__scroll-to-section" class="container g-padding-y-80--xs g-padding-y-125--xsm">

	<div class="row g-hor-centered-row--md g-row-col--5 g-margin-b-80--xs g-margin-b-100--md">
		<div class="col-sm-12 g-hor-centered-row__col">
                    <!--<p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">
						Crowd Funding
					</p>-->
 			<h2 class="g-font-size-30--xs g-font-size-32--sm g-margin-b-25--xs" style="letter-spacing:0.1em;">
				１口１万円からのオンライン不動産投資を実現
			</h2>
                    	<p class="g-font-size-18--sm">
					セカンドライフでは「投資を身近なものに」をコンセプトに少額からの投資を実現。<br>また、出資契約も関する手続きをオンラインで完結することでわずらわしさを軽減。
			</p>
                </div>
                
	</div>

	<div class="row g-hor-centered-row--md g-row-col--5">

		<div class="col-sm-7 col-sm-push-5 g-hor-centered-row__col g-padding-x-10--sm">
			<h2 class="g-font-size-32--xs g-font-size-36--sm g-margin-b-25--xs">元本の安全性を高めた仕組みを採用</h2>
                    	<p class="g-font-size-18--sm">
				優先劣後の仕組みを採用し、出資者の皆様の元本への安全性を最大限考慮。出資者の皆様には常に優先出資者として出資いただき、当社が劣後出資者となります。<br><span style="font-size:0.8em;">※出資元本に変動がないことを保証したものではありません。</span>
			</p>
			<div style="text-align:right;"><a href="<?php echo URL_GUIDE_PAGE ?>">もっと詳しく</a></div>
                </div>
                <div class="wow fadeInUp col-sm-5 col-sm-pull-7 g-hor-centered-row__col g-text-left--xs g-text-right--md">
                    <img class="img-responsive" src="img/img001.png" alt="Mockup Image">
                </div>

	</div>

	<div class="row g-hor-centered-row--md g-row-col--5 g-margin-b-80--xs g-margin-b-100--md">
		<div class="col-sm-7 g-hor-centered-row__col">
			<h2 class="g-font-size-30--xs g-font-size-20--sm g-font-size-32--md g-margin-b-25--xs g-margin-t-0--sm g-margin-t-25--xs" style="letter-spacing:0.1em;">
				空いた時間を有効活用
			</h2>
                    	<p class="g-font-size-18--sm">
				会員登録だけでいつでもどこでも物件の詳細情報が閲覧可能。土地・物件の詳細情報や立地環境をご自身の目で確認いただくことで、充実した投資の機会をご提供。<br>会員登録はもちろん無料。
			</p>
                </div>

                <div class="wow fadeInUp col-sm-5 g-hor-centered-row__col" data-wow-duration=".3" data-wow-delay=".1s">
			<img class="img-responsive" src="img/img002.png" alt="Image">
                </div>
       </div>
</div>
        <!-- End Mockup -->


        <!-- Video -->
        <section class="s-video__bg" data-vidbg-bg="mp4: img/mp4_video.mp4, webm: img/webm_video.webm, poster: img/fallback.jpg" data-vidbg-options="loop: true, muted: true, overlay: false">
            <div class="container g-position--overlay g-text-center--xs">
                <div class="g-padding-y-50--xs g-margin-t-50--xs g-margin-t-100--sm g-margin-b-100--xs g-margin-b-250--md">
                    <h2 class="g-font-size-36--xs g-font-size-50--sm g-font-size-60--md g-color--white" style="letter-spacing:0.1em;">サービス名</h2>
                    <h2 class="g-font-size-36--xs g-font-size-50--sm g-font-size-60--md g-color--white" style="letter-spacing:0.1em;">不動産投資型クラウドファンディング</h2>
                </div>
            </div>
        </section>
        <!-- End Video -->
        
        <!-- Mockup -->
        <div class="container g-margin-t-o-100--xs g-margin-t-o-230--md">
            <div class="center-block s-mockup-v1">
                <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".1s">
                    <img class="img-responsive" src="img/img003.png" alt="Mockup Image">
                </div>
            </div>
        </div>
        <!-- End Mockup -->

        <!-- Portfolio -->
        <div class="container g-padding-y-80--xs g-padding-y-125--xsm">
            <div class="g-margin-b-30--xs">
                <div class="g-margin-t-20--md g-margin-b-40--xs">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Think real estate investment</p>
                    <h2 class="g-font-size-32--xs g-font-size-36--md" style="letter-spacing:0.1em;">不動産投資を考えてみませんか？</h2>
					<p style="font-size: 1.1em;">
						気軽に始めづらい投資。<br>
						難しそう。敷居が高そう。リスクしか考えられない…<br>
						投資に興味をお持ちいただいても、なかなか次のステップに進めないという方も多いのではないでしょうか。<br>
						そんな方にご提案したいのが不動産投資型クラウドファンディング『セカンドライフ』です。
					</p>
                </div>
            </div>
        </div>
        <!-- End Portfolio -->


		<!-- ボタンエリア -->
		<?php if (isset($_SESSION[SESSION_LOGIN_USER_INFO])) {
			if (FUND_STATUS_CODE_NOW_INVITING == $fund_status_code) {
			}
			} else { ?>
		        <div class="container g-padding-y-80--xs g-padding-y-125--xsm">							
					<div class="col-md-12 col-xs-12">
						<div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".3s">							
							<div class="g-text-center--xs g-padding-y-20--xs">
								<button type="button" class="btn-block s-btn s-btn--orange-bg g-radius--50 g-padding-x-50--xs" style="padding: 15px 0;width: 80%;" onclick="location.href='<?php echo URL_REGISTRATION_PAGE ?>'">新規会員登録</button>
							</div>
						</div>
					</div>
				</div>
		<?php }	?>
		<!-- End ボタンエリア -->






<!-- plan -->

<?php
 if (isset($fund_list) && is_array($fund_list) && 0 < count($fund_list)) {
	echo '	<div class="g-bg-color--sky-light boshuu-now">'.LINE_FEED_CODE;
	echo '		<div class="container g-padding-y-80--xs g-padding-y-125--xsm">'.LINE_FEED_CODE;
	echo '			<div class="g-text-center--xs g-margin-b-80--xs"> <!--案件一覧-->'.LINE_FEED_CODE;	
	echo '				<h2 class="g-font-size-32--xs g-font-size-36--md">現在募集中の商品</a></h2>'.LINE_FEED_CODE;
	echo '			</div>'.LINE_FEED_CODE;
	foreach ($fund_list as $key => $values) {
		foreach ($values as $value) {
			
			$fund_id           = $value[COLUMN_0500010];
			$fund_name         = $value[COLUMN_0500020];
			$max_loan_amount   = $value[COLUMN_0500030];
			$min_loan_amount   = $value[COLUMN_0500050];
			$min_investment_amount = $value[COLUMN_0500060] / 10000;
			$investment_amount = $value[COLUMN_1200070];
			$post_datetime     = $value[COLUMN_0500070];
			$inviting_start    = $value[COLUMN_0500080];
			$inviting_end      = $value[COLUMN_0500090];
			$operating_term    = $value[COLUMN_0500120];
			$target_yield      = $value[COLUMN_0500140];
			$guide             = $value[COLUMN_0500150];
			$warranty_code     = $value[COLUMN_0700150]; //保証
			$collateral_code   = $value[COLUMN_0700160]; //担保
			$status_code       = $this->Common->getFundStatusCode($value);
			$status            = $list[CONFIG_0035][$status_code];
			$remaining_time    = $this->Common->getRemainingTime($value, $status_code);
			$remaining_time_day    = $this->Common->getRemainingTimeDay($value, $status_code);//残り時間		
			$warranty_table    = $list[CONFIG_0050][$warranty_code];
			$warranty_list     = $list[CONFIG_0051][$warranty_code];
			$collateral_table  = $list[CONFIG_0052][$collateral_code];
			$collateral_list   = $list[CONFIG_0053][$collateral_code];
			$repay_method = $list[CONFIG_0041][REPAYMENT_METHOD_CODE_P_LUMP];
			
			$p_bar_count++;
			
				echo '			<div class="row g-row-col--5 wow fadeIn boshuu-now2" data-wow-duration=".3" data-wow-delay=".1s">'.LINE_FEED_CODE;

				echo '				<div class="col-lg-5 col-md-4 col-sm-4 col-xs-12" style="padding: 15px 15px 15px 20px;">'.LINE_FEED_CODE;
echo '					<div class="col-lg-12" style="padding:0;">'.LINE_FEED_CODE;
				echo '					<div class="b_g_img">'.LINE_FEED_CODE;
				echo '						<a href="'.URL_PROJECTS_PAGE.$fund_id.'/">'.LINE_FEED_CODE;
				echo '							<h3 class="img_obi g-font-size-22--lg g-font-size-11--md g-font-size-18--sm g-font-size-15--xs" style="text-align:center;">'.$fund_name.'</h3>'.LINE_FEED_CODE;
				echo '							<img src="'.URL_PROJECTS_PAGE.$fund_id.'/img/thumbnail_img001.jpg" alt="案件画像">'.LINE_FEED_CODE;

				echo '						</a>'.LINE_FEED_CODE;
				echo '					</div>'.LINE_FEED_CODE;
				echo '				</div>'.LINE_FEED_CODE;
				echo '				</div>'.LINE_FEED_CODE;
				echo '				<div class="col-lg-7 col-md-8 col-sm-8 col-xs-12" style="font-size: 14px;">'.LINE_FEED_CODE;

				echo '					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 10px;text-align: right;">'.LINE_FEED_CODE;
				if($status_code==3){
				echo '	<div class="now_status" style="background-color:#ff974c;">'.$status.'</div>'.LINE_FEED_CODE; 
							} 

					else {				
						if($status_code==1){
							echo '	<div class="now_status" style="background-color:#ff7058;">'.$status.'</div>'.LINE_FEED_CODE; 
									} 
					else {				
						if($status_code==0){
							echo '	<div class="now_status2">'.$status.'</div>'.LINE_FEED_CODE; 
									}
					else {				
						if($status_code==2){
							echo '	<div class="now_status3">'.$status.'</div>'.LINE_FEED_CODE; 
									}  
								else {
				echo '	<div class="now_status">'.$status.'</div>'.LINE_FEED_CODE; 
				}
				}
				}

                                                         } // ステータス
				echo '					</div>'.LINE_FEED_CODE;
				
				echo '					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 5px;">'.LINE_FEED_CODE;
				echo '						<div id="now_title"><a href="'.URL_PROJECTS_PAGE.$fund_id.'/">'.$fund_name.'</a></div>'.LINE_FEED_CODE; // プロジェクト名
				echo '					</div>'.LINE_FEED_CODE;
				
				echo '					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" style="padding: 5px;">'.LINE_FEED_CODE;
				echo '						<div class="bgr2-3">'.LINE_FEED_CODE;
				echo '							<div>想定分配率</div><div class="bgr2-ans">'.$target_yield.'％</div>'.LINE_FEED_CODE;
				echo '						</div>'.LINE_FEED_CODE;
				echo '					</div>'.LINE_FEED_CODE;
				
				echo '					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" style="padding: 5px;">'.LINE_FEED_CODE;
				echo '						<div class="bgr2-3">'.LINE_FEED_CODE;
				echo '							<div>運用日数</div><div class="bgr2-ans">'.$remaining_time_day.'日</div>'.LINE_FEED_CODE;
				echo '						</div>'.LINE_FEED_CODE;
				echo '					</div>'.LINE_FEED_CODE;
				
				echo '					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding: 5px;">'.LINE_FEED_CODE;
				echo '						<div class="bgr2-3">'.LINE_FEED_CODE;
				echo '							<div>申込金額 / 募集金額</div><div class="bgr2-ans">'.number_format($investment_amount).'円 / '.number_format($max_loan_amount).'円</div>'.LINE_FEED_CODE;
				echo '						</div>'.LINE_FEED_CODE;
				echo '					</div>'.LINE_FEED_CODE;
				echo '				</div>'.LINE_FEED_CODE;

				echo '				<div class="col-lg-7 col-md-8 col-sm-12 col-xs-12" style="font-size: 14px;">'.LINE_FEED_CODE;
				echo '					<div class="col-lg-8 col-md-7 col-sm-8 col-xs-12" style="padding: 5px;">'.LINE_FEED_CODE;
				echo '						<div class="bgr2-3">'.LINE_FEED_CODE;
				echo '							<div>募集期間</div><div class="bgr2-ans g-font-size-14--sm g-font-size-13--xs">'.date("Y年n月j日 H:i:s", strtotime($inviting_start)).' ～ '.date("Y年n月j日 H:i:s", strtotime($inviting_end)).'</div>'.LINE_FEED_CODE;
				echo '						</div>'.LINE_FEED_CODE;
				echo '					</div>'.LINE_FEED_CODE;
				
				echo '					<div class="col-lg-4 col-md-5 col-sm-4 col-xs-12" style="padding: 5px;">'.LINE_FEED_CODE;
				echo '						<div class="bgr2-7">'.LINE_FEED_CODE;
				echo '							<div class="bgr2-6">'.LINE_FEED_CODE;
				echo '								<div class="bgr2-ans">'.$remaining_time.'</div>'.LINE_FEED_CODE; // 残り時間
				echo '							</div>'.LINE_FEED_CODE;
				echo '						</div>'.LINE_FEED_CODE;
				echo '					</div>'.LINE_FEED_CODE;
				
				echo '					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 5px;">'.LINE_FEED_CODE;

				echo '					        <div id="progressbar'.$fund_id.'">'.LINE_FEED_CODE;
				echo '								<div id="loading'.$fund_id.'"></div>'.LINE_FEED_CODE;
				echo '					        </div>'.LINE_FEED_CODE;
			
				echo '					</div>'.LINE_FEED_CODE;
				echo '				</div>'.LINE_FEED_CODE;
				echo '			</div>'.LINE_FEED_CODE;


		}
	}




	echo '		<div class="wow fadeInUp" data-wow-duration=".5" data-wow-delay=".5s" style="margin: 4em auto 0 auto;width: 30%;">'.LINE_FEED_CODE;
	echo '			<button type="button" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--md s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" onclick="location.href=\''.URL_FUND_LIST.'\'">商品一覧へ</button>'.LINE_FEED_CODE;
	echo '		</div>'.LINE_FEED_CODE;

	echo '		</div> <!-- END container g-padding-y-80--xs g-padding-y-125--xsm -->'.LINE_FEED_CODE;
	echo '		</div> <!-- END g-bg-color--sky-light -->'.LINE_FEED_CODE;	
}
?>

<!-- END plan -->



		<!--news-->
		<div class="container g-padding-y-80--xs g-padding-y-125--xsm">
			<div class="g-text-center--xs g-margin-b-80--xs">
				<h2 class="g-font-size-32--xs g-font-size-36--md" style="letter-spacing:0.1em;">ニュース</h2>
			</div>
			
			
			
			<div class="row">
				<div class="col-md-8 col-md-offset-2" style="border-color:#ccc;border-style: dashed ; border-width: 0px 0px 1px 0px;padding-top:1em;">
					<p class="g-font-size-18--sm g-font-size-18--lg" >
					<!--	<a href="../news/2021/20100116.php" style="color:#333;"> -->
							<span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true" style="font-size:14px;"></span>　2021/04/01　<br class="visible-xs">
							新規会員登録開始のご案内
						</a>
					</p>
				</div>
			</div>

		<div class="row">
			<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-12 g-margin-t-40--lg g-margin-t-20--xs">
			
			<div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".3s">
				<button type="button" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--md s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" onclick="location.href='<?php echo URL_INFO_PAGE ?>'">ニュース一覧はこちら</button>
			</div>
			</div>
		</div>
			
		</div>
		<!--newsEnd-->



        <!--========== END PAGE CONTENT ==========-->
	

		<!-- ボタンエリア -->
		<?php if (isset($_SESSION[SESSION_LOGIN_USER_INFO])) {
			if (FUND_STATUS_CODE_NOW_INVITING == $fund_status_code) {
			}
			} else { ?>
		        <div class="container g-padding-y-80--xs g-padding-y-125--xsm">							
					<div class="col-md-12 col-xs-12">
						<div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".3s">							
							<div class="g-text-center--xs g-padding-y-20--xs">
								<p>はじめてご利用の方は、こちらから会員登録を行って下さい。</p>
								<button type="button" class="btn-block s-btn s-btn--orange-bg g-radius--50 g-padding-x-50--xs" style="padding: 15px 0;width: 80%;" onclick="location.href='<?php echo URL_REGISTRATION_PAGE ?>'">新規会員登録</button>
							</div>
						</div>
					</div>
				</div>
		<?php }	?>
		<!-- End ボタンエリア -->

<script>
var _CIDN = "cid";
var _PMTN = "p";
var _param = location.search.substring(1).split("&");
var _ulp = "", _ulcid = "";
for(var i = 0; _param[i]; i++){ var kv = _param[i].split("="); if(kv[0] == _PMTN && kv[1].length > 1){ _ulp = kv[1]; } if(kv[0] == _CIDN && kv[1].length > 1){ _ulcid = kv[1]; }}
if(_ulp && _ulcid){ document.cookie = "CL_" + _ulp + "=" + decodeURIComponent(_ulcid) + "; expires=" + new Date(new Date().getTime() + (86400 * 1000)).toUTCString() + "; path=/;"; }
</script>


		<div class="container g-padding-y-80--xs g-padding-y-125--xsm">							
			<div class="col-md-12 col-xs-12">
				当ウェブサイトではJavaScriptを使用しております。お使いのブラウザでJavaScript機能を無効にされている場合、正しく機能しない、もしくは正しく表示されないことがございます。ページを正常に閲覧するためにはJavaScriptを有効にされることをお勧め致します。
			</div>
		</div>






