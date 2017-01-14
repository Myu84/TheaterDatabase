<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ticket Desk</title>
</head>
<body>
	<?php
		include 'connectdb.php';
	?>
	<h1>Welcome to the Ticket Desk</h1>
	<hr>
	<h2>View Customer:</h2>
	<h3>Please select a Customer to operate:</h3>
	<form action="TDcustomer.php" method="post">
		<?php

   			$query = "select * from customer";

  			$result = mysqli_query($connection,$query);

   			if (!$result) {

        			die("databases query failed.");

    			}

   			while ($row = mysqli_fetch_assoc($result)) {

        			echo '<input type="radio" name="customerid" value="';

        			echo $row["customerid"];

        			echo '">' .$row["customerid"] . " "
					  . $row["firstname"] . " "
					  . $row["lastname"] . " "
					  . $row["sex"] . " " 
					  . $row["email"] . "<br>";

   			}
		mysqli_free_result($result);

		?>
		<br>
		<input type="submit" value="Get Customer">
	</form>
	<p>
	<hr>
	<p>
	<h2>View Sales by Genre:</h2>
	<h3>Please select:</h3>
	<form action="TDgenre.php" method="post" enctype="multipart/form-data">
	<table>
            <tr>
                <td>How much ticket sales each genre has done:</td>
                <td>
                    <button name="submit" value="0">ticket sales</button></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>How many movies there are in each genre:</td>
                <td>
                    <button name="submit" value="1">Num of movies</button></td>
                <td>&nbsp;</td>
            </tr>
        </table>

	</form>
	<p>
	<hr>
	<p>
	<h2>View by Rating:</h2>
	<h3>list all the movie titles had have an average rating of 4 or more stars.</h3>
	<form action="TDrate.php" method="post">
		<input type="submit" value="Get Rating"/>
	</form>
	<?php
		mysqli_close($connection);
	?>
</body>
</html>

