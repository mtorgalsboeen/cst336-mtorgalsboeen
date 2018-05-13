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
    $sql2 = "SELECT count(userId) FROM user_table";
    $sql3 = "SELECT sum(product_price) FROM products";
    $result = $connect->query($sql);
    $result2 = $connect->query($sql2);
    $result3 = $connect->query($sql3);
    

        foreach ($result as $row) {
         $avgPrice = $row['avg(product_price)']; 
            echo "<br>" . "<br>";
            echo "The average price of products in shop is: " . "$".$avgPrice;            
        } 
        foreach ($result2 as $row2) {
         $users = $row2['count(userId)']; 
            echo "<br>" . "<br>";
            echo "Amount of users registrered: " .$users;            
        }
        foreach ($result3 as $row3) {
         $pricing = $row3['sum(product_price)']; 
            echo "<br>" . "<br>";
            echo "Total inventory value: " .$pricing;            
        }        
    }
    if(isset($_POST["submit"])){
             $name = $_POST['name']; 
             $price = $_POST['price'];
             $description = $_POST['description']; 
             $image_url = $_POST['image'];              
        echo "<br>";
        try {
        $query = "INSERT INTO products (productId, product_name, product_image, product_description, 
                    product_price) VALUES (NULL, '$name', '$image_url', '$description', '$price')";
        $connect->exec($query);
        echo "Product is added!";
        echo "<br>" . $city; 
        }
        catch(PDOException $e)
            {
            echo $query . "<br>" . $e->getMessage();
            }
        
        $connect = null;        
                
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
<div class="col-xs-1" align="center">
            <div class="container">
                <h1>Register New Product</h1>
                <div class="col-sm-6">
                    <form action="" method="post" align="center">
                        <div class="form-group">
                            <label for="name">Product Name: </label>
                            <input type="text" class="form-control" name="name"/>
                        </div>  
                        <div class="form-group">
                            <label for="price">Product Price: </label>
                            <input type="text" class="form-control" name="price"/>
                        </div>                        
                        <div class="form-group">
                            <label for="description">Product Description: </label>
                            <input type="text" class="form-control" name="description"/>
                        </div>
                        <div class="form-group">
                            <label for="image">Image URL: </label>
                            <input type="text" class="form-control" name="image"/>
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Add"/>
                    </form>
                </div>
            </div>        
        <div>
            <?php theReport() ?>
        </div>
    </body>
</html>