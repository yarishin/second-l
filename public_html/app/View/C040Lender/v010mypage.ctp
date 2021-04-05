<?php $this->Html->css('https://fonts.googleapis.com/icon?family=Material+Icons', array('inline' => false)); ?>

<?php if($club_id == 1){ ?>
    <?php $this->Html->css('mypage_club.css', array('inline' => false)); ?>
<?php }	
elseif($club_id_id == 2) { ?> 
	<?php $this->Html->css('mypage_club.css', array('inline' => false)); ?>
<?php } 
else{ ?>
	<?php $this->Html->css('mypage.css', array('inline' => false)); ?>
<?php }
?>


<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
function linkClick(eventId, Id, confirmDateTime) {
        document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
        document.getElementById('<?php echo HIDDEN_ID_000000160 ?>').value = Id;
        document.getElementById('<?php echo HIDDEN_ID_000000190 ?>').value = confirmDateTime;
        document.form.submit();
}
<?php $this->Html->scriptEnd(); ?>


<div class="g-bg-color--sky-light">
	<div class="container g-padding-y-80--xs g-padding-y-125--xsm">

		<div class="row mypagetitle-area">
		<!--CLUB_IDを追加-->
		<?php print $club_id; ?>
			<div class="col-md-12"><h3>マイページ</h3></div>
		</div>

		<div class="row" style="margin-top:1em;">

			<!--menu-->
			<div class="col-md-2 col-xs12 mypagemenu">
				<div class="scroll-nav">
					<ul>
						<li class="mypagebt-on"><a href="javascript:void(0)" onclick="location.href='<?php echo URL_LENDER_PAGE ?>'"><i class="material-icons">home</i><br class="smart-br-on"><span>マイページTop</span></a></li>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010040 ?>');"><i class="material-icons">announcement</i><br class="smart-br-on"><span>お知らせ</span></a></li>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010010 ?>');"><i class="material-icons">toc</i><br class="smart-br-on"><span>出資履歴</span></a></li>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010020 ?>');"><i class="material-icons">timeline</i><br class="smart-br-on"><span>収益明細</span></a></li>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010060 ?>');"><i class="material-icons">how_to_vote</i><br class="smart-br-on"><span>電子交付書面</span></a></li>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010030 ?>');"><i class="material-icons">account_circle</i><br class="smart-br-on"><span>会員情報</span></a></li>
						<li class="mypagebt-off"><a href="<?php echo URL_LOGOUT_PAGE ?>"><i class="material-icons">directions_run</i><br class="hidden-md hidden-lg"><span>ログアウト</span></a></li>
					</ul>
				</div>
			</div>
			<!--menu_end-->


			<div class="col-md-10 col-sm-12 col-xs-12 mypagemain" style="padding: 0;margin: 0;">
			
				<div style="text-align: right;color: #666666;margin: 0;padding: 0 10px;width: 100%;">
					<?php echo $kanji_name ?> 様　ID:<?php echo $user_id ?>
				</div>

                                 <form id="form" name="form" method="post" action="<?php echo $action ?>">
					<div class="col-sm-4 col-xs-12">
						<div class="row well well-sm" style="background-color: #fff;margin: 0 0 10px 0;padding: 15px 0;">
							<div class="col-sm-12 col-xs-7" style="text-align: center;">
								<h5 class="g-font-size-20--lg g-font-size-18--md g-font-size-15--sm g-font-size-16--xs">運用前金額</h5>
							</div>
							<div class="col-sm-12 col-xs-5" style="text-align: center;">
								<?php echo $sum_list['before_operation'] ?> 円
							</div>
						</div>
					</div>
					
					<div class="col-sm-4 col-xs-12">
						<div class="row well well-sm" style="background-color: #fff;margin: 0 0 10px 0;padding: 15px 0;">
							<div class="col-sm-12 col-xs-7" style="text-align: center;">
								<h5 class="g-font-size-20--lg g-font-size-18--md g-font-size-15--sm g-font-size-16--xs">運用中出資金額</h5>
							</div>
							<div class="col-sm-12 col-xs-5" style="text-align: center;">
								<?php echo $sum_list['in_operation'] ?> 円
							</div>
						</div>
					</div>					
					
					<div class="col-sm-4 col-xs-12">
						<div class="row well well-sm" style="background-color: #fff;margin: 0 0 10px 0;padding: 15px 0;">
							<div class="col-sm-12 col-xs-7 g-font-size-16--sm g-font-size-13--xs" style="text-align: center;">
								<h5 class="g-font-size-20--lg g-font-size-18--md g-font-size-15--sm g-font-size-16--xs">分配金合計（税引前）</h5>
							</div>
							<div class="col-sm-12 col-xs-5" style="text-align: center;">
								<?php echo number_format($b_total) ?> 円
							</div>
						</div>
					</div>	
                       <?php
                               if(DISP_CHECK_TRG == 1) {
                                 print "<pre>";
                                 print "<br>mypage_check<br>";
                                 print_r($mypage_check);
                                 print "<br>sum_list<br>";
                                 print_r($sum_list);
                                 print "<br>mypage<br>";
                                 print_r ($mypage);
                                 print "<br>check<br>";
                                 print_r ($check);  
                                 print "</pre>";
                               }
                       ?>



					

					<div class="col-sm-12" style="padding: 0 1em;overflow: hidden;">
						<div class="well well-lg col-md-12 col-sm-12 col-xs-12 mp-info-table" style="padding: 1.2em 0.5em;background-color: #fff;">
						<h3 class="g-font-size-28--md g-font-size-20--sm g-font-size-20--xs">お知らせ</h3>
							<?php
							if (isset($data_list_o) && is_array($data_list_o) && count($data_list_o) > 0) {
								echo"<div class=\"table-responsive\">".LINE_FEED_CODE;
								echo "<table class=\"table table-bordered table-striped\">".LINE_FEED_CODE;
								echo "	<tbody>".LINE_FEED_CODE;
								echo "		<tr>"   .LINE_FEED_CODE;
								echo "			<th style=\"text-align:left;\">掲載日</th>".LINE_FEED_CODE;
								echo "			<th style=\"text-align:left;\">タイトル</th>".LINE_FEED_CODE;
								echo "			<th style=\"text-align:left;\">閲覧</th>".LINE_FEED_CODE;
								echo "		</tr>"   .LINE_FEED_CODE;

								foreach ($data_list_o as $key => $values) {
									foreach ($values as $value) {
										$id        =  $value[COLUMN_1100010];
										$subject        =  $value[COLUMN_1100050];
										$post_date_time =  date(DATE_FORMAT, strtotime($value[COLUMN_1100130]));
										$confirm_date_time =  $value[COLUMN_1100140];
										$confirm_date_time_trim = $value[COLUMN_1100140];
										$force_flag = $value[COLUMN_1100070];
										$agreement_flag = $value[COLUMN_1100080];
										$agreed_datetime = $value[COLUMN_1100150];
											
										if ((is_null($agreed_datetime)) && ($agreement_flag == 1)) {
											$confirm_date_time_trim = "未読";
											$ans = 1;
										}elseif ((is_null($confirm_date_time_trim)) && (is_null($agreed_datetime))) {
											$confirm_date_time_trim = "未読";
											$ans = 1;
										}else{
											$confirm_date_time_trim = date(DATE_FORMAT, strtotime($confirm_date_time_trim));
											$ans = NULL;
										}
										echo "<tr>".LINE_FEED_CODE;
										if (isset($ans)){
											echo "	<td class=\"td-center mp-info-midoku\">".$post_date_time."</td>".LINE_FEED_CODE;
										
											echo "	<td class=\"mp-info-midoku\"><a href=\"#\" onclick=\"linkClick('".EVENT_ID_040090010."','".$id."','".$confirm_date_time."')\">".$subject."</a></td>".LINE_FEED_CODE;
	echo "	<td class=\"td-center mp-info-midoku\">未読</td>".LINE_FEED_CODE;

										}else{
											echo "	<td class=\"td-center\">".$post_date_time."</td>".LINE_FEED_CODE;
										
											echo "	<td><a href=\"javascript:void(0)\" onclick=\"linkClick('".EVENT_ID_040090010."','".$id."','".$confirm_date_time."')\">".$subject."</a></td>".LINE_FEED_CODE;
	echo "	<td class=\"td-center\">既読</td>".LINE_FEED_CODE;

										}
									}
									echo "</tr>"  .LINE_FEED_CODE;
								}
								echo "  </tbody>" .LINE_FEED_CODE;
								echo "  </table>" .LINE_FEED_CODE;
							echo "  </div>" .LINE_FEED_CODE;
								echo "  <div style='text-align: center;'>" .LINE_FEED_CODE;
								?>
									<a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010040 ?>');">全てのお知らせ一覧</a>
								<?php
								echo "  </div>" .LINE_FEED_CODE;

							} else {
								echo "  <div style='text-align: center;'>現在、お知らせはありません。</div>" .LINE_FEED_CODE;
							}
							?>
						</div>
					</div>	<!-- お知らせ END -->
					



					<div class="col-sm-12" style="padding: 0 1em;overflow: hidden;">
