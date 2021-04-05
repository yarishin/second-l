<?php

        Router::connect('/maintenance',               array('controller' => 'c910_maintenance', 'action' => 'index'));
        //ファンドリスト
        Router::connect('/home_fundlist',               array('controller' => 'c010_home', 'action' => 'v030fundlist'));
        //ログイン
        Router::connect('/home_login',                  array('controller' => 'c010_home', 'action' => 'v020login'));
        //ログアウト
        Router::connect('/home_logout',                 array('controller' => 'c010_home', 'action' => 'v920logout'));
        //contact
        Router::connect('/home_contactinput',           array('controller' => 'c010_home', 'action' => 'v070contactinput'));
        //contactconfirm
        Router::connect('/home_contactconfirm',           array('controller' => 'c010_home', 'action' => 'v080contactconfirm'));
        //contactconfirm
        Router::connect('/home_contactcomplete',           array('controller' => 'c010_home', 'action' => 'v090contactcomplete'));
        //password再発行
        Router::connect('/home_reissue',                array('controller' => 'c010_home', 'action' => 'v050reissue'));
        //退会済み
        Router::connect('/home_deleted',                array('controller' => 'c010_home', 'action' => 'v910deleted'));
        //セッションタイムアウト
        Router::connect('/home_sessiontimeout',         array('controller' => 'c010_home', 'action' => 'v930sessiontimeout'));
 

        //新規登録
        Router::connect('/tmp_registration_input',      array('controller' => 'c020_tmp_registration', 'action' => 'v010input'));
        //新規登録
        Router::connect('/tmp_registration_confirm',    array('controller' => 'c020_tmp_registration', 'action' => 'v020confirm'));
        //新規完了
        Router::connect('/tmp_registration_complete',   array('controller' => 'c020_tmp_registration', 'action' => 'v030complete'));
        //出資者情報登録
        Router::connect('/registration_agreement',      array('controller' => 'c030_registration', 'action' => 'v010agreement'));
        //出資者情報登録
        Router::connect('/registration_input',          array('controller' => 'c030_registration', 'action' => 'v020input'));
        //出資者情報登録
        Router::connect('/registration_confirm',        array('controller' => 'c030_registration', 'action' => 'v030confirm'));
        //確認書類アップロードの案内
        Router::connect('/registration_identification', array('controller' => 'c030_registration', 'action' => 'v040identification'));
        //アップロード完了
        Router::connect('/registration_mailsent',       array('controller' => 'c030_registration', 'action' => 'v050mailsent'));
        //認証キー入力
        Router::connect('/registration_authenticate',   array('controller' => 'c030_registration', 'action' => 'v060authenticate'));


        
        //マイページ
        Router::connect('/lender_mypage',               array('controller' => 'c040_lender', 'action' => 'v010mypage'));
        //投資
        Router::connect('/lender_investmentinput',      array('controller' => 'c040_lender', 'action' => 'v020investmentinput'));
        //出資申込完了
        Router::connect('/lender_investmentcomplete',   array('controller' => 'c040_lender', 'action' => 'v040investmentcomplete'));
        //マイページ出資履歴
        Router::connect('/lender_investmenthistory',    array('controller' => 'c040_lender', 'action' => 'v050investmenthistory'));
        //マイページ収益明細
        Router::connect('/lender_dividendhistory',      array('controller' => 'c040_lender', 'action' => 'v060dividendhistory'));
        //マイページお知らせ
        Router::connect('/lender_informationlist',      array('controller' => 'c040_lender', 'action' => 'v090informationlist'));
        //マイページメアド変更依頼
        Router::connect('/lender_mailpasscorrect',      array('controller' => 'c040_lender', 'action' => 'v080mailpasscorrect'));
        //マイページお知らせ内容表示
        Router::connect('/lender_informationdetail',    array('controller' => 'c040_lender', 'action' => 'v100informationdetail'));
        //マイページ同意履歴
        Router::connect('/lender_agreementhistory',     array('controller' => 'c040_lender', 'action' => 'v110agreementhistory'));
        //マイページ会員情報
        Router::connect('/lender_lenderinfo',           array('controller' => 'c040_lender', 'action' => 'v070lenderinfo'));

        //SHOW_PDF
        Router::connect('/pdf_showpdf',                 array('controller' => 'c060_pdf', 'action' => 'v010showpdf'));
        //ホーム
        Router::connect('/',                            array('controller' => 'c010_home', 'action' => 'index'));
	


	Router::connect('/pages/*',                     array('controller' => 'pages', 'action' => 'display'));
	CakePlugin::routes();

	require CAKE . 'Config' . DS . 'routes.php';

	
