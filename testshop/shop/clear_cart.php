<div class="head">
<div class="title">
JasmineT Shop
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

カートを空にしました。<br/>

</div>

</body>
</html>
