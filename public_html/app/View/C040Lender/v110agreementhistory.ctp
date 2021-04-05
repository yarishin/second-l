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
				<h3>電子交付書面</h3>
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
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010020 ?>');"><i class="material-icons">timeline</i><br class="smart-br-on"><span>収益明細</span></a></li>
						<li class="mypagebt-on mp_m_on"><i class="material-icons">how_to_vote</i><br class="smart-br-on"><span>電子交付書面</span></li>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010030 ?>');"><i class="material-icons">account_circle</i><br class="smart-br-on"><span>会員情報</span></a></li>
						<li class="mypagebt-off"><a href="<?php echo URL_LOGOUT_PAGE ?>"><i class="material-icons">directions_run</i><br class="hidden-md hidden-lg"><span>ログアウト</span></a></li>
					</ul>
				</div>
			</div>
			<!--menu_end-->



			<div class="mp-right row col-md-10 col-sm-12" style="margin: 0;">
			
				<div class="row">
					<div class="col-lg-12" style="margin-top:2em;">
						<span style="font-size:1.5em;">同意書面</span>
					</div>
				</div>

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

			<!--	<div class="row">

					<div class="col-md-8 col-md-offset-4">
					<div class="mp-kensaku row">
						<div class="col-lg-2 col-lg-offset-3 col-md-2 col-md-offset-1 col-sm-2 col-sm-offset-3 col-xs-12 g-padding-y-10--xs g-padding-y-5--sm g-padding-y-5--md g-padding-y-5--lg g-padding-x-0--xs" style="font-weight: bold;text-align:center;">同意日</div>
						
						<div class="col-lg-2 col-md-3 col-sm-2 col-xs-5 g-padding-y-10--xs g-padding-y-0--sm g-padding-y-0--md g-padding-y-0--lg g-padding-x-0--xs">
									<input type="text" class="form-control" name="<?php echo SEARCH_ID_040110010 ?>" id="<?php echo SEARCH_ID_040110010 ?>" value="<?php echo $data[SEARCH_ID_040110010] ?>" placeholder="2019/01/01" tabindex="1">
						</div>
						<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 text-center g-padding-y-10--xs g-padding-y-5--sm g-padding-y-5--md g-padding-y-5--lg g-padding-x-0--xs" style="font-weight: bold;">
							&nbsp;&nbsp;～&nbsp;&nbsp;
						</div>
						<div class="col-lg-2 col-md-3 col-sm-2 col-xs-5 g-padding-y-10--xs g-padding-y-0--sm g-padding-y-0--md g-padding-y-0--lg g-padding-x-0--xs">
									<input type="text" class="form-control" name="<?php echo SEARCH_ID_040110020 ?>" id="<?php echo SEARCH_ID_040110020 ?>" value="<?php echo $data[SEARCH_ID_040110020] ?>" placeholder="2019/12/31" tabindex="2">
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 g-padding-y-10--xs g-padding-y-0--sm g-padding-y-0--md g-padding-y-0--lg" style="text-align: center;">
									<input type="submit" class="btn btn-default g-box-shadow__dark-lightest-v4 col-xs-12" id="<?php echo OBJECT_ID_BTN000040 ?>" name="<?php echo OBJECT_ID_BTN000040 ?>" value="検索" onclick="buttonClick('<?php echo EVENT_ID_040110010 ?>');" tabindex="3">
						</div>
					</div>
					</div>
				</div>-->


					<div class="row col-md-12 col-sm-12" style="margin-top:0.5em;padding-right:0;">
						<div class="mp-info-table">
			
							<?php
							if (isset($data_list) && is_array($data_list)) {
								echo "<div class=\"table-responsive\">".LINE_FEED_CODE;
								echo "<table class=\"table table-striped\">".LINE_FEED_CODE;
								echo "<tbody>".LINE_FEED_CODE;
								echo "<tr>".LINE_FEED_CODE;
								echo "	<th style=\"text-align:left;border:none;\">種類</th>"   .LINE_FEED_CODE;
								echo "	<th style=\"text-align:left;border:none;\">対象ファンド</th>" .LINE_FEED_CODE;
								echo "	<th style=\"text-align:left;border:none;\">同意日</th>"     .LINE_FEED_CODE;
								echo "	</tr>"   .LINE_FEED_CODE;


								foreach ($data_list as $key => $value) {
									$agreed_datetime  =  !empty($value[COLUMN_0900090]) ? date(DATE_FORMAT, strtotime($value[COLUMN_0900090])) : "&nbsp;";
									$agreement_detail =  !empty($value[COLUMN_0900100]) ? $list[CONFIG_0043][$value[COLUMN_0900100]] : "&nbsp;";
									$fund_name        =  !empty($value[COLUMN_0900040]) ? $value[COLUMN_0900040] : "&nbsp;";
									$doc_id           =  !empty($value[COLUMN_0900050]) ? $value[COLUMN_0900050] : "&nbsp;";
									$doc_name         =  !empty($value[COLUMN_0900060]) ? $value[COLUMN_0900060] : "&nbsp;";

									$doc_path = "";
								//	if (isset($value[OBJECT_ID_040110010])) {
								//		$doc_path = $value[OBJECT_ID_040110010];
								//	}
									if (strcmp(AGREEMENT_DETAIL_CODE_01, $value[COLUMN_0900100]) != 0) {
										$doc_path = $value[OBJECT_ID_040110010];
									}

									echo "<tr>".LINE_FEED_CODE;

									if (strcmp("", $doc_path) == 0) {
										echo "	<td>".$doc_name."</td>".LINE_FEED_CODE;
									}
									else {
										echo "	<td><a href=\"".$doc_path."\" target=\"blank\">".$doc_name."</a></td>".LINE_FEED_CODE;
									}
                                                                        if ($doc_id == "00006") {     //年間取引報告書でファンド名が表示されてしまう対策
                                                                                echo " <td>"."-"."</td>".LINE_FEED_CODE;
                                                                        }
                                                                        else {
                                                                                echo "  <td>".$fund_name."</td>".LINE_FEED_CODE;
                                                                        }
									echo "	<td style=\"text-align: center;\">".$agreed_datetime ."</td>".LINE_FEED_CODE;



									echo "</tr>"                         .LINE_FEED_CODE;

								}
									echo "  </tbody>"                         .LINE_FEED_CODE;
									echo "  </table>"                         .LINE_FEED_CODE;
									echo "  </div>"                         .LINE_FEED_CODE;
							}
							?>
		
							<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">

						</div>
					</div>
					</div>

				</form>
		
			</div>
		</div>
	</div>
</div>
