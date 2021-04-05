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

<p class="admin-pagetitle">報告書発行対象ファンド一覧</p>

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
	$header03 = "報告年月";
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
	foreach ($data_list as $key => $values) {
		foreach ($values as $value) {
			$fund_id           =  !empty($value[COLUMN_2000010]) ? $value[COLUMN_2000010] : "";
			$fund_name         =  !empty($value[COLUMN_2000020]) ? $value[COLUMN_2000020] : "";
			$report_date       = (!empty($value[COLUMN_2000030]) && !empty($value[COLUMN_2000040])) ? $value[COLUMN_2000030]."年".$value[COLUMN_2000040]."月分" : "";
			$report_input_date =  !empty($value[COLUMN_2000050]) ? date(DATE_FORMAT, strtotime($value[COLUMN_2000050])) : "";
			$remittance_date   =  !empty($value[COLUMN_2000055]) ? date(DATE_FORMAT, strtotime($value[COLUMN_2000055])) : "";
			$release_date      =  !empty($value[COLUMN_2000060]) ? date(DATE_FORMAT, strtotime($value[COLUMN_2000060])) : "";
			$report_status     =  $value[COLUMN_2000070];
			$id                =  $value[COLUMN_2000000];
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
}
?>
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
</form>
