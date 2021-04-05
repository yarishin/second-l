<?php $this->Html->css('validationEngine.jquery.css', array('inline' => false)); ?>
<?php $this->Html->script( 'jquery-1.8.2.min.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'jquery.validationEngine.js', array( 'inline' => false ) ); ?>
<?php $this->Html->script( 'languages/jquery.validationEngine-ja.js', array( 'inline' => false ) ); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
function buttonClick(eventId) {
        document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
}
jQuery(document).ready(function(){
   jQuery("#form").validationEngine();
});
<?php $this->Html->scriptEnd(); ?>
<div id="header_under">
        <div id="breadcrumb-area"><a href='<?php echo URL_SITE_TOP ?>'>HOME</a> > <a href='<?php echo URL_REGISTRATION_PAGE ?>'>新規会員登録</a> > 投資家登録完了</div>
</div>


<div id="content">
    <div id="page-title">投資家情報登録完了</div>
    <div id="registration-flow-img"><img src="../img/progress3.jpg" alt="投資家登録の流れ図"></div>

        <div id="v070inforegistered">
                <h3>
                        この度は、Trust Lendingへお客様情報をご登録をいただきありがとうございます。<br>
                        引き続き、本人確認書類等の画像アップロードをお願い致します。<br>
                </h3>
                <form id="form" name="form" method="post" action="<?php echo $action ?>">
                        <input type="button" id="<?php echo OBJECT_ID_BTN000010 ?>" class="continue_bt" value="続けて画像アップロードへ" onclick="buttonClick('<?php echo EVENT_ID_030070010 ?>');">
                        <input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value=""><br>
                        <font color="red">
                                (ご注意ください)<br>
                                ※お客様情報のご入力から14日以内に画像アップロードを頂けない場合、<br>
                                お客様情報は削除をさせて頂きますので何卒ご了承くださいませ。<br><br><br>
                        </font>

                        <input type="button" class="kari_form_bt2" value="トップに戻る" onclick="location.href='<?php echo URL_SITE_TOP ?>'" tabindex="4">
                       <input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
                </form>
        </div>

<?php
if (isset($validation_errors) && is_array($validation_errors)) {
        foreach ($validation_errors as $key => $values) {
                foreach ($values as $value) {
                        echo '<p class="error">'.$value.'</p>';
                }
                // echo $this->Form->error('Model.'.$key);
        }
}
?>
</div> <!--content end-->
