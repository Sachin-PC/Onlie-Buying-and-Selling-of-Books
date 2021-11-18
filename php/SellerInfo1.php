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
 echo "<h2>$Bname</h2>";
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
<title>Login & Registration System</title>
<link rel="stylesheet" href="style.css" type="text/css" />

</head>
<body>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="Bookn" placeholder="Book_Name" required /></td>
</tr>
<tr>
<td><input type="text" name="Bookauthor" placeholder="Author_Name" required /></td>
</tr>
<tr>
<td><select name="BRANCH">
<option value="Electronics and Communications">Electronics and Communications</option>
<option value="Computer Science">Computer Science</option>
<option value="Information Science">Information Science</option>
<option value="Electrical Science">Electrical Science</option>
<option value="Civil">Civil</option>
<option value="Mechanical">Mechanical</option>
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
</select>
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
</tr>
<tr>
<td><button type="submit" name="btn-signup">Sign Up</button></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>