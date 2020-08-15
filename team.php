<?php

// データベースの接続情報
define( 'DB_HOST', 'localhost');
define( 'DB_USER', 'root');
define( 'DB_PASS', '');
define( 'DB_NAME', 'baseball');

// タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');

session_start();

// 投稿の登録
if( !empty($_POST['btn_submit']) ) {

    // チーム名の入力チェック
    if( empty($_POST['teamname']) ) {
      $error_message[] = '';
  } else {
      $teamname = htmlspecialchars( $_POST['teamname'], ENT_QUOTES);
  }

      // 設立年の入力チェック
    if( empty($_POST['est']) ) {
        $error_message[] = '';
  } else {
        $est = htmlspecialchars( $_POST['est'], ENT_QUOTES);
  }

    // 代表者名字の入力チェック
    if( empty($_POST['r_firstname']) ) {
        $error_message[] = '';
  } else {
        $r_firstname = htmlspecialchars( $_POST['r_firstname'], ENT_QUOTES);
  }

    // 代表者名前の入力チェック
    if( empty($_POST['r_lastname']) ) {
      $error_message[] = '';
  } else {
      $r_lastname = htmlspecialchars( $_POST['r_lastname'], ENT_QUOTES);
  }

      // 主将名字の入力チェック
    if( empty($_POST['c_firstname']) ) {
        $error_message[] = '';
  } else {
        $c_firstname = htmlspecialchars( $_POST['c_firstname'], ENT_QUOTES);
  }

    // 主将名前の入力チェック
    if( empty($_POST['c_lastname']) ) {
      $error_message[] = '';
  } else {
      $c_lastname = htmlspecialchars( $_POST['c_lastname'], ENT_QUOTES);
  }

    // 副将名字の入力チェック
    if( empty($_POST['s_firstname']) ) {
        $error_message[] = '';
  } else {
      $s_firstname = htmlspecialchars( $_POST['s_firstname'], ENT_QUOTES);
  }
  
    // 副将名前の入力チェック
    if( empty($_POST['s_lastname']) ) {
      $error_message[] = '';
  } else {
      $s_lastname = htmlspecialchars( $_POST['s_lastname'], ENT_QUOTES);
  }

    // チーム人数の入力チェック
    if( empty($_POST['member']) ) {
      $error_message[] = '';
  } else {
      $member = htmlspecialchars( $_POST['member'], ENT_QUOTES);
  }

    // チーム平均年齢の入力チェック
    if( empty($_POST['age']) ) {
      $error_message[] = '';
  } else {
    $age = htmlspecialchars( $_POST['age'], ENT_QUOTES);
  }

    // メールアドレスの入力チェック
    if( empty($_POST['email']) ) {
      $error_message[] = '';
  } else {
    $email = htmlspecialchars( $_POST['email'], ENT_QUOTES);
  }

    // 都道府県の入力チェック
    if( empty($_POST['pref']) ) {
      $error_message[] = '';
  } else {
      $pref = htmlspecialchars( $_POST['pref'], ENT_QUOTES);
  }

    // 住所の入力チェック
    if( empty($_POST['city']) ) {
      $error_message[] = '';
  } else {
      $city = htmlspecialchars( $_POST['city'], ENT_QUOTES);
  }

    // パスワードの入力チェック
    if( empty($_POST['password']) ) {
      $error_message[] = '';
  } else {
      $password = htmlspecialchars( $_POST['password'], ENT_QUOTES);
  }

  if( empty($error_message) ) {

   // データベースに接続
   $mysqli = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME);

   // 接続エラーの確認
   if( $mysqli->connect_errno) {
       $error_message[] = '書き込みに失敗しました。エラー番号 '.$mysqli->connect_errno.' : '.$mysqli->connect_error;
   } else {
       // 文字コード設定
       $mysqli->set_charset('utf8');

       // データを登録するSQL作成
       $sql = "INSERT INTO team (teamname, est, r_firstname, r_lastname, c_firstname, c_lastname, s_firstname, s_lastname, member, age, email, pref, city,  password) VALUES ('".$teamname."', '".$est."', '".$r_firstname."', '".$r_lastname."', '".$c_firstname."', '".$c_lastname."', '".$s_firstname."', '".$s_lastname."','".$member."', '".$age."', '".$email."', '".$pref."', '".$city."', '".$password."')";

       // データを登録
       $res = $mysqli->query($sql);

       // データベースの検索を閉じる
       $mysqli->close();

   }
  }
}
?>

