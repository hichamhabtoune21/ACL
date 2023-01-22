<?php
include "connect.php";

$name = $_POST["name"];
$surname = $_POST["surname"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
mysqli_query($connect,"SET FOREIGN_KEY_CHECKS=0");
$sql = "insert into `user` (ID_User, Email, Password, Username, Nome, Cognome, Ruolo)
values('NULL','$email','$password','$username','$name','$surname','NULL')";

$result = mysqli_query($connect, $sql);
if($result){
    echo "OK";
}
?>