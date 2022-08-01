<!DOCTYPE html>
<html lang="CN">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0;">
<title>Simpost - 更轻便的文章系统</title>
<!-- zui -->
<link href="./css/zui.min.css" rel="stylesheet">
<!-- jQuery (ZUI中的Javascript组件依赖于jQuery) -->
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://cdn.bootcss.com/pagedown/1.0/Markdown.Converter.js"></script>
<script src="https://cdn.bootcss.com/showdown/1.3.0/showdown.min.js"></script>
<!-- ZUI Javascript组件 -->
<script src="./js/zui.min.js"></script>
<script src="./js/sweetalert.min.js"></script>
</head>
<body>
  <hr>
<center>
<div class="card">
    <form method="POST" action="log_ok.php">
<div class="input-control has-icon-left">
  <input type="text" class="form-control" name="uname" placeholder="用户名">
  <label class="input-control-icon-left"><i class="icon icon-user "></i></label>
</div>
<div class="input-control has-icon-right">
  <input name="pwd"type="password" class="form-control" placeholder="密码">
  <label class="input-control-icon-right"><i class="icon icon-key"></i></label>
</div>
<br>
        <input class="btn btn-primary" type="submit" name="submit"><br><a href="register.php">没有账号？注册一个！</a>
    </form>
    </div>
</center>
</body>
</html>
<?php
//获取内容
$user1 = $_COOKIE['key'];
if($user1=="") 
{
}else{
Header("Location:./user/user.php");
}
?>