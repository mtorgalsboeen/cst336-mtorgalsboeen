<!DOCTYPE html>
<html>
<head>
    <title>Zodiac Tasks</title>
</head>
<body>
    <?php
    for($i = 1500; $i < 2000; $i++){
        echo "<li>";
        echo $i;
        echo "<br>";
        echo "</li>";
        
        if($i == 1776){
            echo "<b>INDEPENDENCE DAY</b>";
        }
        if($i%100 == 00){
            echo "<b>Happy century</b>";
        }
    }
    ?>
</body>
</html>