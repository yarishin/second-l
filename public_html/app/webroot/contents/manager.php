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
	<title><?php echo SITE_TITLE; ?>｜業務管理者</title>
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
			<div id="page-title" class="wow slideInUp" data-wow-duration="2s" data-wow-delay="0">業務管理者名簿</div>
			<div id="page-title-mask" class="wow slideOutDown" data-wow-duration="3s" data-wow-delay=".2s"></div>
		</div>
    
        <div class="col-md-12 g-margin-b-10--xs g-margin-b-0--lg center-block" style="position: relative;z-index: 2;">
	        <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".1s">

		        <div class="s-plan-v1 g-text-center--xs g-bg-color--white g-padding-y-100--xs" style="text-align: left;">
					<div class="center-block" style="padding: 15px 5px;width: 94%;overflow: hidden;border-bottom: 1px solid #999999;">
						<div class="col-md-6 col-xs-12" style="font-weight: bold;color: #28667a;">氏　名</div><div class="col-md-6 col-xs-12"><script type="text/javascript">managername();</script></div>
					</div>
					<div class="center-block" style="padding: 15px 5px;width: 94%;overflow: hidden;border-bottom: 1px solid #999999;">
						<div class="col-md-6 col-xs-12" style="font-weight: bold;color: #28667a;">事務所所在地</div><div class="col-md-6 col-xs-12">東京都港区海岸3-15-15</div>
					</div>
					<div class="center-block" style="padding: 15px 5px;width: 94%;overflow: hidden;border-bottom: 1px solid #999999;">
						<div class="col-md-6 col-xs-12" style="font-weight: bold;color: #28667a;">宅地建物取引士登録番号／登録年月日</div><div class="col-md-6 col-xs-12">（東京）第081175号／昭和62年1月28日</div>
					</div>
					<div class="center-block" style="padding: 15px 5px;width: 94%;overflow: hidden;border-bottom: 1px solid #999999;">
						<div class="col-md-6 col-xs-12" style="font-weight: bold;color: #28667a;">主務大臣が指定する講習を修了したこと又は登録証明事業による証明を受けていることを示す事項</div><div class="col-md-6 col-xs-12">公認不動産コンサルティングマスター<br>登録番号：(3)第27406号</div>
					</div>
					<div class="center-block" style="padding: 15px 5px;width: 94%;overflow: hidden;border-bottom: 1px solid #999999;">
						<div class="col-md-6 col-xs-12" style="font-weight: bold;color: #28667a;">事務所の業務管理者となった年月日</div><div class="col-md-6 col-xs-12">2019年10月1日</div>
					</div>
					<div class="center-block" style="padding: 15px 5px;width: 94%;overflow: hidden;border-bottom: 1px solid #999999;">
						<div class="col-md-6 col-xs-12" style="font-weight: bold;color: #28667a;">事務所の業務管理者でなくなった年月日</div><div class="col-md-6 col-xs-12">---</div>
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
