<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300&amp;display=swap&amp;subset=japanese" rel="stylesheet">
<?php $this->Html->css('validationEngine.jquery.css', array('inline' => false)); ?>
<?php $this->Html->script( 'jquery-1.8.2.min.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.validationEngine.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'languages/jquery.validationEngine-ja.js', array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
}
jQuery(document).ready(function(){
   jQuery("#form").validationEngine();
});
<?php $this->Html->scriptEnd(); ?>


<div class="g-bg-color--sky-light">
	<div class="container g-padding-y-80--xs g-padding-y-125--sm">

<!--		<div class="row" style="border-bottom:1px solid #ccc;">

			<div class="col-xs-12 visible-xs" style="margin-bottom:1.5em;">
				<p style="color:#333333;text-align:center;margin-top:1em;font-size:1.5em;">必要書類提出</p>
				<img class="img-responsive center-block animated pulse" style="line-height: 0;width:50%;" src="../img/shinki3_1.png" alt="出資者情報登録の流れ図">
				<p style="color:#333333;text-align:center;margin-top:0.5em;">ご本人確認のための各種必要書類のアップロードをお願いいたします。</p>
			</div>

			<div class="col-md-2 col-md-offset-2 col-sm-3 hidden-xs">
				<div class="row">
					<div class="col-md-10 col-sm-10  g-font-size-10--sm">
						<p class="g-font-size-16--sm g-font-size-14--lg" style="color:#6d6d6d;text-align:center;margin:0;">会員登録</p>
						<img class="img-responsive center-block" style="line-height: 0;" src="../img/shinki1_2.png" alt="出資者情報登録の流れ図">
						<div style="padding:0.1em;">
							<span style="color:#6d6d6d; font-size:12px;">メールアドレス、パスワード等のご登録をお願いいたします。</span>
						</div>
					</div>
					<div class="col-md-2 col-sm-2" style="padding-top:2.5em;padding-left:0;">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="font-size:30px;color:#6d6d6d;"></span>
					</div>
				</div>
			</div>

			<div class="col-md-2  col-sm-3  hidden-xs">
				<div class="row">
					<div class="col-md-10 col-sm-10 g-font-size-10--md">
						<p class="g-font-size-16--sm g-font-size-14--lg" style="color:#6d6d6d;text-align:center;margin:0;">出資者情報登録</p>
						<img class="img-responsive center-block" style="line-height: 0;" src="../img/shinki2_2.png" alt="出資者情報登録の流れ図">
						<div style="padding:0.1em;">
							<span style="color:#6d6d6d;font-size:12px;">各種情報のご登録をお願いいたします。</span>
						</div>
					</div>
					<div class="col-md-2 col-sm-2" style="padding-top:2.5em;padding-left:0;">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="font-size:30px;color:#6d6d6d;"></span>
					</div>
				</div>
			</div>

			<div class="col-md-2  col-sm-3  hidden-xs">
				<div class="row">
					<div class="col-md-10 col-sm-10  g-font-size-10--md">
						<p class="g-font-size-16--sm g-font-size-14--lg" style="color:#333333;text-align:center;margin:0;font-size:1.5em;"><b>必要書類提出</b></p>
						<img class="img-responsive center-block animated pulse" style="line-height: 0;" src="../img/shinki3_1.png" alt="出資者情報登録の流れ図">
						<div style="padding:0.1em;">
							<span style="color:#333333;font-size:12px;">ご本人確認のための各種必要書類のアップロードをお願いいたします。</span>
						</div> 
					</div>
					<div class="col-md-2 col-sm-2" style="padding-top:2.5em;padding-left:0;">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="font-size:30px;color:#333333;"></span>
					</div>
				</div>
			</div>

			<div class="col-md-2  col-sm-3  hidden-xs">
				<div class="row">
					<div class="col-md-10 col-sm-10">
						<p class="g-font-size-16--sm g-font-size-14--lg" style="color:#6d6d6d;text-align:center;margin:0;font-size:1.5em;">出資者登録完了</p>
						<img class="img-responsive center-block" style="line-height: 0;" src="../img/shinki4_2.png" alt="出資者情報登録の流れ図">
						<div style="padding:0.1em;">
							<span style="color:#6d6d6d;font-size:12px;">郵送で確認キーをお送りいたします。「確認キー」をご入力いただきましたらご登録完了となります。</span>
						</div>
					</div>
				</div>
			</div>
                                 
		</div>-->



		<div class="row">
			<div class="col-md-12 text-center">
				<div id="page-title">アップロード完了</div>
			</div> 
		</div>
	





		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-12">
				<p style="letter-spacing:.1em;">各種確認書類のアップロードありがとうございました。<br>ご登録頂いた内容および書類をもとに弊社にて本人確認を行います。<br>本人確認完了まで数日かかる場合がございます。ご了承下さい。</p>
<p>今後の流れについては<a href="../../contents/flow.php" style="border-bottom:1px double">ご利用の流れ</a>をご参照ください。				</p>
			</div>
		</div>
 


<!--		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-12">
				<p class="text-center" style="letter-spacing:.1em;"><a href="../../contents/flow.php" style="border-bottom:1px double">ご利用の流れ</a></p>
			</div>
		</div>
-->
	

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

<form id="form" name="form" method="post" action="<?php echo $action ?>">
		<div class="row" style="margin-top:4em;">
			<div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-12">
				<input type="button" style="font-size:1.2em;" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" value="トップに戻る" onclick="location.href='<?php echo URL_SITE_TOP ?>'" tabindex="4">
				<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
			</div>
		</div>
</form>


	</div>
</div> <!--content end-->

