<?php

//#####
//
// Account Database - Connects the account database and allows users to store an email and password into the account.
//
//#####

//Database Information
$user = "coltons5_admin";
$pass = "movies";
$dbName = "coltons5_movies";
//Connects to the database
$conn = mysqli_connect("localhost", $user, $pass, $dbName); 

$email = $_POST["sEmail"];
$pass= $_POST["sPass"];

$query = mysqli_query($conn, "SELECT * FROM accounts WHERE email='".$email."'");
$row = mysqli_fetch_assoc($query);

if(mysqli_num_rows($query) > 0){

?>
   		<p><?php echo "Email Already Exists";?></p><?php

	
   	
   	
   
    
}else{
    
	?>
   		<p><?php echo "Account has been Created";?></p><?php
	$sqlInsert = "INSERT INTO accounts (email, pass) VALUES ('$email', '$pass');";
	$insert= mysqli_query($conn, $sqlInsert);	
}



//#####
//
// Account Database - END
//
//#####
?>

<html>
<head><link rel="stylesheet" type="text/css" href="styleSheets/site.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<h1 class="headingsh1">Sign-Up Page</h1><br>
<h2>Click the button below to return to the homepage to login!</h2>
<form action="homePage.php" method="POST">
<input type="submit" value="Home Page">
</form>
<footer>
<i class="fa fa-film" aria-hidden="true"></i>
</footer>
</html>