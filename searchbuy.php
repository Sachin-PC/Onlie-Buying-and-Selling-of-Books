<?php
session_start();
include_once 'sample.php';

if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}

 $serr=$_SESSION['search'];
 $res1=mysqli_query($conn,"SELECT * FROM `buyer` WHERE Bookname like '%$serr%' || Author like '%$serr%'");
 $bbb=mysqli_query($conn,"SELECT * FROM `buyer` WHERE Bookname like '%$serr%' || Author like '%$serr%'");
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
</style>
</head>
<body>
<h3>Books In Demand</h3>
<hr>
</body>
</html>
<?php
$row=mysqli_fetch_array($bbb);
if(empty($row))
   {
	$_SESSION["flag"]="5"; 
	header("Location: page.php");
   }
   else
   {
   while($arr=mysqli_fetch_array($res1))
   {
	print"<strong>BookName</strong>:{$arr['Bookname']}<br>";
	print"Author:{$arr['Author']}<br>";
	print"Branch:{$arr['Branch']}<br>";
	print"Sem:{$arr['Sem']}<br>";
	print"Edition:{$arr['Edition']}<br>";
	print"Publishdate:{$arr['Publishdate']}<br>";
	print"Mobno:{$arr['Mobno']}<br>";
	print"Mrp:{$arr['marketp']}<br>";
	print"Expectedprice:{$arr['Expectedprice']}<br>";
	print"<hr>";
   }
   }
?>