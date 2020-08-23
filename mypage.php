<?php

session_start();

// データベースの接続情報
define( 'DB_HOST', 'localhost');
define( 'DB_USER', 'root');
define( 'DB_PASS', '');
define( 'DB_NAME', 'baseball');

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

<body>

  <!-- header -->
  <?php include( $_SERVER['DOCUMENT_ROOT'] . '/header.php'); ?>

  <!-- Page Content -->
  <div class="container">

  <br><h4 class="userpage">個人情報</h4><br>
  
  <table class="table">
  <tbody>
    <tr>
      <td class="title">ユーザーネーム</td>
      <td class="content"></td>
    </tr>
    <tr>
      <td>名前</td>
      <td></td>
    </tr>
    <tr>
      <td>メールアドレス</td>
      <td></td>
    </tr>
    <tr>
      <td>パスワード</td>
      <td></td>
    </tr>
    <tr>
      <td>郵便番号</td>
      <td></td>
    </tr>
    <tr>
      <td>住所</td>
      <td></td>
    </tr>
    <tr>
      <td>住所2</td>
      <td></td>
    </tr>
  </tbody>
</table>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
