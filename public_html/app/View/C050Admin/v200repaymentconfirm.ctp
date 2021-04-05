<?php $this->Html->script( 'jquery-1.8.2.min.js' , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.common.js'    , array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
<?php $this->Html->scriptEnd(); ?>

<p>償還予定一覧(確認)</p>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000010 ?>" value="戻る" onclick="buttonClick('<?php echo EVENT_ID_050200010 ?>');" tabindex="13">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000020 ?>" value="決定" onclick="buttonClick('<?php echo EVENT_ID_050200020 ?>');" tabindex="14">
	</div>
	<br>
	
<?php
if (isset($data) && is_array($data) && 0 < count($data)) {
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
	
	foreach ($data as $key => $value) {
		
		$fund_id            =  $value[OBJECT_ID_050190060];
		$fund_name          =  $value[OBJECT_ID_050190070];
		$id                 =  $value[OBJECT_ID_050190050];
		$seq_no             =  $value[OBJECT_ID_050190080];
		$repayment_date_1   =  $value[OBJECT_ID_050190090];
		$repayment_amount_1 =  $value[OBJECT_ID_050190100];
		$dividend_amount_1  =  $value[OBJECT_ID_050190110];
		$reward_amount_1    =  $value[OBJECT_ID_050190120];
		$repayment_date_2   =  $value[OBJECT_ID_050190010];
		$principal_amound_2 =  number_format($value[OBJECT_ID_050190020]);
		$interest_amount_2  =  number_format($value[OBJECT_ID_050190030]);
		$delay_damages      =  number_format($value[OBJECT_ID_050190040]);

		echo '<div id="horizontal" style="width:1400px;border:0px solid blue;">'.LINE_FEED_CODE;
		echo '	<div><input class="label100_center" type="text" value="'.$fund_id            .'" readonly></div>'.LINE_FEED_CODE;
		echo '	<div><input class="label200"        type="text" value="'.$fund_name          .'" readonly></div>'.LINE_FEED_CODE;
		echo '	<div><input class="label100_center" type="text" value="'.$seq_no             .'" readonly></div>'.LINE_FEED_CODE;
		//*echo '	<div><input class="label100_center" type="text" value="'.$repayment_date_1   .'" readonly></div>'.LINE_FEED_CODE;
		//*echo '	<div><input class="label100_right"  type="text" value="'.$repayment_amount_1 .'" readonly></div>'.LINE_FEED_CODE;
		echo '	<div><input class="label100_right"  type="text" value="'.$dividend_amount_1  .'" readonly></div>'.LINE_FEED_CODE;
		//*echo '	<div><input class="label100_right"  type="text" value="'.$reward_amount_1    .'" readonly></div>'.LINE_FEED_CODE;
		echo '	<div><input class="label100_right"  type="text" value="'.$repayment_date_2   .'" readonly></div>'.LINE_FEED_CODE;
		echo '	<div><input class="label100_right"  type="text" value="'.$principal_amound_2 .'" readonly></div>'.LINE_FEED_CODE;
		echo '	<div><input class="label100_right"  type="text" value="'.$interest_amount_2  .'" readonly></div>'.LINE_FEED_CODE;
		echo '	<div><input class="label100_right"  type="text" value="'.$delay_damages      .'" readonly></div>'.LINE_FEED_CODE;
		echo '</div>'.LINE_FEED_CODE;
		
	}
}
?>
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
</form>
