<?php
session_start();

$user = "coltons5_admin";
$pass = "movies";
$dbName = "coltons5_movies";
$movieName = $_POST["field1"];
$count = 0;
//echo $movieName

$conn = mysqli_connect("localhost", $user, $pass, $dbName);

$email = $_SESSION["email"];
//echo $_SESSION["email"];

$sqlInsert = "INSERT INTO profile (name, email) VALUES ('$movieName', '$email');";
$insert= mysqli_query($conn, $sqlInsert);






$sql = "SELECT * FROM movies;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
//echo $resultCheck;
/*
if ($resultCheck) {
	while ($row = mysqli_fetch_assoc($result)) {
	
	echo $row['name'];
	echo " ";
		
	
	
	}
}
*/


$query = mysqli_query($conn, "SELECT * FROM movies WHERE name ='".$movieName."'");

if(mysqli_num_rows($query) > 0){

    //echo "Movie already exists";
    $sql = "SELECT * FROM movies WHERE name ='".$movieName."'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    //echo $row['mCount'];
    $count = $row['mCount'];
    $count = $count + 1;
    //echo " ";
    //echo $count;
    
    $sql = "UPDATE movies SET mCount ='".$count."' WHERE name ='".$movieName."'";
    $query = mysqli_query($conn, $sql);
    
}else{
    //echo "Movie DOESN'T exist";
	$sqlInsert = "INSERT INTO movies (name, mCount) VALUES ('$movieName', '1');";
	$insert= mysqli_query($conn, $sqlInsert);
}



?>
<html>
<head><link rel="stylesheet" type="text/css" href="styleSheets/site.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<h1 class="headingsh1"> Update Log</h1>
<h2>Click the button below to return to the homepage to update another, or click the profile button to see what movies you have viewed</h2> 
<form action="homePage.php" method="POST">
<input type="submit" value="Home Page">
</form>
        <form action="profile.php" method="POST">
	<input type="submit" value="Profile">
	</form>
	
<footer>
<i class="fa fa-film" aria-hidden="true"></i>
</footer>

</html>