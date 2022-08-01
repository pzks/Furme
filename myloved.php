<!DOCTYPE html>
<html lang="CN">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0;">
<title>Simpost - 更轻便的文章系统</title>
<!-- zui -->
<link href="css/zui.min.css" rel="stylesheet">
<!-- jQuery (ZUI中的Javascript组件依赖于jQuery) -->
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://strapdownjs.com/v/0.2/strapdown.js"></script>
<!-- ZUI Javascript组件 -->
<script src="js/zui.min.js"></script>
<script src="js/sweetalert.min.js"></script>
</head>
<body>
<center><H3><span class="label label-danger">我的关注</span></H3></center>
<div class="list">
<?php
require("./lib/conn.php");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
 }
//=============================================
$user_get_name = $_COOKIE['key'];//获取用户cookie
$sql_get_my = "SELECT * FROM love WHERE my='$user_get_name'";//从数据库筛选用户信息
$result_get_my = $conn->query($sql_get_my);//重新定义一个变量
if ($result_get_my->num_rows > 0) {
  while($row_get_my = $result_get_my->fetch_assoc()) {//只有这样才能取得一个列表！遍历一次
  $name = $row_get_my['mylove'];
  $sql = "SELECT * FROM tie WHERE user ='$name'";
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
              <h4><a href="./user_center.php?name='.$names.'"><img width="50px" height="50px" class="img-thumbnail" src='.$icon.'></a> <a href="./tie.php?tid='.$code.'">'.$title.'</a></h4>
            </div>
            <div class="item-footer">
              <br><a href="#" class="text-muted"><i class="icon-comments"></i> 文章ID:</a> &nbsp; <span class="text-muted">'.$code.'</span>
          <br><a href="#" class="text-muted"><i class="icon-comments"></i> 帖子作者:</a> &nbsp; <span class="text-muted">'.$names.'</span>
          <br><a href="#" class="text-muted"><i class="icon-comments"></i> 发帖时间:</a> &nbsp; <span class="text-muted">'.$time.'</span>
            </div>
        </div>
        </div>';
      
            }
        } 
      }
    }else {
      echo '<div align="center"><h3>空空如也~<h3></div>
        <center><img src="./image/kong.png"class="img-rounded" alt="kong"><center>';
    }
?>
</div>
</div>
</body>
</html>

<?php
$user_mymy=$_COOKIE['key'];
if($user_mymy==""){
  Header("Location:./error/no_login.php");
}
?>