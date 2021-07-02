<?php
session_start();
if(isset($_SESSION['username'])){
    echo "xin chào ".$_SESSION['username'];
    echo "<form method='post'><input type='submit' name='logout' value='đăng xuất'></form>";
    if(isset($_POST['logout'])){
        unset($_SESSION['username']);
        header('location: login.php');
        exit();
    }
}
else{
    echo "bạn chưa đăng nhập";
}
