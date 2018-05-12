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
    if(isset($_POST["submit"])){
             $name = $_POST['unavn']; 
             $password = sha1($_POST['pass']);
             $lastname = $_POST['lname']; 
             $firstname = $_POST['fname'];              
             $userid = $_POST['userId'];
             $city = $_POST['city'];
             $addy = $_POST['addy'];
        echo "<br>";
        try {
        $query = "INSERT INTO user_table (userId, firstName, lastName, username, 
                    password, city, addy) VALUES (NULL, '$firstname', '$lastname', '$name', '$password', '$city', '$addy')";
        $connect->exec($query);
        echo "User is added!";
        echo "<br>" . $city; 
        }
        catch(PDOException $e)
            {
            echo $query . "<br>" . $e->getMessage();
            }
        
        $connect = null;        
                
            }
    function findUsers(){
    $connect = getDBConnection();    
    if(isset($_POST['find'])){
        $sql = "SELECT * FROM user_table";
        $result = $connect->query($sql);
        
            foreach ($result as $row) {
             $name = $row['username']; 
             $password = $row['password'];
             $lastname = $row['lastName']; 
             $firstname = $row['firstName'];              
             $userid = $row['userId'];
             $city = $row['city'];
             $address = $row['addy'];
                echo "<br>" . "<br>" . "<br>" . "<br>";
                echo "<h4>Username: </h4>" . $name . "<br>" . "<h4>Password: </h4>" . $password . "<br>" . "<h4>UserID: </h4>" . $userid . "<br>" .
                    "<h4>Name: </h4>" . $firstname . " " . $lastname . "<br>" . "<h4>City: </h4>" . $city . "<br>" . "<h4>Wallet-ID: </h4>" . $address . "<br>" .
                    "<a class='btn btn-warning' onclick='return confirmEdit()' href = 'editProduct.php? userId=".$row['userId']."'> Edit User</a> <br />";
                echo "<br>" . "<br>";    
                echo"<a class='btn btn-danger' onclick='return confirmDelete()' href = 'deleteProduct.php? userId=".$row['userId']."'> Delete User</a> <br />";        
            }
        }
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
    <script>
            $(document).ready(function(){        
            $("#zipCode").change(function(){
                
               // alert( $("#zipCode").val() )});
                $.ajax({

                type: "GET",
                url: "http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php",
                dataType: "json",
                data: { "zip": $("#zipCode").val() },
                success: function(data,status) {
                //alert(data);
                $("#city").html(data.city);
                
                if(!data){
                    $("#zip_alert").html("Zipcode invalid");
                }
                },
                complete: function(data,status) { //optional, used for debugging purposes
                //alert(status);
                }
                });
            });   
            });
           function confirmDelete()
            {
                return confirm("Are you sure?");
            }
           function confirmEdit()
            {
                return confirm("Are you sure?");
            }             
    </script>
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
                <h1>Register New Admin</h1>
                <h4>To make AJAX call work, replace HTTPS with HTTP</h4>
                <div class="col-sm-6">
                    <form action="" method="post" align="center">
                        <div class="form-group">
                            <label for="pass">Firstname: </label>
                            <input type="text" class="form-control" name="fname"/>
                        </div>  
                        <div class="form-group">
                            <label for="pass">Lastname: </label>
                            <input type="text" class="form-control" name="lname"/>
                        </div>                        
                        <div class="form-group">
                            <label for="fnavn">Username: </label>
                            <input type="text" class="form-control" name="unavn"/>
                        </div>
                        <div class="form-group">
                            <label for="pass">Password: </label>
                            <input type="text" class="form-control" name="pass"/>
                        </div>
                        <div class="form-group">
                            <label for="zipCode">Zipcode: </label>
                            <input id="zipCode" type="text"><br>                            
                            <span id="city"></span>
                        </div>
                        <div class="form-group">
                            <label for="addy">Wallet-Address: </label>
                            <input type="text" class="form-control" name="addy"/>
                        </div>                        
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
                        <input type="submit" class="btn btn-primary" name="find" value="Find Users"/>
                    </form>
                </div>
            </div>
            <div>
                <?php findUsers() ?>
            </div>
        </div>
    </body>
</html>