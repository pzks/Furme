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
</body>
</html>

<?php
	include_once("./lib/conn.php");
	header("content-type:text/html; charest=UTF-8");
	$id = $_POST['id'];
	$username = $_POST['username'];
	$mail = $_POST['mail'];
	$password = $_POST['password'];
	//-------cravatar头像服务器----------
	$address = strtolower( trim( $mail ) );
	$hash    = md5( $address );
	$icon_url = 'https://cravatar.cn/avatar/'.$hash;
	//==================================
	$sf = "u";
	$gold = "1";
	if(!($id and $username and $mail and $password)){
	echo("输入值不能为空");
}else{

$sqlstr = "insert into register values('".$id."','".$username."','".$mail."','".$password."','".$sf."','".$icon_url."','".$gold."','无昵称') ";
$result = mysqli_query($conn,$sqlstr);

if($result){
	echo '<script language="JavaScript">
	swal({
	  title: "注册成功",
	  text: "您的账号注册成功！",
	  icon: "success",
	  button: "确定",
	})
	.then((willDelete) => {
		location.href="./login.php";
	  }
	);
	</script>'; 
}else{
	echo '<script language="JavaScript">
	swal({
	  title: "注册失败",
	  text: "您的账号注册失败，可能存在相同的ID,EMAIL,用户名等",
	  icon: "error",
	  button: "确定",
	})
	.then((willDelete) => {
		location.href="./login.php";
	  }
	);
	</script>';
}
}
	echo"$id $username $mail $password";
?>
