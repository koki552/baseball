<?php

// セッションの開始
session_start();

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$age = $_POST['age'];
$email = $_POST['email'];
$experience = $_POST['experience'];
// $position = $_POST['position[]'];
$comment = $_POST['comment'];

// 入力値をセッション変数に格納
$_SESSION['firstname'] = $firstname;
$_SESSION['lastname'] = $lastname;
$_SESSION['age'] = $age;
$_SESSION['email'] = $email;
$_SESSION['experience'] = $experience;
// $_SESSION['position[]'] = $position;
$_SESSION['comment'] = $comment;

$_SESSION['teamid'];

?>

<!DOCTYPE html>
<html lang="ja">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>登録内容</title>

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

<form action="submit_recruit.php" method="post">
<table class="table">
<tbody>
  <tr>
    <td>名前</td>
    <td><?php echo $firstname; ?><?php echo $lastname; ?></td>
  </tr>
  <tr>
    <td>年齢</td>
    <td><?php echo $age; ?></td>
  </tr>
  <tr>
    <td>メールアドレス</td>
    <td><?php echo $email; ?></td>
  </tr>
  <tr>
    <td>野球歴</td>
    <td><?php echo $experience; ?></td>
  </tr>
  <tr>
    <td>お問い合わせ内容</td>
    <td><?php echo $comment; ?></td>
  </tr>
</tbody>
</table>
<button type="button" class="btn btn-outline-secondary" onclick="history.back()">戻る</button>
<input type="submit" class="btn btn-outline-primary" name="btn_submit" value="登録">
</form>
</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.slim.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>