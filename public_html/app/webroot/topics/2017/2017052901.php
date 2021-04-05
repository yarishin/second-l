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
       <div id="breadcrumb-area"><a href='<?php echo URL_SITE_TOP ?>'>HOME</a> > 2016/09/30 取引約款一部変更のお知らせ</div>
    </div>
    
    <div id="content">
        <div id="page-title">お知らせ</div>
		
		<div id="topics_area">
			<div id="ta_main">
				<div id="ta_text-r">2017/05/29</div>
				<div id="ta_main-title">個人情報保護方針（プライバシーポリシー）一部変更のお知らせ</div>
				<div id="ta_shousai">
					<p>
						お客様各位<br /><br />
						平素はトラストレンディングをご利用いただき、誠にありがとうございます。<br /><br />
						「個人情報保護法」の改正が行われ、平成29年5月30日から全面的に施行されます。<br />トラストレンディングでは、これに合わせ個人情報保護方針（プライバシーポリシー）を一部変更いたします。<br />

					<ul style="list-style-type:none;">
						<li>〇&nbsp;&nbsp;<a href="../../contents/privacy.php" target="_blank"><span class="ta_list_title">Trust Lending個人情報保護方針（プライバシーポリシー）</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../../files/ComparativeTable_privacy_20170530.pdf" target="_blank"><span class="ta_list_title">【新旧対照表】</a></span></li>
					</ul><br />
						変更後の約款は平成29年5月30日より適用させていただきます。<br />ご不明点ご質問等ございましたらお手数ですがお電話又は<a href="../../c010_home/v070contactinput"><span class="ta_list_title">お問合せフォーム</span></a>よりお問合せください。<br /><br />引き続きTrust Lendingを宜しくお願い申し上げます。
					</p>					
					<div id="ta_text-r">以上</div>
				</div>
			</div>
		</div>
		
    </div> <!-- content end -->
    
<?php CommonTag::footer(); ?>
</body>
</html>
