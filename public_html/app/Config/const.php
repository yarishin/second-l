<?php

define("SITE_TITLE", "セカンドライフ");

// URL
//define("URL_SITE_TOP" , "https://second-l.jp/");
//define("URL_SITE_TOP" , "https://192.168.56.104/");   // 本番_VBox
define("URL_SITE_TOP" , "https://hogehoge.com/");   // 本番_VBox
//define("URL_SITE_TOP" , "https://slave.second-l.jp/"); //_192.168.0.111___219.117.218.82

//新規会員登録
//define("URL_REGISTRATION_PAGE", URL_SITE_TOP."c020_tmp_registration/v010input");
define("URL_REGISTRATION_PAGE", URL_SITE_TOP."tmp_registration_input");

//ログイン
//define("URL_LOGIN_PAGE"       , URL_SITE_TOP."c010_home/v020login");
define("URL_LOGIN_PAGE"       , URL_SITE_TOP."home_login");

//ファンド一覧
//define("URL_FUND_LIST"        , URL_SITE_TOP."c010_home/v030fundlist");
define("URL_FUND_LIST"        , URL_SITE_TOP."home_fundlist");

//パスワード再発行
//define("URL_REISSUE"          , URL_SITE_TOP."c010_home/v050reissue");
define("URL_REISSUE"          , URL_SITE_TOP."home_reissue");

define("URL_OPERATE_ACHIEVEMENT", URL_SITE_TOP."c010_home/v100operateachievement");

//ログアウト
//define("URL_LOGOUT_PAGE"      , URL_SITE_TOP."c010_home/v920logout");
define("URL_LOGOUT_PAGE"      , URL_SITE_TOP."home_logout");

//マイページ
//define("URL_LENDER_PAGE"      , URL_SITE_TOP."c040_lender/v010mypage");
define("URL_LENDER_PAGE"      , URL_SITE_TOP."lender_mypage");
define("URL_INVESTMENT_INPUT" , URL_SITE_TOP."c040_lender/v020investmentinput");
//define("URL_INVESTMENT_INPUT_PDF" , URL_SITE_TOP."c060_pdf/v010showpdf");
define("URL_INVESTMENT_INPUT_PDF" , URL_SITE_TOP."pdf_showpdf");
//define("URL_INVESTMENT_INPUT" , URL_SITE_TOP."customers_investmentinput");
define("URL_ADMIN_TOP"        , URL_SITE_TOP."c050_admin/v010login");
define("URL_ADMIN_LOGOUT"     , URL_SITE_TOP."c050_admin/v990logout");
define("URL_PDF_PATH_1"       , URL_SITE_TOP."files/");
define("URL_PDF_RISK_DESCRIPTION" , URL_PDF_PATH_1."risk_1_00.pdf");
define("URL_PDF_DATA_CORRECT"     , URL_PDF_PATH_1."lender_correct_1_00.pdf");

//お問い合わせ
//define("URL_CONTACT_PAGE"     , URL_SITE_TOP."c010_home/v070contactinput");	// お問い合わせ
define("URL_CONTACT_PAGE"     , URL_SITE_TOP."home_contactinput");              // お問い合わせ
define("URL_PROJECTS_PAGE"    , URL_SITE_TOP."projects/");			            // 案件フォルダ
define("URL_QUESTION_PAGE"    , URL_SITE_TOP."contents/qa.php");                // よくある質問
define("URL_COMPANY_PAGE"     , URL_SITE_TOP."contents/company.php");           // 運営会社
define("URL_PRIVACY_PAGE"     , URL_SITE_TOP."contents/privacy.php");           // 個人情報保護方針
define("URL_ANTISOCIAL_PAGE"  , URL_SITE_TOP."contents/antisocial.php");        // 反社会的勢力に対する基本方針
//define("URL_COMMISSION_PAGE"  , URL_SITE_TOP."contents/commision.php");       // 手数料
//define("URL_AGREEMENT_PAGE"   , URL_SITE_TOP."contents/agreement.php");       // 取引約款等
define("URL_SOLICITATION_PAGE", URL_SITE_TOP."contents/solicitation.php");      // 金融商品勧誘方針
//define("URL_LOANTERMS_PAGE"   , URL_SITE_TOP."contents/loan_terms.php");      // 貸付条件表
//define("URL_LANDINGPAGE_PAGE" , URL_SITE_TOP."landingpage/");                 // ランディング
define("URL_GUIDE_PAGE"       , URL_SITE_TOP."contents/guide.php");			    // はじめての方
define("URL_FLOW_PAGE"        , URL_SITE_TOP."contents/flow.php");			    // ご利用の流れ
define("URL_COOLINGOFF_PAGE"  , URL_SITE_TOP."contents/coolingoff.php");	    // クーリングオフ
define("URL_INFO_PAGE"        , URL_SITE_TOP."news/information.php");		    // TOPICS お知らせページ
define("URL_ELECTRONIC_PAGE"  , URL_SITE_TOP."contents/erectonic.php");		    // 電子交付に関する基本方針
define("URL_SERVICETERMS_PAGE", URL_SITE_TOP."files/0000000001.pdf");			// 利用規約
define("URL_ABOUTRISK_PAGE"   , URL_SITE_TOP."contents/aboutrisk.php");		    // 主なリスクについて
define("URL_BIZMANAGER_PAGE"  , URL_SITE_TOP."contents/manager.php");		    // 業務管理者
define("URL_MASKING_PAGE"    , URL_SITE_TOP."contents/masking.php");            // 本人確認書類マスキングについて


// ファンド詳細画面用
define("REQUEST_KEY_DB_CONN"    , "DB_CONN");
define("DB_TRANSACTION_START"   , "START TRANSACTION");
define("DB_TRANSACTION_COMMIT"  , "COMMIT");
define("DB_TRANSACTION_ROLLBACK", "ROLLBACK");
define("DB_SERVER"              , "localhost");
define("DB_USER"                , "crowdfunding");
define("DB_PASSWORD"            , "crowdfunding");
define("DB_DATABASE"            , "crowdfunding");

// エンコード
define("CHARSET_UTF8", "UTF-8");

define("DISP_CHECK_TRG"      , 0);                             // TESTデバックモードprintタグ切り替え 0:表示しない　1:表示する
define("BOOKING_INVESTMENT"   ,0);                             // 同じファンドに投資できるかどうか 0:投資できない 1:投資できる
define("DISP_TERM_NEW_IMAGE"      , 13);                       // 案件一覧「New」表示日数
define("DISP_NUMBER_P_BAR"        , 100);                      // 案件一覧プログレスバー表示件数
define("DISP_NUMBER_TOP_FUND_LIST", 15);                       // サイトトップに表示する案件の件数
define("DISP_PAGE_LIMIT_OPERATE_ACHIEVEMENT", 15);             // サイトトップに表示する案件の件数
define("DISP_NUMBER_V030LIST", 10);                            // 案件一覧表示件数v030
define("EXPIRATION_TERM_REGISTER"  , 3300);                    // 投資家登録中のアカウント有効期限までの日数
define("DELETE_TERM_REGISTER"      , 44);                      // 投資家登録中のアカウント削除予定日までの日数
define("EXPIRATION_TERM_INVESTMENT",  5);                      // 投資申込の入金期限までの日数(営業日)
define("EXPIRATION_TERM_REJECT_USER", 7);                      // 口座開設を拒否したユーザがログイン出来る日数
define("TAX_RATE" , 0.2042);                                   // 源泉徴収税率
define("PDF_DOC_FONT_NAME", "kozminproregular");               // PDF書面に書き込む際のフォント
define("PDF_MINUS_SIGN_REPORT", "▲");                          // 報告書に出力するマイナス記号
define("ARRAY_INDEX_CUMULATIVE_LOAN", "cumulative_loan_amount"); // ヘッダー：累計成約金額
define("ARRAY_INDEX_CUMULATIVE_DIV" , "cumulative_div_amount");  // ヘッダー：分配金総額
define("ARRAY_INDEX_PDF_NAME"  , "pdf_file_name");             // PDFファイルの実ファイル名のインデックス
define("ARRAY_INDEX_COUNT"     , "count");                     // カウント、件数
define("ARRAY_INDEX_MIN_UNIT"  , "min_unit");                  // 最少単位
define("ARRAY_INDEX_TODAY"     , "today");                     // システム日付
define("ARRAY_INDEX_APPR_DATE" , "approval_datetime");         // 承認日時
define("ARRAY_INDEX_LAST_REPORT"  , "last_report");
define("ARRAY_INDEX_REPORT"       , "report");
define("ARRAY_INDEX_REPORT_LOAN1" , "report_loan1");
define("ARRAY_INDEX_REPORT_LOAN2" , "report_loan2");
define("ARRAY_INDEX_FUND"         , "fund");
define("ARRAY_INDEX_LOAN1"        , "loan1");
define("ARRAY_INDEX_LOAN2"        , "loan2");
define("ARRAY_INDEX_LOAN_TERM1"   , "loan_term1");
define("ARRAY_INDEX_LOAN_TERM2"   , "loan_term2");
define("ARRAY_INDEX_USER"         , "user");
define("ARRAY_INDEX_COMPANY"      , "company");
define("ARRAY_INDEX_OPERATING_REPORT_PAGE_3" , "operating_report_page_3");
define("ARRAY_INDEX_APPR_USER_NAME"       , "user_name");
define("ARRAY_INDEX_APPR_USER_ADDRESS"    , "user_address");
define("ARRAY_INDEX_APPR_USER_ZIP"        , "user_zip");
define("ARRAY_INDEX_APPR_USER_KEY"        , "user_key");
define("ARRAY_INDEX_APPR_USER_KEY_EXPLAIN", "user_key_explain");
define("ARRAY_INDEX_FUND_STATUS" , "fund_status");          // ファンド状態

// 運用報告書３頁目
define("ARRAY_INDEX_INV_AMOUNT1"     , "inv_amount1");      // 出資金償還額(投資家)
define("ARRAY_INDEX_INV_AMOUNT2"     , "inv_amount2");      // 出資金償還額(その他の投資家)
define("ARRAY_INDEX_INV_AMOUNT3"     , "inv_amount3");      // 出資金償還額(営業者)
define("ARRAY_INDEX_INV_AMOUNT_TOTAL", "inv_amount_total"); // 出資金償還額(合計)
define("ARRAY_INDEX_DIV_AMOUNT1"     , "div_amount1");      // 損益分配(投資家)
define("ARRAY_INDEX_DIV_AMOUNT2"     , "div_amount2");      // 損益分配(その他の投資家)
define("ARRAY_INDEX_DIV_AMOUNT3"     , "div_amount3");      // 損益分配(営業者)
define("ARRAY_INDEX_DIV_AMOUNT_TOTAL", "div_amount_total"); // 損益分配(合計)
define("ARRAY_INDEX_INV_COUNT", "inv_count");               // 投資家持分
define("ARRAY_INDEX_SHUSSI_SHOKAN_AMOUNT", "shussi_shokan_amount"); // 出資金償還額
define("ARRAY_INDEX_SONEKI_BUNPAI_AMOUNT", "soneki_bunpai_amount"); // 損益分配金
define("ARRAY_INDEX_GENSEN_CHOSHU_AMOUNT", "gensen_choshu_amount"); // 源泉徴収税額
define("ARRAY_INDEX_SOKIN_AMOUNT"        , "sokin_amount");         // 送金額

// 取引残高報告書
define("ARRAY_INDEX_USER_ID"    , "user_id");
define("ARRAY_INDEX_TRADE_START", "trade_start");
define("ARRAY_INDEX_TRADE_END"  , "trade_end");
define("ARRAY_INDEX_DOC_CAT_ID"   , "doc_cat_id");
define("ARRAY_INDEX_DOC_ID"       , "doc_id");
define("ARRAY_INDEX_DOC_REV"      , "revision");
define("ARRAY_INDEX_REPORT_MONTH" , "report_month");
define("ARRAY_INDEX_INFORMATION"  , "information");
define("ARRAY_INDEX_TRADE_YEAR"   , "trade_year");

// 案件詳細ページヘッダー用
define("ARRAY_INDEX_OG_IMAGE", "og_image");
define("ARRAY_INDEX_OG_DESC" , "og_desc");
define("ARRAY_INDEX_OG_URL"  , "og_url");
define("GET_PARAM_INDEX_FUND_ID"       , "fId");
define("GET_PARAM_INDEX_LOAN_NO"       , "lNo");
define("GET_PARAM_INDEX_DOC_ID"        , "dId");
define("GET_PARAM_INDEX_REVISION"      , "rev");
define("GET_PARAM_INDEX_APPL_DATETIME" , "aDate");
define("GET_PARAM_INDEX_USER_ID"       , "uId");
define("GET_PARAM_INDEX_REPORT_MONTH"  , "rMonth");
define("GET_PARAM_INDEX_DOC_PARAM"     , "dPrm");
define("COMPANY_ID", 0); // 会社ID

// ファイル拡張子
define("FILE_EXTENSION_PDF", ".pdf");
define("FILE_EXTENSION_CSV", ".csv");

// ダブルクォーテーション
define("DQ", "\"");

define("TEMPLATE_PDF_DIR_1", "files/");
define("TEMPLATE_PDF_DIR_2", "../files/");
define("TEMPLATE_PDF_DIR_3", "../webroot/projects/");
define("TEMPLATE_PDF_AUTH_KEY", "auth_key");

// 入金履歴ファイル保存
define("DEPOSIT_DATA_DIR", "../../uploaded/deposit_data/");		// 入金ファイル保存 :appディレクトリと同じレベルに作成
define("DEPOSIT_DATA_PREFIX", "deposit_rakuten_");				// 入金データ保存ファイル名接頭辞

define("USER_ID_00000001", "31553385"); // 伊藤雄八郎氏ID
define("USER_ID_99999999", "99999999"); // 寅須戸太郎氏ID

// セッションキー
define("SESSION_FORM_DATAS"       , "FORM_DATAS");             // 画面入力情報
define("SESSION_FORM_DATA_LIST"   , "FORM_DATA_LIST");         // 画面一覧情報
define("SESSION_VALIDATION_ERROS" , "VALIDATION_ERRORS");      // バリデーションメッセージ
define("SESSION_LOGIN_USER_INFO"  , "LOGIN_USER_INFO");        // ログインユーザ情報
define("SESSION_LOGIN_ADMIN_INFO" , "LOGIN_ADMIN_INFO");       // ログイン管理者ユーザ情報
define("SESSION_EVENT_ID"         , "CURRENT_EVENT_ID");       // 実行中イベントID
define("SESSION_USER_ID"          , "CURRENT_USER_ID");        // 選択中ユーザID
define("SESSION_FUND_ID"          , "CURRENT_FUND_ID");        // 選択中ファンドID
define("SESSION_FUND_NAME"        , "CURRENT_FUND_NAME");      // 選択中ファンド名
define("SESSION_LOAN_NO"          , "CURRENT_LOAN_NO");        // 選択中貸付番号
define("SESSION_PROC_TYPE_FUND"   , "CURRENT_PROC_TYPE_FUND"); // 現在処理区分(ファンド)
define("SESSION_PROC_TYPE_LOAN"   , "CURRENT_PROC_TYPE_LOAN"); // 現在処理区分(貸付内容)
define("SESSION_AGREED_DATETIME"  , "AGREED_DATETIME");        // 同意日時
define("SESSION_DATA_SOURCE"      , "DATA_SOURCE");            // トランザクション管理用データソース
define("SESSION_INFO_ID"          , "CURRENT_INFO_ID");        // 選択中お知らせID
define("SESSION_REPORT_ID"        , "CURRENT_REPORT_ID");      // 選択中報告書ID
define("SESSION_REFERENCE_FLAG"   , "REFERENCE_FLAG");         // データ参照のみ
define("SESSION_DOC_URL_LIST"     , "DOCUMENT_URL_LIST");      // 書面URL
define("LOGIN_USER_ID"            , "user_id");
define("LOGIN_USER_NAME"          , "kanji_name");
define("LOGIN_USER_NAME_KANA"     , "furi_name");
define("LOGIN_USER_MAIL_ADDRESS"  , "mail_address");
define("LOGIN_USER_STATUS_CODE"   , "user_status_code");
define("LOGIN_USER_CLUB_ID"       , "club_id");
define("LOGIN_USER_BORROWER_FLAG" , "borrower_flag");
define("LOGIN_USER_CORPORATE_FLAG", "corporate_flag");
define("LOGIN_ADMIN_ID"            , "admin_id");
define("LOGIN_ADMIN_NAME"          , "admin_name");
define("LOGIN_ADMIN_LOGIN_TIME"    , "admin_login_time");
define("LOGIN_ADMIN_REVIEW_AUTH"    , "review_auth");
//define("LOGIN_ADMIN_AUTH_USER_INQR", "admin_auth_user_inqr");
//define("LOGIN_ADMIN_AUTH_USER_APRV", "admin_auth_user_aprv");
//define("LOGIN_ADMIN_AUTH_USER_CRCT", "admin_auth_user_crct");
//define("LOGIN_ADMIN_AUTH_USER_STOP", "admin_auth_user_stop");
//define("LOGIN_ADMIN_AUTH_USER_DPST", "admin_auth_user_dpst");
//define("LOGIN_ADMIN_AUTH_INVS_INQR", "admin_auth_invs_inqr");
//define("LOGIN_ADMIN_AUTH_INVS_RGST", "admin_auth_invs_rgst");
//define("LOGIN_ADMIN_AUTH_INVS_CRCT", "admin_auth_invs_crct");
//define("LOGIN_ADMIN_AUTH_INVS_DELT", "admin_auth_invs_delt");
//define("LOGIN_ADMIN_AUTH_ADMN_INQR", "admin_auth_admn_inqr");
//define("LOGIN_ADMIN_AUTH_ADMN_RGST", "admin_auth_admn_rgst");
//define("LOGIN_ADMIN_AUTH_ADMN_CRCT", "admin_auth_admn_crct");
//define("LOGIN_ADMIN_AUTH_ADMN_DELT", "admin_auth_admn_delt");


define("LOGIN_ADMIN_AUTH_TRUE" , 1);
define("LOGIN_ADMIN_AUTH_FALSE", 0);


// イベントID
define("EVENT_ID_000000000","E000000000"); // イベントID無し

define("EVENT_ID_010010010","E010010010"); // ログインボタン押下
define("EVENT_ID_010010020","E010010020"); // 新規口座開設ボタン押下
define("EVENT_ID_010010030","E010010030"); // マイページボタン押下
define("EVENT_ID_010020010","E010020010"); // ログインボタン押下
define("EVENT_ID_010020020","E010020020"); // 新規口座開設ボタン押下
define("EVENT_ID_010030010","E010030010"); // 詳細ボタン押下
define("EVENT_ID_010030020","E010030020"); // 続きを読むリンク押下
define("EVENT_ID_010050010","E010050010"); // 送信ボタン押下(パスワード)
define("EVENT_ID_010050020","E010050020"); // 送信ボタン押下(ID)
define("EVENT_ID_010070010","E010070010"); // 確認ボタン押下
define("EVENT_ID_010080010","E010080010"); // 戻るボタン押下
define("EVENT_ID_010080020","E010080020"); // 決定ボタン押下
define("EVENT_ID_020010010","E020010010"); // 確認ボタン押下
define("EVENT_ID_020020010","E020020010"); // 戻るボタン押下
define("EVENT_ID_020020020","E020020020"); // 決定ボタン押下
define("EVENT_ID_030010010","E030010010"); // 書面リンク押下
define("EVENT_ID_030010020","E030010020"); // 同意するボタン押下
define("EVENT_ID_030020010","E030020010"); // 金融機関区分リスト変更
define("EVENT_ID_030020020","E030020020"); // 確認ボタン押下
define("EVENT_ID_030030010","E030030010"); // 戻るボタン押下
define("EVENT_ID_030030020","E030030020"); // 決定ボタン押下
define("EVENT_ID_030040010","E030040010"); // メール送信ボタン押下 (2018/08/28)
define("EVENT_ID_030040020","E030040020"); // アップロードボタン押下 (2018/08/28)
define("EVENT_ID_030070010","E030070010"); // 続けて画像アップロードへボタン押下 (2018/11/01)
define("EVENT_ID_030060010","E030060010"); // 送信ボタン押下
define("EVENT_ID_040010010","E040010010"); // 投資履歴ボタン押下
define("EVENT_ID_040010020","E040010020"); // 配当履歴ボタン押下
define("EVENT_ID_040010030","E040010030"); // 投資家情報ボタン押下
define("EVENT_ID_040010040","E040010040"); // お知らせボタン押下
define("EVENT_ID_040010050","E040010050"); // 未読通知リンク押下
define("EVENT_ID_040010060","E040010060"); // 同意履歴押下
define("EVENT_ID_040010070","E040010070"); // 配当予定ボタン押下 (2017/11/10 追加)
define("EVENT_ID_040010080","E040010080"); // 本人確認書類ボタン押下 (2019/11/05 追加)
define("EVENT_ID_040010090","E040010090"); // 確認書類提出ボタン押下 (2019/11/05 追加)
define("EVENT_ID_040020010","E040020010"); // 書面リンク押下
define("EVENT_ID_040020020","E040020020"); // 次へボタン押下
define("EVENT_ID_040030010","E040030010"); // 戻るボタン押下
define("EVENT_ID_040030020","E040030020"); // 決定ボタン押下
define("EVENT_ID_040050010","E040050010"); // 絞込みボタン押下
define("EVENT_ID_040050020","E040050020"); // ファンド名リンク押下
define("EVENT_ID_040050030","E040050030"); // 締結前書面リンク押下
define("EVENT_ID_040050040","E040050040"); // 締結時書面リンク押下
define("EVENT_ID_040060010","E040060010"); // 絞込みボタン押下
define("EVENT_ID_040070010","E040070010"); // メールアドレス／パスワード変更ボタン押下
define("EVENT_ID_040080010","E040080010"); // メールアドレス変更ボタン押下
define("EVENT_ID_040080020","E040080020"); // パスワード変更ボタン押下
define("EVENT_ID_040080030","E040080030"); // メールマガジン変更ボタン押下
define("EVENT_ID_040090010","E040090010"); // 件名リンク押下
define("EVENT_ID_040090020","E040090020"); // 絞込みボタン押下
define("EVENT_ID_040100010","E040100010"); // 書面リンク押下
define("EVENT_ID_040100020","E040100020"); // 同意するボタン押下
define("EVENT_ID_040110010","E040110010"); // 絞込みボタン押下
define("EVENT_ID_040110020","E040110020"); // 書面リンク押下
define("EVENT_ID_040120010","E040120010"); // 絞込みボタン押下
//define("EVENT_ID_040120010","customers_dividendplan"); // 絞込みボタン押下
define("EVENT_ID_050010010","E050010010"); // ログインボタン押下
define("EVENT_ID_050010020","E050010020"); // 強制ログアウトボタン押下
define("EVENT_ID_050020010","E050020010"); // 投資家管理ボタン押下
define("EVENT_ID_050020020","E050020020"); // 投資申込受けつボタン押下
define("EVENT_ID_050020030","E050020030"); // ファンド管理ボタン押下
define("EVENT_ID_050020040","E050020040"); // 返済金管理ボタン押下
define("EVENT_ID_050020050","E050020050"); // 配当実行ボタン押下
define("EVENT_ID_050020060","E050020060"); // 配当実績ボタン押下
define("EVENT_ID_050020070","E050020070"); // 休日設定ボタン押下
define("EVENT_ID_050020080","E050020080"); // 報告書管理ボタン押下
define("EVENT_ID_050020090","E050020090"); // メール送信ボタン押下
define("EVENT_ID_050020100","E050020100"); // CSV DL ボタン押下
define("EVENT_ID_050020110","E050020110"); // お知らせ送信ボタン押下
define("EVENT_ID_050020120","E050020120"); // 入金管理ボタン押下
define("EVENT_ID_050020130","E050020130"); // 入会審査ボタン押下
define("EVENT_ID_050030010","E050030010"); // メニューボタン押下
define("EVENT_ID_050030020","E050030020"); // 検索ボタン押下
define("EVENT_ID_050030030","E050030030"); // 未承認ボタン押下
define("EVENT_ID_050030040","E050030040"); // 投資家IDリンク押下
define("EVENT_ID_050040010","E050040010"); // 修正ボタン押下
define("EVENT_ID_050040020","E050040020"); // 承認／拒否ボタン押下
define("EVENT_ID_050040030","E050040030"); // 一覧ボタン押下
define("EVENT_ID_050040040","E050040040"); // メニューボタン押下
define("EVENT_ID_050040050","E050040050"); // 交渉履歴ボタン押下
define("EVENT_ID_050040060","E050040060"); // PDF参照ボタン押下
define("EVENT_ID_050050010","E050050010"); // 確認ボタン押下
define("EVENT_ID_050050020","E050050020"); // 承認ボタン押下
define("EVENT_ID_050050030","E050050030"); // 拒否ボタン押下
define("EVENT_ID_050050040","E050050040"); // 一覧ボタン押下
define("EVENT_ID_050050050","E050050050"); // メニューボタン押下
define("EVENT_ID_050060010","E050060010"); // 戻るボタン押下
define("EVENT_ID_050060020","E050060020"); // 決定ボタン押下
define("EVENT_ID_050080010","E050080010"); // メニューボタン押下
define("EVENT_ID_050080020","E050080020"); // 絞込みボタン押下
define("EVENT_ID_050080030","E050080030"); // 確認ボタン押下
define("EVENT_ID_050080040","E050080040"); // 投資家IDリンク押下
define("EVENT_ID_050090010","E050090010"); // 戻るボタン押下
define("EVENT_ID_050090020","E050090020"); // 決定ボタン押下
define("EVENT_ID_050100010","E050100010"); // 戻るボタン押下
define("EVENT_ID_050110010","E050110010"); // メニューボタン押下
define("EVENT_ID_050110020","E050110020"); // 検索ボタン押下
define("EVENT_ID_050110030","E050110030"); // 新規登録ボタン押下
define("EVENT_ID_050110040","E050110040"); // ファンドIDリンク押下
define("EVENT_ID_050110050","E050110050"); // 報告書発行対象ボタン押下
define("EVENT_ID_050120010","E050120010"); // 修正ボタン押下
define("EVENT_ID_050120020","E050120020"); // 削除ボタン押下
define("EVENT_ID_050120030","E050120030"); // 一覧ボタン押下
define("EVENT_ID_050120040","E050120040"); // メニューボタン押下
define("EVENT_ID_050120050","E050120050"); // 申込一覧ボタン押下
define("EVENT_ID_050120060","E050120060"); // 貸付番号リンク押下
define("EVENT_ID_050120070","E050120070"); // 報告書ボタン押下
define("EVENT_ID_050130010","E050130010"); // 確認ボタン押下
define("EVENT_ID_050130020","E050130020"); // 一覧ボタン押下
define("EVENT_ID_050130030","E050130030"); // メニューボタン押下
define("EVENT_ID_050130040","E050130040"); // 貸付追加ボタン押下
define("EVENT_ID_050130050","E050130050"); // 貸付番号リンク押下
define("EVENT_ID_050140010","E050140010"); // 戻るボタン押下
define("EVENT_ID_050140020","E050140020"); // 決定ボタン押下
define("EVENT_ID_050150010","E050150010"); // 戻るボタン押下
define("EVENT_ID_050170010","E050170010"); // 戻るボタン押下
define("EVENT_ID_050170020","E050170020"); // 確認ボタン押下
define("EVENT_ID_050180010","E050180010"); // 戻るボタン押下
define("EVENT_ID_050180020","E050180020"); // 決定ボタン押下
define("EVENT_ID_050190010","E050190010"); // メニューボタン押下
define("EVENT_ID_050190020","E050190020"); // 絞込みボタン押下
define("EVENT_ID_050190030","E050190030"); // 今月分ボタン押下
define("EVENT_ID_050190040","E050190040"); // 遅延ボタン押下
define("EVENT_ID_050190050","E050190050"); // 確認ボタン押下
define("EVENT_ID_050190060","E050190060"); // 貸付番号リンク押下
define("EVENT_ID_050200010","E050200010"); // 戻るボタン押下
define("EVENT_ID_050200020","E050200020"); // 決定ボタン押下
define("EVENT_ID_050210010","E050210010"); // 戻るボタン押下
define("EVENT_ID_050220010","E050220010"); // メニューボタン押下
define("EVENT_ID_050220020","E050220020"); // 確認ボタン押下
define("EVENT_ID_050220030","E050220030"); // ファンドIDリンク押下
define("EVENT_ID_050230010","E050230010"); // 戻るボタン押下
define("EVENT_ID_050230020","E050230020"); // 決定ボタン押下
define("EVENT_ID_050240010","E050240010"); // 戻るボタン押下
define("EVENT_ID_050250010","E050250010"); // メニューボタン押下
define("EVENT_ID_050250020","E050250020"); // 絞込みボタン押下
define("EVENT_ID_050260010","E050260010"); // 年数リスト変更
define("EVENT_ID_050260020","E050260020"); // 1年分追加ボタン押下
define("EVENT_ID_050260030","E050260030"); // 決定ボタン押下
define("EVENT_ID_050260040","E050260040"); // メニューボタン押下
define("EVENT_ID_050270010","E050270010"); // 戻るボタン押下
define("EVENT_ID_050270020","E050270020"); // 一覧ボタン押下
define("EVENT_ID_050270030","E050270030"); // メニューボタン押下
define("EVENT_ID_050270040","E050270040"); // 表示ボタン押下
define("EVENT_ID_050270050","E050270050"); // 新規追加ボタン押下
define("EVENT_ID_050280010","E050280010"); // 戻るボタン押下
define("EVENT_ID_050280020","E050280020"); // 修正ボタン押下
define("EVENT_ID_050280030","E050280030"); // 一覧ボタン押下
define("EVENT_ID_050280040","E050280040"); // メニューボタン押下
define("EVENT_ID_050300010","E050300010"); // 登録ボタン押下
define("EVENT_ID_050300020","E050300020"); // 投資家情報ボタン押下
define("EVENT_ID_050300030","E050300030"); // 一覧ボタン押下
define("EVENT_ID_050300040","E050300040"); // メニューボタン押下
define("EVENT_ID_050300050","E050300050"); // 更新ボタン押下
define("EVENT_ID_050300060","E050300060"); // 取消ボタン押下
define("EVENT_ID_050310010","E050310010"); // 確認ボタン押下
define("EVENT_ID_050310020","E050310020"); // 一覧ボタン押下
define("EVENT_ID_050310030","E050310030"); // メニューボタン押下
define("EVENT_ID_050310040","E050310040"); // 戻るボタン押下
define("EVENT_ID_050320010","E050320010"); // 戻るボタン押下
define("EVENT_ID_050320020","E050320020"); // 決定ボタン押下
define("EVENT_ID_050330010","E050330010"); // 戻るボタン押下
define("EVENT_ID_050340010","E050340010"); // 確認ボタン押下
define("EVENT_ID_050340020","E050340020"); // 一覧ボタン押下
define("EVENT_ID_050340030","E050340030"); // メニューボタン押下
define("EVENT_ID_050340040","E050340040"); // 絞込みボタン押下
define("EVENT_ID_050350010","E050350010"); // 戻るボタン押下
define("EVENT_ID_050350020","E050350020"); // 決定ボタン押下
define("EVENT_ID_050360010","E050360010"); // 戻るボタン押下
define("EVENT_ID_050370010","E050370010"); // 運用報告書ボタン押下
define("EVENT_ID_050370020","E050370020"); // 取引残高報告書ボタン押下
define("EVENT_ID_050370030","E050370030"); // 年間取引報告書ボタン押下
define("EVENT_ID_050370040","E050370040"); // メニューボタン押下
define("EVENT_ID_050380010","E050380010"); // 確認ボタン押下
define("EVENT_ID_050380020","E050380020"); // 戻るボタン押下
define("EVENT_ID_050380030","E050380030"); // メニューボタン押下
define("EVENT_ID_050390010","E050390010"); // 戻るボタン押下
define("EVENT_ID_050390020","E050390020"); // 交付実行ボタン押下
define("EVENT_ID_050400010","E050400010"); // 戻るボタン押下
define("EVENT_ID_050410010","E050410010"); // 交付実行ボタン押下
define("EVENT_ID_050410020","E050410020"); // 再交付実行ボタン押下
define("EVENT_ID_050410030","E050410030"); // 戻るボタン押下
define("EVENT_ID_050410040","E050410040"); // メニューボタン押下
define("EVENT_ID_050420010","E050420010"); // 作成ボタン押下
define("EVENT_ID_050420020","E050420020"); // 戻るボタン押下
define("EVENT_ID_050430010","E050430010"); // 確認ボタン押下
define("EVENT_ID_050430020","E050430020"); // メニューボタン押下
define("EVENT_ID_050440010","E050440010"); // 戻るボタン押下
define("EVENT_ID_050440020","E050440020"); // 送信ボタン押下
define("EVENT_ID_050450010","E050450010"); // 戻るボタン押下
define("EVENT_ID_050460010","E050460010"); // 戻るボタン押下
define("EVENT_ID_050470010","E050470010"); // メニューボタン押下
define("EVENT_ID_050470020","E050470020"); // 経理(ファンド)ボタン押下
define("EVENT_ID_050470030","E050470030"); // 経理(個人)ボタン押下
define("EVENT_ID_050470040","E050470040"); // 配当送金ボタン押下
define("EVENT_ID_050470050","E050470050"); // 書面交付状況ボタン押下
define("EVENT_ID_050470060","E050470060"); // QUOカードボタン押下
define("EVENT_ID_050480010","E050480010"); // 確認ボタン押下
define("EVENT_ID_050480020","E050480020"); // メニューボタン押下
define("EVENT_ID_050490010","E050490010"); // 戻るボタン押下
define("EVENT_ID_050490020","E050490020"); // 送信ボタン押下
define("EVENT_ID_050500010","E050500010"); // 戻るボタン押下
define("EVENT_ID_050510010","E050510010"); // 入金口座一覧: メニューボタン押下
define("EVENT_ID_050510020","E050510020"); // 入金口座一覧: 戻るボタン押下
define("EVENT_ID_050510030","E050510030"); // 入金口座一覧: 検索ボタン押下
define("EVENT_ID_050520010","E050520010"); // 入金データ入力: メニューボタン押下
define("EVENT_ID_050520020","E050520020"); // 入金データ入力: 入金照合ボタン押下
define("EVENT_ID_050520030","E050520030"); // 入金データ入力: 未照合出力ボタン押下
define("EVENT_ID_050520040","E050520040"); // 入金データ入力: 入金口座管理ボタン押下
define("EVENT_ID_050520050","E050520050"); // 入金データ入力: アップロードボタン押下
define("EVENT_ID_050520060","E050520060"); // 入金データ入力: 照合履歴ボタン押下
define("EVENT_ID_050520070","E050520070"); // 入金データ入力: 手動入金選択

