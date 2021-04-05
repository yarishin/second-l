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
<?php $this->Html->scriptEnd(); ?>

<div class="g-bg-color--sky-light">
	<div class="container g-padding-y-80--xs g-padding-y-125--xsm">

		<div class="row mypagetitle-area">
			<div class="col-md-12">
				<h3>出資履歴</h3>
			</div>
		</div>

		<div class="row" style="margin-top:1em;">

			<!--menu-->
			<div class="col-md-2 col-xs12 mypagemenu">
				<div class="scroll-nav">
					<ul>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="location.href='<?php echo URL_LENDER_PAGE ?>'"><i class="material-icons">home</i><br class="smart-br-on"><span>マイページTop</span></a></li>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010040 ?>');"><i class="material-icons">announcement</i><br class="smart-br-on"><span>お知らせ</span></a></li>
						<li class="mypagebt-on mp_m_on"><i class="material-icons">toc</i><br class="smart-br-on"><span>出資履歴</span></li>
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
	<div class="col-lg-8 col-lg-offset-2 col-md-12 col-sm-12 col-xs-12">
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



				<form id="form" style="margin-top:0;" name="form" method="post" action="<?php echo $action ?>">


				<div class="row">
					<div class="col-lg-8 col-md-8 col-md-offset-4">
					<div class="mp-kensaku row">
						<div class="col-lg-3 col-lg-offset-2 col-md-3 col-md-offset-0 col-sm-2 col-sm-offset-3 col-xs-12 g-padding-y-10--xs g-padding-y-5--sm g-padding-y-5--md g-padding-y-5--lg g-padding-x-0--xs" style="font-weight: bold;text-align:center;">出資申込日</div>
						
						<div class="col-lg-2 col-md-3 col-sm-2 col-xs-5 g-padding-y-10--xs g-padding-y-0--sm g-padding-y-0--md g-padding-y-0--lg g-padding-x-0--xs">
							<input type="text" class="form-control" name="<?php echo SEARCH_ID_040050010 ?>" id="<?php echo SEARCH_ID_040050010 ?>" value="<?php echo $data[SEARCH_ID_040050010] ?>" placeholder="2019/01/01" tabindex="1">
						</div>
						<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 text-center g-padding-y-10--xs g-padding-y-5--sm g-padding-y-5--md g-padding-y-5--lg g-padding-x-0--xs" style="font-weight: bold;">
							&nbsp;&nbsp;～&nbsp;&nbsp;
						</div>
						<div class="col-lg-2 col-md-3 col-sm-2 col-xs-5 g-padding-y-10--xs g-padding-y-0--sm g-padding-y-0--md g-padding-y-0--lg g-padding-x-0--xs">
							<input type="text" class="form-control" name="<?php echo SEARCH_ID_040050020 ?>" id="<?php echo SEARCH_ID_040050020 ?>" value="<?php echo $data[SEARCH_ID_040050020] ?>" placeholder="2019/12/31" tabindex="2">
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 g-padding-y-10--xs g-padding-y-0--sm g-padding-y-0--md g-padding-y-0--lg" style="text-align: center;">
							<input type="submit" class="btn btn-default g-box-shadow__dark-lightest-v4 col-xs-12" id="<?php echo OBJECT_ID_BTN000040 ?>" name="<?php echo OBJECT_ID_BTN000040 ?>" value="検索" onclick="buttonClick('<?php echo EVENT_ID_040050010 ?>');" tabindex="3">
						</div>
					</div>
					</div>

