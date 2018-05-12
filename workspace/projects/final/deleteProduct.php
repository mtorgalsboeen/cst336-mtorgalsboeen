<?php
    
    include 'connect.php';
    $conn = getDBConnection();
    
    $sql = "DELETE FROM user_table
            WHERE userId = " .$_GET['userId'];
            
            $stmt = $conn -> prepare($sql);
            $stmt->execute();
            
            header("Location: index.php");
?>