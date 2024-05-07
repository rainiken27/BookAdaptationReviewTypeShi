<?php
    require_once ('C:\Users\ACER\XAMPP\htdocs\urAdapted\DBConnector.php');
    $movieId = $_GET["id"];
    $sql = "SELECT * FROM titles WHERE titleID = '$movieId'";
    $titleInfo = $conn -> query($sql);
?>
'
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/leaveReview.css">
    <script type="text/javascript" src="../js/validateScore.js"></script>
</head>
<body>
<?php include("navbar.php"); ?>

<?php
    while ($row = mysqli_fetch_assoc ($titleInfo)) {
?>
<div>
    <div class="wrap">
        <h2>Review for <?php echo $row['titleName'] ?></h2>
        <form action="processReview.php?id=<?php echo $movieId?>" method="POST">
            <label for="review">Review</label><br>
            <input type="text" name="userReviews" required><br>
            <label for="rating">Likeness Score Rating:</label><br>
            <input type="number" id="score" name="rating" min="1" max="5" step="1" required onkeydown="return validateScore(event)">
            <input type="submit" value="Post Review">
        </form>
    </div>
<?php
    }
?>
</div>
</body>
</html>