</div>



					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:0.5em;">

		<?php
		$nameArray = array_map(function($r){return $r[b][delay_1];}, $data_list_list);

		foreach ($data_list as $delay => $mank) {
		$data_list[$delay]['TrnInvestmentHistory']['delay_1'] = $nameArray[$delay];
		}
		?>


		<?php
								if (isset($data_list) && is_array($data_list)) {
				//echo "<div class=\"table-responsive\">".LINE_FEED_CODE;
				//echo "<table class=\"table table-bordered table-striped g-font-size-14--sm g-font-size-14--xs\">".LINE_FEED_CODE;
				//echo "<tbody>".LINE_FEED_CODE;
				//echo "<tr>".LINE_FEED_CODE;
			//	echo "	<th>プロジェクト名</th>"  .LINE_FEED_CODE;
				//echo "	<th>出資申込日</th>".LINE_FEED_CODE;
				//echo "	<th>申込金額</th>"    .LINE_FEED_CODE;
				//echo "	<th>入金期限</th>"    .LINE_FEED_CODE;
				//echo "	<th>承認日</th>"      .LINE_FEED_CODE;
				//echo "	<th>取消日</th>"      .LINE_FEED_CODE;
			//	echo "	<th>入金日</th>"      .LINE_FEED_CODE;

				//echo "	<div id=\"label700\">delay</div>"      .LINE_FEED_CODE;
				//echo "</tr>" .LINE_FEED_CODE;
				foreach ($data_list as $key => $values) {
					foreach ($values as $value) {
						$fund_id              =  !empty($value[COLUMN_1200040]) ? $value[COLUMN_1200040] : "&nbsp;";
						$fund_name            =  !empty($value[COLUMN_1200050]) ? $value[COLUMN_1200050] : "&nbsp;";
						$fund_link            =  URL_PROJECTS_PAGE.$fund_id;
						$application_datetime =  !empty($value[COLUMN_1200060]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1200060])) : "&nbsp;";
						$investment_amount    =  !empty($value[COLUMN_1200070]) ? number_format($value[COLUMN_1200070]) : "&nbsp;";
						$expiration_datetime  =  !empty($value[COLUMN_1200080]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1200080])) : "&nbsp;";
						$approval_datetime    =  !empty($value[COLUMN_1200100]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1200100])) : "&nbsp;";
						$cancel_datetime      =  !empty($value[COLUMN_1200130]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1200130])) : "&nbsp;";
						$deposit_date         =  !empty($value[COLUMN_1200190]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1200190])) : "&nbsp;";
						$cooling_off_period   =  !empty($value[COLUMN_1200210]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1200210])) : "&nbsp;";
						$delay_1              =  !empty($value[COLUMN_1200200]) ? $value[COLUMN_1200200] : "&nbsp;";

						if($delay_1 == 1){
							$delay_1 = "<b style='color:red'>&nbsp;&nbsp;返済遅延</b>";
						}else{

						}
			echo "<div class=\"row\">".LINE_FEED_CODE;
			echo "<div class=\"col-lg-12 col-md-12 col-xs-12\" style=\"margin-top:1em;border-radius:10px;padding:0.5em;box-shadow:2px 2px 5px #cccccc;background-color:#fff;\">".LINE_FEED_CODE;



			echo "<div class=\"row-height\">".LINE_FEED_CODE;
			echo "<div class=\"col-lg-9 col-md-8 col-sm-12 col-xs-12 g-font-size-24--lg g-font-size-30--md g-font-size-30--sm g-font-size-20--xs g-text-left--lg g-text-left--md g-text-center--xs g-text-center--sm\" style=\"padding:0.5em;\"><a href=\"".$fund_link."\" target=\"_blank\">".$fund_name."</a>".$delay_1."</div>".LINE_FEED_CODE;
											
			echo "<div class=\"col-lg-3 col-md-4 col-sm-12 col-xs-12 \">".LINE_FEED_CODE;
			echo "<div class=\"g-text-right--lg g-text-right--md g-text-center--xs g-text-center--sm g-margin-t-20--lg g-margin-t-0--md g-margin-t-5--sm g-margin-t-5--xs\">".LINE_FEED_CODE;
			echo "<b>出資申込日</b>:$application_datetime".LINE_FEED_CODE;
			echo "</div>"			.LINE_FEED_CODE;
			echo "</div>"			.LINE_FEED_CODE;
			echo "</div>"			.LINE_FEED_CODE;
			echo "<div class=\"row-height\">".LINE_FEED_CODE;
			echo "<div class=\"col-lg-8 col-md-12 col-sm-12 col-xs-12 g-padding-x-0--xs\" style=\"margin:1em 0 0 0;\">".LINE_FEED_CODE;
			echo "<div class=\"row-height\">".LINE_FEED_CODE;
			echo "<div class=\"col-lg-3 col-md-3 col-sm-3 col-xs-6 g-padding-x-0--xs g-font-size-14--lg\">".LINE_FEED_CODE;
			echo "<div class=\"g-margin-r-10--lg g-margin-r-5--md g-margin-r-5--sm g-margin-r-5--xs g-margin-t-5--xs g-margin-t-5--sm g-margin-t-0--md g-margin-t-0--lg text-center\">".LINE_FEED_CODE;
			echo "<div class=\"col-sm-12 invest_t \">".LINE_FEED_CODE;
			echo "出資確定日".LINE_FEED_CODE;
			echo "</div>"			.LINE_FEED_CODE;
			echo "<div class=\"col-sm-12\" style=\"padding:0.5em;\">".LINE_FEED_CODE;
			echo "$approval_datetime    ".LINE_FEED_CODE;
			echo "</div>"			.LINE_FEED_CODE;
			echo "</div>"			.LINE_FEED_CODE;
			echo "</div>"			.LINE_FEED_CODE;
			echo "	<div class=\"col-lg-3 col-md-3 col-sm-3 col-xs-6 g-padding-x-0--xs g-font-size-14--lg\">".LINE_FEED_CODE;
			echo "	<div class=\"g-margin-r-10--lg g-margin-r-5--md g-margin-r-5--sm g-margin-r-5--xs g-margin-t-5--xs g-margin-t-5--sm g-margin-t-0--md g-margin-t-0--lg text-center\">".LINE_FEED_CODE;
			echo "<div class=\"col-sm-12 invest_t\">".LINE_FEED_CODE;
			echo "申込金額".LINE_FEED_CODE;
			echo "</div>"			.LINE_FEED_CODE;
			echo "<div class=\"col-sm-12\" style=\"padding:0.5em;\">".LINE_FEED_CODE;
			echo "$investment_amount<span>円</span>".LINE_FEED_CODE;
			echo "</div>"			.LINE_FEED_CODE;
			echo "</div>"			.LINE_FEED_CODE;
			echo "</div>"			.LINE_FEED_CODE;
			echo "<div class=\"col-lg-3 col-md-3 col-sm-3 col-xs-6 g-padding-x-0--xs g-font-size-14--lg\">".LINE_FEED_CODE;
			echo "<div class=\"g-margin-r-10--lg g-margin-r-5--md g-margin-r-5--sm g-margin-r-5--xs g-margin-t-5--xs g-margin-t-5--sm g-margin-t-0--md g-margin-t-0--lg text-center\">".LINE_FEED_CODE;
			echo "<div class=\"col-sm-12 invest_t\">".LINE_FEED_CODE;
			echo "入金期日".LINE_FEED_CODE;
			echo "</div>"			.LINE_FEED_CODE;
			echo "<div class=\"col-sm-12\" style=\"padding:0.5em;\">".LINE_FEED_CODE;
			echo "$expiration_datetime  ".LINE_FEED_CODE;
			echo "</div>"			.LINE_FEED_CODE;
			echo "</div>"			.LINE_FEED_CODE;
			echo "</div>"			.LINE_FEED_CODE;

			echo "<div class=\"col-lg-3 col-md-3 col-sm-3 col-xs-6 g-padding-x-0--xs g-font-size-14--lg\">".LINE_FEED_CODE;
			echo "<div class=\"g-margin-r-10--lg g-margin-r-5--md g-margin-r-5--sm g-margin-r-5--xs g-margin-t-5--xs g-margin-t-5--sm g-margin-t-0--md g-margin-t-0--lg text-center\">".LINE_FEED_CODE;
			echo "<div class=\"col-sm-12 invest_t\">".LINE_FEED_CODE;
			echo "入金日".LINE_FEED_CODE;
			echo "</div>"			.LINE_FEED_CODE;
			echo "<div class=\"col-sm-12\" style=\"padding:0.5em;\">".LINE_FEED_CODE;
			echo "$deposit_date       ".LINE_FEED_CODE;
			echo "</div>"			.LINE_FEED_CODE;
			echo "</div>"			.LINE_FEED_CODE;
			echo "</div>"			.LINE_FEED_CODE;
			echo "</div>"			.LINE_FEED_CODE;
			echo "</div>"			.LINE_FEED_CODE;


			echo "<div class=\"col-lg-4 col-md-12 col-sm-12 col-xs-12\" style=\"margin:1em 0 0 0;\">".LINE_FEED_CODE;
			echo "<div class=\"row\">".LINE_FEED_CODE;
			echo "<div class=\"col-lg-7 col-md-6 col-sm-6 col-xs-7 g-padding-x-0--xs g-font-size-14--lg\">".LINE_FEED_CODE;
			echo "<div class=\"g-margin-r-10--lg g-margin-r-5--md g-margin-r-5--sm g-margin-r-5--xs g-margin-t-5--xs g-margin-t-0--sm g-margin-t-0--md g-margin-t-0--lg text-center\">".LINE_FEED_CODE;
			echo "<div class=\"col-sm-12 invest_t\">".LINE_FEED_CODE;
			echo "クーリングオフ期限".LINE_FEED_CODE;
			echo "</div>"			.LINE_FEED_CODE;
			echo "<div class=\"col-sm-12\" style=\"padding:0.5em;\">".LINE_FEED_CODE;
			echo "$cooling_off_period ".LINE_FEED_CODE;
			echo "</div>"			.LINE_FEED_CODE;
										echo "</div>"                         .LINE_FEED_CODE;
										echo "</div>"                         .LINE_FEED_CODE;

			echo "<div class=\"col-lg-5 col-md-6 col-sm-6 col-xs-5 g-padding-x-0--xs g-font-size-14--lg\">".LINE_FEED_CODE;
			echo "<div class=\"g-margin-r-10--lg g-margin-r-5--md g-margin-r-5--sm g-margin-r-5--xs g-margin-t-5--xs g-margin-t-0--sm g-margin-t-0--md text-center\">".LINE_FEED_CODE;														echo "<div class=\"col-sm-12 invest_t\">".LINE_FEED_CODE;
			echo "取消日".LINE_FEED_CODE;
			echo "</div>"			.LINE_FEED_CODE;
			echo "<div class=\"col-sm-12\" style=\"padding:0.5em;\">".LINE_FEED_CODE;
			echo "$cancel_datetime    ".LINE_FEED_CODE;
			echo "</div>"			.LINE_FEED_CODE;

			echo "</div>"			.LINE_FEED_CODE;



			echo "</div>"			.LINE_FEED_CODE;
			echo "</div>"			.LINE_FEED_CODE;
			echo "</div>"                         .LINE_FEED_CODE;
			echo "</div>"                       .LINE_FEED_CODE;
			echo "</div>"                       .LINE_FEED_CODE;
			echo "</div>"                        .LINE_FEED_CODE;


										}

									}
								}
							?>

							<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
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
	</div>
</div>
