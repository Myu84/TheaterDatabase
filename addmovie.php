<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add movie</title>
</head>
<body>
    <h1> Private Screening Company (PSC) database</h1>
    <h2> Add movies </h2>
<?php
	include 'upload_file.php';
	include 'connectdb.php';
?>
    <ol>
<?php
	$movieid =$_POST["movieid"];
	$moviename=$_POST["moviename"];
	$year=$_POST["year"];
	$checkbox1 = $_POST["formDoor"];
	if(!$movieid=="" and !$moviename=="" and !$year=="" and !$checkbox1==""){
	$query='insert into movie (movieid,moviename,year,movieposter) values("'
                . $movieid . '","'
                . $moviename . '","'
		. $year . '","'
                . $movieposter . '")';
	$result= mysqli_query($connection,$query);
	if(!$result){
        	die("Invalid input or Movie id already exist.");
	}
	else{
            echo "New movie was added.";
	    for($i=0;$i<sizeof($checkbox1);$i++){
        	$query2= "insert into genre(movieid,type) values ('$movieid','".$checkbox1[$i]."')";
   		if(!mysqli_query($connection,$query2)){
        		die("Error:insert failed. <br>" . mysqli_error($connection));
   		}
	    }
	include 'getmovie.php';
	include 'getgenre.php';
	}
	}
	else{
	echo"Empty input, check your input.";
	}
?>
</ol>
</body>
</html>
