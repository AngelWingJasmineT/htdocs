<div class="head">
<div class="title">
JasmineT Shop 管理画面
</div>
<div class="login">

<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
    print 'ログインされていません。<br/>';
    print '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
    exit();
}
else
{
    print $_SESSION['staff_name'];
    print 'さんログイン中<br/>';
    print '<br/>';
}
?>
</div>
</div>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/kanri_common.css">
<title>Shop</title>
</head>
<body>

<div class="container">

<?php

try
{

$pro_code = $_GET['procode'];

$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT name,gazou FROM mst_product WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[] = $pro_code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$pro_name = $rec['name'];
$pro_gazou_name = $rec['gazou'];

$dbh=null;

if($pro_gazou_name=='')
{
		$disp_gazou='';
}
else
{
		$disp_gazou='<img src="./gazou/'.$pro_gazou_name.'">';
}

}
catch (Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

<div class="menu">商品削除</div>
<br/>
<div class="caption">商品コード</div>
<?php print $pro_code; ?>
<br/>
<br/>
<div class="caption">商品名</div>
<?php print $pro_name; ?>
<br/>
<br/>
<?php print $disp_gazou; ?>
<br/>
<br/>
この商品を削除してもよろしいですか？<br/>
<br/>
<form method="post" action="pro_delete_done.php">
<input type="hidden" name="code" value="<?php print $pro_code; ?>">
<input type="hidden" name="gazou_name" value="<?php print $pro_gazou_name; ?>">
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>

</div>
</body>
</html>
