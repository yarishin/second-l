<?php $this->Html->script( 'jquery-1.8.2.min.js' , array('inline' => false)); ?>
<?php $this->Html->script( 'jquery.common.js'    , array('inline' => false)); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}

$(document).ready(function() {
	$('#<?php echo OBJECT_ID_BTN000010 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
	$('#<?php echo OBJECT_ID_BTN000020 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
	jQuery("#form").validationEngine();
});
<?php $this->Html->scriptEnd(); ?>

<p>取引残高報告書交付(確認)</p>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000010 ?>" value="戻る"     onclick="buttonClick('<?php echo EVENT_ID_050390010 ?>');" tabindex="1">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000020 ?>" value="交付実行" onclick="buttonClick('<?php echo EVENT_ID_050390020 ?>');" tabindex="2">
	</div>
	
	<p class="error">交付を実行することで各出資家への報告書の交付と同時に通知メールが送信されます。</p>
	<p class="error">お知らせを入力した場合、PDF表示ボタンで必ず確認して下さい。</p>

	<div id="horizontal">
		<div id="label100">運用年月</div>
		<div><input class="label50_center" type="text" name="<?php echo OBJECT_ID_050380010 ?>" id="<?php echo OBJECT_ID_050380010 ?>" value="<?php echo $data[OBJECT_ID_050380010] ?>" readonly></div>
		<div style="float:left;">年</div>
		<div><input class="label25_center" type="text" name="<?php echo OBJECT_ID_050380020 ?>" id="<?php echo OBJECT_ID_050380020 ?>" value="<?php echo $data[OBJECT_ID_050380020] ?>" readonly></div>
		<div style="float:left;">月 ～ </div>
		<div><input class="label50_center" type="text" name="<?php echo OBJECT_ID_050380030 ?>" id="<?php echo OBJECT_ID_050380030 ?>" value="<?php echo $data[OBJECT_ID_050380030] ?>" readonly></div>
		<div style="float:left;">年</div>
		<div><input class="label25_center" type="text" name="<?php echo OBJECT_ID_050380040 ?>" id="<?php echo OBJECT_ID_050380040 ?>" value="<?php echo $data[OBJECT_ID_050380040] ?>" readonly></div>
		<div style="float:left;">月</div>
	</div>
	<div id="horizontal">
		<div id="label100">お知らせ</div>
		<div><textarea style="width:620px;height:70px;resize:none;" name="<?php echo OBJECT_ID_050380050 ?>" id="<?php echo OBJECT_ID_050380050 ?>" readonly><?php echo $data[OBJECT_ID_050380050] ?></textarea></div>
	</div>
	<div id="horizontal">
		<input class="button" type="button" value="PDF表示" onclick="window.open('<?php echo $pdf_path; ?>')" tabindex="3">
	</div>

	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
</form>
