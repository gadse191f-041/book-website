
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









          <div class="tableview threeDimMax" style="width: 95%;">

            <input class="text-box" id="userSearch" style="width: 60%; margin-right: 5px;"type="text" placeholder="Search...        UserID , Name , Email , Country"/>


            <br><br>

            <table class="inventory" id="usersTable" >
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>city</th>
                  <th>Postal Code</th>
                  <th>Country</th>
                  <th>Contact</th>
                  <th></th>
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
        <script src="../js/users.js"></script>
    </body>
</html>


