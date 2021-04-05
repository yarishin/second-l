<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo SITE_TITLE; ?></title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('admin');
		echo $scripts_for_layout;
	?>
</head>
<body onload="bodyOnload();">
	<div id="container">
		<div id="header">
<?php
if ($this->Session->check(SESSION_LOGIN_ADMIN_INFO)) {
	$admin_info = $this->Session->read(SESSION_LOGIN_ADMIN_INFO);
?>
			<input type="button" value="ログアウト" onclick="location.href='<?php echo URL_ADMIN_LOGOUT ?>'">
			<?php echo "　".$admin_info[LOGIN_ADMIN_ID]."：".$admin_info[LOGIN_ADMIN_NAME] ?>
<?php
}
else {
?>
			<?php echo $header_for_layout; ?>
<?php
}
?>
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $content_for_layout; ?>
		</div>
		<div id="footer">
			<?php echo $footer_for_layout; ?>
		</div>
	</div>
</body>
</html>
