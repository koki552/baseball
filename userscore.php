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

 $sql ="SELECT id, firstname, lastname, username, email, zip, state, address1, address2, password, team, status FROM user WHERE email ='".$_SESSION['email']."'";
 $res = $mysqli->query($sql);
 if($res) {
     $user_array = $res->fetch_assoc();
   }

$sql = "SELECT DATE_FORMAT(date, '%Y') year, COUNT(*)ct, SUM(CASE WHEN bat_1 IN ('一塁打', '二塁打', '三塁打', '本塁打', '三振', '併殺打', '犠打', '犠飛', '四球', '死球') THEN 1 ELSE 0 END) AS bat1, SUM(CASE WHEN bat_2 IN ('一塁打', '二塁打', '三塁打', '本塁打', '三振', '併殺打', '犠打', '犠飛', '四球', '死球') THEN 1 ELSE 0 END) AS bat2, SUM(CASE WHEN bat_3 IN ('一塁打', '二塁打', '三塁打', '本塁打', '三振', '併殺打', '犠打', '犠飛', '四球', '死球') THEN 1 ELSE 0 END) AS bat3, SUM(CASE WHEN bat_4 IN ('一塁打', '二塁打', '三塁打', '本塁打', '三振', '併殺打', '犠打', '犠飛', '四球', '死球') THEN 1 ELSE 0 END) AS bat4, SUM(CASE WHEN bat_5 IN ('一塁打', '二塁打', '三塁打', '本塁打', '三振', '併殺打', '犠打', '犠飛', '四球', '死球') THEN 1 ELSE 0 END) AS bat5, 
SUM(CASE WHEN bat_1 IN ('一塁打', '二塁打', '三塁打', '本塁打', '三振', '併殺打') THEN 1 ELSE 0 END) AS bat_1, SUM(CASE WHEN bat_2 IN ('一塁打', '二塁打', '三塁打', '本塁打', '三振', '併殺打')  THEN 1 ELSE 0 END) AS bat_2, SUM(CASE WHEN bat_3 IN ('一塁打', '二塁打', '三塁打', '本塁打', '三振', '併殺打') THEN 1 ELSE 0 END) AS bat_3, SUM(CASE WHEN bat_4 IN ('一塁打', '二塁打', '三塁打', '本塁打', '三振', '併殺打')  THEN 1 ELSE 0 END) AS bat_4, SUM(CASE WHEN bat_5 IN ('一塁打', '二塁打', '三塁打', '本塁打', '三振', '併殺打') THEN 1 ELSE 0 END) AS bat_5, 
SUM(CASE WHEN bat_1 IN ('一塁打') THEN 1 ELSE 0 END) AS single_1, SUM(CASE WHEN bat_2 IN ('一塁打') THEN 1 ELSE 0 END) AS single_2, SUM(CASE WHEN bat_3 IN ('一塁打') THEN 1 ELSE 0 END) AS single_3, SUM(CASE WHEN bat_4 IN ('一塁打') THEN 1 ELSE 0 END) AS single_4, SUM(CASE WHEN bat_5 IN ('一塁打') THEN 1 ELSE 0 END) AS single_5, 
SUM(CASE WHEN bat_1 IN ('二塁打') THEN 1 ELSE 0 END) AS double_1, SUM(CASE WHEN bat_2 IN ('二塁打') THEN 1 ELSE 0 END) AS double_2, SUM(CASE WHEN bat_3 IN ('二塁打') THEN 1 ELSE 0 END) AS double_3, SUM(CASE WHEN bat_4 IN ('二塁打') THEN 1 ELSE 0 END) AS double_4, SUM(CASE WHEN bat_5 IN ('二塁打') THEN 1 ELSE 0 END) AS double_5,
SUM(CASE WHEN bat_1 IN ('三塁打') THEN 1 ELSE 0 END) AS triple_1, SUM(CASE WHEN bat_2 IN ('三塁打') THEN 1 ELSE 0 END) AS triple_2, SUM(CASE WHEN bat_3 IN ('三塁打') THEN 1 ELSE 0 END) AS triple_3, SUM(CASE WHEN bat_4 IN ('三塁打') THEN 1 ELSE 0 END) AS triple_4, SUM(CASE WHEN bat_5 IN ('三塁打') THEN 1 ELSE 0 END) AS triple_5,
SUM(CASE WHEN bat_1 IN ('本塁打') THEN 1 ELSE 0 END) AS homerun_1, SUM(CASE WHEN bat_2 IN ('本塁打') THEN 1 ELSE 0 END) AS homerun_2, SUM(CASE WHEN bat_3 IN ('本塁打') THEN 1 ELSE 0 END) AS homerun_3, SUM(CASE WHEN bat_4 IN ('本塁打') THEN 1 ELSE 0 END) AS homerun_4, SUM(CASE WHEN bat_5 IN ('本塁打') THEN 1 ELSE 0 END) AS homerun_5,
SUM(rbi_1) AS rbi_1, SUM(rbi_2) AS rbi_2, SUM(rbi_3) AS rbi_3, SUM(rbi_4) AS rbi_4, SUM(rbi_5) rbi_5,
SUM(CASE WHEN sb_1 IN ('盗塁') THEN 1 ELSE 0 END) AS sb_1, SUM(CASE WHEN sb_2 IN ('盗塁') THEN 1 ELSE 0 END) AS sb_2, SUM(CASE WHEN sb_3 IN ('盗塁') THEN 1 ELSE 0 END) AS sb_3, SUM(CASE WHEN sb_4 IN ('盗塁') THEN 1 ELSE 0 END) AS sb_4, SUM(CASE WHEN sb_5 IN ('盗塁') THEN 1 ELSE 0 END) AS sb_5,
SUM(CASE WHEN sb_1 IN ('盗塁刺') THEN 1 ELSE 0 END) AS sbo_1, SUM(CASE WHEN sb_2 IN ('盗塁刺') THEN 1 ELSE 0 END) AS sbo_2, SUM(CASE WHEN sb_3 IN ('盗塁刺') THEN 1 ELSE 0 END) AS sbo_3, SUM(CASE WHEN sb_4 IN ('盗塁刺') THEN 1 ELSE 0 END) AS sbo_4, SUM(CASE WHEN sb_5 IN ('盗塁刺') THEN 1 ELSE 0 END) AS sbo_5,
SUM(CASE WHEN bat_1 IN ('犠打') THEN 1 ELSE 0 END) AS sbunt_1, SUM(CASE WHEN bat_2 IN ('犠打') THEN 1 ELSE 0 END) AS sbunt_2, SUM(CASE WHEN bat_3 IN ('犠打') THEN 1 ELSE 0 END) AS sbunt_3, SUM(CASE WHEN bat_4 IN ('犠打') THEN 1 ELSE 0 END) AS sbunt_4, SUM(CASE WHEN bat_5 IN ('犠打') THEN 1 ELSE 0 END) AS sbunt_5,
SUM(CASE WHEN bat_1 IN ('犠飛') THEN 1 ELSE 0 END) AS sfly_1, SUM(CASE WHEN bat_2 IN ('犠飛') THEN 1 ELSE 0 END) AS sfly_2, SUM(CASE WHEN bat_3 IN ('犠飛') THEN 1 ELSE 0 END) AS sfly_3, SUM(CASE WHEN bat_4 IN ('犠飛') THEN 1 ELSE 0 END) AS sfly_4, SUM(CASE WHEN bat_5 IN ('犠飛') THEN 1 ELSE 0 END) AS sfly_5,
SUM(CASE WHEN bat_1 IN ('四球') THEN 1 ELSE 0 END) AS walks_1, SUM(CASE WHEN bat_2 IN ('四球') THEN 1 ELSE 0 END) AS walks_2, SUM(CASE WHEN bat_3 IN ('四球') THEN 1 ELSE 0 END) AS walks_3, SUM(CASE WHEN bat_4 IN ('四球') THEN 1 ELSE 0 END) AS walks_4, SUM(CASE WHEN bat_5 IN ('四球') THEN 1 ELSE 0 END) AS walks_5,
SUM(CASE WHEN bat_1 IN ('死球') THEN 1 ELSE 0 END) AS dball_1, SUM(CASE WHEN bat_2 IN ('死球') THEN 1 ELSE 0 END) AS dball_2, SUM(CASE WHEN bat_3 IN ('死球') THEN 1 ELSE 0 END) AS dball_3, SUM(CASE WHEN bat_4 IN ('死球') THEN 1 ELSE 0 END) AS dball_4, SUM(CASE WHEN bat_5 IN ('死球') THEN 1 ELSE 0 END) AS dball_5,
SUM(CASE WHEN bat_1 IN ('三振') THEN 1 ELSE 0 END) AS sout_1, SUM(CASE WHEN bat_2 IN ('三振') THEN 1 ELSE 0 END) AS sout_2, SUM(CASE WHEN bat_3 IN ('三振') THEN 1 ELSE 0 END) AS sout_3, SUM(CASE WHEN bat_4 IN ('三振') THEN 1 ELSE 0 END) AS sout_4, SUM(CASE WHEN bat_5 IN ('三振') THEN 1 ELSE 0 END) AS sout_5,
SUM(CASE WHEN bat_1 IN ('併殺打') THEN 1 ELSE 0 END) AS dplay_1, SUM(CASE WHEN bat_2 IN ('併殺打') THEN 1 ELSE 0 END) AS dplay_2, SUM(CASE WHEN bat_3 IN ('併殺打') THEN 1 ELSE 0 END) AS dplay_3, SUM(CASE WHEN bat_4 IN ('併殺打') THEN 1 ELSE 0 END) AS dplay_4, SUM(CASE WHEN bat_5 IN ('併殺打') THEN 1 ELSE 0 END) AS dplay_5
FROM userScore WHERE user_id = $user_array[id] GROUP BY DATE_FORMAT(date, '%Y')";
$res = $mysqli->query($sql);
if($res) {
  $userScore_array = $res->fetch_all(MYSQLI_ASSOC);
}

