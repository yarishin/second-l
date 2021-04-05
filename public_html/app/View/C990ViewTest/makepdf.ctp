<?php $this->Html->script( 'jquery-1.8.2.min.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.common.js'                       , array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId, redirectC, redirectA) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
$(document).ready(function() {
	$('#<?php echo OBJECT_ID_BTN000010 ?>').lockScreen();
	$('#<?php echo OBJECT_ID_BTN000020 ?>').lockScreen();
	$('#<?php echo OBJECT_ID_BTN000030 ?>').lockScreen();
	$('#<?php echo OBJECT_ID_BTN000040 ?>').lockScreen();
	$('#<?php echo OBJECT_ID_BTN000050 ?>').lockScreen();
	$('#<?php echo OBJECT_ID_BTN000060 ?>').lockScreen();
	$('#<?php echo OBJECT_ID_BTN000070 ?>').lockScreen();
});
<?php $this->Html->scriptEnd(); ?>

<h1>PDF作成</h1>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input type="button" class="button" id="<?php echo OBJECT_ID_BTN000010 ?>" value="登録時書面5種"  onclick="buttonClick('<?php echo EVENT_ID_990000010 ?>');">
		<br><br>
		<input type="button" class="button" id="<?php echo OBJECT_ID_BTN000030 ?>" value="契約前書面2種"  onclick="buttonClick('<?php echo EVENT_ID_990000030 ?>');">
		<br><br>
		<input type="button" class="button" id="<?php echo OBJECT_ID_BTN000040 ?>" value="契約時書面"     onclick="buttonClick('<?php echo EVENT_ID_990000040 ?>');">
		<br><br>
		<input type="button" class="button" id="<?php echo OBJECT_ID_BTN000050 ?>" value="運用報告書"     onclick="buttonClick('<?php echo EVENT_ID_990000050 ?>');">
		<br><br>
		<input type="button" class="button" id="<?php echo OBJECT_ID_BTN000060 ?>" value="取引残高報告書" onclick="buttonClick('<?php echo EVENT_ID_990000060 ?>');">
		<br><br>
		<input type="button" class="button" id="<?php echo OBJECT_ID_BTN000070 ?>" value="全種類"         onclick="buttonClick('<?php echo EVENT_ID_990000070 ?>');">
	</div>
	
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
</form>
