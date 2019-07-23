<?php
session_start();
require 'dbconfig/config.php';
$msg=$_POST['msg'];
$name=$_SESSION['username'];
$date=date("Y-m-d H:i:s");
$sq1="insert into posts(name,msg,date) values('$name','$msg','$date')";
$result=$con->query($sq1);
header("Location:homepage.php");
?>