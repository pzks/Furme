<?php
require("../lib/conn.php");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$user_get_key_name = $_COOKIE['key'];
$user_get_key_pass = $_COOKIE['password'];
$sql_user_get = "SELECT * FROM register WHERE (username ='$user_get_key_name') AND (password='$user_get_key_pass')";
$result_sql_first = $conn->query($sql_user_get);
$row_get = $result_sql_first->fetch_assoc();
$user_id_get = $row_get['id'];
$user_mail = $row_get['mail'];
$user_name = $row_get['username'];
$user_sf = $row_get['sf'];
$user_icon = $row_get['icon'];
$user_nicheng = $row_get['nicheng'];
$user_gold = $row_get['gold'];
?>