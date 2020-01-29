<div class="head">
  <div class="title">
  JasmineT Shop
  </div>
</div>

<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['member_login'])==false)
{
        print 'ログインされていません。<br/>';
        print '<a href="shop_list.php">商品一覧へ</a>';
        exit();
}
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

<?php
$code=$_SESSION['member_code'];

$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT name,email,postal1,postal2,address,tel FROM dat_member WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[]=$code;
$stmt->execute($data);
$rec=$stmt->fetch(PDO::FETCH_ASSOC);

$dbh=null;

$onamae=$rec['name'];
$email=$rec['email'];
$postal1=$rec['postal1'];
$postal2=$rec['postal2'];
$address=$rec['address'];
$tel=$rec['tel'];

print '<div class="caption">お名前</div>';
print $onamae;
print '<br/><br/>';

print '<div class="caption">メールアドレス</div>';
print $email;
print '<br/><br/>';

print '<div class="caption">郵便番号</div>';
print $postal1;
print '-';
print $postal2;
print '<br/><br/>';

print '<div class="caption">住所</div>';
print $address;
print '<br/><br/>';

print '<div class="caption">電話番号</div>';
print $tel;
print '<br/><br/>';

print '<form method="post" action="shop_kantan_done.php">';
print '<input type="hidden" name="onamae" value="'.$onamae.'">';
print '<input type="hidden" name="email" value="'.$email.'">';
print '<input type="hidden" name="postal1" value="'.$postal1.'">';
print '<input type="hidden" name="postal2" value="'.$postal2.'">';
print '<input type="hidden" name="address" value="'.$address.'">';
print '<input type="hidden" name="tel" value="'.$tel.'">';
print '<input type="button" onclick="history.back()" value="戻る">';
print '<input type="submit" value="OK"><br/>';
print '</form>';

?>

</div>
</body>
</html>
