<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <title>CS3319 - Databases - Assignment 3 - Homepage</title>

</head>

<body>

<?php

include 'connectdb.php';

?>

    <h1> Private Screening Company (PSC) database</h1>

    <h2>List all Customers:</h2>

    <form action="customerlist.php" method="post">

        <input type="submit" value="List all customer">

    </form>

<p>

<hr>

<p>

<h2> Add a new customer:</h2>

<form action="addcustomer.php" method="post">

New customer's first name:<input type="text" name="firstname"><br><br>

New customer's lastName:<input type="text" name="lastname"><br><br>

New customer's gender:<input type="radio" name="sex" value="F">Female <input type="radio" name="sex" value="M">Male <br><br>

New customer's email:<input type="text" name="email"><br><br>

<input type="submit" value="Add a new customer">

</form>

<p>

<hr>

<p>

<h2> Delete a customer:</h2>

<form action="deletecustomer.php" method="post">

<?php

   $query = "select * from customer";

   $result = mysqli_query($connection,$query);

   if (!$result) {

        die("databases query failed.");

    }

   echo "Who do you want to delete? </br>";

   while ($row = mysqli_fetch_assoc($result)) {

        echo '<input type="radio" name="delcus" value="';

        echo $row["customerid"];

        echo '">' .$row["customerid"] ." " . $row["firstname"] . " " . $row["lastname"] . "  " . $row["sex"] . " " . $row["email"] . "<br>";

   }

   mysqli_free_result($result);

?>

<br>

<input type="submit" value="Delete customer">

</form>

<?php

mysqli_close($connection);

?>

</body>

</html>