// データベースの検索を閉じる
$mysqli->close();

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
  <br><h5 class="userpage">個人成績</h5><br>

  <div class = "col-10">
    <h6>年度別成績</h6>
    <table cellpadding="0" cellspacing="0" class="table table-bordered">
      <tr>
        <th>年<br />度</th>
        <th>試<br />合</th>
        <th>打<br />席</th>
        <th>打<br />数</th>
        <th>得<br />点</th>
        <th>安<br />打</th>
        <th>二<br />塁<br />打</th>
        <th>三<br />塁<br />打</th>
        <th>本<br />塁<br />打</th>
        <th>塁<br />打</th>
        <th>打<br />点</th>
        <th>盗<br />塁</th>
        <th>盗<br />塁<br />刺</th>
        <th>犠<br />打</th>
        <th>犠<br />飛</th>
        <th>四<br />球</th>
        <th>死<br />球</th>
        <th>三<br />振</th>
        <th>併<br />殺<br />打</th>
        <th>打<br />率</th>
        <th>長<br />打<br />率</th>
        <th>出<br />塁<br />率</th>
      </tr>
      <?php if( !empty( $userScore_array) ): ?>
      <?php foreach( $userScore_array as $value ): ?>
      <?php $hits = $value['single_1']+$value['single_2']+$value['single_3']+$value['single_4']+$value['single_5']+$value['double_1']+$value['double_2']+$value['double_3']+$value['double_4']+$value['double_5']+$value['triple_1']+$value['triple_2']+$value['triple_3']+$value['triple_4']+$value['triple_5']+$value['homerun_1']+$value['homerun_2']+$value['homerun_3']+$value['homerun_4']+$value['homerun_5'];?>
      <?php $at_bats = $value['bat_1']+$value['bat_2']+$value['bat_3']+$value['bat_4']+$value['bat_5']; ?>
      <?php $b_AV = number_format($hits/$at_bats, 3);
      $bAV = ltrim($b_AV, '0');
      ?>
      <tr>
        <td><?php echo $value['year']; ?></td>
        <td><?php echo $value['ct']; ?></td>
        <td><?php echo $value['bat1']+$value['bat2']+$value['bat3']+$value['bat4']+$value['bat5']; ?></td>
        <td><?php echo $value['bat_1']+$value['bat_2']+$value['bat_3']+$value['bat_4']+$value['bat_5']; ?></td>
        <td></td>
        <td><?php echo $value['single_1']+$value['single_2']+$value['single_3']+$value['single_4']+$value['single_5']; ?></td>
        <td><?php echo $value['double_1']+$value['double_2']+$value['double_3']+$value['double_4']+$value['double_5']; ?></td>
        <td><?php echo $value['triple_1']+$value['triple_2']+$value['triple_3']+$value['triple_4']+$value['triple_5']; ?></td>
        <td><?php echo $value['homerun_1']+$value['homerun_2']+$value['homerun_3']+$value['homerun_4']+$value['homerun_5']; ?></td>
        <td></td>
        <td><?php echo $value['rbi_1']+$value['rbi_2']+$value['rbi_3']+$value['rbi_4']+$value['rbi_5']; ?></td>
        <td><?php echo $value['sb_1']+$value['sb_2']+$value['sb_3']+$value['sb_4']+$value['sb_5']; ?></td>
        <td><?php echo $value['sbo_1']+$value['sbo_2']+$value['sbo_3']+$value['sbo_4']+$value['sbo_5']; ?></td>
        <td><?php echo $value['sbunt_1']+$value['sbunt_2']+$value['sbunt_3']+$value['sbunt_4']+$value['sbunt_5']; ?></td>
        <td><?php echo $value['sfly_1']+$value['sfly_2']+$value['sfly_3']+$value['sfly_4']+$value['sfly_5']; ?></td>
        <td><?php echo $value['walks_1']+$value['walks_2']+$value['walks_3']+$value['walks_4']+$value['walks_5']; ?></td>
        <td><?php echo $value['dball_1']+$value['dball_2']+$value['dball_3']+$value['dball_4']+$value['dball_5']; ?></td>
        <td><?php echo $value['sout_1']+$value['sout_2']+$value['sout_3']+$value['sout_4']+$value['sout_5']; ?></td>
        <td><?php echo $value['dplay_1']+$value['dplay_2']+$value['dplay_3']+$value['dplay_4']+$value['dplay_5']; ?></td>
        <td><?php echo $bAV; ?></td>
        <td></td>
        <td></td>
      </tr>
      <?php endforeach; ?>
      <?php endif; ?>
    </table>

    <h6>試合別成績</h6>
    <table cellpadding="0" cellspacing="0" class="table table-bordered">
      <tr>
        <th>日<br />付</th>
        <th>相<br />手</th>
        <th>打<br />席</th>
        <th>打<br />数</th>
        <th>得<br />点</th>
        <th>安<br />打</th>
        <th>二<br />塁<br />打</th>
        <th>三<br />塁<br />打</th>
        <th>本<br />塁<br />打</th>
        <th>塁<br />打</th>
        <th>打<br />点</th>
        <th>盗<br />塁</th>
        <th>盗<br />塁<br />刺</th>
        <th>犠<br />打</th>
        <th>犠<br />飛</th>
        <th>四<br />球</th>
        <th>死<br />球</th>
        <th>三<br />振</th>
        <th>併<br />殺<br />打</th>
      </tr>
    </table>
    <h6>個人成績入力ページへ</a></h6>
    <h7>入力する試合日選択</h7>
    <form action="userscoreInput.php" method="post" class="needs-validation" novalidate>
      <input type="date" name="date"><br>
      <input type="submit" class="btn btn-outline-primary" name="btn_submit" onClick="location.href='mypage.php?todo_id=<?php echo $value['id'];?>'" value="送信">
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