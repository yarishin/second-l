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
	$('#<?php echo OBJECT_ID_BTN000040 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
	$('#<?php echo OBJECT_ID_BTN000050 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
	$('#<?php echo OBJECT_ID_BTN000070 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
});
<?php $this->Html->scriptEnd(); ?>

<p class="admin-pagetitle">入金管理 > 入金履歴一覧</p>

<form id="form" name="form" method="post" enctype="multipart/form-data" action="<?php echo $action ?>" >
	<div id="horizontal">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000010 ?>" value="メニュー" onclick="buttonClick('<?php echo EVENT_ID_050520010 ?>');" tabindex="1">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000020 ?>" value="入金照合" onclick="buttonClick('<?php echo EVENT_ID_050520020 ?>');" tabindex="2">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000030 ?>" value="未照合履歴出力" onclick="buttonClick('<?php echo EVENT_ID_050520030 ?>');" tabindex="3">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000040 ?>" value="口座管理" onclick="buttonClick('<?php echo EVENT_ID_050520040 ?>');" tabindex="4">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000070 ?>" value="手動入金" onclick="buttonClick('<?php echo EVENT_ID_050520070 ?>');" tabindex="5">
	</div>
	
<?php
if (isset($errors) && is_array($errors)) {
	foreach ($errors as $key => $values) {
		echo '<p class="error">'.$values.'</p>';
	}
}
?>	
	<div id="horizontal"><div id="label200">入金データファイル(CSV)</div></div>
	<div id="horizontal"><div><input type="file" style="width:600px;" name="csvfile" tabindex="5"></div></div>
	<div id="horizontal"><input class="button" type="submit" id="<?php echo OBJECT_ID_BTN000050 ?>" value="アップロード" onclick="buttonClick('<?php echo EVENT_ID_050520050 ?>');" tabindex="5"></div>


<?php
if (isset($data_list) && is_array($data_list) && 0 < count($data_list)) {
	$cnt = count($data_list);
	if(isset($read_count)){
		echo "<div id=\"horizontal\"><p>ファイル(".$read_file_name.")から ".$saved_count." 件の入金データを登録しました。(読込件数:".$read_count." 件 / 登録件数:".$saved_count." 件)</p></div>"   .LINE_FEED_CODE;
	}else{
		echo "<br>";
	}

	echo "<div id=\"horizontal\"><div id=\"label150\">未照合入金履歴</div>"
		. "<div><input type=\"text\" value=\"".$cnt." 件\" class=\"label100_right\" readonly></div></div>"   .LINE_FEED_CODE;
		
	echo "<div id=\"horizontal\" style=\"width:1300px;border:0px solid blue;\">"   .LINE_FEED_CODE;
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

} else {
	echo "<div id=\"horizontal\"><div id=\"label300\">未照合入金履歴</div></div>"   .LINE_FEED_CODE;
	echo "<div id=\"horizontal\"><div id=\"label300\">未照合の入金履歴はありません。</div><div>".LINE_FEED_CODE;

}
?>
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
	<input type="hidden" id="<?php echo HIDDEN_ID_000000020 ?>" name="<?php echo HIDDEN_ID_000000020 ?>" value="">
</form>
