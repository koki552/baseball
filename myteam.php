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

// 接続エラーの確認
if( $mysqli->connect_errno) {
    $error_message[] = 'データの読み込みに失敗しました。エラー番号 '.$mysqli->connect_errno.' : '.$mysqli->connect_error;
  } else {
  
    $sql = "SELECT id, firstname, lastname, username, email, zip, state, address1, address2, password, team FROM user WHERE email ='".$_SESSION['email']."' and team = 0 ";
    $res = $mysqli->query($sql);
  
    if($res) {
      $myteam_array = $res->fetch_assoc();

    }else {
        // データが読み込めなかったらページ移動
        header("Location: ./mypage.php");
      }
      $mysqli->close();
  }



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
</style>

<body>

  <!-- header -->
  <?php include( $_SERVER['DOCUMENT_ROOT'] . '/baseball/header.php'); ?>

</body>