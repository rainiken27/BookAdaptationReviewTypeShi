<?php
    require_once ('C:\Users\ACER\XAMPP\htdocs\urAdapted\DBConnector.php');

    $movieId = $_GET["id"];

    $sql = "SELECT DATE_FORMAT(titles.publishDate, '%M %D, %Y') as stringPubDate, DATE_FORMAT(titles.releaseDate, '%M %D, %Y') as stringReleaseDate, titles.* from titles WHERE titleID = $movieId";
    $titleInfo = $conn -> query($sql);
    $sql2 = "SELECT userID, userName, userReview, likenessScore, profilePicture from user NATURAL JOIN reviews where titleID =  $movieId";
    $userReviews = $conn -> query($sql2);
    $sql3 = "SELECT round(avg(likenessScore), 2) as avgScore from reviews NATURAL JOIN titles group by titleID HAVING titleID = $movieId";
    $average = $conn -> query($sql3);
    $sql4 = "SELECT genre from genres WHERE titleID = $movieId";
    $genres = $conn -> query($sql4);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="../css/titlePage.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="../js/indexJS.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title Page</title>
</head>
<body>

    <?php include("navbar.php"); ?>

    <?php
        while ($row = mysqli_fetch_assoc ($titleInfo)) {
    ?>
    
    <div class="mainContainer">
        <div class="leftContainer">
            <div class="listTitle"><?php echo $row["titleName"] ?></div>
            <div class="poster"><img src="<?php echo $row["titleImage"] ?>"></div>


            <?php

                if (isset($_SESSION["userID"])) {
                    $userID = $_SESSION["userID"];
                    $sql4 = "SELECT userID from favorites WHERE userID = $userID AND titleID = $movieId";
                    $checkFavorites = $conn -> query($sql4);

                    if (mysqli_num_rows($checkFavorites) >= 1) {
                        echo "<div class='favorited'>Favorited ♥</div>".
                        '<div class="leaveReview"><a href="leaveReview.php?id='.$movieId. '">Leave a Review</a></div>';

                    } else {
                        
                        echo '<form method = "post" action="addFavorite.php?id='.$movieId.'">'.
                                '<button class="addToFavorites" name="id">Add to Favorites ♥</button>'.
                            '</form>'.
                        '<div class="leaveReview"><a href="leaveReview.php?id='.$movieId. '">Leave a Review</a></div>';
                    }
                } else {
                     echo "<div style='visibility:hidden' class='favorited' >Favorited ♥</div>".
                          '<div style = "visibility:hidden" class="leaveReview"><a href="leaveReview.php?id=<?php echo $movieId?>">Leave a Review</a></div>';
                }

                


            ?>
            
            <div class="genreSection"><p>Genres</p>
                <div class="genreBox">
                    
                    <?php 
                    while ($genreList = mysqli_fetch_assoc($genres)) {
                    ?>
                    <button class="genres"><a href= "BrowseTitles.php?genre='<?php echo $genreList["genre"]; ?>'"><?php echo $genreList["genre"]; ?></a></button>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        

        <div class="container" id="middle">
            <div class="userReviews">User Reviews</div>
            <?php
            while ($userRow = mysqli_fetch_assoc($userReviews)) {
            ?>
            <div class="reviewSection">
                <div class="reviewDisplay">
                    <div class="profilePicture"><a href="visitProfile.php?id=<?php echo $userRow['userID'] ?>"><img src=<?php echo $userRow["profilePicture"]?>></a></div>
                    <div class="review"><p><?php echo $userRow["userReview"] ?></p></div>
                    <div class="username"><p><?php echo $userRow["userName"] ?></p></div>
                    <div class="scoreLabel">Likeness Score</div>
                    <div class="userScore"><?php echo $userRow["likenessScore"] ?></div>
                </div>
            </div>
            
            <?php
                }
            ?>
        </div>

        
        <div class="container">
            <div class="listTitle">Source Material: <?php echo $row["titleSource"] ?>  </div>
            <div class ="titleInfo">
                <div class="summary"><p><?php echo $row["titleSummary"] ?> </p></div>
                <div class="sourceLabel">Source Material Information</div>
                <div class="sourceInfo">
                    <p>Author:      <b><?php echo $row["titleAuthor"] ?></b><br>
                    Date Published: <b><?php echo $row["stringPubDate"] ?></b><br>
                    Publisher:      <b><?php echo $row["titlePublisher"] ?></b>
                    </p>
                </div>

                <div class="adaptationLabel">Adaptation Information</div>
                <div class="adaptationInfo">
                    <p>Director:        <b><?php echo $row["adaptationDirector"] ?></b><br>
                    Released Date:      <b><?php echo $row["stringReleaseDate"]  ?></b><br>
                    Production Company: <b><?php echo $row["productionCompany"]  ?></b>
                    </p>
                </div>

                <?php
                while ($scoreRow = mysqli_fetch_assoc ($average)) {
                ?>
                <div class="avgScoreLabel"> Average Likeness Score </div>
                <div class="avgScore"><?php echo $scoreRow["avgScore"] ?></div>
                <?php 
                    }
                ?>

            </div>
        </div>
    <?php 
        }
    ?>
</body>
</html>