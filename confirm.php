<?php
// セッションの開始
session_start();

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];
$zip = $_POST['zip'];
$state = $_POST['state'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$password = $_POST['password'];
$team = 0;

// 入力値をセッション変数に格納
$_SESSION['firstname'] = $firstname;
$_SESSION['lastname'] = $lastname;
$_SESSION['username'] = $username;
$_SESSION['email'] = $email;
$_SESSION['zip'] = $zip;
$_SESSION['state'] = $state;
$_SESSION['address1'] = $address1;
$_SESSION['address2'] = $address2;
$_SESSION['password'] = $password;
$_SESSION['team'] = $team;

?>

<!DOCTYPE html>
<html lang="ja">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>個人情報</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<style>
  .title{
    width: 30%;
  }
  .content{
    width: 70%;
  }
  a {
    padding-left: 20px;
  }
  .userpage{
    text-align: center;
  }
</style>

<!-- Page Content -->
<div class="container">

<br><h4 class="userpage">個人情報</h4><br>

<form action="submit.php" method="post">
<table class="table">
<tbody>
  <tr>
    <td class="title">ユーザーネーム</td>
    <td class="content"><?php echo $username; ?></td>
  </tr>
  <tr>
    <td>名前</td>
    <td><?php echo $firstname; ?><?php echo $lastname; ?></td>
  </tr>
  <tr>
    <td>メールアドレス</td>
    <td><?php echo $email; ?></td>
  </tr>
  <tr>
    <td>パスワード</td>
    <td><?php echo $password; ?></td>
  </tr>
  <tr>
    <td>郵便番号</td>
    <td><?php echo $zip; ?></td>
  </tr>
  <tr>
    <td>住所</td>
    <td><?php echo $address1; ?></td>
  </tr>
  <tr>
    <td>住所2</td>
    <td><?php echo $address2; ?></td>
  </tr>
</tbody>
</table>
<button type="button" class="btn btn-outline-secondary" onclick="history.back()">戻る</button>
<input type="submit" class="btn btn-outline-primary" name="btn_submit" onClick="location.href='mypage.php?todo_id=<?php echo $value['id'];?>'" value="登録">
</form>
</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.slim.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>