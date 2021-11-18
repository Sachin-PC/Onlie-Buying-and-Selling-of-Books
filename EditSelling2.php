<?php
session_start();
if(isset($_SESSION["a"])=="")
{
 header("Location: home.php");
}
include 'sample.php';

if(isset($_POST["btn-signup"]))
{
	$usid=$_SESSION["b"];
 $ptno=$_SESSION["pstnumsel"];
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
 if(mysqli_query($conn,"UPDATE `seller` SET Bookname='$Bname',Author='$author',Branch='$branch',Sem='$sem',Edition='$edition',Publishdate='$publisheddate',Mobno='$mobno',Mrp='$mrp',Sellingprice='$sellingprice' WHERE SID='$ptno'"))
 {
  ?>
        <script>alert('successfully EDITED ');</script>
       <?php
	   header("Location: EditSelling1.php");
 }
 else
 {
  ?>
        <script>alert('error while EDITING...');</script>
        <?php
 }
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login & Registration System</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<style>
h1{
text-align:left;
font-size:30pt;
font-family:monotype corsiva;
color: #ffffff;
}
h3
{
	text-align:center;
	color:black;
}
ul {
    list-style-type: none;
    margin: -8px ;
    padding: 0;
    overflow: hidden;
    background-color: #333;
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


.show {display:block;}
.clear {
	clear:both
}


#gallery {
	float:right;
	position:relative;
	height:1050px;
	margin:-100px;
	width:700px;
}
	#gallery a {
		float:center;
		width:500px;
		position:absolute;
	}
	
	#gallery a img {
		float:r;
		width:500px;
		border:none;
	
	}

	#search-bar{
	float:right;
	}
	#search-button{
	float:right;
	}
	body {
    background-image: url("oldbook.jpg");
    background-repeat: no-repeat;
    background-size:cover;	
    background-position:top;
    margin:0;
   background-attachment: fixed; 
   }
</style>
</head>
<body>
<ul> 
  <form method="post">
  <li><a href="logout.php">Logout</a></li>
  <li><a href="SellerInfo.php">Sell Book</a></li>
  <li><a href="BuyerInfoNew.php">Request Book</a></li>
  <li><a class="active" href="home.php">Home</a></li>
  <h1><img src="logo2.png" alt="image" width="50" height="50"> BOOKSTURNERS </h1>
      <table align="center" width="30%" border="0">
     <tr>
     <td><input type="text" name="Search" placeholder="BookName/Author for Sell" required /></td>
     <td><button type="submit" name="btn-submit">SEARCH</button></td>
	 </form>
	 <form method="post">
	  <td><input type="text" name="Search1" placeholder="BookName/Author for buy" required /></td>
     <td><button type="submit" name="btn-submit1">SEARCH</button></td>
	 </tr>
     </table>
  </ul>
  </form>
  <br>
  <br>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<?php
$Us=$_SESSION["a"];   //USERNAME
$d=$_SESSION["e"];    //USERID
$bname=$_SESSION["da"];  //Bookname
$aut=$_SESSION["an"];   //AUTHOR
 $en=$_SESSION["e"];   //EDITION
$pdt=$_SESSION["p"];   //Publisheddate
 $mktprc=$_SESSION["mprc"]; //MARKET PRICE
  $selprc=$_SESSION["sprc"];//SELLING PRICE
 ?>
 <tr>
<td>Book Name<input type="text" name="Bookn" value=<?php echo"$bname"; ?> /></td>
</tr>
<tr>
<td>Author name: <input type="text" name="Bookauthor" value=<?php echo"$aut"; ?> required /></td>
</tr>
<tr>
<td>Branch<select name="BRANCH">
<option value="Electronics and Communications">Electronics and Communications</option>
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
<td>Semester: <select name="SEM">
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
<td>Edition: <input type="text" name="EDITION" value=<?php echo"$en"; ?> required /></td>
</tr
<tr>
<td>Published Date: <input type="text" name="Publisheddate" value="<?php echo"$pdt"; ?>" required /></td>
</tr>
<tr>
<td>Market Price: <input type="text" name="Marketprice" value=<?php echo"$mktprc"; ?> required /></td>
</tr>
<tr>
<td>Selling Price: <input type="text" name="Sellingp" value=<?php echo"$selprc"; ?> required /></td>
</tr>
<tr>
<td><center><button type="submit" name="btn-signup">Edit</button></center></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>