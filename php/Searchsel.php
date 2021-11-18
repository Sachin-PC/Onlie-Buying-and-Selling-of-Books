<?php
session_start();
include_once 'sample.php';

if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}

 $serr=$_SESSION['search'];
 $res=mysqli_query($conn,"SELECT * FROM `seller` WHERE Bookname like '%$serr%' || Author like '%$serr%'");
 $rrr=mysqli_query($conn,"SELECT * FROM `seller` WHERE Bookname like '%$serr%' || Author like '%$serr%'");
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
<h3>Books For Sale</h3>
<hr>
</body>
</html>
<?php
$row=mysqli_fetch_array($rrr);
if(empty($row))
   {
	$_SESSION["flag"]="5"; 
	header("Location: page.php");
   }
   else
   {
    while($arr=mysqli_fetch_array($res))
    {
	print"<strong>BookName</strong>:{$arr['Bookname']}<br>";
	print"Author:{$arr['Author']}<br>";
	print"Branch:{$arr['Branch']}<br>";
	print"Sem:{$arr['Sem']}<br>";
	print"Edition:{$arr['Edition']}<br>";
	print"Publishdate:{$arr['Publishdate']}<br>";
	print"Mobno:{$arr['Mobno']}<br>";
	print"Mrp:{$arr['Mrp']}<br>";
	print"Sellingprice:{$arr['Sellingprice']}<br>";
	print"<hr>";
   }
   }
?>