<?php
$checked_0 = (isset($data[SEARCH_ID_050080050]) && strcmp(CHECKBOX_ON, $data[SEARCH_ID_050080050]) == 0) ? CHECKED : "";
$checked_1 = (isset($data[SEARCH_ID_050080060]) && strcmp(CHECKBOX_ON, $data[SEARCH_ID_050080060]) == 0) ? CHECKED : "";
$checked_2 = (isset($data[SEARCH_ID_050080070]) && strcmp(CHECKBOX_ON, $data[SEARCH_ID_050080070]) == 0) ? CHECKED : "";
$checked_3 = (isset($data[SEARCH_ID_050080080]) && strcmp(CHECKBOX_ON, $data[SEARCH_ID_050080080]) == 0) ? CHECKED : "";

// 出資額合計、投資家人数、申込件数を表示
$appl_count       = 0;    // 申込件数
$inv_amount_total = 0;    // 出資額合計
$lender_list      = null; // 投資家リスト
if (isset($data_list) && is_array($data_list) && 0 < count($data_list)) {
	
	// 申込件数取得
	$appl_count = count($data_list);
	
	foreach ($data_list as $key => $values) {
		foreach ($values as $value) {
			
			// 出資金額を加算していく
			$inv_amount_total += !empty($value[COLUMN_1200070]) ? intval($value[COLUMN_1200070]) : 0;
			
			// 投資家IDが配列内に存在しなければ追加
			if (!isset($lender_list[$value[COLUMN_1200020]])) {
				$lender_list[$value[COLUMN_1200020]] = $value[COLUMN_1200030];
			}
		}
	}
}
?>

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

<p class="admin-pagetitle">出資申込一覧</p>

<?php
if (isset($validation_errors) && is_array($validation_errors)) {
	foreach ($validation_errors as $key => $values) {
		echo '<p class="error">'.$values.'</p>';
	}
}
?>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000010 ?>" value="メニュー" onclick="buttonClick('<?php echo EVENT_ID_050080010 ?>');" tabindex="14">
	</div>
	<div id="horizontal">
		<div id="label100">投資家名</div>
		<div>
			<input type="text" name="<?php echo SEARCH_ID_050080010 ?>" id="<?php echo SEARCH_ID_050080010 ?>" value="<?php echo $data[SEARCH_ID_050080010] ?>" class="text200" tabindex="1">
		</div>
	</div>
	<div id="horizontal">
		<div id="label100">投資家名カナ</div>
		<div>
			<input type="text" name="<?php echo SEARCH_ID_050080015 ?>" id="<?php echo SEARCH_ID_050080015 ?>" value="<?php echo $data[SEARCH_ID_050080015] ?>" class="text200" tabindex="2">
		</div>
	</div>
	<div id="horizontal">
		<div id="label100">ファンド名</div>
		<div>
			<input type="text" name="<?php echo SEARCH_ID_050080020 ?>" id="<?php echo SEARCH_ID_050080020 ?>" value="<?php echo $data[SEARCH_ID_050080020] ?>" class="text200" tabindex="3">
		</div>
	</div>
	<div id="horizontal">
		<div id="label100">申込日</div>
		<div>
			<input type="text" name="<?php echo SEARCH_ID_050080030 ?>" id="<?php echo SEARCH_ID_050080030 ?>" value="<?php echo $data[SEARCH_ID_050080030] ?>" class="text100_right" tabindex="4">～
			<input type="text" name="<?php echo SEARCH_ID_050080040 ?>" id="<?php echo SEARCH_ID_050080040 ?>" value="<?php echo $data[SEARCH_ID_050080040] ?>" class="text100_right" tabindex="5">
		</div>
	</div>
	<div id="horizontal">
		<div id="label100">承認日</div>
		<div>
			<input type="text" name="<?php echo SEARCH_ID_050080110 ?>" id="<?php echo SEARCH_ID_050080110 ?>" value="<?php echo $data[SEARCH_ID_050080110] ?>" class="text100_right" tabindex="6">～
			<input type="text" name="<?php echo SEARCH_ID_050080120 ?>" id="<?php echo SEARCH_ID_050080120 ?>" value="<?php echo $data[SEARCH_ID_050080120] ?>" class="text100_right" tabindex="7">
		</div>
	</div>
	<div id="horizontal">
		<div id="label100">状態</div>
		<div>
			<input type="checkbox" id="<?php echo SEARCH_ID_050080050 ?>" name="<?php echo SEARCH_ID_050080050 ?>" value="1" tabindex= "8"<?php echo $checked_0 ?>><?php echo $list[CONFIG_0034][INVESTMENT_STATUS_CODE_APPLIED] ?>　
			<input type="checkbox" id="<?php echo SEARCH_ID_050080060 ?>" name="<?php echo SEARCH_ID_050080060 ?>" value="1" tabindex= "9"<?php echo $checked_1 ?>><?php echo $list[CONFIG_0034][INVESTMENT_STATUS_CODE_APPROVED] ?>　
			<input type="checkbox" id="<?php echo SEARCH_ID_050080070 ?>" name="<?php echo SEARCH_ID_050080070 ?>" value="1" tabindex= "10"<?php echo $checked_2 ?>><?php echo $list[CONFIG_0034][INVESTMENT_STATUS_CODE_CANCELLED] ?>　
			<input type="checkbox" id="<?php echo SEARCH_ID_050080080 ?>" name="<?php echo SEARCH_ID_050080080 ?>" value="1" tabindex= "11"<?php echo $checked_3 ?>><?php echo $list[CONFIG_0034][INVESTMENT_STATUS_CODE_EXPIRED] ?>　
		</div>
	</div>
	<div id="horizontal">
		<div id="label100">ソート項目</div>
		<div><select id="<?php echo SEARCH_ID_050080090 ?>" name="<?php echo SEARCH_ID_050080090 ?>" class="" tabindex="12">
			<?php foreach($list[CONFIG_0047] as $key => $value): ?>
				<?php $selected = ( $data[SEARCH_ID_050080090] == $key ) ? " selected" : ""; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<div id="horizontal">
		<div id="label100">ソート順</div>
		<div><select id="<?php echo SEARCH_ID_050080100 ?>" name="<?php echo SEARCH_ID_050080100 ?>" class="" tabindex="13">
			<?php foreach($list[CONFIG_0029] as $key => $value): ?>
				<?php $selected = ( $data[SEARCH_ID_050080100] == $key ) ? " selected" : ""; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<br>
	<div id="horizontal">
		<div>
			<div id="label100">出資申込件数</div>
			<div><input type="text" value="<?php echo number_format($appl_count)."&nbsp;件" ?>" class="label50_right" readonly></div>
			<div id="label100" style="margin-left:40px;">出資申込人数</div>
			<div><input type="text" value="<?php echo number_format(count($lender_list))."&nbsp;人" ?>" class="label50_right" readonly></div>
			<div id="label100" style="margin-left:40px;">出資額合計</div>
			<div><input type="text" value="<?php echo number_format($inv_amount_total)."&nbsp;円" ?>" class="label100_right" readonly></div>
		</div>
	</div>
	<br>
	<div id="horizontal">
		<input class="button" type="submit" id="<?php echo OBJECT_ID_BTN000020 ?>" value="絞込み" onclick="buttonClick('<?php echo EVENT_ID_050080020 ?>');" tabindex="14">
