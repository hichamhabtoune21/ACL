<?php
include "connect.php";
$name = $_POST["name"];
$surname = $_POST["surname"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$password1 = $_POST["password1"];
$t["text"] = "";

$hashed_password=md5($password);

mysqli_query($connect, "SET FOREIGN_KEY_CHECKS=0");

if ($password != $password1) {
    $t["text"] = $t["text"] . "The passwords entered are different\n";
}
$query= "SELECT Email FROM user where Email = ?";
$check_email=$connect->prepare($query);
$check_email->bind_param("s",$email);
$check_email->execute();

if (mysqli_num_rows($check_email->get_result()) > 0) { // se esiste già un'email uguale
    $t["text"] = $t["text"] . "The email entered already exists\n";
} 
else {
     //altrimenti inserisco i dati nel database
    $query = "INSERT INTO `user` (`Email`, `Password`, `Username`, `Name`, `Surname`) VALUES (?,?,?,?,?)";
    $result=$connect->prepare($query);
    $result->bind_param("sssss",$email,$hashed_password,$username,$name,$surname);
    $result->execute();    
    if ($result->get_result() || mysqli_affected_rows($connect) > 0) {
        $t["text"] = true;
    } else {
        $t["text"] = false;
        $t["problem"] = mysqli_error($connect);
    }
}
echo json_encode(array("text" => $t["text"]));


?>