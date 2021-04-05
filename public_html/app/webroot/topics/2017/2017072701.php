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
       <div id="breadcrumb-area"><a href='<?php echo URL_SITE_TOP ?>'>HOME</a> > 2017/07/27 システムの改修に関するお知らせ</div>
    </div>
    
    <div id="content">
        <div id="page-title">お知らせ</div>
		
		<div id="topics_area">
			<div id="ta_main">
				<div id="ta_text-r">2017/07/27</div>
				<div id="ta_main-title">システムの改修に関するお知らせ</div>
				<div id="ta_shousai">
					<p>　この度、お客様の更なる操作性、利便性の向上を目的として、
当社が運営するソーシャルレンディングサービス「Trust Lending」のシステムの改修を行うことといたしましたので、
下記のとおりお知らせいたします。なお、改修にあたっては、お客様からご要望が多かった機能の追加を優先して行うことといたしました。<br /><br />
<center>記</center>
<h3>１.主な改修内容</h3>
<strong>①	配当予定表の表示</strong><br />
お客様が出資したファンドの配当予定表をマイページへ表示します。<br />
<br />
<strong>②	本人確認資料等（画像ファイル）のアップロード機能</strong><br />
現在はE-mail又は郵送で本人確認資料等をご提出いただいておりますが、改修後はマイページからのアップロードによるご提出が可能となります。
<br />
<br />
<strong>③	金融機関が提供する入金照合サービスの導入</strong><br />
お客様毎に仮想入金口座番号を割当することにより、同姓同名など、従来振込人のカナ名だけでは特定が困難だった入金照合を正確・容易に行うことができるサービスです。現在は出資金をお振込みいただく際、お客様からのご入金を正確に照合するための措置としてお振込名義に続いて8桁のユーザIDをご入力いただいておりますが、本サービスの導入以降はユーザIDのご入力は不要となります。
<br /><br />
<h3>２．システムリリース</h3>
2017年10月上旬（予定）<br />
※開発状況により内容の変更やリリース時期の延期等を行う場合がございますので、予めご了承ください。
<br />
<img src="../../img/pdficon.png" alt ="pdf" width="40" height="40"><a href="../../files/20170727_1.pdf" target="_blank">印刷用</a>
<br />
</p>					
					<div id="ta_text-r">以上</div>
				</div>
			</div>
		</div>
    </div> <!-- content end -->
    
<?php CommonTag::footer(); ?>
</body>
</html>

		</div>