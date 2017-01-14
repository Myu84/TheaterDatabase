<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CS3319 - Databases - get all Ticket sale</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    ?>
    <h1>Here are all the Ticket sale:</h1>
    <?php
    $query = 'select * from goingto';
    $result=mysqli_query($connection,$query);
    if (!$result) {
        die("database query failed.");
    }
    echo "<table id='display'>";
    echo "<tr>
                <td>Showingid</td>
                <td>Customerid</td>
                <td>How Much</td>
                <td>Customer Rate</td>
             </tr>";
    
    while ($row=mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td>" . $row["showingid"] . "</td>";
        echo "<td>" . $row["customerid"] . "</td>";
        echo "<td>" . $row["howmuch"] . "</td>";
        echo "<td>" . $row["rate"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
    
    mysqli_close($connection);
    ?>
</body>
</html>
