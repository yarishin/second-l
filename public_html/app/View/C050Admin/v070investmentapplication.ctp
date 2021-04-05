<?php

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

<p class="admin-pagetitle">出資申込一覧（照会）</p>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<br>
	<div id="horizontal">
		<div>
			<div id="label100">出資申込件数</div>
			<div><input type="text" value="<?php echo number_format($appl_count)."&nbsp;件" ?>" class="label50_right" readonly></div>
			<div id="label100" style="margin-left:40px;">出資申込人数</div>
			<div><input type="text" value="<?php echo number_format(count($lender_list))."&nbsp;人" ?>" class="label50_right" readonly></div>
			<div id="label100" style="margin-left:40px;">出資額合計</div>
			<div><input type="text" value="<?php echo number_format($inv_amount_total)."&nbsp;円" ?>" class="label200_right" style="font-size: 1.5em;" readonly></div>
		</div>
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
	$header08 = "状態";
	$header09 = "承認日時";
	echo '<div id="horizontal" style="width: 100%;background-color: #fff;">'.LINE_FEED_CODE;
	echo '	<div class="label100_center">'.$header01.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label150_center">'.$header02.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label200_center">'.$header03.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label300_center">'.$header04.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label150_center">'.$header05.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label100_center">'.$header06.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label100_center">'.$header07.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label100_center">'.$header08.'</div>'.LINE_FEED_CODE;
	echo '	<div class="label150_center">'.$header09.'</div>'.LINE_FEED_CODE;
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
			$hidden_inv_amount = $value[COLUMN_1200070];
			$hidden_inv_status = $value[COLUMN_1200090];
			
			// 確認画面から戻ってきた場合、以前設定した状態を表示
			$inv_status = null;
			if (isset($event_id) && strcmp(EVENT_ID_050090010, $event_id) == 0 && isset($data[OBJECT_ID_050080040.$count])) {
				$inv_status = $list[CONFIG_0034][$data[OBJECT_ID_050080040.$count]];
			}
			else {
				$inv_status = $list[CONFIG_0034][$value[COLUMN_1200090]];
			}
			echo '<div class="v120">'.LINE_FEED_CODE;
			echo '<div id="horizontal" style="width: 100%;border:0px solid blue;">'.LINE_FEED_CODE;
			echo '	<div><input class="label100_center" type="text" value="'.$user_id        .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input class="label150"        type="text" value="'.$user_name      .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input class="label200"        type="text" value="'.$user_name_kana .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input class="label300"        type="text" value="'.$fund_name      .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input class="label150_center" type="text" value="'.$inv_datetime   .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input class="label100_right"  type="text" value="'.$inv_amount     .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input class="label100_center" type="text" value="'.$exp_date       .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input class="label100_center" type="text" value="'.$inv_status     .'" readonly></div>'.LINE_FEED_CODE;
			echo '	<div><input class="label150_center" type="text" value="'.$appr_datetime  .'" readonly></div>'.LINE_FEED_CODE;
			echo '</div>'.LINE_FEED_CODE;
			echo '</div>'.LINE_FEED_CODE;
		}
	}
}
?>
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
	<input type="hidden" id="<?php echo HIDDEN_ID_000000020 ?>" name="<?php echo HIDDEN_ID_000000020 ?>" value="">
</form>
