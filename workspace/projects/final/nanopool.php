<?php
    // https://cst336-mtorgalsboeen.herokuapp.com/
    include 'connect.php';
    session_start();
    $connect = getDBConnection();
   //Checks if user is logged in, otherwise redirect to login-page
    if(isset($_SESSION['username'])){
        echo "Logged in as" . " " . $_SESSION['username'];
    } else{
        header("Location: login.php");
    }    
    function getData(){
        
        if(isset($_POST["submit"])){
            $addy = $_POST["address"];
            
            $nanopool_url = 'https://api.nanopool.org/v1/etc/payments/' . $addy;
            $nanopool_workers = 'https://api.nanopool.org/v1/etc/workers/' . $addy;
            
            //Making JSON of payments
            $nanopool_json = file_get_contents($nanopool_url);
            $nanopool_json_array = json_decode($nanopool_json, true);
            
            $lengdeETC = count($nanopool_json_array['data']);
            echo "<div>" . "<h2>Payments</h2>";
            echo "<br>";
            $sum = 0;
            for($i=0;$i<$lengdeETC;$i++){
                $amount = $nanopool_json_array['data'][$i]['amount'];
                echo "<div>" . $amount . "<br>" . "</div>";
                $sum += $amount;
            }
            echo "</div>";
            echo "Total paid: {$sum}" . " " . "ETH";
       }
    }
       function getWorkers(){
        if(isset($_POST["submit"])){
            $addy = $_POST["address"];
            
            $nanopool_workers = 'https://api.nanopool.org/v1/etc/workers/' . $addy;           
            //Making JSON of workers
            $nanopool_workers_json = file_get_contents($nanopool_workers);
            $nanopool_workers_array = json_decode($nanopool_workers_json, true);
            

            $lengdeWorkers = count($nanopool_workers_array['data']);
            echo "<div>" . "<h2>Workers</h2>";
            echo "<br>";
            for($k=0;$k<$lengdeWorkers;$k++){
                //$theWorkers = "Worker: " . $nanopool_workers_array['data'][$k]['id'] . "<br>" . "Current Hashrate: " . $nanopool_workers_array['data'][$k]['hashrate'] . "<br>";
                $theWorkers = "Worker: " . "GoldDigger" . "<br>" . "Current Hashrate: " . $nanopool_workers_array['data'][$k]['hashrate'] . "<br>";
                echo $theWorkers;
            } 
            echo "</div>";
       }
       }
       function getValues(){
           if(isset($_POST["submit"])){
               
            $coinmarket_values = 'http://coincap.io/front'; 
            //Making JSON of currency
            $coinmarket_values_json = file_get_contents($coinmarket_values);
            $coinmarket_values_array = json_decode($coinmarket_values_json, true); 
            
            
            $lengdeValuta = count($coinmarket_values_array);
            echo "<h2>Currencies</h2>";
            for($j=0;$j<10;$j++){
                $theValuta = $coinmarket_values_array[$j]['long'] . "<br>" . "Price: " . $coinmarket_values_array[$j]['price'] . "<br>"
                    . "Change last 24 hours: " . $coinmarket_values_array[$j]['perc'] . "%" . "<br>" . "<br>";
                echo $theValuta;
            }
         }
       }
     //   0xe0946bc010a5a842eeeae255214c2ec673e500b7
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
            <div id="data">
                    <?php getData() ?>
            </div>
            <div id="workers">
                <?php getWorkers() ?>
            </div>
            <div id="valuta">
                <?php getValues() ?>
            </div>            
        </div>
    </body>
</html>