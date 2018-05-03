<?php

function getDBConnection() {
    
    //C9 db info
    $host = "localhost";
    $dbName = "csumb_quiz";
    $username = "mtorgalsboeen";
    $password = "cst336";
    
    //mysql://b5583204ad69fb:41a8adbb@us-cdbr-iron-east-05.cleardb.net/heroku_9be7bc2b5b932f8?reconnect=true
    //when connecting from Heroku
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = $url["us-cdbr-iron-east-05.cleardb.net"];
        $dbName = substr($url["heroku_9be7bc2b5b932f8"], 1);
        $username = $url["b5583204ad69fb"];
        $password = $url["41a8adbb"];
    } 
    
    try {
        //Creates a database connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
    
        // Setting Errorhandling to Exception
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }
    catch (PDOException $e) {
       echo "Problems connecting to database!";
       exit();
    }
    
    
    return $dbConn;
}

?>