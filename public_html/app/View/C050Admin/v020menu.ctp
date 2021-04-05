<?php $this->Html->script('jquery-1.8.2.min.js', array('inline' => false)); ?>
<?php $this->Html->script('jquery.common.js'   , array('inline' => false)); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
$(document).ready(function() {
	$('.button').lockScreen();
});
<?php $this->Html->scriptEnd(); ?>

<p class="admin-pagetitle">管理者メニュー</p>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" value="投資家管理"   onclick="buttonClick('<?php echo EVENT_ID_050020010 ?>');">
		<input class="button" type="button" value="出資申込受付" onclick="buttonClick('<?php echo EVENT_ID_050020020 ?>');">
		<input class="button" type="button" value="ファンド管理" onclick="buttonClick('<?php echo EVENT_ID_050020030 ?>');">
		<input class="button" type="button" value="返済金管理"   onclick="buttonClick('<?php echo EVENT_ID_050020040 ?>');">
		<input class="button" type="button" value="配当実行"     onclick="buttonClick('<?php echo EVENT_ID_050020050 ?>');">
        	<input class="button" type="button" value="入金管理"     onclick="buttonClick('<?php echo EVENT_ID_050020120 ?>');">
	<!--</div>
	<div id="horizontal">-->
		<input class="button" type="button" value="報告書管理"   onclick="buttonClick('<?php echo EVENT_ID_050020080 ?>');">
		<input class="button" type="button" value="ＣＳＶ ＤＬ"  onclick="buttonClick('<?php echo EVENT_ID_050020100 ?>');">
		<input class="button" type="button" value="休日設定"     onclick="buttonClick('<?php echo EVENT_ID_050020070 ?>');">
		<input class="button" type="button" value="メール送信"   onclick="buttonClick('<?php echo EVENT_ID_050020090 ?>');">
		<input class="button" type="button" value="お知らせ送信" onclick="buttonClick('<?php echo EVENT_ID_050020110 ?>');">
	</div>
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
</form>
