

<?php $this->Html->script( 'jquery-1.8.2.min.js' , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.common.js'    , array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
function userIdClick(eventId, userId) {
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

<p>出資申込一覧</p>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000010 ?>" value="戻る" onclick="buttonClick('<?php echo EVENT_ID_050090010 ?>');" tabindex="13">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000020 ?>" value="決定" onclick="buttonClick('<?php echo EVENT_ID_050090020 ?>');" tabindex="13">
	</div>
	<br>
	
<?php
if (isset($data_list) && is_array($data_list) && 0 < count($data_list)) {
	$header01 = "出資家ID";
	$header02 = "出資家名";
	$header03 = "出資家名カナ";
	$header04 = "ファンド名";
	$header05 = "出資申込日時";
	$header06 = "出資額";
	$header07 = "入金期限";
	$header77 = "入金日";
	$header08 = "状態";
	echo '<div id="horizontal" style="width:1500px;border:0px solid blue;">'.LINE_FEED_CODE;
	echo '	<div class="label100_center">'.$header01.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label150_center">'.$header02.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label150_center">'.$header03.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label200_center">'.$header04.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label200_center">'.$header05.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label100_center">'.$header06.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label100_center">'.$header07.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label100_center">'.$header77.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label100_center">'.$header08.'</div>'.LINE_FEED_CODE;
	echo '</div>'.LINE_FEED_CODE;
	$count = 0;
	foreach ($data_list as $key => $values) {
		foreach ($values as $value) {
			$count++;
			$id             = !empty($value[COLUMN_1200010]) ? $value[COLUMN_1200010] : "";
			$user_id        = !empty($value[COLUMN_1200020]) ? $value[COLUMN_1200020] : "";
			$user_name      = !empty($value[COLUMN_1200030]) ? $value[COLUMN_1200030] : "";
			$user_name_kana = !empty($value[COLUMN_1200035]) ? $value[COLUMN_1200035] : "";
			$fund_id        = !empty($value[COLUMN_1200040]) ? $value[COLUMN_1200040] : "";
			$fund_name      = !empty($value[COLUMN_1200050]) ? $value[COLUMN_1200050] : "";
			$inv_datetime   = !empty($value[COLUMN_1200060]) ? date(DATETIME_FORMAT, strtotime($value[COLUMN_1200060])) : "";
			$inv_amount     = !empty($value[COLUMN_1200070]) ? number_format($value[COLUMN_1200070]) : "";
			$exp_date       = !empty($value[COLUMN_1200080]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1200080])) : "";
			$deposit_date   = !empty($value[COLUMN_1200190]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1200190])) : "";
			$inv_status     = $list[CONFIG_0034][$value[HIDDEN_ID_000000160]];
			
			echo '<div id="horizontal" style="width:1500px;border:0px solid blue;">'.LINE_FEED_CODE;
			echo '	<div><input class="label100_center" type="text" value="'.$user_id        .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input class="label150"        type="text" value="'.$user_name      .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input class="label150"        type="text" value="'.$user_name_kana .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input class="label200"        type="text" value="'.$fund_name      .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input class="label200_right"  type="text" value="'.$inv_datetime   .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input class="label100_right"  type="text" value="'.$inv_amount     .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input class="label100_right"  type="text" value="'.$exp_date       .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input class="label100_right"  type="text" value="'.$deposit_date   .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input class="label100_center" type="text" value="'.$inv_status     .'" readonly></div>'.LINE_FEED_CODE;
			echo '</div>'.LINE_FEED_CODE;
		}
	}
}
?>
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
	<input type="hidden" id="<?php echo HIDDEN_ID_000000020 ?>" name="<?php echo HIDDEN_ID_000000020 ?>" value="">
</form>
