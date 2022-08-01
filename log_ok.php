<?php
    if($_POST['uname']){
        $name = $_POST['uname'];
        $pwd = $_POST['pwd'];
        require("./lib/conn.php");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM register WHERE (username ='$name') AND (password='$pwd')";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $names = $row['username'];
                $time=1*60*60*24*365;
                setcookie("key",$names,time()+$time);
                setcookie("password",$pwd,time()+$time);
                Header("Location:./user/user.php"); 
            }
        } else {
            Header("Location:./login.php");
        }
    }
    if($_POST['uname'] == "")
    {
        Header("Location:./login.php");
    }
?>