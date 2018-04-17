<?php
    session_start();
    
        $name = $_SESSION['name'];
        $lastname = $_SESSION['lastname'];
        $number = $_SESSION['phonenumber'];
        $age = $_SESSION['age'];
        $newsletter = $_SESSION['choice'];
        $choice = $_SESSION['option'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Homework 3 - CST336</title>
    </head>
    <body>
        <div align="center">
        <section>
            <p>Thanks for register <?php echo $name . " " . $lastname?></p><br>
            <p>Your phonenumber is: <?php echo $number ?></p><br>
            <p>The age you entered is: <?php echo $age ?></p><br>
            <p>
            <?php 
              if($newsletter == 2){
                echo "You subscribed to newsletter";
              } else {
                echo "You will not recieve any news";
              }  
            ?>
            </p><br>
            <p>The option: <?php echo $choice?></p>
        </section>
        </div>
                <div class="form-group" align="center">
        <form method="post">
            <label for="name">Enter givenname: </label>
            <input type="text" name="name" value="<?php echo $name ?>"/>
            <br>
            <label for="lastname">Enter familyname:</label>
            <input type="text" name="lastname" value="<?php echo $lastname ?>"/>
            <br>
            <label for="phonenumber">Enter Phone-Number: </label>
            <input type="number" name="phonenumber" value="<?php echo $number ?>"/>
            <br>
            <label for="age">How old are you?</label>
            <input type="number" name="age" value="<?php echo $age ?>"/>
            <p>Do you want to recieve newsletter?</p>
            <label for="no">No</label>
            <input type="radio" id="no" name="choice" value="1"/>
            <label for="yes">Yes</label>
            <input type="radio" id="yes" name="choice" value="2"/>
            <br>
            <label for="option">Where are you from?</label>
            <select name="option">
                <option value="<?php echo $choice ?>>Pick an option</option>
                <option value="Norway">Norway</option>
                <option value="USA">USA</option>
                <option value="Sweden">Sweden</option>
                <option value="Mexico">Mexico</option>
                <option value="Canada">Canada</option>
            </select>
            <br>
            <br>
            <section>
                <button class="button" style="vertical-align:middle" name="submit"><span>Submit </span></button>
                <button class="button" style="vertical-align:middle" name="deletz"><span>Delete </span></button>
            </section>
        </form>
        </div>
        <div>
            <a href="index.php">Go Back</a>
        </div>
    </body>
</html>