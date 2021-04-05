<?php $this->Html->css('validationEngine.jquery.css', array('inline' => false)); ?>
<?php $this->Html->script( 'jquery-1.8.2.min.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.validationEngine.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'languages/jquery.validationEngine-ja.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.common.js'    , array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
jQuery(document).ready(function(){
   jQuery("#form").validationEngine();
});
$(document).ready(function() {
	$('#<?php echo OBJECT_ID_BTN000010 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
	$('#<?php echo OBJECT_ID_BTN000020 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
});
<?php $this->Html->scriptEnd(); ?>

<p class="admin-pagetitle">出資家詳細（確認）</p>
<?php
	if (isset($err) && is_array($err)) {
		foreach ($err as $key => $value) {
			echo '<p class="error">'.$value.'</p>';
		}
	}
?>
<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div>出資家情報の修正内容を確定する画面。</div>
	<div>修正した内容は『修正後』の欄に表示される。</div>
	<br>
	<br>
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">お名前漢字(姓)</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050030]) != 0) { ?>
		<div id="text600"><?php echo $data_before[OBJECT_ID_050050030] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050030], $data[OBJECT_ID_050050030]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $data[OBJECT_ID_050050030] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">お名前漢字(名)</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050040]) != 0) { ?>
		<div id="text600"><?php echo $data_before[OBJECT_ID_050050040] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050040], $data[OBJECT_ID_050050040]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $data[OBJECT_ID_050050040] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
				
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">お名前フリガナ(姓)</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050050]) != 0) { ?>
		<div id="text600"><?php echo $data_before[OBJECT_ID_050050050] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050050], $data[OBJECT_ID_050050050]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $data[OBJECT_ID_050050050] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">お名前フリガナ(名)</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050060]) != 0) { ?>
		<div id="text600"><?php echo $data_before[OBJECT_ID_050050060] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050060], $data[OBJECT_ID_050050060]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $data[OBJECT_ID_050050060] ?></div>
