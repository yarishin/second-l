<?php
$checked_0 = isset($data[SEARCH_ID_050110050]) ? CHECKED : "";
$checked_1 = isset($data[SEARCH_ID_050110060]) ? CHECKED : "";
$checked_2 = isset($data[SEARCH_ID_050110070]) ? CHECKED : "";
$checked_3 = isset($data[SEARCH_ID_050110080]) ? CHECKED : "";
$checked_4 = isset($data[SEARCH_ID_050110090]) ? CHECKED : "";
$checked_5 = isset($data[SEARCH_ID_050110100]) ? CHECKED : "";
?>

<?php $this->Html->script( 'jquery-1.8.2.min.js' , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.common.js'    , array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
function linkClick(eventId, fundId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.getElementById('<?php echo HIDDEN_ID_000000030 ?>').value = fundId;
	document.form.submit();
}
$(document).ready(function() {
	$('#<?php echo OBJECT_ID_BTN000010 ?>').lockScreen();
	$('#<?php echo OBJECT_ID_BTN000020 ?>').lockScreen();
	$('#<?php echo OBJECT_ID_BTN000030 ?>').lockScreen();
	$('#<?php echo OBJECT_ID_BTN000040 ?>').lockScreen();
	$('.<?php echo OBJECT_ID_LNK000010 ?>').lockScreen();
});
<?php $this->Html->scriptEnd(); ?>

<style type="text/css">
#horizontal .<?php echo OBJECT_ID_LNK000010 ?> {
	border-top       : 0px solid gray;
	border-right     : 0px solid gray;
	border-left      : 0px solid gray;
	border-bottom    : 1px solid gray;
	float            : left;
	height           : 20px;
	margin-right     : 10px;
	text-align       : center;
	width            : 100px;
}
</style>

<p class="admin-pagetitle">ファンド一覧</p>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000010 ?>" value="メニュー" onclick="buttonClick('<?php echo EVENT_ID_050110010 ?>');" tabindex="17">
	</div>
	<div id="horizontal">
		<div id="label100">ファンド名</div>
		<div>
			<input type="text" name="<?php echo SEARCH_ID_050110010 ?>" id="<?php echo SEARCH_ID_050110010 ?>" value="<?php echo $data[SEARCH_ID_050110010] ?>" class="text200" tabindex="1">
		</div>
	</div>
	<div id="horizontal">
		<div id="label100">運用開始日</div>
		<div>
			<input type="text" name="<?php echo SEARCH_ID_050110020 ?>" id="<?php echo SEARCH_ID_050110020 ?>" value="<?php echo $data[SEARCH_ID_050110020] ?>" class="text100_right" tabindex="2">～
			<input type="text" name="<?php echo SEARCH_ID_050110030 ?>" id="<?php echo SEARCH_ID_050110030 ?>" value="<?php echo $data[SEARCH_ID_050110030] ?>" class="text100_right" tabindex="3">
		</div>
	</div>
	<div id="horizontal">
		<div id="label100">ファンドID</div>
			<input type="text" name="<?php echo SEARCH_ID_050110040 ?>" id="<?php echo SEARCH_ID_050110040 ?>" value="<?php echo $data[SEARCH_ID_050110040] ?>" class="text100" tabindex="4">
		</div>
	</div>
	<div id="horizontal">
		<div id="label100">状態</div>
		<div>
			<input type="checkbox" id="<?php echo SEARCH_ID_050110050 ?>" name="<?php echo SEARCH_ID_050110050 ?>" tabindex="5"<?php echo $checked_0 ?>><?php echo $list[CONFIG_0035][FUND_STATUS_CODE_BEFORE_INVITING] ?>&nbsp;
			<input type="checkbox" id="<?php echo SEARCH_ID_050110060 ?>" name="<?php echo SEARCH_ID_050110060 ?>" tabindex="6"<?php echo $checked_1 ?>><?php echo $list[CONFIG_0035][FUND_STATUS_CODE_NOW_INVITING] ?>&nbsp;
			<input type="checkbox" id="<?php echo SEARCH_ID_050110070 ?>" name="<?php echo SEARCH_ID_050110070 ?>" tabindex="7"<?php echo $checked_2 ?>><?php echo $list[CONFIG_0035][FUND_STATUS_CODE_BEFORE_OPERATING] ?>&nbsp;
			<input type="checkbox" id="<?php echo SEARCH_ID_050110080 ?>" name="<?php echo SEARCH_ID_050110080 ?>" tabindex="8"<?php echo $checked_3 ?>><?php echo $list[CONFIG_0035][FUND_STATUS_CODE_NOW_OPERATING] ?>&nbsp;
			<input type="checkbox" id="<?php echo SEARCH_ID_050110090 ?>" name="<?php echo SEARCH_ID_050110090 ?>" tabindex="9"<?php echo $checked_4 ?>><?php echo $list[CONFIG_0035][FUND_STATUS_CODE_CLOSED] ?>&nbsp;
			<input type="checkbox" id="<?php echo SEARCH_ID_050110100 ?>" name="<?php echo SEARCH_ID_050110100 ?>" tabindex="10"<?php echo $checked_5 ?>><?php echo $list[CONFIG_0035][FUND_STATUS_CODE_FAILURE] ?>&nbsp;
		</div>
	</div>
	<div id="horizontal">
		<div id="label100">ソート項目</div>
		<div><select id="<?php echo SEARCH_ID_050110110 ?>" name="<?php echo SEARCH_ID_050110110 ?>" class="" tabindex="11">
			<?php foreach($list[CONFIG_0036] as $key => $value): ?>
				<?php $selected = ( $data[SEARCH_ID_050110110] == $key ) ? " selected" : ""; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<div id="horizontal">
		<div id="label100">ソート順</div>
		<div><select id="<?php echo SEARCH_ID_050110120 ?>" name="<?php echo SEARCH_ID_050110120 ?>" class="" tabindex="12">
			<?php foreach($list[CONFIG_0029] as $key => $value): ?>
				<?php $selected = ( $data[SEARCH_ID_050110120] == $key ) ? " selected" : ""; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<div id="horizontal">
		<input class="button" type="submit" id="<?php echo OBJECT_ID_BTN000020 ?>" value="絞込み" onclick="buttonClick('<?php echo EVENT_ID_050110020 ?>');" tabindex="13">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000030 ?>" value="新規登録" onclick="buttonClick('<?php echo EVENT_ID_050110030 ?>');" tabindex="14">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000040 ?>" value="報告書交付" onclick="buttonClick('<?php echo EVENT_ID_050110050 ?>');" tabindex="15"<?php echo (isset($report) && $report) ? DISABLED : ""; ?>>
	</div>
	<br>
	
