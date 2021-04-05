<?php
$checked_user_status_0   = (isset($data[OBJECT_ID_050430020]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050430020]) == 0) ? CHECKED : "";
$checked_user_status_1   = (isset($data[OBJECT_ID_050430030]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050430030]) == 0) ? CHECKED : "";
$checked_user_status_2   = (isset($data[OBJECT_ID_050430040]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050430040]) == 0) ? CHECKED : "";
$checked_user_status_3   = (isset($data[OBJECT_ID_050430050]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050430050]) == 0) ? CHECKED : "";
$checked_user_status_4   = (isset($data[OBJECT_ID_050430060]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050430060]) == 0) ? CHECKED : "";
$checked_user_status_5   = (isset($data[OBJECT_ID_050430070]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050430070]) == 0) ? CHECKED : "";
$checked_user_status_6   = (isset($data[OBJECT_ID_050430080]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050430080]) == 0) ? CHECKED : "";
$checked_mail_magazine_1 = (isset($data[OBJECT_ID_050430090]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050430090]) == 0) ? CHECKED : "";
$checked_mail_magazine_2 = (isset($data[OBJECT_ID_050430100]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050430100]) == 0) ? CHECKED : "";
?>

<?php $this->Html->script( 'jquery-1.8.2.min.js' , array('inline' => false)); ?>
<?php $this->Html->script( 'jquery.common.js'    , array('inline' => false)); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
function specifiedMethodChange() {
	if (<?php echo SPECIFIED_METHOD_CODE_0 ?> == document.getElementById('<?php echo OBJECT_ID_050430010 ?>').value) {
		document.getElementById('hidden_item_1').style.display = "";
		document.getElementById('hidden_item_2').style.display = "none";
	}
	else if (<?php echo SPECIFIED_METHOD_CODE_1 ?> == document.getElementById('<?php echo OBJECT_ID_050430010 ?>').value
			|| <?php echo SPECIFIED_METHOD_CODE_2 ?> == document.getElementById('<?php echo OBJECT_ID_050430010 ?>').value) {
		document.getElementById('hidden_item_1').style.display = "none";
		document.getElementById('hidden_item_2').style.display = "";
	}
	else {
		document.getElementById('hidden_item_1').style.display = "";
		document.getElementById('hidden_item_2').style.display = "none";
	}
}
function bodyOnload() {
	specifiedMethodChange();
}
$(document).ready(function() {
	$('#<?php echo OBJECT_ID_BTN000010 ?>').lockScreen();
	$('#<?php echo OBJECT_ID_BTN000020 ?>').lockScreen();
});
<?php $this->Html->scriptEnd(); ?>

<p>メール送信(入力)</p>
	
<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000010 ?>" value="確認"     onclick="buttonClick('<?php echo EVENT_ID_050430010 ?>');" tabindex="15">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000020 ?>" value="メニュー" onclick="buttonClick('<?php echo EVENT_ID_050430020 ?>');" tabindex="16">
	</div>
	
