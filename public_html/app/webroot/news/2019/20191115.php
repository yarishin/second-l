<?php
require_once "../../../Controller/Component/CommonTag.php";
//CommonTag::includeFiles();
CommonTag::includeFilesCampaign();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php CommonTag::htmlHeaderProjectDetail(); ?>
	<link rel="stylesheet" type="text/css" href="../../css/import.css" />
	<link rel="stylesheet" type="text/css" href="../../css/topics.css" />
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300&amp;display=swap&amp;subset=japanese" rel="stylesheet">
<script type="text/javascript" src="../../js/tl_cont.js"></script>
</head>
<body>

<?php CommonTag::header(); ?>

<div class="g-bg-color--sky-light">
	<div class="container g-padding-y-80--xs g-padding-y-125--xsm">

		<div style="margin: 0;position: relative;z-index: 1;">
			<div id="page-title" class="wow slideInUp" data-wow-duration="2s" data-wow-delay="0">ニュース</div>
			<div id="page-title-mask" class="wow slideOutDown" data-wow-duration="3s" data-wow-delay=".2s"></div>
		</div>

		<div class="row" style="margin-bottom:1em;margin-top:3em;padding:1em;position: relative;z-index: 2;">
			<div class="col-md-8 col-md-offset-2" style="border-bottom:1px solid #1095ac;">
				<h3 style="font-size:20px;">2019/11/15　<br class="visible-xs">サーバーメンテナンスによるサービス停止のお知らせ</h3>
			</div>
		</div>

		<div class="row" style="position: relative;z-index: 2;">
			<div class="col-md-8 col-md-offset-2">

				<p>お客様各位</p>
				<p>平素はSAMPLEをご利用いただき、誠にありがとうございます。</p>
				<p>令和X年度の年間取引報告書を発送致しました。<br>
					この度、サーバーメンテナンスの為、下記日程にてサービスを一時的に停止させていただきます。サービスのご利用を含め、当Webサイト全てのページの閲覧ができなくなりますので予めご了承ください。

				</p>
<dl>
						<dt>【サービス停止日時】</dt>
						<dd>
							2019年11月19日（金）16：00 ～ 2019年11月19日（金）17：00 ごろまで
						</dd>
						
						<dt>【停止となるサービス内容】</dt>
						<dd>
							・当Webサイトのご利用及び閲覧ができません。<br />
						
						</dd>
						<dd>
							大変ご不便をおかけしますことをお詫び申し上げます。<br />
							何卒ご理解賜りますよう宜しくお願い申し上げます。
						</dd>
						<dd>
							<font style="color: red;">終了しました</font>
						</dd>
					</dl>
					
				<div id="ta_text-r">以上</div>
			</div>
				
		</div>

		<div class="wow" style="margin: 100px auto 0 auto;width: 30%;">
			<button type="button" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--md s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" onclick="location.href='<?php echo URL_INFO_PAGE ?>'">一覧へ戻る</button>
		</div>


	</div> <!-- content end -->
</div>    
<?php CommonTag::footer(); ?>
	<script src="../../js/jquery.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/jquery.back-to-top.min.js"></script>
	<script src="../../js/header-sticky.min.js"></script>
	<script src="../../js/jquery.wow.min.js"></script>
	<script src="../../js/wow.min.js"></script>
</body>
</html>
