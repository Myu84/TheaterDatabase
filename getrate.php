<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CS3319 - Databases</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    ?>

    <h3>Here are all the Movie and rate customer has view:</h3>
    <?php
    session_start();
    $customerid=$_SESSION['customerid'];
    echo "Current customer is: $customerid ";

    $query = 'select * from goingto,movie,showing 
		where customerid="'.$customerid.'"
		and goingto.showingid=showing.showingid
		and showing.movieid=movie.movieid';
    $result=mysqli_query($connection,$query);
    if (!$result) {
        die("database query failed.");
    }
    echo "<table id='display'>";
    echo "<tr>
                <td>Movie name</td>
                <td>Date</td>
                <td>Time</td>
                <td>Rate</td>
             </tr>";
    
    while ($row=mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td>" . $row["moviename"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["time"] . "</td>";
        echo "<td>" . $row["rate"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
    
    mysqli_close($connection);
    ?>
</body>
</html>
