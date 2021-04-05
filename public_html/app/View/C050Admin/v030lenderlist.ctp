<?php
$checked_0 = (isset($data[SEARCH_ID_050030120]) && strcmp(CHECKBOX_ON, $data[SEARCH_ID_050030120]) == 0) ? CHECKED : "";
$checked_1 = (isset($data[SEARCH_ID_050030130]) && strcmp(CHECKBOX_ON, $data[SEARCH_ID_050030130]) == 0) ? CHECKED : "";
$checked_2 = (isset($data[SEARCH_ID_050030140]) && strcmp(CHECKBOX_ON, $data[SEARCH_ID_050030140]) == 0) ? CHECKED : "";
$checked_3 = (isset($data[SEARCH_ID_050030150]) && strcmp(CHECKBOX_ON, $data[SEARCH_ID_050030150]) == 0) ? CHECKED : "";
$checked_4 = (isset($data[SEARCH_ID_050030160]) && strcmp(CHECKBOX_ON, $data[SEARCH_ID_050030160]) == 0) ? CHECKED : "";
$checked_5 = (isset($data[SEARCH_ID_050030170]) && strcmp(CHECKBOX_ON, $data[SEARCH_ID_050030170]) == 0) ? CHECKED : "";
$checked_6 = (isset($data[SEARCH_ID_050030180]) && strcmp(CHECKBOX_ON, $data[SEARCH_ID_050030180]) == 0) ? CHECKED : "";
$checked_7 = (isset($data[SEARCH_ID_050030220]) && strcmp(CHECKBOX_ON, $data[SEARCH_ID_050030220]) == 0) ? CHECKED : "";
$checked_8 = (isset($data[SEARCH_ID_050030230]) && strcmp(CHECKBOX_ON, $data[SEARCH_ID_050030230]) == 0) ? CHECKED : "";

$user_count = 0;
if (isset($user_list) && is_array($user_list) && 0 < count($user_list)) {
	$user_count = count($user_list);
}
?>