<?php
if (isset($errors) && is_array($errors)) {
	foreach ($errors as $key => $values) {
		echo '<p class="error">'.$values.'</p>';
	}
}
?>
	
	<div id="horizontal">
		<div id="label150">送信元</div>
		<div><select id="<?php echo OBJECT_ID_050430140 ?>" name="<?php echo OBJECT_ID_050430140 ?>" tabindex="1">
			<?php foreach($list[CONFIG_0063] as $key => $value): ?>
				<?php $selected = ( $data[OBJECT_ID_050430140] == $key ) ? " selected" : ""; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<div id="horizontal">
		<div id="label150">送信先</div>
		<div><select id="<?php echo OBJECT_ID_050430010 ?>" name="<?php echo OBJECT_ID_050430010 ?>" onchange="specifiedMethodChange();" tabindex="2">
			<?php foreach($list[CONFIG_0062] as $key => $value): ?>
				<?php $selected = ( $data[OBJECT_ID_050430010] == $key ) ? " selected" : ""; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<div id="hidden_item_1">
		<div id="horizontal">
			<div id="label150">投資家状態</div>
			<input type="checkbox" id="<?php echo OBJECT_ID_050430020 ?>" name="<?php echo OBJECT_ID_050430020 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="3"<?php echo $checked_user_status_0 ?>><?php echo $list[CONFIG_0024][USER_STATUS_CODE_INTERIM] ?>　
			<input type="checkbox" id="<?php echo OBJECT_ID_050430030 ?>" name="<?php echo OBJECT_ID_050430030 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="4"<?php echo $checked_user_status_1 ?>><?php echo $list[CONFIG_0024][USER_STATUS_CODE_APPLIED] ?>　
			<input type="checkbox" id="<?php echo OBJECT_ID_050430040 ?>" name="<?php echo OBJECT_ID_050430040 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="5"<?php echo $checked_user_status_2 ?>><?php echo $list[CONFIG_0024][USER_STATUS_CODE_APPROVED] ?>　
			<input type="checkbox" id="<?php echo OBJECT_ID_050430050 ?>" name="<?php echo OBJECT_ID_050430050 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="6"<?php echo $checked_user_status_3 ?>><?php echo $list[CONFIG_0024][USER_STATUS_CODE_AUTHENTICATED] ?>　
			<input type="checkbox" id="<?php echo OBJECT_ID_050430060 ?>" name="<?php echo OBJECT_ID_050430060 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="7"<?php echo $checked_user_status_4 ?>><?php echo $list[CONFIG_0024][USER_STATUS_CODE_STOPPED] ?>　
			<input type="checkbox" id="<?php echo OBJECT_ID_050430070 ?>" name="<?php echo OBJECT_ID_050430070 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="8"<?php echo $checked_user_status_5 ?>><?php echo $list[CONFIG_0024][USER_STATUS_CODE_WITHDRAWAL] ?>　
			<input type="checkbox" id="<?php echo OBJECT_ID_050430080 ?>" name="<?php echo OBJECT_ID_050430080 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="9"<?php echo $checked_user_status_6 ?>><?php echo $list[CONFIG_0024][USER_STATUS_CODE_REJECTED] ?>　
		</div>
		<div id="horizontal">
			<div id="label150">メルマガ</div>
			<input type="checkbox" id="<?php echo OBJECT_ID_050430090 ?>" name="<?php echo OBJECT_ID_050430090 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="10"<?php echo $checked_mail_magazine_1 ?>><?php echo $list[CONFIG_0046][MAIL_MAGAZINE_RECEIVE] ?>　
			<input type="checkbox" id="<?php echo OBJECT_ID_050430100 ?>" name="<?php echo OBJECT_ID_050430100 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="11"<?php echo $checked_mail_magazine_2 ?>><?php echo $list[CONFIG_0046][MAIL_MAGAZINE_REJECT] ?>　
		</div>
	</div>
	<div id="hidden_item_2">
		<div id="horizontal">
			<div id="label150">管理番号 or ID</div>
			<div><textarea style="width:900px;height:70px;resize:none;" name="<?php echo OBJECT_ID_050430110 ?>" id="<?php echo OBJECT_ID_050430110 ?>" tabindex="12"><?php echo $data[OBJECT_ID_050430110] ?></textarea></div>
		</div>
	</div>
	<div id="horizontal">
		<div id="label150">件名</div>
		<div><input type="text" style="width:900px;" name="<?php echo OBJECT_ID_050430120 ?>" id="<?php echo OBJECT_ID_050430120 ?>" value="<?php echo $data[OBJECT_ID_050430120] ?>" tabindex="13"></div>
	</div>
	<div id="horizontal">
		<div id="label150">本文</div>
		<div><textarea style="width:900px;height:1000px;resize:none;" name="<?php echo OBJECT_ID_050430130 ?>" id="<?php echo OBJECT_ID_050430130 ?>" tabindex="14"><?php echo $data[OBJECT_ID_050430130] ?></textarea></div>
	</div>

	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
</form>

