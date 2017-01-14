<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ticket Desk</title>
</head>
<body>
<h2>View Sales by Genre:</h2>
<p>
<hr>
<p>
    <?php
    include 'connectdb.php';

    if ($_POST['submit']==0){
	echo"How much ticket sales each genre has done:<br>";
	$query0='select   type, SUM(howmuch) 
		 from     goingto,showing,genre
		 where    goingto.showingid=showing.showingid
		 and	  showing.movieid=genre.movieid
		 group by type';

	$result0=mysqli_query($connection,$query0);
	if(!$result0){
	  die("database query failed.");
	}
    	echo "<table id='display'>";
    	echo "<tr>
                <td>Type</td>
                <td>Howmuch</td>
             </tr>";
    
    	while ($row=mysqli_fetch_assoc($result0))
    	{
          echo "<tr>";
          echo "<td>" . $row["type"] . "</td>";
          echo "<td>" . $row["SUM(howmuch)"] . "</td>";
          echo "</tr>";
    	}
    	echo "</table>";
    	mysqli_free_result($result0);
    }

    elseif ($_POST['submit']==1){
	echo"How many movies there are in each genre:<br>";
	$query1= 'select type, count(*) from genre group by type';
	$result1=mysqli_query($connection,$query1);
	if(!$result1){
	  die("database query failed.");
	}
    	echo "<table id='display'>";
    	echo "<tr>
                <td>Type</td>
                <td>Count</td>
             </tr>";
    
    	while ($row=mysqli_fetch_assoc($result1))
    	{
          echo "<tr>";
          echo "<td>" . $row["type"] . "</td>";
          echo "<td>" . $row["count(*)"] . "</td>";
          echo "</tr>";
    	}
    	echo "</table>";
    	mysqli_free_result($result1);
    }

    mysqli_close($connection);
    
    ?>
</body>
</html>
