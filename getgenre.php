<!DOCTYPE html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Get all Genre</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    ?>
    <h2>Here are all the Genre:</h2>
    <?php
    $query = "select moviename,type from movie,genre where movie.movieid=genre.movieid";
    $result=mysqli_query($connection,$query);
    if (!$result) {
        die("database query failed.");
    }
    echo "<table id='display'>";
    echo "<tr>
                <td>Movie name</td>
                <td>Genre</td>
             </tr>";
    
    while ($row=mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td>" . $row["moviename"] . "</td>";
        echo "<td>" . $row["type"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
    mysqli_close($connection);
    ?>
</body>
</html>
