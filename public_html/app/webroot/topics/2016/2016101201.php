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
	<link rel="stylesheet" type="text/css" href="../../css/topics.css" />
        <link rel="stylesheet" type="text/css" href="../css/toppage.css" />
</head>
<body>

<?php CommonTag::header(); ?>
    
    <div id="header_under">
       <div id="breadcrumb-area"><a href='<?php echo URL_SITE_TOP ?>'>HOME</a> > 2016/10/12 サーバ復旧について</div>
    </div>
    
    <div id="content">
        <div id="page-title">お知らせ</div>
		
		<div id="topics_area">
			<div id="ta_main">
				<div id="ta_text-r">2016/10/12</div>
				<div id="ta_main-title">サーバ復旧について</div>
				<div id="ta_shousai">
					<p>
						お客様各位<br /><br />
						本日15時30分ごろ埼玉県新座方面で発生した火災の影響による停電及びそれに伴うＮＴＴ光回線の障害による影響を受け、<br />17時30分ごろまでの間、Trust Lendingサービスを停止させていただきました。<br /><br />
						現在は復旧しサービスを開始しております。<br /><br />
						お客様におかれましては、ご心配ご迷惑をお掛け致しまして誠に申し訳ございませんでした。<br />
						今後とも、Trust Lending及びトラストファイナンスを宜しくお願いします。<br /><br />
						※本件についてのお問い合わせは下記までお願いします。<br /><br />
						株式会社トラストファイナンス<br />
						第二種金融商品取引業者 関東財務局長（金商）第2601号<br />
						一般社団法人第二種金融商品取引業協会 加入<br />
						Eメール（24時間受付）：<a href="mailto:support@trust-lending.net">support@trust-lending.net</a><br />
						電話（平日10：00～18：00）：03-6453-9969<br />
											
				</div>
			</div>
		</div>
		
    </div> <!-- content end -->
    
<?php CommonTag::footer(); ?>
</body>
</html>
