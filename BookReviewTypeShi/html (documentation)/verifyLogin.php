<?php
session_start();
include ('C:\Users\ACER\XAMPP\htdocs\urAdapted\DBConnector.php');

//executes when user presses log in button and has filled out the two fields in the form
if (isset($_POST["userName"]) && isset($_POST["password"])) {

    /*there are times where users will have usernames and passwords containing characters
      that are also employed by HTML. We use htmlspecialchars to prevent the browser from
      interpreting these characters within the user information as part of the HTML of the page
      
      trim removes whitespaces from the string
    */
    $userName = trim(htmlspecialchars($_POST["userName"]));
    $password = trim(htmlspecialchars($_POST["password"]));


    //informs the user if they are unable to fill out a certain field
    if (empty($userName)) {
        header("Location: index.php?error=Please Enter Your Username");
        exit();
    } else if (empty($password)) {
        header("Location: index.php?error=Please Enter Your Password");
        exit();
    
    //executes if two fields are filled out
    } else {

        //returns tuple that contains the exact username and password provided in the login form
        $sql = "SELECT * FROM User WHERE userName = '$userName'AND userPassword = '$password';";
        $result = mysqli_query($conn, $sql);

        //executes if there's indeed a tuple, indicating a valid user/reviewer account
        if (mysqli_num_rows ($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            
            //stores user info as session variables to be used for viewing user's personal profile
            if ($row["userName"] === $userName && $row["userPassword"] === $password) {
                $_SESSION["userID"] = $row["userID"];
                $_SESSION["userName"] = $row["userName"];
                $_SESSION["profilePicture"] = $row["profilePicture"];
                $_SESSION["userBio"] = $row["userBio"];
                header("Location: index.php");
                exit();
            } else {

                //executes if account does not exist or user entered incorrect details
                header("Location: index.php?error=Incorrect Username or Password");
                exit();
            }

        } else {
            header("Location: index.php?error=Incorrect Username or Password");
            exit();
        }
    }

} else {
    //redirects to homepage if one field was not filled out
	header("Location: index.php");
	exit();
}   

?>