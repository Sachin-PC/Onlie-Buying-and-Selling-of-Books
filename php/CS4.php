<?php
session_start();
include_once 'sample.php';

 $res=mysqli_query($conn,"SELECT * FROM `seller` WHERE Branch='Computer Science' AND SEM=4");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sem 4</title>
<style>
.sell{
	width:50%;
	float:left;
	
}
.buy{
	width:50%;
	float:right;
}
</style>
</head>
<body>
<div class="sell">
<h3 style="color:#4A338F;font-size:17pt;">Books for sale</h3>
<?php
print"<hr>";
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
?>
</div>
<div class="buy">
	<h3 style="color:#4A338F;font-size:17pt;">Needed book</h3>
	
<?php
$res=mysqli_query($conn,"SELECT * FROM `buyer`WHERE Branch='Computer Science'AND SEM=4");
print"<hr>";
while($arr=mysqli_fetch_array($res))
{
	print"<strong>BookName:</strong>{$arr['Bookname']}<br>";
	print"<strong>Author:</strong>{$arr['Author']}<br>";
	print"<strong>Branch:</strong>{$arr['Branch']}<br>";
	print"<strong>Sem:</strong>{$arr['Sem']}<br>";
	print"<strong>Edition:</strong>{$arr['Edition']}<br>";
	print"<strong>Publishdate:</strong>{$arr['Publishdate']}<br>";
	print"<strong>Mobno:</strong>{$arr['Mobno']}<br>";
	print"<strong>Mrp:</strong>{$arr['marketp']}<br>";
	print"<strong>Expected price:</strong>{$arr['Expectedprice']}<br>";
	print"<hr>";
}
?>
</div>
</body>
</html>