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
 ?>
        <script>alert('Login Successful');</script>
        <?php
		header("Location: buyerinfo.php");
		
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
