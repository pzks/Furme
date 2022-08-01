<html lang="CN">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0;">
<title>Simpost - 更轻便的文章系统</title>
<!-- zui -->
<link href="../css/zui.min.css" rel="stylesheet">
<!-- jQuery (ZUI中的Javascript组件依赖于jQuery) -->
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<!-- ZUI Javascript组件 -->
<script src="../js/zui.min.js"></script>
<script src="../js/sweetalert.min.js"></script>
</head>
<body>
<br>
<form method="POST">
<center><input type="submit" name="del" class="btn btn-danger" value="清空消息"/></center>
</form>
<?php
$user_get=$_COOKIE['key'];
require("../lib/conn.php");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
 }
//=========================================
//who表存储的是谁给了我们消息
//user记录的是谁，发表了这个评论，who记录谁的
$sql = "SELECT * FROM msg WHERE who='$user_get'";
//==========================================
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  //=========================================================
   while($row = $result->fetch_assoc()) {
      $who = $row['who'];
      $fromid = $row['fromid'];
      $text = $row['text'];
      $time = $row['time'];
      $icon = $row['icon'];
      echo '
      <div class="card">
          <div class="item">
            <div class="item-heading">
            <h4><a href="../user_center.php?name='.$who.'"><img width="50px" height="50px" class="img-circle" src='.$icon.'></a> | <span class="label label-primary">用户'.$who.'发表评论</span> | '.$text.'</h4>
            <CENTER><span class="label label-badge label-primary label-outline"><a href="../tie.php?tid='.$fromid.'">来源帖子ID:'.$fromid.'</a></span></CENTER>
            </div>
        </div>
        </div>';
      
            }
        //===============================================
        } else {
          echo '<div align="center"><h3>空空如也~<h3></div>
            <center><img src="../image/kong.png"class="img-rounded" alt="kong"><center>';
        }

if($_POST["del"])
{
$sql_del = "DELETE from msg where who='$user_get'";
//==========================================
$result_del = $conn->query($sql_del);
Header("Location:./msg_pl.php");
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