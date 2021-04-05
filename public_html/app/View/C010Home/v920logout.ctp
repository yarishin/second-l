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
    <div class="container g-padding-y-80--xs g-padding-y-125--xsm">

			<!--<div class="row col-md-12 g-margin-b-0--xs">
			<div style="margin: 0;position: relative;z-index: 1;">
				<div id="page-title" class="wow slideInUp" data-wow-duration="2s" data-wow-delay="0">ログアウトしました</div>
				<div id="page-title-mask" class="wow slideOutDown hidden-md" data-wow-duration="3s" data-wow-delay=".2s"></div>
			</div>
		</div>-->




	    <div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 g-margin-b-0--xs g-margin-b-0--lg" style="position: relative;z-index: 2;">






	

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


						<h3>ログアウトしました。</h3>


						<span class="glyphicon glyphicon-log-out" aria-hidden="true" style="color:#d6d6d6;font-size:8em;margin:0.2em auto 0.5em auto;"></span><br>

						<span class="g-font-size-20--lg">５秒後にトップページに自動的に移動します。</span>



						<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
					</form>
			</div>
			</div>
		
					<!--<div style="margin-top: 50px;">
						<input type="button" class="kari_form_bt2" value="トップに戻る" onclick="location.href='<?php echo URL_SITE_TOP ?>'">
					</div>-->

					<!-- ボタンエリア -->
			<div class="row">
	                <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-12">
		                <div class="g-text-center--xs g-padding-y-20--xs">
						
							<button type="button" class="btn-block s-btn s-btn--orange-bg g-radius--50 g-padding-x-50--xs" style="padding: 15px 0;" onclick="location.href='<?php echo URL_SITE_TOP ?>'">トップに戻る</button>
			            </div>
			</div>
			</div>
					<!-- End ボタンエリア -->


				</div>
			</div> <!-- content end -->
		</div>
		</div>
	</div>
</div>
