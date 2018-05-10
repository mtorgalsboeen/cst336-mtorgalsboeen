<?php
    session_start();
   
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
            echo "<div>" . "<h1>Payments - Ethereum</h1>";
            
            for($i=0;$i<$lengdeETC;$i++){
                $amount = $nanopool_json_array['data'][$i]['amount'];
                echo "<div>" . $amount . "<br>" . "</div>";
                //echo '<script type="text/javascript">window.onload = function() { document.getElementById("content").innerHTML = "' . $amount . "<br>" . '"; }</script>';
            }
            echo "</div>";
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
            
            for($k=0;$k<$lengdeWorkers;$k++){
                $theWorkers = "Worker: " . $nanopool_workers_array['data'][$k]['id'] . "<br>" . "Current Hashrate: " . $nanopool_workers_array['data'][$k]['hashrate'] . "<br>";
                echo $theWorkers;
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
        <script>
            //turn entire div into toggle
            function toggle_visibility(id) {
            
              var e = document.getElementById(id);
              if (e.style.display == 'block' || e.style.display == '')
                e.style.display = 'none';
              else
                e.style.display = 'block';
            }
            
            var btcPrice;
            function UpdateBtcPrice(){
                $.ajax({
                    type: "GET",
                    url: "https://api.coinmarketcap.com/v1/ticker/bitcoin/",
                    dataType: "json",
                    success: function(result){
                        btcPrice = result[0].price_usd;
                    },
                error: function(err){
                    console.log(err);
                }
                });
            } 
            UpdateBtcPrice();
        </script>
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
            <button onclick="toggle_visibility('tog')">Show Payments</button>
            <div id="data">
                    <?php getData() ?>
            </div>
            <div id="workers">
                <?php getWorkers() ?>
            </div>
            <div id="halla" align="center">
            </div>
        </div>
    </body>
</html>