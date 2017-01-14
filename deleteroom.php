<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Delete room</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
    <h1> Private Screening Company (PSC) database</h1>
    <h2> Delete Room </h2>
    <ol>
<?php
   $did=$_POST["delroom"];
if(!$did==""){
   $query = 'delete from theatre where' . ' roomnum="'.$did .'"';
   $result=mysqli_query($connection,$query);
   if (!$result or empty($did)) {
	die("Failure:check your input! .mysqli_error($connection)");
   }
   else{
   	echo "Room was deleted. <br>";
	include 'getroom.php';
   }
}
else{
echo"empty input, please select a room to delete.";
}

?>

</ol>

</body>

</html>
