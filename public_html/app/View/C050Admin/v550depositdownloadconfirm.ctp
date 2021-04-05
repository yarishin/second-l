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
});
<?php $this->Html->scriptEnd(); ?>

<p class="admin-pagetitle">入金管理 > 未照合履歴出力確認</p>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000010 ?>" value="メニュー" onclick="buttonClick('<?php echo EVENT_ID_050550010 ?>');" tabindex="1">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000020 ?>" value="戻る" onclick="buttonClick('<?php echo EVENT_ID_050550020 ?>');" tabindex="2">
	</div><br>
	
<?php
if (isset($errors) && is_array($errors)) {
	foreach ($errors as $key => $values) {
		echo '<p class="error">'.$values.'</p>';
	}
}
if (isset($data_list) && is_array($data_list) && 0 < count($data_list)) {
	echo "    <p>以下の未照合入金履歴をCSV出力し、照合済(手動)にします。</p>".LINE_FEED_CODE;
	echo "    <div id=\"horizontal\">".LINE_FEED_CODE;
	echo "        <input class=\"button\" type=\"button\" id=\"".OBJECT_ID_BTN000030."\" value=\"決定\" onclick=\"buttonClick('".EVENT_ID_050550030."');\" tabindex=\"3\">".LINE_FEED_CODE;
	echo "    </div>".LINE_FEED_CODE;
	
	echo "<div id=\"horizontal\" style=\"width:1300px;border:0px solid blue;\">"	.LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">取引日</div>"   .LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">入金額</div>"   .LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">支店番号</div>" .LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">口座番号</div>" .LINE_FEED_CODE;
	echo "	<div class=\"label200\">依頼人名</div>"        .LINE_FEED_CODE;
	echo "	<div class=\"label100\">ユーザID</div>"        .LINE_FEED_CODE;
	echo "	<div class=\"label100\">ユーザ名</div>"        .LINE_FEED_CODE;
	echo "	<div class=\"label150_center\">入力日時</div>" .LINE_FEED_CODE;
    echo "</div>".LINE_FEED_CODE;
	
	foreach ($data_list as $key => $value) {
		$deposit_date				= $value[COLUMN_3100040];	// deposit_date: 取引日
		$deposit_amount				= $value[COLUMN_3100050];	// deposit_amount: 入金額
		$deposit_branch_code		= $value[COLUMN_3100060];	// deposit_branch_code: 支店番号
		$deposit_account_number		= $value[COLUMN_3100070];	// deposit_account_number: 口座番号
		$requester_account_name		= $value[COLUMN_3100080];	// requester_account_name: 振込依頼人名
		$user_id					= $value[COLUMN_3100110];	// user_id: ユーザID
		$user_name					= $value[COLUMN_3100120];	// user_name: ユーザ名
		$date_time					= $value[COLUMN_3100020];	// date_time: 入力日時
		echo "<div id=\"horizontal\" style=\"width:1300px;\">".LINE_FEED_CODE;
		echo "	<div><input class=\"label100_center\"	type=\"text\" value=\"".$deposit_date."\" readonly></div>"							.LINE_FEED_CODE;
		echo "	<div><input class=\"label100_right\"	type=\"text\" value=\"".number_format((int)$deposit_amount)."\" readonly></div>"	.LINE_FEED_CODE;
		echo "	<div><input class=\"label100_center\"	type=\"text\" value=\"".$deposit_branch_code."\" readonly></div>"					.LINE_FEED_CODE;
		echo "	<div><input class=\"label100_center\"	type=\"text\" value=\"".$deposit_account_number."\" readonly></div>"				.LINE_FEED_CODE;
		echo "	<div><input class=\"label200\"			type=\"text\" value=\"".$requester_account_name."\" readonly></div>"				.LINE_FEED_CODE;
		echo "	<div><input class=\"label100_center\"	type=\"text\" value=\"".$user_id."\" readonly></div>"								.LINE_FEED_CODE;
		echo "	<div><input class=\"label100\"			type=\"text\" value=\"".$user_name."\" readonly></div>"								.LINE_FEED_CODE;
		echo "	<div><input class=\"label150_center\"	type=\"text\" value=\"".$date_time."\" readonly></div>"								.LINE_FEED_CODE;
		echo "</div>".LINE_FEED_CODE;
	}
}elseif(!empty($result_count) && isset($result_count)){
	echo "    <p>".$result_count."件の入金履歴をダウンロードし、照合済(手動)にしました。</p>".LINE_FEED_CODE;
}
?>
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
	<input type="hidden" id="<?php echo HIDDEN_ID_000000020 ?>" name="<?php echo HIDDEN_ID_000000020 ?>" value="">
</form>