<?php $this->Html->css('validationEngine.jquery', array('inline' => false)); ?>
<?php $this->Html->script( 'jquery.min.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.validationEngine.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'languages/jquery.validationEngine-ja.js', array( 'inline' => false ) ); ?>
<?php $this->Html->css('asobi', array('inline' => false)); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
jQuery(document).ready(function(){
   jQuery("#form").validationEngine();
});

<?php $this->Html->scriptEnd(); ?>

<div style="margin: 10px auto;">

	<h3 style="color:#ff9141;text-align: center;margin-top: 100px;padding: 0;width: 100%;">管理者ログイン</h3>

	<?php
	if (isset($validation_errors) && is_array($validation_errors)) {
		foreach ($validation_errors as $key => $values) {
			foreach ($values as $value) {
				echo '<p class="error">'.$value.'</p>';
			}
		}
	}
	?>

	<form id="form" name="form" method="post" action="<?php echo $action ?>">
		<div style="margin: 50px 0 300px 0;">
			<div id="horizontal">
				<div style="float:left;width: 48%;text-align: right;color: #000000;padding-right: 20px;">管理者ID</div>
				<div><input type="text" name="<?php echo OBJECT_ID_050010010 ?>" id="<?php echo OBJECT_ID_050010010 ?>" value="<?php echo $data[OBJECT_ID_050010010] ?>" tabindex="1"></div>
			</div>
			<div id="horizontal">
				<div style="float:left;width: 48%;text-align: right;color: #000000;padding-right: 20px;">パスワード</div>
				<div><input type="password" name="<?php echo OBJECT_ID_050010020 ?>" id="<?php echo OBJECT_ID_050010020 ?>" value="<?php echo $data[OBJECT_ID_050010020] ?>" tabindex="2"></div>
			</div>

			<div id="horizontal" style="margin: 10px;padding: 10px;width: 100%;text-align: center;">
				<input type="submit" value="ログイン" onclick="buttonClick('<?php echo EVENT_ID_050010010 ?>');" tabindex="3">
			</div>
				<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
		</div>
	</form>
</div>


<!--
	<div id='c'>
	  <div class='s'></div>
	  <div class='s'></div>
	  <div class='s'></div>
	  <div class='s'></div>
	  <div class='s'></div>
	  <div class='s'></div>
	</div>
-->
