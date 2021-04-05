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
	<title><?php echo SITE_TITLE; ?>｜勧誘方針について</title>
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
			<div id="page-title" class="wow slideInUp" data-wow-duration="2s" data-wow-delay="0">勧誘方針について</div>
			<div id="page-title-mask" class="wow slideOutDown hidden-md" data-wow-duration="3s" data-wow-delay=".2s"></div>
		</div>
    
		<div class="row" style="position: relative;z-index: 2;">
			<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 g-margin-b-0--xs g-margin-b-0--lg">
		
			<div id="solicitation">
			<!--	<div style="text-align: left;">お客様へ</div>
				<div style="text-align: right;">●●●株式会社</div>-->
				<div id="main_text1" style="text-align: left;">
					セブンスター株式会社は、金融商品の販売等に関する法律に基づき、以下の金融商品の販売に関する方針を定め、法令とともに遵守いたします。
			</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 ">
					<ul style="line-height:2em;">
						<li style="list-style:none;">（1）お客様の知識や取引経験、財産状況及び契約の目的に応じた、適切な商品をお勧めいたします</li>
						<li style="list-style:none;">（2）お客様に対し、ご自身の判断でお取引いただくために、商品内容やリスク説明等の重要事項を十分に説明しご理解いただけるよう努めます。</li>
						<li style="list-style:none;">（3）お客様に対し、不確実な事項について断定的な判断を告げることや事実でない情報を提供するなど、お客様の誤解を招くような勧誘は行いません。</li>
						<li style="list-style:none;">（4）お客様にとって不都合な時間帯やご迷惑な場所、方法による勧誘は行いません。</li>
						<li style="list-style:none;">（5）お客様に対し、適切な商品をお勧めできるよう研修体制の充実や社内ルールの整備、商品知識の習得に努めます。</li>
					</ul>
			</div>
		</div> 

<div class="row">
<div class="col-lg-4 pull-right text-right">
制定日：2021年4月1日
</div>
</div>
			</div>
		
	    </div> <!-- content end -->
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
