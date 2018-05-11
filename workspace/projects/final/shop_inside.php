<?php
include 'connect.php';
session_start();
$connect = getDBConnection();
    //displays Quiz if session is active
    if(isset($_SESSION['username'])){
        echo "Logged in as" . " " . $_SESSION['username'];
    } else{
        header("Location: login.php");
    }
    function theReport(){
    $connect = getDBConnection();    
    $sql = "SELECT avg(product_price) FROM products";
    $result = $connect->query($sql);

        foreach ($result as $row) {
         $avgPrice = $row['avg(product_price)']; 
            echo "<br>" . "<br>";
            echo "The average price of products in shop is: " .$avgPrice;            
        } 
    }
?>    
<!DOCTYPE html>
<html>
    <head>
        <title>Shop - Intern Report</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
                    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        <link rel="stylesheet" href="css/stylesheet.css" type="text/css" />
    </head>
    <body>
        <div class="scrollmenu">
          <a href="index.php">Home</a>
          <a href="shop.php">Shop</a>
          <a href="nanopool.php">Nanopool</a>
          <a href="support.php">Support</a>
          <a href="logout.php">Sign out</a>
        </div>  
        <div>
            <?php theReport() ?>
        </div>
    </body>
</html>