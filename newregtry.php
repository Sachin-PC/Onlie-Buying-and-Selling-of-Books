<?php
session_start();
if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}
include 'sample.php';

if(isset($_POST["btn-signup"]))
{
 $Fname =$_POST['FirstName'];
 $Lname =$_POST['LastName'];
 $Uname =$_POST['UserName'];
 $email =$_POST['Email'];
 $mobno =$_POST['MobileNum'];
 $upass =$_POST['password'];
 echo "<h2>$Fname</h2>";
 if(mysqli_query($conn,"INSERT INTO user(Firstn,Lastn,usern,Em,Mobno,passwrd) VALUES('$Fname','$Lname','$Uname','$email','$mobno','$upass')"))
 {
  ?>
        <script>alert('successfully registered, needs confirmation code ');</script>
       <?php
 }
 else
 {
  ?>
        <script>alert('error while registering you...\n Username already in Use');</script>
        <?php
 }
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login & Registration System</title>
<link rel="stylesheet" href="style.css" type="text/css" />

</head>
<body>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="FirstName" placeholder="First_Name" required /></td>
</tr>
<tr>
<td><input type="text" name="LastName" placeholder="Last_Name" required /></td>
</tr>
<tr>
<td><input type="text" name="UserName" placeholder="User_Name" required /></td>
</tr>
<tr>
<td><input type="email" name="Email" placeholder="Your_Email" required /></td>
</tr>
<tr>
<td><input type="text" name="MobileNum" placeholder="Mobile_No" required /></td>
</tr>
<tr>
<td><input type="password" name="password"" placeholder="Your_Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-signup">Sign Up</button></td>
</tr>
<tr>
<td><a href="login.php">Sign In Here</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>