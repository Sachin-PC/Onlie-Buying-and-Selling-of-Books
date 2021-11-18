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
h3{
text-align:left;   
width:100%;
font-size:25pt;
color: #4A338F;
}
</style>
</head>
<body>
<ul> 
  <li><a href="about.html">About Us</a></li>
  <li><a href="SellerInfo.php">Sell Book</a></li>
  <li><a href="BuyerInfo.php">Request Book</a></li>
  <li><a class="active" href="home.php">Home</a></li>
  <h1><img src="logo2.PNG" alt="image" width="50" height="50"> BOOKSTURNERS </h1>
  </ul>
  <div style="padding:150px;margin-top:0px;height:500px;">
</body>
</html>  
<?php
session_start();
include 'sample.php';
if(isset($_SESSION["a"])=="")
{
	$_SESSION["flag"]="1";  
	   header("Location: home.php");
}
if(isset($_POST["btn-signup"]))
{
 $usid=$_SESSION["b"];
 $Bname =$_POST['Bookn'];
 $author =$_POST['Bookauthor'];
 $branch =$_POST['BRANCH'];
 $sem =$_POST['SEM'];
 $edition =$_POST['EDITION'];
 $publisheddate =$_POST['Publisheddate'];
 $marketprce=$_POST['Marketprice'];
 $expectedprice =$_POST['Expectedp'];
  $mmm=mysqli_query($conn,"SELECT Mobno FROM `user` WHERE UID='$usid'");
		$nnn= mysqli_fetch_array($mmm);
		$mobno=$nnn['Mobno'];
		echo "<h2>$Bname</h2>";
 if(mysqli_query($conn,"INSERT INTO buyer(UID,Bookname,Author,Branch,Sem,Edition,Publishdate,Mobno,marketp,Expectedprice) VALUES('$usid','$Bname','$author','$branch','$sem','$edition','$publisheddate','$mobno','$marketprce','$expectedprice')"))
 {
  ?>
        <script>alert('successfully registered ');</script>
       <?php
 }
 else
 {
  ?>
        <script>alert('error while registering you...');</script>
        <?php
 }
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" type="text/css" />
<style>
#login-form{
width: 700px;
text-align:center;
padding: 10% 0 0;
position:fixed;
}
</style>
</head>
<body background="bg.jpg" width:500px;height:200px>
<center>
<div id="login-form">
<h2>Request Books</h2>
<form method="post">
<input type="text" name="Bookn" placeholder="Book_Name" required />
<br>

<input type="text" name="Bookauthor" placeholder="Author_Name" required />
<br>
<select name="BRANCH">
<option value="Electronics and Communications">Electronics and Communications</option>
<option value="Computer Science">Computer Science</option>
<option value="Information Science">Information Science</option>
<option value="Electrical Science">Electrical Science</option>
<option value="Civil">Civil</option>
<option value="Mechanical">Mechanical</option>
<option value="Industrial Production">Industrial Production</option>
</select>
<br>

<select name="SEM">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
</select>

<br>

<input type="text" name="EDITION" placeholder="Edition_Name" required />
<br>

<input type="text" name="Publisheddate" placeholder="Publish Date" required />
<br>

<input type="text" name="Marketprice" placeholder="Market_Price" required />
<br>

<input type="text" name="Expectedp" placeholder="Expected_Price" required />
<br>
<br>

<button type="submit" name="btn-signup">Sign Up</button>
</form>
</div>
</center>
</body>
</html>