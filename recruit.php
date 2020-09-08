<?php

// セッションの開始
session_start();

// データベースの接続情報
define( 'DB_HOST', 'localhost');
define( 'DB_USER', 'root');
define( 'DB_PASS', '');
define( 'DB_NAME', 'baseball');

$teamid = $_GET['team_id'];
$_SESSION['teamid'] = $teamid;

// データベースに接続
$mysqli = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME);

$sql = "SELECT id, firstname, lastname, username, email, zip, state, address1, address2, password, team, status FROM user WHERE email ='".$_SESSION['email']."'";
$res = $mysqli->query($sql);
if($res) {
  $user_array = $res->fetch_assoc();
}

$mysqli->close();

?>

<!doctype html>
<html lang="ja" >
  <head>
    <title>チーム応募</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <link href="form-validation.css" rel="stylesheet">
    <link href="../example.css" rel="stylesheet">
  </head>
  <body class="bg-light" >
    <a id="skippy" class="sr-only sr-only-focusable" href="#content">
  <div class="container">
    <span class="skiplink-text">Skip to main content</span>
  </div>
</a>
<style>
.col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto{
  margin-right: auto;
  margin-left: auto;
}
.must {
  color: #e00;
  font-weight: normal;
  padding: 0 0 0 2px;
  font-family: "メイリオ", "ＭＳ Ｐゴシック", Osaka, "ヒラギノ角ゴ Pro W3";
}
</style>

<body>

  <!-- header -->
  <?php include( $_SERVER['DOCUMENT_ROOT'] . '/baseball/header.php'); ?>

  <div class="container">
  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <!-- <h2>Checkout form</h2> -->
    <h2>チーム応募</h2>
    <!-- <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p> -->
    <p class="lead"></p>
  </div>

    <div class="col-md-8 order-md-1">
      <!-- <h4 class="mb-3">Billing address</h4> -->
      <h4 class="mb-3"></h4>
      <h7><span class="must">※</span>の付いている項目は必ず入力してください</h7>
  
      <form action="confirm_recruit.php" method="post" class="needs-validation" novalidate>

        <div class="row">
          <div class="col-md-6 mb-3">
            <!-- <label for="firstName">First name</label> -->
            <label for="firstName">名字<span class="must">※</span></label>
            <input type="text" class="form-control" id="firstName" name="firstname" placeholder="" value="<?php echo $user_array['firstname']?>" required>
            <div class="invalid-feedback">
              <!-- Valid first name is required. -->
              名字を入力してください。
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <!-- <label for="lastName">Last name</label> -->
            <label for="lastName">名前<span class="must">※</span></label>
            <input type="text" class="form-control" id="lastName" name="lastname" placeholder="" value="<?php echo $user_array['lastname']?>" required>
            <div class="invalid-feedback">
              <!-- Valid last name is required. -->
              名前を入力してください。
            </div>
          </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">年齢<span class="must">※</span></label>
            <select class="form-control" id="exampleFormControlSelect1" name="age" required>
            <option value="">選択してください</option>
            <option value="20歳未満">20歳未満</option>
            <option value="20-29歳">20-29歳</option>
            <option value="30-39歳">30-39歳</option>
            <option value="40-49歳">40-49歳</option>
            <option value="50-59歳">50-59歳</option>
            <option value="60-69歳">60-69歳</option>
            <option value="70-79歳">70-79歳</option>
            <option value="80歳以上">80歳以上</option>
            </select>
        </div>

        <div class="mb-3">
          <!-- <label for="email">Email <span class="text-muted">(Optional)</span></label> -->
          <label for="email">メールアドレス<span class="must">※</span><span class="text-muted">（オプション）</span></label>
          <input type="email" class="form-control" id="email" name="email" placeholder="" value="<?php echo $user_array['email']?>" required>
          <div class="invalid-feedback">
            <!-- Please enter a valid email address for shipping updates. -->
            有効なメールアドレスを入力してください。
          </div>
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">野球歴<span class="must">※</span></label>
          <input class="form-control" type="text" name="experience" placeholder="小中高9年間" required>
        </div>

        <!-- <div class="form-group">
        <label for="exampleFormControlTextarea1">ポジション<span class="must">※</span></label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="position[]" id="inlineCheckbox1" value="option1">
          <label class="form-check-label" for="inlineCheckbox1">ピッチャー</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="position[]"  id="inlineCheckbox2" value="option2">
          <label class="form-check-label" for="inlineCheckbox2">キャッチャー</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="position[]"  id="inlineCheckbox3" value="option3">
          <label class="form-check-label" for="inlineCheckbox3">内野手</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="position[]"  id="inlineCheckbox3" value="option4">
          <label class="form-check-label" for="inlineCheckbox4">外野手</label>
        </div>
        </div> -->

        <div class="form-group">
          <label for="exampleFormControlTextarea1">お問い合わせ内容</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>
        </div>

        <input type="submit" class="btn btn-outline-primary" name="btn_submit" value="送信">
      </form>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-2018 Company Name</p>
    <ul class="list-inline">
      <!-- <li class="list-inline-item"><a href="#">Privacy</a></li> -->
      <li class="list-inline-item"><a href="#">プライバシー</a></li>
      <!-- <li class="list-inline-item"><a href="#">Terms</a></li> -->
      <li class="list-inline-item"><a href="#">利用規約</a></li>
      <!-- <li class="list-inline-item"><a href="#">Support</a></li> -->
      <li class="list-inline-item"><a href="#">サポート</a></li>
    </ul>
  </footer>
</div>

</body>

<script src="../../assets/js/vendor/holder.min.js"></script>
<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict';

    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');

      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>
  window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery-slim.min.js"><\/script>')
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script><script src="/docs/4.5/assets/js/vendor/anchor.min.js"></script>
<script src="/docs/4.5/assets/js/vendor/clipboard.min.js"></script>
<script src="/docs/4.5/assets/js/vendor/bs-custom-file-input.min.js"></script>
<script src="/docs/4.5/assets/js/src/application.js"></script>
<script src="/docs/4.5/assets/js/src/search.js"></script>
<script src="/docs/4.5/assets/js/src/ie-emulation-modes-warning.js"></script>
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
  </body>
</html>