<?php } ?>
	</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">性別</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050070]) != 0) { ?>
		<div id="text600"><?php echo $list[CONFIG_0023][$data_before[OBJECT_ID_050050070]] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050070], $data[OBJECT_ID_050050070]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $list[CONFIG_0023][$data[OBJECT_ID_050050070]] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">生年月日（西暦）</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if ((strcmp("", $data_before[OBJECT_ID_050050080]) != 0) && (strcmp("", $data_before[OBJECT_ID_050050090]) != 0) && (strcmp("", $data_before[OBJECT_ID_050050100]) != 0)) { ?>
		<div id="text600"><?php echo $data_before[OBJECT_ID_050050080]."年".$data_before[OBJECT_ID_050050090]."月".$data_before[OBJECT_ID_050050100]."日" ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if ((strcmp($data_before[OBJECT_ID_050050080], $data[OBJECT_ID_050050080]) != 0) || 
		   (strcmp($data_before[OBJECT_ID_050050090], $data[OBJECT_ID_050050090]) != 0) || 
		   (strcmp($data_before[OBJECT_ID_050050100], $data[OBJECT_ID_050050100]) != 0)) { ?>
		<div class="lender_confirm_text"><?php echo $data[OBJECT_ID_050050080]."年".$data[OBJECT_ID_050050090]."月".$data[OBJECT_ID_050050100]."日" ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">郵便番号</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050110]) != 0) { ?>
		<div id="text600"><?php echo $data_before[OBJECT_ID_050050110] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050110], $data[OBJECT_ID_050050110]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $data[OBJECT_ID_050050110] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">都道府県</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050120]) != 0) { ?>
		<div id="text600"><?php echo $list[CONFIG_0021][$data_before[OBJECT_ID_050050120]] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050120], $data[OBJECT_ID_050050120]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $list[CONFIG_0021][$data[OBJECT_ID_050050120]] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">市区町村丁目番地</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050130]) != 0) { ?>
		<div id="text600"><?php echo $data_before[OBJECT_ID_050050130] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050130], $data[OBJECT_ID_050050130]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $data[OBJECT_ID_050050130] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">建物名</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050140]) != 0) { ?>
		<div id="text600"><?php echo $data_before[OBJECT_ID_050050140] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050140], $data[OBJECT_ID_050050140]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $data[OBJECT_ID_050050140] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">電話番号</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050150]) != 0) { ?>
		<div id="text600"><?php echo $data_before[OBJECT_ID_050050150] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050150], $data[OBJECT_ID_050050150]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $data[OBJECT_ID_050050150] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<!--<div id="horizontal">
		<table><tr>
			<td><div id="label300">携帯電話番号</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050160]) != 0) { ?>
		<div id="text600"><?php echo $data_before[OBJECT_ID_050050160] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050160], $data[OBJECT_ID_050050160]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $data[OBJECT_ID_050050160] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>-->
	
	<!--<div id="horizontal">
		<table><tr>
			<td><div id="label300">住居の状況</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050170]) != 0) { ?>
		<div id="text600"><?php echo $list[CONFIG_0002][$data_before[OBJECT_ID_050050170]] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050170], $data[OBJECT_ID_050050170]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $list[CONFIG_0002][$data[OBJECT_ID_050050170]] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>-->
	
	<!--<div id="horizontal">
		<table><tr>
			<td><div id="label300">家族構成</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050180]) != 0) { ?>
		<div id="text600"><?php echo $list[CONFIG_0003][$data_before[OBJECT_ID_050050180]] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050180], $data[OBJECT_ID_050050180]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $list[CONFIG_0003][$data[OBJECT_ID_050050180]] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>-->
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">職業</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050240]) != 0) { ?>
		<div id="text600"><?php echo $list[CONFIG_0009][$data_before[OBJECT_ID_050050240]] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050240], $data[OBJECT_ID_050050240]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $list[CONFIG_0009][$data[OBJECT_ID_050050240]] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">お勤め先</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050250]) != 0) { ?>
		<div id="text600"><?php echo $data_before[OBJECT_ID_050050250] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050250], $data[OBJECT_ID_050050250]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $data[OBJECT_ID_050050250] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">年収</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050260]) != 0) { ?>
		<div id="text600"><?php echo $list[CONFIG_0010][$data_before[OBJECT_ID_050050260]] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050260], $data[OBJECT_ID_050050260]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $list[CONFIG_0010][$data[OBJECT_ID_050050260]] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<!--<div id="horizontal">
		<table><tr>
			<td><div id="label300">勤務先郵便番号</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050270]) != 0) { ?>
		<div id="text600"><?php echo $data_before[OBJECT_ID_050050270] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050270], $data[OBJECT_ID_050050270]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $data[OBJECT_ID_050050270] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">勤務先住所</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050280]) != 0) { ?>
		<div id="text600"><?php echo $data_before[OBJECT_ID_050050280] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050280], $data[OBJECT_ID_050050280]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $data[OBJECT_ID_050050280] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">勤務先電話番号</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050290]) != 0) { ?>
		<div id="text600"><?php echo $data_before[OBJECT_ID_050050290] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050290], $data[OBJECT_ID_050050290]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $data[OBJECT_ID_050050290] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>-->
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">金融資産</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050190]) != 0) { ?>
		<div id="text600"><?php echo $list[CONFIG_0004][$data_before[OBJECT_ID_050050190]] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050190], $data[OBJECT_ID_050050190]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $list[CONFIG_0004][$data[OBJECT_ID_050050190]] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">不動産投資への興味</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050460]) != 0) { ?>
		<div id="text600"><?php echo $list[CONFIG_0031][$data_before[OBJECT_ID_050050460]] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050460], $data[OBJECT_ID_050050460]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $list[CONFIG_0031][$data[OBJECT_ID_050050460]] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">投資の経験</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050370]) != 0) { ?>
		<div id="text600"><?php echo $list[CONFIG_0013][$data_before[OBJECT_ID_050050370]] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050370], $data[OBJECT_ID_050050370]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $list[CONFIG_0013][$data[OBJECT_ID_050050370]] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">投資の目的</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050440]) != 0) { ?>
		<div id="text600"><?php echo $list[CONFIG_0020][$data_before[OBJECT_ID_050050440]] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050440], $data[OBJECT_ID_050050440]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $list[CONFIG_0020][$data[OBJECT_ID_050050440]] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">投資可能金額</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050450]) != 0) { ?>
		<div id="text600"><?php echo $list[CONFIG_0030][$data_before[OBJECT_ID_050050450]] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050450], $data[OBJECT_ID_050050450]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $list[CONFIG_0030][$data[OBJECT_ID_050050450]] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">投資の方針</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050470]) != 0) { ?>
		<div id="text600"><?php echo $list[CONFIG_0032][$data_before[OBJECT_ID_050050470]] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050470], $data[OBJECT_ID_050050470]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $list[CONFIG_0032][$data[OBJECT_ID_050050470]] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">希望運用期間</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050480]) != 0) { ?>
		<div id="text600"><?php echo $list[CONFIG_0033][$data_before[OBJECT_ID_050050480]] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050480], $data[OBJECT_ID_050050480]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $list[CONFIG_0033][$data[OBJECT_ID_050050480]] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">金融機関区分</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050300]) != 0) { ?>
		<div id="text600"><?php echo $list[CONFIG_0011][$data_before[OBJECT_ID_050050300]] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050300], $data[OBJECT_ID_050050300]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $list[CONFIG_0011][$data[OBJECT_ID_050050300]] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">金融機関名</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050310]) != 0) { ?>
		<div id="text600"><?php echo $data_before[OBJECT_ID_050050310] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050310], $data[OBJECT_ID_050050310]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $data[OBJECT_ID_050050310] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">金融機関コード</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050315]) != 0) { ?>
		<div id="text600"><?php echo $data_before[OBJECT_ID_050050315] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050315], $data[OBJECT_ID_050050315]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $data[OBJECT_ID_050050315] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">支店名</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050320]) != 0) { ?>
		<div id="text600"><?php echo $data_before[OBJECT_ID_050050320] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050320], $data[OBJECT_ID_050050320]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $data[OBJECT_ID_050050320] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">支店コード</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050325]) != 0) { ?>
		<div id="text600"><?php echo $data_before[OBJECT_ID_050050325] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050325], $data[OBJECT_ID_050050325]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $data[OBJECT_ID_050050325] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">種目</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050330]) != 0) { ?>
		<div id="text600"><?php echo $list[CONFIG_0012][$data_before[OBJECT_ID_050050330]] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050330], $data[OBJECT_ID_050050330]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $list[CONFIG_0012][$data[OBJECT_ID_050050330]] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">記号(ゆうちょ選択時のみ)</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050340]) != 0) { ?>
		<div id="text600"><?php echo $data_before[OBJECT_ID_050050340] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050340], $data[OBJECT_ID_050050340]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $data[OBJECT_ID_050050340] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">口座番号</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050350]) != 0) { ?>
		<div id="text600"><?php echo $data_before[OBJECT_ID_050050350] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050350], $data[OBJECT_ID_050050350]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $data[OBJECT_ID_050050350] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">振込口座番号(ゆうちょ選択時のみ)</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050355]) != 0) { ?>
		<div id="text600"><?php echo $data_before[OBJECT_ID_050050355] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050355], $data[OBJECT_ID_050050355]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $data[OBJECT_ID_050050355] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">口座名義人</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050360]) != 0) { ?>
		<div id="text600"><?php echo $data_before[OBJECT_ID_050050360] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050360], $data[OBJECT_ID_050050360]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $data[OBJECT_ID_050050360] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>


	<div id="horizontal">
		<table><tr>
			<td><div id="label300">顧客状態</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050510]) != 0) { ?>
		<div id="text600"><?php echo $list[CONFIG_0024][$data_before[OBJECT_ID_050050510]] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050510], $data[OBJECT_ID_050050510]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $list[CONFIG_0024][$data[OBJECT_ID_050050510]] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>



