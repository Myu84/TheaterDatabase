<!DOCTYPE html>
<?php 
// password magic: http://www.totallyphp.co.uk/password-protect-a-page
// Define your username and password 
$username = "ADMIN"; 
$password = "cs3319"; 
if ($_POST['txtUsername'] != $username || $_POST['txtPassword'] != $password) { 
?>

<h1>Login Private Screening Company(PSC):</h1>

<form name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <p>
        <label for="txtUsername">Username:</label>
        <br />
        <input type="text" title="Enter your Username" name="txtUsername" value="ADMIN" />
    </p>

    <p>
        <label for="txtpassword">Password:</label>
        <br />
        <input type="password" title="Enter your password" name="txtPassword" />
    </p>

    <p>
        <input type="submit" name="Submit" value="Login" />
    </p>

</form>

<?php 
} 
else { 
?>

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
    <h2> Choose the information you want to modify:</h2>
    <form action="modifymovie.php" method="post">
	add,delete,update Movie info:
        <input type="submit" value="Movie">
    </form>
    </br>
    <form action="modifygenre.php" method="post">
	add,delete,update Genre info:
        <input type="submit" value="Genre">
    </form>
    </br>
    <form action="modifyroom.php" method="post">
	add,delete,update Room info:
        <input type="submit" value="Room">
    </form>
    </br>
    <form action="modifyshowing.php" method="post">
	add,delete,update Showing info:
        <input type="submit" value="Showing">
    </form>
    </br>
    <form action="modifycustomer.php" method="post">
	add,delete,update Customer info:
        <input type="submit" value="Customer">
    </form>
<?php
mysqli_close($connection);
?>
</body>
</html>
<?php
}
?>
