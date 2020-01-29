<div class="head">
  <div class="title">
  JasmineT Shop
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

<?php
require_once('../common/common.php');

$post=sanitize($_POST);

$onamae=$post['onamae'];
$email=$post['email'];
$postal1=$post['postal1'];
$postal2=$post['postal2'];
$address=$post['address'];
$tel=$post['tel'];
$chumon=$post['chumon'];
$pass=$post['pass'];
$pass2=$post['pass2'];
$danjo=$post['danjo'];
$birth=$post['birth'];

$okflag=true;

if($onamae=='')
{
    print 'お名前が入力されていません。<br/><br/>';
    $okflag=false;
}
else
{
    print '<div class="caption">お名前</div>';
    print $onamae;
    print '<br/><br/>';

}

if(preg_match('/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/',$email)==0)
{
    print 'メールアドレスを正確に入力してください。<br/><br/>';
    $okflag=false;
}
else
{
    print '<div class="caption">メールアドレス</div>';
    print $email;
    print '<br/><br/>';

}

if(preg_match('/\A[0-9]+\z/',$postal1)==0)
{
    print '郵便番号は半角数字で入力してください。<br/><br/>';
    $okflag=false;
}
else
{
    print '<div class="caption">郵便番号</div>';
    print $postal1;
    print '-';
    print $postal2;
    print '<br/><br/>';

}

if(preg_match('/\A[0-9]+\z/',$postal2)==0)
{
    print '郵便番号は半角数字で入力してください。<br/><br/>';
    $okflag=false;
}

if($address=='')
{
    print '住所が入力されていません。<br/><br/>';
    $okflag=false;
}
else
{
    print '<div class="caption">住所</div>';
    print $address;
    print '<br/><br/>';

}

if(preg_match('/\A\d{2,5}-?\d{2,5}-?\d{4,5}\z/',$tel)==0)
{
    print '電話番号を正確に入力してください。<br/><br/>';
    $okflag=false;
}
else
{
    print '<div class="caption">電話番号</div>';
    print $tel;
    print '<br/><br/>';

}

if($chumon=='chumontouroku')
{
  if($pass=='')
  {
      print 'パスワードが入力されていません。<br/><br/>';
      $okflag=false;
  }

  if($pass1==$pass2)
  {
      print 'パスワードが一致しません。<br/><br/>';
      $okflag=false;
  }

  print '<div class="caption">性別</div>';
  if($danjo=='dan')
  {
      print '男性';
  }
  else
  {
      print '女性';
  }
  print '<br/><br/>';

  print '<div class="caption">生まれた年</div>';
  print $birth;
  print '年代';
  print '<br/><br/>';
}

if($okflag==true)
{
    print '<form method="post" action="shop_form_done.php">';
    print '<input type="hidden" name="onamae" value="'.$onamae.'">';
    print '<input type="hidden" name="email" value="'.$email.'">';
    print '<input type="hidden" name="postal1" value="'.$postal1.'">';
    print '<input type="hidden" name="postal2" value="'.$postal2.'">';
    print '<input type="hidden" name="address" value="'.$address.'">';
    print '<input type="hidden" name="tel" value="'.$tel.'">';
    print '<input type="hidden" name="chumon" value="'.$chumon.'">';
    print '<input type="hidden" name="pass" value="'.$pass.'">';
    print '<input type="hidden" name="danjo" value="'.$danjo.'">';
    print '<input type="hidden" name="birth" value="'.$birth.'">';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '<input type="submit" value="OK"><br/>';
    print '</form>';
}
else{
    print '<form>';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '</form>';
}

?>

</div>
</body>
</html>
