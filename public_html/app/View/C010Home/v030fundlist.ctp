<?php echo $this->Html->script( 'jquery.min.js' , array( 'inline' => false ) ); ?>
<?php echo $this->Html->script( 'jquery-ui.min.js' , array( 'inline' => false ) ); ?>


<?php $this->Html->scriptStart(array('inline' => false)); ?>
<?php
if (isset($fund_list) && is_array($fund_list) && 0 < count($fund_list)) {
	$p_bar_max = DISP_NUMBER_P_BAR; // プログレスバー表示件数
	$p_bar_count = 0;
	echo 'var $182 = $.noConflict(true);'.LINE_FEED_CODE;
	echo '$182(function(){'.LINE_FEED_CODE;
	foreach ($fund_list as $key => $values) {
		foreach ($values as $value) {
			$p_bar_count++;
			$fund_id    = $value[COLUMN_0500010];
			$max_loan   = $value[COLUMN_0500030];
			$investment = $value[COLUMN_1200070];
			echo ''.LINE_FEED_CODE;
			echo '	var pbar = $182("#progressbar'.$fund_id.'")'.LINE_FEED_CODE;
			echo '	pbar.progressbar({value : '.$investment.', max : '.$max_loan.'});'.LINE_FEED_CODE;
			echo '	var per = pbar.progressbar("value") / pbar.progressbar("option", "max");'.LINE_FEED_CODE;
			echo '	$("#loading'.$fund_id.'").text(Math.floor(per * 100) + "% 募集完了");'.LINE_FEED_CODE;

			if ($p_bar_count == $p_bar_max) {
				break;
			}
		}
	}
	echo '});'.LINE_FEED_CODE;
}
?>

<?php $this->Html->scriptEnd(); ?>


<div class="g-bg-color--sky-light">
    <div class="container g-padding-y-80--xs g-padding-y-125--xsm">

		<div style="margin: 0;position: relative;z-index: 1;">
			<div id="page-title" class="wow slideInUp" data-wow-duration="2s" data-wow-delay="0">商品一覧</div>
			<div id="page-title-mask" class="wow slideOutDown hidden-md" data-wow-duration="3s" data-wow-delay=".2s"></div>
		</div>


	    <div class="row" style="overflow-x:hidden;">
			   <div class="col-md-12 col-sm-12 g-margin-b-0--xs g-margin-b-0--lg" style="position: relative;z-index: 2;">


