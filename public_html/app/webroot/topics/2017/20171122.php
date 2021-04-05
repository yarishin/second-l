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
</head>
<body>

<?php CommonTag::header(); ?>
    
    <div id="header_under">
       <div id="breadcrumb-area"><a href='<?php echo URL_SITE_TOP ?>'>HOME</a> > 2017/11/22 システムメンテナンスのお知らせ</div>
    </div>
    
    <div id="content">
        <div id="page-title">お知らせ</div>
		
		<div id="topics_area">
			<div id="ta_main">
				<div id="ta_text-r">2017/11/22</div>
				<div id="ta_main-title">システムメンテナンスのお知らせ</div>
				<div id="ta_shousai">
					<p>
						お客様各位<br /><br />
					平素はトラストレンディングをご利用いただき、誠にありがとうございます。<br /><br />
						この度、下記日程にて新機能追加のため、サービスを一時的に停止させていただきます。サービスのご利用を含め、当Webサイト全てのページの閲覧ができなくなりますので予めご了承ください。<br /><br />
					
					</p>
					
					<div id="ta_sub-title">システムメンテナンス</div>
						
					

					<dl>
						<dt>【サービス停止日時】</dt>
						<dd>
							2017年11月24日（金）13：30 ～ 15：30 ごろまで
						</dd>
						
						<dt>【停止となるサービス内容】</dt>
						<dd>
							・当Webサイトのご利用及び閲覧ができません。<br />
							・新機能追加のため<br />
							※新機能の詳細につきましては後日、お知らせを致します。<br />
						</dd>
						<dd>
							大変ご不便をおかけしますことをお詫び申し上げます。<br />
							何卒ご理解賜りますよう宜しくお願い申し上げます。
						</dd>
						<dd>
							<!--<font style="color: red;">メンテナンスは終了しました。</font>-->
						</dd>
					</dl>
					
					<div id="ta_text-r">以上</div>
				</div>
			</div>
		</div>
		
    </div> <!-- content end -->
    
<?php CommonTag::footer(); ?>
</body>
</html>
