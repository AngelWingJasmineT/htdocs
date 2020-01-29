<div class="head">
<div class="title">
JasmineT Shop
</div>
<div class="login">
<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['member_login'])==false)
{
    print 'ようこそゲスト様　';
    print '<a href="member_login.html">会員ログイン</a><br/>';
    print '<br/>';
}
else
{
    print 'ようこそ';
    print $_SESSION['member_name'];
    print '様　';
    print '<a href="member_logout.php">ログアウト</a><br/>';
    print '<br/>';
}
?>
</div>
</div>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/shop_common.css">
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

$sql='SELECT name,price,gazou FROM mst_product WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[] = $pro_code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$pro_name = $rec['name'];
$pro_price = $rec['price'];
$pro_gazou_name = $rec['gazou'];

$dbh=null;

if($pro_gazou_name=='')
{
		$disp_gazou='';
}
else
{
		$disp_gazou='<img src="../product/gazou/'.$pro_gazou_name.'" width=100px height=100px>';
}
print '<a href="shop_cartin.php?procode='.$pro_code.'"><div class="link">カートに入れる</div></a><br/><br/>';
}
catch (Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

<div class="menu">商品詳細</div><br/>
<table border="1">
<tr>
<td>商品コード</td>
<td>商品名</td>
<td>商品画像</td>
<td>価格</td>
</tr>
<tr>
    <td><?php print $pro_code; ?></td>
    <td><?php print $pro_name; ?></td>
    <td><?php print $disp_gazou; ?></td>
    <td><?php print $pro_price; ?>円</td>
</tr>
</table>
<form>
<input type="button" onclick="history.back()" value="戻る">
</form>

</div>
</body>
</html>
