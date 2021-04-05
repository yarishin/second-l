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
       <div id="breadcrumb-area"><a href='<?php echo URL_SITE_TOP ?>'>HOME</a> > 手数料について（投資家の皆様）</div>
    </div>
    
    <div id="content">
        <div id="page-title">手数料について（投資家の皆様）</div>
		
		<div id="commision_area">
			<dl>
				<dt>〇 会員登録手数料及び取引手数料について</dt>
				<dd>
					<ul>
						<li>Trust Lendingでは、投資家の皆様から、会員登録手数料及び出資いただく際の取引手数料はいただいておりません。</li>
						<li>出資いただいたファンドで収益が生じた場合のみ、<b style="font-size: 10px;">（※）</b>営業者報酬（手数料）を頂戴いたします。</li>
						<small>（※）営業者報酬（手数料）は、ファンドにより変動するものであり、事前にその額を示すことができません。</small>
					</ul>
				</dd>

				<dt>〇 銀行振込手数料について</dt>
				<dd>
					投資家の皆様には、以下の銀行振込手数料をご負担いただきます。<br />
					<ul>
						<li>当社が指定した投資家毎の個別口座を経由して、当社の分別管理用預金口座へ出資金をお振込みされる際にかかる手数料。</li>
						<li>出資を撤回し出資金の返還を受ける際にかかる手数料。</li>
					</ul>
				</dd>
			</dl>
		</div><br /><br />
			
    </div> <!-- content end -->
    
<?php CommonTag::footer(); ?>
</body>
</html>
