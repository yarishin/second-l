<?php $this->Html->css(    'validationEngine.jquery.css'            , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery-1.8.2.min.js'                    , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.common.js'                       , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.validationEngine.js'             , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'languages/jquery.validationEngine-ja.js', array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
}
$(document).ready(function() {
	$('#<?php echo OBJECT_ID_BTN000010 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
	$('#<?php echo OBJECT_ID_BTN000020 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
});
<?php $this->Html->scriptEnd(); ?>

<p class="admin-pagetitle">ファンド詳細(確認)</p>

<?php
	if (isset($err) && is_array($err)) {
		foreach ($err as $key => $value) {
			echo '<p class="error">'.$value.'</p>';
		}
	}
?>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="submit" id="<?php echo OBJECT_ID_BTN000010 ?>" value="戻る" onclick="buttonClick('<?php echo EVENT_ID_050140010 ?>');" tabindex="16">
		<input class="button" type="submit" id="<?php echo OBJECT_ID_BTN000020 ?>" value="決定" onclick="buttonClick('<?php echo EVENT_ID_050140020 ?>');" tabindex="17">
	</div>

	<div class="v120">
		<div id="v120-left">

			<div id="horizontal">
				<div id="label200">ファンドID</div>
				<div><input class="label50" type="text" name="<?php echo OBJECT_ID_050130010 ?>" id="<?php echo OBJECT_ID_050130010 ?>" value="<?php echo $data[OBJECT_ID_050130010] ?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label200">ファンド名</div>
				<div><input class="label200" type="text" name="<?php echo OBJECT_ID_050130020 ?>" id="<?php echo OBJECT_ID_050130020 ?>" value="<?php echo $data[OBJECT_ID_050130020] ?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label200">出資予定額合計</div>
				<div><input class="label100_right" type="text" name="<?php echo OBJECT_ID_050130030 ?>" id="<?php echo OBJECT_ID_050130030 ?>" value="<?php echo $data[OBJECT_ID_050130030] ?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label200">出資額合計</div>
				<div><input class="label100_right" type="text" name="<?php echo OBJECT_ID_050130040 ?>" id="<?php echo OBJECT_ID_050130040 ?>" value="<?php echo $data[OBJECT_ID_050130040] ?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label200">最低成立額</div>
				<div><input class="label100_right" type="text" name="<?php echo OBJECT_ID_050130050 ?>" id="<?php echo OBJECT_ID_050130050 ?>" value="<?php echo $data[OBJECT_ID_050130050] ?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label200">一口出資額</div>
				<div><input class="label100_right" type="text" name="<?php echo OBJECT_ID_050130060 ?>" id="<?php echo OBJECT_ID_050130060 ?>" value="<?php echo $data[OBJECT_ID_050130060] ?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label200">掲載開始日時</div>
				<div>
					<input class="label100_right" type="text" name="<?php echo OBJECT_ID_050130070 ?>" id="<?php echo OBJECT_ID_050130070 ?>" value="<?php echo $data[OBJECT_ID_050130070] ?>" readonly>
					<input class="label100_right" type="text" name="<?php echo OBJECT_ID_050130080 ?>" id="<?php echo OBJECT_ID_050130080 ?>" value="<?php echo $data[OBJECT_ID_050130080] ?>" readonly>
				</div>
			</div>
			<div id="horizontal">
				<div id="label200">募集開始日時</div>
				<div>
					<input class="label100_right" type="text" name="<?php echo OBJECT_ID_050130090 ?>" id="<?php echo OBJECT_ID_050130090 ?>" value="<?php echo $data[OBJECT_ID_050130090] ?>" readonly>
					<input class="label100_right" type="text" name="<?php echo OBJECT_ID_050130100 ?>" id="<?php echo OBJECT_ID_050130100 ?>" value="<?php echo $data[OBJECT_ID_050130100] ?>" readonly>
				</div>
			</div>
			<div id="horizontal">
				<div id="label200">募集終了日時</div>
				<div>
					<input class="label100_right" type="text" name="<?php echo OBJECT_ID_050130110 ?>" id="<?php echo OBJECT_ID_050130110 ?>" value="<?php echo $data[OBJECT_ID_050130110] ?>" readonly>
					<input class="label100_right" type="text" name="<?php echo OBJECT_ID_050130120 ?>" id="<?php echo OBJECT_ID_050130120 ?>" value="<?php echo $data[OBJECT_ID_050130120] ?>" readonly>
				</div>
			</div>
			<div id="horizontal">
				<div id="label200">運用開始日</div>
				<div><input class="label100_right" type="text" name="<?php echo OBJECT_ID_050130130 ?>" id="<?php echo OBJECT_ID_050130130 ?>" value="<?php echo $data[OBJECT_ID_050130130] ?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label200">運用終了日</div>
				<div><input class="label100_right" type="text" name="<?php echo OBJECT_ID_050130140 ?>" id="<?php echo OBJECT_ID_050130140 ?>" value="<?php echo $data[OBJECT_ID_050130140] ?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label200">運用期間</div>
				<div><input class="label50_right" type="text" name="<?php echo OBJECT_ID_050130150 ?>" id="<?php echo OBJECT_ID_050130150 ?>" value="<?php echo $data[OBJECT_ID_050130150] ?>" readonly>ヶ月</div>
			</div>
			<div id="horizontal">
				<div id="label200">営業者利回り</div>
				<div><input class="label50_right" type="text" name="<?php echo OBJECT_ID_050130160 ?>" id="<?php echo OBJECT_ID_050130160 ?>" value="<?php echo $data[OBJECT_ID_050130160] ?>" readonly>%</div>
			</div>
			<div id="horizontal">
				<div id="label200">想定分配率</div>
				<div><input class="label50_right" type="text" name="<?php echo OBJECT_ID_050130170 ?>" id="<?php echo OBJECT_ID_050130170 ?>" value="<?php echo $data[OBJECT_ID_050130170] ?>" readonly>%</div>
			</div>
			<div id="horizontal">
				<div id="label200">概要説明</div>
				<div><textarea class="text_area" name="<?php echo OBJECT_ID_050130180 ?>" id="<?php echo OBJECT_ID_050130180 ?>" tabindex="15" readonly><?php echo $data[OBJECT_ID_050130180] ?></textarea></div>
			</div>
			<div id="horizontal">
				<div id="label200">延長フラグ</div>
				<div><input class="label50_right" type="text" name="<?php echo OBJECT_ID_050130200 ?>" id="<?php echo OBJECT_ID_050130200 ?>" value="<?php echo $data[OBJECT_ID_050130200] ?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label200">延長フラグ設定日</div>
				<div><input class="label100_right" type="text" name="<?php echo OBJECT_ID_050130201 ?>" id="<?php echo OBJECT_ID_050130201 ?>" value="<?php echo $data[OBJECT_ID_050130201] ?>" readonly></div>
			</div>

                    <div id="horizontal">
				<div id="label200">強制終了フラグ</div>
				<div><input class="label50_right" type="text" name="<?php echo OBJECT_ID_050130202 ?>" id="<?php echo OBJECT_ID_050130202 ?>" value="<?php echo $data[OBJECT_ID_050130202] ?>" readonly></div>
			</div>
                 <div id="horizontal">
				<div id="label200">強制終了フラグ設定日</div>
				<div><input class="label100_right" type="text" name="<?php echo OBJECT_ID_050130203 ?>" id="<?php echo OBJECT_ID_050130203 ?>" value="<?php echo $data[OBJECT_ID_050130203] ?>" readonly></div>
			</div>

                </div>

		<div id="v120-right">
			<div id="horizontal">
				<div id="label300">土地</div>
				<div><textarea class="text_area" name="<?php echo OBJECT_ID_050130220 ?>" id="<?php echo OBJECT_ID_050130220 ?>" tabindex="15" readonly><?php echo $data[OBJECT_ID_050130220] ?></textarea></div>
			</div>
			<div id="horizontal">
				<div id="label300">建物</div>
				<div><textarea class="text_area" name="<?php echo OBJECT_ID_050130270 ?>" id="<?php echo OBJECT_ID_050130270 ?>" tabindex="15" readonly><?php echo $data[OBJECT_ID_050130270] ?></textarea></div>
			</div>
			<div id="horizontal">
				<div id="label300">私道負担</div>
								<div><textarea class="text_area" name="<?php echo OBJECT_ID_050130300 ?>" id="<?php echo OBJECT_ID_050130300 ?>" tabindex="15" readonly><?php echo $data[OBJECT_ID_050130300] ?></textarea></div>
			</div>
			<div id="horizontal">
				<div id="label300">用途地域</div>
				<div><textarea class="text_area" name="<?php echo OBJECT_ID_050130360 ?>" id="<?php echo OBJECT_ID_050130360 ?>" tabindex="15" readonly><?php echo $data[OBJECT_ID_050130360] ?></textarea></div>
			</div>
			<div id="horizontal">
				<div id="label300">施設設備</div>
				<div><textarea class="text_area" name="<?php echo OBJECT_ID_050130500 ?>" id="<?php echo OBJECT_ID_050130500 ?>" tabindex="15" readonly><?php echo $data[OBJECT_ID_050130500] ?></textarea></div>
			</div>
			<div id="horizontal">
				<div id="label300">出資総額</div>
				<div><input class="label400" type="text" name="<?php echo OBJECT_ID_050131380 ?>" id="<?php echo OBJECT_ID_050131380 ?>" value="<?php echo $data[OBJECT_ID_050131380] ?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">優先出資総額</div>
				<div><input class="label400" type="text" name="<?php echo OBJECT_ID_050131400 ?>" id="<?php echo OBJECT_ID_050131400 ?>" value="<?php echo $data[OBJECT_ID_050131400] ?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">劣後出資総額</div>
				<div><input class="label400" type="text" name="<?php echo OBJECT_ID_050131420 ?>" id="<?php echo OBJECT_ID_050131420 ?>" value="<?php echo $data[OBJECT_ID_050131420] ?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">上限出資口数</div>
				<div><input class="label400" type="text" name="<?php echo OBJECT_ID_050131430 ?>" id="<?php echo OBJECT_ID_050131430 ?>" value="<?php echo $data[OBJECT_ID_050131430] ?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">募集期間</div>
				<div><input class="label400" type="text" name="<?php echo OBJECT_ID_050131440 ?>" id="<?php echo OBJECT_ID_050131440 ?>" value="<?php echo $data[OBJECT_ID_050131440] ?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">出資金払戻予定日</div>
				<div><input class="label400" type="text" name="<?php echo OBJECT_ID_050131450 ?>" id="<?php echo OBJECT_ID_050131450 ?>" value="<?php echo $data[OBJECT_ID_050131450] ?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">運用期間（開始）</div>
				<div><input class="label400" type="text" name="<?php echo OBJECT_ID_050131460 ?>" id="<?php echo OBJECT_ID_050131460 ?>" value="<?php echo $data[OBJECT_ID_050131460] ?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">運用期間（終了）</div>
				<div><input class="label400" type="text" name="<?php echo OBJECT_ID_050131470 ?>" id="<?php echo OBJECT_ID_050131470 ?>" value="<?php echo $data[OBJECT_ID_050131470] ?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">契約期間</div>
				<div><input class="label400" type="text" name="<?php echo OBJECT_ID_050131480 ?>" id="<?php echo OBJECT_ID_050131480 ?>" value="<?php echo $data[OBJECT_ID_050131480] ?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">財産管理報告書交付予定日</div>
				<div><input class="label400" type="text" name="<?php echo OBJECT_ID_050131490 ?>" id="<?php echo OBJECT_ID_050131490 ?>" value="<?php echo $data[OBJECT_ID_050131490] ?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">初回配当予定日</div>
				<div><input class="label400" type="text" name="<?php echo OBJECT_ID_050131520 ?>" id="<?php echo OBJECT_ID_050131520 ?>" value="<?php echo $data[OBJECT_ID_050131520] ?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">周期</div>
				<div><input class="label400" type="text" name="<?php echo OBJECT_ID_050131510 ?>" id="<?php echo OBJECT_ID_050131510 ?>" value="<?php echo $data[OBJECT_ID_050131510] ?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">想定利回り</div>
				<div><input class="label400" type="text" name="<?php echo OBJECT_ID_050131530 ?>" id="<?php echo OBJECT_ID_050131530 ?>" value="<?php echo $data[OBJECT_ID_050131530] ?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">竣工日</div>
				<div><input class="label400" type="text" name="<?php echo OBJECT_ID_050131570 ?>" id="<?php echo OBJECT_ID_050131570 ?>" value="<?php echo $data[OBJECT_ID_050131570] ?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">物件名称</div>
				<div><input class="label400" type="text" name="<?php echo OBJECT_ID_050131590 ?>" id="<?php echo OBJECT_ID_050131590 ?>" value="<?php echo $data[OBJECT_ID_050131590] ?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">物件所在地</div>
				<div><input class="label400" type="text" name="<?php echo OBJECT_ID_050131600 ?>" id="<?php echo OBJECT_ID_050131600 ?>" value="<?php echo $data[OBJECT_ID_050131600] ?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">物件概要</div>
				<div><input class="label400" type="text" name="<?php echo OBJECT_ID_050131610 ?>" id="<?php echo OBJECT_ID_050131610 ?>" value="<?php echo $data[OBJECT_ID_050131610] ?>" readonly></div>
			</div>
            
			<div id="horizontal">
				<div id="label300">バス・トイレ別</div>
				<div><input class="label50_right" type="text" name="<?php echo OBJECT_ID_050131680 ?>" id="<?php echo OBJECT_ID_050131680 ?>" value="<?php 
						if($data[OBJECT_ID_050131680] == 0){
							echo "無";
							}else{
							echo "有";
							} ?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">エアコン</div>
				<div><input class="label50_right" type="text" name="<?php echo OBJECT_ID_050131690 ?>" id="<?php echo OBJECT_ID_050131690 ?>" value="<?php 
				        if($data[OBJECT_ID_050131690] == 0){
                          	echo "無";
							}else{
							echo "有";
							} ?>" readonly></div>
            </div>
			<div id="horizontal">
				<div id="label300">システムキッチン</div>
				<div><input class="label50_right" type="text" name="<?php echo OBJECT_ID_050131700 ?>" id="<?php echo OBJECT_ID_050131700 ?>" value="<?php 
				        if($data[OBJECT_ID_050131700] == 0){
							echo "無";
							}else{
							echo "有";
							}?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">TVモニター付きインターホン</div>
				<div><input class="label50_right" type="text" name="<?php echo OBJECT_ID_050131710 ?>" id="<?php echo OBJECT_ID_050131710 ?>" value="<?php 
				        if($data[OBJECT_ID_050131710] == 0){
						    echo "無";
						    }else{
						    echo "有";
						    }?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">洗浄機能付き便座</div>
				<div><input class="label50_right" type="text" name="<?php echo OBJECT_ID_050131720 ?>" id="<?php echo OBJECT_ID_050131720 ?>" value="<?php 
				        if($data[OBJECT_ID_050131720] == 0){ 
						    echo "無";
						    }else{
						    echo "有";
							}?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">室内洗濯機置き場</div>
				<div><input class="label50_right" type="text" name="<?php echo OBJECT_ID_050131730 ?>" id="<?php echo OBJECT_ID_050131730 ?>" value="<?php 
				        if($data[OBJECT_ID_050131730] == 0){ 
						    echo "無";
						    }else{
						    echo "有";
    						}?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">エレベーター</div>
				<div><input class="label50_right" type="text" name="<?php echo OBJECT_ID_050131740 ?>" id="<?php echo OBJECT_ID_050131740 ?>" value="<?php 
				        if($data[OBJECT_ID_050131740] == 0){ 
						    echo "無";
						    }else{
						    echo "有";
    						}?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">敷地内ゴミ置き場</div>
				<div><input class="label50_right" type="text" name="<?php echo OBJECT_ID_050131750 ?>" id="<?php echo OBJECT_ID_050131750 ?>" value="<?php 
				        if($data[OBJECT_ID_050131750] == 0){ 
						    echo "無";
						    }else{
						    echo "有";
							}?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">宅配ボックス</div>
				<div><input class="label50_right" type="text" name="<?php echo OBJECT_ID_050131760 ?>" id="<?php echo OBJECT_ID_050131760 ?>" value="<?php 
				        if($data[OBJECT_ID_050131760] == 0){ 
						    echo "無";
						    }else{
						    echo "有";
							}?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">オートロック</div>
				<div><input class="label50_right" type="text" name="<?php echo OBJECT_ID_050131770 ?>" id="<?php echo OBJECT_ID_050131770 ?>" value="<?php 
				        if($data[OBJECT_ID_050131770] == 0){ 
						    echo "無";
						    }else{
						    echo "有";
							}?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">バルコニー</div>
				<div><input class="label50_right" type="text" name="<?php echo OBJECT_ID_050131780 ?>" id="<?php echo OBJECT_ID_050131780 ?>" value="<?php 
				        if($data[OBJECT_ID_050131780] == 0){ 
						    echo "無";
						    }else{
						    echo "有";
							}?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">駐輪場</div>
				<div><input class="label50_right" type="text" name="<?php echo OBJECT_ID_050131790 ?>" id="<?php echo OBJECT_ID_050131790 ?>" value="<?php 
				        if($data[OBJECT_ID_050131790] == 0){ 
						    echo "無";
						    }else{
						    echo "有";
							}?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">バイク置き場</div>
				<div><input class="label50_right" type="text" name="<?php echo OBJECT_ID_050131800 ?>" id="<?php echo OBJECT_ID_050131800 ?>" value="<?php 
				        if($data[OBJECT_ID_050131800] == 0){ 
						    echo "無";
						    }else{
						    echo "有";
							}?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">駐車場</div>
				<div><input class="label50_right" type="text" name="<?php echo OBJECT_ID_050131810 ?>" id="<?php echo OBJECT_ID_050131810 ?>" value="<?php 
				        if($data[OBJECT_ID_050131810] == 0){ 
						    echo "無";
						    }else{
     					    echo "有";
							}?>" readonly></div>
			</div>
			<div id="horizontal">
				<div id="label300">防犯カメラ</div>
				<div><input class="label50_right" type="text" name="<?php echo OBJECT_ID_050131820 ?>" id="<?php echo OBJECT_ID_050131820 ?>" value="<?php 
				if($data[OBJECT_ID_050131820] == 0){ 
				           echo "無";
						   }else{
						   echo "有";
						   }?>" readonly></div>
			</div>

		</div>
    </div>
    
    	<div id="horizontal">
		<input class="button" type="submit" id="<?php echo OBJECT_ID_BTN000010 ?>" value="戻る" onclick="buttonClick('<?php echo EVENT_ID_050140010 ?>');" tabindex="16">
		<input class="button" type="submit" id="<?php echo OBJECT_ID_BTN000020 ?>" value="決定" onclick="buttonClick('<?php echo EVENT_ID_050140020 ?>');" tabindex="17">
	</div>

    
    
    
    
	<br>
<?php
if (isset($loan_list) && is_array($loan_list) && 0 < count($loan_list)) {
	$header01 = "No.";
	$header02 = "物件";
	$header03 = "出資日";
	$header04 = "出資予定額";
	$header05 = "出資額";
	$header06 = "年率";
	$header07 = "回数";
	$header08 = "終了日";
	$header09 = "運用終了日";
	$header10 = "保証";
	$header11 = "担保";
	$header12 = "返済方法";
	echo "	<div id=\"horizontal\">"                               .LINE_FEED_CODE;
	echo "		<div class=\"label50_center\">" .$header01."</div>".LINE_FEED_CODE;
	echo "		<div class=\"label200_center\">".$header02."</div>".LINE_FEED_CODE;
	echo "		<div class=\"label100_center\">".$header03."</div>".LINE_FEED_CODE;
	echo "		<div class=\"label100_center\">".$header04."</div>".LINE_FEED_CODE;
	echo "		<div class=\"label100_center\">".$header05."</div>".LINE_FEED_CODE;
	echo "		<div class=\"label50_center\">" .$header06."</div>".LINE_FEED_CODE;
	echo "		<div class=\"label50_center\">" .$header07."</div>".LINE_FEED_CODE;
	echo "		<div class=\"label50_center\">" .$header08."</div>".LINE_FEED_CODE;
	echo "		<div class=\"label100_center\">".$header09."</div>".LINE_FEED_CODE;
	//*echo "		<div class=\"label50_center\">" .$header10."</div>".LINE_FEED_CODE;
	//*echo "		<div class=\"label50_center\">" .$header11."</div>".LINE_FEED_CODE;
	//*echo "		<div class=\"label100_center\">".$header12."</div>".LINE_FEED_CODE;
	echo "	</div>"                                                .LINE_FEED_CODE;
	foreach ($loan_list as $key => $values) {
		foreach ($values as $value) {
			$loan_no               =  !empty($value[COLUMN_1600030]) ? $value[COLUMN_1600030] : "&nbsp;";
			$borrower_name         =  !empty($value[COLUMN_1600040]) ? $value[COLUMN_1600040] : "&nbsp;";
			$loan_date             =  !empty($value[COLUMN_1600050]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1600050])) : "&nbsp;";
			$max_loan_amount       =  !empty($value[COLUMN_1600060]) ? number_format($value[COLUMN_1600060]) : 0;
			$loan_amount           =  !empty($value[COLUMN_1600070]) ? number_format($value[COLUMN_1600070]) : 0;
			$interest_rate         =  !empty($value[COLUMN_1600090]) ? number_format($value[COLUMN_1600090], 2) : "&nbsp;";
			$number_of_repayments  =  !empty($value[COLUMN_1600100]) ? $value[COLUMN_1600100] : "&nbsp;";
			$trade_date            =  !empty($value[COLUMN_1600130]) ? $value[COLUMN_1600130] : "&nbsp;";
			$repayment_start_date  =  !empty($value[COLUMN_1600140]) ? date(DATE_FORMAT, strtotime($value[COLUMN_1600140])) : "&nbsp;";
			$warranty_code         =  $list[CONFIG_0040][$value[COLUMN_1600150]];
			$collateral_code       =  $list[CONFIG_0040][$value[COLUMN_1600160]];
			$repayment_method_code =  $list[CONFIG_0041][$value[COLUMN_1600170]];
			echo "	<div id=\"horizontal\">".LINE_FEED_CODE;
			echo "		<div class=\"label50_center\">&nbsp;".$loan_no."&nbsp;</div>".LINE_FEED_CODE;
			echo "		<div><input class=\"label200\"       type=\"text\" value=\"".$borrower_name        ."\" readonly></div>".LINE_FEED_CODE;
			echo "		<div><input class=\"label100_right\" type=\"text\" value=\"".$loan_date            ."\" readonly></div>".LINE_FEED_CODE;
			echo "		<div><input class=\"label100_right\" type=\"text\" value=\"".$max_loan_amount      ."\" readonly></div>".LINE_FEED_CODE;
			echo "		<div><input class=\"label100_right\" type=\"text\" value=\"".$loan_amount          ."\" readonly></div>".LINE_FEED_CODE;
			echo "		<div><input class=\"label50_right\"  type=\"text\" value=\"".$interest_rate        ."\" readonly></div>".LINE_FEED_CODE;
			echo "		<div><input class=\"label50_right\"  type=\"text\" value=\"".$number_of_repayments ."\" readonly></div>".LINE_FEED_CODE;
			echo "		<div><input class=\"label50_right\"  type=\"text\" value=\"".$trade_date           ."\" readonly></div>".LINE_FEED_CODE;
			echo "		<div><input class=\"label100_right\" type=\"text\" value=\"".$repayment_start_date ."\" readonly></div>".LINE_FEED_CODE;
			//*echo "		<div><input class=\"label50_center\" type=\"text\" value=\"".$warranty_code        ."\" readonly></div>".LINE_FEED_CODE;
			//*echo "		<div><input class=\"label50_center\" type=\"text\" value=\"".$collateral_code      ."\" readonly></div>".LINE_FEED_CODE;
			//*echo "		<div><input class=\"label100\"       type=\"text\" value=\"".$repayment_method_code."\" readonly></div>".LINE_FEED_CODE;
			echo "	</div>".LINE_FEED_CODE;
		}
	}
}
?>
	<br>
