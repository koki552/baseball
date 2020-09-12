<?php

// セッションの開始
session_start();

// データベースの接続情報
define( 'DB_HOST', 'localhost');
define( 'DB_USER', 'root');
define( 'DB_PASS', '');
define( 'DB_NAME', 'baseball');

$recruitid = $_GET['recruit_id'];

// データベースに接続
$mysqli = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME);

// ログイン者の情報呼び出し
$sql = "SELECT id, firstname, lastname, age, email, experience, comment, user_id, team_id, status FROM recruit WHERE id = $recruitid";
$res = $mysqli->query($sql);
if($res) {
  $recruit_array = $res->fetch_assoc();
}


$sql= "SELECT id, firstname, lastname, username, email, zip, state, address1, address2, password, team, status FROM user WHERE id = $recruit_array[user_id]";
$res = $mysqli->query($sql);
if($res) {
  $user_array = $res->fetch_assoc();
}


if ( isset($_POST['btn_submit']) ) {
  $sql = "UPDATE user SET status = 1 WHERE $user_array[id] = $recruit_array[user_id]";
  $res = $mysqli->query($sql);
  $sql = "UPDATE recruit SET status = 1 WHERE id = $recruitid";
  $res = $mysqli->query($sql);
  header("Location: ./recruit_catalog.php");
}      

// データベースの検索を閉じる
$mysqli->close();

?>

<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>応募者リスト</title>
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
  <!-- Page Content -->
  <div class="container">

  <br><h4 class="userpage">個人情報</h4><br>
  
  <form method="post">
    <table class="table">
    <tbody>
      <tr>
        <?php if( !empty( $recruit_array) ): ?>
        <td>名前</td>
        <td><?php echo $recruit_array['firstname']; ?><?php echo $recruit_array['lastname']; ?></td>
        <?php endif; ?>
      </tr>
      <tr>
        <?php if( !empty( $recruit_array) ): ?>
        <td>年齢</td>
        <td><?php echo $recruit_array['age']; ?></td>
        <?php endif; ?>
      </tr>
      <tr>
        <?php if( !empty( $recruit_array) ): ?>
        <td>メールアドレス</td>
        <td><?php echo $recruit_array['email']; ?></td>
        <?php endif; ?>
      </tr>
      <tr>
        <?php if( !empty( $recruit_array) ): ?>
        <td>野球歴</td>
        <td><?php echo $recruit_array['experience']; ?></td>
        <?php endif; ?>
      </tr>
      <tr>
        <?php if( !empty( $recruit_array) ): ?>
        <td>お問い合わせ内容</td>
        <td><?php echo $recruit_array['comment']; ?></td>
        <?php endif; ?>
      </tr>
    </tbody>
    </table>
    <button type="button" class="btn btn-outline-secondary" onclick="history.back()">戻る</button>
    <input type="submit" class="btn btn-outline-primary" name="btn_submit" value="確認">
  </form>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>