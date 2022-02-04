
<?php

session_start();

if (!empty(isset($_SESSION['adminEmail']))) {
  header("Location: ./ops/sales.php");
 }  


?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2:wght@400;600&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/alterB.css"/>
  <link rel="stylesheet" href="./css/main.css" />

  <title>Luminex Book Store</title>
</head>

<body>
  


  

  <div class="header">
    <div class="admin-nav">
      <a href="../index.html">Luminex Book Store</a>
    </div>

  </div>

  

    <div class="inner-container" id="inner-container">

    <div class="login-box threeDimMax">

        <form class="login-form" method="POST" action="<?=$_SERVER['PHP_SELF'];?>" >
          <div class="form-group">
            <H2>Admin Login</H2><br>
          </div>

            <div class="form-group">
              <label for="adm-email">Email</label>
              <input type="email" class="text-box" name="adminEmail" placeholder="Email" >
            </div>

            <div class="form-group">
              <label for="adm-pwd">Password</label>
              <input type="password" class="text-box" name="adminPwd"  placeholder="Password">
            </div>    

            <br>

              <div class="form-group">
                <input type="submit" class="button lgnbtn" value="Login" name="auth">
              </div>

            </form>
   
            </div>

        </div>
    </div>


    <footer class="footer">

      <div class="admin-footer">
        <a href="../index.html">Luminex Book Store</a>
      </div>
  
    </footer>



    
    <script src="./js/main.js"></script>
    <script src="./js/login.js"></script>
</body>

</html>


<?php

require_once './db/dbconfig.php';

if(isset($_POST['auth'])){

    $email = trim($_POST['adminEmail']);
    $pwd = trim($_POST['adminPwd']);

    $email = stripslashes($email);
    $pwd = sha1(stripslashes($pwd));

    $sql = "SELECT * FROM admin WHERE email = '$email' and pwd = '$pwd'";

    $query = mysqli_query($con,$sql);

    $rows = mysqli_num_rows($query);


    if($rows>1){
        echo "<script>alert('oops! Something went wrong!')</script>";
    }

    else if($rows == 1){
        session_start();
        $admin = mysqli_fetch_assoc($query);

        $_SESSION['adminEmail'] = $admin["email"];

        header("Location: ./ops/sales.php");

    }

    else{
        echo "<script>alert('Email or Password Incorrect')</script>";
    }

}
$con->close();

?>