<?php $this->Html->script( 'jquery-1.8.2.min.js' , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.common.js'    , array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
function linkClick(eventId, userId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.getElementById('<?php echo HIDDEN_ID_000000020 ?>').value = userId;
	document.form.submit();
}
$(document).ready(function() {
	$('#<?php echo OBJECT_ID_BTN000010 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
	$('#<?php echo OBJECT_ID_BTN000020 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
	$('#<?php echo OBJECT_ID_BTN000030 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
	$('#<?php echo OBJECT_ID_LNK000010 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
});
<?php $this->Html->scriptEnd(); ?>

<p class="admin-pagetitle">投資家一覧</p>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000010 ?>" value="メニュー" onclick="buttonClick('<?php echo EVENT_ID_050030010 ?>');" tabindex="18">
	</div>
<?php
if (isset($errors) && is_array($errors)) {
	foreach ($errors as $key => $values) {
		echo '<p class="error">'.$values.'</p>';
	}
}
?>
	<br>
	<div id="horizontal">
		<div id="label200">管理番号(零不要)</div>
		<div>
			<input type="text" name="<?php echo SEARCH_ID_050030055 ?>" id="<?php echo SEARCH_ID_050030055 ?>" value="<?php echo $data[SEARCH_ID_050030055] ?>" class="text100" tabindex="1">
		</div>
	</div>
	<div id="horizontal">
		<div id="label200">漢字氏名</div>
		<div>
			<input type="text" name="<?php echo SEARCH_ID_050030010 ?>" id="<?php echo SEARCH_ID_050030010 ?>" value="<?php echo $data[SEARCH_ID_050030010] ?>" class="text100" tabindex="2">
			<input type="text" name="<?php echo SEARCH_ID_050030020 ?>" id="<?php echo SEARCH_ID_050030020 ?>" value="<?php echo $data[SEARCH_ID_050030020] ?>" class="text100" tabindex="3">
		</div>
	</div>
	<div id="horizontal">
		<div id="label200">氏名フリガナ</div>
		<div>
			<input type="text" name="<?php echo SEARCH_ID_050030030 ?>" id="<?php echo SEARCH_ID_050030030 ?>" value="<?php echo $data[SEARCH_ID_050030030] ?>" class="text100" tabindex="4">
			<input type="text" name="<?php echo SEARCH_ID_050030040 ?>" id="<?php echo SEARCH_ID_050030040 ?>" value="<?php echo $data[SEARCH_ID_050030040] ?>" class="text100" tabindex="5">
		</div>
	</div>
	<div id="horizontal">
		<div id="label200">投資家ID</div>
		<div>
			<input type="text" name="<?php echo SEARCH_ID_050030050 ?>" id="<?php echo SEARCH_ID_050030050 ?>" value="<?php echo $data[SEARCH_ID_050030050] ?>" class="text100" tabindex="6">
		</div>
	</div>
	<div id="horizontal">
		<div id="label200">ステータス</div>
		<div>
			<input type="checkbox" id="<?php echo SEARCH_ID_050030120 ?>" name="<?php echo SEARCH_ID_050030120 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex= "7"<?php echo $checked_0 ?>><?php echo $list[CONFIG_0024][USER_STATUS_CODE_INTERIM] ?>　
			<input type="checkbox" id="<?php echo SEARCH_ID_050030130 ?>" name="<?php echo SEARCH_ID_050030130 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex= "8"<?php echo $checked_1 ?>><?php echo $list[CONFIG_0024][USER_STATUS_CODE_APPLIED] ?>　
			<input type="checkbox" id="<?php echo SEARCH_ID_050030140 ?>" name="<?php echo SEARCH_ID_050030140 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex= "9"<?php echo $checked_2 ?>><?php echo $list[CONFIG_0024][USER_STATUS_CODE_APPROVED] ?>　
			<input type="checkbox" id="<?php echo SEARCH_ID_050030150 ?>" name="<?php echo SEARCH_ID_050030150 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="10"<?php echo $checked_3 ?>><?php echo $list[CONFIG_0024][USER_STATUS_CODE_AUTHENTICATED] ?>　
			<input type="checkbox" id="<?php echo SEARCH_ID_050030160 ?>" name="<?php echo SEARCH_ID_050030160 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="11"<?php echo $checked_4 ?>><?php echo $list[CONFIG_0024][USER_STATUS_CODE_STOPPED] ?>　
			<input type="checkbox" id="<?php echo SEARCH_ID_050030170 ?>" name="<?php echo SEARCH_ID_050030170 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="12"<?php echo $checked_5 ?>><?php echo $list[CONFIG_0024][USER_STATUS_CODE_WITHDRAWAL] ?>　
			<input type="checkbox" id="<?php echo SEARCH_ID_050030180 ?>" name="<?php echo SEARCH_ID_050030180 ?>" value="<?php echo CHECKBOX_ON ?>" tabindex="13"<?php echo $checked_6 ?>><?php echo $list[CONFIG_0024][USER_STATUS_CODE_REJECTED] ?>
		</div>
	</div>
	<div id="horizontal">
		<div id="label200">メルマガ登録状況</div>
		<div>
			<input type="checkbox" id="<?php echo SEARCH_ID_050030220 ?>" name="<?php echo SEARCH_ID_050030220 ?>" value="1" tabindex= "14"<?php echo $checked_7 ?>><?php echo $list[CONFIG_0046][MAIL_MAGAZINE_RECEIVE] ?>　
			<input type="checkbox" id="<?php echo SEARCH_ID_050030230 ?>" name="<?php echo SEARCH_ID_050030230 ?>" value="1" tabindex= "15"<?php echo $checked_8 ?>><?php echo $list[CONFIG_0046][MAIL_MAGAZINE_REJECT] ?>　
		</div>
	</div>
	<div id="horizontal">
		<div id="label200">ソート項目</div>
		<div><select id="<?php echo SEARCH_ID_050030190 ?>" name="<?php echo SEARCH_ID_050030190 ?>" class="" tabindex="14">
			<?php foreach($list[CONFIG_0028] as $key => $value): ?>
				<?php $selected = ( $data[SEARCH_ID_050030190] == $key ) ? " selected" : ""; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<div id="horizontal">
		<div id="label200">ソート順</div>
		<div><select id="<?php echo SEARCH_ID_050030200 ?>" name="<?php echo SEARCH_ID_050030200 ?>" class="" tabindex="15">
			<?php foreach($list[CONFIG_0029] as $key => $value): ?>
				<?php $selected = ( $data[SEARCH_ID_050030200] == $key ) ? " selected" : ""; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<br>
	<div id="horizontal">
		<div id="label200">表示中件数</div>
		<div>
			<input type="text" value="<?php echo number_format($user_count)." 人" ?>" class="label100_right" readonly>
		</div>
	</div>
	<br>
	<div id="horizontal">
		<input class="button" type="submit" id="<?php echo OBJECT_ID_BTN000020 ?>" value="絞込み" onclick="buttonClick('<?php echo EVENT_ID_050030020 ?>');" tabindex="16">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000030 ?>" value="未承認" onclick="buttonClick('<?php echo EVENT_ID_050030030 ?>');" tabindex="17">
	</div>
	<br>
	
<?php
if (isset($user_list) && is_array($user_list) && 0 < count($user_list)) {
	echo "<div id=\"horizontal\" style=\"width:1300px;border:0px solid blue;\">"   .LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">ID</div>"         .LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">管理番号</div>"   .LINE_FEED_CODE;
	echo "	<div class=\"label150_center\">氏名</div>"       .LINE_FEED_CODE;
	echo "	<div class=\"label200_center\">氏名カナ</div>"   .LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">住所</div>"       .LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">状態</div>"       .LINE_FEED_CODE;
	echo "	<div class=\"label150_center\">仮登録日</div>"   .LINE_FEED_CODE;
	echo "	<div class=\"label150_center\">登録申請日</div>" .LINE_FEED_CODE;
	echo "	<div class=\"label150_center\">承認日</div>"     .LINE_FEED_CODE;
	echo "</div>".LINE_FEED_CODE;
	foreach ($user_list as $key => $value) {
		$lender_no          =  $value[COLUMN_0800015];
		$user_id            =  $value[COLUMN_0800010];
		$user_kanji         =  (strcmp("", $value[COLUMN_0800060]) != 0) ? $value[COLUMN_0800060]."　".$value[COLUMN_0800070] : "&nbsp;";
		$user_kana          =  (strcmp("", $value[COLUMN_0800080]) != 0) ? $value[COLUMN_0800080]."　".$value[COLUMN_0800090] : "&nbsp;";
		$user_address1      =  (isset($value[COLUMN_0800170]) && !is_null($value[COLUMN_0800170]) && strcmp("", $value[COLUMN_0800170]) != 0) ? $list[CONFIG_0021][$value[COLUMN_0800170]] : "&nbsp;";
		$user_status        =  (isset($value[COLUMN_0800560]) && !is_null($value[COLUMN_0800560]) && strcmp("", $value[COLUMN_0800560]) != 0) ? $list[CONFIG_0024][$value[COLUMN_0800560]] : "&nbsp;";
		$user_interim       =  (strcmp("", $value[COLUMN_0800590]) != 0) ? date(DATETIME_FORMAT, strtotime($value[COLUMN_0800590])) : "";
		$user_application   =  (strcmp("", $value[COLUMN_0800620]) != 0) ? date(DATETIME_FORMAT, strtotime($value[COLUMN_0800620])) : "";
		$user_approval      =  (strcmp("", $value[COLUMN_0800630]) != 0) ? date(DATETIME_FORMAT, strtotime($value[COLUMN_0800630])) : "";
		echo "<div id=\"horizontal\" style=\"width:1300px;\">".LINE_FEED_CODE;
		echo "	<div class=\"label100_center\" id=\"".OBJECT_ID_LNK000010."\" style=\"padding:1px 0;\"><a href=\"#\" onclick=\"linkClick('".EVENT_ID_050030040."','".$user_id."')\">".$user_id."</a></div>".LINE_FEED_CODE;
		echo "	<div><input class=\"label100_center\" type=\"text\" value=\"".$lender_no         ."\" readonly></div>".LINE_FEED_CODE;
		echo "	<div><input class=\"label150\"        type=\"text\" value=\"".$user_kanji        ."\" readonly></div>".LINE_FEED_CODE;
		echo "	<div><input class=\"label200\"        type=\"text\" value=\"".$user_kana         ."\" readonly></div>".LINE_FEED_CODE;
		echo "	<div><input class=\"label100\"        type=\"text\" value=\"".$user_address1     ."\" readonly></div>".LINE_FEED_CODE;
		echo "	<div><input class=\"label100\"        type=\"text\" value=\"".$user_status       ."\" readonly></div>".LINE_FEED_CODE;
		echo "	<div><input class=\"label150_center\" type=\"text\" value=\"".$user_interim      ."\" readonly></div>".LINE_FEED_CODE;
		echo "	<div><input class=\"label150_center\" type=\"text\" value=\"".$user_application  ."\" readonly></div>".LINE_FEED_CODE;
		echo "	<div><input class=\"label150_center\" type=\"text\" value=\"".$user_approval     ."\" readonly></div>".LINE_FEED_CODE;
		echo "</div>".LINE_FEED_CODE;
	}
}
?>
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
	<input type="hidden" id="<?php echo HIDDEN_ID_000000020 ?>" name="<?php echo HIDDEN_ID_000000020 ?>" value="">
</form>
