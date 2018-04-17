<?php
    
    if(isset($_POST['submit'])){
        session_start();
        $_SESSION['name'] = htmlentities($_POST['name']);
        $_SESSION['lastname'] = htmlentities($_POST['lastname']);
        $_SESSION['phonenumber'] = htmlentities($_POST['phonenumber']);
        $_SESSION['age'] = htmlentities($_POST['age']);
        $_SESSION['choice'] = htmlentities($_POST['choice']);
        $_SESSION['option'] = htmlentities($_POST['option']);
        
        $name = $_SESSION['name'];
        $lastname = $_SESSION['lastname'];
        $number = $_SESSION['phonenumber'];
        $age = $_SESSION['age'];
        $newsletter = $_SESSION['choice'];
        $choice = $_SESSION['option'];
        
        header('Location: page2.php');
        
    }
    if(isset($_POST['deletz'])){
        session_destroy();
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="stylesheets/main.css" type="text/css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
                    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Homework 3 - CST336</title>
    </head>
    <body>
        <div class="form-group" align="center">
        <form method="post">
            <label for="name">Enter givenname: </label>
            <input type="text" name="name"/>
            <br>
            <label for="lastname">Enter familyname:</label>
            <input type="text" name="lastname"/>
            <br>
            <label for="phonenumber">Enter Phone-Number: </label>
            <input type="number" name="phonenumber"/>
            <br>
            <label for="age">How old are you?</label>
            <input type="number" name="age"/>
            <p>Do you want to recieve newsletter?</p>
            <label for="no">No</label>
            <input type="radio" id="no" name="choice" value="1"/>
            <label for="yes">Yes</label>
            <input type="radio" id="yes" name="choice" value="2"/>
            <br>
            <label for="option">Where are you from?</label>
            <select name="option">
                <option>Pick an option</option>
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
    </body>
</html>