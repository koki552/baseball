<?php

// セッションの開始
session_start();

$firstname = htmlspecialchars( $_SESSION['firstname'], ENT_QUOTES);
$lastname = htmlspecialchars( $_SESSION['lastname'], ENT_QUOTES);
$age = htmlspecialchars( $_SESSION['age'], ENT_QUOTES);
$email = htmlspecialchars( $_SESSION['email'], ENT_QUOTES);
$experience = htmlspecialchars( $_SESSION['experience'], ENT_QUOTES);
// $position = htmlspecialchars( $_SESSION['position'], ENT_QUOTES);
$comment = htmlspecialchars( $_SESSION['comment'], ENT_QUOTES);

// データベースの接続情報
define( 'DB_HOST', 'localhost');
define( 'DB_USER', 'root');
define( 'DB_PASS', '');
define( 'DB_NAME', 'baseball');

// データベースに接続
$mysqli = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME);

// データを登録するSQL作成
$sql = "INSERT INTO `recruit`(`firstname`, `lastname`, `age`, `email`, `experience`, `comment`) VALUES ('".$firstname."', '".$lastname."', '".$age."', '".$email."', '".$experience."', '".$comment."')";

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
<p><a href="#"></a></p>
</body>
</html>
