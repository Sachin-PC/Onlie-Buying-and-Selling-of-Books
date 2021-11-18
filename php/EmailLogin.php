<?php
session_start();
include_once 'sample.php';

if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}
if(isset($_POST['btn-login']))
{
 $Email = $_POST['E-mail'];
 $upass = $_POST['pass'];
 $res=mysqli_query($conn,"SELECT * FROM `user` WHERE Em='$Email'");
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
 ?>
        <script>alert('Login Successful');</script>
        <?php
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
<title>cleartuts - Login & Registration System</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="email" name="E-mail" placeholder="Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">Sign In</button></td>
</tr>
<tr>
<td><a href="registration.php">Sign Up Here</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>