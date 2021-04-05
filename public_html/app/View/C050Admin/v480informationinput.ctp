<?php
$tabindex = 1;
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
?>

<?php $this->Html->script( 'jquery-1.8.2.min.js' , array('inline' => false)); ?>
<?php $this->Html->script( 'jquery.common.js'    , array('inline' => false)); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
function checkboxClickForce() {
	if (!document.getElementById('<?php echo OBJECT_ID_050480110 ?>').checked) {
		document.getElementById('<?php echo OBJECT_ID_050480120 ?>').checked = false;
	}
}
function checkboxClickAgree() {
	if (document.getElementById('<?php echo OBJECT_ID_050480120 ?>').checked) {
		document.getElementById('<?php echo OBJECT_ID_050480110 ?>').checked = true;
	}
}
function specifiedMethodChange() {
	if (<?php echo SPECIFIED_METHOD_CODE_0 ?> == document.getElementById('<?php echo OBJECT_ID_050480010 ?>').value) {
		document.getElementById('hidden_item_1').style.display = "";
		document.getElementById('hidden_item_2').style.display = "none";
		document.getElementById('<?php echo OBJECT_ID_050480100 ?>').value = "";
	}
	else if (<?php echo SPECIFIED_METHOD_CODE_1 ?> == document.getElementById('<?php echo OBJECT_ID_050480010 ?>').value
			|| <?php echo SPECIFIED_METHOD_CODE_2 ?> == document.getElementById('<?php echo OBJECT_ID_050480010 ?>').value) {
		document.getElementById('hidden_item_1').style.display = "none";
		document.getElementById('hidden_item_2').style.display = "";
		document.getElementById('<?php echo OBJECT_ID_050480090 ?>').value = "";
	}
	else {
		document.getElementById('hidden_item_1').style.display = "";
		document.getElementById('hidden_item_2').style.display = "none";
	}
}
function checkboxClickAttachment1() {
	document.getElementById('<?php echo OBJECT_ID_050480220 ?>').checked = false;
	document.getElementById('<?php echo OBJECT_ID_050480260 ?>').checked = false;
	document.getElementById('<?php echo OBJECT_ID_050480290 ?>').checked = false;
	disableFileCreate();
	disableFundId();
}
function checkboxClickAttachment2() {
	document.getElementById('<?php echo OBJECT_ID_050480170 ?>').checked = false;
	document.getElementById('<?php echo OBJECT_ID_050480180 ?>').checked = false;
	document.getElementById('<?php echo OBJECT_ID_050480190 ?>').checked = false;
	document.getElementById('<?php echo OBJECT_ID_050480200 ?>').checked = false;
	document.getElementById('<?php echo OBJECT_ID_050480210 ?>').checked = false;
	document.getElementById('<?php echo OBJECT_ID_050480260 ?>').checked = false;
	disableFileCreate();
	disableFundId();
}
function checkboxClickAttachment3() {
	document.getElementById('<?php echo OBJECT_ID_050480170 ?>').checked = false;
	document.getElementById('<?php echo OBJECT_ID_050480180 ?>').checked = false;
	document.getElementById('<?php echo OBJECT_ID_050480190 ?>').checked = false;
	document.getElementById('<?php echo OBJECT_ID_050480200 ?>').checked = false;
	document.getElementById('<?php echo OBJECT_ID_050480210 ?>').checked = false;
	document.getElementById('<?php echo OBJECT_ID_050480220 ?>').checked = false;
	disableFileCreate();
	disableFundId();
}
function disableFileCreate() {
	if (document.getElementById('<?php echo OBJECT_ID_050480220 ?>').checked || document.getElementById('<?php echo OBJECT_ID_050480260 ?>').checked) {
		document.getElementById('<?php echo OBJECT_ID_050480290 ?>').disabled = false;
	} else {
		document.getElementById('<?php echo OBJECT_ID_050480290 ?>').checked  = false;
		document.getElementById('<?php echo OBJECT_ID_050480290 ?>').disabled = true;
	}
}
function disableFundId() {
	if (!document.getElementById('<?php echo OBJECT_ID_050480170 ?>').checked
			&& !document.getElementById('<?php echo OBJECT_ID_050480180 ?>').checked
			&& !document.getElementById('<?php echo OBJECT_ID_050480190 ?>').checked
			&& !document.getElementById('<?php echo OBJECT_ID_050480200 ?>').checked
			&& !document.getElementById('<?php echo OBJECT_ID_050480210 ?>').checked
			&& !document.getElementById('<?php echo OBJECT_ID_050480220 ?>').checked
			&& !document.getElementById('<?php echo OBJECT_ID_050480260 ?>').checked) {
		document.getElementById('<?php echo OBJECT_ID_050480010 ?>').options[<?php echo SPECIFIED_METHOD_CODE_0 ?>].disabled = false;
	} else {
		if ('' != document.getElementById('<?php echo OBJECT_ID_050480090 ?>').value) {
			document.getElementById('<?php echo OBJECT_ID_050480090 ?>').value = '';
		}
		if (<?php echo SPECIFIED_METHOD_CODE_0 ?> == document.getElementById('<?php echo OBJECT_ID_050480010 ?>').value) {
			document.getElementById('<?php echo OBJECT_ID_050480010 ?>').value = <?php echo SPECIFIED_METHOD_CODE_1 ?>;
			specifiedMethodChange();
		}
		document.getElementById('<?php echo OBJECT_ID_050480010 ?>').options[<?php echo SPECIFIED_METHOD_CODE_0 ?>].disabled = true;
	}
}
function bodyOnload() {
	specifiedMethodChange();
	disableFileCreate();
	disableFundId();
}
$(document).ready(function() {
	$('.button').lockScreen();
});
<?php $this->Html->scriptEnd(); ?>

