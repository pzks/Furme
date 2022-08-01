# **Furme**

![](image/1.png)
Furme是由开发者pengzekai独自开发的一个开源的社区框架，相比于simpost，Furme更加易用，Furme在simpost的基础上使用了mysql，并且优化了评论系统，也加入了关注，分享等新功能，为了方便移动使用，完善了移动ui，需要配合fusion app打包使用，相比于simpost也完善了用户系统，将用户名和昵称分开，完善了财务系统，在登录处做了限制，防止过长的数据等，同样的，加入了搜索功能，让寻找帖子更加快速，也完善了发布系统，优化了markdown编辑器对移动端的适配，并将其分开分成动态和图文两块，删除了话题系统。

### furme的目标是为小众圈子提供一个更加简单搭建方案

### 如何使用furme
目前版本的furme还没有安装功能，需要大家手动配置上传代码文件夹里的`my.sql`文件到数据库里然后配置`lib/conn.php`里的代码，来连接数据库

```
<?php
$mysql_server_name = 'localhost'; //数据库服务器
$mysql_username = 'my'; //数据库用户名
$mysql_password = '123456789'; //数据库密码
$mysql_database = 'my'; //数据库名
$conn = mysqli_connect($mysql_server_name,$mysql_username,$mysql_password,$mysql_database);
if (mysqli_connect_errno($conn)) 
{ 
	die("连接 MySQL 失败: " . mysqli_connect_error()); 
}
?>
```


### 使用到的项目

#### sweetalert弹窗：https://sweetalert.bootcss.com/
#### markdown编辑器：https://pandao.github.io/editor.md/
#### Strapdown.js解释器：https://github.com/arturadib/strapdown/
#### jquery前端：https://jquery.com/
#### openzui前端：http://www.openzui.com/
#### share.js分享

### 捐赠
如果你觉得对你有帮助的话可以考虑捐赠作者，谢谢！