define("EVENT_ID_050530010","E050530010"); // 入金照合処理: メニューボタン押下
define("EVENT_ID_050530020","E050530020"); // 入金照合処理: 戻るボタン押下
define("EVENT_ID_050530030","E050530030"); // 入金照合処理: 確認ボタン押下
define("EVENT_ID_050530040","E050530040"); // 手動入金処理: 入金処理ボタン押下
define("EVENT_ID_050540010","E050540010"); // 入金照合確認: メニューボタン押下
define("EVENT_ID_050540020","E050540020"); // 入金照合確認: 戻るボタン押下
define("EVENT_ID_050540030","E050540030"); // 入金照合確認: 決定ボタン押下
define("EVENT_ID_050550010","E050550010"); // 未照合履歴出力確認: メニューボタン押下
define("EVENT_ID_050550020","E050550020"); // 未照合履歴出力確認: 戻るボタン押下
define("EVENT_ID_050550030","E050550030"); // 未照合履歴出力確認: 決定ボタン押下
define("EVENT_ID_050560010","E050560010"); // 入会審査メニュー: メニューボタン押下
define("EVENT_ID_050560020","E050560020"); // 入会審査メニュー: ボタン押下
define("EVENT_ID_050560030","E050560030"); // 入会審査メニュー: ボタン押下
define("EVENT_ID_050560040","E050560040"); // 入会審査メニュー: ボタン押下
define("EVENT_ID_050560050","E050560050"); // 入会審査メニュー: ボタン押下


define("EVENT_ID_999999999","E999999999"); // テスト用イベント

define("EVENT_ID_990000010","E990000010"); // 登録時書面
define("EVENT_ID_990000020","E990000020"); // 認証キー
define("EVENT_ID_990000030","E990000030"); // 契約前書面
define("EVENT_ID_990000040","E990000040"); // 契約時書面
define("EVENT_ID_990000050","E990000050"); // 運用報告書
define("EVENT_ID_990000060","E990000060"); // 取引残高報告書
define("EVENT_ID_990000070","E990000070"); // 全種類

// サイトトップ
define("OBJECT_ID_010010010", "user_id");
define("OBJECT_ID_010010020", "password");
define("OBJECT_ID_010010030", "mail_address");

// 投資家ログイン専用
define("OBJECT_ID_010020010", "user_id");
define("OBJECT_ID_010020020", "password");
define("OBJECT_ID_010020030", "mail_address");

// パスワード再発行
define("OBJECT_ID_010050010", "user_id");
define("OBJECT_ID_010050020", "secret_question_code_1");
define("OBJECT_ID_010050030", "secret_answer_1");
define("OBJECT_ID_010050040", "mail_address");
define("OBJECT_ID_010050050", "secret_question_code_2");
define("OBJECT_ID_010050060", "secret_answer_2");

//お問い合わせ(入力)
define("OBJECT_ID_010070010", "kanji_name");
define("OBJECT_ID_010070020", "furi_name");
define("OBJECT_ID_010070030", "user_id");
define("OBJECT_ID_010070040", "mail_address");
define("OBJECT_ID_010070050", "mobile_phone");
define("OBJECT_ID_010070060", "contact_type");
define("OBJECT_ID_010070070", "contact_name");
define("OBJECT_ID_010070080", "contact_info");
define("OBJECT_ID_010070090", "message_type");

// 仮登録申請(入力)
define("OBJECT_ID_020010010", "mail_address");
define("OBJECT_ID_020010020", "mail_address_confirm");
define("OBJECT_ID_020010030", "password");
define("OBJECT_ID_020010040", "password_confirm");
define("OBJECT_ID_020010050", "secret_question_code");
define("OBJECT_ID_020010060", "secret_answer");
define("OBJECT_ID_020010070", "mail_magazine_receive");
define("OBJECT_ID_020010080", "privacy_policy_agreement");
define("OBJECT_ID_020010090", "anti_social_forces");
define("OBJECT_ID_020010100", "electronic_property_report");

// 登録申請(同意)
define("OBJECT_ID_030010010", "file_path_");
define("OBJECT_ID_030010020", "file_name_");
define("OBJECT_ID_030010030", "file_confirm_");

// 登録申請(入力)
define("OBJECT_ID_030020010", "kanji_last_name");
define("OBJECT_ID_030020020", "kanji_first_name");
define("OBJECT_ID_030020030", "furi_last_name");
define("OBJECT_ID_030020040", "furi_first_name");
define("OBJECT_ID_030020050", "gender_code");
define("OBJECT_ID_030020060", "birthday_year");
define("OBJECT_ID_030020070", "birthday_month");
define("OBJECT_ID_030020080", "birthday_day");
define("OBJECT_ID_030020090", "zip");
define("OBJECT_ID_030020100", "address1");
define("OBJECT_ID_030020110", "address2");
define("OBJECT_ID_030020120", "address3");
define("OBJECT_ID_030020130", "fixed_line_phone");
define("OBJECT_ID_030020140", "mobile_phone");
define("OBJECT_ID_030020150", "residence_code");
define("OBJECT_ID_030020160", "family_code");
define("OBJECT_ID_030020170", "financial_asset_code");
define("OBJECT_ID_030020180", "estate_code");
define("OBJECT_ID_030020190", "borrowing_balance_code");
define("OBJECT_ID_030020200", "interest_code");
define("OBJECT_ID_030020210", "trigger_code");
define("OBJECT_ID_030020220", "occupation_code");
define("OBJECT_ID_030020230", "office");
define("OBJECT_ID_030020240", "income_code");
define("OBJECT_ID_030020250", "office_zip");
define("OBJECT_ID_030020260", "office_address");
define("OBJECT_ID_030020270", "office_phone");
define("OBJECT_ID_030020280", "bank_type");
define("OBJECT_ID_030020290", "bank_name");
define("OBJECT_ID_030020300", "branch_name");
define("OBJECT_ID_030020310", "account_type");
define("OBJECT_ID_030020320", "account_sign");
define("OBJECT_ID_030020330", "account_number");
define("OBJECT_ID_030020340", "account_name");
define("OBJECT_ID_030020350", "investment_experience1_code");
define("OBJECT_ID_030020360", "investment_experience2_code");
define("OBJECT_ID_030020370", "investment_experience3_code");
define("OBJECT_ID_030020380", "investment_experience4_code");
define("OBJECT_ID_030020390", "investment_experience5_code");
define("OBJECT_ID_030020400", "investment_experience6_code");
define("OBJECT_ID_030020410", "investment_experience7_code");
define("OBJECT_ID_030020420", "investment_purpose_code");
define("OBJECT_ID_030020430", "fund_character_code");
define("OBJECT_ID_030020440", "asset_management_interest_code");
define("OBJECT_ID_030020450", "asset_management_policy_code");
define("OBJECT_ID_030020460", "operating_term_request_code");

// 確認書類説明画面
define("OBJECT_ID_030040010", "expiration_date");

// 認証キー入力
define("OBJECT_ID_030060010", "authentication_key");

// マイページ
define("OBJECT_ID_040010010", "preparation_amount");      // 運用準備中額
define("OBJECT_ID_040010020", "operationg_amount");       // 運用中額
define("OBJECT_ID_040010030", "dividend_amount_total");   // 配当額累計
define("OBJECT_ID_040010031", "dividend_amount_total_1"); // 償還金額累計
define("OBJECT_ID_040010021", "operationg_amount_1");     // 運用中金額（日付関係なし）
define("OBJECT_ID_040010022", "operationg_amount_2");     // 運用中金額（日付関係なし）
define("OBJECT_ID_040010040", "dividend_amount_minus");   // 遅延金額
define("OBJECT_ID_040010050", "check_flag");              // check_flag
define("OBJECT_ID_040010060", "dividend_amount_ng");      // 遅延NG

// 投資申込(入力)
define("OBJECT_ID_040020010", "fund_name");
define("OBJECT_ID_040020020", "investment_amount");
define("OBJECT_ID_040020025", "min_investment_amount");
define("OBJECT_ID_040020030", "file_path_");
define("OBJECT_ID_040020040", "file_name_");
define("OBJECT_ID_040020050", "file_confirm_");
define("OBJECT_ID_040020090", "expiration_datetime");
define("OBJECT_ID_040020099", "inviting_start");         // 開始時間設定

// 投資申込(確認)
define("OBJECT_ID_040030010", "fund_name");
define("OBJECT_ID_040030020", "investment_amount");
define("OBJECT_ID_040030030", "expiration_datetime");

// 投資履歴
define("OBJECT_ID_040050010", "fund_name");
define("OBJECT_ID_040050020", "investment_amount");
define("OBJECT_ID_040050030", "expiration_datetime");

// 投資家情報
define("OBJECT_ID_040070010", "user_id");
define("OBJECT_ID_040070020", "kanji_last_name");
define("OBJECT_ID_040070030", "kanji_first_name");
define("OBJECT_ID_040070040", "furi_last_name");
define("OBJECT_ID_040070050", "furi_first_name");
define("OBJECT_ID_040070060", "mail_address");
define("OBJECT_ID_040070070", "gender_code");
define("OBJECT_ID_040070080", "birthday");
define("OBJECT_ID_040070090", "zip");
define("OBJECT_ID_040070100", "address1");
define("OBJECT_ID_040070110", "address2");
define("OBJECT_ID_040070120", "address3");
define("OBJECT_ID_040070130", "fixed_line_phone");
define("OBJECT_ID_040070140", "mobile_phone");
define("OBJECT_ID_040070150", "residence_code");
define("OBJECT_ID_040070160", "family_code");
define("OBJECT_ID_040070170", "financial_asset_code");
define("OBJECT_ID_040070180", "estate_code");
define("OBJECT_ID_040070190", "borrowing_balance_code");
define("OBJECT_ID_040070200", "interest_code");
define("OBJECT_ID_040070210", "trigger_code");
define("OBJECT_ID_040070220", "occupation_code");
define("OBJECT_ID_040070230", "office");
define("OBJECT_ID_040070240", "income_code");
define("OBJECT_ID_040070250", "office_zip");
define("OBJECT_ID_040070260", "office_address");
define("OBJECT_ID_040070270", "office_phone");
define("OBJECT_ID_040070280", "bank_type");
define("OBJECT_ID_040070290", "bank_name");
define("OBJECT_ID_040070300", "branch_name");
define("OBJECT_ID_040070310", "account_type");
define("OBJECT_ID_040070320", "account_sign");
define("OBJECT_ID_040070330", "account_number");
define("OBJECT_ID_040070340", "account_name");
define("OBJECT_ID_040070350", "investment_experience1_code");
define("OBJECT_ID_040070360", "investment_experience2_code");
define("OBJECT_ID_040070370", "investment_experience3_code");
define("OBJECT_ID_040070380", "investment_experience4_code");
define("OBJECT_ID_040070390", "investment_experience5_code");
define("OBJECT_ID_040070400", "investment_experience6_code");
define("OBJECT_ID_040070410", "investment_experience7_code");
define("OBJECT_ID_040070420", "investment_purpose_code");
define("OBJECT_ID_040070430", "fund_character_code");
define("OBJECT_ID_040070440", "asset_management_interest_code");
define("OBJECT_ID_040070450", "asset_management_policy_code");
define("OBJECT_ID_040070460", "operating_term_request_code");
define("OBJECT_ID_040070470", "mail_magazine_recieve_flag");

// メールアドレス／パスワード変更
define("OBJECT_ID_040080010", "mail_address");
define("OBJECT_ID_040080020", "mail_address_confirm");
define("OBJECT_ID_040080030", "mail_password");
define("OBJECT_ID_040080040", "password");
define("OBJECT_ID_040080050", "new_password");
define("OBJECT_ID_040080060", "new_password_confirm");
define("OBJECT_ID_040080070", "mail_magizine");
define("OBJECT_ID_040080080", "mail_magizine_password");

// お知らせ内容
define("OBJECT_ID_040100010", "subject");
define("OBJECT_ID_040100020", "post_datetime");
define("OBJECT_ID_040100030", "body");
define("OBJECT_ID_040100040", "force_flag");
define("OBJECT_ID_040100050", "agreement_flag");
define("OBJECT_ID_040100060", "doc_link");
define("OBJECT_ID_040100070", "doc_name");
define("OBJECT_ID_040100080", "agreed_datetime");

define("OBJECT_ID_040100090", "file_path_");
define("OBJECT_ID_040100100", "file_name_");
define("OBJECT_ID_040100110", "file_confirm_");

// 同意履歴
define("OBJECT_ID_040110010", "doc_path");

// 管理者ログイン
define("OBJECT_ID_050010010", "admin_id");
define("OBJECT_ID_050010020", "password");

// 投資家詳細(入力)
define("OBJECT_ID_050050010", "user_id");
define("OBJECT_ID_050050015", "lender_no");
define("OBJECT_ID_050050020", "mail_address");
define("OBJECT_ID_050050030", "kanji_last_name");
define("OBJECT_ID_050050040", "kanji_first_name");
define("OBJECT_ID_050050050", "furi_last_name");
define("OBJECT_ID_050050060", "furi_first_name");
define("OBJECT_ID_050050070", "gender_code");
define("OBJECT_ID_050050080", "birthday_year");
define("OBJECT_ID_050050090", "birthday_month");
define("OBJECT_ID_050050100", "birthday_day");
define("OBJECT_ID_050050110", "zip");
define("OBJECT_ID_050050120", "address1");
define("OBJECT_ID_050050130", "address2");
define("OBJECT_ID_050050140", "address3");
define("OBJECT_ID_050050150", "fixed_line_phone");
define("OBJECT_ID_050050160", "mobile_phone");
define("OBJECT_ID_050050170", "residence_code");
define("OBJECT_ID_050050180", "family_code");
define("OBJECT_ID_050050190", "financial_asset_code");
define("OBJECT_ID_050050200", "estate_code");
define("OBJECT_ID_050050210", "borrowing_balance_code");
define("OBJECT_ID_050050220", "interest_code");
define("OBJECT_ID_050050230", "trigger_code");
define("OBJECT_ID_050050240", "occupation_code");
define("OBJECT_ID_050050250", "office");
define("OBJECT_ID_050050260", "income_code");
define("OBJECT_ID_050050270", "office_zip");
define("OBJECT_ID_050050280", "office_address");
define("OBJECT_ID_050050290", "office_phone");
define("OBJECT_ID_050050300", "bank_type");
define("OBJECT_ID_050050310", "bank_name");
define("OBJECT_ID_050050315", "bank_code");
define("OBJECT_ID_050050320", "branch_name");
define("OBJECT_ID_050050325", "branch_code");
define("OBJECT_ID_050050330", "account_type");
define("OBJECT_ID_050050340", "account_sign");
define("OBJECT_ID_050050350", "account_number");
define("OBJECT_ID_050050355", "account_number_yucho");
define("OBJECT_ID_050050360", "account_name");
define("OBJECT_ID_050050370", "investment_experience1_code");
define("OBJECT_ID_050050380", "investment_experience2_code");
define("OBJECT_ID_050050390", "investment_experience3_code");
define("OBJECT_ID_050050400", "investment_experience4_code");
define("OBJECT_ID_050050410", "investment_experience5_code");
define("OBJECT_ID_050050420", "investment_experience6_code");
define("OBJECT_ID_050050430", "investment_experience7_code");
define("OBJECT_ID_050050440", "investment_purpose_code");
define("OBJECT_ID_050050450", "fund_character_code");
define("OBJECT_ID_050050460", "asset_management_interest_code");
define("OBJECT_ID_050050470", "asset_management_policy_code");
define("OBJECT_ID_050050480", "operating_term_request_code");
define("OBJECT_ID_050050485", "my_number");
define("OBJECT_ID_050050486", "mail_magazine_recieve_flag");
define("OBJECT_ID_050050490", "identification_image_flag");
define("OBJECT_ID_050050500", "account_information_image_flag");
define("OBJECT_ID_050050510", "user_status_code");
define("OBJECT_ID_050050520", "interim_registeration_datetime");
define("OBJECT_ID_050050530", "expiration_date");
define("OBJECT_ID_050050540", "delete_date");
define("OBJECT_ID_050050550", "application_datetime");
define("OBJECT_ID_050050560", "approval_datetime");
define("OBJECT_ID_050050570", "approval_admin_id");
define("OBJECT_ID_050050580", "authentication_key");
define("OBJECT_ID_050050590", "authentication_datetime");
define("OBJECT_ID_050050600", "rejection_datetime");
define("OBJECT_ID_050050610", "rejection_admin_id");
define("OBJECT_ID_050050620", "rejection_reason");
define("OBJECT_ID_050050630", "exclusive_key");


// 投資申込一覧(指定)
define("OBJECT_ID_050080010", "fund_name_");
define("OBJECT_ID_050080020", "application_datetime_");
define("OBJECT_ID_050080030", "investment_amount_");
define("OBJECT_ID_050080040", "investment_status_code_");

