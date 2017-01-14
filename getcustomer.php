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

    <h3>Here is the customer information:</h3>
    <?php
    session_start();
    $customerid=$_SESSION['customerid'];

    $query = 'select * from customer where customerid="'.$customerid.'"';
    $result=mysqli_query($connection,$query);
    if (!$result) {
        die("database query failed.");
    }
    echo "<table id='display'>";
    echo "<tr>
                <td>Customerid</td>
                <td>Firstname</td>
                <td>Lastname</td>
                <td>Gender</td>
		<td>Email</td>
             </tr>";
    
    while ($row=mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td>" . $row["customerid"] . "</td>";
        echo "<td>" . $row["firstname"] . "</td>";
        echo "<td>" . $row["lastname"] . "</td>";
        echo "<td>" . $row["sex"] . "</td>";
	echo "<td>" . $row["email"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
    
    mysqli_close($connection);
    ?>
</body>
</html>
