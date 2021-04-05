<?php $this->Html->script( 'jquery-1.8.2.min.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.common.js'                       , array( 'inline' => false ) ); ?>

<h1>PDF作成(完了)</h1>

<?php
foreach ($result as $key => $value) {
	echo $value.'<br>'.LINE_FEED_CODE;
}
?>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<a href="<?php echo URL_SITE_TOP.'c990_view_test/makepdf' ?>">戻る</a>
	</div>
	
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
</form>