<!--	
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">債券（公社債）</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050380]) != 0) { ?>
		<div id="text600"><?php echo $list[CONFIG_0014][$data_before[OBJECT_ID_050050380]] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050380], $data[OBJECT_ID_050050380]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $list[CONFIG_0014][$data[OBJECT_ID_050050380]] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">投資信託</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050390]) != 0) { ?>
		<div id="text600"><?php echo $list[CONFIG_0015][$data_before[OBJECT_ID_050050390]] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050390], $data[OBJECT_ID_050050390]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $list[CONFIG_0015][$data[OBJECT_ID_050050390]] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">ファンド等</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050400]) != 0) { ?>
		<div id="text600"><?php echo $list[CONFIG_0016][$data_before[OBJECT_ID_050050400]] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050400], $data[OBJECT_ID_050050400]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $list[CONFIG_0016][$data[OBJECT_ID_050050400]] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">商品先物</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050410]) != 0) { ?>
		<div id="text600"><?php echo $list[CONFIG_0017][$data_before[OBJECT_ID_050050410]] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050410], $data[OBJECT_ID_050050410]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $list[CONFIG_0017][$data[OBJECT_ID_050050410]] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">為替証拠金取引（FX）</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050420]) != 0) { ?>
		<div id="text600"><?php echo $list[CONFIG_0018][$data_before[OBJECT_ID_050050420]] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050420], $data[OBJECT_ID_050050420]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $list[CONFIG_0018][$data[OBJECT_ID_050050420]] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
	<div id="horizontal">
		<div id="label300">その他の経験</div>
