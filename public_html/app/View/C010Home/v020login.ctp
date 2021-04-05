<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
}
<?php $this->Html->scriptEnd(); ?>



<div class="g-bg-color--sky-light">
    <div class="container g-padding-y-80--xs g-padding-y-125--xsm">

		<div class="row col-md-12 g-margin-b-0--xs">
			<div style="margin: 0;position: relative;z-index: 1;">
				<div id="page-title" class="wow slideInUp" data-wow-duration="2s" data-wow-delay="0">ログイン</div>
				<div id="page-title-mask" class="wow slideOutDown hidden-md" data-wow-duration="3s" data-wow-delay=".2s"></div>
			</div>
		</div>

	    <div class="row col-md-12 g-margin-b-0--xs g-margin-b-0--lg" style="position: relative;z-index: 2;">

			<div id="content">
				<div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3 g-hor-centered-row__col">

					<form name="form" method="post" action="<?php echo $action ?>" class="center-block g-box-shadow__blueviolet-v1 g-padding-x-40--xs g-padding-y-60--xs g-radius--4 g-bg-color--primary-to-blueviolet-ltr">
						<?php
							echo '<p class="error">'.$value.'</p>';
						?>
								
						<div class="g-margin-b-30--xs">
							<input type="text" class="validate[required] form-control s-form-v3__input" name="<?php echo OBJECT_ID_010020010 ?>" id="<?php echo OBJECT_ID_010020010 ?>" value="<?php echo $data[OBJECT_ID_010020010] ?>" placeholder="* ID or E-Mail" tabindex="1">
						</div>
                                
						<div class="g-margin-b-30--xs">
							<input type="password" class="validate[required] form-control s-form-v3__input" name="<?php echo OBJECT_ID_010020020 ?>" id="<?php echo OBJECT_ID_010020020 ?>" value="<?php echo $data[OBJECT_ID_010020020] ?>" placeholder="* Password" tabindex="2">
						</div>

						<div class="g-text-center--xs" style="margin-top: 50px;">
							<button type="submit" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--md s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" onclick="buttonClick('<?php echo EVENT_ID_010020010 ?>')" tabindex="3">ログイン</button>
							<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
							<a class="g-font-size-13--xs" style="color:#11122b;text-shadow:1px 1px 1px #fff;" href="<?php echo URL_REISSUE ?>">パスワードを忘れた方はこちら</a>
						</div>
					</form>

				</div>



				<!-- ボタンエリア -->
                <p class="col-sm-12 col-xs-12" style="padding-top: 50px;text-align: center;">はじめてご利用の方は、こちらから会員登録を行って下さい。</p>
				<div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3 g-padding-x-40--xs">
                    <div class="g-text-center--xs g-padding-y-20--xs">
						<button type="button" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--orange-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" style="padding: 15px 0;" onclick="location.href='<?php echo URL_REGISTRATION_PAGE ?>'">新規会員登録</button>
                    </div>
                </div>
                <!-- End ボタンエリア -->

			</div> <!--content end-->

		</div>
	</div>
</div>
