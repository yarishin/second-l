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
	<title><?php echo SITE_TITLE; ?>｜本人確認書類について</title>
	<link href="../favicon.ico" type="image/x-icon" rel="icon" />
	<link href="../favicon.ico" type="image/x-icon" rel="shortcut icon" />
	<link rel="stylesheet" type="text/css" href="../css/import.css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300&display=swap&subset=japanese" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
	<script type="text/javascript" src="../js/tl_cont.js"></script>
	<script type="text/javascript">
	//<![CDATA[
	function buttonClick(eventId) {
		var flag = true;
		if ('e020301' == eventId) {
		}
		if (flag) {
			document.getElspanentById('event_id').value = eventId;
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

		<div class="row" style="margin-top:2em;">
			<div class="col-lg-4 col-lg-offset-1 col-md-6 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-12 col-xs-offset-0">		
				<ul style="list-style-type: square;">
					<li><b>本人確認書類(下記一覧より2点)<br><span style="font-size:12px;color:#f00;">うち１点は顔写真のあるものをご用意下さい。</span></b></li>
					<li><b>マイナンバー確認書類(1点)</b></li>
					<li><b>口座情報確認書類(1点)</b></li>
				</ul>
			</div>
		</div>

<?php require 'documents_tmp.php'; ?>

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
