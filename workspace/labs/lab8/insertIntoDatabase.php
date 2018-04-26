<?php
include '../dbConnection.php';
$conn = connectToDB("lab8");
$username = $_POST['username'];
$password = $_POST['password'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$zipCode = $_POST['zipCode'];
// fix quotes for db
$sql = "INSERT INTO `lab8_user` (`userId`, `firstName`, `lastName`, `email`, `username`, `password`, `zipCode`)" .
    " VALUES (NULL, :firstName, :lastName, :email, :username, :password, :zipCode);";
$stmt = $conn->prepare($sql);
$stmt->execute(array(":firstName" => $firstName, ":lastName" => $lastName, ":email" => $email,
    ":username" => $username, ":password" => $password, ":zipCode" => $zipCode));
?>