<!--						<div class="well well-lg col-sm-12 col-xs-12" style="background-color: #fff;">	-->
						<div class="well well-lg col-sm-12 col-xs-12" style="background-color: #fff;">
							<h3 class="g-font-size-28--md g-font-size-20--sm g-font-size-20--xs">出資中の商品</h3>

							<div style="padding: 10px;margin: 30px 0;">
							
								<?php
								//20190220_add_yarimizu_delay

        //変数MyPage
		if (isset($mypage) && is_array($mypage)) {
			foreach ($mypage as $key => $values) {
				$fund_id              =  !empty($values[TrnInvestmentHistory][COLUMN_1200040]) ? $values[TrnInvestmentHistory][COLUMN_1200040] : "&nbsp;";
				$fund_name            =  !empty($values[TrnInvestmentHistory][COLUMN_1200050]) ? $values[TrnInvestmentHistory][COLUMN_1200050] : "&nbsp;";	//商品名
				$fund_link            =  URL_PROJECTS_PAGE.$fund_id;
				$investment_amount    =  !empty($values[TrnInvestmentHistory][COLUMN_1200070]) ? number_format($values[TrnInvestmentHistory][COLUMN_1200070]) : "&nbsp;";	//投資金額
				$expiration_datetime  =  !empty($values[TrnInvestmentHistory][COLUMN_1200080]) ? date(DATE_FORMAT, strtotime($values[TrnInvestmentHistory][COLUMN_1200080])) : "&nbsp;";	//入金期限
				$approval_datetime    =  !empty($values[TrnInvestmentHistory][COLUMN_1200100]) ? date(DATE_FORMAT, strtotime($values[TrnInvestmentHistory][COLUMN_1200100])) : "&nbsp;";	//承認日
				$deposit_date         =  !empty($values[TrnInvestmentHistory][COLUMN_1200190]) ? date(DATE_FORMAT, strtotime($values[TrnInvestmentHistory][COLUMN_1200190])) : "&nbsp;";
				$investment_status_code   =  !empty($values[TrnInvestmentHistory][COLUMN_1200090]) ? $values[TrnInvestmentHistory][COLUMN_1200090] : "&nbsp;";	//投資状態
				$delay_1              =  !empty($values[b][COLUMN_1400170]) ? $values[b][COLUMN_1400170] : "&nbsp;";	//遅延情報
                                $ended                =  !empty($values[b][COLUMN_1400171]) ? $values[b][COLUMN_1400171] : "&nbsp;";	//強制終了
				$max_loan_amount_total = !empty($values[b][COLUMN_0500030]) ? $values[b][COLUMN_0500030] : "&nbsp;";
				$min_loan_amount_total = !empty($values[b][COLUMN_0500050]) ? $values[b][COLUMN_0500050] : "&nbsp;";
				$loan_amount_total     = !empty($values[b][COLUMN_0500040]) ? $values[b][COLUMN_0500040] : "&nbsp;";
				$inviting_start       = !empty($values[b][COLUMN_0500080]) ? $values[b][COLUMN_0500080] : "&nbsp;";
				$inviting_end         = !empty($values[b][COLUMN_0500090]) ? $values[b][COLUMN_0500090] : "&nbsp;";
				$operating_start      =  date(DATE_FORMAT, strtotime($values[b][COLUMN_0500100])); //運用開始日	・
				$operating_end        =  !empty($values[b][COLUMN_0500110]) ? date(DATE_FORMAT, strtotime($values[b][COLUMN_0500110])) : "&nbsp;"; //運用終了日	・
				$application_datetime =  !empty($values[TrnInvestmentHistory][COLUMN_1200060]) ? date(DATE_FORMAT, strtotime($values[TrnInvestmentHistory][COLUMN_1200060])) : "&nbsp;";	//申込日
				$documents_application_end_date	= !empty($values[b][COLUMN_0501420]) ? date(DATE_FORMAT, strtotime($values[b][COLUMN_0501420])) : "&nbsp;"; //払戻予定日
				$principal_amount_2 = !empty($values[c][COLUMN_1300140]) ? $values[c][COLUMN_1300140] : "&nbsp;";
				
				$check = array('max_loan_amount' => $values[b][COLUMN_0500030],
					       'min_loan_amount' => $values[b][COLUMN_0500050],
					       'loan_amount'     => $values[b][COLUMN_0500040],
					       'investment_amount'     => $values[TrnInvestmentHistory][COLUMN_1200070],
                                               'principal_amount_2'    => $principal_amount_2,
                                               'delay_1'               => $delay_1,
                                               'ended'                 => $ended,
				               'inviting_start'        => $inviting_start,
			                       'inviting_end'          => $inviting_end,
		                               'operating_start'       => $values[b][COLUMN_0500100],
			                       'operating_end'         => $values[b][COLUMN_0500110] ) ;
				
				$status_code       = $this->Common->getFundStatusCode($check);
				$status            = $list[CONFIG_0035][$status_code];
                                
					if ($status_code == 1 || $status_code == 2 || $status_code == 3 ){	//fund_status	募集中・運用開始前・運用中 のみ表示
					
						if($investment_status_code == 2 || $investment_status_code == 3){
						}
						else
						{

					if($delay_1 == 1){
						$delay_1 = '<div class="col-sm-1 col-xs-6" style="padding: 5px;"><div class="now_status"><span style="color:red">延長</span></div></div>';
					}else{
						$delay_1 = '';
					}
				
													echo '			<div class="row g-row-col--5 wow fadeIn boshuu-now2" data-wow-duration=".3" data-wow-delay=".1s" style="padding-bottom: 5px;">'.LINE_FEED_CODE;
													echo '				<div class="col-sm-3 col-xs-12" style="padding: 5px 5px 5px 10px;">'.LINE_FEED_CODE;
													echo '					<div class="b_g_img">'.LINE_FEED_CODE;
													echo '						<a href="'.$fund_link.'/">'.LINE_FEED_CODE;
													echo '							<img src="'.$fund_link.'/img/thumbnail_img001.jpg" alt="案件画像" />'.LINE_FEED_CODE;
													echo '							<h3 style="display: none;">'.$fund_name.'</h3>'.LINE_FEED_CODE;
													echo '						</a>'.LINE_FEED_CODE;
													echo '					</div>'.LINE_FEED_CODE;
													echo '				</div>'.LINE_FEED_CODE;

													echo '				<div class="col-sm-9 col-xs-12" style="font-size: 14px;">'.LINE_FEED_CODE;
													echo '					<div class="col-sm-12 col-xs-12">'.LINE_FEED_CODE;
													echo '						<div class="col-sm-11 col-xs-12" style="padding: 5px;">'.LINE_FEED_CODE;
													echo '							<div id="now_title"><a href="'.URL_PROJECTS_PAGE.$fund_id.'/">'.$fund_name.'</a></div>'.LINE_FEED_CODE; // プロジェクト名
													echo '						</div>'.LINE_FEED_CODE;
													echo '							'.$delay_1.LINE_FEED_CODE; // 遅延情報	（情報が無ければ非表示）
													echo '					</div>'.LINE_FEED_CODE;

													//echo '					<div class="col-sm-12 col-xs-12" style="padding: 5px;"><div class="now_status">'.$status.'</div></div>'.LINE_FEED_CODE;	//取消・期限切れ・募集前・不成立・運用終了は非表示
				
													echo '					<div class="col-md-2 col-sm-6 col-xs-6" style="padding: 5px;">'.LINE_FEED_CODE;
													echo '						<div class="text-center">'.LINE_FEED_CODE;
													echo '							<div class="mp-pjlist-title">出資確定日</div>'.LINE_FEED_CODE;
													echo '							<div class="g-padding-y-5--sm g-padding-y-5--xs">'.$approval_datetime.'</div>'.LINE_FEED_CODE;
													echo '						</div>'.LINE_FEED_CODE;
													echo '					</div>'.LINE_FEED_CODE;
				
													echo '					<div class="col-md-4 col-sm-6 col-xs-6" style="padding: 5px;">'.LINE_FEED_CODE;
													echo '						<div class="text-center">'.LINE_FEED_CODE;
													echo '							<div class="mp-pjlist-title">運用期間</div>'.LINE_FEED_CODE;
													echo '							<div class="g-padding-y-5--sm g-padding-y-5--xs">'.$operating_start.'から'.$operating_end.'</div>'.LINE_FEED_CODE;
													echo '						</div>'.LINE_FEED_CODE;
													echo '					</div>'.LINE_FEED_CODE;
				
													echo '					<div class="col-md-3 col-sm-6 col-xs-6" style="padding: 5px;">'.LINE_FEED_CODE;
													echo '						<div class="text-center">'.LINE_FEED_CODE;
													echo '							<div class="mp-pjlist-title">出資金額</div>'.LINE_FEED_CODE;
													echo '							<div class="g-padding-y-5--sm g-padding-y-5--xs">'.$investment_amount.'円</div>'.LINE_FEED_CODE;
													echo '						</div>'.LINE_FEED_CODE;
													echo '					</div>'.LINE_FEED_CODE;

													echo '					<div class="col-md-3 col-sm-6 col-xs-6" style="padding: 5px;">'.LINE_FEED_CODE;
													echo '						<div class="text-center">'.LINE_FEED_CODE;
													echo '							<div class="mp-pjlist-title">償還予定</div>'.LINE_FEED_CODE;
													echo '							<div class="g-padding-y-5--sm g-padding-y-5--xs">'.$documents_application_end_date.'</div>'.LINE_FEED_CODE;
													echo '						</div>'.LINE_FEED_CODE;
													echo '					</div>'.LINE_FEED_CODE;
													echo '				</div>'.LINE_FEED_CODE;

													echo '			</div>'.LINE_FEED_CODE;

													}
												}
                                                                                                                                                          
											}
										} else {
											echo "  <div style='text-align: center;'>現在、出資中の商品はありません。</div>" .LINE_FEED_CODE;
									}

								?>
							</div>


					<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
					<input type="hidden" id="<?php echo HIDDEN_ID_000000160 ?>" name="<?php echo HIDDEN_ID_000000160 ?>" value="">
					<input type="hidden" id="<?php echo HIDDEN_ID_000000190 ?>" name="<?php echo HIDDEN_ID_000000190 ?>" value="">
				</form>
				</div>
			</div>

			<!--
			<div class="col-sm-12" style="padding: 1em;overflow: hidden;text-align: center;border: 1px solid #000000;">
				<a href="<?php echo URL_FUND_LIST ?>">全ての商品一覧はこちら</a>
			</div>
			-->
			</div>
		</div>
	</div>
</div> <!--content end-->


