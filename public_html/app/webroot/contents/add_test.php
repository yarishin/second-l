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
	<title>不動産特定共同事業</title>
	<link href="../favicon.ico" type="image/x-icon" rel="icon" />
	<link href="../favicon.ico" type="image/x-icon" rel="shortcut icon" />
	<link rel="stylesheet" type="text/css" href="../css/base.css" />
    <link rel="stylesheet" type="text/css" href="../css/toppage.css" />
    <link rel="stylesheet" type="text/css" href="../css/test.css" />

	<link rel="stylesheet" type="text/css" href="../css/animate.css" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../css/cubeportfolio.min.css" />
	<link rel="stylesheet" type="text/css" href="../css/global.css" />
	<link rel="stylesheet" type="text/css" href="../css/scrollbar.min.css" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<link rel="stylesheet" type="text/css" href="../css/swiper.min.css" />
	<link rel="stylesheet" type="text/css" href="../css/themify.css" />
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300&display=swap&subset=japanese" rel="stylesheet">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/jquery.migrate.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.smooth-scroll.min.js"></script>
	<script src="../js/jquery.back-to-top.min.js"></script>
	<script src="../js/jquery.scrollbar.min.js"></script>
	<script src="../js/vidbg.min.js"></script>
	<script src="../js/swiper.jquery.min.js"></script>
	<script src="../js/jquery.cubeportfolio.min.js"></script>
	<script src="../js/jquery.wow.min.js"></script>
	<script src="../js/global.min.js"></script>
	<script src="../js/header-sticky.min.js"></script>
	<script src="../js/scrollbar.min.js"></script>
	<script src="../js/swiper.min.js"></script>
	<script src="../js/portfolio-4-col-slider.min.js"></script>
	<script src="../js/wow.min.js"></script>


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

<div class="container g-padding-y-80--xs g-padding-y-125--sm">

<div class="panel panel-info">
	<div class="panel-heading">
		<div class="row" style="margin-bottom:0.5em;">

				<div class="col-md-12 col-sm-12">
					本人確認書類<br class="visible-xs">【確認項目：住所、氏名、生年月日、有効期限、発行元】
				</div>
		</div>
	
	</div>
<div class="panel-body">
	<div class="row" >
		<div class="col-lg-10 col-lg-offset-1 col-md-12 col-xs-12">

			<!--pc-->
			<div class="row">
				<div class="col-md-4  col-sm-4 hidden-xs">
					<div class="row">
						<div class="col-md-11 col-sm-11">
							<img class="img-responsive center-block g-width-150--lg" src="../img/kojin_bangou.png">
							<p class="text-center" style="margin-top:0.5em;">個人番号カード<br>（表のみ）</p>
						</div>


						<div class="col-md-1 col-sm-1 hidden-xs text-center" style="padding:2em 0;">
							<b>or</b>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-4 hidden-xs">
					<div class="row">
						<div class="col-md-10 col-sm-10">
							<img class="img-responsive center-block g-width-150--lg" src="../img/menkyo_img.png">
							<p class="text-center" style="margin-top:0.5em;text-center">
								免許証　　（両面）<br>
								住基カード（両面）<br>
								パスポート（両面）<br>
								在留カード（両面）
							</p>
						</div>
							
  
						<div class="col-md-2 hidden-xs text-center" style="padding-top:2em;padding-bottom:2em;">
							<b>or</b>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-4 hidden-xs">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<img class="img-responsive center-block g-width-200--lg" src="../img/hoka_syorui.png">
						</div>
						<div class="col-md-5 col-sm-5 text-right" style="padding:0.5em 0;">
							健康保険証<br>（両面）
						</div>
						<div class="col-md-1 col-sm-1 text-center" style="padding:0.5em 0;">
							+
						</div>
						<div class="col-md-6 col-sm-6" style="padding:0.5em 0;">
							その他確認書類<br>
							年金手帳<br>
							住民票<br>
							印鑑証明書<br>
						</div>
					</div>
				</div>
					

                
				<!--sp-->
				<div class="col-xs-6 visible-xs">
					<img class="img-responsive center-block g-width-100--lg" src="../img/kojin_bangou.png">
				</div>
				<div class="col-xs-6 visible-xs">
					個人番号カード<br>（表のみ）
				</div>

				<div class="col-xs-12 visible-xs text-center" style="margin-top:2em;margin-bottom:2em;">
					<p style="font-size:2em;"><b>or</b></p>
				</div>

				<div class="col-xs-6  visible-xs">
					<img class="img-responsive center-block g-width-100--lg" src="../img/menkyo_img.png">
				</div>
				<div class="col-xs-6 visible-xs">
					免許証（両面）<br>
					住民基本台帳カード（両面）<br>
					パスポート（両面）<br>
					在留カード（両面）
				</div>
  
				<div class="col-xs-12 visible-xs text-center" style="padding-top:2em;padding-bottom:2em;">
					<p style="font-size:2em;">
						<b>or</b>
					</p>
				</div>

				<div class="col-xs-12  visible-xs">
					<div class="row">
						<div class="col-md-12 col-sm-12 visible-xs">
							<img class="img-responsive center-block g-width-200--lg" src="../img/hoka_syorui.png">
						</div>
						<div class="col-xs-5 visible-xs text-right" style="padding:0.5em 0;">
							健康保険証<br>（両面）
						</div>
						<div class="col-xs-1 visible-xs text-center" style="padding:0.5em 0;">
							+
						</div>
						<div class="col-xs-6 visible-xs" style="padding:0.5em 0;">
							その他確認書類<br>
							年金手帳<br>
							住民票<br>
							印鑑証明書<br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
							
