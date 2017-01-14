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
    <h2> Delete Customer </h2>
    <ol>
<?php
   $cid=$_POST["delcus"];
if(!$cid==""){
   $query= 'delete from customer where customerid="'.$cid.'"';
   $result=mysqli_query($connection,$query);
   if (!$result) {
          die("Error!Connection.");
   } 
   echo "Success: customer was deleted!";
   include 'customerlist.php';
}
else{
echo"please select a customer to delete.";}
?>
</ol>
</body>
</html>
