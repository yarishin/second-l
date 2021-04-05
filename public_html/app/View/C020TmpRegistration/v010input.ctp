<?php $this->Html->css(    'validationEngine.jquery.css'            , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.min.js'                    , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.validationEngine.js'             , array( 'inline' => false ) ); ?>
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
				<p class="g-font-size-16--xs g-font-size-16--sm g-font-size-16--lg" style="letter-spacing:0.05em;line-height:1.5em;">
					※法人会員登録をご希望の方は<a href="<?php echo URL_CONTACT_PAGE ?>">こちら</a>よりお問い合わせください。
				</p>
			</div>
		</div>


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
			<div class="row">
				<div class="form-group">
					<div class="col-lg-3 col-lg-offset-3 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
						<label for="<?php echo OBJECT_ID_020010010 ?>"><span class="h4" style="line-height: 1.5;"><b>メールアドレス</b></span></label>
					</div>

					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<!--<input type="text" class="form-control" size="30" name="<?php echo OBJECT_ID_020010010 ?>" id="<?php echo OBJECT_ID_020010010 ?>" value="<?php echo $data[OBJECT_ID_020010010] ?>" class="validate[required,custom[email],custom[onlyLetterNumberSymbol],maxSize[200]]" tabindex="1"><br>-->
						<input type="text" size="30" name="<?php echo OBJECT_ID_020010010 ?>" id="<?php echo OBJECT_ID_020010010 ?>" value="<?php echo $data[OBJECT_ID_020010010] ?>" class="validate[required,custom[email],custom[onlyLetterNumberSymbol],maxSize[200]] form-control" tabindex="1"><br>
					</div>
				</div>
			</div>


			<div class="row">
				<div>
					<div class="col-lg-3 col-lg-offset-3 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
						<label for="<?php echo OBJECT_ID_020010020 ?>"><span class="h4" style="line-height: 1.5;"><b>メールアドレス（確認）</b></span></label>
					</div>

					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<input type="text" size="30" name="<?php echo OBJECT_ID_020010020 ?>" id="<?php echo OBJECT_ID_020010020 ?>" value="<?php echo $data[OBJECT_ID_020010020] ?>" class="validate[required,equals[<?php echo OBJECT_ID_020010010 ?>]] form-control" tabindex="2">
					</div>
				</div>
			</div>

			<div class="row">
				<div style="margin-top:2em;">
					<div class="col-lg-3 col-lg-offset-3 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
						<label for="<?php echo OBJECT_ID_020010030 ?>"><span class="h4" style="line-height: 1.5;"><b>パスワード</b></span></label>
					</div>

					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<input type="password" size="30" name="<?php echo OBJECT_ID_020010030 ?>" id="<?php echo OBJECT_ID_020010030 ?>" value="<?php echo $data[OBJECT_ID_020010030] ?>" class="validate[required,custom[onlyLetterNumberSymbol],minSize[6],maxSize[12]] form-control" tabindex="3">
						<span style="color:#f00;font-size:14px;margin:0;padding:0;">半角英数字6文字以上12文字以下</span>
					</div>
				</div>
			</div>

			<div class="row">
				<div>
					<div class="col-lg-3 col-lg-offset-3 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
						<label for="<?php echo OBJECT_ID_020010040 ?>"><span class="h4" style="line-height: 1.5;"><b>パスワード（確認）</b></span></label>
					</div>

					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<input type="password" size="30" name="<?php echo OBJECT_ID_020010040 ?>" id="<?php echo OBJECT_ID_020010040 ?>" value="<?php echo $data[OBJECT_ID_020010040] ?>" class="validate[required,equals[<?php echo OBJECT_ID_020010030 ?>]] form-control" tabindex="4">
					</div>
				</div>
			</div>

			<div class="row">
				<div style="margin-top:2em;">

					<div class="col-lg-3 col-lg-offset-3 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
						<label><span class="h4" style="line-height: 1.5;"><b>秘密の質問</b></span></label>
					</div>

					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<select id="<?php echo OBJECT_ID_020010050 ?>" name="<?php echo OBJECT_ID_020010050 ?>" class="validate[required] form-control" tabindex="5">
								<?php foreach($list[CONFIG_0001] as $key => $value): ?>
										<?php $selected = ( $data[OBJECT_ID_020010050] == $key ) ? " selected" : ""; ?>
										<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
								<?php endforeach; ?>
						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div style="margin-top:1em;">

					<div class="col-lg-3 col-lg-offset-3 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
						<label for="<?php echo OBJECT_ID_020010060 ?>"><span class="h4" style="line-height: 1.5;"><b>秘密の質問の答え</b></span></label>
					</div>

					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<input type="text" size="30" name="<?php echo OBJECT_ID_020010060 ?>" id="<?php echo OBJECT_ID_020010060 ?>" value="<?php echo $data[OBJECT_ID_020010060] ?>" class="validate[required,custom[onlyEm],maxSize[30]] form-control" tabindex="6"><span style="color:#f00;font-size:14px;margin:0;padding:0;">全角30文字以内。登録後は変更不可。</span>
					</div>
				</div>
			</div>

			<div class="row col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12" style="margin-top: 20px;margin-bottom: 20px;">
				<table class="table">
					<tr>
						<td>
							<?php $checked = ( $data[OBJECT_ID_020010080] == 1 ) ? " checked" : ""; ?>
							<input type="checkbox" style="width:20px;height:20px;" name="<?php echo OBJECT_ID_020010080 ?>" id="<?php echo OBJECT_ID_020010080 ?>" value="1" class="validate[privacyPolicyAgreement]" tabindex="7"<?php echo $checked; ?> >
						</td>
						<td>
							<b style="font-size: 1.2em;">個人情報保護方針</b><br>
							当社の <a href="<?php echo URL_PRIVACY_PAGE ?>" target="_blank">個人情報保護方針</a> をご確認いただき、この内容に同意いただける方はチェックの上、確認画面へお進みください。
						</td>
					</tr>
					
					<tr>
						<td>
							<?php $checked = ( $data[OBJECT_ID_020010090] == 1 ) ? " checked" : ""; ?>
							<input type="checkbox" style="width: 20px;height: 20px;" name="<?php echo OBJECT_ID_020010090 ?>" id="<?php echo OBJECT_ID_020010090 ?>" value="1" class="validate[antiSocialForces]" tabindex="8"<?php echo $checked; ?> >
						</td>
						<td>
							<b style="font-size: 1.2em;">反社会的勢力に対する基本方針</b><br>
							当社の <a href="<?php echo URL_ANTISOCIAL_PAGE ?>" target="_blank">反社会的勢力に対する基本方針</a> をご確認いただき、この内容に同意いただける方はチェックの上、確認画面へお進みください。
						</td>
					</tr>

					<tr>
						<td>
							<?php $checked = ( $data[OBJECT_ID_020010100] == 1 ) ? " checked" : ""; ?>
							<input type="checkbox" style="width:20px;height:20px;" name="<?php echo OBJECT_ID_020010100 ?>" id="<?php echo OBJECT_ID_020010100 ?>" value="1" class="validate[electronicPropertyReport]" tabindex="9"<?php echo $checked; ?>>
						</td>
						<td>
						<b style="font-size: 1.2em;">電磁的方法による書面交付に関する同意</b><br>
							当サイトでは、不動産特定共同事業契約に関する重要書面および各報告書を電子交付で行います。同意いただける方はチェックの上、確認画面へお進みください。なお、同意いただけない場合はサービスをご利用いただけません。
						</td>
					</tr>
				</table>
			</div>



			<div class="row" style="margin-top:4em;">
				<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12">
					<input type="submit" style="font-size:1.2em;" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" id="<?php echo OBJECT_ID_BTN000010 ?>" value="確認" onclick="buttonClick('<?php echo EVENT_ID_020010010 ?>');" tabindex="12">
					<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
				</div>
			</div>

		</form>


		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-xs-12">
				<small style="margin-top: 80px;display: block;">当社では、企業の実在性の証明と個人情報の保護のため、<a href="https://www.geotrust.co.jp/" target="_blank">GeoTrust社</a>のSSLサーバ証明書を使用し、SSL暗号化通信を実現しています。</small>
			</div>
		</div>

	</div>
</div>

