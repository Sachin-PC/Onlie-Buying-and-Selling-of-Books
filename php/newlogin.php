<?php
session_start();
include_once 'sample.php';
if(isset($_POST['btn-login']))
{
 $Unme= $_SESSION["a"];
 $usrps = $_SESSION['paswrd'];
 $res=mysqli_query($conn,"SELECT * FROM `user` WHERE Usern='$Unme'");
 $row=mysqli_fetch_array($res);
 if(empty($row))
 {
	?>
                  <script>alert('Sign in before you Login');</script>
              <?php 
			  header("Location: home.php");
 }
 else
 {
 if($row['passwrd']==($usrps))
 {
        $d=mysqli_query($conn,"SELECT UID,Usern FROM `user` WHERE Usern='$Unme'");
		$r=mysqli_fetch_array($d);
		$ID=$r['UID'];
		$U=$r['Usern'];
		$_SESSION["b"] = $ID;
		echo"$ID";
		if(mysqli_query($conn,"INSERT INTO onlineusers(Uid,uname) VALUES('$ID','$U')"))
		{
			?>
        <script>alert('Login Successful');</script>
        <?php
		header("Location: page2.php");
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
			  $_SESSION["flag"]="2";
			  header("Location: home.php");
     }
 }  
}
?>
