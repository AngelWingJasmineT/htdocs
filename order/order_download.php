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
require_once('../common/common.php');
?>

<div class="caption">ダウンロードしたい注文日を選んでください。</div>
<form method="post" action="order_download_done.php">
<?php pulldown_year(); ?>
年
<?php pulldown_month(); ?>
月
<?php pulldown_day(); ?>
日<br/>
<br/>
<input type="submit" value="ダウンロードへ">
</form>

</div>
</body>
</html>
