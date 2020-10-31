<?php

// $server = "localhost";
// $username = "u17029377";
// $password = "mzjxkpgl";
// $database = "dbu17029377";
// $mysqli = mysqli_connect($server, $username, $password, $database);

$server = "localhost";
$username = "root";
$password = "";
$database = "dbu17029377";
$mysqli = mysqli_connect($server, $username, $password, $database);

$email = isset($_POST["email"]) ? $_POST["email"] : false;
$pass = isset($_POST["userPass"]) ? $_POST["userPass"] : false;

if (isset($_POST['upload'])) {
	/*----------------Upload multiple at a time------------*/

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
				} else {
					echo "could not upload";
				}
				$uploadImage = "INSERT INTO userimages(email, picname ,hashtag, i_description, username) VALUES ('$userID','$image','$imageHash','$imageD', '$uName')";
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
else if(isset($_POST['commentBtn'])){
    $commented = $_POST['picComment'];
    $username = $_POST['uName'];
    $picName = $_POST['picName'];

    $uploadComment = "INSERT INTO image_comments (username, picname, comment) VALUES('$username','$picName')";
    if($mysqli->query($uploadComment) === TRUE){
    }
}

// if email and/or pass POST values are set, set the variables to those values, otherwise make them false
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
    <link rel="icon" type="image/png" sizes="192x192" href="media/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="media/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="media/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="media/favicon/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#000000">
    <link href="style/profile2.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="script/navScript.js" charset="utf-8"></script>

</head>

