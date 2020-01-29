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

<div class="menu">スタッフ追加</div>
<br/>
<form method="post" action="staff_add_check.php">
<div class="caption">スタッフ名を入力してください。</div>
<input type="text" name="name" style="width:200px"><br/><br/>
<div class="caption">パスワードを入力してください。</div>
<input type="password" name="pass" style="width:100px"><br/><br/>
<div class="caption">パスワードをもう1度入力してください。</div>
<input type="password" name="pass2" style="width:100px"><br/><br/>
<br/>
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>

</div>
</body>
</html>
