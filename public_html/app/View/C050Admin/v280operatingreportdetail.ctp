<?php $this->Html->script( 'jquery-1.8.2.min.js'                    , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.common.js'                       , array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}

$(document).ready(function() {
	$('#<?php echo OBJECT_ID_BTN000010 ?>').lockScreen();
	$('#<?php echo OBJECT_ID_BTN000020 ?>').lockScreen();
	$('#<?php echo OBJECT_ID_BTN000030 ?>').lockScreen();
	$('#<?php echo OBJECT_ID_BTN000040 ?>').lockScreen();
});
<?php $this->Html->scriptEnd(); ?>

<style type="text/css">
	#horizontal #v310_div200 {
		border-bottom : 1px solid gray;
		text-align    : left;
	}
	#horizontal #v310_div100 {
		border-bottom : 1px solid gray;
		text-align    : right;
	}
	#horizontal #label200 {
		margin-bottom: 1px;
	}
</style>

<p>財産管理報告書(照会)</p>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000010 ?>" value="戻る"     onclick="buttonClick('<?php echo EVENT_ID_050280010 ?>');" tabindex="1">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000020 ?>" value="修正"     onclick="buttonClick('<?php echo EVENT_ID_050280020 ?>');" tabindex="2">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000030 ?>" value="一覧"     onclick="buttonClick('<?php echo EVENT_ID_050280030 ?>');" tabindex="3">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000040 ?>" value="メニュー" onclick="buttonClick('<?php echo EVENT_ID_050280040 ?>');" tabindex="4">
	</div><br>
	<div id="horizontal">
		<div id="label200">ファンドID</div>
		<div class="label100_center"><?php echo $data[OBJECT_ID_050310010] ?></div>
	</div>
	<div id="horizontal">
		<div id="label200">ファンド名</div>
		<div class="label300"><?php echo $data[OBJECT_ID_050310020] ?></div>
	</div>
	<div id="horizontal">
		<div id="label200">運用年月</div>
		<div class="label100_center"><?php echo $data[OBJECT_ID_050310030]."/".sprintf("%02d", $data[OBJECT_ID_050310040]) ?></div>
	</div>
	<div id="horizontal">
		<div id="label200">報告書作成日</div>
		<div class="label100_center"><?php echo date(DATE_FORMAT, strtotime($data[OBJECT_ID_050310050])) ?></div>
	</div>
	<div id="horizontal">
		<div id="label200">送金予定日</div>
		<div class="label100_center"><?php echo date(DATE_FORMAT, strtotime($data[OBJECT_ID_050310060])) ?></div>
	</div>
	<div id="horizontal">
		<div id="label200">公開予定日</div>
		<div class="label100_center"><?php echo date(DATE_FORMAT, strtotime($data[OBJECT_ID_050310070])) ?></div>
	</div>
	<div id="horizontal">
		<div id="label200">状態</div>
		<div class="label100_center"><?php echo $list[CONFIG_0061][$data[OBJECT_ID_050310080]] ?></div>
	</div>
	<!--<hr width="750px" align="left" style="border:0;border-bottom:medium double;">
	<div id="form_block_both">
		<div id="horizontal">
			<div id="label200">【貸借対照表】</div>
		</div>
	</div>
	<div id="form_block">
		<div id="horizontal">
			<div id="label200">資産の部</div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310090]) || strcmp("", $data[OBJECT_ID_050310090]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310090] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310480]) || strcmp("", $data[OBJECT_ID_050310480]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310480]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310100]) || strcmp("", $data[OBJECT_ID_050310100]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310100] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310490]) || strcmp("", $data[OBJECT_ID_050310490]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310490]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310110]) || strcmp("", $data[OBJECT_ID_050310110]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310110] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310500]) || strcmp("", $data[OBJECT_ID_050310500]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310500]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310120]) || strcmp("", $data[OBJECT_ID_050310120]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310120] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310510]) || strcmp("", $data[OBJECT_ID_050310510]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310510]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310130]) || strcmp("", $data[OBJECT_ID_050310130]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310130] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310520]) || strcmp("", $data[OBJECT_ID_050310520]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310520]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310140]) || strcmp("", $data[OBJECT_ID_050310140]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310140] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310530]) || strcmp("", $data[OBJECT_ID_050310530]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310530]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310150]) || strcmp("", $data[OBJECT_ID_050310150]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310150] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310540]) || strcmp("", $data[OBJECT_ID_050310540]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310540]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310160]) || strcmp("", $data[OBJECT_ID_050310160]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310160] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310550]) || strcmp("", $data[OBJECT_ID_050310550]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310550]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310170]) || strcmp("", $data[OBJECT_ID_050310170]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310170] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310560]) || strcmp("", $data[OBJECT_ID_050310560]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310560]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310180]) || strcmp("", $data[OBJECT_ID_050310180]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310180] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310570]) || strcmp("", $data[OBJECT_ID_050310570]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310570]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310190]) || strcmp("", $data[OBJECT_ID_050310190]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310190] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310580]) || strcmp("", $data[OBJECT_ID_050310580]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310580]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310200]) || strcmp("", $data[OBJECT_ID_050310200]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310200] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310590]) || strcmp("", $data[OBJECT_ID_050310590]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310590]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310210]) || strcmp("", $data[OBJECT_ID_050310210]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310210] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310600]) || strcmp("", $data[OBJECT_ID_050310600]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310600]) ?></div>
		</div>
		<div id="horizontal">
			<div id="label200">資産合計</div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310450]) || strcmp("", $data[OBJECT_ID_050310450]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310450]) ?></div>
		</div>
	</div>
	<div id="form_block">
		<div id="horizontal">
			<div id="label200">負債の部</div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310220]) || strcmp("", $data[OBJECT_ID_050310220]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310220] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310610]) || strcmp("", $data[OBJECT_ID_050310610]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310610]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310230]) || strcmp("", $data[OBJECT_ID_050310230]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310230] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310620]) || strcmp("", $data[OBJECT_ID_050310620]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310620]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310240]) || strcmp("", $data[OBJECT_ID_050310240]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310240] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310630]) || strcmp("", $data[OBJECT_ID_050310630]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310630]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310250]) || strcmp("", $data[OBJECT_ID_050310250]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310250] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310640]) || strcmp("", $data[OBJECT_ID_050310640]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310640]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310260]) || strcmp("", $data[OBJECT_ID_050310260]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310260] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310650]) || strcmp("", $data[OBJECT_ID_050310650]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310650]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310270]) || strcmp("", $data[OBJECT_ID_050310270]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310270] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310660]) || strcmp("", $data[OBJECT_ID_050310660]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310660]) ?></div>
		</div>
		<div id="horizontal">
			<div id="label200">純資産の部</div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310280]) || strcmp("", $data[OBJECT_ID_050310280]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310280] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310670]) || strcmp("", $data[OBJECT_ID_050310670]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310670]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310290]) || strcmp("", $data[OBJECT_ID_050310290]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310290] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310680]) || strcmp("", $data[OBJECT_ID_050310680]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310680]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310300]) || strcmp("", $data[OBJECT_ID_050310300]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310300] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310690]) || strcmp("", $data[OBJECT_ID_050310690]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310690]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310310]) || strcmp("", $data[OBJECT_ID_050310310]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310310] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310700]) || strcmp("", $data[OBJECT_ID_050310700]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310700]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310320]) || strcmp("", $data[OBJECT_ID_050310320]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310320] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310710]) || strcmp("", $data[OBJECT_ID_050310710]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310710]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310330]) || strcmp("", $data[OBJECT_ID_050310330]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310330] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310720]) || strcmp("", $data[OBJECT_ID_050310720]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310720]) ?></div>
		</div>
		<div id="horizontal">
			<div id="label200">負債及び純資産合計</div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310460]) || strcmp("", $data[OBJECT_ID_050310460]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310460]) ?></div>
		</div>
	</div>-->
	<!--<hr width="750px" align="left" style="border:0;border-bottom:2px dashed;">
	<div id="form_block_both">
		<div id="horizontal">
			<div id="label200">1口あたり純資産額</div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310470]) || strcmp("", $data[OBJECT_ID_050310470]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310470]) ?></div>
		</div>
	</div>
	<hr width="750px" align="left" style="border:0;border-bottom:medium double;">
	<div id="form_block_both">
		<div id="horizontal">
			<div id="label200">【損益計算書】</div>
		</div>
	</div>
	<div id="form_block_both">
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310340]) || strcmp("", $data[OBJECT_ID_050310340]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310340] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310730]) || strcmp("", $data[OBJECT_ID_050310730]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310730]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310350]) || strcmp("", $data[OBJECT_ID_050310350]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310350] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310740]) || strcmp("", $data[OBJECT_ID_050310740]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310740]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310360]) || strcmp("", $data[OBJECT_ID_050310360]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310360] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310750]) || strcmp("", $data[OBJECT_ID_050310750]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310750]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310370]) || strcmp("", $data[OBJECT_ID_050310370]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310370] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310760]) || strcmp("", $data[OBJECT_ID_050310760]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310760]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310380]) || strcmp("", $data[OBJECT_ID_050310380]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310380] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310770]) || strcmp("", $data[OBJECT_ID_050310770]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310770]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310390]) || strcmp("", $data[OBJECT_ID_050310390]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310390] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310780]) || strcmp("", $data[OBJECT_ID_050310780]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310780]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310400]) || strcmp("", $data[OBJECT_ID_050310400]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310400] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310790]) || strcmp("", $data[OBJECT_ID_050310790]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310790]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310410]) || strcmp("", $data[OBJECT_ID_050310410]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310410] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310800]) || strcmp("", $data[OBJECT_ID_050310800]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310800]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310420]) || strcmp("", $data[OBJECT_ID_050310420]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310420] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310810]) || strcmp("", $data[OBJECT_ID_050310810]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310810]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310430]) || strcmp("", $data[OBJECT_ID_050310430]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310430] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310820]) || strcmp("", $data[OBJECT_ID_050310820]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310820]) ?></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><?php echo is_null($data[OBJECT_ID_050310440]) || strcmp("", $data[OBJECT_ID_050310440]) == 0 ? HTML_HALF_WIDTH_SPACE : $data[OBJECT_ID_050310440] ?></div>
			<div id="v310_div100"><?php echo is_null($data[OBJECT_ID_050310830]) || strcmp("", $data[OBJECT_ID_050310830]) == 0 ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310830]) ?></div>
		</div>
	</div>-->
	<!--<hr width="750px" align="left" style="border:0;border-bottom:medium double;">
	<div id="form_block_both">
		<div id="horizontal">
			<div id="label200">【出資毎データ】</div>
		</div>
	</div>
	<div id="horizontal">
		<div class="label100_center">出資番号</div>
		<div class="label100_center">契約日</div>
		<div class="label100_center">償還日</div>
		<div class="label100_center">償還額</div>
		<div class="label100_center">償還金</div>
		<div class="label100_center">利息等</div>
	</div>-->
