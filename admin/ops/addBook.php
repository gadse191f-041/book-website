
<?php

  require_once '../db/dbconfig.php';

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <link
            href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2:wght@400;600&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet"
            />
        <link rel="stylesheet" href="../../css/alterB.css"/>
        <link rel="stylesheet" href="../css/main.css" />
        <link rel="stylesheet" href="../css/inventory.css" />

        <title>Luminex Book Store</title>
    </head>

    <body>
        
        <?php include ('./header.php' ); ?>
 

        <div class="inner-container">



          <div class="addBookSection threeDimMax">
          <H3>Add Book</H3><br>
            <form method="POST" action="<?=$_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
            <input name="bookName" class="text-box"  style="width: 70%; font-weight: bold;" type="text" placeholder="Book Name" required/><br>
            <input name="bookAuthor" class="text-box"  style="width: 70%; font-weight: bold;" type="text" placeholder="Author" required/><br>
            <input name="bookISBN" class="text-box"  style="width: 70%; font-weight: bold;text-align: left;" type="text" placeholder="ISBN" required/><br>
            <textarea name="bookDescription" class="text-area"  placeholder="Write something.." rows="10" style="width: 70%;" required></textarea><br>
            <input name="bookStock" class="numberField" style="width: 20%;" type="number" placeholder="Stock" min="1" required><br>
            <input name="bookPrice" class="numberField"  style="width: 20%;  "type="number" placeholder="Price (Rs)" min="1" step="0.01" required/><br>
            <select name="bookCat" class="select" style="width: 20%;" required>

             

              <?php

                $sql = "SELECT categories FROM categories";
                $result = $con->query($sql);
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    echo "<option>" .$row["categories"]. "</option>";
                  }
                }
              ?>


            </select><br><br>
            <input name="bookImage" class="upload" type="file" accept="image/*" ><br><br>
            <button type="submit" class="button addBook" name="addBook">Add Book</button>
          </form>
          </div>







        </div>

        <footer class="footer">
            <div class="admin-footer">
                <a href="../index.html">Luminex Book Store</a>
            </div>
        </footer>

        <script src="../js/main.js"></script>
    </body>
</html>





<?php




  if(isset($_POST['addBook'])){
      $bookName = trim($_POST['bookName']);
      $author = trim($_POST['bookAuthor']);
      $ISBN = trim($_POST['bookISBN']);
      $stock = trim($_POST['bookStock']);
      $price = trim($_POST['bookPrice']);
      $bookCat = trim($_POST['bookCat']);  
      $bookDescription = trim($_POST['bookDescription']);

      $img = $_FILES["bookImage"]["name"];
      $imgTmp = $_FILES["bookImage"]["tmp_name"];
      $imgName = pathinfo($_FILES["bookImage"]["name"], PATHINFO_FILENAME);

      //echo "$img <br>";


      if (!file_exists("../../images/books/$imgName/")) {

        mkdir("../../images/books/$imgName", 0755, true);
        $target_dir = "../../images/books/$imgName/";
      }

      else{
        $target_dir = "../../images/books/$imgName/";
      }

    
      if(move_uploaded_file($imgTmp , $target_dir .$img)){

        $uploadPath = "books/$imgName/$img";
        //echo "Uploaded <br> $uploadPath";
        
        $bookSql = "INSERT INTO inventory VALUES ('0', '$bookName', '$author' , '$bookDescription' , '$ISBN' , '$stock' , '$price' , '$bookCat' , '$uploadPath' , '1' , '0')";

        if ($con->query($bookSql) === TRUE) {
            header("Location: ./inventory.php");
          } 
          else {
            echo "<script>alert('Upload FAILED !');</script>";
          }


      }
      else{
        echo "<script>alert('Upload FAILED !');</script>";
      }
      
  }

  $con->close();

?>