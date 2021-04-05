<?php $this->Html->script( 'jquery-1.8.2.min.js' , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.common.js'    , array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
$(document).ready(function() {
	$('#<?php echo OBJECT_ID_BTN000010 ?>').lockScreen();
});
<?php $this->Html->scriptEnd(); ?>

<p>CSV ダウンロード</p>

	<div id="horizontal">
		<div>年月を指定してボタンをクリックして下さい。</div>
	</div>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000010 ?>" value="メニュー" onclick="buttonClick('<?php echo EVENT_ID_050470010 ?>');">
	</div>
	
<?php
if (isset($errors) && is_array($errors)) {
	foreach ($errors as $key => $values) {
		echo '<p class="error">'.$values.'</p>'.LINE_FEED_CODE;
	}
}
?>
	<p class="error">
	<div id="horizontal">
		<div id="label100">対象年月</div>
		<div id="v310_div50"><input type="text" name="<?php echo OBJECT_ID_050470010 ?>" id="<?php echo OBJECT_ID_050470010 ?>" value="<?php echo $data[OBJECT_ID_050470010] ?>" tabindex="1"></div><div id="v310_div_other">/</div>
		<div id="v310_div25"><input type="text" name="<?php echo OBJECT_ID_050470020 ?>" id="<?php echo OBJECT_ID_050470020 ?>" value="<?php echo $data[OBJECT_ID_050470020] ?>" tabindex="2"></div><div id="v310_div_other">YYYY/MM</div>
	</div>
	
	<div id="horizontal">
		<div>2016年5月10日の配当に関するデータを出力する場合、「2016/5」を入力する。</div>
		<div>2016年4月末時点の書面交付状況を出力する場合、「2016/4」を入力する。</div>
		<div>5月生まれの出資家にQUOカードを送る場合、年は入力せず月に「5」を入力する。</div>
		<div>1980年5月生まれの出資家にQUOカードを送る場合、「1980/5」を入力する。</div>
	</div>
	
	<div id="horizontal">
		<input class="button" type="button" value="経理(ファンド)" onclick="buttonClick('<?php echo EVENT_ID_050470020 ?>');">
		<input class="button" type="button" value="経理(個人)"     onclick="buttonClick('<?php echo EVENT_ID_050470030 ?>');">
		<input class="button" type="button" value="配当送金"       onclick="buttonClick('<?php echo EVENT_ID_050470040 ?>');">
		<input class="button" type="button" value="書面交付状況"   onclick="buttonClick('<?php echo EVENT_ID_050470050 ?>');">
		<input class="button" type="button" value="QUOカード"      onclick="buttonClick('<?php echo EVENT_ID_050470060 ?>');">
	</div>
	
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
	<input type="hidden" id="<?php echo HIDDEN_ID_000000020 ?>" name="<?php echo HIDDEN_ID_000000020 ?>" value="">
</form>
