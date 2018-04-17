<?php
    
    if(isset($_POST["submit"])){
        $row = $_POST["rowsz"];
        $kolonz = $_POST["columz"];
        
        echo $row . $kolonz;
    }
    //Functionality for generating a 3x3 random set of balls with no duplicates
    // Taking from the lab where we had the cards
        function play(){
        $player = []; // Array of users
        $player1 = array(
            'name' => 'Mathias',
            'hand' => array(),
            'points' => 0
        );
            
        $allPlayers = array(
            $player1,
        );
            
            
        printGameState($allPlayers);
    }
    
    function getHand(& $usedCards){
        //$p1 = 0;
        
        while($p1 < 37)// Checks if the score is less than 37 to keep giving more cards  
        {
            $randomValue = rand(0,12);
            
            // Loop to check if a card has been used
            while(checkUsedCards($randomValue, $usedCards)){
                $randomValue = rand(0,14);
            }
            $p1+= $randomValue + 1;
            displaySymbol($randomValue);
        }
        echo $p1;
        
    }
    
    function printGameState($allPlayers){
        $usedCards = []; //Array of the cards that is used
        fillUsedCards($usedCards); // fills the array with false
        
        $i=0;
        echo "<div id='border'>";
        shuffle($allPlayers);
        foreach ($allPlayers as $player) {
            echo "<img id ='reel$i' src='" . $player['imgURL'] . "' />";
            getHand($usedCards);
            echo "<br/>";
            
            echo $player['name'] . "<br>";
            $i++;
        }
        echo "<div/>";
    }
    
    function displaySymbol($randomValue) {
        switch ($randomValue){
            case 0: $symbol = "1";
                    break;
            case 1: $symbol = "2";
                    break;
            case 2: $symbol = "3";
                    break;
            case 3: $symbol = "4"; 
                    break;
            case 4: $symbol = "5";
                    break;
            case 5: $symbol = "6";
                    break;
            case 6: $symbol = "7";
                    break;
            case 7: $symbol = "8";
                    break;
            case 8: $symbol = "9"; 
                    break;
            case 9: $symbol = "10";
                    break;
            case 10: $symbol = "11";
                    break;
            case 11: $symbol = "12";
                    break;
            case 12: $symbol = "13";
                    break;
        }
        echo "<img id='reel$pos' src='billiards/$symbol.png' alt='$symbol' title='". ucfirst($symbol) . "' width='70' >";
    }
    function checkUsedCards($symbol, &$usedCards){
        $pickedCard = $symbol;
        if(!$usedCards[$pickedCard]){
            $usedCards[$pickedCard] = true;
            return false;
        }
        return true;
    }
    function fillUsedCards(& $usedCards){
        for($i=0; $i<52; $i++){
            switch($i % 15){
                case 0: $symbol = "1";
                        break;
                case 1: $symbol = "2";
                        break;
                case 2: $symbol = "3";
                        break;
                case 3: $symbol = "4"; 
                        break;
                case 4: $symbol = "5";
                        break;
                case 5: $symbol = "6";
                        break;
                case 6: $symbol = "7";
                        break;
                case 7: $symbol = "8";
                        break;
                case 8: $symbol = "9"; 
                        break;
                case 9: $symbol = "10";
                        break;
                case 10: $symbol = "11";
                        break;
                case 11: $symbol = "12";
                        break;
                case 12: $symbol = "13";
                        break;
                case 13: $symbol = "14";
                        break;
                case 14: $symbol = "15";
                        break;        
            }
            $key = $symbol;
            $usedCards[$key] = false;
        }
    }
    //Statement that determines if the number of the ball is Even or Odd number. And then gives background color
    
    //Sum of the balls (points?)
    
    $number = $inputNumber;
    if ($number % 2 == 0) {
        print "It's even";
    }else{
        print "It's odd";
    }
?>
<html>
    <head>
        <title>Practice Exam</title>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
                    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Graduate" rel="stylesheet">

        <link href = "css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div>
            <form action="" method="post">
                <div class="form-group">
                    <label for="rowsz">Number of Rows: </label>
                    <input type="number" min = 1 max = 4 class="form-control" name="rowsz"/>
                </div>
                <div class="form-group">
                    <label for="columz">Number of Colums: </label>
                    <input type="number" min = 1 max = 4 class="form-control" name="columz"/>
                </div>
                <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
            </form>        
        </div>
        <?php
            play();
        ?> 
    </body>
</html>