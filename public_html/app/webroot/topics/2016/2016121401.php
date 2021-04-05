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
       <div id="breadcrumb-area"><a href='<?php echo URL_SITE_TOP ?>'>HOME</a> > 2016/12/14 マイナンバーのご提出について</div>
    </div>
    
    <div id="content">
        <div id="page-title">お知らせ</div>
		
		<div id="topics_area">
			<div id="ta_main">
				<div id="ta_text-r">2016/12/14</div>
				<div id="ta_main-title">マイナンバーのご提出について</div>
				<div id="ta_shousai">
					<p>
						お客様各位<br /><br />
						平素はトラストレンディングをご利用いただき、誠にありがとうございます。<br /><br />
						当社ではマイナンバーの受付を開始しております。以下内容をご確認いただきましてご提出をお願いしたいと存じます。
					</p>
					
					<div id="ta_sub-title">マイナンバーご提出の必要性</div>
					<p>金融商品取引業者や証券会社等はお客様とのお取引について、税務署へ提出する支払調書を作成するため、お客様からマイナンバーをご提示いただく必要がございます。そのため、Trust Lendingへ会員登録されているお客様につきましてもマイナンバーのご提出をお願いしております。</p>

					<div id="ta_sub-title">ご提出書類について（いずれか1点）</div>
							<table>
								<tr><td class="qa_table_title" style="text-align: center;padding: 5px 0;background-color: #C0C0C0;color: #fff;">個人の場合</td>
									<td>
										<p>
											・顔写真ありのマイナンバー（個人番号カード）（表裏両面）<br />
											・顔写真なしのマイナンバー（通知カード）（表裏両面）<br />
											・住民票の写し（発行日から6ヶ月以内のものでマイナンバーの記載があるもの）
										</p>
										<span style="padding: 10px;display: block;">
											※コピーや撮影の際には、本人確認書類の端が欠けないようご注意ください。又、必ず書類全面が鮮明な状態で写るようお願い申し上げます。<br />
											※個人番号カード及び通知カードをご提出いただく場合には、「表面」「裏面」併せてご提出いただきますようお願い申し上げます。<br />
											※住所、氏名、生年月日はご登録いただいている内容と相違ないことをご確認ください。<br />
									</td>
								</tr>
								
								<tr><td class="qa_table_title" style="text-align: center;padding: 5px 0;background-color: #C0C0C0;color: #fff;">法人の場合</td>
									<td>
										<p>必要書類等ご案内しますので、お手数ですがTrust Lendingサポート係 TEL：03-6453-9969（受付時間：平日10：00～18：00）までお問い合わせください。
										</p>
									</td>
								</tr>
							</table>
					<div id="ta_sub-title">ご提出方法</div>
					<p>画像を添付して以下のアドレス宛てご提出お願いしたいと存じます。<br /><br /><a href="mailto:confirm@trust-lending.net">confirm@trust-lending.net</a><br /><br />「件名」にお客様のIDを、「本文」にお客様のお名前（フルネーム）を入力していただきメール送信をお願いいたします。</p>
					<div id="ta_text-r">以上</div>
				</div>
			</div>
		</div>
		
    </div> <!-- content end -->
    
<?php CommonTag::footer(); ?>
</body>
</html>
