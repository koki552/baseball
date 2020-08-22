<!doctype html>
<html lang="ja" >
  <head>
    <title>会員登録</title>
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
.navbar navbar-expand-lg navbar-dark bg-dark static-top {
  position: fixed;
}
</style>

 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="http://localhost/baseball/home.php">BASEBALL</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/baseball/signin.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <!-- <h2>Checkout form</h2> -->
    <h2>会員登録</h2>
    <!-- <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p> -->
    <p class="lead"></p>
  </div>

    <div class="col-md-8 order-md-1">
      <!-- <h4 class="mb-3">Billing address</h4> -->
      <h4 class="mb-3"></h4>
      <h7><span class="must">※</span>の付いている項目は必ず入力してください</h7>
  
      <form action="confirm.php" method="post" class="needs-validation" novalidate>

        <div class="row">
          <div class="col-md-6 mb-3">
            <!-- <label for="firstName">First name</label> -->
            <label for="firstName">名字<span class="must">※</span></label>
            <input type="text" class="form-control" id="firstName" name="firstname" placeholder="" value="" required>
            <div class="invalid-feedback">
              <!-- Valid first name is required. -->
              名字を入力してください。
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <!-- <label for="lastName">Last name</label> -->
            <label for="lastName">名前<span class="must">※</span></label>
            <input type="text" class="form-control" id="lastName" name="lastname" placeholder="" value="" required>
            <div class="invalid-feedback">
              <!-- Valid last name is required. -->
              名前を入力してください。
            </div>
          </div>
        </div>

        <div class="mb-3">
          <!-- <label for="username">Username</label> -->
          <label for="username">ユーザーネーム<span class="must">※</span></label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            <div class="invalid-feedback" style="width: 100%;">
              <!-- Your username is required. -->
              ユーザーネームを入力してください。
            </div>
          </div>
        </div>

        <div class="mb-3">
          <!-- <label for="email">Email <span class="text-muted">(Optional)</span></label> -->
          <label for="email">メールアドレス<span class="must">※</span><span class="text-muted">（オプション）</span></label>
          <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
          <div class="invalid-feedback">
            <!-- Please enter a valid email address for shipping updates. -->
            有効なメールアドレスを入力してください。
          </div>
        </div>

        <div class="row">
          <div class="col-md-5 mb-3">
            <!-- <label for="zip">Zip</label> -->
            <label for="zip">郵便番号<span class="must">※</span></label>
            <input type="text" class="form-control" id="zip" name="zip" placeholder="" onKeyUp="AjaxZip3.zip2addr('zip', '', 'state', 'address1');" required>
            <div class="invalid-feedback">
              <!-- Zip code required. -->
              郵便番号を入力してください。
            </div>
          </div>

          <div class="col-md-7 mb-3">
            <!-- <label for="state">State</label> -->
            <label for="state">都道府県<span class="must">※</span></label>
            <select class="custom-select d-block w-100" id="state" name="state" required>
              <!-- <option value="">Choose...</option> -->
              <option value="">選択してください</option>
              <!-- <option>California</option> -->
              <option value="北海道">北海道</option>
              <option value="青森県">青森県</option>
              <option value="岩手県">岩手県</option>
              <option value="宮城県">宮城県</option>
              <option value="秋田県">秋田県</option>
              <option value="山形県">山形県</option>
              <option value="福島県">福島県</option>
              <option value="茨城県">茨城県</option>
              <option value="栃木県">栃木県</option>
              <option value="群馬県">群馬県</option>
              <option value="埼玉県">埼玉県</option>
              <option value="千葉県">千葉県</option>
              <option value="東京都">東京都</option>
              <option value="神奈川県">神奈川県</option>
              <option value="新潟県">新潟県</option>
              <option value="富山県">富山県</option>
              <option value="石川県">石川県</option>
              <option value="福井県">福井県</option>
              <option value="山梨県">山梨県</option>
              <option value="長野県">長野県</option>
              <option value="岐阜県">岐阜県</option>
              <option value="静岡県">静岡県</option>
              <option value="愛知県">愛知県</option>
              <option value="三重県">三重県</option>
              <option value="滋賀県">滋賀県</option>
              <option value="京都府">京都府</option>
              <option value="大阪府">大阪府</option>
              <option value="兵庫県">兵庫県</option>
              <option value="奈良県">奈良県</option>
              <option value="和歌山県">和歌山県</option>
              <option value="鳥取県">鳥取県</option>
              <option value="島根県">島根県</option>
              <option value="岡山県">岡山県</option>
              <option value="広島県">広島県</option>
              <option value="山口県">山口県</option>
              <option value="徳島県">徳島県</option>
              <option value="香川県">香川県</option>
              <option value="愛媛県">愛媛県</option>
              <option value="高知県">高知県</option>
              <option value="福岡県">福岡県</option>
              <option value="佐賀県">佐賀県</option>
              <option value="長崎県">長崎県</option>
              <option value="熊本県">熊本県</option>
              <option value="大分県">大分県</option>
              <option value="宮崎県">宮崎県</option>
              <option value="鹿児島県">鹿児島県</option>
              <option value="沖縄県">沖縄県</option>
            </select>
            <div class="invalid-feedback">
              <!-- Please provide a valid state. -->
              有効な都道府県を入力してください。
            </div>
          </div>
        </div>

        <div class="mb-3">
          <!-- <label for="address">Address</label> -->
          <label for="address">住所<span class="must">※</span></label>
          <!-- <input type="text" class="form-control" id="address" placeholder="1234 Main St" required> -->
          <input type="text" class="form-control" id="address" name="address1" placeholder="東京都千代田区千代田1-1" required>
          <div class="invalid-feedback">
            <!-- Please enter your shipping address. -->
            住所を入力してください。
          </div>
        </div>

        <div class="mb-3">
          <!-- <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label> -->
          <label for="address2">住所2 <span class="text-muted">（オプション）</span></label>
          <!-- <input type="text" class="form-control" id="address2" placeholder="Apartment or suite"> -->
          <input type="text" class="form-control" id="address2" name="address2" placeholder="アパートやマンション名">
        </div>

        <div class="form-group">
          <label for="passwd">パスワード<span class="must">※</span></label>
          <input type="password" id="passwd" name="password" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="passwd">パスワード（確認）<span class="must">※</span></label>
          <input type="password" id="passwd" name="passwordConfirm" class="form-control" required>
        </div>

        <input type="submit" class="btn btn-outline-primary" name="btn_submit" onClick="location.href='mypage.php?todo_id=<?php echo $value['id'];?>'" value="登録">
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

<script>
  var form = document.forms[0];
  form.onsubmit = function() {
    // エラーメッセージをクリアする
    form.password.setCustomValidity("");
    // パスワードの一致確認
    if (form.password.value != form.passwordConfirm.value) {
      // 一致していなかったら、エラーメッセージを表示する
      form.password.setCustomValidity("パスワードと確認用パスワードが一致しません");
    }
  };
  // 入力値チェックエラーが発生したときの処理
  form.addEventListener("invalid", function() {
    document.getElementById("errorMessage").innerHTML = "入力値にエラーがあります";
  }, false);
</script>
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