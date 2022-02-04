<!DOCTYPE html>
<html>
<head>
	<?php include ('navBar.php' ); ?>


  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2:wght@400;600&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/footer.css"/>
  <link rel="stylesheet" href="../css/main.css" />
  <link rel="stylesheet" href="../css/alterB.css"/>
  <link rel="stylesheet" href="../css/checkout.css">

	<title>Luminex Book Store</title>
</head>
<body>
<?php
    if (empty(isset($_SESSION['email']))) {
      header('Location: ./login.php');
    }
    
?>





<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST" class="checkout-form">
      
        <div class="row">
          <div class="col-50">
            <h3>Order Confirmation</h3>
            <label for="fname" ><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Kamal De Silva">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="kamal@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542/A, Galle Rd,Galle">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="Galle">
            <label for="postal-code">Postal Code</label>
            <input type="text" id="pc" name="pc" placeholder="10000">
            <label for="final-total"><b>Final Total on Cart</b></label>
            <input type="text" id="total" name="total" placeholder="1000.00">
            
          

            
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="Kamal De Silva">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            
            
              
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Delivary address is same as billing
        </label>
        <a href="./books/index.php"><input type="submit" value="Exit" class="btn" >
        <!--script type="text/javascript">
        	function confirm(){alert("Order Confirmed")}
        </script--></a>
      </form>
    </div>
  </div>
  
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

<?php

require_once '../db/dbconfig.php';

if(isset($_POST['Exit'])){

    $fname = trim($_POST['firstname']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);
    $pc = trim($_POST['pc']);
    $total = trim($_POST['total']);
    $cname = trim($_POST['cname']);
    $ccnum = trim($_POST['ccnum']);

    

    $sql =  "INSERT INTO `orders` VALUES ('0' , '$fname' , '$email' , '$address' , '$pc' ,'$total', '$cname' , '$ccnum','0' )";

        if ($con->query($sql) === TRUE) {
          echo "<script>alert('Registration Succesful');</script>";
          $_SESSION['email'] = $email;
          echo "<script>window.open('../index.php','_self');</script>";
        }
        else{
          echo "<script>alert('Registration Faild. Try again');</script>";
        }
      }

?>

