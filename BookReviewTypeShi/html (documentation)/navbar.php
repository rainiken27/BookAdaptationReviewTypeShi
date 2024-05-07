<?php
    session_start();

    //file contains the navbar present in every other webpage
?>

<head>
    <link rel="stylesheet" type="text/css" href="../css/navbar.css">
</head>
<header class="headBar">
    <a id="logo" href="index.php"><img class="logo" src="../assets/logo.png" alt="logo"></a>
    <nav>
        
        <ul class="page_links">
            <?php
            //user has logged in to their account, clicking on first link leads to their personal profile page
            if (!(empty($_SESSION["userID"]))){
                echo '<li><a class="page" href="profile.php">Profile</a></li>';    
            
            //user has not logged in, clicking on first link opens up the log in form
            } else {
                echo '<li id="signInLink" onclick="openLoginForm()"><a id="signIn" class="page" href="#">Sign-in/Sign-Up</a></li>';
            }
            ?>
            
            <li><a class="page" href="BrowseTitles.php">Titles</a></li>
            <li><a class="page" href="BrowseLists.php">Lists</a></li>
            <li><a class="page" href="AboutPage.php">About</a></li>
        </ul>
    </nav>
</header>

<!-- Log-In form, will also contain error messages if user was not able to enter their information properly -->
<div id="loginOverlay" class="overlay">
    <span class="closebtn" onclick="closeLoginForm()"> &#215</span>
    <div class="wrap">
        <h2>Access Your Reviewer Account</h2>
        <form action="verifyLogin.php" method="POST">
        <?php if (isset($_GET['error'])) { ?>
            <script>document.getElementById("myOverlay").style.display="block";</script>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
            <label for="userName">Username:</label><br>
            <input type="text" name="userName"><br>
            <label for="password">Password:</label><br>
            <input type="password" name="password"><br>
            <input type="submit" value="Log in">
        </form>
    </div>
</div>

