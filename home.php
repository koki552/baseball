<?php

session_start();

// データベースの接続情報
define( 'DB_HOST', 'localhost');
define( 'DB_USER', 'root');
define( 'DB_PASS', '');
define( 'DB_NAME', 'baseball');

// データベースに接続
$mysqli = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME);

// 試合結果表示
$sql = "SELECT id, firstname, lastname, username, email, zip, state, address1, address2, password, team, status FROM user WHERE email ='".$_SESSION['email']."'";
$res = $mysqli->query($sql);
if($res) {
    $user_array = $res->fetch_assoc();
  }

$sql ="SELECT id, date, opponent, score, Oscore, team_id, win FROM teamScore WHERE team_id=$user_array[team] ORDER BY date DESC LIMIT 5";
$res = $mysqli->query($sql);
if($res) {
    $teamScore_array = $res->fetch_all(MYSQLI_ASSOC);
  }

$sql = "SELECT id, teamname, est, r_userid, r_firstname, r_lastname, c_firstname, c_lastname, s_firstname, s_lastname, member, age, pref, city, password FROM team WHERE id = $user_array[team]";

$res = $mysqli->query($sql);
if($res) {
    $team_array = $res->fetch_assoc();
  }


// チーム成績表示
if( !empty( $team_array) ){
$sql = "SELECT DATE_FORMAT(date, '%Y') year, COUNT(*) AS game, SUM(CASE WHEN win=1 THEN 1 ELSE 0 END) AS win, SUM(CASE WHEN win=2 THEN 1 ELSE 0 END) AS lose, SUM(CASE WHEN win=3 THEN 1 ELSE 0 END) AS draw FROM teamScore WHERE team_id = $team_array[id] GROUP BY DATE_FORMAT(date, '%Y')";
$res = $mysqli->query($sql);
if($res) {
  $win_array = $res->fetch_all(MYSQLI_ASSOC);
}
}

$mysqli->close();

?>

<!DOCTYPE html>
<html lang="ja">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>BASEBALL</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<style>
.score{
  margin-top: 20px;
  } 
.table {
  margin-top: 20px;
}
.team {
  margin-top: 20px;
}
</style>

<body style ="background: #EEEEEE;">

  <!-- header -->
  <?php include( $_SERVER['DOCUMENT_ROOT'] . '/baseball/header.php'); ?>

  <!-- Page Content -->
  <div class="container">

  <form method="POST" action="upimg.php" enctype="multipart/form-data">
    <input type="file" name="upimg" accept="image/*">
    <input type="submit">
  </form>

  <?php if( !empty( $team_array) ): ?>
  <h4 class="team"><?php echo $team_array['teamname']; ?></h4>
  <?php endif; ?>

    <div class="row">
      <div class="col-6">
        <table class="table" style ="background: white;">
          <tr>
            <th>試合結果</th>
          </tr>
          <tr>
            <th>日程</th>
            <th>対戦相手</th>
            <th>結果</th>
          </tr>
            <?php if( !empty( $teamScore_array) ): ?>
            <?php foreach( $teamScore_array as $value ): ?>
          <tr>
              <td><?php echo $value['date']; ?></td>
              <td><?php echo $value['opponent']; ?></td>
              <td><?php echo $value['score'] .'-'. $value['Oscore']; ?></td>
          </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </table>
      </div>
      
      <div class="col-6">
        <table class="table" style ="background: white;">
         <tr>
            <th colspan="2">チーム成績</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <th>年</th>
            <th>試合</th>
            <th>勝ち</th>
            <th>負け</th>
            <th>引分</th>
            <th>勝率</th>
          </tr>
        <?php if(!empty($win_array)): ?>
          <?php foreach($win_array as $value): ?>
          <?php $wps = number_format($value['win']/$value['game'], 3); 
          $wp = ltrim($wps, '0');
          ?>
          <tr>
            <td><?php echo $value['year']; ?></td>
            <td><?php echo $value['game']; ?></td>
            <td><?php echo $value['win']; ?></td>
            <td><?php echo $value['lose']; ?></td>
            <td><?php echo $value['draw']; ?></td>
            <td><?php echo $wp; ?></td>
          </tr>
        <?php endforeach; ?>
        <?php endif; ?>

        <table class="table" style ="background: white;">
          <tr>
            <th colspan="2">個人成績</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </table>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
