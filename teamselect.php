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
    <li class="breadcrumb-item active" aria-current="page">チームセレクト</li>
  </ol>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <br><h4><?php echo ($_SESSION['email']) . "様の登録情報"; ?>
    <br><h5 class="userpage">会員登録情報</h5><br>
    
    <div class = "col-10">
      <h6>現在チームに所属していません</h6>
        <ul>
          <li><a href="./team.php">チームを作る </a></li>
          <li><a href="./teamcatalog.php">チームを探す </a></li>
        </ul>
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

  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>