// ファンド詳細(入力)
define("OBJECT_ID_050130010", "fund_id");                           // ファンドID
define("OBJECT_ID_050130020", "fund_name");                         // ファンド名
define("OBJECT_ID_050130030", "max_loan_amount_total");             // 貸付予定額合計
define("OBJECT_ID_050130040", "loan_amount_total");                 // 貸付額合計
define("OBJECT_ID_050130050", "min_loan_amount_total");             // 最低成立額
define("OBJECT_ID_050130060", "min_investment_amount");             // 最低投資額
define("OBJECT_ID_050130070", "post_date");                         // 掲載開始日時
define("OBJECT_ID_050130080", "post_time"); 
define("OBJECT_ID_050130090", "inviting_start_date");               // 募集開始日時
define("OBJECT_ID_050130100", "inviting_start_time");
define("OBJECT_ID_050130110", "inviting_end_date");                 // 募集終了日時
define("OBJECT_ID_050130120", "inviting_end_time");
define("OBJECT_ID_050130130", "operating_start");                   // 運用開始日
define("OBJECT_ID_050130140", "operating_end");                     // 運用終了日
define("OBJECT_ID_050130150", "operating_term");                    // 運用期間(ヶ月)
define("OBJECT_ID_050130160", "admin_yield");                       // 営業者利回り
define("OBJECT_ID_050130170", "target_yield");                      // 目標利回り
define("OBJECT_ID_050130180", "guide");                             // 概要
define("OBJECT_ID_050130190", "invited_amount");
define("OBJECT_ID_050130200", "delay_1");                           // 遅延フラグ
define("OBJECT_ID_050130201", "delay_1_date");                      // 遅延フラグ確定日
define("OBJECT_ID_050130202", "ended");                             // 強制終了フラグ
define("OBJECT_ID_050130203", "ended_date");                        // 強制終了フラグ確定日
// estate詳細
define("OBJECT_ID_050130210", "land_location");                     // 土地説明
define("OBJECT_ID_050130220", "land_lot_number");                   // HP用土地説明
define("OBJECT_ID_050130230", "land_texture");                      // 委託特例事業者の商号等
define("OBJECT_ID_050130240", "land_area");                         // 業務管理者リンク
define("OBJECT_ID_050130250", "land_rights_form");                  // スキーム図
define("OBJECT_ID_050130260", "building_location");                 // 建物説明
define("OBJECT_ID_050130270", "building_house_number");             // HP用建物説明
define("OBJECT_ID_050130280", "building_type");                     // 株主の名称および氏名
define("OBJECT_ID_050130290", "building_structure");                // 役員名
define("OBJECT_ID_050130300", "building_floor_area");               // 私道負担
define("OBJECT_ID_050130310", "building_area");                     // その他特定時の必要事項
define("OBJECT_ID_050130320", "building_rights_status");            // 不動産の変更予定
define("OBJECT_ID_050130330", "other_transaction_modes");           // 取引態様
define("OBJECT_ID_050130340", "other_borrowings");                  // その他借入
define("OBJECT_ID_050130350", "real_estate_rights");                // 不動産権利
define("OBJECT_ID_050130360", "registered_holder");                 // 各種制限に関する事項
define("OBJECT_ID_050130370", "city_planning_act_area_division");   // 業務管理者名
define("OBJECT_ID_050130380", "city_planning_law_restrictions");    // 使わない
define("OBJECT_ID_050130390", "building_standards_raw_restricted_area"); // 使わない
define("OBJECT_ID_050130400", "building_standards_raw_restricted1"); // 使わない
define("OBJECT_ID_050130410", "building_standards_raw_restricted2"); // 代表者氏名
define("OBJECT_ID_050130420", "building_standards_raw_restricted3"); // 許可番号
define("OBJECT_ID_050130430", "building_standards_raw_restricted4"); // 資本金
define("OBJECT_ID_050130440", "building_standards_raw_restricted5"); // 事前告知期日
define("OBJECT_ID_050130450", "coverage_rate");                      // 連帯債務負担内容
define("OBJECT_ID_050130460", "floorarea_ratio");                    // 他事業内容
define("OBJECT_ID_050130470", "restrictions_based_laws1");           // 決算報告PDF
define("OBJECT_ID_050130480", "restrictions_based_laws2");           // 最大延長期間
define("OBJECT_ID_050130490", "guidance_burden");                    // 私道負担
define("OBJECT_ID_050130500", "fanility_status_drinking_water");     // 施設設備
define("OBJECT_ID_050130510", "fanility_status_electrical");         // 役員の従事する他事業
define("OBJECT_ID_050130520", "fanility_status_gas");                // 使わない
define("OBJECT_ID_050130530", "fanility_status_sewage");             // 使わない
define("OBJECT_ID_050130540", "fanility_status_rain_water");         // 委託の有無・委託先
define("OBJECT_ID_050130550", "timeofcompletion");                   // 形状未完成物件時
define("OBJECT_ID_050130560", "division_right");                     // 事務手数料
define("OBJECT_ID_050130570", "division_shared_part");               // 利害関係人との取引
define("OBJECT_ID_050130580", "division_usage_limit");               // 信用補完の有無
define("OBJECT_ID_050130590", "division_other_restrictions");        // 区分所有物件詳細
define("OBJECT_ID_050130600", "division_specific_use_permission");   // 使わない
define("OBJECT_ID_050130610", "division_specific_exemption");        // 監査予定
define("OBJECT_ID_050130620", "division_monthly_repair_amount");     // 物件取得金額
define("OBJECT_ID_050130630", "division_total_reserves");            // 売却時分配率
define("OBJECT_ID_050130640", "division_total_reserves_confirmed");  // 物件取得日
define("OBJECT_ID_050130650", "division_delinquent_payment");        // 期中時分配率
define("OBJECT_ID_050130660", "division_delinquent_payment_confirmed"); // 使わない
define("OBJECT_ID_050130670", "division_monthly_management_fee");       // 使わない
define("OBJECT_ID_050130680", "division_monthly_management_fee_confirmed"); // 使わない
define("OBJECT_ID_050130690", "division_management_fee_delinquency");   // 使わない
define("OBJECT_ID_050130700", "division_management_fee_delinquency_confirmed"); // 使わない
define("OBJECT_ID_050130710", "division_management_company");           // 使わない
define("OBJECT_ID_050130720", "division_management_company_add");       // 使わない
define("OBJECT_ID_050130730", "division_management_company_regist_number"); //使わない
define("OBJECT_ID_050130740", "division_maintenance_and_repairs1");     // 使わない
define("OBJECT_ID_050130750", "division_maintenance_and_repairs2");     // 使わない
define("OBJECT_ID_050130760", "division_maintenance_and_repairs3");     // 使わない
define("OBJECT_ID_050130770", "division_maintenance_and_repairs4");     // 全賃料収入
define("OBJECT_ID_050130780", "division_maintenance_and_repairs5");     // 全賃貸面積
define("OBJECT_ID_050130790", "division_maintenance_and_repairs6");     // 全賃貸可能面積
define("OBJECT_ID_050130800", "warranty");                              // 瑕疵担保
define("OBJECT_ID_050130810", "development_land_disaster1");            // 造成宅地防災区域
define("OBJECT_ID_050130820", "development_land_disaster2");            // 使わない
define("OBJECT_ID_050130830", "development_land_disaster3");            // 使わない
define("OBJECT_ID_050130840", "sand_disaster_warning_area");            // 土砂災害警戒区域
define("OBJECT_ID_050130850", "sand_disaster_warning_special_area");    // 使わない
define("OBJECT_ID_050130860", "tsunami_disaster_warning_area");         // 津波災害警戒区域
define("OBJECT_ID_050130870", "asbestos_investigation");                // 石綿使用調査
define("OBJECT_ID_050130880", "asbestos_investigator");                 // 約款＿鑑定評価記載内容
define("OBJECT_ID_050130890", "seismic_diagnosis");                     // 耐震診断
define("OBJECT_ID_050130900", "housing_performance_evaluation");        // 住宅性能評価
define("OBJECT_ID_050130910", "thirdparty_survey");                     // 第三者調査
define("OBJECT_ID_050130920", "building_status_survey");                // 建物状況調査
define("OBJECT_ID_050130930", "results_building_status_survey");        // 使わない
define("OBJECT_ID_050130940", "document_storage_status1");              // 書類保存状況
define("OBJECT_ID_050130950", "document_storage_status2");              // 使わない
define("OBJECT_ID_050130960", "document_storage_status3");              // 使わない
define("OBJECT_ID_050130970", "document_storage_status4");              // 使わない
define("OBJECT_ID_050130980", "target_property_price");                 // 対象不動産価格
define("OBJECT_ID_050130990", "calculation_method1");                   // 価格算定方式
define("OBJECT_ID_050131000", "calculation_method2");                   //
define("OBJECT_ID_050131010", "calculation_method3");                   // 不動産鑑定評価内容
define("OBJECT_ID_050131020", "real_estate_appraiser");                 // 不動産鑑定士の鑑定評価の有無
define("OBJECT_ID_050131030", "room");                                  // すべてに関してテナントの総数
define("OBJECT_ID_050131040", "total_rent_income");                     // 使わない
define("OBJECT_ID_050131050", "total_leased_area");                     // 使わない
define("OBJECT_ID_050131060", "total_leased_area1");                    // 対象毎に関する次の事項
define("OBJECT_ID_050131070", "total_leased_area2");                    // 使わない
define("OBJECT_ID_050131080", "tatal_leased_area3");                    // 使わない
define("OBJECT_ID_050131090", "total_leased_area4");                    // 使わない
define("OBJECT_ID_050131100", "total_leased_area5");                    // 使わない
define("OBJECT_ID_050131110", "total_leased_area6");                    // 使わない
define("OBJECT_ID_050131120", "total_leasable_area");                   // 使わない
define("OBJECT_ID_050131130", "5y_occupancy_rate1");                    // 使わない
define("OBJECT_ID_050131140", "5y_occupancy_rate2");                    // 使わない
define("OBJECT_ID_050131150", "5y_occupancy_tate3");                    // 使わない
define("OBJECT_ID_050131160", "5y_occupancy_rate4");                    // 使わない
define("OBJECT_ID_050131170", "5y_occupancy_rate5");                    // 使わない
define("OBJECT_ID_050131180", "tenant_name");                           // 主要テナント名称
define("OBJECT_ID_050131190", "tenant_industry");                       // 主要テナント業種
define("OBJECT_ID_050131200", "tenant_annual_rent");                    // 主要テナント年間賃料
define("OBJECT_ID_050131210", "tenant_leased_area");                    // 主要テナント賃貸面積
define("OBJECT_ID_050131220", "tenant_contract_expiration_date");       // 主要テナント満了日
define("OBJECT_ID_050131230", "tenant_renewal_method");                 // 主要テナント更改方法
define("OBJECT_ID_050131240", "tenant_security_deposit");               // 主要テナント保証金等
define("OBJECT_ID_050131250", "tenant_important_subjects");             // 主要テナント他事項
define("OBJECT_ID_050131260", "rent_payment_status");                   // 賃料延滞状況
define("OBJECT_ID_050131270", "5y_rent_income_1");                      // 直近５年間の収入および賃貸に係る費用
define("OBJECT_ID_050131280", "5y_rent_income_2");                      // 対象毎の費用
define("OBJECT_ID_050131290", "5y_rent_income_3");                      // 全賃料収入に対する割合
define("OBJECT_ID_050131300", "5y_rent_income_4");                      // 使わない
define("OBJECT_ID_050131310", "5y_rent_income_5");                      // 使わない
define("OBJECT_ID_050131320", "5y_business_rental_income_1");           // 直近５年間の稼働率
define("OBJECT_ID_050131330", "5y_business_rental_income_2");           // 使わない
define("OBJECT_ID_050131340", "5y_business_rental_income_3");           // 使わない
define("OBJECT_ID_050131350", "5y_business_rental_income_4");           // 使わない
define("OBJECT_ID_050131360", "5y_business_rental_income_5");           // 使わない
define("OBJECT_ID_050131370", "ratio");                                 // 払込日
define("OBJECT_ID_050131380", "total_investment");                      // 出資総額
define("OBJECT_ID_050131390", "investment_units");                      // 出資予定総額または限度額
define("OBJECT_ID_050131400", "total_priority_investment");             // 優先出資金額
define("OBJECT_ID_050131410", "preferred_investment_units");            // 最低出資金額
define("OBJECT_ID_050131420", "total_subordinate_investment");          // 劣後出資金額
define("OBJECT_ID_050131430", "subordinate_investment_units");          // 上限出資金額
define("OBJECT_ID_050131440", "documents_application_start_date");      // 募集期間
define("OBJECT_ID_050131450", "documents_application_end_date");        // 払戻予定日
define("OBJECT_ID_050131460", "documents_scheduled_start_date");        // 取引開始予定日
define("OBJECT_ID_050131470", "documents_scheduled_end_date");          // 取引終了予定日
define("OBJECT_ID_050131480", "documents_contract_start_date");         // 契約期間
define("OBJECT_ID_050131490", "documents_contract_end_date");           // 財産管理報告書交付予定日
define("OBJECT_ID_050131500", "first_calculation_date");                // 初回計算期日
define("OBJECT_ID_050131510", "cycle");                                 // 周期
define("OBJECT_ID_050131520", "initial_distribution_schedule");         // 初回配当予定日
define("OBJECT_ID_050131530", "documents_expected_yield");              // 表示用利回り
define("OBJECT_ID_050131540", "upfrontfee");                            // 取得時報酬
define("OBJECT_ID_050131550", "management_consideration");              // 管理時報酬
define("OBJECT_ID_050131560", "consideration_sale");                    // 売却時報酬
define("OBJECT_ID_050131570", "completion_date");                       // 竣工日
define("OBJECT_ID_050131580", "project_type");                          // プロジェクトの型
define("OBJECT_ID_050131590", "property_name");                         // 物件名称
define("OBJECT_ID_050131600", "housing_display");                       // 物件住居表示
define("OBJECT_ID_050131610", "property_description");                  // 物件概要
define("OBJECT_ID_050131620", "traffic_access1");                       // 使わない
define("OBJECT_ID_050131630", "traffic_access2");                       // 使わない
define("OBJECT_ID_050131640", "traffic_access3");                       // 使わない
define("OBJECT_ID_050131650", "neighboring_facilities1");               // 使わない
define("OBJECT_ID_050131660", "neighboring_facilities2");               // 使わない
define("OBJECT_ID_050131670", "neighboring_facilities3");               // 使わない
define("OBJECT_ID_050131680", "facility_1");                            // 設備　バス・トイレ別
define("OBJECT_ID_050131690", "facility_2");                            // 設備　エアコン
define("OBJECT_ID_050131700", "facility_3");                            // 設備　システムキッチン
define("OBJECT_ID_050131710", "facility_4");                            // 設備　TVモニター付きインターホン
define("OBJECT_ID_050131720", "facility_5");                            // 設備　洗浄機能付き便座
define("OBJECT_ID_050131730", "facility_6");                            // 設備　室内洗濯機置き場
define("OBJECT_ID_050131740", "facility_7");                            // 設備　エレベーター
define("OBJECT_ID_050131750", "facility_8");                            // 設備　敷地内ゴミ置き場
define("OBJECT_ID_050131760", "facility_9");                            // 設備　宅配ボックス
define("OBJECT_ID_050131770", "facility_10");                           // 設備　オートロック
define("OBJECT_ID_050131780", "facility_11");                           // 設備　バルコニー
define("OBJECT_ID_050131790", "facility_12");                           // 設備　駐輪場
define("OBJECT_ID_050131800", "facility_13");                           // 設備　バイク置き場
define("OBJECT_ID_050131810", "facility_14");                           // 設備　駐車場
define("OBJECT_ID_050131820", "facility_15");                           // 設備　防犯カメラ

// 貸付内容(入力)
define("OBJECT_ID_050170010", "fund_id");
define("OBJECT_ID_050170020", "fund_name");
define("OBJECT_ID_050170030", "loan_no");
define("OBJECT_ID_050170040", "borrower_name");
define("OBJECT_ID_050170050", "loan_date");
define("OBJECT_ID_050170060", "max_loan_amount");
define("OBJECT_ID_050170070", "loan_amount");
define("OBJECT_ID_050170080", "min_loan_amount");
define("OBJECT_ID_050170090", "interest_rate");
define("OBJECT_ID_050170100", "number_of_repayments");
define("OBJECT_ID_050170110", "repayment_start_year");
define("OBJECT_ID_050170120", "repayment_start_month");
define("OBJECT_ID_050170130", "trade_date");
define("OBJECT_ID_050170140", "warranty_code");
define("OBJECT_ID_050170150", "collateral_code");
define("OBJECT_ID_050170160", "repayment_method_code");
define("OBJECT_ID_050170170", "dividend_amount");
define("OBJECT_ID_050170180", "tax_amount");
define("OBJECT_ID_050170190", "reward_amount");

// 返済予定一覧（入力）
define("OBJECT_ID_050190010", "repayment_date_2_");
define("OBJECT_ID_050190020", "principal_amount_2_");
define("OBJECT_ID_050190030", "interest_amount_2_");
define("OBJECT_ID_050190040", "delay_damages_");
define("OBJECT_ID_050190050", "id_");
define("OBJECT_ID_050190060", "fund_id_");
define("OBJECT_ID_050190070", "fund_name_");
define("OBJECT_ID_050190080", "loan_no_");
define("OBJECT_ID_050190090", "repayment_date_1_");
define("OBJECT_ID_050190100", "repaymemt_amount_1_");
define("OBJECT_ID_050190110", "principal_amount_1_");
define("OBJECT_ID_050190120", "interest_amount_1_");
define("OBJECT_ID_050190130", "seq_no_");
define("OBJECT_ID_050190140", "dividend_datetime_2_");

//配当実行
define("OBJECT_ID_050220010", "id_");
define("OBJECT_ID_050220020", "loan_no_");
define("OBJECT_ID_050220030", "seq_no_");
define("OBJECT_ID_050220040", "fund_id_");
define("OBJECT_ID_050220050", "fund_name_");
define("OBJECT_ID_050220060", "interest_rate_");
define("OBJECT_ID_050220070", "operating_start_");
define("OBJECT_ID_050220080", "repayment_amount_1_");
define("OBJECT_ID_050220090", "dividend_datetime_1_");
define("OBJECT_ID_050220100", "dividend_amount_1_");
define("OBJECT_ID_050220110", "repayment_amount_2_");
define("OBJECT_ID_050220120", "dividend_datetime_2_");
define("OBJECT_ID_050220130", "dividend_amount_2_");
define("OBJECT_ID_050220140", "tax_2_");
define("OBJECT_ID_050220150", "reward_amount_2_");
define("OBJECT_ID_050220160", "loan_amount_total_");
define("OBJECT_ID_050220170", "admin_yield_");
define("OBJECT_ID_050220180", "principal_amount_2_");
define("OBJECT_ID_050220190", "invest_amount");
define("OBJECT_ID_050220200", "dividend_target_");

// 休日設定
define("OBJECT_ID_050260010", "c_year_list");
define("OBJECT_ID_050260020", "c_date");
define("OBJECT_ID_050260030", "c_date_check");

//交渉履歴
define("OBJECT_ID_050300010" , "negotiation_datetime_");
define("OBJECT_ID_050300020" , "person_code_");
define("OBJECT_ID_050300030" , "place_code_");
define("OBJECT_ID_050300040" , "method_1_code_");
define("OBJECT_ID_050300050" , "method_2_code_");
define("OBJECT_ID_050300060" , "importance_code_");
define("OBJECT_ID_050300070" , "content_");
define("OBJECT_ID_050300080" , "user_id");
define("OBJECT_ID_050300090" , "user_name");
define("OBJECT_ID_050300100" , "id_");
define("OBJECT_ID_050300110" , "admin_id_");
define("OBJECT_ID_050300120" , "admin_name_");

//　報告書選択
define("OBJECT_ID_050270010" , "fund_id");
define("OBJECT_ID_050270020" , "fund_name");
define("OBJECT_ID_050270030" , "report_date");

// 運用報告書（入力）
//define("OBJECT_ID_050310010" , "fund_id");
//define("OBJECT_ID_050310020" , "fund_name");
//define("OBJECT_ID_050310030" , "report_year");
//define("OBJECT_ID_050310040" , "report_month");
//define("OBJECT_ID_050310050" , "report_date");
//define("OBJECT_ID_050310060" , "remittance_date");
//define("OBJECT_ID_050310070" , "release_date");
//define("OBJECT_ID_050310080" , "report_status");
//define("OBJECT_ID_050310090" , "ryudo_sisan");
//define("OBJECT_ID_050310100" , "ryudo_fusai");
//define("OBJECT_ID_050310110" , "genkin_oyobi_yokin");
//define("OBJECT_ID_050310120" , "tanki_kariirekin");
//define("OBJECT_ID_050310130" , "tanki_kasitukekin");
//define("OBJECT_ID_050310140" , "kotei_fusai");
//define("OBJECT_ID_050310150" , "kotei_sisan");
//define("OBJECT_ID_050310160" , "choki_kariirekin");
//define("OBJECT_ID_050310170" , "yuka_kotei_sisan");
//define("OBJECT_ID_050310180" , "hikiatekin");
//define("OBJECT_ID_050310190" , "mukei_kotei_sisan");
//define("OBJECT_ID_050310200" , "shussikin");
//define("OBJECT_ID_050310210" , "tosi_sonota_no_sisan");
//define("OBJECT_ID_050310220" , "hyoka_kansansagaku_nado");
//define("OBJECT_ID_050310230" , "choki_kasitukekin");
//define("OBJECT_ID_050310240" , "ruikei_riekikin_matawa_ruikei_sonsitsukin");
//define("OBJECT_ID_050310250" , "zenki_kurikosi_riekikin");
//define("OBJECT_ID_050310260" , "toki_junrieki_1");
//define("OBJECT_ID_050310270" , "sisan_gokei");
//define("OBJECT_ID_050310280" , "fusai_oyobi_junsisan_gokei");
//define("OBJECT_ID_050310290" , "hitokuchi_atari_junsisangaku");
//define("OBJECT_ID_050310300" , "uriagedaka");
//define("OBJECT_ID_050310310" , "uriagegenka");
//define("OBJECT_ID_050310320" , "uriage_sorieki");
//define("OBJECT_ID_050310330" , "hanbaihi_oyobi_ippan_kanrihi");
//define("OBJECT_ID_050310340" , "eigyo_rieki");
//define("OBJECT_ID_050310350" , "eigyogai_shueki");
//define("OBJECT_ID_050310360" , "eigyogai_rieki");
//define("OBJECT_ID_050310370" , "keijo_rieki");
//define("OBJECT_ID_050310380" , "tokubetsu_rieki");
//define("OBJECT_ID_050310390" , "tokubetsu_sonsitsu");
//define("OBJECT_ID_050310400" , "toki_junrieki_2");
//define("OBJECT_ID_050310410" , "loan_no_");
//define("OBJECT_ID_050310420" , "keiyakubi_");
//define("OBJECT_ID_050310430" , "hensaibi_");
//define("OBJECT_ID_050310440" , "hensaigaku_");
//define("OBJECT_ID_050310450" , "gankin_");
//define("OBJECT_ID_050310460" , "risoku_");
//define("OBJECT_ID_050310470" , "report_loans_id_");
define("OBJECT_ID_050310010", "fund_id");
define("OBJECT_ID_050310020", "fund_name");
define("OBJECT_ID_050310030", "report_year");
define("OBJECT_ID_050310040", "report_month");
define("OBJECT_ID_050310050", "report_date");
define("OBJECT_ID_050310060", "remittance_date");
define("OBJECT_ID_050310070", "issue_date");
define("OBJECT_ID_050310080", "report_status");
define("OBJECT_ID_050310090", "account_01");
define("OBJECT_ID_050310100", "account_02");
define("OBJECT_ID_050310110", "account_03");
define("OBJECT_ID_050310120", "account_04");
define("OBJECT_ID_050310130", "account_05");
define("OBJECT_ID_050310140", "account_06");
define("OBJECT_ID_050310150", "account_07");
define("OBJECT_ID_050310160", "account_08");
define("OBJECT_ID_050310170", "account_09");
define("OBJECT_ID_050310180", "account_10");
define("OBJECT_ID_050310190", "account_11");
define("OBJECT_ID_050310200", "account_12");
define("OBJECT_ID_050310210", "account_13");
define("OBJECT_ID_050310220", "account_14");
define("OBJECT_ID_050310230", "account_15");
define("OBJECT_ID_050310240", "account_16");
define("OBJECT_ID_050310250", "account_17");
define("OBJECT_ID_050310260", "account_18");
define("OBJECT_ID_050310270", "account_19");
define("OBJECT_ID_050310280", "account_20");
define("OBJECT_ID_050310290", "account_21");
define("OBJECT_ID_050310300", "account_22");
define("OBJECT_ID_050310310", "account_23");
define("OBJECT_ID_050310320", "account_24");
define("OBJECT_ID_050310330", "account_25");
define("OBJECT_ID_050310340", "account_26");
define("OBJECT_ID_050310350", "account_27");
define("OBJECT_ID_050310360", "account_28");
define("OBJECT_ID_050310370", "account_29");
define("OBJECT_ID_050310380", "account_30");
define("OBJECT_ID_050310390", "account_31");
define("OBJECT_ID_050310400", "account_32");
define("OBJECT_ID_050310410", "account_33");
define("OBJECT_ID_050310420", "account_34");
define("OBJECT_ID_050310430", "account_35");
define("OBJECT_ID_050310440", "account_36");
define("OBJECT_ID_050310450", "total_amount_01");
define("OBJECT_ID_050310460", "total_amount_02");
define("OBJECT_ID_050310470", "total_amount_03");
define("OBJECT_ID_050310480", "amount_01");
define("OBJECT_ID_050310490", "amount_02");
define("OBJECT_ID_050310500", "amount_03");
define("OBJECT_ID_050310510", "amount_04");
define("OBJECT_ID_050310520", "amount_05");
define("OBJECT_ID_050310530", "amount_06");
define("OBJECT_ID_050310540", "amount_07");
define("OBJECT_ID_050310550", "amount_08");
define("OBJECT_ID_050310560", "amount_09");
define("OBJECT_ID_050310570", "amount_10");
define("OBJECT_ID_050310580", "amount_11");
define("OBJECT_ID_050310590", "amount_12");
define("OBJECT_ID_050310600", "amount_13");
define("OBJECT_ID_050310610", "amount_14");
define("OBJECT_ID_050310620", "amount_15");
define("OBJECT_ID_050310630", "amount_16");
define("OBJECT_ID_050310640", "amount_17");
define("OBJECT_ID_050310650", "amount_18");
define("OBJECT_ID_050310660", "amount_19");
define("OBJECT_ID_050310670", "amount_20");
define("OBJECT_ID_050310680", "amount_21");
define("OBJECT_ID_050310690", "amount_22");
define("OBJECT_ID_050310700", "amount_23");
define("OBJECT_ID_050310710", "amount_24");
define("OBJECT_ID_050310720", "amount_25");
define("OBJECT_ID_050310730", "amount_26");
define("OBJECT_ID_050310740", "amount_27");
define("OBJECT_ID_050310750", "amount_28");
define("OBJECT_ID_050310760", "amount_29");
define("OBJECT_ID_050310770", "amount_30");
define("OBJECT_ID_050310780", "amount_31");
define("OBJECT_ID_050310790", "amount_32");
define("OBJECT_ID_050310800", "amount_33");
define("OBJECT_ID_050310810", "amount_34");
define("OBJECT_ID_050310820", "amount_35");
define("OBJECT_ID_050310830", "amount_36");
define("OBJECT_ID_050310840", "loan_no_");
define("OBJECT_ID_050310850", "keiyakubi_");
define("OBJECT_ID_050310860", "hensaibi_");
define("OBJECT_ID_050310870", "hensaigaku_");
define("OBJECT_ID_050310880", "gankin_");
define("OBJECT_ID_050310890", "risoku_");

// 取引残高報告書
define("OBJECT_ID_050380010" , "trade_start_year");
define("OBJECT_ID_050380020" , "trade_start_month");
define("OBJECT_ID_050380030" , "trade_end_year");
define("OBJECT_ID_050380040" , "trade_end_month");
define("OBJECT_ID_050380050" , "information");

// 年間取引報告書
define("OBJECT_ID_050410010" , "trade_year");

