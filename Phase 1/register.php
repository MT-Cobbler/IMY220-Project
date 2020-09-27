<?php
// See all errors and warnings
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

	$server = "localhost";
	$username = "u17029377";
	$password = "mzjxkpgl";
	$database = "dbu17029377";
$mysqli = mysqli_connect($server, $username, $password, $database);

if($mysqli){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$uname = $_POST['userName'];
	$pword = $_POST['userPass'];
	$email = $_POST['email'];

	$query = "INSERT INTO usertable (fname, lname, pword, email, username)	VALUES ('$fname','$lname','$pword','$email', '$uname')";


	$res = mysqli_query($mysqli, $query) == TRUE;
}
else{
	echo "something went wrong";
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>P. Exhibit - Register</title>
	<meta charset="utf-8">
	<meta name="author" content="Matthew Schoeman">
	<meta name="viewport" content="width=device-width,initial-1">
	<!--Bootstrap CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!--Font Awesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <!--style.css-->
    
    <link rel="apple-touch-icon" sizes="57x57" href="media/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="media/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="media/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="media/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="media/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="media/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="media/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="media/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="media/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="media/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="media/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="media/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="media/favicon/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#000000">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#000000">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<?php
			if($res){

				echo "
					<nav>	
						<ul class='row'>
							<div class='container' style='text-align:center'>
								<h1>Thank you for joining us</h1>
								<h2>Enjoy what we have to offer</h2>
							</div>
							
						</ul>
					</nav>
					<form method='POST' action='home.php'>
						<input type='hidden' name='email' value='".$email."'/>
						<input type='hidden' name='userPass' value='".$pword."'/>
						<button type='submit' class='btn btn-light' style='margin:2% 40%; width: 20%'>Go To Home</button>
					</form>";
			}
			else{
			echo '
				<nav>	
					<ul class="row">
						<div class="container" style="text-align:center">
							<h1>Sorry, could not create an account</h1>
						</div>
						
					</ul>
				</nav>
				<div class="container" style="text-align:center">
					<h1>Please try again</h1>
					<form action="index.html" method="POST">
						<button class="btn btn-light" type="submit">Back</button>
					</form>
				</div>
				';
		}
		
		?>
	</div>
</body>
</html>