<?php $this->Html->script( 'jquery-1.8.2.min.js' , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.common.js'    , array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}

$(document).ready(function() {
	$('#<?php echo OBJECT_ID_BTN000010 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
	$('#<?php echo OBJECT_ID_BTN000020 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
	$('#<?php echo OBJECT_ID_BTN000030 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
});
<?php $this->Html->scriptEnd(); ?>

<p class="admin-pagetitle">入金管理 > 手動入金処理</p>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000010 ?>" value="メニュー" onclick="buttonClick('<?php echo EVENT_ID_050530010 ?>');" tabindex="1">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000020 ?>" value="戻る" onclick="buttonClick('<?php echo EVENT_ID_050530020 ?>');" tabindex="2">
	</div>
<?php
if (isset($errors) && is_array($errors)) {
	foreach ($errors as $key => $values) {
		echo '<p class="error">'.$values.'</p>';
	}
}
?>		
	<div id="horizontal">
		<div id="label100">入金照合件数</div>
		<div>
			<input type="text" value="<?php echo number_format($num_matched)." 件" ?>" class="label100_right" readonly>		
		</div>
		<div id="label100">出資申込件数</div>
		<div>
			<input type="text" value="<?php echo number_format(count($data_list))." 件" ?>" class="label100_right" readonly>		
		</div>
	</div><br>
<?php
$aaa = date("Y/m/d H:i:s");
?>
入金日時  <br>
<input type = "text" name = "deposit_date" value="<?php echo date("Y/m/d H:i:s") ?>"> <br>*日付は変更できます
<?php
if (isset($data_list) && is_array($data_list) && 0 < count($data_list)) {
	echo "<p>レコードを選択し、入金処理ボタンを押してください。</p>";
	echo "<div id=\"horizontal\">";
	echo"	<input class=\"button\" type=\"submit\" id=\"".OBJECT_ID_BTN000030."\" value=\"入金処理\" onclick=\"buttonClick('".EVENT_ID_050530040."');\" tabindex=\"3\">";
	echo "</div>";
	
	echo "<div id=\"horizontal\" style=\"width:1500px;border:0px solid blue;\">"	.LINE_FEED_CODE;
	echo "	<div class=\"label50_center\">選択</div>"			.LINE_FEED_CODE;
	echo "	<div class=\"label75_center\">Inve_ID</div>"	.LINE_FEED_CODE;
	echo "	<div class=\"label150_center\">カナ</div>"			.LINE_FEED_CODE;
	echo "	<div class=\"label75_center\">出資額</div>"			.LINE_FEED_CODE;
	echo "	<div class=\"label75_center\">ユーザID</div>"		.LINE_FEED_CODE;
	echo "	<div class=\"label100_center\">ユーザ名</div>"		.LINE_FEED_CODE;
	echo "	<div class=\"label200_center\">ファンド名</div>"		.LINE_FEED_CODE;
	echo "	<div class=\"label75_center\">FUND_ID</div>"		.LINE_FEED_CODE;
	echo "	<div class=\"label150_center\">承認日</div>"		.LINE_FEED_CODE;
	echo "	<div class=\"label150_center\">入金期限</div>"		.LINE_FEED_CODE;
	//echo "	<div class=\"label150_center\">入金日</div>"		.LINE_FEED_CODE;
	echo "</div>".LINE_FEED_CODE;
	
	// 確認ページにチェックされた照合レコードデータを渡すため$data_listで受け取ったレコードをすべてFormで送信する
        $count = 0;
	$tabindex = 4;
	foreach ($data_list as $key => $value) {
		$checked             = !empty($value['selection']) && $value['selection'] == 0 ? "CHECKED" : "";                // 選択状態（デフォルトはチェックしない）
                $user_name_kana      = !empty($value[COLUMN_1200035]) ? $value[COLUMN_1200035] : NULL;	                        //
                $user_id             = !empty($value[COLUMN_1200020]) ? $value[COLUMN_1200020] : "&nbsp";		        // ユーザID
		$user_name           = !empty($value[COLUMN_1200030]) ? $value[COLUMN_1200030] : "&nbsp";		        // ユーザ名
		$fund_name           = !empty($value[COLUMN_1200050]) ? $value[COLUMN_1200050] : "&nbsp";		        // ファンド名
		$investment_amount   = !empty($value[COLUMN_1200070]) ? number_format((int)$value[COLUMN_1200070]) : "&nbsp";	// 出資額
		$expiration_datetime = !empty($value[COLUMN_1200080]) ? $value[COLUMN_1200080] : "&nbsp";			// 入金期限
		$fund_id             = !empty($value[COLUMN_1200040]) ? $value[COLUMN_1200040] : "&nbsp";		        // Fund_ID
		$deposit_date        = !empty($value[COLUMN_1200190]) ? $value[COLUMN_1200190] : "&nbsp";	                // 入金日
		$approval_datetime   = !empty($value[COLUMN_1200100]) ? $value[COLUMN_1200100] : "&nbsp";	                // 承認日
		$id                  = !empty($value[COLUMN_1200010]) ? $value[COLUMN_1200010] : NULL;			        // 入金用ID_inves
		//$deposit_date = !empty($value[COLUMN_1200190]) ? $value[COLUMN_1200190] : NULL;
		
		if(empty($value[COLUMN_1200010]) || is_null($value[COLUMN_1200010])){
			echo "  <div id=\"horizontal\" style=\"width:1300px;\">".LINE_FEED_CODE;
			echo "	<div><input disabled class=\"label50_center\"  type=\"checkbox\" value=\"".$count."\" ".$checked."></div>".LINE_FEED_CODE;
			echo "	<div><input disabled class=\"label75_center\"  type=\"text\"     value=\"".$id."\"></div>".LINE_FEED_CODE;
			echo "	<div><input disabled class=\"label150\"        type=\"text\"     value=\"".$user_name_kana."\"></div>".LINE_FEED_CODE;
			echo "	<div><input disabled class=\"label75_right\"   type=\"text\"     value=\"".$investment_amount."\"></div>".LINE_FEED_CODE;
			echo "	<div><input disabled class=\"label75_center\"  type=\"text\"     value=\"".$user_id."\"></div>".LINE_FEED_CODE;
			echo "	<div><input disabled class=\"label100\"        type=\"text\"     value=\"".$user_name."\"></div>".LINE_FEED_CODE;
			echo "	<div><input disabled class=\"label200\"        type=\"text\"     value=\"".$fund_name."\"></div>".LINE_FEED_CODE;
			echo "	<div><input disabled class=\"label75_center\"  type=\"text\"     value=\"".$fund_id."\"></div>".LINE_FEED_CODE;
			echo "	<div><input disabled class=\"label150_center\" type=\"text\"     value=\"".$approval_datetime."\"></div>".LINE_FEED_CODE;    //承認日
			echo "	<div><input disabled class=\"label150_center\" type=\"text\"     value=\"".$expiration_datetime."\"></div>".LINE_FEED_CODE;  //入金期限
			echo "	<div><input disabled class=\"label150_center\" type=\"text\"     value=\"".$deposit_date."\"></div>".LINE_FEED_CODE;         //入金日
			echo "  </div>".LINE_FEED_CODE;

		// 入金レコードを照合した場合(idが空ではなく、NULLでもない)
		}else{	
			$array_name = "data_list[".$count."]";
			echo "  <div id=\"horizontal\" style=\"width:1300px;\">".LINE_FEED_CODE;
			echo "	<div><input class=\"label50_center\" type=\"checkbox\"       name=\"".$array_name."[".OBJECT_ID_050530160."]\" value=\"1\" ".$checked." tabindex=\"".$tabindex."\"></div>".LINE_FEED_CODE;
			echo "	<div><input readonly class=\"label75_center\"  type=\"text\" name=\"".$array_name."[".OBJECT_ID_050530000."]\" value=\"".$id."\"></div>".LINE_FEED_CODE;
			echo "	<div><input readonly class=\"label150\"        type=\"text\" name=\"".$array_name."[".OBJECT_ID_050530100."]\" value=\"".$user_name_kana."\"></div>".LINE_FEED_CODE;
			echo "	<div><input readonly class=\"label75_right\"   type=\"text\" name=\"".$array_name."[".OBJECT_ID_050530140."]\" value=\"".$investment_amount."\"></div>".LINE_FEED_CODE;
			echo "	<div><input readonly class=\"label75_center\"  type=\"text\" name=\"".$array_name."[".OBJECT_ID_050530080."]\" value=\"".$user_id."\"></div>".LINE_FEED_CODE;
			echo "	<div><input readonly class=\"label100\"        type=\"text\" name=\"".$array_name."[".OBJECT_ID_050530090."]\" value=\"".$user_name."\"></div>".LINE_FEED_CODE;
			echo "	<div><input readonly class=\"label200\"        type=\"text\" name=\"".$array_name."[".OBJECT_ID_050530120."]\" value=\"".$fund_name."\"></div>".LINE_FEED_CODE;
			echo "	<div><input readonly class=\"label75_center\"  type=\"text\" name=\"".$array_name."[".OBJECT_ID_050530110."]\" value=\"".$fund_id."\"></div>".LINE_FEED_CODE;
			echo "	<div><input readonly class=\"label150\"        type=\"text\" name=\"".$array_name."[".OBJECT_ID_050530131."]\" value=\"".$approval_datetime."\"></div>".LINE_FEED_CODE;
			echo "	<div><input readonly class=\"label150\"        type=\"text\" name=\"".$array_name."[".OBJECT_ID_050530151."]\" value=\"".$expiration_datetime."\"></div>".LINE_FEED_CODE;
	//$deposit_date = date('Y-m-d H:i:s');
			//echo "  <div><input type=\"hidden\"    name=\"".$array_name."[".aaaaaaaaaa."]\" value=\""."123456"."\"></div>".LINE_FEED_CODE;
			//echo "	<div><input type=\"hidden\"  name=\"".$array_name."[".OBJECT_ID_050530300."]\" value=\"".$deposit_date = date('Y-m-d H:i:s')."\"></div>".LINE_FEED_CODE;
			echo "</div>".LINE_FEED_CODE;
			$count++;
			$tabindex++;
		}
	}
	echo "	<div><input type=\"hidden\" name=\"num_matched\" value=\"".$num_matched."\"></div>".LINE_FEED_CODE;
}

?>
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
	<input type="hidden" id="<?php echo HIDDEN_ID_000000020 ?>" name="<?php echo HIDDEN_ID_000000020 ?>" value="">
</form>
