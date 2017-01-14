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
    <h2> Delete Showing </h2>
    <ol>
<?php
   $delsid=$_POST["delshow"];

   $findShow = 'select * from showing where ' . ' showingid="'. $delsid .'" ';
   $delShow = 'delete from showing where ' . ' showingid="'.$delsid.'"';

   $found = mysqli_query($connection,$findShow);

   if($found && mysqli_num_rows($found) >0){
     if(mysqli_query($connection,$delShow)){
	echo '<br>Showing: ' .$delsid . ' was deleted.';
	include 'showinglist.php';
     }  else {
	  echo '<br> Unable to delete.';
        }
   } else {
	echo "Empty input,please select a showing to delete.";
   }
?>
</ol>
</body>
</html>
