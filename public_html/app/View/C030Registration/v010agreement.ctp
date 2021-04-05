<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300&amp;display=swap&amp;subset=japanese" rel="stylesheet">
<?php $this->Html->script( 'jquery-1.8.2.min.js' , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.common.js'    , array( 'inline' => false ) ); ?>
<?php $this->Html->css('mypage.css', array('inline' => false)); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
function linkClick(name) {
	document.getElementById(name).value = "1";
<?php
$count = 0;
while ($count < $doc_count) {
	$count++;
	echo "	if (\"".HIDDEN_ID_000000060.$count."\" == name) {".LINE_FEED_CODE;
	echo "		document.getElementById(\"".OBJECT_ID_030010030.$count."\").innerHTML = \"<span class='glyphicon glyphicon-ok' aria-hidden='true' style='line-height:2em;'></span>\";".LINE_FEED_CODE;
	echo "		document.getElementById(\"".OBJECT_ID_030010030.$count."\").style.backgroundColor  = \"#13b1cd\";".LINE_FEED_CODE;

	echo "	}".LINE_FEED_CODE;
}
$count = 0;
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
?>
}
$(document).ready(function() {
	$('#<?php echo OBJECT_ID_BTN000010 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
});
<?php $this->Html->scriptEnd(); ?>





<!--test-->


<div class="g-bg-color--sky-light">
	<div class="container g-padding-y-80--xs g-padding-y-125--sm">

<div class="row" style="border-bottom:1px solid #ccc;">
			<div class="col-xs-12 visible-xs" style="margin-bottom:1.5em;">
				<p style="color:#333333;text-align:center;margin-top:1em;font-size:1.5em;">出資者情報登録</p>
				<img class="img-responsive center-block animated pulse" style="line-height: 0;width:50%;" src="../img/shinki2_1.png" alt="出資者情報登録の流れ図">
				
			</div>

			<div class="col-lg-2 col-lg-offset-2 col-md-3 col-md-offset-0 col-sm-3 col-sm-offset-0 hidden-xs" style="margin-bottom:1em;">
				<div class="row">
					<div class="col-lg-10 col-md-10 col-sm-10">
						<p class="g-font-size-16--sm g-font-size-14--lg" style="color:#6d6d6d;text-align:center;margin:0;">会員登録</p>
						<img class="img-responsive center-block" style="line-height: 0;" src="../img/shinki1_2.png" alt="出資者情報登録の流れ図">
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2" style="padding-top:2.5em;padding-left:0;">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="font-size:30px;color:#6d6d6d;"></span>
					</div>
				</div>
			</div>

			<div class="col-lg-2 col-md-3 col-sm-3 hidden-xs">
				<div class="row">
					<div class="col-md-10 col-sm-10 g-font-size-10--md">
						<p class="g-font-size-16--sm g-font-size-14--lg" style="color:#333333;text-align:center;margin:0;"><b>出資者情報登録</b></p>
						<img class="img-responsive center-block animated pulse" style="line-height: 0;" src="../img/shinki2_1.png" alt="出資者情報登録の流れ図">

					</div>
					<div class="col-md-2 col-sm-2" style="padding-top:2.5em;padding-left:0;">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="font-size:30px;color:#333333;"></span>
					</div>
				</div>
			</div>

			<div class="col-lg-2 col-md-3 col-sm-3 hidden-xs">
				<div class="row">
					<div class="col-md-10 col-sm-10 g-font-size-10--md">
						<p class="g-font-size-16--sm g-font-size-14--lg" style="color:#6d6d6d;text-align:center;margin:0;font-size:1.5em;">必要書類提出</p>
						<img class="img-responsive center-block" style="line-height: 0;" src="../img/shinki3_2.png" alt="出資者情報登録の流れ図">
 
					</div>
					<div class="col-md-2 col-sm-2" style="padding-top:2.5em;padding-left:0;">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="font-size:30px;color:#6d6d6d;"></span>
					</div>
				</div>
			</div>

			<div class="col-lg-2 col-md-3 col-sm-3 hidden-xs">
				<div class="row">
					<div class="col-lg-10 col-md-10 col-sm-10">
						<p class="g-font-size-14--lg g-font-size-14--sm" style="color:#6d6d6d;text-align:center;margin:0;">本人確認キー入力</p>
						<img class="img-responsive center-block" style="line-height: 0;" src="../img/shinki4_2.png" alt="出資者情報登録の流れ図">

					</div>
				</div>
			</div>
                                 
		</div>


		<div class="row">
			<div class="col-md-12 text-center">
				<div id="page-title" style="margin:0.5em auto;">出資者情報登録</div>
			</div> 
		</div>



		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12" style="margin-top:1em;">
				<p class="text-center g-font-size-16--xs g-font-size-16--sm g-font-size-16--lg">
					ご登録いただくにあたっての確認事項
				</p>
			</div>
		</div>
			
	<form id="form" name="form" method="post" action="<?php echo $action ?>">

	
<?php
$count = 0;
while ($count < $doc_count) {
	$count++;
?>
		<!--
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0"  style="position:relative;">

				<div class="row" style="margin-bottom:1em;">

					<div class="col-lg-8 col-lg-offset-2 col-xs-12">
						<span class="doui_icon" id="<?php echo OBJECT_ID_030010030.$count ?>" name="<?php echo OBJECT_ID_030010030.$count ?>"></span>

						<a class="pdf doui_title g-box-shadow__dark-lightest-v4" href="<?php echo $data[OBJECT_ID_030010010.$count] ?>" target="blank" rel="noopener noreferrer" onclick="linkClick('<?php echo HIDDEN_ID_000000060.$count ?>');">
							<span style="color:#4a4a4a;width:50%;"><?php echo $data[OBJECT_ID_030010020.$count] ?></span>
						</a>
					</div>

				</div>

			</div>
		</div>
		-->
				
		
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0"  style="position:relative;">

				<div class="row" style="margin-bottom:1em;">

					<div class="col-lg-8 col-lg-offset-2 col-xs-12">
						<span class="doui_icon" id="<?php echo OBJECT_ID_030010030.$count ?>" name="<?php echo OBJECT_ID_030010030.$count ?>"></span>

						<a class="col-xs-12 pdf doui_title g-box-shadow__dark-lightest-v4" href="<?php echo $data[OBJECT_ID_030010010.$count] ?>" target="blank" rel="noopener noreferrer" onclick="linkClick('<?php echo HIDDEN_ID_000000060.$count ?>');">
							<span class="col-sm-12 col-xs-11"><?php echo $data[OBJECT_ID_030010020.$count] ?></span>
						</a>
					</div>

				</div>

			</div>
		</div>
		
				
<?php
}
?>
			
		<div class="row">
			<div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-12">
				<div style="margin-top: 50px;text-align: center;">
					<input type="button" style="font-size:1.2em;" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" id="<?php echo OBJECT_ID_BTN000010 ?>" value="同意する" onclick="buttonClick('<?php echo EVENT_ID_030010020 ?>');" tabindex="4" disabled>
				</div>
			</div>
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


		<div class="row" style="margin-top:4em;">
			<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
				<span style="font-size:0.9em;">個人情報の提供・委託・開示などの請求に関する取扱いについては<a href="<?php echo URL_PRIVACY_PAGE ?>" target="_blank">「個人情報保護方針」</a>をご覧ください。</span>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-xs-12">
				<small style="margin-top: 80px;display: block;">当社では、企業の実在性の証明と個人情報の保護のため、<a href="https://www.geotrust.co.jp/" target="_blank">GeoTrust社</a>のSSLサーバ証明書を使用し、SSL暗号化通信を実現しています。</small>
			</div>
		</div>


	</div>
</div>