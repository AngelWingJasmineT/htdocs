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

$post=sanitize($_POST);
$pro_name=$post['name'];
$pro_price=$post['price'];
$pro_gazou=$_FILES['gazou'];

if($pro_name=='')
{
	print '商品名が入力されていません。<br />';
}
else
{
	print '<div class="caption">商品名:</div>';
	print $pro_name;
	print '<br /><br />';
}

if(preg_match('/\A[0-9]+\z/',$pro_price)==0)
{
	print '価格をきちんと入力してください。<br />';
}
else
{
	print '<div class="caption">価格:</div>';
	print $pro_price;
	print '円<br /><br />';
}

if($pro_gazou['size']>0)
{
		if($pro_gazou['size']>1000000)
		{
					print '画像が大きすぎます';
		}
		else
		{
					move_uploaded_file($pro_gazou['tmp_name'],'./gazou/'.$pro_gazou['name']);
					print '<img src="./gazou/'.$pro_gazou['name'].'">';
					print '<br/><br />';
		}
}

if($pro_name=='' || preg_match('/\A[0-9]+\z/',$pro_price)==0 || $pro_gazou['size']>1000000)
{
	print '<form>';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '</form>';
}
else
{
	print '上記の商品を追加します。<br/>';
	print '<form method="post" action="pro_add_done.php">';
	print '<input type="hidden" name="name" value="'.$pro_name.'">';
	print '<input type="hidden" name="price" value="'.$pro_price.'">';
	print '<input type="hidden" name="gazou_name" value="'.$pro_gazou['name'].'">';
	print '<br />';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '<input type="submit" value="ＯＫ">';
	print '</form>';
}

?>

</div>
</body>
</html>
