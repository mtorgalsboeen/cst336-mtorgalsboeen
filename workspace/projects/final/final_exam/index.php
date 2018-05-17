<?php
    include '../connect.php';
    $connect = getDBConnection();
    $randomCharacter = rand(1,7);
    function randomImage(){
    global $randomCharacter;
    global $connect;
    $sql = "SELECT * FROM superhero WHERE id='$randomCharacter'";
    $result = $connect->query($sql);
         
        foreach ($result as $row) {
         $name = $row['name']; 
         $firstName = $row['firstName']; 
         $lastName = $row['lastName'];
         $pob = $row['pob'];
         $image = $row['image'];
         $fulltnavn = $firstName . " " . $lastName;
            echo "<img id='reel$pos' src='img/superheroes/$image.png' alt='$symbol' title='". ucfirst($symbol) . "' width='100' >";
            echo "<br>";
            echo "<br>";
        }
    }
        function lista(){
        global $connect;
        $sql2 = "SELECT id, firstName, lastName FROM superhero ORDER BY firstName ASC";
        $result2 = $connect->query($sql2);
            echo "<option value='0'>Select correct character</option>";
            foreach ($result2 as $row2) {
             $id = $row2['id'];    
             $name2 = $row2['name']; 
             $firstName2 = $row2['firstName']; 
             $lastName2 = $row2['lastName'];
             $pob2 = $row2['pob'];
             $image2 = $row2['image'];
             echo "<br>";
             $fullName = $firstName2 . " " . $lastName2;
                echo "<option value='$id'>$fullName</option>";
            }
            echo "<br>";
        }
        if(isset($_POST["submit"])){
            global $randomCharacter;
            $selected_val = $_POST['selectedCar'];  // Storing Selected Value In Variable
            echo "Her er forste: " . $selected_val;
            echo "Her er random tall: " . $randomCharacter;
            if($selected_val === '0'){
                echo '<script type="text/javascript">alert("You need to enter a valid value!");</script>';
            }
            if($selected_val == $randomCharacter){
                //echo "You are correct";
                echo '<script type="text/javascript">alert("You are correct");</script>';
            } 
        }    
        

    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Final Exam CST336</title>
        <script>
             $("#waiting").html("<img src='img/loading.gif' alt='submitting data' />");
        </script>
    </head>
    <body>
        <div>
            <h1>What is the real name of the following superhero?</h1>
            <?php
                randomImage();
            ?>
            <form action="#" method="post">
                <select name="selectedCar">
                    <?php
                        lista();
                    ?>
                </select>
                <br>
                <input type="submit" name="submit" value="Check Answer"/>
            </form>
        </div>
        <div id="scores"></div>
    </body>
</html>