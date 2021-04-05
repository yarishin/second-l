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

<p class="admin-pagetitle">入金管理 > 入金照合処理</p>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000010 ?>" value="メニュー" onclick="buttonClick('<?php echo EVENT_ID_050530010 ?>');" tabindex="1">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000020 ?>" value="戻る" onclick="buttonClick('<?php echo EVENT_ID_050530020 ?>');" tabindex="2">
	</div>
<?php
if (isset($errors) && is_array($errors)) {
	foreach ($errors as $key => $values) {
		echo '<p class="error">'.$values.'</p>';
	}
}
?>		
	<div id="horizontal">
		<div id="label100">入金照合件数</div>
		<div>
			<input type="text" value="<?php echo number_format($num_matched)." 件" ?>" class="label100_right" readonly>		
		</div>
		<div id="label100">出資申込件数</div>
		<div>
			<input type="text" value="<?php echo number_format(count($data_list))." 件" ?>" class="label100_right" readonly>		
		</div>
	</div><br>
	
<?php
//print "<pre>";
//print_r ($data_list);
//print "</pre>";
if (isset($data_list) && is_array($data_list) && 0 < count($data_list)) {
	echo "<p>照合するレコードを選択し、確認ボタンを押してください。</p>";
	echo "<div id=\"horizontal\">";
	echo"	<input class=\"button\" type=\"submit\" id=\"".OBJECT_ID_BTN000030."\" value=\"確認\" onclick=\"buttonClick('".EVENT_ID_050530030."');\" tabindex=\"3\">";
	echo "</div>";
	
	echo "<div id=\"horizontal\" style=\"width:1300px;border:0px solid blue;\">"	.LINE_FEED_CODE;
	echo "	<div class=\"label50_center\">選択</div>"			.LINE_FEED_CODE;
	echo "	<div class=\"label75_center\">入金日</div>"			.LINE_FEED_CODE;
	echo "	<div class=\"label75_center\">口座番号</div>"		.LINE_FEED_CODE;
	echo "	<div class=\"label75_center\">入金額</div>"			.LINE_FEED_CODE;
	echo "	<div class=\"label150_center\">振込依頼人名</div>"	.LINE_FEED_CODE;
	echo "	<div class=\"label150_center\">ユーザ名(カナ)</div>"	.LINE_FEED_CODE;
	echo "	<div class=\"label75_center\">出資額</div>"			.LINE_FEED_CODE;
	echo "	<div class=\"label75_center\">ユーザID</div>"		.LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">ユーザ名</div>"		.LINE_FEED_CODE;
	echo "	<div class=\"label200_center\">ファンド名</div>"		.LINE_FEED_CODE;
	echo "	<div class=\"label75_center\">入金期限</div>"		.LINE_FEED_CODE;
	echo "</div>".LINE_FEED_CODE;
	
	// 確認ページにチェックされた照合レコードデータを渡すため$data_listで受け取ったレコードをすべてFormで送信する
	$count = 0;
	$tabindex = 4;
	foreach ($data_list as $key => $value) {
		$checked = !empty($value['selection']) && $value['selection'] == 1 ? "CHECKED" : "";						// 選択状態
		$deposit_date = !empty($value[COLUMN_3110020]) ? $value[COLUMN_3110020] : "&nbsp";							// 取引日
		$deposit_amount = !empty($value[COLUMN_3110030]) ? number_format((int)$value[COLUMN_3110030]) : "&nbsp";	// 入金額
		$deposit_account_number = !empty($value[COLUMN_3110040]) ? $value[COLUMN_3110040] : "&nbsp";				// 入金先口座番号
		$requester_account_name = !empty($value[COLUMN_3110050]) ? $value[COLUMN_3110050] : "&nbsp";				// 振込依頼人名
		$investment_user_id = !empty($value[COLUMN_3110080]) ? $value[COLUMN_3110080] : "&nbsp";					// 入金ユーザID
		$user_name = !empty($value[COLUMN_3110090]) ? $value[COLUMN_3110090] : "&nbsp";								// ユーザ名
		$user_name_kana = !empty($value[COLUMN_3110100]) ? $value[COLUMN_3110100] : NULL;							// ユーザ名カナ
		$fund_name = !empty($value[COLUMN_3110120]) ? $value[COLUMN_3110120] : "&nbsp";								// ファンド名
		$investment_amount = !empty($value[COLUMN_3110140]) ? number_format((int)$value[COLUMN_3110140]) : "&nbsp";	// 出資額
		$expiration_date = !empty($value[COLUMN_3110150]) ? $value[COLUMN_3110150] : "&nbsp";						// 入金期限
		
		// Hidden
		$deposit_id = !empty($value[COLUMN_3110010]) ? $value[COLUMN_3110010] : NULL;								// 入金履歴ID
		$deposit_user_id = !empty($value[COLUMN_3110060]) ? $value[COLUMN_3110060] : NULL;							// 出資申込ユーザID
		$investment_id = !empty($value[COLUMN_3110070]) ? $value[COLUMN_3110070] : NULL;							// 出資申込ID
		$fund_id = !empty($value[COLUMN_3110110]) ? $value[COLUMN_3110110] : NULL;									// ファンドID
		$application_datetime = !empty($value[COLUMN_3110130]) ? $value[COLUMN_3110130] : NULL;						// 出資申込日時
		
		// 入金レコードを照合しなかった場合(deposit_idが空、もしくはNULL)
		if(empty($value[COLUMN_3110010]) || is_null($value[COLUMN_3110010])){
			echo "<div id=\"horizontal\" style=\"width:1300px;\">".LINE_FEED_CODE;
			echo "	<div><input disabled class=\"label50_center\" type=\"checkbox\" value=\"".$count."\" ".$checked."></div>".LINE_FEED_CODE;
			echo "	<div><input disabled class=\"label75_center\" type=\"text\" value=\"".$deposit_date."\"></div>".LINE_FEED_CODE;
			echo "	<div><input disabled class=\"label75_center\" type=\"text\" value=\"".$deposit_account_number."\"></div>".LINE_FEED_CODE;
			echo "	<div><input disabled class=\"label75_right\"  type=\"text\" value=\"".$deposit_amount."\"></div>".LINE_FEED_CODE;
			echo "	<div><input disabled class=\"label150\"        type=\"text\" value=\"".$requester_account_name."\"></div>".LINE_FEED_CODE;
			echo "	<div><input disabled class=\"label150\"        type=\"text\" value=\"".$user_name_kana."\"></div>".LINE_FEED_CODE;
			echo "	<div><input disabled class=\"label75_right\"  type=\"text\" value=\"".$investment_amount."\"></div>".LINE_FEED_CODE;
			echo "	<div><input disabled class=\"label75_center\" type=\"text\" value=\"".$investment_user_id."\"></div>".LINE_FEED_CODE;
			echo "	<div><input disabled class=\"label100\"        type=\"text\" value=\"".$user_name."\"></div>".LINE_FEED_CODE;

			echo "	<div><input disabled class=\"label200\"        type=\"text\" value=\"".$fund_name."\"></div>".LINE_FEED_CODE;
			echo "	<div><input disabled class=\"label75_center\" type=\"text\" value=\"".$expiration_date."\"></div>".LINE_FEED_CODE;
			echo "</div>".LINE_FEED_CODE;

		// 入金レコードを照合した場合(deposit_idが空ではなく、NULLでもない)
		}else{	
			$array_name = "data_list[".$count."]";
			echo "<div id=\"horizontal\" style=\"width:1300px;\">".LINE_FEED_CODE;
			echo "	<div><input class=\"label50_center\" type=\"checkbox\" name=\"".$array_name."[".OBJECT_ID_050530160."]\" value=\"1\" ".$checked." tabindex=\"".$tabindex."\"></div>".LINE_FEED_CODE;
			echo "	<div><input readonly class=\"label75_center\" type=\"text\" name=\"".$array_name."[".OBJECT_ID_050530020."]\" value=\"".$deposit_date."\"></div>".LINE_FEED_CODE;
			echo "	<div><input readonly class=\"label75_center\" type=\"text\" name=\"".$array_name."[".OBJECT_ID_050530040."]\" value=\"".$deposit_account_number."\"></div>".LINE_FEED_CODE;
			echo "	<div><input readonly class=\"label75_right\"  type=\"text\" name=\"".$array_name."[".OBJECT_ID_050530030."]\" value=\"".$deposit_amount."\"></div>".LINE_FEED_CODE;
			echo "	<div><input readonly class=\"label150\"        type=\"text\" name=\"".$array_name."[".OBJECT_ID_050530050."]\" value=\"".$requester_account_name."\"></div>".LINE_FEED_CODE;
			echo "	<div><input readonly class=\"label150\"        type=\"text\" name=\"".$array_name."[".OBJECT_ID_050530100."]\" value=\"".$user_name_kana."\"></div>".LINE_FEED_CODE;
			echo "	<div><input readonly class=\"label75_right\"  type=\"text\" name=\"".$array_name."[".OBJECT_ID_050530140."]\" value=\"".$investment_amount."\"></div>".LINE_FEED_CODE;
			echo "	<div><input readonly class=\"label75_center\" type=\"text\" name=\"".$array_name."[".OBJECT_ID_050530080."]\" value=\"".$investment_user_id."\"></div>".LINE_FEED_CODE;
			echo "	<div><input readonly class=\"label100\"        type=\"text\" name=\"".$array_name."[".OBJECT_ID_050530090."]\" value=\"".$user_name."\"></div>".LINE_FEED_CODE;
			echo "	<div><input readonly class=\"label200\"        type=\"text\" name=\"".$array_name."[".OBJECT_ID_050530120."]\" value=\"".$fund_name."\"></div>".LINE_FEED_CODE;
			echo "	<div><input readonly class=\"label75_center\" type=\"text\" name=\"".$array_name."[".OBJECT_ID_050530150."]\" value=\"".$expiration_date."\"></div>".LINE_FEED_CODE;
			echo "	<div><input type=\"hidden\" name=\"".$array_name."[".OBJECT_ID_050530010."]\" value=\"".$deposit_id."\"></div>".LINE_FEED_CODE;
			echo "	<div><input type=\"hidden\" name=\"".$array_name."[".OBJECT_ID_050530060."]\" value=\"".$deposit_user_id."\"></div>".LINE_FEED_CODE;
			echo "	<div><input type=\"hidden\" name=\"".$array_name."[".OBJECT_ID_050530070."]\" value=\"".$investment_id."\"></div>".LINE_FEED_CODE;
//			echo "	<div><input type=\"hidden\" name=\"".$array_name."[".OBJECT_ID_050530100."]\" value=\"".$user_name_kana."\"></div>".LINE_FEED_CODE;
			echo "	<div><input type=\"hidden\" name=\"".$array_name."[".OBJECT_ID_050530110."]\" value=\"".$fund_id."\"></div>".LINE_FEED_CODE;
			echo "	<div><input type=\"hidden\" name=\"".$array_name."[".OBJECT_ID_050530130."]\" value=\"".$application_datetime."\"></div>".LINE_FEED_CODE;

			echo "</div>".LINE_FEED_CODE;
			$count++;
			$tabindex++;
		}
	}
	echo "	<div><input type=\"hidden\" name=\"num_matched\" value=\"".$num_matched."\"></div>".LINE_FEED_CODE;
}
?>
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
	<input type="hidden" id="<?php echo HIDDEN_ID_000000020 ?>" name="<?php echo HIDDEN_ID_000000020 ?>" value="">
</form>
