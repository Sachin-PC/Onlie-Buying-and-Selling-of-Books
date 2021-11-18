 <?php
session_start();
include_once 'sample.php';
if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}
if(isset($_POST['btn-reset']))
{
        $email = $_POST['email'];
        $upass= $_POST['password'];
        $newpassword = $_POST['newpass'];
        $confirmnewpassword = $_POST['confirmnewpass'];
        $result = mysqli_query($conn,"SELECT passwrd FROM user WHERE Em='$email'");
		$oldpassword=$result['passwrd'];
        if(empty($result))
        {
        echo "The email you entered does not exist";
        }
        elseif($upass!=$oldpassword)
        {
        echo "You entered an incorrect password";
        }
		else($newpassword=$confirmnewpassword)
		{
        if(mysqli_query($conn,"UPDATE user SET passwrd='$newpassword' where Em='$email'");
        }
		if($sql)
        {
        echo "You have successfully changed your password";
        }
       else
        {
       echo "Passwords do not match";
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
<td><input type="email" name="email" placeholder="Your_Email" required /></td>
</tr>
<td><input type="text" name="upass" placeholder="old_password" required /></td>
</tr>
<tr>
<td><input type="text" name="newpassword" placeholder="new_password" required /></td>
</tr>
<td><input type="text" name="confirmnewpassword" placeholder="Re-enter_password" required /></td>
</tr>
<tr>
 <td><button type="submit" name="btn-reset">Reset</button></td>
 </tr>
 <td><a href="Login.php">Sign in</a></td>
 </tr>
 </table>
    </form>
</div>
</center>
</body>
</html>

	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
   