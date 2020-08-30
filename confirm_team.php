<?php
// セッションの開始
session_start();

$teamname = $_POST['teamname'];
$est = $_POST['est'];
$r_firstname = $_POST['r_firstname'];
$r_lastname = $_POST['r_lastname'];
$c_firstname = $_POST['c_firstname'];
$c_lastname = $_POST['c_lastname'];
$s_firstname = $_POST['s_firstname'];
$s_lastname = $_POST['s_lastname'];
$member = $_POST['member'];
$age = $_POST['age'];
$email = $_POST['email'];
$pref = $_POST['pref'];
$city = $_POST['city'];
$password = $_POST['password'];

// 入力値をセッション変数に格納
$_SESSION['teamname'] = $teamname;
$_SESSION['est'] = $est;
$_SESSION['r_firstname'] = $r_firstname;
$_SESSION['r_lastname'] = $r_lastname;
$_SESSION['c_firstname'] = $c_firstname;
$_SESSION['c_lastname'] = $c_lastname;
$_SESSION['s_firstname'] = $s_firstname;
$_SESSION['s_lastname'] = $s_lastname;
$_SESSION['member'] = $member;
$_SESSION['age'] = $age;
$_SESSION['email'] = $email;
$_SESSION['pref'] = $pref;
$_SESSION['city'] = $city;
$_SESSION['password'] = $password;
?>

<!DOCTYPE html>
<html lang="ja">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>個人情報</title>

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

<!-- Page Content -->
<div class="container">

<br><h4 class="userpage">チーム情報</h4><br>

<form action="submit_team.php" method="post">
<table class="table">
<tbody>
  <tr>
    <td class="title">チーム名</td>
    <td class="content"><?php echo $teamname; ?></td>
  </tr>
  <tr>
    <td>設立年</td>
    <td><?php echo $est; ?></td>
  </tr>
  <tr>
    <td>代表者名前</td>
    <td><?php echo $r_firstname; ?><?php echo $r_lastname; ?></td>
  </tr>
  <tr>
    <td>主将名前</td>
    <td><?php echo $c_firstname; ?><?php echo $c_lastname; ?></td>
  </tr>
  <tr>
    <td>副将名前</td>
    <td><?php echo $s_firstname; ?><?php echo $s_lastname; ?></td>
  </tr>
  <tr>
    <td>チーム人数</td>
    <td><?php echo $member; ?></td>
  </tr>
  <tr>
    <td>チーム平均年齢</td>
    <td><?php echo $age; ?></td>
  </tr>
  <tr>
    <td>メールアドレス</td>
    <td><?php echo $email; ?></td>
  </tr>
  <tr>
    <td>活動場所</td>
    <td><?php echo $pref; ?><?php echo $city; ?></td>
  </tr>
  <tr>
    <td>パスワード</td>
    <td><?php echo $password; ?></td>
  </tr>

</tbody>
</table>
<button type="button" class="btn btn-outline-secondary" onclick="history.back()">戻る</button>
<input type="submit" class="btn btn-outline-primary" name="btn_submit" onClick="location.href='mypage.php?todo_id=<?php echo $value['id'];?>'" value="登録">
</form>
</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.slim.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>