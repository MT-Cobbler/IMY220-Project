<?php

$server = "localhost";
$username = "u17029377";
$password = "mzjxkpgl";
$database = "dbu17029377";
$mysqli = mysqli_connect($server, $username, $password, $database);

// $server = "localhost";
// $username = "root";
// $password = "";
// $database = "dbu17029377";
// $mysqli = mysqli_connect($server, $username, $password, $database);

$email = isset($_POST["email"]) ? $_POST["email"] : false;
$pass = isset($_POST["userPass"]) ? $_POST["userPass"] : false;


if (isset($_POST['upload'])) {
	/*----------------Upload multiple at a time------------*/
    echo 'hello';
	$targetFile = "postGallery/";

	$uploadFile = $_FILES['picToUpload'];
	$numFiles = count($uploadFile['name']);
	$userID = $email;
	//$imageName = $_POST['iName'];
	$imageD = $_POST['iDescription'];
	$imageHash = $_POST['iHash'];
	$uName = $_POST['UserName'];

	for ($i = 0; $i < $numFiles; $i++) {
     
		$target = $targetFile . $uploadFile['name'][$i];
		$imageType = strtolower(pathinfo($target, PATHINFO_EXTENSION));

		$image = $uploadFile['name'][$i];

		if ($imageType === "jpeg" || $imageType === "jpg" || $imageType === "png" || $imageType === "jfif") {
			
			if ($uploadFile['error'][$i] > 0) {
			} else {
			
				if (move_uploaded_file($uploadFile['tmp_name'][$i], $target)) {
                    $query ="INSERT INTO userimages (username, email, picname, hashtag, i_description) VALUES ('$uName','$userID','$image','$imageHash','$imageD')";
                    if($mysqli->query($query) == TRUE){
                      
                    }
                    else{
                       
                    }
                    // $uploadImage = "INSERT INTO userimages(email, picname ,hashtag, i_description, username) VALUES ('".$userID."','$image','$imageHash','$imageD', '$uName')";
                    // // $imageUploading = "INSERT INTO userimages (email, fname, hashtag, i_description, username) VALUES ('$userID','$image', '$imageHash', '$imageD', '$userName')";
                    // if ($mysqli->query($uploadImage) === TRUE) {
                    //     echo 'hello';
                    // } else {
                    //     //echo $image;
                    // }
				} else {
					echo "could not upload";
				}
				
			}
		}
	}
	//-----------------Upload multiple at a time------------*/
}
elseif(isset($_POST['commentBtn'])){
    $commented = $_POST['picComment'];
    $username = $_POST['uName'];
    $picName = $_POST['picname'];

    $uploadComment = "INSERT INTO image_comments (username, picname, comment) VALUES('$username','$picName', '$commented')";
    if($mysqli->query($uploadComment) === TRUE){
    }
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
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link rel="stylesheet" href="style/home.css" type="text/css">

    <style>


    </style>
</head>

<body>
    <?php
        if($email && $pass){
            session_start();
            $_SESSION['email'] = $email;

            $getID = "SELECT email FROM usertable WHERE email = '$email' AND pword = '$pass'";
            $result = $mysqli->query($getID);
            $sResult = mysqli_fetch_array($result);
            $userID = $sResult['email'];

            $query = "SELECT * FROM usertable WHERE email = '$email' AND pword = '$pass'";
            $res = $mysqli->query($query);
            
            if($row = mysqli_fetch_array($res)){
                echo '
                <div id="navigation">
                        <div class="container">
                        <ul>
                        <a href="#">
                                <li class="active">Home</li>
                            </a>
                            <li><form action="profile.php" method="post">
                                <input type="hidden" value="'.$email.'" name="email">
                                <input type="hidden" value="'.$pass.'" name="userPass">
                                <button type="submit">Profile</button>
                            </form></li>
                            
                            <a href="index.html">
                                <li>Log Out</li>
                            </a>
                            <a>
                                <li>'. $row['username'].'</li>
                            </a>
                        </ul>
                    </div>
            </div>
                        <br>
                        <br>

                        <div class="container-fluid">
                            <!--We need to have two divs- 1 for user - 2 for everyone -->
                            <div class="feedDiv">

                                <div id="UploadImage" class="container">
									<form action="home.php" method="post" enctype="multipart/form-data">
									
                                        <label>Choose Image</label>
										<input type="file" name="picToUpload[]" id="picToUpload" multiple="multiple" required="required">
										
                                        <label>Hashtag</label>
										<input type="text" name="iHash" placeholder="#sunset" required="required"">
										
                                        <label>Description</label>
										<input type="text" name="iDescription" placeholder="Relaxing time watching the sunset" required="required">
										
										<input type="hidden" name="UserName" value="' . $row['username'] . '"/>
										<input type="hidden" name="email" value="' . $email . '"/>
										<input type="hidden" name="userPass" value="' . $pass . '"/>

                                        <button type="submit" class="btn" style="border:1px solid pink;" name="upload" >Upload Image</button>
                                    </form>
                                    <!--Uploading images-->

                                </div>
                                <div id="feedButtons">
                                    <button class="btn selectedButton">Your Feed</button>
                                    <button class="btn">Global Feed</button>
                                </div>
                                <div id="personalFeed" class="feeds">
                                    <!--We need to create the cards-->';
                
                $query = "SELECT * FROM userimages  WHERE email = '$userID' ORDER BY date DESC";
                
				$result = $mysqli->query($query);
                if($result->num_rows > 0){
                    while($rowTwo = $result->fetch_assoc()){
                         echo '
                                    <div class="PostCard">
                                        <div class="postCard_Header">
                                            <div class="postCard_Header_PP" >
                                                <img src="profilePics/'.$row['profilepic'].'" alt="profilePicture" style="background-color:white">
                                            </div>
                                            <div class="postcard_Header_PP">
                                                <!--<a href="profile.php?email=' . $email . '& userPass='.$pass.'"><span>' . $rowTwo['username'] . '</span></a>-->
                                                <form method="post" action="profile.php">
                                        <input type="hidden" name="email" value="'.$email.'">
                                        <input type="hidden" name="userPass" value="'.$pass.'">
                                        <input type="hidden" name="picname" value="'.$rowTwo['picname'].'">
                                        <button type="submit" id="editButton">' . $rowTwo['username'] . '</button>
                                    </form>
                                            </div>

                                        </div>
                                        <div class="postCard_Image">
                                            <img src="postGallery/' . $rowTwo['picname'] . '" alt="postImage">
                                        </div>
                                        <div class="postCard_Footer" style="height: 25%; padding-left: 3%;background-color: #9e0059;">
                                            <div id="Hashtage">
                                                <form action="postPage.php" method="post">
                                                    <input type="hidden" name="email" value="'.$email.'">
                                                    <input type="hidden" name="userPass" value="'.$pass.'">
                                                    <input type="hidden" name="hashtag" value="'.$rowTwo['hashtag'].'">
                                                    <button class="editButton" type="submit">' . $rowTwo['hashtag'] . '</button>
                                                </form>
                                                <p>' . $rowTwo['i_description'] . '</p>
                                            </div>
                                            <div id="comments">
                                               <form method="post" action="home.php">
                                                    <input type="hidden" name="email" value="'.$email.'">
                                                    <input type="hidden" name="userPass" value="'.$pass.'">
                                                    <input type="hidden" name="picname" value="'.$rowTwo['picname'].'">
                                                    <input type="hidden" name="uName" value="'.$rowTwo['username'].'">
                                                    <input type="text" name="picComment" placeholder="Write a comment">
                                                    <button type="submit" name="commentBtn" id="commentBtn">Comment</button>
                                               </form>';
                                               $username = $rowTwo['username'];
                                               $picname = $rowTwo['picname'];
                                $comments = "SELECT * FROM image_comments WHERE username = '$username' AND picname = '$picname' ORDER BY time DESC";
                                $comResult = $mysqli->query($comments);
                                if($comResult->num_rows > 0){
                                    while($rowThree = $comResult->fetch_assoc()){
                                        echo '<p>"'.$rowThree['comment'].'"</p>';
                                    }
                                }

                                               
                                        echo '    </div>
                                        </div>
                                    </div>';
                    }
                }else{
					echo '
									<div class="container" style="text-align:center; color:white; margin-top:5%">
										<h1>Nothing to show</h1>
										<i class="far fa-sad-tear"></i>
									</div>
									';
				}
                echo '
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br><br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                                <!--
                            <div id="globalFeed" class="feeds">
                                <div class="PostCard">
                                    <div class="postCard_Header">
                                        <div class="postCard_Header_PP">
                                            <img src="" alt="profilePicture">
                                        </div>
                                        <a href="" class="postCard_Header_PP"><span>User Profile name</span></a>
                                    </div>
                                    <div class="postCard_Image">
                                        <img src="user.png" alt="postImage">
                                    </div>
                                    <div class="postCard_Footer">
                                        <div id="Hashtage">
                                            <p>hashtags</p>
                                        </div>
                                        <div id="Hashtage"></div>
                                        <div id="comments">
                                            <label>Add a comment</label>
                                            <div id="showComments">
                                                {Comments will display here}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                -->
                            </div>
                        </div>
        ';
        }else{
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
