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
	<link rel="stylesheet" type="text/css" href="../../css/base.css" />
    <link rel="stylesheet" type="text/css" href="../../css/toppage.css" />
<script type="text/javascript">
//<![CDATA[
window.DEBUGKIT_JQUERY_URL = "/debug_kit/js/jquery.js";
//]]>
</script><script type="text/javascript" src="/debug_kit/js/js_debug_toolbar.js"></script>
</head>
<body>

<?php CommonTag::header(); ?>
    
    <div id="header_under">
       <div id="breadcrumb-area"><a href='<?php echo URL_SITE_TOP ?>'>HOME</a> > 2016/12/15 出資金のお振込み時のお願い</div>
    </div>
    
    <div id="content">
        <div id="page-title">お知らせ</div>
		
		<div id="topics_area">
			<div id="ta_main">
				<div id="ta_text-r">2016/12/15</div>
				<div id="ta_main-title">出資金のお振込み時のお願い</div>
				<div id="ta_shousai">
					<p>
						お客様各位<br /><br />
						平素はトラストレンディングをご利用いただき、誠にありがとうございます。<br />
						現在、多数の会員の皆様から投資の申込があり、以下の内容をご確認いただきまして、何卒ご協力お願いいたします。
					</p>
					<p>出資お申込後の出資金お振込み時には、口座名義人に続いてユーザID（8桁の数字）のご入力をお願いいたします。<br />
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="red">例）トラスト　タロウ12345678</font><br /><br />IDのご入力が無い場合に、出資の承認作業にお時間が掛かりますのでご協力をお願いいたします。<br />
なお、振込名義人欄にIDを記入できない一部金融機関につきましては、<br />
振込名義人欄に入力が出来る金融機関への変更か、又は備考欄等にIDの入力をお願いいたします。<br /><br />※トラストファイナンスでは分別管理を徹底し、お客様の資金安全のためにも預託の受付はしておりませんので、<br />必ず出資申込手続をされてから出資金の払込みをお願いいたします。<br /><br /><font color="red">お申込前のご入金が確認された際は、振込手数料をお客様負担でご返金させていただきますので、何卒ご了承ください。</font>
</p>
				</div>
			</div>
		</div>
		
    </div> <!-- content end -->
    
<?php CommonTag::footer(); ?>
</body>
</html>