// メール送信
define("OBJECT_ID_050430010", "specified_method_code");
define("OBJECT_ID_050430020", "user_status_code_0");    // 投資家状態：仮登録
define("OBJECT_ID_050430030", "user_status_code_1");    // 投資家状態：登録申請中
define("OBJECT_ID_050430040", "user_status_code_2");    // 投資家状態：承認済
define("OBJECT_ID_050430050", "user_status_code_3");    // 投資家状態：認証済
define("OBJECT_ID_050430060", "user_status_code_4");    // 投資家状態：停止
define("OBJECT_ID_050430070", "user_status_code_5");    // 投資家状態：退会
define("OBJECT_ID_050430080", "user_status_code_6");    // 投資家状態：開設拒否
define("OBJECT_ID_050430090", "mail_magazine_recieve"); // メルマガ：登録済
define("OBJECT_ID_050430100", "mail_magazine_reject");  // メルマガ：未登録
define("OBJECT_ID_050430110", "lender_no");             // 管理番号 or ID
define("OBJECT_ID_050430120", "subject");               // タイトル
define("OBJECT_ID_050430130", "body");                  // 本文
define("OBJECT_ID_050430140", "mail_account_code");     // 送信元メールアカウント

// お知らせ送信
define("OBJECT_ID_050480010", "specified_method_code"); // 送信先指定方法
define("OBJECT_ID_050480020", "user_status_code_0");    // 投資家状態：仮登録
define("OBJECT_ID_050480030", "user_status_code_1");    // 投資家状態：登録申請中
define("OBJECT_ID_050480040", "user_status_code_2");    // 投資家状態：承認済
define("OBJECT_ID_050480050", "user_status_code_3");    // 投資家状態：認証済
define("OBJECT_ID_050480060", "user_status_code_4");    // 投資家状態：停止
define("OBJECT_ID_050480070", "user_status_code_5");    // 投資家状態：退会
define("OBJECT_ID_050480080", "user_status_code_6");    // 投資家状態：開設拒否
define("OBJECT_ID_050480090", "fund_id");               // ファンドID
define("OBJECT_ID_050480100", "lender_no");             // 管理番号 or ID
define("OBJECT_ID_050480110", "force_flag");            // 強制確認
define("OBJECT_ID_050480120", "agreement_flag");        // 同意
define("OBJECT_ID_050480130", "post_date");             // 掲載日
define("OBJECT_ID_050480140", "post_time");             // 掲載時刻
define("OBJECT_ID_050480150", "subject");               // タイトル
define("OBJECT_ID_050480160", "body");                  // 本文
define("OBJECT_ID_050480170", "reg_doc_00001");         // 添付ファイル：利用規約
define("OBJECT_ID_050480180", "reg_doc_00002");         // 添付ファイル：契約締結前交付書面
define("OBJECT_ID_050480190", "reg_doc_00003");         // 添付ファイル：匿名組合契約約款
define("OBJECT_ID_050480200", "reg_doc_00004");         // 添付ファイル：電磁的方法による書面の交付に関する同意書
define("OBJECT_ID_050480210", "reg_doc_00005");         // 添付ファイル：サービス利用に関する確認書

define("OBJECT_ID_050480220", "inv_doc_00004");         // 添付ファイル：運用報告書
define("OBJECT_ID_050480230", "report_fund_id");        // ファンドID
define("OBJECT_ID_050480240", "report_year");           // 運用年月(年)
define("OBJECT_ID_050480250", "report_month");          // 運用年月(月)

define("OBJECT_ID_050480260", "inv_doc_00005");         // 添付ファイル：取引残高報告書
define("OBJECT_ID_050480270", "trade_start_year");      // 取引開始年月(年)
define("OBJECT_ID_050480280", "trade_start_month");     // 取引開始年月(月)

define("OBJECT_ID_050480290", "file_create_flag");      // ファイル作成

define("OBJECT_ID_050480300", "inv_doc_00006");         // 添付ファイル：年間取引報告書
//
// CSVダウンロード
define("OBJECT_ID_050470010", "target_year");  // 対象年
define("OBJECT_ID_050470020", "target_month"); // 対象月

// 入金照合処理
define("OBJECT_ID_050530000" , "id");				        // ID
define("OBJECT_ID_050530010" , "deposit_id");				// 入金履歴ID
define("OBJECT_ID_050530020" , "deposit_date");				// 取引日
define("OBJECT_ID_050530030" , "deposit_amount");			// 入金額
define("OBJECT_ID_050530040" , "deposit_account_number");	// 入金先口座番号
define("OBJECT_ID_050530050" , "requester_account_name");	// 振込依頼人名
define("OBJECT_ID_050530060" , "deposit_user_id");			// 入金ユーザID
define("OBJECT_ID_050530070" , "investment_id");			// 投資申込ID
define("OBJECT_ID_050530080" , "investment_user_id");		// 投資申込ユーザID
define("OBJECT_ID_050530090" , "user_name");				// ユーザ名
define("OBJECT_ID_050530100" , "user_name_kana");			// ユーザ名カナ
define("OBJECT_ID_050530110" , "fund_id");					// ファンドID
define("OBJECT_ID_050530120" , "fund_name");				// ファンド名
define("OBJECT_ID_050530130" , "application_datetime");		// 投資申込日時
define("OBJECT_ID_050530131" , "approval_datetime");		// 承認日
define("OBJECT_ID_050530140" , "investment_amount");		// 投資額
define("OBJECT_ID_050530150" , "expiration_date");			// 入金期限
define("OBJECT_ID_050530151" , "expiration_datetime");		// 入金期限
define("OBJECT_ID_050530160" , "selection");				// 選択状態
define("OBJECT_ID_050530300" , "deposit_date");				// 入金日

// ボタン名
define("OBJECT_ID_BTN000010", "btn010");
define("OBJECT_ID_BTN000020", "btn020");
define("OBJECT_ID_BTN000030", "btn030");
define("OBJECT_ID_BTN000040", "btn040");
define("OBJECT_ID_BTN000050", "btn050");
define("OBJECT_ID_BTN000060", "btn060");
define("OBJECT_ID_BTN000070", "btn070");
define("OBJECT_ID_BTN000080", "btn080");
define("OBJECT_ID_BTN000090", "btn090");
define("OBJECT_ID_BTN000100", "btn100");

// リンク
define("OBJECT_ID_LNK000010", "lnk010");

// ViewTestリダイレクト先
define("OBJECT_ID_990000010", "hidden_redirect_c");
define("OBJECT_ID_990000020", "hidden_redirect_a");


define("HIDDEN_ID_000000010", "hidden_event_id");
define("HIDDEN_ID_000000020", "hidden_user_id");
define("HIDDEN_ID_000000030", "hidden_fund_id");
define("HIDDEN_ID_000000040", "hidden_loan_no");
define("HIDDEN_ID_000000050", "hidden_seq_no");
define("HIDDEN_ID_000000060", "hidden_doc_");
define("HIDDEN_ID_000000070", "hidden_doc_1");
define("HIDDEN_ID_000000080", "hidden_doc_2");
define("HIDDEN_ID_000000090", "hidden_user_id_");
define("HIDDEN_ID_000000100", "hidden_fund_id_");
define("HIDDEN_ID_000000110", "hidden_investment_amount_");
define("HIDDEN_ID_000000120", "hidden_investment_status_code_");
define("HIDDEN_ID_000000130", "hidden_id_");
define("HIDDEN_ID_000000160", "hidden_id");
define("HIDDEN_ID_000000170", "hidden_ex_key");
define("HIDDEN_ID_000000180", "hidden_exp_date");
define("HIDDEN_ID_000000190", "hidden_information_confirm_date");
define("HIDDEN_ID_000000200", "hidden_reference_flag");


// 投資履歴
define("SEARCH_ID_040050010", "search_application_datetime_from");
define("SEARCH_ID_040050020", "search_application_datetime_to");

// 配当履歴
define("SEARCH_ID_040060010", "search_dividend_date_from");
define("SEARCH_ID_040060020", "search_dividend_date_to");

// 同意履歴
define("SEARCH_ID_040110010", "search_agreement_date_from");
define("SEARCH_ID_040110020", "search_agreement_date_to");

// お知らせ
define("SEARCH_ID_040090010", "search_post_datetime_from");
define("SEARCH_ID_040090020", "search_post_datetime_to");

// 配当予定 (2017/10/12追加)
define("SEARCH_ID_040120010", "search_dividend_date_from");
define("SEARCH_ID_040120020", "search_dividend_date_to");

// ユーザ検索項目
define("SEARCH_ID_050030010", "search_kanji_last_name");
define("SEARCH_ID_050030020", "search_kanji_first_name");
define("SEARCH_ID_050030030", "search_furi_last_name");
define("SEARCH_ID_050030040", "search_furi_first_name");
define("SEARCH_ID_050030050", "search_user_id");
define("SEARCH_ID_050030055", "search_lender_no");
define("SEARCH_ID_050030060", "search_interim_registeration_datetime_from"); // 仮登録日(開始)
define("SEARCH_ID_050030070", "search_interim_registeration_datetime_to");   // 仮登録日(終了)
define("SEARCH_ID_050030080", "search_application_datetime_from");           // 登録申請日(開始)
define("SEARCH_ID_050030090", "search_application_datetime_to");             // 登録申請日(終了)
define("SEARCH_ID_050030100", "search_approval_datetime_from");              // 承認日(開始)
define("SEARCH_ID_050030110", "search_approval_datetime_to");                // 承認日(終了)
define("SEARCH_ID_050030120", "search_user_status_0");                       // 状態:仮登録
define("SEARCH_ID_050030130", "search_user_status_1");                       // 状態:登録申請中
define("SEARCH_ID_050030140", "search_user_status_2");                       // 状態:承認済
define("SEARCH_ID_050030150", "search_user_status_3");                       // 状態:認証済
define("SEARCH_ID_050030160", "search_user_status_4");                       // 状態:停止
define("SEARCH_ID_050030170", "search_user_status_5");                       // 状態:退会
define("SEARCH_ID_050030180", "search_user_status_6");                       // 状態:開設拒否
define("SEARCH_ID_050030190", "sort_column_code_user");                      // ソート項目コード
define("SEARCH_ID_050030200", "sort_order_code_user");                       // ソート順コード
define("SEARCH_ID_050030210", "search_mail_address");                        // メールアドレス
define("SEARCH_ID_050030220", "search_mail_magazine_receive");               // メルマガ：受信する
define("SEARCH_ID_050030230", "search_mail_magazine_reject");                // メルマガ：受信しない

// 投資申込検索項目
define("SEARCH_ID_050080010", "search_user_name");
define("SEARCH_ID_050080015", "search_user_name_kana");
define("SEARCH_ID_050080020", "search_fund_name");
define("SEARCH_ID_050080025", "search_fund_id");
define("SEARCH_ID_050080030", "search_application_date_from");
define("SEARCH_ID_050080040", "search_application_date_to");
define("SEARCH_ID_050080050", "search_investment_status_0");
define("SEARCH_ID_050080060", "search_investment_status_1");
define("SEARCH_ID_050080070", "search_investment_status_2");
define("SEARCH_ID_050080080", "search_investment_status_3");
define("SEARCH_ID_050080090", "search_sort_column_code");
define("SEARCH_ID_050080100", "search_sort_order_code");
define("SEARCH_ID_050080110", "search_approval_date_from");
define("SEARCH_ID_050080120", "search_approval_date_to");

// ファンド検索項目
define("SEARCH_ID_050110010", "search_fund_name");
define("SEARCH_ID_050110020", "search_operating_start_from");
define("SEARCH_ID_050110030", "search_operation_start_to");
define("SEARCH_ID_050110040", "search_fund_id");
define("SEARCH_ID_050110050", "search_fund_status_0");                      // 状態:募集開始前
define("SEARCH_ID_050110060", "search_fund_status_1");                      // 状態:募集中
define("SEARCH_ID_050110070", "search_fund_status_2");                      // 状態:運用開始前
define("SEARCH_ID_050110080", "search_fund_status_3");                      // 状態:運用中
define("SEARCH_ID_050110090", "search_fund_status_4");                      // 状態:運用終了
define("SEARCH_ID_050110100", "search_fund_status_5");                      // 状態:不成立
define("SEARCH_ID_050110101", "search_fund_status_6");                      // 状態:強制終了
define("SEARCH_ID_050110110", "sort_column_code_fund");                     // ソート項目コード
define("SEARCH_ID_050110120", "sort_order_code_fund");                      // ソート順コード
define("SEARCH_ID_050110130", "search_post_datetime_from");
define("SEARCH_ID_050110140", "search_post_datetime_to");

// 返済予定検索項目
define("SEARCH_ID_050190010", "search_repayment_date_from");
define("SEARCH_ID_050190020", "search_repayment_date_to");
define("SEARCH_ID_050190030", "searcn_fund_id");
define("SEARCH_ID_050190040", "sort_column_code_repayment");                // ソート項目コード
define("SEARCH_ID_050190050", "sort_order_code_repayment");                 // ソート順コード

//報告書発行対象ファンド一覧
define("SEARCH_ID_050340010", "fund_checkbox");                             // checkbox

// 配当実績検索項目
define("SEARCH_ID_050250010", "searcn_fund_id");
define("SEARCH_ID_050250020", "search_fund_name");
define("SEARCH_ID_050250030", "search_user_id");
define("SEARCH_ID_050250040", "search_kanji_last_name");
define("SEARCH_ID_050250050", "search_kanji_first_name");
define("SEARCH_ID_050250060", "search_dividend_date_from");
define("SEARCH_ID_050250070", "search_dividend_date_to");

// 入金口座管理検索項目 (2017/10/10追加)
define("SEARCH_ID_050510010", "search_name_kanji");	                        // 氏名(漢字)
define("SEARCH_ID_050510020", "search_name_kana");	                        // 氏名(カナ)
define("SEARCH_ID_050510030", "search_user_id");	                        // ユーザID
define("SEARCH_ID_050510040", "search_deposit_account_number");	            // 口座番号
define("SEARCH_ID_050510050", "search_deposit_status_unassigned");	        // 口座未割当
define("SEARCH_ID_050510060", "search_deposit_status_assigned");	        // 口座割当済

// 入金データ入力項目
define("SEARCH_ID_050520010", "search_filepath");	                        // データファイルパス

// CSVカラム
define("CSV_COLUMN_010010", "fund_id");
define("CSV_COLUMN_010020", "fund_name");
define("CSV_COLUMN_010030", "loan_no");
define("CSV_COLUMN_010040", "borrower_name");
define("CSV_COLUMN_010050", "admin_yield");
define("CSV_COLUMN_010060", "interest_rate");
define("CSV_COLUMN_010070", "repayment_amount");
define("CSV_COLUMN_010080", "principal_amount");
define("CSV_COLUMN_010090", "reward_amount");
define("CSV_COLUMN_010100", "dividend_amount");
define("CSV_COLUMN_010110", "tax");
define("CSV_COLUMN_010120", "remitt_amount");

define("CSV_COLUMN_020010", "lender_name");
define("CSV_COLUMN_020020", "lender_kana");
define("CSV_COLUMN_020030", "fund_id");
define("CSV_COLUMN_020040", "dividend_amount");
define("CSV_COLUMN_020050", "tax_amount");
define("CSV_COLUMN_020060", "remittance_amount");
define("CSV_COLUMN_020070", "lender_no");

define("CSV_COLUMN_030010", "service_type");
define("CSV_COLUMN_030020", "remitt_date");
define("CSV_COLUMN_030030", "bank_code");
define("CSV_COLUMN_030040", "branch_code");
define("CSV_COLUMN_030050", "account_type");
define("CSV_COLUMN_030060", "remitt_account_number");
define("CSV_COLUMN_030070", "account_name");
define("CSV_COLUMN_030080", "dividend_amount");
define("CSV_COLUMN_030090", "lender_no");
define("CSV_COLUMN_030100", "bank_name");
define("CSV_COLUMN_030110", "branch_name");
define("CSV_COLUMN_030120", "account_sign");
define("CSV_COLUMN_030130", "account_number");

define("CSV_COLUMN_040010", "lender_no");
define("CSV_COLUMN_040020", "user_id");
define("CSV_COLUMN_040030", "user_name");
define("CSV_COLUMN_040040", "approval_datetime");
define("CSV_COLUMN_040050", "reg_0");
define("CSV_COLUMN_040060", "reg_1");
define("CSV_COLUMN_040070", "reg_2");
define("CSV_COLUMN_040080", "reg_3");
define("CSV_COLUMN_040090", "reg_4");
define("CSV_COLUMN_040100", "reg_5");
define("CSV_COLUMN_040110", "fund_1");
define("CSV_COLUMN_040120", "fund_2");
define("CSV_COLUMN_040130", "fund_3");

define("CSV_COLUMN_050010", "lender_no");
define("CSV_COLUMN_050020", "user_id");
define("CSV_COLUMN_050030", "kanji_last_name");
define("CSV_COLUMN_050040", "kanji_first_name");
define("CSV_COLUMN_050050", "furi_last_name");
define("CSV_COLUMN_050060", "furi_first_name");
define("CSV_COLUMN_050070", "birthday");
define("CSV_COLUMN_050080", "zip");
define("CSV_COLUMN_050090", "address1");
define("CSV_COLUMN_050100", "address2");
define("CSV_COLUMN_050110", "address3");
define("CSV_COLUMN_050120", "fixed_line_phone");
define("CSV_COLUMN_050130", "mobile_phone");

// 未照合入金履歴ダウンロード
define("CSV_COLUMN_060010", "deposit_date");			// 取引日
define("CSV_COLUMN_060020", "deposit_amount");			// 入金額
define("CSV_COLUMN_060030", "deposit_branch_code");		// 支店番号
define("CSV_COLUMN_060040", "deposit_account_number");	// 口座番号
define("CSV_COLUMN_060050", "requester_account_name");	// 依頼人名
define("CSV_COLUMN_060060", "user_id");					// ユーザID
define("CSV_COLUMN_060070", "user_name");				// ユーザ名

define("SORT_COLUMN_CODE_FUND_ID"               , 0);
define("SORT_COLUMN_CODE_FUND_NAME"             , 1);
define("SORT_COLUMN_CODE_FUND_MAX_LOAN_AMOUNT"  , 2);
define("SORT_COLUMN_CODE_FUND_LOAN_AMOUNT"      , 3);
define("SORT_COLUMN_CODE_FUND_INVITING_START"   , 4);
define("SORT_COLUMN_CODE_FUND_OPERATING_START"  , 5);
define("SORT_COLUMN_CODE_FUND_STATUS"           , 6);
define("SORT_COLUMN_CODE_FUND_POST_DATETIME"    , 7);

define("SORT_COLUMN_CODE_REPAYMENT_FUND_ID"         , 0);
define("SORT_COLUMN_CODE_REPAYMENT_FUND_NAME"       , 1);
//define("SORT_COLUMN_CODE_REPAYMENT_OPERATING_START" , 2);
define("SORT_COLUMN_CODE_REPAYMENT_REPAYMENT_DATE"  , 2);

define("SORT_ORDER_CODE_ASC"  , 0);
define("SORT_ORDER_CODE_DESC" , 1);

define("WEEKDAY_CODE_SUN", "0");
define("WEEKDAY_CODE_MON", "1");
define("WEEKDAY_CODE_TUE", "2");
define("WEEKDAY_CODE_WED", "3");
define("WEEKDAY_CODE_THU", "4");
define("WEEKDAY_CODE_FRI", "5");
define("WEEKDAY_CODE_SAT", "6");

define("DATE_FORMAT"       , "Y/m/d");          // 日付フォーマット 2015/01/01
define("DATE_FORMAT_1"     , "Y/m/01");         // 日付フォーマット 2015/01/01
define("DATE_FORMAT_2"     , "Y年n月j日");       // 日付フォーマット 2015年1月1日
define("TIME_FORMAT"       , "H:i:s");          // 時刻フォーマット 01:01:01
define("DATETIME_FORMAT"   , "Y/m/d H:i:s");    // 日時フォーマット 2015/01/01 01:01:01
define("DATETIME_FORMAT_1" , "Y/m/d 00:00:00"); // 日時フォーマット 2015/01/01 01:01:01
define("DATETIME_FORMAT_2" , "Y/m/d 23:59:59"); // 日時フォーマット 2015/01/01 01:01:01
define("DATETIME_FORMAT_3" , "Y-m-d H:i:s");    // 日時フォーマット 2015/01/01 01:01:01
define("DATETIME_FORMAT_4" , "YmdHis");         // 日時フォーマット 20150101010101
define("DATE_FORMAT_MONTH" , "Y/m");            // 年月フォーマット 2015/01

define("DATE_FORMAT_CHECK", '/^([1-9][0-9]{3})\/(0[1-9]{1}|1[0-2]{1})\/(0[1-9]{1}|[1-2]{1}[0-9]{1}|3[0-1]{1})$/');
define("TIME_FORMAT_CHECK", '/^(0[0-9]{1}|1{1}[0-9]{1}|2{1}[0-3]{1}):(0[0-9]{1}|[1-5]{1}[0-9]{1}):(0[0-9]{1}|[1-5]{1}[0-9]{1})$/');

define("USER_ID_LENGTH"           , 8);          // ユーザID桁数
define("AUTHENTICATION_KEY_LENGTH", 8);          // 認証キー桁数
define("INTERIM_PASS_LENGTH"      , 8);          // 仮パスワード桁数
 
define("USER_STATUS_CODE_INTERIM"      , 0);     // ユーザ状態：仮登録
define("USER_STATUS_CODE_APPLIED"      , 1);     // ユーザ状態：登録申請中
define("USER_STATUS_CODE_APPROVED"     , 2);     // ユーザ状態：承認済
define("USER_STATUS_CODE_AUTHENTICATED", 3);     // ユーザ状態：認証済
define("USER_STATUS_CODE_STOPPED"      , 4);     // ユーザ状態：停止
define("USER_STATUS_CODE_WITHDRAWAL"   , 5);     // ユーザ状態：退会
define("USER_STATUS_CODE_REJECTED"     , 6);     // ユーザ状態：開設拒否

define("FUND_STATUS_CODE_BEFORE_INVITING"  , 0); // ファンド状態：募集開始前
define("FUND_STATUS_CODE_NOW_INVITING"     , 1); // ファンド状態：募集中
define("FUND_STATUS_CODE_BEFORE_OPERATING" , 2); // ファンド状態：運用開始前
define("FUND_STATUS_CODE_NOW_OPERATING"    , 3); // ファンド状態：運用中
define("FUND_STATUS_CODE_CLOSED"           , 4); // ファンド状態：運用終了
define("FUND_STATUS_CODE_FAILURE"          , 5); // ファンド状態：不成立


define("BORROWER_FLAG_FALSE", 0);                // ボロワーフラグ：レンダー
define("BORROWER_FLAG_TRUE" , 1);                // ボロワーフラグ：ボロワー
               
define("CORPORATE_FLAG_FALSE", 0);               // 法人フラグ：個人
define("CORPORATE_FLAG_TRUE" , 1);               // 法人フラグ：法人

define("IDENTIFICATION_IMAGE_FLAG_FALSE", 0);    // 本人確認書類フラグ：未取得
define("IDENTIFICATION_IMAGE_FLAG_TRUE" , 1);    // 本人確認書類フラグ：取得済

define("ACCOUNT_INFORMATION_IMAGE_FLAG_FALSE", 0); // 口座確認書類フラグ：未取得
define("ACCOUNT_INFORMATION_IMAGE_FLAG_TRUE" , 1); // 口座確認書類フラグ：取得済

define("NATIONALITY_CODE_JAPAN"  , 1); // 国籍：日本
define("NATIONALITY_CODE_FOREIGN", 2); // 国籍：日本以外

define("BANK_TYPE_CODE_YUCHO" , 1); // 金融機関区分：ゆうちょ
define("BANK_TYPE_CODE_OTHER" , 2); // 金融機関区分：ゆうちょ以外

define("BEFORE", "_before");
define("DISABLED", " disabled");
define("READONLY", " readonly");
define("CHECKED", " checked");
define("HTML_TAG_BR", "<br>");
define("HTML_HALF_WIDTH_SPACE", "&nbsp;");

define("CHECKBOX_OFF", "0");
define("CHECKBOX_ON" , "1");

define("PRESENCE_CODE", "1"); // 有無：有
define("ABSENCE_CODE" , "0"); // 有無：無

define("FORCE_FLAG_TRUE" , "1"); // 確認強制：有
define("FORCE_FLAG_FALSE", "0"); // 確認強制：無

define("AGREEMENT_FLAG_TRUE" , "1"); // 同意：必要
define("AGREEMENT_FLAG_FALSE", "0"); // 同意：不要

define("FILE_CREATE_FLAG_FALSE", "0"); // ファイル作成：作成しない
define("FILE_CREATE_FLAG_TRUE" , "1"); // ファイル作成：作成する

define("PROC_TYPE_INSERT", 0); // 処理区分：新規登録処理
define("PROC_TYPE_UPDATE", 1); // 処理区分：更新処理
define("PROC_TYPE_DELETE", 2); // 処理区分：削除処理

define("HOLIDAY_CODE_BUSINESS" , "0"); // 休日フラグ：営業日
define("HOLIDAY_CODE_HOLIDAY", "1");   // 休日フラグ：休日

define("HOLIDAY_BF_AF_CODE_BF", "0"); // 指定日が休日の場合：前営業日
define("HOLIDAY_BF_AF_CODE_AF", "1"); // 指定日が休日の場合：翌営業日

define("PREFIX_INFO_MSG_ADMIN", "ad"); // お知らせ番号接頭文字：管理者作成
define("PREFIX_INFO_MSG_AUTO" , "at"); // お知らせ番号接頭文字：自動作成

define("REFERENCE_FLAG_TRUE" , "1"); // 参照：参照のみ
define("REFERENCE_FLAG_FALSE", "0"); // 参照：更新あり

define("LINE_FEED_CODE"    , "\n");
define("LINE_FEED_CODE_YEN", "\\n");

define("REGEX_INTEGER", "/^[0-9]+$/"); // 正規表現：整数チェック

define("MAX_LOAN_NO", 127); // 出資金償還額登録用貸付番号


define("PATH_COMPONENT", APP."Controller".DS."Component".DS);

define("DEPOSIT_ACCOUNT_STATUS_CODE_UNASSIGNED", 0); // 入金口座割当状態: 未割当
define("DEPOSIT_ACCOUNT_STATUS_CODE_ASSIGNED",	1);  // 入金口座割当状態: 割当済

/**
 * ◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆
 * リダイレクト先、コントローラ名、アクション名、モデル名等
 * ◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆
 */

// コントローラ
define("REDIRECT_C"   , "controller");
define("REDIRECT_C010", "c010_home");
define("REDIRECT_C020", "c020_tmp_registration");
define("REDIRECT_C030", "c030_registration");
define("REDIRECT_C040", "c040_lender");
define("REDIRECT_C050", "c050_admin");
define("REDIRECT_C060", "c060_pdf");
define("REDIRECT_C070", "Images");

