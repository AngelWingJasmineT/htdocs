<div class="head">
  <div class="title">
  JasmineT Shop
  </div>
</div>

<?php
session_start();
$_SESSION=array();
if(isset($_COOKIE[session_name()])==true)
{
   setcookie(session_name(),'',time()-42000,'/');
}
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/shop_common.css">
<title>Shop</title>
</head>
<body>


<div class="container">

ログアウトしました。<br/>
<br/>
<a href="shop_list.php">商品一覧へ</a>

</div>

</body>
</html>
