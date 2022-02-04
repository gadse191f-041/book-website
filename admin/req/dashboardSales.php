


<?php

include "../db/dbconfig.php"; 

if(isset($_GET['getSales'])){

    $year = $_GET['year'];
    $month = $_GET['month'];
    $day = $_GET['day'];

$data=array(); 

$sql = " SELECT SUM(`qty`) AS `count` FROM `orders` WHERE `dtm` LIKE '$year-$month-$day' ";

$q=mysqli_query($con, $sql); 

while ($row=mysqli_fetch_object($q)){
    $data[]=$row; 
}

echo json_encode($data); 

}

?>