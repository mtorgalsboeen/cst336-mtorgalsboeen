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
    if(isset($_POST["submit"])){
        $fnavn = $_POST["fnavn"];
        $enavn = sha1($_POST["pass"]);
        echo "<br>";
        try {
        $query = "INSERT INTO users(userId, username, password) ";
        $query .= "VALUES (NULL, '$fnavn','$enavn')";
        $connect->exec($query);
        echo "User is added!";
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
        $sql = "SELECT * FROM users";
        $result = $connect->query($sql);
        //$records = executeWithParameter($sql,$namedParameters);
            foreach ($result as $row) {
             $name = $row['username']; 
             $password = $row['password']; 
             $userid = $row['userId'];
                echo "<br>" . "<br>" . "<br>" . "<br>";
                echo "<br>" . "<br>" . "<br>" . "<br>";
                echo "<br>" . "<br>" . "<br>" . "<br>";
                echo "<br>" . "<br>" . "<br>" . "<br>";
                echo "Username: " . $name . "<br>" . "Password: " . $password . "<br>" . "UserID: " . $userid . "<br>" .
                    "<button class='btn btn-danger' name='deleteUser'>Delete User</button>" . "<button class='btn btn-primary' id='editUser'>Edit User</button>";            
            }
    }
    if(isset($_POST['deleteUser'])){
        echo $userid;
       /* try{
        $sqlQuery = "DELETE FROM `users` WHERE `users`.`userId` = $userid";
        $connect->exec($sqlQuery);
        echo "User is deleted!";
        }
        catch(PDOException $f)
            {
            echo $sqlQuery . "<br>" . $f->getMessage();
            }
        
        $connect = null;  */        
    }
    }
// http://www.torgalsboen.no/bilder/motherboard.jpg
// https://www.google.com/search?rlz=1C1CHBF_enUS796US796&ei=wY3zWsWoJdDcjwOx_47YBA&q=generate+sql+delete+button+with+each+echo+php+&oq=generate+sql+delete+button+with+each+echo+php+&gs_l=psy-ab.3...4188.12940.0.13116.20.20.0.0.0.0.78.1251.20.20.0....0...1c.1.64.psy-ab..0.9.566...33i160k1j33i21k1.0.sFCBQexeTw0
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
        <div class="col-xs-1" align="center">
        <div class="container">
            <h1>Register New Admin</h1>
            <div class="col-sm-6">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="fnavn">Username: </label>
                        <input type="text" class="form-control" name="fnavn"/>
                    </div>
                    <div class="form-group">
                        <label for="pass">Password: </label>
                        <input type="text" class="form-control" name="pass"/>
                    </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
                        <input type="submit" class="btn btn-primary" name="find" value="Find Users"/>
                </form>
            </div>
        </div>
        </div>
        <div>
            <?php findUsers() ?>
        </div>
    </body>
</html>