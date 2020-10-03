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

if(isset($_POST['updateInfoBtn'])){

    $cFname = $_POST['fname'];
    $cLname = $_POST['lname'];
    $cPword = $_POST['userPass'];
    $cEmail = $_POST['email'];
    $cUsername = $_POST['username'];
    $updateInfo = mysqli_query($mysqli,"UPDATE usertable SET fname = '".$cFname."', lname = '".$cLname."', pword = '".$cPword."',email = '".$cEmail."',username = '".$cUsername."' WHERE email = '$email' AND pword = '$pass'");
    $updateImageTable = mysqli_query($mysqli, "UPDATE userimages SET email ='".$cEmail."' AND username='".$cUsername."' WHERE email = '$email' AND username = '$cUsername'");
}
elseif(isset($_POST['ppBtn'])){
    $target = "profilePics/" . basename($_FILES['picToUpload']['name']);
    
    $image = $_FILES['picToUpload']['name'];//get the file name------
    $username = $_POST['username'];
	//--------------We need to do some checks before it cam be uploaded----------------
    $imageType = strtolower(pathinfo($target, PATHINFO_EXTENSION));
	if ($imageType === "jpeg" || $imageType === "jpg" || $imageType === "png" || $imageType === "jfif" && $_FILES['picToUpload']['size'] < 1048576) {
		if ($_FILES['picToUpload']['error'] > 0) {
			echo "Error";
		} else {
				$sql = "UPDATE usertable SET profilepic = '".$image."' WHERE email ='$email' AND pword = '$pass' AND username ='$username'";
				if ($mysqli->query($sql) === TRUE) {

					if (move_uploaded_file($_FILES['picToUpload']['tmp_name'], $target)) {
						
					} else {
                        echo "here 1" ;
					}
                }
                else{
                    echo "here 1" ;
                }
		}
    }
    else{
        
    }
}
elseif(isset($_POST['deleteInfo'])){
    $dFname = $_POST['fname'];
    $dLname = $_POST['lname'];
    $dPword = $_POST['userPass'];
    $dEmail = $_POST['email'];
    $dUsername = $_POST['username'];
    $deleteUser = (mysqli_query($mysqli, "DELETE FROM usertable WHERE email = '$dEmail' AND pword = '$dPword' AND fname= '$dFname' AND lname = '$dLname' AND username ='$dUsername'"));
    $deleteImages = (mysqli_query($mysqli, "DELETE FROM userimages WHERE email = '$dEmail' AND username ='$dUsername'"));
    $deleteComments = (mysqli_query($mysqli, "DELETE FROM image_comments WHERE username ='$dUsername'"));
}

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
<!--    <link rel="stylesheet" type="text/css" href="style.css">-->
<link href="style/editprofileInfo.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container">
        <?php
       
            if($email && $pass){
                $query = "SELECT * FROM usertable WHERE email = '$email' AND pword = '$pass'";
		        $res = $mysqli->query($query);
                if ($row = mysqli_fetch_array($res)) {
						
                    echo ' <div class="container">
                    <h3 style="text-align: center">Select a box to change your information</h3>
                    <div id="topBox">
                        <!--this ,ust be split into two columns-->
                        <div class="row">
                            <div class="col-md-4 col-sm-12" id="profilePicBox">
                                <img src="profilePics/'.$row['profilepic'].'" alt="profilePic">
                            </div>
                            <div class="col-md-8 col-sm-12" id="changePic">
                                <h2>'.$row['username'].'</h2>
                                <h3>'.$row['fname'].''." ".''.$row['lname'].'</h3>
                                <form method="post" action="editprofile.php" enctype="multipart/form-data">
                                    <input type="hidden" name="email" value="'.$email.'">
                                    <input type="hidden" name="userPass" value="'.$pass.'">
                                    <input type="hidden" name="username" value="'.$row['username'].'">
                                    <input type="file" name="picToUpload" id="picToUpload">
                                    <button type="submit" name="ppBtn" class="btn">Change Profile Picture</button>  
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="bottomBox">
                        <form action="editProfile.php" method="post">
                            <table class="row">
                                <tr class="col-12">
                                    <td>
                                        <h3>Name:</h3>
                                    </td>
                                    <td>
                                        <input type="text" name="fname" value="'.$row['fname'].'" class="form-control">
                                    </td>
                                    <td class="moveRight">
                                        <h3>Surname:</h3>
                                    </td>
                                    <td>
                                        <input type="text" name="lname" value="'.$row['lname'].'" class="form-control">
                                    </td>
                                </tr>
                                <tr class="col-12">
                                    <td>
                                        <h3>Password:</h3>
                                    </td>
                                    <td> <input type="text" name="userPass" value="'.$row['pword'].'" class="form-control"></td>
                                    <td class="moveRight">
                                        <h3>Email:</h3>
                                    </td>
                                    <td>
                                        <input type="email" name="email" value="'.$row['email'].'" class="form-control">
                                    </td>
                                </tr>
                                <tr class="col-12">
                                    <td>
                                        <h3>Username:</h3>
                                    </td>
                                    <td>
                                        <input type="text" name="username" value="'.$row['username'].'" class="form-control">
                                    </td>
                                </tr>
                            </table>
                            <button class="btn" name="updateInfoBtn" type="submit">Update Info</button>
                        </form>
                        <div>
                           <form action="editProfile.php" method="post">
                                <input type="hidden" name="email" value="'.$email.'">
                                <input type="hidden" name="userPass" value="'.$pass.'">
                                <input type="hidden" name="fname" value="'.$row['fname'].'">
                                <input type="hidden" name="lname" value="'.$row['lname'].'">
                                <input type="hidden" name="username" value="'.$row['username'].'">
                                <button type="submit" class="btn" name="deleteInfo">Delete this acount</button>
                           </form>
                        </div>
                        <form method="post" action="profile.php">
                            <input type="hidden" name="email" value="'.$row['email'].'">
                            <input type="hidden" name="userPass" value="'.$row['pword'].'">
                            <button class="btn" name="goBackBtn" type="submit">Go back</button>
                        </form>
                    </div>
                </div>';
                }
                else{
                    echo "<h1>Oops, this account no longer exists</h1><h3>Go back to home and create a new one</h3>
                    <form method='post' action='index.html'>
                        <button type='submit' class='btn btn-info' style='background-color: aqua; color: black;'>Go to home</button> 
                    <form>
                    ";
                }
            }
        else{
              echo "broken";
        }
        ?>


    </div>
</body>

</html>
