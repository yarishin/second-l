<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300&amp;display=swap&amp;subset=japanese" rel="stylesheet">
<?php $this->Html->script( 'jquery-1.8.2.min.js' , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.common.js'    , array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
}
$(document).ready(function() {
	$('#<?php echo OBJECT_ID_BTN000010 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
	$('#<?php echo OBJECT_ID_BTN000020 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
});
<?php $this->Html->scriptEnd(); ?>









<!--test-->
<div class="g-bg-color--sky-light">
	<div class="container g-padding-y-80--xs g-padding-y-125--sm">

		<div class="row" style="border-bottom:1px solid #ccc;">
	<div class="col-xs-12 visible-xs" style="margin-bottom:1.5em;">
				<p style="color:#333333;text-align:center;margin-top:1em;font-size:1.5em;">会員登録</p>
				<img class="img-responsive center-block animated pulse" style="line-height: 0;width:50%;" src="../img/shinki1_1.png" alt="出資者情報登録の流れ図">
				
			</div>

			<div class="col-lg-2 col-lg-offset-2 col-md-3 col-md-offset-0 col-sm-3 col-sm-offset-0 hidden-xs" style="margin-bottom:1em;">
				<div class="row">
					<div class="col-lg-10 col-md-10 col-sm-10">
						<p class="g-font-size-16--sm g-font-size-14--lg" style="color:#333333;text-align:center;margin:0;"><b>会員登録</b></p>
						<img class="img-responsive center-block animated pulse" style="line-height: 0;" src="../img/shinki1_1.png" alt="出資者情報登録の流れ図">
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2" style="padding-top:2.5em;padding-left:0;">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="font-size:30px;color:#333333;"></span>
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
						<p class="g-font-size-14--lg g-font-size-14--sm" style="color:#6d6d6d;text-align:center;margin:0;">本人確認キー入力</p>
						<img class="img-responsive center-block" style="line-height: 0;" src="../img/shinki4_2.png" alt="出資者情報登録の流れ図">

					</div>
				</div>
			</div>
                                 
		</div>

		<div class="row">
			<div class="col-md-12 text-center">
				<div id="page-title" style="margin:1em auto;">会員登録</div>
			</div> 
		</div>


   
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-12">
				<p class="-font-size-20--xs g-font-size-20--sm g-font-size-18--lg">ご確認の上、お間違いがなければ『決定』を押してください。</p>
			</div>
		</div>

		<form id="form" name="form" method="post" action="<?php echo $action ?>">

 		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
				<table class="table">
					<tbody>
						<tr>
							<th>メールアドレス</th>
						</tr>
						<tr>
							<td><?php echo $data[OBJECT_ID_020010010] ?></td>
						</tr>
						<tr>
							<th>パスワード</th>
						</tr>
						<tr>
							<td>******</td>
						</tr>
						<tr>
							<th>秘密の質問</th>
						</tr>
						<tr>
							<td><?php echo $list[CONFIG_0001][$data[OBJECT_ID_020010050]] ?></td>
						</tr>
						<tr>
							<th>秘密の質問の答え</th>
						</tr>
						<tr>
							<td><?php echo $data[OBJECT_ID_020010060] ?></td>
						</tr>
						<tr>
							<th>個人情報保護方針</th>
						</tr>
						<tr>
							<td>同意する</td>
						</tr>
						<tr>
							<th>反社会的勢力に対する基本方針</th>
						</tr>
						<tr>
							<td>同意する</td>
						</tr>
						<tr>
							<th>電子交付について</th>
						</tr>
						<tr>
							<td>同意する</td>
						</tr>
						<!--<tr>
							<th>メールマガジン</th>
						</tr>
						<tr>
							<td><?php //echo $list[CONFIG_0046][$data[OBJECT_ID_020010070]]; ?></td>
						</tr>-->
					</tbody>
				</table>
			</div>
		</div>

<?php
//$data += array('mail_magazine_receive' => "1");
?>
		<div class="row">
			<div class="col-md-2 col-md-offset-4 col-sm-3 col-sm-offset-3 col-xs-6">
				<input type="submit" style="font-size:1.2em;" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" id="<?php echo OBJECT_ID_BTN000010 ?>" value="戻る" onclick="buttonClick('<?php echo EVENT_ID_020020010 ?>');" tabindex="1">
			</div>
			<div class="col-md-2 col-sm-3 col-xs-6">
				<input type="submit" style="font-size:1.2em;" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" id="<?php echo OBJECT_ID_BTN000020 ?>" value="決定" onclick="buttonClick('<?php echo EVENT_ID_020020020 ?>');" tabindex="2">
				<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
			</div>
		</div>

		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-xs-12">
				<small style="margin-top: 80px;display: block;">当社では、企業の実在性の証明と個人情報の保護のため、<a href="https://www.geotrust.co.jp/" target="_blank">GeoTrust社</a>のSSLサーバ証明書を使用し、SSL暗号化通信を実現しています。</small>
			</div>
		</div>


		</form>
	</div>
 
	</div> 
</div>



