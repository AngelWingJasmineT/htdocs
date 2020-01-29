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

try
{

$staff_code = $_GET['staffcode'];

$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT name FROM mst_staff WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[] = $staff_code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$staff_name = $rec['name'];

$dbh=null;

}
catch (Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

<div class="menu">スタッフ削除</div>
<br/>
<div class="caption">スタッフコード</div>
<?php print $staff_code; ?>
<br/><br/>
<div class="caption">スタッフ名</div>
<?php print $staff_name; ?>
<br/><br/>
このスタッフを削除してもよろしいですか？<br/>
<br/>
<form method="post" action="staff_delete_done.php">
<input type="hidden" name="code" value="<?php print $staff_code; ?>">
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>

</div>
</body>
</html>
