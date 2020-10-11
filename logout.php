<?php
session_start();
$output = '';

if (isset($_SESSION["email"])) {
  header( "Location: ./signup.php" ) ;
} else {
  header( "Location: ./signup.php" ) ;
}
//セッション変数のクリア
$_SESSION = array();
//セッションクッキーも削除
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
//セッションクリア
@session_destroy();

echo $output;