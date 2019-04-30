   <?php 
session_start();
//#####
//
// Movie Database -   Connects to the movie database, queries the most watched movies, and stores them into
// an array that is accessed to print the names
//
//#####
   
// Array to store the data found
$movieArray = [];


$movieCount = 0;

//Database Information
$user = "coltons5_admin";
$pass = "movies";
$dbName = "coltons5_movies";

//$movieName = $_POST["field1"];

//Connects to the database
$conn = mysqli_connect("localhost", $user, $pass, $dbName); 

//Query that will be ran
$sql = "SELECT * FROM movies ORDER BY mCount DESC, name";


//Getting the results from the database (Conn) from what the Query was (sql)
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
//Puts results into an array for printing to the html table
if ($resultCheck > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
	
	$movieArray[$movieCount] = $row['name'];
	$movieCount = $movieCount + 1;
		
	}
}

//#####
//
// Movie Database - END
//
//#####


//echo $_SESSION["email"];

if ($_SESSION["email"] != "") {
	echo "Hello " . $_SESSION["email"];
}
else {
echo "";
}


   ?> 
   
   
   
   
   
   

<html>
    <head>
         <link rel="stylesheet" type="text/css" href="styleSheets/homePage.css"/>
         <link rel="stylesheet" type="text/css" href="styleSheets/site.css"/>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



        <title>Have I Watched That</title>
        <div>
        <button id="loginButton" onclick="openLoginForm()">Login</button>
        <button id="signUpButton" onclick="openSignupForm()">Sign-Up</button>
        <form action="signout.php" method="POST">
        <input type="submit" value="Sign Out">
	</form>
	</div>
    </head>
    <body>
    <div>
        <!-- <button id="loginButton" onclick="openLoginForm()">Login</button>
        <button id="signUpButton" onclick="openSignupForm()">Sign-Up</button>
        <form action="signout.php" method="POST">
	<input type="submit" value="Sign Out">
	</form>
	</div> -->
        <div>
            <h1 id="hiwt">Have I Watched That?</h1>
        </div>

        <div id="moviesDisplayed"> 
            <h2>Most Watched Movies</h2>
            <table class ="center">

               <tr>
                    <td id="movie1"><?php echo $movieArray[0];?></td>
                    <td id="movie2"><?php echo $movieArray[1];?></td>
                    <td id="movie3"><?php echo $movieArray[2];?></td>
                </tr>
                <tr>
                    <td id="movie4"><?php echo $movieArray[3];?></td>
                    <td id="movie5"><?php echo $movieArray[4];?></td>
                    <td id="movie6"><?php echo $movieArray[5];?></td>  
                </tr>  
                

            </table>
        </div>
        <div class = "centerPage">
        <form action="updateLog.php" method="POST">
        <p id="movieName">Movie Name: </p> <input class= "centerPage" type="text" name="field1"/><br>
        <input id="updateUserLog" type="submit" value = "Update Log">
        </form>
        
        <form action="profile.php" method="POST">
	<input type="submit" value="Profile">
	</form>
	</div>
	
	<footer>
<i class="fa fa-film" aria-hidden="true"></i>
</footer>
        
        








<!-- Pop Ups for login/signup -->
    <div class="form-popup" id="loginForm">
    <form action="login.php" method="POST" class="form-container">
        <h1>Login</h1>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="lEmail" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="lPass" required>

        <button type="submit" class="btn">Login</button>
        <button type="button" class="btn cancel" onclick="closeLoginForm()">Close</button>
    </form>
    </div>

    <div class="form-popup" id="signupForm">
    <form action="signup.php" method="POST" class="form-container">
        <h1>Sign-Up</h1>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="sEmail" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="sPass" required>

        <button type="submit" class="btn">Sign-Up</button>
        <button type="button" class="btn cancel" onclick="closeSignupForm()">Close</button>
    </form>
    </div>
<!-- End of Pop Ups for login/signup -->

    <script>
       
    <!-- Login/Signup Methods -->
    function openLoginForm() {
        document.getElementById("loginForm").style.display = "block";
        try {
            closeSignupForm();
        }
        catch {

        }
    }

    function closeLoginForm() {
        document.getElementById("loginForm").style.display = "none";
    }

    function openSignupForm() {
        document.getElementById("signupForm").style.display = "block";
         try {
            closeLoginForm();
        }
        catch {

        }
    }

    function closeSignupForm() {
        document.getElementById("signupForm").style.display = "none";
    }
<!-- End of Login/Signup Methods -->




    </script>
    </body>
</html>