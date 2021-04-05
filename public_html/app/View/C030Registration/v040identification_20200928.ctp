<?php $this->Html->script( 'jquery-1.8.2.min.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.common.js'    , array( 'inline' => false ) ); ?>
<?php $this->Html->css('mypage.css', array('inline' => false)); ?>
<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
$(document).ready(function() {
	$('#<?php echo OBJECT_ID_BTN000010 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
	$('#<?php echo OBJECT_ID_BTN000020 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
});
<?php $this->Html->scriptEnd(); ?>


<div class="g-bg-color--sky-light">
	<div class="container g-padding-y-80--xs g-padding-y-125--sm">


		<div class="row" style="border-bottom:1px solid #ccc;">

			<div class="col-xs-12 visible-xs" style="margin-bottom:1.5em;">
				<p style="color:#333333;text-align:center;margin-top:1em;font-size:1.5em;">必要書類提出</p>
				<img class="img-responsive center-block animated pulse" style="line-height: 0;width:50%;" src="../img/shinki3_1.png" alt="出資者情報登録の流れ図">

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
						<p class="g-font-size-16--sm g-font-size-14--lg" style="color:#333333;text-align:center;margin:0;font-size:1.5em;"><b>必要書類提出</b></p>
						<img class="img-responsive center-block animated pulse" style="line-height: 0;" src="../img/shinki3_1.png" alt="出資者情報登録の流れ図">
 
					</div>
					<div class="col-md-2 col-sm-2" style="padding-top:2.5em;padding-left:0;">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="font-size:30px;color:#333333;"></span>
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
				<div id="page-title" style="margin:0.5em auto;">
					確認書類アップロードのご案内
				</div>
			</div> 
		</div>

	
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" style="padding:0.5em;">


			<p style="font-size:20px;text-align:center;"><b>出資者情報のご登録ありがとうございました。</b></p>
			続いて各種確認書類のアップロードをお願いいたします。
			下記確認書類をご用意のうえお進みください。
			スマートフォン等の場合、その場で撮影することも可能です。
			</div>
		</div>
	
		<div class="row">
			<div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">		
				<ul style="list-style-type: square;">
					<li><b>本人確認書類(下記一覧より2点)<br><span style="font-size:12px;color:#f00;">うち１点は顔写真のあるものをご用意下さい。</span></b></li>
					<li><b>マイナンバー確認書類(1点)</b></li>
					<li><b>口座情報確認書類(1点)</b></li>
				</ul>
			</div>
		</div>
		


		 			<!--<div class="row">
				<div class="col-lg-2 col-lg-offset-4 col-md-3 col-md-offset-3 col-sm-4 col-sm-offset-2 col-xs-12 col-xs-offset-0" style="background:#337ab7;border:2px solid #337ab7;padding:1em;"><span style="color:#fff;letter-spacing:0.1em;">確認書類提出期限</span></div>
					<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12" style="border:2px solid #337ab7;padding:1em;"><span style="color:#f00;letter-spacing:0.1em;"><b><?php echo $data[OBJECT_ID_030040010] ?></b></span></div>
				</div>--> 

	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
			<span style="font-size:1em;">※ご注意※　30日以内にご提出がない場合、出資者登録をキャンセルさせていただきます。</span>
		</div>
	</div>
	<div class="row" style="margin-top:1em;">
		<div class="col-md-8 col-md-offset-2">
			<div class="row" style="border:0.1em solid #73caff;margin-bottom:1em;border-radius: 0.5em;padding:1em;">
				<div class="col-md-8">
					下記の点を再度ご確認ください！！<br>
					・氏名、生年月日、住所は相違ないか<br>
					・有効期限内のものであるか<br>
					・銀行名、支店名、口座番号、口座名義人名は相違ないか<br>
					・画像がぼやけたり、切れたりしていないか。<br>
					<span style="color:#f00;">ご提出書類に不備があった場合、別途ご案内をお送りします。</span>
				</div>
				<div class="col-md-4">
					<p style="font-size:0.8em;">※下図のような状態の場合、再提出となります。</p>
					<img class="img-responsive center-block" src="../img/bad-example-drvlic.jpg">
				</div>
			</div>
		</div>
	</div>


		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<p style="color:#f00;">※既にアップロードが完了されたお客様は、現在弊社にて本人確認を実施しております。本人確認終了までお待ちください。（完了されたお客様にはアップロード完了のメールが送られております。）</p>
			</div>
		</div>



	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
		<form id="form" name="form" method="post" action="<?php echo $action ?>" style="margin-top:0;">
			<input type="button" id="<?php echo OBJECT_ID_BTN000010 ?>" style="font-size:1.2em;" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" value="アップロード画面へ" onclick="buttonClick('<?php echo EVENT_ID_040010080 ?>');">
		</div>
	</div>
		
			<div style="clear: both;"></div>

<?php require 'contents/documents_tmp.php'; ?>



		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<p style="color:#f00;margin-bottom:0;">※既にアップロードが完了されたお客様は、現在弊社にて本人確認を実施しております。本人確認終了までお待ちください。（完了されたお客様にはアップロード完了のメールが送られております。）</p>
			</div>
		</div>

		

	<div class="row" style="margin-top:2em;">
		<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
				<input type="button" id="<?php echo OBJECT_ID_BTN000020 ?>" style="font-size:1.2em;" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" value="アップロード画面へ" onclick="buttonClick('<?php echo EVENT_ID_040010080 ?>');">
				<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
		</div>
	</div>
			</div>
		</form>
	</div>

	</div>
</div>
</div> <!--content end-->

