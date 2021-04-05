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
       <div id="breadcrumb-area"><a href='<?php echo URL_SITE_TOP ?>'>HOME</a> > 2018/07/18 近日公開予定ファンドのご案内</div>
    </div>
    
    <div id="content">
        <div id="page-title">お知らせ</div>
		
		<div id="topics_area">
			<div id="ta_main">
				<div id="ta_text-r">2018/07/18</div>
				<div id="ta_main-title">近日公開予定ファンドのご案内</div>
				<div id="ta_shousai">
<br />お客様各位
<br />
<br />平素はトラストレンディングをご利用いただき、誠にありがとうございます。
<br />近日公開予定ファンドについて、概要を取りまとめました。
詳しくは下記のＰＤＦよりご確認くださいませ。
				

<br><br>
<tr><td colspan="2"><img src="pdficon.png" alt ="" width="40" height="40"><a href="20180718_04.pdf" target="_blank">近日公開予定ファンドの概要</a></td></tr>

</table>					
				<div id="ta_text-r">以上</div>		
				</div>
			</div>
		</div>
		
    </div> <!-- content end -->
    
<?php CommonTag::footer(); ?>
</body>
</html>
