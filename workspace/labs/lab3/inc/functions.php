<?php
    
    // Main function
    function play(){
        $player = []; // Array of users
        $player1 = array(
            'name' => 'Mathias',
            'imgURL' => './img/profiles_pictures/mathias.jpg',
            'hand' => array(),
            'points' => 0
        );
            
        $player2 = array(
            'name' => 'Josh',
            'imgURL' => './img/profiles_pictures/josh.jpg',
            'hand' => array(),
            'points' => 0
        );
        
        $player3 = array(
            'name' => 'Raju',
            'imgURL' => './img/profiles_pictures/rk.png',
            'hand' => array(),
            'points' => 0
        );
        
        $player4 = array(
            'name' => 'Mayra',
            'imgURL' => './img/profiles_pictures/mayra.JPG',
            'hand' => array(),
            'points' => 0
        );
            
        /*$player5 = array(
            'name' => 'Jazz',
            'imgURL' => './img/profiles_pictures/jazz.JPG',
            'hand' => array(),
            'points' => 0
        );*/
            
        $allPlayers = array(
            $player1,
            $player2,
            $player3,
            $player4,
        );
            
            
        printGameState($allPlayers);

    }
            
    function getHand(& $usedCards){
        $p1 = 0;
        while($p1 < 37)// Checks if the score is less than 37 to keep giving more cards
        {
            $randomValue = rand(0,12);
            $folder = rand(0,3);
            
            // Loop to check if a card has been used
            while(checkUsedCards($randomValue, $folder, $usedCards)){
                $randomValue = rand(0,12);
                $folder = rand(0,3);
            }
            $p1+= $randomValue + 1;
            displaySymbol($randomValue, $folder);
        }
        
        if($p1 > 42){
            echo "You got more than 42, you lost. Your result was: ";
        }
        if($p1 == 42){
            echo "You won! Your result is: ";
        }
        echo $p1;
        
    }
    
    function printGameState($allPlayers){
        $usedCards = []; //Array of the cards that is used
        fillUsedCards($usedCards); // fills the array with false
        
        $i=0;
        foreach ($allPlayers as $player) {
            echo "<img id ='reel$i' src='" . $player['imgURL'] . "' />";
            getHand($usedCards);
            echo "<br/>";
            
            echo $player['name'] . "<br>";
            $i++;
        }
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
        echo "<img id='reel$pos' src='img/cards/$folder/$symbol.png' alt='$symbol' title='". ucfirst($symbol) . "' width='70' >";
    }
    
    function checkUsedCards($symbol, $folder, &$usedCards){
        //$pick = rand(0, 52);
        $pickedCard = $symbol . $folder;
        if(!$usedCards[$pickedCard]){
            $usedCards[$pickedCard] = true;
            return false;
        }
        return true;
    }
    
    function fillUsedCards(& $usedCards){
        for($i=0; $i<52; $i++){
            switch($i % 4){
                case 0: $folder = "clubs";
                    break;
                
                case 1: $folder = "diamonds";
                    break;
                    
                case 2: $folder = "hearts";
                    break;
                    
                default: $folder = "spades";
                    break;
            }
            
            switch($i % 13){
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
            $key = $symbol . $folder;
            $usedCards[$key] = false;
        }
    }
?>