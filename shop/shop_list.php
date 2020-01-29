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

$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT code,name,price,gazou FROM mst_product WHERE 1';
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;

print '<div class="menu">商品一覧</div><br/>';

while(true)
{
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $pro_gazou_name = $rec['gazou'];
    if($pro_gazou_name=='')
    {
		$disp_gazou='';
    }
    else
    {
		$disp_gazou='<img src="../product/gazou/'.$pro_gazou_name.'" width=100px height=100px>';
    }
    if($rec==false)
    {
    break;
    }
    print '<a id="item" href="shop_product.php?procode='.$rec['code'].'">';
    print $rec['name'];
    Print '　';
    print $rec['price'].'円';
    print '</a>';
    // print $disp_gazou;
    print '<br/>';
}

print '<br/>';
print '<a href="shop_cartlook.php"><div class="link">カートを見る</div></a><br/>';

}
catch (Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

</div>

</body>
</html>
