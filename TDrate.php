<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ticket Desk</title>
</head>
<body>
<?php
    include 'connectdb.php';
?>
<h2>View by Rating:</h2>
<p>
<hr>
<p>
<h3>here are all the movie had have an average rating of 4 or more stars.</h3>
<?php
	$query0='select moviename, AVG(rate)
		from goingto,showing,movie 
		where goingto.showingid=showing.showingid 
			and showing.movieid=movie.movieid 
		group by moviename HAVING  AVG(rate) > "4"';
	$result0=mysqli_query($connection,$query0);
	if(!$result0){
	die("database query failed1.");}
	echo "<table id='display'>";
    	echo "<tr>
              <td>Movie name</td>
              <td>Avg rate</td>
              </tr>";
    
    	while ($row=mysqli_fetch_assoc($result0))
    	{
        	echo "<tr>";
        	echo "<td>" . $row["moviename"] . "</td>";
        	echo "<td>" . $row["AVG(rate)"] . "</td>";
        	echo "</tr>";
    	}
    	echo "</table>";
    	mysqli_free_result($result0);
?>

<?php
mysqli_close($connection);    
?>
</body>
</html>