<p class="admin-pagetitle">お知らせ送信（入力）</p>
	
<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" value="確認"     onclick="buttonClick('<?php echo EVENT_ID_050480010 ?>');">
		<input class="button" type="button" value="メニュー" onclick="buttonClick('<?php echo EVENT_ID_050480020 ?>');">
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
		<div>また、添付ファイル(再交付書面)がチェックされた場合、「送信先」で「条件を指定」が選択出来なくなり、</div>
		<div>①対象書面交付済みの投資家全員、②管理番号を指定、③投資家IDを指定の3パターンでのみ送信されます。</div>
		<div>対象書面交付済みの投資家全員に送る場合、「管理番号 or ID」を未入力状態にして下さい。</div>
	</div>
	<br>
	<div id="horizontal">
		<div id="label150">送信先</div>
		<div><select id="<?php echo OBJECT_ID_050480010 ?>" name="<?php echo OBJECT_ID_050480010 ?>" onchange="specifiedMethodChange();" tabindex="<?php echo $tabindex++ ?>">
			<?php foreach($list[CONFIG_0062] as $key => $value): ?>
				<?php $selected = ( $data[OBJECT_ID_050480010] == $key ) ? " selected" : ""; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<div id="hidden_item_1">
<!--
 		<div id="horizontal">
			<div id="label150">投資家状態</div>
			<input type="checkbox" id="<?php echo OBJECT_ID_050480020 ?>" name="<?php echo OBJECT_ID_050480020 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="<?php echo $tabindex++ ?>"<?php echo $checked_user_status_0 ?>><?php echo $list[CONFIG_0024][USER_STATUS_CODE_INTERIM] ?>　
			<input type="checkbox" id="<?php echo OBJECT_ID_050480030 ?>" name="<?php echo OBJECT_ID_050480030 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="<?php echo $tabindex++ ?>"<?php echo $checked_user_status_1 ?>><?php echo $list[CONFIG_0024][USER_STATUS_CODE_APPLIED] ?>　
			<input type="checkbox" id="<?php echo OBJECT_ID_050480040 ?>" name="<?php echo OBJECT_ID_050480040 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="<?php echo $tabindex++ ?>"<?php echo $checked_user_status_2 ?>><?php echo $list[CONFIG_0024][USER_STATUS_CODE_APPROVED] ?>　
			<input type="checkbox" id="<?php echo OBJECT_ID_050480050 ?>" name="<?php echo OBJECT_ID_050480050 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="<?php echo $tabindex++ ?>"<?php echo $checked_user_status_3 ?>><?php echo $list[CONFIG_0024][USER_STATUS_CODE_AUTHENTICATED] ?>　
			<input type="checkbox" id="<?php echo OBJECT_ID_050480060 ?>" name="<?php echo OBJECT_ID_050480060 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="<?php echo $tabindex++ ?>"<?php echo $checked_user_status_4 ?>><?php echo $list[CONFIG_0024][USER_STATUS_CODE_STOPPED] ?>　
			<input type="checkbox" id="<?php echo OBJECT_ID_050480070 ?>" name="<?php echo OBJECT_ID_050480070 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="<?php echo $tabindex++ ?>"<?php echo $checked_user_status_5 ?>><?php echo $list[CONFIG_0024][USER_STATUS_CODE_WITHDRAWAL] ?>　
			<input type="checkbox" id="<?php echo OBJECT_ID_050480080 ?>" name="<?php echo OBJECT_ID_050480080 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="<?php echo $tabindex++ ?>"<?php echo $checked_user_status_6 ?>><?php echo $list[CONFIG_0024][USER_STATUS_CODE_REJECTED] ?>　
		</div>
