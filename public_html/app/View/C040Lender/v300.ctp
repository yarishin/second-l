<?php
           print_r ($_POST);
           print "<br>";
     if(isset($_POST["no1"])) {
         $comment = $_POST["no1"];
         echo $comment;
     }


          $count = 1;
          $count2 = 1;
          $coun = 1;
          $a = 6;
       if($count == 1 && $count2 == 1 && $coun == 1 && $a !== 6) {
           print "全部そろってます";
       } else {
           print "そろってません";
         } 
?>

<script>
// 何かしらボタンが押された時に処理が実行される
$('button').click(function() {
    // URLを生成する
    var url = "<?=$this->Html->url(array('controller' => 'C040Lender', 'action' => 'v300'))?>";
    // Ajaxの処理を呼び出す
    execAjax(url);
});
</script>




<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UFT-8">
<title>データを受け取る</title>
</head>
<body>
<?php
$aaa = date("Y/m/d H:i:s");
?>
<h1>データの送信</h1>
<form action = "/C040Lender/v300" method = "post" >
<input type = "text" name = "no1" value="<?php echo $aaa ?>"><br/>
<input type = "text" name = "no2" ><br/>
<input type = "submit" value ="送信">
</form>
</body>
</html>