<body id="homeContainer">

    <?php

		if($email && $pass){
            session_start();
            $_SESSION['email'] = $email;
			$getID = "SELECT email FROM usertable WHERE email = '$email'";
			$result = $mysqli->query($getID);
			$sResult = mysqli_fetch_array($result);
			$userID = $sResult['email'];
			
			$query = "SELECT * FROM usertable WHERE email = '$email' AND pword = '$pass'";
			$res = $mysqli->query($query);
			if($row = mysqli_fetch_array($res)){
                echo '
                <div id="navigation" sytle="background-color: green">
                <div class="navBarImage">
                    <form class="" action="home.php" method="post">
                        <input type="hidden" name="email" value="'.$email.'">
                        <input type="hidden" name="userPass" value="'.$pass.'">
                        <button class="btn" type="submit" name="button" style="border:none"><img src="media/logo6.png" /></button>
                    </form>
                </div>
                <div class="container">

                    <ul class="row">
                        <li class="col-3">
                            <form action="home.php" method="post">
                                <input type="hidden" name="email" value="'.$email.'">
                                <input type="hidden" name="userPass" value="'.$pass.'">
                                <button class="btn btn-primary mt-3" type="submit" name="button">Home</button>
                            </form>
                        </li>
                        <li class="col-3">
                            <form action="profile.php" method="post">
                                <input type="hidden" name="email" value="'.$email.'">
                                <input type="hidden" name="userPass" value="'.$pass.'">
                                <button class="btn btn-primary mt-3 active" type="submit">Profile</button>
                            </form>
                        </li>
                        <li class="col-3">
                            <form action="index.html" method="post">
                                <button class="btn btn-primary mt-3" type="submit">Log Out</button>
                            </form>
                        </li>
                        <li class="col-3 pt-3"> '.$row['username'].'</li>
                    </ul>
                </div>
            </div>
            <br>
            <br>
            <div class="container" id="UploadImage">
                <form action="profile.php" method="post" enctype="multipart/form-data">
        
                    <label>Choose Image</label>
                    <input type="file" name="picToUpload[]" id="picToUpload" multiple="multiple" required="required">
        
                    <label>Hashtag</label>
                    <input type="text" name="iHash" placeholder="#sunset" required="required">
        
                    <label>Description</label>
                    <input type=" text" name="iDescription" placeholder="Relaxing time watching the sunset" required="required">
        
                    <input type="hidden" name="UserName" value="'.$row['username'].'">
                    <input type="hidden" name="email" value="'.$email.'">
                    <input type="hidden" name="userPass" value="'.$pass.'">
        
                    <button type="submit" class="btn" style="border:1px solid pink;transition: all 0.2s" name="upload">Upload Image</button>
                </form>
                <!--Uploading images-->
        
            </div>
            <br>
            <div class="container">
                <div id="statusBox">
                    <div id="statusBox_Content">
                        <div id="profileImage" class="innerContents">
                            <img src="profilePics/'.$row['profilepic'].'" alt="profileImage">
                        </div>
                        <div id="info" class="innerContents">
                            <div id="upperInfo">
                                <h3>'.$row['username'].'</h3>
                                <form method="post" action="editprofile.php">
                                    <span style="color:#333;">'.$email.'       ->Click on the right to edit info </span>
                                    <input type="hidden" name="email" value="'.$email.'">
                                    <input type="hidden" name="userPass" value="'.$pass.'">
                                    <button type="submit"  style="border:1px solid pink;transition: all 0.2s; margin-bottom: 1%;" name="upload" class="btn" id="EditBtn">Edit profile information</button>
                                </form>
                            </div>
                            <div id="lowerInfo">
                                <button class="btn"># Posts</button>
                                <button class="btn">Followers</button>
                                <button class="btn">Following</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div id="FeedsBox">
                    <div id="singlePosts" class="postsBoxes">
                        <!--Posts go here in reverse Chronological order-->
                        <!--Posts will have to have the function to edit-->
                        <h1>Your Posts</h1>';

                $query = "SELECT * FROM userimages  WHERE email = '$userID' ORDER BY date DESC";
                
				$result = $mysqli->query($query);
                if($result->num_rows > 0){
                    while($rowTwo = $result->fetch_assoc()){
                        echo '     <div class="PostCard">
                            <div class="postCard_Header">
                                <div class="postCard_Header_PP" style="margin-right:25%;margin-left:5%">
                                    <i class="fas fa-edit" ></i>
                                </div>
                                <div class="postcard_Header_PP">
                                    <form method="post" action="editPost.php">
                                        <input type="hidden" name="email" value="'.$email.'">
                                        <input type="hidden" name="userPass" value="'.$pass.'">
                                        <input type="hidden" name="picname" value="'.$rowTwo['picname'].'">
                                        <button type="submit" class="editButton">Edit</button>
                                    </form>
                                </div>
        
                            </div>
                            <div class="postCard_Image">
                                <img src="postGallery/' . $rowTwo['picname'] . '" alt="postImage">
                                
                            </div>
                            <div class="postCard_Footer">
                                <div id="Hashtage">
                                    <form action="postPage.php" method="post">
                                        <input type="hidden" name="email" value="'.$email.'">
                                        <input type="hidden" name="userPass" value="'.$pass.'">
                                        <input type="hidden" name="hashtag" value="'.$rowTwo['hashtag'].'">
                                        <button class="editButton" type="submit">' . $rowTwo['hashtag'] . '</button>
                                    </form>
                                </div>
                                <div id="comments">
                                    <span>' . $rowTwo['i_description'] . '</span>
                                    <div id="showComments">';
                                    $picname = $rowTwo['picname'];
                                    $username = $row['username'];
                                    $comments = "SELECT * FROM image_comments WHERE username = '$username' AND picname = '$picname'  ORDER BY time DESC";
                                    $commentResults = $mysqli->query($comments);
                                    if($commentResults->num_rows > 0){
                                        while($numCom = $commentResults->fetch_assoc()){
                                            echo '
                                                <p>"'.$numCom['comment'].'" "'.$numCom['time'].'"</p>
                                            ';
                                        }
                                    }
                                 echo '   </div>
                                </div>
                            </div>
                        </div>';
                    }
                }
            echo '
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                    <div id="albums" class="postsBoxes">
                <h1>Your Albums</h1>

                <div class="album">
                    <h3>Album 1</h3>
                    <button class="btn">Edit Album</button>
                </div>
                <div class="album">
                    <h3>Album 1</h3>
                    <button class="btn">Edit Album</button>
                </div>
                <div class="album">
                    <h3>Album 1</h3>
                    <button class="btn">Edit Album</button>
                </div>
                <div class="album">
                    <h3>Album 1</h3>
                    <button class="btn">Edit Album</button>
                </div>
                <div class="album">
                    <h3>Album 1</h3>
                    <button class="btn">Edit Album</button>
                </div>
                <div class="album">
                    <h3>Album 1</h3>
                    <button class="btn">Edit Album</button>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
                </div>
            </div>
					';	
				}	
        }
        else{
            echo "hello";
        }		
	?>

    <!-- <div class="container-fluid">
        <div class="container" id="topBar">
            <div class="row">
                <div class="col-4" id="topBar_Left">
                    <img src="profilePics/logo6.png" alt="profilePic">
                </div>
                <div class="col-8" id="topBar_Right">
                    <div class="row">
                        <div class="col-6"> Username</div>
                        <div class="col">
                            <form method="POST" action="editprofile.php">
                                <input type="hidden" value="matsch@gmail.com" name="email">
                                <input type="hidden" value="Pancakes#1" name="userPass">
                                <button type="submit" class="btn btn-light">Edit Profile</button>

                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <h5>posts</h5>
                        </div>
                        <div class="col-4">
                            <h5>Followers</h5>
                        </div>
                        <div class="col-4">
                            <h5>Following</h5>
                        </div>
                    </div>
                    <div class="row">
                        <h5><b>name</b></h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 border">
                    <!--Posts-->
                   <!-- <div class="card border">

                        <div class="card-title">hello
                        </div>
                        <div class="card-body">
                            <div class="card-img">
                                <img src="profilePics/logo6.png">
                            </div>
                            <div class="card-text">
                                fill em with the vennon and eliminate them
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 border">
                    <!--Albums-->
                   <!-- <div class="card border">

                        <div class="card-title">hello
                        </div>
                        <div class="card-body">
                            <div class="card-img">
                                <img src="profilePics/logo6.png">
                            </div>
                            <div class="card-text">
                                fill em with the vennon and eliminate them
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

</body>

</html>
