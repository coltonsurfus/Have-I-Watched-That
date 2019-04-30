<?php
session_start();
$_SESSION["email"];
$email = $_SESSION["email"];
//echo $_SESSION["email"];

if ($_SESSION["email"] != "") {
	echo "Hello " . $_SESSION["email"];
}
else {
echo "";
}


// Array to store the data found
$movieArray = [];



$movieCount = 0;

//Database Information
$user = "coltons5_admin";
$pass = "movies";
$dbName = "coltons5_movies";

//Connects to the database
$conn = mysqli_connect("localhost", $user, $pass, $dbName); 

//Query that will be ran
$sql = "SELECT DISTINCT * FROM profile WHERE email='".$email."'";
//echo $sql;
//Getting the results from the database (Conn) from what the Query was (sql)
$result = mysqli_query($conn, $sql);

$resultCheck = mysqli_num_rows($result);

//Puts results into an array for printing to the html table
if ($resultCheck > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
	
	$movieArray[$movieCount] = $row['name'];
	$movieCount = $movieCount + 1;
	//echo $row['name'];
	}
	
}	


?>

<html>
<head><link rel="stylesheet" type="text/css" href="styleSheets/site.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<h1 id="profileh1">Profile</h1>
<h2>Movies Watched</h2>
<?php for($i = 0; $i < count($movieArray); $i ++) { ?>
<p id="profilepara"><?php echo $movieArray[$i];?></p><br> <?php

}
?>


<form action="homePage.php" method="POST">
<input type="submit" value="Home Page">
</form>
<footer>
<i class="fa fa-film" aria-hidden="true"></i>
</footer>

</html>

