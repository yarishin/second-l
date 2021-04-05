<?php echo $this->Html->script('img', array('inline' => false)); ?>
<?php echo $this->Html->script('up_img', array('inline' => false)); ?>
<?php $this->Html->css('mypage.css', array('inline' => false)); ?>

<div class="g-bg-color--sky-light">
	<div class="container g-padding-y-80--xs g-padding-y-125--sm">

		<div class="row" style="border-bottom:1px solid #ccc;">

			<div class="col-xs-12 visible-xs" style="margin-bottom:1.5em;">
				<p style="color:#333333;text-align:center;margin-top:1em;font-size:1.5em;">必要書類提出</p>
				<img class="img-responsive center-block animated pulse" style="line-height: 0;width:50%;" src="../img/shinki3_1.png" alt="出資者情報登録の流れ図">

			</div>

			<div class="col-lg-2 col-lg-offset-2 col-md-3 col-md-offset-0 col-sm-3 col-sm-offset-0 hidden-xs" style="margin-bottom:1em;">
				<div class="row">
					<div class="col-lg-10 col-md-10 col-sm-10">
						<p class="g-font-size-16--sm g-font-size-14--lg" style="color:#6d6d6d;text-align:center;margin:0;">会員登録</p>
						<img class="img-responsive center-block" style="line-height: 0;" src="../img/shinki1_2.png" alt="出資者情報登録の流れ図">
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2" style="padding-top:2.5em;padding-left:0;">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="font-size:30px;color:#6d6d6d;"></span>
					</div>
				</div>
			</div>

			<div class="col-lg-2 col-md-3 col-sm-3 hidden-xs">
				<div class="row">
					<div class="col-md-10 col-sm-10 g-font-size-10--md">
						<p class="g-font-size-16--sm g-font-size-14--lg" style="color:#6d6d6d;text-align:center;margin:0;">出資者情報登録</p>
						<img class="img-responsive center-block" style="line-height: 0;" src="../img/shinki2_2.png" alt="出資者情報登録の流れ図">

					</div>
					<div class="col-md-2 col-sm-2" style="padding-top:2.5em;padding-left:0;">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="font-size:30px;color:#6d6d6d;"></span>
					</div>
				</div>
			</div>

			<div class="col-lg-2 col-md-3 col-sm-3 hidden-xs">
				<div class="row">
					<div class="col-md-10 col-sm-10 g-font-size-10--md">
						<p class="g-font-size-16--sm g-font-size-14--lg" style="color:#333333;text-align:center;margin:0;font-size:1.5em;"><b>必要書類提出</b></p>
						<img class="img-responsive center-block animated pulse" style="line-height: 0;" src="../img/shinki3_1.png" alt="出資者情報登録の流れ図">
 
					</div>
					<div class="col-md-2 col-sm-2" style="padding-top:2.5em;padding-left:0;">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="font-size:30px;color:#333333;"></span>
					</div>
				</div>
			</div>

			<div class="col-lg-2 col-md-3 col-sm-3 hidden-xs">
				<div class="row">
					<div class="col-lg-10 col-md-10 col-sm-10">
						<p class="g-font-size-14--lg g-font-size-14--sm" style="color:#6d6d6d;text-align:center;margin:0;">本人確認キー入力</p>
						<img class="img-responsive center-block" style="line-height: 0;" src="../img/shinki4_2.png" alt="出資者情報登録の流れ図">

					</div>
				</div>
			</div>
                                 
		</div>

		<div class="row">
			<div class="col-md-12 text-center">
				<div id="page-title" style="margin:1em auto;">
					確認書類アップロード
				</div>
			</div> 
		</div>


<div class="row" style="margin-bottom:0.5em;">
<div class="col-lg-10 col-lg-offset-1">
<a class="btn btn-info btn-lg btn-block" style="white-space:normal;" href="../../contents/c_documents.php" target="_blank">各種確認書類についてはこちらをご確認ください。</a>

</div>
</div>





	<div class="row" style="margin-top:1em;">
		<div class="col-md-10 col-md-offset-1">
			<div class="row">
				<div class="col-md-5 col-sm-6 col-xs-12">
			<p class="g-font-size-26--xs g-font-size-22--sm g-font-size-22--lg"><span class="glyphicon glyphicon-file" aria-hidden="true"></span><b>アップロード済画像一覧</b></p>
				</div>

			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			

	<table style="width:100%;">
        <tr>
                <th style="background-color:#333;padding:0.5em;color:#fff;border-radius:10px 0 0 0;">確認書類</th>
                <th style="background-color:#333;padding:0.5em;color:#fff;">アップロード済画像</th>
                <!--<th>USER_ID</th>-->
                <th style="background-color:#333;padding:0.5em;color:#fff;border-radius:0 10px 0 0;">アップロード日</th>
        </tr>


        <?php foreach($images as $image): ?>
        <tr>
                <td style="border-bottom:1px solid #ccc;padding:0.5em;background-color:#fff;"><?php echo $image['Image']['body'];?></td>
<td style="border-bottom:1px solid #ccc;padding:0.5em;background-color:#fff;"><img src="<?php echo $this->Upload->uploadUrl($image['Image'], 'Image.img', array('style' => 'small'));?>" onclick="imgwin('<?php echo $this->Upload->uploadUrl($image['Image'], 'Image.img', array('style' => 'original'));?>')" /></td>      

                <!--<td style="border-bottom:1px solid #ccc;padding:0.5em;"><?php echo $image['Image']['title'];?></td>-->
                <td style="border-bottom:1px solid #ccc;padding:0.5em;background-color:#fff;"><?php echo $image['Image']['created'];?></td>
        </tr>
        <?php endforeach;?>


	</table>
		
		
	</div>
</div>
		</div>



	</div>
</div>
</div>
</div>
