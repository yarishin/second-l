<?php $this->Html->css('validationEngine.jquery.css', array('inline' => false)); ?>
<?php $this->Html->script( 'jquery-1.8.2.min.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.validationEngine.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'languages/jquery.validationEngine-ja.js', array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
function userIdClick(eventId, fundId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.getElementById('<?php echo HIDDEN_ID_000000020 ?>').value = fundId;
	document.form.submit();
}

function setDateTime($obj) {
	if ("" == $obj.value) {
		$obj.value = "<?php echo date(DATE_FORMAT) ?>";
	}
}

jQuery(document).ready(function(){
   jQuery("#form").validationEngine();
});
<?php $this->Html->scriptEnd(); ?>

<p class="admin-pagetitle">償還予定一覧</p>

<?php
if (isset($validation_errors) && is_array($validation_errors)) {
	foreach ($validation_errors as $key => $values) {
		echo '<p class="error">'.$values.'</p>';
	}
}
?>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" value="メニュー" onclick="buttonClick('<?php echo EVENT_ID_050190010 ?>');">
	</div>
	<div id="horizontal">
		<div id="label100">償還予定日</div>
		<div>
			<input type="text" name="<?php echo SEARCH_ID_050190010 ?>" id="<?php echo SEARCH_ID_050190010 ?>" value="<?php echo $data[SEARCH_ID_050190010] ?>" class="text50" tabindex="1">年
			<input type="text" name="<?php echo SEARCH_ID_050190020 ?>" id="<?php echo SEARCH_ID_050190020 ?>" value="<?php echo $data[SEARCH_ID_050190020] ?>" class="text50" tabindex="2">月
		</div>
	</div>
	<div id="horizontal">
		<div id="label100">ファンドID</div>
			<input type="text" name="<?php echo SEARCH_ID_050190030 ?>" id="<?php echo SEARCH_ID_050190030 ?>" value="<?php echo $data[SEARCH_ID_050190030] ?>" class="text100" tabindex="3">
		</div>
	</div>
	<div id="horizontal">
		<div id="label100"> ソート項目</div>
		<div><select id="<?php echo SEARCH_ID_050190040 ?>" name="<?php echo SEARCH_ID_050190040 ?>" class="" tabindex="4">
			<?php foreach($list[CONFIG_0037] as $key => $value): ?>
				<?php $selected1 = (strcmp($key, $data[SEARCH_ID_050190040]) == 0) ? "selected" : "" ?>
				<option value="<?php echo $key ?>" <?php echo $selected1 ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<div id="horizontal">
		<div id="label100"> ソート順</div>
		<div><select id="<?php echo SEARCH_ID_050190050 ?>" name="<?php echo SEARCH_ID_050190050 ?>" class="" tabindex="5">
			<?php foreach($list[CONFIG_0029] as $key => $value): ?>
				<?php $selected2 = (strcmp($key, $data[SEARCH_ID_050190050]) == 0) ? "selected" : "" ?>
				<option value="<?php echo $key ?>" <?php echo $selected2 ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<div id="horizontal">
		<input class="button" type="submit" value="絞込み" onclick="buttonClick('<?php echo EVENT_ID_050190020 ?>');">
		<input class="button" type="button" value="今月分" onclick="buttonClick('<?php echo EVENT_ID_050190030 ?>');">
		<input class="button" type="button" value="遅延"   onclick="buttonClick('<?php echo EVENT_ID_050190040 ?>');">
		<input class="button" type="button" value="確認"   onclick="buttonClick('<?php echo EVENT_ID_050190050 ?>');"<?php echo isset($data[OBJECT_ID_050190050."1"]) ? "" : DISABLED; ?>>
	</div>
	<br>
	
<?php
if (isset($data) && is_array($data)) {
	echo '<div id="horizontal" style="width:1400px;border:0px solid blue;">';
	echo '	<div class="label100_center">ファンドID</div>';
	echo '	<div class="label200_center">ファンド名</div>';
	echo '	<div class="label100_center">物件番号</div>';
	//*echo '	<div class="label100_center">償還予定日</div>';
	//*echo '	<div class="label100_center">償還予定額</div>';
	echo '	<div class="label100_center">予定償還金</div>';
	//*echo '	<div class="label100_center">予定利息額</div>';
	echo '	<div class="label100_center">入金日</div>';
	echo '	<div class="label100_center">償還金</div>';
	echo '	<div class="label100_center">配当額</div>';
	echo '	<div class="label100_center">その他収益</div>';
	echo '</div>';
	$count = 1;
	$tabindex =	6;
while (isset($data[OBJECT_ID_050190050.$count])) {

		$fund_id            = $data[OBJECT_ID_050190060.$count];
		$fund_name          = $data[OBJECT_ID_050190070.$count];
		$id                 = $data[OBJECT_ID_050190050.$count];
		$loan_no            = $data[OBJECT_ID_050190080.$count];
		$seq_no             = $data[OBJECT_ID_050190130.$count];
		$repayment_date_1   = date(DATE_FORMAT, strtotime($data[OBJECT_ID_050190090.$count]));
		$repayment_amount_1 = empty($data[OBJECT_ID_050190100.$count]) ? 0 : number_format(str_replace(",", "", $data[OBJECT_ID_050190100.$count]));
		$principal_amount_1 = empty($data[OBJECT_ID_050190110.$count]) ? 0 : number_format(str_replace(",", "", $data[OBJECT_ID_050190110.$count]));
		$interest_amount_1  = empty($data[OBJECT_ID_050190120.$count]) ? 0 : number_format(str_replace(",", "", $data[OBJECT_ID_050190120.$count]));
		$repayment_date_2   = empty($data[OBJECT_ID_050190010.$count]) ? "" : date(DATE_FORMAT, strtotime($data[OBJECT_ID_050190010.$count]));
		$principal_amound_2 = $data[OBJECT_ID_050190020.$count];
		$interest_amount_2  = $data[OBJECT_ID_050190030.$count];
		$delay_damages      = $data[OBJECT_ID_050190040.$count];
		
		$div_datetime_2     = empty($data[OBJECT_ID_050190140.$count]) ? "" : date(DATETIME_FORMAT, strtotime($data[OBJECT_ID_050190140.$count]));
		
		$css_class          = empty($data[OBJECT_ID_050190140.$count]) ? 'text100_right' : 'label100_right';
		$readonly           = empty($data[OBJECT_ID_050190140.$count]) ? '' : READONLY;
		$tabindex_tag_1     = empty($data[OBJECT_ID_050190140.$count]) ? ' tabindex="'.$tabindex++.'"' : '';
		$tabindex_tag_2     = empty($data[OBJECT_ID_050190140.$count]) ? ' tabindex="'.$tabindex++.'"' : '';
		$tabindex_tag_3     = empty($data[OBJECT_ID_050190140.$count]) ? ' tabindex="'.$tabindex++.'"' : '';
		$tabindex_tag_4     = empty($data[OBJECT_ID_050190140.$count]) ? ' tabindex="'.$tabindex++.'"' : '';
		
		echo '<div id="horizontal" style="width:1400px;border:0px solid blue;">'.LINE_FEED_CODE;
		echo '	<div class="label100_center"><a href="'.URL_SITE_TOP.REDIRECT_C050."/".REDIRECT_A050160."?".GET_PARAM_INDEX_FUND_ID."=".$fund_id."&".GET_PARAM_INDEX_LOAN_NO."=".$loan_no.'" target=\"blank\">&nbsp;'.$fund_id.'&nbsp;</a></div>'.LINE_FEED_CODE;
		echo '	<div><input type="text" class="label200"        id="'.OBJECT_ID_050190070.$count.'" name="'.OBJECT_ID_050190070.$count.'" value="'.$fund_name         .'" readonly></div>'.LINE_FEED_CODE;
		echo '	<div><input type="text" class="label100_center" id="'.OBJECT_ID_050190080.$count.'" name="'.OBJECT_ID_050190080.$count.'" value="'.$loan_no           .'" readonly></div>'.LINE_FEED_CODE;
		//*echo '	<div><input type="text" class="label100_center" id="'.OBJECT_ID_050190090.$count.'" name="'.OBJECT_ID_050190090.$count.'" value="'.$repayment_date_1  .'" readonly></div>'.LINE_FEED_CODE;
		//*echo '	<div><input type="text" class="label100_right"  id="'.OBJECT_ID_050190100.$count.'" name="'.OBJECT_ID_050190100.$count.'" value="'.$repayment_amount_1.'" readonly></div>'.LINE_FEED_CODE;
		echo '	<div><input type="text" class="label100_right"  id="'.OBJECT_ID_050190110.$count.'" name="'.OBJECT_ID_050190110.$count.'" value="'.$principal_amount_1.'" readonly></div>'.LINE_FEED_CODE;
		//*echo '	<div><input type="text" class="label100_right"  id="'.OBJECT_ID_050190120.$count.'" name="'.OBJECT_ID_050190120.$count.'" value="'.$interest_amount_1 .'" readonly></div>'.LINE_FEED_CODE;
		
		echo '	<input type="text" class="'.$css_class.'" id="'.OBJECT_ID_050190010.$count.'" name="'.OBJECT_ID_050190010.$count.'" value="'.$repayment_date_2  .'" onclick="setDateTime(this)"'.$tabindex_tag_1.$readonly.'>'.LINE_FEED_CODE;
		echo '	<input type="text" class="'.$css_class.'" id="'.OBJECT_ID_050190020.$count.'" name="'.OBJECT_ID_050190020.$count.'" value="'.$principal_amound_2.'"'.$tabindex_tag_2.$readonly.'>'.LINE_FEED_CODE;
		echo '	<input type="text" class="'.$css_class.'" id="'.OBJECT_ID_050190030.$count.'" name="'.OBJECT_ID_050190030.$count.'" value="'.$interest_amount_2 .'"'.$tabindex_tag_3.$readonly.'>'.LINE_FEED_CODE;
		echo '	<input type="text" class="'.$css_class.'" id="'.OBJECT_ID_050190040.$count.'" name="'.OBJECT_ID_050190040.$count.'" value="'.$delay_damages     .'"'.$tabindex_tag_4.$readonly.'>'.LINE_FEED_CODE;
		echo '	<div><input type="hidden" id="'.OBJECT_ID_050190050.$count.'" name="'.OBJECT_ID_050190050.$count.'" value="'.$id     .'"></div>'.LINE_FEED_CODE;
		echo '	<div><input type="hidden" id="'.OBJECT_ID_050190060.$count.'" name="'.OBJECT_ID_050190060.$count.'" value="'.$fund_id.'"></div>'.LINE_FEED_CODE;
		echo '	<div><input type="hidden" id="'.OBJECT_ID_050190130.$count.'" name="'.OBJECT_ID_050190130.$count.'" value="'.$seq_no .'"></div>'.LINE_FEED_CODE;
		echo '	<div><input type="hidden" id="'.OBJECT_ID_050190140.$count.'" name="'.OBJECT_ID_050190140.$count.'" value="'.$div_datetime_2 .'"></div>'.LINE_FEED_CODE;
		echo '</div>'.LINE_FEED_CODE;
		
		$count++;
	}
}
?>
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
	<input type="hidden" id="<?php echo HIDDEN_ID_000000020 ?>" name="<?php echo HIDDEN_ID_000000020 ?>" value="">
</form>
