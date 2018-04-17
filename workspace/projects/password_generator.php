<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
                    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="col-xs-1" align="center">
            <h1>Random Password Generator</h1>
        <?php
            if(isset($_GET['submit'])){
                $number = $_GET['number'];
                $length = (int)$_GET['length'];
                echo $length;
                
            echo "<br>";
            $allCharacters = "ABCDEFGHIJKLMNOPQRSTUVWXY";
            $charArray = str_split($allCharacters);
            if(isset($_GET['excludeLetters'])){
                    $letter = (int)$_GET['excludeLetters'];
                    array_splice($charArray, $letter, 1);
                }
                $charLength = count($charArray);
            shuffle($charArray);
            $oldPassword = array();
            for ($i = 1; $i <= $number; $i++) {
                 $password = array();
                 
                for ($j = 0; $j < $length; $j++)
                {
                    
                        array_push($password, $charArray[rand(0,$charLength)]);
                    
                }
                
                array_push($oldPassword, implode($password));
            }
         sort($oldPassword);
            echo "<table>";
            for ($i = 1; $i <= $number; $i++) {
                 echo "<tr> <td>";
                 echo $i;
                 echo "</td><td>";
                echo $oldPassword[$i - 1];
                echo "</td> </tr>";
            }
            echo "</table>";
            echo "<br>";
            }
        ?>
        <form method="GET">
            <label for="number">Number of passwords: </label>
            <input id="number" type="number" name="number"/>
            <br>
            <label for="radio1">6</label>
            <input id="radio1" type="radio" name="length" value="6"/>
            <label for="radio2">8</label>
            <input id="radio2" type="radio" name="length" value="8"/>
            <label for="radio3">10</label>
            <input id="radio3" type="radio" name="length" value="10"/>
            <br>
            <select name="excludeLetters">
                <option>Select a letter</option>
                <?php
                for ($i = 0; $i < 26; $i++)
                {
                    echo "<option value='$i'>".chr($i + 65)."</option>";
                }
                ?>
            </select>
            <br>
            <br>
            <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
        </form>
        </div>
    </body>
</html>