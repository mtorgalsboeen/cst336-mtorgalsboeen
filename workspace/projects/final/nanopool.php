<?php
    session_start();
   
    if(isset($_SESSION['username'])){
        echo "Logged in as" . " " . $_SESSION['username'];
    } else{
        header("Location: login.php");
    }    
    
    if(isset($_POST["submit"])){
        $addy = $_POST["address"];
        
        $nanopool_url = 'https://api.nanopool.org/v1/etc/payments/' . $addy;
        
        $nanopool_json = file_get_contents($nanopool_url);
        $nanopool_json_array = json_decode($nanopool_json, true);
        
        
        $lengdeETC = count($nanopool_json_array['data']);
        //echo $lengde;
        echo "<div class='sumetc'>" . "<h1>Payments - Ethereum Classic</h1>";
        
        for($i=0;$i<$lengdeETC;$i++){
            $amount = $nanopool_json_array['data'][$i]['amount'];
            //echo "<div class='content'>" . $amount . "<br>" . "</div>";
        }
     //   echo "<br>";
     //   echo "Total amount ETC: <br>"; 
     //   echo "<h3>$lengdeETC</h2>";
        //header("Location: personal.php");

     //   $text = "Hello world!";
        echo '<script type="text/javascript">window.onload = function() { document.getElementById("content").innerHTML = "' . $lengdeETC . '"; }</script>';
        
        
        //0xe0946bc010a5a842eeeae255214c2ec673e500b7
    }    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Check your payments</title>
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
        <div class="container">
            <div class="col-sm-6">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="address">Search for user ID: </label>
                        <input type="text" class="form-control" name="address"/>
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
                </form>
            </div>
            <div id="content">
                
            </div>
        </div>
    </body>
</html>