<?php $this->Html->script( 'jquery-1.8.2.min.js', array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
<?php $this->Html->scriptEnd(); ?>

<p>年間取引報告書お知らせが作成されました</p>

<div>続けてPDFの作成を行ってください。<br /><br /></div>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" value="PDF作成" onclick="buttonClick('<?php echo EVENT_ID_050420010 ?>');" tabindex="1">
		<input class="button" type="button" value="戻る" onclick="buttonClick('<?php echo EVENT_ID_050420020 ?>');" tabindex="2">
	</div>
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
</form>

