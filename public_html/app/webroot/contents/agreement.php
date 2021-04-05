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
       <div id="breadcrumb-area"><a href='<?php echo URL_SITE_TOP ?>'>HOME</a> > 取引約款等</div>
    </div>
    
    <div id="content">
        <div id="page-title">取引約款等</div>
		
		<div id="antisocial">
			<p>
				投資家向け取引約款等をダウンロードできます。</br>
				投資家の申請時または投資案件への申請時には、個別に書面内容をご確認いただく必要があります。
			</p>
			<table>
				<tr><td>ソーシャルレンディングレンディング利用規約</td><td class="v010doui-pdf"><a href='<?php             echo URL_PDF_PATH_1 ?>0000000001.pdf' target='_blank'><img src="../img/icon-pdf.png">ダウンロード</a></td></tr>
				<tr><td>契約締結前交付書面</td><td class="v010doui-pdf"><a href='<?php                       echo URL_PDF_PATH_1 ?>0000000002.pdf' target='_blank'><img src="../img/icon-pdf.png">ダウンロード</a></td></tr>
				<tr><td>匿名組合契約約款</td><td class="v010doui-pdf"><a href='<?php                         echo URL_PDF_PATH_1 ?>0000000003.pdf' target='_blank'><img src="../img/icon-pdf.png">ダウンロード</a></td></tr>
				<tr><td>電磁的方法による書面の交付に関する同意書</td><td class="v010doui-pdf"><a href='<?php echo URL_PDF_PATH_1 ?>0000000004.pdf' target='_blank'><img src="../img/icon-pdf.png">ダウンロード</a></td></tr>
				<tr><td>サービス利用に関する確認書</td><td class="v010doui-pdf"><a href='<?php               echo URL_PDF_PATH_1 ?>0000000005.pdf' target='_blank'><img src="../img/icon-pdf.png">ダウンロード</a></td></tr>
			</table>
		</div>
		
		<div id="banner_area">
            
<center>

<a href='<?php echo URL_REGISTRATION_PAGE ?>'><img src="../img/banner001.jpg" alt="新規会員登録"></a>


        </div>
			
    </div> <!-- content end -->
    
<?php CommonTag::footer(); ?>
</body>
</html>
