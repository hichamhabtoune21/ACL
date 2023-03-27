<?php
session_start();
include("connect.php");

$idUser = $_POST["ID_User"];
$name = $_POST["name"];
$surname = $_POST["surname"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];


$query="SELECT * FROM user WHERE ID_User='$idUser'";
$result=mysqli_query($connect,$query);

if(mysqli_num_rows($result)>0){
    $user = mysqli_fetch_array($result);
    $query = "UPDATE user SET Email='$email', Password='$password', Username='$username', Name='$name', Surname='$surname' WHERE ID_User='$idUser'";
    $result = mysqli_query($connect,$query);
    echo json_encode(array("text" => $result));

}
else{
    echo json_encode(array("text" => $result));
}
?>
