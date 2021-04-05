<?php
$disabled_correct = DISABLED;
$readonly_correct = READONLY;
$disabled_approve = DISABLED;
$readonly_approve = READONLY;
if ($correct) {
	$disabled_correct = "";
	$readonly_correct = "";
}
if ($approve) {
	$disabled_approve = "";
	$readonly_approve = "";
}
?>

<?php $this->Html->css(    'validationEngine.jquery.css'             , array( 'inline' => false )); ?>
<?php $this->Html->script( 'jquery-1.8.2.min.js'                     , array( 'inline' => false )); ?>
<?php $this->Html->script( 'jquery.validationEngine.js'              , array( 'inline' => false )); ?>
<?php $this->Html->script( 'languages/jquery.validationEngine-ja.js' , array( 'inline' => false )); ?>
<?php $this->Html->script( 'jquery.common.js'                        , array( 'inline' => false )); ?>


<?php echo $this->Html->script('img', array('inline' => false)); ?>
<?php echo $this->Html->script('up_img', array('inline' => false)); ?>



<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
}
function buttonClick2(eventId) {
	var flag = true;
	if ('<?php echo EVENT_ID_050050020 ?>' == eventId) {
		if ('<?php echo IDENTIFICATION_IMAGE_FLAG_FALSE ?>' == document.getElementById('<?php echo OBJECT_ID_050050490 ?>').value
				|| '<?php echo ACCOUNT_INFORMATION_IMAGE_FLAG_FALSE ?>' == document.getElementById('<?php echo OBJECT_ID_050050500 ?>').value) {
			alert('本人確認書類と口座情報が取得済でなければ承認登録は出来ません');
			return false;
		} else {
			flag = confirm ('承認します。よろしいですか？');
		}
	}
	else if ('<?php echo EVENT_ID_050050030 ?>' == eventId) {
		if ('' == document.getElementById('<?php echo OBJECT_ID_050050620 ?>').value) {
			alert('拒否理由を入力して下さい');
			return false;
		} else {
			if (100 < document.getElementById('<?php echo OBJECT_ID_050050620 ?>').value.length) {
				alert('拒否理由は100文字以内で入力して下さい');
				return false;
			}
			flag = confirm ('口座開設を拒否します。よろしいですか？');
		}
	}
	if (flag) {
		document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
		document.form.submit();
	}
	return false;
}
function buttonClick3(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
jQuery(document).ready(function(){
	$("#form").validationEngine();
});
$(document).ready(function() {
<?php if ($approve) { ?>
	$('#<?php echo OBJECT_ID_BTN000020 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
	$('#<?php echo OBJECT_ID_BTN000030 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
<?php } ?>
	$('#<?php echo OBJECT_ID_BTN000040 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
	$('#<?php echo OBJECT_ID_BTN000050 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
});
<?php $this->Html->scriptEnd(); ?>

<p>出資家詳細(入力)</p>

<?php
	if (isset($err) && is_array($err)) {
		foreach ($err as $key => $value) {
			echo '<p class="error">'.$value.'</p>';
		}
	}
?>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div>出資家からの依頼を受けて登録内容を修正する画面。</div>
	<br>

	<div id="horizontal">
<?php if ($correct) { ?>
		<input class="button" type="submit" id="<?php echo OBJECT_ID_BTN000010 ?>" value="確認" onclick="buttonClick('<?php echo EVENT_ID_050050010 ?>');" tabindex="50">
<?php } ?>
<?php if ($approve) { ?>
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000020 ?>" value="承認" onclick="buttonClick2('<?php echo EVENT_ID_050050020 ?>');return false;" tabindex="51">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000030 ?>" value="拒否" onclick="buttonClick2('<?php echo EVENT_ID_050050030 ?>');return false;" tabindex="52">
<?php } ?>
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000040 ?>" value="一覧" onclick="buttonClick2('<?php echo EVENT_ID_050050040 ?>');" tabindex="53">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000050 ?>" value="メニュー" onclick="buttonClick2('<?php echo EVENT_ID_050050050 ?>');" tabindex="54">
	</div>
<br>
        <table>
<div id="contents">
        <?php foreach($images as $image): ?>
        <tr>
                <td><img src="<?php echo $this->Upload->uploadUrl($image['Image'], 'Image.img', array('style' => 'small'));?>" onclick="imgwin('<?php echo $this->Upload->uploadUrl($image['Image'], 'Image.img', array('style' => 'original'));?>')" /></td>
                <td><?php echo $image['Image']['body'];?></td>
                <td><?php echo $image['Image']['created'];?></td>
        </tr>
        <?php endforeach;?>


</div>
</table>






	<br>
	<div id="horizontal">
		<div id="label300">ユーザID</div>
		<div class="label200"><?php echo $data[OBJECT_ID_050050010] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">出資家管理番号</div>
		<div class="label200"><?php echo $data[OBJECT_ID_050050015] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">メールアドレス</div>
		<div class="label200"><?php echo $data[OBJECT_ID_050050020] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">メールマガジン登録</div>
		<div class="label200"><?php echo $list[CONFIG_0046][$data[OBJECT_ID_050050486]] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">お名前【漢字】</div>
		<div class="lender_input_300">
			<input type="text" name="<?php echo OBJECT_ID_050050030 ?>" id="<?php echo OBJECT_ID_050050030 ?>" value="<?php echo $data[OBJECT_ID_050050030] ?>" class="validate[required,custom[onlyEm],maxSize[10]]" tabindex="1"<?php echo $readonly_correct ?>>
			<input type="text" name="<?php echo OBJECT_ID_050050040 ?>" id="<?php echo OBJECT_ID_050050040 ?>" value="<?php echo $data[OBJECT_ID_050050040] ?>" class="validate[required,custom[onlyEm],maxSize[10]]" tabindex="2"<?php echo $readonly_correct ?>>
		</div>
	</div>
	<div id="horizontal">
		<div id="label300">お名前【全角カナ】</div>
		<div class="lender_input_300">
			<input type="text" name="<?php echo OBJECT_ID_050050050 ?>" id="<?php echo OBJECT_ID_050050050 ?>" value="<?php echo $data[OBJECT_ID_050050050] ?>" class="validate[required,custom[onlyEmKana],maxSize[15]]" tabindex="3"<?php echo $readonly_correct ?>>
			<input type="text" name="<?php echo OBJECT_ID_050050060 ?>" id="<?php echo OBJECT_ID_050050060 ?>" value="<?php echo $data[OBJECT_ID_050050060] ?>" class="validate[required,custom[onlyEmKana],maxSize[15]]" tabindex="4"<?php echo $readonly_correct ?>>
		</div>
	</div>
	<div id="horizontal">
		<div id="label300">性別</div>
		<div><select id="<?php echo OBJECT_ID_050050070 ?>" name="<?php echo OBJECT_ID_050050070 ?>" class="validate[required]" tabindex="5">
			<?php foreach($list[CONFIG_0023] as $key => $value): ?>
				<?php $selected = ( $data[OBJECT_ID_050050070] == $key ) ? " selected" : $disabled_correct; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<div id="horizontal">
		<div id="label300">生年月日（西暦）【半角】</div>
		<input type="text" style="width:50px;" name="<?php echo OBJECT_ID_050050080 ?>" id="<?php echo OBJECT_ID_050050080 ?>" value="<?php echo $data[OBJECT_ID_050050080] ?>" class="validate[required,custom[onlyNumberSp],min[1800],max[9999]]" tabindex="6"<?php echo $readonly_correct ?>>
		<span>年</span>

		<select id="<?php echo OBJECT_ID_050050090 ?>" name="<?php echo OBJECT_ID_050050090 ?>" class="validate[required]" tabindex="7">
		<?php foreach($list[CONFIG_0038] as $key => $value): ?>
			<?php $selected = ( $data[OBJECT_ID_050050090] == $key ) ? " selected" : $disabled_correct; ?>
			<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
		<?php endforeach; ?>
		</select>
		<span>月</span>

		<select id="<?php echo OBJECT_ID_050050100 ?>" name="<?php echo OBJECT_ID_050050100 ?>" class="validate[required,date3fields[<?php echo OBJECT_ID_050050080 ?>,<?php echo OBJECT_ID_050050090 ?>,<?php echo OBJECT_ID_050050100 ?>]]" tabindex="8">
		<?php foreach($list[CONFIG_0039] as $key => $value): ?>
			<?php $selected = ( $data[OBJECT_ID_050050100] == $key ) ? " selected" : $disabled_correct; ?>
			<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
		<?php endforeach; ?>
		</select>
		<span>日</span>
	</div>
	<div id="horizontal">
		<div id="label300">郵便番号【半角ハイフンなし】</div>
		<div><input type="text" name="<?php echo OBJECT_ID_050050110 ?>" id="<?php echo OBJECT_ID_050050110 ?>" value="<?php echo $data[OBJECT_ID_050050110] ?>" class="validate[required,custom[size7]]" tabindex="9"<?php echo $readonly_correct ?>></div>
	</div>
	<div id="horizontal">
		<div id="label300">都道府県</div>
		<div><select id="<?php echo OBJECT_ID_050050120 ?>" name="<?php echo OBJECT_ID_050050120 ?>" class="validate[required]" tabindex="10">
			<?php foreach($list[CONFIG_0021] as $key => $value): ?>
				<?php $selected = ( $data[OBJECT_ID_050050120] == $key ) ? " selected" : $disabled_correct; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<div id="horizontal">
		<div id="label300">市区町村丁目番地【全角】</div>
		<div class="lender_input_600"><input type="text" name="<?php echo OBJECT_ID_050050130 ?>" id="<?php echo OBJECT_ID_050050130 ?>" value="<?php echo $data[OBJECT_ID_050050130] ?>" class="validate[required,custom[onlyEm],maxSize[40]]" tabindex="11"<?php echo $readonly_correct ?>></div>
	</div>
	<div id="horizontal">
		<div id="label300">建物名【全角】</div>
		<div class="lender_input_600"><input type="text" name="<?php echo OBJECT_ID_050050140 ?>" id="<?php echo OBJECT_ID_050050140 ?>" value="<?php echo $data[OBJECT_ID_050050140] ?>" class="validate[custom[onlyEm],maxSize[40]]" tabindex="12"<?php echo $readonly_correct ?>></div>
	</div>
	<div id="horizontal">
		<div id="label300">電話番号【半角ハイフン有り】</div>
		<div><input type="text" name="<?php echo OBJECT_ID_050050150 ?>" id="<?php echo OBJECT_ID_050050150 ?>" value="<?php echo $data[OBJECT_ID_050050150] ?>" class="validate[requiredFixedLinePhone[<?php echo OBJECT_ID_030020140 ?>],custom[phone],maxSize[13]]" tabindex="13"<?php echo $readonly_correct ?>></div>
	</div>
	<!--<div id="horizontal">
		<div id="label300">携帯電話番号</div>
		<div><input type="text" name="<?php echo OBJECT_ID_050050160 ?>" id="<?php echo OBJECT_ID_050050160 ?>" value="<?php echo $data[OBJECT_ID_050050160] ?>" class="validate[requiredMobilePhone[<?php echo OBJECT_ID_030020130 ?>],custom[phone],maxSize[13]]" tabindex="14"<?php echo $readonly_correct ?>></div>
	</div>-->
	<!--<div id="horizontal">
		<div id="label300">住居の状況</div>
		<div><select id="<?php echo OBJECT_ID_050050170 ?>" name="<?php echo OBJECT_ID_050050170 ?>" class="validate[]" tabindex="15">
			<?php foreach($list[CONFIG_0002] as $key => $value): ?>
				<?php $selected = ( $data[OBJECT_ID_050050170] == $key ) ? " selected" : $disabled_correct; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>-->
	<!--<div id="horizontal">
		<div id="label300">家族構成</div>
		<div><select id="<?php echo OBJECT_ID_050050180 ?>" name="<?php echo OBJECT_ID_050050180 ?>" class="validate[]" tabindex="16">
			<?php foreach($list[CONFIG_0003] as $key => $value): ?>
				<?php $selected = ( $data[OBJECT_ID_050050180] == $key ) ? " selected" : $disabled_correct; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>-->
	<div id="horizontal">
		<div id="label300">職業</div>
		<div><select id="<?php echo OBJECT_ID_050050240 ?>" name="<?php echo OBJECT_ID_050050240 ?>" class="validate[required]" tabindex="17">
			<?php foreach($list[CONFIG_0009] as $key => $value): ?>
				<?php $selected = ( $data[OBJECT_ID_050050240] == $key ) ? " selected" : $disabled_correct; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<div id="horizontal">
		<div id="label300">お勤め先【全角】</div>
		<div class="lender_input_600"><input type="text" name="<?php echo OBJECT_ID_050050250 ?>" id="<?php echo OBJECT_ID_050050250 ?>" value="<?php echo $data[OBJECT_ID_050050250] ?>" class="validate[requiredOfficeData[<?php echo OBJECT_ID_050050240 ?>,<?php echo OCCUPATION_CODE_12 ?>],custom[onlyEm],maxSize[30]]" tabindex="18"<?php echo $readonly_correct ?>></div>
	</div>
	<div id="horizontal">
		<div id="label300">年収</div>
		<div><select id="<?php echo OBJECT_ID_050050260 ?>" name="<?php echo OBJECT_ID_050050260 ?>" class="validate[]" tabindex="19">
			<?php foreach($list[CONFIG_0010] as $key => $value): ?>
				<?php $selected = ( $data[OBJECT_ID_050050260] == $key ) ? " selected" : $disabled_correct; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<!--<div id="horizontal">
		<div id="label300">勤務先郵便番号</div>
		<div><input type="text" name="<?php echo OBJECT_ID_050050270 ?>" id="<?php echo OBJECT_ID_050050270 ?>" value="<?php echo $data[OBJECT_ID_050050270] ?>" class="validate[[<?php echo OBJECT_ID_050050240 ?>,<?php echo OCCUPATION_CODE_12 ?>],custom[size7]]" tabindex="20"<?php echo $readonly_correct ?>></div>
	</div>
	<div id="horizontal">
		<div id="label300">勤務先住所</div>
		<div class="lender_input_600"><input type="text" name="<?php echo OBJECT_ID_050050280 ?>" id="<?php echo OBJECT_ID_050050280 ?>" value="<?php echo $data[OBJECT_ID_050050280] ?>" class="validate[[<?php echo OBJECT_ID_050050240 ?>,<?php echo OCCUPATION_CODE_12 ?>],custom[onlyEm],maxSize[40]]" tabindex="21"<?php echo $readonly_correct ?>></div>
	</div>
	<div id="horizontal">
		<div id="label300">勤務先電話番号</div>
		<div><input type="text" name="<?php echo OBJECT_ID_050050290 ?>" id="<?php echo OBJECT_ID_050050290 ?>" value="<?php echo $data[OBJECT_ID_050050290] ?>" class="validate[[<?php echo OBJECT_ID_050050240 ?>,<?php echo OCCUPATION_CODE_12 ?>],custom[phone],maxSize[13]]" tabindex="22"<?php echo $readonly_correct ?>></div>
	</div>-->
	<div id="horizontal">
		<div id="label300">金融資産</div>
		<div><select id="<?php echo OBJECT_ID_050050190 ?>" name="<?php echo OBJECT_ID_050050190 ?>" class="validate[required]" tabindex="40">
			<?php foreach($list[CONFIG_0004] as $key => $value): ?>
				<?php $selected = ( $data[OBJECT_ID_050050190] == $key ) ? " selected" : $disabled_correct; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<div id="horizontal">
		<div id="label300">不動産投資への興味</div>
		<div><select id="<?php echo OBJECT_ID_050050460 ?>" name="<?php echo OBJECT_ID_050050460 ?>" class="validate[required]" tabindex="43">
			<?php foreach($list[CONFIG_0031] as $key => $value): ?>
				<?php $selected = ( $data[OBJECT_ID_050050460] == $key ) ? " selected" : $disabled_correct; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<div id="horizontal">
		<div id="label300">投資の経験</div>
		<div><select id="<?php echo OBJECT_ID_050050370 ?>" name="<?php echo OBJECT_ID_050050370 ?>" class="validate[]" tabindex="33">
			<?php foreach($list[CONFIG_0013] as $key => $value): ?>
				<?php $selected = ( $data[OBJECT_ID_050050370] == $key ) ? " selected" : $disabled_correct; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<div id="horizontal">
		<div id="label300">投資の目的</div>
		<div><select id="<?php echo OBJECT_ID_050050440 ?>" name="<?php echo OBJECT_ID_050050440 ?>" class="validate[required]" tabindex="39">
			<?php foreach($list[CONFIG_0020] as $key => $value): ?>
				<?php $selected = ( $data[OBJECT_ID_050050440] == $key ) ? " selected" : $disabled_correct; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<div id="horizontal">
		<div id="label300">投資可能金額</div>
		<div><select id="<?php echo OBJECT_ID_050050450 ?>" name="<?php echo OBJECT_ID_050050450 ?>" class="validate[required]" tabindex="42">
			<?php foreach($list[CONFIG_0030] as $key => $value): ?>
				<?php $selected = ( $data[OBJECT_ID_050050450] == $key ) ? " selected" : $disabled_correct; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<div id="horizontal">
		<div id="label300">投資の方針</div>
		<div><select id="<?php echo OBJECT_ID_050050470 ?>" name="<?php echo OBJECT_ID_050050470 ?>" class="validate[required]" tabindex="44">
			<?php foreach($list[CONFIG_0032] as $key => $value): ?>
				<?php $selected = ( $data[OBJECT_ID_050050470] == $key ) ? " selected" : $disabled_correct; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<div id="horizontal">
		<div id="label300">希望運用期間</div>
		<div><select id="<?php echo OBJECT_ID_050050480 ?>" name="<?php echo OBJECT_ID_050050480 ?>" class="validate[required]" tabindex="45">
			<?php foreach($list[CONFIG_0033] as $key => $value): ?>
				<?php $selected = ( $data[OBJECT_ID_050050480] == $key ) ? " selected" : $disabled_correct; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<div id="horizontal">
		<div id="label300">金融機関区分</div>
		<div><select id="<?php echo OBJECT_ID_050050300 ?>" name="<?php echo OBJECT_ID_050050300 ?>" class="validate[required]" tabindex="23">
			<?php foreach($list[CONFIG_0011] as $key => $value): ?>
				<?php $selected = ( $data[OBJECT_ID_050050300] == $key ) ? " selected" : $disabled_correct; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<div id="horizontal">
		<div id="label300">金融機関名</div>
		<div class="lender_input_600"><input type="text" name="<?php echo OBJECT_ID_050050310 ?>" id="<?php echo OBJECT_ID_050050310 ?>" value="<?php echo $data[OBJECT_ID_050050310] ?>" class="validate[requiredBankName[<?php echo OBJECT_ID_050050300 ?>,<?php echo BANK_TYPE_CODE_OTHER ?>],custom[onlyEm],maxSize[20]]" tabindex="24"<?php echo $readonly_correct ?>></div>
	</div>
	<div id="horizontal">
		<div id="label300">金融機関コード</div>
		<div class="lender_input_300"><input type="text" name="<?php echo OBJECT_ID_050050315 ?>" id="<?php echo OBJECT_ID_050050315 ?>" value="<?php echo $data[OBJECT_ID_050050315] ?>" class="validate[custom[size4]]" tabindex="25"<?php echo $readonly_correct ?>></div>
	</div>
	<div id="horizontal">
		<div id="label300">支店名</div>
		<div class="lender_input_600"><input type="text" name="<?php echo OBJECT_ID_050050320 ?>" id="<?php echo OBJECT_ID_050050320 ?>" value="<?php echo $data[OBJECT_ID_050050320] ?>" class="validate[requiredBankName[<?php echo OBJECT_ID_050050300 ?>,<?php echo BANK_TYPE_CODE_OTHER ?>],custom[onlyEm],maxSize[20]]" tabindex="26"<?php echo $readonly_correct ?>></div>
	</div>
	<div id="horizontal">
		<div id="label300">支店コード</div>
		<div class="lender_input_300"><input type="text" name="<?php echo OBJECT_ID_050050325 ?>" id="<?php echo OBJECT_ID_050050325 ?>" value="<?php echo $data[OBJECT_ID_050050325] ?>" class="validate[custom[size3]]" tabindex="27"<?php echo $readonly_correct ?>></div>
	</div>
	<div id="horizontal">
		<div id="label300">種目</div>
		<div><select id="<?php echo OBJECT_ID_050050330 ?>" name="<?php echo OBJECT_ID_050050330 ?>" class="validate[required]" tabindex="28">
			<?php foreach($list[CONFIG_0012] as $key => $value): ?>
				<?php $selected = ( $data[OBJECT_ID_050050330] == $key ) ? " selected" : $disabled_correct; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<div id="horizontal">
		<div id="label300">記号(ゆうちょ選択時のみ)</div>
		<div><input type="text" name="<?php echo OBJECT_ID_050050340 ?>" id="<?php echo OBJECT_ID_050050340 ?>" value="<?php echo $data[OBJECT_ID_050050340] ?>" class="validate[requiredAccountSign[<?php echo OBJECT_ID_050050300 ?>,<?php echo BANK_TYPE_CODE_YUCHO ?>],custom[size5]]" tabindex="29"<?php echo $readonly_correct ?>></div>
	</div>
	<div id="horizontal">
		<div id="label300">口座番号</div>
		<div><input type="text" name="<?php echo OBJECT_ID_050050350 ?>" id="<?php echo OBJECT_ID_050050350 ?>" value="<?php echo $data[OBJECT_ID_050050350] ?>" class="validate[required,sizeAccountNumber[<?php echo OBJECT_ID_050050300 ?>]]" tabindex="30"<?php echo $readonly_correct ?>></div>
	</div>
	<div id="horizontal">
		<div id="label300">振込口座番号(ゆうちょ選択時のみ)</div>
		<div><input type="text" name="<?php echo OBJECT_ID_050050355 ?>" id="<?php echo OBJECT_ID_050050355 ?>" value="<?php echo $data[OBJECT_ID_050050355] ?>" class="validate[custom[size7]]" tabindex="31"<?php echo $readonly_correct ?>></div>
	</div>
	<div id="horizontal">
		<div id="label300">口座名義人</div>
		<div class="lender_input_600"><input type="text" name="<?php echo OBJECT_ID_050050360 ?>" id="<?php echo OBJECT_ID_050050360 ?>" value="<?php echo $data[OBJECT_ID_050050360] ?>" class="validate[required,custom[onlyEm],maxSize[30]]" tabindex="32"<?php echo $readonly_correct ?>></div>
	</div>




<!--
	<div id="horizontal">
		<div id="label300">債券（公社債）</div>
		<div><select id="<?php echo OBJECT_ID_050050380 ?>" name="<?php echo OBJECT_ID_050050380 ?>" class="validate[]" tabindex="34">
			<?php foreach($list[CONFIG_0014] as $key => $value): ?>
				<?php $selected = ( $data[OBJECT_ID_050050380] == $key ) ? " selected" : $disabled_correct; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<div id="horizontal">
		<div id="label300">投資信託</div>
		<div><select id="<?php echo OBJECT_ID_050050390 ?>" name="<?php echo OBJECT_ID_050050390 ?>" class="validate[]" tabindex="35">
			<?php foreach($list[CONFIG_0015] as $key => $value): ?>
				<?php $selected = ( $data[OBJECT_ID_050050390] == $key ) ? " selected" : $disabled_correct; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<div id="horizontal">
		<div id="label300">ファンド等</div>
		<div><select id="<?php echo OBJECT_ID_050050400 ?>" name="<?php echo OBJECT_ID_050050400 ?>" class="validate[]" tabindex="36">
			<?php foreach($list[CONFIG_0016] as $key => $value): ?>
				<?php $selected = ( $data[OBJECT_ID_050050400] == $key ) ? " selected" : $disabled_correct; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<div id="horizontal">
		<div id="label300">商品先物</div>
		<div><select id="<?php echo OBJECT_ID_050050410 ?>" name="<?php echo OBJECT_ID_050050410 ?>" class="validate[]" tabindex="37">
			<?php foreach($list[CONFIG_0017] as $key => $value): ?>
				<?php $selected = ( $data[OBJECT_ID_050050410] == $key ) ? " selected" : $disabled_correct; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<div id="horizontal">
		<div id="label300">為替証拠金取引（FX）</div>
		<div><select id="<?php echo OBJECT_ID_050050420 ?>" name="<?php echo OBJECT_ID_050050420 ?>" class="validate[]" tabindex="38">
			<?php foreach($list[CONFIG_0018] as $key => $value): ?>
				<?php $selected = ( $data[OBJECT_ID_050050420] == $key ) ? " selected" : $disabled_correct; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<div id="horizontal">
		<div id="label300">所有不動産</div>
		<div><select id="<?php echo OBJECT_ID_050050200 ?>" name="<?php echo OBJECT_ID_050050200 ?>" class="validate[]" tabindex="41">
			<?php foreach($list[CONFIG_0005] as $key => $value): ?>
				<?php $selected = ( $data[OBJECT_ID_050050200] == $key ) ? " selected" : $disabled_correct; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<div id="horizontal">
		<div id="label300">取引開始のきっかけ</div>
		<div><select id="<?php echo OBJECT_ID_050050230 ?>" name="<?php echo OBJECT_ID_050050230 ?>" class="validate[]" tabindex="46">
			<?php foreach($list[CONFIG_0008] as $key => $value): ?>
				<?php $selected = ( $data[OBJECT_ID_050050230] == $key ) ? " selected" : $disabled_correct; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>-->




	<div id="horizontal">
		<div id="label300">本人確認書類</div>
		<div><select id="<?php echo OBJECT_ID_050050490 ?>" name="<?php echo OBJECT_ID_050050490 ?>" class="" tabindex="47">
			<?php foreach($list[CONFIG_0040] as $key => $value): ?>
				<?php $selected = ( $data[OBJECT_ID_050050490] == $key ) ? " selected" : $disabled_approve; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>
	<div id="horizontal">
		<div id="label300">口座情報画像</div>
		<div><select id="<?php echo OBJECT_ID_050050500 ?>" name="<?php echo OBJECT_ID_050050500 ?>" class="" tabindex="48">
			<?php foreach($list[CONFIG_0040] as $key => $value): ?>
				<?php $selected = ( $data[OBJECT_ID_050050500] == $key ) ? " selected" : $disabled_approve; ?>
				<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select></div>
	</div>

	<div id="horizontal">
		<div id="label300">状態</div>
                <div><select id="<?php echo OBJECT_ID_050050100 ?>" name="<?php echo OBJECT_ID_050050510 ?>" class="" tabindex="48">
                        <?php foreach($list[CONFIG_0024] as $key => $value): ?>
                                <?php if($review_auth == 00 || $review_auth == 20){
                                     $selected = ( $data[OBJECT_ID_050050510] == $key ) ? " selected" : $disabled_correct ;
                                     } else {
                                     $selected = ( $data[OBJECT_ID_050050510] == $key ) ? " selected" : $disabled_approve ;  
                                 } ?>
                                <option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
                        <?php endforeach; ?>
                      </select>
　　　　　　　　</div>
	</div>



	<div id="horizontal">
		<div id="label300">仮登録日時</div>
		<div class="label200"><?php echo $data[OBJECT_ID_050050520] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">有効期限</div>
		<div class="label200"><?php echo $data[OBJECT_ID_050050530] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">登録申請日時</div>
		<div class="label200"><?php echo $data[OBJECT_ID_050050550] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">承認日時</div>
		<div class="label200"><?php echo $data[OBJECT_ID_050050560] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">承認管理者</div>
		<div class="label200"><?php echo $data[OBJECT_ID_050050570] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">認証キー</div>
		<div class="label200"><?php echo $data[OBJECT_ID_050050580] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">認証日時</div>
		<div class="label200"><?php echo $data[OBJECT_ID_050050590] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">拒否日時</div>
		<div class="label200"><?php echo $data[OBJECT_ID_050050600] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">拒否管理者</div>
		<div class="label200"><?php echo $data[OBJECT_ID_050050610] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">拒否理由</div>
		<div><input type="text" name="<?php echo OBJECT_ID_050050620 ?>" id="<?php echo OBJECT_ID_050050620 ?>" value="<?php echo $data[OBJECT_ID_050050620] ?>" class="" tabindex="49"<?php echo $readonly_approve ?>></div>
	</div>
	
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
</form>
