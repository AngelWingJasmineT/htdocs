<div class="head">
<div class="title">
【テスト開発】JasmineT Shop 管理画面
</div>
</div>

<?php
function http_basic_authenticate_with($name,$password,$realm = "Protected area"){
  if (!isset($_SERVER['PHP_AUTH_USER']) || !($_SERVER['PHP_AUTH_USER'] == $name && $_SERVER['PHP_AUTH_PW'] == $password )) {
    header('WWW-Authenticate: Basic realm="'.$realm.'"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Not allowed to access.';
    exit;
  }
}

http_basic_authenticate_with("aaaa","1111"); 
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="./css/kanri_common.css">
<title>Shop</title>
</head>
<body>

<div class="container">

<div class="menu">テストショップ</div><br/>
<br/>
<a href="./shop/shop_list.php">ショップ</a><br/>
<br/>
<a href="./staff_login/staff_login.html">管理画面</a><br/>
<br/>

</div>
</body>
</html>