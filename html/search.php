<?php require_once '../db/dbconfig.php';?>


<?php

  $rowCount = 0;

  if(isset($_GET['go'])){
  $category = $_GET["category"];


    $sql = "SELECT `bid`,`bookname`, `author`, `price`, `bookPath`, `stock`  FROM `inventory` WHERE `category` = '$category' ";
    $result_ = $con->query($sql);

    if($result_->num_rows > 0){
      $rowCount = $result_->num_rows ;
    }

  }



  if(isset($_GET['search'])){
    $keyword = $_GET["q"];


      $sql = "SELECT `bid`,`bookname`, `author`, `price`, `bookPath`, `stock`  FROM `inventory` WHERE `bookname` LIKE '%$keyword%' OR `author` LIKE '%$keyword%' OR `category` LIKE '%$keyword%' OR `isbn` LIKE '%$keyword%' ";
      $result_ = $con->query($sql);

      if(!empty($result_->num_rows)){
        $rowCount = $result_->num_rows ;
      }
  }




?>

<!DOCTYPE html>
<html lang="en">

  <head>

  <?php include ('navBar.php' ); ?>

  
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2:wght@400;600&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="../css/footer.css"/>
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/alterB.css"/>
    <title>Luminex Book Store</title>
  </head>

  <body>




    <div class="inner-container">

      <div class="card-container threeDim"> 

        <div class="card-header">
          <p><b><?php echo $result_->num_rows; ?></b> Books Found</p>
        </div>
        <div class="card-body">
  
  
        <?php


              if ($result_->num_rows > 0 or !empty($result_->num_rows)) {
                while($row = $result_->fetch_assoc()) {
                  //echo $row["bid"];
                  $imageUrl = './images/'.$row["bookPath"];
                 $bookID = $row["bid"];

              echo "<div class='book-card' onclick='openBook($bookID)'>";
                echo "<img src='.$imageUrl' alt='Book Image'>";
                echo "<div class='book-card-body'>";
                echo "<h3 style='font-weight:500;margin-bottom:5px'>".$row["bookname"]."</h3>";
                echo "<p style='font-weight:300;margin-bottom:5px'>".$row["author"]."</p>";
                echo "<H5><p>Rs ".$row["price"]."</p></H5>";
                echo "<button style='cursor:pointer;' class='button ctaBtn themeColor'>Add to cart</button>";
                echo "</div>
                      </div>";
                }
              }
            
        ?>




        <!--
          <div class="book-card">
            <img src="../images/dummyBookBlank.svg" alt="Book Image">
            <div class="book-card-body">
              <h4><b>Book Name</b></h4> 
              <p>Author</p>
              <H5><p>Price</p></H5>
              <button class="button ctaBtn themeColor">Add to cart</button>
            </div>
          </div>
        -->





  
  
  
        </div>
  
  
      </div>

    </div>



    <?php include ('./footer.php' ); ?>



    <script src="../Js/main.js"></script>
  </body>

</html>