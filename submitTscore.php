<?php

// セッションの開始
session_start();

$date = htmlspecialchars( $_SESSION['date'], ENT_QUOTES);
$opponent = htmlspecialchars( $_SESSION['opponent'], ENT_QUOTES);
$score = htmlspecialchars( $_SESSION['score'], ENT_QUOTES);
$Oscore = htmlspecialchars( $_SESSION['Oscore'], ENT_QUOTES);
$team_id = $_SESSION['teamid'];
$win = $_SESSION['win'];

// データベースの接続情報
define( 'DB_HOST', 'localhost');
define( 'DB_USER', 'root');
define( 'DB_PASS', '');
define( 'DB_NAME', 'baseball');

// データベースに接続
$mysqli = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME);

$sql = "INSERT INTO teamScore( date, opponent, score, Oscore, team_id, win ) VALUES ('".$date."', '".$opponent."', '".$score."', '".$Oscore."', '".$team_id."', '".$win."')";

// データを登録
$res = $mysqli->query($sql);

if ($res) {
  header("Location: ./mypage.php");
}

// データベースの検索を閉じる
$mysqli->close();

?>