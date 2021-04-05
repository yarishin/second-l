<?php echo $this->Html->script('img', array('inline' => false)); ?>
<?php echo $this->Html->script('up_img', array('inline' => false)); ?>
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300&display=swap&subset=japanese" rel="stylesheet">

<div class="container g-padding-y-80--xs g-padding-y-125--sm">
                                  <div class="row">
                                      <div class="col-xs-12 visible-xs">
                                          <img class="img-responsive center-block animated pulse" style="line-height: 0;" src="../img/pr3-1.png" alt="投資家登録の流れ図">
                                       </div>
                                      <div class="col-md-2 col-md-offset-2 col-sm-3  hidden-xs">
                                          <img class="img-responsive center-block" style="line-height: 0;" src="../img/pr1-0.png" alt="投資家登録の流れ図">
                                       </div>
                                      <div class="col-md-2  col-sm-3  hidden-xs">
                                          <img class="img-responsive center-block" style="line-height: 0;" src="../img/pr2-0.png" alt="投資家登録の流れ図">
                                       </div>
                                      <div class="col-md-2  col-sm-3  hidden-xs animated pulse">
                                          <img class="img-responsive center-block" style="line-height: 0;" src="../img/pr3-1.png" alt="投資家登録の流れ図">
                                       </div>
                                      <div class="col-md-2  col-sm-3  hidden-xs">
                                          <img class="img-responsive center-block" style="line-height: 0;" src="../img/pr4-0.png" alt="投資家登録の流れ図">
                                       </div>
                                 
                                 </div>


                    <div class="row">
                      <div class="col-md-12 text-center">
			<div id="page-title" style="margin:1em auto;">確認書類のご登録</div>
                      </div> 
                     </div>




                    <div class="row" style="margin-bottom:1em;">
                      <div class="col-md-8 col-md-offset-2">
                        <div style="background:#73caff;padding:0.5em;"> <b>本人確認書類【確認項目：住所、氏名、生年月日、有効期限、発行元】</b></div>
                        <p>下記のいずれか・・・・※顔写真がない確認書類の場合は2点必要です<br><b>[1点でいいもの]</b><br>個人番号カード／運転免許証／住民基本台帳カード／パスポート／在留カード／特別永住者証明書<br><b>[2点必要なもの]</b><br>健康保険証各種／住民票</p>
　　　　　　　　　　　</div>
                   </div>


                    <div class="row" style="margin-bottom:1em;">
                      <div class="col-md-8 col-md-offset-2">
                         <div style="background:#73caff;padding:0.5em;"><b>マイナンバー確認書類　【確認項目：住所、氏名、生年月日、個人番号】</b></div>
<p>個人番号カード、通知カードのいずれか</p>

　　　　　　　　　　　</div>
                   </div>

                    <div class="row" style="margin-bottom:1em;">
                      <div class="col-md-8 col-md-offset-2">
                        <div style="background:#73caff;padding:0.5em;"><b>口座情報確認書類　【確認項目：銀行名、支店名、口座番号、口座名義名】</b></div>
<p>キャッシュカード、通帳、口座情報（ネットバンキングの画面等）のいずれか<br><span style="color:#f00;">※クレジットカード番号およびセキュリティコードは情報取得致しませんので該当箇所は伏せて登録ください。</span></p>
　　　　　　　　　　　</div>
                   </div>



<div class="row">
    <div class="col-md-6 col-md-offset-3">
	<img class="img-responsive center-block" src="../img/syorui_img.svg" style="margin-top:2em;">
    </div>
</div>


                    <div class="row" style="margin-bottom:1em;">
                      <div class="col-md-8 col-md-offset-2">
			※登録内容に不備があった場合、別途ご案内をお送りします。
                        
		    </div>
                   </div>




    
             

 
	<div class="row" style="margin-top:2em;">

		<div class="col-md-5 col-md-offset-1">
