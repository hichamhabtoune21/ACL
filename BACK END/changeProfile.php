<?php
session_start();
include("connect.php");

$idUser = $_POST["ID_User"];
$name = $_POST["name"];
$surname = $_POST["surname"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$hashed_password=md5($password);

$query="SELECT * FROM user WHERE ID_User='$idUser'";
$result=mysqli_query($connect,$query);

if(mysqli_num_rows($result)>0){
    $user = mysqli_fetch_array($result);
    $query = "UPDATE user SET Email=?, Password=?, Username=?, Name=?, Surname=? WHERE ID_User=?";
    $result = $connect->prepare($query);
    $result->bind_param("sssssi",$email,$hashed_password,$username,$name,$surname,$idUser);
    $result->execute();
    echo json_encode(array("text" => $result));

}
else{
    echo json_encode(array("text" => $result));
}
?>
