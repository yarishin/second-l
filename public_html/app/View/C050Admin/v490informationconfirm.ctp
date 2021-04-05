<?php
$checked_user_status_0   = (isset($data[OBJECT_ID_050480020]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050480020]) == 0) ? CHECKED : "";
$checked_user_status_1   = (isset($data[OBJECT_ID_050480030]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050480030]) == 0) ? CHECKED : "";
$checked_user_status_2   = (isset($data[OBJECT_ID_050480040]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050480040]) == 0) ? CHECKED : "";
$checked_user_status_3   = (isset($data[OBJECT_ID_050480050]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050480050]) == 0) ? CHECKED : "";
$checked_user_status_4   = (isset($data[OBJECT_ID_050480060]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050480060]) == 0) ? CHECKED : "";
$checked_user_status_5   = (isset($data[OBJECT_ID_050480070]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050480070]) == 0) ? CHECKED : "";
$checked_user_status_6   = (isset($data[OBJECT_ID_050480080]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050480080]) == 0) ? CHECKED : "";
$checked_force_flag      = (isset($data[OBJECT_ID_050480110]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050480110]) == 0) ? CHECKED : "";
$checked_agreement_flag  = (isset($data[OBJECT_ID_050480120]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050480120]) == 0) ? CHECKED : "";
$checked_atch_file_reg_1 = (isset($data[OBJECT_ID_050480170]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050480170]) == 0) ? CHECKED : "";
$checked_atch_file_reg_2 = (isset($data[OBJECT_ID_050480180]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050480180]) == 0) ? CHECKED : "";
$checked_atch_file_reg_3 = (isset($data[OBJECT_ID_050480190]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050480190]) == 0) ? CHECKED : "";
$checked_atch_file_reg_4 = (isset($data[OBJECT_ID_050480200]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050480200]) == 0) ? CHECKED : "";
$checked_atch_file_reg_5 = (isset($data[OBJECT_ID_050480210]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050480210]) == 0) ? CHECKED : "";
$checked_atch_file_inv_4 = (isset($data[OBJECT_ID_050480220]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050480220]) == 0) ? CHECKED : "";
$checked_atch_file_inv_5 = (isset($data[OBJECT_ID_050480260]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050480260]) == 0) ? CHECKED : "";
$checked_file_make_flag  = (isset($data[OBJECT_ID_050480290]) && strcmp(CHECKBOX_ON, $data[OBJECT_ID_050480290]) == 0) ? CHECKED : "";
$attach_flag = false;
if (strcmp(CHECKED, $checked_atch_file_reg_1) == 0 || strcmp(CHECKED, $checked_atch_file_reg_2) == 0
		|| strcmp(CHECKED, $checked_atch_file_reg_3) == 0 || strcmp(CHECKED, $checked_atch_file_reg_4) == 0
		|| strcmp(CHECKED, $checked_atch_file_reg_5) == 0 || strcmp(CHECKED, $checked_atch_file_inv_4) == 0
		|| strcmp(CHECKED, $checked_atch_file_inv_5) == 0) {
	$attach_flag = true;
}
?>

<?php $this->Html->script( 'jquery-1.8.2.min.js' , array('inline' => false)); ?>
<?php $this->Html->script( 'jquery.common.js'    , array('inline' => false)); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
$(document).ready(function() {
	$('.button').lockScreen();
});
<?php $this->Html->scriptEnd(); ?>

<p>お知らせ送信(入力)</p>
	
<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" value="戻る" onclick="buttonClick('<?php echo EVENT_ID_050490010 ?>');">
		<input class="button" type="button" value="送信" onclick="buttonClick('<?php echo EVENT_ID_050490020 ?>');">
	</div>
	
<?php
if (isset($errors) && is_array($errors)) {
	foreach ($errors as $key => $values) {
		echo '<p class="error">'.$values.'</p>';
	}
}
?>
	<div id="horizontal">
		<div>掲載日時が未入力の場合、即時掲載されます。</div>
		<div>また、添付ファイル(再交付書面)が指定された場合、送信先の条件が無効となり、</div>
		<div>対象書面交付済みの出資家全員に送信されます。</div>
	</div>
	<br>
	<div id="horizontal">
		<div id="label150">送信先</div>
