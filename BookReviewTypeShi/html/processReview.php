<?php
session_start();
require_once ('C:\Users\ACER\XAMPP\htdocs\urAdapted\DBConnector.php');
$userId = $_SESSION["userID"];

if ((isset($_GET["id"])) && (isset($_POST["userReviews"])) && (isset($_POST["rating"]))) {
    $movieId = $_GET["id"];
    $userReview = $_POST["userReviews"];
    $userLikenessScore = $_POST["rating"];
}

$sql = "INSERT INTO REVIEWS VALUES ('$userId', '$movieId', '$userReview', '$userLikenessScore')";
$conn -> query($sql);

header("Location: titlePage.php?id=$movieId");

?>