<?php $this->Html->css('validationEngine.jquery.css', array('inline' => false)); ?>
<?php $this->Html->script( 'jquery-1.8.2.min.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.validationEngine.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'languages/jquery.validationEngine-ja.js', array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}

function setDateTime($obj) {
	$obj.value = "<?php echo date(DATETIME_FORMAT) ?>";
}

jQuery(document).ready(function(){
   jQuery("#form").validationEngine();
});
<?php $this->Html->scriptEnd(); ?>

<p class="admin-pagetitle">配当実行</p>

<?php
if (isset($validation_errors) && is_array($validation_errors)) {
	foreach ($validation_errors as $key => $values) {
		echo '<p class="error">'.$values.'</p>';
	}
}
?>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="submit" value="確認" onclick="buttonClick('<?php echo EVENT_ID_050220020 ?>');" tabindex="17">
		<input class="button" type="submit" value="メニュー" onclick="buttonClick('<?php echo EVENT_ID_050220010 ?>');" tabindex="17">
	</div>
	
<?php
if (isset($data_list) && is_array($data_list) && count($data_list)) {
	echo '<div id="horizontal" style="width:1200px;border:0px solid blue;">'.LINE_FEED_CODE;
	echo '	<div class="label100_center">ファンドID</div>'.LINE_FEED_CODE;
	echo '	<div class="label200_center">ファンド名</div>'.LINE_FEED_CODE;
	echo '	<div class="label100_center">報酬率(%)</div>'.LINE_FEED_CODE;
	echo '	<div class="label100_center">償還予定額</div>'.LINE_FEED_CODE;
	echo '	<div class="label100_center">配当予定額</div>'.LINE_FEED_CODE;
	echo '	<div class="label100_center">入金額</div>'.LINE_FEED_CODE;
	echo '	<div class="label100_center">営業者報酬額</div>'.LINE_FEED_CODE;
	echo '	<div class="label100_center">出資金償還額</div>'.LINE_FEED_CODE;
	echo '	<div class="label100_center">配当額</div>'.LINE_FEED_CODE;
	echo '	<div style="width:170px;"></div>'.LINE_FEED_CODE;
	echo '</div>'.LINE_FEED_CODE;
	$count = 0;
	foreach ($data_list as $key => $values) {

		$count++;
		
		$fund_id             =  $values[OBJECT_ID_050220040];
		$fund_name           =  $values[OBJECT_ID_050220050];
		$admin_yield         =  empty($values[OBJECT_ID_050220170]) ? 0 : $values[OBJECT_ID_050220170];
		$repayment_amount_1  =  empty($values[OBJECT_ID_050220080]) ? 0 : number_format($values[OBJECT_ID_050220080]);
		$dividend_amount_1   =  empty($values[OBJECT_ID_050220100]) ? 0 : number_format($values[OBJECT_ID_050220100]);
		$repayment_amount_2  =  empty($values[OBJECT_ID_050220110]) ? 0 : number_format($values[OBJECT_ID_050220110]);
		$reward_amount_2     =  empty($values[OBJECT_ID_050220150]) ? 0 : number_format($values[OBJECT_ID_050220150]);
		$principal_amount    =  empty($values[OBJECT_ID_050220180]) ? 0 : number_format($values[OBJECT_ID_050220180]);
		$dividend_amount_2   =  empty($values[OBJECT_ID_050220130]) ? 0 : number_format($values[OBJECT_ID_050220130]);
		$checked             =  isset($data[OBJECT_ID_050220200.$count]) ? CHECKED : "";
		
		echo '<div id="horizontal" style="width:1200px;border:0px solid blue;">'.LINE_FEED_CODE;
		echo '	<div><input type="text" class="label100_center" value="'.$fund_id            .'" readonly></div>'.LINE_FEED_CODE;
		echo '	<div><input type="text" class="label200"        value="'.$fund_name          .'" readonly></div>'.LINE_FEED_CODE;
		echo '	<div><input type="text" class="label100_right"  value="'.$admin_yield        .'" readonly></div>'.LINE_FEED_CODE;
		echo '	<div><input type="text" class="label100_right"  value="'.$repayment_amount_1 .'" readonly></div>'.LINE_FEED_CODE;
		echo '	<div><input type="text" class="label100_right"  value="'.$dividend_amount_1  .'" readonly></div>'.LINE_FEED_CODE;
		echo '	<div><input type="text" class="label100_right"  value="'.$repayment_amount_2 .'" readonly></div>'.LINE_FEED_CODE;
		echo '	<div><input type="text" class="label100_right"  value="'.$reward_amount_2    .'" readonly></div>'.LINE_FEED_CODE;
		echo '	<div><input type="text" class="label100_right"  value="'.$principal_amount   .'" readonly></div>'.LINE_FEED_CODE;
		echo '	<div><input type="text" class="label100_right"  value="'.$dividend_amount_2  .'" readonly></div>'.LINE_FEED_CODE;
		echo '	<div id="label50_center"><input type="checkbox" name="'.OBJECT_ID_050220200.$count.'" id="'.OBJECT_ID_050220200.$count.'" value="'.$fund_id.'" '.$checked.'/></div>'.LINE_FEED_CODE;
		echo '</div>'.LINE_FEED_CODE;
		
	}
}

?>
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
</form>
