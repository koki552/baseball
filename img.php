<?php

session_start();

// データベースの接続情報
define( 'DB_HOST', 'localhost');
define( 'DB_USER', 'root');
define( 'DB_PASS', '');
define( 'DB_NAME', 'baseball');

// タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');
// 書き込み日時を取得
$now_date = date("Y-m-d H:i:s");

// データベースに接続
$mysqli = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME);

$img_name = $_FILES['img']['name'];

//画像を保存
move_uploaded_file($_FILES['img']['tmp_name'], './upload/' . $img_name);

echo '<img src="img.php?img_name=' . $img_name . '">';


$sql = "SELECT id, firstname, lastname, username, email, zip, state, address1, address2, password, team, status FROM user WHERE email ='".$_SESSION['email']."'";
$res = $mysqli->query($sql);
if($res) {
    $user_array = $res->fetch_assoc();
  }


$sql ="INSERT INTO Timg (img, team_id, post_date) VALUES ('".$img_name."', $user_array[team], '".$now_date."')";
$res = $mysqli->query($sql);
if($res) {
    header("Location: ./home.php");
}

$mysqli->close();

?>