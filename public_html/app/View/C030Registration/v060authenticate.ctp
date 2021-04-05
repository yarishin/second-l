<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300&amp;display=swap&amp;subset=japanese" rel="stylesheet">
<?php $this->Html->css(    'validationEngine.jquery.css'             , array( 'inline' => false )); ?>
<?php $this->Html->script( 'jquery-1.8.2.min.js'                     , array( 'inline' => false )); ?>
<?php $this->Html->script( 'jquery.validationEngine.js'              , array( 'inline' => false )); ?>
<?php $this->Html->script( 'languages/jquery.validationEngine-ja.js' , array( 'inline' => false )); ?>
<?php $this->Html->script( 'jquery.common.js'                        , array( 'inline' => false )); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
}
jQuery(document).ready(function(){
   jQuery("#form").validationEngine();
});
$(document).ready(function() {
	$('#<?php echo OBJECT_ID_BTN000010 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
});
<?php $this->Html->scriptEnd(); ?>


<div class="g-bg-color--sky-light">
	<div class="container g-padding-y-80--xs g-padding-y-125--sm">

		<div class="row" style="border-bottom:1px solid #ccc;">

			<div class="col-xs-12 visible-xs" style="margin-bottom:1.5em;">
				<p style="color:#333333;text-align:center;margin-top:1em;font-size:1.5em;">本人確認キー入力</p>
				<img class="img-responsive center-block animated pulse" style="line-height: 0;width:50%;" src="../img/shinki4_1.png" alt="出資者情報登録の流れ図">

			</div>

	<div class="col-lg-2 col-lg-offset-2 col-md-3 col-md-offset-0 col-sm-3 col-sm-offset-0 hidden-xs" style="margin-bottom:1em;">
				<div class="row">
					<div class="col-lg-10 col-md-10 col-sm-10">
						<p class="g-font-size-16--sm g-font-size-14--lg" style="color:#6d6d6d;text-align:center;margin:0;">会員登録</p>
						<img class="img-responsive center-block" style="line-height: 0;" src="../img/shinki1_2.png" alt="出資者情報登録の流れ図">
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2" style="padding-top:2.5em;padding-left:0;">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="font-size:30px;color:#6d6d6d;"></span>
					</div>
				</div>
			</div>

			<div class="col-lg-2 col-md-3 col-sm-3 hidden-xs">
				<div class="row">
					<div class="col-md-10 col-sm-10 g-font-size-10--md">
						<p class="g-font-size-16--sm g-font-size-14--lg" style="color:#6d6d6d;text-align:center;margin:0;">出資者情報登録</p>
						<img class="img-responsive center-block" style="line-height: 0;" src="../img/shinki2_2.png" alt="出資者情報登録の流れ図">

					</div>
					<div class="col-md-2 col-sm-2" style="padding-top:2.5em;padding-left:0;">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="font-size:30px;color:#6d6d6d;"></span>
					</div>
				</div>
			</div>

			<div class="col-lg-2 col-md-3 col-sm-3 hidden-xs">
				<div class="row">
					<div class="col-md-10 col-sm-10 g-font-size-10--md">
						<p class="g-font-size-16--sm g-font-size-14--lg" style="color:#6d6d6d;text-align:center;margin:0;font-size:1.5em;">必要書類提出</p>
						<img class="img-responsive center-block" style="line-height: 0;" src="../img/shinki3_2.png" alt="出資者情報登録の流れ図">
 
					</div>
					<div class="col-md-2 col-sm-2" style="padding-top:2.5em;padding-left:0;">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="font-size:30px;color:#6d6d6d;"></span>
					</div>
				</div>
			</div>

			<div class="col-lg-2 col-md-3 col-sm-3 hidden-xs">
				<div class="row">
					<div class="col-lg-10 col-md-10 col-sm-10">
						<p class="g-font-size-14--lg g-font-size-14--sm" style="color:#333333;text-align:center;margin:0;"><b>本人確認キー入力</b></p>
						<img class="img-responsive center-block animated pulse" style="line-height: 0;" src="../img/shinki4_1.png" alt="出資者情報登録の流れ図">

					</div>
				</div>
			</div>
                                 
		</div>



		<div class="row">
			<div class="col-md-12 text-center">
				<div id="page-title">
					本人確認キー入力
				</div>
			</div> 
		</div>


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
			<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
				<b>お手元のはがきに記載されている『本人確認キー』を入力してください<br>本人確認キーの送信が完了しましたら、出資が可能となります。</b>
			</div>
		</div>



	<form id="form" name="form" method="post" action="<?php echo $action ?>">
		<div class="row">
			<div class="col-md-2 col-md-offset-3 col-sm-3 col-sm-offset-1 col-xs-12 text-center" style="margin-top:2em;">
				<span class="h4"><b>本人確認キー</b></span>
  			</div>
			<div class="col-md-4 col-md-offset-0 col-sm-7 col-sm-offset-0 col-xs-8 col-xs-offset-2" style="margin-top:2em;">
				<input type="text" class="form-control" name="<?php echo OBJECT_ID_030060010 ?>" id="<?php echo OBJECT_ID_030060010 ?>" value="<?php echo $data[OBJECT_ID_030060010] ?>" tabindex="1">
			</div>
		</div>

		<div class="row" style="margin-top:4em;">
			<div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-12">
				<input type="submit" style="font-size:1.2em;" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" id="<?php echo OBJECT_ID_BTN000010 ?>"  value="本人確認キーを送信する" onclick="buttonClick('<?php echo EVENT_ID_030060010 ?>');" tabindex="2">
				<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
			</div>
		</div>
	</form>

		
                         
                    </div>
                </div>

	</div>
</div>

		
<!--content end-->