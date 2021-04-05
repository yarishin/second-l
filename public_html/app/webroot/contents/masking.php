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
	<title><?php echo SITE_TITLE; ?>｜本人確認書類のマスキングについて</title>
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



		<div class="row">
			<div class="col-md-12 text-center">
				<div id="page-title" style="margin:1em auto;">
					本人確認書類のマスキングについて
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8 col-md-offset-2" style="margin-bottom:2em;">
				撮影前に付箋・マスキングテープや紙片などで、マスキングが必要な項目を隠してください。<br>※マスキングする際、必要な情報（氏名や住所など）が隠れないようにご注意ください。

			</div>
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">健康保険被保険者証の場合</h4>
					</div>
					<div class="panel-body">
						<p style="color:#f00;"><b>保険者番号及び被保険者記号・番号</b>を隠してください。</p>
						<span style="font-size:1.2em;">例）</span>
						<img class="img-responsive" src="../img/masking_1.png">
					</div>

			
				</div>
			</div>

			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">国民年金手帳の場合</h4>
					</div>
					<div class="panel-body">
						<p style="color:#f00;"><b>基礎年金番号</b>を隠してください。</p>
						<span style="font-size:1.2em;">例）</span>
						<img class="img-responsive" src="../img/masking_3.png">
					</div>

			
				</div>
			</div>

			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">身体障害者手帳の場合</h4>
					</div>
					<div class="panel-body">
						<p style="color:#f00;"><b>身体障害程度等級、旅客鉄道株式会社旅客運賃減額欄、障害名</b>を隠してください。</p>
						<span style="font-size:1.2em;">例）</span>
						<img class="img-responsive" src="../img/masking_4.png">
					</div>

			
				</div>
			</div>



			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">クレジットカード一体型キャッシュカードの場合</h4>
					</div>
					<div class="panel-body">
						<p style="color:#f00;">口座情報とクレジットカード番号及びセキュリティコードが同じ面に記載されている場合、<b>”クレジットカード番号及びセキュリティコード”</b>は隠してください。</p>
						<span style="font-size:1.2em;">例）</span>
						<img class="img-responsive" src="../img/masking_2.png">
					</div>

			
				</div>
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
