<?php  
App::uses('AppModel', 'Model');

class Image extends AppModel{  //Model.Image.php table.images
        
        var $name = 'Image';
        var $actsAs = array(
                            'UploadPack.Upload' => array(
                                                         'img' => array(
                                                                        'quality' =>  95,//画像クオリティー
                                                                        'path'    =>  ':webroot/upload/:id/:hash:style.:extension',//ファイルパス
                                                                        'styles'  =>  array(
                                                                                            'big'   => '600w',
                                                                                            'small' => '80h',
                                                                                            'thumb' => '50x50'
                                                                                      ),
                                                          ),
                             ) 
                      );
      
        //画像保存にMD5を採用してファイルパスから他の画像をわからなくする

        public $filterArgs = array(
                                   'id'            => array('type' => 'value'),
                                   'title'         => array('type' => 'like' ),
                                   'img_file_name' => array('type' => 'like' ),
                                   'body'          => array('type' => 'like' ),
                                   'created'       => array('type' => 'value'),
               );


        public $validate = array(
                                 'img'     => array(
                                 'maxSize' => array(  
                                 'rule'    => array('attachmentMaxSize', 8388608),  
                                 'message' => '"ERROR"8MB以下のファイルでアップロードしてください'  
                                              ),  
                                                      //○○キロバイト以上のファイルでアップロードしてください。(あまりにも小さいファイルはアップロードさせない)  
                                 'minSize' => array(  
                                 'rule'    => array('attachmentMinSize', 1024),  
                                 'message' => '"ERROR"1KB以上のファイルでアップロードしてください'  
                                              ),
                                 'rule'    => array('attachmentContentType', array('image/jpeg', 'image/gif','image/png')
                                              ),  
                                 'message' => '"ERROR"png,jpg,gifファイルのみアップロードできます。'   
                                              )
  
                );


}

