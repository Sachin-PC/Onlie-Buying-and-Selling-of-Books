<?php
session_start();
include_once 'sample.php';

 $res=mysqli_query($conn,"SELECT * FROM `seller` WHERE Branch='Civil'");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login & Registration System</title>

</head>
<body>
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
</body>
</html>