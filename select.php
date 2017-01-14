<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CS3319 Asn3</title>
</head>
<?php
	include 'connectdb.php';
?>
<body>
<?php
/**************************************************************************/
	if ($_POST['submit']==1){
	echo "See a list of showings(movie name and year) based on a selected genre<br><br>";
	$type=$_POST["type"];
	$query1 = 'select capacity,showing.showingid,moviename,year,date,time,showing.roomnum,count(*)
		from showing,movie,goingto,theatre,genre
		where showing.movieid=movie.movieid 
		and showing.roomnum=theatre.roomnum
		and goingto.showingid=showing.showingid
		and movie.movieid=genre.movieid
		and type="'.$type.'"
		group by showing.showingid
		';
	$result1 = mysqli_query($connection,$query1);
	if(!$result1 or $type==""){
	die("databases query failed. Empty input.");}

	echo "<table id='display'>";
   	echo "<tr>
                <td>Showingid</td>
                <td>Moviename</td>
		<td>ReleaseYear</td>
                <td>Date</td>
                <td>Time</td>
		<td>RoomNumber</td>
		<td>FullorNot</td>
             </tr>";

    	while ($row=mysqli_fetch_assoc($result1))
    	{
        	echo "<tr>";
        	echo "<td>" . $row["showingid"] . "</td>";
        	echo "<td>" . $row["moviename"] . "</td>";
		echo "<td>" . $row["year"] . "</td>";
        	echo "<td>" . $row["date"] . "</td>";
        	echo "<td>" . $row["time"] . "</td>";
		echo "<td>" . $row["roomnum"] . "</td>";
		if($row["capacity"]<=$row["count(*)"]){
			echo "<td>FULL</td>";
		}
		else{
			echo"<td>Not Full</td>";
		} 
        	echo "</tr>";
    	}
    	echo "</table>";
    	mysqli_free_result($result1);
    	mysqli_close($connection);

	}
/**************************************************************************/
	elseif ($_POST['submit']==2){
	echo "See a list of showings(movie name and year) based on a range of dates<br><br>";
	$start=$_POST["startdate"];
	$end=$_POST["enddate"];

	$query2 = 'select capacity,showing.showingid,moviename,year,date,time,showing.roomnum,count(*)
		from showing,movie,goingto,theatre
		where showing.movieid=movie.movieid 
		and showing.roomnum=theatre.roomnum
		and goingto.showingid=showing.showingid
		and (date between "'.$start.'" and "'.$end.'")
		group by showing.showingid
		';
	$result2 = mysqli_query($connection,$query2);
	if(!$result2 or $start=="" or $end==""){
	die("databases query failed.Check your input!");}

	echo "<table id='display'>";
   	echo "<tr>
                <td>Showingid</td>
                <td>Moviename</td>
		<td>ReleaseYear</td>
                <td>Date</td>
                <td>Time</td>
		<td>RoomNumber</td>
		<td>FullorNot</td>
             </tr>";

    	while ($row=mysqli_fetch_assoc($result2))
    	{
        	echo "<tr>";
        	echo "<td>" . $row["showingid"] . "</td>";
        	echo "<td>" . $row["moviename"] . "</td>";
		echo "<td>" . $row["year"] . "</td>";
        	echo "<td>" . $row["date"] . "</td>";
        	echo "<td>" . $row["time"] . "</td>";
		echo "<td>" . $row["roomnum"] . "</td>";
		if($row["capacity"]<=$row["count(*)"]){
			echo "<td>FULL</td>";
		}
		else{
			echo"<td>Not Full</td>";
		} 
        	echo "</tr>";
    	}
    	echo "</table>";
    	mysqli_free_result($result2);
    	mysqli_close($connection);
	}
/**************************************************************************/
	elseif ($_POST['submit']==3){
	echo "See a list of showings(movie name and year) based on a theatre that still has seats available<br><br>";
	$query3 = 'select capacity,showing.showingid,moviename,year,date,time,showing.roomnum,count(*)
		from showing,movie,goingto,theatre
		where showing.movieid=movie.movieid 
		and showing.roomnum=theatre.roomnum
		and goingto.showingid=showing.showingid
		group by showing.showingid
		HAVING capacity > count(*)
		';
	$result3 = mysqli_query($connection,$query3);
	if(!$result3){
	die("databases query failed.");}
	
	echo "<table id='display'>";
   	echo "<tr>
                <td>Showingid</td>
                <td>Moviename</td>
		<td>ReleaseYear</td>
                <td>Date</td>
                <td>Time</td>
		<td>RoomNumber</td>
             </tr>";

    	while ($row=mysqli_fetch_assoc($result3))
    	{
        	echo "<tr>";
        	echo "<td>" . $row["showingid"] . "</td>";
        	echo "<td>" . $row["moviename"] . "</td>";
		echo "<td>" . $row["year"] . "</td>";
        	echo "<td>" . $row["date"] . "</td>";
        	echo "<td>" . $row["time"] . "</td>";
		echo "<td>" . $row["roomnum"] . "</td>";
        	echo "</tr>";
    	}
    	echo "</table>";
    	mysqli_free_result($result3);
    	mysqli_close($connection);
	}
/**************************************************************************/
	elseif ($_POST['submit']==4){
	$moviename=$_POST["moviename"];
	echo "See a list of showings(movie name and year) based on title<br><br>";
	$query4 = 'select * from showing,movie where showing.movieid=movie.movieid and moviename="'.$moviename.'"';
	$result4 = mysqli_query($connection,$query4);
	if(!$result4 or $moviename==""){
	die("databases query failed. Empty input");}
	echo "<table id='display'>";
   	echo "<tr>
                <td>Showingid</td>
                <td>Moviename</td>
		<td>ReleaseYear</td>
                <td>Date</td>
                <td>Time</td>
		<td>RoomNumber</td>
		<td>MoviePoster</td>
             </tr>";

    	while ($row=mysqli_fetch_assoc($result4))
    	{
        	echo "<tr>";
        	echo "<td>" . $row["showingid"] . "</td>";
        	echo "<td>" . $row["moviename"] . "</td>";
		echo "<td>" . $row["year"] . "</td>";
        	echo "<td>" . $row["date"] . "</td>";
        	echo "<td>" . $row["time"] . "</td>";
		echo "<td>" . $row["roomnum"] . "</td>";
		if($row["movieposter"]!=null){
			echo "<td>" . '<img src="' . $row["movieposter"] . '" height="120" width="80">' . '</td>';
		}
		else{
			echo"<td>Null</td>";
		} 
        	echo "</tr>";
    	}
    	echo "</table>";
    	mysqli_free_result($result4);
    	mysqli_close($connection);
	}
/**************************************************************************/
?>
</body>
</html>
