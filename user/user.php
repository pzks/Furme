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
<br>
<?php
include "userinfo.php";
$icon = $user_icon;
echo '<center><img width="130px" height="130px" class="img-circle" src='.$icon.'></center>';
?>
<br>
<div class="container">
<div class="card">
<div class="title"><span class="label">ID:</span>
<?php
include "userinfo.php";
echo '<span class="label label-warning">'.$user_id_get.'</span>';?>
</div>
<div class="title"><span class="label">邮箱:</span>
<?php
include "userinfo.php";
echo $user_mail;?></div>

<div class="title"><span class="label">用户名:</span>
<?php
include "userinfo.php";
echo $user_name;?></div>

<div class="title"><span class="label">昵称:</span>
<?php
include "userinfo.php";
echo $user_nicheng;?></div>

<div class="title"><span class="label">钱包:</span>
<?php
include "userinfo.php";
echo $user_gold.'金币';?></div>

<div class="title"><span class="label">权限:</span>
<?php
include "userinfo.php";
if($user_sf == "u")
{
	echo '普通用户';
} else {
	echo '';
}
if($user_sf == "a")
{
	echo '管理员';
} else {
	echo '';
}
?>
<?php
//====================================
//方便模块化使用
//====================================
$user_co_fen=$_COOKIE['key'];
require("../lib/conn.php");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
 }
$sql_co_fen = "SELECT COUNT(*) FROM love WHERE mylove='$user_co_fen'";//读取在别人关注列表里的自己信息
$result_fen = $conn->query($sql_co_fen);
$row_fen = $result_fen->fetch_row();
echo '<h3><center><span class="label label-danger">粉丝:'.$row_fen[0].'</span></center></h3>';
?>
<?php
//====================================
//方便模块化使用
//====================================
$user_co_love=$_COOKIE['key'];
require("../lib/conn.php");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
 }
$sql_co_love = "SELECT COUNT(*) FROM love WHERE my='$user_co_love'";
$result_love = $conn->query($sql_co_love);
$row_love = $result_love->fetch_row();
echo '<h3><center><span class="label label-danger">我的关注:'.$row_love[0].'</span></center></h3>';
?>

</div>
</div>

<div class="card">
<div class="title"><H2>我的帖子</h2></div>
<hr>
<?php
require("../lib/conn.php");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
 }
$user_name_me = $_COOKIE['key'];
$sql = "SELECT * FROM tie WHERE user='$user_name_me'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
      $names = $row['user'];
      $title = $row['title'];
      $code = $row['id'];
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
            <center><img src="../image/kong.png"class="img-rounded" alt="kong"><center>';
        }


?>
</div>
</body>
</html>

<?php
$user=$_COOKIE['key'];
if($user==""){
  Header("Location:../error/no_login.php");
}
?>
