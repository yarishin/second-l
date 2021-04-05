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
	$('#<?php echo OBJECT_ID_BTN000030 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
	jQuery("#form").validationEngine();
});
<?php $this->Html->scriptEnd(); ?>

<p class="admin-pagetitle">年間取引報告書作成（入力）</p>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div>作成ボタンをクリックすると、前年分の年間取引報告書のお知らせが作成され、メールが送信されます。(※)</div>
	<div>送付対象の出資家は前年度に配当金の受取り実績がある方のみです。</div>
	<br>
	<div style="color: red;">　※　入力項目が無いので確認画面は表示されず、直接完了画面へ遷移します。</div>
	<br>
	<div id="horizontal">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000010 ?>" value="作成"     onclick="buttonClick('<?php echo EVENT_ID_050410010 ?>');" tabindex="1">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000020 ?>" value="戻る"     onclick="buttonClick('<?php echo EVENT_ID_050410030 ?>');" tabindex="2">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000030 ?>" value="メニュー" onclick="buttonClick('<?php echo EVENT_ID_050410040 ?>');" tabindex="3">
	</div>
<?php
if (is_array($list[OBJECT_ID_050410010]) && 0 < count($list[OBJECT_ID_050410010])) {
?>
	
	<br>
	<div>作成済みの年間取引報告書を再作成する場合は対象年を選択し、再作成ボタンをクリックして下さい。</div>
	<div>お知らせの送信を行います。</div>
	<div id="horizontal">
		<div style="float:left; padding-right: 10px;"><select id="<?php echo OBJECT_ID_050410010 ?>" name="<?php echo OBJECT_ID_050410010 ?>" class="" tabindex="4">
			<?php foreach($list[OBJECT_ID_050410010] as $key => $value): ?>
				<?php $selected = strcmp($data[OBJECT_ID_050410010], $value[COLUMN_2500020]) == 0 ? " selected" : ""; ?>
				<option value="<?php echo $value[COLUMN_2500020] ?>" <?php echo $selected ?>><?php echo $value[COLUMN_2500020] ?>年</option>
			<?php endforeach; ?>
			</select></div>
		<?php $disabed = 0 < count($list[OBJECT_ID_050410010]) ? "" : DISABLED; ?>
		<input class="button" type="button" value="再作成" onclick="buttonClick('<?php echo EVENT_ID_050410020 ?>');" tabindex="5"<?php echo $disabed ?>>		
	</div>
<?php
}
?>
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
</form>

