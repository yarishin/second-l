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
function linkClick(name) {
	document.getElementById(name).value = "1";
<?php
/*$count = 0;
while ($count < $doc_count) {
	$count++;
	echo "	if (\"".HIDDEN_ID_000000060.$count."\" == name) {".LINE_FEED_CODE;
	echo "		document.getElementById(\"".OBJECT_ID_040100110.$count."\").innerHTML = \"確認済\";".LINE_FEED_CODE;
	echo "		document.getElementById(\"".OBJECT_ID_040100110.$count."\").style.backgroundColor  = \"#97C8F4\";".LINE_FEED_CODE;
	echo "	}".LINE_FEED_CODE;
}*/
$count = 0;
$disabled = "";
if (0 < $doc_count) {
	$disabled = DISABLED;
	echo "	if (";
	while ($count < $doc_count) {
		$count++;
		if (1 < $count) {
			echo "			&& ";
		}
		echo "\"1\" == document.getElementById(\"".HIDDEN_ID_000000060.$count."\").value".LINE_FEED_CODE;
	}
	echo "			) {".LINE_FEED_CODE;
	echo "		document.getElementById(\"".OBJECT_ID_BTN000010."\").disabled = false;".LINE_FEED_CODE;
	echo "	}".LINE_FEED_CODE;
}
?>
}
$(document).ready(function() {
	$('#<?php echo OBJECT_ID_BTN000010 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
});
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
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_010010030 ?>');"><i class="material-icons">home</i><br class="smart-br-on"><span>マイページTop</span></a></li>
						<li class="mypagebt-on"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010040 ?>');"><i class="material-icons">announcement</i><br class="smart-br-on"><span>お知らせ</span></a></li>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010010 ?>');"><i class="material-icons">toc</i><br class="smart-br-on"><span>出資履歴</span></a></li>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010020 ?>');"><i class="material-icons">timeline</i><br class="smart-br-on"><span>収益明細</span></a></li>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010060 ?>');"><i class="material-icons">how_to_vote</i><br class="smart-br-on"><span>電子交付書面</span></a></li>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010030 ?>');"><i class="material-icons">account_circle</i><br class="smart-br-on"><span>会員情報</span></a></li>
						<li class="mypagebt-off"><a href="<?php echo URL_LOGOUT_PAGE ?>"><i class="material-icons">directions_run</i><br class="hidden-md hidden-lg"><span>ログアウト</span></a></li>
					</ul>
				</div>
			</div>
			<!--menu_end-->

	
			<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 mypagemain" style="padding:0 2em;">
				<div style="padding: 0;margin: 0;">

					<form id="form" style="margin-top:0;" name="form" method="post" action="<?php echo $action ?>">
						<dl class="g-padding-r-10-sm g-padding-l-10-sm">
							<div class="row">
								<div class="col-lg-4 col-lg-offset-8 col-xs-8 col-xs-offset-4 text-right" style="padding:0.3em 0;">
									交付日&ensp;&ensp;&ensp;<?php echo $data[OBJECT_ID_040100020] ?>
								</div>
							</div>

							<!-- title -->

								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 info_d">
										<?php echo $data[OBJECT_ID_040100010] ?>
									</div>
								</div>
						

							<!-- doc -->
						

								<div class="row">
									<div class="col-lg-12 info_d_f">
										<div class="row">
											<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12" style="padding:1.5em 2em 1em 2em;">
												<?php
												if (0 < $doc_count) {
													$count = 0;
													while ($count < $doc_count) {
														$count++;
												?>
									
														<a class="pdf" href="<?php echo $data_list[OBJECT_ID_040100090.$count] ?>" target="blank" onclick="linkClick('<?php echo HIDDEN_ID_000000060.$count ?>');"><img src="../img/icon-pdf.png">&ensp;<?php echo $data_list[OBJECT_ID_040100100.$count] ?></a><br>
						
													<?php
														}
													?>
											</div>
											<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12 pull-right" style="text-align: center;padding:1em 1em;">
													<?php
													}
													if ((strcmp(AGREEMENT_FLAG_TRUE, $data[OBJECT_ID_040100050]) == 0) && (strcmp("", $data[OBJECT_ID_040100080]) == 0)) {
													?>
							
													<input type="button" style="font-size:1em;font-weight:800;letter-spacing:0.15em;background-color:#5FD3D3;color:#fff;" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs s-btn--white-bg g-radius--50 g-padding-x-50--xs" id="<?php echo OBJECT_ID_BTN000010 ?>" name="<?php echo OBJECT_ID_BTN000010 ?>" value="同意する" onclick="buttonClick('<?php echo EVENT_ID_040100020 ?>');"<?php echo $disabled ?>>
							
												<?php
												}
												?>
											</div>
										</div>







									</div>
								</div>


							<!-- main -->

								<div class="row">
									<div class="col-lg-12 info_d_m">
										<?php echo $data[OBJECT_ID_040100030] ?>

										<!-- date -->
										<?php
										if ($investment_amount < 1){
										} else {
										?>
											<div class="row">
											<div class="col-lg-12 col-xs-12" style="padding:0;margin:1.5em 0 0 6em;"><b>【出資確定内容】</b></div>
											<div class="col-lg-12 col-xs-12" style="padding:0;margin:0 0 0 3em;">出資確定金額　　　 ：&ensp;<?php echo $investment_amount ?>円</div>
											<div class="col-lg-12 col-xs-12" style="padding:0;margin:0 0 0 3em;">確定日　　　　　　 ：&ensp;<?php echo $approval_datetime ?></div>
											<div class="col-lg-12 col-xs-12" style="padding:0;margin:0 0 0 3em;">書面確認・入金期日 ：&ensp;<?php echo $expiration_datetime ?></div>
											</div>
										
										<?php
										}
										?>

									</div>
								</div>

								
						
						<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4" style="text-align: center;margin-top:1em;">
							<input type="button" style="font-size:1em;" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" value="お知らせページに戻る" onclick="buttonClick('<?php echo EVENT_ID_040010040 ?>');">
						</div>
							
							
						<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
							
						<?php
						$count = 0;
						while ($count < $doc_count) {
							$count++;
						?>
							
						<input type="hidden" id="<?php echo HIDDEN_ID_000000060.$count ?>" name="<?php echo HIDDEN_ID_000000060.$count ?>" value="">

						<?php
						}
						?>
					</form>
					
				</div>
			</div>


		</div>
	</div>
</div>