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

$sql = "SELECT id, firstname, lastname, username, email, zip, state, address1, address2, password, team, status FROM user WHERE email ='".$_SESSION['email']."'";
$res = $mysqli->query($sql);

if($res) {
    $user_array = $res->fetch_assoc();    
}else {
    // データが読み込めなかったらページ移動
    header("Location: ./mypage.php");
  }

// team情報呼び出し
$sql ="SELECT id, teamname, est, r_userid, r_firstname, r_lastname, c_firstname, c_lastname, s_firstname, s_lastname, member, age, pref, city, password FROM team WHERE id ='".$user_array['team']."'";
$res = $mysqli->query($sql);
if($res) {
  $team_array = $res->fetch_assoc();
}

  
  if($user_array['status'] == 0 and $user_array['team'] == 0 ) {
    header("Location: ./teamselect.php");
  }
  elseif($user_array['status'] == 0 and $user_array['team'] !== 0 ) {
    header("Location: ./teamUnsettled.php");
  } 
  elseif($user_array['status'] !== 0 and $user_array['team'] !== 0 and $user_array['id'] == $team_array['r_userid']) {
    header("Location: ./myTeampageMgt.php");
  }
  else {
    header("Location: ./myteampage.php");
  }
  
  $mysqli->close();

?>