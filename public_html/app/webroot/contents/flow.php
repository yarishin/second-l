<?php
require_once "../../Controller/Component/CommonTag.php";
CommonTag::includeFiles();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo SITE_TITLE; ?>｜ご利用の流れ</title>
	<link href="../favicon.ico" type="image/x-icon" rel="icon" />
	<link href="../favicon.ico" type="image/x-icon" rel="shortcut icon" />
	<link rel="stylesheet" type="text/css" href="../css/import.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300&display=swap&subset=japanese" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
	<script type="text/javascript" src="../js/tl_cont.js"></script>
	<script type="text/javascript">
	//<![CDATA[
	function buttonClick(eventId) {
		var flag = true;
		if ('e020301' == eventId) {
		}
		if (flag) {
			document.getElementById('event_id').value = eventId;
			document.form.submit();
		}
	}
	//]]>
	</script>
</head>
<body>

<?php CommonTag::header(); ?>
<div class="g-bg-color--sky-light">
    <div class="container g-padding-y-80--xs g-padding-y-125--xsm">

		<div style="margin: 0;position: relative;z-index: 0;">
			<div id="page-title" class="wow slideInUp" data-wow-duration="2s" data-wow-delay="0">ご利用の流れ</div>
			<div id="page-title-mask" class="wow slideOutDown hidden-md" data-wow-duration="3s" data-wow-delay=".2s"></div>
		</div>

	<div class="row" style="margin-top:2em;">
		<div class="col-lg-8 col-lg-offset-2">
			<h1 style="font-size:2em;">会員登録・出資者登録</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
			<div class="row-height">
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 text-center" style="background-color:#66cccc;border-radius:5px 5px 0 0;padding-top:1em;">
					<h2 style="color:#fff;">1</h2>
					<img class="img-responsive center-block" src="../img/f_1_1.png">
				</div>

				<div class="col-lg-11 col-md-11 col-sm-11 col-xs-10" style="padding:1.5em;">
					<h3 style="font-size:1.3em;">会員登録</h3>
					<p>会員登録ページにメールアドレス・パスワード等必要事項を入力ください。</p>
				</div>


			</div>

			<div class="row-height">
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 text-center" style="background-color:#66cccc;padding-top:1em;">
					<h2 style="color:#fff;">2</h2>
					<img class="img-responsive center-block" src="../img/f_1_2.png">

				</div>

				<div class="col-lg-11 col-md-11 col-sm-11 col-xs-10" style="padding:1.5em;">
					<h3 style="font-size:1.3em;">出資者登録</h3>
					<p>マイページにログイン後、利用規約等の確認および必要事項を入力ください。</p>
				</div>


			</div>

			<div class="row-height">
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 text-center" style="background-color:#66cccc;padding-top:1em;">
					<h2 style="color:#fff;">3</h2>
					<img class="img-responsive center-block" src="../img/f_1_3.png">

				</div>

				<div class="col-lg-11 col-md-11 col-sm-11 col-xs-10" style="padding:1.5em;">
					<h3 style="font-size:1.3em;">確認書類アップロード</h3>
					<p>ご本人確認のため各種確認書類をアップロードしてください。スマートフォン等の場合、その場で撮影することも可能です。各種確認書類については<a href="c_documents.php" target="_blank">コチラ</a>をご確認ください。</p>
				</div>


			</div>

			<div class="row-height">
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 text-center" style="background-color:#66cccc;padding-top:1em;">
					<h2 style="color:#fff;">4</h2>
					<img class="img-responsive center-block" src="../img/f_1_4.png">

				</div>

				<div class="col-lg-11 col-md-11 col-sm-11 col-xs-10" style="padding:1.5em;">
					<h3 style="font-size:1.3em;">本人確認キー（ハガキ）の受けとり・入力</h3>
					<p>本人確認完了後、弊社よりご登録住所宛てに「本人確認キー」を記載したはがきを書留（転送不要）で送付いたします。</p><span style="font-size:0.8em;">※犯罪収益移転防止法に基づき、転送はできません。ご了承ください。</span>
				</div>


			</div>

			<div class="row-height">
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 text-center" style="padding-top:1em;background-color:#66cccc;border-radius:0 0 5px 5px;">
					<h2 style="color:#fff;">5</h2>
					<img class="img-responsive center-block" src="../img/f_1_5.png">

				</div>

				<div class="col-lg-11 col-md-11 col-sm-11 col-xs-10" style="padding:1.5em;">
					<h3 style="font-size:1.3em;">出資者登録完了</h3>
					<p>マイページへログインしていただき「本人確認キー」を入力・送信ください。送信後はすぐに出資申込が可能です。</p>			</div>


			</div>




		</div>
	</div>


	<div class="row" style="margin-top:2em;">
		<div class="col-lg-8 col-lg-offset-2">
			<h1 style="font-size:2em;">出資方法</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">

			<div class="row-height">
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 text-center" style="background-color:#6699ff;border-radius:5px 5px 0 0;padding-top:1em;">
					<h2 style="color:#fff;">1</h2>
					<img class="img-responsive center-block" src="../img/f_2_1.png">

				</div>

				<div class="col-lg-11 col-md-11 col-sm-11 col-xs-10" style="padding:1.5em;">
					<h3 style="font-size:1.3em;">ファンドへの出資申込</h3>
					<p>ファンドを選択後、詳細ページの「この商品に出資する」を押します。続けて、出資金額を入力し、成立前書面および不動産特定共同事業契約約款を確認いただき「決定」を押します。</p><span style="font-size:0.8em;">※確認のため、登録メールアドレスに出資申込内容をお送りします。</span>
				</div>


			</div>

			<div class="row-height">
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 text-center" style="background-color:#6699ff;padding-top:1em;">
					<h2 style="color:#fff;">2</h2>
					<img class="img-responsive center-block" src="../img/f_2_2.png">

				</div>

				<div class="col-lg-11 col-md-11 col-sm-11 col-xs-10" style="padding:1.5em;">
					<h3 style="font-size:1.3em;">出資確定のご連絡</h3>
					<p>出資申込の額等確定しましたら、弊社から登録メールアドレスに「出資確定のご連絡」をお送りいたします。</p>
				</div>


			</div>

			<div class="row-height">
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 text-center" style="background-color:#6699ff;padding-top:1em;">
					<h2 style="color:#fff;">3</h2>
					<img class="img-responsive center-block" src="../img/f_2_3.png">

				</div>

				<div class="col-lg-11 col-md-11 col-sm-11 col-xs-10" style="padding:1.5em;">
					<h3 style="font-size:1.3em;">成立時書面・不動産特定共同事業契約約款の確認および同意</h3>
					<p>マイページの成立時書面・不動産特定共同事業契約約款を確認および内容へ同意をいただきます。確認後の書面はマイページ内より確認いただけます。</p>
