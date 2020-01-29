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

<div class="menu">ショップ管理トップメニュー</div><br/>
<br/>
<a href="../staff/staff_list.php">スタッフ管理</a><br/>
<br/>
<a href="../product/pro_list.php">商品管理</a><br/>
<br/>
<a href="../order/order_download.php">注文ダウンロード</a><br/>
<br/>
<a href="staff_logout.php">ログアウト</a><br/>

</div>
</body>
</html>
