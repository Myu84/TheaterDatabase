<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Get all room</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    ?>
    <h3>Here are all the Rooms:</h3>
    <?php
    $query = "select * from theatre";
    $result=mysqli_query($connection,$query);
    if (!$result) {
        die("database query failed.");
    }
    echo "<table id='display'>";
    echo "<tr>
                <td>Movie Number</td>
                <td>Capacity</td>

             </tr>";
    
    while ($row=mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td>" . $row["roomnum"] . "</td>";
        echo "<td>" . $row["capacity"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
    
    mysqli_close($connection);
    ?>
</body>
</html>
