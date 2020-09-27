<?php

//$server = "localhost";
//$username = "u17029377";
//$password = "mzjxkpgl";
//$database = "dbu17029377";
//$mysqli = mysqli_connect($server, $username, $password, $database);

$server = "localhost";
$username = "root";
$password = "";
$database = "dbu17029377";
$mysqli = mysqli_connect($server, $username, $password, $database);

$email = isset($_POST["email"]) ? $_POST["email"] : false;
$pass = isset($_POST["userPass"]) ? $_POST["userPass"] : false;

?>

<html>

<head>
    <title>P. Exhibit - Profile Edit</title>
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
    <link rel="icon" type="image/png" sizes="192x192" href="media/favicon/android-icon-192x192.png">
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
       
            if($email && $pass){
                $query = "SELECT * FROM usertable WHERE email = '$email' AND pword = '$pass'";
		        $res = $mysqli->query($query);
                if ($row = mysqli_fetch_array($res)) {
                    echo '
						<nav>	
							<ul class="row pb-2" id="nav">
								<div class="col-12 col-sm-12 col-md-6">
									<span> <img src="media/logo6.png" width="80" height="80" alt="logo"> </span>
									<span class="display-4"> Hello: ' . $row['username'] . '</span>
								</div>
								<div class="col-12 col-sm-12 col-md-6">
										
									<li><a href="#about">About</a></li>
									<li><a href="#contact">Contact</a></li>
									<li><a href="profile.php?user_Id=' . $email . '">Profile</a></li>
									<li><a class="active" href="#home">Home</a></li>
								</div>
								
								
							</ul>
							<div class="row" style="background-color:#944170">
								<button class="col-md-2 offset-md-3 col-12  my-2 btn btn-light">Your Feed</button>	
								<button class="col-md-2 offset-md-2 col-12 my-2 btn btn-dark">Global Feed</button>
								<a class="col-3 offset-md-0 offset-4 mt-2" href="index.html">
									<button class="btn btn-info">Log Out</button>
								</a>	
							
							</div>
						</nav>
						';
                    echo '<div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6">
                    <span> <img src="media/logo6.png" width="80" height="80" alt="logo"> </span>
                    <span class="display-4"> Hello: ' . $row['username'] . '</span>
                </div>
                <div class="col-12 col-sm-12 col-md-6">
                    <h1>Edit your profile</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <img src="profilePics/logo6.png">
                </div>
                <div class="col-10">
                    <input type="text" class="form-control">
                    <p>Change your profile picture</p>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <h3>Name</h3>
                </div>
                <div class="col-10">
                    <input type="text" class="form-control">
                    <p>Change your name</p>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <h3>Surname</h3>
                </div>
                <div class="col-10">
                    <input type="text" class="form-control">
                    <p>Change your surname</p>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <h3>Email</h3>
                </div>
                <div class="col-10">
                    <input type="text" class="form-control">
                    <p>Change your email</p>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <h3>Password</h3>
                </div>
                <div class="col-10">
                    <input type="text" class="form-control">
                    <p>Change your password</p>
                </div>
            </div>
            <form method="post" action="editprofile.php">
                <input type="text" value="'.$email.'" name="email">
                <input type="text" value="'.$pass.'" name="userPass">
                <button class="btn btn-dark" type="submit">Save</button>
            </form>
            <form method="post" action="profile.php">
                <input type="hidden" value="">
                <input type="hidden" value="">
                <button class="btn btn-dark" type="submit">Back</button>
            </form>
        </div>';
                }
                else{
                    echo "broken1";
                }
            }
        else{
              echo "broken";
        }
        ?>


    </div>
</body>

</html>
