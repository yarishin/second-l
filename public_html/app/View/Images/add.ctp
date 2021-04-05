<?php echo $this->Html->script('img', array('inline' => false)); ?>
<?php echo $this->Html->script('up_img', array('inline' => false)); ?>
<?php $this->Html->css('mypage.css', array('inline' => false)); ?>



<div>
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

        <!--まとめ-->
        <div class="row" style="margin-bottom:2em;">
            <div class="col-lg-10 col-lg-offset-1 add_list">
                <ul>
                    <li class="g-font-size-16--lg g-font-size-12--md g-font-size-14--sm g-font-size-14--xs">アップロードは、１ファイルごとに行ってください。</li>
                    <li class="g-font-size-16--lg g-font-size-12--md g-font-size-14--sm g-font-size-14--xs">アップロードされた画像は、「アップロード済画像一覧」に表示されます。</li>
                    <li class="g-font-size-16--lg g-font-size-12--md g-font-size-14--sm g-font-size-14--xs">一度に複数のファイルをアップロードすることはできません。</li>
                    <li class="g-font-size-16--lg g-font-size-12--md g-font-size-14--sm g-font-size-14--xs">必要な確認書類のアップロードが完了しましたら、「<b style="color:#f00;">確認書類の登録完了</b>」ボタンを押してください。</li>
                    <li class="g-font-size-16--lg g-font-size-12--md g-font-size-14--sm g-font-size-14--xs">個人情報の提供・委託・開示などの請求に関する取扱いについては<a href="<?php echo URL_PRIVACY_PAGE ?>" target="_blank">「個人情報保護方針」</a>をご覧ください。</li>
                </ul>
                <p>
                    <a class="text-uppercase btn-block s-btn btn-setsumei g-radius--50 g-padding-x-50--xs g-margin-b-20--xs g-font-size-18--lg g-font-size-16--md g-font-size-16--sm g-font-size-16--xs" href="../../contents/c_documents.php" target="_blank" style="padding: 10px 0;letter-spacing:0.1em;">各種確認書類については<br class="visible-xs">こちらをご確認ください。</a>
                </p>
            </div>


        </div>
        <!--まとめend-->

                
<form id="form" name="form" method="post" action="<?php echo $action ?>" style="margin-top:0;">
	<?php
		if (count($images) <=0) {
		}else{
			print "

				<div class=\"row\" style=\"margin-top:1em;\">
					<div class=\"col-md-12\">
						<div class=\"row\">
							<div class=\"col-md-12 col-sm-12 col-xs-12\">
			                    <p class=\"g-font-size-26--xs g-font-size-22--sm g-font-size-22--lg\">
			                        <span class=\"glyphicon glyphicon-file\" aria-hidden=\"true\"></span>&nbsp;<b>アップロード済画像一覧</b>
			                    </p>
                                <p>
                                    アップロードされた画像に間違いがないかご確認ください。<br>
                                    引き続き、他の書類をアップロードされる場合は、このページの「画像アップローダー」よりアップロードをお願いします。
                                </p>
							</div>
						</div>
					</div>
				</div>

            ";
    ?>

        <div class="uploadimg-area g-padding-y-30--xs" style="margin-left: 3px;margin-right: 3px;">
            <div class="row-height">
        <input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
                <?php foreach($images as $image): ?>
                    <div class="col-md-3 col-sm-6 col-xs-12" style="overflow: hidden;padding:1em;">
                        <div class="wow fadeInUp" data-wow-duration=".5" data-wow-delay=".2s">
                            <div class="row s-plan-v1 g-text-center--sm g-text-left--xs g-bg-color--white g-padding-y-20--xs" style="border: 1px solid #eeeeee;">
                                <p class="col-md-12 col-sm-12 col-xs-6 g-font-size-14--md g-font-size-10--sm g-font-size-12--xs g-margin-b-5--xs" style="height:5em;">
                                    <?php echo $image["Image"]["body"]; ?><br>
                                    <?php echo $image["Image"]["created"]; ?>
                                </p>
                                <p class="col-md-12 col-sm-12 col-xs-6">
                                    <img class="img-responsive g-box-shadow__dark-lightest-v4" style="margin: 0 auto;" src="<?php echo $this->Upload->uploadUrl($image['Image'], 'Image.img', array('style' => 'small')); ?>" onclick="imgwin('<?php echo $this->Upload->uploadUrl($image['Image'], 'Image.img', array('style' => 'original')); ?>')" />
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="row" style="margin: 30px 5px 50px 5px;">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 stripe_add">
            <div class="col-md-9 col-sm-8 g-padding-y-20--xs">
                <div class="g-row-col--5">
                    <p style="margin:0;color:red;font-size:1em;">
                        必要書類をすべてアップロードし、内容に問題が無ければ、[<b>確認書類の登録完了</b>]ボタンを押してください。<br class="visible-lg">
                        [確認書類の登録完了]ボタンは一回のみ行ってください。複数回押された場合は、本人確認に時間を要する場合がございます。
                    </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 g-padding-y-20--xs">
                <div class="g-row-col--5 imgupload_end_bt g-text-right--md g-text-center--xs">
                    <input type="submit" style="font-size:1em;" class="animated pulse infinite g-box-shadow__dark-lightest-v4 s-btn s-btn--xs s-btn--red-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs g-margin-b-0--sm" value="確認書類の登録完了" onclick="buttonClick('<?php echo EVENT_ID_040010090 ?>');" tabindex="44">
                </div>
            </div>
	</div>
        </div>
            
    <?php
		}
	?>

