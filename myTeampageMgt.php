<?php

// セッションの開始
session_start();

// データベースの接続情報
define( 'DB_HOST', 'localhost');
define( 'DB_USER', 'root');
define( 'DB_PASS', '');
define( 'DB_NAME', 'baseball');

// データベースに接続
$mysqli = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME);

// user情報呼び出し
$sql = "SELECT id, firstname, lastname, username, email, zip, state, address1, address2, password, team, status FROM user WHERE email ='".$_SESSION['email']."' and status =1";
$res = $mysqli->query($sql);
if($res) {
    $user_array = $res->fetch_assoc();
  }

// team情報呼び出し
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

  <title>BASEBALL MY TEAM PAGE</title>

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
    <li class="breadcrumb-item active" aria-current="page">My Team Page</li>
  </ol>
  </nav>

<!-- Page Content -->
<div class="container">
    <br><h4><?php echo ($_SESSION['email']) . "様の登録情報"; ?>
    <br><h5 class="userpage">チーム情報</h5><br>
  
      <div class = "col-10">
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
                  <td>パスワード</td>
                  <td>セキュリティ保護のため、表示していません。</td>
                </tr>
                </tbody>
              </table>
              <?php echo "<a href="."teammgt.php?team_id=$user_array[team]".">チーム管理ページ</a>"; ?>
              
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
