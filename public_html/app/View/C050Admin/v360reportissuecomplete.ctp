<?php $this->Html->script( 'jquery-1.8.2.min.js', array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
<?php $this->Html->scriptEnd(); ?>

<p>報告書発行(完了)</p>

<div>報告書発行が完了しました。<br /><br /></div>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" value="戻る" onclick="buttonClick('<?php echo EVENT_ID_050360010 ?>');" tabindex="16">
	</div>
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
</form>

