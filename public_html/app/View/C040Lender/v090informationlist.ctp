<?php $this->Html->css('https://fonts.googleapis.com/icon?family=Material+Icons', array('inline' => false)); ?>
<?php $this->Html->css('mypage.css', array('inline' => false)); ?>
<?php $this->Html->css('validationEngine.jquery.css', array('inline' => false)); ?>
<?php $this->Html->script( 'jquery.min.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.validationEngine.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'languages/jquery.validationEngine-ja.js', array( 'inline' => false ) ); ?>

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
			<div class="col-md-12">
				<h3>お知らせ</h3>
			</div>
		</div>

		<div class="row" style="margin-top:1em;">

			<!--menu-->
			<div class="col-md-2 col-xs12 mypagemenu">
				<div class="scroll-nav">
					<ul>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="location.href='<?php echo URL_LENDER_PAGE ?>'"><i class="material-icons">home</i><br class="smart-br-on"><span>マイページTop</span></a></li>
						<li class="mypagebt-on mp_m_on"><i class="material-icons">announcement</i><br class="smart-br-on"><span>お知らせ</span></li>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010010 ?>');"><i class="material-icons">toc</i><br class="smart-br-on"><span>出資履歴</span></a></li>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010020 ?>');"><i class="material-icons">timeline</i><br class="smart-br-on"><span>収益明細</span></a></li>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010060 ?>');"><i class="material-icons">how_to_vote</i><br class="smart-br-on"><span>電子交付書面</span></a></li>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010030 ?>');"><i class="material-icons">account_circle</i><br class="smart-br-on"><span>会員情報</span></a></li>
						<li class="mypagebt-off"><a href="<?php echo URL_LOGOUT_PAGE ?>"><i class="material-icons">directions_run</i><br class="hidden-md hidden-lg"><span>ログアウト</span></a></li>
					</ul>
				</div>
			</div>
			<!--menu_end-->


<div class="mp-right row col-md-10 col-sm-12" style="padding:0 2em 2em 2em;margin: 0;">
			<div class="row">
				<div class="col-md-12" style="padding-top:1.2em;">
				
				<h4 class="g-font-size-20--md g-font-size-16--sm g-font-size-16--xs"><?php echo $kanji_name ?> 様へのお知らせ</h4>
				</div>
			</div>

		<form id="form" style="margin-top:0;" name="form" method="post" action="<?php echo $action ?>">
		
					


<div class="row">
	<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
				<?php
					if (isset($err) && is_array($err)) {
						foreach ($err as $key => $value) {
							echo '<dl id="mp-notice" style="border-radius:10px;">';
							echo '	<dd>';
							echo '		<span class="error">'.$value.'</span>';
							echo '	</dd>';
							echo '</dl>';
						}
					}
				?>
	</div>
