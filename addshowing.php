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
    <ol>
<?php
   $showingid = $_POST["showingid"];
   $movieid =$_POST["movieid"];
   $date=$_POST["date"];
   $time=$_POST["time"];
   $roomnum=$_POST["roomnum"];

   if(!$showingid=="" and !$movieid=="" and !$date=="" and !$time=="" and !$roomnum==""){
	$query='insert into showing(movieid, showingid, date, time, roomnum) values("'
		. $movieid . '","'
		. $showingid . '","'
		. $date . '","'
		. $time . '","'
		. $roomnum . '")';
  	$result= mysqli_query($connection,$query);
   	if(!$result){
        	die("Invalid input or showing id already exist.");
	}
	else{
            echo "New showing was added.";
	    include 'showinglist.php';
	}
	}
	else{
	echo"Empty input. Please enter all input, select a movie and a room for showing.";
	}
?>
</ol>
</body>
</html>
