<div class="head">
  <div class="title">
  JasmineT Shop 管理画面
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
<link rel="stylesheet" type="text/css" href="../css/kanri_common.css">
<title>Shop</title>
</head>
<body>

<div class="container">

ログアウトしました。<br/>
<br/>
<a href="../staff_login/staff_login.html">ログイン画面へ</a>

</div>
</body>
</html>
