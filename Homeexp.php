<html>
<head>
<style>
h1{
text-align:left;
font-size:30pt;
color: #ffff99;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
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

li a:hover {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}
 body {
    background-image: url("Imageb.jpg");
    background-repeat: no-repeat; 
    background-position:top;
    margin:0;
   background-attachment: fixed; 
   }
</style>
</head>
<body>
<ul> 
  <li><a href="login.php">My Account</a></li>
  <li><a href="about.html">About Us</a></li>
  <li><a href="SellerInfo.php">Sell Book</a></li>
  <li><a href="BuyerInfo.php">Request Book</a></li>
  <li><a class="active" href="Home1.html">Home</a></li>

  <h1><img src="images.jpg" alt="image" width="50" height="50"> BOOKSTURNERS </h1>
  </ul>
  <br>
  
<?php
   include 'sample.php';
  $res=mysqli_query($conn,"SELECT Bookname,Author,Branch,Sem FROM `seller`");
print"<hr>";
while($arr=mysqli_fetch_array($res))
{
	print"<ul>";	
	print"<li>Sem:{$arr['Sem']}</li>";
	print"<li>Branch:{$arr['Branch']}</li>";
	print"<li>Author:{$arr['Author']}</li>";
	print"<li><strong>BookName</strong>:{$arr['Bookname']}</li>";
	print"</ul>";
	?>
	<a href="Login.php">More Details</a><br>;
<?php
	print"<hr>";
}
?>
</body>
</html>
