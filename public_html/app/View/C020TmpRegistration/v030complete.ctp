<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300&amp;display=swap&amp;subset=japanese" rel="stylesheet">
<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	var flag = true;
	if ('<?php echo EVENT_ID_020301 ?>' == eventId) {
	}
	if (flag) {
		document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
		document.form.submit();
	}
}






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

		<div class="row" style="margin-bottom:1em;">
			<div class="col-md-6 col-md-offset-3 text-center">
				<p class="g-font-size-20--xs g-font-size-20--sm g-font-size-20--lg">ご登録ありがとうございます。</p>
			</div>
		</div>


		<div class="row" style="margin-bottom:1em;">
			<div class="col-md-6 col-md-offset-3">
				<p class="g-font-size-16--xs g-font-size-16--sm g-font-size-16--lg">ご入力のメールアドレスに確認メールを送信いたしました。<br>メールアドレス&#043;パスワード、もしくはID&#043;パスワードでログインしてください。（IDは送信メールに記載しております。）<br>メールが届かない場合は、お手数ですが<a href="<?php echo URL_CONTACT_PAGE ?>">お問い合わせ</a>よりご連絡ください。</p>
			</div>
		</div>



		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-12 text-center">
				<span style="color: #ff0000;margin-top:0.5em;"">注意：現時点では、まだ投資を行うことはできません。</span>
			</div>
		</div>

		<div class="row" style="margin-bottom:1em;">
			<div class="col-md-6 col-md-offset-3 text-center">
				<p class="g-font-size-16--xs g-font-size-16--sm g-font-size-16--lg">出資までの流れについては<a  href="../contents/flow.php">ご利用の流れ</a>をご参照ください</p>
			</div>
		</div>



		<div class="row" style="margin-top:2em;">
			<div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-12">
				<form id="form" name="form" method="post" action="<?php echo $action ?>">
				<input style="font-size:1.2em;" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" type="button" value="トップに戻る" onclick="location.href='<?php echo URL_SITE_TOP ?>'" tabindex="4">
				</form>
			</div>
		</div>
           
<script>
var _CIDN = "cid";
var _PMTV = "5ee1976016afd";
var _ARGS = "<?php echo $user_id ?>";
var _TRKU = "https://test.yarimizu.co/asp/track.php?p=" + _PMTV + "&t=5ee19760&args="+_ARGS;
var _cks = document.cookie.split("; ");
for(var i = 0; i < _cks.length; i++){ var _ckd = _cks[i].split( "=" ); if(_ckd[0] == "CL_" + _PMTV && _ckd[1].length > 1){ _TRKU += "&" + _CIDN + "=" + _ckd[1]; break; }}
img = document.body.appendChild(document.createElement("img"));
img.src = _TRKU;
</script>

	</div>
</div>

