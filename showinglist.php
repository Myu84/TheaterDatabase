<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CS3319 - Databases - get all Movies</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    ?>
    <h1>Here are all the Showing:</h1>
    <?php
    $query = 'select movie.moviename,showingid,date,time,roomnum from showing,movie where showing.movieid=movie.movieid';
    $result=mysqli_query($connection,$query);
    if (!$result) {
        die("database query failed.");
    }
    echo "<table id='display'>";
    echo "<tr>
                <td>Moviename</td>
                <td>Showingid</td>
                <td>Date</td>
                <td>Time</td>
		<td>RoomNumber</td>
             </tr>";
    
    while ($row=mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td>" . $row["moviename"] . "</td>";
        echo "<td>" . $row["showingid"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["time"] . "</td>";
	echo "<td>" . $row["roomnum"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
    
    mysqli_close($connection);
    ?>
</body>
</html>
