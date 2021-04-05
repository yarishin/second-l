<?php $this->Html->script( 'jquery-1.8.2.min.js' , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.common.js'    , array( 'inline' => false ) ); ?>

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
	echo "		document.getElementById(\"".OBJECT_ID_030010030.$count."\").innerHTML = \"確認済\";".LINE_FEED_CODE;
	echo "		document.getElementById(\"".OBJECT_ID_030010030.$count."\").style.backgroundColor  = \"#97C8F4\";".LINE_FEED_CODE;
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

<div id="header_under">
	<div id="breadcrumb-area"><a href='<?php echo URL_SITE_TOP ?>'>HOME</a> > <a href='<?php echo URL_REGISTRATION_PAGE ?>'>新規会員登録</a> > 重要事項の確認・同意</div>
</div>

<div id="content">
	<div id="page-title">重要事項の確認・同意</div>
	<div id="registration-flow-img"><img src="../img/progress2.jpg" alt="投資家登録の流れ図"></div>

	<div id="main_text1">

		<div id="v010-doui">
			<p>
				お客様情報の登録を行います。投資家登録を行う前に、以下の書面をよくお読みください。<br>
				内容に同意いただけるようでしたら「同意する」ボタンをクリックして次にお進みください。
			</p>
			
			<form id="form" name="form" method="post" action="<?php echo $action ?>">

				<!--<div id="horizontal">-->
<?php
$count = 0;
while ($count < $doc_count) {
	$count++;
?>
					<div class="v010doui-pdf-area">
						<div class="v010doui-pdf">
							<a class="pdf" href="<?php echo $data[OBJECT_ID_030010010.$count] ?>" target="blank" onclick="linkClick('<?php echo HIDDEN_ID_000000060.$count ?>');"><img src="../img/icon-pdf.png"><?php echo $data[OBJECT_ID_030010020.$count] ?></a>
						</div>
						<div class="v010doui-kakunin" id="<?php echo OBJECT_ID_030010030.$count ?>" name="<?php echo OBJECT_ID_030010030.$count ?>">
							未確認
						</div>
					</div>
<?php
}
?>
				<!--</div>-->
				
				<div style="margin-top: 50px;text-align: center;">
					<input type="button" class="kari_form_bt2" id="<?php echo OBJECT_ID_BTN000010 ?>" value="同意する" onclick="buttonClick('<?php echo EVENT_ID_030010020 ?>');" tabindex="4" disabled>
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
	<small style="margin-top: 80px;display: block;">TrustLendingでは、企業の実在性の証明と個人情報の保護のため、<a href="https://www.geotrust.co.jp/" target="_blank">GeoTrust社</a>のSSLサーバ証明書を使用し、SSL暗号化通信を実現しています。</small>
</div>