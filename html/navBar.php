
<?php require_once '../db/dbconfig.php';?>


<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2:wght@400;600&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/alterB.css"/>
    <title>Luminex Book Store</title>
  </head>


<nav>

    <div class="upper-nav" id="upper-nav">
      <a href="../index.php" class="logo-text">Online Book Store</a>
      <div class="upper-nav-right">

      <?php

        session_start();


        if (empty(isset($_SESSION['email']))) {
         echo '<a href="./login.php">Login</a>' ;
         echo '<a href="./register.php">Register</a>';
        }          
        ?>


        <a href="./privacy.php">| Privacy Policy</a>
        <a href="./TS.php">| Terms of Services</a>

        <?php
          if (!empty(isset($_SESSION['email']))) {
           echo  "<a href='./logout.php'>| Logout</a>";
          }          
          ?>


      </div>
    </div>



    <div class="bottom-nav" id="bottom-nav">
      <form class="search-form" style="width: 100%; justify-content: center" method="GET" action="./search.php">
        <input class="text-box"  style="width: 60%; margin-right: 5px;"type="text" name="q" placeholder="Search..."/>
        <button name="search" class="button button-search" type="submit"><i class="fa fa-search"></i></button>
      </form>
      <div class="bottom-nav-content" id="bottom-nav-content">
        <a href="../index.php">Home</a>
        <a  id="categoriesTogle" class="dropdown">Categories
          <div id="categoriesCont" class="dropdown-content">
            
              <?php


                  $sql = "SELECT *  FROM `categories`";
                  $result = $con->query($sql);
                  if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                      $cat = $row["categories"];
                      echo "<p onclick=viewCat('$cat')>".$row["categories"]."</p>";
                    }
                  }


              ?>
   
            </div>
        </a>
        <a href="./html/ebook.php">E-Book</a>
        <a href="#">About Us</a>
        <a href="./contactus.php">Contact Us</a>
      </div>
      <a id="bottom-nav-toggle" class="icon">
        <i class="fa fa-bars"></i>
      </a>

      <div class="upper-nav-right">
        <a href="../html/newcart.php" class="cart-icon"><i class="fa fa-shopping-cart cart"aria-hidden="true"></i></a>
      
        <?php
          if (!empty(isset($_SESSION['email']))) {
           echo  '<a href="./userProfile.php" class="user-icon"><i class="fa fa-user user"aria-hidden="true"></i></a>';
          }          
        ?>

      
      </div>
    </div>

  </nav>



</html>



<script>
    
    const viewCat = (cat)=>{
    window.open(`./search.php?category=${cat}&go=`,'_self');
    };

</script>
