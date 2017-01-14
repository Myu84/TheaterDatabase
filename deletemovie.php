<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Delete Movie</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
    <h1> Private Screening Company (PSC) database</h1>
    <h2> Delete movie </h2>
    <ol>
<?php
   $movieid=$_POST["movieid"];
   if(!$movieid==""){
   $query='delete from movie where movieid="'.$movieid.'"';
   $result=mysqli_query($connection,$query);
   if (!$result) {
          die("Invalid input or database connection error.");
   } 
   else{
   echo "movie was deleted. <br>";
   include 'getmovie.php';
   }
}
   else{
	echo "Empty input, please select a movie.";
   }

?>
</ol>
</body>
</html>
