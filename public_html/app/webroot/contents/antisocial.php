<?php
require_once "../../Controller/Component/CommonTag.php";
CommonTag::includeFiles();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo SITE_TITLE; ?>｜反社会的勢力に対する基本方針</title>
	<link href="../favicon.ico" type="image/x-icon" rel="icon" />
	<link href="../favicon.ico" type="image/x-icon" rel="shortcut icon" />
	<link rel="stylesheet" type="text/css" href="../css/import.css" />
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300&display=swap&subset=japanese" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" rel="stylesheet" />
	<script type="text/javascript" src="../js/tl_cont.js"></script>
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
<div class="g-bg-color--sky-light">
	<div class="container g-padding-y-80--xs g-padding-y-125--xsm">

		<div style="margin: 0;position: relative;z-index: 1;">
			<div id="page-title" class="wow slideInUp" data-wow-duration="2s" data-wow-delay="0">反社会的勢力に対する<br class="smart-br-on">基本方針</div>
			<div id="page-title-mask" class="wow slideOutDown hidden-md" data-wow-duration="3s" data-wow-delay=".2s"></div>
		</div>    

	    <div class="row">
 			<div class="col-lg-10 col-lg-offset-1 g-margin-b-0--xs g-margin-b-0--lg" style="position: relative;z-index: 2;">
		
			
				<p>
					セブンスター株式会社（以下「当社」といいます）は、暴力、威力と詐欺的手法を駆使して経済的利益を追求する集団および個人をはじめとする反社会的勢力との関係を遮断し、被害を防止するために、次の基本方針を定めるとともにこの方針を実現すべく体制を構築します。
				</p>
			</div>	
			<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0" style="position: relative;z-index: 2;">

				<ul style="line-height:1.8em;">
					<li>反社会的勢力に対しては、組織として対応します。</li>
					<li>反社会的勢力に対しては、外部専門機関と連携して対応します。</li>
					<li>反社会的勢力との間で取引を含めた一切の関係を遮断します。</li>
					<li>有事においては民事及び刑事の両面から法的な対応を行います。</li>
					<li>反社会的勢力との間で裏取引及び資金提供は一切行いません。</li>
				</ul>
		
			</div>	
		</div>

	</div>
</div>
<?php CommonTag::footer(); ?>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.back-to-top.min.js"></script>
	<script src="../js/header-sticky.min.js"></script>
	<script src="../js/jquery.wow.min.js"></script>
	<script src="../js/wow.min.js"></script>

</body>
</html>