<!doctype html>
<html lang="ja" >
  <head>
    <title>チーム登録</title>
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

  <div class="container">
  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <!-- <h2>Checkout form</h2> -->
    <h2>チーム登録</h2>
    <!-- <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p> -->
    <p class="lead"></p>
  </div>

    <div class="col-md-8 order-md-1">
      <!-- <h4 class="mb-3">Billing address</h4> -->
      <h4 class="mb-3"></h4>
      <h7><span class="must">※</span>の付いている項目は必ず入力してください</h7>

      <form method="post" class="needs-validation" novalidate>

        <div class="row">
          <div class="col-md-12 mb-3">
            <!-- <label for="firstName">First name</label> -->
            <label for="firstName">チーム名<span class="must">※</span></label>
            <input type="text" class="form-control" id="firstName" name="teamname" placeholder="" value="" required>
            <div class="invalid-feedback">
              <!-- Valid first name is required. -->
              チーム名を入力してください。
            </div>
          </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">設立年<span class="must">※</span></label>
            <select class="form-control" id="exampleFormControlSelect1" name="est" required>
            <option value="">設立年を選択してください</option>
            <option value="1990">1990</option>
            <option value="1991">1991</option>
            <option value="1992">1992</option>
            <option value="1993">1993</option>
            <option value="1994">1994</option>
            <option value="1995">1995</option>
            <option value="1996">1996</option>
            <option value="1997">1997</option>
            <option value="1998">1998</option>
            <option value="1999">1999</option>
            <option value="2000">2000</option>
            <option value="2001">2001</option>
            <option value="2002">2002</option>
            <option value="2003">2003</option>
            <option value="2004">2004</option>
            <option value="2005">2005</option>
            <option value="2006">2006</option>
            <option value="2007">2007</option>
            <option value="2008">2008</option>
            <option value="2009">2009</option>
            <option value="2010">2010</option>
            <option value="2011">2011</option>
            <option value="2012">2012</option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            <option value="2026">2026</option>
            <option value="2027">2027</option>
            <option value="2028">2028</option>
            <option value="2029">2029</option>
            <option value="2030">2030</option>
            </select>
        </div>    

        <div class="row">
          <div class="col-md-6 mb-3">
            <!-- <label for="firstName">First name</label> -->
            <label for="firstName">代表者名字<span class="must">※</span></label>
            <input type="text" class="form-control" id="firstName" name="r_firstname" placeholder="" value="" required>
            <div class="invalid-feedback">
              <!-- Valid first name is required. -->
              代表者名字を入力してください。
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <!-- <label for="lastName">Last name</label> -->
            <label for="lastName">代表者名前<span class="must">※</span></label>
            <input type="text" class="form-control" id="lastName" name="r_lastname" placeholder="" value="" required>
            <div class="invalid-feedback">
              <!-- Valid last name is required. -->
              代表者名前を入力してください。
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <!-- <label for="firstName">First name</label> -->
            <label for="firstName">主将名字</label>
            <input type="text" class="form-control" id="firstName" name="c_firstname" placeholder="" value="">
            <div class="invalid-feedback">
              <!-- Valid first name is required. -->
              主将名字を入力してください。
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <!-- <label for="lastName">Last name</label> -->
            <label for="lastName">主将名前</label>
            <input type="text" class="form-control" id="lastName" name="c_lastname" placeholder="" value="">
            <div class="invalid-feedback">
              <!-- Valid last name is required. -->
              主将名前を入力してください。
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <!-- <label for="firstName">First name</label> -->
            <label for="firstName">副将名字</label>
            <input type="text" class="form-control" id="firstName" name="s_firstname" placeholder="" value="" >
            <div class="invalid-feedback">
              <!-- Valid first name is required. -->
              副将名字を入力してください。
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <!-- <label for="lastName">Last name</label> -->
            <label for="lastName">副将名前</label>
            <input type="text" class="form-control" id="lastName" name="s_lastname" placeholder="" value="" >
            <div class="invalid-feedback">
              <!-- Valid last name is required. -->
              副将名前を入力してください。
            </div>
          </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">チーム人数<span class="must">※</span></label>
            <select class="form-control" id="exampleFormControlSelect1" name="member" required>
            <option value="">チーム人数を選択してください</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
            <option value="32">32</option>
            <option value="33">33</option>
            <option value="34">34</option>
            <option value="35">35</option>
            <option value="36">36</option>
            <option value="37">37</option>
            <option value="38">38</option>
            <option value="39">39</option>
            <option value="40">40</option>
            <option value="41">41</option>
            <option value="42">42</option>
            <option value="43">43</option>
            <option value="44">44</option>
            <option value="45">45</option>
            <option value="46">46</option>
            <option value="47">47</option>
            <option value="48">48</option>
            <option value="49">49</option>
            <option value="50">50</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">チーム平均年齢<span class="must">※</span></label>
            <select class="form-control" id="exampleFormControlSelect1" name="age" required>
            <option value="">チーム平均年齢を選択してください</option>
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
          <label for="email">メールアドレス<span class="must">※</span><span class="text-muted"></span></label>
          <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
          <div class="invalid-feedback">
            <!-- Please enter a valid email address for shipping updates. -->
            有効なメールアドレスを入力してください。
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <!-- <label for="state">State</label> -->
            <label for="state">活動場所<span class="must">※</span></label>
            <select class="custom-select d-block w-100" id="select-pref" name="pref" required>
              <!-- <option value="">Choose...</option> -->
              <option value="">都道府県を選択してください</option>
              <!-- <option>California</option> -->
            </select>
            <div class="invalid-feedback">
              <!-- Please provide a valid state. -->
              有効な都道府県を入力してください。
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <!-- <label for="state">State</label> -->
            <label for="state">a</label>
            <select class="custom-select d-block w-100" id="select-city" name="city" required>
              <!-- <option value="">Choose...</option> -->
              <option value="">市区町村を選択してください</option>
              <!-- <option>California</option> -->
            </select>
            <div class="invalid-feedback">
              <!-- Please provide a valid state. -->
              有効な市区町村を入力してください。
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="passwd">パスワード<span class="must">※</span></label>
          <input type="password" id="passwd" name="password" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="passwd">パスワード（確認）<span class="must">※</span></label>
          <input type="password" id="passwd" name="passwordConfirm" class="form-control" required>
        </div>

        <input type="submit" class="btn btn-outline-primary" name="btn_submit" value="登録">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>
// 都道府県フォーム生成
$(function() {
  $.getJSON('pref_city.json', function(data) {
    for(var i=0; i<47; i++) {
      var code = i+1;
      code = ('00'+code).slice(-2); // ゼロパディング
      $('#select-pref').append('<option value="'+code+'">'+data[i][code].pref+'</option>');
    }
  });
});

// 都道府県メニューに連動した市区町村フォーム生成
$('#select-pref').on('change', function() {
  $('#select-city option:nth-child(n+2)').remove(); // ※1 市区町村フォームクリア
    var select_pref = ('00'+$('#select-pref option:selected').val()).slice(-2);
    var key = Number(select_pref)-1;
    $.getJSON('pref_city.json', function(data) {
      for(var i=0; i<data[key][select_pref].city.length; i++){
        $('#select-city').append('<option value="'+data[key][select_pref].city[i].id+'">'+data[key][select_pref].city[i].name+'</option>');
      }
  });
});
</script>

  </body>
</html>