<?php $this->Html->script( 'jquery-1.8.2.min.js'                     , array( 'inline' => false )); ?>
<?php $this->Html->script( 'jquery.common.js'    , array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}

function buttonClick2(eventId, count) {
	
	if ('<?php echo EVENT_ID_050300010 ?>' == eventId) {
		flag = confirm ('登録します。よろしいですか？');
	}
	else if ('<?php echo EVENT_ID_050300050 ?>' == eventId) {
		flag = confirm ('更新します。よろしいですか？');
	}
	else if ('<?php echo EVENT_ID_050300060 ?>' == eventId) {
		flag = confirm ('削除します。よろしいですか？');
	}
	
	if (flag) {
		document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
		document.getElementById('<?php echo HIDDEN_ID_000000160 ?>').value = count;
		document.form.submit();
	}
	
	return false;
}

function setDateTime($obj) {
	$obj.value = "<?php echo date(DATETIME_FORMAT) ?>";
}

$(document).ready(function() {
	$('#<?php echo OBJECT_ID_BTN000010 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
	$('#<?php echo OBJECT_ID_BTN000020 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
	$('#<?php echo OBJECT_ID_BTN000030 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
	$('#<?php echo OBJECT_ID_BTN000040 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
	$('#<?php echo OBJECT_ID_BTN000050 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
	
});
<?php $this->Html->scriptEnd(); ?>

<p class="admin-pagetitle">交渉履歴</p>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	
	<div id="horizontal">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000020; ?>" value="出資家情報" onclick="buttonClick('<?php echo EVENT_ID_050300020; ?>');" tabindex="2">
<?php if (strcmp(REFERENCE_FLAG_TRUE, $data[HIDDEN_ID_000000200]) != 0) { ?>
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000030; ?>" value="一覧"       onclick="buttonClick('<?php echo EVENT_ID_050300030; ?>');" tabindex="3">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000040; ?>" value="メニュー"   onclick="buttonClick('<?php echo EVENT_ID_050300040; ?>');" tabindex="4">
<?php } ?>
	</div>
	<br>
	
<?php if (isset($data) && is_array($data)) { ?>
	<table width="100%">
<?php
	if (isset($err) && isset($err[0]) && is_array($err[0])) {
		foreach ($err[0] as $key => $value) {
			echo '<tr><td colspan="3">';
			echo '<p class="error">'.$value.'</p>';
			echo '</td></tr>';
		}
	}
?>
		<tr>
			<td width="33%">
				<div id="horizontal">
					<div id="label50">出資家ID: </div>
					<div class="label150_center"><?php echo $data[OBJECT_ID_050300080]; ?></div>
					<input type="hidden" id="<?php echo OBJECT_ID_050300080 ?>" name="<?php echo OBJECT_ID_050300080 ?>" value="<?php echo $data[OBJECT_ID_050300080]; ?>">
				</div>
			</td>
			<td colspan="2">
				<div id="horizontal">
					<div id="label50">氏名: </div>
					<div class="label400"><?php echo $data[OBJECT_ID_050300090]; ?></div>
					<input type="hidden" id="<?php echo OBJECT_ID_050300090 ?>" name="<?php echo OBJECT_ID_050300090 ?>" value="<?php echo $data[OBJECT_ID_050300090]; ?>">
				</div>
			</td>
		</tr>
<?php 
$count = 0;
while (isset($data[OBJECT_ID_050300100.$count])) { 
	if (($count > 0) && isset($err[$count]) && is_array($err[$count])) {
		foreach ($err[$count] as $key => $value) {
			echo '<tr><td colspan="3">';
			echo '<p class="error">'.$value.'</p>';
			echo '</td></tr>';
		}
	}
?>
			<tr>
				<td>
					<div id="horizontal">
						<div id="label50">日時: </div>
							<div>
								<input type="text" class="text200" id="<?php echo OBJECT_ID_050300010.$count; ?>" name="<?php echo OBJECT_ID_050300010.$count; ?>" value="<?php echo $data[OBJECT_ID_050300010.$count]; ?>"<?php echo $count == 0 ? ' onclick="setDateTime(this)"' : ''; ?>>
							</div>
							<input type="hidden" id="<?php echo OBJECT_ID_050300100.$count; ?>" name="<?php echo OBJECT_ID_050300100.$count; ?>" value="<?php echo $data[OBJECT_ID_050300100.$count]; ?>">
					</div>
				</td>
				<td width="32%">
					<div id="horizontal">
						<div id="label50">相手: </div>
						<div>
							<select id="<?php echo OBJECT_ID_050300020.$count; ?>" name="<?php echo OBJECT_ID_050300020.$count; ?>" tabindex="5">
								<?php foreach($list[CONFIG_0056] as $key => $value): ?>
									<?php $selected = ($key == $data[OBJECT_ID_050300020.$count]) ? " selected" : ""; ?>
									<option value="<?php echo $key ?>"<?php echo $selected ?>><?php echo $value ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</td>
				<td>
					<div id="horizontal">
						<div id="label50">場所: </div>
						<div>
							<select id="<?php echo OBJECT_ID_050300030.$count; ?>" name="<?php echo OBJECT_ID_050300030.$count; ?>" tabindex="6">
								<?php foreach($list[CONFIG_0057] as $key => $value): ?>
									<?php $selected = ($key == $data[OBJECT_ID_050300030.$count]) ? " selected" : ""; ?>
									<option value="<?php echo $key ?>"<?php echo $selected ?>><?php echo $value ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div id="horizontal">
						<div id="label50">方法: </div>
						<div>
							<select id="<?php echo OBJECT_ID_050300040.$count; ?>" name="<?php echo OBJECT_ID_050300040.$count; ?>" tabindex="7">
								<?php foreach($list[CONFIG_0058] as $key => $value): ?>
									<?php $selected = ($key == $data[OBJECT_ID_050300040.$count]) ? " selected" : ""; ?>
									<option value="<?php echo $key ?>"<?php echo $selected ?>><?php echo $value ?></option>
								<?php endforeach; ?>
							</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<select id="<?php echo OBJECT_ID_050300050.$count; ?>" name="<?php echo OBJECT_ID_050300050.$count; ?>" tabindex="8">
								<?php foreach($list[CONFIG_0059] as $key => $value): ?>
									<?php $selected = ($key == $data[OBJECT_ID_050300050.$count]) ? " selected" : ""; ?>
									<option value="<?php echo $key ?>"<?php echo $selected ?>><?php echo $value ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</td>
				<td>
					<div id="horizontal">
						<div id="label50">重要度: </div>
						<div>
							<select id="<?php echo OBJECT_ID_050300060.$count; ?>" name="<?php echo OBJECT_ID_050300060.$count; ?>" tabindex="9">
								<?php foreach($list[CONFIG_0060] as $key => $value): ?>
									<?php $selected = ($key == $data[OBJECT_ID_050300060.$count]) ? " selected" : ""; ?>
									<option value="<?php echo $key ?>"<?php echo $selected ?>><?php echo $value ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</td>
				<td>
					<div id="horizontal">
						<div id="label50">更新: </div>
						<div>
							<input type="text" class="label200" id="<?php echo OBJECT_ID_050300110.$count; ?>" name="<?php echo OBJECT_ID_050300110.$count; ?>" value="<?php echo $data[OBJECT_ID_050300110.$count]; ?>" readonly>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<div id="horizontal">
						<div id="label50">内容: </div>
						<div>
							<textarea style="width:85%;height: 70px;resize:vertical;" name="<?php echo OBJECT_ID_050300070.$count; ?>" id="<?php echo OBJECT_ID_050300070.$count; ?>" tabindex="10"><?php echo $data[OBJECT_ID_050300070.$count]; ?></textarea>
						</div>
					</div>
				</td>
			</tr>
	<?php if ($count > 0) { ?>
			<tr>
				<td colspan="3" align="center">
					<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000050 ?>" value="更新" onclick="buttonClick2('<?php echo EVENT_ID_050300050; ?>', '<?php echo $count; ?>');" tabindex="5">
					<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000060 ?>" value="削除" onclick="buttonClick2('<?php echo EVENT_ID_050300060; ?>', '<?php echo $count; ?>');" tabindex="6" style="margin-left: 100px;">
				</td>
			</tr>
	<?php } else { ?>
			<tr>
				<td colspan="3" align="center">
					<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000010; ?>" value="登録" onclick="buttonClick2('<?php echo EVENT_ID_050300010; ?>', '');" tabindex="1">
				</td>
			</tr>
	<?php } ?>
			<tr><td colspan="3"><hr /><br /></td></tr>
<?php	$count++;
		} ?>
	</table>
<?php } ?>
	<br>
	
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
	<input type="hidden" id="<?php echo HIDDEN_ID_000000160 ?>" name="<?php echo HIDDEN_ID_000000160 ?>" value="">
	<input type="hidden" id="<?php echo HIDDEN_ID_000000200 ?>" name="<?php echo HIDDEN_ID_000000200 ?>" value="<?php echo $data[HIDDEN_ID_000000200]; ?>">
</form>
