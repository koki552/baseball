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


// 画像の表示
$sql ="SELECT id, img, team_id, post_date FROM img WHERE team_id = $user_array[team] ORDER BY post_date DESC LIMIT 1";
$res = $mysqli->query($sql);
if($res) {
    $img_array = $res->fetch_assoc();
  }
$img_name = $img_array['img'];
$img_dir = './upload/' . $img_name;


// チームロゴ画像の表示
$sql ="SELECT id, img, team_id, post_date FROM Timg WHERE team_id = $user_array[team] ORDER BY post_date DESC LIMIT 1";
$res = $mysqli->query($sql);
if($res) {
    $Timg_array = $res->fetch_assoc();
  }
$Timg_name = $Timg_array['img'];
$Timg_dir = './upload/' . $Timg_name;

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
.imgtop {
  text-align: center;
  position: relative;
  /*要素内の余白は消す*/
  padding:0;
  width: 100%;
}
.imgsvg {
  position: absolute;
  bottom: 45px;
  right: 15px;
  cursor: pointer;
}
.imglogo {
  width: 60px;
  height: 60px;
  object-fit: cover;
}
#submit{
  position: absolute;
  top: 5px;
  left: 15px;
}
</style>

<body style ="background: #EEEEEE;">

  <!-- header -->
  <?php include( $_SERVER['DOCUMENT_ROOT'] . '/baseball/header.php'); ?>

  <!-- Page Content -->
  <div class="container">

  
<!-- 画像の表示 -->
<div class="imgtop" >
  <div style="background: #CCCCCC;">
    <?php if( !empty( $img_array) ):?>
      <?php echo "<img class='imgView' src=\"$img_dir\">"; ?>
    <?php endif; ?>
  </div>
    
    <!-- 画像の選択 -->
    <form method="POST" action="upimg.php" enctype="multipart/form-data">
      <div id="p2">
        <input type="submit" id="submit">
      </div>
      <label for="file_photo">
        <svg class="imgsvg" width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-camera-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
        <path fill-rule="evenodd" d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
      </svg>
        <input type="file" id="file_photo" name="upimg" accept="image/*" style="display:none;" onchange="selectFile()">
      </label>
  </form>
</div>



<div>
  <form method="POST" action="img.php" enctype="multipart/form-data">
  <input type="submit">
   <label for="icon_photo">
      <?php if( !empty( $Timg_array) ):?>
        <?php echo "<img class='imglogo' src=\"$Timg_dir\">"; ?>
      <?php endif; ?>
    </label>
      <input type="file" id="icon_photo" name="img" accept="image/*" style="display:none;">
  </form>
  
  <?php if( !empty( $team_array) ): ?>
    <h4 class="team"><?php echo $team_array['teamname']; ?></h4>
  <?php endif; ?>
</div>


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

  <!-- 画像サンプル表示 -->
  <script>
    $(function(){
        var setFileInput = $('.imgtop'),
        setFileImg = $('.imgView');
    
        setFileInput.each(function(){
            var selfFile = $(this),
            selfInput = $(this).find('input[type=file]'),
            prevElm = selfFile.find(setFileImg),
            orgPass = prevElm.attr('src');
    
            selfInput.change(function(){
                var file = $(this).prop('files')[0],
                fileRdr = new FileReader();
    
                if (!this.files.length){
                    prevElm.attr('src', orgPass);
                    return;
                } else {
                    if (!file.type.match('image.*')){
                        prevElm.attr('src', orgPass);
                        return;
                    } else {
                        fileRdr.onload = function() {
                            prevElm.attr('src', fileRdr.result);
                        }
                        fileRdr.readAsDataURL(file);
                    }
                }
            });
        });
    });
  </script>

<!-- カメラアイコンクリック後送信ボタン表示 -->
  <script>
    document.getElementById("p2").style.visibility = "hidden";

    function selectFile() {
      const p2 = document.getElementById("p2");

      if (p2.style.visibility == "visible") {
        // hiddenで非表示
        p2.style.visibility = "hidden";
      } else {
        // visibleで表示
        p2.style.visibility = "visible";
      }
    }
  </script>



</body>

</html>
