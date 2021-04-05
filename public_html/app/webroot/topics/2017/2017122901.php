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
       <div id="breadcrumb-area"><a href='<?php echo URL_SITE_TOP ?>'>HOME</a> > 2017/12/29 キャンペーン終了のお知らせ</div>
    </div>
    
    <div id="content">
        <div id="page-title">お知らせ</div>
		
		<div id="topics_area">
			<div id="ta_main">
				<div id="ta_text-r">2017/12/29</div>
				<div id="ta_main-title">キャンペーン終了のお知らせ</div>
				<div id="ta_shousai">
					<p>
						お客様各位<br /><br />
						平素はトラストレンディングをご利用いただき、誠にありがとうございます。<br /><br />
						皆様からご好評をいただきました、<br />以下のキャンペーンは2017/12/29　17：00を持ちまして終了となりました。<br /><br />
						1）「会員登録+メルマガ登録で1,500円プレゼント」<br />
						2）「10万円以上の投資で3,500円プレゼント」<br /><br />
						多くのお客様のご利用、誠に有難うございました。
					<br />今後ともよりよいサービスをご提供できますよう努力してまいりますので、<br />引き続きTrust Lendingを宜しくお願い申し上げます。
					</p>					
					<div id="ta_text-r">以上</div>
				</div>
			</div>
		</div>
		
    </div> <!-- content end -->
    
<?php CommonTag::footer(); ?>
</body>
</html>
