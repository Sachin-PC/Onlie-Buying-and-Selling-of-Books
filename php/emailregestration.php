<?php
session_start();
if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}
include 'sample.php';
include 'newregtry.php';
if(isset($_POST["btn-signup"]))
{
 $code=$_POST['Code'];
 if($code=="abcd1234")
 {
  ?>
        <script>alert('successfully registered ');</script>
       <?php
	    echo "<h2>$Fname</h2>";
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
<td><input type="text" name="Code" placeholder="Code_value" required /></td>
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