<?php

// セッションの開始
session_start();

$_SESSION['date'];
$_SESSION['bat_1'] = $_POST['bat_1'];
$_SESSION['sb_1'] = $_POST['sb_1'];
$_SESSION['rbi_1'] = $_POST['rbi_1'];
$_SESSION['bat_2'] = $_POST['bat_2'];
$_SESSION['sb_2'] = $_POST['sb_2'];
$_SESSION['rbi_2'] = $_POST['rbi_2'];
$_SESSION['bat_3'] = $_POST['bat_3'];
$_SESSION['sb_3'] = $_POST['sb_3'];
$_SESSION['rbi_3'] = $_POST['rbi_3'];
$_SESSION['bat_4'] = $_POST['bat_4'];
$_SESSION['sb_4'] = $_POST['sb_4'];
$_SESSION['rbi_4'] = $_POST['rbi_4'];
$_SESSION['bat_5'] = $_POST['bat_5'];
$_SESSION['sb_5'] = $_POST['sb_5'];
$_SESSION['rbi_5'] = $_POST['rbi_5'];

$_SESSION['email'];

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
    /* a {
    padding-left: 20px;
  } */
  .userpage{
    text-align: center;
  }
  .col-2 {
    float: left;
    margin-top: 80px;
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

.col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto{
  margin-right: auto;
  margin-left: auto;
}

.must {
  color: #e00;
  font-weight: normal;
  padding: 0 0 0 2px;
  font-family: "メイリオ", "ＭＳ Ｐゴシック", Osaka, "ヒラギノ角ゴ Pro W3";
}
.navbar navbar-expand-lg navbar-dark bg-dark static-top {
  position: fixed;
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
    <div class = "col-10">
        <br><h5 class="userpage">チーム成績 入力</h5><br>
        <form action="submitUscore.php" method="post" class="needs-validation" novalidate>
        
        <table class="table">
        <table class="table">
       <tr>
        <th>打席</th>
        <th>内容</th>
        <th>盗塁</th>
        <th>打点</th>
       </tr>
       <tr>
        <td>1打席目</td>
        <td><?php echo $_SESSION['bat_1']; ?></td>
        <td><?php echo $_SESSION['sb_1']; ?></td>
        <td><?php echo $_SESSION['rbi_1']; ?></td>
       </tr>
       <tr>
        <td>2打席目</td>
        <td><?php echo $_SESSION['bat_2']; ?></td>
        <td><?php echo $_SESSION['sb_2']; ?></td>
        <td><?php echo $_SESSION['rbi_2']; ?></td>
       </tr>
       <tr>
        <td>3打席目</td>
        <td><?php echo $_SESSION['bat_3']; ?></td>
        <td><?php echo $_SESSION['sb_3']; ?></td>
        <td><?php echo $_SESSION['rbi_3']; ?></td>
       </tr>
       <tr>
        <td>4打席目</td>
        <td><?php echo $_SESSION['bat_4']; ?></td>
        <td><?php echo $_SESSION['sb_4']; ?></td>
        <td><?php echo $_SESSION['rbi_4']; ?></td>
       </tr>
       <tr>
        <td>5打席目</td>
        <td><?php echo $_SESSION['bat_5']; ?></td>
        <td><?php echo $_SESSION['sb_5']; ?></td>
        <td><?php echo $_SESSION['rbi_5']; ?></td>
       </tr>
        </table>
        <button type="button" class="btn btn-outline-secondary" onclick="history.back()">戻る</button>
        <input type="submit" class="btn btn-outline-primary" name="btn_submit" value="登録">
    </form>
    
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