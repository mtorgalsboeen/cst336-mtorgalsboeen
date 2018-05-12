<?php
include 'connect.php';
session_start();
$connect = getDBConnection();
    //Checks if user is logged in, otherwise redirect to login-page
    if(isset($_SESSION['username'])){
        echo "Logged in as" . " " . $_SESSION['username'];
    } else{
        header("Location: login.php");
    }
    $sql = "SELECT * FROM user_table
                WHERE userId = " .$_GET['userId'];
    $result = $connect->query($sql);
        
        foreach ($result as $row) {
            $name = $row['username']; 
            $password = $row['password'];
            $lastname = $row['lastName']; 
            $firstname = $row['firstName'];              
            $userid = $row['userId'];
            $city = $row['city'];
            $address = $row['addy'];
        }
    if(isset($_POST['submit'])){
        global $connect;
        $name = $_POST["unavn"];
        $fnavn = $_POST["fname"];
        $enavn = $_POST["lname"];
        $pass = $_POST["pass"];
        $wallet = $_POST["addy"];
        
        try {
        $query = "UPDATE user_table SET firstName = '$fnavn', lastName='$enavn', username='$name', password='$pass', 
                    addy='$wallet' WHERE userId= " .$_GET['userId'];
        $connect->exec($query);
        echo "Changes is made!";
        echo "<br>"; 
        
        header("Location: index.php");
        }
        //UPDATE `user_table` SET `firstName` = 'Fredrik', `lastName` = 'Breda', `username` = 'frebre' WHERE `user_table`.`userId` = 11;
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
        <title>CST336 - Final</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
                integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        <link rel="stylesheet" href="css/stylesheet.css" type="text/css" />
    </head>
    <body>
        <h1>CST336 - Final Project</h1>
        <div class="scrollmenu">
          <a href="index.php">Home</a>
          <a href="shop.php">Shop</a>
          <a href="shop_inside.php">Shop Report</a>
          <a href="nanopool.php">Nanopool</a>
          <a href="support.php">Support</a>
          <a href="logout.php">Sign out</a>
        </div>
        <div class="col-xs-1" align="center">
            <div class="container">
                <h1>Edit Admin</h1>
                <div class="col-sm-6">
                    <form action="" method="post" align="center">
                        <div class="form-group">
                            <label for="pass">Firstname: </label>
                            <input type="text" class="form-control" name="fname" value="<?php echo $firstname ?>"/>
                        </div>  
                        <div class="form-group">
                            <label for="pass">Lastname: </label>
                            <input type="text" class="form-control" name="lname" value="<?php echo $lastname ?>"/>
                        </div>                        
                        <div class="form-group">
                            <label for="fnavn">Username: </label>
                            <input type="text" class="form-control" name="unavn" value="<?php echo $name ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="pass">Password: </label>
                            <input type="text" class="form-control" name="pass" value="<?php echo $password ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="addy">Wallet-Address: </label>
                            <input type="text" class="form-control" name="addy" value="<?php echo $address ?>"/>
                        </div>                        
                        <input type="submit" class="btn btn-primary" name="submit" value="Make Changes"/>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>