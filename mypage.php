<?php

// データベースの接続情報
define( 'DB_HOST', 'localhost');
define( 'DB_USER', 'root');
define( 'DB_PASS', '');
define( 'DB_NAME', 'baseball');

// タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');

session_start();

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

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="http://localhost/baseball/home.php">BASEBALL</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/baseball/signin.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

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
