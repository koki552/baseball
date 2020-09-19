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
    <li class="breadcrumb-item active" aria-current="page">個人成績</li>
  </ol>
  </nav>

<div class="container">
<!-- Content here -->
  <br><h4><?php echo ($_SESSION['email']) . "様の登録情報"; ?>  
  <br><h5 class="userpage">個人成績入力</h5><br>

  <div class = "col-10">
    <h6>年度別成績</h6>
    <table cellpadding="0" cellspacing="0" class="table table-bordered">
      <tr>
        <th>年<br />度</th>
        <th>試<br />合</th>
        <th>打<br />席</th>
        <th>打<br />数</th>
        <th>得<br />点</th>
        <th>安<br />打</th>
        <th>二<br />塁<br />打</th>
        <th>三<br />塁<br />打</th>
        <th>本<br />塁<br />打</th>
        <th>塁<br />打</th>
        <th>打<br />点</th>
        <th>盗<br />塁</th>
        <th>盗<br />塁<br />刺</th>
        <th>犠<br />打</th>
        <th>犠<br />飛</th>
        <th>四<br />球</th>
        <th>死<br />球</th>
        <th>三<br />振</th>
        <th>併<br />殺<br />打</th>
        <th>打<br />率</th>
        <th>長<br />打<br />率</th>
        <th>出<br />塁<br />率</th>
      </tr>
    
    </table>
    <h6><a href="./userscoreInput.php">個人成績入力ページ</a></h6>
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
    
</body>