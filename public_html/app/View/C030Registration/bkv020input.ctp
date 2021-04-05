<?php $this->Html->css(    'validationEngine.jquery.css'             , array( 'inline' => false )); ?>
<?php $this->Html->script( 'jquery-1.8.2.min.js'                     , array( 'inline' => false )); ?>
<?php $this->Html->script( 'jquery.validationEngine.js'              , array( 'inline' => false )); ?>
<?php $this->Html->script( 'languages/jquery.validationEngine-ja.js' , array( 'inline' => false )); ?>
<?php $this->Html->script( 'jquery.common.js'    , array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
}
function bankTypeChange() {
	if (<?php echo BANK_TYPE_CODE_YUCHO ?> ==document.getElementById('<?php echo OBJECT_ID_030020280 ?>').value) {
		document.getElementById('hidden_item_1').style.display = "none";
		document.getElementById('hidden_item_2').style.display = "";
		document.getElementById('<?php echo OBJECT_ID_030020290 ?>').value = "";
	}
	else if (<?php echo BANK_TYPE_CODE_OTHER ?> ==document.getElementById('<?php echo OBJECT_ID_030020280 ?>').value) {
		document.getElementById('hidden_item_1').style.display = "";
		document.getElementById('hidden_item_2').style.display = "none";
		document.getElementById('<?php echo OBJECT_ID_030020320 ?>').value = "";
	}
	else {
		document.getElementById('hidden_item_1').style.display = "";
		document.getElementById('hidden_item_2').style.display = "";
	}
}
function occupationChange() {
	if (<?php echo OCCUPATION_CODE_12 ?> >= document.getElementById('<?php echo OBJECT_ID_030020220 ?>').value) {
		document.getElementById('hidden_item_3').style.display = "";
		document.getElementById('hidden_item_4').style.display = "";
		document.getElementById('hidden_item_5').style.display = "";
		document.getElementById('hidden_item_6').style.display = "";
	}
	else if (<?php echo OCCUPATION_CODE_12 ?> < document.getElementById('<?php echo OBJECT_ID_030020220 ?>').value) {
		document.getElementById('hidden_item_3').style.display = "none";
		document.getElementById('hidden_item_4').style.display = "none";
		document.getElementById('hidden_item_5').style.display = "none";
		document.getElementById('hidden_item_6').style.display = "none";
		document.getElementById('<?php echo OBJECT_ID_030020230 ?>').value = "";
		document.getElementById('<?php echo OBJECT_ID_030020250 ?>').value = "";
		document.getElementById('<?php echo OBJECT_ID_030020260 ?>').value = "";
		document.getElementById('<?php echo OBJECT_ID_030020270 ?>').value = "";
	}
	else {
		document.getElementById('hidden_item_3').style.display = "";
		document.getElementById('hidden_item_4').style.display = "";
		document.getElementById('hidden_item_5').style.display = "";
		document.getElementById('hidden_item_6').style.display = "";
	}
}
function bodyOnload() {
	bankTypeChange();
	occupationChange();
}
jQuery(document).ready(function(){
   jQuery("#form").validationEngine();
});
<?php $this->Html->scriptEnd(); ?>


<div id="header_under">
	<div id="breadcrumb-area"><a href='<?php echo URL_SITE_TOP ?>'>HOME</a> > <a href='<?php echo URL_REGISTRATION_PAGE ?>'>新規会員登録</a> > 投資家登録（入力）</div>
</div>


<div id="content">
    <div id="page-title">投資家登録（入力）</div>
    <div id="registration-flow-img"><img src="../img/progress2.jpg" alt="投資家登録の流れ図"></div>


