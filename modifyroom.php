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
<h2> Add a new Room:</h2>
<form action="addroom.php" method="post">
New Room number:<input type="text" name="roomnum"><br><br>
New Room's capacity:<input type="text" name="capacity"><br><br>
<input type="submit" value="Add a new room">
</form>

<p>
<hr>
<p>

<h2> Delete a Room:</h2>
<form action="deleteroom.php" method="post">
<?php
   $query = "select * from theatre";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
   echo "Which room do you want to delete? (You can't delete a room if there is a showing)</br>";
   while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="delroom" value="';
        echo $row["roomnum"];
        echo '">' .$row["roomnum"] . " " . $row["capacity"] . "<br>";
   }
   mysqli_free_result($result);
?>
<input type="submit" value="Delete Room">
</form>

<p>
<hr>
<p>

<h2> Update a Room:</h2>
<form action="updateroom.php" method="post" enctype="multipart/form-data">
<?php
   $query = "select * from theatre";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
   echo "Select a room to change it capacity.</br>";
   while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="roomnum" value="';
        echo $row["roomnum"];
        echo '">' .$row["roomnum"] . " " . $row["capacity"] . "<br>";
   }
   mysqli_free_result($result);
?>
        <table>
            <tr>
                <td>Change capacity to:</td>
                <td><input type="text" name="newcapacity"></td>
                <td>&nbsp;</td>
            </tr>
        </table>
        <br />
        <input type="submit" name="updatemovie" value="update room">
    </form>
<?php
mysqli_close($connection);
?>
</body>
</html>
