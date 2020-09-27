<?php

$server = "localhost";
$username = "u17029377";
$password = "mzjxkpgl";
$database = "dbu17029377";
$mysqli = mysqli_connect($server, $username, $password, $database);

$email = isset($_POST["email"]) ? $_POST["email"] : false;
$pass = isset($_POST["userPass"]) ? $_POST["userPass"] : false;


if (isset($_POST['upload'])) {
	/*----------------Upload multiple at a time------------*/

	$targetFile = "gallery/";

	$uploadFile = $_FILES['picToUpload'];
	$numFiles = count($uploadFile['name']);
	$userID = $email;
	//$imageName = $_POST['iName'];
	$imageD = $_POST['iDescription'];
	$imageHash = $_POST['iHash'];
	$userName = $_POST['username'];

	for ($i = 0; $i < $numFiles; $i++) {

		$target = $targetFile . $uploadFile['name'][$i];
		$imageType = strtolower(pathinfo($target, PATHINFO_EXTENSION));

		$image = $uploadFile['name'][$i];

		if ($imageType === "jpeg" || $imageType === "jpg" || $imageType === "png" || $imageType === "jfif") {
			
			if ($uploadFile['error'][$i] > 0) {
			} else {
				
				if (move_uploaded_file($uploadFile['tmp_name'][$i], $target)) {
				} else {
					echo "could not upload";
				}
				$uploadImage = "INSERT INTO userimages(email, picname ,hashtag, i_description, username) VALUES ('$userID','$image','$imageHash','$imageD', '$username')";
				// $imageUploading = "INSERT INTO userimages (email, fname, hashtag, i_description, username) VALUES ('$userID','$image', '$imageHash', '$imageD', '$userName')";
				if ($mysqli->query($uploadImage) === TRUE) {
					
				} else {
					//echo $image;
				}
			}
		}
	}
	//-----------------Upload multiple at a time------------*/
}

// if email and/or pass POST values are set, set the variables to those values, otherwise make them false
?>

<!DOCTYPE html>
<html>

<head>
	<title>P. Exhibit - Home</title>
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

<body id="homeContainer">

	<?php
	if ($email && $pass) {

		session_start();
		$_SESSION['email'] = $email;
		
		$getID = "SELECT email FROM usertable WHERE email = '$email' AND pword = '$pass'";
		$result = $mysqli->query($getID);
		$sResult = mysqli_fetch_array($result);
		$userID = $sResult['email'];

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



				echo '
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-3 col-12" style="background-color:#944170">
									<div class="card" >
										<form action="home.php" method="POST" enctype="multipart/form-data" class="container" id="imageUpload" style="background-color:#944170; border:none;">
											<div class="card-header">
												Upload a Photo
											</div>
											<div class="form-group">
												<label>Choose your photo</label><br/>
												<input type="file" class="form-control col-12" name=" picToUpload[]" id="picToUpload" multiple="multiple" required="required"/>
											</div>
											<div class="form-group">
												<label>Photo Description</label><br/>
												<input type="text" class="form-control col-12" name="iDescription" placeholder="Relaxing time watching the sunset" required="required">
											</div>
											<div class="form-group">
												<label>Choose your hastags</label><br/>
												<input type="text" class="form-control col-12" name="iHash" placeholder="#sunset" required="required">
											</div>
											<input type="hidden" name="username" value="' . $row['username'] . '"/>
											<input type="hidden" name="email" value="' . $email . '"/>
											<input type="hidden" name="userPass" value="' . $pass . '"/>
											
											<button type="submit" class="btn btn-light" name="upload">Upload Image</button>
										</form>
									</div>
								</div>';


				echo '
								<div class="col ml-1" id="showPic">
									<div class="row imageGallery">';

				$query = "SELECT * FROM userimages  WHERE email = '$userID' ORDER BY date DESC";

				$result = $mysqli->query($query);
				if ($result->num_rows > 0) {
					// output data of each row
					while ($rowTwo = $result->fetch_assoc()) {
						echo '		<div class="col-12 col-sm-6 offset-sm-3 mx-sm-1 offset-md-3 col-md-5 mx-md-2 col-lg-3 col-xl-3 card my-2" style="box-shadow: 5px 5px 15px black;height:45vh">
											<div class="uploaded" style="height: 100%">
												<div class="card-title" style="height: 10%">
													<div class="card-header">' . $row['username'] . '</div>
												</div>
												<div class="card-img-top imageBackground" style="height: 60%; width:100%">
													<img class="card-img" src="gallery/' . $rowTwo['picname'] . '" alt="Card image cap" style="width: 100%; height:100%">
												</div>
												<div class="card-body py-0" style="height: 20%">
												<div class="row card-text">
													<div class="col-11 text-left">
														<h6 class="card-text">' . $rowTwo['hashtag'] . '</h6>
													</div>
													<div>
														<i class="far fa-heart"></i>
													</div>
												</div>
												<div class="row">
													
													<div class="text-muted">
													<p>' . $rowTwo['i_description'] . '</p><p>' . $rowTwo['date'] . '</p>
														
													</div>
														
												</div>
												</div>
											</div>
										</div>';
					}
				} else {
					echo '
									<div class="container" style="text-align:center; color:white; margin-top:5%">
										<h1>Nothing to show</h1>
										<i class="far fa-sad-tear"></i>
									</div>
									';
				}
				echo '</div>
									<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
								</div>
							</div>
						</div>';
			 
		} else {
			echo "
				
					<nav>	
						<ul class='row'>
							<div class='container' style='text-align:center'>
								<h1>Sorry, you are not registered</h1>
								
							</div>
							
						</ul>
					</nav>
					<div class='container' style='text-align:cente'>
						<h1 style='text-align:center'>Please try again</h1>
						<form action='index.html' method='POST'>
							<button type='submit' class='btn btn-warning' style='margin:2% 40%; width: 20%'>Back to Sign In</button>
						</form>
					</div>
				";
		}
	} else {
		echo '
			
			<nav>	
				<ul class="row">
					<div class="container" style="text-align:center">
						<h1>Sorry, could not log you in</h1>
					</div>
					
				</ul>
			</nav>
			<div class="container" style="text-align:center">
				<h1>Please try again</h1>
				<form action="index.html" method="POST">
					<button class="btn btn-warning" type="submit">Back</button>
				</form>
			</div>
			';
	}


	?>

</body>

</html>