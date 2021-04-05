<?php
App::uses('CakeEmail', 'Network/Email');
 
class EmailsController extends AppController
{
    public function send()
    {
        // メール内容
        $mailbody = array(
            'name' => '山田太郎',
            'content' => "テスト送信です。\nあああああ\n\n123",
        );
 
        // メール送信実行
        $email = new CakeEmail('auto');
        $sent = $email
            ->template('text_mail')         // ←テンプレ名View_Emails_text_text_mail.ctp
            ->viewVars($mailbody)           // ←メール内容配列をテンプレに渡す
            ->from(array('送信元アドレス' => '送信元名'))
            ->to('送信先アドレス')
            ->subject('件名')
            ->send();
 
        if ( $sent ) {
             echo 'メール送信成功！' ;
        } else {
             echo 'メール送信失敗' ;
        }
}
?>
