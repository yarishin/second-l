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
	<title><?php echo SITE_TITLE; ?>｜クーリング・オフについて</title>
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
			
			<div class="row">
				<div class="col-lg-10 col-lg-offset-1 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
			<div style="margin: 0;position: relative;z-index: 1;">
				<div id="page-title" style="max-width:60%;" class="wow slideInUp" data-wow-duration="2s" data-wow-delay="0">クーリング・オフ<br class="hidden-lg">（契約解除）について</div>
				<div id="page-title-mask" class="wow slideOutDown hidden-md" data-wow-duration="3s" data-wow-delay=".2s"></div>
			</div>
				</div>
			</div>

			<div class="row col-md-12 g-margin-b-0--xs g-margin-b-0--lg" style="position: relative;z-index: 2;">
			
			
			<div class="row">
				<div class="col-lg-10 col-lg-offset-1">
					<p class="g-font-size-18--sm">
						クーリング・オフとは、いったん契約の申込や契約の締結をした場合でも、契約を再考できるようにし、一定の期間であれば無条件で契約の申込を撤回したり、契約の解除をしたりすることができる制度です。<br>
お客様は契約成立時書面（不動産特定共同事業法第25条に定める書面）の交付または当該書面を電磁的方法により提供を受けた日（出資確定時にマイページより確認いただけます）から起算して8日を経過するまでの間、事業者であるセブンスター株式会社に対して書面による解約を申し出た場合であれば、クーリング・オフ制度により契約を解除することができます。<br>
出資金をお振込みされた後にクーリング・オフを適用されたお客様につきましては、当社にて契約解除通知書を確認次第、当社にご登録いただいたお客様名義の預金口座に、当該契約に係る出資金額を返還いたします。<br>
なお、クーリング・オフによる契約解除の場合、出資金の返還に係る違約金や振込手数料は発生いたしません。


					</p>
				</div>
				<div class="col-lg-10 col-lg-offset-1">
					<p class="g-font-size-18--sm">
						契約解除通知書は<a href="../files/cooling_off_contact.pdf" target="_blank">コチラ</a>からダウンロード後、印刷してご利用ください。
					</p>
				</div>
			</div>
			

			</div>
		</div>	
    </div> <!-- content end -->
    
<?php CommonTag::footer(); ?>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.back-to-top.min.js"></script>
	<script src="../js/header-sticky.min.js"></script>
	<script src="../js/jquery.wow.min.js"></script>
	<script src="../js/wow.min.js"></script>
</body>
</html>