<?php
if (isset($fund_list) && is_array($fund_list) && 0 < count($fund_list)) {
//	$p_bar_max = $this->Paginator->param('page') < 2 ? DISP_NUMBER_P_BAR : 0; // プログレスバー表示件数
	$p_bar_count = 0;
	$list_count = count($fund_list);
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
			$warranty_code     = $value[COLUMN_0700150];
			$collateral_code   = $value[COLUMN_0700160];
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
			
			if (0 < $p_bar_max && 1 == $p_bar_count) {
				// プログレスバー開始
				echo '		<div id="boshuu_list"> <!--案件一覧（案件があれば表示）-->'.LINE_FEED_CODE;	
			}
			elseif ($p_bar_max + 1 == $p_bar_count) {
				// 通常リスト開始
				echo '		<div id="project-list">'.LINE_FEED_CODE;
				echo '			<table>'.LINE_FEED_CODE;
				echo '				<tr>'.LINE_FEED_CODE;
				echo '					<th colspan="2">プロジェクト名</th>'.LINE_FEED_CODE;
				echo '					<th width="100px">想定分配率（税引前）</th>'.LINE_FEED_CODE;
				echo '					<th>募集金額</th>'.LINE_FEED_CODE;
				echo '					<th>運用期間</th>'.LINE_FEED_CODE;
				echo '					<th>担保</th>'.LINE_FEED_CODE;
				echo '					<th>保証</th>'.LINE_FEED_CODE;
				echo '					<th>返済方法</th>'.LINE_FEED_CODE;
				echo '					<th>最低<br>投資額</th>'.LINE_FEED_CODE;
				echo '					<th>状況</th>'.LINE_FEED_CODE;
				echo '				</tr>'.LINE_FEED_CODE;
			}
/*ここから*/			
			if ($p_bar_count <= $p_bar_max) {
				echo '			<div class="row g-row-col--5 wow fadeIn boshuu-now2" data-wow-duration=".3" data-wow-delay=".1s">'.LINE_FEED_CODE;


				echo '				<div class="col-lg-5 col-md-4 col-sm-4 col-xs-12" style="padding: 15px 15px 15px 20px;">'.LINE_FEED_CODE;
				echo '					<div class="col-lg-12" style="padding:0;">'.LINE_FEED_CODE;
				echo '					<div class="b_g_img">'.LINE_FEED_CODE;
				echo '						<a href="'.URL_PROJECTS_PAGE.$fund_id.'/">'.LINE_FEED_CODE;				   echo '							<h3 class="img_obi g-font-size-22--lg g-font-size-11--md g-font-size-18--sm g-font-size-15--xs" style="text-align:center;">'.$fund_name.'</h3>'.LINE_FEED_CODE;
				echo '								<img src="'.URL_PROJECTS_PAGE.$fund_id.'/img/thumbnail_img001.jpg" alt="案件画像">'.LINE_FEED_CODE;

				echo '						</a>'.LINE_FEED_CODE;
				echo '					</div>'.LINE_FEED_CODE;
				echo '					</div>'.LINE_FEED_CODE;

				echo '				</div>'.LINE_FEED_CODE;

				echo '				<div class="col-lg-7 col-md-8 col-sm-8 col-xs-12" style="font-size: 14px;">'.LINE_FEED_CODE;

				echo '					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 10px;text-align: right;">'.LINE_FEED_CODE;

				if($status_code==0){
				echo '	<div class="now_status2">'.$status.'</div>'.LINE_FEED_CODE; 
							} 

				else {				
				if($status_code==1){
				echo '	<div class="now_status" style="background-color:#ff7058;">'.$status.'</div>'.LINE_FEED_CODE; 
							} 
				else {				
				if($status_code==2){
				echo '	<div class="now_status3">'.$status.'</div>'.LINE_FEED_CODE; 
							} 
				else {				
				if($status_code==3){
				echo '	<div class="now_status" style="background-color:#ff982a;">'.$status.'</div>'.LINE_FEED_CODE; 
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



			}	/*ここまで*/
			else {	/* 案件一覧表 */
				echo '				<tr>'.LINE_FEED_CODE;
				echo '					<td class="fundlist_gazou"><a href="'.URL_PROJECTS_PAGE.$fund_id.'/"><img src="'.URL_PROJECTS_PAGE.$fund_id.'/img/thumbnail_img001.jpg" alt="案件画像"></a></td>'.LINE_FEED_CODE;
				if ((FUND_STATUS_CODE_BEFORE_INVITING == $status_code || FUND_STATUS_CODE_NOW_INVITING == $status_code)
						&& (strtotime(date(DATETIME_FORMAT)) <= strtotime($post_datetime." +".DISP_TERM_NEW_IMAGE." day"))) {
					echo '				<td class="fundlist_name"><a href="'.URL_PROJECTS_PAGE.$fund_id.'/"><span>new</span> <b>'.$fund_name.'</b></a></td>'.LINE_FEED_CODE;
				} else {
					echo '				<td class="fundlist_name"><a href="'.URL_PROJECTS_PAGE.$fund_id.'/"><b>'.$fund_name.'</b></a></td>'.LINE_FEED_CODE;
				}
				echo '					<td class="fundlist_ritsu">'.$target_yield.'%</td>'.LINE_FEED_CODE;
				echo '					<td class="fundlist_boshugaku">'.number_format($max_loan_amount).'円</td>'.LINE_FEED_CODE;
				echo '					<td class="fundlist_kikan">'.$remaining_time_day.'日</td>'.LINE_FEED_CODE;
				echo '					<td class="fundlist_tanpo">'.$collateral_list.'</td>'.LINE_FEED_CODE;
				echo '					<td class="fundlist_tanpo">'.$warranty_list.'</td>'.LINE_FEED_CODE;
				echo '					<td class="fundlist_method">'.$repay_method.'</td>'.LINE_FEED_CODE;
				echo '					<td class="fundlist_rowgaku">'.$min_investment_amount.'万円</td>'.LINE_FEED_CODE;
				echo '					<td class="fundlist_status">'.$status.'</td>'.LINE_FEED_CODE;
				echo '				</tr>'.LINE_FEED_CODE;
			}
			
			if ($p_bar_max == $p_bar_count || ($p_bar_max > $list_count && $list_count == $p_bar_count)) {
				// プログレスバー終了
				echo '		</div> <!-- project-list end -->'.LINE_FEED_CODE;	
			}
			elseif ($p_bar_max < $p_bar_count && $list_count == $p_bar_count) {
				// 通常リスト終了
				echo '			</table>'.LINE_FEED_CODE;
				echo '		</div>'.LINE_FEED_CODE;
				
			}
		}
	}
}
	echo '<div style="width: 100%;padding-top: 20px;padding-bottom: 20px;text-align: center;">'.LINE_FEED_CODE;
    echo '<span style="padding-right: 10px;">'.$this->Paginator->prev('< 前へ ', array(), null, array('class' => 'prev disabled')).'</span>'.LINE_FEED_CODE;
    echo '<span style="letter-spacing: 5px;">'.$this->Paginator->numbers(array('separator' => ' ')).'</span>'.LINE_FEED_CODE;
    echo '<span style="padding-left: 10px;">'.$this->Paginator->next(' 次へ >', array(), null, array('class' => 'next disabled')).'</span>'.LINE_FEED_CODE;
	echo '</div>'.LINE_FEED_CODE;
?>
		
			


			<!-- ボタンエリア -->
			<?php if (isset($_SESSION[SESSION_LOGIN_USER_INFO])) {
				if (FUND_STATUS_CODE_NOW_INVITING == $fund_status_code) {
				}
				} else { ?>
					<div class="container g-padding-y-80--xs g-padding-y-125--xsm">							
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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




		</div>
		
		</div> <!-- content end -->

	</div>
</div>