</form>


        <div class="row g-margin-t-20--xs">
            <div class="col-lg-12 col-lg-offset-0 col-md-10 col-md-offset-1">

                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <p class="g-font-size-26--xs g-font-size-22--sm g-font-size-22--lg">
                            <span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span>&nbsp;<b>画像アップローダー</b>
                        </p>

                    <?php echo $this->Form->error('Image.img');?>
                    <?php 
                        echo $this->Form->create('Image', array(
                                                 'type' => 'file',
                                                 'class' => 'form-horizontal',
                                                 'inputDefaults' => array(
                                                 'legend' => false, 
                                                 'label' => false, 
                                                 'div' => false),));?>
                    </div>
                </div>

                <div class="row">


                    <div class="col-md-12 g-margin-b-10--xs g-margin-b-15--lg">
                        <?php echo $this->Form->hidden('Image.title', array( 'default' => $user_id )); ?> <!-- ユーザーIDをデータベースに書き込み-->
                        <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".1s">
                            <div class="s-plan-v1 g-bg-color--white g-padding-y-50--xs" style="overflow: hidden;border: 1px solid #eeeeee;">
                                <div class="col-lg-5 g-text-left--xs">
                                    <h3 class="g-font-size-18--xs g-color--primary g-margin-b-30--xs">
                                        <b>１．確認書類を項目から指定</b>
                                    </h3>
                                </div>
                                <div class="col-lg-7 g-margin-b-40--xs">
                                    <?php echo $this->Form->select('Image.body',array(
                                        array('name' => '項目を選択してください', 'value' => '', 'hidden'),
                                                      array('name' => '===本人確認書類===', 'value' => '===本人確認書類===', 'style' => 'color:#fff;background-color:#666;', 'disabled'),
                                                      array('name' => 'マイナンバーカード（表）', 'value' => 'マイナンバーカード（表）'),
                                                      array('name' => '免許証（表もしくは裏）', 'value' => '免許証（表もしくは裏）'),
                                                      array('name' => '健康保険証（表もしくは裏）', 'value' => '健康保険証（表もしくは裏）'),
                                                      array('name' => '在留カード（表もしくは裏）', 'value' => '在留カード（表もしくは裏）'),
                                                      array('name' => '特別永住者証明書（表もしくは裏）', 'value' => '特別永住者証明書（表もしくは裏）'),
                                                      array('name' => '国民年金手帳（必要ページ）', 'value' => '国民年金手帳（必要ページ）'),
                                                      array('name' => '身体障害者手帳（必要ページ）', 'value' => '身体障害者手帳（必要ページ）'),
                                                      array('name' => 'その他（上記以外、領収書など）', 'value' => 'その他（上記以外、領収書など）'),
                                                      array('name' => '=マイナンバー確認書類=', 'value' => '=マイナンバー確認書類=', 'style' => 'color:#fff;background-color:#666;', 'disabled' ),
                                                      array('name' => 'マイナンバーカード（裏）', 'value' => 'マイナンバーカード（裏）'),
                                                      array('name' => '通知カード（表）', 'value' => '通知カード（表）'),
                                                      array('name' => '通知カード（裏）', 'value' => '通知カード（裏）'),
                                                      array('name' => '==口座情報確認書類==', 'value' => '==口座情報確認書類==', 'style' => 'color:#fff;background-color:#666;', 'disabled' ),
                                                      array('name' => '口座情報確認書類（通帳等）', 'value' => '口座情報確認書類（通帳等）'),
                                        ),

                                                   array('empty' => false)
                                       );
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 g-margin-b-10--xs g-margin-b-15--lg">
                        <div class="wow fadeIn" data-wow-duration=".4" data-wow-delay=".2s">
                            <div class="s-plan-v1 g-bg-color--white g-padding-y-50--xs" style="overflow: hidden;border: 1px solid #eeeeee;">
                                <div class="col-lg-5 g-text-left--xs">
                                    <h3 class="g-font-size-18--xs g-color--primary g-margin-b-30--xs">
                                        <b>２．ファイルを選択</b>
                                    </h3>
                                </div>
                                <div class="col-lg-7 g-margin-b-40--xs">
                                    <?php echo $this->Form->file('Image.img', array('id' => 'fileInput', 'class' => 'input-file uniform_on')); ?>
                                   <p>
                                        ※「.jpg/.gif/.png」のみアップロード可能。<br>
                                        ※最大サイズ8MBまで。
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 g-margin-b-10--xs g-margin-b-15--lg">
                        <div class="wow fadeIn" data-wow-duration=".5" data-wow-delay=".3s">
                            <div class="s-plan-v1 g-bg-color--white g-padding-y-50--xs" style="overflow: hidden;border: 1px solid #eeeeee;">
                                <div class="col-lg-5 g-text-left--xs">
                                    <h3 class="g-font-size-18--xs g-color--primary g-margin-b-30--xs">
                                        <b>３．画像を確認</b>
                                    </h3>
                                </div>
                                <div class="col-lg-7 g-margin-b-40--xs">
                                    <div class="controls"><pp></pp></div>  <!-- サムネイル画像表示 -->
                                    <p style="color:#f00;">
                                        ※一度アップロードすると画像の削除はできませんので、必ずご確認ください。
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 g-margin-b-10--xs g-margin-b-15--lg">
                        <div class="wow fadeIn" data-wow-duration=".7" data-wow-delay=".4s">
                            <div class="s-plan-v1 g-bg-color--white g-padding-y-50--xs" style="overflow: hidden;border: 1px solid #eeeeee;">
                                <div class="col-lg-5 g-text-left--xs">
                                    <h3 class="g-font-size-18--xs g-color--primary g-margin-b-30--xs">
                                        <b>４．[アップロード]を押す</b>
                                    </h3>
                                </div>
                                <div class="col-lg-7 g-margin-b-40--xs is_step4">
                                    <div class="submit"><input type="submit" id="imgupload-btn" value="アップロード"/></div></form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-12 col-md-12">
                    <p style="font-size:1em;color:#a94442;">
                        <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
                        <b>
                            1～4の手順を繰り返し、必要な画像をアップロードしてください。<br>
                            アップロードがすべて完了しましたら、[確認書類の登録完了]ボタンを押してください。
                         </b>
                     </p>
                </div>

            </div>
        </div>

        <script>
            document.getElementById('fileInput').disabled = true;
            document.getElementById('imgupload-btn').style.visibility="hidden";
            
            var select = document.getElementById('ImageBody');
            select.onchange = function(){
                document.getElementById('fileInput').disabled = false;
            }
            var select = document.getElementById('fileInput');
            select.onchange = function(){
                document.getElementById('imgupload-btn').style.visibility="visible";
            }
        </script>









     

	
	
</div>
</div>
</div>
