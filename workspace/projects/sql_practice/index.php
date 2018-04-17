<?php include "db.php";
    if(isset($_POST["submit"])){
        $username = $_POST["username"];
       
      //  $sql = "SELECT * FROM students WHERE first_name = '$username'";
        $sql = "SELECT `departments`.advisor FROM `students` INNER JOIN `departments` ON `students`.department_id = 
        `departments`.`department_id` WHERE `students`.first_name LIKE '$username'";

        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            //    echo "<br> Name: " . $row["first_name"] . " " . $row["last_name"] . "<br>" . "Department: " . $row["department_id"] . "<br>" . "Student ID: " . 
            //    $row["student_id"] . "<br>" . "Email: " . $row["email"];
                echo "<br> Advisor: " . $row["advisor"];
                echo "<br>";
            }
        } else {
            echo "0 results";
        }
    }
    if(isset($_POST["submit_advisor"])){
        $advisor = $_POST["advisor"];
       
        $sql = "";

        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<br> Student: " . $row["first_name"];
                echo "<br>";
            }
        } else {
            echo "0 results";
        }
    }    
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
                    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>LoginSystem PHP</title>
    </head>
    <body>
        <div class="col-xs-1" align="center">
        <div class="container">
            <div class="col-sm-6">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Search for user ID: </label>
                        <input type="text" class="form-control" name="username"/>
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
                </form>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Search advisor: </label>
                        <input type="text" class="form-control" name="advisor"/>
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit_advisor" value="Submit"/>
                </form>                
            </div>
        </div>
        </div>
    </body>
</html>