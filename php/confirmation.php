<?php

include('sample.php');

// Passkey that got from link 
$passkey=$_GET['passkey'];
// Retrieve data from table where row that match this passkey 
$sql1="SELECT * FROM $temp WHERE code ='$passkey'";
$result1=mysql_query($conn,$sql1);

// If successfully queried 
if($result1){

// Count how many row has this passkey
$count=mysql_num_rows($result1);

// if found this passkey in our database, retrieve data from table "temp_members_db"
if($count==1){

$rows=mysql_fetch_array($result1);
$Fname=$rows['Firstn'];
$Lname=$rows['Lastn'];
$Uname=$rows['Usern'];
$email=$rows['Em'];
$mobile=$rows['Mobno']
$upass=$rows['passwrd']; 

$sql2="INSERT INTO user(Firstn,Lastn,Usern,Em,Mobno,passwrd)VALUES('$Fname','$Lastn','$Uname','$email','$mobile','$upass')";
$result2=mysql_query($conn,$sql2);
}

// if not found passkey, display message "Wrong Confirmation code" 
else {
echo "Wrong Confirmation code";
}

// if successfully moved data from table"temp_members_db" to table "registered_members" displays message "Your account has been activated" and don't forget to delete confirmation code from table "temp_members_db"
if($result2){

echo "Your account has been activated";

// Delete information of this user from table "temp_members_db" that has this passkey 
$sql3="DELETE FROM $temp WHERE code = '$passkey'";
$result3=mysql_query($sql3);

}

}
?>