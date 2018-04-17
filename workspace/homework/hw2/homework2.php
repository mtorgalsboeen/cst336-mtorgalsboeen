<!DOCTYPE html>
<?php
    include 'inc/functions.php';
?>
<html>
    <head>
    	<meta charset="UTF-8">
        <link rel="stylesheet" href="../../stylesheets/main.css">
        <link rel="stylesheet" href="../../web-fonts-with-css/css/fontawesome-all.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>CST-336 | Homework 1</title>
    </head>
    <body>
        <div class="centered">
        	<h1>Homework 1</h1>
        	<h2>Mathias Torgalsboeen</h2>
        </div>
        <br>
        <br>
        <br>
        <div class="col-xs-1" align="center">
        <?php
            echo "This is the while-loop: ";
            $value1 = rand(10,50);
            while($value1 <= 40){
                echo $value1 . ", ";
                $value1++;
            }
            echo "<br>";
            echo "This is the for-loop: ";
            for($i = 0; $i <= 20; $i++){
                echo $i . ", ";
            }
            echo "<br>";
            echo "This is a random letter picker from an array: ";
            function randomLetterPicker(){
                $randomLetters = array("Hello", "Hurrah", "CSUMB", "CSUMB", "CST336");
                $randomness = rand(0,3);
                echo $randomLetters[array_rand($randomLetters)];
                echo "<br>";
                echo "This prints out the array backwards: ";
                print_r(array_reverse($randomLetters));
                echo "<br>";
                echo "This counts all the values of the array: ";
                print_r(array_count_values($randomLetters));
            }
            randomLetterPicker();
            echo "<br>";
            echo "This is a if-statement: ";
            if(3 < 4){
                echo "4 is greater than 3.";
            }else{
                echo "3 is greater than 4.";
            }
            echo "<br>";
            if(isset($_POST["submit"])){
                $enern = $_POST["number1"];
                $toern = $_POST["number2"];
                
                if($enern < $toern){
                    echo $toern . " is the biggest number!" . "<img src='img/paper.png' height=50; width=50; />";
                }else{
                    echo $enern . " is the biggest number!" . "<img src='img/rock.png' height=50; width=50; />";
                }
            
            } 
            
        ?>
        </div>
        <div class="col-sm-6">
        <form action="" method="post">
        <div class="form-group">
                        <label for="Number">Enter a number: </label>
                        <input type="number" class="form-control" name="number1"/>
        </div>
        <div class="form-group">
                        <label for="Number">Enter another number: </label>
                        <input type="number" class="form-control" name="number2"/>
        </div>
        <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
        </form>
		<div class="footer">
  			<p>Copyright @ Mathias Torgalsbøen - CST 336 2018</p> <!-- Copyright @ Mathias Torgalsboeen - CST336 2018 --> 
		</div>
		</div>
    </body>
</html>