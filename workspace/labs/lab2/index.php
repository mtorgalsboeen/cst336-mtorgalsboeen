<!DOCTYPE html>
<?php
    include 'inc/functions.php';
?>
<html>
    <head>
        <link rel="stylesheet" href="css/styles.css">
        <title> 777 Slot Machine </title>
    </head>
    <body>
        <div id='main'>
            <?php
                play();
            ?>
            <form>
                <input type="submit" value="Spin!" />
            </form>
        </div>
    </body>
</html>