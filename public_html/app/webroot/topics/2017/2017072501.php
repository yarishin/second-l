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
       <div id="breadcrumb-area"><a href='<?php echo URL_SITE_TOP ?>'>HOME</a> > 2017/07/25 『マネーフォワード』と連携開始</div>
    </div>
    
    <div id="content">
        <div id="page-title">お知らせ</div>
		
		<div id="topics_area">
			<div id="ta_main">
				<div id="ta_text-r">2017/07/25</div>
				<div id="ta_main-title">『マネーフォワード』と連携開始</div>
				<div id="ta_shousai">
					<p>株式会社マネーフォワードが提供する家計簿アプリ・家計簿ソフト『マネーフォワード』と
株式会社トラストファイナンスが提供する『トラストレンディング』が本日、連携を開始しました。<br />
これにより『マネーフォワード』上で『トラストレンディング』の投資口座残高のデータがリアルタイムで確認可能となりました。<br />
<br />
『マネーフォワード』上での登録方法は、
「新たに金融機関を登録する」→「その他」→『トラストレンディング』を
ご選択ください。<br />
<br />引き続きTrust Lendingを宜しくお願い申し上げます。
					</p>					
					<div id="ta_text-r">以上</div>
				</div>
			</div>
		</div>
		
    </div> <!-- content end -->
    
<?php CommonTag::footer(); ?>
</body>
</html>
