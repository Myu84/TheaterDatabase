<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Modify showing</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
    <h1> Private Screening Company (PSC) database</h1>
    <h2>List all Showing:</h2>
    <form action="showinglist.php" method="post">
        <input type="submit" value="List all Showing">
    </form>
<p>
<hr>
<p>
<h2> Add a new Showing:</h2>
<form action="addshowing.php" method="post">
<?php
   $query = "select * from movie";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
   echo "Select a movie you want to add showing with? </br>";
   while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="movieid" value="';
        echo $row["movieid"];
        echo '">' .$row["movieid"] ." " . $row["moviename"] . "<br>";
   }
   mysqli_free_result($result);
?>
New showing's showing id:<input type="text" name="showingid"><br><br>
New showing's date:<input type="text" name="date"><br><br>
New showing's time:<input type="text" name="time"><br><br>
<?php
   $query = "select * from theatre";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
   echo "Select a room for showing.</br>";
   while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="roomnum" value="';
        echo $row["roomnum"];
        echo '">' .$row["roomnum"] . " " . $row["capacity"] . "<br>";
   }
   mysqli_free_result($result);
?>
<input type="submit" value="Add a new showing">
</form>
<p>
<hr>
<p>
<h2> Delete a Showing:</h2>
<form action="deleteshowing.php" method="post">
<?php
   $query = "select * from showing,movie where showing.movieid=movie.movieid";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
   echo "Select a showing you want to delete.</br>";
   while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="delshow" value="';
        echo $row["showingid"];
        echo '">' .$row["showingid"] . " " .$row["moviename"] . " " .$row["date"] . " " . $row["time"] . "<br>";
   }
   mysqli_free_result($result);
?>
<input type="submit" value="Delete showing">
</form>

<?php

mysqli_close($connection);

?>

</body>

</html>
