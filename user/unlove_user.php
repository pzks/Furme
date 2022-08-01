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
require("../lib/conn.php");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
 }
$user_get_name = $_COOKIE['key'];//获取用户cookie
$mylove_get_pack = $_POST["getname"];
//echo $user_get_name."<br>";
//echo $mylove_get_pack;
//上面是调试输出用户名和关注的用户
$sqlstr_un = "DELETE from love WHERE (my='$user_get_name') AND (mylove='$mylove_get_pack')";
$result_un = mysqli_query($conn,$sqlstr_un);
if($result_un){
 echo '<script language="JavaScript">
       swal({
         title: "取消关注成功",
         text: "已经成功的从列表中移除该用户",
         icon: "success",
         button: "确定",
       })
       .then((willDelete) => {
         location.href="./love.php";
       }
     );
       
       </script>';
    }else{
        echo '<script language="JavaScript">
        swal({
          title: "取消关注错误",
          text: "取消关注失败",
          icon: "error",
          button: "确定",
        })
        .then((willDelete) => {
          location.href="./love.php";
        }
      );
        
        </script>';
        

    }
?>