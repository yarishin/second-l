<?php $this->Html->script( 'jquery-1.8.2.min.js'                    , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.common.js'                       , array( 'inline' => false ) ); ?>

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
	$('#<?php echo OBJECT_ID_LNK000010 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
});
<?php $this->Html->scriptEnd(); ?>

<p class="admin-pagetitle">財産管理報告書交付対象ファンド一覧</p>

<?php
if (isset($validation_errors) && is_array($validation_errors)) {
	foreach ($validation_errors as $key => $values) {
		echo '<p class="error">'.$values.'</p>';
	}
}
?>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000010 ?>" value="確認" onclick="buttonClick('<?php echo EVENT_ID_050340010 ?>');" tabindex="1">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000020 ?>" value="一覧" onclick="buttonClick('<?php echo EVENT_ID_050340020 ?>');" tabindex="2">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000030 ?>" value="メニュー" onclick="buttonClick('<?php echo EVENT_ID_050340030 ?>');" tabindex="3">
	</div><br>
	
<?php
if (isset($data_list) && is_array($data_list) && 0 < count($data_list)) {
	$header01 = "ファンドID";
	$header02 = "ファンド名";
	$header03 = "運用年月";
	$header04 = "報告作成日";
	$header05 = "送金予定日";
	$header06 = "公開予定日";
	$header07 = "状態";
	echo "<div id=\"horizontal\">"                             .LINE_FEED_CODE;
	//echo "	<div class=\"label50_center\"><input type=\"checkbox\" name=\"allcheck\" id=\"allcheck\" onclick=\"setAllCheck(this)\"/></div>".LINE_FEED_CODE;
	echo "	<div id=\"label50_center\">　</div>".LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">".$header01."</div>".LINE_FEED_CODE;
	echo "	<div class=\"label200_center\">".$header02."</div>".LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">".$header03."</div>".LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">".$header04."</div>".LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">".$header05."</div>".LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">".$header06."</div>".LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">".$header07."</div>".LINE_FEED_CODE;
	echo "</div>"                                              .LINE_FEED_CODE;
	foreach ($data_list as $key => $value) {
		$fund_id           =  !empty($value[COLUMN_2700020]) ? $value[COLUMN_2700020] : "";
		$fund_name         =  !empty($value[COLUMN_2700030]) ? $value[COLUMN_2700030] : "";
		$report_date       = (!empty($value[COLUMN_2700040]) && !empty($value[COLUMN_2700050])) ? $value[COLUMN_2700040]."年".$value[COLUMN_2700050]."月分" : "";
		$report_input_date =  !empty($value[COLUMN_2700060]) ? date(DATE_FORMAT, strtotime($value[COLUMN_2700060])) : "";
		$remittance_date   =  !empty($value[COLUMN_2700070]) ? date(DATE_FORMAT, strtotime($value[COLUMN_2700070])) : "";
		$release_date      =  !empty($value[COLUMN_2700080]) ? date(DATE_FORMAT, strtotime($value[COLUMN_2700080])) : "";
		$report_status     =  $value[COLUMN_2700090];
		$id                =  $value[COLUMN_2700010];
		$checked = "";
		if (isset($first)) {
			$checked = CHECKED;
		}
		else {
			$checked = (isset($data[SEARCH_ID_050340010][$id])) ? CHECKED : "";

		}

		echo "<div id=\"horizontal\">".LINE_FEED_CODE;
		echo "	<div id=\"label50_center\"><input type=\"checkbox\" name=\"".SEARCH_ID_050340010."[".$id."]\" id=\"".SEARCH_ID_050340010."\" value=\"".$id."\"".$checked."/></div>".LINE_FEED_CODE;
		echo "	<div><input class=\"label100_center\" type=\"text\" value=\"".$fund_id               ."\" readonly></div>".LINE_FEED_CODE;
		echo "	<div><input class=\"label200\"        type=\"text\" value=\"".$fund_name             ."\" readonly></div>".LINE_FEED_CODE;
		echo "	<div><input class=\"label100_right\"  type=\"text\" value=\"".$report_date           ."\" readonly></div>".LINE_FEED_CODE;
		echo "	<div><input class=\"label100_right\"  type=\"text\" value=\"".$report_input_date     ."\" readonly></div>".LINE_FEED_CODE;
		echo "	<div><input class=\"label100_right\"  type=\"text\" value=\"".$remittance_date       ."\" readonly></div>".LINE_FEED_CODE;
		echo "	<div><input class=\"label100_right\"  type=\"text\" value=\"".$release_date          ."\" readonly></div>".LINE_FEED_CODE;
		echo "	<div><input class=\"label100_center\" type=\"text\" value=\"".$list[CONFIG_0061][$report_status]."\" readonly></div>".LINE_FEED_CODE;
		echo "</div>".LINE_FEED_CODE;
	}
}
?>
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
</form>
