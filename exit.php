<!-- 
文件描述 ：登出
copyright (C) 2021 pengzekai
请尊重版权，本文件遵守何乐开源协议
 -->
<html lang="CN">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0;">
<title>Furme</title>
<!-- zui -->
<link href="../css/zui.min.css" rel="stylesheet">
<!-- jQuery (ZUI中的Javascript组件依赖于jQuery) -->
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<!-- ZUI Javascript组件 -->
<script src="../js/zui.min.js"></script>
<script src="../js/sweetalert.min.js"></script>
</head>
<body>
</body>
</html>
<?php
setcookie("key","","");
if($user==""){
echo '<script language="JavaScript">
swal({
  title: "已经退出登录",
  text: "已经退出登录！只有您登录后您才能发布帖子",
  icon: "error",
  button: "确定",
})
.then((willDelete) => {
    location.href="../exit.php";
  }
);
</script>';
}
exit();
?>