<?php $this->Html->script( 'jquery-1.8.2.min.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.common.js'    , array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
$(document).ready(function() {
	$('#<?php echo OBJECT_ID_BTN000010 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
	$('#<?php echo OBJECT_ID_BTN000020 ?>').lockScreen('<?php echo HIDDEN_ID_000000010 ?>');
});
<?php $this->Html->scriptEnd(); ?>

<div id="header_under">
	<div id="breadcrumb-area"><a href='<?php echo URL_SITE_TOP ?>'>HOME</a> > <a href='<?php echo URL_REGISTRATION_PAGE ?>'>新規会員登録</a> > 本人確認書類</div>
</div>


<div id="content">
    <div id="page-title">本人確認書類</div>
    <div id="registration-flow-img"><img src="../img/progress3.jpg" alt="投資家登録の流れ図"></div>
	

	<div id="v040identification">
		<h2>
			この度は、Trust Lending へご登録いただき誠にありがとうございます。<br>
			ご本人様確認 及び 口座確認等のため以下の書類をご提出ください。
		</h2>
		<h3>
			① ご本人様確認書類（身分証明書等）<br />
			② 口座確認書類（登録銀行口座情報）<br />
			③ マイナンバー情報
		</h3>
		<table style="margin: 10px auto;width: 500px;font-weight: bold;border: 3px solid #666666;border-collapse: collapse;">
			<tr>
				<td style="border: 1px solid #666666;width: 200px;padding: 10px;">確認書類提出期限</td>
				<td style="border: 1px solid #666666;padding: 10px;font-size: 1.4em;color: red;"><?php echo $data[OBJECT_ID_030040010] ?></td>
			</tr>
		</table>
		
		<form id="form" name="form" method="post" action="<?php echo $action ?>">
			<input type="button" id="<?php echo OBJECT_ID_BTN000010 ?>" class="gazou_bt" value="画像添付用メールを送信" onclick="buttonClick('<?php echo EVENT_ID_030040010 ?>');">
		
			<div style="clear: both;"></div>

			<div style="text-align: left;padding: 20px 10px;">
				<p>
					以下の書類をお手持ちのデジタルカメラ（スマートフォン等）で撮影もしくはスキャナ等で取り込んでいただき、画像をご登録のＥメール にて送信してください。<strong style="font-size: 16px;color: red;">＜ 画像添付用メールアドレスは当ページ内の『 画像添付用メールを送信 』ボタンより取得してください ＞</strong><br />
					ご登録の内容とご提出していただいた確認書類の確認が完了しましたら、取引開始に必要な認証キーを発送致します。
				</p>
				<ul>
					<li>現在、お客様の登録状況は仮登録の状態です。確認書類を <strong>提出期限内</strong> にご提出ください。</li>
					<li>確認書類は、有効期限のあるものは有効期限内のもの。</li>
					<li>既に確認書類をご提出していただいたお客様でこの画面が表示される場合は、当社にて現在内容の確認をさせていただいている状態か、何らかの理由でメールが届いていない可能性があります。お手数ですが、お電話 もしくは <a href="<?php echo URL_CONTACT_PAGE ?>" target="_blank">お問い合わせページ</a> よりお問い合わせください。</li>
				</ul>
			</div>

			<dl>
				<dt>① ご本人様確認書類（いずれか１点）</dt>
				<dd>
					<ul>
						<li>運転免許証（裏面に記載がある場合には裏面も必要）</li>
						<li>各種健康保険証（現住所記載が裏面の場合には表裏両面）</li>
						<li>顔写真ありのマイナンバー（個人番号カード）</li>
						<li>印鑑証明書（発行後3ヶ月以内のもの）</li>
						<li>住民基本台帳カード</li>
						<li>パスポート（写真・現住所記載ページ）</li>
						<li>在留カード又は特別永住者証明書（表裏両面）</li>
						<small style="padding: 10px 10px 10px 0;display: block;">
							<b>※住民基本台帳カード、在留カード又は特別永住者証明書を本人確認書類としてご提出いただく場合には、「表面」「裏面」併せてご送付くださいますようお願い致します。<br />
※コピーや撮影の際には、本人確認書類の端が欠けないようご注意ください。又、必ず書類全面が鮮明な状態で写るようお願い申し上げます。<br />
※顔写真ありのマイナンバー（個人番号カード）のご提出につきましては、本人確認書類としては表面のみ確認させていただきます。<br />
※有効期限の定めのあるものにつきましては、有効期限内のものをご提出いただきますようお願い申し上げます。
</b>
						</small>
					</ul>
				</dd>
			</dl>

			<dl>
				<dt>② 口座確認書類（登録銀行口座、いずれか1点）</dt>
				<dd>
					<ul>
						<li>預金通帳</li>
						<li>キャッシュカード</li>
						<li>ネットバンクなどで通帳等を発行しない口座の場合は、『 銀行名・支店名・口座番号・口座名義人 』が分かる画面のスクリーンショット（ハードコピー）</li>
					</ul>
				</dd>
			</dl>
			<dl>
				<dt>③ マイナンバーのご提出（いずれか1点）</dt>
				<dd>
					<ul>
						<li>顔写真ありのマイナンバー（個人番号カード）（表裏両面）</li>
						<li>顔写真なしのマイナンバー（通知カード）（表面）</li>
						<li>住民票の写し（発行日から6ヶ月以内のものでマイナンバーの記載があるもの）</li>
<small style="padding: 10px 10px 10px 0;display: block;">
							<b>※個人番号カードをご提出いただく場合には、「表面」「裏面」併せてご提出ください。<br />※通知カードをご提出いただく場合には、「裏面」に記載のあるものは「裏面」のコピーも必要です。<br />※コピーや撮影の際には、本人確認書類の端が欠けないようご注意ください。又、必ず書類全面が鮮明な状態で写るようお願い申し上げます。<br />
※住所、氏名、生年月日はご登録いただいている内容と相違ないことをご確認ください。<br />
</b>
						</small>
					</ul>
				</dd>
			</dl>
			<div style="text-align: left;margin: 0 auto;padding: 0 20px;font-size: 12px;">
				※ 画像は小さく（圧縮）すると、文字がつぶれて確認できない場合があります。画像サイズは（ 300KB ～ 1MB ）を目安にお送りください。<br>
				※ お客様がお使いのメールソフト及び描画ソフトなどについての技術的なご質問にはお答えできかねますので予めご了承ください。
			</div>
		
			<div style="margin-top: 80px;">
				<input type="button" id="<?php echo OBJECT_ID_BTN000020 ?>" class="gazou_bt" value="画像添付用メールを送信" onclick="buttonClick('<?php echo EVENT_ID_030040010 ?>');">
				<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
			</div>
		</form>
	</div>


</div> <!--content end-->


