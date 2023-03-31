<?php
include "connect.php";
$name = $_POST["name"];
$surname = $_POST["surname"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$password1 = $_POST["password1"];
$t["text"] = "";

$hashed_password = md5($password);

mysqli_query($connect, "SET FOREIGN_KEY_CHECKS=0");

if ($password != $password1) {
    $t["text"] = $t["text"] . "The passwords entered are different\n";
}

$check_email = mysqli_query($connect, "SELECT Email FROM user where Email = '$email' "); //cerca se ci sono email uguali a quelle già messe

if (mysqli_num_rows($check_email) > 0) { // se esiste già un'email uguale
    $t["text"] = $t["text"] . "The email entered already exists\n";
} 
else {
     //altrimenti inserisco i dati nel database
    $query = "INSERT INTO `user` (`Email`, `Password`, `Username`, `Name`, `Surname`,`Role`) VALUES ('$email', '$hashed_password', '$username','$name','$surname','NULL')";
    $result = mysqli_query($connect, $query);
    
    if ($result) {
        $t["text"] = "Thanks! You are now registered\n";
    } else {
        $t["text"] = "Error inserting data into the database\n";
    }
}
echo json_encode(array("text" => $t["text"]));


?>