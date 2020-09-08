<?php

// セッションの開始
session_start();

$teamname = htmlspecialchars( $_SESSION['teamname'], ENT_QUOTES);
$est = htmlspecialchars( $_SESSION['est'], ENT_QUOTES);
$r_firstname = htmlspecialchars( $_SESSION['r_firstname'], ENT_QUOTES);
$r_lastname = htmlspecialchars( $_SESSION['r_lastname'], ENT_QUOTES);
$c_firstname = htmlspecialchars( $_SESSION['c_firstname'], ENT_QUOTES);
$c_lastname = htmlspecialchars( $_SESSION['c_lastname'], ENT_QUOTES);
$s_firstname = htmlspecialchars( $_SESSION['s_firstname'], ENT_QUOTES);
$s_lastname = htmlspecialchars( $_SESSION['s_lastname'], ENT_QUOTES);
$member = htmlspecialchars( $_SESSION['member'], ENT_QUOTES);
$age = htmlspecialchars( $_SESSION['age'], ENT_QUOTES);
$pref = htmlspecialchars( $_SESSION['pref'], ENT_QUOTES);
$city = htmlspecialchars( $_SESSION['city'], ENT_QUOTES);
$password = password_hash($_SESSION['password'], PASSWORD_DEFAULT);

// データベースの接続情報
define( 'DB_HOST', 'localhost');
define( 'DB_USER', 'root');
define( 'DB_PASS', '');
define( 'DB_NAME', 'baseball');

// データベースに接続
$mysqli = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME);

// ログイン者の情報呼び出し
$sql = "SELECT id, firstname, lastname, username, email, zip, state, address1, address2, password, team, status FROM user WHERE email ='".$_SESSION['email']."'";
$res = $mysqli->query($sql);
if($res) {
  $user_array = $res->fetch_assoc();
}


// チーム情報登録、ログイン者のid登録
// データを登録するSQL作成
$sql = "INSERT INTO team (teamname, est, r_userid, r_firstname, r_lastname, c_firstname, c_lastname, s_firstname, s_lastname, member, age, pref, city, password ) VALUES ('".$teamname."', '".$est."', '".$user_array['id']."', '".$r_firstname."', '".$r_lastname."', '".$c_firstname."', '".$c_lastname."', '".$s_firstname."', '".$s_lastname."', '".$member."', '".$age."', '".$pref."', '".$city."', '".$password."')";
// データを登録
$res = $mysqli->query($sql);


// チーム情報呼び出し
$sql ="SELECT `id`, `teamname`, `est`, `r_userid`, `r_firstname`, `r_lastname`, `c_firstname`, `c_lastname`, `s_firstname`, `s_lastname`, `member`, `age`, `pref`, `city`, `password` FROM `team` WHERE r_userid ='".$user_array['id']."'";
$res = $mysqli->query($sql);
if($res) {
  $team_array = $res->fetch_assoc();
}


// userテーブルにteam_id登録
$sql = "UPDATE `user` SET `team` = '".$team_array['id']."' WHERE email = '".$_SESSION['email']."' ";
$res = $mysqli->query($sql);


// statusを1に変更
$sql = "UPDATE `user` SET `status` = 1 WHERE email = '".$_SESSION['email']."' ";
$res = $mysqli->query($sql);
if($res) {
  header("Location: ./myteampage.php");
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

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.slim.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>