<?php
if ($attach_flag && (is_null($data[OBJECT_ID_050480100]) || strcmp("", $data[OBJECT_ID_050480100]) == 0)) {
	
	// 添付ファイル有り、番号、ID指定無しの場合、対象者全員
?>
		<div class="label150">書面交付対象者全員</div>
	</div>
<?php
}
else {
?>
		<div class="label150"><?php echo $list[CONFIG_0062][$data[OBJECT_ID_050480010]] ?></div>
	</div>
<?php
	if (strcmp(SPECIFIED_METHOD_CODE_0, $data[OBJECT_ID_050480010]) == 0) {
?>
	<div id="horizontal">
		<div id="label150">ファンドID</div>
		<div class="label50"><?php echo $data[OBJECT_ID_050480090] ?></div>
	</div>
	
<?php
	}
	elseif (strcmp(SPECIFIED_METHOD_CODE_1, $data[OBJECT_ID_050430010]) == 0 || strcmp(SPECIFIED_METHOD_CODE_2, $data[OBJECT_ID_050430010]) == 0) {
?>
	<div id="horizontal">
		<div id="label150">管理番号 or ID</div>
		<div><textarea style="width:900px;height:70px;resize:none;" readonly><?php echo $data[OBJECT_ID_050480100] ?></textarea></div>
	</div>
<?php
	}
}

if (strcmp(CHECKED, $checked_force_flag) == 0) {
?>
	<div id="horizontal">
		<div id="label150">強制確認</div>
		<div class="label300">内容が確認されるまで取引を制限する</div>
	</div>
<?php
}

if (strcmp(CHECKED, $checked_agreement_flag) == 0) {
?>
	<div id="horizontal">
		<div id="label150">同意</div>
		<div class="label300">同意が取れるまで取引を制限する</div>
	</div>
<?php
}
?>
	<div id="horizontal">
		<div id="label150">掲載日時</div>
		<div style="float:left;">
<?php
if (empty($data[OBJECT_ID_050480130])) {
?>
			<div class="label150">送信と同時に掲載</div>
<?php
}
else {
?>
			<div class="label100_center"><?php echo $data[OBJECT_ID_050480130] ?></div>
			<div class="label100_center"><?php echo $data[OBJECT_ID_050480140] ?></div>
<?php
}
?>
		</div>
	</div>
	<div id="horizontal">
		<div id="label150">件名</div>
		<div class="label100" style="width:900px;"><?php echo $data[OBJECT_ID_050480150] ?></div>
	</div>
	<div id="horizontal">
		<div id="label150">本文</div>
		<div><textarea style="width:900px;height:500px;resize:none;" readonly><?php echo $data[OBJECT_ID_050480160] ?></textarea></div>
	</div>
