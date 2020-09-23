<?php
// セッションの開始
session_start();

$date = $_POST['date'];
$_SESSION['date'] = $date;

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
    <li class="breadcrumb-item active" aria-current="page">個人成績</li>
  </ol>
  </nav>

<div class="container">
<!-- Content here -->
  <br><h4><?php echo ($_SESSION['email']) . "様の登録情報"; ?>  
  <br><h5 class="userpage">個人成績入力</h5><br>

  <div class = "col-10">
    <h6>個人成績入力</h6>
    <h7><?php echo $date; ?></h7>

    <form action="confirmUscore.php" method="post" class="needs-validation" novalidate>
    <table class="table">
       <tr>
        <th>打席</th>
        <th>内容</th>
        <th>盗塁</th>
        <th>打点</th>
       </tr>
       <tr>
        <td>1打席目</td>
        <td>
          <select class="form-control" id="exampleFormControlSelect1" name="bat_1">
            <option value="">内容を選択</option>
            <option value="一塁打">一塁打</option>
            <option value="二塁打">二塁打</option>
            <option value="三塁打">三塁打</option>
            <option value="本塁打">本塁打</option>
            <option value="犠打">犠打</option>
            <option value="犠飛">犠飛</option>
            <option value="四球">四球</option>
            <option value="死球">死球</option>
            <option value="三振">三振</option>
            <option value="併殺打">併殺打</option>
          </select>
        </td>
        <td>
          <select class="form-control" id="exampleFormControlSelect1" name="sb_1">
            <option value="">内容を選択</option>
            <option value="無し">無し</option>
            <option value="盗塁">盗塁</option>
            <option value="盗塁刺">盗塁刺</option>
          </select>
        </td>
        <td>
          <select class="form-control" id="exampleFormControlSelect1" name="rbi_1">
            <option value="">内容を選択</option>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
        </td>
       </tr>
       <tr>
        <td>2打席目</td>
        <td>
          <select class="form-control" id="exampleFormControlSelect1" name="bat_2">
            <option value="">内容を選択</option>
            <option value="一塁打">一塁打</option>
            <option value="二塁打">二塁打</option>
            <option value="三塁打">三塁打</option>
            <option value="本塁打">本塁打</option>
            <option value="犠打">犠打</option>
            <option value="犠飛">犠飛</option>
            <option value="四球">四球</option>
            <option value="死球">死球</option>
            <option value="三振">三振</option>
            <option value="併殺打">併殺打</option>
          </select>
        </td>
        <td>
          <select class="form-control" id="exampleFormControlSelect1" name="sb_2">
            <option value="">内容を選択</option>
            <option value="無し">無し</option>
            <option value="盗塁">盗塁</option>
            <option value="盗塁刺">盗塁刺</option>
          </select>
        </td>
        <td>
          <select class="form-control" id="exampleFormControlSelect1" name="rbi_2">
            <option value="">内容を選択</option>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
        </td>
       </tr>
       <tr>
        <td>3打席目</td>
        <td>
          <select class="form-control" id="exampleFormControlSelect1" name="bat_3">
           <option value="">内容を選択</option>
            <option value="一塁打">一塁打</option>
            <option value="二塁打">二塁打</option>
            <option value="三塁打">三塁打</option>
            <option value="本塁打">本塁打</option>
            <option value="犠打">犠打</option>
            <option value="犠飛">犠飛</option>
            <option value="四球">四球</option>
            <option value="死球">死球</option>
            <option value="三振">三振</option>
            <option value="併殺打">併殺打</option>
          </select>
        </td>
        <td>
          <select class="form-control" id="exampleFormControlSelect1" name="sb_3">
            <option value="">内容を選択</option>
            <option value="無し">無し</option>
            <option value="盗塁">盗塁</option>
            <option value="盗塁刺">盗塁刺</option>
          </select>
        </td>
        <td>
          <select class="form-control" id="exampleFormControlSelect1" name="rbi_3">
           <option value="">内容を選択</option>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
        </td>
       </tr>
       <tr>
        <td>4打席目</td>
        <td>
          <select class="form-control" id="exampleFormControlSelect1" name="bat_4">
            <option value="">内容を選択</option>
            <option value="一塁打">一塁打</option>
            <option value="二塁打">二塁打</option>
            <option value="三塁打">三塁打</option>
            <option value="本塁打">本塁打</option>
            <option value="犠打">犠打</option>
            <option value="犠飛">犠飛</option>
            <option value="四球">四球</option>
            <option value="死球">死球</option>
            <option value="三振">三振</option>
            <option value="併殺打">併殺打</option>
           </select>
        </td>
        <td>
          <select class="form-control" id="exampleFormControlSelect1" name="sb_4">
            <option value="">内容を選択</option>
            <option value="無し">無し</option>
            <option value="盗塁">盗塁</option>
            <option value="盗塁刺">盗塁刺</option>
          </select>
        </td>
        <td>
          <select class="form-control" id="exampleFormControlSelect1" name="rbi_4">
            <option value="">内容を選択</option>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
        </td>
       </tr>
       <tr>
        <td>5打席目</td>
        <td>
          <select class="form-control" id="exampleFormControlSelect1" name="bat_5">
            <option value="">内容を選択</option>
            <option value="一塁打">一塁打</option>
            <option value="二塁打">二塁打</option>
            <option value="三塁打">三塁打</option>
            <option value="本塁打">本塁打</option>
            <option value="犠打">犠打</option>
            <option value="犠飛">犠飛</option>
            <option value="四球">四球</option>
            <option value="死球">死球</option>
            <option value="三振">三振</option>
            <option value="併殺打">併殺打</option>
          </select>
        </td>
        <td>
          <select class="form-control" id="exampleFormControlSelect1" name="sb_5">
            <option value="">内容を選択</option>
            <option value="無し">無し</option>
            <option value="盗塁">盗塁</option>
            <option value="盗塁刺">盗塁刺</option>
          </select>
        </td>
        <td>
          <select class="form-control" id="exampleFormControlSelect1" name="rbi_5">
            <option value="">内容を選択</option>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
        </td>
       </tr>
    </table>
    <input type="submit" class="btn btn-outline-primary" name="btn_submit" value="登録">
    </form>
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
    
</body>