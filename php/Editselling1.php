<?php
session_start();
include_once 'sample.php';

if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}
 $Us=$_SESSION["a"];
 $res=mysqli_query($conn,"SELECT * FROM `onlineusers` WHERE Uname='$Us'");
 $row=mysqli_fetch_array($res);
 if(empty($row))
 {
	?>
                  <script>alert('Sign in before you Login');</script>
              <?php 
 }
 else
 {
	  $ID=$row['Uid'];
	  $_SESSION["e"]=$ID;
  $edtsel=mysqli_query($conn,"SELECT * FROM `seller` where UID=$ID");
  ?>
<html>
<head>
<style>

 h3{
text-align:center;
font-size:30pt;
font-family:monotype corsiva;
color: #000000;
}
 h4{
text-align:center;
font-size:30pt;
font-family:monotype corsiva;
color: #000000;
}
</style>
</head>
<body>
<br>
<h3>Your Posts</h3>
<hr>
</body>
</html>
<?php
 }
$i=0;
$sss=mysqli_query($conn,"SELECT * FROM `seller` where UID=$ID");
$selpst=mysqli_fetch_array($sss);
if(empty($selpst))
{
	?>
	<script>alert('You have No posts to be edited');</script>
	<a href="Sellerinfo.php">Click here to Sell Book</a>
	<br>
	<a href="page.php">Back</a>
	<?php
}
else
{	
 while($arr=mysqli_fetch_array($edtsel))
 { 
	 print"<strong>POSTID</strong>:{$arr['SId']}<br>";
	print"<strong>BookName</strong>:{$arr['Bookname']}<br>";
    print"<strong>Author</strong>:{$arr['Author']}<br>";
	print"<strong>Branch</strong>:{$arr['Branch']}<br>";
	print"<strong>Sem</strong>:{$arr['Sem']}<br>";
	print"<strong>Edition</strong>:{$arr['Edition']}<br>";
	print"<strong>Published Date</strong>:{$arr['Publishdate']}<br>";
	print"<strong>Mobile Number</strong>:{$arr['Mobno']}<br>";
	print"<strong>Market Price</strong>:{$arr['Mrp']}<br>";
	print"<strong>Selling Price</strong>:{$arr['Sellingprice']}<br>";
	print"<hr>";
	$a[$i++]=$arr['SId'];
 }  
print"<h4>Please Enter the POSTID of the post which is to be Edited</h4>";
 if(isset($_POST['btn-login']))
{
 $psti = $_POST['pppp'];
 for($k=0;$k<=$i;$k++)
 {
 if($psti==$a[$k])
 {
 $_SESSION["pstnumsel"]=$psti;
 $usrd = $_SESSION["e"];
 $pstedt=mysqli_query($conn,"SELECT * FROM `seller` WHERE  UID= $usrd AND SId= $psti");
 while($edtrow=mysqli_fetch_array($pstedt))
 {
  $bname=$edtrow['Bookname'];
     $_SESSION["da"]=$bname;
	 $aname=$edtrow['Author'];
	 $_SESSION["an"]=$aname;
	 $edtn=$edtrow['Edition'];
	 $_SESSION["e"]=$edtn;
	 $pbd=$edtrow['Publishdate'];
	 $_SESSION["p"]=$pbd;
	 $mbno=$edtrow['Mobno'];
	 $_SESSION["m"]=$mbno;
	 $mrktp=$edtrow['Mrp'];
	 $_SESSION["mprc"]=$mrktp;
	 $selp=$edtrow['Sellingprice'];
	 $_SESSION["sprc"]=$selp;
	 header("Location: EditSelling2.php");
	
  }
 }
}
	{
	?>
                  <script>alert('Incorrect post number');</script>
              <?php 
    }
 }
 if(isset($_POST['btn-delete']))
{
 $pstid = $_POST['pppp'];
 for($k=0;$k<=$i;$k++)
 {
 if($pstid==$a[$k])
 {
 $_SESSION["pstnumseldel"]=$pstid;
 $usrdtd = $_SESSION["e"];
 $delreq=mysqli_query($conn,"DELETE FROM `seller` where UID=$usrdtd AND SID=$pstid");
 ?>
                  <script>alert('DELETED Successfully');</script>
              <?php 
			  
			  header("Location: Editselling1.php");
			  
 }
 }
 {
	?>
                  <script>alert('Incorrect post number');</script>
              <?php 
    }
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<style>
body {
    background-repeat: no-repeat;
    background-size:cover;	
    background-position:top;
    margin:0;
   background-attachment: fixed; 
   }
</style>
<body>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="pppp" placeholder="Post_idname" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">EDIT</button></td>
</tr>
<tr>
<td><button type="submit" name="btn-delete">DELETE</button></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>
<?php
}
?>