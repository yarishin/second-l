<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300&amp;display=swap&amp;subset=japanese" rel="stylesheet">
<?php $this->Html->script( 'jquery-1.8.2.min.js' , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.common.js'    , array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
$(document).ready(function() {
	$('#<?php echo OBJECT_ID_BTN000010 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
	$('#<?php echo OBJECT_ID_BTN000020 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
});
<?php $this->Html->scriptEnd(); ?>



<div class="g-bg-color--sky-light">
	<div class="container g-padding-y-80--xs g-padding-y-125--sm">

<div class="row" style="border-bottom:1px solid #ccc;">
			<div class="col-xs-12 visible-xs" style="margin-bottom:1.5em;">
				<p style="color:#333333;text-align:center;margin-top:1em;font-size:1.5em;">出資者情報登録</p>
				<img class="img-responsive center-block animated pulse" style="line-height: 0;width:50%;" src="../img/shinki2_1.png" alt="出資者情報登録の流れ図">
				
			</div>

			<div class="col-lg-2 col-lg-offset-2 col-md-3 col-md-offset-0 col-sm-3 col-sm-offset-0 hidden-xs" style="margin-bottom:1em;">
				<div class="row">
					<div class="col-lg-10 col-md-10 col-sm-10">
						<p class="g-font-size-16--sm g-font-size-14--lg" style="color:#6d6d6d;text-align:center;margin:0;">会員登録</p>
						<img class="img-responsive center-block" style="line-height: 0;" src="../img/shinki1_2.png" alt="出資者情報登録の流れ図">
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2" style="padding-top:2.5em;padding-left:0;">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="font-size:30px;color:#6d6d6d;"></span>
					</div>
				</div>
			</div>

			<div class="col-lg-2 col-md-3 col-sm-3 hidden-xs">
				<div class="row">
					<div class="col-md-10 col-sm-10 g-font-size-10--md">
						<p class="g-font-size-16--sm g-font-size-14--lg" style="color:#333333;text-align:center;margin:0;"><b>出資者情報登録</b></p>
						<img class="img-responsive center-block animated pulse" style="line-height: 0;" src="../img/shinki2_1.png" alt="出資者情報登録の流れ図">

					</div>
					<div class="col-md-2 col-sm-2" style="padding-top:2.5em;padding-left:0;">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="font-size:30px;color:#333333;"></span>
					</div>
				</div>
			</div>

			<div class="col-lg-2 col-md-3 col-sm-3 hidden-xs">
				<div class="row">
					<div class="col-md-10 col-sm-10 g-font-size-10--md">
						<p class="g-font-size-16--sm g-font-size-14--lg" style="color:#6d6d6d;text-align:center;margin:0;font-size:1.5em;">必要書類提出</p>
						<img class="img-responsive center-block" style="line-height: 0;" src="../img/shinki3_2.png" alt="出資者情報登録の流れ図">
 
					</div>
					<div class="col-md-2 col-sm-2" style="padding-top:2.5em;padding-left:0;">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="font-size:30px;color:#6d6d6d;"></span>
					</div>
				</div>
			</div>

			<div class="col-lg-2 col-md-3 col-sm-3 hidden-xs">
				<div class="row">
					<div class="col-lg-10 col-md-10 col-sm-10">
						<p class="g-font-size-14--lg g-font-size-14--sm" style="color:#6d6d6d;text-align:center;margin:0;">本人確認キー入力</p>
						<img class="img-responsive center-block" style="line-height: 0;" src="../img/shinki4_2.png" alt="出資者情報登録の流れ図">

					</div>
				</div>
			</div>
                                 
		</div>		<div class="row">
			<div class="col-md-12 text-center">
				<div id="page-title">出資者情報登録</div>
			</div> 
		</div>

		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-12">
				<p class="-font-size-20--xs g-font-size-20--sm g-font-size-18--lg">ご確認の上、お間違いがなければ『決定』を押してください。</p>
			</div>
		</div>


	<div id="v020confirm_form">
		<form id="form" name="form" method="post" action="<?php echo $action ?>">




		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
				<h4 style="font-size:1.2em;"><b>お客様情報</b></h4>
				<table class="table">
					<tbody>
						<tr>
							<th class="col-lg-4 col-md-4">
								お名前【漢字】
							</th>
							<td class="col-lg-6 col-md-6">
								<!--姓--><?php echo $data[OBJECT_ID_030020010] ?>
								<!--名--><?php echo $data[OBJECT_ID_030020020] ?>
							</td>
						</tr>

						<tr>
							<th class="col-md-4">
								お名前<br class="visible-xs">【全角カナ】
							</th>
							<td class="col-md-6">
								<!--姓--><?php echo $data[OBJECT_ID_030020030] ?>
								<!--名--><?php echo $data[OBJECT_ID_030020040] ?>
							</td>
						</tr>

						<tr>
							<th class="col-md-4">
								性別
							</th>
							<td class="col-md-6">
								<?php echo $list[CONFIG_0023][$data[OBJECT_ID_030020050]] ?>
							</td>
						</tr>

						<tr>
							<th class="col-md-4">
								生年月日（西暦）
							</th>
							<td class="col-md-6">
								<?php echo $data[OBJECT_ID_030020060] ?>年
								<?php echo $data[OBJECT_ID_030020070] ?>月
								<?php echo $data[OBJECT_ID_030020080] ?>日
							</td>
						</tr>

						<tr>
							<th class="col-md-4">
								郵便番号
								</th>
							<td class="col-md-6">
								<?php echo $data[OBJECT_ID_030020090] ?>
							</td>
						</tr>

						<tr>
							<th class="col-md-4">
								都道府県
							</th>
							<td class="col-md-6">
								<?php echo $list[CONFIG_0021][$data[OBJECT_ID_030020100]] ?>
							</td>
						</tr>

						<tr>
							<th class="col-md-4">
								市区町村番地
							</th>
							<td class="col-md-6">
								<?php echo $data[OBJECT_ID_030020110] ?>
							</td>
						</tr>

						<tr>
							<th class="col-md-4">
								建物名
							</th>
							<td class="col-md-6">
								<?php echo $data[OBJECT_ID_030020120] ?>
							</td>
						</tr>

						<tr>
							<th class="col-md-4">
								電話番号
							</th>
							<td class="col-md-6">
								<?php echo $data[OBJECT_ID_030020130] ?>
							</td>
						</tr>

						<tr>
							<th class="col-md-4">
								職業
							</th>
							<td class="col-md-6">
								<?php echo $list[CONFIG_0009][$data[OBJECT_ID_030020220]] ?>
							</td>
						</tr>


                <?php if(!empty($data[OBJECT_ID_030020230])){ ?>
						<tr>
							<th class="col-md-4">
								お勤め先
							</th>
							<td class="col-md-6">
								<?php echo $data[OBJECT_ID_030020230] ?>
							</td>
						</tr>

						<tr>
							<th class="col-md-4">
								年収
							</th>
							<td class="col-md-6">
								<?php echo $list[CONFIG_0010][$data[OBJECT_ID_030020240]] ?>
							</td>
						</tr>
						<tr>
        	<?php } ?>

							<th class="col-md-4">
								金融資産
							</th>
							<td class="col-md-6">
								<?php echo $list[CONFIG_0004][$data[OBJECT_ID_030020170]] ?>
							</td>
						</tr>
					</tbody>
				</table>


				<h4 style="font-size:1.2em;margin-top:2em;"><b>投資経験およびご意向</b></h4>
				<table class="table">
					<tbody>


						<tr>
							<th class="col-md-4">
								不動産投資への興味
							</th>
							<td class="col-md-6">
								<?php echo $list[CONFIG_0031][$data[OBJECT_ID_030020440]] ?>
							</td>
						</tr>

						<tr>
							<th class="col-md-4">
								投資の経験
							</th>
							<td class="col-md-6">
								<?php echo $list[CONFIG_0013][$data[OBJECT_ID_030020350]] ?>
							</td>
						</tr>



						<tr>
							<th class="col-md-4">
								投資の目的
							</th>
							<td class="col-md-6">
								<?php echo $list[CONFIG_0020][$data[OBJECT_ID_030020420]] ?>
							</td>
						</tr>

						<tr>
							<th class="col-md-4">
								投資可能金額
							</th>
							<td class="col-md-6">
								<?php echo $list[CONFIG_0030][$data[OBJECT_ID_030020430]] ?>
							</td>
						</tr>

						<tr>
							<th class="col-md-4">
								投資の方針
							</th>
							<td class="col-md-6">
								<?php echo $list[CONFIG_0032][$data[OBJECT_ID_030020450]] ?>
							</td>
						</tr>

						<tr>
							<th class="col-md-4">
								希望運用期間
							</th>
							<td class="col-md-6">
								<?php echo $list[CONFIG_0033][$data[OBJECT_ID_030020460]] ?>
							</td>
						</tr>
					</tbody>
				</table>


				<h4 style="font-size:1.2em;margin-top:2em;"><b>届出金融機関</b></h4>
					<table class="table"><tbody><tr>
							<th class="col-md-4">
								金融機関区分
							</th>
							<td class="col-md-6">
								<?php echo $list[CONFIG_0011][$data[OBJECT_ID_030020280]] ?>
							</td>
						</tr>
<?php if (strcmp(BANK_TYPE_CODE_OTHER, $data[OBJECT_ID_040070280]) == 0) { ?>
						<tr><th class="col-md-4">金融機関名</th><td class="col-md-6"><?php echo $data[OBJECT_ID_030020290] ?></td></tr>
						<tr><th class="col-md-4">支店名</th><td class="col-md-6"><?php echo $data[OBJECT_ID_030020300] ?></td></tr>
<?php } ?>

						<tr>
							<th class="col-md-4">
								種目
							</th>
							<td class="col-md-6">
								<?php echo $list[CONFIG_0012][$data[OBJECT_ID_030020310]] ?>
							</td>
						</tr>

<?php if (strcmp(BANK_TYPE_CODE_YUCHO, $data[OBJECT_ID_040070280]) == 0) { ?>
						<tr>
							<th class="col-md-4">
								記号
							</th>
							<td class="col-md-6">
								<?php echo $data[OBJECT_ID_030020320] ?>
							</td>
						</tr>
<?php } ?>

						<tr>
							<th class="col-md-4">
								口座番号
							</th>
							<td class="col-md-6">
								<?php echo $data[OBJECT_ID_030020330] ?>
							</td>
						</tr>

						<tr>
							<th class="col-md-4">
								口座名義人
							</th>
							<td class="col-md-6">
								<?php echo $data[OBJECT_ID_030020340] ?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>



		<div class="row">
 
			<div class="col-md-2 col-md-offset-4 col-sm-3 col-sm-offset-3 col-xs-6">

				<input type="button" style="font-size:1.2em;" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" id="<?php echo OBJECT_ID_BTN000010 ?>" value="戻る"  onclick="buttonClick('<?php echo EVENT_ID_030030010 ?>');" tabindex="6">
			</div>
			<div class="col-md-2 col-sm-3 col-xs-6">
<input type="button" style="font-size:1.2em;" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" id="<?php echo OBJECT_ID_BTN000020 ?>" value="決定"  onclick="buttonClick('<?php echo EVENT_ID_030030020 ?>');" tabindex="7">
				<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
			</div>
		</div>

		<div class="row" style="margin-top:4em;">
			<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
				<span style="font-size:0.9em;">個人情報の提供・委託・開示などの請求に関する取扱いについては<a href="<?php echo URL_PRIVACY_PAGE ?>" target="_blank">「個人情報保護方針」</a>をご覧ください。</span>
			</div>
		</div>


		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-xs-12">
				<small style="margin-top: 80px;display: block;">当社では、企業の実在性の証明と個人情報の保護のため、<a href="https://www.geotrust.co.jp/" target="_blank">GeoTrust社</a>のSSLサーバ証明書を使用し、SSL暗号化通信を実現しています。</small>

			</div>
		</div>




		</form>
	</div>










	</div>
</div>
 <!--content end-->
