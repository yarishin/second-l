<?php $this->Html->css('validationEngine.jquery.css', array('inline' => false)); ?>
<?php $this->Html->script( 'jquery.min.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.validationEngine.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'languages/jquery.validationEngine-ja.js', array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
}
<?php $this->Html->scriptEnd(); ?>

<div class="g-bg-color--sky-light">
	<div class="container g-padding-y-80--xs g-padding-y-125--xsm">
	
		<div style="margin: 0;position: relative;z-index: 1;">
			<div id="page-title" class="wow slideInUp" data-wow-duration="2s" data-wow-delay="0">パスワード再発行</div>
			<div id="page-title-mask" class="wow slideOutDown" data-wow-duration="3s" data-wow-delay=".2s"></div>
		</div>


		<form id="form" name="form" method="post" action="<?php echo $action ?>">
			<div class="row" style="margin-top:2em;position: relative;z-index: 2;">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
					<div class="panel panel-info">
  						<div class="panel-heading">
							<div class="row">
								<div class="col-lg-6 col-md-5 col-sm-6 col-xs-12">
									パスワードを紛失した場合はこちら
								</div>
								<div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
									<?php
										if (isset($err) && is_array($err)) {
											foreach ($err as $key => $values) {
												echo '<p class="error" style="font-size:0.8em;margin:0;text-align:right;"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>'.$values.'</p>';
											}
										}
									?>
								</div>
							</div>
						</div>

  						<div class="panel-body">
							<div class="row" style="border-bottom:1px dashed #ccc;padding:1em;">
								<div class="col-md-4 col-md-offset-2 col-sm-6">
									ID
								</div>
								<div class="col-md-4 col-sm-6">
									<input type="text" name="<?php echo OBJECT_ID_010050010 ?>" id="<?php echo OBJECT_ID_010050010 ?>" value="<?php echo $data[OBJECT_ID_010050010] ?>" class="" tabindex="1" size="15">
								</div>
							</div>

							<div class="row" style="border-bottom:1px dashed #ccc;padding:1em;">
								<div class="col-md-4 col-md-offset-2 col-sm-6">
									秘密の質問
								</div>
								<div class="col-md-4 col-sm-6">
									<select id="<?php echo OBJECT_ID_010050020 ?>" name="<?php echo OBJECT_ID_010050020 ?>" class="" tabindex="2">
										<?php foreach($list[CONFIG_0001] as $key => $value): ?>
										<?php $selected = ($data[OBJECT_ID_010050020] == $key) ? " selected" : ""; ?>
										<option value="<?php echo $key ?>"<?php echo $selected; ?>><?php echo $value ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>

							<div class="row" style="padding:1em;">
								<div class="col-md-4 col-md-offset-2 col-sm-6">
									秘密の質問の答え
								</div>
								<div class="col-md-4 col-sm-6">
									<input type="text" name="<?php echo OBJECT_ID_010050030 ?>" id="<?php echo OBJECT_ID_010050030 ?>" value="<?php echo $data[OBJECT_ID_010050030] ?>" class="" tabindex="3" size="15">
								</div>
							</div>
		
						</div>
					</div>
				</div>
			</div>

			<div class="row" style="margin:1em auto 4em auto;">
				<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-12">
					<input type="submit" value="送信" style="font-size:1.2em;" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" onclick="buttonClick('<?php echo EVENT_ID_010050010 ?>');" tabindex="4">
				</div>
			</div>
		
			<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
		</form>

	</div>
</div>
