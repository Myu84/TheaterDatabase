<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CS3319 - Databases - Assignment 3 - Homepage</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
    <h1> Private Screening Company (PSC) database</h1>
    <h2>Add new customer</h2>
    <ol>
<?php
   $fname = $_POST["firstname"];
   $lname =$_POST["lastname"];
   $s=$_POST["sex"];
   $eml=$_POST["email"];
   $query1= 'select max(customerid) as maxid from customer';
   $result=mysqli_query($connection,$query1);
   if (!$result) {
          die("database max query failed.");
   }
   $row=mysqli_fetch_assoc($result);
   $newkey = intval($row["maxid"]) + 1;
   $cid = (string)$newkey;
   $query = 'insert into customer values("' . $cid . '","' . $fname . '","' . $lname . '","' . $s . '","' . $eml .'")';
   if (!empty($fname) and !empty($lname)and !empty($s)and !empty($eml)){ 
   	if (!mysqli_query($connection, $query)) {
        	die("Error: insert failed" . mysqli_error($connection));
    	}
   echo "New customer was added!";
   include'customerlist.php';
   }
   else{
	echo "<h4> Failure: </h4>";
	die("please fill in all the customer infomation");
   }
?>
</ol>
</body>
</html>
