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
       <div id="breadcrumb-area"><a href='<?php echo URL_SITE_TOP ?>'>HOME</a> > 2016/03/03 システムメンテナンスのお知らせ</div>
    </div>
    
    <div id="content">
        <div id="page-title">お知らせ</div>
		
		<div id="topics_area">
			<div id="ta_main">
				<div id="ta_text-r">2016/03/03</div>
				<div id="ta_main-title">システムメンテナンスのお知らせ</div>
				<div id="ta_shousai">
					<p>
						お客様各位<br /><br />
						平素はトラストレンディングをご利用いただき、誠にありがとうございます。<br /><br />
						この度、下記の内容でシステムメンテナンスを実施させていただきます。メンテナンス時間帯はトラストレンディングのサービスを一時的に停止させていただきます。サービスのご利用を含め、当Webサイト全てのページの閲覧ができなくなりますので予めご了承ください。<br /><br />
						ご迷惑をおかけしますことをお詫び申し上げます。
					</p>
					
					<div id="ta_sub-title">システムメンテナンス</div>
						
					

					<dl>
						<dt>【サービス停止日時】</dt>
						<dd>
							2016年3月9日（水）　15：00 ～ 17：00ごろまで
						</dd>
						
						<dt>【メンテナンス内容】</dt>
						<dd>
							・システム内部データの追加<br /><br />
							※メンテナンス中は全てのサービスがご利用できません。
						</dd>
						<dd>
							<font style="color: red;">メンテナンスは終了しました。</font>
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
