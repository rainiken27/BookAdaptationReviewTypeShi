<?php
    require_once ('C:\Users\ACER\XAMPP\htdocs\urAdapted\DBConnector.php');

    //File is responsible for displaying supplementary information about a title

    //stores the id of a particular title
    $movieId = $_GET["id"];

    /*returns tuple containing  allinformation about specific title. 
    Converts the columns containing release date and publication date to Month name-Day-Year format */
    $sql = "SELECT DATE_FORMAT(titles.publishDate, '%M %D, %Y') as stringPubDate, DATE_FORMAT(titles.releaseDate, '%M %D, %Y') as stringReleaseDate, titles.* from titles WHERE titleID = $movieId";
    $titleInfo = $conn -> query($sql);

    //returns tuple containing relevant columns in displaying the review of a user for a particular title
    $sql2 = "SELECT userID, userName, userReview, likenessScore, profilePicture from user NATURAL JOIN reviews where titleID =  $movieId";
    $userReviews = $conn -> query($sql2);

    //returns the average likeness score of a title
    $sql3 = "SELECT round(avg(likenessScore), 2) as avgScore from reviews NATURAL JOIN titles group by titleID HAVING titleID = $movieId";
    $average = $conn -> query($sql3);

    //can return multiple rows if title belongs to multiple genres
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

        <!-- left container contains poster, genres, and the leave a review, and favorite buttons -->
        <div class="leftContainer">
            <div class="listTitle"><?php echo $row["titleName"] ?></div>
            <div class="poster"><img src="<?php echo $row["titleImage"] ?>"></div>


            <?php

                if (isset($_SESSION["userID"])) {
                    $userID = $_SESSION["userID"];

                    //returns a tuple if user has favorited a particular title
                    $sql4 = "SELECT userID from favorites WHERE userID = $userID AND titleID = $movieId";
                    $checkFavorites = $conn -> query($sql4);

                    //executes if user has favorited the title
                    if (mysqli_num_rows($checkFavorites) >= 1) {
                        echo "<div class='favorited'>Favorited ♥</div>".
                        '<div class="leaveReview"><a href="leaveReview.php?id='.$movieId. '">Leave a Review</a></div>';
                    
                    //executes if user has not favorited the title
                    } else {
                        
                        //adds title to user favorites
                        echo '<form method = "post" action="addFavorite.php?id='.$movieId.'">'.
                                '<button class="addToFavorites" name="id">Add to Favorites ♥</button>'.
                            '</form>'.
                        '<div class="leaveReview"><a href="leaveReview.php?id='.$movieId. '">Leave a Review</a></div>';
                    }

                /* favorite, and leave a review button does not appear if user has not logged.
                   Only those with accounts are able to favorite titles and leave reviews */
                } else {
                     echo "<div style='visibility:hidden' class='favorited' >Favorited ♥</div>".
                          '<div style = "visibility:hidden" class="leaveReview"><a href="leaveReview.php?id=<?php echo $movieId?>">Leave a Review</a></div>';
                }

                


            ?>
            
            <!-- displays the different genres of the title -->
            <div class="genreSection"><p>Genres</p>
                <div class="genreBox">
                    
                    <?php 
                    //iterates through rows, and creates buttons according to the number of genres a title belongs to
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
            //returns row displaying all user reviews associated with the title
            while ($userRow = mysqli_fetch_assoc($userReviews)) {
            ?>
            <div class="reviewSection">
                <!-- displays the profile picture, user name, review, and likeness score of the reviewer/user -->
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

        <!-- displays relevant information about the source material and the adaptation of a particular title -->
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
                //returns the average likeness score of the title
                //average score section does not appear if there are no reviews left for a title
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