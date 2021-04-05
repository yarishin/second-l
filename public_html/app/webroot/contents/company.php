<?php
require_once "../../Controller/Component/CommonTag.php";
CommonTag::includeFiles();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>エステートレンディング</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="stylesheet" type="text/css" href="../css/base.css" />
    <link rel="stylesheet" type="text/css" href="../css/toppage.css" />
	
	<meta property="og:type"   content="article" />
	<meta property="og:title"  content="" />
	<meta property="og:image"  content="" />
	<meta property="og:description"  content="" />
	<meta property="og:url"  content="" />
	<meta property="og:site_name"  content="" />
	
	<script type="text/javascript">
	//<![CDATA[
	function buttonClick(eventId) {
		var flag = true;
		if ('e020301' == eventId) {
		}
		if (flag) {
			document.getElementById('event_id').value = eventId;
			document.form.submit();
		}
	}
	//]]>
	</script>
</head>
<body>

<?php CommonTag::header(); ?>
    
    <div id="header_under">
       <div id="breadcrumb-area"><a href='<?php echo URL_SITE_TOP ?>'>HOME</a> > 運営会社</div>
    </div>
    
    <div id="content">
        <div id="page-title">運営会社</div>
		
		<div id="information_area">
			<h4 id="companyh4">
				エステートレンディング運営会社のご案内。
			</h4>
			
			<table id="company_table">
				<tr><td class="corp_t">商号</td><td class="corp_n">●●●株式会社</td></tr>
				<tr><td class="corp_t">所在地</td><td class="corp_n">京都府京都市</td></tr>
				<tr><td class="corp_t">役員</td><td>
													<table>
														<tr><td style="border: none;text-align: right;">代表取締役<br>取締役<br>取締役<br>取締役<br>取締役<br>監査役</td><td style="border: none;">三上　隆<br>南　實<br>有川　志津雄<br>宮地　和彦<br>灘　比奈子<br>山本　英夫</td></tr>
													</table>
													</td></tr>
				<tr><td class="corp_t">設立</td><td class="corp_n">昭和61年6月</td></tr>
				<tr><td class="corp_t">資本金</td><td class="corp_n">100,000,000円</td></tr>
				<tr><td class="corp_t">従業員数</td><td class="corp_n">●名</td></tr>
				<tr><td class="corp_t">有資格者</td><td class="corp_n">貸金業務取扱主任者 ●名<br>宅地建物取引士 ●名<br>不動産コンサルティングマスター ●名<br>ファイナンシャルプランナー ●名</td></tr>
				<tr><td class="corp_t">業務経験</td><td class="corp_n">銀行 ●名<br>証券会社 ●名<br>ノンバンク ●名<br>債権回収会社（サービサー） ●名</td></tr>
				<tr><td class="corp_t">事業内容</td><td class="corp_n">
										土地、建物の賃貸、管理、仲介及び売買等の不動産取引<br>
										M&Aアドバイザリー業務<br>
										第二種金融商品取引の仲介及び媒介<br>
										土木、建築の設計、施工及び管理等の請負<br>
										不動産の鑑定及び評価</td></tr>
				<tr><td class="corp_t">登録免許</td><td class="corp_n">
										第二種金融商品取引業　●●財務局長（金商）第0000号<br>
										宅地建物取引業　●●知事（0）第00000号</td></tr>
					
				<tr><td class="corp_t">加入協会・団体</td><td class="corp_n">
										証券・金融商品あっせん相談センター<br>
										一般社団法人 第二種金融商品取引業協会</td></tr>
				<tr><td class="corp_t2">代表番号</td><td class="corp_n2">TEL：00-0000-0000　／　FAX：00-0000-0000</td></tr>
			</table>
		</div>

		<div id="banner_area">
            
<a href='<?php echo URL_REGISTRATION_PAGE ?>'><img src="../img/banner001.jpg" alt="新規会員登録"></a>

        </div>
		
    </div> <!-- content end -->
    
<?php CommonTag::footer(); ?>
</body>
</html>
