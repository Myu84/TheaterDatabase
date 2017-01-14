<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add/Remove Genre</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    
    $movieid = $_POST["movieid"];
    $checkbox1 = $_POST["formDoor"];

if(!$movieid=="" and !$checkbox1==""){
    if ($_POST['submit']==0){
    for($i=0;$i<sizeof($checkbox1);$i++){
	$addgenre = "insert into genre(movieid,type) values ('$movieid','".$checkbox1[$i]."')";
    	$result0 = mysqli_query($connection,$addgenre);

     if(!$result0)
	{
	  echo"<font color='red'>Genre type: '$checkbox1[$i]' Already exist.<br></font>"; 
	}
     else
	{
	  echo"Genre type: '$checkbox1[$i]' is inserted<br>";
	}
    }
    }

    elseif ($_POST['submit']==1){
    for($i=0;$i<sizeof($checkbox1);$i++){
	$removegenre ='delete from genre where' . ' movieid="'.$movieid .'" and ' . ' type="'.$checkbox1[$i].'"';
    	$result1 = mysqli_query($connection,$removegenre);

     if(!$result1)
	{
	  echo"<font color='red'>Genre type: '$checkbox1[$i]' does not exist.<br></font>"; 
	}
     else
	{
	  echo"Genre type: '$checkbox1[$i]' is deleted<br>";
	}
    }
    }
    include 'getgenre.php';
}
else{
echo "Empty input, please select a movie and check at least one genre.";}
    mysqli_close($connection);
    ?>
</body>
</html>
