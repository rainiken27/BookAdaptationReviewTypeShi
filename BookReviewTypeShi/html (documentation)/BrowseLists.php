<?php
require_once ('C:\Users\ACER\XAMPP\htdocs\urAdapted\DBConnector.php');
include("navbar.php");

//returns 6 titles with the most number of reviews
$sql = "SELECT titleID, titleName, titleSummary, titleImage, count(titleID) as reviewCount from reviews NATURAL JOIN titles group by titleID order by count(titleID) DESC LIMIT 64;";
$mostPopular = $conn -> query($sql);

//returns 6 titles with the highest likeness scores
$sql1 = "SELECT titleID, titleName, titleSummary, titleImage, round(avg(likenessScore), 2) as avgScore from reviews NATURAL JOIN titles group by titleID order by avgScore DESC LIMIT 6;";
$highestScore = $conn -> query($sql1);

?>

<!DOCTYPE html>
<html>
<head>
	<link href="../css/lists.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="../js/indexJS.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lists</title>
</head>
<body>

	<!-- there are two sub containers, the left one contains titles with most reviews, the right one contains the titles with highest likeness scores -->
	<div class="mainContainer">
		<div class="leftContainer subContainer">
			<div class="verticalList">
				<div class="listTitle">Most Popular Titles of All-Time</div>
            <hr>
				<?php
			//does nothing
            $iterator = 0;

				//iterates through the 6 tuples and places them in divs for CSS grid
				while ($row = mysqli_fetch_assoc($mostPopular)) {
				?>
            
				<div class="movieInfo">
               <div class='label'><p>Reviews</div>
					<div class="poster"><a href="titlePage.php?movieId=<?php echo $row["titleID"]; ?>"><img src="<?php echo $row["titleImage"]; ?>"></a></div>
					<div class="title"><p><?php echo $row["titleName"] ?></p></div>
					<div class="summary"><p><?php echo $row["titleSummary"] ?></div>
               <div class="reviewCount"><p><?php echo $row["reviewCount"]?></p></div>
				</div>
	
				<?php
					}
				?>
				</div>
		</div>

      <div class="rightContainer subContainer">
			<div class="verticalList">
				<div class="listTitle">Most Faithful Adaptations</div>
            <hr>
				<?php
				//iterates through the 6 tuples and places them in divs for CSS grid
				while ($row = mysqli_fetch_assoc($highestScore)) {
				?>

				<div class="movieInfo">
               <div class='label'><p>Likeness Score</div>
					<div class="poster"><a href="titlePage.php?movieId=<?php echo $row["titleID"]; ?>"><img src="<?php echo $row["titleImage"]; ?>"></a></div>
					<div class="title"><p><?php echo $row["titleName"] ?></p></div>
					<div class="summary"><p><?php echo $row["titleSummary"] ?></div>
               <div class="score"><p><?php echo $row["avgScore"]?></p></div>
				</div>
	
				<?php
					}
				?>
				</div>
		</div>
	</div>
</body>
</html>

