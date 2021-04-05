<?php $this->Html->css(    'validationEngine.jquery.css'            , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery-1.8.2.min.js'                    , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.common.js'                       , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.validationEngine.js'             , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'languages/jquery.validationEngine-ja.js', array( 'inline' => false ) ); ?>

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

<p>出資内容(確認)</p>

<?php
if (isset($validation_errors) && is_array($validation_errors)) {
	foreach ($validation_errors as $key => $values) {
		foreach ($values as $value) {
			echo '<p class="error">'.$value.'</p>';
		}
		// echo $this->Form->error('Model.'.$key);
	}
}
?>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000010 ?>" value="戻る" onclick="buttonClick('<?php echo EVENT_ID_050180010 ?>');" tabindex="1">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000020 ?>" value="決定" onclick="buttonClick('<?php echo EVENT_ID_050180020 ?>');" tabindex="2">
	</div>
	<br>
	<div id="horizontal">
		<div id="label200">ファンドID</div>
		<div><input class="label50" type="text" name="<?php echo OBJECT_ID_050170010 ?>" id="<?php echo OBJECT_ID_050170010 ?>" value="<?php echo $data[OBJECT_ID_050170010] ?>" readonly></div>
	</div>
	<div id="horizontal">
		<div id="label200">ファンド名</div>
		<div><input class="label200" type="text" name="<?php echo OBJECT_ID_050170020 ?>" id="<?php echo OBJECT_ID_050170020 ?>" value="<?php echo $data[OBJECT_ID_050170020] ?>" readonly></div>
	</div>
	<div id="horizontal">
		<div id="label200">出資番号</div>
		<div><input class="label50" type="text" name="<?php echo OBJECT_ID_050170030 ?>" id="<?php echo OBJECT_ID_050170030 ?>" value="<?php echo $data[OBJECT_ID_050170030] ?>" readonly></div>
	</div>
	<div id="horizontal">
		<div id="label200">物件</div>
		<div><input class="label200" type="text" name="<?php echo OBJECT_ID_050170040 ?>" id="<?php echo OBJECT_ID_050170040 ?>" value="<?php echo $data[OBJECT_ID_050170040] ?>" readonly></div>
	</div>
	<div id="horizontal">
		<div id="label200">出資日</div>
		<div><input class="label100_right" type="text" name="<?php echo OBJECT_ID_050170050 ?>" id="<?php echo OBJECT_ID_050170050 ?>" value="<?php echo $data[OBJECT_ID_050170050] ?>" readonly></div>
	</div>
	<div id="horizontal">
		<div id="label200">出資予定額</div>
		<div><input class="label100_right" type="text" name="<?php echo OBJECT_ID_050170060 ?>" id="<?php echo OBJECT_ID_050170060 ?>" value="<?php echo $data[OBJECT_ID_050170060] ?>" readonly></div>
	</div>
	<div id="horizontal">
		<div id="label200">出資額</div>
		<div><input class="label100_right" type="text" name="<?php echo OBJECT_ID_050170070 ?>" id="<?php echo OBJECT_ID_050170070 ?>" value="<?php echo $data[OBJECT_ID_050170070] ?>" readonly></div>
	</div>
	<div id="horizontal">
		<div id="label200">最低成立額</div>
		<div><input class="label100_right" type="text" name="<?php echo OBJECT_ID_050170080 ?>" id="<?php echo OBJECT_ID_050170080 ?>" value="<?php echo $data[OBJECT_ID_050170080] ?>" readonly></div>
	</div>
	<div id="horizontal">
		<div id="label200">予定利回り</div>
		<div><input class="label50_right" type="text" name="<?php echo OBJECT_ID_050170090 ?>" id="<?php echo OBJECT_ID_050170090 ?>" value="<?php echo $data[OBJECT_ID_050170090] ?>" readonly>%</div>
	</div>
	<div id="horizontal">
		<div id="label200">償還回数</div>
		<div><input class="label50_right" type="text" name="<?php echo OBJECT_ID_050170100 ?>" id="<?php echo OBJECT_ID_050170100 ?>" value="<?php echo $data[OBJECT_ID_050170100] ?>" readonly>回</div>
	</div>
	<div id="horizontal">
		<div id="label200">運用終了月</div>
		<div>
			<input class="label50_right" type="text" name="<?php echo OBJECT_ID_050170110 ?>" id="<?php echo OBJECT_ID_050170110 ?>" value="<?php echo $data[OBJECT_ID_050170110] ?>" readonly>年
			<input class="label50_right" type="text" name="<?php echo OBJECT_ID_050170120 ?>" id="<?php echo OBJECT_ID_050170120 ?>" value="<?php echo $data[OBJECT_ID_050170120] ?>" readonly>月
		</div>
	</div>
	<div id="horizontal">
		<div id="label200">終了日</div>
		<div><input class="label50_right" type="text" name="<?php echo OBJECT_ID_050170130 ?>" id="<?php echo OBJECT_ID_050170130 ?>" value="<?php echo $data[OBJECT_ID_050170130] ?>" readonly>日</div>
	</div>
<!--	<div id="horizontal">
		<div id="label200">保証</div>
		<div><input class="label50" type="text" name="<?php echo OBJECT_ID_050170140 ?>" id="<?php echo OBJECT_ID_050170140 ?>" value="<?php echo $list[CONFIG_0040][$data[OBJECT_ID_050170140]] ?>" readonly></div>
	</div>
	<div id="horizontal">
		<div id="label200">担保</div>
		<div><input class="label50" type="text" name="<?php echo OBJECT_ID_050170150 ?>" id="<?php echo OBJECT_ID_050170150 ?>" value="<?php echo $list[CONFIG_0040][$data[OBJECT_ID_050170150]] ?>" readonly></div>
	</div>
	<div id="horizontal">
		<div id="label200">償還方法</div>
		<div><input class="label100" type="text" name="<?php echo OBJECT_ID_050170160 ?>" id="<?php echo OBJECT_ID_050170160 ?>" value="<?php echo $list[CONFIG_0041][$data[OBJECT_ID_050170160]] ?>" readonly></div>
	</div>-->
	<br>
<?php
if (isset($data_list) && is_array($data_list) && 0 < count($data_list)) {
	$header01 = "償還予定日";
	$header02 = "償還予定額";
	$header03 = "予定償還金";
	$header04 = "予定利息";
	$header05 = "予定残償還金";
	$header06 = "予定配当額";
	$header07 = "予定報酬額";
	$header08 = "入金額";
	$header09 = "償還金";
	$header10 = "利息";
	$header11 = "その他収益";
	$header12 = "配当額";
	$header13 = "報酬額";
	echo "<div id=\"horizontal\" style=\"width:1500px;\">"     .LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">".$header01."</div>".LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">".$header02."</div>".LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">".$header03."</div>".LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">".$header04."</div>".LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">".$header05."</div>".LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">".$header06."</div>".LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">".$header07."</div>".LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">".$header08."</div>".LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">".$header09."</div>".LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">".$header10."</div>".LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">".$header11."</div>".LINE_FEED_CODE;
//	echo "	<div class=\"label100_center\">".$header12."</div>".LINE_FEED_CODE;
//	echo "	<div class=\"label100_center\">".$header13."</div>".LINE_FEED_CODE;
	echo "</div>"                                              .LINE_FEED_CODE;
	foreach ($data_list as $key => $values) {
		foreach ($values as $value) {
			$repayment_date_1   = !empty($value[COLUMN_1700050]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1700050])) : "";
			$repayment_amount_1 = !empty($value[COLUMN_1700060]) ? number_format($value[COLUMN_1700060]) : 0;
			$principal_amount_1 = !empty($value[COLUMN_1700070]) ? number_format($value[COLUMN_1700070]) : 0;
			$interest_amount_1  = !empty($value[COLUMN_1700080]) ? number_format($value[COLUMN_1700080]) : 0;
			$remaining_amount_1 = !empty($value[COLUMN_1700090]) ? number_format($value[COLUMN_1700090]) : 0;
			$dividend_amount_1  = !empty($value[COLUMN_1700100]) ? number_format($value[COLUMN_1700100]) : 0;
			$reward_amount_1    = !empty($value[COLUMN_1700110]) ? number_format($value[COLUMN_1700110]) : 0;
			$repayment_amount_2 = !empty($value[COLUMN_1700130]) ? number_format($value[COLUMN_1700130]) : 0;
			$principal_amount_2 = !empty($value[COLUMN_1700140]) ? number_format($value[COLUMN_1700140]) : 0;
			$interest_amount_2  = !empty($value[COLUMN_1700150]) ? number_format($value[COLUMN_1700150]) : 0;
			$delay_damages      = !empty($value[COLUMN_1700160]) ? number_format($value[COLUMN_1700160]) : 0;
			$dividend_amount_2  = !empty($value[COLUMN_1700170]) ? number_format($value[COLUMN_1700170]) : 0;
			$reward_amount_2    = !empty($value[COLUMN_1700190]) ? number_format($value[COLUMN_1700190]) : 0;
			echo "<div id=\"horizontal\" style=\"width:1500px;\">"                                                       .LINE_FEED_CODE;
			echo "	<div><input class=\"label100_right\" type=\"text\" value=\"".$repayment_date_1  ."\" readonly></div>".LINE_FEED_CODE;
			echo "	<div><input class=\"label100_right\" type=\"text\" value=\"".$repayment_amount_1."\" readonly></div>".LINE_FEED_CODE;
			echo "	<div><input class=\"label100_right\" type=\"text\" value=\"".$principal_amount_1."\" readonly></div>".LINE_FEED_CODE;
			echo "	<div><input class=\"label100_right\" type=\"text\" value=\"".$interest_amount_1 ."\" readonly></div>".LINE_FEED_CODE;
			echo "	<div><input class=\"label100_right\" type=\"text\" value=\"".$remaining_amount_1."\" readonly></div>".LINE_FEED_CODE;
			echo "	<div><input class=\"label100_right\" type=\"text\" value=\"".$dividend_amount_1 ."\" readonly></div>".LINE_FEED_CODE;
			echo "	<div><input class=\"label100_right\" type=\"text\" value=\"".$reward_amount_1   ."\" readonly></div>".LINE_FEED_CODE;
			echo "	<div><input class=\"label100_right\" type=\"text\" value=\"".$repayment_amount_2."\" readonly></div>".LINE_FEED_CODE;
			echo "	<div><input class=\"label100_right\" type=\"text\" value=\"".$principal_amount_2."\" readonly></div>".LINE_FEED_CODE;
			echo "	<div><input class=\"label100_right\" type=\"text\" value=\"".$interest_amount_2 ."\" readonly></div>".LINE_FEED_CODE;
			echo "	<div><input class=\"label100_right\" type=\"text\" value=\"".$delay_damages     ."\" readonly></div>".LINE_FEED_CODE;
//			echo "	<div><input class=\"label100_right\" type=\"text\" value=\"".$dividend_amount_2 ."\" readonly></div>".LINE_FEED_CODE;
//			echo "	<div><input class=\"label100_right\" type=\"text\" value=\"".$reward_amount_2   ."\" readonly></div>".LINE_FEED_CODE;
			echo "</div>"                                                                                                .LINE_FEED_CODE;
		}
	}
}
?>
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
</form>

