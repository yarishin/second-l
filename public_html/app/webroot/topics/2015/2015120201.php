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
       <div id="breadcrumb-area"><a href='<?php echo URL_SITE_TOP ?>'>HOME</a> > 2015/12/10 年末年始の営業について</div>
    </div>
    
    <div id="content">
        <div id="page-title">お知らせ</div>
		
		<div id="topics_area">
			<div id="ta_main">
				<div id="ta_text-r">2015/12/10</div>
				<div id="ta_main-title">年末年始の営業について</div>
				<div id="ta_shousai">
					<p>
						お客様各位<br /><br />
						平素はトラストレンディングをご利用いただき、誠にありがとうございます。<br /><br />
						誠に勝手ではございますが、当社では年末年始の営業時間を下記のとおりとさせていただきます。
					</p>
					
					<div id="ta_sub-title">年末年始営業時間</div>
						
					

					<dl>
						<dd>
							<table id="topics_2015120201_table">
								<tr><th>2015年<span>12月</span></th><td class="right_align">28</td><td>月</td><td class="center_align">通常営業</td><td>10：00 ～ 18：00</td></tr>
								<tr><td colspan="2" class="right_align">29</td><td>火</td><td class="center_align">年末営業</td><td>10：00 ～ 16：00</td></tr>
								<tr><td colspan="2" class="right_align">30</td><td>水</td><td class="center_align"><span>休業</span></td><td></td></tr>
								<tr><td colspan="2" class="right_align">31</td><td>木</td><td class="center_align"><span>休業</span></td><td></td></tr>
								<tr><th>2016年<span>1月</span></th><td class="right_align">1</td><td>金</td><td class="center_align"><span>休業</span></td><td></td></tr>
								<tr><td colspan="2" class="right_align">2</td><td>土</td><td class="center_align"><span>休業</span></td><td></td></tr>
								<tr><td colspan="2" class="right_align">3</td><td>日</td><td class="center_align"><span>休業</span></td><td></td></tr>
								<tr><td colspan="2" class="right_align">4</td><td>月</td><td class="center_align"><span>休業</span></td><td></td></tr>
								<tr><td colspan="2" class="right_align">5</td><td>火</td><td class="center_align">通常営業</td><td>10：00 ～ 18：00</td></tr>
							</table>
						</dd>
						<dd>
							<font style="color: red;">
								休業期間中の新規会員登録の申込み 及び 投資申込みは可能ですが、認証キーの発行及びご入金頂いた際のマイページへの反映は、<br />
								2016年1月5日（火）10：00以降となります。ご不便お掛け致しますが、何卒ご理解くださいますよう宜しくお願い申し上げます。
							</font>
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
