<?php $this->Html->css('https://fonts.googleapis.com/icon?family=Material+Icons', array('inline' => false)); ?>
<?php $this->Html->css('mypage.css', array('inline' => false)); ?>
<?php $this->Html->css('validationEngine.jquery.css', array('inline' => false)); ?>
<?php $this->Html->script( 'jquery.min.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.validationEngine.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'languages/jquery.validationEngine-ja.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.common.js'    , array( 'inline' => false ) ); ?>

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
				<h3>収益明細</h3>
			</div>
		</div>
		<div class="row" style="margin-top:1em;">

			<!--menu-->
			<div class="col-md-2 col-xs12 mypagemenu">
				<div class="scroll-nav">
					<ul>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="location.href='<?php echo URL_LENDER_PAGE ?>'"><i class="material-icons">home</i><br class="smart-br-on"><span>マイページTop</span></a></li>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010040 ?>');"><i class="material-icons">announcement</i><br class="smart-br-on"><span>お知らせ</span></a></li>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010010 ?>');"><i class="material-icons">toc</i><br class="smart-br-on"><span>出資履歴</span></a></li>
						<li class="mypagebt-on mp_m_on"><i class="material-icons">timeline</i><br class="smart-br-on"><span>収益明細</span></li>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010060 ?>');"><i class="material-icons">how_to_vote</i><br class="smart-br-on"><span>電子交付書面</span></a></li>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010030 ?>');"><i class="material-icons">account_circle</i><br class="smart-br-on"><span>会員情報</span></a></li>
						<li class="mypagebt-off"><a href="<?php echo URL_LOGOUT_PAGE ?>"><i class="material-icons">directions_run</i><br class="hidden-md hidden-lg"><span>ログアウト</span></a></li>
					</ul>
				</div>
			</div>
			<!--menu_end-->

			<!--main-->
			<div class="mp-right row col-md-10 col-sm-12" style="padding:0 2em 2em 2em;margin: 0;">

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

	<form id="form" style="margin-top:0;" name="form" method="post" action="<?php echo $action ?>">
				<div class="row">


					<div class="col-md-8 col-md-offset-4">
					<div class="mp-kensaku row">
						<!--<div class="col-lg-2 col-lg-offset-3 col-md-2 col-md-offset-1 col-sm-2 col-sm-offset-3 col-xs-12 g-padding-y-10--xs g-padding-y-5--sm g-padding-y-5--md g-padding-y-5--lg g-padding-x-0--xs" style="font-weight: bold;text-align:center;">日付</div>
						
						<div class="col-lg-2 col-md-3 col-sm-2 col-xs-5 g-padding-y-10--xs g-padding-y-0--sm g-padding-y-0--md g-padding-y-0--lg g-padding-x-0--xs">
							<input type="text" class="form-control" name="<?php echo SEARCH_ID_040060010 ?>" id="<?php echo SEARCH_ID_040060010 ?>" value="<?php echo $data[SEARCH_ID_040060010] ?>" placeholder="2019/01/01" tabindex="1">
						</div>
						<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 text-center g-padding-y-10--xs g-padding-y-5--sm g-padding-y-5--md g-padding-y-5--lg g-padding-x-0--xs" style="font-weight: bold;">
							&nbsp;&nbsp;～&nbsp;&nbsp;
						</div>
						<div class="col-lg-2 col-md-3 col-sm-2 col-xs-5 g-padding-y-10--xs g-padding-y-0--sm g-padding-y-0--md g-padding-y-0--lg g-padding-x-0--xs">
							<input type="text" class="form-control" name="<?php echo SEARCH_ID_040060020 ?>" id="<?php echo SEARCH_ID_040060020 ?>" value="<?php echo $data[SEARCH_ID_040060020] ?>" placeholder="2019/12/31" tabindex="2">
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 g-padding-y-10--xs g-padding-y-0--sm g-padding-y-0--md g-padding-y-0--lg" style="text-align: center;">
							<input type="submit" class="btn btn-default col-xs-12" id="<?php echo OBJECT_ID_BTN000040 ?>" name="<?php echo OBJECT_ID_BTN000040 ?>" value="検索" onclick="buttonClick('<?php echo EVENT_ID_040060010 ?>');" tabindex="3">
						</div> -->
					</div>
					</div>






					<div class="row col-md-12 col-sm-12" style="margin-top:0.5em;padding-right:0;">
						<div class="mp-info-table">
			<?php
                     
			if (isset($data_list) && is_array($data_list)&& count($data_list) > 0) {
				echo "<div class=\"table-responsive\">".LINE_FEED_CODE;
				echo "<table class=\"table table-striped\">".LINE_FEED_CODE;
				echo "<tbody>".LINE_FEED_CODE;
				echo "	<tr>".LINE_FEED_CODE;
				echo "	<th style=\"text-align:left;border:none;\">該当ファンド</th>"  .LINE_FEED_CODE;
				echo "	<th style=\"text-align:center;border:none;\">日付</th>".LINE_FEED_CODE;
				echo "	<th class=\"g-font-size-15--sm g-font-size-16--lg\" style=\"text-align:center;border:none;\">入金（円）<br><span style=\"font-size:0.6em;letter-spacing:0.2em;\">＜金額内訳＞</span></th>"    .LINE_FEED_CODE;
				echo "	<th class=\"g-font-size-15--sm g-font-size-16--lg\" style=\"text-align:center;border:none;\">出金（円）<br><span style=\"font-size:0.6em;letter-spacing:0.2em;\">＜金額内訳＞</span></th>"    .LINE_FEED_CODE;
				echo "	<th class=\"g-font-size-15--sm g-font-size-16--lg\" style=\"text-align:center;border:none;\">取引区分<br class=\"visible-sm\">（内容）</th>"      .LINE_FEED_CODE;
				echo "</tr>"                                  .LINE_FEED_CODE;
                                
                                     
                                     
                                
                              
				foreach ($data_list as $key => $values) {
					foreach ($values as $value) {
						$report_status     =  !empty($value['report_status']) ? $value['report_status'] : "&nbsp;";
						$fund_name         =  !empty($value[COLUMN_1000050]) ? $value[COLUMN_1000050] : "&nbsp;";
						$dividend_detail   =  !empty($value[COLUMN_1000080]) ? $list[CONFIG_0042][$value[COLUMN_1000080]] : "&nbsp;";
						$dividend_amount   =  !empty($value[COLUMN_1000090]) ? number_format($value[COLUMN_1000090]) : "&nbsp;";
						$tax               =  !empty($value[COLUMN_1000100]) ? number_format($value[COLUMN_1000100]) : "&nbsp;";
                                                $remittance_date   =  !empty($value['remittance_date']) ? date(DATE_FORMAT, strtotime($value['remittance_date'])) : "&nbsp;";
						echo "<tr>"                          .LINE_FEED_CODE;
						if($report_status == 1 && date("Y/m/d H:i:s") > date(DATETIME_FORMAT, strtotime($value['remittance_date']))) {
                                                 echo "	<td>".$fund_name."</td>".LINE_FEED_CODE;
                                                }
                                                if($report_status == 1 && date("Y/m/d H:i:s") > date(DATETIME_FORMAT, strtotime($value['remittance_date']))) {
                                                 echo "	<td class=\"td-center\">".$remittance_date."</td>".LINE_FEED_CODE;
                                                }
                                                if($report_status == 1 && date("Y/m/d H:i:s") > date(DATETIME_FORMAT, strtotime($value['remittance_date']))) {
                                                 echo "	<td style=\"text-align:center;\">".$dividend_amount  ."</td>".LINE_FEED_CODE;
                                                }
                                                if($report_status == 1 && date("Y/m/d H:i:s") > date(DATETIME_FORMAT, strtotime($value['remittance_date']))) {
                                                 echo "	<td style=\"text-align:center;\">".LINE_FEED_CODE;
                                                }
                                                if($report_status == 1 && date("Y/m/d H:i:s") > date(DATETIME_FORMAT, strtotime($value['remittance_date']))) {
                                                	if ($tax > 0){
						 echo "		△ $tax             ".LINE_FEED_CODE;
							} else {
                                                          }
						 echo "</td>".LINE_FEED_CODE;
						 echo "	<td class=\"td-right\">".$dividend_detail  ."</td>".LINE_FEED_CODE;
                                                }
                                        }
                                }
                                                echo "</tr>"                                             .LINE_FEED_CODE;
								echo "</tbody>".LINE_FEED_CODE;
								echo "</table>".LINE_FEED_CODE;
								echo "</div>".LINE_FEED_CODE;
                        }else{
                         }
			?>
						</div>
<div class="row">
	<div class="col-lg-6 col-lg-offset-3 text-center" style="margin-top:2em;">
<?php
echo $err1;
?>

	</div>
</div>
                                			<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
							<input type="hidden" id="<?php echo HIDDEN_ID_000000160 ?>" name="<?php echo HIDDEN_ID_000000160 ?>" value="">
							<input type="hidden" id="<?php echo HIDDEN_ID_000000190 ?>" name="<?php echo HIDDEN_ID_000000190 ?>" value="">

						</div>
					</div>
					</div>
					</div>
	</form>




			</div>
		</div>

	</div>
</div>


    