<!--マイナンバー確認書類-->

<div class="panel panel-info">
	<div class="panel-heading">
		<div class="row" style="margin-bottom:0.5em;">

				<div class="col-md-12 col-sm-12">
			マイナンバー確認書類<br class="visible-xs">【確認項目：住所、氏名、生年月日、個人番号】
				</div>
		</div>
	</div>
	
									
<div class="panel-body">								
	<div class="row">
	<!--pc-->
		<div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 hidden-xs">
			<div class="row">
				<div class="col-md-11 col-sm-11 text-center">
					<img class="img-responsive center-block g-width-150--lg" src="../img/kojin_bangou_ura.png">
					個人番号カード<br>（裏のみ）
				</div>
  
				<div class="col-md-1 col-sm-1" style="padding:2em 0;">
					<b>or</b>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-sm-4 hidden-xs">
			<div class="row">
				<div class="col-md-11 col-sm-11 text-center">
					<img class="img-responsive center-block g-width-150--lg" src="../img/card.png">
					通知カード（両面）
				</div>
			</div>
		</div>
						

		<!--sp-->

		<div class="col-xs-6 visible-xs">
			<img class="img-responsive center-block" src="../img/kojin_bangou_ura.png">
		</div>
			<div class="col-xs-6 visible-xs">
				個人番号カード（裏のみ）
			</div>
  
		<div class="col-xs-12 visible-xs text-center" style="padding-top:2em;padding-bottom:2em;">
			<p style="font-size:2em;"><b>or</b></p>
		</div>

		<div class="col-xs-6 visible-xs">
			<img class="img-responsive center-block" src="../img/card.png">
		</div>
		<div class="col-xs-6 visible-xs">
			通知カード（両面）
		</div>


	</div>

			
		</div>
	
</div>








	<!--口座情報確認書類-->
<div class="panel panel-info">
	<div class="panel-heading">
	<div class="row" style="margin-bottom:0.5em;">
		<div class="col-md-12 col-sm-12">
			口座情報確認書類<br class="visible-xs">【確認項目：銀行名、支店名、口座番号、口座名義名】
		</div>
	</div>
	</div>
			
