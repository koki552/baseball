<?php

// セッションの開始
session_start();

?>

<!DOCTYPE html>
<html lang="ja">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>BASEBALL MY PAGE</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<style>
  a {
    padding-left: 20px;
  }
  .userpage{
    text-align: center;
  }
  .col-2 {
    float: left;
  }
  .col-10 {
    float: right;
  }
  .col-2 ul {
    list-style: none;
    padding: 0;
    text-align: center;
  }
  .col-2 h5 {
    text-align: center;
  }
  .sidebar_li {
    padding: 5px 0;
    color: #646464;
  }
</style>

<body>

  <!-- header -->
  <?php include( $_SERVER['DOCUMENT_ROOT'] . '/baseball/header.php'); ?>

  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://localhost/baseball/home.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">My Page</li>
  </ol>
  </nav>

<!-- Page Content -->
<div class="container">
    <br><h4><?php echo ($_SESSION['email']) . "様の登録情報"; ?>
    <br><h5 class="userpage">会員登録情報</h5><br>
  
      <div class = "col-10">
          <h6>先に試合結果を入力してください</h6><br>
      </div>

    <!-- sidebar -->
      <div class="col-2">
        <h5>会員登録情報</h5>
        <ul>
          <li><a class="sidebar_li" href="http://localhost/baseball/mypage.php">会員登録情報</a><li>
          <li><a class="sidebar_li" href="http://localhost/baseball/userscore.php">個人成績</a></li>
        </ul>
        <hr>
        <h5>チーム情報</h5>
        <ul>
          <li><a class="sidebar_li" href="http://localhost/baseball/myteam.php">マイチーム</a><li>
          <li><a class="sidebar_li" href="#">チーム成績</a></li>
        </ul>
      </div>
</div>
 
<!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
