<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CS3319 - Databases - Sell Ticket</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    ?>
    <h1>Sell Ticket</h1>
    <?php
    session_start();
    $showingid=$_POST["showingid"];
    $customerid=$_SESSION['customerid'];
    $howmuch=$_POST["howmuch"];
if(!$customerid==""){
  if(!$howmuch=="" and !$showingid==""){
    $query = 'insert into goingto(showingid,howmuch,customerid) values("' . $showingid . '","' . $howmuch . '","' . $customerid .'")';
    $result=mysqli_query($connection,$query);
    if (!$result) {
        die("database query failed.Please fill in all input.");
    }
    else{
	echo "<br>Sell ticket complete!";
	include'getgoingto.php';
    }
  }
  else{
	echo"Input empty,check your input.";
  }
}
else{
echo"<font color='red'>Warning: Didn't select customer, please select a customer in order to use customer related function.</font><br><br>";
}
    ?>
</body>
</html>
