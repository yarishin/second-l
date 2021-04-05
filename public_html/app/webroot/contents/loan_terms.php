<?php
require_once "../../Controller/Component/CommonTag.php";
CommonTag::includeFiles();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>ソーシャルレンディング</title>
	<link rel="stylesheet" type="text/css" href="../css/base.css" />
    <link rel="stylesheet" type="text/css" href="../css/toppage.css" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	
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
       <div id="breadcrumb-area"><a href='<?php echo URL_SITE_TOP ?>'>HOME</a> > 貸付条件</div>
    </div>
    
    <div id="content">
        <div id="page-title">貸付条件（お借入されるお客様）</div>
		
		<div id="information_area">
			<table id="kashitsuke_johken">
				<tr><td class="kj_title">ご利用頂ける企業様</td><td>当社規定の審査によりご融資可能と判断された法人企業様</td></tr>
				<tr><td class="kj_title">貸付の種類</td><td>証書貸付</td></tr>
				<tr><td class="kj_title">貸付金額</td><td>5億円以内</td></tr>
				<tr><td class="kj_title">返済期間</td><td>60ヶ月以内</td></tr>
				<tr><td class="kj_title">返済回数</td><td>60回以内</td></tr>
				<tr><td class="kj_title">返済方式</td><td>一括返済・元利均等返済・元金均等返済</td></tr>
				<tr><td class="kj_title">貸付利率</td><td>実質年率 17.80％～4.00％</td></tr>
				<tr><td class="kj_title">遅延損害金</td><td>年 20.00％</td></tr>
				<tr><td class="kj_title">担保・保証人</td><td>原則不要（但し、審査により連帯保証人・担保（不動産・債権）をお願いする場合があります。）</td></tr>
				<tr><td class="kj_title">主な返済例</td>
									<td>
										【貸付条件】<br />
										　借入金額：50万円、　利息：17.80％、　返済方式：元利均等、　返済回数：6回<br />
										<table id="kashitsuke_johken_s">
											<tr><th class="kjs_title">利息計算日数</th><th class="kjs_title">返済額合計</th><th class="kjs_title">内、元本</th><th class="kjs_title">内、利息</th><th class="kjs_title">残存元本</th></tr>
											<tr><th class="kjs_days">46日</th><td>88,000円</td><td>76,784円<td>11,216円</td><td>423,216円</td></tr>
											<tr><th class="kjs_days">30日</th><td>88,000円</td><td>81,809円<td>6,191円</td><td>341,407円</td></tr>
											<tr><th class="kjs_days">31日</th><td>88,000円</td><td>82,839円<td>5,161円</td><td>258,568円</td></tr>
											<tr><th class="kjs_days">30日</th><td>88,000円</td><td>84,218円<td>3,782円</td><td>174,350円</td></tr>
											<tr><th class="kjs_days">31日	</th><td>88,000円</td><td>85,365円</td><td>2,635円</td><td>88,985円</td></tr>
											<tr><th class="kjs_days">31日</th><td>90,330円</td><td>88,985円</td><td>1,345円</td><td></td>	</tr>
										</table>
									</td>
				</tr>
			</table>
		</div>
		
		<div id="banner_area">
            
<center>


<a href='<?php echo URL_REGISTRATION_PAGE ?>'><img src="../img/banner001.jpg" alt="新規会員登録">
        </div>

			
</div> <!-- content end -->
    
<?php CommonTag::footer(); ?>
</body>
</html>
