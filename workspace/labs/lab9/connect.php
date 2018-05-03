<?php

function getDBConnection() {
    
    //C9 db info
  /* $host = "localhost";
    $dbName = "csumb_quiz";
    $username = "mtorgalsboeen";
    $password = "cst336"; */
    
   //Heroku db info 
    $host = "us-cdbr-iron-east-05.cleardb.net";
    $dbName = "heroku_9be7bc2b5b932f8";
    $username = "b5583204ad69fb";
    $password = "41a8adbb";    
    
    //mysql://b5583204ad69fb:41a8adbb@us-cdbr-iron-east-05.cleardb.net/heroku_9be7bc2b5b932f8?reconnect=true
    //when connecting from Heroku
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = $url["host"];
        $dbName = substr($url["path"], 1);
        $username = $url["user"];
        $password = $url["pass"];
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