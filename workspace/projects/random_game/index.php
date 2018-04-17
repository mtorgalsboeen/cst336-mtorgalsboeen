<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <?php
        function play(){
            for($i=0; $i<2; $i++){
                ${randomValue . $i } = rand(0,4);
                ${folder . $i } = rand(0,3);
                displaySymbol(${randomValue . $i }, ${folder . $i });
            }
            points($randomValue0, $randomValue1);
            }

        function displaySymbol($randomValue, $folder) {
            switch ($folder) {
                case 0: $folder = "clubs";
                        break;
                case 1: $folder = "diamonds";
                        break;
                case 2: $folder = "hearts";
                        break;
                case 3: $folder = "spades";
                        break;
            }
            switch ($randomValue){
                case 0: $symbol = "ten";
                        break;
                case 1: $symbol = "jack";
                        break;
                case 2: $symbol = "queen";
                        break;
                case 3: $symbol = "king"; 
                        break;
                case 4: $symbol = "ace";
                        break;
            }
            echo "<img id='reel$pos' src='cards/$folder/$symbol.png' alt='$symbol' title='". ucfirst($symbol) . "' width='70' >";
            }
            function points($num1, $num2){
                $value = -1;
                
                if($num1 > $num2){
                    $value = $num1;
                } else if($num2 > $num1){
                    $value = $num2;
                }
                switch ($value){
                case 0: $symbol = "ten winns";
                        break;
                case 1: $symbol = "jack winns";
                        break;
                case 2: $symbol = "queen winns";
                        break;
                case 3: $symbol = "king winns"; 
                        break;
                case 4: $symbol = "ace winns";
                        break;
                case -1: $symbol = "Its a tie";
                        break;
            }
            echo $symbol;
            }
            
        play();
        ?>
    </body>
</html>