<?php

session_start();

// データベースの接続情報
define( 'DB_HOST', 'localhost');
define( 'DB_USER', 'root');
define( 'DB_PASS', '');
define( 'DB_NAME', 'baseball');

// データベースに接続
$mysqli = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME);

// 画像の表示
$sql ="SELECT id, img, team_id, post_date FROM img WHERE team_id = 32 ORDER BY post_date DESC LIMIT 1";
$res = $mysqli->query($sql);
if($res) {
    $img_array = $res->fetch_assoc();
  }

$img_name = $img_array['img'];
$img_dir = './upload/' . $img_name;
echo "<img src=\"$img_dir\">";

$mysqli->close();

?>