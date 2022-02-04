
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
  <link rel="stylesheet" href="../css/cart.css"/>

  <title>Luminex Book Store</title>
</head>

<body>
 

<?php
    if (!empty(isset($_SESSION['email']))) {
      
    
?>



  <div class="main-container">
    


  <table id="cart-table" class="cart-table">
        <thead class="thead">
            <tr>
                <th style="width:40%">Product</th>
                <th style="width:15%">Price (Rs)</th>
                <th style="width:8%">Quantity</th>
                <th style="width:18%" >Subtotal (Rs)</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <?php 

require_once '../db/dbconfig.php';
global $con;

$total=0;
$sql="SELECT * FROM inventory INNER JOIN cart WHERE inventory.bid=cart.bid";

$result=mysqli_query($con,$sql);
if (mysqli_num_rows($result)>0) {
  

while($row=mysqli_fetch_array($result)){




?>
        <tbody>


            <tr>
                <td >
                    <div class="row">
                        <div class="product">
                            <h5><?php echo $row['bookname']; ?></h4>
                            <p><?php echo $row['author']; ?></p>
                        </div>
                    </div>
                </td>
                <td ><?php echo $row['price']; ?></td>
                
                <td >
                    <input class="numberField" type="number" value="1" min="1" id="q">
                </td>
                <?php 
                 $price = $row["price"];
                 $qty = $row["qyt"];
                  
                 
                ?>
                <td id="total"><?php echo number_format(($price * $qty),2)?></td>
                <td >
                    <button class="product-del"><i class="fas fa-trash"></i></button>               
                </td>
            </tr>
            <?php  
                                    $total = $total + ($price*$qty);  
                                
                          ?>  
           <?php 
              }
            
             }



            ?>
            





        </tbody>

        <tfoot>
            <tr>
                <td>
                <td colspan="2" class="hidden-xs"></td>
                <td><strong> SUB TOTAL:&nbsp;<?php echo number_format($total,2)?> </strong></td>
                <td></td>
            </tr>
        </tfoot>
               

    </table>
  


    <div class="table-bottom">
        <div class="bottom-left">
          <a href="../index.php" class="button button-goback"><i class="fa fa-angle-left"></i> Continue Shopping</a>
        </div>
        <div class="bottom-right ">
          <a href="./checkout.php" class="button checkout">Checkout</a>
        </div>
  </div>




     <!-- CODE THIS AREA-->
  </div>







  <?php include ('./footer.php' ); ?>





  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
<script src="../Js/main.js"></script>
</body>

</html>