<?php
	$count = 0;
	while(isset($data[OBJECT_ID_050310840.$count])) {
?>
	<!--<div id="horizontal">
		<div class="label100_center"><?php echo $data[OBJECT_ID_050310840.$count] ?></div>
		<div class="label100_center"><?php echo is_null($data[OBJECT_ID_050310850.$count]) ? HTML_HALF_WIDTH_SPACE : date(DATE_FORMAT, strtotime($data[OBJECT_ID_050310850.$count])) ?></div>
		<div class="label100_center"><?php echo is_null($data[OBJECT_ID_050310860.$count]) ? HTML_HALF_WIDTH_SPACE : date(DATE_FORMAT, strtotime($data[OBJECT_ID_050310860.$count])) ?></div>
		<div class="label100_right"><?php  echo is_null($data[OBJECT_ID_050310870.$count]) ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310870.$count]) ?></div>
		<div class="label100_right"><?php  echo is_null($data[OBJECT_ID_050310880.$count]) ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310880.$count]) ?></div>
		<div class="label100_right"><?php  echo is_null($data[OBJECT_ID_050310890.$count]) ? HTML_HALF_WIDTH_SPACE : number_format($data[OBJECT_ID_050310890.$count]) ?></div>
	</div>-->
<?php 
		$count++;
	}
?>
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
	<input type="hidden" id="<?php echo HIDDEN_ID_000000170 ?>" name="<?php echo HIDDEN_ID_000000170 ?>" value="<?php echo $data[HIDDEN_ID_000000170] ?>">
</form>

