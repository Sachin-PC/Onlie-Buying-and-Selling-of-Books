<?php
session_start();
if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}
include('sample.php');

if(isset($_POST["btn-signup"]))
{
// Random confirmation code 
$confirm_code=md5(uniqid(rand())); 

// values sent from form 
$Fname=$_POST['FirstName'];
$Lname=$_POST['LastName'];
$Uname=$_POST['UserName'];
$email=$_POST['Email'];
$mobno=$_POST['MobileNum'];
$upass=$_POST['password'];
// Insert data into database 
$sql="INSERT INTO $temp(code,Firstn,Lastn,usern,Em,Mobno,passwrd)VALUES('$confirm_code','$Fname','Lname','Uname','$email','mobno '$upass')";
	$result=mysqli_query($conn,$sql);
	if($result)
	{
$to=$email;

$subject="Your confirmation link here";

$header="from: your name <your email>";

$message="Your Comfirmation link \r\n";
$message.="Click on this link to activate your account \r\n";
$message.="localhost/BookTurners/confirmation.php?passkey=$confirm_code";

$sentmail = mail($to,$subject,$message,$header);
}
else {
	?>
        <script>alert('Email not found');</script>
       <?php
}
// if your email succesfully sent
if($sentmail){
echo "Your Confirmation link Has Been Sent To Your Email Address.";
}
else {
echo "Cannot send Confirmation link to your e-mail address";
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