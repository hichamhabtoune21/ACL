<?php
include "connect.php";

$name = $_POST["name"];
$surname = $_POST["surname"];
$username = $_POST["usename"];
$email = $_POST["email"];
$password = $_POST["password"];

$sql = "INSERT INTO `user` (email,password,username,nome,cognome)
        values($email,$password,$username,$name,$surname)";

$result = mysqli_query($connect, $sql);
if($result){
    echo "OK";
}
?>