</div>

				<div class="row">

					<div class="col-md-8 col-md-offset-4">
					<div class="mp-kensaku row">
						<div class="col-lg-2 col-lg-offset-3 col-md-2 col-md-offset-1 col-sm-2 col-sm-offset-3 col-xs-12 g-padding-y-10--xs g-padding-y-5--sm g-padding-y-5--md g-padding-y-5--lg g-padding-x-0--xs" style="font-weight: bold;text-align:center;">掲載日</div>
						
						<div class="col-lg-2 col-md-3 col-sm-2 col-xs-5 g-padding-y-10--xs g-padding-y-0--sm g-padding-y-0--md g-padding-y-0--lg g-padding-x-0--xs">
							<input type="text" class="form-control" name="<?php echo SEARCH_ID_040090010 ?>" id="<?php echo SEARCH_ID_040090010 ?>" value="<?php echo $data[SEARCH_ID_040090010] ?>" placeholder="2019/01/01" tabindex="1">
						</div>
						<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 text-center g-padding-y-10--xs g-padding-y-5--sm g-padding-y-5--md g-padding-y-5--lg g-padding-x-0--xs" style="font-weight: bold;padding-left:0;padding-right:0;">
							&nbsp;&nbsp;～&nbsp;&nbsp;
						</div>
						<div class="col-lg-2 col-md-3 col-sm-2 col-xs-5 g-padding-y-10--xs g-padding-y-0--sm g-padding-y-0--md g-padding-y-0--lg g-padding-x-0--xs">
							<input type="text" class="form-control" name="<?php echo SEARCH_ID_040090020 ?>" id="<?php echo SEARCH_ID_040090020 ?>" value="<?php echo $data[SEARCH_ID_040090020] ?>" placeholder="2019/12/31" tabindex="2">
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 g-padding-y-10--xs g-padding-y-0--sm g-padding-y-0--md g-padding-y-0--lg" style="text-align: center;">
							<input type="submit" class="btn btn-default col-xs-12" id="<?php echo OBJECT_ID_BTN000040 ?>" name="<?php echo OBJECT_ID_BTN000040 ?>" value="検索" onclick="buttonClick('<?php echo EVENT_ID_040090020 ?>');" tabindex="3">
						</div>
					</div>
					</div>

				</div>


				<div class="row col-md-12 col-sm-12" style="margin-top:0.5em;padding-right:0;">
						<div class="row mp-info-table">
						
							<?php
							if (isset($data_list) && is_array($data_list) && count($data_list) > 0) {
 								echo "<span style=\"font-size:0.8em;text-align:right\">※同意が必要なご案内は、同意をすると既読になります。</span>".LINE_FEED_CODE;
 								echo "<div class=\"table-responsive\">".LINE_FEED_CODE;
								echo "<table class=\"table table-striped\">".LINE_FEED_CODE;								  			 echo "<tbody>".LINE_FEED_CODE;
								echo "	<tr>".LINE_FEED_CODE;
								echo "		<th style=\"text-align:left;border:none;\">掲載日</th>".LINE_FEED_CODE;
								echo "		<th style=\"text-align:left;border:none;\">タイトル</th>".LINE_FEED_CODE;
								echo "		<th style=\"text-align:left;border:none;\">閲覧</th>".LINE_FEED_CODE;
								echo "	</tr>"   .LINE_FEED_CODE;
								foreach ($data_list as $key => $values) {
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
											$confirm_date_time_trim =  date(DATE_FORMAT, strtotime($confirm_date_time_trim));
											$ans =NULL;
										}
										echo "<tr>".LINE_FEED_CODE;
										
										if (isset($ans)){
											echo "	<td class=\"td-center mp-info-midoku\">".$post_date_time."</td>".LINE_FEED_CODE;
											echo "	<td class=\"mp-info-midoku\"><a href=\"#\" onclick=\"linkClick('".EVENT_ID_040090010."','".$id."','".$confirm_date_time."')\">".$subject."</a></td>".LINE_FEED_CODE;
											echo "	<td class=\"td-center mp-info-midoku\">未読</td>".LINE_FEED_CODE;
										}else{
											echo "	<td class=\"td-center\">".$post_date_time."</td>".LINE_FEED_CODE;
											echo "	<td><a href=\"#\" onclick=\"linkClick('".EVENT_ID_040090010."','".$id."','".$confirm_date_time."')\">".$subject."</a></td>".LINE_FEED_CODE;
											echo "	<td class=\"td-center\">既読</td>".LINE_FEED_CODE;
										}
									
									}
									echo "</tr>".LINE_FEED_CODE;
								}
								echo "</tbody>".LINE_FEED_CODE;
								echo "</table>".LINE_FEED_CODE;
								echo "</div>".LINE_FEED_CODE;
							}
							?>

							<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
							<input type="hidden" id="<?php echo HIDDEN_ID_000000160 ?>" name="<?php echo HIDDEN_ID_000000160 ?>" value="">
							<input type="hidden" id="<?php echo HIDDEN_ID_000000190 ?>" name="<?php echo HIDDEN_ID_000000190 ?>" value="">

						</div>
					</div>
				</form>

<div class="row">
	<div class="col-lg-6 col-lg-offset-3 text-center" style="margin-top:2em;">
<?php
echo $err1;
?>

	</div>
</div>


			</div>
		</div>
	</div>
</div>
