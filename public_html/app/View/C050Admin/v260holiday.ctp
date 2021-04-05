<?php $this->Html->css('validationEngine.jquery.css', array('inline' => false)); ?>
<?php $this->Html->script( 'jquery-1.8.2.min.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.validationEngine.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'languages/jquery.validationEngine-ja.js', array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
function listChange(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
function checkChange(month, day) {
	
}
jQuery(document).ready(function(){
   jQuery("#form").validationEngine();
});
<?php $this->Html->scriptEnd(); ?>

<p class="admin-pagetitle">休日設定</p>
<p>設定を行う年を指定して下さい。</p>

<?php
	if (isset($err) && is_array($err)) {
		foreach ($err as $key => $value) {
			echo '<p class="error">'.$value.'</p>';
		}
	}
?>

<?php
if (isset($validation_errors) && is_array($validation_errors)) {
	foreach ($validation_errors as $key => $values) {
		foreach ($values as $value) {
			echo '<p class="error">'.$value.'</p>';
		}
		// echo $this->Form->error('Model.'.$key);
	}
}
?>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="button" value="1年追加" onclick="buttonClick('<?php echo EVENT_ID_050260020 ?>');">
		<input class="button" type="button" value="決定" onclick="buttonClick('<?php echo EVENT_ID_050260030 ?>');">
		<input class="button" type="button" value="メニュー" onclick="buttonClick('<?php echo EVENT_ID_050260040 ?>');">
	</div>
	<div id="horizontal">
		<select class="select" id="<?php echo OBJECT_ID_050260010 ?>" name="<?php echo OBJECT_ID_050260010 ?>" onchange="listChange('<?php echo EVENT_ID_050260010 ?>')" tabindex="1">
<?php
	foreach ($c_year_list as $keys => $values) {
		foreach ($values as $value) {
			$selected = "";
			if (strcmp($c_year, $value[COLUMN_0200020]) == 0) {
				$selected = " selected";
			}
			echo "			<option value=\"".$value[COLUMN_0200020]."\"".$selected.">".$value[COLUMN_0200020]."</option>\n";
		}
	}
?>
		</select>
	</div>
	<div id="horizontal">
<?php
	$count = 0;
	$location = 1;
	$month_number = 1;
	foreach ($calendar_list as $keys => $values) {
		if ($location == 1) {
			echo "		<table id=\"month_table\">\n";
			echo "			<tr id=\"month_tr\">\n";
			echo "				<td id=\"month_th\" colspan=\"7\">".$month_number."月</td>\n";
			echo "			</tr>\n";
			echo "			<tr id=\"month_tr\">\n";
			echo "				<td id=\"month_th\">日</td>\n";
			echo "				<td id=\"month_th\">月</td>\n";
			echo "				<td id=\"month_th\">火</td>\n";
			echo "				<td id=\"month_th\">水</td>\n";
			echo "				<td id=\"month_th\">木</td>\n";
			echo "				<td id=\"month_th\">金</td>\n";
			echo "				<td id=\"month_th\">土</td>\n";
			echo "			</tr>\n";
			$month_number++;
		}
		foreach ($values as $value) {
			$count++;
			$id        = $value[COLUMN_0200010];
			$c_year    = $value[COLUMN_0200020];
			$c_month   = $value[COLUMN_0200030];
			$c_day     = $value[COLUMN_0200040];
			$c_weekday = $value[COLUMN_0200050];
			$c_holiday = $value[COLUMN_0200060];
			
			echo "<input type=\"hidden\" id=\"id_".$c_month."_".$c_day."\" name=\"id_".$c_month."_".$c_day."\" value=\"".$id."\">";
			
			if ((strcmp("1", $c_day) == 0) || (strcmp(WEEKDAY_CODE_SUN, $c_weekday) == 0)) {
				if (strcmp("1", $c_day) == 0) {
					$location = $c_weekday + 1;
				}
				echo "			<tr id=\"month_tr\">\n";
				$difference = 6 - $c_weekday;
				for ( $i = $difference; $i < 6 ; $i++) {
					echo "				<td id=\"month_td\"></td>\n";
				}
			}
			$checked = "";
			if (strcmp("1", $c_holiday) == 0) {
				$checked = " checked";
			}
			echo "				<td id=\"month_td\">".$c_day."<br><input type=\"checkbox\" id=\"check".$c_month."_".$c_day."\" name=\"check".$c_month."_".$c_day."\" ".$checked."></td>\n";

			// 月末判定
			if (!checkdate($c_month, $c_day + 1, $c_year)) {
				
				//月末の場合
				if ($location <= 28) {
					echo "			</tr>\n";
					echo "			<tr id=\"month_tr\">\n";
					for ( $i = 0; $i <= 6 ; $i++) {
						echo "				<td id=\"month_td\"></td>\n";
					}
					echo "			</tr>\n";
					echo "			<tr id=\"month_tr\">\n";
					for ( $i = 0; $i <= 6 ; $i++) {
						echo "				<td id=\"month_td\"></td>\n";
					}
				} elseif ($location <= 35) {
					if ($location == 35) {
						echo "			</tr>\n";
						echo "			<tr id=\"month_tr\">\n";
					} else {
						$difference = 6 - $c_weekday;
						for ( $i = 0; $i < $difference ; $i++) {
							echo "				<td id=\"month_td\"></td>\n";
						}
						echo "			</tr>\n";
						echo "			<tr id=\"month_tr\">\n";
					}
					for ( $i = 0; $i <= 6 ; $i++) {
						echo "				<td id=\"month_td\"></td>\n";
					}
				} elseif ($location <= 42) {
					if ($location < 42) {
						$difference = 6 - $c_weekday;
						for ( $i = 0; $i < $difference ; $i++) {
							echo "				<td id=\"month_td\"></td>\n";
						}
					}
				}
				echo "			</tr>\n";
				echo "		</table>\n";
				$location = 42;
				
			} else {
				if (strcmp(WEEKDAY_CODE_SAT, $c_weekday) == 0) {
					echo "			</tr>\n";
				}
			}
			if (($location >= 42)
					&& ((strcmp("3", $c_month) == 0)
							|| (strcmp("6", $c_month) == 0)
							|| (strcmp("9", $c_month) == 0))) {
				echo "	</div>\n";
				echo "	<div id=\"horizontal\">\n";
			}
		}
		if ($location < 42) {
			$location++;
		} else {
			$location = 1;
		}
		
	}
?>
	</div>
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
</form>
