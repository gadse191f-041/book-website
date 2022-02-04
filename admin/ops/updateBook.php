
<?php

    require_once '../db/dbconfig.php';

    if(isset($_GET['updateBook'])){
        $bookID = trim($_GET['bookID']);
        $bookName = trim($_GET['bookName']);
        $author = trim($_GET['bookAuthor']);
        $ISBN = trim($_GET['bookISBN']);
        $stock = trim($_GET['bookStock']);
        $price = trim($_GET['bookPrice']);
        $bookCat = trim($_GET['bookCat']);  
        $bookDescription = trim($_GET['bookDescription']);
        $bookPath = trim($_GET['path']);
        $newArr = trim($_GET['newArr']);
        $bestSell = trim($_GET['bestSell']);

    }




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
          <H3>Update Book</H3><br>


            <form method="POST" action="<?=$_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">            
            <input value="<?php if(!empty($bookID)){echo $bookID;} ?>" name="bookID" class="text-box"  style="width: 70%; font-weight: bold;" type="text" placeholder="Book ID" required/><br>
            <input value="<?php if(!empty($bookName)){echo $bookName;} ?>" name="bookName" class="text-box"  style="width: 70%; font-weight: bold;" type="text" placeholder="Book Name" required/><br>
            <input value="<?php if(!empty($author)){echo $author;} ?>" name="bookAuthor" class="text-box"  style="width: 70%; font-weight: bold;" type="text" placeholder="Author" required/><br>
            <input value="<?php if(!empty($ISBN)){echo $ISBN;} ?>"  name="bookISBN" class="text-box"  style="width: 70%; font-weight: bold;text-align: left;" type="text" placeholder="ISBN" required/><br>
            <textarea id="bookDes" name="bookDescription" class="text-area"  placeholder="Write something.." rows="10" style="width: 70%;" required><?php if(!empty($bookDescription)){echo $bookDescription;} ?></textarea><br>
            <input value="<?php if(!empty($bookPath)){echo $bookPath;} ?>" name="bookPath" class="text-box"  style="width: 70%; font-weight: bold;" type="text" placeholder="Book Path" required/><br>
            <input value="<?php if(!empty($stock)){echo $stock;} ?>" name="bookStock" class="numberField" style="width: 20%;" type="number" placeholder="Stock" min="1" required><br>
            <input value="<?php if(!empty($price)){echo $price;} ?>"  name="bookPrice" class="numberField"  style="width: 20%;  "type="number" placeholder="Price (Rs)" step="0.01" min="1" required/><br>
     

            <select  name="bookCat" class="select" style="width: 20%;" required>
            
              <?php
                $sql = "SELECT categories FROM categories";
                $result = $con->query($sql);
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    if($row["categories"] == $bookCat){
                    echo "<option selected>" .$row["categories"]. "</option>";
                    }
                    else{
                    echo "<option >" .$row["categories"]. "</option>";
                    }
                  }
                }
              ?>


            </select><br><br>
            <input name="bookImage" class="upload" type="file" accept="image/*" ><br><br>


            <input name="newArr" type="checkbox" class="form-check-input" id="newArr" value="1" <?php if($newArr == 1){echo "checked";} ?> >
            <label  for="newArr">New Arrival</label> <br>

            <input name="bestSell" type="checkbox" class="form-check-input" id="bestSell" value="1" <?php if($bestSell == 1){echo "checked";} ?> >
            <label  for="bestSell">Best Selling</label> <br><br>

            <button type="submit" class="button addBook" name="updateDb">UPDATE</button>
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




  if(isset($_POST['updateDb'])){
      $bookID = trim($_POST['bookID']);
      $bookName = trim($_POST['bookName']);
      $author = trim($_POST['bookAuthor']);
      $ISBN = trim($_POST['bookISBN']);
      $stock = trim($_POST['bookStock']);
      $price = trim($_POST['bookPrice']);
      $bookCat = trim($_POST['bookCat']);  
      $bookDescription = trim($_POST['bookDescription']);
      $newArr = trim($_POST['newArr']);
      $bestSell = trim($_POST['bestSell']);

      if($newArr != 1){$newArr = 0;}
      if($bestSell != 1){$bestSell = 0;}


      $img = $_FILES["bookImage"]["name"];
      $imgTmp = $_FILES["bookImage"]["tmp_name"];
      $imgName = pathinfo($_FILES["bookImage"]["name"], PATHINFO_FILENAME);



      if(!empty($img)){



        if (file_exists("../../images/books/$imgName/")) {
            $target_dir = "../../images/books/$imgName/";
          }

          else{
            mkdir("../../images/books/$imgName", 0755, true);
            $target_dir = "../../images/books/$imgName/";
          }

          if(move_uploaded_file($imgTmp , $target_dir .$img)){

            $uploadPath = "books/$imgName/$img";
            //echo "Uploaded <br> $uploadPath";
            
            $updateSql = "UPDATE `inventory` SET `bookname` = '$bookName',`author` = '$author' ,`description` = '$bookDescription' ,`isbn` = '$ISBN' ,`stock` = '$stock' ,`price` = '$price' ,`category` = '$bookCat' ,`bookPath` = '$uploadPath' , `newArr` = '$newArr' ,`bestSell` = '$bestSell'  WHERE `bid`='$bookID'";
        
            if ($con->query($updateSql) === TRUE) {
                echo "<script>window.open('./inventory.php','_self');</script>";
            } 
            else
            {
                echo "<script>alert('UPDATE ERROR !');</script>";
             }
    
          }
          else{
            echo "<script>alert('FAILED !');</script>";
          }

    
      }

      else{
        
        $updateSql = "UPDATE `inventory` SET `bookname` = '$bookName',`author` = '$author' ,`description` = '$bookDescription' ,`isbn` = '$ISBN' ,`stock` = '$stock' ,`price` = '$price' ,`category` = '$bookCat' , `newArr` = '$newArr' ,`bestSell` = '$bestSell'  WHERE `bid`='$bookID'";
        
            if ($con->query($updateSql) === TRUE) {
                echo "<script>window.open('./inventory.php','_self');</script>";
            } 
            else
            {
            echo "<script>alert('UPDATE ERROR !');</script>";
             }

      }

  }

  $con->close();

?>