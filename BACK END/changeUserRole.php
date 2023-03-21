<?php
session_start();
include("connect.php");

$idUser = $_POST["ID_User"];
$newRole = $_POST["Role"];
$query="SELECT * FROM user WHERE ID_User='$idUser'";
$result=mysqli_query($connect,$query);

if(mysqli_num_rows($result)>0){
    $user = mysqli_fetch_array($result);
    $query = "UPDATE user SET `Role` = '$newRole' WHERE ID_User = $idUser";
    $result = mysqli_query($connect,$query);
    //$connect->query($query);
    echo json_encode(array("text" => $result));

}
else{
    echo json_encode(array("text" => "failed"));
}




?>