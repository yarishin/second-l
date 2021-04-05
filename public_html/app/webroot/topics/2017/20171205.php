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
       <div id="breadcrumb-area"><a href='<?php echo URL_SITE_TOP ?>'>HOME</a> > 2017/12/05 社員研修に伴う電話対応サービス終了時間の繰り上げのお知らせ</div>
    </div>
    
    <div id="content">
        <div id="page-title">お知らせ</div>
		
		<div id="topics_area">
			<div id="ta_main">
				<div id="ta_text-r">2017/12/05</div>
				<div id="ta_main-title">社員研修に伴う電話対応サービス終了時間の繰り上げのお知らせ</div>
				<div id="ta_shousai">
					<p>
						お客様各位<br /><br />
						平素はトラストレンディングをご利用いただき、誠にありがとうございます。<br />
						さて、誠に勝手ながら12月6日（水）は社員研修のため、お電話での問合わせ対応時間を60分繰り上げて終了させていただきます。
					</p>
					
					<div id="ta_sub-title">サービス終了時間繰り上げ日時</div>
						
					

					<dl>
						<dd>
							<table id="topics_2015120201_table">
								<tr><th><span>12月</span></th><td class="right_align">5</td><td>火</td><td class="center_align">通常営業</td><td>10：00 ～ 18：00</td></tr>
								<tr><td colspan="2" class="right_align">6</td><td>水</td><td class="center_align">繰り上げ</td><td>10：00 ～ <font style="color: red;">17：00</font></td></tr>
								<tr><td colspan="2" class="right_align">7</td><td>木</td><td class="center_align">通常営業</td><td>10：00 ～ 18：00</td></tr>
							</table>
						</dd>
						<dd>お客様におかれましては、大変ご迷惑をおかけいたしますが、何卒ご理解を賜りますよう宜しくお願い申し上げます。
							<!--<font style="color: red;">
								休業期間中の新規会員登録の申込み 及び 投資申込みは可能ですが、認証キーの発行及びご入金頂いた際のマイページへの反映は、<br />
								8月16日（水）10：00以降となります。ご不便お掛け致しますが、何卒ご理解くださいますよう宜しくお願い申し上げます。
							</font>-->
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
