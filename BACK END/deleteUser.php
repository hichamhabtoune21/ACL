<?php
include("connect.php");
$idUser = $_POST["ID_User"];
$query="DELETE FROM user where ID_User = ?";
$result=$connect->prepare($query);
$result->bind_param("i",$idUser);
$result->execute();
$result=$result->get_result();
if($result){
    echo json_encode(array("success"=>"yes"));
}
else{
    echo json_encode(array("success"=>"no"));
}
?>