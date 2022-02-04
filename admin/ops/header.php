
<?php

session_start();

if (empty(isset($_SESSION['adminEmail']))) {
  header("Location: ../index.php");
 }  


?>




<div class="header">
            <div class="admin-nav" id="prof-nav">
                <a href="../../index.html" class="icon-text">Luminex Book Store</a>
                <div class="admin-nav-content">
                    <a href="#blank"></a>
                    <a href="./sales.php">Sales</a>
                    <a href="./inventory.php">Inventory</a>
                    <a href="./users.php">Users</a>
                </div>
                <div class="admin-nav-right">
                    <a href="#"><i class="fas fa-user"></i></a>
                    <a href="./logout.php">Logout</i></a>
                </div>
                <a class="icon" id="prof-nav-toggle">
                  <i id="prof-nav-icon" class="fa fa-angle-down"></i>
                </a>
                
            </div>
        </div>
 