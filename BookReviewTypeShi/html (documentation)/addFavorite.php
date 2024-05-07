<?php

//file is responsible for adding a title to user favorites

require_once ('C:\Users\ACER\XAMPP\htdocs\urAdapted\DBConnector.php');
include("navbar.php");

echo $_GET["id"];

if (isset($_GET["id"])) {

    //id of the user currently logged in and accessing the website
    $userID = $_SESSION["userID"];
    $movieId = $_GET["id"];

    $sql = "INSERT INTO favorites VALUES ($userID, $movieId)";
    $conn -> query($sql);

    //redirects the user to the title page of the movie they favorited
    header ("Location: titlePage.php?id=$movieId");
}

?>