// アクション
define("REDIRECT_A"      , "action");
define("REDIRECT_A010010", "index");
define("REDIRECT_A010020", "v020login");
define("REDIRECT_A010030", "v030fundlist");
define("REDIRECT_A010040", "v040funddetail");
define("REDIRECT_A010050", "v050reissue");
define("REDIRECT_A010060", "v060reissuecomplete");
define("REDIRECT_A010070", "v070contactinput");
define("REDIRECT_A010080", "v080contactconfirm");
define("REDIRECT_A010090", "v090contactcomplete");
define("REDIRECT_A010100", "v100operateachievement");
define("REDIRECT_A010910", "v910deleted");
define("REDIRECT_A010911", "v911rejected");
define("REDIRECT_A010920", "v920logout");
define("REDIRECT_A010930", "v930sessiontimeout");
define("REDIRECT_A020010", "v010input");
define("REDIRECT_A020020", "v020confirm");
define("REDIRECT_A020030", "v030complete");
define("REDIRECT_A030010", "v010agreement");
define("REDIRECT_A030020", "v020input");
define("REDIRECT_A030030", "v030confirm");
define("REDIRECT_A030040", "v040identification");
define("REDIRECT_A030050", "v050mailsent");  		// 2018/11/02 本人確認画像アップロード完了に変更
define("REDIRECT_A030060", "v060authenticate");
define("REDIRECT_A030070", "v070inforegistered");	// 2018/10/10 追加
define("REDIRECT_A040010", "v010mypage");
define("REDIRECT_A040020", "v020investmentinput");
define("REDIRECT_A040030", "v030investmentconfirm");
define("REDIRECT_A040040", "v040investmentcomplete");
define("REDIRECT_A040050", "v050investmenthistory");
define("REDIRECT_A040060", "v060dividendhistory");
define("REDIRECT_A040070", "v070lenderinfo");
define("REDIRECT_A040080", "v080mailpasscorrect");
define("REDIRECT_A040090", "v090informationlist");
define("REDIRECT_A040100", "v100informationdetail");
define("REDIRECT_A040110", "v110agreementhistory");
define("REDIRECT_A040120", "v120dividendplan");     // 2017/11/12 配当履歴ページ追加
define("REDIRECT_A050010", "v010login");
define("REDIRECT_A050020", "v020menu");
define("REDIRECT_A050030", "v030lenderlist");
define("REDIRECT_A050040", "v040lenderdetail");
define("REDIRECT_A050050", "v050lenderinput");
define("REDIRECT_A050060", "v060lenderconfirm");
define("REDIRECT_A050070", "v070investmentapplication");
define("REDIRECT_A050080", "v080investmentapprove");
define("REDIRECT_A050090", "v090investmentconfirm");
define("REDIRECT_A050100", "v100investmentcomplete");
define("REDIRECT_A050110", "v110fundlist");
define("REDIRECT_A050120", "v120funddetail");
define("REDIRECT_A050130", "v130fundinput");
define("REDIRECT_A050140", "v140fundconfirm");
define("REDIRECT_A050150", "v150fundcomplete");
define("REDIRECT_A050160", "v160loandetail");
define("REDIRECT_A050170", "v170loaninput");
define("REDIRECT_A050180", "v180loanconfirm");
define("REDIRECT_A050190", "v190repaymentinput");
define("REDIRECT_A050200", "v200repaymentconfirm");
define("REDIRECT_A050210", "v210repaymentcomplete");
define("REDIRECT_A050220", "v220dividendinput");
define("REDIRECT_A050230", "v230dividendconfirm");
define("REDIRECT_A050240", "v240dividendcomplete");
define("REDIRECT_A050250", "v250dividendresult");
define("REDIRECT_A050260", "v260holiday");
define("REDIRECT_A050270", "v270operatingreportselect");
define("REDIRECT_A050280", "v280operatingreportdetail");
define("REDIRECT_A050290", "v290tradebalancereportdetail");
define("REDIRECT_A050300", "v300negotiation");
define("REDIRECT_A050310", "v310operatingreportinput");
define("REDIRECT_A050320", "v320operatingreportconfirm");
define("REDIRECT_A050330", "v330operatingreportcomplete");
define("REDIRECT_A050340", "v340operatingreportissuelist");
define("REDIRECT_A050350", "v350operatingreportissueconfirm");
define("REDIRECT_A050360", "v360operatingreportissuecomplete");
define("REDIRECT_A050370", "v370reportselect");
define("REDIRECT_A050380", "v380tradebalancereportinput");
define("REDIRECT_A050390", "v390tradebalancereportconfirm");
define("REDIRECT_A050400", "v400tradebalancereportcomplete");
define("REDIRECT_A050410", "v410annualtradereportinput");
define("REDIRECT_A050420", "v420annualtradereportcomplete");
define("REDIRECT_A050430", "v430mailinput");
define("REDIRECT_A050440", "v440mailconfirm");
define("REDIRECT_A050450", "v450mailcomplete");
define("REDIRECT_A050460", "v460pdflist");
define("REDIRECT_A050470", "v470csvdownload");
define("REDIRECT_A050480", "v480informationinput");
define("REDIRECT_A050490", "v490informationconfirm");
define("REDIRECT_A050500", "v500informationcomplete");
define("REDIRECT_A050510", "v510depositaccountlist");
define("REDIRECT_A050520", "v520depositinput");
define("REDIRECT_A050530", "v530depositreconcile");
define("REDIRECT_A050540", "v540depositreconcileconfirm");
define("REDIRECT_A050550", "v550depositdownloadconfirm");
define("REDIRECT_A050560", "v560lenderreviewmenu");
define("REDIRECT_A050570", "v570lenderassessment");
define("REDIRECT_A050580", "v580lenderevaluation");
define("REDIRECT_A050590", "v590identificationrecord");
//define("REDIRECT_A050600", "v600transactionverification");
define("REDIRECT_A050600", "v600depositlist");
define("REDIRECT_A050777", "cal_exit");
define("REDIRECT_A060010", "v010showpdf");
define("REDIRECT_A060020", "v020showpdfauthkey");
define("REDIRECT_A070010", "add");
define("REDIRECT_A070020", "index");

// コンポーネント名(Cake)
define("COMPONENT_C_NAME_010", "Session");

// コンポーネント名(自作)
define("COMPONENT_M_NAME_010", "SessionUserInfo");
define("COMPONENT_M_NAME_020", "Common");
define("COMPONENT_M_NAME_030", "SessionAdminInfo");
define("COMPONENT_M_NAME_040", "Calendar");
define("COMPONENT_M_NAME_050", "User");
define("COMPONENT_M_NAME_060", "Document");
define("COMPONENT_M_NAME_070", "InformationHistory");
define("COMPONENT_M_NAME_075", "InfoAttachment");
define("COMPONENT_M_NAME_080", "InvestmentHistory");
define("COMPONENT_M_NAME_090", "DividendHistory");
define("COMPONENT_M_NAME_100", "AgreementHistory");
define("COMPONENT_M_NAME_110", "Fund");
define("COMPONENT_M_NAME_120", "Admin");
define("COMPONENT_M_NAME_130", "DividendPlan");
define("COMPONENT_M_NAME_140", "Deposit");
define("COMPONENT_M_NAME_150", "CheckList");
define("COMPONENT_M_NAME_990", "DummyData");

// テーブル名
define("TABLE_NAME_010", "mst_admins");
define("TABLE_NAME_020", "mst_calendars");
define("TABLE_NAME_030", "mst_companies");
define("TABLE_NAME_040", "mst_documents");
define("TABLE_NAME_050", "mst_funds");
define("TABLE_NAME_070", "mst_loans");
define("TABLE_NAME_080", "mst_users");
define("TABLE_NAME_085", "mst_zips");
define("TABLE_NAME_088", "mst_ginkou");
define("TABLE_NAME_090", "trn_agreement_histories");
define("TABLE_NAME_100", "trn_dividend_histories");
define("TABLE_NAME_110", "trn_information_histories");
define("TABLE_NAME_120", "trn_investment_histories");
define("TABLE_NAME_130", "trn_loan_repayments");
define("TABLE_NAME_140", "wrk_funds");
define("TABLE_NAME_150", "wrk_fundrepayments");
define("TABLE_NAME_160", "wrk_loans");
define("TABLE_NAME_170", "wrk_loanrepayments");
define("TABLE_NAME_180", "wrk_users");
define("TABLE_NAME_220", "wrk_dividends");
define("TABLE_NAME_230", "trn_dividend_plans");
define("TABLE_NAME_240", "mst_deposit_accounts");
define("TABLE_NAME_250", "trn_deposit_histories");
define("TABLE_NAME_260", "mst_checklists");
define("TABLE_NAME_270", "mst_check_items");
define("TABLE_NAME_280", "trn_review_statuses");
/*
 * 入会審査機能のテーブルを追加すること
 */

// モデル名
define("MODEL_NAME_010", "MstAdmin");
define("MODEL_NAME_020", "MstCalendar");
define("MODEL_NAME_030", "MstCompany");
define("MODEL_NAME_040", "MstDocument");
define("MODEL_NAME_050", "MstFund");
define("MODEL_NAME_070", "MstLoan");
define("MODEL_NAME_080", "MstUser");
define("MODEL_NAME_085", "MstZip");
define("MODEL_NAME_088", "MstGinkou");
define("MODEL_NAME_090", "TrnAgreementHistory");
define("MODEL_NAME_100", "TrnDividendHistory");
define("MODEL_NAME_110", "TrnInformationHistory");
define("MODEL_NAME_115", "TrnInfoAttachment");
define("MODEL_NAME_120", "TrnInvestmentHistory");
define("MODEL_NAME_130", "TrnLoanRepayment");
define("MODEL_NAME_140", "WrkFund");
define("MODEL_NAME_150", "WrkFundRepayment");
define("MODEL_NAME_160", "WrkLoan");
define("MODEL_NAME_170", "WrkLoanRepayment");
define("MODEL_NAME_180", "WrkUser");
define("MODEL_NAME_190", "WrkUser");
define("MODEL_NAME_200", "TrnDividendPlan");
define("MODEL_NAME_210", "MstDepositAccount");
define("MODEL_NAME_220", "TrnDepositHistory");
/*
 * 入会審査機能のモデルを追加すること
 */

// show columns
define("SHOW_COLUMN_FIELD", "Field");

// 共通カラム
define("COLUMN_0000010", "insert_datetime");
define("COLUMN_0000020", "insert_admin_id");
define("COLUMN_0000030", "insert_admin_name");
define("COLUMN_0000040", "update_datetime");
define("COLUMN_0000050", "update_admin_id");
define("COLUMN_0000060", "update_admin_name");
define("COLUMN_0000070", "delete_datetime");
define("COLUMN_0000080", "delete_admin_id");
define("COLUMN_0000090", "delete_admin_name");
define("COLUMN_0000100", "exclusive_key");

// mst_admins
define("COLUMN_0100010", "admin_id");
define("COLUMN_0100020", "admin_name");
define("COLUMN_0100030", "password");
define("COLUMN_0100040", "login_time");
define("COLUMN_0100050", "review_auth"); // 2018-04-20追加: 入会審査

// mst_calendars
define("COLUMN_0200010", "id");
define("COLUMN_0200020", "c_year");
define("COLUMN_0200030", "c_month");
define("COLUMN_0200040", "c_day");
define("COLUMN_0200050", "c_weekday");
define("COLUMN_0200060", "c_holiday");

// mst_companies
define("COLUMN_0300010", "company_id");
define("COLUMN_0300020", "company_name");
define("COLUMN_0300030", "zip");
define("COLUMN_0300040", "address1");
define("COLUMN_0300050", "address2");
define("COLUMN_0300060", "bank");
define("COLUMN_0300070", "branch");
define("COLUMN_0300080", "account_type");
define("COLUMN_0300090", "account_number");
define("COLUMN_0300100", "account_holder");
define("COLUMN_0300110", "dividend_day");
define("COLUMN_0300120", "holiday_bf_af_code");
define("COLUMN_0300130", "address1_kanji");
define("COLUMN_0300140", "tel");
define("COLUMN_0300150", "fax");
define("COLUMN_0300160", "mail_address");
define("COLUMN_0300200", "site_name");

// mst_documents
define("COLUMN_0400010", "id");
define("COLUMN_0400020", "doc_category_id");
define("COLUMN_0400030", "doc_id");
define("COLUMN_0400040", "doc_name");
define("COLUMN_0400050", "revision");
define("COLUMN_0400060", "note");

// mst_funds
define("COLUMN_0500010", "fund_id");                             // ファンドID
define("COLUMN_0500020", "fund_name");                           // ファンド名
define("COLUMN_0500030", "max_loan_amount_total");               // 貸付予定額合計
define("COLUMN_0500040", "loan_amount_total");                   // 貸付額合計
define("COLUMN_0500050", "min_loan_amount_total");               // 最低成立額
define("COLUMN_0500060", "min_investment_amount");               // 最低投資額
define("COLUMN_0500070", "post_datetime");                       // 掲載開始日時
define("COLUMN_0500080", "inviting_start");                      // 募集開始日時
define("COLUMN_0500090", "inviting_end");                        // 募集終了日時
define("COLUMN_0500100", "operating_start");                     // 運用開始日
define("COLUMN_0500110", "operating_end");                       // 運用終了日
define("COLUMN_0500120", "operating_term");                      // 運用期間(ヶ月)
define("COLUMN_0500130", "admin_yield");                         // 営業者利回り
define("COLUMN_0500140", "target_yield");                        // 目標利回り
define("COLUMN_0500150", "guide");                               // 概要
define("COLUMN_0500160", "dividend_datetime");                   // 配当実行日
define("COLUMN_0500170", "delay_1");                             // 遅延フラグ
define("COLUMN_0500171", "ended");                               // 強制終了フラグ
define("COLUMN_0500172", "delay_1_date");                        // 遅延フラグ確定日
define("COLUMN_0500173", "ended_date");                          // 強制終了フラグ確定日

//define("COLUMN_0500180", "deposit_loss_key");
//define("COLUMN_0500190", "deposit_loss");
//estate_add
define("COLUMN_0500180", "land_location");                       // 土地説明
define("COLUMN_0500190", "land_lot_number");                     // HP用土地説明
define("COLUMN_0500200", "land_texture");                        // 委託特例事業者の商号等
define("COLUMN_0500210", "land_area");                           // 業務管理者リンク
define("COLUMN_0500220", "land_rights_form");                    // スキーム図
define("COLUMN_0500230", "building_location");                   // 建物説明
define("COLUMN_0500240", "building_house_number");               // HP用建物説明
define("COLUMN_0500250", "building_type");                       // 株主の名称および氏名
define("COLUMN_0500260", "building_structure");                  // 役員名
define("COLUMN_0500270", "building_floor_area");                 // 私道負担
define("COLUMN_0500280", "building_area");                       // その他特定時の必要事項
define("COLUMN_0500290", "building_rights_status");              // 不動産の変更予定
define("COLUMN_0500300", "other_transaction_modes");             // 取引態様
define("COLUMN_0500310", "other_borrowings");                    // その他借入
define("COLUMN_0500320", "real_estate_rights");                  // 不動産権利
define("COLUMN_0500330", "registered_holder");                   // 各種制限に関する事項
define("COLUMN_0500340", "city_planning_act_area_division");     // 業務管理者名
define("COLUMN_0500350", "city_planning_law_restrictions");      // 使わない
define("COLUMN_0500360", "building_standards_raw_restricted_area"); // 使わない
define("COLUMN_0500370", "building_standards_raw_restricted1");  // 使わない
define("COLUMN_0500380", "building_standards_raw_restricted2");  // 代表者氏名
define("COLUMN_0500390", "building_standards_raw_restricted3");  // 許可番号
define("COLUMN_0500400", "building_standards_raw_restricted4");  // 資本金
define("COLUMN_0500410", "building_standards_raw_restricted5");  // 事前告知期日
define("COLUMN_0500420", "coverage_rate");                       // 連帯債務負担内容
define("COLUMN_0500430", "floorarea_ratio");                     // 他事業内容
define("COLUMN_0500440", "restrictions_based_laws1");            // 決算報告PDF
define("COLUMN_0500450", "restrictions_based_laws2");            // 最大延長期間
define("COLUMN_0500460", "guidance_burden");                     // 私道負担
define("COLUMN_0500470", "fanility_status_drinking_water");      // 施設設備
define("COLUMN_0500480", "fanility_status_electrical");          // 役員の従事する他事業
define("COLUMN_0500490", "fanility_status_gas");                 // 使わない
define("COLUMN_0500500", "fanility_status_sewage");              // 使わない
define("COLUMN_0500510", "fanility_status_rain_water");          // 委託の有無・委託先
define("COLUMN_0500520", "timeofcompletion");                    // 形状未完成物件時
define("COLUMN_0500530", "division_right");                      // 事務手数料
define("COLUMN_0500540", "division_shared_part");                // 利害関係人との取引
define("COLUMN_0500550", "division_usage_limit");                // 信用補完の有無
define("COLUMN_0500560", "division_other_restrictions");         // 区分所有物件詳細
define("COLUMN_0500570", "division_specific_use_permission");    // 使わない
define("COLUMN_0500580", "division_specific_exemption");         // 監査予定
define("COLUMN_0500590", "division_monthly_repair_amount");      // 物件取得金額
define("COLUMN_0500600", "division_total_reserves");             // 売却時分配率
define("COLUMN_0500610", "division_total_reserves_confirmed");   // 物件取得日
define("COLUMN_0500620", "division_delinquent_payment");         // 期中時分配率
define("COLUMN_0500630", "division_delinquent_payment_confirmed"); // 使わない
define("COLUMN_0500640", "division_monthly_management_fee");     // 使わない
define("COLUMN_0500650", "division_monthly_management_fee_confirmed"); //使わない
define("COLUMN_0500660", "division_management_fee_delinquency"); // 使わない
define("COLUMN_0500670", "division_management_fee_delinquency_confirmed"); // 使わない
define("COLUMN_0500680", "division_management_company");         // 使わない
define("COLUMN_0500690", "division_management_company_add");     // 使わない
define("COLUMN_0500700", "division_management_company_regist_number"); // 使わない
define("COLUMN_0500710", "division_maintenance_and_repairs1");   // 使わない
define("COLUMN_0500720", "division_maintenance_and_repairs2");   // 使わない
define("COLUMN_0500730", "division_maintenance_and_repairs3");   // 使わない
define("COLUMN_0500740", "division_maintenance_and_repairs4");   // 全賃料収入
define("COLUMN_0500750", "division_maintenance_and_repairs5");   // 全賃貸面積
define("COLUMN_0500760", "division_maintenance_and_repairs6");   // 全賃貸可能面積
define("COLUMN_0500770", "warranty");                            // 瑕疵担保
define("COLUMN_0500780", "development_land_disaster1");          // 造成宅地防災区域
define("COLUMN_0500790", "development_land_disaster2");          // 使わない
define("COLUMN_0500800", "development_land_disaster3");          // 使わない
define("COLUMN_0500810", "sand_disaster_warning_area");          // 土砂災害警戒区域
define("COLUMN_0500820", "sand_disaster_warning_special_area");  // 使わない
define("COLUMN_0500830", "tsunami_disaster_warning_area");       // 津波災害警戒区域
define("COLUMN_0500840", "asbestos_investigation");              // 石綿使用調査
define("COLUMN_0500850", "asbestos_investigator");               // 約款＿鑑定評価記載内容
define("COLUMN_0500860", "seismic_diagnosis");                   // 耐震診断
define("COLUMN_0500870", "housing_performance_evaluation");      // 住宅性能評価
define("COLUMN_0500880", "thirdparty_survey");                   // 第三者調査
define("COLUMN_0500890", "building_status_survey");              // 建物状況調査
define("COLUMN_0500900", "results_building_status_survey");      // 使わない
define("COLUMN_0500910", "document_storage_status1");            // 書類保存状況
define("COLUMN_0500920", "document_storage_status2");            // 使わない
define("COLUMN_0500930", "document_storage_status3");            // 使わない
define("COLUMN_0500940", "document_storage_status4");            // 使わない
define("COLUMN_0500950", "target_property_price");               // 対象不動産価格
define("COLUMN_0500960", "calculation_method1");                 // 価格算定方式
define("COLUMN_0500970", "calculation_method2");                 // 使わない
define("COLUMN_0500980", "calculation_method3");                 // 不動産鑑定評価内容
define("COLUMN_0500990", "real_estate_appraiser");               // 不動産鑑定士の鑑定評価の有無
define("COLUMN_0501000", "room");                                // すべてに関してテナントの総数
define("COLUMN_0501010", "total_rent_income");                   // 使わない
define("COLUMN_0501020", "total_leased_area");                   // 使わない
define("COLUMN_0501030", "total_leased_area1");                  // 対象毎に関する次の事項
define("COLUMN_0501040", "total_leased_area2");                  // 使わない
define("COLUMN_0501050", "tatal_leased_area3");                  // 使わない
define("COLUMN_0501060", "total_leased_area4");                  // 使わない
define("COLUMN_0501070", "total_leased_area5");                  // 使わない
define("COLUMN_0501080", "total_leased_area6");                  // 使わない
define("COLUMN_0501090", "total_leasable_area");                 // 使わない
define("COLUMN_0501100", "5y_occupancy_rate1");                  // 使わない
define("COLUMN_0501110", "5y_occupancy_rate2");                  // 使わない
define("COLUMN_0501120", "5y_occupancy_tate3");                  // 使わない
define("COLUMN_0501130", "5y_occupancy_rate4");                  // 使わない
define("COLUMN_0501140", "5y_occupancy_rate5");                  // 使わない
define("COLUMN_0501150", "tenant_name"); //主要テナント名称
define("COLUMN_0501160", "tenant_industry"); //主要テナント業種
define("COLUMN_0501170", "tenant_annual_rent"); //主要テナント年間賃料
define("COLUMN_0501180", "tenant_leased_area"); //主要テナント賃貸面積
define("COLUMN_0501190", "tenant_contract_expiration_date"); //主要テナント満了日
define("COLUMN_0501200", "tenant_renewal_method"); //主要テナント更改方法
define("COLUMN_0501210", "tenant_security_deposit"); //主要テナント保証金等
define("COLUMN_0501220", "tenant_important_subjects"); //主要テナント他事項
define("COLUMN_0501230", "rent_payment_status"); //賃料延滞状況
define("COLUMN_0501240", "5y_rent_income_1"); //直近５年間の収入および賃貸に係る費用
define("COLUMN_0501250", "5y_rent_income_2"); //対象毎の費用
define("COLUMN_0501260", "5y_rent_income_3"); //全賃料収入に対する割合
define("COLUMN_0501270", "5y_rent_income_4"); //使わない
define("COLUMN_0501280", "5y_rent_income_5"); //使わない
define("COLUMN_0501290", "5y_business_rental_income_1"); //直近５年間の稼働率
define("COLUMN_0501300", "5y_business_rental_income_2"); //使わない
define("COLUMN_0501310", "5y_business_rental_income_3"); //使わない
define("COLUMN_0501320", "5y_business_rental_income_4"); //使わない
define("COLUMN_0501330", "5y_business_rental_income_5"); //使わない
define("COLUMN_0501340", "ratio"); //払込日
define("COLUMN_0501350", "total_investment"); //出資総額
define("COLUMN_0501360", "investment_units"); //出資予定総額または限度額
define("COLUMN_0501370", "total_priority_investment"); //優先出資金額
define("COLUMN_0501380", "preferred_investment_units"); //最低出資金額
define("COLUMN_0501390", "total_subordinate_investment"); //劣後出資金額
define("COLUMN_0501400", "subordinate_investment_units"); //上限出資金額
define("COLUMN_0501410", "documents_application_start_date"); //募集期間
define("COLUMN_0501420", "documents_application_end_date"); //払戻予定日
define("COLUMN_0501430", "documents_scheduled_start_date"); //取引開始予定日
define("COLUMN_0501440", "documents_scheduled_end_date"); //取引終了予定日
define("COLUMN_0501450", "documents_contract_start_date"); //契約期間
define("COLUMN_0501460", "documents_contract_end_date"); //財産管理報告書交付予定日
define("COLUMN_0501470", "first_calculation_date"); //初回計算期日
define("COLUMN_0501480", "cycle"); //周期
define("COLUMN_0501490", "initial_distribution_schedule"); //初回配当予定日
define("COLUMN_0501500", "documents_expected_yield"); //表示用利回り
define("COLUMN_0501510", "upfrontfee"); //取得時報酬
define("COLUMN_0501520", "management_consideration"); //管理時報酬
define("COLUMN_0501530", "consideration_sale"); //売却時報酬
define("COLUMN_0501540", "completion_date"); //竣工日
define("COLUMN_0501550", "project_type");            //プロジェクトの型
define("COLUMN_0501560", "property_name");           //物件名称
define("COLUMN_0501570", "housing_display");         //物件住居表示
define("COLUMN_0501580", "property_description");    //物件概要
define("COLUMN_0501590", "traffic_access1");         //使わない
define("COLUMN_0501600", "traffic_access2");         //使わない
define("COLUMN_0501610", "traffic_access3");         //使わない
define("COLUMN_0501620", "neighboring_facilities1"); //使わない
define("COLUMN_0501630", "neighboring_facilities2"); //使わない
define("COLUMN_0501640", "neighboring_facilities3"); //使わない
define("COLUMN_0501650", "facility_1");              //設備　バス・トイレ別
define("COLUMN_0501660", "facility_2");              //設備　エアコン
define("COLUMN_0501670", "facility_3");              //設備　システムキッチン
define("COLUMN_0501680", "facility_4");              //設備　TVモニター付きインターホン
define("COLUMN_0501690", "facility_5");              //設備　洗浄機能付き便座
define("COLUMN_0501700", "facility_6");              //設備　室内洗濯機置き場
define("COLUMN_0501710", "facility_7");              //設備　エレベーター
define("COLUMN_0501720", "facility_8");              //設備　敷地内ゴミ置き場
define("COLUMN_0501730", "facility_9");              //設備　宅配ボックス
define("COLUMN_0501740", "facility_10");             //設備　オートロック
define("COLUMN_0501750", "facility_11");             //設備　バルコニー
define("COLUMN_0501760", "facility_12");             //設備　駐輪場
define("COLUMN_0501770", "facility_13");             //設備　バイク置き場
define("COLUMN_0501780", "facility_14");             //設備　駐車場
define("COLUMN_0501790", "facility_15");             //設備　防犯カメラ



// mst_loans
define("COLUMN_0700010", "id");
define("COLUMN_0700020", "fund_id");
define("COLUMN_0700030", "loan_no");
define("COLUMN_0700040", "borrower_name");
define("COLUMN_0700050", "loan_date");
define("COLUMN_0700060", "max_loan_amount");
define("COLUMN_0700070", "loan_amount");
define("COLUMN_0700080", "min_loan_amount");
define("COLUMN_0700090", "interest_rate");
define("COLUMN_0700100", "number_of_repayments");
define("COLUMN_0700110", "repayment_start_year");
define("COLUMN_0700120", "repayment_start_month");
define("COLUMN_0700130", "trade_date");
define("COLUMN_0700140", "repayment_start_date");
define("COLUMN_0700150", "warranty_code");
define("COLUMN_0700160", "collateral_code");
define("COLUMN_0700170", "repayment_method_code");
define("COLUMN_0700180", "dividend_amount");
define("COLUMN_0700190", "tax_amount");
define("COLUMN_0700200", "reward_amount");

