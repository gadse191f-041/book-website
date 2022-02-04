<?php

include "../db/dbconfig.php"; 

if(isset($_POST['deleteBook'])){
    $bid = $_POST['bid'];

    $sql =  "DELETE FROM `inventory` WHERE `bid`='$bid'";

    if ($con->query($sql) === TRUE) {
        echo "done";
    }
    else{
        echo "error";
    }

}



if(isset($_POST['deleteUser'])){

    $uid = $_POST['uid'];

    $sql =  "DELETE FROM `users` WHERE `uid`='$uid'";

    if ($con->query($sql) === TRUE) {
        echo "done";
    }
    else{
        echo "error";
    }


}




?>