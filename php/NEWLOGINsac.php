<?php
session_start();
include_once 'sample.php';

if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}
if(isset($_POST['btn-login']))
{
 $Uname = $_POST['Username'];
  $_SESSION["a"] = $Uname;
 $upass = $_POST['pass'];
 $res=mysqli_query($conn,"SELECT * FROM `user` WHERE Usern='$Uname'");
 $row=mysqli_fetch_array($res);
 if(empty($row))
 {
	?>
                  <script>alert('Sign in before you Login');</script>
              <?php 
 }
 else
 {
 if($row['passwrd']==($upass))
 {
        $d=mysqli_query($conn,"SELECT UID FROM `user` WHERE Usern='$Uname'");
		$r=mysqli_fetch_array($d);
		$ID=$r['UID'];
		$_SESSION["b"] = $ID;
		echo"$ID";
		if(mysqli_query($conn,"INSERT INTO onlineusers(Uid,uname) VALUES('$ID','$Uname')"))
		{
			?>
        <script>alert('Login Successful');</script>
        <?php
		header("Location: Editopt.php");
		}
		else
	 {
          ?>
                  <script>alert('Error while online regestration');</script>
              <?php
     }
 }
 else
	 {
          ?>
                  <script>alert('wrong details');</script>
              <?php
     }
 }  
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login & Registration System</title>
<style>
h1{
text-align:left;
font-size:50pt;
color: #ffff99;
}
h2{
font-size:30pt;
}
#login-form{
background-color:#ffcc99;
width: 360px;
  padding: 1% 0 0;
  margin: auto;
  opacity: 0.6;
    
 box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
</style>
</head>
<h1> BOOKSTURNERS </H1>
<body background="books.jpg" width:500px;height:200px;>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="Username" placeholder="User_name" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">Sign In</button></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>