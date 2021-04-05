6<?php $this->Html->script( 'jquery-1.8.2.min.js' , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.common.js'    , array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
}
$(document).ready(function() {
	$('#<?php echo OBJECT_ID_BTN000010 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
	$('#<?php echo OBJECT_ID_BTN000020 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
});
<?php $this->Html->scriptEnd(); ?>


    
<div class="g-bg-color--sky-light">
	<div class="container g-padding-y-80--xs g-padding-y-125--sm">


		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center">
				<div id="page-title" style="margin:1em auto;">
					出資申込確認
				</div>
			</div> 
		</div>



		<div class="row" style="margin-bottom:2em;">
			<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
				下記の内容で申込をします。<br />申込決定をする前に内容を再度ご確認ください。
			</div>
		</div>		
		
	<form id="form" name="form" method="post" action="<?php echo $action ?>">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0" style="background-color:#f1f1f1;border-radius:10px;">
	
				
					<div class="row">
						<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-5 col-xs-offset-0" style="padding:1em;">
							ファンド名
						</div>
						<div class="col-lg-5 col-md-8 col-sm-8 col-xs-7" style="padding:1em;">
							<?php echo $data[OBJECT_ID_040020010] ?>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-5 col-xs-offset-0" style="padding:1em;">
							出資申込金額
						</div>
						<div class="col-lg-5 col-md-8 col-sm-8 col-xs-7" style="padding:1em;">
							<span style="font-family:Meiryo;"><?php echo $data[OBJECT_ID_040020020] ?></span>
						</div>
					</div>
			
				
			</div>
		</div>

	
		<div class="row" style="margin-top:2em;">
			<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
				申込決定後、当社の審査を経て出資確定となります。<br>入金方法は「出資確定」のメールに記載いたします。
				<!--※&nbsp;上記金額を&nbsp;<?php echo $data[OBJECT_ID_040020090] ?>&nbsp;までに所定の口座にお振込み下さい。-->
			</div>
		</div>

		<div class="row" style="margin-top:1.5em;">
			<div class="col-md-2 col-md-offset-4 col-sm-3 col-sm-offset-3 col-xs-6">
				<input type="submit" style="font-size:1.2em;" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" id="<?php echo OBJECT_ID_BTN000010 ?>" name="<?php echo OBJECT_ID_BTN000010 ?>" value="戻る" onclick="buttonClick('<?php echo EVENT_ID_040030010 ?>');" tabindex="1">
			</div>
			<div class="col-md-2 col-sm-3 col-xs-6">
				<input type="submit" style="font-size:1.2em;" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" id="<?php echo OBJECT_ID_BTN000020 ?>" name="<?php echo OBJECT_ID_BTN000020 ?>" value="申込決定" onclick="buttonClick('<?php echo EVENT_ID_040030020 ?>');" tabindex="2">

			</div>

			
			<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
			<input type="hidden" id="<?php echo HIDDEN_ID_000000180 ?>" name="<?php echo HIDDEN_ID_000000180 ?>" value="<?php echo $data[HIDDEN_ID_000000180] ?>">
		</div>
	</form>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 text-center">
				<span style="color:#f00;">※出資申込後のキャンセルは出来ません。ご注意ください。</spam>
			</div>
		</div>

	</div>
</div>
