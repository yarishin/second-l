<?php $this->Html->script( 'jquery-1.8.2.min.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.common.js'   , array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
$(document).ready(function() {
	$('#<?php echo OBJECT_ID_BTN000010 ?>').lockScreen();
	$('#<?php echo OBJECT_ID_BTN000020 ?>').lockScreen();
	$('#<?php echo OBJECT_ID_BTN000030 ?>').lockScreen();
	$('#<?php echo OBJECT_ID_BTN000040 ?>').lockScreen();
});
<?php $this->Html->scriptEnd(); ?>

<p class="admin-pagetitle">報告書管理</p>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000040 ?>" value="メニュー" onclick="buttonClick('<?php echo EVENT_ID_050370040 ?>');">
	</div>
	<div id="label200">交付を行う報告書を選択して下さい。</div>
	<div id="horizontal">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000010; ?>" value="財産管理報告書"     onclick="buttonClick('<?php echo EVENT_ID_050370010; ?>');">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000020; ?>" value="取引残高報告書" onclick="buttonClick('<?php echo EVENT_ID_050370020; ?>');">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000030; ?>" value="年間取引報告書" onclick="buttonClick('<?php echo EVENT_ID_050370030; ?>');">
	</div>
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
</form>
