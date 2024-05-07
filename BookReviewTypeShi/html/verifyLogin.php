<?php
session_start();
include ('C:\Users\ACER\XAMPP\htdocs\urAdapted\DBConnector.php');
if (isset($_POST["userName"]) && isset($_POST["password"])) {

    $userName = trim(htmlspecialchars($_POST["userName"]));
    $password = trim(htmlspecialchars($_POST["password"]));


    if (empty($userName)) {
        header("Location: index.php?error=Please Enter Your Username");
        exit();
    } else if (empty($password)) {
        header("Location: index.php?error=Please Enter Your Password");
        exit();
    } else {
        $sql = "SELECT * FROM User WHERE userName = '$userName'AND userPassword = '$password';";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows ($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row["userName"] === $userName && $row["userPassword"] === $password) {
                $_SESSION["userID"] = $row["userID"];
                $_SESSION["userName"] = $row["userName"];
                $_SESSION["profilePicture"] = $row["profilePicture"];
                $_SESSION["userBio"] = $row["userBio"];
                header("Location: index.php");
                exit();
            } else {
                header("Location: index.php?error=Incorrect Username or Password");
                exit();
            }

        } else {
            header("Location: index.php?error=Incorrect Username or Password");
            exit();
        }
    }

} else {
	header("Location: index.php");
	exit();
}   

?>