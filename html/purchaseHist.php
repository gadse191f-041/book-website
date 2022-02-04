





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
    <link rel="stylesheet" href="../css/purchaseHist.css">
    <title>Luminex Book Store</title>
  </head>

  <body>
   
  <?php
    //session_start();

    if (empty(isset($_SESSION['email']))) {
    header('Location: ./login.php');
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



      <ul class="list-group threeDimMax">
        <li class="list-group-title justify-content-center themeColor">
          Summary
        </li>
        <li class="list-group-item d-flex justify-content-between
          align-items-center">
          Pending
          <span class="list-badge badge badge-blue badge-pill">3</span>
        </li>
        <li class="list-group-item d-flex justify-content-between
          align-items-center">
          Shipped
          <span class="list-badge  badge badge-blue badge-pill"><p>4</p></span>
        </li>
        <li class="list-group-item d-flex justify-content-between
          align-items-center">
          Delivered
          <span class="list-badge  badge badge-blue badge-pill">3</span>
        </li>
      </ul>






      <form class="search-table">
        <input class="text-box" type="text"
          placeholder="Search...">
      </form>

      <table class="table threeDim">
        <thead class="themeColor">
          <tr>
            <th>#</th>
            <th>Date</th>
            <th>Book Name</th>
            <th>Order Stat.</th>
          </tr>
        </thead>
        <tbody>


          <tr>
            <th>1</th>
            <td>xx-xx-xx</td>
            <td>XXXXXXXXXXX</td>

            <td><span class="badge badge-delivered">Delivered</span></td>
          </tr>

          <tr>
            <th>2</th>
            <td>xx-xx-xx</td>
            <td>XXXXXXXXXXX</td>

            <td><span class="badge badge-delivered">Delivered</span></td>
          </tr>

          <tr>
            <th>3</th>
            <td>xx-xx-xx</td>
            <td>XXXXXXXXXXX</td>

            <td><span class="badge badge-pending">Payment Pending...</span></td>
          </tr>

          <tr>
            <th>4</th>
            <td>xx-xx-xx</td>
            <td>XXXXXXXXXXX</td>

            <td><span class="badge badge-delivered">Delivered</span></td>
          </tr>

          <tr>
            <th>5</th>
            <td>xx-xx-xx</td>
            <td>XXXXXXXXXXX</td>

            <td><span class="badge badge-shipped">Shipped</span></td>
          </tr>

          <tr>
            <th>6</th>
            <td>xx-xx-xx</td>
            <td>XXXXXXXXXXX</td>

            <td><span class="badge badge-shipped">Shipped</span></td>
          </tr>

          <tr>
            <th>7</th>
            <td>xx-xx-xx</td>
            <td>XXXXXXXXXXX</td>

            <td><span class="badge badge-pending">Payment Pending...</span></td>
          </tr>


          <tr>
            <th>8</th>
            <td>xx-xx-xx</td>
            <td>XXXXXXXXXXX</td>

            <td><span class="badge badge-shipped">Shipped</span></td>
          </tr>



          <tr>
            <th>9</th>
            <td>xx-xx-xx</td>
            <td>XXXXXXXXXXX</td>

            <td><span class="badge badge-shipped">Shipped</span></td>
          </tr>

          <tr>
            <th>10</th>
            <td>xx-xx-xx</td>
            <td>XXXXXXXXXXX</td>

            <td><span class="badge badge-pending">Payment Pending...</span></td>
          </tr>

        </tbody>
      </table>



    </div>





    <?php include ('./footer.php' ); ?>


   <script src="../Js/main.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../Js/userProfile.js"></script>

  </body>

</html>