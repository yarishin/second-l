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
	<title>不動産特定共同事業</title>
	<link href="../favicon.ico" type="image/x-icon" rel="icon" />
	<link href="../favicon.ico" type="image/x-icon" rel="shortcut icon" />
	<link rel="stylesheet" type="text/css" href="../css/import.css" />
	<link rel="stylesheet" type="text/css" href="../css/mypage.css" />
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

		<div style="margin: 0;position: relative;z-index: 1;">
			<div id="page-title" class="wow slideInUp" data-wow-duration="2s" data-wow-delay="0">リスク案内</div>
			<div id="page-title-mask" class="wow slideOutDown" data-wow-duration="3s" data-wow-delay=".2s"></div>
		</div>
    
		<div class="row col-md-12 g-margin-b-0--xs g-margin-b-0--lg contents_footer" style="position: relative;z-index: 2;">

			<dl>

				<dt>元本の変動リスク</dt>
				<dd>＜不動産市場の影響による対象不動産の価格変動リスク＞</dd>
				<dd>
					対象不動産の価格は、不動産市場の影響・経済情勢・本事業の運営状況により変動します。そのため、想定の配当金に満たないあるいは損失を被ることがあります。
				</dd>

				<dd style="margin-top: 20px;">＜余裕金の運用対象の価格変動リスク＞</dd>
				<dd>
					本事業に関し生じた余裕金（対象不動産を運営する中で発生する資金や対象不動産を売却するまでの預かり金等のことをいいます。）は法および規則に則って運用されます。そのため金融機関の破綻等により損失を被ることがあります。
				</dd>
				<dd style="margin-top: 20px;">＜法規制・税制の変更リスク＞</dd>
				<dd>法規制・税制等の変更により、収益の損失を被ることで受取額が想定より減少するおそれがあります。
				</dd>

				<dd style="margin-top: 20px;">＜不動産が滅失・毀損・劣化するリスク（災害リスクと環境リスク）＞</dd>
				<dd>
					対象不動産において地震、台風、火災、水害その他の自然災害、または戦争、内乱、テロその他の人為的災害により滅失・毀損又は劣化した場合、費用の増大や賃料の下落、不動産売却価格の下落が生じ損失を被ることがあります。
				</dd>



				<dt>信用リスク</dt>
				<dd>＜営業者の倒産リスク＞</dd>
				<dd>
					本事業者が破綻等により事業継続が困難となった場合、出資金が返還されないおそれがあります。また、利益の分配についても利回りが保証されているわけではなく、対象不動産の賃貸利益額によって変動することがあります。
				</dd>
				<dd>※詳細につきましては各プロジェクトの契約成立前書面および匿名組合契約約款、契約成立時書面を必ずご確認ください。</dd>

			</dl>

		</div>
		
    </div> <!-- content end -->
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
