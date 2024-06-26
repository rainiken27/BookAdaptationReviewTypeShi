<?php
require_once ('C:\Users\ACER\XAMPP\htdocs\urAdapted\DBConnector.php');
include("navbar.php");

/* Responsible for allowing the user to view the profile
   of other users. Clicking on the profile pictures of other users
   will take us to their profiles with their respective bios, profile picture, and favorites
*/

$userID = $_GET["id"];

//5 favorited titles of user
$sql = "SELECT titleID, titleName, titleImage FROM titles NATURAL JOIN Favorites WHERE userID = $userID LIMIT 5;";
$allFavorites = $conn -> query($sql);

//displays information associated with particular user
$sql2 = "SELECT profilePicture, userName, userBio from user WHERE userID = $userID";
$userInfo = $conn -> query($sql2);
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
    
    <!-- 
    Similar to profile.php. However, we will be displaying
    the information of other users instead of the user
    who is currently accessing the site
    -->
    <div class = "userBio">
        <?php
        while ($userRow = mysqli_fetch_assoc($userInfo)) {
        ?>
        <img id = "userProfile" src = "<?php echo $userRow["profilePicture"]; ?>" alt = "Profile Picture"/>         
        <h1 class="username"><?php echo $userRow["userName"]; ?></h1>
        <p class = "bio">
            <?php echo $userRow["userBio"]; ?>
        </p>

        <?php
        }
        ?>
    </div>
    <hr>
    <h2 class="listTitle">Favorites</h2>
    <div class = "favoritesContainer">
        <?php
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