// mst_users
define("COLUMN_0800010", "user_id");
define("COLUMN_0800015", "lender_no");
define("COLUMN_0800020", "mail_address");
define("COLUMN_0800030", "password");
define("COLUMN_0800040", "borrower_flag");
define("COLUMN_0800050", "corporate_flag");
define("COLUMN_0800060", "kanji_last_name");
define("COLUMN_0800070", "kanji_first_name");
define("COLUMN_0800080", "furi_last_name");
define("COLUMN_0800090", "furi_first_name");
define("COLUMN_0800100", "first_name");
define("COLUMN_0800110", "middle_name");
define("COLUMN_0800120", "last_name");
define("COLUMN_0800130", "nationality_code");
define("COLUMN_0800140", "gender_code");
define("COLUMN_0800150", "birthday");
define("COLUMN_0800160", "zip");
define("COLUMN_0800170", "address1");
define("COLUMN_0800180", "address2");
define("COLUMN_0800190", "address3");
define("COLUMN_0800200", "fixed_line_phone");
define("COLUMN_0800210", "mobile_phone");
define("COLUMN_0800220", "residence_code");
define("COLUMN_0800230", "family_code");
define("COLUMN_0800240", "financial_asset_code");
define("COLUMN_0800250", "estate_code");
define("COLUMN_0800260", "borrowing_balance_code");
define("COLUMN_0800270", "interest_code");
define("COLUMN_0800280", "trigger_code");
define("COLUMN_0800290", "occupation_code");
define("COLUMN_0800300", "office");
define("COLUMN_0800310", "income_code");
define("COLUMN_0800320", "office_zip");
define("COLUMN_0800330", "office_address");
define("COLUMN_0800340", "office_phone");
define("COLUMN_0800350", "bank_type");
define("COLUMN_0800360", "bank_name");
define("COLUMN_0800365", "bank_code");
define("COLUMN_0800370", "branch_name");
define("COLUMN_0800375", "branch_code");
define("COLUMN_0800380", "account_type");
define("COLUMN_0800390", "account_sign");
define("COLUMN_0800400", "account_number");
define("COLUMN_0800405", "account_number_yucho");
define("COLUMN_0800410", "account_name");
define("COLUMN_0800420", "investment_experience1_code");
define("COLUMN_0800430", "investment_experience2_code");
define("COLUMN_0800440", "investment_experience3_code");
define("COLUMN_0800450", "investment_experience4_code");
define("COLUMN_0800460", "investment_experience5_code");
define("COLUMN_0800470", "investment_experience6_code");
define("COLUMN_0800480", "investment_experience7_code");
define("COLUMN_0800490", "investment_purpose_code");
define("COLUMN_0800500", "fund_character_code");
define("COLUMN_0800510", "asset_management_interest_code");
define("COLUMN_0800520", "asset_management_policy_code");
define("COLUMN_0800530", "operating_term_request_code");
define("COLUMN_0800535", "my_number");
define("COLUMN_0800536", "mail_magazine_recieve_flag");
define("COLUMN_0800540", "identification_image_flag");
define("COLUMN_0800550", "account_information_image_flag");
define("COLUMN_0800560", "user_status_code");
define("COLUMN_0800570", "secret_question_code");
define("COLUMN_0800580", "secret_answer");
define("COLUMN_0800590", "interim_registeration_datetime");
define("COLUMN_0800600", "expiration_date");
define("COLUMN_0800610", "delete_date");
define("COLUMN_0800620", "application_datetime");
define("COLUMN_0800630", "approval_datetime");
define("COLUMN_0800640", "approval_admin_id");
define("COLUMN_0800650", "approval_admin_name");
define("COLUMN_0800660", "authentication_key");
define("COLUMN_0800670", "authentication_datetime");
define("COLUMN_0800680", "rejection_datetime");
define("COLUMN_0800690", "rejection_admin_id");
define("COLUMN_0800700", "rejection_admin_name");
define("COLUMN_0800710", "rejection_reason");
define("COLUMN_0800720", "stop_datetime");
define("COLUMN_0800730", "stop_admin_id");
define("COLUMN_0800740", "stop_admin_name");
define("COLUMN_0800750", "stop_reason");
define("COLUMN_0800760", "withdrawal_datetime");
define("COLUMN_0800770", "withdrawal_admin_id");
define("COLUMN_0800780", "withdrawal_admin_name");
define("COLUMN_0800790", "withdrawal_reason_text");
define("COLUMN_0800800", "club_id");

// trn_agreement_histories
define("COLUMN_0900010", "id");
define("COLUMN_0900020", "user_id");
define("COLUMN_0900030", "fund_id");
define("COLUMN_0900040", "fund_name");
define("COLUMN_0900050", "doc_id");
define("COLUMN_0900060", "doc_name");
define("COLUMN_0900070", "doc_path");
define("COLUMN_0900080", "revision");
define("COLUMN_0900090", "agreed_datetime");
define("COLUMN_0900100", "agreement_detail_code");

// trn_dividend_histories
define("COLUMN_1000010", "id");
define("COLUMN_1000020", "user_id");
define("COLUMN_1000030", "user_name");
define("COLUMN_1000040", "fund_id");
define("COLUMN_1000050", "fund_name");
define("COLUMN_1000060", "loan_no");
define("COLUMN_1000065", "seq_no");
define("COLUMN_1000070", "dividend_datetime");
define("COLUMN_1000080", "dividend_detail_code");
define("COLUMN_1000090", "dividend_amount");
define("COLUMN_1000100", "tax");

// trn_information_histories
define("COLUMN_1100010", "id");
define("COLUMN_1100020", "user_id");
define("COLUMN_1100030", "info_id");
define("COLUMN_1100040", "info_date");
define("COLUMN_1100050", "subject");
define("COLUMN_1100060", "body");
define("COLUMN_1100070", "force_flag");
define("COLUMN_1100080", "agreement_flag");
define("COLUMN_1100090", "target_user_id");
define("COLUMN_1100100", "target_fund_id");
define("COLUMN_1100110", "doc_id");
define("COLUMN_1100120", "revision");
define("COLUMN_1100130", "post_datetime");
define("COLUMN_1100140", "confirmed_datetime");
define("COLUMN_1100150", "agreed_datetime");

// trn_info_attachments
define("COLUMN_1150010", "id");
define("COLUMN_1150020", "user_id");
define("COLUMN_1150030", "info_id");
define("COLUMN_1150040", "fund_id");
define("COLUMN_1150050", "doc_id");
define("COLUMN_1150060", "doc_name");
define("COLUMN_1150070", "revision");
define("COLUMN_1150080", "doc_path");

// trn_investment_histories
define("COLUMN_1200010", "id");
define("COLUMN_1200020", "user_id");//userID
define("COLUMN_1200030", "user_name");//ユーザー名
define("COLUMN_1200035", "user_name_kana");//ユーザー名カナ
define("COLUMN_1200040", "fund_id");//投資fund_id
define("COLUMN_1200050", "fund_name");//投資ファンド名
define("COLUMN_1200060", "application_datetime");//投資申込日
define("COLUMN_1200070", "investment_amount");//投資額
define("COLUMN_1200080", "expiration_datetime");//入金期日
define("COLUMN_1200090", "investment_status_code");//投資状態
define("COLUMN_1200100", "approval_datetime");//承認日時
define("COLUMN_1200110", "approval_admin_id");//承認管理者ID
define("COLUMN_1200120", "approval_admin_name");//承認管理者名
define("COLUMN_1200130", "cancel_datetime");//取り消し日時
define("COLUMN_1200140", "cancel_admin_id");//取り消し管理者ID
define("COLUMN_1200150", "cancel_admin_name");//取り消し管理者名
define("COLUMN_1200190", "deposit_date");//入金日
define("COLUMN_1200200", "delay_1");
define("COLUMN_1200210", "cooling_off_period");//クーリングオフ

// trn_loan_repayments
define("COLUMN_1300010", "id");
define("COLUMN_1300020", "fund_id");
define("COLUMN_1300030", "loan_no");
define("COLUMN_1300040", "seq_no");
define("COLUMN_1300050", "repayment_date_1");
define("COLUMN_1300060", "repayment_amount_1");
define("COLUMN_1300070", "principal_amount_1");
define("COLUMN_1300080", "interest_amount_1");
define("COLUMN_1300090", "remaining_amount_1");
define("COLUMN_1300095", "dividend_datetime_1");
define("COLUMN_1300100", "dividend_amount_1");
define("COLUMN_1300110", "reward_amount_1");
define("COLUMN_1300120", "repayment_date_2");
define("COLUMN_1300130", "repayment_amount_2");
define("COLUMN_1300140", "principal_amount_2");
define("COLUMN_1300150", "interest_amount_2");
define("COLUMN_1300160", "delay_damages");
define("COLUMN_1300165", "dividend_datetime_2");
define("COLUMN_1300170", "dividend_amount_2");
define("COLUMN_1300180", "tax_2");
define("COLUMN_1300190", "reward_amount_2");
define("COLUMN_1300200", "repayment_datetime_3");
define("COLUMN_1300210", "repayment_admin_id");
define("COLUMN_1300220", "repayment_admin_name");
define("COLUMN_1300230", "dividend_admin_id");
define("COLUMN_1300240", "dividend_admin_name");

// wrk_funds
define("COLUMN_1400000", "admin_id"); //管理者ID
define("COLUMN_1400010", "fund_id"); //ファンドID
define("COLUMN_1400020", "fund_name"); //ファンド名
define("COLUMN_1400030", "max_loan_amount_total"); //貸付予定額合計
define("COLUMN_1400040", "loan_amount_total"); //貸付額合計
define("COLUMN_1400050", "min_loan_amount_total"); //最低成立額
define("COLUMN_1400060", "min_investment_amount"); //最低投資額
define("COLUMN_1400070", "post_datetime"); //掲載開始日時
define("COLUMN_1400080", "inviting_start"); //募集開始日時
define("COLUMN_1400090", "inviting_end"); //募集終了日時
define("COLUMN_1400100", "operating_start"); //運用開始日
define("COLUMN_1400110", "operating_end"); //運用終了日
define("COLUMN_1400120", "operating_term"); //運用期間(ヶ月)
define("COLUMN_1400130", "admin_yield"); //営業者利回り
define("COLUMN_1400140", "target_yield"); //目標利回り
define("COLUMN_1400150", "guide"); //概要
define("COLUMN_1400160", "dividend_datetime"); //配当実行日
define("COLUMN_1400170", "delay_1"); //遅延フラグ
define("COLUMN_1400171", "ended"); //強制終了フラグ
define("COLUMN_1400172", "delay_1_date"); //遅延フラグ確定日
define("COLUMN_1400173", "ended_date"); //強制終了フラグ確定日

//estate_add
define("COLUMN_1400180", "land_location"); //土地説明
define("COLUMN_1400190", "land_lot_number"); //HP用土地説明
define("COLUMN_1400200", "land_texture"); //委託特例事業者の商号等
define("COLUMN_1400210", "land_area"); //業務管理者リンク
define("COLUMN_1400220", "land_rights_form"); //スキーム図
define("COLUMN_1400230", "building_location"); //建物説明
define("COLUMN_1400240", "building_house_number"); //HP用建物説明
define("COLUMN_1400250", "building_type"); //株主の名称および氏名
define("COLUMN_1400260", "building_structure"); //役員名
define("COLUMN_1400270", "building_floor_area"); //私道負担
define("COLUMN_1400280", "building_area"); //その他特定時の必要事項
define("COLUMN_1400290", "building_rights_status"); //不動産の変更予定
define("COLUMN_1400300", "other_transaction_modes"); //取引態様
define("COLUMN_1400310", "other_borrowings"); //その他借入
define("COLUMN_1400320", "real_estate_rights"); //不動産権利
define("COLUMN_1400330", "registered_holder"); //各種制限に関する事項
define("COLUMN_1400340", "city_planning_act_area_division"); //業務管理者名
define("COLUMN_1400350", "city_planning_law_restrictions"); //使わない
define("COLUMN_1400360", "building_standards_raw_restricted_area"); //使わない
define("COLUMN_1400370", "building_standards_raw_restricted1"); //使わない
define("COLUMN_1400380", "building_standards_raw_restricted2"); //代表者氏名
define("COLUMN_1400390", "building_standards_raw_restricted3"); //許可番号
define("COLUMN_1400400", "building_standards_raw_restricted4"); //資本金
define("COLUMN_1400410", "building_standards_raw_restricted5"); //事前告知期日
define("COLUMN_1400420", "coverage_rate"); //連帯債務負担内容
define("COLUMN_1400430", "floorarea_ratio"); //他事業内容
define("COLUMN_1400440", "restrictions_based_laws1"); //決算報告PDF
define("COLUMN_1400450", "restrictions_based_laws2"); //最大延長期間
define("COLUMN_1400460", "guidance_burden"); //私道負担
define("COLUMN_1400470", "fanility_status_drinking_water"); //施設設備
define("COLUMN_1400480", "fanility_status_electrical"); //役員の従事する他事業
define("COLUMN_1400490", "fanility_status_gas"); //使わない
define("COLUMN_1400500", "fanility_status_sewage"); //使わない
define("COLUMN_1400510", "fanility_status_rain_water"); //委託の有無・委託先
define("COLUMN_1400520", "timeofcompletion"); //形状未完成物件時
define("COLUMN_1400530", "division_right"); //事務手数料
define("COLUMN_1400540", "division_shared_part"); //利害関係人との取引
define("COLUMN_1400550", "division_usage_limit"); //信用補完の有無
define("COLUMN_1400560", "division_other_restrictions"); //区分所有物件詳細
define("COLUMN_1400570", "division_specific_use_permission"); //使わない
define("COLUMN_1400580", "division_specific_exemption"); //監査予定
define("COLUMN_1400590", "division_monthly_repair_amount"); //物件取得金額
define("COLUMN_1400600", "division_total_reserves"); //売却時分配率
define("COLUMN_1400610", "division_total_reserves_confirmed"); //物件取得日
define("COLUMN_1400620", "division_delinquent_payment"); //期中時分配率
define("COLUMN_1400630", "division_delinquent_payment_confirmed"); //使わない
define("COLUMN_1400640", "division_monthly_management_fee"); //使わない
define("COLUMN_1400650", "division_monthly_management_fee_confirmed"); //使わない
define("COLUMN_1400660", "division_management_fee_delinquency"); //使わない
define("COLUMN_1400670", "division_management_fee_delinquency_confirmed"); //使わない
define("COLUMN_1400680", "division_management_company"); //使わない
define("COLUMN_1400690", "division_management_company_add"); //使わない
define("COLUMN_1400700", "division_management_company_regist_number"); //使わない
define("COLUMN_1400710", "division_maintenance_and_repairs1"); //使わない
define("COLUMN_1400720", "division_maintenance_and_repairs2"); //使わない
define("COLUMN_1400730", "division_maintenance_and_repairs3"); //使わない
define("COLUMN_1400740", "division_maintenance_and_repairs4"); //全賃料収入
define("COLUMN_1400750", "division_maintenance_and_repairs5"); //全賃貸面積
define("COLUMN_1400760", "division_maintenance_and_repairs6"); //全賃貸可能面積
define("COLUMN_1400770", "warranty"); //瑕疵担保
define("COLUMN_1400780", "development_land_disaster1"); //造成宅地防災区域
define("COLUMN_1400790", "development_land_disaster2"); //使わない
define("COLUMN_1400800", "development_land_disaster3"); //使わない
define("COLUMN_1400810", "sand_disaster_warning_area"); //土砂災害警戒区域
define("COLUMN_1400820", "sand_disaster_warning_special_area"); //使わない
define("COLUMN_1400830", "tsunami_disaster_warning_area"); //津波災害警戒区域
define("COLUMN_1400840", "asbestos_investigation"); //石綿使用調査
define("COLUMN_1400850", "asbestos_investigator"); //約款＿鑑定評価記載内容
define("COLUMN_1400860", "seismic_diagnosis"); //耐震診断
define("COLUMN_1400870", "housing_performance_evaluation"); //住宅性能評価
define("COLUMN_1400880", "thirdparty_survey"); //第三者調査
define("COLUMN_1400890", "building_status_survey"); //建物状況調査
define("COLUMN_1400900", "results_building_status_survey"); //使わない
define("COLUMN_1400910", "document_storage_status1"); //書類保存状況
define("COLUMN_1400920", "document_storage_status2"); //使わない
define("COLUMN_1400930", "document_storage_status3"); //使わない
define("COLUMN_1400940", "document_storage_status4"); //使わない
define("COLUMN_1400950", "target_property_price"); //対象不動産価格
define("COLUMN_1400960", "calculation_method1"); //価格算定方式
define("COLUMN_1400970", "calculation_method2"); //使わない
define("COLUMN_1400980", "calculation_method3"); //不動産鑑定評価内容
define("COLUMN_1400990", "real_estate_appraiser"); //不動産鑑定士の鑑定評価の有無
define("COLUMN_1401000", "room"); //すべてに関してテナントの総数
define("COLUMN_1401010", "total_rent_income"); //使わない
define("COLUMN_1401020", "total_leased_area"); //使わない
define("COLUMN_1401030", "total_leased_area1"); //対象毎に関する次の事項
define("COLUMN_1401040", "total_leased_area2"); //使わない
define("COLUMN_1401050", "tatal_leased_area3"); //使わない
define("COLUMN_1401060", "total_leased_area4"); //使わない
define("COLUMN_1401070", "total_leased_area5"); //使わない
define("COLUMN_1401080", "total_leased_area6"); //使わない
define("COLUMN_1401090", "total_leasable_area"); //使わない
define("COLUMN_1401100", "5y_occupancy_rate1"); //使わない
define("COLUMN_1401110", "5y_occupancy_rate2"); //使わない
define("COLUMN_1401120", "5y_occupancy_tate3"); //使わない
define("COLUMN_1401130", "5y_occupancy_rate4"); //使わない
define("COLUMN_1401140", "5y_occupancy_rate5"); //使わない
define("COLUMN_1401150", "tenant_name"); //主要テナント名称
define("COLUMN_1401160", "tenant_industry"); //主要テナント業種
define("COLUMN_1401170", "tenant_annual_rent"); //主要テナント年間賃料
define("COLUMN_1401180", "tenant_leased_area"); //主要テナント賃貸面積
define("COLUMN_1401190", "tenant_contract_expiration_date"); //主要テナント満了日
define("COLUMN_1401200", "tenant_renewal_method"); //主要テナント更改方法
define("COLUMN_1401210", "tenant_security_deposit"); //主要テナント保証金等
define("COLUMN_1401220", "tenant_important_subjects"); //主要テナント他事項
define("COLUMN_1401230", "rent_payment_status"); //賃料延滞状況
define("COLUMN_1401240", "5y_rent_income_1"); //直近５年間の収入および賃貸に係る費用
define("COLUMN_1401250", "5y_rent_income_2"); //対象毎の費用
define("COLUMN_1401260", "5y_rent_income_3"); //全賃料に対する割合
define("COLUMN_1401270", "5y_rent_income_4"); //使わない
define("COLUMN_1401280", "5y_rent_income_5"); //使わない
define("COLUMN_1401290", "5y_business_rental_income_1"); //直近５年間の稼働率
define("COLUMN_1401300", "5y_business_rental_income_2"); //使わない
define("COLUMN_1401310", "5y_business_rental_income_3"); //使わない
define("COLUMN_1401320", "5y_business_rental_income_4"); //使わない
define("COLUMN_1401330", "5y_business_rental_income_5"); //使わない
define("COLUMN_1401340", "ratio"); //払込日
define("COLUMN_1401350", "total_investment"); //出資総額
define("COLUMN_1401360", "investment_units"); //出資予定総額または限度額
define("COLUMN_1401370", "total_priority_investment"); //優先出資金額
define("COLUMN_1401380", "preferred_investment_units"); //最低出資金額
define("COLUMN_1401390", "total_subordinate_investment"); //劣後出資金額
define("COLUMN_1401400", "subordinate_investment_units"); //上限出資金額
define("COLUMN_1401410", "documents_application_start_date"); //募集期間
define("COLUMN_1401420", "documents_application_end_date"); //払戻予定日
define("COLUMN_1401430", "documents_scheduled_start_date"); //取引開始予定日
define("COLUMN_1401440", "documents_scheduled_end_date"); //取引終了予定日
define("COLUMN_1401450", "documents_contract_start_date"); //契約期間
define("COLUMN_1401460", "documents_contract_end_date"); //財産管理報告書交付予定日
define("COLUMN_1401470", "first_calculation_date"); //初回計算期日
define("COLUMN_1401480", "cycle"); //周期
define("COLUMN_1401490", "initial_distribution_schedule"); //初回配当予定日
define("COLUMN_1401500", "documents_expected_yield"); //表示用利回り
define("COLUMN_1401510", "upfrontfee"); //取得時報酬
define("COLUMN_1401520", "management_consideration"); //管理時報酬
define("COLUMN_1401530", "consideration_sale"); //売却時報酬
define("COLUMN_1401540", "completion_date"); //竣工日
define("COLUMN_1401550", "project_type");            //プロジェクトの型
define("COLUMN_1401560", "property_name");           //物件名称
define("COLUMN_1401570", "housing_display");         //物件住居表示
define("COLUMN_1401580", "property_description");    //物件概要
define("COLUMN_1401590", "traffic_access1");         //使わない
define("COLUMN_1401600", "traffic_access2");         //使わない
define("COLUMN_1401610", "traffic_access3");         //使わない
define("COLUMN_1401620", "neighboring_facilities1"); //使わない
define("COLUMN_1401630", "neighboring_facilities2"); //使わない
define("COLUMN_1401640", "neighboring_facilities3"); //使わない
define("COLUMN_1401650", "facility_1");              //設備　バス・トイレ別
define("COLUMN_1401660", "facility_2");              //設備　エアコン
define("COLUMN_1401670", "facility_3");              //設備　システムキッチン
define("COLUMN_1401680", "facility_4");              //設備　TVモニター付きインターホン
define("COLUMN_1401690", "facility_5");              //設備　洗浄機能付き便座
define("COLUMN_1401700", "facility_6");              //設備　室内洗濯機置き場
define("COLUMN_1401710", "facility_7");              //設備　エレベーター
define("COLUMN_1401720", "facility_8");              //設備　敷地内ゴミ置き場
define("COLUMN_1401730", "facility_9");              //設備　宅配ボックス
define("COLUMN_1401740", "facility_10");             //設備　オートロック
define("COLUMN_1401750", "facility_11");             //設備　バルコニー
define("COLUMN_1401760", "facility_12");             //設備　駐輪場
define("COLUMN_1401770", "facility_13");             //設備　バイク置き場
define("COLUMN_1401780", "facility_14");             //設備　駐車場
define("COLUMN_1401790", "facility_15");             //設備　防犯カメラ



// wrk_fund_repayments
define("COLUMN_1500000", "admin_id");
define("COLUMN_1500010", "id");
define("COLUMN_1500020", "fund_id");
define("COLUMN_1500030", "seq_no");
define("COLUMN_1500040", "repayment_date_1");
define("COLUMN_1500050", "repayment_amount_1");
define("COLUMN_1500060", "principal_amount_1");
define("COLUMN_1500070", "interest_amount_1");
define("COLUMN_1500080", "remaining_amount_1");
define("COLUMN_1500090", "dividend_amount_1");
define("COLUMN_1500100", "reward_amount_1");
define("COLUMN_1500110", "repayment_date_2");
define("COLUMN_1500120", "repayment_amount_2");
define("COLUMN_1500130", "principal_amount_2");
define("COLUMN_1500140", "interest_amount_2");
define("COLUMN_1500150", "delay_damages");
define("COLUMN_1500160", "dividend_amount_2");
define("COLUMN_1500170", "tax_2");
define("COLUMN_1500180", "reward_amount_2");

// wrk_loans
define("COLUMN_1600000", "admin_id");
define("COLUMN_1600010", "id");
define("COLUMN_1600020", "fund_id");
define("COLUMN_1600030", "loan_no");
define("COLUMN_1600040", "borrower_name");
define("COLUMN_1600050", "loan_date");
define("COLUMN_1600060", "max_loan_amount");
define("COLUMN_1600070", "loan_amount");
define("COLUMN_1600080", "min_loan_amount");
define("COLUMN_1600090", "interest_rate");
define("COLUMN_1600100", "number_of_repayments");
define("COLUMN_1600110", "repayment_start_year");
define("COLUMN_1600120", "repayment_start_month");
define("COLUMN_1600130", "trade_date");
define("COLUMN_1600140", "repayment_start_date");
define("COLUMN_1600150", "warranty_code");
define("COLUMN_1600160", "collateral_code");
define("COLUMN_1600170", "repayment_method_code");
define("COLUMN_1600180", "dividend_amount");
define("COLUMN_1600190", "tax_amount");
define("COLUMN_1600200", "reward_amount");

// wrk_loan_repayments
define("COLUMN_1700000", "admin_id");
define("COLUMN_1700010", "id");
define("COLUMN_1700020", "fund_id");
define("COLUMN_1700030", "loan_no");
define("COLUMN_1700040", "seq_no");
define("COLUMN_1700050", "repayment_date_1");
define("COLUMN_1700060", "repayment_amount_1");
define("COLUMN_1700070", "principal_amount_1");
define("COLUMN_1700080", "interest_amount_1");
define("COLUMN_1700090", "remaining_amount_1");
define("COLUMN_1700095", "dividend_datetime_1");
define("COLUMN_1700100", "dividend_amount_1");
define("COLUMN_1700110", "reward_amount_1");
define("COLUMN_1700120", "repayment_date_2");
define("COLUMN_1700130", "repayment_amount_2");
define("COLUMN_1700140", "principal_amount_2");
define("COLUMN_1700150", "interest_amount_2");
define("COLUMN_1700160", "delay_damages");
define("COLUMN_1700170", "dividend_amount_2");
define("COLUMN_1700180", "tax_2");
define("COLUMN_1700190", "reward_amount_2");
define("COLUMN_1700200", "repayment_datetime_3");
define("COLUMN_1700210", "repayment_admin_id");
define("COLUMN_1700220", "repayment_admin_name");
define("COLUMN_1700230", "dividend_admin_id");
define("COLUMN_1700240", "dividend_admin_name");

