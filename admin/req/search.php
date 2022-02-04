<?php

    include "../db/dbconfig.php"; 

    if(isset($_GET['bookSearch']))
    {
        $search=$_GET['search']; 

        $sql = "select * from `inventory` WHERE `bid` LIKE '%$search%' OR `bookname` LIKE '%$search%' OR `author` LIKE '%$search%' OR `isbn` LIKE '%$search%' ";
        $q=mysqli_query($con,$sql); 
        $data=array(); 
        while ($row=mysqli_fetch_object($q)){
            $data[]=$row; 
        }
        echo json_encode($data); 
    }



    else if(isset($_GET['saleSearch']))
    {
        $search=$_GET['search']; 

        $sql = "select * from `orders` WHERE `sid` LIKE '%$search%' OR `email` LIKE '%$search%' OR `bid` LIKE '%$search%' OR `dtm` LIKE '%$search%' ";
        $q=mysqli_query($con,$sql); 
        $data=array(); 
        while ($row=mysqli_fetch_object($q)){
            $data[]=$row; 
        }
        echo json_encode($data); 
    }





    else if(isset($_GET['userSearch']))
    {
        $search=$_GET['search']; 

        $sql = "select * from `users` WHERE `uid` LIKE '%$search%' OR `email` LIKE '%$search%' OR `name` LIKE '%$search%' OR `country` LIKE '%$search%' OR `city` LIKE '%$search%' OR `postalcode` LIKE '%$search%' OR `contact` LIKE '%$search%' OR `state` LIKE '%$search%' OR `address` LIKE '%$search%' ";
        $q=mysqli_query($con,$sql); 
        $data=array(); 
        while ($row=mysqli_fetch_object($q)){
            $data[]=$row; 
        }
        echo json_encode($data); 
    }




?>