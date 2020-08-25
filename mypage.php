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

// 接続エラーの確認
if( $mysqli->connect_errno) {
  $error_message[] = 'データの読み込みに失敗しました。エラー番号 '.$mysqli->connect_errno.' : '.$mysqli->connect_error;
} else {
  $sql = "SELECT `id`, `firstname`, `lastname`, `username`, `email`, `zip`, `state`, `address1`, `address2`, `password` FROM `user` WHERE `email`="$_SESSION['email']"";
  $res = $mysqli->query($sql);
  echo $sql;

  if($res) {
    $user_array = $res->fetch_all(MYSQLI_ASSOC);
    echo $sql;
  } 
    $mysqli->close();
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>BASEBALL MY PAGE</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<style>
  .title{
    width: 30%;
  }
  .content{
    width: 70%;
  }
  a {
    padding-left: 20px;
  }
  .userpage{
    text-align: center;
  }
</style>

<body>

  <!-- header -->
  <?php include( $_SERVER['DOCUMENT_ROOT'] . '/baseball/header.php'); ?>

<!-- Page Content -->
<div class="container">

  <br><h4 class="userpage">登録情報</h4><br>
  
  <table class="table">
  <tbody>
    <tr>
        <td class="title">ユーザーネーム</td>
        <td class="content"><?php echo $user_array['username']; ?></td>
    </tr>

    <tr>
      <?php if( !empty( $user_array) ): ?>
        <td class="title">名前</td>
        <td class="content"><?php echo $value['firstname']; ?></td>
      <?php endif; ?>
    </tr>
    <tr>
      <td>メールアドレス</td>
      <td><?php echo ($_SESSION['email']); ?></td>
    </tr>
    <tr>
      <td>パスワード</td>
      <td><?php echo ($_SESSION['password']); ?></td>
    </tr>
    <tr>
      <td>郵便番号</td>
      <td><?php echo ($_SESSION['zip']); ?></td>
    </tr>
    <tr>
      <td>住所</td>
      <td><?php echo ($_SESSION['address1']); ?></td>
    </tr>
    <tr>
      <td>住所2</td>
      <td><?php echo ($_SESSION['address2']); ?></td>
    </tr>
  </tbody>
  </table>
</div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
