<!DOCTYPE html>
<html lang="CN">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0;">
<title>FURME-友好的交流社区-圈子交流中心</title>
<!-- zui -->
<link href="../css/zui.min.css" rel="stylesheet">
<!-- jQuery (ZUI中的Javascript组件依赖于jQuery) -->
<script src="./js/jquery-1.11.0.min.js"></script>
<script src="./js/Markdown.Converter.js"></script>
<script src="./js/showdown.min.js"></script>
<!-- ZUI Javascript组件 -->
<script src="../js/zui.min.js"></script>
<script src="../js/sweetalert.min.js"></script>
<link rel="stylesheet" href="./share.js/dist/css/share.min.css">
</head>
<body>
<br>
<div class="list">
<?php
$tid = $_GET["tid"];
require("./lib/conn.php");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
 }
$sql_getname = "SELECT * FROM tie WHERE tid='$tid'";
$result_getname = $conn->query($sql_getname);
$row_u = $result_getname->fetch_assoc();
$uname = $row_u['user'];
$sql = "SELECT * FROM tie,register WHERE (tie.tid='$tid') and (register.username='$uname')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
      $names = $row['user'];
      $title = $row['title'];
      $code = $row['tid'];
      $time = $row['time'];
      $icon = $row['icon'];
	  $name = $row['username'];
	  $show = $row['neirong'];
    $nicheng = $row['nicheng'];
      echo '
<div class="card">
<div id="section">
<img width="100px" height="100px" class="img-thumbnail" src='.$icon.'>
</div>
<div id="user">
<div style="text-align:right;" ><span class="label label-warning">帖子作者:'.$nicheng.'</span></div>
<div style="text-align:right;" ><span class="label label-primary label-outline">文章ID:'.$code.'</span></div>
<div style="text-align:right;" ><span class="label label-primary">发帖时间:'.$time.'</span></div>
</div>
<style type="text/css">
#section {
    width:160px;
	height:130px;
    float:left;
}
#user {
	height:130px;
}
</style>
<br><br>
<hr>
<br>
<h1><div>'.$title.' </div></h1>
<div>
<article style="display:none;">
'.$show.'
</article >
</div>
<div id="out">
</div>
<div>
';
}
}else {
 echo '<div align="center"><h3>空空如也~<h3></div>
            <center><img src="./image/kong.png"class="img-rounded" alt="kong"><center>';
 Header("Location:./error/no_tie.php");
}

?>
<script type="text/javascript">
    var target = document.querySelector("article")
    var c = new Markdown.Converter()
    var html = c.makeHtml(document.querySelector("article").innerText)
    document.getElementById('out').innerHTML = html
</script>



<?php
$tid_love = $_GET["tid"];
$sql_getname_love = "SELECT * FROM tie WHERE tid='$tid_love'";
$result_getname_love = $conn->query($sql_getname_love);
$row_u_love = $result_getname_love->fetch_assoc();
$uname_love = $row_u_love['user'];//得到本帖子的用户信息
//=============================================
$user_get_name_myself = $_COOKIE['key'];
$sql_get_my = "SELECT * FROM love WHERE my='$user_get_name_myself' AND mylove='$uname_love'";//从数据库筛选用户信息
$result_get_my = $conn->query($sql_get_my);//重新定义一个变量
if ($result_get_my->num_rows > 0) {
  echo '<form method="post">
  <center><input type="submit" name="have_loved" class="btn btn-success" value="已关注"/></center>
  </form>';
}else{
  echo '<form method="post">
  <center><input type="submit" name="love" class="btn btn-danger" value="关注"/>
  </center>
  </form>';
}
if($_POST["have_loved"])
{
  echo '<script language="JavaScript">
swal({
  title: "您已经关注了这个用户",
  text: "您不能再关注一个已经关注了的用户！",
  icon: "error",
  button: "确定",
});
location.replace();
</script>';
}

if($_POST["love"])
{
  $sqlstr = "insert into love values('".$user_get_name_myself."','".$uname_love."') ";
  $result = mysqli_query($conn,$sqlstr);
  
  if($result){
    echo '<script language="JavaScript">
swal({
  title: "关注成功",
  text: "您已经成功的关注了这个用户",
  icon: "success",
  button: "确定",
}).then((willDelete) => {
  location.href="./tie.php?tid='.$tid_love.'";
}
);
</script>';
  }else{
    echo '<script language="JavaScript">
swal({
  title: "您已经关注了这个用户",
  text: "您不能再关注一个已经关注了的用户！",
  icon: "error",
  button: "确定",
})
.then((willDelete) => {
  location.href="./tie.php?tid="'.$tid_love.';
}
);
</script>';
  }
}
?>


