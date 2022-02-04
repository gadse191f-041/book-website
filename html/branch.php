<?php require_once '../db/dbconfig.php';?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2:wght@400;600&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="../css/footer.css"/>
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/alterB.css"/>
    <link rel="stylesheet" href="../css/branch.css"/>
    <title>Luminex Book Store</title>
  </head>

  <body>


    <?php include ('navBar.php' ); ?>

 


    <div class="inner-container">
    <p><iframe src="https://www.google.com/maps/d/u/0/embed?mid=1yPzCBgn5RE59L9Zrl8jYk1FuHiInWb9Q" width="640" height="480"></iframe></p>
         
    <?php


  $sql = "SELECT branch_name, branch_addrs FROM branch";
  $result = $con->query($sql);

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        echo "<p style='font-weight:bold;'>". "<br> Branch: " . "</p>".  $row["branch_name"]. "<br>" ."<p style='font-weight:bold;'>". "Address: ". "</p>". $row["branch_addrs"]. " " . "<br>";

      }
    } else {
        echo "0 results";
    }

$con->close();
?>

    </div>






<?php include ('./footer.php' ); ?>



    <script src="../Js/main.js"></script>
  </body>

</html>