<?php
if (isset($data_list) && is_array($data_list) && 0 < count($data_list)) {
	$header01 = "ファンドID";
	$header02 = "ファンド名";
	$header03 = "出資予定額";
	$header04 = "出資額";
	$header05 = "募集開始日";
	$header06 = "運用開始日";
	$header07 = "営業者利回り";
	$header08 = "想定分配率";
	$header09 = "状態";
	$header10 = "延長フラグ";
        $header11 = "強制終了";
	echo '<div id="horizontal">'                             .LINE_FEED_CODE;
	echo '	<div class="label100_center">'.$header01.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label200_center">'.$header02.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label100_center">'.$header03.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label100_center">'.$header04.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label100_center">'.$header05.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label100_center">'.$header06.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label100_center">'.$header07.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label100_center">'.$header08.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label100_center">'.$header09.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label50_center">'.$header10.'</div>'.LINE_FEED_CODE;
        echo '	<div class="label50_center">'.$header11.'</div>'.LINE_FEED_CODE;
	echo '</div>'                                            .LINE_FEED_CODE;
	foreach ($data_list as $key => $values) {
		foreach ($values as $value) {
			$fund_id         =  !empty($value[COLUMN_0500010]) ? $value[COLUMN_0500010] : "";
			$fund_name       =  !empty($value[COLUMN_0500020]) ? $value[COLUMN_0500020] : "";
			$max_loan_amount =  !empty($value[COLUMN_0500030]) ? number_format($value[COLUMN_0500030]) : "";
			$loan_amount     =  !empty($value[COLUMN_0500040]) ? number_format($value[COLUMN_0500040]) : "0";
			$inviting_start  =  !empty($value[COLUMN_0500080]) ? date(DATE_FORMAT, strtotime($value[COLUMN_0500080])) : "";
			$operating_start =  !empty($value[COLUMN_0500100]) ? date(DATE_FORMAT, strtotime($value[COLUMN_0500100])) : "";
			$admin_yield     =  !empty($value[COLUMN_0500130]) ? number_format($value[COLUMN_0500130], 2) : "";
			$target_yield    =  !empty($value[COLUMN_0500140]) ? number_format($value[COLUMN_0500140], 2) : "";
			$status_code     = $this->Common->getFundStatusCode($value);
			$fund_status     =  $list[CONFIG_0035][$status_code];
			$delay_1         =  !empty($value[COLUMN_0500170]) ? $value[COLUMN_0500170] : "0";
                        $ended           =  !empty($value[COLUMN_0500171]) ? $value[COLUMN_0500171] : "0";
			
			echo '<div id="horizontal">'.LINE_FEED_CODE;
			echo '	<div class="'.OBJECT_ID_LNK000010.'"><a href="#" onclick="linkClick(\''.EVENT_ID_050110040.'\',\''.$fund_id.'\')">'.$fund_id.'</a></div>'.LINE_FEED_CODE;
			echo '	<div><input class="label200"       type="text" value="'.$fund_name       .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input class="label100_right" type="text" value="'.$max_loan_amount .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input class="label100_right" type="text" value="'.$loan_amount     .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input class="label100_right" type="text" value="'.$inviting_start  .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input class="label100_right" type="text" value="'.$operating_start .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input class="label100_right" type="text" value="'.$admin_yield     .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input class="label100_right" type="text" value="'.$target_yield    .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input class="label100"       type="text" value="'.$fund_status     .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input class="label50"       type="text" value="'.$delay_1         .'" readonly></div>'.LINE_FEED_CODE;
                        echo '	<div><input class="label50"       type="text" value="'.$ended           .'" readonly></div>'.LINE_FEED_CODE;
			echo '</div>'.LINE_FEED_CODE;
		}
	}
}
?>
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
	<input type="hidden" id="<?php echo HIDDEN_ID_000000030 ?>" name="<?php echo HIDDEN_ID_000000030 ?>" value="">
</form>
