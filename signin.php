<?php

// データベースの接続情報
define( 'DB_HOST', 'localhost');
define( 'DB_USER', 'root');
define( 'DB_PASS', '');
define( 'DB_NAME', 'baseball');

// タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');

session_start();

//①エラーメッセージの初期状態を空に
$err_msg = "";

//②サブミットボタンが押されたときの処理
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
//③データが渡ってきた場合の処理
  try {
    $db = new PDO('mysql:host=localhost; dbname=baseball','root','');
    $sql = 'select count(*) from baseball where email=? and password=?';
    $stmt = $db->prepare($sql);
    $stmt->execute(array($email,$password));
    $result = $stmt->fetch();
    $stmt = null;
    $db = null;
//④ログイン認証ができたときの処理
    if ($result[0] != 0){
      header('Location: http://localhost/baseball/home.php');
    exit;
//⑤アカウント情報が間違っていたときの処理
    }else{
      $err_msg = "アカウント情報が間違っています。";
    }
//⑥データが渡って来なかったときの処理
  }catch (PDOExeption $e) {
    echo $e->getMessage();
    exit;
  }
}

?>

<!doctype html>
<html lang="ja" >
  <head>
    <title>Signin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <link href="signin.css" rel="stylesheet">
    <link href="../example.css" rel="stylesheet">
  </head>
  <body  class="text-center" >
    <a id="skippy" class="sr-only sr-only-focusable" href="#content">
  <div class="container">
    <span class="skiplink-text">Skip to main content</span>
  </div>
</a>

    <form method="post" class="form-signin">
  <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
  <!-- <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1> -->
  <h1 class="h3 mb-3 font-weight-normal">サインインする</h1>
  <!-- <label for="inputEmail" class="sr-only">Email address</label> -->
  <label for="inputEmail" class="sr-only">メールアドレス</label>
  <!-- <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus> -->
  <input type="email" id="inputEmail" class="form-control" name="email" placeholder="メールアドレス" required autofocus>
  <!-- <label for="inputPassword" class="sr-only">Password</label> -->
  <label for="inputPassword" class="sr-only">パスワード</label>
  <!-- <input type="password" id="inputPassword" class="form-control" placeholder="Password" required> -->
  <input type="password" id="inputPassword" class="form-control" name="password" placeholder="パスワード" required>
  <div class="checkbox mb-3">
    <label>
      <!-- <input type="checkbox" value="remember-me"> Remember me -->
      <input type="checkbox" value="remember-me"> 記憶する
    </label>
  </div>
  <!-- <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button> -->
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">サインイン</button>

  <a href="http://localhost/baseball/register.php">新しいアカウントを作成する</a>

  <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>
  window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery-slim.min.js"><\/script>')
</script><script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script><script src="/docs/4.5/assets/js/vendor/anchor.min.js"></script>
<script src="/docs/4.5/assets/js/vendor/clipboard.min.js"></script>
<script src="/docs/4.5/assets/js/vendor/bs-custom-file-input.min.js"></script>
<script src="/docs/4.5/assets/js/src/application.js"></script>
<script src="/docs/4.5/assets/js/src/search.js"></script>
<script src="/docs/4.5/assets/js/src/ie-emulation-modes-warning.js"></script>
  </body>
</html>
