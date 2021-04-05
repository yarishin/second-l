<?php $this->Html->script( 'jquery.min.js' , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.validationEngine.js' , array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'languages/jquery.validationEngine-ja.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'tl_cont.js', array( 'inline' => false ) ); ?>
<?php $this->Html->css( 'contact.css' , array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
	function buttonClick(eventId) {
		document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	}
	
	function messageTypeChange($obj) {
		if($obj.selectedIndex == <?php echo MESSAGE_MOBIL ?>) {
			document.getElementById('<?php echo OBJECT_ID_010070050 ?>').className = "validate[required,custom[phone],maxSize[13]]";
			document.getElementById('hidden_show').style.display = "inline";
		}
		else {
			document.getElementById('<?php echo OBJECT_ID_010070050 ?>').className = "validate[custom[phone],maxSize[13]]";
			document.getElementById('hidden_show').style.display = "none";
		}
	}
	
	jQuery(document).ready(function(){
	   jQuery("#form").validationEngine();
	});
<?php $this->Html->scriptEnd(); ?>

<div class="g-bg-color--sky-light">
	<div class="container g-padding-y-80--xs g-padding-y-125--xsm">

		<div style="margin: 0;position: relative;z-index: 1;">
			<div id="page-title" class="wow slideInUp" data-wow-duration="2s" data-wow-delay="0">お問い合わせ</div>
			<div id="page-title-mask" class="wow slideOutDown hidden-md" data-wow-duration="3s" data-wow-delay=".2s"></div>
		</div>



	

		<form id="form" name="form" method="post" action="<?php echo $action ?>">

	
 		<div class="row" style="position: relative;z-index: 2;">
			<div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1" style="margin-bottom:1em;">
				<p class="g-font-size-16--xs g-font-size-16--md g-font-size-14--sm g-font-size-16--lg">
					お問い合わせの回答には数日お時間をいただく場合がございます。また、内容によっては返信を差し控えさせていただく場合もございますので、あらかじめご了承下さい。
				</p>
                	</div>
		</div>

		<div class="row" style="margin-bottom:1em;cposition: relative;z-index: 2;">
			<div class="col-md-3 col-md-offset-2 col-sm-4 col-sm-offset-1">
				<b>氏名（漢字）</b><small class="Required g-margin-b-5--xs g-margin-b-0--sm">必須</small>
			</div>
			<div class="col-md-5 col-sm-6">
					<input type="text" name="<?php echo OBJECT_ID_010070010 ?>" id="<?php echo OBJECT_ID_010070010 ?>" value="<?php echo $data[OBJECT_ID_010070010] ?>" class="validate[required,custom[onlyEm],maxSize[20]] form-control" tabindex="1">
			</div>
		</div>

		<div class="row" style="margin-bottom:1em;">
			<div class="col-md-3 col-md-offset-2 col-sm-4 col-sm-offset-1">
				<b>氏名（フリガナ）</b><small class="Required g-margin-b-5--xs g-margin-b-0--sm">必須</small>
			</div>
			<div class="col-md-5 col-sm-6">
				<input type="text" name="<?php echo OBJECT_ID_010070020 ?>" id="<?php echo OBJECT_ID_010070020 ?>" value="<?php echo $data[OBJECT_ID_010070020] ?>" class="validate[required,custom[onlyEmKana],maxSize[40]] form-control" tabindex="2">
			</div>
		</div>

		<div class="row" style="margin-bottom:1em;">
			<div class="col-md-3 col-md-offset-2 col-sm-4 col-sm-offset-1">
				<b>ＩＤ</b>
			</div>
			<div class="col-md-5 col-sm-6">
				<input type="text" name="<?php echo OBJECT_ID_010070030 ?>" id="<?php echo OBJECT_ID_010070030 ?>" value="<?php echo $data[OBJECT_ID_010070030] ?>" class="validate[sizeAccountNumber[<?php echo OBJECT_ID_010070030 ?>],custom[onlyNumber]] form-control" tabindex="3">
			</div>
		</div>

		<div class="row" style="margin-bottom:1em;">
			<div class="col-md-3 col-md-offset-2 col-sm-4 col-sm-offset-1">
				<b>メールアドレス</b><small class="Required g-margin-b-5--xs g-margin-b-0--sm">必須</small>
			</div>
			<div class="col-md-5 col-sm-6">
				<input type="text" name="<?php echo OBJECT_ID_010070040 ?>" id="<?php echo OBJECT_ID_010070040 ?>" value="<?php echo $data[OBJECT_ID_010070040] ?>" class="validate[required,custom[email],custom[onlyLetterNumberSymbol],maxSize[200]] form-control" tabindex="4"><br>
					<span style="font-size:1em;text-align:right;">※半角英数字で入力してください。</span>
			</div>
		</div>

		<div class="row" style="margin-bottom:1em;">
			<div class="col-md-3 col-md-offset-2 col-sm-4 col-sm-offset-1">
				<b>お電話番号</b>
    			</div>
			<div class="col-md-5 col-sm-6">
				<input type="text" name="<?php echo OBJECT_ID_010070050 ?>" id="<?php echo OBJECT_ID_010070050 ?>" value="<?php echo $data[OBJECT_ID_010070050] ?>" class="validate[custom[phone],maxSize[13]] form-control" tabindex="5">
			</div>
		</div>

<!--			<div class="row" style="margin-bottom:1em;">
				<div class="col-md-3 col-md-offset-2 col-sm-4 col-sm-offset-1">
					<b>ご連絡方法</b><small class="Required" g-margin-b-5--xs g-margin-b-0--sm>必須</small>
                		</div>
                		<div class="col-md-5 col-sm-6">
					<select id="<?php echo OBJECT_ID_010070090 ?>" name="<?php echo OBJECT_ID_010070090 ?>" class="validate[required] form-control" tabindex="6" style="padding:4px;" onchange="messageTypeChange(this);">
						        <?php foreach($list[CONFIG_0049] as $key => $value): ?>
                                    <?php $selected = ($data[OBJECT_ID_010070090] == $key ) ? " selected" : ""; ?>
                                    <option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
                            <?php endforeach; ?>
					</select>
				</div>
			</div>
-->

		<div class="row" style="margin-bottom:1em;">
			<div class="col-md-3 col-md-offset-2 col-sm-4 col-sm-offset-1">
				<b>お問い合わせ　件名</b><small class="Required g-margin-b-5--xs g-margin-b-0--sm">必須</small>
			</div>
			<div class="col-md-5 col-sm-6">
				<input type="text" name="<?php echo OBJECT_ID_010070070 ?>" id="<?php echo OBJECT_ID_010070070 ?>" value="<?php echo $data[OBJECT_ID_010070070] ?>" class="validate[required,custom[onlyEm],maxSize[100]] form-control" tabindex="7">
			</div>
		</div>

		<div class="row">
			<div class="col-md-3 col-md-offset-2 col-sm-4 col-sm-offset-1">
				<b>お問い合わせ　内容</b><small class="Required g-margin-b-5--xs g-margin-b-0--sm">必須</small>
			</div>
			<div class="col-md-5 col-sm-6">
				<textarea name="<?php echo OBJECT_ID_010070080 ?>" id="<?php echo OBJECT_ID_010070080 ?>" value="<?php echo $data[OBJECT_ID_010070080] ?>" class="validate[required,custom[notByteSymbol],maxSize[1000]] form-control" style="resize: vertical;border:1px solid #ccc" rows="5" tabindex="8"><?php echo $data[OBJECT_ID_010070080] ?></textarea>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2 col-md-offset-5 col-sm-4 col-sm-offset-4 col-xs-12">
				<input type="submit" value="確認" style="font-size:1.2em;" class="g-box-shadow__dark-lightest-v4 text-uppercase btn-block s-btn s-btn--xs s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" onclick="buttonClick('<?php echo EVENT_ID_010070010 ?>');" tabindex="9">
					<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
			</div>
		</div>
		</form>




	    <div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1" style="background: #73caff;padding-top: 0.5em;margin-top:2em;">
				<h5><b>郵送先</b></h5>
            </div>
       	    </div>

		<!--	<div class="row" style="margin:2em auto;">
		<div class="col-md-4 col-md-offset-2 col-sm-6 col-xs-12">
				<p class="g-font-size-24--xs g-font-size-24--md g-font-size-24--sm g-font-size-24--lg "><b>SEVENSTARサポート</b></p>
			</div>
            <div class="col-md-4 col-sm-6 col-xs-12">
				<p class="g-font-size-24--xs g-font-size-24--md g-font-size-24--sm g-font-size-24--lg">
					<b>00-0000-0000</b><br>
					<span class="g-font-size-16--xs g-font-size-14--md g-font-size-14--sm g-font-size-16--lg">（受付時間：平日10：00 ～ 18：00）</span>
				</p>
			</div>
		</div>-->






                      
		<div class="row">

            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0" style="padding:2em;">
				<p class="g-font-size-16--xs g-font-size-16--md g-font-size-16--sm g-font-size-16--lg">〒108-0022<br> 東京都港区海岸3-15-15<br>セブンスター株式会社　不動産特定事業　お客様係</p>
            </div>
        </div>



	</div>
</div>

