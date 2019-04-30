<?php
session_start();
$_SESSION["email"] = "";

?>

<html>
<head><link rel="stylesheet" type="text/css" href="styleSheets/site.css"/>       
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<h1 class="headingsh1">Logged Out!</h1>

<h2>Please click the button to return to the home page</h2>
<form action="homePage.php" method="POST">
<input type="submit" value="Home Page">
</form>
<footer>
<i class="fa fa-film" aria-hidden="true"></i>
</footer>
</html>