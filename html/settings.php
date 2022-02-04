
<?php require_once '../db/dbconfig.php';?>

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
    <link rel="stylesheet" href="../css/settings.css">
    <title>Luminex Book Store</title>
  </head>

  <body>
    

  <?php
    //session_start();

    if (empty(isset($_SESSION['email']))) {
    header('Location: ./login.php');
    }

    else{

      $email_ = $_SESSION['email'];
      $name_ ;
      $address_;
      $city_;
      $country_;
      $postalcode_;
      $contact_;

      $sql_ = "SELECT `email`, `name`, `address`, `city`, `country` , `postalcode`, `contact`  FROM `users` WHERE `email` = '$email_'  ";
      $result_ = $con->query($sql_);
      if ($result_->num_rows == 1) {
        while($row_ = $result_->fetch_assoc()) {
         $name_ = $row_["name"];
         $address_ = $row_["address"];
         $city_ = $row_["city"];
         $country_ = $row_["country"];
         $postalcode_ = $row_["postalcode"];
         $contact_ = $row_["contact"];
        }
      }
      
      

    }
       
  ?>





    <div class="main-container-profile">
      <!-- CODE THIS AREA-->

      <div class="topnav" id="prof-nav">
        <a href="../index.php" class="gobckshopping">Go Back Shopping</a>
          <a href="./userProfile.php">Dashboard</a>
          <a href="./purchaseHist.php">Purchase History</a>
          <a href="./settings.php">Settings</a>
        <a class="icon" id="prof-nav-toggle">
          <i id='prof-nav-icon' class="fa fa-angle-down"></i>
        </a>
      </div>


      <!-- CODE THIS AREA-->
    </div>






    <div class="inner-container">

      <div class="settings-box threeDimMax">

        <form class="settings-form" action="<?=$_SERVER['PHP_SELF'];?>"  method="POST">
          
          <div class="form-group col-md-6">
              <label for="set-name">Name</label>
              <input type="text" class="text-box" id="set-name" name="set-name" placeholder="Someone" value="<?php echo $name_ ?>" required>
            </div>

            <div class="form-group col-md-6">
              <label for="set-email">Email</label>
              <input type="email" class="text-box" id="set-email" name="set-email" placeholder="Email" value="<?php echo $email_ ?>" required>
            </div>

          

          <div class="form-group">
            <label for="set-addr">Address</label>
            <input type="text" class="text-box" id="set-addr" name="set-addr" placeholder="1234 Main St" value="<?php echo $address_ ?>" required>
          </div>

        
            <div class="form-group">
              <label for="set-city">City</label>
              <input type="text" class="text-box" id="set-city" name="set-city" placeholder="Colombo" value="<?php echo $city_ ?>" required>
            </div>

            <div class="form-group">
              <label for="set-country">Country</label><br>
              <select class="select" id="set-country" name="set-country" required>

                <option <?php if($country_ == "LK") echo "selected" ?> value="LK" >Sri Lanka</option>
                <option <?php if($country_ == "IN") echo "selected" ?> value="IN">India</option>
                <option <?php if($country_ == "US") echo "selected" ?> value="USA">USA</option>

              </select><br>
            </div>

            <div class="form-group">
              <label for="set-postcode">Postal Code</label>
              <input type="text" class="text-box" id="set-postcode" name="set-pcode" placeholder="70200" value="<?php echo $postalcode_ ?>" required>
            </div>


            <div class="form-group">
              <label for="set-contact">Contact</label>
              <input type="tel" class="text-box" id="set-contact" name="set-contact" placeholder="Contact" value="<?php echo $contact_ ?>" required>
            </div>
            
            
            <br>
            <div class="form-group col-md-6">
              <label for="curr-pwd">Current Password</label>
              <input type="password" class="text-box" id="curr-pwd" name="curr-pwd" placeholder="Current Password" required>
            </div>

            <div class="form-group col-md-6">
              <label for="set-pwd">New Password</label>
              <input type="password" class="text-box" id="set-pwd" name="set-newpwd" placeholder="New Password">
            </div>

            <div class="form-group col-md-6">
              <label for="set-pwdConf">Confirm New Password</label>
              <input type="password" class="text-box" id="set-pwdConf" name="set-newpwdConf" placeholder="New Password">
            </div>

          <br>

          <button type="submit" class="button button-submit" name="update">UPDATE</button>

          <button type="submit" class="button button-submit btndelete" name="deleteUser" onclick="return confirm('Are you sure you want to delete your account ?')">Delete Account</button>

        </form>

      </div>

    </div>



    <?php include ('./footer.php' ); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../Js/main.js"></script>
    <script src="../Js/userProfile.js"></script>
    <script src="../Js/settings.js"></script>

  </body>

