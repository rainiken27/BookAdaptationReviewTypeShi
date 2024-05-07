<?php
require_once ('C:\Users\ACER\XAMPP\htdocs\urAdapted\DBConnector.php');
include("navbar.php");

//file is responsible for displaying the profile page of the user currently accessing the website

$userID = $_SESSION["userID"];

//retrieves relevant information (poster, name, ID), about the favorited titles of the user
$sql = "SELECT titleID, titleName, titleImage FROM titles NATURAL JOIN Favorites WHERE userID = $userID LIMIT 5;";
$allFavorites = $conn -> query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/profile.css">
    <script type="text/javascript" src="../js/indexJS.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
</head>

<body>   
    <div class = "userBio">
        <img id = "userProfile" src = "<?php echo $_SESSION["profilePicture"]; ?>" alt = "Profile Picture"/>         
        <h1 class="username"><?php echo $_SESSION["userName"]; ?></h1>
        <p class = "bio">
            <?php echo $_SESSION["userBio"]; ?>
        </p>
    </div>
    <hr>

    <!-- Contains 5 of the user's favorited titles -->
    <h2 class="listTitle">Favorites</h2>
    <div class = "favoritesContainer">
        <?php

        //iterates through the favorited titles of the users and stores them in individual divs for the purpose of applying CSS grid
        while ($row = mysqli_fetch_assoc($allFavorites)) {
        ?>
        <div class="favorites">
            <div class="poster"><a href="titlePage.php?movieId=<?php echo $row["titleID"]; ?>"><img src="<?php echo $row["titleImage"]; ?>"></a></div>
            <div class="title"><p><?php echo $row["titleName"] ?></p></div>
        </div>
        <?php
            }
        ?>
    </div>
</body>
</html>