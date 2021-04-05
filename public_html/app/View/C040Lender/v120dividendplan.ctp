<?php $this->Html->css('https://fonts.googleapis.com/icon?family=Material+Icons', array('inline' => false)); ?>
<?php $this->Html->css('mypage.css', array('inline' => false)); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
<?php $this->Html->scriptEnd(); ?>

<div class="g-bg-color--sky-light">
    <div class="container g-padding-y-80--xs g-padding-y-125--xsm">

		<div class="row mypagetitle-area"><div class="col-md-12"><h3>運用状況</h3></div></div>

		<div class="row" style="margin-top:1em;">


			<!--menu-->
			<div class="col-md-2 col-xs12 mypagemenu">
				<div class="scroll-nav">
					<ul>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="location.href='<?php echo URL_LENDER_PAGE ?>'"><i class="material-icons">home</i><br class="smart-br-on"><span>マイページトップ</span></a></li>
						<li class="mypagebt-on"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010070 ?>');"><i class="material-icons">timeline</i><br class="smart-br-on"><span>運用状況</span></a></li>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010010 ?>');"><i class="material-icons">toc</i><br class="smart-br-on"><span>取引履歴</span></a></li>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010030 ?>');"><i class="material-icons">account_circle</i><br class="smart-br-on"><span>会員情報</span></a></li>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010060 ?>');"><i class="material-icons">how_to_vote</i><br class="smart-br-on"><span>電子交付書面</span></a></li>
						<li class="mypagebt-off"><a href="javascript:void(0)" onclick="buttonClick('<?php echo EVENT_ID_040010040 ?>');"><i class="material-icons">announcement</i><br class="smart-br-on"><span>お知らせ</span></a></li>
						<li class="mypagebt-off"><a href="<?php echo URL_LOGOUT_PAGE ?>"><i class="material-icons">directions_run</i><br class="hidden-md hidden-lg"><span>ログアウト</span></a></li>
					</ul>
				</div>
			</div>
			<!--menu_end-->





		<div class="col-md-10 col-xs-12" style="padding: 0;margin: 0;">
			<form id="form" name="form" method="post" action="<?php echo $action ?>">
				<div class="row" style="margin: 0;width: 100%;">

					<div class="well well-lg col-md-4 col-sm-3 col-xs-8 text-center" style="background-color: #fff;margin: 0 2em;padding-bottom:3em;">
					   <h3 style="letter-spacing:0.2em;">損益額</h3><br>
						 <p class="h3 text-center" style="line-height:1.5em;">●●●●●●●●円</p>
					</div>

					<div class="col-md-7 col-sm-7 col-xs-12">

						<div class="row well well-sm" style="background-color: #fff;margin: 0 10px 10px;padding-top: 15px;padding-bottom: 15px;">
							<div class="col-md-6 col-xs-7 ">
								<span style="letter-spacing:0.1em;">運用総額</span>
							</div>
							<div class="col-md-5 col-xs-5" style="text-align: right;">
								<span>●●●●●●●●円</span>
							</div>
						</div>
            
						<div class="row well well-sm" style="background-color: #fff;margin: 0 10px 10px;padding-top: 15px;padding-bottom: 15px;">
							<div class="col-md-6 col-xs-7">
								<span style="letter-spacing:0.1em;">
									運用中金額　<input style="margin:0;border:0;padding:0 0.5em;background-color:#3eb6ff;color:#191919;" type="button" value="詳細" onclick="buttonClick('<?php echo EVENT_ID_040010010 ?>');" tabindex="2">
								</span>
							</div>
							<div class="col-md-5 col-xs-5" style="text-align: right;">
								<span>●●●●●●●●円</span>
							</div>
						</div>

						<div class="row well well-sm" style="background-color: #fff;margin: 0 10px 10px;padding-top: 15px;padding-bottom: 15px;">
							<div class="col-md-6 col-xs-7"><span style="letter-spacing:0.1em;">分配金・払戻金額合計</span></div>
							<div class="col-md-5 col-xs-5" style="text-align: right;"><span>●●●●●●●●円</span></div>
						</div>
            
						<div class="row well well-sm" style="background-color: #fff;margin: 0 10px;padding-top: 15px;padding-bottom: 15px;">
							<div class="col-md-6 col-xs-7"><span style="letter-spacing:0.1em;">損益額</span></div>
							<div class="col-md-5 col-xs-5" style="text-align: right;"><span>●●●●●●●●円</span></div>
						</div>

					</div>
       				<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
				</div>
			</form>
		</div>

	</div>	
</div> <!--content end-->


</div>