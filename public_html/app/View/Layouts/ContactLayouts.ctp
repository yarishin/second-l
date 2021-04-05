<?php
require_once PATH_COMPONENT."CommonTag.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
	<?php echo $this->Html->charset(); ?>
	<title><?php echo SITE_TITLE; ?></title>
	<meta property="og:type"   content="article" />
	<meta property="og:title"  content="<?php echo SITE_TITLE; ?>" />
	<meta property="og:image"  content="<?php echo URL_SITE_TOP; ?>img/pr300250_004.jpg" />
	<meta property="og:description"  content="SEVENSTAR" />
	<meta property="og:url"  content="<?php echo URL_SITE_TOP; ?>" />
	<meta property="og:site_name"  content="SEVENSTAR" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<?php
		echo $this->Html->meta('keywords', '不動産');
		echo $this->Html->meta('description', '不動産');
		echo $this->Html->meta('icon');
		echo $this->Html->css('import');
		echo $this->Html->css('validationEngine.jquery.css');
		echo $this->Html->css('https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300&display=swap&subset=japanese');
		echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css');
		echo $this->Html->css('https://fonts.googleapis.com/icon?family=Material+Icons');
		echo $this->Html->script('tl_cont');
		echo $scripts_for_layout;
	?>
	
</head>
<body onload="bodyOnload();" >
	<?php CommonTag::header($cumulative); ?>
	<?php echo $content_for_layout; ?>
	<?php CommonTag::footer(); ?>

    <script type="text/javascript" src="<?php echo URL_SITE_TOP; ?>js/bootstrap.min.js"></script>
    <!-- <script type="text/javascript" src="<?php echo URL_SITE_TOP; ?>js/jquery.smooth-scroll.min.js"></script>-->
    <script type="text/javascript" src="<?php echo URL_SITE_TOP; ?>js/jquery.back-to-top.min.js"></script>
    <script type="text/javascript" src="<?php echo URL_SITE_TOP; ?>js/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="<?php echo URL_SITE_TOP; ?>js/jquery.wow.min.js"></script>
    <script type="text/javascript" src="<?php echo URL_SITE_TOP; ?>js/global.min.js"></script>
    <script type="text/javascript" src="<?php echo URL_SITE_TOP; ?>js/header-sticky.min.js"></script>
    <script type="text/javascript" src="<?php echo URL_SITE_TOP; ?>js/scrollbar.min.js"></script>
    <script type="text/javascript" src="<?php echo URL_SITE_TOP; ?>js/portfolio-4-col-slider.min.js"></script>
    <script type="text/javascript" src="<?php echo URL_SITE_TOP; ?>js/wow.min.js"></script>
    <script type="text/javascript" src="<?php echo URL_SITE_TOP; ?>js/jquery.migrate.min.js"></script>
    <script type="text/javascript" src="<?php echo URL_SITE_TOP; ?>js/vidbg.min.js"></script>
    <script type="text/javascript" src="<?php echo URL_SITE_TOP; ?>js/jquery.cubeportfolio.min.js"></script>

</body>
</html>
