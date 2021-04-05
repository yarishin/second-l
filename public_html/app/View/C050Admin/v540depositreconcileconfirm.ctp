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

<p>入金管理 > 入金照合確認</p>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000010 ?>" value="メニュー" onclick="buttonClick('<?php echo EVENT_ID_050540010 ?>');" tabindex="1">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000020 ?>" value="戻る" onclick="buttonClick('<?php echo EVENT_ID_050540020 ?>');" tabindex="2">
	</div><br>
	
<?php
if (isset($data_list) && is_array($data_list) && 0 < count($data_list)) {
	echo "    <p>以下の出資申込を承認し、入金レコードを照合済にします。</p>".LINE_FEED_CODE;
	echo "    <div id=\"horizontal\">".LINE_FEED_CODE;
	echo "        <input class=\"button\" type=\"button\" id=\"".OBJECT_ID_BTN000030."\" value=\"決定\" onclick=\"buttonClick('".EVENT_ID_050540030."');\" tabindex=\"3\">".LINE_FEED_CODE;
	echo "    </div>".LINE_FEED_CODE;
	
	echo "<div id=\"horizontal\" style=\"width:1300px;border:0px solid blue;\">"	.LINE_FEED_CODE;
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
	
	foreach ($data_list as $key => $value) {
		$deposit_date = $value[OBJECT_ID_050530020];			// 取引日
		$deposit_account_number = $value[OBJECT_ID_050530040];	// 入金先口座番号
		$requester_account_name = $value[OBJECT_ID_050530050];	// 振込依頼人名
		$deposit_amount = $value[OBJECT_ID_050530030];			// 入金額
		$investment_amount = $value[OBJECT_ID_050530140];		// 出資額
		$user_id = $value[OBJECT_ID_050530060];					// 入金ユーザID
		$user_name = $value[OBJECT_ID_050530090];				// ユーザ名
		$user_name_kana = $value[OBJECT_ID_050530100];			// ユーザ名カナ
		$fund_name = $value[OBJECT_ID_050530120];				// ファンド名
		$expiration_date = $value[OBJECT_ID_050530150];			// 入金期限

		echo "<div id=\"horizontal\" style=\"width:1300px;\">".LINE_FEED_CODE;
		echo "	<div><input readonly class=\"label75_center\" type=\"text\" value=\"".$deposit_date."\"></div>".LINE_FEED_CODE;
		echo "	<div><input readonly class=\"label75_center\" type=\"text\" value=\"".$deposit_account_number."\"></div>".LINE_FEED_CODE;
		echo "	<div><input readonly class=\"label75_right\"  type=\"text\" value=\"".$deposit_amount."\"></div>".LINE_FEED_CODE;
		echo "	<div><input readonly class=\"label150\"        type=\"text\" value=\"".$requester_account_name."\"></div>".LINE_FEED_CODE;
		echo "	<div><input readonly class=\"label150\"        type=\"text\" value=\"".$user_name_kana."\"></div>".LINE_FEED_CODE;
		echo "	<div><input readonly class=\"label75_right\"  type=\"text\" value=\"".$investment_amount."\"></div>".LINE_FEED_CODE;
		echo "	<div><input readonly class=\"label75_center\" type=\"text\" value=\"".$user_id."\"></div>".LINE_FEED_CODE;
		echo "	<div><input readonly class=\"label100\"        type=\"text\" value=\"".$user_name."\"></div>".LINE_FEED_CODE;
		echo "	<div><input readonly class=\"label200\"        type=\"text\" value=\"".$fund_name."\"></div>".LINE_FEED_CODE;
		echo "	<div><input readonly class=\"label75_center\" type=\"text\" value=\"".$expiration_date."\"></div>".LINE_FEED_CODE;
		echo "</div>".LINE_FEED_CODE;
	}
}elseif(!empty($result_count) && isset($result_count)){
	echo "    <p>".$result_count."件の入金履歴を照合しました。</p>".LINE_FEED_CODE;
}
?>
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
	<input type="hidden" id="<?php echo HIDDEN_ID_000000020 ?>" name="<?php echo HIDDEN_ID_000000020 ?>" value="">
</form>