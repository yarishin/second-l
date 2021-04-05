<?php
App::uses('AppController', 'Controller');
class ImagesController extends AppController {

        public $uses = array(
                 "Image"    // Imageモデルを使うModel.Image.php table.images
                ,"MstCompany"
                ,"MstDocument"
                ,"MstUser"
                ,"Transaction"
                ,"TrnAgreementHistory"
        );
        public $components = array(
                 "Paginator"
                ,"AgreementHistory"
                ,"Common"
                ,"Company"
                ,"CheckC030"
                ,"Document"
                ,"DummyData"
                ,"Mail"
                ,"Pdf"
                ,"User"
                ,"SessionUserInfo"
        );

        // ヘルパーの読み込み
        var $helpers = array('Form', 'UploadPack.Upload');

        public function index() {
                $this->layout = LAYOUT_NAME_001;
                $event_id = $this->Common->getSessionEventId();
                        // 未ログイン状態の場合、ログインへ
                        if (strcmp(EVENT_ID_999999999, $event_id) !=0 && !$this->SessionUserInfo->checkUserInfo()) {
                                $this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010020);
                        }
                $session = $this->Session->read();              
                $this->set("session",$session);
                $user_id = $session[LOGIN_USER_INFO][user_id];//セッション情報からユーザーIDを取り出してセット
               if (is_null($user_id)){
                       $user_id = '99999999';//ログインしていない場合のID　取り急ぎ
                       }else{
                        } 
                $this->set("user_id",$user_id);
                    if (!empty($this->data)) {
                        if ($this->Image->save($this->data)) {
                                //リダイレクト
                                $this->redirect('index');
                        }
                    }
                //$this->set('images', $this->Image->find('all'));
                //登録されたデータ一覧を表示する
                $images = $this->Image->find('all',array(
                                                         'conditions' => array('title' => $user_id),
                                                         'order' => array('created' => 'desc'),
                                                         'limit' => 8));
                $this->set("images",$images);
        } 


        public function add() {
                $this->layout = LAYOUT_NAME_001;
                   

                $event_id = $this->Common->getSessionEventId();             
                        // 未ログイン状態の場合、ログインへ
                        if (strcmp(EVENT_ID_999999999, $event_id) !=0 && !$this->SessionUserInfo->checkUserInfo()) {
                                $this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010020);
                        }
			
                  switch ($event_id){
                    case EVENT_ID_999999999:
                         $aaa = "999";
                         $this->set("aaa",$aaa);
                         break;
                    case EVENT_ID_040010080:
                         $aaa = "080";
                         $this->set("aaa",$aaa);
                         break;
                    case EVENT_ID_040010090:
                         $aaa = "090";
                         $this->set("aaa",$aaa);
                         break;
                    default:
                         $aaa = "default";
                         $this->set("aaa",$aaa);
                         $this->Common->setSessionEventId(EVENT_ID_040010090);
                         //$this->Common->setSessionEventId($event_id);
                         $this->Common->redirectCommon(REDIRECT_C030, REDIRECT_A030050);
                  }


			
                $session = $this->Session->read();              
                $this->set("session",$session);
                $this->set("event_id",$event_id);
                $user_id = $session[LOGIN_USER_INFO][user_id];//セッション情報からユーザーIDを取り出してセット
               if (is_null($user_id)){
                       $user_id = '99999999';//ログインしていない場合のID　取り急ぎ
               } else {
                 } 
                $this->set("user_id",$user_id);
                
                // フォルダが無い場合、作成する。
			        if (!file_exists("../webroot/upload/.$user_id")) {
				   if (!mkdir("../webroot/upload/.$user_id", 0777)) {
					throw new Exception();
				   }
			        }  
             
                
                
                    if (!empty($this->data)) {
                        if ($this->Image->save($this->data)) {
                                //リダイレクト
                          $this->Common->redirectCommon(REDIRECT_C070, REDIRECT_A070010);                                
                          //$this->redirect('add');
                        }
                    }
                //$this->set('images', $this->Image->find('all'));
                //登録されたデータ一覧を表示する
                $images = $this->Image->find('all',array(
                                                         'conditions' => array('title' => $user_id),
                                                         'order' => array('created' => 'desc'),
                                                         'limit' => 8));
                $this->set("images",$images);

        } 


        public function end() {
                $this->layout = LAYOUT_NAME_001;
                $event_id = $this->Common->getSessionEventId();
                        // 未ログイン状態の場合、ログインへ
                        if (strcmp(EVENT_ID_999999999, $event_id) !=0 && !$this->SessionUserInfo->checkUserInfo()) {
                                $this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010020);
                        }
                $session = $this->Session->read();              
                $this->set("session",$session);
                $this->set("event_id",$event_id);
            $this->Common->redirectCommon(REDIRECT_C010, REDIRECT_A010020);
        }
 }
?>

