<?php $this->Html->script( 'jquery-1.8.2.min.js' , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery-ui.min.js' , array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
}
<?php
if (isset($fund_list) && is_array($fund_list) && 0 < count($fund_list)) {
	$p_bar_max = DISP_NUMBER_P_BAR; // プログレスバー表示件数
	$p_bar_count = 0;
	echo '$(function(){'.LINE_FEED_CODE;
	foreach ($fund_list as $key => $values) {
		foreach ($values as $value) {
			$p_bar_count++;
			$fund_id    = $value[COLUMN_0500010];
			$max_loan   = $value[COLUMN_0500030];
			$investment = $value[COLUMN_1200070];
			echo '	var pbar = $("#progressbar'.$fund_id.'")'.LINE_FEED_CODE;
			echo '	$("#progressbar'.$fund_id.'").progressbar({value : '.$investment.', max : '.$max_loan.'});'.LINE_FEED_CODE;
			echo '	var per = $("#progressbar'.$fund_id.'").progressbar("value") / $("#progressbar'.$fund_id.'").progressbar("option", "max");'.LINE_FEED_CODE;
			echo '	$("#loading'.$fund_id.'").text(Math.floor(per * 100) + "% 募集完了");'.LINE_FEED_CODE;
		}
	}
	echo "});".LINE_FEED_CODE;
}
?>

<?php $this->Html->scriptEnd(); ?>

