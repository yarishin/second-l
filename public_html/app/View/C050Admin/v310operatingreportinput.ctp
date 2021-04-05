<?php
$input_date_check   = "validate[required,custom[date]]";
$input_number_check = "validate[custom[onlyNumberMinus]]";
$tabindex           = 1;
$report_date        = is_null($data[OBJECT_ID_050310050]) || strcmp("", $data[OBJECT_ID_050310050]) == 0 ? "" : date(DATE_FORMAT, strtotime($data[OBJECT_ID_050310050]));
$remittance_date    = is_null($data[OBJECT_ID_050310060]) || strcmp("", $data[OBJECT_ID_050310060]) == 0 ? "" : date(DATE_FORMAT, strtotime($data[OBJECT_ID_050310060]));
$issue_date         = is_null($data[OBJECT_ID_050310070]) || strcmp("", $data[OBJECT_ID_050310070]) == 0 ? "" : date(DATE_FORMAT, strtotime($data[OBJECT_ID_050310070]));
?>

<?php $this->Html->css(    'validationEngine.jquery.css'             , array( 'inline' => false )); ?>
<?php $this->Html->script( 'jquery-1.8.2.min.js'                     , array( 'inline' => false )); ?>
<?php $this->Html->script( 'jquery.validationEngine.js'              , array( 'inline' => false )); ?>
<?php $this->Html->script( 'languages/jquery.validationEngine-ja.js' , array( 'inline' => false )); ?>
<?php $this->Html->script( 'jquery.common.js'                        , array( 'inline' => false )); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
}
function buttonClick2(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}

function setDateTime($obj, $flag) {
	if ("" == $obj.value) {
		if ($flag == 1) {
			$obj.value = "<?php echo date(DATE_FORMAT) ?>";
		}
		else if ($flag == 2) {
			$obj.value = "<?php echo date("Y") ?>";
		}
		else if ($flag == 3) {
			$obj.value = "<?php echo date("m") ?>";
		}
	}
}

$(document).ready(function() {
	$('#<?php echo OBJECT_ID_BTN000020 ?>').lockScreen();
	$('#<?php echo OBJECT_ID_BTN000030 ?>').lockScreen();
	$('#<?php echo OBJECT_ID_BTN000040 ?>').lockScreen();
	jQuery("#form").validationEngine();
});
<?php $this->Html->scriptEnd(); ?>

<style type="text/css">
#horizontal .text100_right {
	float : left;
}
</style>

