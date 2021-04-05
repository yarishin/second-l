$(function() {
    // アップロードするファイルを選択
         $('input[type=file]').change(function() {
             var file = $(this).prop('files')[0];
    
    // 画像以外は処理を停止
                     if (!file.type.match('image.*')) {
                             $('span').html('');
                                    return;
                                        }
    
    // 画像表示
             var reader = new FileReader();
                 reader.onload = function() {
             var img_src = $('<img>').attr({'src': reader.result, 'width': '150px'});
                 $('pp').html(img_src);
                                          };
                                 reader.readAsDataURL(file);
                                          });
                                          });
