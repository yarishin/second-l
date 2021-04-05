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

<p class="admin-pagetitle">PDF参照</p>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000010 ?>" value="戻る" onclick="buttonClick('<?php echo EVENT_ID_050460010 ?>');">
	</div>
	<br>
	<div id="horizontal">
		<div>■ファイル名について</div>
		<br>
		<div>　先頭5桁＝「00000」の場合、出資家登録時の同意書面</div>
		<div>　先頭5桁≠「00000」の場合、出資家登録後の書面</div>
		<div>　登録時のファイル名は「00000」＋「書面ID(5桁)」＋「_(アンダーバー)」＋「同意日時」＋「_」＋「リビジョン(2桁)」</div>
		<div>　登録後のファイル名は「ファンドID(5桁)」＋「書面ID(5桁)」＋「_(アンダーバー)」＋「各種日時(※)」＋「_」＋「リビジョン(2桁)」</div>
		<div>　但し取引残高報告書、年間取引報告書はファンドID＝「00001」で固定</div>
		<br>
		<div>　※　書面ID＝「00001」、「00002」の場合、同意日時</div>
		<div>　　　書面ID＝「00003」の場合、出資申込日時</div>
		<div>　　　書面ID＝「00004」の場合、運用年月</div>
		<div>　　　書面ID＝「00005」の場合、取引開始年月</div>
		<div>　　　書面ID＝「00006」の場合、取引年</div>
	</div>
	<br>
	
<?php
foreach ($pdf_list as $key => $value) {
	
	$fund_id   = substr($value,  0, 5);
	$doc_id    = substr($value,  5, 5);
	$doc_param = substr($value, 11);
	$doc_param = substr($doc_param, 0, strlen($doc_param) - 7);
	$revision  = substr($value, strlen($value) - 6, 2);
	
	$doc_name = "";
	if (strcmp(REG_DOC_CAT_ID, $fund_id) != 0) {
		$doc_name = HTML_HALF_WIDTH_SPACE.'('.$list[CONFIG_0045][$doc_id].')';
	}
	
	$get_param = '?'.GET_PARAM_INDEX_FUND_ID.'='.$fund_id
			.'&'.GET_PARAM_INDEX_DOC_ID     .'='.$doc_id
			.'&'.GET_PARAM_INDEX_REVISION   .'='.$revision
			.'&'.GET_PARAM_INDEX_DOC_PARAM  .'='.$doc_param;
	
	echo '<div id="horizontal">'.LINE_FEED_CODE;
	echo '	<div><a href="'.URL_SITE_TOP.REDIRECT_C060.'/'.REDIRECT_A060010.$get_param.'" target="blank" style="margin-left: 10px;">'.$value.$doc_name.'</a></div>'.LINE_FEED_CODE;
	echo '</div>'.LINE_FEED_CODE;
}
?>
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
	<input type="hidden" id="<?php echo HIDDEN_ID_000000020 ?>" name="<?php echo HIDDEN_ID_000000020 ?>" value="">
</form>
