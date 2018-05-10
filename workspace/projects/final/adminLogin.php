<?php
    include 'connect.php';
    function produkter(){
    $connect = getDBConnection();
    $sql = "SELECT * FROM products";
    
    $result = $connect->query($sql);
    //$records = executeWithParameter($sql,$namedParameters);
         
        foreach ($result as $row) {
         $itemName = $row['product_name']; 
         $itemPrice = $row['product_price']; 
         $itemImage = $row['product_image'];
         $itemDescription = $row['product_description'];
            echo "<h3>$itemName</h3>" . "<br>" . "<h4 style='text-align:right'>" . "Price: " . "$" . $itemPrice . "</h4>" . "<br>" . "<img src='$itemImage' alt='$itemDescription' height='180' width='180'>";            
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
       <?php produkter() ?> 
    </body>
</html>