<?php
if (isset($validation_errors) && is_array($validation_errors)) {
	foreach ($validation_errors as $key => $values) {
		echo '<p class="error" id="error_c030v020">'.$values.'</p>';
	}
}
?>


	<div id="hon_form">
		<form id="form" name="form" method="post" action="<?php echo $action ?>">

			<div class="hon_form_1"> <!--基本情報-->
				<div class="v020_title"><strong>＜お客様情報＞</strong></div>
				<div class="hon_form_title">お客様の基本情報</div>
				<div id="horizontal4" style="border-top: 1px solid #cccccc;">
					<div id="label300">氏名（漢字）<small>【全角】</small></div>
					<div class="hon_form_input_area">
						（姓）<input type="text" name="<?php echo OBJECT_ID_030020010 ?>" id="<?php echo OBJECT_ID_030020010 ?>" value="<?php echo $data[OBJECT_ID_030020010] ?>" class="validate[required,custom[onlyEm],maxSize[10]]" tabindex="1">
						（名）<input type="text" name="<?php echo OBJECT_ID_030020020 ?>" id="<?php echo OBJECT_ID_030020020 ?>" value="<?php echo $data[OBJECT_ID_030020020] ?>" class="validate[required,custom[onlyEm],maxSize[10]]" tabindex="2">
					</div>
				</div>

				<div id="horizontal4">
					<div id="label300">氏名（フリガナ）<small>【全角】</small></div>
					<div class="hon_form_input_area">
						（姓）<input type="text" name="<?php echo OBJECT_ID_030020030 ?>" id="<?php echo OBJECT_ID_030020030 ?>" value="<?php echo $data[OBJECT_ID_030020030] ?>" class="validate[required,custom[onlyEmKana],maxSize[15]]" tabindex="3">
						（名）<input type="text" name="<?php echo OBJECT_ID_030020040 ?>" id="<?php echo OBJECT_ID_030020040 ?>" value="<?php echo $data[OBJECT_ID_030020040] ?>" class="validate[required,custom[onlyEmKana],maxSize[15]]" tabindex="4">
					</div>
				</div>
				
				<div id="horizontal4">
					<div id="label300">性別</div>
					<div class="hon_form_input_area">
						<select id="<?php echo OBJECT_ID_030020050 ?>" name="<?php echo OBJECT_ID_030020050 ?>" class="validate[required]" tabindex="5">
						<?php foreach($list[CONFIG_0023] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020050] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>

				<div id="horizontal4">
					<div id="label300">生年月日(西暦)<small>【半角】</small></div>
					<div class="hon_form_input_area">
						<input type="text" style="width:50px;" name="<?php echo OBJECT_ID_030020060 ?>" id="<?php echo OBJECT_ID_030020060 ?>" value="<?php echo $data[OBJECT_ID_030020060] ?>" class="validate[required,custom[onlyNumberSp],min[1800],max[9999]]" tabindex="6">
						<span>年</span>

						<select id="<?php echo OBJECT_ID_030020070 ?>" name="<?php echo OBJECT_ID_030020070 ?>" class="validate[required]" tabindex="7">
						<?php foreach($list[CONFIG_0038] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020070] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
						</select>
						<span>月</span>

						<select id="<?php echo OBJECT_ID_030020080 ?>" name="<?php echo OBJECT_ID_030020080 ?>" class="validate[required,date3fields[<?php echo OBJECT_ID_030020060 ?>,<?php echo OBJECT_ID_030020070 ?>,<?php echo OBJECT_ID_030020080 ?>]]" tabindex="8">
						<?php foreach($list[CONFIG_0039] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020080] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
						</select>
						<span>日</span>
					</div>
				</div>

				<div id="horizontal4">
					<div id="label300">郵便番号（ハイフンなし）<small>【半角】</small></div>
					<div class="hon_form_input_area">
						<input type="text" name="<?php echo OBJECT_ID_030020090 ?>" id="<?php echo OBJECT_ID_030020090 ?>" value="<?php echo $data[OBJECT_ID_030020090] ?>" class="validate[required,custom[size7]]" tabindex="9">
					</div>
				</div>
				<div id="horizontal4">
					<div id="label300">都道府県</div>
					<div class="hon_form_input_area">
						<select id="<?php echo OBJECT_ID_030020100 ?>" name="<?php echo OBJECT_ID_030020100 ?>" class="validate[required]" tabindex="10">
						<?php foreach($list[CONFIG_0021] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020100] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div id="horizontal4">
					<div id="label300">市区町村丁目番地<small>【全角】</small></div>
					<div class="hon_form_input_area">
						<input type="text" style="width:500px;" name="<?php echo OBJECT_ID_030020110 ?>" id="<?php echo OBJECT_ID_030020110 ?>" value="<?php echo $data[OBJECT_ID_030020110] ?>" class="validate[required,custom[onlyEm],maxSize[40]]" tabindex="11">
					</div>
				</div>
				<div id="horizontal4">
					<div id="label300">建物名<small>【全角】</small></div>
					<div class="hon_form_input_area">
						<input type="text" style="width:500px;" name="<?php echo OBJECT_ID_030020120 ?>" id="<?php echo OBJECT_ID_030020120 ?>" value="<?php echo $data[OBJECT_ID_030020120] ?>" class="validate[custom[onlyEm],maxSize[40]]" tabindex="12">
					</div>
				</div>
				<div id="horizontal4">
					<div id="label300">固定電話(ハイフン有り)<small>【半角】</small></div>
					<div class="hon_form_input_area">
						<input type="text" name="<?php echo OBJECT_ID_030020130 ?>" id="<?php echo OBJECT_ID_030020130 ?>" value="<?php echo $data[OBJECT_ID_030020130] ?>" class="validate[requiredFixedLinePhone[<?php echo OBJECT_ID_030020140 ?>],custom[phone],maxSize[12]]" tabindex="13"><small>例）03-1234-5678</small>
					</div>
				</div>
				<div id="horizontal4">
					<div id="label300">携帯電話(ハイフン有り)<small>【半角】</small></div>
					<div class="hon_form_input_area">
						<input type="text" name="<?php echo OBJECT_ID_030020140 ?>" id="<?php echo OBJECT_ID_030020140 ?>" value="<?php echo $data[OBJECT_ID_030020140] ?>" class="validate[requiredMobilePhone[<?php echo OBJECT_ID_030020130 ?>],custom[phone],maxSize[13]]" tabindex="14"><small>例）090-1234-5678</small>
					</div>
				</div>
				<div id="horizontal4">
					<div id="label300">住居の状況</div>
					<div class="hon_form_input_area">
						<select id="<?php echo OBJECT_ID_030020150 ?>" name="<?php echo OBJECT_ID_030020150 ?>" class="validate[required]" tabindex="15">
						<?php foreach($list[CONFIG_0002] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020150] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div id="horizontal4">
					<div id="label300">家族構成</div>
					<div class="hon_form_input_area">
						<select id="<?php echo OBJECT_ID_030020160 ?>" name="<?php echo OBJECT_ID_030020160 ?>" class="validate[required]" tabindex="16">
						<?php foreach($list[CONFIG_0003] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020160] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				
				<div class="v020_hspace"></div>
				
				<div class="hon_form_title">ご職業・勤務先情報</div>
				<div id="horizontal4" style="border-top: 1px solid #cccccc;">
					<div id="label300">ご職業</div>
					<div class="hon_form_input_area">
						<select id="<?php echo OBJECT_ID_030020220 ?>" name="<?php echo OBJECT_ID_030020220 ?>" class="validate[required]" onchange="occupationChange();" tabindex="17">
						<?php foreach($list[CONFIG_0009] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020220] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div id="hidden_item_3">
					<div id="horizontal4">
						<div id="label300">勤務先名<small>【全角】</small></div>
						<div class="hon_form_input_area">
							<input type="text" style="width:500px;" name="<?php echo OBJECT_ID_030020230 ?>" id="<?php echo OBJECT_ID_030020230 ?>" value="<?php echo $data[OBJECT_ID_030020230] ?>" class="validate[requiredOfficeData[<?php echo OBJECT_ID_030020220 ?>,<?php echo OCCUPATION_CODE_12 ?>],custom[onlyEm],maxSize[30]]" tabindex="18">
						</div>
					</div>
				</div>
				<div id="horizontal4">
					<div id="label300">年収</div>
					<div class="hon_form_input_area">
						<select id="<?php echo OBJECT_ID_030020240 ?>" name="<?php echo OBJECT_ID_030020240 ?>" class="validate[required]" tabindex="19">
						<?php foreach($list[CONFIG_0010] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020240] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div id="hidden_item_4">
					<div id="horizontal4">
						<div id="label300">勤務先郵便番号(ハイフンなし)<small>【半角】</small></div>
						<div class="hon_form_input_area">
							<input type="text" name="<?php echo OBJECT_ID_030020250 ?>" id="<?php echo OBJECT_ID_030020250 ?>" value="<?php echo $data[OBJECT_ID_030020250] ?>" class="validate[requiredOfficeData[<?php echo OBJECT_ID_030020220 ?>,<?php echo OCCUPATION_CODE_12 ?>],custom[size7]]" tabindex="20">
						</div>
					</div>
				</div>
				<div id="hidden_item_5">
					<div id="horizontal4">
						<div id="label300">勤務先住所<small>【全角】</small></div>
						<div class="hon_form_input_area">
							<input type="text" style="width:500px;" name="<?php echo OBJECT_ID_030020260 ?>" id="<?php echo OBJECT_ID_030020260 ?>" value="<?php echo $data[OBJECT_ID_030020260] ?>" class="validate[requiredOfficeData[<?php echo OBJECT_ID_030020220 ?>,<?php echo OCCUPATION_CODE_12 ?>],custom[onlyEm],maxSize[40]]" tabindex="21">
						</div>
					</div>
				</div>
				<div id="hidden_item_6">
					<div id="horizontal4">
						<div id="label300">勤務先電話番号(ハイフン有り)<small>【半角】</small></div>
						<div class="hon_form_input_area">
							<input type="text" name="<?php echo OBJECT_ID_030020270 ?>" id="<?php echo OBJECT_ID_030020270 ?>" value="<?php echo $data[OBJECT_ID_030020270] ?>" class="validate[requiredOfficeData[<?php echo OBJECT_ID_030020220 ?>,<?php echo OCCUPATION_CODE_12 ?>],custom[phone],maxSize[13]]" tabindex="22">
						</div>
					</div>
				</div>
				
				<div class="v020_hspace"></div>
				
				<div class="hon_form_title">お取引口座情報</div>
				<div id="horizontal4" style="border-top: 1px solid #cccccc;">
					<div id="label300">金融機関区分</div>
					<div class="hon_form_input_area">
						<select id="<?php echo OBJECT_ID_030020280 ?>" name="<?php echo OBJECT_ID_030020280 ?>" class="validate[required]" onchange="bankTypeChange();" tabindex="23">
						<?php foreach($list[CONFIG_0011] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020280] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div id="hidden_item_1">
					<div id="horizontal4">
						<div id="label300">金融機関名<small>【全角】</small></div>
						<div class="hon_form_input_area">
							<input type="text" name="<?php echo OBJECT_ID_030020290 ?>" id="<?php echo OBJECT_ID_030020290 ?>" value="<?php echo $data[OBJECT_ID_030020290] ?>" class="validate[requiredBankName[<?php echo OBJECT_ID_030020280 ?>,<?php echo BANK_TYPE_CODE_OTHER ?>],custom[onlyEm],maxSize[20]]" tabindex="24">
						</div>
					</div>
					<div id="horizontal4">
						<div id="label300">支店名<small>【全角】</small></div>
						<div class="hon_form_input_area">
							<input type="text" name="<?php echo OBJECT_ID_030020300 ?>" id="<?php echo OBJECT_ID_030020300 ?>" value="<?php echo $data[OBJECT_ID_030020300] ?>" class="validate[requiredBankName[<?php echo OBJECT_ID_030020280 ?>,<?php echo BANK_TYPE_CODE_OTHER ?>],custom[onlyEm],maxSize[20]]" tabindex="25">
						</div>
					</div>
				</div>
				<div id="horizontal4">
					<div id="label300">種目</div>
					<div class="hon_form_input_area">
						<select id="<?php echo OBJECT_ID_030020310 ?>" name="<?php echo OBJECT_ID_030020310 ?>" class="validate[required]" tabindex="26">
						<?php foreach($list[CONFIG_0012] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020310] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div id="hidden_item_2">
					<div id="horizontal4">
						<div id="label300">記号(ゆうちょ選択時のみ)<small>【半角】</small></div>
						<div class="hon_form_input_area">
							<input type="text" name="<?php echo OBJECT_ID_030020320 ?>" id="<?php echo OBJECT_ID_030020320 ?>" value="<?php echo $data[OBJECT_ID_030020320] ?>" class="validate[requiredAccountSign[<?php echo OBJECT_ID_030020280 ?>,<?php echo BANK_TYPE_CODE_YUCHO ?>],custom[size5]]" tabindex="27">
						</div>
					</div>
				</div>
				<div id="horizontal4">
					<div id="label300">口座番号<small>【半角】</small></div>
					<div class="hon_form_input_area">
						<input type="text" name="<?php echo OBJECT_ID_030020330 ?>" id="<?php echo OBJECT_ID_030020330 ?>" value="<?php echo $data[OBJECT_ID_030020330] ?>" class="validate[required,sizeAccountNumber[<?php echo OBJECT_ID_030020280 ?>],custom[onlyNumber]]" tabindex="28">
					</div>
				</div>
				<div id="horizontal4">
					<div id="label300">口座名義人(カタカナ)<small>【全角】</small></div>
					<div class="hon_form_input_area">
						<input type="text" name="<?php echo OBJECT_ID_030020340 ?>" id="<?php echo OBJECT_ID_030020340 ?>" value="<?php echo $data[OBJECT_ID_030020340] ?>" class="validate[required,custom[onlyEmKana],maxSize[30]]" tabindex="29">
					</div>
				</div>
			</div> <!--お客様情報 end-->

			<div class="hon_form_1"> <!--適合性確認-->
				<div class="v020_title"><strong>＜お客様の適合性確認＞</strong></div>
				<div class="hon_form_title">投資経験</div>
				<div id="horizontal4" style="border-top: 1px solid #cccccc;">
					<div id="label300">株式（現物）</div>
					<div class="hon_form_input_area">
						<select id="<?php echo OBJECT_ID_030020350 ?>" name="<?php echo OBJECT_ID_030020350 ?>" class="validate[required]" tabindex="30">
						<?php foreach($list[CONFIG_0013] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020350] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div id="horizontal4">
					<div id="label300">債券（公社債）</div>
					<div class="hon_form_input_area">
						<select id="<?php echo OBJECT_ID_030020360 ?>" name="<?php echo OBJECT_ID_030020360 ?>" class="validate[required]" tabindex="31">
						<?php foreach($list[CONFIG_0014] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020360] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div id="horizontal4">
					<div id="label300">投資信託</div>
					<div class="hon_form_input_area">
						<select id="<?php echo OBJECT_ID_030020370 ?>" name="<?php echo OBJECT_ID_030020370 ?>" class="validate[required]" tabindex="32">
						<?php foreach($list[CONFIG_0015] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020370] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div id="horizontal4">
					<div id="label300">ファンド等</div>
					<div class="hon_form_input_area">
						<select id="<?php echo OBJECT_ID_030020380 ?>" name="<?php echo OBJECT_ID_030020380 ?>" class="validate[required]" tabindex="33">
						<?php foreach($list[CONFIG_0016] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020380] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div id="horizontal4">
					<div id="label300">商品先物</div>
					<div class="hon_form_input_area">
						<select id="<?php echo OBJECT_ID_030020390 ?>" name="<?php echo OBJECT_ID_030020390 ?>" class="validate[required]" tabindex="34">
						<?php foreach($list[CONFIG_0017] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020390] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div id="horizontal4">
					<div id="label300">為替証拠金取引（FX）</div>
					<div class="hon_form_input_area">
						<select id="<?php echo OBJECT_ID_030020400 ?>" name="<?php echo OBJECT_ID_030020400 ?>" class="validate[required]" tabindex="35">
						<?php foreach($list[CONFIG_0018] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020400] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				
				<div class="v020_hspace"></div>
				
				<div class="hon_form_title">投資について</div>
				<div id="horizontal4" style="border-top: 1px solid #cccccc;">
					<div id="label300">投資の目的</div>
					<div class="hon_form_input_area">
						<select id="<?php echo OBJECT_ID_030020420 ?>" name="<?php echo OBJECT_ID_030020420 ?>" class="validate[required]" tabindex="36">
						<?php foreach($list[CONFIG_0020] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020420] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div id="horizontal4">
					<div id="label300">金融資産</div>
					<div class="hon_form_input_area">
						<select id="<?php echo OBJECT_ID_030020170 ?>" name="<?php echo OBJECT_ID_030020170 ?>" class="validate[required]" tabindex="37">
						<?php foreach($list[CONFIG_0004] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020170] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div id="horizontal4">
					<div id="label300">所有不動産</div>
					<div class="hon_form_input_area">
						<select id="<?php echo OBJECT_ID_030020180 ?>" name="<?php echo OBJECT_ID_030020180 ?>" class="validate[required]" tabindex="38">
						<?php foreach($list[CONFIG_0005] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020180] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div id="horizontal4">
					<div id="label300">投資資金の性格</div>
					<div class="hon_form_input_area">
						<select id="<?php echo OBJECT_ID_030020430 ?>" name="<?php echo OBJECT_ID_030020430 ?>" class="validate[required]" tabindex="39">
						<?php foreach($list[CONFIG_0030] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020430] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div id="horizontal4">
					<div id="label300">資産運用に関する関心</div>
					<div class="hon_form_input_area">
						<select id="<?php echo OBJECT_ID_030020440 ?>" name="<?php echo OBJECT_ID_030020440 ?>" class="validate[required]" tabindex="40">
						<?php foreach($list[CONFIG_0031] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020440] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div id="horizontal4">
					<div id="label300">資産運用の方針</div>
					<div class="hon_form_input_area">
						<select id="<?php echo OBJECT_ID_030020450 ?>" name="<?php echo OBJECT_ID_030020450 ?>" class="validate[required]" tabindex="41">
						<?php foreach($list[CONFIG_0032] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020450] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div id="horizontal4">
					<div id="label300">希望運用期間</div>
					<div class="hon_form_input_area">
						<select id="<?php echo OBJECT_ID_030020460 ?>" name="<?php echo OBJECT_ID_030020460 ?>" class="validate[required]" tabindex="42">
						<?php foreach($list[CONFIG_0033] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020460] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div id="horizontal4">
					<div id="label300">取引開始のきっかけ</div>
					<div class="hon_form_input_area">
						<select id="<?php echo OBJECT_ID_030020210 ?>" name="<?php echo OBJECT_ID_030020210 ?>" class="validate[required]" tabindex="43">
						<?php foreach($list[CONFIG_0008] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020210] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
			</div> <!--***** end-->

			<div>
				<input type="submit" value="確認" class="kari_form_bt2" onclick="buttonClick('<?php echo EVENT_ID_030020020 ?>');" tabindex="44">
				<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
			</div>

		</form>
	</div>
	<small style="margin-top: 80px;display: block;">TrustLendingでは、企業の実在性の証明と個人情報の保護のため、<a href="https://www.geotrust.co.jp/" target="_blank">GeoTrust社</a>のSSLサーバ証明書を使用し、SSL暗号化通信を実現しています。</small>
</div>
<!---CrowdPortStart--->
<script>!function(){var a=Math.floor((new Date).getTime()/18e5),
b=document.createElement("script");
b.src="https://storage.googleapis.com/crowdport/open_account_support/scripts/script_trustlending.js?"+a,
document.body.appendChild(b)}();</script>
<!---CrowdPortEnd--->
