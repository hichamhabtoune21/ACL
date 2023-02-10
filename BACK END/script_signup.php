<?php
include "connect.php";
include("navbar.html");
$name = $_POST["name"];
$surname = $_POST["surname"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
mysqli_query($connect, "SET FOREIGN_KEY_CHECKS=0");

$check_email = mysqli_query($connect, "SELECT Email FROM user where Email = '$email' "); //cerca se ci sono email uguali a quelle già messe

if (mysqli_num_rows($check_email) > 0) { // se esiste già un'email uguale
    echo "Email already exists";
} else { //altrimenti inserisco i dati nel database
    $sql = "insert into `user` values('NULL','$email','$password','$username','$name','$surname','NULL')";
}
$result = mysqli_query($connect, $sql);

if ($result) {

    echo "OK";
}
?>