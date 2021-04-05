<?php $this->Html->css('C990.css', array('inline' => false)); ?>
<?php $this->Html->css('validationEngine.jquery.css', array('inline' => false)); ?>
<?php $this->Html->script( 'jquery-1.8.2.min.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.validationEngine.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'languages/jquery.validationEngine-ja.js', array( 'inline' => false ) ); ?>


<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId, redirectC, redirectA) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.getElementById('<?php echo OBJECT_ID_990000010 ?>').value = redirectC;
	document.getElementById('<?php echo OBJECT_ID_990000020 ?>').value = redirectA;
}
function buttonClick2(eventId, redirectC, redirectA) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.getElementById('<?php echo OBJECT_ID_990000010 ?>').value = redirectC;
	document.getElementById('<?php echo OBJECT_ID_990000020 ?>').value = redirectA;
	document.form.submit();
}
jQuery(document).ready(function(){
   jQuery("#form").validationEngine();
});
<?php $this->Html->scriptEnd(); ?>


<div class="g-bg-color--sky-light">
    <div class="container g-padding-y-80--xs g-padding-y-125--xsm">

		<div class="row col-md-12 g-margin-b-0--xs">
			<div style="margin: 0;position: relative;z-index: 1;">
				<div id="page-title" class="wow slideInUp" data-wow-duration="2s" data-wow-delay="0">確認用</div>
				<div id="page-title-mask" class="wow slideOutDown" data-wow-duration="3s" data-wow-delay=".2s"></div>
			</div>
		</div>

	    <div class="row col-md-12 g-margin-b-0--xs g-margin-b-0--lg" style="position: relative;z-index: 2;">




			<h1>テスト用</h1>
			<p>全画面の表示テスト<br>
				遷移先から戻る時はブラウザの『戻る』を使用するか、URLを直接入力して下さい。
			</p>

			<form id="form" name="form" method="post" action="<?php echo $action ?>">

				<h1 id="c990_Lender">投資家画面</h1>
				<input type="submit" value="サイトトップ"    onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C010 ?>','<?php echo REDIRECT_A010010 ?>');">
				<input type="submit" value="ログイン"        onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C010 ?>','<?php echo REDIRECT_A010020 ?>');">
				<input type="submit" value="案件一覧"        onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C010 ?>','<?php echo REDIRECT_A010030 ?>');">
				<input type="submit" value="PW再発行(入力)"  onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C010 ?>','<?php echo REDIRECT_A010050 ?>');">
				<input type="submit" value="PW再発行(完了)"  onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C010 ?>','<?php echo REDIRECT_A010060 ?>');">
				<br><br>
				<input type="submit" value="仮登録(入力)"    onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C020 ?>','<?php echo REDIRECT_A020010 ?>');">
				<input type="submit" value="仮登録(確認)"    onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C020 ?>','<?php echo REDIRECT_A020020 ?>');">
				<input type="submit" value="仮登録(完了)"    onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C020 ?>','<?php echo REDIRECT_A020030 ?>');">
				<br><br>
				<input type="submit" value="登録(同意)"      onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C030 ?>','<?php echo REDIRECT_A030010 ?>');">
				<input type="submit" value="登録(入力)"      onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C030 ?>','<?php echo REDIRECT_A030020 ?>');">
				<input type="submit" value="登録(確認)"      onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C030 ?>','<?php echo REDIRECT_A030030 ?>');">
				<input type="submit" value="メール送信画面"  onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C030 ?>','<?php echo REDIRECT_A030040 ?>');">
				<input type="submit" value="画像添付確認"    onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C070 ?>','<?php echo REDIRECT_A070020 ?>');">
				<input type="submit" value="画像添付登録"    onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C070 ?>','<?php echo REDIRECT_A070010 ?>');">
				<input type="submit" value="メール送信完了"  onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C030 ?>','<?php echo REDIRECT_A030050 ?>');">
				<input type="submit" value="認証キー入力"    onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C030 ?>','<?php echo REDIRECT_A030060 ?>');">
				<br><br>
				<input type="submit" value="マイページ"      onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C040 ?>','<?php echo REDIRECT_A040010 ?>');">
				<input type="submit" value="投資申請(入力)"  onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C040 ?>','<?php echo REDIRECT_A040020 ?>');">
				<input type="submit" value="投資申請(確認)"  onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C040 ?>','<?php echo REDIRECT_A040030 ?>');">
				<input type="submit" value="投資申請(完了)"  onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C040 ?>','<?php echo REDIRECT_A040040 ?>');">
				<input type="submit" value="投資履歴"        onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C040 ?>','<?php echo REDIRECT_A040050 ?>');">
				<input type="submit" value="配当履歴"        onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C040 ?>','<?php echo REDIRECT_A040060 ?>');">
				<input type="submit" value="同意履歴"        onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C040 ?>','<?php echo REDIRECT_A040110 ?>');">
				<br><br>
				<input type="submit" value="投資家情報"      onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C040 ?>','<?php echo REDIRECT_A040070 ?>');">
				<input type="submit" value="メアド／PW変更"  onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C040 ?>','<?php echo REDIRECT_A040080 ?>');">
				<input type="submit" value="お知らせ一覧"    onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C040 ?>','<?php echo REDIRECT_A040090 ?>');">
				<input type="submit" value="お知らせ内容"    onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C040 ?>','<?php echo REDIRECT_A040100 ?>');">
				<br><br>
				<input type="submit" value="退会済み"               onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C010 ?>','<?php echo REDIRECT_A010910 ?>');">
				<input type="submit" value="ログアウト"             onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C010 ?>','<?php echo REDIRECT_A010920 ?>');">
				<input type="submit" value="セッションタイムアウト" onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C010 ?>','<?php echo REDIRECT_A010930 ?>');">
				<br><br>

				<h1 id="c990_Admin">管理者画面</h1>
				<input type="submit" value="管理者ログイン"     onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C050 ?>','<?php echo REDIRECT_A050010 ?>');">
				<input type="submit" value="管理者メニュー"     onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C050 ?>','<?php echo REDIRECT_A050020 ?>');">
				<br><br>
				<input type="submit" value="投資家一覧"         onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C050 ?>','<?php echo REDIRECT_A050030 ?>');">
				<input type="submit" value="投資家詳細(照会)"   onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C050 ?>','<?php echo REDIRECT_A050040 ?>');">
				<input type="submit" value="投資家詳細(入力)"   onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C050 ?>','<?php echo REDIRECT_A050050 ?>');">
				<input type="submit" value="投資家詳細(確認)"   onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C050 ?>','<?php echo REDIRECT_A050060 ?>');">
				<br><br>
				<input type="submit" value="投資申込一覧(照会)" onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C050 ?>','<?php echo REDIRECT_A050070 ?>');">
				<input type="submit" value="投資申込一覧(指定)" onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C050 ?>','<?php echo REDIRECT_A050080 ?>');">
				<input type="submit" value="投資申込一覧(確認)" onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C050 ?>','<?php echo REDIRECT_A050090 ?>');">
				<input type="submit" value="投資申込一覧(完了)" onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C050 ?>','<?php echo REDIRECT_A050100 ?>');">
				<br><br>
				<input type="submit" value="ファンド一覧"       onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C050 ?>','<?php echo REDIRECT_A050110 ?>');">
				<input type="submit" value="ファンド詳細(照会)" onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C050 ?>','<?php echo REDIRECT_A050120 ?>');">
				<input type="submit" value="ファンド詳細(入力)" onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C050 ?>','<?php echo REDIRECT_A050130 ?>');">
				<input type="submit" value="ファンド詳細(確認)" onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C050 ?>','<?php echo REDIRECT_A050140 ?>');">
				<input type="submit" value="ファンド詳細(完了)" onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C050 ?>','<?php echo REDIRECT_A050150 ?>');">
				<br><br>
				<input type="submit" value="貸付内容(照会)"     onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C050 ?>','<?php echo REDIRECT_A050160 ?>');">
				<input type="submit" value="貸付内容(入力)"     onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C050 ?>','<?php echo REDIRECT_A050170 ?>');">
				<input type="submit" value="貸付内容(確認)"     onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C050 ?>','<?php echo REDIRECT_A050180 ?>');">
				<br><br>
				<input type="submit" value="返済予定一覧(入力)" onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C050 ?>','<?php echo REDIRECT_A050190 ?>');" disabled>
				<input type="submit" value="返済予定一覧(確認)" onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C050 ?>','<?php echo REDIRECT_A050200 ?>');" disabled>
				<input type="submit" value="返済予定一覧(完了)" onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C050 ?>','<?php echo REDIRECT_A050210 ?>');" disabled>
				<br><br>
				<input type="submit" value="配当実行(入力)"     onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C050 ?>','<?php echo REDIRECT_A050220 ?>');" disabled>
				<input type="submit" value="配当実行(確認)"     onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C050 ?>','<?php echo REDIRECT_A050230 ?>');" disabled>
				<input type="submit" value="配当実行(完了)"     onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C050 ?>','<?php echo REDIRECT_A050240 ?>');" disabled>
				<br><br>
				<input type="submit" value="配当実績"           onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C050 ?>','<?php echo REDIRECT_A050250 ?>');" disabled>
				<input type="submit" value="休日設定"           onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C050 ?>','<?php echo REDIRECT_A050260 ?>');">
	
				<input type="submit" value="メール送信(入力)"           onclick="buttonClick('<?php echo EVENT_ID_999999999 ?>','<?php echo REDIRECT_C050 ?>','<?php echo REDIRECT_A050430 ?>');">
	
				<input class="c990-bt" type="button" value="年間取引報告書"     onclick="buttonClick2('<?php echo EVENT_ID_999999999 ?>','','');">
				<br>
			<?php
			foreach ($file_list as $key => $value) {
	
				$fund_id   = substr($value,  0, 5);
				$doc_id    = substr($value,  5, 5);
				$revision  = substr($value, 10, 2);
				$doc_param = substr($value, 13);
				$doc_param = substr($doc_param, 0, strlen($doc_param) - 4);
	
				$get_param = '?'.GET_PARAM_INDEX_FUND_ID.'='.$fund_id
						.'&'.GET_PARAM_INDEX_DOC_ID     .'='.$doc_id
						.'&'.GET_PARAM_INDEX_REVISION   .'='.$revision
						.'&'.GET_PARAM_INDEX_DOC_PARAM  .'='.$doc_param;
	
				echo '<div><a href="'.URL_SITE_TOP.'c060_pdf/v010showpdf'.$get_param.'" target="blank" style="margin-left: 10px;">'.$value.'</a></div>'.LINE_FEED_CODE;
			}
			?>
				<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
				<input type="hidden" id="<?php echo OBJECT_ID_990000010 ?>" name="<?php echo OBJECT_ID_990000010 ?>" value="">
				<input type="hidden" id="<?php echo OBJECT_ID_990000020 ?>" name="<?php echo OBJECT_ID_990000020 ?>" value="">
			</form>




		</div>
	</div>
</div>

