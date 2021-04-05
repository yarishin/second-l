<?php $this->Html->script( 'jquery-1.8.2.min.js'                    , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.common.js'                       , array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
$(document).ready(function() {
	$('#<?php echo OBJECT_ID_BTN000010 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
	$('#<?php echo OBJECT_ID_BTN000020 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
	$('#<?php echo OBJECT_ID_BTN000030 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
});
<?php $this->Html->scriptEnd(); ?>

<p class="admin-pagetitle">財産管理報告書（選択）</p>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000010 ?>" value="戻る"     onclick="buttonClick('<?php echo EVENT_ID_050270010 ?>');" tabindex="1">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000020 ?>" value="一覧"     onclick="buttonClick('<?php echo EVENT_ID_050270020 ?>');" tabindex="2">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000030 ?>" value="メニュー" onclick="buttonClick('<?php echo EVENT_ID_050270030 ?>');" tabindex="3">
	</div>
	<div id="horizontal">
		<div id="label100">ファンドID</div>
		<div><input class="label50" type="text" value="<?php echo $data[OBJECT_ID_050270010] ?>" readonly></div>
	</div>
	<div id="horizontal">
		<div id="label100">ファンド名</div>
		<div><input class="label200" type="text" value="<?php echo $data[OBJECT_ID_050270020] ?>" readonly></div>
	</div>
	<div id="horizontal">
		<div id="label100"><br>財産管理報告書</div><br>
<?php if (isset($date_list) && is_array($date_list) && count($date_list) > 0) { ?>
		<select id="<?php echo OBJECT_ID_050270030 ?>" name="<?php echo OBJECT_ID_050270030 ?>" class="" tabindex="4">
			<?php foreach($date_list as $key => $value): ?>
				<?php $selected = ( $data[OBJECT_ID_050270030] == $key ) ? " selected" : ""; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
		</select>&nbsp;&nbsp;&nbsp;

		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000040 ?>" value="表示"     onclick="buttonClick('<?php echo EVENT_ID_050270040 ?>');" tabindex="5">&nbsp;&nbsp;&nbsp;
<?php } ?>
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000050 ?>" value="新規追加" onclick="buttonClick('<?php echo EVENT_ID_050270050 ?>');" tabindex="6">
	</div>
	<br>

	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
</form>

