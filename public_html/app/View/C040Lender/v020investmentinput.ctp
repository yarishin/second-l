<?php $this->Html->script( 'jquery-1.8.2.min.js' , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.common.js'    , array( 'inline' => false ) ); ?>
<?php $this->Html->css('mypage.css', array('inline' => false)); ?>
<?php $this->Html->scriptStart(array('inline' => false)); ?>
<?php
$count = 0;
$button_disabled = true;
while ($count < $doc_count) {
	$count++;
	if ((isset($data[HIDDEN_ID_000000060.$count]) && strcmp("", $data[HIDDEN_ID_000000060.$count]) != 0)) {
		$button_disabled = false;
	}
}
if (!$button_disabled){
	echo "function bodyOnload() {";
	$count = 0;
	while ($count < $doc_count) {
		$count++;
		if (1 == $count) {
			echo "	document.getElementById(\"".OBJECT_ID_BTN000010."\").disabled = false;";
		}
		echo "	document.getElementById(\"".OBJECT_ID_040020050.$count."\").innerHTML = \"<span class='glyphicon glyphicon-ok' aria-hidden='true' style='line-height:2em;'></span>\";";
		echo "	document.getElementById(\"".OBJECT_ID_040020050.$count."\").style.backgroundColor  = \"#13b1cd\";";
	}
	echo "}";
}
?>
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
	echo "		document.getElementById(\"".OBJECT_ID_040020050.$count."\").innerHTML = \"<span class='glyphicon glyphicon-ok' aria-hidden='true' style='line-height:2em;'></span>\";".LINE_FEED_CODE;
	echo "		document.getElementById(\"".OBJECT_ID_040020050.$count."\").style.backgroundColor  = \"#13b1cd\";".LINE_FEED_CODE;
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



    

<div class="g-bg-color--sky-light">
 	<div class="container g-padding-y-80--xs g-padding-y-125--sm">
	
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div id="page-title">
					出資申込
				</div>
			</div>
		</div>

		
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
				出資申込金額を入力し、確認事項をご確認ください。
			</div>
		</div>

	<div class="row">
		<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
<?php
if (isset($err) && is_array($err)) {
	foreach ($err as $key => $value) {
		echo '<p class="error" style="text-align:left;">'.$value.'</p>';
	}
}
?>

		</div>
	</div>
		
	<form id="form" name="form" method="post" action="<?php echo $action ?>">

		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
				<div class="row">
					<div class="col-lg-4 col-lg-offset-0 col-md-4 col-md-offset-1 col-sm-5 col-sm-offset-0 col-xs-5 col-xs-offset-0" style="padding:1em;">
						<b>ファンド名　　</b>
                			</div>               
	
					<div class="col-lg-8 col-md-6 col-sm-7 col-xs-7" style="padding:1em;">
						<?php echo $data[OBJECT_ID_040020010] ?>
					</div>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
				<div class="row">
					<div class="col-lg-4 col-lg-offset-0 col-md-4 col-md-offset-1 col-sm-5 col-sm-offset-0 col-xs-12 col-xs-offset-0" style="padding:1em;">
						<b>出資申込金額</b><br class="hidden-xs"><small>（<?php echo number_format($data[OBJECT_ID_040020025]) ?>円単位）</small>
					</div>
	
					<div class="col-lg-8 col-md-6 col-sm-7 col-xs-12" style="padding:1em;">
				<input type="text" name="<?php echo OBJECT_ID_040020020 ?>" id="<?php echo OBJECT_ID_040020020 ?>" value="<?php echo $data[OBJECT_ID_040020020] ?>" tabindex="1" size="5">
						<span>円</span><small>（半角）</small>
					</div>
				</div>
			</div>
		</div>

<?php
$count = 0;
while ($count < $doc_count) {
	$count++;
?>






<?php if (1 == $count) { ?>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 text-center" style="padding:1em;">
				<b>出資にあたっての確認事項</b>
			</div>
		</div>

<?php } ?>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0" style="margin-bottom:1em;">

							<span class="doui_icon" id="<?php echo OBJECT_ID_040020050.$count ?>" name="<?php echo OBJECT_ID_040020050.$count ?>"></span>
							<a class="pdf doui_title g-box-shadow__dark-lightest-v4" href="<?php echo $data[OBJECT_ID_040020030.$count] ?>" target="blank" rel="noopener noreferrer" onclick="linkClick('<?php echo HIDDEN_ID_000000060.$count ?>');"><?php echo $data[OBJECT_ID_040020040.$count] ?></a>

	</div>
		</div>
			
<?php
}
?>


		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
				契約成立時書面に関しては、出資確定後マイページへ交付いたします。
			</div>
		</div>







<?php if ($data[OBJECT_ID_040020099] <= date('Y-m-d H:i;s') ): ?>
		<div class="row">
			<div class="col-lg-2 col-lg-offset-5 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-12 col-xs-offset-0">
				<div style="margin-top: 30px;">
					<input type="button" style="font-size:1.2em;" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" id="<?php echo OBJECT_ID_BTN000010 ?>" name="<?php echo OBJECT_ID_BTN000010 ?>" class="kari_form_bt2" value="確認して次へ" onclick="buttonClick('<?php echo EVENT_ID_040020020 ?>');" tabindex="4" disabled>
				</div>
			</div>
		</div>
<?php endif ?>
			<input type="text" name="dummy" style="display:none;">
			<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
			<input type="hidden" id="<?php echo HIDDEN_ID_000000030 ?>" name="<?php echo HIDDEN_ID_000000030 ?>" value="">
<?php
$count = 0;
while ($count < $doc_count) {
	$count++;
?>
			<input type="hidden" id="<?php echo HIDDEN_ID_000000060.$count ?>" name="<?php echo HIDDEN_ID_000000060.$count ?>" value="<?php echo $data[HIDDEN_ID_000000060.$count] ?>">
<?php
}
?>
	</form>

		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 text-center">
				<span style="color:#f00;">※出資申込後のキャンセルは出来ません。ご注意ください。</spam>
			</div>
		</div>

	</div>
</div> 	
