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
$email = htmlspecialchars( $_SESSION['email'], ENT_QUOTES);
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

// データを登録するSQL作成
$sql = "INSERT INTO `team` (`teamname`, `est`, `r_firstname`, `r_lastname`, `c_firstname`, `c_lastname`, `s_firstname`, `s_lastname`, `member`, `age`, `email`, `pref`, `city`, `password` ) VALUES ('".$teamname."', '".$est."', '".$r_firstname."', '".$r_lastname."', '".$c_firstname."', '".$c_lastname."', '".$s_firstname."', '".$s_lastname."', '".$member."', '".$age."', '".$email."', '".$pref."', '".$city."', '".$password."')";

// データを登録
$res = $mysqli->query($sql);

// データベースの検索を閉じる
$mysqli->close();

?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ユーザー登録フォーム・登録ページ</title>
<style>
p {
  margin-left: 50px;
}
</style>
</head>

<body>
<p>ご登録ありがとうございました。</p>
<p>ログインする</a></p>
</body>
</html>
