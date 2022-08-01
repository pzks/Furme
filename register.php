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
<script src="http://cdn.bootcss.com/pagedown/1.0/Markdown.Converter.js"></script>
<script src="https://cdn.bootcss.com/showdown/1.3.0/showdown.min.js"></script>
<!-- ZUI Javascript组件 -->
<script src="../js/zui.min.js"></script>
<script src="../js/sweetalert.min.js"></script>
</head>
<body>
	<center>
		<h2>注册界面</h2>
    <form method="post" name="from1" action="register_ok.php">
	     ID： <input  class="aaa" type="text" name="id" value="<?php $a=mt_rand(2000000,999999999999999999);  echo"$a";?>"><br/><br/>
         用户名： <input  class="aaa" type="text" name="username"><br/><br/>
         邮箱： <input  class="aaa" type="text" name="mail"><br/><br/>
	     密码： <input  class="aaa" type="text" name="password"><br/><br/>
	 <input type="submit"name="submit" value="注册"  onClick="myfunction">
	&nbsp;&nbsp;  <a href="index.php"><< 返回上一页</a>
	 <a href="register.php">点击注册</a>
</form>
</body>
</html>