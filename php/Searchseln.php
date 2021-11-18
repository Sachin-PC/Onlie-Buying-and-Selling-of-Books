<?php
session_start();
include_once 'sample.php';

if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}
if(isset($_POST['btn-search']))
{
 $sear=$_POST['Search'];
 $_SESSION['xxx']=$sear;
 header("Location: Searchsel.php");
 }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="Search" placeholder="BookName or Author" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-search">SEARCH</button></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>