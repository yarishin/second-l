<?php
$account_count = 0;
if (isset($account_list) && is_array($account_list) && 0 < count($account_list)) {
	$account_count = count($account_list);
}
?>

<?php $this->Html->script( 'jquery-1.8.2.min.js' , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.common.js'    , array( 'inline' => false ) ); ?>

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

<p class="admin-pagetitle">入金管理 > 入金口座一覧</p>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000010 ?>" value="メニュー" onclick="buttonClick('<?php echo EVENT_ID_050510010 ?>');" tabindex="1">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000020 ?>" value="戻る" onclick="buttonClick('<?php echo EVENT_ID_050510020 ?>');" tabindex="2">
	</div>
<?php
if (isset($errors) && is_array($errors)) {
	foreach ($errors as $key => $values) {
		echo '<p class="error">'.$values.'</p>';
	}
}
?>
		
	<div id="horizontal">
		<div id="label150">出資家名(漢字)</div>
		<div>
			<input type="text" name="<?php echo SEARCH_ID_050510010 ?>" id="<?php echo SEARCH_ID_050510010 ?>" value="<?php echo $data[SEARCH_ID_050510010] ?>" class="text100" tabindex="3">
		</div>
	</div>
	<div id="horizontal">
		<div id="label150">出資家名(カナ)</div>
		<div>
			<input type="text" name="<?php echo SEARCH_ID_050510020 ?>" id="<?php echo SEARCH_ID_050510020 ?>" value="<?php echo $data[SEARCH_ID_050510020] ?>" class="text100" tabindex="4">
		</div>
	</div>
	<div id="horizontal">
		<div id="label150">ユーザID</div>
		<div>
			<input type="text" name="<?php echo SEARCH_ID_050510030 ?>" id="<?php echo SEARCH_ID_050510030 ?>" value="<?php echo $data[SEARCH_ID_050510030] ?>" class="text100" tabindex="5">
		</div>
	</div>

	<div id="horizontal">
		<div id="label150">口座番号</div>
		<div>
			<input type="text" name="<?php echo SEARCH_ID_050510040 ?>" id="<?php echo SEARCH_ID_050510040 ?>" value="<?php echo $data[SEARCH_ID_050510040] ?>" class="text100" tabindex="6">
		</div>
	</div>
	
	<div id="horizontal">
		<div id="label150">表示中件数</div>
		<div>
			<input type="text" value="<?php echo number_format($account_count)." 件" ?>" class="label100_right" readonly>		
		</div>
	</div>
	
	<div id="horizontal">
		<input class="button" type="submit" id="<?php echo OBJECT_ID_BTN000030 ?>" value="絞込み" onclick="buttonClick('<?php echo EVENT_ID_050510030 ?>');" tabindex="7">
	</div>
	<br>
	
<?php
if (isset($account_list) && is_array($account_list) && 0 < count($account_list)) {
	echo "<div id=\"horizontal\" style=\"width:1300px;border:0px solid blue;\">"	.LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">支店番号</div>"							.LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">支店名</div>"							.LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">口座番号</div>"							.LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">ユーザID</div>"							.LINE_FEED_CODE;
	echo "	<div class=\"label150_center\">ユーザ名</div>"							.LINE_FEED_CODE;
	echo "	<div class=\"label150_center\">割当日</div>"							.LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">最終更新者ID</div>"					.LINE_FEED_CODE;
	echo "</div>".LINE_FEED_CODE;
	
	foreach ($account_list as $key => $value) {
		$branch_code = $value[COLUMN_2900060];
		$branch_name = $value[COLUMN_2900070];
		$account_number = $value[COLUMN_2900100];
		$user_id = $value[COLUMN_2900150];
		$user_name = $value[COLUMN_2900160];
		$assignment_date = $value[COLUMN_2900180];
		$admin_id = $value[COLUMN_2900190];
		echo "<div id=\"horizontal\" style=\"width:1300px;\">".LINE_FEED_CODE;
		echo "	<div><input class=\"label100_center\" type=\"text\" value=\"".$branch_code        ."\" readonly></div>".LINE_FEED_CODE;
		echo "	<div><input class=\"label100\"        type=\"text\" value=\"".$branch_name         ."\" readonly></div>".LINE_FEED_CODE;
		echo "	<div><input class=\"label100_center\" type=\"text\" value=\"".$account_number       ."\" readonly></div>".LINE_FEED_CODE;
		echo "	<div><input class=\"label100_center\" type=\"text\" value=\"".$user_id  ."\" readonly></div>".LINE_FEED_CODE;
		echo "	<div><input class=\"label150\"        type=\"text\" value=\"".$user_name  ."\" readonly></div>".LINE_FEED_CODE;
		echo "	<div><input class=\"label150_center\" type=\"text\" value=\"".$assignment_date     ."\" readonly></div>".LINE_FEED_CODE;
		echo "	<div><input class=\"label100_center\" type=\"text\" value=\"".$admin_id     ."\" readonly></div>".LINE_FEED_CODE;
		echo "</div>".LINE_FEED_CODE;
	}
}
?>
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
	<input type="hidden" id="<?php echo HIDDEN_ID_000000020 ?>" name="<?php echo HIDDEN_ID_000000020 ?>" value="">
</form>
