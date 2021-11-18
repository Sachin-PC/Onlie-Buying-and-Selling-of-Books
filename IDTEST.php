<html>
<head>
<style>
h1{
text-align:left;
font-size:30pt;
color: #ffff99;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
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

li a:hover {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}
 body {
    background-image: url("Imageb.jpg");
    background-repeat: no-repeat; 
    background-position:top;
    margin:0;
   background-attachment: fixed; 
   #login-form{
width: 360px;
   }
   .heading{
	text-align:right;
font-size:20pt;
}
 }
 .boxed
 {
	  background-color: lightgrey;
    width: 200px;
    padding-left: 0;
     border: 1px solid green;
    margin: 10px;
	text align:left;
 }
 
</style>
</head>
<body>
<ul> 
  <li><a href="login.php">My Account</a></li>
  <li><a href="about.html">About Us</a></li>
  <li><a href="SellerInfo.php">Sell Book</a></li>
  <li><a href="BuyerInfo.php">Request Book</a></li>
  <li><a class="active" href="Home1.html">Home</a></li>

  <h1><img src="images.jpg" alt="image" width="50" height="50"> BOOKSTURNERS </h1>
  </ul>
  
<?php
   include 'sample.php';
  $bbb=mysqli_query($conn,"SELECT MAX(SellerID) from `seller`");
print"<hr>";
$id=mysqli_fetch_array($bbb);
while( $id>=0);
{
	$res=mysqli_query($conn,"SELECT Bookname,Author,Branch,Sem FROM `seller` where SellerID='$id'");
	$arr=mysqli_fetch_array($res);
	print"<strong>BookName</strong>:{$arr['Bookname']}<br>";
	print"Author:{$arr['Author']}<br>";
	print"Branch:{$arr['Branch']}<br>";
	print"Sem:{$arr['Sem']}<br>";
	?>
	<a href="Login.php">More Details</a><br>;
<?php
	print"<hr>";
	$id=$id-1;
}
?>

<div id="login-form">
<div class="boxed">
<h2>Login form</h2>
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
<tr>
<td><a href="registration.php">Sign Up Here</a></td>
</tr>
</table>
</form>
</div>
</body>
</html>
