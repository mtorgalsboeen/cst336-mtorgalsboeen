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
            echo "<h3>$itemName</h3>" . "<br>" . "<h4 style='text-align:center'>" . $itemDescription . "</h4>" . "<h4 style='text-align:right'>" . "Price: " . "$" . $itemPrice . "</h4>" . "<br>" . "<img src='$itemImage' alt='$itemDescription' height='180' width='180'>";            
        }
    }    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CST336 - Final</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        <link rel="stylesheet" href="css/stylesheet.css" type="text/css" />
    </head>
    <body>
        <h1>CST336 - Final Project</h1>
        <div class="scrollmenu">
          <a href="index.php">Home</a>
          <a href="shop.php">Shop</a>
          <a href="nanopool.php">Nanopool</a>
          <a href="support.php">Support</a>
          <a href="logout.php">Sign out</a>
        </div>   
    <a id="adminLogin" href="adminLogin.php">Login as admin</a>
    <br><h1>Plugur Corporation Mining Equipment</h1>
    <br/>
    <div id="orderBar">
        <div id="asideLeft">
            <strong>Product Name:</strong> <br>
            <strong>Category:</strong> <br>
            <strong>Order by:</strong>
        </div>
        <div id="asideRight">
        <input type="text" id="nameIncludes" name="nameIncludes" value=<?= $_GET["nameIncludes"]?>>
        <br>
            <br>
            <input type="radio" name="orderBy" id="orderByNameAsc" checked value="orderByNameAsc">
            <label for="orderByNameAsc">Name A-Z</label>
            <input type="radio" name="orderBy" id="orderByPriceLow" value="orderByPriceLow">
            <label for="orderByPriceLow">Price: Low->High</label>
            <br>
            <input type="radio" name="orderBy" id="orderByPriceHigh" value="orderByPriceHigh">
            <label for="orderByPriceHigh">Price: High->Low</label>
            <input type="radio" name="orderBy" id="orderByNameDesc" value="orderByNameDesc">
            <label for="orderByNameDesc">Name Z-A</label>
        </div>
       
    </div>
    <div id="products">
        <table class="table table-striped">
            <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
            </tr>
            <tbody id="dataWrapper">
            </tbody>
        </table>
    </div>
    <div>
        <?php produkter() ?>
    </div>
    </body>
</html>