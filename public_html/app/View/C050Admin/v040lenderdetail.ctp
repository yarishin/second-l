<?php $this->Html->script( 'jquery-1.8.2.min.js' , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.common.js'    , array( 'inline' => false ) ); ?>

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
	$('#<?php echo OBJECT_ID_BTN000050 ?>').lockScreen();
	$('#<?php echo OBJECT_ID_BTN000060 ?>').lockScreen();
});
<?php $this->Html->scriptEnd(); ?>

<p class="admin-pagetitle">投資家詳細（照会）</p>

<form id="form" name="form" method="post" action="<?php echo $action ?>">
	
	<div>投資家の詳細を確認する。</div>
	<br>
	<div id="horizontal">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000050 ?>" value="交渉履歴"   onclick="buttonClick('<?php echo EVENT_ID_050040050 ?>');">
<?php if (strcmp(USER_STATUS_CODE_APPLIED, $data[OBJECT_ID_050050510]) == 0) { ?>
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000020 ?>" value="承認／拒否" onclick="buttonClick('<?php echo EVENT_ID_050040020 ?>');">
<?php } ?>
<?php
if (strcmp(REFERENCE_FLAG_TRUE, $data[HIDDEN_ID_000000200]) != 0) {
?>
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000010 ?>" value="更新"       onclick="buttonClick('<?php echo EVENT_ID_050040010 ?>');">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000060 ?>" value="PDF参照"    onclick="buttonClick('<?php echo EVENT_ID_050040060 ?>');">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000030 ?>" value="一覧"       onclick="buttonClick('<?php echo EVENT_ID_050040030 ?>');">
		<input class="button" type="button" id="<?php echo OBJECT_ID_BTN000040 ?>" value="メニュー"   onclick="buttonClick('<?php echo EVENT_ID_050040040 ?>');">
<?php
	if (strcmp(USER_STATUS_CODE_APPLIED, $data[OBJECT_ID_050050510]) < 0) {
?>
		<a href="<?php echo URL_SITE_TOP.REDIRECT_C060."/".REDIRECT_A060020; ?>" target="blank" class="pink-a">認証キー印刷</a>
<?php
	}
}
?>
	</div>
	<br>
	
	<div id="horizontal">
		<div id="label300">ユーザID</div>
		<div class="label300"><?php echo $data[OBJECT_ID_050050010] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">管理番号</div>
		<div class="label300"><?php echo $data[OBJECT_ID_050050015] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">メールアドレス</div>
		<div class="label300"><?php echo $data[OBJECT_ID_050050020] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">メールマガジン登録</div>
		<div class="label300"><?php echo $list[CONFIG_0046][$data[OBJECT_ID_050050486]] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">お名前【漢字】</div>
		<div class="label300"><?php echo $data[OBJECT_ID_050050030] ?></div>
		<div class="label300"><?php echo $data[OBJECT_ID_050050040] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">お名前【全角カナ】</div>
		<div class="label300"><?php echo $data[OBJECT_ID_050050050] ?></div>
		<div class="label300"><?php echo $data[OBJECT_ID_050050060] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">性別</div>
		<div class="label300"><?php echo empty($data[OBJECT_ID_050050070]) ? HTML_HALF_WIDTH_SPACE : $list[CONFIG_0023][$data[OBJECT_ID_050050070]] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">生年月日（西暦）【半角】</div>
		<div class="label300"><?php echo $data[OBJECT_ID_050050080] ?>年<?php echo $list[CONFIG_0038][$data[OBJECT_ID_050050090]] ?>月<?php echo $list[CONFIG_0039][$data[OBJECT_ID_050050100]] ?>日</div>
	</div>
	<div id="horizontal">
		<div id="label300">郵便番号【半角ハイフンなし】</div>
		<div class="label300"><?php echo $data[OBJECT_ID_050050110] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">都道府県</div>
		<div class="label300"><?php echo empty($data[OBJECT_ID_050050120]) ? HTML_HALF_WIDTH_SPACE : $list[CONFIG_0021][$data[OBJECT_ID_050050120]] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">市区町村丁目番地【全角】</div>
		<div class="label600"><?php echo $data[OBJECT_ID_050050130] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">建物名【全角】</div>
		<div class="label600"><?php echo $data[OBJECT_ID_050050140] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">電話番号【半角ハイフン有り】</div>
		<div class="label300"><?php echo $data[OBJECT_ID_050050150] ?></div>
	</div>
	<!--<div id="horizontal">
		<div id="label300">携帯電話番号</div>
		<div class="label300"><?php echo $data[OBJECT_ID_050050160] ?></div>
	</div>-->
	<!--<div id="horizontal">
		<div id="label300">住居の状況</div>
		<div class="label300"><?php echo empty($data[OBJECT_ID_050050170]) ? HTML_HALF_WIDTH_SPACE : $list[CONFIG_0002][$data[OBJECT_ID_050050170]] ?></div>
	</div>-->
	<!--<div id="horizontal">
		<div id="label300">家族構成</div>
		<div class="label300"><?php echo empty($data[OBJECT_ID_050050180]) ? HTML_HALF_WIDTH_SPACE : $list[CONFIG_0003][$data[OBJECT_ID_050050180]] ?></div>
	</div>-->
	<div id="horizontal">
		<div id="label300">職業</div>
		<div class="label300"><?php echo empty($data[OBJECT_ID_050050240]) ? HTML_HALF_WIDTH_SPACE : $list[CONFIG_0009][$data[OBJECT_ID_050050240]] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">お勤め先【全角】</div>
		<div class="label600"><?php echo $data[OBJECT_ID_050050250] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">年収</div>
		<div class="label300"><?php echo empty($data[OBJECT_ID_050050260]) ? HTML_HALF_WIDTH_SPACE : $list[CONFIG_0010][$data[OBJECT_ID_050050260]] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">金融資産</div>
		<div class="label300"><?php echo empty($data[OBJECT_ID_050050190]) ? HTML_HALF_WIDTH_SPACE : $list[CONFIG_0004][$data[OBJECT_ID_050050190]] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">不動産投資への興味</div>
		<div class="label600"><?php echo empty($data[OBJECT_ID_050050460]) ? HTML_HALF_WIDTH_SPACE : $list[CONFIG_0031][$data[OBJECT_ID_050050460]] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">投資の経験</div>
		<div class="label300"><?php echo empty($data[OBJECT_ID_050050370]) ? HTML_HALF_WIDTH_SPACE : $list[CONFIG_0013][$data[OBJECT_ID_050050370]] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">投資の目的</div>
		<div class="label300"><?php echo empty($data[OBJECT_ID_050050440]) ? HTML_HALF_WIDTH_SPACE : $list[CONFIG_0020][$data[OBJECT_ID_050050440]] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">投資可能金額</div>
		<div class="label300"><?php echo empty($data[OBJECT_ID_050050450]) ? HTML_HALF_WIDTH_SPACE : $list[CONFIG_0030][$data[OBJECT_ID_050050450]] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">投資の方針</div>
		<div class="label300"><?php echo empty($data[OBJECT_ID_050050470]) ? HTML_HALF_WIDTH_SPACE : $list[CONFIG_0032][$data[OBJECT_ID_050050470]] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">希望運用期間</div>
		<div class="label300"><?php echo empty($data[OBJECT_ID_050050480]) ? HTML_HALF_WIDTH_SPACE : $list[CONFIG_0033][$data[OBJECT_ID_050050480]] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">金融機関区分</div>
		<div class="label300"><?php echo empty($data[OBJECT_ID_050050300]) ? HTML_HALF_WIDTH_SPACE : $list[CONFIG_0011][$data[OBJECT_ID_050050300]] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">金融機関名【全角】</div>
		<div class="label600"><?php echo $data[OBJECT_ID_050050310] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">金融機関コード</div>
		<div class="label300"><?php echo $data[OBJECT_ID_050050315] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">支店名【全角】</div>
		<div class="label600"><?php echo $data[OBJECT_ID_050050320] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">支店コード</div>
		<div class="label300"><?php echo $data[OBJECT_ID_050050325] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">種目</div>
		<div class="label300"><?php echo empty($data[OBJECT_ID_050050330]) ? HTML_HALF_WIDTH_SPACE : $list[CONFIG_0012][$data[OBJECT_ID_050050330]] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">記号(ゆうちょ選択時のみ)</div>
		<div class="label300"><?php echo $data[OBJECT_ID_050050340] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">口座番号【半角】</div>
		<div class="label300"><?php echo $data[OBJECT_ID_050050350] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">振込口座番号(ゆうちょ選択時のみ)</div>
		<div class="label300"><?php echo $data[OBJECT_ID_050050355] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">口座名義人【全角カナ】</div>
		<div class="label600"><?php echo $data[OBJECT_ID_050050360] ?></div>
	</div>








	<!--<div id="horizontal">
		<div id="label300">勤務先郵便番号</div>
		<div class="label300"><?php echo $data[OBJECT_ID_050050270] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">勤務先住所</div>
		<div class="label600"><?php echo $data[OBJECT_ID_050050280] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">勤務先電話番号</div>
		<div class="label300"><?php echo $data[OBJECT_ID_050050290] ?></div>
	</div>-->
	<!--<div id="horizontal">
		<div id="label300">債券（公社債）</div>
		<div class="label300"><?php echo empty($data[OBJECT_ID_050050380]) ? HTML_HALF_WIDTH_SPACE : $list[CONFIG_0014][$data[OBJECT_ID_050050380]] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">投資信託</div>
		<div class="label300"><?php echo empty($data[OBJECT_ID_050050390]) ? HTML_HALF_WIDTH_SPACE : $list[CONFIG_0015][$data[OBJECT_ID_050050390]] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">ファンド等</div>
		<div class="label300"><?php echo empty($data[OBJECT_ID_050050400]) ? HTML_HALF_WIDTH_SPACE : $list[CONFIG_0016][$data[OBJECT_ID_050050400]] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">商品先物</div>
		<div class="label300"><?php echo empty($data[OBJECT_ID_050050410]) ? HTML_HALF_WIDTH_SPACE : $list[CONFIG_0017][$data[OBJECT_ID_050050410]] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">為替証拠金取引（FX）</div>
		<div class="label300"><?php echo empty($data[OBJECT_ID_050050420]) ? HTML_HALF_WIDTH_SPACE : $list[CONFIG_0018][$data[OBJECT_ID_050050420]] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">所有不動産</div>
		<div class="label300"><?php echo empty($data[OBJECT_ID_050050200]) ? HTML_HALF_WIDTH_SPACE : $list[CONFIG_0005][$data[OBJECT_ID_050050200]] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">取引開始のきっかけ</div>
		<div class="label300"><?php echo empty($data[OBJECT_ID_050050230]) ? HTML_HALF_WIDTH_SPACE : $list[CONFIG_0008][$data[OBJECT_ID_050050230]] ?></div>
	</div>-->










	<div id="horizontal">
		<div id="label300">本人確認書類</div>
		<div class="label300"><?php echo empty($data[OBJECT_ID_050050490]) ? HTML_HALF_WIDTH_SPACE : $list[CONFIG_0040][$data[OBJECT_ID_050050490]] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">口座情報画像</div>
		<div class="label300"><?php echo empty($data[OBJECT_ID_050050500]) ? HTML_HALF_WIDTH_SPACE : $list[CONFIG_0040][$data[OBJECT_ID_050050500]] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">状態</div>
		<div class="label300"><?php echo empty($data[OBJECT_ID_050050510]) ? HTML_HALF_WIDTH_SPACE : $list[CONFIG_0024][$data[OBJECT_ID_050050510]] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">仮登録日時</div>
		<div class="label300"><?php echo $data[OBJECT_ID_050050520] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">有効期限</div>
		<div class="label300"><?php echo $data[OBJECT_ID_050050530] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">登録申請日時</div>
		<div class="label300"><?php echo $data[OBJECT_ID_050050550] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">承認日時</div>
		<div class="label300"><?php echo $data[OBJECT_ID_050050560] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">承認管理者</div>
		<div class="label300"><?php echo $data[OBJECT_ID_050050570] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">認証キー</div>
		<div class="label300"><?php echo $data[OBJECT_ID_050050580] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">認証日時</div>
		<div class="label300"><?php echo $data[OBJECT_ID_050050590] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">拒否日時</div>
		<div class="label300"><?php echo $data[OBJECT_ID_050050600] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">拒否管理者</div>
		<div class="label300"><?php echo $data[OBJECT_ID_050050610] ?></div>
	</div>
	<div id="horizontal">
		<div id="label300">拒否理由</div>
		<div class="label600"><?php echo $data[OBJECT_ID_050050620] ?></div>
	</div>
	<br>
	
	<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
	<input type="hidden" id="<?php echo HIDDEN_ID_000000200 ?>" name="<?php echo HIDDEN_ID_000000200 ?>" value="<?php echo $data[HIDDEN_ID_000000200]; ?>">
</form>
