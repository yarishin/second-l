<?php $this->Html->css('validationEngine.jquery.css', array('inline' => false)); ?>
<?php $this->Html->script( 'jquery-1.8.2.min.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.validationEngine.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'languages/jquery.validationEngine-ja.js', array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
<?php $this->Html->scriptEnd(); ?>


<div class="g-bg-color--sky-light">
	<div class="container g-padding-y-80--xs g-padding-y-125--sm">

		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center">
				<div id="page-title" style="margin:1em auto;">出資申込完了</div>
			</div> 
		</div>


	<div class="row">
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

			<form id="form" name="form" method="post" action="<?php echo $action ?>">
				<span>当社での審査完了後、ご登録いただいたメールアドレスへ申込結果のご連絡をいたします。</span>
			<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2" style="margin-top:1em;padding:3em;background-color:#f1f1f1;border-radius:10px;">
				<span style="line-height:2em;">
					(今後の流れ)<br>
					出資確定のご連絡<br>
					<span class="glyphicon glyphicon-arrow-down" aria-hidden="true" style="text-indent:1em;"></span><br>
					成立時書面および不動産特定共同事業契約約款の確認および同意<br>
					<span class="glyphicon glyphicon-arrow-down" aria-hidden="true" style="text-indent:1em;"></span><br>
					出資金額の振込<span style="font-size:0.8em;margin-left:1em;"><br class="visible-xs">※振込手数料はお客様負担となります</span><br>
					<span class="glyphicon glyphicon-arrow-down" aria-hidden="true" style="text-indent:1em;"></span><br>
					入金確認のご連絡<br>
					<span class="glyphicon glyphicon-arrow-down" aria-hidden="true" style="text-indent:1em;"></span><br>
					運用開始<br>

				</span>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" style="margin-top:1.5em;">

				<span>出資確定のご連絡まで今しばらくお待ちください。</span>

		</div>
	</div



		
         <div class="row" style="margin-top:2em;">
             <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-12" style="margin-top:1.5em;">
		
			<input type="button" style="font-size:1.2em;" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" value="トップに戻る" onclick="location.href='<?php echo URL_SITE_TOP ?>'">
		</div>
	</div>



	</div>
</div> 