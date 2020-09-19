<?php

// セッションの開始
session_start();

// データベースの接続情報
define( 'DB_HOST', 'localhost');
define( 'DB_USER', 'root');
define( 'DB_PASS', '');
define( 'DB_NAME', 'baseball');

$teamid = $_GET['team_id'];
$_SESSION['teamid'] = $teamid;

// データベースに接続
$mysqli = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME);

// ログイン者の情報呼び出し
$sql = "SELECT id, firstname, lastname, username, email, zip, state, address1, address2, password, team, status FROM user WHERE email ='".$_SESSION['email']."'";
$res = $mysqli->query($sql);
if($res) {
  $user_array = $res->fetch_assoc();
}

// チーム情報呼び出し
$sql ="SELECT id, teamname, est, r_userid, r_firstname, r_lastname, c_firstname, c_lastname, s_firstname, s_lastname, member, age, pref, city, password FROM team WHERE id ='".$user_array['team']."'";
$res = $mysqli->query($sql);
if($res) {
  $team_array = $res->fetch_assoc();
}

// データベースの検索を閉じる
$mysqli->close();

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
    <br><h5 class="userpage">チーム情報 管理</h5><br>
    <table class="table">
      <tbody>
        <tr>
          <?php if( !empty( $team_array) ): ?>
            <td class="title">チーム名</td>
            <td class="content"><?php echo $team_array['teamname']; ?></td>
          <?php endif; ?>
        </tr>
        <tr>
        <?php if( !empty( $team_array) ): ?>
          <td>設立年</td>
          <td><?php echo $team_array['age']; ?></td>
        <?php endif; ?>
        </tr>
        <tr>
          <?php if( !empty( $team_array) ): ?>
            <td class>代表者名前</td>
            <td class><?php echo $team_array['r_firstname']; ?><?php echo $team_array['r_lastname']; ?></td>
          <?php endif; ?>
        </tr>
        <tr>
          <?php if( !empty( $team_array) ): ?>
            <td class>主将名前</td>
            <td class><?php echo $team_array['c_firstname']; ?><?php echo $team_array['c_lastname']; ?></td>
          <?php endif; ?>
        </tr>            <tr>
          <?php if( !empty( $team_array) ): ?>
            <td class>副将名前</td>
            <td class><?php echo $team_array['s_firstname']; ?><?php echo $team_array['s_lastname']; ?></td>
          <?php endif; ?>
        </tr>
        <tr>
        <?php if( !empty( $team_array) ): ?>
          <td>チーム人数</td>
          <td><?php echo $team_array['member']; ?></td>
        <?php endif; ?>
        </tr>
        <tr>
          <?php if( !empty( $team_array) ): ?>
            <td>チーム平均年齢</td>
            <td><?php echo $team_array['age']; ?></td>
            <?php endif; ?>
          </tr>
          <tr>
            <?php if( !empty( $team_array) ): ?>
              <td>活動場所</td>
              <td><?php echo $team_array['pref']; ?><?php echo $team_array['city']; ?></td>
              <?php endif; ?>
            </tr>
            <tr>
              <td>チーム成績</td>
              <td><a href="./teamScore.php">入力画面へ</a></td>
            </tr>
            <tr>
                <td>入団希望者</td>
                <td><a href="./recruit_catalog.php">確認する</a></td>
            </tr>
          </tbody>
    </table>
    
    <button type="button" class="btn btn-outline-secondary">編集</button>
    
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
 </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>