<p>財産管理報告書(入力)</p>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000040 ?>" value="戻る"     onclick="buttonClick2('<?php echo EVENT_ID_050310040 ?>');">
		<input class="button" type="submit" id="<?php echo OBJECT_ID_BTN000010 ?>" value="確認"     onclick="buttonClick('<?php echo EVENT_ID_050310010 ?>');">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000020 ?>" value="一覧"     onclick="buttonClick2('<?php echo EVENT_ID_050310020 ?>');">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000030 ?>" value="メニュー" onclick="buttonClick2('<?php echo EVENT_ID_050310030 ?>');">
	</div>
	
	<div id="horizontal">
		<div id="label200">ファンドID</div>
		<div><input class="label100_center" type="text" name="<?php echo OBJECT_ID_050310010 ?>" id="<?php echo OBJECT_ID_050310010 ?>" value="<?php echo $data[OBJECT_ID_050310010] ?>" readonly></div>
	</div>
	<div id="horizontal">
		<div id="label200">ファンド名</div>
		<div><input class="label200" type="text" name="<?php echo OBJECT_ID_050310020 ?>" id="<?php echo OBJECT_ID_050310020 ?>" value="<?php echo $data[OBJECT_ID_050310020] ?>" readonly></div>
	</div>
	<div id="horizontal">
		<div id="label200">運用年月</div>
		<div id="v310_div50"><input type="text" name="<?php echo OBJECT_ID_050310030 ?>" id="<?php echo OBJECT_ID_050310030 ?>" value="<?php echo $data[OBJECT_ID_050310030] ?>" onclick="setDateTime(this, 2)" class="validate[required,custom[onlyNumber],min[1800],max[9999]]" tabindex="<?php echo $tabindex++ ?>"></div><div id="v310_div_other">/</div>
		<div id="v310_div25"><input type="text" name="<?php echo OBJECT_ID_050310040 ?>" id="<?php echo OBJECT_ID_050310040 ?>" value="<?php echo $data[OBJECT_ID_050310040] ?>" onclick="setDateTime(this, 3)" class="validate[required,custom[onlyNumber],min[1],max[12]]" tabindex="<?php echo $tabindex++ ?>"></div><div id="v310_div_other">YYYY/MM</div>
	</div>
	<div id="horizontal">
		<div id="label200">報告書作成日</div>
		<div id="v310_div100_2"><input type="text" name="<?php echo OBJECT_ID_050310050 ?>" id="<?php echo OBJECT_ID_050310050 ?>" value="<?php echo $report_date     ?>" onclick="setDateTime(this, 1)" class="<?php echo $input_date_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div><div id="v310_div_other">YYYY/MM/DD</div>
	</div>
	<div id="horizontal">
		<div id="label200">送金予定日</div>
		<div id="v310_div100_2"><input type="text" name="<?php echo OBJECT_ID_050310060 ?>" id="<?php echo OBJECT_ID_050310060 ?>" value="<?php echo $remittance_date ?>" onclick="setDateTime(this, 1)" class="<?php echo $input_date_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div><div id="v310_div_other">YYYY/MM/DD</div>
	</div>
	<div id="horizontal">
		<div id="label200">報告対象開始日</div>
		<div id="v310_div100_2"><input type="text" name="<?php echo OBJECT_ID_050310070 ?>" id="<?php echo OBJECT_ID_050310070 ?>" value="<?php echo $issue_date      ?>" onclick="setDateTime(this, 1)" class="<?php echo $input_date_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div><div id="v310_div_other">YYYY/MM/DD</div>
	</div>
	<div id="horizontal">
		<div id="label200">状態</div>
		<input class="label100_center" type="text" value="<?php echo $list[CONFIG_0061][$data[OBJECT_ID_050310080]] ?>" readonly>
		<input type="hidden" name="<?php echo OBJECT_ID_050310080 ?>" id="<?php echo OBJECT_ID_050310080 ?>" value="<?php echo $data[OBJECT_ID_050310080] ?>">
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
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310090 ?>" id="<?php echo OBJECT_ID_050310090 ?>" value="<?php echo $data[OBJECT_ID_050310090] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310480 ?>" id="<?php echo OBJECT_ID_050310480 ?>" value="<?php echo $data[OBJECT_ID_050310480] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310100 ?>" id="<?php echo OBJECT_ID_050310100 ?>" value="<?php echo $data[OBJECT_ID_050310100] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310490 ?>" id="<?php echo OBJECT_ID_050310490 ?>" value="<?php echo $data[OBJECT_ID_050310490] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310110 ?>" id="<?php echo OBJECT_ID_050310110 ?>" value="<?php echo $data[OBJECT_ID_050310110] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310500 ?>" id="<?php echo OBJECT_ID_050310500 ?>" value="<?php echo $data[OBJECT_ID_050310500] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310120 ?>" id="<?php echo OBJECT_ID_050310120 ?>" value="<?php echo $data[OBJECT_ID_050310120] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310510 ?>" id="<?php echo OBJECT_ID_050310510 ?>" value="<?php echo $data[OBJECT_ID_050310510] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310130 ?>" id="<?php echo OBJECT_ID_050310130 ?>" value="<?php echo $data[OBJECT_ID_050310130] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310520 ?>" id="<?php echo OBJECT_ID_050310520 ?>" value="<?php echo $data[OBJECT_ID_050310520] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310140 ?>" id="<?php echo OBJECT_ID_050310140 ?>" value="<?php echo $data[OBJECT_ID_050310140] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310530 ?>" id="<?php echo OBJECT_ID_050310530 ?>" value="<?php echo $data[OBJECT_ID_050310530] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310150 ?>" id="<?php echo OBJECT_ID_050310150 ?>" value="<?php echo $data[OBJECT_ID_050310150] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310540 ?>" id="<?php echo OBJECT_ID_050310540 ?>" value="<?php echo $data[OBJECT_ID_050310540] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310160 ?>" id="<?php echo OBJECT_ID_050310160 ?>" value="<?php echo $data[OBJECT_ID_050310160] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310550 ?>" id="<?php echo OBJECT_ID_050310550 ?>" value="<?php echo $data[OBJECT_ID_050310550] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310170 ?>" id="<?php echo OBJECT_ID_050310170 ?>" value="<?php echo $data[OBJECT_ID_050310170] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310560 ?>" id="<?php echo OBJECT_ID_050310560 ?>" value="<?php echo $data[OBJECT_ID_050310560] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310180 ?>" id="<?php echo OBJECT_ID_050310180 ?>" value="<?php echo $data[OBJECT_ID_050310180] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310570 ?>" id="<?php echo OBJECT_ID_050310570 ?>" value="<?php echo $data[OBJECT_ID_050310570] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310190 ?>" id="<?php echo OBJECT_ID_050310190 ?>" value="<?php echo $data[OBJECT_ID_050310190] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310580 ?>" id="<?php echo OBJECT_ID_050310580 ?>" value="<?php echo $data[OBJECT_ID_050310580] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310200 ?>" id="<?php echo OBJECT_ID_050310200 ?>" value="<?php echo $data[OBJECT_ID_050310200] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310590 ?>" id="<?php echo OBJECT_ID_050310590 ?>" value="<?php echo $data[OBJECT_ID_050310590] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310210 ?>" id="<?php echo OBJECT_ID_050310210 ?>" value="<?php echo $data[OBJECT_ID_050310210] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310600 ?>" id="<?php echo OBJECT_ID_050310600 ?>" value="<?php echo $data[OBJECT_ID_050310600] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="label200">資産合計</div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310450 ?>" id="<?php echo OBJECT_ID_050310450 ?>" value="<?php echo $data[OBJECT_ID_050310450] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
	</div>
	<div id="form_block">
		<div id="horizontal">
			<div id="label200">負債の部</div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310220 ?>" id="<?php echo OBJECT_ID_050310220 ?>" value="<?php echo $data[OBJECT_ID_050310220] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310610 ?>" id="<?php echo OBJECT_ID_050310610 ?>" value="<?php echo $data[OBJECT_ID_050310610] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310230 ?>" id="<?php echo OBJECT_ID_050310230 ?>" value="<?php echo $data[OBJECT_ID_050310230] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310620 ?>" id="<?php echo OBJECT_ID_050310620 ?>" value="<?php echo $data[OBJECT_ID_050310620] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310240 ?>" id="<?php echo OBJECT_ID_050310240 ?>" value="<?php echo $data[OBJECT_ID_050310240] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310630 ?>" id="<?php echo OBJECT_ID_050310630 ?>" value="<?php echo $data[OBJECT_ID_050310630] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310250 ?>" id="<?php echo OBJECT_ID_050310250 ?>" value="<?php echo $data[OBJECT_ID_050310250] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310640 ?>" id="<?php echo OBJECT_ID_050310640 ?>" value="<?php echo $data[OBJECT_ID_050310640] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310260 ?>" id="<?php echo OBJECT_ID_050310260 ?>" value="<?php echo $data[OBJECT_ID_050310260] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310650 ?>" id="<?php echo OBJECT_ID_050310650 ?>" value="<?php echo $data[OBJECT_ID_050310650] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310270 ?>" id="<?php echo OBJECT_ID_050310270 ?>" value="<?php echo $data[OBJECT_ID_050310270] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310660 ?>" id="<?php echo OBJECT_ID_050310660 ?>" value="<?php echo $data[OBJECT_ID_050310660] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="label200">純資産の部</div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310280 ?>" id="<?php echo OBJECT_ID_050310280 ?>" value="<?php echo $data[OBJECT_ID_050310280] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310670 ?>" id="<?php echo OBJECT_ID_050310670 ?>" value="<?php echo $data[OBJECT_ID_050310670] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310290 ?>" id="<?php echo OBJECT_ID_050310290 ?>" value="<?php echo $data[OBJECT_ID_050310290] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310680 ?>" id="<?php echo OBJECT_ID_050310680 ?>" value="<?php echo $data[OBJECT_ID_050310680] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310300 ?>" id="<?php echo OBJECT_ID_050310300 ?>" value="<?php echo $data[OBJECT_ID_050310300] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310690 ?>" id="<?php echo OBJECT_ID_050310690 ?>" value="<?php echo $data[OBJECT_ID_050310690] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310310 ?>" id="<?php echo OBJECT_ID_050310310 ?>" value="<?php echo $data[OBJECT_ID_050310310] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310700 ?>" id="<?php echo OBJECT_ID_050310700 ?>" value="<?php echo $data[OBJECT_ID_050310700] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310320 ?>" id="<?php echo OBJECT_ID_050310320 ?>" value="<?php echo $data[OBJECT_ID_050310320] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310710 ?>" id="<?php echo OBJECT_ID_050310710 ?>" value="<?php echo $data[OBJECT_ID_050310710] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310330 ?>" id="<?php echo OBJECT_ID_050310330 ?>" value="<?php echo $data[OBJECT_ID_050310330] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310720 ?>" id="<?php echo OBJECT_ID_050310720 ?>" value="<?php echo $data[OBJECT_ID_050310720] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="label200">負債及び純資産合計</div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310460 ?>" id="<?php echo OBJECT_ID_050310460 ?>" value="<?php echo $data[OBJECT_ID_050310460] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
	</div>
	<hr width="750px" align="left" style="border:0;border-bottom:2px dashed;">
	<div id="form_block_both">
		<div id="horizontal">
				<div id="label200">1口あたり純資産額</div>
				<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310470 ?>" id="<?php echo OBJECT_ID_050310470 ?>" value="<?php echo $data[OBJECT_ID_050310470] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
	</div>-->
	<!--<hr width="750px" align="left" style="border:0;border-bottom:medium double;">
	<div id="form_block_both">
		<div id="horizontal">
			<div id="label200">【損益計算書】</div>
		</div>
	</div>
	<div id="form_block_both">
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310340 ?>" id="<?php echo OBJECT_ID_050310340 ?>" value="<?php echo $data[OBJECT_ID_050310340] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310730 ?>" id="<?php echo OBJECT_ID_050310730 ?>" value="<?php echo $data[OBJECT_ID_050310730] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310350 ?>" id="<?php echo OBJECT_ID_050310350 ?>" value="<?php echo $data[OBJECT_ID_050310350] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310740 ?>" id="<?php echo OBJECT_ID_050310740 ?>" value="<?php echo $data[OBJECT_ID_050310740] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310360 ?>" id="<?php echo OBJECT_ID_050310360 ?>" value="<?php echo $data[OBJECT_ID_050310360] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310750 ?>" id="<?php echo OBJECT_ID_050310750 ?>" value="<?php echo $data[OBJECT_ID_050310750] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310370 ?>" id="<?php echo OBJECT_ID_050310370 ?>" value="<?php echo $data[OBJECT_ID_050310370] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310760 ?>" id="<?php echo OBJECT_ID_050310760 ?>" value="<?php echo $data[OBJECT_ID_050310760] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310380 ?>" id="<?php echo OBJECT_ID_050310380 ?>" value="<?php echo $data[OBJECT_ID_050310380] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310770 ?>" id="<?php echo OBJECT_ID_050310770 ?>" value="<?php echo $data[OBJECT_ID_050310770] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310390 ?>" id="<?php echo OBJECT_ID_050310390 ?>" value="<?php echo $data[OBJECT_ID_050310390] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310780 ?>" id="<?php echo OBJECT_ID_050310780 ?>" value="<?php echo $data[OBJECT_ID_050310780] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310400 ?>" id="<?php echo OBJECT_ID_050310400 ?>" value="<?php echo $data[OBJECT_ID_050310400] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310790 ?>" id="<?php echo OBJECT_ID_050310790 ?>" value="<?php echo $data[OBJECT_ID_050310790] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310410 ?>" id="<?php echo OBJECT_ID_050310410 ?>" value="<?php echo $data[OBJECT_ID_050310410] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310800 ?>" id="<?php echo OBJECT_ID_050310800 ?>" value="<?php echo $data[OBJECT_ID_050310800] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310420 ?>" id="<?php echo OBJECT_ID_050310420 ?>" value="<?php echo $data[OBJECT_ID_050310420] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310810 ?>" id="<?php echo OBJECT_ID_050310810 ?>" value="<?php echo $data[OBJECT_ID_050310810] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310430 ?>" id="<?php echo OBJECT_ID_050310430 ?>" value="<?php echo $data[OBJECT_ID_050310430] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310820 ?>" id="<?php echo OBJECT_ID_050310820 ?>" value="<?php echo $data[OBJECT_ID_050310820] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
		</div>
		<div id="horizontal">
			<div id="v310_div200"><input type="text" name="<?php echo OBJECT_ID_050310440 ?>" id="<?php echo OBJECT_ID_050310440 ?>" value="<?php echo $data[OBJECT_ID_050310440] ?>" tabindex="<?php echo $tabindex++ ?>"></div>
			<div id="v310_div100"><input type="text" name="<?php echo OBJECT_ID_050310830 ?>" id="<?php echo OBJECT_ID_050310830 ?>" value="<?php echo $data[OBJECT_ID_050310830] ?>" class="<?php echo $input_number_check; ?>" tabindex="<?php echo $tabindex++ ?>"></div>
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
		$keiyakubi = is_null($data[OBJECT_ID_050310850.$count]) || strcmp("", $data[OBJECT_ID_050310850.$count]) == 0 ? "" : date(DATE_FORMAT, strtotime($data[OBJECT_ID_050310850.$count]));
		$hensaibi  = is_null($data[OBJECT_ID_050310860.$count]) || strcmp("", $data[OBJECT_ID_050310860.$count]) == 0 ? "" : date(DATE_FORMAT, strtotime($data[OBJECT_ID_050310860.$count]));