// wrk_users
define("COLUMN_1800000", "admin_id");
define("COLUMN_1800010", "user_id");
define("COLUMN_1800015", "lender_no");
define("COLUMN_1800020", "mail_address");
define("COLUMN_1800030", "password");
define("COLUMN_1800040", "borrower_flag");
define("COLUMN_1800050", "corporate_flag");
define("COLUMN_1800060", "kanji_last_name");
define("COLUMN_1800070", "kanji_first_name");
define("COLUMN_1800080", "furi_last_name");
define("COLUMN_1800090", "furi_first_name");
define("COLUMN_1800100", "first_name");
define("COLUMN_1800110", "middle_name");
define("COLUMN_1800120", "last_name");
define("COLUMN_1800130", "nationality_code");
define("COLUMN_1800140", "gender_code");
define("COLUMN_1800150", "birthday");
define("COLUMN_1800160", "zip");
define("COLUMN_1800170", "address1");
define("COLUMN_1800180", "address2");
define("COLUMN_1800190", "address3");
define("COLUMN_1800200", "fixed_line_phone");
define("COLUMN_1800210", "mobile_phone");
define("COLUMN_1800220", "residence_code");
define("COLUMN_1800230", "family_code");
define("COLUMN_1800240", "financial_asset_code");
define("COLUMN_1800250", "estate_code");
define("COLUMN_1800260", "borrowing_balance_code");
define("COLUMN_1800270", "interest_code");
define("COLUMN_1800280", "trigger_code");
define("COLUMN_1800290", "occupation_code");
define("COLUMN_1800300", "office");
define("COLUMN_1800310", "income_code");
define("COLUMN_1800320", "office_zip");
define("COLUMN_1800330", "office_address");
define("COLUMN_1800340", "office_phone");
define("COLUMN_1800350", "bank_type");
define("COLUMN_1800360", "bank_name");
define("COLUMN_1800365", "bank_code");
define("COLUMN_1800370", "branch_name");
define("COLUMN_1800375", "branch_code");
define("COLUMN_1800380", "account_type");
define("COLUMN_1800390", "account_sign");
define("COLUMN_1800400", "account_number");
define("COLUMN_1800405", "account_number_yucho");
define("COLUMN_1800410", "account_name");
define("COLUMN_1800420", "investment_experience1_code");
define("COLUMN_1800430", "investment_experience2_code");
define("COLUMN_1800440", "investment_experience3_code");
define("COLUMN_1800450", "investment_experience4_code");
define("COLUMN_1800460", "investment_experience5_code");
define("COLUMN_1800470", "investment_experience6_code");
define("COLUMN_1800480", "investment_experience7_code");
define("COLUMN_1800490", "investment_purpose_code");
define("COLUMN_1800500", "fund_character_code");
define("COLUMN_1800510", "asset_management_interest_code");
define("COLUMN_1800520", "asset_management_policy_code");
define("COLUMN_1800530", "operating_term_request_code");
define("COLUMN_1800535", "my_number");
define("COLUMN_1800536", "mail_magazine_recieve_flag");
define("COLUMN_1800540", "identification_image_flag");
define("COLUMN_1800550", "account_information_image_flag");
define("COLUMN_1800560", "user_status_code");
define("COLUMN_1800570", "secret_question_code");
define("COLUMN_1800580", "secret_answer");
define("COLUMN_1800590", "interim_registeration_datetime");
define("COLUMN_1800600", "expiration_date");
define("COLUMN_1800610", "delete_date");
define("COLUMN_1800620", "application_datetime");
define("COLUMN_1800630", "approval_datetime");
define("COLUMN_1800640", "approval_admin_id");
define("COLUMN_1800650", "approval_admin_name");
define("COLUMN_1800660", "authentication_key");
define("COLUMN_1800670", "authentication_datetime");
define("COLUMN_1800680", "rejection_datetime");
define("COLUMN_1800690", "rejection_admin_id");
define("COLUMN_1800700", "rejection_admin_name");
define("COLUMN_1800710", "rejection_reason");
define("COLUMN_1800720", "stop_datetime");
define("COLUMN_1800730", "stop_admin_id");
define("COLUMN_1800740", "stop_admin_name");
define("COLUMN_1800750", "stop_reason");
define("COLUMN_1800760", "withdrawal_datetime");
define("COLUMN_1800770", "withdrawal_admin_id");
define("COLUMN_1800780", "withdrawal_admin_name");
define("COLUMN_1800790", "withdrawal_reason_text");
define("COLUMN_1800800", "club_id");

// trn_negotiation_histories
define("COLUMN_1900000" , "id");
define("COLUMN_1900010" , "user_id");
define("COLUMN_1900020" , "user_name");
define("COLUMN_1900030" , "negotiation_datetime");
define("COLUMN_1900040" , "person_code");
define("COLUMN_1900050" , "place_code");
define("COLUMN_1900060" , "method_1_code");
define("COLUMN_1900070" , "method_2_code");
define("COLUMN_1900080" , "importance_code");
define("COLUMN_1900090" , "content");

// trn_operating_report_loans
define("COLUMN_2100000" , "id");
define("COLUMN_2100010" , "fund_id");
define("COLUMN_2100020" , "loan_no");
define("COLUMN_2100030" , "report_year");
define("COLUMN_2100040" , "report_month");
define("COLUMN_2100050" , "keiyakubi");
define("COLUMN_2100060" , "hensaibi");
define("COLUMN_2100070" , "hensaigaku");
define("COLUMN_2100080" , "gankin");
define("COLUMN_2100090" , "risoku");

// wrk_dividends
define("COLUMN_2200000" , "admin_id");
define("COLUMN_2200010" , "id");
define("COLUMN_2200020" , "fund_id");
define("COLUMN_2200030" , "loan_no");
define("COLUMN_2200040" , "user_id");
define("COLUMN_2200050" , "principal_amount");
define("COLUMN_2200060" , "dividend_amount");

// trn_reward_histories
define("COLUMN_2300010" , "id");
define("COLUMN_2300020" , "fund_id");
define("COLUMN_2300030" , "loan_no");
define("COLUMN_2300040" , "repayment_month");
define("COLUMN_2300050" , "dividend_datetime");
define("COLUMN_2300060" , "repayment_amount");
define("COLUMN_2300070" , "principal_amount");
define("COLUMN_2300080" , "reward_amount");
define("COLUMN_2300090" , "dividend_amount");

// trn_trade_balance_reports
define("COLUMN_2400010" , "id");
define("COLUMN_2400020" , "trade_start_year");
define("COLUMN_2400030" , "trade_start_month");
define("COLUMN_2400040" , "trade_end_year");
define("COLUMN_2400050" , "trade_end_month");
define("COLUMN_2400060" , "information");
define("COLUMN_2400070" , "insert_datetime");
define("COLUMN_2400080" , "insert_admin_id");
define("COLUMN_2400090" , "insert_admin_name");

// trn_annual_trade_reports
define("COLUMN_2500010" , "id");
define("COLUMN_2500020" , "trade_year");
define("COLUMN_2500030" , "revision");

// trn_admin_mail_histories
define("COLUMN_2600010" , "id");
define("COLUMN_2600020" , "mail_account_code");
define("COLUMN_2600030" , "specified_method_code");
define("COLUMN_2600040" , "conditions");
define("COLUMN_2600050" , "subject");
define("COLUMN_2600060" , "body");

// trn_second_operating_reports
define("COLUMN_2700010" , "id");
define("COLUMN_2700020" , "fund_id");
define("COLUMN_2700030" , "fund_name");
define("COLUMN_2700040" , "report_year");
define("COLUMN_2700050" , "report_month");
define("COLUMN_2700060" , "report_date");
define("COLUMN_2700070" , "remittance_date");
define("COLUMN_2700080" , "issue_date");
define("COLUMN_2700090" , "report_status");
define("COLUMN_2700100" , "account_01");
define("COLUMN_2700110" , "account_02");
define("COLUMN_2700120" , "account_03");
define("COLUMN_2700130" , "account_04");
define("COLUMN_2700140" , "account_05");
define("COLUMN_2700150" , "account_06");
define("COLUMN_2700160" , "account_07");
define("COLUMN_2700170" , "account_08");
define("COLUMN_2700180" , "account_09");
define("COLUMN_2700190" , "account_10");
define("COLUMN_2700200" , "account_11");
define("COLUMN_2700210" , "account_12");
define("COLUMN_2700220" , "account_13");
define("COLUMN_2700230" , "account_14");
define("COLUMN_2700240" , "account_15");
define("COLUMN_2700250" , "account_16");
define("COLUMN_2700260" , "account_17");
define("COLUMN_2700270" , "account_18");
define("COLUMN_2700280" , "account_19");
define("COLUMN_2700290" , "account_20");
define("COLUMN_2700300" , "account_21");
define("COLUMN_2700310" , "account_22");
define("COLUMN_2700320" , "account_23");
define("COLUMN_2700330" , "account_24");
define("COLUMN_2700340" , "account_25");
define("COLUMN_2700350" , "account_26");
define("COLUMN_2700360" , "account_27");
define("COLUMN_2700370" , "account_28");
define("COLUMN_2700380" , "account_29");
define("COLUMN_2700390" , "account_30");
define("COLUMN_2700400" , "account_31");
define("COLUMN_2700410" , "account_32");
define("COLUMN_2700420" , "account_33");
define("COLUMN_2700430" , "account_34");
define("COLUMN_2700440" , "account_35");
define("COLUMN_2700450" , "account_36");
define("COLUMN_2700460" , "total_amount_01");
define("COLUMN_2700470" , "total_amount_02");
define("COLUMN_2700480" , "total_amount_03");
define("COLUMN_2700490" , "amount_01");
define("COLUMN_2700500" , "amount_02");
define("COLUMN_2700510" , "amount_03");
define("COLUMN_2700520" , "amount_04");
define("COLUMN_2700530" , "amount_05");
define("COLUMN_2700540" , "amount_06");
define("COLUMN_2700550" , "amount_07");
define("COLUMN_2700560" , "amount_08");
define("COLUMN_2700570" , "amount_09");
define("COLUMN_2700580" , "amount_10");
define("COLUMN_2700590" , "amount_11");
define("COLUMN_2700600" , "amount_12");
define("COLUMN_2700610" , "amount_13");
define("COLUMN_2700620" , "amount_14");
define("COLUMN_2700630" , "amount_15");
define("COLUMN_2700640" , "amount_16");
define("COLUMN_2700650" , "amount_17");
define("COLUMN_2700660" , "amount_18");
define("COLUMN_2700670" , "amount_19");
define("COLUMN_2700680" , "amount_20");
define("COLUMN_2700690" , "amount_21");
define("COLUMN_2700700" , "amount_22");
define("COLUMN_2700710" , "amount_23");
define("COLUMN_2700720" , "amount_24");
define("COLUMN_2700730" , "amount_25");
define("COLUMN_2700740" , "amount_26");
define("COLUMN_2700750" , "amount_27");
define("COLUMN_2700760" , "amount_28");
define("COLUMN_2700770" , "amount_29");
define("COLUMN_2700780" , "amount_30");
define("COLUMN_2700790" , "amount_31");
define("COLUMN_2700800" , "amount_32");
define("COLUMN_2700810" , "amount_33");
define("COLUMN_2700820" , "amount_34");
define("COLUMN_2700830" , "amount_35");
define("COLUMN_2700840" , "amount_36");

// trn_admin_info_histries
define("COLUMN_2800010" , "id");
define("COLUMN_2800020" , "info_id");
define("COLUMN_2800030" , "specified_method_code");
define("COLUMN_2800040" , "conditions");
define("COLUMN_2800050" , "subject");
define("COLUMN_2800060" , "body");
define("COLUMN_2800070" , "force_flag");
define("COLUMN_2800080" , "agreement_flag");
define("COLUMN_2800090" , "post_datetime");
define("COLUMN_2800100" , "attachment");
define("COLUMN_2800110" , "file_create");

define("COLUMN_ALIAS_COUNT", "count");

// mst_deposit_account (2017/10/10 Added)
define("COLUMN_2900010" , "id");
define("COLUMN_2900020" , "bank_type");
define("COLUMN_2900030" , "bank_code");
define("COLUMN_2900040" , "bank_name");
define("COLUMN_2900050" , "bank_name_kana");
define("COLUMN_2900060" , "branch_code");
define("COLUMN_2900070" , "branch_name");
define("COLUMN_2900080" , "branch_name_kana");
define("COLUMN_2900090" , "account_type");
define("COLUMN_2900100" , "account_number");
define("COLUMN_2900110" , "account_name");
define("COLUMN_2900120" , "account_name_kana");
define("COLUMN_2900130" , "lot_number");
define("COLUMN_2900140" , "account_opening_date");
define("COLUMN_2900150" , "user_id");
define("COLUMN_2900160" , "user_name");
define("COLUMN_2900170" , "user_name_kana");
define("COLUMN_2900180" , "assignment_date");
define("COLUMN_2900190" , "admin_id");

// trn_dividend_plans (2017/10/11 Added)
define("COLUMN_3000010" , "id");
define("COLUMN_3000020" , "user_id");
define("COLUMN_3000030" , "fund_id");
define("COLUMN_3000040" , "fund_name");
define("COLUMN_3000050" , "seq_no");
define("COLUMN_3000060" , "dividend_date");
define("COLUMN_3000070" , "principal_amount");
define("COLUMN_3000080" , "dividend_amount");
define("COLUMN_3000090" , "tax");

// trn_deposit_histories (2018/01/14 Added)
define("COLUMN_3100010" , "id");
define("COLUMN_3100020" , "date_time");
define("COLUMN_3100030" , "admin_id");
define("COLUMN_3100040" , "deposit_date");
define("COLUMN_3100050" , "deposit_amount");
define("COLUMN_3100060" , "deposit_branch_code");
define("COLUMN_3100070" , "deposit_account_number");
define("COLUMN_3100080" , "requester_account_name");
define("COLUMN_3100090" , "sending_bank_name");
define("COLUMN_3100100" , "sending_bank_branch_name");
define("COLUMN_3100110" , "user_id");
define("COLUMN_3100120" , "user_name");
define("COLUMN_3100130" , "reconcile_status_code");
define("COLUMN_3100140" , "reconcile_date_time");
define("COLUMN_3100150" , "reconcile_admin_id");
define("COLUMN_3100160" , "investment_id");

// 入金照合用TEMPテーブル (2018/03/01 Added)
define("COLUMN_3110010" , "deposit_id");
define("COLUMN_3110020" , "deposit_date");
define("COLUMN_3110030" , "deposit_amount");
define("COLUMN_3110040" , "deposit_account_number");
define("COLUMN_3110050" , "requester_account_name");
define("COLUMN_3110060" , "deposit_user_id");
define("COLUMN_3110070" , "investment_id");
define("COLUMN_3110080" , "investment_user_id");
define("COLUMN_3110090" , "user_name");
define("COLUMN_3110100" , "user_name_kana");
define("COLUMN_3110110" , "fund_id");
define("COLUMN_3110120" , "fund_name");
define("COLUMN_3110130" , "application_datetime");
define("COLUMN_3110140" , "investment_amount");
define("COLUMN_3110150" , "expiration_date");

// mst_checklists (2018/04/05 Added)
define("COLUMN_3200010" , "id");
define("COLUMN_3200020" , "category_id");
define("COLUMN_3200030" , "checklist_name");
define("COLUMN_3200040" , "approver_1");
define("COLUMN_3200050" , "approver_2");
define("COLUMN_3200060" , "approver_3");
define("COLUMN_3200070" , "approver_4");
define("COLUMN_3200080" , "insert_datetime");
define("COLUMN_3200090" , "insert_admin_id");

// mst_check_items (2018/04/05 Added)
define("COLUMN_3300010" , "id");
define("COLUMN_3300020" , "mst_checklist_id");
define("COLUMN_3300030" , "item_number");
define("COLUMN_3300040" , "check_item");
define("COLUMN_3300050" , "remarks");
define("COLUMN_3300060" , "item_type");
define("COLUMN_3300070" , "option_1");
define("COLUMN_3300080" , "option_2");
define("COLUMN_3300090" , "option_3");
define("COLUMN_3300100" , "option_4");
define("COLUMN_3300110" , "option_5");
define("COLUMN_3300120" , "option_6");
define("COLUMN_3300130" , "option_7");
define("COLUMN_3300140" , "option_8");
define("COLUMN_3300150" , "option_9");
define("COLUMN_3300160" , "option_10");
define("COLUMN_3300170" , "option_11");
define("COLUMN_3300180" , "option_12");
define("COLUMN_3300190" , "option_13");
define("COLUMN_3300200" , "option_14");
define("COLUMN_3300210" , "option_15");
define("COLUMN_3300220" , "insert_datetime");
define("COLUMN_3300230" , "insert_admin_id");

// モデルクラスfindパラメータ名
define("MODEL_ALL"        , "all");
define("MODEL_THREADED"   , "threaded");
define("MODEL_COUNT"      , "count");
define("MODEL_CONDITIONS" , "conditions");
define("MODEL_FIELDS"     , "fields");
define("MODEL_ORDER"      , "order");
define("MODEL_ASC"        , "asc");
define("MODEL_DESC"       , "desc");
define("MODEL_GROUP"      , "group");
define("MODEL_OR"         , "or");
define("MODEL_NOT"        , "not");

// レイアウト名
define("LAYOUT_NAME_001", "LenderLayouts");
define("LAYOUT_NAME_002", "AdminLayouts");
define("LAYOUT_NAME_003", "ContactLayouts");
define("LAYOUT_NAME_004", "MarLayouts");	//2020/02/05追加
define("LAYOUT_NAME_005", "TestLayouts");
// メールパラメータ名
define("MAIL_TO"      , "to");
define("MAIL_BCC"      , "bcc");
define("MAIL_SUBJECT" , "subject");
define("MAIL_BODY"    , "body");
define("MAIL_LOG"     , "log");
define("MAIL_LOG_NAME", "maillog");

// 送信メール
define("MAIL_AUTO"         , "auto");
define("MAIL_CONFIRM"      , "confirm");
define("MAIL_SUPPORT"      , "support");
define("MAIL_SUBSCRIBE"    , "subscribe");


/**
 * ◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆
 * プルダウンリスト等に表示する要素
 * ◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆
 */

define("PULLDOWNLIST_BLANK", "=選択して下さい=");

// 秘密の質問
define("CONFIG_0001", "secret_question_list");
$config[CONFIG_0001] = array(
	PULLDOWNLIST_BLANK
	,"あなたのペットの名前は？"
	,"子供の頃のニックネームは？"
	,"初めて見た映画のタイトルは？"
);

// 住居の状況
define("CONFIG_0002","residence_list");
$config[CONFIG_0002] = array(
	PULLDOWNLIST_BLANK
	,"自己所有"
	,"家族所有"
	,"社宅・官舎"
	,"借家"
	,"寮"
	,"公営・公団住宅"
	,"賃貸マンション"
	,"アパート"
	//,"持ち家"
	//,"賃貸"
);

// 家族構成
define("CONFIG_0003","family_list");
$config[CONFIG_0003] = array(
	PULLDOWNLIST_BLANK
	,"配偶者あり・子供あり"
	,"配偶者あり・子供なし"
	,"独身・家族同居"
	,"独身・家族別居"
	,"独身・子供あり"
);

// 金融資産
//define("FINANCIAL_ASESST_CODE_1", 1);
define("FINANCIAL_ASESST_CODE_2", 2);
define("FINANCIAL_ASESST_CODE_3", 3);
define("FINANCIAL_ASESST_CODE_4", 4);
define("FINANCIAL_ASESST_CODE_5", 5);
define("FINANCIAL_ASESST_CODE_6", 6);
define("FINANCIAL_ASESST_CODE_7", 7);
define("FINANCIAL_ASESST_CODE_8", 8);
define("CONFIG_0004","financial_asset_list");
$config[CONFIG_0004] = array(
	PULLDOWNLIST_BLANK
	//,FINANCIAL_ASESST_CODE_1 => "なし"
	,FINANCIAL_ASESST_CODE_2 => "100万円未満"
	,FINANCIAL_ASESST_CODE_3 => "100万円超～300万円未満"
	,FINANCIAL_ASESST_CODE_4 => "300万円超～500万円未満"
	,FINANCIAL_ASESST_CODE_5 => "500万円超～1,000万円未満"
	,FINANCIAL_ASESST_CODE_6 => "1,000万円超～3,000万円未満"
	,FINANCIAL_ASESST_CODE_7 => "3,000万円超～5,000万円未満"
	,FINANCIAL_ASESST_CODE_8 => "5,000万円超"
);

// 所有不動産
define("CONFIG_0005","estate_list");
$config[CONFIG_0005] = array(
	PULLDOWNLIST_BLANK
	,"なし"
	,"あり"
);

// 借入残高
define("CONFIG_0006","borrowing_balance_list");
$config[CONFIG_0006] = array(
	PULLDOWNLIST_BLANK
	,"300万円未満"
	,"500万円未満"
	,"1,000万円未満"
	,"2,000万円未満"
	,"3,000万円未満"
	,"5,000万円未満"
	,"1億円未満"
	,"1億円以上"
);

// 興味のある商品
define("CONFIG_0007","interest_list");
$config[CONFIG_0007] = array(
	PULLDOWNLIST_BLANK
	,"寄付・慈善購入"
	,"融資"
	,"株式投資"
);

// 取引開始のきっかけ
define("CONFIG_0008","trigger_list");
$config[CONFIG_0008] = array(
	PULLDOWNLIST_BLANK
	,"ご紹介"
	,"ホームページ"
	,"ブログ"
	,"Facebook"
	,"Twitter"
	,"メールマガジン"
	,"雑誌等"
);

// ご職業
define("OCCUPATION_CODE_01", 1);
define("OCCUPATION_CODE_02", 2);
define("OCCUPATION_CODE_03", 3);
define("OCCUPATION_CODE_04", 4);
define("OCCUPATION_CODE_05", 5);
define("OCCUPATION_CODE_06", 6);
define("OCCUPATION_CODE_07", 7);
define("OCCUPATION_CODE_08", 8);
define("OCCUPATION_CODE_09", 9);
define("OCCUPATION_CODE_10", 10);
//define("OCCUPATION_CODE_11", 11);
define("OCCUPATION_CODE_12", 12);
define("OCCUPATION_CODE_13", 13);
define("OCCUPATION_CODE_14", 14);
define("OCCUPATION_CODE_15", 15);
define("CONFIG_0009","occupation_list");
$config[CONFIG_0009] = array(
	PULLDOWNLIST_BLANK
	,OCCUPATION_CODE_01 => "会社役員（上場）"
	,OCCUPATION_CODE_02 => "会社役員（未上場）"
	,OCCUPATION_CODE_03 => "会社員（上場）"
	,OCCUPATION_CODE_04 => "会社員（未上場）"
	,OCCUPATION_CODE_05 => "公務員"
	,OCCUPATION_CODE_06 => "弁護士・公認会計士・税理士"
	,OCCUPATION_CODE_07 => "医師"
	,OCCUPATION_CODE_08 => "自営業"
	,OCCUPATION_CODE_09 => "農業・漁業・林業"
	,OCCUPATION_CODE_10 => "パート・アルバイト"
	//,OCCUPATION_CODE_11 => "使わない"
	,OCCUPATION_CODE_12 => "その他"
	,OCCUPATION_CODE_13 => "主婦・主夫"
	,OCCUPATION_CODE_14 => "年金受給者"
	,OCCUPATION_CODE_15 => "無職"
);

// 年収
define("CONFIG_0010","income_list");
$config[CONFIG_0010] = array(
	PULLDOWNLIST_BLANK
	,"なし"
	,"300万円未満"
	,"300万円超～500万円未満"
	,"500万円超～800万円未満"
	,"800万円超～1,000万円未満"
	,"1,000万円超～3,000万円未満"
	,"3,000万円超"
	//,"使わない"
);

// 指定預貯金口座
define("CONFIG_0011","bank_type_list");
$config[CONFIG_0011] = array(
	PULLDOWNLIST_BLANK
	,BANK_TYPE_CODE_YUCHO => "ゆうちょ銀行"
	,BANK_TYPE_CODE_OTHER => "その他金融機関"
);

// 種目
define("CONFIG_0012","account_type_list");
$config[CONFIG_0012] = array(
	PULLDOWNLIST_BLANK
	,"普通"
	,"当座"
	//,"総合"
);

// 株式のご経験
define("CONFIG_0013","investment_experience1_list");
$config[CONFIG_0013] = array(
	PULLDOWNLIST_BLANK
	,"経験なし"
	,"1年未満"
	,"1年超～5年未満"
	,"5年超～10年未満"
	,"10年超"
);

// 債権のご経験
define("CONFIG_0014","investment_experience2_list");
$config[CONFIG_0014] = array(
	PULLDOWNLIST_BLANK
	,"なし"
	,"1年未満"
	,"3年未満"
	,"5年未満"
	,"5年以上"
);

// 投資信託のご経験
define("CONFIG_0015","investment_experience3_list");
$config[CONFIG_0015] = array(
	PULLDOWNLIST_BLANK
	,"なし"
	,"1年未満"
	,"3年未満"
	,"5年未満"
	,"5年以上"
);

// 主に信用リスクを取る商品のご経験
define("CONFIG_0016","investment_experience4_list");
$config[CONFIG_0016] = array(
	PULLDOWNLIST_BLANK
	,"なし"
	,"1年未満"
	,"3年未満"
	,"5年未満"
	,"5年以上"
);

// 商品先物のご経験
define("CONFIG_0017","investment_experience5_list");
$config[CONFIG_0017] = array(
	PULLDOWNLIST_BLANK
	,"なし"
	,"1年未満"
	,"3年未満"
	,"5年未満"
	,"5年以上"
);

// 為替証拠金取引のご経験
define("CONFIG_0018","investment_experience6_list");
$config[CONFIG_0018] = array(
	PULLDOWNLIST_BLANK
	,"なし"
	,"1年未満"
	,"3年未満"
	,"5年未満"
	,"5年以上"
);

// その他のご経験
define("CONFIG_0019","investment_experience7_list");
$config[CONFIG_0019] = array(
	PULLDOWNLIST_BLANK
	,"なし"
	,"1年未満"
	,"3年未満"
	,"5年未満"
	,"5年以上"
);

// 投資の目的を選択ください
define("CONFIG_0020","investment_purpose_list");
$config[CONFIG_0020] = array(
	PULLDOWNLIST_BLANK
	,"将来のための資産形成"
	,"余裕資金の運用"
	,"ポートフォリオの見直し"
	//,"使わない"
	//,"使わない"
);

// 都道府県
define("CONFIG_0021","address1_list");
$config[CONFIG_0021] = array(
	PULLDOWNLIST_BLANK
	,"北海道"  ,"青森県"  ,"岩手県"  ,"宮城県"  ,"秋田県"
	,"山形県"  ,"福島県"  ,"茨城県"  ,"栃木県"  ,"群馬県"
	,"埼玉県"  ,"千葉県"  ,"東京都"  ,"神奈川県","新潟県"
	,"富山県"  ,"石川県"  ,"福井県"  ,"山梨県"  ,"長野県"
	,"岐阜県"  ,"静岡県"  ,"愛知県"  ,"三重県"  ,"滋賀県"
	,"京都府"  ,"大阪府"  ,"兵庫県"  ,"奈良県"  ,"和歌山県"
	,"鳥取県"  ,"島根県"  ,"岡山県"  ,"広島県"  ,"山口県"
	,"徳島県"  ,"香川県"  ,"愛媛県"  ,"高知県"  ,"福岡県"
	,"佐賀県"  ,"長崎県"  ,"熊本県"  ,"大分県"  ,"宮崎県"
	,"鹿児島県","沖縄県"
);