<script type="text/javascript">
//<![CDATA[
function linkClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
jQuery(document).ready(function(){
   jQuery("#form").validationEngine();
});
$(function(){
	var pbar = $("#progressbar");
	pbar.progressbar({ value : <?php echo $investment_amount ?> , max : <?php echo $max_loan_amount_total ?> });
	var per = pbar.progressbar('value') / pbar.progressbar('option', 'max');
	$('#loading').text(Math.floor(per * 100) + '% 募集完了');
});
//]]>
</script>	
	
	
	        <!--========== PROMO BLOCK ==========-->
        <div class="s-promo-block-v1 g-bg-color--primary-to-blueviolet-ltr g-fullheight--md">
            <div class="container g-ver-center--md g-padding-y-100--xs">
                <div class="row g-hor-centered-row--md g-margin-t-30--xs g-margin-t-20--sm">
                    
					<div class="col-lg-6 col-sm-6 g-hor-centered-row__col g-text-center--xs g-text-left--md g-margin-b-60--xs g-margin-b-0--md">
                        <div class="s-promo-block-v1__square-effect g-margin-b-60--xs">
                            <h1 class="g-font-size-32--xs g-font-size-45--sm g-font-size-50--lg g-color--white">不動産特定共同事業</h1>
                            <p class="g-font-size-20--xs g-font-size-26--md g-color--white g-margin-b-0--xs">不動産投資商品<br>想定利回り4％～7.5％</p>
                        </div>
						<div style="font-size: 2em;color: #fff;display: flex;">累計成約金額 999,999,999円</div>
                    </div>
                    <div class="col-lg-2"></div>
                    
					<div class="col-lg-4 col-sm-4 g-hor-centered-row__col">
                        <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".1s">

                            <form name="form" method="post" action="." class="center-block g-width-350--xs g-bg-color--white-opacity-lightest g-box-shadow__blueviolet-v1 g-padding-x-40--xs g-padding-y-60--xs g-radius--4">
                                <?php if ($this->Session->check(SESSION_LOGIN_USER_INFO)) { ?>
									<div id="form_box_title">状態</div>
									<p id="now-login">ログイン中</p>
									<button type="button" class="text-uppercase btn-block s-btn s-btn--md s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" onclick="location.href='<?php echo URL_LOGOUT_PAGE ?>'">ログアウト</button>
								<?php } else { ?>
								
								<div class="g-text-center--xs g-margin-b-40--xs">
                                    <h2 class="g-font-size-20--xs g-color--white">マイページ</h2>
                                </div>

                                <div class="g-margin-b-30--xs">
                                    <input type="text" class="form-control s-form-v3__input" name="<?php echo OBJECT_ID_010010010 ?>" id="<?php echo OBJECT_ID_010010010 ?>" value="<?php echo $data[OBJECT_ID_010010010] ?>" placeholder="* ID" tabindex="1">
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
                <div class="col-sm-5 g-hor-centered-row__col">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Culture</p>
                    <h2 class="g-font-size-30--xs g-font-size-32--sm g-margin-b-25--xs">不動産投資型<br>クラウドファンディング</h2>
                    <p class="g-font-size-18--sm">最大限の安全性を追求し、マンションの他、<br>空き家に着目し社会貢献をしながら<br>低リスクでの投資を実現しました。</p>
                </div>
                <div class="col-sm-1"></div>
                <div class="wow fadeInUp col-sm-5 g-hor-centered-row__col" data-wow-duration=".3" data-wow-delay=".1s">
					<img class="img-responsive" src="img/img001.png" alt="Image">
                </div>
            </div>
            <div class="row g-hor-centered-row--md g-row-col--5">
                <div class="col-sm-5 col-sm-push-7 g-hor-centered-row__col">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Production</p>
                    <h2 class="g-font-size-32--xs g-font-size-36--sm g-margin-b-25--xs">あなたのスタイルに合わせた投資が可能</h2>
                    <p class="g-font-size-18--sm">Working together on the daily requires each individual to let the greater good of the team’s work surface above their own ego.</p>
                </div>
                <div class="col-sm-1"></div>
                <div class="wow fadeInUp col-sm-5 col-sm-pull-7 g-hor-centered-row__col g-text-left--xs g-text-right--md">
                    <img class="img-responsive" src="img/img002.png" alt="Mockup Image">
                </div>
            </div>
        </div>
        <!-- End Mockup -->

        <!-- Video -->
        <section class="s-video__bg" data-vidbg-bg="mp4: img/mp4_video.mp4, webm: img/webm_video.webm, poster: img/fallback.jpg" data-vidbg-options="loop: true, muted: true, overlay: false">
            <div class="container g-position--overlay g-text-center--xs">
                <div class="g-padding-y-50--xs g-margin-t-50--xs g-margin-t-100--sm g-margin-b-100--xs g-margin-b-250--md">
                    <h2 class="g-font-size-36--xs g-font-size-50--sm g-font-size-60--md g-color--white">SEVENSTAR</h2>
                    <h2 class="g-font-size-36--xs g-font-size-50--sm g-font-size-60--md g-color--white">1万円から始める不動産投資</h2>
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
            <div class="row g-margin-b-30--xs">
                <div class="g-margin-t-20--md g-margin-b-40--xs">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Branding Work</p>
                    <h2 class="g-font-size-32--xs g-font-size-36--md">Projects</h2>
					<p style="font-size: 1.1em;">
						Lending（レンディング）は、<a href="https://7-star.co.jp/" target="_blank">セブンスター株式会社</a>が運営するソーシャルレンディングサービスを提供するサイトです。
						ソーシャルレンディングとは、クラウドファンディングのうち、金融型（投資・株式・融資）に分類されるもので、インターネットを利用し投資家が特定の企業の金銭の貸金事業へ出資をおこない、その事業からの収益を投資家の出資比率に応じて分配するものです。<br>
						当社は、Lending（レンディング）を利用し、当社が行う金銭の貸付事業へ出資をして資産運用を行いたいという意向のお客様を募集しております。
						当社が行う金銭の貸付事業において、これまで培った知識と経験を生かし、当社が適格であると判断した資金需要者との取引を通じて、経済活動をサポートし、日本経済の更なる発展の一助になるべく尽力してまいります。                          
					</p>
                </div>
            </div>
        </div>
        <!-- End Portfolio -->




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
			$inviting_end      = $value[COLUMN_0500090];
			$operating_term    = $value[COLUMN_0500120];
			$target_yield      = $value[COLUMN_0500140];
			$guide             = $value[COLUMN_0500150];
			$warranty_code     = $value[COLUMN_0700150]; //保証
			$collateral_code   = $value[COLUMN_0700160]; //担保
			$status_code       = $this->Common->getFundStatusCode($value);
			$status            = $list[CONFIG_0035][$status_code];
			$remaining_time    = $this->Common->getRemainingTime($value, $status_code);
			
			$warranty_table    = $list[CONFIG_0050][$warranty_code];
			$warranty_list     = $list[CONFIG_0051][$warranty_code];
			$collateral_table  = $list[CONFIG_0052][$collateral_code];
			$collateral_list   = $list[CONFIG_0053][$collateral_code];
			$repay_method = $list[CONFIG_0041][REPAYMENT_METHOD_CODE_P_LUMP];
			
			$p_bar_count++;
			
			echo '			<div class="row g-row-col--5 wow fadeInUp boshuu-now2" data-wow-duration=".3" data-wow-delay=".1s">'.LINE_FEED_CODE; //boshuu_gaiyou
			
			echo '					<div class="b_g_left">'.LINE_FEED_CODE;
			echo '						<div class="b_g_img">'.LINE_FEED_CODE; //商品画像

			echo '							<a href="'.URL_PROJECTS_PAGE.$fund_id.'/">'.LINE_FEED_CODE;
			echo '								<img src="'.URL_PROJECTS_PAGE.$fund_id.'/img/prj_img_01.jpg" alt="イメージ">'.LINE_FEED_CODE;
			echo '								<h3>'.$fund_name.'</h3>'.LINE_FEED_CODE;
			if ((FUND_STATUS_CODE_BEFORE_INVITING == $status_code || FUND_STATUS_CODE_NOW_INVITING == $status_code)
					&& (strtotime(date(DATETIME_FORMAT)) <= strtotime($post_datetime." +".DISP_TERM_NEW_IMAGE." day"))) {
				echo '							<span class="p_image_over">NEW</span> <!--画像の上に設置-->'.LINE_FEED_CODE;
			}
			elseif (FUND_STATUS_CODE_BEFORE_OPERATING == $status_code || FUND_STATUS_CODE_NOW_OPERATING == $status_code || FUND_STATUS_CODE_CLOSED == $status_code) {
				echo '							<span class="p_image_over">成立</span> <!--画像の上に設置-->'.LINE_FEED_CODE;
			}
			elseif (FUND_STATUS_CODE_FAILURE == $status_code) {
				echo '							<span class="p_image_over">不成立</span> <!--画像の上に設置-->'.LINE_FEED_CODE;
			}
			echo '							</a>'.LINE_FEED_CODE;
			echo '						</div>'.LINE_FEED_CODE; //商品画像ここまで
			echo '					</div>'.LINE_FEED_CODE; //b_g_leftここまで

			echo '					<div class="b_g_right2">'.LINE_FEED_CODE;
			
			echo '						<div class="bgr2-1">'.LINE_FEED_CODE;
			echo '							<div class="now_status">インカム型</div>'.LINE_FEED_CODE;
			echo '							<div class="now_status">'.$status.'</div>'.LINE_FEED_CODE;
			echo '						</div>'.LINE_FEED_CODE;
			
			echo '						<div class="bgr2-2" id="now_title"><a href="'.URL_PROJECTS_PAGE.$fund_id.'/">'.$fund_name.'</a></div>'.LINE_FEED_CODE; //建物名？

			echo '						<div class="bgr2-3">'.LINE_FEED_CODE;
			echo '							<div>想定分配率</div><div class="bgr2-ans">'.$target_yield.'　％</div>'.LINE_FEED_CODE;
			echo '						</div>'.LINE_FEED_CODE;

			echo '						<div class="bgr2-3">'.LINE_FEED_CODE;
			echo '							<div>運用期間</div><div class="bgr2-ans">'.$operating_term.'　ヶ月</div>'.LINE_FEED_CODE;
			echo '						</div>'.LINE_FEED_CODE;

			echo '						<div class="bgr2-3">'.LINE_FEED_CODE;
			echo '							<div>募集金額</div><div class="bgr2-ans">'.number_format($max_loan_amount).'　円</div>'.LINE_FEED_CODE;
			echo '						</div>'.LINE_FEED_CODE;
			
			echo '						<div class="bgr2-7">'.LINE_FEED_CODE;
			echo '							<div class="bgr2-6">'.LINE_FEED_CODE;
			echo '								<div class="bgr2-ans">'.$remaining_time.'</div>'.LINE_FEED_CODE;
			echo '							</div>'.LINE_FEED_CODE; //残り時間
			echo '						</div>'.LINE_FEED_CODE;

			echo '						<div class="bgr2-4">'.LINE_FEED_CODE;
			echo '							<div class="bgr2-5">物件所在地</div><div class="bgr2-5-2">東京都東京区東京町99-99-99</div>'.LINE_FEED_CODE;
			echo '						</div>'.LINE_FEED_CODE;

			echo '						<div class="bgr2-4">'.LINE_FEED_CODE;
			echo '							<div><b>進捗状況</b><div id="progressbar'.$fund_id.'"><div id="loading'.$fund_id.'"></div></div></div>'.LINE_FEED_CODE;
			echo '						</div>'.LINE_FEED_CODE;
			echo '					</div>'.LINE_FEED_CODE; //b_g_rightここまで

			echo '			</div>'.LINE_FEED_CODE; //boshuu_gaiyouここまで
		}
	}
	echo '		</div> <!-- END container g-padding-y-80--xs g-padding-y-125--xsm -->'.LINE_FEED_CODE;
	echo '		</div> <!-- END g-bg-color--sky-light -->'.LINE_FEED_CODE;	
}
?>

