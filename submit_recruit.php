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
$teamid = $_SESSION['teamid'];
$status = 0;

// データベースの接続情報
define( 'DB_HOST', 'localhost');
define( 'DB_USER', 'root');
define( 'DB_PASS', '');
define( 'DB_NAME', 'baseball');

// データベースに接続
$mysqli = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME);

// recruit登録者をuserテーブルから情報呼び出し
$sql = "SELECT id, firstname, lastname, username, email, zip, state, address1, address2, password, team, status FROM user WHERE email ='".$_SESSION['email']."'";
$res = $mysqli->query($sql);
if($res) {
  $user_array = $res->fetch_assoc();
  }

// データベースrecruitに登録
$sql = "INSERT INTO recruit(firstname, lastname, age, email, experience, comment, user_id, team_id, status) VALUES ('".$firstname."', '".$lastname."', '".$age."', '".$email."', '".$experience."', '".$comment."', $user_array[id], '".$teamid."', '".$status."')";
$res = $mysqli->query($sql);

// team仮登録
$sql ="UPDATE user SET team = $teamid WHERE email = '".$_SESSION['email']."'";
$res = $mysqli->query($sql);

if ($res) {
  header("Location: ./myteam.php");
}

// データベースの検索を閉じる
$mysqli->close();

?>