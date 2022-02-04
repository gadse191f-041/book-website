<?php

session_start();

if (empty(isset($_SESSION['adminEmail']))) {
  header("Location: ./login.php");
 }  

 else{
  header("Location: ./ops/sales.php");
 }


?>