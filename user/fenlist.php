<!DOCTYPE html>
<html lang="CN">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0;">
<title>Simpost - 更轻便的文章系统</title>
<!-- zui -->
<link href="../css/zui.min.css" rel="stylesheet">
<!-- jQuery (ZUI中的Javascript组件依赖于jQuery) -->
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://strapdownjs.com/v/0.2/strapdown.js"></script>
<!-- ZUI Javascript组件 -->
<script src="../js/zui.min.js"></script>
<script src="../js/sweetalert.min.js"></script>
</head>
<body>
<br>
<div class="list">
<?php
require("../lib/conn.php");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
 }
//===============================================
$user_get_name = $_COOKIE['key'];//获取用户cookie
$sql_get_my = "SELECT * FROM love WHERE mylove='$user_get_name'";//因为是我的粉丝列表，所以要从被关注者的名单里筛选，而不是我的my里筛选
$result_get_my = $conn->query($sql_get_my);//重新定义一个变量
if ($result_get_my->num_rows > 0) {
  while($row_get_my = $result_get_my->fetch_assoc()) {//只有这样才能取得一个列表！遍历一次
  $name = $row_get_my['my'];//这里指的my是指关注我的人，因为前面已经筛选出的是关注自己的人的行，而不是自己关注的人的行，这里一定要记清
  $sql = "SELECT * FROM register WHERE username ='$name'";//从register表里筛选
  $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
      $names = $row['username'];
      $code = $row['id'];
      $icon = $row['icon'];
      }//=====================================================
      echo '
      <div class="card">
          <div class="item">
            <div class="item-heading">
              <h4><a href="../user_center.php?name='.$names.'"><img width="50px" height="50px" class="img-thumbnail" src='.$icon.'></a> <a href="../tie.php?tid='.$code.'">'.$title.'</a></h4>
            </div>
            <div class="item-footer">
              <br><a href="#" class="text-muted"><i class="icon-comments"></i> 用户ID:</a> &nbsp; <span class="text-muted">'.$code.'</span>
          <br><a href="#" class="text-muted"><i class="icon-comments"></i> ta的用户名:</a> &nbsp; <span class="text-muted">'.$names.'</span>
            </div>
        </div>
        </div>
        ';
        } else {
          echo '<div align="center"><h3>空空如也~<h3></div>
            <center><img src="../image/kong.png"class="img-rounded" alt="kong"><center>';
        }
      }
    }else {
      echo '<div align="center"><h3>空空如也~<h3></div>
        <center><img src="../image/kong.png"class="img-rounded" alt="kong"><center>';
    }
?>
</div>
</body>
</html>

<?php
$user_mymy=$_COOKIE['key'];
if($user_mymy==""){
  Header("Location:../error/no_login.php");
}
?>