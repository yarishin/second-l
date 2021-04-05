<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300&amp;display=swap&amp;subset=japanese" rel="stylesheet">
<?php $this->Html->css(    'validationEngine.jquery.css'             , array( 'inline' => false )); ?>
<?php $this->Html->script( 'jquery.min.js'                     , array( 'inline' => false )); ?>
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
                                 
		</div>


		<div class="row" style="margin-bottom:2em;">
			<div class="col-md-12 text-center">
				<div id="page-title" style="margin:1em auto;">出資者情報登録</div>
			</div> 
		</div>

	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2  col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0">

<?php
if (isset($validation_errors) && is_array($validation_errors)) {
	foreach ($validation_errors as $key => $values) {
		echo '<p class="error" style="font-size:1em;text-align:left;">'.$values.'</p>';
	}
}
?>

		</div>
	</div>

	<form id="form" name="form" method="post" action="<?php echo $action ?>">

 <!--基本情報-->
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2" style="margin-bottom:0.5em;">
				<h4 style="font-size:1.2em;"><b>お客様情報</b></h4>
			</div>
		</div>

		<div class="row">
 				
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
				<div id="label300">お名前【漢字】</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
				（姓）<input type="text" name="<?php echo OBJECT_ID_030020010 ?>" id="<?php echo OBJECT_ID_030020010 ?>" value="<?php echo $data[OBJECT_ID_030020010] ?>" class="validate[required,custom[onlyEm],maxSize[10]] form-control input-sm" tabindex="1">
			</div>
			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
				（名）<input type="text" name="<?php echo OBJECT_ID_030020020 ?>" id="<?php echo OBJECT_ID_030020020 ?>" value="<?php echo $data[OBJECT_ID_030020020] ?>" class="validate[required,custom[onlyEm],maxSize[10]] form-control input-sm" tabindex="2">
			</div>
                                     
		</div>

		<div class="row" style="margin-top:1em;">
 				
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
				<div id="label300">お名前【全角カナ】</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
				（セイ）<input type="text" name="<?php echo OBJECT_ID_030020030 ?>" id="<?php echo OBJECT_ID_030020030 ?>" value="<?php echo $data[OBJECT_ID_030020030] ?>" class="validate[required,custom[onlyEmKana],maxSize[15]] form-control input-sm" tabindex="3">
			</div>
			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
				（メイ）<input type="text" name="<?php echo OBJECT_ID_030020040 ?>" id="<?php echo OBJECT_ID_030020040 ?>" value="<?php echo $data[OBJECT_ID_030020040] ?>" class="validate[required,custom[onlyEmKana],maxSize[15]] form-control input-sm" tabindex="4">
			</div>
		</div>

		<div class="row" style="margin-top:1em;">
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
				<div id="label300">性別</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
				<select id="<?php echo OBJECT_ID_030020050 ?>" name="<?php echo OBJECT_ID_030020050 ?>" class="validate[required] form-control input-sm" tabindex="5">
				<?php foreach($list[CONFIG_0023] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020050] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
				</select>
			</div>
		</div>


		<div class="row" style="margin-top:1em;">
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
				<div id="label300">生年月日(西暦)【半角】</div>
			</div>
			<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 form-inline">
				<input type="text" size="5" name="<?php echo OBJECT_ID_030020060 ?>" id="<?php echo OBJECT_ID_030020060 ?>" value="<?php echo $data[OBJECT_ID_030020060] ?>" class="validate[required,custom[onlyNumberSp],min[1800],max[9999]] form-control input-sm" tabindex="6">
				<span>年</span>

				<select id="<?php echo OBJECT_ID_030020070 ?>" name="<?php echo OBJECT_ID_030020070 ?>" class="validate[required] form-control input-sm" tabindex="7">
						<?php foreach($list[CONFIG_0038] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020070] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
				</select>
				<span>月</span>

				<select id="<?php echo OBJECT_ID_030020080 ?>" name="<?php echo OBJECT_ID_030020080 ?>" class="validate[required,date3fields[<?php echo OBJECT_ID_030020060 ?>,<?php echo OBJECT_ID_030020070 ?>,<?php echo OBJECT_ID_030020080 ?>]] form-control input-sm" tabindex="8">
						<?php foreach($list[CONFIG_0039] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020080] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
				</select>
				<span>日</span>
			</div>
		</div>


		<div class="row" style="margin-top:1em;">
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
				<div id="label300">郵便番号【半角ハイフンなし】</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
				<input type="text" name="<?php echo OBJECT_ID_030020090 ?>" id="<?php echo OBJECT_ID_030020090 ?>" value="<?php echo $data[OBJECT_ID_030020090] ?>" class="validate[required,custom[size7]] form-control input-sm" tabindex="9">
			</div>
		</div>


		<div class="row" style="margin-top:1em;">
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
				<div id="label300">都道府県</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
				<select id="<?php echo OBJECT_ID_030020100 ?>" name="<?php echo OBJECT_ID_030020100 ?>" class="validate[required] form-control input-sm" tabindex="10">
						<?php foreach($list[CONFIG_0021] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020100] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
				</select>
			</div>
		</div>


		<div class="row" style="margin-top:1em;">
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
				<div id="label300">市区町村番地【全角】</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<input type="text" name="<?php echo OBJECT_ID_030020110 ?>" id="<?php echo OBJECT_ID_030020110 ?>" value="<?php echo $data[OBJECT_ID_030020110] ?>" class="validate[required,custom[onlyEm],maxSize[40]] form-control input-sm" tabindex="11">
			</div>
		</div>


		<div class="row" style="margin-top:1em;">
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
				<div id="label300">建物名【全角】</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<input type="text" name="<?php echo OBJECT_ID_030020120 ?>" id="<?php echo OBJECT_ID_030020120 ?>" value="<?php echo $data[OBJECT_ID_030020120] ?>" class="validate[custom[onlyEm],maxSize[40]] form-control input-sm" tabindex="12">
			</div>
		</div>


	  	<div class="row" style="margin-top:1em;">
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
				<div id="label300">電話番号【半角ハイフン有り】</div>
			</div>
			<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
				<input type="text" name="<?php echo OBJECT_ID_030020130 ?>" id="<?php echo OBJECT_ID_030020130 ?>" value="<?php echo $data[OBJECT_ID_030020130] ?>" class="validate[required[<?php echo OBJECT_ID_030020140 ?>],custom[phone],maxSize[13]] form-control input-sm" tabindex="13"><small style="padding-left:1em;">例）03-1234-5678</small>
			</div>
		</div> 


	<!--	<div class="row" style="margin-top:1em;">
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
				<div id="label300">携帯電話番号(ハイフン有り)【半角】</div>
			</div>
			<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 form-inline">
				<input type="text" name="<?php echo OBJECT_ID_030020140 ?>" id="<?php echo OBJECT_ID_030020140 ?>" value="<?php echo $data[OBJECT_ID_030020140] ?>" class="validate[requiredMobilePhone[<?php echo OBJECT_ID_030020130 ?>],custom[phone],maxSize[13]] form-control input-sm" tabindex="14"><small style="padding-left:1em;">例）090-1234-5678</small>
			</div>
		</div>-->


	


		<div class="row" style="margin-top:1em;">
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
				<div id="label300">職業</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
				<select id="<?php echo OBJECT_ID_030020220 ?>" name="<?php echo OBJECT_ID_030020220 ?>" class="validate[required] form-control input-sm" onchange="occupationChange();" tabindex="17">
						<?php foreach($list[CONFIG_0009] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020220] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
				</select>
			</div>
		</div>

	<div id="hidden_item_3">
		<div class="row" style="margin-top:1em;">
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
				<div id="label300">お勤め先【全角】</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<input type="text" name="<?php echo OBJECT_ID_030020230 ?>" id="<?php echo OBJECT_ID_030020230 ?>" value="<?php echo $data[OBJECT_ID_030020230] ?>" class="validate[requiredOfficeData[<?php echo OBJECT_ID_030020220 ?>,<?php echo OCCUPATION_CODE_12 ?>],custom[onlyEm],maxSize[30]] form-control input-sm" tabindex="18">
			</div>
		</div>

		<div class="row" style="margin-top:1em;">
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
				<div id="label300">年収</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
				<select id="<?php echo OBJECT_ID_030020240 ?>" name="<?php echo OBJECT_ID_030020240 ?>" class="validate[required] form-control input-sm" tabindex="19">
						<?php foreach($list[CONFIG_0010] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020240] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
				</select>
			</div>
		</div>
	</div>



		<div class="row" style="margin-top:1em;">
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
				<div id="label300">金融資産</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
				<select id="<?php echo OBJECT_ID_030020170 ?>" name="<?php echo OBJECT_ID_030020170 ?>" class="validate[required] form-control input-sm" tabindex="37">
				<?php foreach($list[CONFIG_0004] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020170] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
				</select>
			</div>
		</div>			




		<div class="row">
			<div class="col-lg-8 col-lg-offset-2" style="margin-top:2em;">
				<h4 style="font-size:1.2em;"><b>投資経験およびご意向</b></h4>
			</div>
		</div>



		<div class="row" style="margin-top:1em;">
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
				<div id="label300">不動産投資への興味</div>
  			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<select id="<?php echo OBJECT_ID_030020440 ?>" name="<?php echo OBJECT_ID_030020440 ?>" class="validate[required] form-control input-sm" tabindex="40">
						<?php foreach($list[CONFIG_0031] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020440] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="row" style="margin-top:1em;">
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
				<div id="label300">投資の経験</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
				<select id="<?php echo OBJECT_ID_030020350 ?>" name="<?php echo OBJECT_ID_030020350 ?>" class="validate[required] form-control input-sm" tabindex="30">
						<?php foreach($list[CONFIG_0013] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020350] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
				</select>
			</div>
		</div>





		<div class="row" style="margin-top:1em;">
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
				<div id="label300">投資の目的</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<select id="<?php echo OBJECT_ID_030020420 ?>" name="<?php echo OBJECT_ID_030020420 ?>" class="validate[required] form-control input-sm" tabindex="36">
						<?php foreach($list[CONFIG_0020] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020420] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
				</select>
			</div>
		</div>


		<div class="row" style="margin-top:1em;">
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
				<div id="label300">投資可能金額</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
				<select id="<?php echo OBJECT_ID_030020430 ?>" name="<?php echo OBJECT_ID_030020430 ?>" class="validate[required] form-control input-sm" tabindex="39">
						<?php foreach($list[CONFIG_0030] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020430] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
				</select>
			</div>
		</div>


		<div class="row" style="margin-top:1em;">
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
				<div id="label300">投資の方針</div>
			</div>
 			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<select id="<?php echo OBJECT_ID_030020450 ?>" name="<?php echo OBJECT_ID_030020450 ?>" class="validate[required] form-control input-sm" tabindex="41">
						<?php foreach($list[CONFIG_0032] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020450] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
				</select>
			</div>
		</div>


		<div class="row" style="margin-top:1em;">
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
				<div id="label300">希望運用期間</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
				<select id="<?php echo OBJECT_ID_030020460 ?>" name="<?php echo OBJECT_ID_030020460 ?>" class="validate[required] form-control input-sm" tabindex="42">
						<?php foreach($list[CONFIG_0033] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020460] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
				</select>
			</div>
		</div>


		<div class="row">
			<div class="col-lg-8 col-lg-offset-2" style="margin-top:2em;">
				<h4 style="font-size:1.2em;"><b>届出金融機関</b></h4>
			</div>
		</div>

		<div class="row" style="margin-top:1em;">
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
				<div id="label300">金融機関区分</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
				<select id="<?php echo OBJECT_ID_030020280 ?>" name="<?php echo OBJECT_ID_030020280 ?>" class="validate[required] form-control input-sm"  onchange="bankTypeChange();" tabindex="23">
						<?php foreach($list[CONFIG_0011] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020280] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
				</select>
			</div>
		</div>

	<div id="hidden_item_1">
		<div class="row" style="margin-top:1em;">
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
				<div id="label300">金融機関名【全角】</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
				<input type="text" name="<?php echo OBJECT_ID_030020290 ?>" id="<?php echo OBJECT_ID_030020290 ?>" value="<?php echo $data[OBJECT_ID_030020290] ?>" class="validate[requiredBankName[<?php echo OBJECT_ID_030020280 ?>,<?php echo BANK_TYPE_CODE_OTHER ?>],custom[onlyEm],maxSize[20]] form-control input-sm" tabindex="24">
			</div>
		</div>


		<div class="row" style="margin-top:1em;">
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
				<div id="label300">支店名【全角】</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
				<input type="text" name="<?php echo OBJECT_ID_030020300 ?>" id="<?php echo OBJECT_ID_030020300 ?>" value="<?php echo $data[OBJECT_ID_030020300] ?>" class="validate[requiredBankName[<?php echo OBJECT_ID_030020280 ?>,<?php echo BANK_TYPE_CODE_OTHER ?>],custom[onlyEm],maxSize[20]] form-control input-sm" tabindex="25">
			</div>
		</div>
	</div>





		<div class="row" style="margin-top:1em;">
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
				<div id="label300">種目</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
				<select id="<?php echo OBJECT_ID_030020310 ?>" name="<?php echo OBJECT_ID_030020310 ?>" class="validate[required] form-control input-sm" tabindex="26">
						<?php foreach($list[CONFIG_0012] as $key => $value): ?>
							<?php $selected = ( $data[OBJECT_ID_030020310] == $key ) ? " selected" : ""; ?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach; ?>
				</select>
			</div>
		</div>

	<div id="hidden_item_2">
		<div class="row" style="margin-top:1em;">
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
				<div id="label300">記号【半角】</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
				<input type="text" name="<?php echo OBJECT_ID_030020320 ?>" id="<?php echo OBJECT_ID_030020320 ?>" value="<?php echo $data[OBJECT_ID_030020320] ?>" class="validate[requiredAccountSign[<?php echo OBJECT_ID_030020280 ?>,<?php echo BANK_TYPE_CODE_YUCHO ?>],custom[size5]] form-control input-sm" tabindex="27">
			</div>
		</div>
	</div>





		<div class="row" style="margin-top:1em;">
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
				<div id="label300">口座番号【半角】</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
				<input type="text" name="<?php echo OBJECT_ID_030020330 ?>" id="<?php echo OBJECT_ID_030020330 ?>" value="<?php echo $data[OBJECT_ID_030020330] ?>" class="validate[required,sizeAccountNumber[<?php echo OBJECT_ID_030020280 ?>],custom[onlyNumber]] form-control input-sm" tabindex="28">
			</div>
		</div>


		<div class="row" style="margin-top:1em;">
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12">
				<div id="label300">口座名義人【全角カナ】</div>
			</div>
			<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
				<input type="text" name="<?php echo OBJECT_ID_030020340 ?>" id="<?php echo OBJECT_ID_030020340 ?>" value="<?php echo $data[OBJECT_ID_030020340] ?>" class="validate[required,custom[onlyEmKana],maxSize[30]] form-control input-sm" tabindex="29">
			</div>
		</div>



		<div class="row" style="margin-top:4em;">
			<div class="col-md-3 col-md-offset-5 col-sm-4 col-sm-offset-4 col-xs-12">
				<input type="submit" value="確認" style="font-size:1.2em;" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" onclick="buttonClick('<?php echo EVENT_ID_030020020 ?>');" tabindex="44">
				<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
			</div>
		</div>

	</form>

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



	</div>
</div>


<!---CrowdPortStart--->
<script>!function(){var a=Math.floor((new Date).getTime()/18e5),
b=document.createElement("script");
b.src="https://storage.googleapis.com/crowdport/open_account_support/scripts/script_trustlending.js?"+a,
document.body.appendChild(b)}();</script>
<!---CrowdPortEnd--->
