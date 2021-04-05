<?php $this->Html->css('https://fonts.googleapis.com/icon?family=Material+Icons', array('inline' => false)); ?>
<?php $this->Html->css('mypage.css', array('inline' => false)); ?>
<?php $this->Html->css('validationEngine.jquery.css', array('inline' => false)); ?>
<?php $this->Html->script( 'jquery.min.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.validationEngine.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'languages/jquery.validationEngine-ja.js', array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
<?php $this->Html->scriptEnd(); ?>



<div class="g-bg-color--sky-light">
	<div class="container g-padding-y-80--xs g-padding-y-125--xsm">

		<div class="row mypagetitle-area"><div class="col-md-12"><h3>会員情報</h3></div></div>
		
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
						<li class="mypagebt-on mp_m_on"><i class="material-icons">account_circle</i><br class="smart-br-on"><span>会員情報</span></li>
						<li class="mypagebt-off"><a href="<?php echo URL_LOGOUT_PAGE ?>"><i class="material-icons">directions_run</i><br class="hidden-md hidden-lg"><span>ログアウト</span></a></li>
					</ul>
				</div>
			</div>
			<!--menu_end-->

			<div class="row col-md-10 col-xs-12" style="margin: 10px 0 0 0;">
				<div class="well well-lg col-md-12" style="background-color: #fff;padding:1em;">
					<form id="form" name="form" method="post" action="<?php echo $action ?>">
       					<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
					</form>	
			<div class="row" style="margin-bottom:0;">
				<div class="col-lg-4 col-xs-5">
					<h4>基本情報</h4>
				</div>
				<div class="col-lg-4 col-lg-offset-4 col-xs-7 col-xs-offset-0 text-right">
					<h4>ID：<?php echo $data[OBJECT_ID_040070010] ?></h4>
				</div>
			</div>

<div class="row" style="padding:0em 1em;">
<div class="col-lg-10 col-lg-offset-1 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0" style="padding:0;border-bottom:1px solid #B49E65;">
<h4 style="font-size:1.2em;">　</h4>
</div>




	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">メールアドレス</div>
	<div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td"><?php echo $data[OBJECT_ID_040070060] ?></div>
						
	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">パスワード</div>
	<div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td">非表示</div>
			
	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">メルマガ配信設定</div>
        <div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td"><?php echo $list[CONFIG_0046][$data[OBJECT_ID_040070470]] ?></div>

</div>


				<div class="row" style="margin-top:2em;">
					<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 col-xs-offset-0">
					<input type="button" style="font-size:1em;" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs s-btn--white-bg g-radius--50 g-font-size-16--lg g-font-size-16--md g-font-size-16--sm g-font-size-13--xs" value="基本情報の変更を希望される方はこちら" onclick="buttonClick('<?php echo EVENT_ID_040070010 ?>');" tabindex="2">
					</div>
				</div>
					
			<div class="row" style="margin-top:3em;">
				<div class="col-lg-4 col-xs-12">
					<h4>出資者情報</h4>
				</div>
			</div>

<div class="row row-height" style="padding:1em;">

<div class="col-lg-10 col-lg-offset-1 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0" style="padding:0;margin-top:1em;border-bottom:1px solid #B49E65;">
<h4 style="font-size:1.2em;"><b>お客様情報</b></h4>
</div>


	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">お名前（漢字）</div>
        <div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td">
		<!--姓--><?php echo $data[OBJECT_ID_030020010] ?>
		<!--名--><?php echo $data[OBJECT_ID_030020020] ?>
	</div>

	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">お名前（カナ）</div>
	<div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td">
		<!--姓--><?php echo $data[OBJECT_ID_030020030] ?>
		<!--名--><?php echo $data[OBJECT_ID_030020040] ?>
	</div>

	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">性別</div>
	<div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td"><?php echo $list[CONFIG_0023][$data[OBJECT_ID_030020050]] ?></div>
							
	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">生年月日</div>
	<div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td">
		<?php echo $data[OBJECT_ID_040070080] ?>
	</div>
							
	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">郵便番号</div>
	<div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td"><?php echo $data[OBJECT_ID_030020090] ?></div>

	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">都道府県</div>
	<div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td"><?php echo $list[CONFIG_0021][$data[OBJECT_ID_030020100]] ?></div>

	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">市区町村丁目番地</div>
	<div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td"><?php echo $data[OBJECT_ID_030020110] ?></div>

	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">建物名</div>
	<div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td"><?php echo $data[OBJECT_ID_030020120] ?></div>

	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">電話番号</div>
	<div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td"><?php echo $data[OBJECT_ID_030020130] ?></div>



							<!--<tr><div class="col-md-4">携帯電話番号				</div><div class="col-md-6"><?php echo $data[OBJECT_ID_030020140] ?></div></tr>-->
							<!--<tr><div class="col-md-4">住居の状況					</div><div class="col-md-6"><?php echo $list[CONFIG_0002][$data[OBJECT_ID_030020150]] ?></div></tr>-->
							<!--<tr><div class="col-md-4">家族構成					</div><div class="col-md-6"><?php echo $list[CONFIG_0003][$data[OBJECT_ID_030020160]] ?></div></tr>-->


							
	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">職業</div>
	<div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td"><?php echo $list[CONFIG_0009][$data[OBJECT_ID_030020220]] ?></div>


                <?php if(!empty($data[OBJECT_ID_030020230])){ ?>


	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">お勤め先</div>
	<div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td"><?php echo $data[OBJECT_ID_030020230] ?></div>

	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">年収</div>
	<div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td"><?php echo $list[CONFIG_0010][$data[OBJECT_ID_030020240]] ?></div>

        	<?php } ?>

	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">金融資産</div>
	<div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td"><?php echo $list[CONFIG_0004][$data[OBJECT_ID_030020170]] ?></div>
</div>

<div class="row row-height" style="padding:1em;">
<div class="col-lg-10 col-lg-offset-1 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0" style="padding:0;margin-top:2em;border-bottom:1px solid #B49E65;">
<h4 style="font-size:1.2em;"><b>投資経験およびご意向</b></h4>
</div>
	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">不動産投資への興味</div>
	<div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td"><?php echo $list[CONFIG_0031][$data[OBJECT_ID_030020440]] ?></div>

	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">投資の経験</div>
	<div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td"><?php echo $list[CONFIG_0013][$data[OBJECT_ID_030020350]] ?></div>

	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">投資の目的</div>
	<div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td"><?php echo $list[CONFIG_0020][$data[OBJECT_ID_030020420]] ?></div>

	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">投資可能金額</div>
	<div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td"><?php echo $list[CONFIG_0030][$data[OBJECT_ID_030020430]] ?></div>

	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">投資の方針</div>
	<div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td"><?php echo $list[CONFIG_0032][$data[OBJECT_ID_030020450]] ?></div>

	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">希望運用期間</div>
	<div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td"><?php echo $list[CONFIG_0033][$data[OBJECT_ID_030020460]] ?></div>

</div>



<div class="row row-height" style="padding:1em;">
<div class="col-lg-10 col-lg-offset-1 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0" style="padding:0;margin-top:2em;border-bottom:1px solid #B49E65;">
<h4 style="font-size:1.2em;"><b>届出金融機関</b></h4>
</div>
 	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">金融機関区分</div>
	<div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td"><?php echo $list[CONFIG_0011][$data[OBJECT_ID_030020280]] ?></div>

	<?php if (strcmp(BANK_TYPE_CODE_OTHER, $data[OBJECT_ID_040070280]) == 0) { ?>
	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">金融機関名</div>
	<div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td"><?php echo $data[OBJECT_ID_030020290] ?></div>

	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">支店名</div>
	<div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td"><?php echo $data[OBJECT_ID_030020300] ?></div>
	<?php } ?>

	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">種目</div>
	<div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td"><?php echo $list[CONFIG_0012][$data[OBJECT_ID_030020310]] ?></div>

	<?php if (strcmp(BANK_TYPE_CODE_YUCHO, $data[OBJECT_ID_040070280]) == 0) { ?>
	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">記号(ゆうちょ選択時のみ)</div>
	<div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td"><?php echo $data[OBJECT_ID_030020320] ?></div>
	<?php } ?>

	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">口座番号</div>
	<div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td"><?php echo $data[OBJECT_ID_030020330] ?></div>

	<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_th">口座名義人</div>
	<div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 lenderinfo_td"><?php echo $data[OBJECT_ID_030020340] ?></div>

</div>
				</div>



<!--					
				<div class="row">
					<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">


					<input type="button" style="font-size:1em;" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs s-btn--white-bg g-radius--50 g-font-size-16--lg g-font-size-16--md g-font-size-16--sm g-font-size-13--xs" value="出資者情報の変更を希望される方はこちら" onclick="buttonClick('<?php echo URL_CONTACT_PAGE ?>');" tabindex="2">

					</div>
				</div>




<div class="row">
	<div class="col-lg-6 col-lg-offset-3 text-center">
		
<a class=" g-font-size-16--lg g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs s-btn--white-bg g-radius--50" href="<?php echo URL_CONTACT_PAGE ?>" target=" _blank">出資者情報の変更を希望される方はこちら</a>
	
	</div>
</div>
-->
<div class="row" style="margin-top:2em;">
	<div class="col-lg-12 text-center">
		
出資者情報の変更を希望される方は<a href="<?php echo URL_CONTACT_PAGE ?>" target="_blank">お問い合わせ</a>よりその旨ご連絡ください。
	
	</div>
</div>


					
				</div>

				
				<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
			
			</form>
			
		</div>
	</div>
</div>

