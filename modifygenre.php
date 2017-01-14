<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CS3319 - Databases - Assignment 3 - Homepage</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1> Private Screening Company (PSC) database</h1>
<h2> Add/delete genre for a movie:</h2>
<form action="addremovegenre.php" method="post" enctype="multipart/form-data">
What type(s) you want to add/delete?<br><br>
<input type="checkbox" name="formDoor[]" value="Action" />Action<br />
<input type="checkbox" name="formDoor[]" value="Adventure" />Adventure<br />
<input type="checkbox" name="formDoor[]" value="Animated" />Animated<br />
<input type="checkbox" name="formDoor[]" value="Comedy" />Comedy<br />
<input type="checkbox" name="formDoor[]" value="Crime" />Crime<br />
<input type="checkbox" name="formDoor[]" value="Drama" />Drama<br />
<input type="checkbox" name="formDoor[]" value="Horror" />Horror<br />
<input type="checkbox" name="formDoor[]" value="Musical" />Musical<br />
<input type="checkbox" name="formDoor[]" value="Romance" />Romance<br />
<input type="checkbox" name="formDoor[]" value="SciFi" />SciFi<br />
<input type="checkbox" name="formDoor[]" value="War" />War<br />
<?php
   $query = "select * from movie";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
   echo "<br>For which movie?<br>";
   while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="movieid" value="';
        echo $row["movieid"];
        echo '">' . $row["moviename"] . "<br>";
   }
   mysqli_free_result($result);
?>
<table>
            <tr>
                <td>
                    <button name="submit" value="0">Add</button></td>
                <td>
                    <button name="submit" value="1">Delete</button></td>
            </tr>
        </table>
</form>
<?php
mysqli_close($connection);
?>
</body>
</html>
