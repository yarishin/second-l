<?php
require_once "../../Controller/Component/CommonTag.php";
CommonTag::includeFiles();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Trust Finance Crowd Funding</title>
	<link href="../favicon.ico" type="image/x-icon" rel="icon" />
	<link href="../favicon.ico" type="image/x-icon" rel="shortcut icon" />
	<link rel="stylesheet" type="text/css" href="../css/base.css" />
    <link rel="stylesheet" type="text/css" href="../css/toppage.css" />
	<link rel="stylesheet" type="text/css" href="../css/contact.css" />
	
	<script type="text/javascript" src="../js/tl_cont.js"></script>
	
	<script type="text/javascript">
	//<![CDATA[
	function buttonClick(eventId) {
		var flag = true;
		if ('e020301' == eventId) {
		}
		if (flag) {
			document.getElementById('event_id').value = eventId;
			document.form.submit();
		}
	}
	//]]>
	</script>
</head>
<body>

<?php CommonTag::header(); ?>
    
    <div id="header_under">
       <div id="breadcrumb-area"><a href='<?php echo URL_SITE_TOP ?>'>HOME</a> > お問い合わせ</div>
    </div>
    
    <div id="content">
        <div id="page-title">お問い合わせ</div>
		<div id="contact_area">
			<div id="contact_info"> <!-- contact_info -->
				<h2>お電話等でのお問い合わせ</h2>
				<dl>
					<div>
						<dt><h3>電話番号</h3></dt>
						<dd><h3>03-6453-9969</h3>（受付時間：平日10：00 ～ 18：00）</dd>
					</div>
					
					<div>
						<dt>FAX番号</dt>
						<dd>03-6453-9953</dd>
					</div>
					
					<div>
						<dt>E-mail</dt>
						<dd>
							<script type="text/javascript">
								secretaddress();
							</script>
						</dd>
					</div>

					<div>	
						<dt>郵送の場合</dt>
						<dd>〒108-0022 東京都港区海岸3-9-15 LOOP-X 7F<br>エーアイトラスト株式会社　トラストレンディング事業部</dd>
					</div>
				</dl>
			</div> <!-- contact_info end -->

			<div id="contact_form"> <!-- contact_form -->
				<h2>フォームからのお問い合わせ</h2>
				
				<form>
					<p>
						下記フォームに必要事項をご入力いただき、確認ボタンをクリックしてください。
					</p>
					<div class="contact_input_line">
						<div class="contact_input_title1">氏名<small class="Required">必須</small></div>
						<div class="contact_input_point1">
							<input type="text" tabindex="1">
						</div>
					</div>
					
					<div class="contact_input_line">
						<div class="contact_input_title1">フリガナ<small class="Required">必須</small></div>
						<div class="contact_input_point1">
							<input type="text" tabindex="2">
						</div>
					</div>
					
					<div class="contact_input_line">
						<div class="contact_input_title1">ＩＤ</div>
						<div class="contact_input_point2">
							<input type="text" tabindex="3">
						</div>
					</div>
					
					<div class="contact_input_line">
						<div class="contact_input_title1">
							メールアドレス<small class="Required">必須</small>
						</div>
						<div class="contact_input_point1">
							<input type="text" tabindex="4"><br>
							<span>※半角英数字で入力してください。</span>
						</div>
					</div>
					
					<div class="contact_input_line">
						<div class="contact_input_title1">お電話番号</div>
						<div class="contact_input_point2">
							<input type="text" tabindex="5">
						</div>
					</div>
					
					<div class="contact_input_line">
						<div class="contact_input_title1">お問い合わせ　種類<small class="Required">必須</small></div>
						<div class="contact_input_point1">
							<select tabindex="6">
								<option>--- 選択して下さい ---</option>
								<option>新規会員登録について</option>
								<option>投資について</option>
								<option>お借入について</option>
								<option>取材について</option>
								<option>その他</option>
							</select>
						</div>
					</div>
					
					<div class="contact_input_line">
						<div class="contact_input_title1">お問い合わせ　件名<small class="Required">必須</small></div>
						<div class="contact_input_point1">
							<input type="text" tabindex="7">
						</div>
					</div>
					
					<div class="contact_input_line" style="border-bottom: 1px solid #cccccc;">
						<div class="contact_input_title1">お問い合わせ　内容<small class="Required">必須</small></div>
						<div class="contact_input_point1">
							<textarea tabindex="8"></textarea>
						</div>
					</div>
					
					<div id="contact_button_area">
						<input type="submit" value="確認" class="kari_form_bt2" tabindex="9">
						<input type="hidden" value="">
					</div>
				</form>
				
				
				
			</div> <!-- contact_form end -->
		</div> <!-- contact_area end -->
    </div> <!-- content end -->
    
<?php CommonTag::footer(); ?>
</body>
</html>
