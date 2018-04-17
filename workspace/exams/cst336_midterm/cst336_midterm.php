<?php
    $allCharacters = range("A","Z");
    
    
   // print_r($charArray);
    
    // A function that will give me all the letters in a dropdown in the form.
    function letterOptions(){
        global $allCharacters;
        
        foreach($allCharacters as $letter)
        {
            echo "<option value='$letter'>$letter</option>";
        }
    }
    
    // A function that will make an array of the letters we want to print.
    function outprintingLetter($size, $letterToFind, $letterToExclude)
    {
    //Making an array over the letters we are going to print
    global $charArray;
    $letters = array();
    
     //This will count how many letters we will need in our array.
    $amountLetters = $size*$size;
    
    //A forloop to print the letters we need and then push it to our array that we will print in the table.
    for($k = 0; $k < $amountLetters; $k++)
    {
        
    }
    }
    
    //Function that will display the table.
    function displayTable()
    {
        if(isset($_GET['submit'])){
            global $allCharacters;
            $size = $_GET['size'];
            $letterToFind = $_GET['letterToFind'];
            $letterToExclude = $_GET['letterToExclude'];
            
            //Removed the omit word from array
            $index = array_search($letterToExclude,$allCharacters);
            print_r($index);
            if($index !== FALSE){
                unset($allCharacters[$index]);
            }
            
            if($letterToFind == $letterToExclude){
                echo "<b>Error: Letter to Find MUST Be different from Letter to Omit!<b>";
            }
            global $amountLetters;
            global $allCharacters;
            echo "<br>";
            
            //Printing the table
            
            echo "<table>";
            echo "<tr>";
            foreach($allCharacters as $result){
                echo $result;
            }
            echo "<tr>";
            echo "</table>";
            
            echo "Letter to find: " . $letterToFind;
            echo "<br>";
            echo "Letter to Omit: " . $letterToExclude;
            echo "<br>";
            echo "Amount of letters: " . $size*$size;
            //echo $size*$size . " " . $letterToFind . " " . $letterToExclude;
            
        }
    }
?>
<html>
    <head>
        <title>Midterm - Mathias Torgalsboeen</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
                    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            body {
                position: absolute;
                background-color: transparent;
                text-align: center;
            }
            h1{
                font-family: sans-serif;
                font-size: medium;
                text-align: center;
            }
        </style>            
    </head>
    <body>
        <div class="col-xs-1" align="center">
        <h1>Find the Letter!</h1>
        <form method="GET">
            <label for="excludeLetters"><b></b>Select a Letter to Find:</b></label>
            <br>
            <select name="letterToFind">
    		    <?php letterOptions(); ?>
    		</select>            
            <br>
            <br>
            <label for="size">Select Table Size:</label>
    		<select name="size">
    			<option value="6">6x6</option>
    			<option value="7">7x7</option>
    			<option value="8">8x8</option>
    			<option value="9">9x9</option>
    			<option value="10">10x10</option>
    		</select>
    		<br>
    		<select name="letterToExclude">
    		    <?php letterOptions(); ?>
    		</select>
            <input type="submit" value="Create Table" name="submit"/>
        </form>
        <?php
        displayTable();
        ?>
        </div>
    </body>
</html>