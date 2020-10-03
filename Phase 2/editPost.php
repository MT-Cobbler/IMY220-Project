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
$picname = isset($_POST["picname"]) ? $_POST["picname"] : false;
$deleted = false;
// if email and/or pass POST values are set, set the variables to those values, otherwise make them false

if(isset($_POST['save'])){
    
    $description = $_POST['i_description'];
    $hashtag = $_POST['i_hashtag'];

    $updateInfo = mysqli_query($mysqli,"UPDATE userimages SET i_description = '".$description."', hashtag = '".$hashtag."' WHERE email = '$email' AND pword = '$pass'");
}
else if(isset($_POST['delete'])){
    $username = $_POST['dUsername'];
    $email = $_POST['dEmail'];
    $picToDelete = $_POST['dPic'];
    $datePosted = $_POST['dDate'];
    $deletePict = "DELETE FROM userimages WHERE picname='$picToDelete'";
    if(mysqli_query($mysqli, $deletePict)){
        echo "Record successfully deleted";
        $deleted = true;
    }
    else{
        $deleted = false;
    }

}
?>

<!DOCTYPE html>

<html>

<head>
    <title>P. Exhibit - Edit Post</title>
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
    <link href="style/editPost.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
        if(!$deleted){
            if($email && $pass && $picname){
                $query = "SELECT * FROM userimages WHERE email = '$email' AND picname='$picname'";
                $res = $mysqli->query($query);
                if($row = mysqli_fetch_array($res)){
                    echo '    
                            <h1 class="container" style="text-align:center">Edit your post</h1>
                            
                            <div id="post">
                                <div class="sideBoxes">
                                    <div class="PostCard">
                                       
                                        <div class="postCard_Image">
                                            <img src="gallery/' . $row['picname'] . '" alt="postImage">
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="sideBoxes" id="postInfo">
                                    <form method="post" action="editPost.php">
                                        <p>Please select private or public:</p>
                                        <input type="radio" id="priavte" name="privacy" value="private">
                                        <label for="private">Private</label><br>
                                        <input type="radio" id="public" name="privacy" value="public">
                                        <label for="public">Public</label><br>
                    
                                        <label>Post Description:</label>
                                        <input type="text" value="'.$row['i_description'].'" name="i_description"><br>
                                        <label>Album:</label>
                                        <input type="text"><br>
                                        <label>Posted:</label>
                                        <input type="text" placeholder="'.$row['date'].'"><br>
                                        <label>Hashtags</label>
                                        {loop of all the hashtags}
                                        <input type="text" value="'.$row['hashtag'].'" name="i_hashtag"><br>
                                        <label>Comments:</label>
                                        <div id="commentBox">
                                        ';
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

                                        echo'       
                                        </div>
                                        <input type="hidden" value="'.$picname.'" name="picname">
                                        <input type="hidden" name="email" value="'.$email.'">
                                        <input type="hidden" name="userPass" value="'.$pass.'">
                                        <button type="submit" name="save" class="btn btn-danger">Save</button>
                                    </form>
                                    <form method="post" action="editPost.php">
                                        <input type="hidden" value="username" name="dUsername">
                                        <input type="hidden" value="'.$email.'" name="dEmail">
                                        <input type="hidden" value="'.$picname.'" name="dPic">
                                        <input type="hidden" value="'.$row['date'].'" name="dDate">
                                        <input type="hidden" value="'.$email.'" name="email">
                                        <input type="hidden" value="'.$pass.'" name="userPass">
                                        <input type="hidden" value="'.$picname.'" name="picname">
                                        <button type="submit" name="delete" class="btn btn-warning">Delete Post</button>
                                    </form>
                                    <form method="post" action="profile.php">
                                    <input type="hidden" name="email" value="'.$email.'">
                                    <input type="hidden" name="userPass" value="'.$pass.'">
                                    <button type="submit" class="btn btn-light">Go Back</button>
                                </form>
                                </div>
                               
                            </div>
                    
                        </div>';
                        }
            }
            else{
                echo "hmmm";
            }
        }
        else{
            echo 'bruu';
        }
        
    ?>
   
</body>

</html>
