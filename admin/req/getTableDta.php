<?php

include "../db/dbconfig.php"; 

if(isset($_GET['inventory'])){

    $data=array(); 

    $q=mysqli_query($con, "select * from `inventory` "); 

    while ($row=mysqli_fetch_object($q)){
        $data[]=$row; 
    }

    echo json_encode($data); 

}



if(isset($_GET['sales'])){

    $data=array(); 

    $q=mysqli_query($con, "select * from `orders` "); 

    while ($row=mysqli_fetch_object($q)){
        $data[]=$row; 
    }

    echo json_encode($data); 

}



if(isset($_GET['users'])){

    $data=array(); 

    $q=mysqli_query($con, "select `uid`,`name`,`email`,`address`,`city`,`postalcode`,`country`,`contact` from `users` "); 

    while ($row=mysqli_fetch_object($q)){
        $data[]=$row; 
    }

    echo json_encode($data); 

}



?>