<?php
function getDatabaseConnection() {
    $host = "localhost";
    $username = "mtorgalsboeen";
    $password = "cst336";
    $dbname = "lab_cst336"; 
    
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn; 
}

$db = getDatabaseConnection();

function insertItemIntoDB(){
    
}
?>