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
    <h1>Here are all the Movies by movie name:</h1>
    <?php
    $query = "select * from movie order by moviename";
    $result=mysqli_query($connection,$query);
    if (!$result) {
        die("database query failed.");
    }
    echo "<table id='display'>";
    echo "<tr>
                <td>Movie id</td>
                <td>Movie name</td>
                <td>Release year</td>
                <td>Movie poster</td>
             </tr>";
    
    while ($row=mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td>" . $row["movieid"] . "</td>";
        echo "<td>" . $row["moviename"] . "</td>";
        echo "<td>" . $row["year"] . "</td>";
	if($row["movieposter"]!=null){
		echo "<td>" . '<img src="' . $row["movieposter"] . '" height="120" width="80">' . '</td>';
	}
	else{
		echo"<td>Null</td>";
	} 
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
    
    mysqli_close($connection);
    ?>
</body>
</html>