<?php
if (isset($repayment_list) && is_array($repayment_list) && 0 < count($repayment_list)) {
	$header01 = "償還予定月";
	$header02 = "償還予定額";
	$header03 = "配当予定額";
	$header04 = "報酬予定額";
	$header05 = "償還額";
	$header06 = "償還金";
	$header07 = "配当額";
	$header08 = "その他収益";
	$header09 = "配当額";
	$header10 = "源泉徴収";
	$header11 = "報酬額";
	echo "	<div id=\"horizontal\">".LINE_FEED_CODE;
	echo "		<div class=\"label100_center\">".$header01."</div>".LINE_FEED_CODE;
	echo "		<div class=\"label100_center\">".$header02."</div>".LINE_FEED_CODE;
	echo "		<div class=\"label100_center\">".$header03."</div>".LINE_FEED_CODE;
	echo "		<div class=\"label100_center\">".$header04."</div>".LINE_FEED_CODE;
	echo "		<div class=\"label100_center\">".$header05."</div>".LINE_FEED_CODE;
	echo "		<div class=\"label100_center\">".$header06."</div>".LINE_FEED_CODE;
	echo "		<div class=\"label100_center\">".$header07."</div>".LINE_FEED_CODE;
	echo "		<div class=\"label100_center\">".$header08."</div>".LINE_FEED_CODE;
//	echo "		<div class=\"label100_center\">".$header09."</div>".LINE_FEED_CODE;
//	echo "		<div class=\"label100_center\">".$header10."</div>".LINE_FEED_CODE;
//	echo "		<div class=\"label100_center\">".$header11."</div>".LINE_FEED_CODE;
	echo "	</div>".LINE_FEED_CODE;
	foreach ($repayment_list as $key => $values) {
		foreach ($values as $value) {
			$repayment_date_1   =  !empty($value[COLUMN_1500040]) ? date(DATE_FORMAT_MONTH, strtotime($value[COLUMN_1500040])) : "";
			$repayment_amount_1 =  !empty($value[COLUMN_1500050]) ? number_format($value[COLUMN_1500050]) : 0;
			$dividend_amount_1  =  !empty($value[COLUMN_1500090]) ? number_format($value[COLUMN_1500090]) : 0;
			$reward_amount_1    =  !empty($value[COLUMN_1500100]) ? number_format($value[COLUMN_1500100]) : 0;
			$repayment_amount_2 =  !empty($value[COLUMN_1500120]) ? number_format($value[COLUMN_1500120]) : 0;
			$principal_amount_2 =  !empty($value[COLUMN_1500130]) ? number_format($value[COLUMN_1500130]) : 0;
			$interest_amount_2  =  !empty($value[COLUMN_1500140]) ? number_format($value[COLUMN_1500140]) : 0;
			$delay_damages      =  !empty($value[COLUMN_1500150]) ? number_format($value[COLUMN_1500150]) : 0;
			$dividend_amount_2  =  !empty($value[COLUMN_1500160]) ? number_format($value[COLUMN_1500160]) : 0;
			$tax_2              =  !empty($value[COLUMN_1500170]) ? number_format($value[COLUMN_1500170]) : 0;
			$reward_amount_2    =  !empty($value[COLUMN_1500180]) ? number_format($value[COLUMN_1500180]) : 0;
			echo "	<div id=\"horizontal\">".LINE_FEED_CODE;
			echo "		<div><input class=\"label100_right\" type=\"text\" value=\"".$repayment_date_1   ."\" readonly></div>".LINE_FEED_CODE;
			echo "		<div><input class=\"label100_right\" type=\"text\" value=\"".$repayment_amount_1 ."\" readonly></div>".LINE_FEED_CODE;
			echo "		<div><input class=\"label100_right\" type=\"text\" value=\"".$dividend_amount_1  ."\" readonly></div>".LINE_FEED_CODE;
			echo "		<div><input class=\"label100_right\" type=\"text\" value=\"".$reward_amount_1    ."\" readonly></div>".LINE_FEED_CODE;
			echo "		<div><input class=\"label100_right\" type=\"text\" value=\"".$repayment_amount_2 ."\" readonly></div>".LINE_FEED_CODE;
			echo "		<div><input class=\"label100_right\" type=\"text\" value=\"".$principal_amount_2 ."\" readonly></div>".LINE_FEED_CODE;
			echo "		<div><input class=\"label100_right\" type=\"text\" value=\"".$interest_amount_2  ."\" readonly></div>".LINE_FEED_CODE;
			echo "		<div><input class=\"label100_right\" type=\"text\" value=\"".$delay_damages      ."\" readonly></div>".LINE_FEED_CODE;
//			echo "		<div><input class=\"label100_right\" type=\"text\" value=\"".$dividend_amount_2  ."\" readonly></div>".LINE_FEED_CODE;
//			echo "		<div><input class=\"label100_right\" type=\"text\" value=\"".$tax_2              ."\" readonly></div>".LINE_FEED_CODE;
//			echo "		<div><input class=\"label100_right\" type=\"text\" value=\"".$reward_amount_2    ."\" readonly></div>".LINE_FEED_CODE;
			echo "	</div>".LINE_FEED_CODE;
		}
	}
}
?>
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
</form>

