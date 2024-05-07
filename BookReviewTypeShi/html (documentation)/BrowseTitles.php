<!DOCTYPE html>

<!-- File is responsible for displaying all of the titles that are currently stored in the website's database -->
<html>
<head>
   <link rel="stylesheet" type="text/css" href="../css/browsetitles.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
   <script type="text/javascript" src="../js/indexJS.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
</head>
<body>
   
   <?php 
   require_once ('C:\Users\ACER\XAMPP\htdocs\urAdapted\DBConnector.php');
   include("navbar.php"); 

   //displays all titles of a particular genre if the user clicked on one of the genre buttons in the title page
   if (isset($_GET["genre"])) {
      $genre = $_GET["genre"];
      $sql = "SELECT * FROM TITLES NATURAL JOIN genres WHERE genre = '$genre'";
      $all_titles = $conn -> query($sql);
   } else {

      //displays all titles if user arrives at page through the navbar
      $sql = "SELECT * FROM TITLES";
      $all_titles = $conn -> query($sql);
   }   

   
   //creates an HTML table of 5 columns with variable rows to contain the titles

   $maxcols = 5;
   $i = 0;
   
   echo "<table>";
   echo "<tr>";

   //iterates through all titles
   while ($row= mysqli_fetch_assoc($all_titles)) {
   
      //resets variable if a multiple of 5 in terms of the number of titles were placed on the table
       if ($i == $maxcols) {
           $i = 0;
           //creates a new row to contain 5 more titles
           echo "</tr><tr>";
       } ?>

       <!-- each individual cell contains the poster of the title, clicking on the poster takes you to the title page of the title -->
       <td><a href="titlePage.php?id=<?php echo $row["titleID"]; ?>"><img class ="tableImages" src="<?php echo $row['titleImage'] ?>" ></a></td>

       <?php
       $i++;
   }
   
   while ($i <= $maxcols) {
      //creates blank cells if number of titles does not reach multiples of 5 for formatting
      echo "<td>&nbsp;</td>";
      $i++;
  }

   
   echo "</tr>";
   echo "</table>";
   ?>

</body>
</html>