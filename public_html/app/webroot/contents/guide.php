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
	<title><?php echo SITE_TITLE; ?>｜はじめての方</title>
	<link href="../favicon.ico" type="image/x-icon" rel="icon" />
	<link href="../favicon.ico" type="image/x-icon" rel="shortcut icon" />
	<link rel="stylesheet" type="text/css" href="../css/import.css" />
	<link rel="stylesheet" type="text/css" href="../css/test.css" />
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
			<div id="page-title" class="wow slideInUp" data-wow-duration="2s" data-wow-delay="0">はじめての方</div>
			<div id="page-title-mask" class="wow slideOutDown hidden-md" data-wow-duration="3s" data-wow-delay=".2s"></div>
		</div>
	
		<div class="row" style="margin-bottom:2em;position: relative;z-index: 2;">

			
			<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 text-center" style="margin-bottom:0.5em;">
				<a class="btn btn-lg btn-block active" href="flow.php" role="button">ご利用の流れについてはこちら</a>
            </div>
        </div>
		
		<section id="fund" style="margin-top:-8em;padding-top:8em;">
			<div class="row" >
			    <div class="col-md-8 col-md-offset-2 text-center"style="margin-bottom:1em;">
					<h4 class="head_test g-font-size-30--md g-font-size-24--sm g-font-size-22--xs" style="color:#9c7feb;letter-spacing:0.2em;"><b>ファンドの仕組み</b></h4>
                </div>
            </div>

            <div class="row" style="margin-bottom:4em;background-color:#f9f8ff;">
				<div class="col-md-4 col-sm-push-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-12">
					<img class="img-responsive center-block" style="width: 100%;" src="../img/guide_1.png">
                </div>
				
				<div class="col-md-4 col-sm-pull-4 col-md-offset-0 col-sm-4 col-xs-12" style="padding:1em;">
					<h3 class="g-font-size-20--md g-font-size-18--sm g-font-size-20--xs" style="color:#13b1cd;letter-spacing:0.2em;padding-bottom:1em;"><b>匿名組合契約の締結</b></h3>
                    <p class="g-font-size-16--sm g-font-size-16--md g-font-size-16--xs" style="line-height:1.5em;letter-spacing:0.15em;">
						お客様を優先出資者として営業者と匿名組合契約を締結します。

					</p>
                </div>
            </div>

            <div class="row" style="margin-bottom:4em;">
	            <div class="col-md-4 col-sm-push-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-12">
		            <img class="img-responsive center-block" style="width: 100%;" src="../img/guide_2.png">
                </div>
                <div class="col-md-4 col-sm-pull-4 col-md-offset-0 col-sm-4 col-xs-12" style="padding:1em;">
			        <h3 class="g-font-size-20--md g-font-size-18--sm g-font-size-20--xs" style="color:#13b1cd;letter-spacing:0.2em;padding-bottom:1em;"><b>出資および運用開始</b></h3>
				    <p class="g-font-size-16--sm g-font-size-16--md g-font-size-16--xs" style="line-height:1.5em;letter-spacing:0.15em;">
				        お客様は優先出資者として、営業者は劣後出資者として金銭を出資します。双方合わせた出資金をもって不動産特定共同事業を開始します。

					</p>
                </div>
            </div>

            <div class="row" style="margin-bottom:4em;background-color:#f9f8ff;">
				<div class="col-md-4 col-sm-push-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-12">
					<img class="img-responsive center-block" style="width: 100%;" src="../img/guide_3.png">
                </div>
                <div class="col-md-4 col-sm-pull-4 col-md-offset-0 col-sm-4 col-xs-12" style="padding:1em;">
					<h3 class="g-font-size-20--md g-font-size-18--sm g-font-size-20--xs" style="color:#13b1cd;letter-spacing:0.2em;padding-bottom:1em;"><b>利益の受けとり</b></h3>
                    <p class="g-font-size-16--sm g-font-size-16--md g-font-size-16--xs" style="line-height:1.5em;letter-spacing:0.15em;">
						利益分配においては、まず優先出資者であるお客様にファンド毎の想定利回りに至るまで優先して分配し、その後残利益があった場合には劣後出資者である営業者に分配されます。

					</p>
				</div>
            </div>

            <div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h3 class="g-font-size-20--md g-font-size-18--sm g-font-size-20--xs" style="color:#13b1cd;letter-spacing:0.2em;padding-bottom:1em;"><b>優先出資者の元本の安全性の確保</b></h3>
                </div>
            </div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12" style="padding:1em;">
					<p class="g-font-size-16--sm g-font-size-16--md" style="line-height:1.5em;letter-spacing:0.15em;">
						物件価格が下落した場合の下落額は、まずは営業者の劣後出資から当該下落額に相当する損失を充当し当該損失が劣後出資の全額をもって補てんできない場合には優先出資者の元本が減少します。<br>つまり当該損失が劣後出資の範囲内であれば優先出資者
の元本は守られます。

                    </p>
                </div>
            </div>
  
            <div class="row">
	            <div class="col-md-12 col-sm-12 col-xs-12">
		            <img class="img-responsive center-block" src="../img/guide_4.png">
                </div>
		    </div>
		</section>

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
