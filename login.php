<html>
<head><link rel="stylesheet" type="text/css" href="styleSheets/site.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<h1 class="headingsh1">Login Page</h1><br>

<?php
// Start the session
session_start();




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

$email = $_POST["lEmail"];
$pass= $_POST["lPass"];

$query = mysqli_query($conn, "SELECT * FROM accounts WHERE email='".$email."'");
$row = mysqli_fetch_assoc($query);

if(mysqli_num_rows($query) > 0){
//echo "Email already exists";
	
   	
   	if($row['pass'] == $pass) { ?>
   		<p><?php echo "You are logged in";?></p><?php
   		$_SESSION["email"] = "$email";
   	}
   	else { ?>
   		<p><?php echo "Incorrect Password";?></p><?php
   	}
   
    
}else{ ?>
    
	<p><?php echo "Email Does Not Exist";?></p><?php
}



//#####
//
// Account Database - END
//
//#####
?>


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
