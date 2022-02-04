<?php
include "../db/dbconfig.php"; 


if(isset($_POST['changeSalesStat'])){
    $sid = $_POST['sid'];
    $state;
    $newState;

    $get =  "SELECT * FROM `orders` WHERE `sid`='$sid' ";
    $result = $con->query($get);


   if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $state =  $row["state"];
    }
  } 
  else {
    
  }


    if($state == 'PE'){
        $newState = 'SP';
    }
    else if($state == 'SP'){
        $newState = 'DL';
    }
    else{
        $newState = 'PE';
    }



    $sql =  "UPDATE `orders` SET `state` = '$newState' WHERE `sid`='$sid'";

    if ($con->query($sql) === TRUE) {
        echo "done";
    }
    else{
        echo "error";
    }
}


?>