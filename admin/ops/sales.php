
<?php

require_once '../db/dbconfig.php';

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



        <div class="Statcontainer" style="width: 40%; float: left;margin-left: 5%;transform: translateY(-60px);">
            
            <ul class="list-group threeDimMax">
                <li class="list-group-title justify-content-center themeColor">
                  Summary
                </li>
                <li class="list-group-item d-flex justify-content-between
                  align-items-center">
                  Pending
                  <span  class="list-badge badge badge-blue badge-pill"><p id="pdCnt">0</p></span>
                </li>
                <li class="list-group-item d-flex justify-content-between
                  align-items-center">
                  Shipped
                  <span class="list-badge  badge badge-blue badge-pill"><p id="spCnt">0</p></span>
                </li>
                <li class="list-group-item d-flex justify-content-between
                  align-items-center">
                  Delivered
                  <span class="list-badge  badge badge-blue badge-pill"><p id="dlCnt">0</p></span>
                </li>
              </ul>


        </div>




          <div class="tableview threeDimMax">

            <input class="text-box" id="saleSearch" style="width: 60%; margin-right: 5px;"type="text" placeholder="Search...     SID , Customer , BookID , State"/>

            
            <br><br>

            <table class="inventory" id="saleTable">
                <tr>
                  <th>SID</th>
                  <th>Date</th>
                  <th>Customer</th>
                  <th>BookID</th>
                  <th>QTY</th>
                  <th>State</th>
                  <th>Toggle</th>
                </tr>
                

              </table>
              
            </div>

        </div>

        <footer class="footer">
            <div class="admin-footer">
                <a href="../index.html">Luminex Book Store</a>
            </div>
        </footer>

        <script src="../js/main.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="../js/sales.js"></script>
    </body>
</html>


