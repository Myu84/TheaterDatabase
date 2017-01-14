<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add room</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
    <h1> Private Screening Company (PSC) database</h1>
    <ol>
<?php
   $roomnum = $_POST["roomnum"];
   $capacity=$_POST["capacity"];

   if(!$roomnum=="" and !$capacity==""){
   $query = 'insert into theatre values("' . $roomnum . '","' . $capacity .'")';
   $result= mysqli_query($connection,$query);
	if(!$result){
		die("Invalid input or Room Number already exist.");
	}
	else{
		echo "Add room success!"	;
		include 'getroom.php';
	}
   }
   else{
	echo"Empty input, please fill in all input!";
   }
?>

</ol>

</body>

</html>
