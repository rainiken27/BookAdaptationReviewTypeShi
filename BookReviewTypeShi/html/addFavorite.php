<?php
require_once ('C:\Users\ACER\XAMPP\htdocs\urAdapted\DBConnector.php');
include("navbar.php");

echo $_GET["id"];

if (isset($_GET["id"])) {
    $userID = $_SESSION["userID"];
    $movieId = $_GET["id"];

    $sql = "INSERT INTO favorites VALUES ($userID, $movieId)";
    $conn -> query($sql);

    header ("Location: titlePage.php?id=$movieId");
}

?>
