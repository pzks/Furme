<!DOCTYPE html>
<html lang="CN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0;">
<title>Furme</title>
<!-- zui -->
<link href="../css/zui.min.css" rel="stylesheet">
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<!-- ZUI Javascript组件 -->
<script src="../js/zui.min.js"></script>
<script src="../js/sweetalert.min.js"></script>
</head>
<body>
<?php
require("../lib/conn.php");
$user_get_post = $_GET['name'];
$sql1 = "SELECT * FROM register WHERE username='$user_get_post'";
$result = $conn->query($sql1);
$row = $result->fetch_assoc();
$user_icon = $row['icon'];
echo '<center><img width="130px" height="130px" class="img-thumbnail" src='.$user_icon.'></center>';
?>

<div class="card">
<div class="title">用户名:
<?php
$user_get_post = $_GET['name'];
$sql1 = "SELECT * FROM register WHERE username='$user_get_post'";
$result = $conn->query($sql1);
$row = $result->fetch_assoc();
$user_name = $row['username'];
echo $user_name;
?>
</div>
<div class="title">email:
<?php
$$user_get_post = $_GET['name'];
$sql1 = "SELECT * FROM register WHERE username='$user_get_post'";
$result = $conn->query($sql1);
$row = $result->fetch_assoc();
$mail = $row['mail'];
echo $mail;
?></div>

</div>
<div class="card">
<div class="title">ta的帖子:</div>
<?php
$user_g=$_GET['name'];
require("../lib/conn.php");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
 }
$sql = "SELECT * FROM tie WHERE user='$user_g'";//取得用户目录
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
      $names = $row['user'];
      $title = $row['title'];
      $code = $row['tid'];
      $time = $row['time'];
      $icon = $row['icon'];
      echo '
      <div class="card">
          <div class="item">
            <div class="item-heading">
              <h4><a href="./user_center.php?name='.$names.'"><img width="50px" height="50px" class="img-thumbnail" src='.$icon.'><a href="../tie.php?tid='.$code.'">'.$title.'</a></h4>
            </div>
            <div class="item-footer">
              <br><a href="#" class="text-muted"><i class="icon-comments"></i> 文章ID:</a> &nbsp; <span class="text-muted">'.$code.'</span>
          <br><a href="#" class="text-muted"><i class="icon-comments"></i> 帖子作者:</a> &nbsp; <span class="text-muted">'.$names.'</span>
          <br><a href="#" class="text-muted"><i class="icon-comments"></i> 发帖时间:</a> &nbsp; <span class="text-muted">'.$time.'</span>
            </div>
          </div>
        </div>';
      
            }
        } else {
          echo '<div align="center"><h3>空空如也~<h3></div>
            <center><img src="./image/kong.png"class="img-rounded" alt="kong"><center>';
        }
?>
</div>
</div>
</body>
</html>