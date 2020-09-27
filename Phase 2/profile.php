<?php
	
	$server = "localhost";
	$username = "u17029377";
	$password = "mzjxkpgl";
	$database = "dbu17029377";
	$mysqli = mysqli_connect($server, $username, $password, $database);

	
$email = isset($_GET['user_Id']) ? $_GET['user_Id'] : false;

if (isset($_POST['submit'])) {
	
	/*----------------Upload multiple at a time------------*/
	$targetFile = "gallery/";
	$uploadFile = $_FILES['picToUpload'];
	$numFiles = count($uploadFile['name']);
	$userID = $email;
	$imageName = $_POST['iName'];
	$imageD = $_POST['iDescription'];
	$imageHash = $_POST['iHash'];

	for ($i = 0; $i < $numFiles; $i++) {
		$target = $targetFile . $uploadFile['name'][$i];
		$imageType = strtolower(pathinfo($target, PATHINFO_EXTENSION));

		$image = $uploadFile['name'][$i];

		if ($imageType === "jpeg" || $imageType === "jpg" || $imageType === "png") {

			if ($uploadFile['error'][$i] > 0) {
			} else {

				// if (!file_exists($target)) {
				$sql = "INSERT INTO userimages (email, filename, imagename, hashtag, i_description) VALUES ('$userID','$image', '$imageName', '$imageHash', '$imageD')";
				if ($mysqli->query($sql) === TRUE) {

					if (move_uploaded_file($uploadFile['tmp_name'][$i], $target)) {
					} else {
					}
				}
				// }
			}
		}
	}


	//-----------------Upload multiple at a time------------*/


}


if(isset($_POST['upload'])){
	$target = "gallery/" . basename($_FILES['profile']['name']);

		$image = $_FILES['profile']['name'];//get the file name------
		$email = $_GET['user_Id'];
		


		//--------------We need to do some checks before it cam be uploaded----------------
		$imageType = strtolower(pathinfo($target, PATHINFO_EXTENSION));
		if ($imageType === "jpeg" || $imageType === "jpg" && $_FILES['profile']['size'] < 1048576) {
			if ($_FILES['profilepic']['error'] > 0) {
				echo "Error";
			} else {
				if (!file_exists($target)) {
					$sql = "INSERT INTO userimages (profilepic) VALUES ('$image') WHERE email ='$email'";
					if ($mysqli->query($sql) === TRUE) {

						if (move_uploaded_file($_FILES['profile']['tmp_name'], $target)) {
							
						} else {
						}
					}
				} else {
				}
			}
		}
	// if email and/or pass POST values are set, set the variables to those values, otherwise make them false
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>P. Exhibit - Profile</title>
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

<body id="homeContainer">
	
	<?php

		if($email){
			$getID = "SELECT email FROM usertable WHERE email = '$email'";
			$result = $mysqli->query($getID);
			$sResult = mysqli_fetch_array($result);
			$userID = $sResult['email'];
			
			$query = "SELECT * FROM usertable WHERE email = '$email'";
			$res = $mysqli->query($query);
			if($row = mysqli_fetch_array($res)){
				echo '
					<nav>	
						<ul class="row pb-2" id="nav">
							<div class="col-12 col-sm-12 col-md-6">
								<span> <img src="media/logo6.png" width="80" height="80" alt="logo"> </span>
								<span class="display-4"> Hello: '.$row['username'].'</span>
							</div>
							<div class="col-12 col-sm-12 col-md-6">
									
								<li><a href="#about">About</a></li>
								<li><a href="#contact">Contact</a></li>
								<li><a href="profile.php">Profile</a></li>
							  	<li><a class="active" href="home.php">Home</a></li>
							</div>
							
						</ul>
						
					</nav>

					<div class="container-fluid">
							<div class="row">
								<div class="col-md-3 col-12" style="background-color:#944170">
									<div class="card" >
										<form action="profile.php" method="GET" enctype="multipart/form-data" class="container" id="imageUpload" style="background-color:#944170; border:none;">
												<div class="card-header">
													Profile Photo
												</div>
												<div>';
												$query = "SELECT * FROM userimages  WHERE email = '$userID' ORDER BY date DESC";
												$result = $mysqli->query($query);
												$pshow = $result->fetch_assoc();
												if($pshow['profilepic']){
												echo'	<img class="card-img" src="gallery/'.$pshow['profilepic'].'">';
												}
												else{
													echo "No profile picture";
												}
												echo'</div>
												<label>Change your profile photo</label>
												<input type="file" name="profile"/>
												<input type="text" name="user_Id" value="'.$email.'"/>
												<button type="submit" class="btn btn-light" name="upload">Upload</button>
										</form>
									</div>
								</div>
					';	
				}	
		}	
		
	?>
	
</body>

</html>
