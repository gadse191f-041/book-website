

<?php
    if (!empty(isset($_SESSION['email']))) {
      header('Location: ../index.php');
    }
    
  ?>




<!DOCTYPE html>
<html lang="en">

  <head>

  <?php include ('navBar.php' ); ?>

  
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      />

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2:wght@400;600&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap"
      rel="stylesheet">
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/register.css" />
    <link rel="stylesheet" href="../css/alterB.css" />

    <title>Luminex Book Store</title>
  </head>

  <body>





    <div class="main-container threeDimMax">

      <!-- CODE THIS AREA-->
      <br>
   
        <h2> Registration Form </h2>
     

      <br>
      <form action="<?=$_SERVER['PHP_SELF'];?>"  method="POST" class="form-reg" >

        <label for="fname">Name</label><br> 
        <input type="text" id="fname"class="text-box" style="width:400px"name="regName" required><br>


        <label for="address">Address</label> <br>
        <input class="text-box" type="text" id="address" style="width:400px;"name="regAddr"><br>

        <label for="postalCode">Postal Code</label> <br>
        <input class="text-box" type="text" id="postalCode" style="width:400px;"name="regPCode"><br>
          
        <label for="city">City</label> <br>
        <input class="text-box" type="text" id="city" style="width:400px;"name="regCity"><br>

        <label for="pno">Contact Number</label> <br> 
        <input class="text-box" type="text" id="pno" style="width:400px;" name="regContact"required><br>

        <label for="country">Country</label><br> 
        <select name="regCountry"style="width:400px;" id="country" class="select" required>
          <optgroup label="Country">
            <option value="LK">Sri Lanka</option>
            <option value="IN">India</option>
            <option value="US">USA</option>
          </optgroup>
        </select><br>
        
        <label for="email">Email Address</label> <br> 
        <input class="text-box" type="email" id="email" style="width:400px;" name="regEmail" required><br>
        
        
        <label for="pwd">Enter Password</label><br>
        <input class="text-box"  type="password" id="pwd" style="width:400px;"  name="regPwd" required>
        <br>

        <label for="rePwd">Re-enter Password</label><br>
        <input class="text-box"  type="password" style="width:400px;" id="rePwd" name="regRePwd" required> <br><br>


          <div>
                <input type="checkbox" class="form-check-input" id="checkbox" >
                <label for="checkbox">Agree terms and conditions</label>
              </div>


      <br>
        <input type="submit" id="btnl1" name="register" class="button btn-reg" style="width:100px;" value="Register Now">
        <input type="reset" id="btnl2" class="button btn-rst" style="width:100px;" value="Reset">
      </form>


      <!-- CODE THIS AREA-->
    </div>





    <?php include ('./footer.php' ); ?>

    

    <script src="../Js/main.js"></script>
    <script src="../Js/reg.js"></script>
  </body>

</html>



<?php

require_once '../db/dbconfig.php';

if(isset($_POST['register'])){

    $name = trim($_POST['regName']);
    $address = trim($_POST['regAddr']);
    $postal = trim($_POST['regPCode']);
    $city = trim($_POST['regCity']);
    $contact = trim($_POST['regContact']);
    $country = trim($_POST['regCountry']);
    $email = trim($_POST['regEmail']);
    $pwd = sha1(trim($_POST['regPwd']));
    $rePwd = sha1(trim($_POST['regRePwd']));



    if($pwd != $rePwd){
      echo "<script>alert('Passwords doesn\'t match');</script>";
    }

    else{

      $check = "SELECT * FROM  `users` WHERE `email` = '$email' ";
      $query = mysqli_query($con,$check);
         
      if($rows = mysqli_num_rows($query)>0){
        echo "<script>alert('Account already exisits with');</script>";
      }
     
      else{

        $sql =  "INSERT INTO `users` VALUES ('0' , '$name' , '$email' , '$pwd' , '$country' , '$address' , '$city' , '$postal','$contact')";

        if ($con->query($sql) === TRUE) {
          echo "<script>alert('Registration Succesful');</script>";
          $_SESSION['email'] = $email;
          echo "<script>window.open('../index.php','_self');</script>";
        }
        else{
          echo "<script>alert('Registration Faild. Try again');</script>";
        }
      }

    }

}
$con->close();


?>