<?php echo $this->Form->error('Image.img');?>
<?php 
     echo $this->Form->create('Image', array(
                                       'type' => 'file',
                                       'class' => 'form-horizontal',
                                       'inputDefaults' => array(
                                                                'legend' => false, 
                                                                 'label' => false, 
                                                                 'div' => false),));?>




                   <?php echo $this->Form->hidden('Image.title', array(
                                                                          'default' => $user_id
                                                                          )); ?> <!-- ユーザーIDをデータベースに書き込み-->
                    
       
               <b>確認書類(選択)</b><br>
                <?php echo $this->Form->select('Image.body',array(
                                  '個人番号カード（表）' => '個人番号カード（表）',
                                  '個人番号カード（裏）' => '個人番号カード（裏）',
                                  '運転免許証（表）' => '運転免許証（表）',
                                  '運転免許証（裏）' => '運転免許証（裏）',
                                  '住民基本台帳カード（表）' => '住民基本台帳カード（表）',
                                  '住民基本台帳カード（裏）' => '住民基本台帳カード（裏）',
                                  'パスポート（顔写真箇所）' => 'パスポート（顔写真箇所）',
                                  'パスポート（住所記載箇所）' => 'パスポート（住所記載箇所）',
                                  '在留カード（表）' => '在留カード（表）',
                                  '在留カード（裏）' => '在留カード（裏）',
                                  '特別永住者証明書（表）' => '特別永住者証明書（表）',
                                  '特別永住者証明書（裏）' => '特別永住者証明書（裏）',
                                  '各種健康保険証（表）' => '各種健康保険証（表）',
                                  '各種健康保険証（裏）' => '各種健康保険証（裏）',
                                  '住民票' => '住民票',
                                  '通知カード' => '通知カード',
                                  'キャッシュカード' => 'キャッシュカード',
                                  '預金通帳' => '預金通帳',
                                  '口座情報' => '口座情報',
                                  'その他' => 'その他'),
                            array('empty' => '項目を選んでください')
                   ); ?>
       
<!-- 画像ファイル指定 -->
<div class="control-group" style="margin-top:0.5em;padding-bottom:1em;">
                <label class="control-label" for="fileInput"></label>

                <?php echo $this->Form->file('Image.img', array('id' => 'fileInput', 'class' => 'input-file uniform_on'));?>

			<p style="margin-top:0.5em;">※登録可能な画像ファイル形式は「.jpg/.gif/.png」となります。<br>
			※登録可能サイズは1枚8MBまでとなります。</p>
                 <div class="controls"><pp></pp>  <!-- サムネイル画像表示 -->
               <p style="margin-top:0.5em;">・鮮明に表示されていることをご確認ください<br>・「氏名/生年月日/住所」は相違ないか<br>・有効期限内のものであるか<br>・「銀行名/支店名/口座番号/口座名義人名」は相違ないか</p>

 <?php echo $this->Form->end('登録する');?>

			<img class="img-responsive center-block" src="../img/bad-example-drvlic.jpg" width="100%" alt="確認書類の悪い例" style="margin-top:2em;width:90%;">
</div>



		</div>

</div>
		<div class="col-md-5" style="background:#ccc;padding:0.5em;">
<p style="color:#f00;">登録済画像</p>
<table style="width:100%;">
        <tr>
                
                <th>登録画像</th>
                <!--<th>USER_ID</th>-->
                <th>確認書類</th>
                <th>登録日</th>
        </tr>


        <?php foreach($images as $image): ?>
        <tr>
<td><img src="<?php echo $this->Upload->uploadUrl($image['Image'], 'Image.img', array('style' => 'small'));?>" onclick="imgwin('<?php echo $this->Upload->uploadUrl($image['Image'], 'Image.img', array('style' => 'original'));?>')" /></td>      

                <!--<td><?php echo $image['Image']['title'];?></td>-->
                <td><?php echo $image['Image']['body'];?></td>
                <td><?php echo $image['Image']['created'];?></td>
        </tr>
        <?php endforeach;?>



</table>	
	</div>

</div>






</div>
</div>



