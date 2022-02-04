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
    <link rel="stylesheet" href="../css/register.css"/>
    <title>Luminex Book Store</title>
  </head>

  <body>


  <?php include ('navBar.php' ); ?>

    <div class="main-container contact-container" style="margin-top: 60px;">
      <!-- CODE THIS AREA-->



  
 
  <div class="container">
    <br><br>



    <div class="subcontainer1">
     
      <h1>Luminex Book Store</h1>
      <h4 style="font-weight: normal;">Sri Lankaramaya Serpentine Road,</h4>
      <h4 style="font-weight: normal;">Colombo.</h4>

      <br><br>

      <h4>Call us</h4>
      <h4 style="font-weight: normal;">+94 00000000</h4>



    </div>

    <div class="subcontainer2" style="flex: 1;">
      <form action="/action_page.php" style="margin: 10px;">
        <label for="fname">Your Name</label>
        <input class="text-box" type="text" id="name" name="name" placeholder="Name">
      
      <label for="email">Email Address</label>
        <input class="text-box" type="text" id="email" name="email" placeholder="Email">

        <label for="cno">Contact No</label>
        <input class="text-box" type="text" id="cno" name="cno" placeholder="Contact No.">

        <label for="subject">Message</label>
        <textarea class="text-area" id="subject" name="subject" placeholder="Write something.." rows="5" required></textarea>

        <input class="contactbtn button" class="text-box" type="submit" value="Submit" style="width: 200px;height: 30px;border: none;">
      </form>
    </div>
</div>




      <!-- CODE THIS AREA-->
    </div>




    <?php include ('./footer.php' ); ?>



    <script src="../Js/main.js"></script>
  </body>

</html>