?>
	<!--<div id="horizontal">
		<div class="label100_center"><?php echo $data[OBJECT_ID_050310840.$count] ?></div>
		<div class="text100_right"><input type="text" name="<?php echo OBJECT_ID_050310850.$count ?>" id="<?php echo OBJECT_ID_050310850.$count ?>" value="<?php echo $keiyakubi ?>" class="<?php echo $input_date_check; ?>"></div>
		<div class="text100_right"><input type="text" name="<?php echo OBJECT_ID_050310860.$count ?>" id="<?php echo OBJECT_ID_050310860.$count ?>" value="<?php echo $hensaibi  ?>" class="validate[custom[date]]"></div>
		<div class="text100_right"><input type="text" name="<?php echo OBJECT_ID_050310870.$count ?>" id="<?php echo OBJECT_ID_050310870.$count ?>" value="<?php echo $data[OBJECT_ID_050310870.$count] ?>" class="validate[custom[onlyNumber]]"></div>
		<div class="text100_right"><input type="text" name="<?php echo OBJECT_ID_050310880.$count ?>" id="<?php echo OBJECT_ID_050310880.$count ?>" value="<?php echo $data[OBJECT_ID_050310880.$count] ?>" class="validate[custom[onlyNumber]]"></div>
		<div class="text100_right"><input type="text" name="<?php echo OBJECT_ID_050310890.$count ?>" id="<?php echo OBJECT_ID_050310890.$count ?>" value="<?php echo $data[OBJECT_ID_050310890.$count] ?>" class="validate[custom[onlyNumber]]"></div>
		<input type="hidden" name="<?php echo HIDDEN_ID_000000130.$count ?>" id="<?php echo HIDDEN_ID_000000130.$count ?>" value="<?php echo $data[HIDDEN_ID_000000130.$count] ?>">
		<input type="hidden" name="<?php echo OBJECT_ID_050310840.$count ?>" id="<?php echo OBJECT_ID_050310840.$count ?>" value="<?php echo $data[OBJECT_ID_050310840.$count] ?>">
	</div>-->
<?php 
		$count++;
	}
?>
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
	<input type="hidden" id="<?php echo HIDDEN_ID_000000170 ?>" name="<?php echo HIDDEN_ID_000000170 ?>" value="<?php echo $data[HIDDEN_ID_000000170] ?>">
</form> 