<div class="panel-body">
	<div class="row">
	<!--pc-->
	<div class="col-md-4 col-sm-4 hidden-xs">
		<div class="row">
			<div class="col-md-11 col-sm-11 text-center">
				<img class="img-responsive center-block g-width-150--lg" src="../img/credit.png">
					キャッシュカード
			</div>
  
			<div class="col-md-1 col-sm-1 hidden-xs text-center" style="padding:2em 0;">
					<b>or</b>
			</div>
		</div>
	</div>

	<div class="col-md-4 col-sm-4 hidden-xs">
		<div class="row">
			<div class="col-md-11 col-sm-11 text-center">
				<img class="img-responsive center-block g-width-150--lg" src="../img/passbook.png">
					通帳
			</div>

			<div class="col-md-1 col-sm-1 hidden-xs text-center" style="padding:2em 0;">
				<b>or</b>
			</div>
		</div>
	</div>

	<div class="col-md-4 col-sm-4 hidden-xs">
		<div class="row">
			<div class="col-md-11 col-sm-11 text-center">
				<img class="img-responsive center-block g-width-150--lg" src="../img/pc.png">
				口座情報<br>（ネットバンキング画面等）
			</div>
		</div>
	</div>



<!--sp--->
	<div class="col-xs-6 visible-xs">
		<img class="img-responsive center-block" src="../img/credit.png">
	</div>
	<div class="col-xs-6 visible-xs">
		キャッシュカード<br><span style="color:#f00;">クレジットカード番号およびセキュリティコードは情報取得致しませんので該当箇所は伏せて登録ください。</span>
	</div>
  
	<div class="col-xs-12 visible-xs text-center" style="padding-top:2em;padding-bottom:2em;">
		<p style="font-size:2em;"><b>or</b></p>
	</div>

	<div class="col-xs-6 visible-xs">
		<img class="img-responsive center-block" src="../img/passbook.png">
	</div>
	<div class="col-xs-6 visible-xs">
		通帳
	</div>

	<div class="col-xs-12 visible-xs text-center" style="padding-top:2em;padding-bottom:2em;">
		<p style="font-size:2em;"><b>or</b></p>
	</div>

	<div class="col-xs-6 visible-xs">
		<img class="img-responsive center-block" src="../img/pc.png">
	</div>
	<div class="col-xs-6 visible-xs">
	口座情報（ネットバンキング画面等）
	</div>


	</div>


	</div>
</div>



<div class="panel panel-info">
	<div class="panel-heading">
	<div class="row" style="margin-bottom:0.5em;">
		<div class="col-md-12 col-sm-12">
			Ｑ＆Ａ
		</div>
	</div>
	</div>



<div class="panel-body">
	<div class="row">
		<div class="col-md-12">
								<p style="color:#31708f;font-size:1.1em;"><b>Ｑ．マイナンバーはなぜ必要なの？</b></p>
								<p style="color:#a94442;">Ａ．配当をお支払いする際に源泉徴収税を控除させていただきます。<br>控除した金額を法定調書として税務署に提出する際に、調書にお客様のマイナンバーを記載する必要がございます。<br>出資後に提出となると出資者様の手間となることを考慮し、出資者情報登録の際に提出をお願いしております。</p>
								<p style="color:#31708f;font-size:1.1em;"><b>Ｑ．顔写真付きの証明書がない場合はどうしたらいい？</b></p>
								<p style="color:#a94442;">Ａ．保険証およびその他の確認書類をご提出ください。<br>また、住民票等をご提出になる場合は全部が表示されていることをご確認の上アップロードください。</p>
								<p style="color:#31708f;font-size:1.1em;"><b>Ｑ．確認書類は何を用意すればいいですか？</b></p>
								<p style="color:#a94442;">Ａ．下記の図でご確認ください。</p>
							</div>
							<div class="col-md-12">
								<img class="img-responsive" src="../img/syorui_img2.svg" style="margin-top:2em;">
							</div>

						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

			</div>
		</div>
	</div>
</div>
</div>












</div>




</body>
</html>
