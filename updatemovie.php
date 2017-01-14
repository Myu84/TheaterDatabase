<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Update Movie</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    ?>
    <h1>Update Movie:</h1>
    <?php
    $movieid =$_POST["movieid"];
    $to_moviename 	= strlen($_POST["newmoviename"]) > 0 ? mysqli_real_escape_string($connection, $_POST["newmoviename"]) : NULL;
    $to_year  		= strlen($_POST["newyear"]) > 0 ? mysqli_real_escape_string($connection, $_POST["newyear"]) : NULL;
    if(!$movieid=="" and !$to_moviename=="" and !$to_year==""){
    $query = 'update	movie 
              set	moviename= "'.$to_moviename.'" , 
			year="'.$to_year.'" 
	      where 	movieid="'.$movieid.'"';
    $result= mysqli_query($connection,$query);
    if(!$result){
	die("Invalid input!Check your input please!");
    }
    else{
        echo "Movie updated<br>";
	include 'getmovie.php';
    }
    }
    else{
	echo"Empty input, please fill in all input and select a movie.";}
    ?>
</body>
</html>
