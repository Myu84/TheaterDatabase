<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Update Room</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    ?>
    <h1>Update room:</h1>
    <?php
    $roomnum=$_POST["roomnum"];
    $to_capacity = strlen($_POST["newcapacity"]) > 0 ? mysqli_real_escape_string($connection, $_POST["newcapacity"]) : NULL;

    if(!$roomnum=="" and !$to_capacity==""){
    $query = "update theatre 
		set capacity = '".$to_capacity."'"
               ." where roomnum='".$roomnum."'";
    $result= mysqli_query($connection,$query);
    if(!$result){
	die("Invalid input!Check your input please!");
    }
    else{
        echo "Capacity updated<br>";
	include 'getroom.php';
    }
    }
    else{
	echo"Empty input, please fill in all input and select a room.";}
    ?>
</body>
</html>

