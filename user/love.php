<!DOCTYPE html>
<html lang="CN">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0;">
<title>Furme</title>
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
//=============================================
$user_get_name = $_COOKIE['key'];//获取用户cookie
$sql_get_my = "SELECT * FROM love WHERE my='$user_get_name'";//从数据库筛选用户信息，我的关注
$result_get_my = $conn->query($sql_get_my);//重新定义一个变量
if ($result_get_my->num_rows > 0) {
  while($row_get_my = $result_get_my->fetch_assoc()) {//只有这样才能取得一个列表！遍历一次
  $name = $row_get_my['mylove'];
  $sql = "SELECT * FROM register WHERE username ='$name'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $names = $row['username'];
  $code = $row['id'];
  $icon = $row['icon'];
      echo '
      <div class="card">
          <div class="item">
          <div class="row">
  <div class="col-xs-6">
  <div class="item-heading">
  <h4><a href="../user_center.php?name='.$names.'"><img width="50px" height="50px" class="img-thumbnail" src='.$icon.'></a> <a href="../tie.php?tid='.$code.'">'.$title.'</a></h4>
  </div>
</div>
  <div class="col-xs-6">
  <br>
  <form action="unlove_user.php" method="POST">
  <input type="text" class="form-control" placeholder="" name="getname" value="'.$names.'" readonly="readonly" style = "display:none">
  <center><input type="submit" name="del" class="btn btn-danger" value="取消关注"/></center>
  </form>
  </div>
</div>
            <div class="item-footer">
              <br><a href="#" class="text-muted"><i class="icon-comments"></i> 用户ID:</a> &nbsp; <span class="text-muted">'.$code.'</span>
          <br><a href="#" class="text-muted"><i class="icon-comments"></i> 我的关注:</a> &nbsp; <span class="text-muted">'.$names.'</span>
            </div>
        </div>
        </div>
        ';
 
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