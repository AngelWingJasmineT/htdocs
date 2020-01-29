<div class="head">
<div class="title">
JasmineT Shop 管理画面
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

session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
    print 'ログインされていません。<br/>';
    print '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
    exit();
}

if(isset($_POST['disp'])==true)
{
    if(isset($_POST['staffcode'])==false)
    {
          header('Location:staff_ng.php');
          exit();
    }
    $staff_code=$_POST['staffcode'];
    header('Location: staff_disp.php?staffcode='.$staff_code);
    exit();
}

if(isset($_POST['add'])==true)
{
    header('Location: staff_add.php');
    exit();
}

if(isset($_POST['edit'])==true)
{
    if(isset($_POST['staffcode'])==false)
    {
          header('Location:staff_ng.php');
          exit();
    }
    $staff_code=$_POST['staffcode'];
    header('Location: staff_edit.php?staffcode='.$staff_code);
    exit();
}

if(isset($_POST['delete'])==true)
{
    if(isset($_POST['staffcode'])==false)
    {
          header('Location:staff_ng.php');
          exit();
    }
    $staff_code=$_POST['staffcode'];
    header('Location: staff_delete.php?staffcode='.$staff_code);
    exit();
}

?>

</div>
</body>
</html>
