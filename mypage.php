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

  $sql = "SELECT id, firstname, lastname, username, email, zip, state, address1, address2, password FROM user WHERE email ='".$_SESSION['email']."'";
  $res = $mysqli->query($sql);

  if($res) {
    $user_array = $res->fetch_assoc();
  }else {

      // データが読み込めなかったら一覧に戻る
      header("Location: ./home.php");
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
  a {
    padding-left: 20px;
  }
  .userpage{
    text-align: center;
  }
  .col-2 {
    float: left;
  }
  .col-10 {
    float: right;
  }
  .col-2 ul {
    list-style: none;
    padding: 0;
    text-align: center;
  }
  .col-2 h5 {
    text-align: center;
  }
  .sidebar_li {
    padding: 5px 0;
    color: #646464;
  }
</style>

<body>

  <!-- header -->
  <?php include( $_SERVER['DOCUMENT_ROOT'] . '/baseball/header.php'); ?>

  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://localhost/baseball/home.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">My Page</li>
  </ol>
  </nav>

<!-- Page Content -->
<div class="container">
    <br><h4><?php echo ($_SESSION['email']) . "様の登録情報"; ?>
    <br><h5 class="userpage">会員登録情報</h5><br>
  
      <div class = "col-10">
        <table class="table">
          <tbody>
            <tr>
              <?php if( !empty( $user_array) ): ?>
                <td class="title">ユーザーネーム</td>
                <td class="content"><?php echo $user_array['username']; ?></td>
              <?php endif; ?>
            </tr>
            <tr>
              <?php if( !empty( $user_array) ): ?>
                <td class>名前</td>
                <td class><?php echo $user_array['firstname']; ?><?php echo $user_array['lastname']; ?></td>
              <?php endif; ?>
            </tr>
            <tr>
            <?php if( !empty( $user_array) ): ?>
              <td>メールアドレス</td>
              <td><?php echo ($_SESSION['email']); ?></td>
            <?php endif; ?>
            </tr>
            <tr>
            <?php if( !empty( $user_array) ): ?>
              <td>郵便番号</td>
              <td><?php echo $user_array['zip']; ?></td>
            <?php endif; ?>
            </tr>
            <tr>
              <?php if( !empty( $user_array) ): ?>
                <td>住所</td>
                <td><?php echo $user_array['address1']; ?></td>
                <?php endif; ?>
              </tr>
              <tr>
                <?php if( !empty( $user_array) ): ?>
                  <td>住所2</td>
                  <td><?php echo $user_array['address2']; ?></td>
                  <?php endif; ?>
                </tr>
                <tr>
                  <td>パスワード</td>
                  <td>セキュリティ保護のため、表示していません。</td>
                </tr>
              </tbody>
        </table>
      </div>

    <!-- sidebar -->
      <div class="col-2">
        <h5>会員登録情報</h5>
        <ul>
          <li><a class="sidebar_li" href="http://localhost/baseball/mypage.php">会員登録情報</a><li>
          <li><a class="sidebar_li" href="http://localhost/baseball/userscore.php">個人成績</a></li>
        </ul>
        <hr>
        <h5>チーム情報</h5>
        <ul>
          <li><a class="sidebar_li" href="http://localhost/baseball/myteam.php">マイチーム</a><li>
          <li><a class="sidebar_li" href="#">チーム成績</a></li>
        </ul>
      </div>
</div>
 
<!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
