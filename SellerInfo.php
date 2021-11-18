<?php
session_start();
if(isset($_SESSION["a"])=="")
{
	$_SESSION["flag"]="1";  
	   header("Location: home.php");
}
include 'sample.php';
if(isset($_POST["btn-signup"]))
{
 $usid=$_SESSION["b"];
 $Bname =$_POST['Bookn'];
 $author =$_POST['Bookauthor'];
 $branch =$_POST['BRANCH'];
 $sem =$_POST['SEM'];
 $edition =$_POST['EDITION'];
 $publisheddate =$_POST['Publisheddate'];
 $mrp =$_POST['Marketprice'];
 $sellingprice =$_POST['Sellingp'];
 $d=mysqli_query($conn,"SELECT Mobno FROM `user` WHERE UID='$usid'");
		$r=mysqli_fetch_array($d);
		$mobno=$r['Mobno'];
 if(mysqli_query($conn,"INSERT INTO seller(UID,Bookname,Author,Branch,Sem,Edition,Publishdate,Mobno,Mrp,Sellingprice) VALUES('$usid','$Bname','$author','$branch','$sem','$edition','$publisheddate','$mobno','$mrp','$sellingprice')"))
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
<title>Seller Info</title>
<style>
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
    background-image: url("sell.jpg");
    background-repeat: no-repeat; 
    background-position:bottom;
    margin:0;
   background-attachment: fixed; 
   }
   h1{
text-align:left;
font-size:30pt;
font-family:monotype corsiva;
color: #ffffff;
}

input{
	width: 100%;
	height: 30px;
}
select{
	width: 100%;
}
table{
	margin-top: 2%;
}
 </style>

</head>
<body>
<ul> 
  <li><a href="Logout.php">Logout</a></li>
  <li><a class="active" href="SellerInfo.php">Sell Book</a></li>
  <li><a href="BuyerInfo.php">Request Book</a></li>
  <li><a href="home.php">Home</a></li>
  <h1><img src="logo2.PNG" alt="image" width="50" height="50"> BOOKSTURNERS </h1>
  </ul>
<center>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/><br/><br/><br/>
<div id="login-form">
<form method="post">
<table align="center" width="20%" border="0">
<tr>
<td><input type="text" name="Bookn" placeholder="Book_Name" required /></td>
</tr>
<tr>
<td><input type="text" name="Bookauthor" placeholder="Author_Name" required /></td>
</tr>
<tr>
<td><select name="BRANCH">
<option value="Electronics and Communications">Electronics</option>
<option value="Computer Science">Computer Science</option>
<option value="Information Science">Information Science</option>
<option value="Electrical Science">Electrical Science</option>
<option value="Civil">Civil</option>
<option value="Mechanica">Mechanical</option>
<option value="Industrial Production">Industrial Production</option>
</select>
</td>
</tr>
<tr>
<td><select name="SEM">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
</select></label>
</td>
</tr>
<tr>
<td><input type="text" name="EDITION" placeholder="Edition_Name" required /></td>
</tr
<tr>
<td><input type="text" name="Publisheddate" placeholder="Publish Date" required /></td>
</tr>
<tr>
<td><input type="text" name="Marketprice" placeholder="Market_Price" required /></td>
</tr>
<tr>
<td><input type="text" name="Sellingp" placeholder="Selling_Price" required /></td>
<td><center><button type="submit" name="btn-signup">Post</button></center></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>