-->
		<div id="horizontal">
			<div id="label150">ファンドID</div>
			<input type="text" class="text50" id="<?php echo OBJECT_ID_050480090 ?>" name="<?php echo OBJECT_ID_050480090 ?>" value="<?php echo $data[OBJECT_ID_050480090] ?>" tabindex="<?php echo $tabindex++ ?>">に出資した投資家に送信
		</div>
	</div>
	<div id="hidden_item_2">
		<div id="horizontal">
			<div id="label150">管理番号 or ID</div>
			<div><textarea style="width:900px;height:70px;resize:none;" name="<?php echo OBJECT_ID_050480100 ?>" id="<?php echo OBJECT_ID_050480100 ?>" tabindex="<?php echo $tabindex++ ?>"><?php echo $data[OBJECT_ID_050480100] ?></textarea></div>
		</div>
	</div>
	<br>
	<div id="horizontal">
		<div id="label150">強制確認</div>
		<input type="checkbox" id="<?php echo OBJECT_ID_050480110 ?>" name="<?php echo OBJECT_ID_050480110 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="<?php echo $tabindex++ ?>" onclick="checkboxClickForce();"<?php echo $checked_force_flag ?>>内容が確認されるまで取引を制限する
	</div>
	<div id="horizontal">
		<div id="label150">同意</div>
		<input type="checkbox" id="<?php echo OBJECT_ID_050480120 ?>" name="<?php echo OBJECT_ID_050480120 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="<?php echo $tabindex++ ?>" onclick="checkboxClickAgree();"<?php echo $checked_agreement_flag ?>>同意が取れるまで取引を制限する
	</div>
	<div id="horizontal">
		<div id="label150">掲載日時</div>
		<div style="float:left;">
			<input type="text" class="text100_right" name="<?php echo OBJECT_ID_050480130 ?>" id="<?php echo OBJECT_ID_050480130 ?>" value="<?php echo $data[OBJECT_ID_050480130] ?>" tabindex="<?php echo $tabindex++ ?>">
			<input type="text" class="text100_right" name="<?php echo OBJECT_ID_050480140 ?>" id="<?php echo OBJECT_ID_050480140 ?>" value="<?php echo $data[OBJECT_ID_050480140] ?>" tabindex="<?php echo $tabindex++ ?>">
		</div>
		<div>YYYY/MM/DD hh:mm:ss</div>
	</div>
	<div id="horizontal">
		<div id="label150">件名</div>
		<div><input type="text" style="width:900px;" name="<?php echo OBJECT_ID_050480150 ?>" id="<?php echo OBJECT_ID_050480150 ?>" value="<?php echo $data[OBJECT_ID_050480150] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
	</div>
	<div id="horizontal">
		<div id="label150">本文</div>
		<div><textarea style="width:900px;height:500px;resize:none;" name="<?php echo OBJECT_ID_050480160 ?>" id="<?php echo OBJECT_ID_050480160 ?>" tabindex="<?php echo $tabindex++ ?>"><?php echo $data[OBJECT_ID_050480160] ?></textarea></div>
	</div>
	<div id="horizontal">
		<div id="label150">添付ファイル</div>
		<input type="checkbox" id="<?php echo OBJECT_ID_050480170 ?>" name="<?php echo OBJECT_ID_050480170 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="<?php echo $tabindex++ ?>" onclick="checkboxClickAttachment1();"<?php echo $checked_atch_file_reg_1 ?>><?php echo $list[CONFIG_0064][REG_DOC_ID_00001] ?>
	</div>
	<div id="horizontal">
		<div id="label150"><?php echo HTML_HALF_WIDTH_SPACE ?></div>
		<input type="checkbox" id="<?php echo OBJECT_ID_050480180 ?>" name="<?php echo OBJECT_ID_050480180 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="<?php echo $tabindex++ ?>" onclick="checkboxClickAttachment1();"<?php echo $checked_atch_file_reg_2 ?>><?php echo $list[CONFIG_0064][REG_DOC_ID_00002] ?>
	</div>
	<div id="horizontal">
		<div id="label150"><?php echo HTML_HALF_WIDTH_SPACE ?></div>
		<input type="checkbox" id="<?php echo OBJECT_ID_050480190 ?>" name="<?php echo OBJECT_ID_050480190 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="<?php echo $tabindex++ ?>" onclick="checkboxClickAttachment1();"<?php echo $checked_atch_file_reg_3 ?>><?php echo $list[CONFIG_0064][REG_DOC_ID_00003] ?>
	</div>
	<div id="horizontal">
		<div id="label150"><?php echo HTML_HALF_WIDTH_SPACE ?></div>
		<input type="checkbox" id="<?php echo OBJECT_ID_050480200 ?>" name="<?php echo OBJECT_ID_050480200 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="<?php echo $tabindex++ ?>" onclick="checkboxClickAttachment1();"<?php echo $checked_atch_file_reg_4 ?>><?php echo $list[CONFIG_0064][REG_DOC_ID_00004] ?>
	</div>
	<div id="horizontal">
		<div id="label150"><?php echo HTML_HALF_WIDTH_SPACE ?></div>
		<input type="checkbox" id="<?php echo OBJECT_ID_050480210 ?>" name="<?php echo OBJECT_ID_050480210 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="<?php echo $tabindex++ ?>" onclick="checkboxClickAttachment1();"<?php echo $checked_atch_file_reg_5 ?>><?php echo $list[CONFIG_0064][REG_DOC_ID_00005] ?>
	</div>
	<div id="horizontal">
		<div id="label150"><?php echo HTML_HALF_WIDTH_SPACE ?></div>
		<div>
			<div id="label150"><input type="checkbox" id="<?php echo OBJECT_ID_050480220 ?>" name="<?php echo OBJECT_ID_050480220 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="<?php echo $tabindex++ ?>" onclick="checkboxClickAttachment2();"<?php echo $checked_atch_file_inv_4 ?>><?php echo $list[CONFIG_0045][INV_DOC_ID_00004] ?></div>
			<div id="label100">ファンドID</div>
			<div id="v310_div50" style="margin-right:30px;"><input type="text" name="<?php echo OBJECT_ID_050480230 ?>" id="<?php echo OBJECT_ID_050480230 ?>" value="<?php echo $data[OBJECT_ID_050480230] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="label100">運用年月</div>
			<div id="v310_div50"><input type="text" name="<?php echo OBJECT_ID_050480240 ?>" id="<?php echo OBJECT_ID_050480240 ?>" value="<?php echo $data[OBJECT_ID_050480240] ?>" tabindex="<?php echo $tabindex++ ?>"></div><div id="v310_div_other">年</div>
			<div id="v310_div25"><input type="text" name="<?php echo OBJECT_ID_050480250 ?>" id="<?php echo OBJECT_ID_050480250 ?>" value="<?php echo $data[OBJECT_ID_050480250] ?>" tabindex="<?php echo $tabindex++ ?>"></div><div id="v310_div_other">月</div>
		</div>
	</div>
	<div id="horizontal">
		<div id="label150"><?php echo HTML_HALF_WIDTH_SPACE ?></div>
		<div>
			<div id="label150"><input type="checkbox" id="<?php echo OBJECT_ID_050480260 ?>" name="<?php echo OBJECT_ID_050480260 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="<?php echo $tabindex++ ?>" onclick="checkboxClickAttachment3();"<?php echo $checked_atch_file_inv_5 ?>><?php echo $list[CONFIG_0045][INV_DOC_ID_00005] ?></div>
			<div id="label100">取引開始年月</div>
			<div id="v310_div50"><input type="text" name="<?php echo OBJECT_ID_050480270 ?>" id="<?php echo OBJECT_ID_050480270 ?>" value="<?php echo $data[OBJECT_ID_050480270] ?>" tabindex="<?php echo $tabindex++ ?>"></div><div id="v310_div_other">年</div>
			<div id="v310_div25"><input type="text" name="<?php echo OBJECT_ID_050480280 ?>" id="<?php echo OBJECT_ID_050480280 ?>" value="<?php echo $data[OBJECT_ID_050480280] ?>" tabindex="<?php echo $tabindex++ ?>"></div><div id="v310_div_other">月</div>
		</div>
	</div>
	<div id="horizontal">
		<div id="label150">ファイル作成</div>
		<input type="checkbox" id="<?php echo OBJECT_ID_050480290 ?>" name="<?php echo OBJECT_ID_050480290 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="<?php echo $tabindex++ ?>"<?php echo $checked_file_make_flag ?>>お知らせを送信する際にファイルを作成する
	</div>

	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
</form>