<li class="row">
      <center><div class="social-share" data-sites="weibo, qzone,facebook,twitter"></div></center>
</li>




<hr>
<form method="post">
<textarea type="text" class="form-control" name="pinglunneirong"></textarea>
<br>
<center><input type="submit" class="btn btn-primary" name="submit" value="提交发布"/></center>
</form>
<?php
//获取内容
$edit1 = $_POST["pinglunneirong"];
$user1 = $_COOKIE['key'];//自己的用户名
$tid = $_GET["tid"];
$fromid = $_GET["tid"];

//===========================
if($_POST["submit"]) {
	if($user1=="") {
		echo '<script language="JavaScript">
swal({
  title: "登录后您才能发布评论",
  text: "只有您登录后您才能发布评论，请登录",
  icon: "error",
  button: "确定",
})
.then((willDelete) => {
    location.href="./index.php";
  }
);

</script>';
	} else {
		$time_pl = date("Y-m-d H:i:s");
    //==============================================
    $sql_who = "SELECT * FROM tie WHERE tid='$tid'";
    $result_who = $conn->query($sql_who);//获取帖子用户名
    $row_who = $result_who->fetch_assoc();
    $name_who = $row_who['user'];//这个是发布原帖子的作者用户名
    $leixing = 1;//类型1是评论
    $user_key = $_COOKIE['key'];
    $sql_user_1 = "SELECT * FROM register WHERE username='$user_key'";
    $result_user_1 = $conn->query($sql_user_1);//获取帖子用户名，在数据库里查询相关字段
    $row_user_1 = $result_user_1->fetch_assoc();//将字段取得一行作为关联 |数组|（重要）
    $icon_get = $row_user_1['icon'];//这个是发布者的头像获取
    //===========================================
		$sqlstr_pl = "insert into pinglun values('".$tid."','".$user1."','".$name_who."','".$edit1."','".$time_pl."','".$icon_get."') ";
    $result_pl = mysqli_query($conn,$sqlstr_pl);//插入到评论表中
		if($result_pl){//如果返回数据成功，执行下面sql查询
    $sqlstr_msg = "insert into msg values('".$tid."','".$user1."','".$name_who."','".$edit1."','".$time_pl."','".$icon_get."','1') ";
    mysqli_query($conn,$sqlstr_msg);//执行插入数据到msg表中
		}else{//评论失败
			echo '<script language="JavaScript">
swal({
  title: "评论发布失败",
  text: "您的评论已经发布成功\n您可以在帖子下看到评论的全部！",
  icon: "error",
  button: "确定",
})
</script>';
    
		}
	}
}
?>
<hr>
<?php
//=====================================================
require("./lib/conn.php");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
//=====================================================
$tid = $_GET["tid"];//取得id
$sql_plq = "SELECT * FROM pinglun WHERE tid='$tid'";//从评论表中筛选和文章id相同的评论
$result_plq = $conn->query($sql_plq);//查询
if ($result_plq->num_rows > 0) {
   while($row_plq = $result_plq->fetch_assoc()) {
      $names_plq = $row_plq['user'];
      $neirong_plq = $row_plq['neirong'];
      $time_plq = $row_plq['time'];
      $icon_plq = $row_plq['icon'];
      echo '
  <div class="card">
	<div class="comment">
  <a class="avatar">
  <img width="50px" height="50px" class="img-thumbnail" src='.$icon_plq.'>
  </a>
  <div class="content">
    <div class="pull-right text-muted">'.$time_plq.'</div>
    <div><a href="###"><strong>'.$names_plq.'</strong></a> <span class="text-muted">回复</span> <a href="###">'.$names.'</a></div>
    <div class="text">'.$neirong_plq.'</div>
    <div class="actions">
    </div>
  </div>
</div>
</div>';
}
        } else {
          echo '<div align="center"><h3>还没有评论，快来抢沙发吧~<h3></div>
            <center><img src="./image/kong.png"class="img-rounded" alt="kong"><center>';
        }

?>
</div>
</div>
<center><span class="label label-info">已经到底啦！再看看其他吧，这里什么都没有了~~</span></center>
<hr>
<br>
<script src="./share.js/src/js/social-share.js"></script>
<script src="./share.js/src/js/qrcode.js"></script>
</body>
</html>