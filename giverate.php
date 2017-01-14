<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CS3319 - Databases - Give rate</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    ?>
    <h1>Give rate</h1>
    <?php
    session_start();
    $showingid=$_POST["showingid"];
    $customerid=$_SESSION['customerid'];
    $rate=$_POST["rate"];
if(!$customerid==""){
  if(!$rate=="" and !$showingid==""){
    $query = 'update goingto set rate = "'.$rate.'"
		where showingid="'.$showingid.'"
		and customerid="'.$customerid.'"';
    $result=mysqli_query($connection,$query);
    if (!$result) {
        die("database query failed.");
    }
    else{
	echo "<br>Update rate complete!";
    	include 'getrate.php';}
  }
  else{
    echo "Empty Input,please fill in all input.";
  }
}
else{
echo"<font color='red'>Warning: Didn't select customer, please select a customer in order to use customer related function.</font><br><br>";
}
    ?>

</body>
</html>
