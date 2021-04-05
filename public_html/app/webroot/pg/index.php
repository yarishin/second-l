<?php
print_r ($_POST);
print "<br>";
if(isset($_POST["no1"])){
$comment = $_POST["no1"];
echo $comment;
}
?>



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
<form action = "index.php" method = "post" >
<input type = "text" name = "no1" value="<?php echo $aaa ?>"><br/>
<input type = "text" name = "no2" ><br/>
<input type = "submit" value ="送信">
</form>
</body>
</html>
