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
});
<?php $this->Html->scriptEnd(); ?>

<p>財産管理報告書交付(確認)</p>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000010 ?>" value="戻る" onclick="buttonClick('<?php echo EVENT_ID_050350010 ?>');" tabindex="1">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000020 ?>" value="決定" onclick="buttonClick('<?php echo EVENT_ID_050350020 ?>');" tabindex="2">
	</div><br>
	
<?php
if (isset($data_list) && is_array($data_list) && 0 < count($data_list)) {
	$header01 = "ファンドID";
	$header02 = "ファンド名";
	$header03 = "運用年月";
	$header04 = "報告作成日";
	$header05 = "送金予定日";
	$header06 = "交付予定日";
	$header07 = "状態";
	echo "<div id=\"horizontal\">"                             .LINE_FEED_CODE;
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
		$report_status     =  !is_null($value[COLUMN_2700090]) ? $value[COLUMN_2700090] : 1;

		echo "<div id=\"horizontal\">".LINE_FEED_CODE;
		//echo "	<div class=\"label100\" id=\"".OBJECT_ID_LNK000010."\"><a href=\"#\" onclick=\"linkClick('".EVENT_ID_050110040."','".$fund_id."')\">".$fund_id."</a></div>".LINE_FEED_CODE;
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
