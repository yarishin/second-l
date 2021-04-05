<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	var flag = true;
	if ('<?php echo EVENT_ID_020301 ?>' == eventId) {
	}
	if (flag) {
		document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
		document.form.submit();
	}
}
<?php $this->Html->scriptEnd(); ?>

<div id="header_under">
       <div id="breadcrumb-area"><a href='<?php echo URL_SITE_TOP ?>'>HOME</a> > 投資家登録 > 投資家登録申請（完了）</div>
</div>

<div id="content">
    <div id="page-title">投資家登録申請（完了）</div>
    <div id="registration-flow-img"><img src="../img/progress1.jpg" alt="投資家登録の流れ図"></div>
    <!-- ここに埋め込んでみる（メールアドレス） -->
<!-- <img src="https://px.a8.net/cgi-bin/a8fly/sales?pid=s00000016789001&so=<?php echo $user_id ?>&si=3000.1.3000.a8" width="1" height="1"> -->



<script src="//statics.a8.net/a8sales/a8sales.js"></script>
  
  <span id="a8sales"></span>
  <script src="//statics.a8.net/a8sales/a8sales.js"></script>
  <script>
  
  a8sales({
    "pid": "s00000016789001",
    "order_number": "<?php echo $user_id ?>",
    "currency": "JPY",
    "items": [
      {
        "code": "a8",
        "price": 3000,
        "quantity": 1,
      },
    ],
   "total_price": 3000,
});
</script>








<!-- Yahoo Code for your Conversion Page -->
<script type="text/javascript">
    /* <![CDATA[ */
    var yahoo_conversion_id = 1000250070;
    var yahoo_conversion_label = "OkUwCKOw3HsQmIShwgM";
    var yahoo_conversion_value = 0;
    /* ]]> */
</script>
<script type="text/javascript" src="https://s.yimg.jp/images/listing/tool/cv/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="https://b91.yahoo.co.jp/pagead/conversion/1000250070/?value=0&label=OkUwCKOw3HsQmIShwgM&guid=ON&script=0&disvt=true"/>
    </div>
</noscript>


<!-- Google Code for &#12467;&#12531;&#12496;&#12540;&#12472;&#12519;&#12531; Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 942655234;
var google_conversion_label = "Po1BCKOJ73sQgo6_wQM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/942655234/?label=Po1BCKOJ73sQgo6_wQM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>







    
<div id="kari_form_info">
        <b>投資家登録申請が完了しました。</b><br>
        
        <div id="v030complete_text">
            <b>ご登録いただいたメールアドレス宛てに登録確認メールをお送りしましたのでご確認ください。</b><br>
            メールに記載されているURLより、個人情報の登録へお進みください。<br><br>
			※ご利用のメール環境によっては迷惑メールフォルダに入っている場合があります。<br>
			※ご利用のインターネット環境によってはメールの到着までに数分かかる場合があります。<br>
            ※ご利用のインターネット環境によってはメールの到着までに数分かかる場合があります。<br>
            ※15分以上経ってもメールが届かない場合、誤ったメールアドレスをご入力された可能性があります。再度投資家登録申請を行い、正しいメールアドレスを入力してください。<br>
            <span style="color: #ff0000;">注意：現時点では、まだ投資を行うことはできません。</span><br>
 <!-- <?php echo $email ?>  デバック-->           
        </div>

    </div>

 
		<form id="form" name="form" method="post" action="<?php echo $action ?>">
             <input class="kari_form_bt2" type="button" value="トップに戻る" onclick="location.href='<?php echo URL_SITE_TOP ?>'" tabindex="4">
        </form>

</div> <!-- content end -->
