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
<div class="list">
<hr>
<?php
$keyword = $_GET["keyword"];
require("./lib/conn.php");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
 }
$sql = "select * from tie where title like '%".$keyword."%'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
      $names = $row['user'];
      $title = $row['title'];
      $code = $row['tid'];
      $time = $row['time'];
      $icon = $row['icon'];
	  $name = $row['username'];
      echo '
      <div class="card">
          <div class="item">
            <div class="item-heading">
              <h4><a href="./user/user_center.php?name='.$names.'"><img width="50px" height="50px" class="img-thumbnail" src='.$icon.'></a><a href="./tie.php?tid='.$code.'">'.$title.'</a></h4>
            </div>
            <div class="item-footer">
              <br><a href="#" class="text-muted"><i class="icon-comments"></i> 文章ID:</a> &nbsp; <span class="text-muted">'.$code.'</span>
          <br><a href="#" class="text-muted"><i class="icon-comments"></i> 帖子作者:</a> &nbsp; <span class="text-muted">'.$names.'</span>
          <br><a href="#" class="text-muted"><i class="icon-comments"></i> 发帖时间:</a> &nbsp; <span class="text-muted">'.$time.'</span>
            </div>
          </div>
        </div';
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