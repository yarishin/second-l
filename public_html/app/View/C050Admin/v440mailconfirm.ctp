<?php $this->Html->script( 'jquery-1.8.2.min.js' , array('inline' => false)); ?>
<?php $this->Html->script( 'jquery.common.js'    , array('inline' => false)); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
$(document).ready(function() {
	$('#<?php echo OBJECT_ID_BTN000010 ?>').lockScreen();
	$('#<?php echo OBJECT_ID_BTN000020 ?>').lockScreen();
});
<?php $this->Html->scriptEnd(); ?>

<p>メール送信(確認)</p>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000010 ?>" value="戻る" onclick="buttonClick('<?php echo EVENT_ID_050440010 ?>');" tabindex="1">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000020 ?>" value="送信" onclick="buttonClick('<?php echo EVENT_ID_050440020 ?>');" tabindex="2">
	</div>
	
	<div id="horizontal">
		<div id="label150">送信元</div>
		<div><?php echo $list[CONFIG_0063][$data[OBJECT_ID_050430140]] ?></div>
	</div>

	<div id="horizontal">
		<div id="label150">送信先</div>
		<div><?php echo $list[CONFIG_0062][$data[OBJECT_ID_050430010]] ?></div>
	</div>

<?php if (strcmp(SPECIFIED_METHOD_CODE_0, $data[OBJECT_ID_050430010]) == 0) { ?>
	<div id="horizontal">
		<div id="label150">出資家状態</div>
		<div>
<?php
	if (isset($data[OBJECT_ID_050430020])) {
		echo $list[CONFIG_0024][USER_STATUS_CODE_INTERIM]."　";
	}
	if (isset($data[OBJECT_ID_050430030])) {
		echo $list[CONFIG_0024][USER_STATUS_CODE_APPLIED]."　";
	}
	if (isset($data[OBJECT_ID_050430040])) {
		echo $list[CONFIG_0024][USER_STATUS_CODE_APPROVED]."　";
	}
	if (isset($data[OBJECT_ID_050430050])) {
		echo $list[CONFIG_0024][USER_STATUS_CODE_AUTHENTICATED]."　";
	}
	if (isset($data[OBJECT_ID_050430060])) {
		echo $list[CONFIG_0024][USER_STATUS_CODE_STOPPED]."　";
	}
	if (isset($data[OBJECT_ID_050430070])) {
		echo $list[CONFIG_0024][USER_STATUS_CODE_WITHDRAWAL]."　";
	}
	if (isset($data[OBJECT_ID_050430080])) {
		echo $list[CONFIG_0024][USER_STATUS_CODE_REJECTED]."　";
	}
	echo LINE_FEED_CODE;
?>
		</div>
	</div>
	<div id="horizontal">
		<div id="label150">メルマガ</div>
		<div>
<?php
	if (isset($data[OBJECT_ID_050430090])) {
		echo $list[CONFIG_0046][MAIL_MAGAZINE_RECEIVE]."　";
	}
	if (isset($data[OBJECT_ID_050430100])) {
		echo $list[CONFIG_0046][MAIL_MAGAZINE_REJECT]."　";
	}
	echo LINE_FEED_CODE;
?>
		</div>
	</div>
<?php
}
elseif (strcmp(SPECIFIED_METHOD_CODE_1, $data[OBJECT_ID_050430010]) == 0 || strcmp(SPECIFIED_METHOD_CODE_2, $data[OBJECT_ID_050430010]) == 0) {
?>
	<div id="horizontal">
		<div id="label150">管理番号 or ID</div>
		<div><textarea style="width:900px;height:70px;resize:none;" name="<?php echo OBJECT_ID_050430110 ?>" id="<?php echo OBJECT_ID_050430110 ?>" tabindex="3" readonly><?php echo $data[OBJECT_ID_050430110] ?></textarea></div>
	</div>
<?php
}
?>
	<div id="horizontal">
		<div id="label150">件名</div>
		<div><input type="text" style="width:900px;" name="<?php echo OBJECT_ID_050430120 ?>" id="<?php echo OBJECT_ID_050430120 ?>" value="<?php echo $data[OBJECT_ID_050430120] ?>" tabindex="4" readonly></div>
	</div>
	<div id="horizontal">
		<div id="label150">本文</div>
		<div><textarea style="width:900px;height:1000px;resize:none;" name="<?php echo OBJECT_ID_050430130 ?>" id="<?php echo OBJECT_ID_050430130 ?>" tabindex="5" readonly><?php echo $data[OBJECT_ID_050430130] ?></textarea></div>
	</div>

	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
</form>

