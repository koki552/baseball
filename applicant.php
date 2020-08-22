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
    $sql = "SELECT `id`, `firstname`, `lastname`, `age`, `email`, `experience`, `comment` FROM `recruit`";
    $res = $mysqli->query($sql);

    if($res) {
        $applicant_array = $res->fetch_all(MYSQLI_ASSOC);
    }

    $mysqli->close();
}

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

    <table class="table">
    <tbody>
      <tr>
        <?php if( !empty( $applicant_array) ): ?>
        <?php foreach( $applicant_array as $value ): ?>
        <tr></tr>
        <td><?php echo "<a href="."recruit_u.php?recruit_id=$value[id]".">$value[firstname]</a>"; ?></td>
        <?php endforeach; ?>
        <?php endif; ?>
      </tr>
    </tbody>
    </table>

  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>