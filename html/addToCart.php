<?php require_once '../db/dbconfig.php';



function updateStock($bookID,$qty,$stock){
    global $con;

    $updatedStock = $stock - $qty;
    //echo $updatedStock;

    $sql =  "UPDATE `inventory` SET `stock` = '$updatedStock' WHERE `bid`='$bookID'";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Added to cart');
        window.location.href='../index.php';
        </script>";

        //header("Location:../index.php");
    }
    else{
       echo "<script>alert('Failed')</script>";
       header("Location:../index.php");
    }
}








if(isset($_GET['addtocart'])){

    $bookId = $_GET["bookId"];
   
    $uId = $_GET["uId"];
    $qty = $_GET["qty"];
    $stock = $_GET["stock"];


    $sqlGET = "SELECT `email` FROM `users` WHERE `uid` = '$uId'";
    $query = mysqli_query($con,$sqlGET);
    $row_ = mysqli_fetch_array($query);

    $userEmail = $row_["email"];

    //echo $userEmail;
    
        if ($con->query($sql) === TRUE) {
            updateStock($bookId,$qty,$stock);
            //header("Location:../index.php");
        }
        else{
            echo "<script>alert('Failed')</script>";
            header("Location:../index.php");
        }

}
?>