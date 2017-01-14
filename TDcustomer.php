<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CS3319 - Databases - Assignment 3</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Ticket Desk: operating under selected customer</h1>
<?php
	session_start();
    	$_SESSION['customerid']=$_POST["customerid"];
	$customerid=$_SESSION['customerid'];
	echo "Current customer is: $customerid ";
	// Works if session cookie was accepted
?>
<h2>Sell ticket to this customer</h2>

<form action="sellticket.php" method="post">
<h3>please select a showing for this customer(these does not include showings customer had brought):</h3>
<?php
	session_start();
    	$_SESSION['customerid']=$_POST["customerid"];
	$customerid=$_SESSION['customerid'];

if(!$customerid==""){
   	$query = 'select showing.showingid,moviename,time,date,roomnum,customerid from showing,movie,goingto where showing.movieid=movie.movieid and showing.showingid=goingto.showingid group by showingid HAVING customerid!="'.$customerid.'"';

  	$result = mysqli_query($connection,$query);
   	if (!$result) {
        	die("databases query failed.");
    	}
   	while ($row = mysqli_fetch_assoc($result)) {
        	echo '<input type="radio" name="showingid" value="';
        	echo $row["showingid"];
        	echo '">' .$row["showingid"] . " "
			  . $row["moviename"] . " "
			  . $row["date"] . " "
			  . $row["time"] . " " 
			  . $row["roomnum"] . "<br>";
   	}
	mysqli_free_result($result);
}
else{
echo"<font color='red'>Warning: Didn't select customer, please select a customer in order to use customer related function.</font><br><br>";
}
?>
<br>Ticket Price:<input type="text" name="howmuch"><br><br>
<input type="submit" value="sell ticket">
</form>

<p>
<hr>
<p>
<h2>Give a rating to a showing with no rating:</h2>
<form action="giverate.php" method="post">
<?php
	session_start();
    	$_SESSION['customerid']=$_POST["customerid"];
	$customerid=$_SESSION['customerid'];
if(!$customerid==""){
   	$query = 'select * from showing,movie,goingto
		  where showing.movieid=movie.movieid
		  and showing.showingid=goingto.showingid 
		  and customerid= "'.$customerid.'"
		  and rate is NULL';

  	$result = mysqli_query($connection,$query);

   	if (!$result) {

        	die("databases query failed.");

    	}

   	while ($row = mysqli_fetch_assoc($result)) {

        	echo '<input type="radio" name="showingid" value="';

        	echo $row["showingid"];

        	echo '">' .$row["moviename"] . " "
			  . $row["date"] . " "
			  . $row["time"] . " "
			  . $row["rate"] . "<br>";

   	}
	mysqli_free_result($result);
}
else{
echo"<font color='red'>Warning: Didn't select customer, please select a customer in order to use customer related function.</font><br><br>";
}
?>
<br><br>Give a rate:<input type="radio" name="rate" value="1">1 
		    <input type="radio" name="rate" value="2">2 
		    <input type="radio" name="rate" value="3">3 
		    <input type="radio" name="rate" value="4">4 
		    <input type="radio" name="rate" value="5">5<br><br>
<input type="submit" value="Give rate">
</form>
<p>
<hr>
<p>

<h2>See a list of showings(movie name and year) based on</h2>
<form action="select.php" method="post" enctype="multipart/form-data">
<?php
   	$query = 'select type from genre group by type';

  	$result = mysqli_query($connection,$query);

   	if (!$result) {

        	die("databases query failed.");

    	}

   	while ($row = mysqli_fetch_assoc($result)) {

        	echo '<input type="radio" name="type" value="';

        	echo $row["type"];

        	echo '">' . $row["type"] . "<br>";

   	}
	mysqli_free_result($result);

?>
a selected genre:<button name="submit" value="1">genre</button></td>
<p>
<hr>
<p>
Enter start date(yyyymmdd):<input type="text" name="startdate"><br><br>
Enter end date(yyyymmdd):<input type="text" name="enddate"><br><br>
a range of dates:<button name="submit" value="2">dates</button></td>
<p>
<hr>
<p>
a theatre that still has seats available:<button name="submit" value="3">theatre</button></td>
<p>
<hr>
<p>
<?php
   	$query = 'select * from movie';

  	$result = mysqli_query($connection,$query);

   	if (!$result) {

        	die("databases query failed.");

    	}

   	while ($row = mysqli_fetch_assoc($result)) {

        	echo '<input type="radio" name="moviename" value="';

        	echo $row["moviename"];

        	echo '">' . $row["moviename"] . "<br>";

   	}
	mysqli_free_result($result);

?>
a movie title:<button name="submit" value="4">movie</button></td>
</form>
<p>
<hr>
<p>

<h2>See all the movie titles and ratings customer has viewed</h2>
<?php
if(!$customerid==""){
include 'getrate.php';
}
else{
echo"<font color='red'>Warning: Didn't select customer, please select a customer in order to use customer related function.</font><br><br>";
}
?>
<p>
<hr>
<p>

<h2>See customer's profile</h2>
<?php
if(!$customerid==""){
include 'getcustomer.php';
}
else{
echo"<font color='red'>Warning: Didn't select customer, please select a customer in order to use customer related function.</font><br><br>";
}
?>

</body>
</html>
