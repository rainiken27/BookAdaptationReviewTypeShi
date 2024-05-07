<!DOCTYPE html>
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

   if (isset($_GET["genre"])) {
      $genre = $_GET["genre"];
      $sql = "SELECT * FROM TITLES NATURAL JOIN genres WHERE genre = '$genre'";
      $all_titles = $conn -> query($sql);
   } else {
      $sql = "SELECT * FROM TITLES";
      $all_titles = $conn -> query($sql);
   }   


   $maxcols = 5;
   $i = 0;
   
   echo "<table>";
   echo "<tr>";
   while ($row= mysqli_fetch_assoc($all_titles)) {
   
       if ($i == $maxcols) {
           $i = 0;
           echo "</tr><tr>";
       } ?>
       <td><a href="titlePage.php?id=<?php echo $row["titleID"]; ?>"><img class ="tableImages" src="<?php echo $row['titleImage'] ?>" ></a></td>

       <?php
       $i++;
   }
   
   while ($i <= $maxcols) {
      echo "<td>&nbsp;</td>";
      $i++;
  }

   
   echo "</tr>";
   echo "</table>";
   ?>

</body>
</html>