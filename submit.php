<?php

// セッションの開始
session_start();

$firstname = htmlspecialchars( $_SESSION['firstname'], ENT_QUOTES);
$lastname = htmlspecialchars( $_SESSION['lastname'], ENT_QUOTES);
$username = htmlspecialchars( $_SESSION['username'], ENT_QUOTES);
$email = htmlspecialchars( $_SESSION['email'], ENT_QUOTES);
$zip = htmlspecialchars( $_SESSION['zip'], ENT_QUOTES);
$state = htmlspecialchars( $_SESSION['state'], ENT_QUOTES);
$address1 = htmlspecialchars( $_SESSION['address1'], ENT_QUOTES);
$address2 = htmlspecialchars( $_SESSION['address2'], ENT_QUOTES);
$password = password_hash($_SESSION['password'], PASSWORD_DEFAULT);
$team = $_SESSION['team'];
$status = $_SESSION['status'];

// データベースの接続情報
define( 'DB_HOST', 'localhost');
define( 'DB_USER', 'root');
define( 'DB_PASS', '');
define( 'DB_NAME', 'baseball');

// データベースに接続
$mysqli = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME);
 
// データを登録するSQL作成
$sql = "INSERT INTO `user`(`firstname`, `lastname`, `username`, `email`, `zip`, `state`, `address1`, `address2`, `password`, `team`, `status`) VALUES ('".$firstname."', '".$lastname."', '".$username."', '".$email."', '".$zip."', '".$state."', '".$address1."', '".$address2."', '".$password."', '".$team."', '".$status."')";

// データを登録
$res = $mysqli->query($sql);

if ($res) {
  header("Location: ./home.php");
}

// データベースの検索を閉じる
$mysqli->close();

?>