<?php $disabled = !isset($data_list) || (isset($data_list) && 0 == count($data_list)) ? DISABLED : ""; ?>
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000030 ?>" value="確認" onclick="buttonClick('<?php echo EVENT_ID_050080030 ?>');" tabindex="15"<?php echo $disabled ?>>
	</div>
	<br>
	
<?php
if (isset($data_list) && is_array($data_list) && 0 < count($data_list)) {
	$header01 = "投資家ID";
	$header02 = "投資家名";
	$header03 = "投資家名カナ";
	$header04 = "ファンド名";
	$header05 = "出資申込日時";
	$header06 = "出資額";
	$header07 = "入金期限";
	$header77 = "入金日";
	$header08 = "承認日時";
        $header88 = "C-OFF";
        $header89 = "書面既読確認";
	$header09 = "状態";
	echo '<div id="horizontal" style="width:1600px;border:0px solid blue;">'.LINE_FEED_CODE;
	echo '	<div class="label100_center">'.$header01.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label100_center">'.$header02.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label150_center">'.$header03.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label200_center">'.$header04.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label150_center">'.$header05.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label100_center">'.$header06.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label100_center">'.$header07.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label100_center">'.$header77.'</div>'.LINE_FEED_CODE;
        echo '	<div class="label150_center">'.$header08.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label100_center">'.$header88.'</div>'.LINE_FEED_CODE;
        echo '	<div class="label100_center">'.$header89.'</div>'.LINE_FEED_CODE;
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
			$appr_datetime  = !empty($value[COLUMN_1200100]) ? date(DATETIME_FORMAT, strtotime($value[COLUMN_1200100])) : "";
			$deposit_date   = !empty($value[COLUMN_1200190]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1200190])) : "";
                        if ($value["cooling_f"] >= 2) {                       
                            $cooling_off_period  = !empty($value[COLUMN_1200210]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1200210])) : "";
                        } else {
                            $cooling_off_period  = "";
                        }
                        if ($value["cooling_f"] >= 2) {
                                $cooling_f = "〇";
                        } else if ($value["cooling_f"] == 0) {
                                $cooling_f = "×";
                        } else if ($value["cooling_f"] == 1) {
                                $cooling_f = "△";
                        }
			$hidden_inv_amount = $value[COLUMN_1200070];
			$hidden_inv_status = $value[COLUMN_1200090];
			
			// 確認画面から戻ってきた場合、以前設定した状態を表示
			$inv_status = null;
			if (isset($event_id) && strcmp(EVENT_ID_050090010, $event_id) == 0 && isset($data[OBJECT_ID_050080040.$count])) {
				$inv_status = $data[OBJECT_ID_050080040.$count];
			}
			else {
				$inv_status   = $value[COLUMN_1200090];
			}
			
			$tabindex = $count + 16;
			echo '<div id="horizontal" style="width:1600px;border:0px solid blue;">'.LINE_FEED_CODE;
			echo '	<div class="label100_center" id="'.OBJECT_ID_LNK000010.'"><a href="../'.REDIRECT_C050.'/'.REDIRECT_A050040.'?'.GET_PARAM_INDEX_USER_ID.'='.$user_id.'" target="blank")>'.$user_id.'</a></div>'.LINE_FEED_CODE;
			echo '	<div><input type="text" class="label100"        value="'.$user_name     .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input type="text" class="label150"        value="'.$user_name_kana.'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input type="text" class="label200"        id="'.OBJECT_ID_050080010.$count.'" name="'.OBJECT_ID_050080010.$count.'" value="'.$fund_name    .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input type="text" class="label150_center" id="'.OBJECT_ID_050080020.$count.'" name="'.OBJECT_ID_050080020.$count.'" value="'.$inv_datetime .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input type="text" class="label100_right"  id="'.OBJECT_ID_050080030.$count.'" name="'.OBJECT_ID_050080030.$count.'" value="'.$inv_amount   .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input type="text" class="label100_right"  value="'.$exp_date      .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input type="text" class="label100_right" value="'.$deposit_date .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input type="text" class="label150_right" value="'.$appr_datetime .'" readonly></div>'.LINE_FEED_CODE;
                        echo '	<div><input type="text" class="label100_right" value="'.$cooling_off_period .'" readonly></div>'.LINE_FEED_CODE;
                        echo '	<div><input type="text" class="label100_center" value="'.$cooling_f .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><select id="'.OBJECT_ID_050080040.$count.'" name="'.OBJECT_ID_050080040.$count.'" tabindex="'.$tabindex.'">'.LINE_FEED_CODE;
			foreach($list[CONFIG_0034] as $key => $value):
				$selected =  (strcmp($inv_status,$key) == 0 ? " selected" : "");
				echo '			<option value="'.$key.'"'.$selected.'>'.$value.'</option>'.LINE_FEED_CODE;
			endforeach;
			echo '		</select>'.LINE_FEED_CODE;
			echo '	</div>'.LINE_FEED_CODE;
			echo '	<div><input type="hidden" id="'.HIDDEN_ID_000000090.$count.'" name="'.HIDDEN_ID_000000090.$count.'" value="'.$user_id.'"></div>'.LINE_FEED_CODE;
			echo '	<div><input type="hidden" id="'.HIDDEN_ID_000000100.$count.'" name="'.HIDDEN_ID_000000100.$count.'" value="'.$fund_id.'"></div>'.LINE_FEED_CODE;
			echo '	<div><input type="hidden" id="'.HIDDEN_ID_000000110.$count.'" name="'.HIDDEN_ID_000000110.$count.'" value="'.$hidden_inv_amount.'"></div>'.LINE_FEED_CODE;
			echo '	<div><input type="hidden" id="'.HIDDEN_ID_000000120.$count.'" name="'.HIDDEN_ID_000000120.$count.'" value="'.$hidden_inv_status.'"></div>'.LINE_FEED_CODE;
			echo '	<div><input type="hidden" id="'.HIDDEN_ID_000000130.$count.'" name="'.HIDDEN_ID_000000130.$count.'" value="'.$id.'"></div>'.LINE_FEED_CODE;
			echo '</div>'.LINE_FEED_CODE;
		}
	}
}
?>
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
	<input type="hidden" id="<?php echo HIDDEN_ID_000000020 ?>" name="<?php echo HIDDEN_ID_000000020 ?>" value="">
</form>
