<?php
include_once 'sample.php';
session_start();
if(isset($_SESSION["a"])!="")
{
	   header("Location: page.php");
}
if(isset($_POST['btn-login']))
{
 $Uname = $_POST['Username'];
 $upass = $_POST['pass'];
 $_SESSION["tempas"]=$upass;
 $res1=mysqli_query($conn,"SELECT * FROM `user` WHERE Usern='$Uname'");
 $row1=mysqli_fetch_array($res1);
 if(empty($row1))
 {
	?>
                  <script>alert('Sign in before you Login');</script>
              <?php 
 }
 else
 {
 if($row1['passwrd']==($upass))
 {
	     $_SESSION["a"] = $Uname;
		 
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
		header("Location: page.php");
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
<style>

 h1{
text-align:left;
font-size:30pt;
font-family:monotype corsiva;
color: #ffffff;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
	position:fixed;
	top=0;
    width:100%;
}

li {
    float:right;
	}

li a {
    display:block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}
 body {
    background-image: url("ImageB.jpg");
    background-repeat: no-repeat; 
    background-position:top;
    margin:0;
   background-attachment: fixed; 
   }	
   h2{
text-align:right;   
width:70%;
font-size:25pt;
color: #4A338F;
}
#login-form{
h2{
text-align:left;   
width:50%;
font-size:25pt;
color: #4A338F;
}
}
 h3{
text-align:center;   
width:70%;
font-size:20pt;
color: #4A338F;
}
#Reqbook{
h3{
text-align:left;   
width:200%;
font-size:25pt;
color: #4A338F;
}
}
.req{
text-align:center;
width:145%;	
}
</style>
</head>
<body>
<ul> 
  <li><a href="SellerInfo.php">Sell Book</a></li>
  <li><a href="BuyerInfo.php">Request Book</a></li>
  <li><a class="active" href="home.php">Home</a></li>
  <h1><img src="logo2.PNG" alt="image" width="50" height="50"> BOOKSTURNERS </h1>
  </ul>
  <div style="padding:150px;margin-top:0px;height:1000px;">
  <div style="margin-top:0px;width:115%;">
  <h2>Login</h2>
  </div>
<form method="post">
<table align="right" width="30%" border="0">
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
<div id="login-form">
 <div style="margin-top:-65px;width:37%;">
  <h2>Sign Up</h2>
 </div>
<form action="Registration.php" method="post">
<table align="right" width="58%" border="0">
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
</table>
</form>
</div>
<br><br><br><br><br><br><br><br><br><br><br><hr>
<div style="margin-top:-20px;width:37%;">
  <h3>Books for Sale</h3>
  </div>
  <?php
   include 'sample.php';
  $res=mysqli_query($conn,"SELECT Bookname,Author,Branch,Sem FROM `seller` ORDER BY SId DESC LIMIT 4");
print"<hr>";
while($arr=mysqli_fetch_array($res))
{
	print"<strong>BookName:</strong>{$arr['Bookname']}<br>";
	print"<strong>Author:</strong>{$arr['Author']}<br>";
	print"<strong>Branch:</strong>{$arr['Branch']}<br>";
	print"<strong>Sem:</strong>{$arr['Sem']}<br>";
	?>
	<a href="home.php">Login for More Details</a><br>
<?php
	print"<hr>";
}
?>
<div id="Reqbook">
<div style="margin-top:-538px;width:200%;">
  <h3>Needed Book</h3>
  </div>
 <div class="req">
  <?php
  $res3=mysqli_query($conn,"SELECT Bookname,Author,Branch,Sem FROM `buyer` ORDER BY ReqId DESC LIMIT 4");
  print"<hr>";
	while($arr3=mysqli_fetch_array($res3))
	{
	print"<strong>BookName:</strong>{$arr3['Bookname']}<br>";
	print"<strong>Author:</strong>{$arr3['Author']}<br>";
	print"<strong>Branch:</strong>{$arr3['Branch']}<br>";
	print"<strong>Sem:</strong>{$arr3['Sem']}<br>";
	?>
	<a href="home.php">Login for More Details</a><br>
<?php
	print"<hr>";
}
?>
 </div>
 </div>
 </div>
</body>
</html>
<?php
  $flg=$_SESSION["flag"];
if($flg==1)
{
?>
                  <script>alert('Please Login to post');</script>
              <?php
			  $_SESSION["flag"]="0";
}
else if($flg==2)
{
	 ?>
        <script>alert('Error while registering you,Username already in Use');</script>
        <?php
			  $_SESSION["flag"]="0";
}
else if($flg==3)
{
	  ?>
	 <script>alert('Please enter a valid mobile number');</script>
        <?php 
			  $_SESSION["flag"]="0";
}
else if($flg==4)
{
	 ?>
                  <script>alert('Error while online regestration');</script>
              <?php
			  $_SESSION["flag"]="0";
}
else if($flg==5)
{
	 ?>
                  <script>alert('NO Results found');</script>
              <?php
			  $_SESSION["flag"]="0";
}
	
?>
  

 