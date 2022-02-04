<?php require_once '../db/dbconfig.php';?>


<?php


  if(isset($_GET['show'])){
  $bookId = $_GET["bookId"];


    $sql = "SELECT `bookname`, `author`, `price`, `bookPath`, `stock`, `description`  FROM `inventory` WHERE `bid` = '$bookId' ";
    $result_ = $con->query($sql);

    if($result_->num_rows > 0){
      $rowCount = $result_->num_rows ;
    }

  }
?>


<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2:wght@400;600&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="../css/footer.css"/>
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/alterB.css"/>
    <link rel="stylesheet" href="../css/book.css"/>
    <title>Luminex Book Store</title>
  </head>

  <body>


    <?php include ('navBar.php' ); ?>



    <div class="inner-container">



    <?php

    if (empty(isset($_SESSION['email']))) {
      $userEmail = "";
      $userId = 0;
    }
    else{
      $userEmail = $_SESSION['email'];
      $userId =  $_SESSION['uId'];
    }

    
    

  if ($result_->num_rows > 0 or !empty($result_->num_rows)) {
  while($row = $result_->fetch_assoc()) {
    //echo $row["bookname"];
    $imageUrl = './images/'.$row["bookPath"];
    $bookName = $row["bookname"];
    $author = $row["author"];
    $price = $row["price"];
    $stock = $row["stock"];
    $des = $row["description"];

echo "   <div class='bookImgContainer'>
          <div class='book-card'>
              <img img src='.$imageUrl' alt='Book Image'>
              <div class='book-card-body'>
                <h4><b style='font-weight:500;margin-bottom:5px'>$bookName</b></h4> 
                <p style='font-weight:300;margin-bottom:5px'>$author</p>
                <H5><p>Rs $price</p></H5>
                <br>
                <input id='bookQTY' class='numberField' type='number' value='1' min='1' max='$stock'>
                <button class='button ctaBtn themeColor' onclick='addtoCart($userId,$bookId,$stock)'>Add to cart</button>
              </div>
            </div>
          </div>";


  echo "  <div class='bookDetailContainer threeDimMax'>
            <div class='details'>
              <H3>$bookName</H3>
              <br>
              <p>$des</p>
              </div>
          </div>";
  
  
      }


}

?>



    </div>






<?php include ('./footer.php' ); ?>



    <script src="../Js/main.js"></script>
  </body>

</html>