<span style="font-size:0.8em;">※お振込みをいただいても書面の同意が期日内にいただけない場合には、振込手数料を差し引きご登録金融機関へ返金させていただきます。</span>
				</div>


			</div>

			<div class="row-height">
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 text-center" style="background-color:#6699ff;padding-top:1em;">
					<h2 style="color:#fff;">4</h2>
					<img class="img-responsive center-block" src="../img/f_2_4.png">

				</div>

				<div class="col-lg-11 col-md-11 col-sm-11 col-xs-10" style="padding:1.5em;">
					<h3 style="font-size:1.3em;">出資金額の振込</h3>
					<p>指定日までに指定口座へお振込みください。下記事項を必ずご確認ください。</p>
					<span style="font-size:0.8em;">※振込手数料はお客様負担とさせていただきます。</span><br>
					<span style="font-size:0.8em;">※事前登録金融機関以外からの入金も受けつけさせていただきます。</span><br>
					<span style="font-size:0.8em;">※必ずご自身の名義でお振込みください。</span>
				</div>


			</div>

			<div class="row-height">
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 text-center" style="background-color:#6699ff;border-radius:0 0 5px 5px;padding-top:1em auto;">
					<h2 style="color:#fff;">5</h2>
					<img class="img-responsive center-block" src="../img/f_2_5.png" style="margin-bottom;2em;">

				</div>

				<div class="col-lg-11 col-md-11 col-sm-11 col-xs-10" style="padding:1.5em;">
					<h3 style="font-size:1.3em;">入金確認のご連絡</h3>
					
					<p>入金を確認しましたら、弊社から登録メールアドレスに「入金確認のご連絡」をお送りいたします。</p>
				</div>


			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 text-center">
			<h1 style="font-size:1.5em;">～運用開始までお待ちください～</h1>
		</div>
	</div>




	<div class="row" style="margin-top:2em;">
		<div class="col-lg-8 col-lg-offset-2">
			<h3 style="font-size:2em;">運用</h3>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
			<div class="row-height">
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 text-center" style="background-color:#9999cc;border-radius:5px 5px 0 0 ;padding-top:1em;">
					<h2 style="color:#fff;">1</h2>
					<img class="img-responsive center-block" src="../img/f_3_1.png">

				</div>

				<div class="col-lg-11 col-md-11 col-sm-11 col-xs-10" style="padding:1.5em;">
					<h3 style="font-size:1.3em;">運用開始</h3>
					<p>運用開始予定日になりましたら運用をスタートします。</p>
				</div>

			</div>

			<div class="row-height">
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 text-center" style="background-color:#9999cc;padding-top:1em;">
					<h2 style="color:#fff;">2</h2>
					<img class="img-responsive center-block" src="../img/f_3_2.png">

				</div>

				<div class="col-lg-11 col-md-11 col-sm-11 col-xs-10" style="padding:1.5em;">
					<h3 style="font-size:1.3em;">配当金の受けとり</h3>
					<p>ご登録いただいた金融機関へ配当金をお支払いいたしますのでご確認ください。お支払予定日およびお支払い頻度は各ファンドによって異なりますので、ファンドページもしくは不動産特定共同事業契約約款にてご確認ください。</p>
