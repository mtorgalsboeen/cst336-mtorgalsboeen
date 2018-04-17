<?php
    session_start();
    if(isset($_COOKIE['name'])){
        echo "Username you entered is: " . $_COOKIE['name'];
    } else{
        echo "Username not set";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP - Cookies</title>
    </head>
    <body>
        
    </body>
</html>