<?php
function nanopoool(){
$nanopool_url = 'https://api.nanopool.org/v1/etc/payments/0xe0946bc010a5a842eeeae255214c2ec673e500b7';

$nanopool_json = file_get_contents($nanopool_url);
$nanopool_json_array = json_decode($nanopool_json, true);

$lengdeETC = count($nanopool_json_array['data']);
echo $lengde;
echo "<div class='sumetc'>" . "<h1>Payments - Ethereum Classic</h1>";

for($i=0;$i<$lengdeETC;$i++){
    $amount = $nanopool_json_array['data'][$i]['amount'];
    echo "<div class='sumetc'>" . $amount . "<br>" . "</div>";
}

$eth_nanopool_url = 'https://api.nanopool.org/v1/eth/payments/0xa4c35c55f6ca2a15b8d5e87f34a74f7fbe768ea1';

$eth_nanopool_json = file_get_contents($eth_nanopool_url);
$eth_nanopool_json_array = json_decode($eth_nanopool_json, true);

$lengdeETH = count($eth_nanopool_json_array['data']);

echo "<div class='sumeth'>" . "<h1>Payments - Ethereum</h1>";
for($k=0;$k<$lengdeETH;$k++){
    $amounteth = $eth_nanopool_json_array['data'][$k]['amount'];
    echo "<div class='sumeth'>" . $amounteth . "<br>" . "</div>";
}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Nanopool - Miners</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                      <a class="navbar-brand" href="#">CST336 - Final</a>
                </div>
                <ul class="nav navbar-nav">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="mysql/login.php">Login</a></li>
                  <li><a href="mysql/login_read.php">Login Read</a></li>
                  <li><a href="mysql/login_register.php">Login Registration</a></li>
                  <li><a href="mysql/login_update.php">Login Update</a></li>
                  <li class="active"><a href="nanopool.php">Mining-Rig</a></li>
                  <li><a href="coinmarketcap.php">Coins</a></li>
                </ul>
          </div>
        </nav>
        <?php
            nanopoool();
        ?>    
    </body>
</html>