<span style="font-size:0.8em;">※お支払いの際に配当金に対して20.42％（所得税・復興特別所得税）の源泉徴収をいたします。</span>
				</div>

			</div>

			<div class="row-height">
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 text-center" style="background-color:#9999cc;padding-top:1em;">
					<h2 style="color:#fff;">3</h2>
					<img class="img-responsive center-block" src="../img/f_3_3.png">

				</div>

				<div class="col-lg-11 col-md-11 col-sm-11 col-xs-10" style="padding:1.5em;">
					<h3 style="font-size:1.3em;">財産管理報告書・年間取引報告書の受けとり</h3>
					<p>下記書面をマイページ内にお知らせいたしますので、ご確認ください。</p>
					<span style="font-weight:600;">＜財産管理報告書＞</span><br>ファンドごとに交付時期が異なります。ファンドごとの詳細ページをご確認ください。<br><br>
					<span style="font-weight:600;">＜年間取引報告書＞</span><br>1月下旬に発行予定<br>
					<span style="font-size:0.8em;">※年間取引報告書を税務申告等に使用するため書面発行をご希望の方は、お問い合わせよりご依頼ください。</span>
				</div>

			</div>

			<div class="row-height">
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 text-center" style="background-color:#9999cc;border-radius:0 0 5px 5px;padding-top:1em;">
					<h2 style="color:#fff;">4</h2>
					<img class="img-responsive center-block" src="../img/f_3_4.png">

				</div>

				<div class="col-lg-11 col-md-11 col-sm-11 col-xs-10" style="padding:1.5em;">
					<h3 style="font-size:1.3em;">運用終了</h3>
					<p>運用が終了いたしましたら、ご登録いただいた金融機関へ出資金を払戻しいたします。</p>
					<span style="font-size:0.8em;">※ファンドによっては延長等の措置を取らせていただく場合がございます。</span>
				</div>

			</div>



	</div>
</div>

</div>
</div>
<?php CommonTag::footer(); ?>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.back-to-top.min.js"></script>
	<script src="../js/header-sticky.min.js"></script>
	<script src="../js/jquery.wow.min.js"></script>
	<script src="../js/wow.min.js"></script>
</body>
</html>
