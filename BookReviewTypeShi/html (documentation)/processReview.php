<?php
session_start();
require_once ('C:\Users\ACER\XAMPP\htdocs\urAdapted\DBConnector.php');

//file processes the reviews to be left by user

//id of current user
$userId = $_SESSION["userID"];

//executes if user has an account, and has filled out the review form
if ((isset($_GET["id"])) && (isset($_POST["userReviews"])) && (isset($_POST["rating"]))) {
    $movieId = $_GET["id"];
    $userReview = $_POST["userReviews"];
    $userLikenessScore = $_POST["rating"];
}

//inserts the user's review and their likeness score towards a particular title in the database
$sql = "INSERT INTO REVIEWS VALUES ('$userId', '$movieId', '$userReview', '$userLikenessScore')";
$conn -> query($sql);

//redirects the user to the title page of the movie they were reviewing
header("Location: titlePage.php?id=$movieId");

?>