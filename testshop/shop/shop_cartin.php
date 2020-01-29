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

if(isset($_SESSION['cart'])==true)
{
    $cart = $_SESSION['cart'];
    $kazu = $_SESSION['kazu'];
    if(in_array($pro_code,$cart)==true)
    {
        print 'その商品はすでにカートに入っています。<br/>';
        print '<a href="shop_list.php">商品一覧に戻る</a>';
        exit();
    }
}
$cart[] = $pro_code;
$kazu[] = 1;
$_SESSION['cart'] = $cart;
$_SESSION['kazu'] = $kazu;

}
catch (Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

カートに追加しました。<br/>
<br/>
<a href="shop_list.php">商品一覧に戻る</a>

</div>

</body>
</html>
