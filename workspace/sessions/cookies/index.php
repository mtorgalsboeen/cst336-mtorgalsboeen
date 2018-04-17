<?php
    
    if(isset($_GET)){
        session_start();
        $name = $_GET['name'];
        
        setcookie('name', $name, time()+3600);
        // Set the cookie to expire in 3600 seconds or 1 hour.
        
        header('Location: page2.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP - Cookies</title>
    </head>
    <body>
        <form method="GET">
            <input type="text" name="name"/>
            <input type="submit" name="submit" value="Submit"/>
        </form>
    </body>
</html>