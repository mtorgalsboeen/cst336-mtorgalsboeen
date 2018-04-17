<?php
    session_start();
    
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP - Sessions</title>
    </head>
    <body>
        
        <h2>Thanks for registrering at our website <?php echo $name ?> <br> We have successfully registered you with the email: <?php echo $email ?></h2>
    </body>
</html>