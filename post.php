<!DOCTYPE html>
<html lang="CN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0;">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Simpost - 发布</title>
<link href="css/zui.min.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="./lib/markdown/css/editormd.min.css">
<script src="js/sweetalert.min.js"></script>
<script src="js/zui.min.js"></script>
</head>
<body>
<div class="panel">
  <div class="panel-heading">
    温馨提示[TIPS]:
  </div>
  <div class="panel-body">
    发布帖子内容若为原创将受到国际CC4.0知识共享许可协议保护，主要为CC-BY-NC-SA的内容，禁止发布违规内容，一旦发现将进行封IP段处理！
  </div>
</div>
<div class="container-fluid">
<form method="post">
<input class="form-control" style="width:350px;" type="text" placeholder="请输入标题" name="title"/>
<hr>
	<div id="md-content" style="z-index: 1 !important;">
	    <textarea name="show"></textarea>
	</div>

</div>
 <!-- 这里必须先引入jquery -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.2/dist/jquery.min.js"></script>
	<!-- 引入js -->
	<script src="./lib/markdown/editormd.min.js"></script>
	<script type="text/javascript">
       //初始化Markdown编辑器
	    var contentEditor;
	    $(function() {
	      contentEditor = editormd("md-content", {
	        width   : "100%",//宽度
	        height  : 500,//高度
	        syncScrolling : "single",//单滚动条
			  path    : "./lib/markdown/lib/",//依赖的包路径
        toolbarIcons : function() {
            // Or return editormd.toolbarModes[name]; // full, simple, mini
            // Using "||" set icons align right.
            return ["undo", "redo", "|", "bold", "hr", "|", "preview", "watch", "|", "fullscreen"]
			}
	      }
        );
        contentEditor.unwatch();
	    });
      
	</script>
<hr>
<center><input type="submit" class="btn btn-primary" name="submit" value="提交发布"/></center>
</div>
</form>

</body>
</html>

<?php
//获取内容
$title = $_POST["title"];
$edit = $_POST["show"];
$user = $_COOKIE['key'];
//===========================
if($_POST["submit"])
{
if($user==""){
echo '<script language="JavaScript">
swal({
  title: "登录后您才能发布帖子",
  text: "只有您登录后您才能发布帖子，请登录",
  icon: "error",
  button: "确定",
})
.then((willDelete) => {
    location.href="./login.php";
  }
);
</script>';
}
else if($edit==null){
echo '<script language="JavaScript">
swal({
  title: "文章内容未输入",
  text: "只有您输入文章内容后才可以发布本文章",
  icon: "error",
  button: "确定",
});
</script>';
}
else if($title==null){
echo '<script language="JavaScript">
swal({
  title: "话题未输入",
  text: "只有您输入话题后才可以发布本文章",
  icon: "error",
  button: "确定",
});
</script>';
}
else{
include "userinfo.php";
$id=md5(uniqid());
$icon = $user_icon;
$name = $user_name;
$time = date("Y-m-d H:i:s");
$tie="<title>".$title."</title>\n <show>".$edit."</show>\n <icon>".$icon."</icon>\n <name>".$name."</name>\n <time>".$time."</time>\n <code>".$id."</code> <topic1>".$topic1."</topic1> <topic2>".$topic1."</topic2> <topic3>".$topic1."</topic3>\n\n".$tie;
$sqlstr_tie = "insert into tie values('".$id."','".$title."','".$user."','".$edit."','".$time."','".$icon."') ";
$result_tie = mysqli_query($conn,$sqlstr_tie);
if($result_tie){
  echo '<script language="JavaScript">
  swal({
    title: "文章发布成功",
    text: "您的文章已经发布成功\n您可以在首页看到这篇文章的全部！",
    icon: "success",
    button: "确定",
  })
  .then((willDelete) => {
      location.href="./index.php";
    }
  );
  </script>';
}else{
  echo '<script language="JavaScript">
  swal({
    title: "文章发布失败",
    text: "您的文章已经发布失败\n",
    icon: "error",
    button: "确定",
  });
  </script>';
}
}
}

?>

<?php
$user_mymy=$_COOKIE['key'];
if($user_mymy==""){
  Header("Location:./error/no_login.php");
}
?>