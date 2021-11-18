  <?php
   include 'sample.php';
  $res=mysqli_query($conn,"SELECT *FROM `seller`");
print"<hr>";
	while($arr=mysqli_fetch_array($res))
	{
	print"<strong>BookName:</strong>{$arr['Bookname']}<br>";
	print"<strong>Author:</strong>{$arr['Author']}<br>";
	print"<strong>Branch:</strong>{$arr['Branch']}<br>";
	print"<strong>Sem:</strong>{$arr['Sem']}<br>";
	print"Edition:{$arr['Edition']}<br>";
	print"Publishdate:{$arr['Publishdate']}<br>";
	print"Mobno:{$arr['Mobno']}<br>";
	print"Mrp:{$arr['Mrp']}<br>";
	print"Sellingprice:{$arr['Sellingprice']}<br>";
?>
	<a href="cart.php">add to cart</a><br>
<?php
	print"<hr>";
	}
?>