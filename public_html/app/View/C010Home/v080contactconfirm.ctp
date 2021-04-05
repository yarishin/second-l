<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300&display=swap&subset=japanese" rel="stylesheet">


<?php $this->Html->script( 'jquery.min.js' , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.common.js'    , array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
<?php $this->Html->scriptEnd(); ?>



<div class="g-bg-color--sky-light">
 <div class="container g-padding-y-80--xs g-padding-y-125--sm">


                    <div class="row">
                      <div class="col-md-12 text-center">

			<div id="page-title" style="margin:1em auto;">お問い合わせ</div>
                      </div> 
                     </div>
  


		<form id="form" name="form" method="post" action="<?php echo $action ?>">

                    <div class="row">
                      <div class="col-md-8 col-md-offset-2 col-sm-12">
			<h5>
				ご入力いただいた以下の内容にお間違いが無ければ、『 決定 』をクリックしてください。<br>
				修正される場合は『 戻る 』をクリックしてください。
			</h5>
		      </div>
		    </div>
			
                      <div class="row" style="margin-top:2em;">
                          <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                        <table class="table">
                            <tbody>
                                   <tr>
                                      <th class="col-md-4">氏名（漢字）</th>
                                      <td class="col-md-6"><?php echo $data[OBJECT_ID_010070010] ?></td>
                                   </tr>

                                   <tr>
                                      <th>氏名（フリガナ）</th>
                                      <td><?php echo $data[OBJECT_ID_010070020] ?></td>
                                   </tr>

                                   <tr>
                                      <th>ＩＤ</th>
                                      <td><?php echo $data[OBJECT_ID_010070030] ?></td>
                                   </tr>

                                   <tr>
                                      <th>メールアドレス</th>
                                      <td><?php echo $data[OBJECT_ID_010070040] ?></td>
                                   </tr>

                                   <tr>
                                      <th>お電話番号</th>
                                      <td><?php echo $data[OBJECT_ID_010070050] ?></td>
                                   </tr>
                                   
                                   <tr>
                                      <th>お問い合わせ  件名</th>
                                      <td><?php echo $data[OBJECT_ID_010070070] ?></td>
                                   </tr>

                                   <tr>
                                      <th>お問い合わせ  内容</th>
                                      <td><?php echo $data[OBJECT_ID_010070080] ?></td>
                                   </tr>
                             </tbody>
                         </table>
                       </div>
                     </div>







		<div class="row">
			<div class="col-md-2 col-md-offset-4 col-sm-3 col-sm-offset-3 col-xs-6">

				<input type="button" value="戻る" style="font-size:1.2em;" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" onclick="buttonClick('<?php echo EVENT_ID_010080010 ?>');" tabindex="1">

			</div>
			<div class="col-md-2 col-sm-3 col-xs-6">
				<input type="button" value="決定" style="font-size:1.2em;" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" onclick="buttonClick('<?php echo EVENT_ID_010080020 ?>');" tabindex="2">
				<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
			</div>
		</div>
		</form>
	</div>
	
</div> <!--content end-->