<?php if (strcmp("", $data_before[OBJECT_ID_0051]) != 0) { ?>
		<div id="text600"><?php echo $list[CONFIG_0019][$data_before[OBJECT_ID_0051]] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
<?php if (strcmp($data_before[OBJECT_ID_0051], $data[OBJECT_ID_0051]) != 0) { ?>
		<div><?php echo $list[CONFIG_0019][$data[OBJECT_ID_0051]] ?></div>
<?php } ?>
	</div>
	
	
	<div id="horizontal">
		<table><tr>
			<td><div id="label300">所有不動産</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050200]) != 0) { ?>
		<div id="text600"><?php echo $list[CONFIG_0005][$data_before[OBJECT_ID_050050200]] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050200], $data[OBJECT_ID_050050200]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $list[CONFIG_0005][$data[OBJECT_ID_050050200]] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>
	
-->	
	
	
	
	<!--div id="horizontal">
		<div id="label300">借入残高</div>
<?php if (strcmp("", $data_before[OBJECT_ID_0029]) != 0) { ?>
		<div id="text600"><?php echo $list[CONFIG_0006][$data_before[OBJECT_ID_0029]] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
<?php if (strcmp($data_before[OBJECT_ID_0029], $data[OBJECT_ID_0029]) != 0) { ?>
		<div><?php echo $list[CONFIG_0006][$data[OBJECT_ID_0029]] ?></div>
<?php } ?>
	</div-->
	
<!--	<div id="horizontal">
		<table><tr>
			<td><div id="label300">取引開始のきっかけ</div></td>
			<td>
				<div id="label100">修正前</div>
<?php if (strcmp("", $data_before[OBJECT_ID_050050230]) != 0) { ?>
		<div id="text600"><?php echo $list[CONFIG_0008][$data_before[OBJECT_ID_050050230]] ?></div>
<?php } else { ?>
		<div id="text600">&nbsp;</div>
<?php } ?>
				<br /><br /><div id="label100">修正後</div>
<?php if (strcmp($data_before[OBJECT_ID_050050230], $data[OBJECT_ID_050050230]) != 0) { ?>
		<div class="lender_confirm_text"><?php echo $list[CONFIG_0008][$data[OBJECT_ID_050050230]] ?></div>
<?php } ?>
			</td>
		</tr></table>
		<hr class="lender_confirm_hr" />
	</div>-->
	<br>
	
	<div id="horizontal">
		<input class="button" type="button" value="戻る" id="<?php echo OBJECT_ID_BTN000010 ?>" onclick="buttonClick('<?php echo EVENT_ID_050060010 ?>');" tabindex="2">
		<input class="button" type="button" value="更新" id="<?php echo OBJECT_ID_BTN000020 ?>" onclick="buttonClick('<?php echo EVENT_ID_050060020 ?>');" tabindex="3">
	</div>
	
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
	<!--input type="hidden" id="<?php echo OBJECT_ID_0071 ?>" name="<?php echo OBJECT_ID_0071 ?>" value="<?php echo $data[OBJECT_ID_0071] ?>"-->
</form>
