<?php $this->Html->css('https://fonts.googleapis.com/icon?family=Material+Icons', array('inline' => false)); ?>
<?php $this->Html->css('mypage.css', array('inline' => false)); ?>
<?php $this->Html->css('validationEngine.jquery.css', array('inline' => false)); ?>
<?php $this->Html->script( 'jquery.min.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.validationEngine.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'languages/jquery.validationEngine-ja.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.common.js'    , array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
$(document).ready(function() {
	$('#<?php echo OBJECT_ID_BTN000010 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
	$('#<?php echo OBJECT_ID_BTN000020 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
	$('#<?php echo OBJECT_ID_BTN000030 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
});
<?php $this->Html->scriptEnd(); ?>


	



<div class="g-bg-color--sky-light">
	<div class="container g-padding-y-80--xs g-padding-y-125--xsm">

		<div class="row mypagetitle-area">
			<div class="col-md-12">
				<h3>会員情報変更</h3>
			</div>
		</div>

		<div class="row" style="margin-top: 1em;">

			<!--menu-->
			<div class="col-md-2 col-xs12 mypagemenu">
				<div class="scroll-nav">
					<ul>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="location.href='<?php echo URL_LENDER_PAGE ?>'"><i class="material-icons">home</i><br class="smart-br-on"><span>マイページTop</span></a></li>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010040 ?>');"><i class="material-icons">announcement</i><br class="smart-br-on"><span>お知らせ</span></a></li>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010010 ?>');"><i class="material-icons">toc</i><br class="smart-br-on"><span>出資履歴</span></a></li>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010020 ?>');"><i class="material-icons">timeline</i><br class="smart-br-on"><span>収益明細</span></a></li>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010060 ?>');"><i class="material-icons">how_to_vote</i><br class="smart-br-on"><span>電子交付書面</span></a></li>
						<li class="mypagebt-on"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010030 ?>');"><i class="material-icons">account_circle</i><br class="smart-br-on"><span>会員情報</span></a></li>
						<li class="mypagebt-off"><a href="<?php echo URL_LOGOUT_PAGE ?>"><i class="material-icons">directions_run</i><br class="hidden-md hidden-lg"><span>ログアウト</span></a></li>
					</ul>
				</div>
			</div>
			<!--menu_end-->

			<div class="col-md-10 col-xs-12" style="padding: 0;margin: 0;">

				<form id="form" name="form" method="post" action="<?php echo $action ?>">

					<div class="row" style="margin-top:1em;">
						<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-offset-0">
							<div class="panel panel-info">
  								<div class="panel-heading">
									<div class="row">
										<div class="col-lg-4 col-sm-5">
											メールアドレスの変更はこちら
										</div>
										<div class="col-lg-8 col-sm-7">
    <?php
    if (isset($validation_errors) && is_array($validation_errors)) {
		foreach ($validation_errors as $key => $value) {
			echo '<p class="error" style="font-size:0.8em;margin:0;text-align:right;"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>'.$value.'</p>';
		}
    }
    ?>
				
										</div>
									</div>
								</div>

  								<div class="panel-body">
										
									<div class="row" style="border-bottom:1px dashed #ccc;padding:1em;">
										<div class="col-md-4 col-sm-6">
											新しいメールアドレス
										</div>
										<div class="col-md-8 col-sm-6">
											<input type="text" class="v080mailadd" name="<?php echo OBJECT_ID_040080010 ?>" id="<?php echo OBJECT_ID_040080010 ?>" value="<?php echo $data[OBJECT_ID_040080010] ?>" tabindex="1" size="15">
										</div>
									</div>

									<div class="row" style="border-bottom:1px dashed #ccc;padding:1em;">
										<div class="col-md-4 col-sm-6">
											新しいメールアドレス確認
										</div>
										<div class="col-md-8 col-sm-6">
											<input type="text" class="v080mailadd" name="<?php echo OBJECT_ID_040080020 ?>" id="<?php echo OBJECT_ID_040080020 ?>" value="<?php echo $data[OBJECT_ID_040080020] ?>" tabindex="2" size="15">
										</div>
									</div>

									<div class="row" style="padding:1em;">
										<div class="col-md-4 col-sm-6">
											パスワード
										</div>
										<div class="col-md-8 col-sm-6">
											<input type="password" name="<?php echo OBJECT_ID_040080030 ?>" id="<?php echo OBJECT_ID_040080030 ?>" value="<?php echo $data[OBJECT_ID_040080030] ?>" tabindex="3" size="15">
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>

					<div class="row" style="margin:1em auto 4em auto;">
						<div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 col-xs-offset-0">
							<input type="button" style="font-size:1.2em;" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" id="<?php echo OBJECT_ID_BTN000010 ?>" name="<?php echo OBJECT_ID_BTN000010 ?>" value="メールアドレス変更" onclick="buttonClick('<?php echo EVENT_ID_040080010 ?>');" tabindex="4">
						</div>
					</div>
		
		
					<div class="row" style="margin-top:2em;">
						<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12">
							<div class="panel panel-info">
  								<div class="panel-heading">

									<div class="row">
										<div class="col-lg-4 col-md-5 col-sm-5">
											パスワードの変更はこちら
										</div>
										<div class="col-lg-8 col-md-7 col-sm-7">
		<?php
		if (isset($password_change_errors) && is_array($password_change_errors)) {
			foreach ($password_change_errors as $key => $value) {
				echo '<p class="error" style="font-size:0.8em;margin:0;text-align:right;"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>'.$value.'</p>';
			}
		}
		?>

										</div>
									</div>
								</div>

  								<div class="panel-body">
					
									<div class="row" style="border-bottom:1px dashed #ccc;padding:1em;">
										<div class="col-md-4 col-sm-6">現在のパスワード</div>
										<div class="col-md-8">
											<input type="password" name="<?php echo OBJECT_ID_040080040 ?>" id="<?php echo OBJECT_ID_040080040 ?>" value="<?php echo $data[OBJECT_ID_040080040] ?>" tabindex="5" size="15">
										</div>
									</div>

									<div class="row" style="border-bottom:1px dashed #ccc;padding:1em;">
										<div class="col-md-4 col-sm-6">
											新しいパスワード
										</div>
										<div class="col-md-8">
											<input type="password" name="<?php echo OBJECT_ID_040080050 ?>" id="<?php echo OBJECT_ID_040080050 ?>" value="<?php echo $data[OBJECT_ID_040080050] ?>" tabindex="6" size="15">
										</div>
									</div>

									<div class="row" style="padding:1em;">
										<div class="col-md-4 col-sm-6">
											新しいパスワード(確認)
										</div>
										<div class="col-md-8">
											<input type="password" name="<?php echo OBJECT_ID_040080060 ?>" id="<?php echo OBJECT_ID_040080060 ?>" value="<?php echo $data[OBJECT_ID_040080060] ?>" tabindex="7" size="15">
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>

					<div class="row" style="margin:1em auto 4em auto;">
						<div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 col-xs-offset-0">
							<input type="button" style="font-size:1.2em;" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" id="<?php echo OBJECT_ID_BTN000020 ?>" name="<?php echo OBJECT_ID_BTN000020 ?>" value="パスワード変更" onclick="buttonClick('<?php echo EVENT_ID_040080020 ?>');" tabindex="8">
						</div>
					</div>

		
					<div class="row" style="margin-top:2em;">
						<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-offset-0">
							<div class="panel panel-info">
  								<div class="panel-heading">

									<div class="row">
										<div class="col-lg-5 col-md-6 col-sm-5">
											メルマガ配信設定の変更はこちら
										</div>
										<div class="col-lg-7 col-md-6 col-sm-7">
		<?php
			if (isset($mail_magizine_errors) && is_array($mail_magizine_errors)) {
				foreach ($mail_magizine_errors as $key => $value) {
					echo '<p class="error" style="font-size:0.8em;margin:0;text-align:right;"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>'.$value.'</p>';
				}
			}
		?>

										</div>
									</div>
								</div>


  								<div class="panel-body">

									<div class="row" style="border-bottom:1px dashed #ccc;padding:1em;">
											<div class="col-md-4 col-sm-8">
												メルマガ配信設定
											</div>
											<div class="col-md-8 col-sm-4">
												<?php foreach($list[CONFIG_0046] as $key => $value): ?>
												<?php $checked = ( $data[OBJECT_ID_040080070] == $key ) ? " checked" : ""; ?>
												<div id="kari_radio<?php echo $key;?>">
													<input name="<?php echo OBJECT_ID_040080070 ?>" class="r_button" type="radio" value="<?php echo $key ?>" tabindex="<?php echo $key+8 ?>"<?php echo $checked; ?>><span><?php echo $value ?></span>
												</div>
												<?php endforeach; ?>
												<!--<span class="text_setsumei">ご登録いただいたメールアドレスに当社の商品やキャンペーンなどのご案内をお届けいたします。</span>-->
											</div>
									</div>

									<div class="row" style="padding:1em;">
										<div class="col-md-4 col-sm-6">
											パスワード
										</div>
										<div class="col-md-8">
											<input type="password" name="<?php echo OBJECT_ID_040080080 ?>" id="<?php echo OBJECT_ID_040080080 ?>" value="<?php echo $data[OBJECT_ID_040080080] ?>" tabindex="11" size="15">
										</div>
									</div>

								</div>




							</div>
						</div>
					</div>

					<div class="row" style="margin:1em auto 4em auto;">
						<div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 col-xs-offset-0">
							<input type="button" style="font-size:1.2em;" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" id="<?php echo OBJECT_ID_BTN000030 ?>" name="<?php echo OBJECT_ID_BTN000030 ?>" value="メルマガ配信設定変更" onclick="buttonClick('<?php echo EVENT_ID_040080030 ?>');" tabindex="12">
						</div>
					</div>

					<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
				</form>






				</div>

		</div>

	</div>
</div>