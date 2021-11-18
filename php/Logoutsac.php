<?php
session_start();
include_once 'sample.php';

if(isset($_SESSION["a"])!="")
{
 header("Location: home.php");
} 
		$Us=$_SESSION["a"];
        $res=mysqli_query($conn,"DELETE FROM `onlineusers` WHERE uname='$Us'");
		mysqli_close($conn);
        session_unset();
        session_destroy();
        header("location:home.php");
?>