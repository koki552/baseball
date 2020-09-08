<?php

// データベースの接続情報
define( 'DB_HOST', 'localhost');
define( 'DB_USER', 'root');
define( 'DB_PASS', '');
define( 'DB_NAME', 'baseball');

session_start();

if( !empty($_GET['team_id']) && empty($_POST['team_id'])) {

  $team_id = (int)htmlspecialchars($_GET['team_id'], ENT_QUOTES);
  
  // データベースに接続
  $mysqli = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME);

// 接続エラーの確認
if( $mysqli->connect_errno) {
  $error_message[] = 'データベースの接続に失敗しました。エラー番号 '.$mysqli->connect_errno.' : '.$mysqli->connect_error;
} else {

  // データの読み込み
  $sql = "SELECT * FROM team WHERE id = $team_id";
  $res = $mysqli->query($sql);

  if( $res ) {
      $team_array = $res->fetch_assoc();
  } else {

      // データが読み込めなかったら一覧に戻る
      header("Location: ./teamselect.php");
  }

  $mysqli->close();
 } 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>チーム情報</title>

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
  /* a {
    padding-left: 20px;
  } */

  .teampage{
    text-align: center;
  }
</style>

<body>

  <!-- Navigation -->
  <?php include('header.php'); ?>
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./home.php">Home</a></li>
    <li class="breadcrumb-item"><a href="./teamselect.php">チームセレクト</a></li>
    <li class="breadcrumb-item"><a href="./teamcatalog.php">チーム一覧</a></li>
    <li class="breadcrumb-item active" aria-current="page">チーム情報</li>
  </ol>
  </nav>

  <!-- Page Content -->
  <div class="container">

  <br><h4 class="teampage">チーム情報</h4><br>
  
  <table class="table">
  <tbody>
    <tr>
      <td class="title">チーム名</td>
      <?php if( !empty( $team_array) ): ?>
        <td class="content"><?php echo $team_array['teamname'] ?></td>
      <?php endif; ?>
    </tr>
    <tr>
      <td>設立年</td>
      <?php if( !empty( $team_array) ): ?>
        <td><?php echo $team_array['est'] ?></td>
      <?php endif; ?>
    </tr>
    <tr>
      <td>代表者指名</td>
      <?php if( !empty( $team_array) ): ?>
        <td><?php echo $team_array['r_firstname'] ?><?php echo $team_array['r_lastname'] ?></td>
      <?php endif; ?>
    </tr>
    <tr>
      <td>主将指名</td>
      <?php if( !empty( $team_array) ): ?>
       <td><?php echo $team_array['c_firstname'] ?><?php echo $team_array['c_lastname'] ?></td>
      <?php endif; ?>
    </tr>
    <tr>
      <td>副将指名</td>
      <?php if( !empty( $team_array) ): ?>
        <td><?php echo $team_array['s_firstname'] ?><?php echo $team_array['s_lastname'] ?></td>
      <?php endif; ?>
    </tr>
    <tr>
      <td>チーム人数</td>
      <?php if( !empty( $team_array) ): ?>
        <td><?php echo $team_array['member'] ?></td>
      <?php endif; ?>
    </tr>
    <tr>
      <td>チーム平均年齢</td>
      <?php if( !empty( $team_array) ): ?>
        <td><?php echo $team_array['age'] ?></td>
      <?php endif; ?>
    </tr>
    <tr>
      <td>活動場所</td>
      <?php if( !empty( $team_array) ): ?>
        <td><?php echo $team_array['pref'] ?><?php echo $team_array['city'] ?></td>
      <?php endif; ?>
    </tr>
    <tr>
      <?php if( !empty( $team_array) ): ?>
        <td>メンバー募集</td>
        <td>募集中<?php echo "<a href="."recruit.php?team_id=$team_array[id]".">入団希望者はこちら</a>"; ?></td>
      <?php endif; ?>
    </tr>
  </tbody>
</table>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
