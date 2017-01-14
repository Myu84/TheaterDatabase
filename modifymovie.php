<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Modify Movie Page</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
    <h1> Private Screening Company (PSC) database</h1>
    <h2>List all Movies by :</h2>
    <form action="movielist.php" method="post">
    <input type="submit" value="alphabetical order">
    </form><br>
    <form action="movielist2.php" method="post">
    <input type="submit" value="yearly order">
    </form><br>
    <form action="getmovie.php" method="post">
    <input type="submit" value="movieid order">
    </form>
<p>
<hr>
<p>
<h2> Add a new Movie:</h2>
<form action="addmovie.php" method="post"enctype="multipart/form-data">
New Movie's id:<input type="text" name="movieid"><br><br>
New Movie's Name:<input type="text" name="moviename"><br><br>
New Movie's release year:<input type="text" name="year"><br><br>
New Movie's Genre(s):<br>
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
<input type="checkbox" name="formDoor[]" value="War" />War<br /><br>
New Movie's Poster: <input type="file" name="file" id="file"><br><br>
<input type="submit" value="Add a new Movie">
</form>

<p>
<hr>
<p>

<h2> Delete a Movie:</h2>
<form action="deletemovie.php" method="post">
<?php
   $query = "select * from movie";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
   echo "Which movie do you want to delete? </br>";
   while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="movieid" value="';
        echo $row["movieid"];
        echo '">' .$row["movieid"] ." " . $row["moviename"] . "<br>";
   }
   mysqli_free_result($result);
?>
<br>
<input type="submit" value="Delete Movie">
</form>

<p>
<hr>
<p>

<h2> Update a Movie:</h2>
<form action="updatemovie.php" method="post" enctype="multipart/form-data">
<?php
   $query = "select * from movie";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
   echo "Select a movie you want to change name and release year? </br>";
   while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="movieid" value="';
        echo $row["movieid"];
        echo '">' . $row["moviename"] . " " . $row["year"] . "<br>";
   }
   mysqli_free_result($result);
?> 
	<table>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Change name and year to:</td>
                <td>new moviename:</td>
                <td>
                    <input type="text" name="newmoviename"></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>new year:</td>
                <td>
                    <input type="text" name="newyear"></td>
                <td>&nbsp;</td>
            </tr>
        </table>
        <br />

        <input type="submit" name="updatemovie" value="update movie">
    </form>
<?php
mysqli_close($connection);
?>
</body>
</html>
