<?php
    

    $con = new mysqli("localhost","root","","luminex_book_store");


    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }



?>