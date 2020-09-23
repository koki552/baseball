<?php

// セッションの開始
session_start();

$date = $_SESSION['date'];
$bat_1 = $_SESSION['bat_1'];
$sb_1 = $_SESSION['sb_1'];
$rbi_1 = $_SESSION['rbi_1'];
$bat_2 = $_SESSION['bat_2'];
$sb_2 = $_SESSION['sb_2'];
$rbi_2 = $_SESSION['rbi_2'];
$bat_3 = $_SESSION['bat_3'];
$sb_3 = $_SESSION['sb_3'];
$rbi_3 = $_SESSION['rbi_3'];
$bat_4 = $_SESSION['bat_4'];
$sb_4 = $_SESSION['sb_4'];
$rbi_4 = $_SESSION['rbi_4'];
$bat_5 = $_SESSION['bat_5'];
$sb_5 = $_SESSION['sb_5'];
$rbi_5 = $_SESSION['rbi_5'];
$email = $_SESSION['email'];

// データベースの接続情報
define( 'DB_HOST', 'localhost');
define( 'DB_USER', 'root');
define( 'DB_PASS', '');
define( 'DB_NAME', 'baseball');

// データベースに接続
$mysqli = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME);

$sql = "SELECT id, firstname, lastname, username, email, zip, state, address1, address2, password, team, status FROM user WHERE email = '".$email."'";
$res = $mysqli->query($sql);
if ($res) {
    $user_array = $res->fetch_assoc();
}


$sql = "INSERT INTO userScore (user_id, date, bat_1, sb_1, rbi_1, bat_2, sb_2, rbi_2, bat_3, sb_3, rbi_3, bat_4, sb_4, rbi_4, bat_5, sb_5, rbi_5) VALUES ('".$user_array['id']."', '".$date."', '".$bat_1."', '".$sb_1."', '".$rbi_1."', '".$bat_2."', '".$sb_2."', '".$rbi_2."', '".$bat_3."', '".$sb_3."', '".$rbi_3."', '".$bat_4."', '".$sb_4."', '".$rbi_4."', '".$bat_5."', '".$sb_5."', '".$rbi_5."')";
$res = $mysqli->query($sql);
if ($res) {
  header("Location: ./userscore.php");
}

// データベースの検索を閉じる
$mysqli->close();

?>