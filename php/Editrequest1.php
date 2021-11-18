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
  $edtreq=mysqli_query($conn,"SELECT * FROM `buyer` where UID=$ID");
print"<hr>";
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
$bbb=mysqli_query($conn,"SELECT * FROM `buyer` where UID=$ID");
$reqpst=mysqli_fetch_array($bbb);
if(empty($reqpst))
{ 
     $flg=$_SESSION["flag"];
    if($flg==7)
    {
     ?>
                  <script>alert('Your Deleteion was succesfull, no further posts to be edited');</script>
              <?php
			  $_SESSION["flag"]="0";
    }
	else
	{
	?>
	<script>alert('You have No posts to be edited');</script>
	<?php
	}
	?>
	<a href="Buyerinfo.php">Click here to Request Book</a>
	<br>
	<a href="page.php">Back</a>
	<?php
}
else
{
while($arr=mysqli_fetch_array($edtreq))
{ 
	 print"<strong>POSTID</strong>:{$arr['ReqID']}<br>";
	print"<strong>BookName</strong>:{$arr['Bookname']}<br>";
    print"Author:{$arr['Author']}<br>";
	print"Branch:{$arr['Branch']}<br>";
	print"Sem:{$arr['Sem']}<br>";
	print"Edition:{$arr['Edition']}<br>";
	print"Market Price:{$arr['marketp']}<br>";
	print"Expected Price:{$arr['Expectedprice']}<br>";
	print"<hr>";
	$a[$i++]=$arr['ReqID'];
 }  
 print"<h4>Please Enter the POSTID of the post which is to be Edited</h4>";
 if(isset($_POST['btn-login']))
{
 $psti = $_POST['pppp'];
 for($k=0;$k<=$i;$k++)
 {
 if($psti==$a[$k])
 {
 $_SESSION["pstnumreq"]=$psti;
 $usrd = $_SESSION["e"];
 $pstedt=mysqli_query($conn,"SELECT * FROM `buyer` WHERE  UID= $usrd AND ReqID= $psti");
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
	 $mrktp=$edtrow['marketp'];
	 $_SESSION["mprc"]=$mrktp;
	 $exprc=$edtrow['Expectedprice'];
	 $_SESSION["eprc"]=$exprc;
	 header("Location: EditRequest2.php");
	
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
 $_SESSION["pstnumreqdel"]=$pstid;
 $usrdtd = $_SESSION["e"];
 $delreq=mysqli_query($conn,"DELETE FROM `buyer` where UID=$usrdtd AND ReqID=$pstid");
 $delb=mysqli_query($conn,"SELECT * FROM `buyer` where UID=$usrdtd");
 $delreqpst=mysqli_fetch_array($delb);
 if(empty($delreqpst))
 {
	?>
	<script>alert('Your Deletion was Successful.You have No Further posts to be edited');</script>
	<?php
	$_SESSION['flag']="7";
	header("Location: Editrequest1.php");
	exit();
 }
 else
 {
 ?>
                  <script>alert('DELETED Successfully');</script>
              <?php 
			    header("Location: Editrequest1.php");
			  
 }
 }
 }
 for($k=0;$k<=$i;$k++)
 {
 if($pstid!=$a[$k])
 {
	?>
                  <script>alert('Incorrect post number');</script>
              <?php 
    }
 }
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<style>
body {
    background-image: url("kingston.jpg");
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