<!-- END plan -->



        <!-- Plan -->
        <div class="g-bg-color--sky-light">
            <div class="container g-padding-y-80--xs g-padding-y-125--xs">
                <div class="g-text-center--xs g-margin-b-80--xs">
                    <h2 class="g-font-size-32--xs g-font-size-36--md">商品一覧</h2>
                </div>

                <div class="row g-row-col--5">
                    <!-- Plan1 -->
                    <div class="col-md-4 g-margin-b-10--xs g-margin-b-10--lg">
                        <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".1s">
                            <div class="s-plan-v1 g-text-center--xs g-bg-color--white g-padding-y-10--xs">
                                <a href="">
								<div style="width: 100%;max-height: 400px;background-color: red;margin: 0 auto;">
									<!-- 物件画像 -->
									<div style="vertical-align: bottom;">東京ワンマンション</div>
								</div>
								
								<div>インカム型<!-- キャピタル重視型 --></div>
								<div>運用期間　　　1年間</div>
								<div>募集金額　　　999,999,999円</div>
								<div>応募金額　　　999,999,999円</div>
								<div>最低出資額　 100,000円</div>
								<div>物件所在地　　東京都港区</div>
								<div>想定分配率　　6.0％</div>
								<div>ステータス　　募集前・残り時間・不成立・運用準備中・運用中・運用終了</div>
								<div>progressバー</div>
								</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Plan1 -->

                    <!-- Plan2 -->
                    <div class="col-md-4 g-margin-b-10--xs g-margin-b-10--lg">
                        <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".2s">
                            <div class="s-plan-v1 g-text-center--xs g-bg-color--white g-padding-y-10--xs">
								<a href="">
                                <div style="width: 100%;max-height: 400px;background-color: red;margin: 0 auto;">
									<!-- 物件画像 -->
									<div style="vertical-align: bottom;">東京ワンマンション</div>
								</div>
								
								<div>インカム型<!-- キャピタル重視型 --></div>
								<div>運用期間　　　1年間</div>
								<div>募集金額　　　999,999,999円</div>
								<div>応募金額　　　999,999,999円</div>
								<div>最低出資額　 100,000円</div>
								<div>物件所在地　　東京都港区</div>
								<div>想定分配率　　6.0％</div>
								<div>ステータス　　募集前・残り時間・不成立・運用準備中・運用中・運用終了</div>
								<div>progressバー</div>
								</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Plan2 -->
                    
                    <!-- Plan3 -->
                    <div class="col-md-4 g-margin-b-10--xs g-margin-b-10--lg">
                        <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".3s">
                            <div class="s-plan-v1 g-text-center--xs g-bg-color--white g-padding-y-10--xs">
                                <a href="">
								<div style="width: 100%;max-height: 400px;background-color: red;margin: 0 auto;">
									<!-- 物件画像 -->
									<div style="vertical-align: bottom;">東京ワンマンション</div>
								</div>
								
								<div>インカム型<!-- キャピタル重視型 --></div>
								<div>運用期間　　　1年間</div>
								<div>募集金額　　　999,999,999円</div>
								<div>応募金額　　　999,999,999円</div>
								<div>最低出資額　 100,000円</div>
								<div>物件所在地　　東京都港区</div>
								<div>想定分配率　　6.0％</div>
								<div>ステータス　　募集前・残り時間・不成立・運用準備中・運用中・運用終了</div>
								<div>progressバー</div>
								</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Plan3 -->

                    <!-- Plan4 -->
                    <div class="col-md-4">
                        <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".3s">
                            <div class="s-plan-v1 g-text-center--xs g-bg-color--white g-padding-y-10--xs">
                                <a href="">
								<div style="width: 100%;max-height: 400px;background-color: red;margin: 0 auto;">
									<!-- 物件画像 -->
									<div style="vertical-align: bottom;">東京ワンマンション</div>
								</div>
								
								<div>インカム型<!-- キャピタル重視型 --></div>
								<div>運用期間　　　1年間</div>
								<div>募集金額　　　999,999,999円</div>
								<div>応募金額　　　999,999,999円</div>
								<div>最低出資額　 100,000円</div>
								<div>物件所在地　　東京都港区</div>
								<div>想定分配率　　6.0％</div>
								<div>ステータス　　募集前・残り時間・不成立・運用準備中・運用中・運用終了</div>
								<div>progressバー</div>
								</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Plan4 -->

                    <!-- Plan5 -->
                    <div class="col-md-4">
                        <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".3s">
                            <div class="s-plan-v1 g-text-center--xs g-bg-color--white g-padding-y-10--xs">
                                <a href="">
								<div style="width: 100%;max-height: 400px;background-color: red;margin: 0 auto;">
									<!-- 物件画像 -->
									<div style="vertical-align: bottom;">東京ワンマンション</div>
								</div>
								
								<div>インカム型<!-- キャピタル重視型 --></div>
								<div>運用期間　　　1年間</div>
								<div>募集金額　　　999,999,999円</div>
								<div>応募金額　　　999,999,999円</div>
								<div>最低出資額　 100,000円</div>
								<div>物件所在地　　東京都港区</div>
								<div>想定分配率　　6.0％</div>
								<div>ステータス　　募集前・残り時間・不成立・運用準備中・運用中・運用終了</div>
								<div>progressバー</div>
								</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Plan5 -->


					
                </div>

				<div class="wow fadeInUp" data-wow-duration=".5" data-wow-delay=".5s" style="margin: 100px auto 0 auto;width: 30%;">
					<button type="button" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--md s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" onclick="location.href='<?php echo URL_FUND_LIST ?>'">商品一覧へ</button>
				</div>

            </div>
        </div>
        <!-- End Plan -->
				



        <!-- Contact -->
        <div class="s-promo-block-v7 g-bg-position--center g-bg-color--dark-light" style="background: url('img/topimg.png') no-repeat;">
            <div class="g-container--sm g-padding-y-80--xs g-padding-y-125--xsm">
                <div class="g-text-center--xs g-margin-b-60--xs">
                    <h2 class="g-font-size-32--xs g-font-size-36--md g-color--white">Get in Touch</h2>
                </div>
				<div id="index-main02">
					<ul>
						<li>投資家への配当金は、貸付先から回収した利息から営業者報酬を差し引いた金額となります。</li>
						<li>投資家への送金額は、配当金から源泉所得税を差し引いた金額となります。（振込手数料は営業者負担）</li>
						<li>負担していただく費用については <a href="#" target="_blank">契約締結前交付書面</a> をご確認ください。</li>
						<li>元本の返済は、元利均等の場合は毎月、元金一括の場合は満期日に一括償還されます。（期限前償還あり）</li>
					</ul>
					<div style="margin: 10px;">
						<div style="float: left;height: 130px;margin-right: 5px;">※</div>
						<div>
							当社では、資金需要者への貸付及び営業者報酬の利率を明記しており、投資家へ分配する利益を出来る限り高い利回りで実現できるよう努めております。
							システム導入費や保守・管理費などフィンテック事業には多額の費用がかかりますが、当社ではこれまで金融システムの開発・運営を行ってきた実績を基に、ソーシャルレンディングシステムの自社開発を行い、初期費用の大幅な削減を実現しました。
							これにより、各ファンドの営業者報酬を最大限抑えることができ、上図の場合、投資家へ配当する想定利回り6％～10％以上が可能であると見込んでおります。
							（全ての案件の想定利回りが10％以上であることを保証しているわけではありません）
						</div>
					</div>
				</div>
            </div>
        </div>
        <!-- End Contact -->
        <!--========== END PAGE CONTENT ==========-->
	
        <!-- Clients -->
        <div class="g-container--md g-padding-y-80--xs g-padding-y-100--sm">
            <!-- Swiper Clients -->
            <div class="s-swiper js__swiper-clients">
				<div class="wow fadeIn" id="banner_area">
		            <a href='<?php echo URL_REGISTRATION_PAGE ?>'><img src="img/banner001.jpg" alt="新規会員登録"></a>
                </div>
            </div>
            <!-- End Swiper Clients -->
        </div>
        <!-- End Clients -->
		<div id="Javascript_text">
			当ウェブサイトではJavaScriptを使用しております。ページを正常に閲覧するためにはJavaScriptを有効にされることをお勧め致します。
		</div>
	<!--</div>-->
</body>
</html>
