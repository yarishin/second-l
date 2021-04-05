<?php $this->Html->css('validationEngine.jquery.css', array('inline' => false)); ?>
<?php $this->Html->script( 'jquery-1.8.2.min.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.validationEngine.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'languages/jquery.validationEngine-ja.js', array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
}
function autoLink() {
	location.href = "<?php echo URL_SITE_TOP ?>";
}
setTimeout("autoLink()",5000); 
<?php $this->Html->scriptEnd(); ?>

<div class="g-bg-color--sky-light">
	<div class="container g-padding-y-80--xs g-padding-y-125--sm">




    <?php
    if (isset($validation_errors) && is_array($validation_errors)) {
		foreach ($validation_errors as $key => $values) {
			foreach ($values as $value) {
					echo '<p class="error">'.$value.'</p>';
			}
			// echo $this->Form->error('Model.'.$key);
		}
    }
    ?>
	
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 text-center g-margin-t-45--lg  g-margin-t-20--xs">

				<form id="form" name="form" method="post" action="<?php echo $action ?>">
						
					
					<h3>このIDまたはメールアドレスでは<br>ログインする事が出来ません。</h3>
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="color:#d6d6d6;font-size:8em;margin:0.2em auto 0.4em auto;"></span><br>
									<span class="g-font-size-20--lg">５秒後にトップページに自動的に移動します。</span>

			
				<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">


				</form>

			</div>
		</div>

		<div class="row" style="margin-top:1em;">
			<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-12">
			
			<input type="button" style="font-size:1.2em;" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs  s-btn--orange-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" value="トップに戻る" onclick="location.href='<?php echo URL_SITE_TOP ?>'">
			</div>
		</div>




	</div>
</div> <!-- content end -->

