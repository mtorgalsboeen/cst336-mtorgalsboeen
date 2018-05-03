<?php

function connectToDB($dbName) {
    //C9
    /*$host = 'localhost';
    $db   =  $dbName;
    $user = 'mtorgalsboeen';
    $pass = 'cst336';
    $charset = 'utf8mb4';
*/
    //Heroku
    
    //mysql://b5583204ad69fb:41a8adbb@us-cdbr-iron-east-05.cleardb.net/heroku_9be7bc2b5b932f8?reconnect=true
    $host = 'us-cdbr-iron-east-05.cleardb.net';
    $db   =  'heroku_9be7bc2b5b932f8';
    $user = 'b5583204ad69fb';
    $pass = '41a8adbb';
    $charset = 'utf8mb4';    
    
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $opt);
    return $pdo; 
}



?>