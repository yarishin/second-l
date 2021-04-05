<?php $this->Html->css('validationEngine.jquery.css', array('inline' => false)); ?>
<?php $this->Html->script( 'jquery-1.8.2.min.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.validationEngine.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'languages/jquery.validationEngine-ja.js', array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
}
jQuery(document).ready(function(){
   jQuery("#form").validationEngine();
});
<?php $this->Html->scriptEnd(); ?>

<p>配当実績</p>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	<div id="horizontal">
		<input class="button" type="submit" value="メニュー" onclick="buttonClick('<?php echo EVENT_ID_050250010 ?>');" tabindex="9">
	</div>
	<div id="horizontal">
		<div id="label100">ファンドID</div>
		<div>
			<input type="text" name="<?php echo SEARCH_ID_050250010 ?>" id="<?php echo SEARCH_ID_050250010 ?>" value="<?php echo $data[SEARCH_ID_050250010] ?>" class="text100" tabindex="">
		</div>
	</div>
	<div id="horizontal">
		<div id="label100">ファンド名</div>
		<div>
			<input type="text" name="<?php echo SEARCH_ID_050250020 ?>" id="<?php echo SEARCH_ID_050250020 ?>" value="<?php echo $data[SEARCH_ID_050250020] ?>" class="text100" tabindex="2">
		</div>
	</div>
	<div id="horizontal">
		<div id="label100">出資家ID</div>
		<div>
			<input type="text" name="<?php echo SEARCH_ID_050250030 ?>" id="<?php echo SEARCH_ID_050250030 ?>" value="<?php echo $data[SEARCH_ID_050250030] ?>" class="text100" tabindex="3">
		</div>
	</div>
	<div id="horizontal">
		<div id="label100">出資家名</div>
		<div>
			<input type="text" name="<?php echo SEARCH_ID_050250040 ?>" id="<?php echo SEARCH_ID_050250040 ?>" value="<?php echo $data[SEARCH_ID_050250040] ?>" class="text100" tabindex="4">
			<input type="text" name="<?php echo SEARCH_ID_050250050 ?>" id="<?php echo SEARCH_ID_050250050 ?>" value="<?php echo $data[SEARCH_ID_050250050] ?>" class="text100" tabindex="5">
		</div>
	</div>
	<div id="horizontal">
		<div id="label100">配当月</div>
		<div>
			<input type="text" name="<?php echo SEARCH_ID_050250060 ?>" id="<?php echo SEARCH_ID_050250060 ?>" value="<?php echo $data[SEARCH_ID_050250060] ?>" class="text50" tabindex="6">年
			<input type="text" name="<?php echo SEARCH_ID_050250070 ?>" id="<?php echo SEARCH_ID_050250070 ?>" value="<?php echo $data[SEARCH_ID_050250070] ?>" class="text50" tabindex="7">月
		</div>
	</div>
	<div id="horizontal">
		<input class="button" type="submit" value="絞込み" onclick="buttonClick('<?php echo EVENT_ID_050250020 ?>');" tabindex="8" disabled>
	</div>
	<br>
	
<?php
if (isset($user_list) && is_array($user_list)) {
	echo '<div id="horizontal">';
	echo '	<div id="label100">ID</div>';
	echo '	<div id="label100">氏名</div>';
	echo '	<div id="label200">氏名カナ</div>';
	echo '	<div id="label300">外国籍氏名</div>';
	echo '	<div id="label200">住所</div>';
	echo '	<div id="label100">状態</div>';
	echo '	<div id="label200">仮登録日</div>';
	echo '	<div id="label200">登録申請日</div>';
	echo '	<div id="label200">承認日</div>';
	echo '</div>';
	foreach ($user_list as $key => $values) {
		foreach ($values as $value) {
			$user_id            =  $value[OBJECT_ID_0008];
			$user_kanji         =  (strcmp("", $value[OBJECT_ID_0009]) != 0) ? $value[OBJECT_ID_0009].$value[OBJECT_ID_0010] : "&nbsp;";
			$user_kana          =  (strcmp("", $value[OBJECT_ID_0011]) != 0) ? $value[OBJECT_ID_0011].$value[OBJECT_ID_0012] : "&nbsp;";
			$user_alphabet      =  (strcmp("", $value[OBJECT_ID_0013]) != 0) ? $value[OBJECT_ID_0013]." ".$value[OBJECT_ID_0014]." ".$value[OBJECT_ID_0015] : "&nbsp;";
			$user_address1      =  (isset($value[OBJECT_ID_0020]) && !is_null($value[OBJECT_ID_0020]) && strcmp("", $value[OBJECT_ID_0020]) != 0) ? $list[CONFIG_0021][$value[OBJECT_ID_0020]] : "&nbsp;";
			$user_status        =  (isset($value[OBJECT_ID_0055]) && !is_null($value[OBJECT_ID_0055]) && strcmp("", $value[OBJECT_ID_0055]) != 0) ? $list[CONFIG_0024][$value[OBJECT_ID_0055]] : "&nbsp;";
			$user_interim       =  (strcmp("", $value[OBJECT_ID_0056]) != 0) ? $value[OBJECT_ID_0056] : "&nbsp;";
			$user_application   =  (strcmp("", $value[OBJECT_ID_0059]) != 0) ? $value[OBJECT_ID_0059] : "&nbsp;";
			$user_approval      =  (strcmp("", $value[OBJECT_ID_0060]) != 0) ? $value[OBJECT_ID_0060] : "&nbsp;";
			echo '<div id="horizontal">';
			echo '	<div id="label100"><a href="#" onclick="userIdClick(\''.EVENT_ID_070304.'\',\''.$user_id.'\')">'.$user_id.'</a></div>';
			echo '	<div id="label100">'.$user_kanji      .'</div>';
			echo '	<div id="label200">'.$user_kana       .'</div>';
			echo '	<div id="label300">'.$user_alphabet   .'</div>';
			echo '	<div id="label200">'.$user_address1   .'</div>';
			echo '	<div id="label100">'.$user_status     .'</div>';
			echo '	<div id="label200">'.$user_interim    .'</div>';
			echo '	<div id="label200">'.$user_application.'</div>';
			echo '	<div id="label200">'.$user_approval   .'</div>';
			echo '</div>';
		}
	}
}
?>
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
</form>
