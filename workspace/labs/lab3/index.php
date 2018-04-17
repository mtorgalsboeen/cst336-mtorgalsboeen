<?php
include 'inc/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SilverJack</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
                    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Graduate" rel="stylesheet">

        <link href = "css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <header>
            <strong>
                <h1>Silverjack</h1>
            </strong>
    </header>
    <body>
        <?php
            
            play();
            
        ?>
            
        <form>
                <button class="btn btn-primary" onclick="window.location.href='index.php'">Play Again</button>
        </form>

        <div class="footer">
  			<p>Copyright @ Team 10 - CST 336 2018</p> <!-- Copyright @ Team 10 - CST336 2018 --> 
		</div>
    </body>
</html>