// 国籍
define("CONFIG_0022","nationality_list");
$config[CONFIG_0022] = array(
	PULLDOWNLIST_BLANK
	,"日本"
	,"日本以外"
);

// 性別
define("CONFIG_0023","gender_list");
$config[CONFIG_0023] = array(
	PULLDOWNLIST_BLANK
	,"男性"
	,"女性"
);

// 状態
define("CONFIG_0024","user_status_list");
$config[CONFIG_0024] = array(
	 USER_STATUS_CODE_INTERIM       => "仮登録"
	,USER_STATUS_CODE_APPLIED       => "登録申請中"
	,USER_STATUS_CODE_APPROVED      => "承認済"
	,USER_STATUS_CODE_AUTHENTICATED => "認証済"
	,USER_STATUS_CODE_STOPPED       => "停止"
	,USER_STATUS_CODE_WITHDRAWAL    => "退会"
	,USER_STATUS_CODE_REJECTED      => "開設拒否"
);

// 本人確認書類
define("CONFIG_0025","identification_image_list");
$config[CONFIG_0025] = array(
	 "未取得"
	,"取得済"
);

// 口座情報画像
define("CONFIG_0026","account_information_image_list");
$config[CONFIG_0026] = array(
	 "未取得"
	,"取得済"
);

// 退会理由
define("WITHDRAWAL_REASON_CODE_OTHER", "99");
define("CONFIG_0027","withdrawal_reason_list");
$config[CONFIG_0027] = array(
	PULLDOWNLIST_BLANK
	,"退会理由１"
	,"退会理由２"
	,"退会理由３"
	,WITHDRAWAL_REASON_CODE_OTHER => "その他"
);

// ソート項目
define("SORT_COLUMN_CODE_USER_LENDER_NO"           , 0);
define("SORT_COLUMN_CODE_USER_KANA"                , 1);
define("SORT_COLUMN_CODE_USER_ID"                  , 2);
define("SORT_COLUMN_CODE_USER_INTERIM_DATETIME"    , 4);
define("SORT_COLUMN_CODE_USER_APPLICATION_DATETIME", 5);
define("SORT_COLUMN_CODE_USER_APPROVAL_DATETIME"   , 6);
define("CONFIG_0028","sort_column_list_user");
$config[CONFIG_0028] = array(
	 SORT_COLUMN_CODE_USER_LENDER_NO            => "管理番号"
	,SORT_COLUMN_CODE_USER_KANA                 => "氏名カナ"
	,SORT_COLUMN_CODE_USER_ID                   => "ユーザID"
	,SORT_COLUMN_CODE_USER_INTERIM_DATETIME     => "仮登録日時"
	,SORT_COLUMN_CODE_USER_APPLICATION_DATETIME => "登録申請日"
	,SORT_COLUMN_CODE_USER_APPROVAL_DATETIME    => "承認日"
);

// ソート順
define("CONFIG_0029","sort_order_list");
$config[CONFIG_0029] = array(
	 SORT_ORDER_CODE_ASC  => "昇順"
	,SORT_ORDER_CODE_DESC => "降順"
);

// 投資資金の性格
define("FUND_CHARACTER_CODE_1", 1);
define("FUND_CHARACTER_CODE_2", 2);
define("FUND_CHARACTER_CODE_3", 3);
define("FUND_CHARACTER_CODE_4", 4);
define("FUND_CHARACTER_CODE_5", 5);
define("FUND_CHARACTER_CODE_6", 6);
define("FUND_CHARACTER_CODE_7", 7);
define("FUND_CHARACTER_CODE_8", 8);
define("CONFIG_0030","fund_character_list");
$config[CONFIG_0030] = array(
	PULLDOWNLIST_BLANK
	//,FUND_CHARACTER_CODE_1 => "余裕資金"
	,FUND_CHARACTER_CODE_1 => "50万円未満"
	//,FUND_CHARACTER_CODE_2 => "老後の生活資金"
	,FUND_CHARACTER_CODE_2 => "50万円超～100万円未満"
	//,FUND_CHARACTER_CODE_3 => "借入金"
	,FUND_CHARACTER_CODE_3 => "100万円超～300万円未満"
	,FUND_CHARACTER_CODE_4 => "300万円超～500万円未満"
	,FUND_CHARACTER_CODE_5 => "500万円超～1,000万円未満"
	,FUND_CHARACTER_CODE_6 => "1,000万円超～3,000万円未満"
	,FUND_CHARACTER_CODE_7 => "3,000万円超～5,000万円未満"
	,FUND_CHARACTER_CODE_8 => "5,000万円超"
);

// 資産運用に関する関心
define("CONFIG_0031","asset_management_interest_list");
$config[CONFIG_0031] = array(
	PULLDOWNLIST_BLANK
	//,"関心がない"
	,"興味をもっているが行動はしていない"
	,"不動産に関する勉強をしている"
	,"不動産などの資産運用セミナー等に参加している"
	,"現物不動産を自身で運用している、もしくはしたことがある"
);

// 資産運用の方針
define("ASSET_MANAGEMENT_POLICY_CODE_1", 1);
define("ASSET_MANAGEMENT_POLICY_CODE_2", 2);
//define("ASSET_MANAGEMENT_POLICY_CODE_3", 3);
define("ASSET_MANAGEMENT_POLICY_CODE_4", 4);
define("ASSET_MANAGEMENT_POLICY_CODE_5", 5);
define("CONFIG_0032","asset_management_policy_list");
$config[CONFIG_0032] = array(
	PULLDOWNLIST_BLANK
	,ASSET_MANAGEMENT_POLICY_CODE_1 => "収益性重視"
	,ASSET_MANAGEMENT_POLICY_CODE_2 => "収益性と値上がり益のバランス重視"
	//,ASSET_MANAGEMENT_POLICY_CODE_3 => "積極的値上がり追求重視"
	,ASSET_MANAGEMENT_POLICY_CODE_4 => "安全性重視"
	,ASSET_MANAGEMENT_POLICY_CODE_5 => "元本保証重視"
);

// 希望運用期間
define("CONFIG_0033","operating_term_request_list");
$config[CONFIG_0033] = array(
	PULLDOWNLIST_BLANK
	,"1年未満"
	,"1年超～3年未満"
	,"3年超～5年未満"
	,"5年超～10年未満"
	,"10年超"
);



// 投資状態
define("INVESTMENT_STATUS_CODE_APPLIED"   , 0); // 投資状態：申請
define("INVESTMENT_STATUS_CODE_APPROVED"  , 1); // 投資状態：承認
define("INVESTMENT_STATUS_CODE_CANCELLED" , 2); // 投資状態：取消
define("INVESTMENT_STATUS_CODE_EXPIRED"   , 3); // 投資状態：期限切れ
define("CONFIG_0034","investment_status_list");
$config[CONFIG_0034] = array(
	 INVESTMENT_STATUS_CODE_APPLIED   => "申請"
	,INVESTMENT_STATUS_CODE_APPROVED  => "承認"
	,INVESTMENT_STATUS_CODE_CANCELLED => "取消"
	,INVESTMENT_STATUS_CODE_EXPIRED   => "期限切れ"
);

// ファンド状態
define("CONFIG_0035","fund_status_list");
$config[CONFIG_0035] = array(
	 FUND_STATUS_CODE_BEFORE_INVITING  => "募集開始前"
	,FUND_STATUS_CODE_NOW_INVITING     => "募集中"
	,FUND_STATUS_CODE_BEFORE_OPERATING => "運用準備中"
	,FUND_STATUS_CODE_NOW_OPERATING    => "運用中"
	,FUND_STATUS_CODE_CLOSED           => "運用終了"
	,FUND_STATUS_CODE_FAILURE          => "不成立"
);

// ファンド一覧ソートキー
define("CONFIG_0036","sort_column_list_fund");
$config[CONFIG_0036] = array(
	 SORT_COLUMN_CODE_FUND_ID              => "ファンドID"
	,SORT_COLUMN_CODE_FUND_NAME            => "ファンド名"
	,SORT_COLUMN_CODE_FUND_MAX_LOAN_AMOUNT => "貸付予定額"
	,SORT_COLUMN_CODE_FUND_LOAN_AMOUNT     => "貸付額"
	,SORT_COLUMN_CODE_FUND_INVITING_START  => "募集開始日"
	,SORT_COLUMN_CODE_FUND_OPERATING_START => "運用開始日"
//	,SORT_COLUMN_CODE_FUND_STATUS          => "状態"
	,SORT_COLUMN_CODE_FUND_POST_DATETIME   => "掲載開始日"
);

// 返済予定一覧ソートキー
define("CONFIG_0037","sort_column_list_repayment");
$config[CONFIG_0037] = array(
	 SORT_COLUMN_CODE_REPAYMENT_FUND_ID         => "ファンドID + No."
	,SORT_COLUMN_CODE_REPAYMENT_FUND_NAME       => "ファンド名"
	,SORT_COLUMN_CODE_REPAYMENT_REPAYMENT_DATE  => "返済予定日"
);

// 月リスト
define("CONFIG_0038","month_list");
$config[CONFIG_0038] = array(
	1 => "1" , 2 =>  "2" , 3 =>  "3" , 4 =>  "4"
   ,5 => "5" , 6 =>  "6" , 7 =>  "7" , 8 =>  "8"
   ,9 => "9" ,10 => "10" ,11 => "11" ,12 => "12"
);

// 日リスト
define("CONFIG_0039","day_list");
$config[CONFIG_0039] = array(
	  1 =>  "1" , 2 =>  "2" , 3 =>  "3" , 4 =>  "4" , 5 =>  "5"
	, 6 =>  "6" , 7 =>  "7" , 8 =>  "8" , 9 =>  "9" ,10 => "10"
	,11 => "11" ,12 => "12" ,13 => "13" ,14 => "14" ,15 => "15"
	,16 => "16" ,17 => "17" ,18 => "18" ,19 => "19" ,20 => "20"
	,21 => "21" ,22 => "22" ,23 => "23" ,24 => "24" ,25 => "25"
	,26 => "26" ,27 => "27" ,28 => "28" ,29 => "29" ,30 => "30"
	,31 => "31"
);

// 有無リスト
define("CONFIG_0040","existence_list");
$config[CONFIG_0040] = array(
	 ABSENCE_CODE  => "無"
	,PRESENCE_CODE => "有"
);

// 返済方法リスト
define("REPAYMENT_METHOD_CODE_P_LUMP"   , 0);
define("REPAYMENT_METHOD_CODE_P_I_LUMP" , 1);
define("REPAYMENT_METHOD_CODE_P_I_EQUAL", 2);
define("REPAYMENT_METHOD_CODE_P_EQUAL"  , 3);

define("CONFIG_0041","repayment_method_list");
$config[CONFIG_0041] = array(
	 REPAYMENT_METHOD_CODE_P_LUMP    => "元金一括"
	,REPAYMENT_METHOD_CODE_P_I_LUMP  => "元利一括"
//	,REPAYMENT_METHOD_CODE_P_I_EQUAL => "元利均等"
//	,REPAYMENT_METHOD_CODE_P_EQUAL   => "元金均等"
);

// 配当履歴内容
define("DIVIDEND_DETAIL_CODE_01", 1);
define("DIVIDEND_DETAIL_CODE_02", 2);
define("DIVIDEND_DETAIL_CODE_03", 3);
define("CONFIG_0042","dividend_detail_list");
$config[CONFIG_0042] = array(
	 DIVIDEND_DETAIL_CODE_01 => "出資金払戻し額"
	,DIVIDEND_DETAIL_CODE_02 => "分配金"
	,DIVIDEND_DETAIL_CODE_03 => "源泉徴収税額"
);

// 同意履歴内容
define("AGREEMENT_DETAIL_CODE_01", 1);
define("AGREEMENT_DETAIL_CODE_02", 2);
define("AGREEMENT_DETAIL_CODE_03", 3);
define("AGREEMENT_DETAIL_CODE_04", 4);
define("CONFIG_0043","agreement_detail_list");
$config[CONFIG_0043] = array(
	 AGREEMENT_DETAIL_CODE_01 => "会員登録"
	,AGREEMENT_DETAIL_CODE_02 => "出資者登録"
	,AGREEMENT_DETAIL_CODE_03 => "出資申込"
	,AGREEMENT_DETAIL_CODE_04 => "報告書"
);


// 投資家仮登録～本登録時同意書面
define("TMP_REG_DOC_CAT_ID"     , "00000");        // 仮登録時個人情報の取り扱い書面のファンドID
define("TMP_REG_DOC_FUND_NAME"  , "-");            // 仮登録時個人情報の取り扱い書面のファンド名
define("TMP_REG_DOC_ID_00000"   , "00000");        // 仮登録時個人情報の取り扱い書面ID
define("TMP_REG_DOC_NAME_00000" , "個人情報保護"); // 仮登録時個人情報の取り扱い書面ID
define("REG_DOC_CAT_ID"         , "00000");        // 本登録時同意書面のファンドID
define("REG_DOC_FUND_NAME"      , "-");            // 本登録時同意書面のファンド名
define("REG_DOC_ID_00001" , "00001");
define("REG_DOC_ID_00002" , "00002");
define("REG_DOC_ID_00003" , "00003");
define("REG_DOC_ID_00004" , "00004");
define("REG_DOC_ID_00005" , "00005");
define("CONFIG_0064","reg_doc_list");
$config[CONFIG_0064] = array(
	 REG_DOC_ID_00001 => "7-star funding 利用規約"
	,REG_DOC_ID_00002 => "反社会的勢力でないことの表明・確約に関する同意"
	,REG_DOC_ID_00003 => "電子交付に関する同意"
	,REG_DOC_ID_00004 => "不要"
	,REG_DOC_ID_00005 => "不要"
);

// 投資申込受付時同意書面～投資後の各種報告書
define("INV_DOC_CAT_ID"   , "00001");
define("INV_DOC_ID_00001" , "00001");
define("INV_DOC_ID_00002" , "00002");
define("INV_DOC_ID_00003" , "00003");
define("INV_DOC_ID_00004" , "00004");
define("INV_DOC_ID_00005" , "00005");
define("INV_DOC_ID_00006" , "00006");
define("INV_DOC_ID_00007" , "00007");
define("INV_DOC_FUND_NAME", "-"); // 報告書のファンド名
define("CONFIG_0045","inv_doc_list");
$config[CONFIG_0045] = array(
	 INV_DOC_ID_00001 => "契約成立前交付書面"
	,INV_DOC_ID_00002 => "不動産特定共同事業契約約款"
	,INV_DOC_ID_00003 => "契約成立時交付書面"
	,INV_DOC_ID_00004 => "財産管理報告書"
	,INV_DOC_ID_00005 => "取引残高報告書"
	,INV_DOC_ID_00006 => "年間取引報告書"
	,INV_DOC_ID_00007 => "不動産特定共同事業契約約款成立後交付"
);

// メールマガジン受取
define("MAIL_MAGAZINE_RECEIVE", 1);
define("MAIL_MAGAZINE_REJECT" , 2);
define("CONFIG_0046","mail_magazine_receive_list");
$config[CONFIG_0046] = array(
	 MAIL_MAGAZINE_RECEIVE => "受信する"
	,MAIL_MAGAZINE_REJECT  => "受信しない"
);

// ソート項目
define("SORT_COLUMN_CODE_INV_APPL_DATE", 1);
define("SORT_COLUMN_CODE_INV_USER_NAME", 2);
define("SORT_COLUMN_CODE_INV_FUND_NAME", 3);
define("SORT_COLUMN_CODE_INV_STATUS"   , 4);
define("SORT_COLUMN_CODE_INV_APPR_DATE", 5);
define("CONFIG_0047","sort_column_list_investment");
$config[CONFIG_0047] = array(
	 SORT_COLUMN_CODE_INV_APPL_DATE => "申込日時"
	,SORT_COLUMN_CODE_INV_USER_NAME => "投資家名"
	,SORT_COLUMN_CODE_INV_FUND_NAME => "ファンド名"
	,SORT_COLUMN_CODE_INV_STATUS    => "状態"
	,SORT_COLUMN_CODE_INV_APPR_DATE => "承認日時"
);

// お問い合わせ（種類）
define("CONFIG_0048","contact_type_list");
$config[CONFIG_0048] = array(
	PULLDOWNLIST_BLANK
	,"新規会員登録について"
	,"投資について"
	,"お借入について"
	,"取材について"
	,"その他"
);

// お問い合わせ (連絡方法)
define("MESSAGE_MOBIL", 1);
define("MESSAGE_MAIL" , 2);
define("CONFIG_0049","message_type_list");
$config[CONFIG_0049] = array(
	PULLDOWNLIST_BLANK
	,MESSAGE_MOBIL  => "電話"
	,MESSAGE_MAIL => "メール"
);

// 保証有無(表)
define("WARRANTY_DISPLAY_CODE_0", 0);
define("WARRANTY_DISPLAY_CODE_1", 1);
define("WARRANTY_DISPLAY_CODE_2", 2);
define("CONFIG_0050","warranty_display_table");
$config[CONFIG_0050] = array(
	 WARRANTY_DISPLAY_CODE_0 => ""
	,WARRANTY_DISPLAY_CODE_1 => "保証有り"
	,WARRANTY_DISPLAY_CODE_2 => "一部保証"
);

// 保証有無(リスト)
define("CONFIG_0051","warranty_display_list");
$config[CONFIG_0051] = array(
	 WARRANTY_DISPLAY_CODE_0 => ""
	,WARRANTY_DISPLAY_CODE_1 => "有"
	,WARRANTY_DISPLAY_CODE_2 => "一部有"
);

// 担保有無(表)
define("COLLATERAL_DISPLAY_CODE_0", 0);
define("COLLATERAL_DISPLAY_CODE_1", 1);
define("COLLATERAL_DISPLAY_CODE_2", 2);
define("CONFIG_0052","collateral_display_table");
$config[CONFIG_0052] = array(
	 COLLATERAL_DISPLAY_CODE_0 => ""
	,COLLATERAL_DISPLAY_CODE_1 => "担保有り"
	,COLLATERAL_DISPLAY_CODE_2 => "一部担保"
);

// 担保有無(リスト)
define("CONFIG_0053","collateral_display_list");
$config[CONFIG_0053] = array(
	 COLLATERAL_DISPLAY_CODE_0 => ""
	,COLLATERAL_DISPLAY_CODE_1 => "有"
	,COLLATERAL_DISPLAY_CODE_2 => "一部有"
);

// アルファベット
define("KANA_A","えー");
define("KANA_B","びー");
define("KANA_C","しー");
define("KANA_D","でぃー");
define("KANA_E","いー");
define("KANA_F","えふ");
define("KANA_G","じー");
define("KANA_H","えっち");
define("KANA_I","あい");
define("KANA_J","じぇい");
define("KANA_K","けー");
define("KANA_L","える");
define("KANA_M","えむ");
define("KANA_N","えぬ");
define("KANA_O","おー");
define("KANA_P","ぴー");
define("KANA_Q","きゅー");
define("KANA_R","あーる");
define("KANA_S","えす");
define("KANA_T","てぃー");
define("KANA_U","ゆー");
define("KANA_V","ぶい");
define("KANA_W","だぶりゅー");
define("KANA_X","えっくす");
define("KANA_Y","わい");
define("KANA_Z","ぜっと");
define("CONFIG_0055","alphabet_kana_list");
$config[CONFIG_0055] = array(
	 "a" => KANA_A, "b" => KANA_B, "c" => KANA_C, "d" => KANA_D, "e" => KANA_E
	,"f" => KANA_F, "g" => KANA_G, "h" => KANA_H, "i" => KANA_I, "j" => KANA_J
	,"k" => KANA_K, "l" => KANA_L, "m" => KANA_M, "n" => KANA_N, "o" => KANA_O
	,"p" => KANA_P, "q" => KANA_Q, "r" => KANA_R, "s" => KANA_S, "t" => KANA_T
	,"u" => KANA_U, "v" => KANA_V, "w" => KANA_W, "x" => KANA_X, "y" => KANA_Y
	,"z" => KANA_Z
	,"A" => KANA_A, "B" => KANA_B, "C" => KANA_C, "D" => KANA_D, "E" => KANA_E
	,"F" => KANA_F, "G" => KANA_G, "H" => KANA_H, "I" => KANA_I, "J" => KANA_J
	,"K" => KANA_K, "L" => KANA_L, "M" => KANA_M, "N" => KANA_N, "O" => KANA_O
	,"P" => KANA_P, "Q" => KANA_Q, "R" => KANA_R, "S" => KANA_S, "T" => KANA_T
	,"U" => KANA_U, "V" => KANA_V, "W" => KANA_W, "X" => KANA_X, "Y" => KANA_Y
	,"Z" => KANA_Z
);

// 交渉記録
// 相手
define("CONFIG_0056","person_list");
$config[CONFIG_0056] = array(
	  1 => "本人"
	, 2 => "親"
	, 3 => "その他身内"
	, 4 => "知人・代理人"
	, 5 => "弁護士・司法書士(事務員含む)"
	,99 => "その他"
);

// 場所
define("CONFIG_0057","place_list");
$config[CONFIG_0057] = array(
	  1 => "自宅"
	, 2 => "勤務地"
	, 3 => "当社"
	, 4 => "携帯TEL"
	, 5 => "弁護士・司法書士事務所等"
	,99 => "その他"
);

// 方法１
define("CONFIG_0058","method_1_list");
$config[CONFIG_0058] = array(
	 1 => "社→相手"
	,2 => "相手→社"
);

// 方法２
define("CONFIG_0059","method_2_list");
$config[CONFIG_0059] = array(
	  1 => "携帯電話"
	, 2 => "自宅電話"
	, 3 => "メール"
	, 4 => "郵送"
	,99 => "その他"
);

// 重要度
define("CONFIG_0060","importance_list");
$config[CONFIG_0060] = array(
	 1 => "連絡"
	,2 => "重要"
	,3 => "最重要"
);

// 運用報告書公開状態
define("REPORT_STATUS_CODE_0", 0);
define("REPORT_STATUS_CODE_1", 1);
define("CONFIG_0061","report_status_list");
$config[CONFIG_0061] = array(
	 REPORT_STATUS_CODE_0 => "未公開"
	,REPORT_STATUS_CODE_1 => "公開済"
);

// メール送信先指定方法
define("SPECIFIED_METHOD_CODE_0", 0);
define("SPECIFIED_METHOD_CODE_1", 1);
define("SPECIFIED_METHOD_CODE_2", 2);
define("CONFIG_0062","specified_method_list");
$config[CONFIG_0062] = array(
	 SPECIFIED_METHOD_CODE_0 => "条件を指定"
	,SPECIFIED_METHOD_CODE_1 => "管理番号を指定"
	,SPECIFIED_METHOD_CODE_2 => "投資家IDを指定"
);

// メール送信元アカウント
define("MAIL_ACCOUNT_CODE_SUBSCRIBE", 0);
define("MAIL_ACCOUNT_CODE_SUPPORT"  , 1);
define("CONFIG_0063","mail_account_list");
$config[CONFIG_0063] = array(
	 MAIL_ACCOUNT_CODE_SUBSCRIBE => MAIL_SUBSCRIBE
	,MAIL_ACCOUNT_CODE_SUPPORT   => MAIL_SUPPORT
);

// 入金履歴照合状態
define("DEPOSIT_UNRECONCILED", 0);
define("DEPOSIT_RECONCILED_AUTO", 1);
define("DEPOSIT_RECONCILED_MANUAL", 2);
define("CONFIG_0065", "deposit_status_code");
$config[CONFIG_0065] = array(
	DEPOSIT_UNRECONCILED => "未照合",
	DEPOSIT_RECONCILED_AUTO => "照合済(自動)",
	DEPOSIT_RECONCILED_AUTO => "照合済(手動)"
);

// 入会審査権限
define("AUTH_UNLIMITED", "00");
define("AUTH_SALESMGR", "10");
define("AUTH_SALESREP", "11");
define("AUTH_ADMINMGR", "20");
define("AUTH_ADMINREP", "21");
define("AUTH_NONE", "90");
define("AUTH_RESIGNED", "99");
define("CONFIG_0066", "lender_review_auth");
$config[CONFIG_0066] = array(
	AUTH_UNLIMITED => "無制限",
	AUTH_SALESMGR => "営業部長",
	AUTH_SALESREP => "営業担当",
	AUTH_ADMINMGR => "管理部長",
	AUTH_ADMINREP => "管理担当",
	AUTH_NONE => "権限無し",
	AUTH_RESIGNED => "退社済み"
);

// 口座開設審査
define("REVIEW_DRVS_LICENSE", 01011);
define("REVIEW_HEALTH_INSURANCE", 01021);
define("REVIEW_SEAL_CERTIFICATE", 01031);
define("REVIEW_BASIC_RESIDENT_REG_CARD", 01041);
define("REVIEW_PASSPORT", 01051);
define("REVIEW_RESIDENCE_CARD", 01061);
define("REVIEW_MISC_ID", 01071);
define("REVIEW_ACCT_PASSBOOK", 02011);
define("REVIEW_ACCT_ATMCARD", 02021);
define("REVIEW_ACCT_NETBANK_SS", 02031);
define("REVIEW_MYNUMBER_CARD", 03011);
define("REVIEW_MYNUMBER_NOTIFICATION", 03021);
define("REVIEW_RESIDENTIAL_CERT", 03031);

// 本人確認書類
//define("CONFIG_0067", "review_id_list");
define("CONFIG_0067", "personal_id_list");
$config[CONFIG_0067] = array(
	 REVIEW_DRVS_LICENSE => "運転免許証"
	,REVIEW_HEALTH_INSURANCE => "各種健康保険証"
	,REVIEW_SEAL_CERTIFICATE => "印鑑証明書"
	,REVIEW_BASIC_RESIDENT_REG_CARD => "住民基本台帳カード"
	,REVIEW_PASSPORT => "パスポート"
	,REVIEW_RESIDENCE_CARD => "在留カード又は特別永住者証明書"
	,REVIEW_MISC_ID => "公共料金領収証書"
	,REVIEW_ACCT_PASSBOOK => "預金通帳"
	,REVIEW_ACCT_ATMCARD => "キャッシュカード"
	,REVIEW_ACCT_NETBANK_SS => "口座情報画面"
	,REVIEW_MYNUMBER_CARD => "マイナンバー個人番号カード"
	,REVIEW_MYNUMBER_NOTIFICATION => "マイナンバー通知カード"
	,REVIEW_RESIDENTIAL_CERT => "住民票の写し"
);