</html>




<?php

  require_once '../db/dbconfig.php';

  if(isset($_POST['update'])){



    function update($name,$email,$pwd,$country,$addr,$city,$postal,$contact,$superEmail){
      global $con;

      if($email == $superEmail){

        $sql =  "UPDATE `users` SET `name` = '$name' , `email` = '$email' , `pwd` = '$pwd' , `address` = '$addr' , `city` = '$city' , `country` = '$country' , `postalcode` = '$postal' , `contact` = '$contact' WHERE `email` = '$superEmail' ";
        
        if ($con->query($sql) === TRUE) {
          echo "<script>alert('Update Succesful !')</script>";
        }
        else{
          echo "<script>alert('Update Faild !')</script>";
        }
      }

      else{

        $sqlEmail = "SELECT * FROM `users` WHERE `email` = '$superEmail' ";
        $resultEmail = $con->query($sqlEmail);
          if ($resultEmail->num_rows > 0) {
            echo "<script>alert('Email Alreeady Taken')</script>";
        }
      
      }


    
    }



    $setEmail = trim($_POST['set-email']);
    $setName = trim($_POST['set-name']);
    $setAddr = trim($_POST['set-addr']);
    $setCity = trim($_POST['set-city']);
    $setCountry = trim($_POST['set-country']);
    $setPostal = trim($_POST['set-pcode']);
    $setContact = trim($_POST['set-contact']);
    $currPwd = sha1(trim($_POST['curr-pwd']));
    $setPwd = trim($_POST['set-newpwd']);
    $setPwdConf = trim($_POST['set-newpwdConf']);

    $finalPWD;

    if(empty($setPwd) and empty($setPwdConf)){
      $finalPWD = $currPwd;
    }

    else{
      if($setPwd == $setPwdConf){
        $finalPWD = sha1($setPwdConf);
      }
      else{
        echo "<script>alert('New passwords doesn\'t match!')</script>";
      }
    }



    $sqlChk = "SELECT * FROM `users` WHERE `email` = '$email_' AND `pwd` = '$currPwd'  ";
    $resultChk = $con->query($sqlChk);
      if ($resultChk->num_rows == 1) {
        update($setName,$setEmail,$finalPWD,$setCountry,$setAddr,$setCity,$setPostal,$setContact,$email_);
      }
      else{
      echo "<script>alert('Password Incorrect')</script>";
      }
  }





  
function deleteUser($email,$uid){
  global $con;

    $sqlDel =  "DELETE FROM `users` WHERE `email`= '$email' AND `uid` = '$uid' ";
    if ($con->query($sqlDel) === TRUE) {
      echo "<script>alert('Account Delete Successful.')</script>";
      echo "<script>window.open('./logout.php','_self');</script>";
    }
    else{
      echo "<script>alert('Unable to delete the account')</script>";
    }

}



  if(isset($_POST['deleteUser'])){
    $currPwd = sha1(trim($_POST['curr-pwd']));
    $email_ = $_SESSION['email'];
    $uid =  $_SESSION['uId'];

    $sqlChk = "SELECT * FROM `users` WHERE `email` = '$email_' AND `pwd` = '$currPwd'  ";
    $resultChk = $con->query($sqlChk);
      if ($resultChk->num_rows == 1) {
        //echo $uid;
        deleteUser($email_,$uid);
      }
      else{
      echo "<script>alert('Password Incorrect')</script>";
      }

  }






?>