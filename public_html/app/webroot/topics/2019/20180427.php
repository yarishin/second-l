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
       <div id="breadcrumb-area"><a href='<?php echo URL_SITE_TOP ?>'>HOME</a> > 2018/04/27 サーバーメンテナンスのお知らせ</div>
    </div>
    
    <div id="content">
        <div id="page-title">お知らせ</div>
		
		<div id="topics_area">
			<div id="ta_main">
				<div id="ta_text-r">2018/04/27</div>
				<div id="ta_main-title">サーバーメンテナンスのお知らせ</div>
				<div id="ta_shousai">
					<p>
						お客様各位<br /><br />
						平素はトラストレンディングをご利用いただき、誠にありがとうございます。<br /><br />
						この度、サーバーメンテナンスに伴い、下記日程にてサービスの繋がりにくい時間帯が発生致します。<br /><br />
						
					</p>
					<dl>
						<dt>【サーバーメンテナンス日時】</dt>
						<dd>
							2018年04月28日（土）9：00 ～ 2018年04月29日（日）21：00 ごろまで
						</dd>
						
					
						<dd>
							大変ご不便をおかけしますことをお詫び申し上げます。<br />
							何卒ご理解賜りますよう宜しくお願い申し上げます。
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