<?php
$first_file = true;
if (strcmp(CHECKED, $checked_atch_file_reg_1) == 0) {
?>
	<div id="horizontal">
		<div id="label150">添付ファイル</div>
		<div class="label300"><?php echo $list[CONFIG_0064][REG_DOC_ID_00001] ?></div>
	</div>
<?php
	$first_file = false;
}
if (strcmp(CHECKED, $checked_atch_file_reg_2) == 0) {
	echo '<div id="horizontal">'.LINE_FEED_CODE;
	if ($first_file) {
		echo '<div id="label150">添付ファイル</div>'.LINE_FEED_CODE;
	}
	else {
		echo '<div id="label150">'.HTML_HALF_WIDTH_SPACE.'</div>'.LINE_FEED_CODE;
	}
?>
		<div class="label300"><?php echo $list[CONFIG_0064][REG_DOC_ID_00002] ?></div>
	</div>
<?php
	$first_file = false;
}
if (strcmp(CHECKED, $checked_atch_file_reg_3) == 0) {
	echo '<div id="horizontal">'.LINE_FEED_CODE;
	if ($first_file) {
		echo '<div id="label150">添付ファイル</div>'.LINE_FEED_CODE;
	}
	else {
		echo '<div id="label150">'.HTML_HALF_WIDTH_SPACE.'</div>'.LINE_FEED_CODE;
	}
?>
		<div class="label300"><?php echo $list[CONFIG_0064][REG_DOC_ID_00003] ?></div>
	</div>
<?php
	$first_file = false;
}
if (strcmp(CHECKED, $checked_atch_file_reg_4) == 0) {
	echo '<div id="horizontal">'.LINE_FEED_CODE;
	if ($first_file) {
		echo '<div id="label150">添付ファイル</div>'.LINE_FEED_CODE;
	}
	else {
		echo '<div id="label150">'.HTML_HALF_WIDTH_SPACE.'</div>'.LINE_FEED_CODE;
	}
?>
		<div class="label300"><?php echo $list[CONFIG_0064][REG_DOC_ID_00004] ?></div>
	</div>
<?php
	$first_file = false;
}
if (strcmp(CHECKED, $checked_atch_file_reg_5) == 0) {
	echo '<div id="horizontal">'.LINE_FEED_CODE;
	if ($first_file) {
		echo '<div id="label150">添付ファイル</div>'.LINE_FEED_CODE;
	}
	else {
		echo '<div id="label150">'.HTML_HALF_WIDTH_SPACE.'</div>'.LINE_FEED_CODE;
	}
?>
		<div class="label300"><?php echo $list[CONFIG_0064][REG_DOC_ID_00005] ?></div>
	</div>
<?php
	$first_file = false;
}
if (strcmp(CHECKED, $checked_atch_file_inv_4) == 0) {
	echo '<div id="horizontal">'.LINE_FEED_CODE;
	if ($first_file) {
		echo '<div id="label150">添付ファイル</div>'.LINE_FEED_CODE;
	}
	else {
		echo '<div id="label150">'.HTML_HALF_WIDTH_SPACE.'</div>'.LINE_FEED_CODE;
	}
?>
		<div class="label150"><?php echo $list[CONFIG_0045][INV_DOC_ID_00004] ?></div>
		<div id="label100">ファンドID</div>
		<div id="v310_div50" style="margin-right:30px;border-bottom:1px gray solid;"><?php echo $data[OBJECT_ID_050480230] ?></div>
		<div id="label100">運用年月</div>
		<div id="v310_div50" style="text-align:right;border-bottom:1px gray solid;"><?php echo $data[OBJECT_ID_050480240] ?></div><div id="v310_div_other">年</div>
		<div id="v310_div25" style="text-align:right;border-bottom:1px gray solid;"><?php echo $data[OBJECT_ID_050480250] ?></div><div id="v310_div_other">月</div>
	</div>
<?php
	$first_file = false;
}
if (strcmp(CHECKED, $checked_atch_file_inv_5) == 0) {
	echo '<div id="horizontal">'.LINE_FEED_CODE;
	if ($first_file) {
		echo '<div id="label150">添付ファイル</div>'.LINE_FEED_CODE;
	}
	else {
		echo '<div id="label150">'.HTML_HALF_WIDTH_SPACE.'</div>'.LINE_FEED_CODE;
	}
?>
		<div class="label150"><?php echo $list[CONFIG_0045][INV_DOC_ID_00005] ?></div>
		<div id="label100">取引開始年月</div>
		<div id="v310_div50" style="text-align:right;border-bottom:1px gray solid;"><?php echo $data[OBJECT_ID_050480270] ?></div><div id="v310_div_other">年</div>
		<div id="v310_div25" style="text-align:right;border-bottom:1px gray solid;"><?php echo $data[OBJECT_ID_050480280] ?></div><div id="v310_div_other">月</div>
	</div>
<?php
}
if (strcmp(CHECKED, $checked_file_make_flag) == 0) {
?>
	<div id="horizontal">
		<div id="label150">ファイル作成</div>
		<div class="label300">お知らせを送信する際にファイルを作成する</div>
	</div>
<?php
}
?>

	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
</form>

