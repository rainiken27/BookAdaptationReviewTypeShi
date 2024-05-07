<?php
require_once ('C:\Users\ACER\XAMPP\htdocs\urAdapted\DBConnector.php');

//returns relevant information about 4 of the titles containing the most amounts of reviews from the users
$sql = "SELECT titleID, titleName, titleSummary, titleImage, count(titleID) from reviews NATURAL JOIN titles group by titleID order by count(titleID) DESC LIMIT 4;";
$mostPopular = $conn -> query($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<link href="../css/index.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="../js/indexJS.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home Page</title>
</head>
<body>
	
	<?php include("navbar.php"); ?>


	<div class="mainContainer">
		<div class="leftContainer subContainer">
			<div class="verticalList">

				<!-- displays 4 titles with the most number of reviews -->
				<div class="listTitle">Most Popular Titles of All-Time</div>

				<?php
				//iterates through the 4 titles, creating divs in order to be arranged using CSS grid
				while ($row = mysqli_fetch_assoc($mostPopular)) {
				?>

				<div class="movieInfo">
					<div class="poster"><a href="titlePage.php?id=<?php echo $row["titleID"]; ?>"><img src="<?php echo $row["titleImage"]; ?>"></a></div>
					<div class="title"><p><?php echo $row["titleName"] ?></p></div>
					<div class="summary"><p><?php echo $row["titleSummary"] ?></div>
				</div>
	
				<?php
					}
				?>
			
				<!-- takes user to page containing a longer version of the list and a list that contains titles with highest likeness score-->
				<div id="browse"><a href="BrowseLists.php" style="text-decoration: none">Browse More Lists Like This One</a></div>

			
				</div>
		</div>

		<!--Each horizontal list contains a special category, a form of recommendation from the developers -->
		<div class="rightContainer subContainer">
			<div class="horizontalList">				
				<div class="listTitle">New Adaptations</div>
				<div class="poster1"><img src="../assets/arrival1.jpg"></div>
				<div class="title1"><p>The Arrival</p></div>
				<div class="poster2"><img src="../assets/otto1.jpg"></div>
				<div class="title2"><p>A Man Called Otto</p></div>
				<div class="poster3"><img src="../assets/katcabin1.jpg"></div>
				<div class="title3"><p>Knock at the Cabin</p></div>
				<div class="poster4"><img src="../assets/daisyjones1.jpg"></div>
				<div class="title4"><p>Daisy Jones & The Six</p></div>
				<div class="poster5"><img src="../assets/wellmania1.jpg"></div>
				<div class="title5"><p>Wellmania</p></div>
			</div>
			<div class="horizontalList">				
				<div class="listTitle">Spooky Lovey-Dovey Titles</div>
				<div class="poster1"><img src="../assets/warmbodies1.jpg"></div>
				<div class="title1"><p>Warm Bodies</p></div>
				<div class="poster2"><img src="../assets/someoneinsideyourhouse1.jpg"></div>
				<div class="title2"><p>There's Someone Inside Your House</p></div>
				<div class="poster3"><img src="../assets/mexicangothic1.jpg"></div>
				<div class="title3"><p>Mexican Gothic</p></div>
				<div class="poster4"><img src="../assets/donners1.jpg"></div>
				<div class="title4"><p>Donners of the Dead</p></div>
				<div class="poster5"><img src="../assets/flowersintheattic1.jpg"></div>
				<div class="title5"><p>Flowers in the Attic</p></div>
			</div>
			<div class="horizontalList">				
				<div class="listTitle">Titles from Far, Far, Away</div>
				<div class="poster1"><img src="../assets/dune1.jpg"></div>
				<div class="title1"><p>Dune</p></div>
				<div class="poster2"><img src="../assets/waroftheworlds1.jpg"></div>
				<div class="title2"><p>War of the Worlds</p></div>
				<div class="poster3"><img src="../assets/starshiptroopers1.jpg"></div>
				<div class="title3"><p>Starship Troopers</p></div>
				<div class="poster4"><img src="../assets/readyplayer1.jpg"></div>
				<div class="title4"><p>Ready Player One</p></div>
				<div class="poster5"><img src="../assets/themartian1.jpg"></div>
				<div class="title5"><p>The Martian</p></div>
			</div>			
		</div>
	</div>
</body>
</html>

