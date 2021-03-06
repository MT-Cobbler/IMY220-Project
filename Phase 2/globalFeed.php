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

// if email and/or pass POST values are set, set the variables to those values, otherwise make them false
?>
<html>

<head lang="en">
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
    <link rel="stylesheet" type="text/css" href="style/style2.css">
    <link rel="stylesheet" href="style/home2.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script/navScript.js" charset="utf-8"></script>
</head>

<body>
<?php 
    $secondQuery = "SELECT * FROM userimages ORDER BY date DESC";
    $res = $mysqli->query($secondQuery);
    $thirdQuery ="SELECT profilepic FROM usertable";
    $ppInfo = $mysqli->query($thirdQuery);
    if($res->num_rows > 0){
        while($globalRow_Image = $res->fetch_assoc()){
            $email = $globalRow_Image['email'];

            echo '

                <div class="PostCard">
                    <div class="postCard_Header">
                        profile photo here
                    </div>
                    <div class="postcard_Header_PP">
                        <form method="post" action="Userprofile.php">
                            <input type="hidden" name="email" value="' . $email . '">
                            <button type="submit" id="editButton">' . $globalRow_Image['username'] . '</button>
                        </form>
                    </div>
                    <div class="postCard_Image">
                        <img src="postGallery/' . $globalRow_Image['picname'] . '" alt="postImage" style="width:100%">
                    </div>
                    <div class="postCard_Footer" style="height: 25%; padding-left:3%;background-color:#9e0059">
                        <div id="Hashtage">
                            <form action="postPage.php" method="post">
                                <input type="hidden" name="email" value="' . $email . '">
                                
                                <input type="hidden" name="hashtag" value="' . $globalRow_Image['hashtag'] . '">
                                <button class="editButton" type="submit">' . $globalRow_Image['hashtag'] . '</button>
                            </form>
                            <p>' . $globalRow_Image['i_description'] . '</p>
                        </div>
                        <div id="comments">
                            <form method="post" action="userProfile.php">
                                <input type="hidden" name="email" value="' . $email . '">
                                <input type="hidden" name="picname" value="' . $globalRow_Image['picname'] . '">
                                <input type="hidden" name="uName" value="' . $globalRow_Image['username'] . '">
                                <input type="text" name="picComment" placeholder="Write a comment" maxlength="80">
                                <button type="submit" name="commentBtn" id="commentBtn">Comment</button>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
          
            ';
        }
      
    }
?>
    

</body>

</html>
