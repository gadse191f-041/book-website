
<?php require_once './db/dbconfig.php';?>

<!DOCTYPE html>
<html lang="en">

  <head>


    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2:wght@400;600&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="./css/footer.css"/>
    <link rel="stylesheet" href="./css/main.css" />
    <link rel="stylesheet" href="./css/alterB.css"/>
    <title>Luminex Book Store</title>
  </head>

  <body>

  <?php include ('./navBarIndex.php' ); ?>
  

    <div class="inner-container">

      <div class="card-container threeDim" style="margin-bottom: 50px;"> 

      <div class="card-header">
          <p>New Arrival</p>
        </div>
        <div class="card-body" >

        <?php

          $sql = "SELECT `bid`, `bookname`, `author`, `price`, `bookPath`, `stock`  FROM `inventory` WHERE `newArr` = 1 ";
          $result = $con->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              //echo $row["bookname"];
              $imageUrl = '/images/'.$row["bookPath"];
              $bookID = $row["bid"];

           echo "<div class='book-card' onclick='openBookIndex($bookID)'>" ;
            echo "<img src='.$imageUrl' alt='Book Image'>";
            echo "<div class='book-card-body'>";
            echo "<h3 style='font-weight:500;margin-bottom:5px'>".$row["bookname"]."</h3>";
            echo "<p style='font-weight:300;margin-bottom:5px'>".$row["author"]."</p>";
            echo "<H5><p>Rs ".$row["price"]."</p></H5>";
            echo "<button style='cursor:pointer;' class='button ctaBtn themeColor'>View Book</button>";
            echo "</div>
                  </div>";
            }
          }

        ?>
  
        </div>

      </div>



        
      <div class="card-container threeDim"> 

        <div class="card-header">
          <p>Best Selling</p>
        </div>
        <div class="card-body">

        <?php

          $sql = "SELECT `bid`,`bookname`, `author`, `price`, `bookPath`, `stock`  FROM `inventory` WHERE `bestSell` = 1 ";
          $result = $con->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              //echo $row["bookname"];
              $imageUrl = '/images/'.$row["bookPath"];
              $bookID = $row["bid"];

           echo "<div class='book-card' onclick='openBookIndex($bookID)'>";
            echo "<img src='.$imageUrl' alt='Book Image'>";
            echo "<div class='book-card-body'>";
            echo "<h3 style='font-weight:500;margin-bottom:5px'>".$row["bookname"]."</h3>";
            echo "<p style='font-weight:300;margin-bottom:5px'>".$row["author"]."</p>";
            echo "<H5><p>Rs ".$row["price"]."</p></H5>";
            echo "<button style='cursor:pointer;' class='button ctaBtn themeColor'>View Book</button>";
            echo "</div>
                  </div>";
            }
          }

        ?>
  
        </div>
  
  
      </div>

    </div>





    <?php include ('./footerIndex.php' ); ?>


    <script src="./Js/main.js"></script>
  </body>

</html>