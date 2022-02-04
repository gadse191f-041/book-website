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

  <link rel="stylesheet" href="../css/login.css">
  <title>Luminex Book Store</title>
</head>

<body>
  

<?php 
    if (!empty(isset($_SESSION['email']))) {
      header('Location: ../index.php');
    }
      
  ?>

  

  <div class="main-container-profile">

  </div>

  




    <div class="inner-container">

    

    <div class="login-box threeDimMax">

    <h2> Login </h2><br>

       
      <form action="<?=$_SERVER['PHP_SELF'];?>"  method="POST" class="login-form">

            <div>
              <label for="login-email">Email</label>
              <input name="lgnEmail" type="email" class="text-box" id="login-email" placeholder="Email" required>
            </div>

            <div>
              <label for="login-pwd">Password</label>
              <input name="lgnPwd" type="password" class="text-box" id="login-pwd" placeholder="password" required>
            </div>    
            
            
              <div>
                <input type="checkbox" class="form-check-input" id="keeplgin" checked>
                <label for="keeplgin">Keep me logged in</label>
              </div>

              <div>
                <button name="login" id="submitBtn" type="submit" class="button login-button">Login</button>
              </div>
   
            </div>

          </form>
        </div>
    </div>






    <?php include ('./footer.php' ); ?>





    <script src="../Js/main.js"></script>
    <script src="../Js/login.js"></script>

</body>

</html>






<?php

  require_once '../db/dbconfig.php';

  if(isset($_POST['login'])){

      $email = trim($_POST['lgnEmail']);
      $pwd = trim($_POST['lgnPwd']);

      $email = stripslashes($email);
      $pwd = sha1(stripslashes($pwd));

      $sql = "SELECT * FROM `users` WHERE `email` = '$email' and `pwd` = '$pwd'";

      $query = mysqli_query($con,$sql);
  
      $rows = mysqli_num_rows($query);
  
      if($rows>1){
        echo "<script>alert('oops! Something went wrong!')</script>";
      }

      else if($rows == 1){
        $row_ = mysqli_fetch_array($query);
        $_SESSION['email'] = $email;
        $_SESSION['uId'] = $row_["uid"];
       echo "<script>window.open('../index.php','_self');</script>";

      }

      else{
        echo "<script>alert('Email or Password Incorrect')</script>";
      }


  }

?>